@extends('template.layout')

@section('title', 'Contacto · Notaría Pública Número 4')
@section('meta_description', 'Escriba a la Notaría Pública Número 4 del Distrito Judicial de Puebla. Circuito Juan Pablo II 3117, Col. Las Ánimas, Puebla. Lunes a viernes de 09:00 a 17:00 h.')

@section('front-page')
    <div class="hero inner-page" style="background-image: url({{ asset('images/portada1.jpg') }});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 intro">
                    <p class="n4-eyebrow">Notaría Pública Número 4 · Distrito Judicial de Puebla</p>
                    <h1 class="name-notary">Contacto</h1>
                    <span class="hero-rule" aria-hidden="true"></span>
                    <p class="lead">
                        Describa su asunto y la notaría se comunicará con usted. Si prefiere acudir,
                        estamos en Circuito Juan Pablo II 3117, Col. Las Ánimas.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-section bg-light" id="contact-section" tabindex="-1">
        <div class="container">

            <div class="row">
                <div class="col-lg-7 mb-5">

                    @if(session('contact_ok'))
                        <div class="alert alert-success" role="status">
                            <strong>Hemos recibido su mensaje.</strong> La notaría se comunicará con usted.
                            Horario de atención: lunes a viernes, de 09:00 a 17:00 h.
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>No pudimos enviar su mensaje.</strong>
                            Revise los campos marcados más abajo.
                        </div>
                    @endif

                    <form action="{{ route('contact-create') }}" method="post"
                          class="executive-card executive-card--form" novalidate>
                        @csrf
                        <h3 class="mb-2">Envíenos un mensaje</h3>
                        <p class="text-muted mb-4" style="font-size: .95rem;">Todos los campos son obligatorios.</p>

                        <div class="n4-hp" aria-hidden="true">
                            <label for="sitio_web">No llene este campo</label>
                            <input type="text" id="sitio_web" name="sitio_web" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="contacto-nombre">Nombre</label>
                                <input required type="text" id="contacto-nombre" name="name" value="{{ old('name') }}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       autocomplete="given-name" autocapitalize="words">
                                @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contacto-apellidos">Apellidos</label>
                                <input required type="text" id="contacto-apellidos" name="last_name" value="{{ old('last_name') }}"
                                       class="form-control @error('last_name') is-invalid @enderror"
                                       autocomplete="family-name" autocapitalize="words">
                                @error('last_name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="contacto-telefono">Teléfono</label>
                                <input required type="tel" id="contacto-telefono" name="phone" value="{{ old('phone') }}"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       inputmode="tel" autocomplete="tel" maxlength="25">
                                @error('phone')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contacto-correo">Correo electrónico</label>
                                <input required type="email" id="contacto-correo" name="email" value="{{ old('email') }}"
                                       class="form-control @error('email') is-invalid @enderror"
                                       inputmode="email" autocomplete="email">
                                @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contacto-asunto">Asunto</label>
                            <input required type="text" id="contacto-asunto" name="affair" value="{{ old('affair') }}"
                                   class="form-control @error('affair') is-invalid @enderror">
                            @error('affair')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="contacto-mensaje">Su mensaje</label>
                            <textarea required id="contacto-mensaje" name="message" rows="8"
                                      class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Enviar mensaje</button>
                    </form>
                </div>

                <div class="col-lg-5 ml-auto">
                    <div class="executive-card mb-4">
                        <h2 class="section-heading mb-3"><strong>Dónde estamos</strong></h2>
                        <span class="n4-rule" aria-hidden="true"></span>
                        <p>Circuito Juan Pablo II 3117, Colonia Las Ánimas, Puebla, Puebla.</p>
                        <p class="text-muted mb-0">Lunes a viernes, de 09:00 a 17:00 h.</p>
                    </div>

                    <div class="executive-card executive-card--media">
                        <iframe
                            title="Ubicación de la Notaría Pública Número 4 en Google Maps"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.495240457843!2d-98.23381102512722!3d19.0419513821557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc0b431685abf%3A0xbe6704bb6fb987ef!2sNotaria%20P%C3%BAblica%20No.%204!5e0!3m2!1ses-419!2smx!4v1682451691473!5m2!1ses-419!2smx"
                            style="height: 400px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
