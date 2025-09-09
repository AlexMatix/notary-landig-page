@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{asset('images/portada1.jpg')}});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12" style="margin-top: 120px;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-10 intro">
                            {{--                            <h2 class="text-white">Notaría Pública Número 4</h2>--}}
                            <h1 class="text-white name-notary"><strong>Notaría Pública Número 4</strong></h1>
                            {{--                            <h3 class="text-white">Notario Titular</h3>--}}
                        </div>

                        {{--                        <div class="col-lg-5">--}}
                        {{--                            <img src="{{asset('images/maestra_norma.png')}}" alt="Image" class="img-fluid master-norma">--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-4 ml-auto">
                    <h2 class="mb-4 section-heading"><strong> Norma Romero Cortés </strong> Notario Titular </h2>
                    {{--                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, explicabo iste a labore id est quas, doloremque veritatis! Provident odit pariatur dolorem quisquam, voluptatibus voluptates optio accusamus, vel quasi quidem!</p>--}}

                </div>

                <div class="col-lg-7 text-center">
                    <div class="row mb-5 mb-lg-0">
                        <div class="col-12">
                            <img src="{{asset('images/maestra_norma.png')}}" alt="Image" class="img-fluid"
                                 style="width: 70%">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row align-items-center mt-2">
                <div class="col-lg-7 text-center">
                    <div class="row mb-5 mb-lg-0">
                        <div class="col-12">
                            <img src="{{asset('images/maestra_norma_cortes.png')}}" alt="Image" class="img-fluid"
                                 style="width: 70%">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ml-auto order-lg-1">
                    <h2 class="mb-4 section-heading"><strong> Norma Alma Cortés Caballero </strong> Notario auxiliar
                    </h2>
                    {{--                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, explicabo iste a labore id est quas, doloremque veritatis! Provident odit pariatur dolorem quisquam, voluptatibus voluptates optio accusamus, vel quasi quidem!</p>--}}

                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <div class="mb-5 text-center">
                <h2 class="section-heading"><strong class="text-black"> Misión </strong></h2>
            </div>

            <p>
                para que la población reciba un servicio Notarial pronto, expedito, 
                Garantizar la eficaz prestación del servicio público del notariado, 
                profesional y eficiente con imparcialidad a través de cumplir siguientes 
                principios y valores: Seguridad jurídica, Certeza Jurídica, Estabilidad, 
                Confiabilidad, Rogación, Imparcialidad, Transparencia, Honestidad, Secrecía, 
                Profesionalismo, Independencia, Obligatoriedad del servicio, Responsabilidad e Inmediación. 
            </p>

            <div class="mb-5 text-center mt-5">
                <h2 class="section-heading"><strong class="text-black"> Visión </strong></h2>
            </div>

            <p>
                Ser la Notaría Pública de referencia en Puebla, destacándonos por la excelencia en la 
                prestación del servicio público del notariado, nuestro compromiso es ofrecer un servicio  eficiente, 
                transparente y accesible asegurando la integridad y seguridad en cada acto notarial, 
                así como crear las medidas necesarias para facilitar la actividad notarial a fin de que la 
                prestación del servicio se desarrolle en total libertad y expeditez para la persona 
                usuario del servicio notarial, cumpliendo con el derecho al servicio del bien y la paz en el
                estado de Puebla (Referencia artículo 4 ley del notariado).
                

            </p>

            <div class="mb-5 text-center mt-5">
                <h2 class="section-heading"><strong class="text-black"> Política de calidad </strong></h2>
            </div>

            <p>
               La Notaría Pública Número 4, con sede en la ciudad de puebla, México, se compromete
               a brindar una eficaz prestación del servicio público del notariado, y que sean prestados con profesionalismo y ética,
               buscando la satisfación de los clientes  y la mejora continua de nuestro Sistema de Gestión de la Calidad.
               Para ello, la notaría de compromete a los siguientes puntos:

               <ul>
                   <li>Estandarización de los formatos de Actas Notariales y Escrituras</li>
                   <li>Estandarización de los criterios de asesoría</li>
                   <li>Mejora de instalaciones</li>
                   <li>Capacitaciones de personal nuevo</li>
                   <li>Implementación de un sistema computacional a medida que logre modelar 
                    todos los procesos de la notaría</li>
                </ul>

            </p>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                {{--                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">--}}
                {{--                            <img src="{{mix('resources/images/norma.png')}}" alt="Image" class="img-fluid">--}}
                {{--                        </div>--}}
                <div class="col-md-12 col-lg-6">
                    <h2 class="mb-6 section-heading">Usted tiene a su disposición <strong>Soluciones Notariales</strong>
                    </h2>
                    <p>Las empresas de hoy se desenvuelven en un entorno
                        competitivo y globalizado, por ello es fundamental
                        tener la certeza de que sus actividades cotidianas
                        cuentan con el respaldo de un marco legal.</p>
                    </ul>
                </div>
                <div class="col-md-12 col-lg-6">
                    @if($alert)
                        <div class="alert alert-warning" role="alert">
                            <strong>Gracias por ponerte en contacto con nosotros,</strong> nuestro personal se pondrá en
                            contacto con usted lo antes posible.
                        </div>
                    @endif
                    <form method="POST" action="{{route('cite-create')}}" class="book-form">
                        @csrf
                        <h3>Agenda tu cita</h3>
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
                                    <span class="icon icon-date_range"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" value="Envia y nos pondremos en contacto contigo"
                                       class="btn btn-primary btn-block py-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
