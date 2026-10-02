<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debes ingresar un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ];

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('portal');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $messages = [
            'name.required' => 'El nombre completo es obligatorio.',
            'rfc.required' => 'El RFC es obligatorio.',
            'rfc.unique' => 'Este RFC ya se encuentra registrado en el portal.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debes ingresar un correo electrónico válido.',
            'email.unique' => 'Este correo ya se encuentra registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'rfc' => 'required|string|max:13|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], $messages);

        // Verificar RFC con el erp-backend
        $erpUrl = env('ERP_URL', 'http://localhost:8000');
        $erpClientId = env('ERP_CLIENT_ID');
        $erpClientSecret = env('ERP_CLIENT_SECRET');

        try {
            // 1. Obtener token de cliente (Client Credentials Grant)
            $tokenResponse = Http::asForm()->post($erpUrl . '/oauth/token', [
                'grant_type' => 'client_credentials',
                'client_id' => $erpClientId,
                'client_secret' => $erpClientSecret,
            ]);

            if (!$tokenResponse->successful()) {
                return back()->withErrors(['rfc' => 'Error de autenticación con el servidor principal.'])->withInput();
            }

            $accessToken = $tokenResponse->json('access_token');

            // 2. Verificar elegibilidad del RFC
            $verifyResponse = Http::withToken($accessToken)
                ->post($erpUrl . '/api/portal/verify-rfc-eligibility', [
                    'rfc' => $request->rfc
                ]);

            if ($verifyResponse->successful() && $verifyResponse->json('eligible')) {
                // Crear usuario local
                $user = User::create([
                    'name' => $request->name,
                    'rfc' => $request->rfc,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                Auth::login($user);

                return redirect('portal');
            } else {
                return back()->withErrors(['rfc' => 'El RFC no está vinculado a ningún expediente activo en la notaría.'])->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['rfc' => 'Hubo un error al verificar el RFC. Por favor, intenta más tarde.'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
