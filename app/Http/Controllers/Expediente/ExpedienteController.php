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

            // Liga caducada o de otro expediente: la causa está del lado del enlace.
            if ($response->failed()) {
                return view('expediente_link', [
                    'token'         => $token,
                    'error_kind'    => 'token',
                    'error_title'   => 'No pudimos abrir este expediente',
                    'error_message' => 'La liga que utilizó ya no es válida. Por seguridad, '
                                     . 'estas ligas caducan y sólo sirven para el expediente '
                                     . 'al que fueron emitidas. Solicite una nueva a la persona '
                                     . 'de la notaría que le compartió este enlace.',
                ]);
            }

            return view('expediente_link', compact('token'));

        } catch (\Exception $e) {
            // El ERP no responde o falló el OAuth: la culpa es nuestra, no del
            // visitante. Antes ambas ramas devolvían el mismo texto, así que a
            // quien tenía una liga perfecta se le decía que su liga no servía y
            // se le mandaba a pedir otra que tampoco habría funcionado.
            report($e);

            return view('expediente_link', [
                'token'         => $token,
                'error_kind'    => 'servicio',
                'error_title'   => 'El servicio no está disponible en este momento',
                'error_message' => 'Su liga está bien; el problema es nuestro. Vuelva a intentarlo '
                                 . 'en unos minutos abriendo de nuevo este mismo enlace. '
                                 . 'Si continúa sin abrir, comuníquese con la notaría.',
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

        // Sin esto, un HEIC de 20 MB desde un iPhone rebotaba contra el límite de
        // PHP y devolvía HTML, que el cliente reportaba como un error genérico.
        // validate() responde 422 con un mensaje que el wizard sí puede mostrar.
        $request->validate([
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf,heic', 'max:10240'],
        ], [
            'file.mimes' => 'Sólo aceptamos imágenes JPG o PNG y archivos PDF.',
            'file.max'   => 'El archivo pesa más de 10 MB. Tome la foto en menor resolución o envíe un PDF.',
        ]);

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
