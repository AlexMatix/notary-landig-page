<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PortalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $procedures = collect();
        $error = null;

        // Obtener el RFC del usuario autenticado
        $rfc = $user->rfc;

        $erpUrl = env('ERP_URL', 'http://localhost:8000');
        $erpClientId = env('ERP_CLIENT_ID');
        $erpClientSecret = env('ERP_CLIENT_SECRET');

        try {
            // Obtenemos token
            $accessToken = Cache::remember('erp_access_token', 3000, function () use ($erpUrl, $erpClientId, $erpClientSecret) {
                $tokenResponse = Http::asForm()->post($erpUrl . '/oauth/token', [
                    'grant_type' => 'client_credentials',
                    'client_id' => $erpClientId,
                    'client_secret' => $erpClientSecret,
                ]);

                if ($tokenResponse->successful()) {
                    return $tokenResponse->json('access_token');
                }

                return null;
            });

            if ($accessToken) {
                $response = Http::withToken($accessToken)
                    ->post($erpUrl . '/api/portal/procedures-by-rfc', [
                        'rfc' => $rfc
                    ]);

                if ($response->successful()) {
                    $json = $response->json();
                    
                    // La respuesta de successResponse de erp-backend es solo el JSON crudo en ocasiones, 
                    // pero si Resource::collection() se serializa con 'data', puede venir allí.
                    if (isset($json['data'])) {
                        $procedures = collect($json['data']);
                    } else {
                        $procedures = collect($json);
                    }
                } else {
                    $error = "No se pudieron cargar los trámites (Error del servidor remoto).";
                }
            } else {
                $error = "Falla de autenticación con el sistema central.";
            }
        } catch (\Exception $e) {
            $error = "Servicio temporalmente no disponible.";
        }

        return view('portal.index', compact('procedures', 'error'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $rfc = $user->rfc;
        $erpUrl = env('ERP_URL', 'http://localhost:8000');
        $erpClientId = env('ERP_CLIENT_ID');
        $erpClientSecret = env('ERP_CLIENT_SECRET');
        
        $procedure = null;
        $error = null;

        try {
            $accessToken = Cache::remember('erp_access_token', 3000, function () use ($erpUrl, $erpClientId, $erpClientSecret) {
                $tokenResponse = Http::asForm()->post($erpUrl . '/oauth/token', [
                    'grant_type' => 'client_credentials',
                    'client_id' => $erpClientId,
                    'client_secret' => $erpClientSecret,
                ]);

                if ($tokenResponse->successful()) {
                    return $tokenResponse->json('access_token');
                }

                return null;
            });

            if ($accessToken) {
                $response = Http::withToken($accessToken)
                    ->post($erpUrl . '/api/portal/procedures-by-rfc', [
                        'rfc' => $rfc
                    ]);

                if ($response->successful()) {
                    $json = $response->json();
                    $procedures = isset($json['data']) ? collect($json['data']) : collect($json);
                    
                    // Find the procedure
                    $procedure = $procedures->firstWhere('id', (int)$id);
                    
                    if (!$procedure) {
                        return redirect()->route('portal')->with('error', 'Trámite no encontrado o sin permisos.');
                    }
                } else {
                    $error = "No se pudo cargar el trámite (Error del servidor remoto).";
                }
            } else {
                $error = "Falla de autenticación con el sistema central.";
            }
        } catch (\Exception $e) {
            $error = "Servicio temporalmente no disponible.";
        }

        if ($error) {
            return redirect()->route('portal')->with('error', $error);
        }

        return view('portal.show', compact('procedure'));
    }
}
