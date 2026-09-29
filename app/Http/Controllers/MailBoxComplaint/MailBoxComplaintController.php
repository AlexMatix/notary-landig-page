<?php

namespace App\Http\Controllers\MailBoxComplaint;

use Illuminate\Http\Request;
use App\Models\MailboxComplaint;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class MailBoxComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        // $response = MailBoxComplaint::where('process', 0)->orderBy("id", "desc")->paginate(100);
        $response = MailboxComplaint::where('process', 0)->orderBy("id", "desc")->paginate(100);
        return $this->showList($response);
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->filled('sitio_web')) {
            return redirect()->to(route('mailbox_complaints') . '#buzon');
        }

        // Los datos de contacto son opcionales a propósito: el buzón acepta
        // reportes anónimos. Sólo el asunto y el detalle son obligatorios.
        $datos = $request->validate([
            'name'      => ['nullable', 'string', 'max:120'],
            'email'     => ['nullable', 'email:rfc', 'max:150'],
            'phone'     => ['nullable', 'string', 'max:25', 'regex:/^[0-9()+\s-]{10,25}$/'],
            'affair'    => ['required', 'string', 'max:180'],
            'complaint' => ['required', 'string', 'max:4000'],
        ], [
            'email.email'        => 'Ese correo no tiene un formato válido. Revíselo, o déjelo vacío.',
            'phone.regex'        => 'Escriba un teléfono de 10 dígitos, o deje el campo vacío.',
            'affair.required'    => 'Indique el asunto de su reporte.',
            'complaint.required' => 'Describa lo ocurrido para que podamos revisarlo.',
        ]);

        MailboxComplaint::create($datos);

        return redirect()
            ->to(route('mailbox_complaints') . '#buzon')
            ->with('mailbox_ok', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailboxComplaint  $mailBoxComplaint
     * @return \Illuminate\Http\Response
     */
    public function show(MailboxComplaint $mailBoxComplaint)
    {
        return $this->showOne($mailBoxComplaint);
    }



}
