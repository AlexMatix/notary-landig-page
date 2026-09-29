@extends('template.layout')

@section('title', 'Identidad institucional · Notaría Pública Número 4')
@section('meta_description', 'Misión, visión y política de calidad de la Notaría Pública Número 4 del Distrito Judicial de Puebla.')

@section('front-page')
    <div class="hero inner-page" style="background-image: url({{ asset('images/portada1.jpg') }});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 intro">
                    <p class="n4-eyebrow">Notaría Pública Número 4 · Distrito Judicial de Puebla</p>
                    <h1 class="name-notary">Identidad institucional</h1>
                    <span class="hero-rule" aria-hidden="true"></span>
                    {{-- Nombrar el límite de la propia afirmación es el movimiento de
                         confianza de mayor rendimiento de esta página: PRODUCT.md deja
                         asentado que la Política de Calidad es texto institucional
                         propio, no una acreditación otorgada por un tercero. --}}
                    <p class="lead">
                        En esta página encontrará la misión, la visión y la política de calidad que
                        la notaría ha adoptado como marco de su operación. Son compromisos internos
                        que asumimos, no acreditaciones otorgadas por un tercero.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="executive-card executive-card--institutional h-100">
                        <span class="icon-executive icon-balance-scale" aria-hidden="true"></span>
                        <h2 class="section-heading mb-3"><strong>Misión</strong></h2>
                        <p>
                            Garantizar una prestación eficaz del servicio público notarial, asegurando
                            que la ciudadanía reciba atención pronta, profesional e imparcial. Actuamos
                            estrictamente sustentados en los pilares de la seguridad e integridad
                            jurídica, transparencia, honestidad e independencia institucional.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="executive-card executive-card--institutional h-100">
                        <span class="icon-executive icon-account_balance" aria-hidden="true"></span>
                        <h2 class="section-heading mb-3"><strong>Visión</strong></h2>
                        <p>
                            Consolidarnos como una notaría de referencia y confianza en el Estado de
                            Puebla. Nuestro compromiso es brindar asesoría y soporte transparente,
                            con certeza en cada acto notarial.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="executive-card executive-card--institutional h-100">
                        <span class="icon-executive icon-assignment" aria-hidden="true"></span>
                        <h2 class="section-heading mb-3"><strong>Política de calidad</strong></h2>
                        <p>
                            Ejecutamos nuestra encomienda bajo estándares de rigor técnico, buscando
                            la satisfacción del cliente y la mejora continua del sistema:
                        </p>
                        <ul class="n4-rule-list">
                            <li>Estandarización legal de actas y criterios operativos.</li>
                            <li>Infraestructura de vanguardia y formación continua del talento.</li>
                            <li>Innovación tecnológica y sistematización de procesos.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.acreditacion')
@endsection
