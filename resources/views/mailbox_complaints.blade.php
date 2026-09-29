@extends('template.layout')

@section('title', 'Buzón de quejas y sugerencias · Notaría Pública Número 4')
@section('meta_description', 'Envíe una queja, sugerencia o reporte sobre la atención de la Notaría Pública Número 4 del Distrito Judicial de Puebla. Puede hacerlo de forma anónima.')

@section('front-page')
    <div class="hero inner-page" style="background-image: url({{ asset('images/portada1.jpg') }});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 intro">
                    <p class="n4-eyebrow">Notaría Pública Número 4 · Distrito Judicial de Puebla</p>
                    <h1 class="name-notary">Buzón de quejas y sugerencias</h1>
                    <span class="hero-rule" aria-hidden="true"></span>
                    <p class="lead">
                        Este buzón recibe quejas, sugerencias y reportes sobre la atención de la
                        notaría. Puede enviarlo de forma anónima o dejar sus datos si desea recibir
                        una respuesta.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-section bg-light" id="buzon" tabindex="-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5">

                    @if(session('mailbox_ok'))
                        <div class="alert alert-success" role="status">
                            <strong>Hemos recibido su reporte.</strong> Si dejó datos de contacto,
                            la notaría se comunicará con usted.
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>No pudimos enviar su reporte.</strong>
                            Revise los campos marcados más abajo.
                        </div>
                    @endif

                    <form action="{{ route('mailbox-create') }}" method="post"
                          class="executive-card executive-card--form" novalidate>
                        @csrf
                        <h3 class="mb-2">Escríbanos su reporte</h3>
                        <p class="text-muted mb-4" style="font-size: .95rem;">
                            El asunto y el detalle son obligatorios. Sus datos de contacto son opcionales:
                            déjelos sólo si desea que la notaría le responda.
                        </p>

                        <div class="n4-hp" aria-hidden="true">
                            <label for="sitio_web">No llene este campo</label>
                            <input type="text" id="sitio_web" name="sitio_web" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="buzon-nombre">Nombre completo <span class="text-muted">(opcional)</span></label>
                            <input type="text" id="buzon-nombre" name="name" value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   autocomplete="name" autocapitalize="words">
                            @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="buzon-correo">Correo electrónico <span class="text-muted">(opcional)</span></label>
                            <input type="email" id="buzon-correo" name="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   inputmode="email" autocomplete="email">
                            @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="buzon-telefono">Teléfono <span class="text-muted">(opcional)</span></label>
                            <input type="tel" id="buzon-telefono" name="phone" value="{{ old('phone') }}"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   inputmode="tel" autocomplete="tel" maxlength="25">
                            @error('phone')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="buzon-asunto">Asunto del reporte</label>
                            <input required type="text" id="buzon-asunto" name="affair" value="{{ old('affair') }}"
                                   class="form-control @error('affair') is-invalid @enderror">
                            @error('affair')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="buzon-detalle">Detalle</label>
                            <textarea required id="buzon-detalle" name="complaint" rows="8"
                                      class="form-control @error('complaint') is-invalid @enderror"
                                      aria-describedby="ayuda-detalle">{{ old('complaint') }}</textarea>
                            <small id="ayuda-detalle" class="form-text text-muted">
                                Indique qué ocurrió, cuándo y con quién, si lo recuerda.
                            </small>
                            @error('complaint')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Enviar reporte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
