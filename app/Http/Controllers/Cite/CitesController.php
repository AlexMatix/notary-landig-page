<?php

namespace App\Http\Controllers\Cite;

use App\Http\Controllers\Controller;
use App\Models\Cite;
use Illuminate\Http\Request;

class CitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Registra una solicitud de cita desde el formulario público del index.
     *
     * Antes: Cite::create($request->all()) sin validar, seguido de un
     * return view('index') desde un POST. Eso significaba que recargar
     * duplicaba la cita, el botón Atrás pedía reenviar el formulario, el
     * campo de fecha (texto libre, porque el datepicker nunca cargaba) se
     * escribía contra una columna DATE, y el aviso de éxito se pintaba a dos
     * viewports del punto donde aterriza el navegador tras el POST.
     *
     * Ahora: validación con mensajes en español, honeypot, y Post/Redirect/Get
     * al fragmento #agendar-cita, que además lleva el foco al aviso.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        // Sólo un bot llena este campo: está fuera de pantalla y con tabindex="-1".
        // Se redirige igual que en el caso de éxito para no darle señal alguna.
        if ($request->filled('sitio_web')) {
            return redirect()->to(route('index') . '#agendar-cita');
        }

        $datos = $request->validate([
            'name'  => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:25', 'regex:/^[0-9()+\s-]{10,25}$/'],
            'email' => ['required', 'email:rfc', 'max:150'],
            'cite'  => ['required', 'date', 'after_or_equal:today',
                        'before_or_equal:' . now()->addMonths(3)->toDateString()],
        ], [
            'name.required'        => 'Escriba su nombre completo.',
            'phone.required'       => 'Necesitamos un teléfono para confirmarle la cita.',
            'phone.regex'          => 'Escriba un teléfono de 10 dígitos. Puede incluir lada.',
            'email.required'       => 'Escriba su correo electrónico.',
            'email.email'          => 'Ese correo no tiene un formato válido. Revíselo, por favor.',
            'cite.required'        => 'Indique el día que prefiere para su cita.',
            'cite.after_or_equal'  => 'Elija una fecha de hoy en adelante.',
            'cite.before_or_equal' => 'Por ahora agendamos con hasta tres meses de anticipación.',
        ]);

        Cite::create($datos);

        return redirect()
            ->to(route('index') . '#agendar-cita')
            ->with('cite_ok', true);
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
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function show(Cite $cite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function edit(Cite $cite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cite $cite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cite $cite)
    {
        //
    }
}
