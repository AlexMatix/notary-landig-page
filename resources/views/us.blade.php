@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{asset('images/portada1.jpg')}});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12" style="margin-top: 120px; position: relative; z-index: 2;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-10 intro text-center text-lg-left">
                            <h1 class="text-white name-notary mb-4"><strong>Notaría Pública Número 4 del Distrito Judicial de Puebla con Residencia en la Ciudad Puebla<br> </strong> Identidad y Valores Institucionales</h1>
                            <p class="lead text-white mb-5" style="font-weight: 300;">Contamos con un equipo de profesionales altamente capacitados, dispuestos a brindar soluciones eficaces y certeras a sus interrogantes jurídicas. A continuación, presentamos nuestra filosofía y los pilares que rigen nuestro actuar.</p>
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
                <!-- Mision -->
                <div class="col-lg-4 mb-4">
                    <div class="executive-card text-center d-flex flex-column h-100">
                        <span class="icon-executive icon-shield"></span>
                        <h3 class="section-heading mb-4"><strong class="text-black"> Misión </strong></h3>
                        <p class="text-muted" align="justify">
                            Garantizar una prestación eficaz del servicio público notarial, asegurando que la ciudadanía reciba atención pronta, profesional e imparcial. Actuamos estrictamente sustentados en los pilares de la seguridad e integridad jurídica, transparencia, honestidad e independencia institucional.
                        </p>
                    </div>
                </div>

                <!-- Vision -->
                <div class="col-lg-4 mb-4">
                    <div class="executive-card text-center d-flex flex-column h-100">
                        <span class="icon-executive icon-eye"></span>
                        <h3 class="section-heading mb-4"><strong class="text-black"> Visión </strong></h3>
                        <p class="text-muted" align="justify">
                            Consolidarnos como la Notaría Pública de máxima referencia y confianza en el Estado de Puebla, distinguiéndonos por la excelencia operativa. Nuestro compromiso prioritario es brindar asesoría y soporte transparente, garantizando certeza en cada acto notarial y agilizando todos los trámites legales.
                        </p>
                    </div>
                </div>

                <!-- Politica de Calidad -->
                <div class="col-lg-4 mb-4">
                    <div class="executive-card text-center d-flex flex-column h-100">
                        <span class="icon-executive icon-check_circle"></span>
                        <h3 class="section-heading mb-4"><strong class="text-black"> Política de Calidad </strong></h3>
                        <p class="text-muted" align="justify">
                            Ejecutamos nuestra encomienda bajo los más altos estándares de rigor técnico, buscando la satisfacción del cliente y la mejora continua del sistema:
                        </p>
                        <ul class="text-left text-muted pl-4" style="font-size: 0.9em; list-style: disc;">
                            <li>Estandarización legal de actas y criterios operativos.</li>
                            <li>Infraestructura de vanguardia y formación continua del talento.</li>
                            <li>Innovación tecnológica y sistematización de procesos.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
