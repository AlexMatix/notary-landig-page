<?php

namespace App\Http\Controllers\Expediente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Cache;

class ExpedienteController extends Controller
{
    private $erpUrl;
    private $erpTokenEndpoint;
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->erpUrl = env('ERP_BACKEND_URL', 'http://localhost:8000/api');
        
        // Credentials for Client Credentials Grant
        $this->erpTokenEndpoint = env('ERP_TOKEN_ENDPOINT', 'http://localhost:8000/api/oauth/token');
        $this->clientId = env('ERP_CLIENT_ID', '9f320d67-969b-433a-9f21-bc9db6328359');
        $this->clientSecret = env('ERP_CLIENT_SECRET', 'RILVY0r9KwosdphFivX52CPVp7ZMES6Satng0vcg');
    }

    /**
     * Obtiene el Bearer Token automáticamente y lo almacena en Cache
     */
    private function getErpToken()
    {
        // El token de Passport usualmente vive mucho (ej. meses o 1 año) o días, 
        // pero lo cachearemos por 24 horas (86400 segundos) para estar seguros, o hasta que expire
        return Cache::remember('erp_backend_token', 86000, function () {
            $response = Http::post($this->erpTokenEndpoint, [
                'grant_type' => 'client_credentials',
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'scope' => '',
            ]);

            if ($response->successful()) {
                return $response->json()['access_token'];
            }

            throw new \Exception('No se pudo autenticar con el ERP Backend (Oauth Client Credentials).');
        });
    }

    /**
     * Muestra la vista principal (Frontend Wizard)
     */
    public function showWizard($token)
    {
        try {
            $response = Http::withToken($this->getErpToken())
                ->get($this->erpUrl . '/procedure/verifyToken/' . $token);

            if ($response->failed()) {
                return view('expediente_link', [
                    'token' => $token,
                    'error_message' => 'El enlace proporcionado no es válido o ha caducado. Comuníquese con su asesor de la Notaría Pública o a recepción para que le proporcionen un nuevo acceso.'
                ]);
            }
            
            return view('expediente_link', compact('token'));
        } catch (\Exception $e) {
            return view('expediente_link', [
                'token' => $token,
                'error_message' => 'El enlace proporcionado no es válido o ha caducado. Comuníquese con su asesor de la Notaría Pública o a recepción para que le proporcionen un nuevo acceso.'
            ]);
        }
    }

    /**
     * PROXY: Verifica si un RFC existe en el ERP
     */
    public function verifyRfc(Request $request)
    {
        $token = $request->get('token');
        $response = Http::withToken($this->getErpToken())
            ->post($this->erpUrl . '/procedure/checkRfc/' . $token, [
                'rfc' => $request->get('rfc')
            ]);

        return response()->json($response->json(), $response->status());
    }

    /**
     * PROXY: Vincula al cliente encontrado con el expediente
     */
    public function linkGrantor(Request $request)
    {
        $token = $request->get('token');
        $response = Http::withToken($this->getErpToken())
            ->post($this->erpUrl . '/procedure/storeGrantor/' . $token, $request->all());

        return response()->json($response->json(), $response->status());
    }

    /**
     * PROXY: Obtiene el catálogo de documentos para el expediente
     */
    public function getDocuments($token)
    {
        // El catálogo ahora viene de un endpoint específico
        $response = Http::withToken($this->getErpToken())
            ->get($this->erpUrl . '/document-catalog/' . $token);

        return response()->json($response->json(), $response->status());
    }

    /**
     * PROXY: Sube un documento al ERP
     */
    public function uploadDocument(Request $request)
    {
        if (!$request->hasFile('file') || !$request->file('file')->isValid()) {
            return response()->json(['error' => 'Archivo no válido'], 400);
        }

        $file = $request->file('file');

        $token = $request->get('token');
        $response = Http::withToken($this->getErpToken())
            ->attach(
                'file', file_get_contents($file->getRealPath()), $file->getClientOriginalName()
            )
            ->post($this->erpUrl . '/procedure/uploadDocuments/' . $token, [
                'document_id' => $request->get('document_id')
            ]);

        return response()->json($response->json(), $response->status());
    }
}
