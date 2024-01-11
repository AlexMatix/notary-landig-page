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
                Garantizar la eficaz prestación del servicio público del notariado, para que la población reciba un
                servicio Notarial pronto, expedito, profesional y eficiente con imparcialidad a través de cumplir
                siguientes principios y valores: Seguridad jurídica, Certeza Jurídica, Estabilidad, Confiabilidad,
                Rogación, Imparcialidad, Transparencia, Honestidad, Secrecía, Profesionalismo, Independencia,
                Obligatoriedad del servicio, Responsabilidad e Inmediación.
            </p>

            <div class="mb-5 text-center mt-5">
                <h2 class="section-heading"><strong class="text-black"> Visión </strong></h2>
            </div>

            <p>
                Ser la notaría pública de referencia en Puebla por el otorgamiento de la eficaz prestación del servicio
                público del notariado.

            </p>

            <div class="mb-5 text-center mt-5">
                <h2 class="section-heading">Política de <strong class="text-black"> Calidad </strong></h2>
            </div>

            <p class="text-justify">
                La Notaría Pública número 4, con sede en la ciudad de Puebla, México, se compromete a brindar una eficaz
                prestación del servicio público del notariado, y que sean prestados con profesionalismo y ética. Para
                ello, la notaría se compromete a:
            <ul>
                <li>
                    Garantizar la seguridad jurídica de sus clientes, prestando un servició público del notariado
                    apegado al Artículo 15 de la Ley del Notariado para el Estado de Puebla.
                </li>

                <li>
                    Ofrecer una eficaz prestación del servicio público del notariado, cumpliendo estrictamente con el
                    Artículo 13 y 14 de la Ley del Notariado para el Estado de Puebla.
                </li>

                <li>
                    En cumplimiento con nuestra labor social la notaría apoyara a casos especiales, de atención
                    ciudadana, o de interés social, así como lo establece el Artículo 16 de la Ley del Notariado para el
                    Estado de Puebla.
                </li>

                <li>
                    Usar tecnologías de forma innovadora para mejorar la calidad de sus servicios y la experiencia de
                    sus clientes como lo establece en los Artículos 81, 82, 174 de la Ley del Notariado para el Estado
                    de Puebla.
                </li>

            </ul>
            </p>
        </div>
    </div>

@endsection
