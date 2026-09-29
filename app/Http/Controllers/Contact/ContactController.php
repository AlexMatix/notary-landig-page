<?php

namespace App\Http\Controllers\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $response = $this->showList(Contact::where('process',0)->orderBy("id", "desc")->paginate(100));
        //dd($response);
        return $response;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        if ($request->filled('sitio_web')) {
            return redirect()->to(route('contact') . '#contact-section');
        }

        $datos = $request->validate([
            'name'      => ['required', 'string', 'max:120'],
            'last_name' => ['required', 'string', 'max:120'],
            'phone'     => ['required', 'string', 'max:25', 'regex:/^[0-9()+\s-]{10,25}$/'],
            'email'     => ['required', 'email:rfc', 'max:150'],
            'affair'    => ['required', 'string', 'max:180'],
            'message'   => ['required', 'string', 'max:4000'],
        ], [
            'name.required'      => 'Escriba su nombre.',
            'last_name.required' => 'Escriba sus apellidos.',
            'phone.required'     => 'Necesitamos un teléfono para responderle.',
            'phone.regex'        => 'Escriba un teléfono de 10 dígitos. Puede incluir lada.',
            'email.required'     => 'Escriba su correo electrónico.',
            'email.email'        => 'Ese correo no tiene un formato válido. Revíselo, por favor.',
            'affair.required'    => 'Indique el asunto de su mensaje.',
            'message.required'   => 'Describa su asunto para que podamos orientarle.',
        ]);

        Contact::create($datos);

        return redirect()
            ->to(route('contact') . '#contact-section')
            ->with('contact_ok', true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return $contact;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
