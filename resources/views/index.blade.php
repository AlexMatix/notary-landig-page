@extends('template.layout')

@section('title', 'Notaría Pública Número 4 · Distrito Judicial de Puebla')
@section('meta_description', 'Notaría Pública Número 4 del Distrito Judicial de Puebla. Compraventas, poderes, testamentos y constitución de sociedades. Circuito Juan Pablo II 3117, Col. Las Ánimas, Puebla.')

@section('front-page')
    {{-- La fotografía es evidencia: muestra el edificio real, el letrero
         "NOTARIA PUBLICA No 4" y el número 3117 de la fachada. Por eso el
         encuadre se ancla a 58% 50% y el texto ocupa sólo las 7 primeras
         columnas: para no taparla. --}}
    <div class="hero" role="img"
         aria-label="Fachada de la Notaría Pública Número 4, en Circuito Juan Pablo II 3117, Colonia Las Ánimas, Puebla"
         style="background-image: url({{ asset('images/portada1.jpg') }});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 intro">
                    <p class="n4-eyebrow">Distrito Judicial de Puebla · En funciones desde 2004</p>
                    <h1 class="name-notary">Notaría Pública Número 4</h1>
                    <span class="hero-rule" aria-hidden="true"></span>
                    <p class="lead">
                        Formalizamos compraventas, poderes, testamentos y constitución de sociedades
                        conforme a la Ley del Notariado del Estado de Puebla.
                    </p>
                    <p>
                        <a href="#agendar-cita" class="btn btn-primary d-inline-block">Solicitar una cita</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    {{-- 2. La prueba, antes que cualquier abstracción. --}}
    @include('partials.acreditacion')

    {{-- 3. Quién responde por esto: un nombre y una cara verificables. --}}
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                    <figure class="n4-portrait n4-portrait--titular">
                        <img src="{{ asset('images/maestra_norma.png') }}"
                             width="785" height="755" loading="lazy" decoding="async"
                             alt="Retrato de la Mtra. Norma Romero Cortés, Notario Público Titular">
                    </figure>
                    <h2 class="n4-portrait-name">Mtra. Norma Romero Cortés</h2>
                    <p class="n4-label">Notario Público Titular</p>
                    <span class="n4-rule" aria-hidden="true"></span>
                    <p>
                        Titular de la Notaría Pública Número 4 del Distrito Judicial de Puebla, con
                        residencia en la ciudad de Puebla. Su nombramiento fue conferido por Acuerdo
                        del Ejecutivo del Estado y publicado el 23 de noviembre de 2009 en el
                        Periódico Oficial del Estado de Puebla, tomo CDXV.
                    </p>
                </div>

                <div class="col-md-6 col-lg-5 offset-lg-1">
                    <figure class="n4-portrait n4-portrait--auxiliar">
                        <img src="{{ asset('images/maestra_norma_cortes.png') }}"
                             width="800" height="800" loading="lazy" decoding="async"
                             alt="Retrato de la Lic. Norma Alma Cortés Caballero, Notario Público Auxiliar">
                    </figure>
                    <h2 class="n4-portrait-name">Lic. Norma Alma Cortés Caballero</h2>
                    <p class="n4-label">Notario Público Auxiliar</p>
                    <span class="n4-rule" aria-hidden="true"></span>
                    <p>
                        Notario Público Auxiliar de la Notaría Pública Número 4 del Distrito Judicial
                        de Puebla.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. La pregunta de mayor intención: "¿ustedes hacen MI trámite?".
         Se alimenta del arreglo estático ServicesController::$services, que ya
         llegaba a esta vista y se descartaba sin usarse. No depende de la
         llamada remota al ERP, que puede caerse. --}}
    @if(!empty($services))
        <div class="site-section bg-light" aria-labelledby="tramites-titulo">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 col-lg-8">
                        <h2 id="tramites-titulo" class="section-heading mb-3">
                            <strong>Trámites que formalizamos</strong>
                        </h2>
                        <p class="text-muted mb-0">
                            Cada categoría reúne los actos que la notaría protocoliza y los documentos
                            que debe presentar. Consulte los requisitos antes de acudir.
                        </p>
                    </div>
                </div>
                <div class="row">
                    @foreach(array_keys($services) as $categoria)
                        <div class="col-6 col-lg-4 mb-4">
                            <a class="n4-tramite h-100" href="{{ route('services_catalog') }}">
                                <span class="n4-tramite__nombre">{{ ucfirst(mb_strtolower($categoria, 'UTF-8')) }}</span>
                                <span class="n4-tramite__accion">Ver requisitos</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- 5. Un domicilio visitable también es prueba. --}}
    <div class="site-section" aria-labelledby="ubicacion-titulo">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5 mb-5 mb-lg-0">
                    <h2 id="ubicacion-titulo" class="section-heading mb-4"><strong>Dónde estamos</strong></h2>
                    <p>Circuito Juan Pablo II 3117, Colonia Las Ánimas, Puebla, Puebla.</p>
                    <p class="text-muted mb-0">Lunes a viernes, de 09:00 a 17:00 h.</p>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="executive-card executive-card--media">
                        <iframe
                            title="Ubicación de la Notaría Pública Número 4 en Google Maps"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.495240457843!2d-98.23381102512722!3d19.0419513821557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc0b431685abf%3A0xbe6704bb6fb987ef!2sNotaria%20P%C3%BAblica%20No.%204!5e0!3m2!1ses-419!2smx!4v1682451691473!5m2!1ses-419!2smx"
                            style="height: 380px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 6. El cierre. Se pide la acción después de haber demostrado lo anterior.
         tabindex="-1" para que el fragmento #agendar-cita reciba el foco tras el
         redirect PRG y el lector de pantalla anuncie el aviso. --}}
    <div class="site-section bg-light" id="agendar-cita" tabindex="-1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 mb-5">
                    <h2 class="section-heading mb-4">A su disposición <br><strong>Servicios notariales</strong></h2>
                    <p>
                        Un acto notarial es irreversible: por eso conviene resolver las dudas antes de
                        firmar. Indíquenos el día que le acomoda y la notaría se comunicará con usted
                        para confirmar la hora y decirle qué documentos debe reunir.
                    </p>

                    <ol class="n4-pasos">
                        <li>Usted envía esta solicitud con el día que prefiere.</li>
                        <li>La notaría le llama para confirmar la hora y decirle qué documentos traer.</li>
                        <li>Usted acude a Circuito Juan Pablo II 3117, Col. Las Ánimas.</li>
                    </ol>
                </div>

                <div class="col-12 col-lg-6">
                    @if(session('cite_ok'))
                        <div class="alert alert-success" role="status">
                            <strong>Hemos recibido su solicitud.</strong> La notaría se comunicará con usted
                            para confirmar el día y la hora. Horario de atención: lunes a viernes,
                            de 09:00 a 17:00 h.
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>No pudimos enviar su solicitud.</strong>
                            Revise los campos marcados más abajo.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('cite-create') }}"
                          class="book-form executive-card executive-card--form" novalidate>
                        @csrf
                        <h3 class="mb-2 text-center">Solicite una cita</h3>
                        <p class="text-muted text-center mb-4" style="font-size: .95rem;">
                            Todos los campos son obligatorios.
                        </p>

                        {{-- Honeypot: fuera del flujo visual y del orden de tabulación --}}
                        <div class="n4-hp" aria-hidden="true">
                            <label for="sitio_web">No llene este campo</label>
                            <input type="text" id="sitio_web" name="sitio_web" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="cita-nombre">Nombre completo</label>
                            <input type="text" id="cita-nombre" name="name" value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   autocomplete="name" autocapitalize="words" required
                                   @error('name') aria-invalid="true" aria-describedby="err-nombre" @enderror>
                            @error('name')
                                <div id="err-nombre" class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- El teléfono va antes que el correo: es el canal por el que la
                             notaría responde y el dato que un adulto mayor da con más certeza. --}}
                        <div class="form-group">
                            <label for="cita-telefono">Teléfono de contacto</label>
                            <input type="tel" id="cita-telefono" name="phone" value="{{ old('phone') }}"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   inputmode="tel" autocomplete="tel" maxlength="25" required
                                   aria-describedby="ayuda-telefono @error('phone') err-telefono @enderror"
                                   @error('phone') aria-invalid="true" @enderror>
                            <small id="ayuda-telefono" class="form-text text-muted">
                                Diez dígitos. Es el medio por el que le confirmaremos la cita.
                            </small>
                            @error('phone')
                                <div id="err-telefono" class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cita-correo">Correo electrónico</label>
                            <input type="email" id="cita-correo" name="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   inputmode="email" autocomplete="email" required
                                   @error('email') aria-invalid="true" aria-describedby="err-correo" @enderror>
                            @error('email')
                                <div id="err-correo" class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- type="date" sustituye al datepicker muerto: es nativo, abre el
                             selector del sistema en móvil y emite YYYY-MM-DD, que es
                             exactamente lo que espera la columna DATE de la tabla cites. --}}
                        <div class="form-group">
                            <label for="cita-fecha">Fecha que prefiere para su cita</label>
                            <input type="date" id="cita-fecha" name="cite" value="{{ old('cite') }}"
                                   class="form-control @error('cite') is-invalid @enderror"
                                   min="{{ now()->toDateString() }}"
                                   max="{{ now()->addMonths(3)->toDateString() }}" required
                                   aria-describedby="ayuda-fecha @error('cite') err-fecha @enderror"
                                   @error('cite') aria-invalid="true" @enderror>
                            <small id="ayuda-fecha" class="form-text text-muted">
                                Indique el día que le acomoda. La hora se acuerda por teléfono.
                            </small>
                            @error('cite')
                                <div id="err-fecha" class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Enviar solicitud</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
