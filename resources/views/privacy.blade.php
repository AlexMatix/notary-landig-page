@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{asset('images/portada1.jpg')}});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12" style="margin-top: 120px; position: relative; z-index: 2;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-10 intro text-center text-lg-left">
                            <h1 class="text-white name-notary mb-4"><strong>Aviso de Privacidad</strong></h1>
                            <p class="lead text-white mb-5" style="font-weight: 300;">Notaría Pública Número 4 del Distrito Judicial de Puebla con Residencia en la Ciudad Puebla.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="executive-card p-5 modern-shadow">
                        <div class="alert alert-warning" role="alert">
                            <strong>Atención:</strong> El contenido legal de este Aviso de Privacidad debe ser proporcionado por la Notaría, asegurando el cumplimiento con la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP) y la Ley del Notariado para el Estado de Puebla.
                        </div>
                        <h2 class="mb-4">1. Identidad y domicilio del responsable</h2>
                        <p class="text-muted" align="justify">
                            La Notaría Pública Número 4 del Distrito Judicial de Puebla, con domicilio en Circuito Juan Pablo II 3117, Colonia Las Ánimas, Puebla, Puebla, es responsable del tratamiento de sus datos personales.
                        </p>
                        <h2 class="mb-4 mt-5">2. Datos personales sometidos a tratamiento</h2>
                        <p class="text-muted" align="justify">
                            Recabamos sus datos personales de forma directa cuando usted nos los proporciona por diversos medios, con la finalidad de prestarle los servicios notariales que nos solicita...
                        </p>
                        <h2 class="mb-4 mt-5">3. Finalidades del tratamiento</h2>
                        <p class="text-muted" align="justify">
                            Los datos personales que recabamos tienen como finalidad principal la elaboración de instrumentos públicos, protocolizaciones, certificaciones y cualquier otro acto notarial encomendado con base en la Ley del Notariado para el Estado de Puebla.
                        </p>
                        <h2 class="mb-4 mt-5">4. Derechos ARCO</h2>
                        <p class="text-muted" align="justify">
                            Usted tiene derecho de acceder, rectificar y cancelar sus datos personales, así como de oponerse al tratamiento de los mismos o revocar el consentimiento que para tal fin nos haya otorgado, a través de los procedimientos que hemos implementado en nuestras oficinas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
