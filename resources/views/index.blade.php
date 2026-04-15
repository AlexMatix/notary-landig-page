@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{asset('images/portada1.jpg')}});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12" style="margin-top: 120px; position: relative; z-index: 2;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-10 intro text-center text-lg-left">
                            <h1 class="text-white name-notary mb-4 animate-fade-in-up"><strong>Notaría Pública Número
                                    4</strong></h1>
                            <p class="lead text-white mb-5 animate-fade-in-up delay-100" style="font-weight: 300;">
                                Experiencia, certeza jurídica y profesionalismo al servicio de tu tranquilidad.</p>
                            <p class="animate-fade-in-up delay-200">
                                <a href="#agendar-cita"
                                    class="btn btn-primary py-3 px-5 mb-3 d-inline-block">Contáctenos Ahora</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-section overflow-hidden">
        <div class="container">
            <!-- Primer Notario -->
            <div class="row align-items-center mb-5 pb-5">
                <div class="col-md-6 mb-5 mb-lg-0 col-lg-5 animate-fade-in-up delay-100">
                    <div class="executive-card p-0 overflow-hidden d-flex flex-column"
                        style="background-color: transparent; border: none; box-shadow: none;">
                        <img src="{{asset('images/maestra_norma.png')}}" alt="Dr. Geudiel Peláez"
                            class="img-fluid rounded mb-4"
                            style="object-fit: cover; object-position: center; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div class="p-3">
                            <h3 style="color: #0d2b3e; font-weight: 600; font-size: 1.5rem;" class="mb-2">Mtra. Norma Romero
                                Cortés</h3>
                            <p class="text-primary font-weight-bold mb-3"
                                style="letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">Notario Público
                                Titular</p>
                            <p class="text-muted" style="line-height: 1.6;">Dirigiendo la Notaría Pública Número 4 con una
                                trayectoria impecable, garantizando la certeza jurídica en cada uno de los procesos
                                encomendados por nuestros clientes. Su liderazgo ético y compromiso con la legalidad
                                aseguran la resolución expedita de cualquier trámite notarial.</p>
                        </div>
                    </div>
                </div>
                <!-- Segundo Notario -->
                <div class="col-md-6 col-lg-5 animate-fade-in-up delay-200">
                    <div class="executive-card p-0 overflow-hidden d-flex flex-column"
                        style="background-color: transparent; border: none; box-shadow: none;">
                        <img src="{{asset('images/maestra_norma_cortes.png')}}" alt="Isaí Peláez"
                            class="img-fluid rounded mb-4"
                            style="object-fit: cover; object-position: center; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div class="p-3">
                            <h3 style="color: #0d2b3e; font-weight: 600; font-size: 1.5rem;" class="mb-2">Licenciada. Norma
                                Alma Cortés Caballero</h3>
                            <p class="text-primary font-weight-bold mb-3"
                                style="letter-spacing: 1px; font-size: 0.9rem; text-transform: uppercase;">Notario Público
                                Auxiliar</p>
                            <p class="text-muted" style="line-height: 1.6;">Brindando soporte esencial y asesoría precisa en
                                nuestra notaría. Su dedicación a la excelencia e innovación en los sistemas notariales
                                permite ofrecer a nuestros clientes un servicio altamente eficiente y estructurado,
                                cumpliendo cabalmente con las normas de calidad institucionales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <!-- Mision -->
                <div class="col-lg-4 mb-4 animate-fade-in-up delay-100">
                    <div class="executive-card text-center d-flex flex-column h-100">
                        <span class="icon-executive icon-shield"></span>
                        <h3 class="section-heading mb-4"><strong class="text-black"> Misión </strong></h3>
                        <p class="text-muted" align="justify">
                            Garantizar una prestación eficaz del servicio público notarial, asegurando que la ciudadanía
                            reciba atención pronta, profesional e imparcial. Actuamos estrictamente sustentados en los
                            pilares de la seguridad e integridad jurídica, transparencia, honestidad e independencia
                            institucional.
                        </p>
                    </div>
                </div>

                <!-- Vision -->
                <div class="col-lg-4 mb-4 animate-fade-in-up delay-200">
                    <div class="executive-card text-center d-flex flex-column h-100">
                        <span class="icon-executive icon-eye"></span>
                        <h3 class="section-heading mb-4"><strong class="text-black"> Visión </strong></h3>
                        <p class="text-muted" align="justify">
                            Consolidarnos como la Notaría Pública de máxima referencia y confianza en el Estado de Puebla,
                            distinguiéndonos por la excelencia operativa. Nuestro compromiso prioritario es brindar asesoría
                            y soporte transparente, garantizando certeza en cada acto notarial y agilizando todos los
                            trámites legales.
                        </p>
                    </div>
                </div>

                <!-- Politica de Calidad -->
                <div class="col-lg-4 mb-4 animate-fade-in-up delay-300">
                    <div class="executive-card text-center d-flex flex-column h-100">
                        <span class="icon-executive icon-check_circle"></span>
                        <h3 class="section-heading mb-4"><strong class="text-black"> Política de Calidad </strong></h3>
                        <p class="text-muted" align="justify">
                            Ejecutamos nuestra encomienda bajo los más altos estándares de rigor técnico, buscando la
                            satisfacción del cliente y la mejora continua del sistema:
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

    <div class="site-section overflow-hidden" id="agendar-cita">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 mb-5 animate-fade-in-up delay-100">
                    <h2 class="mb-4 section-heading" style="line-height: 1.4;">A su plena disposición <br><strong>Soluciones
                            Notariales</strong></h2>
                    <p class="text-muted" align="justify" style="font-size: 1.1rem; line-height: 1.8;">Las organizaciones
                        actuales se desenvuelven en un entorno global altamente competitivo; por ello, resulta indispensable
                        contar con la absoluta certeza de que todas sus operaciones comerciales y civiles gozan de un firme
                        respaldo legal. Nuestro equipo de expertos está capacitado para blindar su patrimonio en todo
                        momento.</p>
                </div>
                <div class="col-md-12 col-lg-6 animate-fade-in-up delay-200">
                    @if($alert)
                        <div class="alert alert-warning" role="alert">
                            <strong>Gracias por comunicarse con nosotros.</strong> Uno de nuestros asesores jurídicos analizará
                            su caso y se pondrá en contacto con usted a la brevedad.
                        </div>
                    @endif
                    <form method="POST" action="{{route('cite-create')}}" class="book-form executive-card">
                        @csrf
                        <h3 class="mb-4 text-center">Agenda su cita</h3>
                        <div class="row align-items-center">
                            <div class="mb-3 mb-md-4 col-md-12">
                                <input required name="name" type="text" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="mb-3 mb-md-4 col-md-12">
                                <input required name="email" type="email" class="form-control" placeholder="Correo">
                            </div>

                            <div class="mb-3 mb-md-4 col-md-12">
                                <input required name="phone" type="number" class="form-control" placeholder="Telefono">
                            </div>

                            <div class="mb-3 mb-md-4 col-md-12">
                                <div class="form-control-wrap">
                                    <input required name="cite" type="text" id="cf-4" placeholder="Selecciona una fecha"
                                        class="form-control datepicker px-3">
                                    <span class="icon icon-date_range" style="color: #0d2b3e;"></span>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <input type="submit" value="Contactar Notaría" class="btn btn-primary btn-block py-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection