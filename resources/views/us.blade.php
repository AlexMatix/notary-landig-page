@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{asset('images/portada1.jpg')}});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">

                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-12 intro">
                            <h1 class="text-white name-notary"><strong> Notaría Pública nº4 </strong></h1>
                            <p class="text-white"> Todo nuestro personal cuenta con grandes habilidades y capacidades
                                necesarias para dar solución a cualquier problema o circunstancía que se nos presente, a
                                continuación presentamos algunos de nuestros colaboradores
                            </p>
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

            <div class="mb-5 text-center">
                <h2 class="section-heading"><strong class="text-black"> Misión </strong></h2>
            </div>

            <p>
                Garantizar la eficaz prestación del servicio público del notariado, 
                para que la población reciba un servicio Notarial pronto, expedito, 
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
                <h2 class="section-heading">Política de <strong class="text-black"> Calidad </strong></h2>
            </div>

            <p class="text-justify">
                La Notaría Pública número 4, con sede en la ciudad de Puebla, México, 
                se compromete a brindar una eficaz prestación del servicio público del notariado,
                y que sean prestados con profesionalismo y ética. Para ello, la notaría 
                se compromete a los siguientes puntos:
            <ul>
                <li>
                    Estandarización de los formatos de Actas Notariales y Escrituras.
                </li>

                <li>
                    Mejora de instalaciones
                </li>

                <li>
                    Capacitación a personal nuevo
                </li>

                <li>
                    Implementación de un sistema computacional a medida que logre modelar todos los procesos de la notaría.
                </li>

            </ul>
            </p>
        </div>
    </div>

@endsection
