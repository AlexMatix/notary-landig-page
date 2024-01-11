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
                Brindar servicios notariales de excelencia, apegados a la ley y con un compromiso social, para
                garantizar la seguridad jurídica de nuestros clientes, apoyar a los más necesitados y asesorar de
                forma integral en la elaboración de instrumentos jurídicos notariales.
            </p>

            <div class="mb-5 text-center mt-5">
                <h2 class="section-heading"><strong class="text-black"> Visión </strong></h2>
            </div>

            <p>
                Ser la notaría pública líder en Puebla, reconocida por su servicio de excelencia, su compromiso con
                la seguridad jurídica, su responsabilidad social, y su uso innovador de las tecnologías.
            </p>

            <div class="mb-5 text-center mt-5">
                <h2 class="section-heading">Política de <strong class="text-black"> Calidad </strong></h2>
            </div>

            <p class="text-justify">
                La Notaría Pública número 4, con sede en la ciudad de Puebla, México, se compromete a brindar servicios
                notariales de excelencia, que cumplan con los requisitos legales y reglamentarios, y que sean prestados
                con profesionalismo y ética. Para ello, la notaría se compromete a:

            <ul>
                <li>
                    Garantizar la seguridad jurídica de sus clientes, proporcionando servicios que cumplan con los
                    requisitos
                    legales y reglamentarios.
                </li>

                <li>
                    Ofrecer un servicio de excelencia, que sea eficaz y eficiente, y que satisfaga las necesidades y
                    expectativas de sus clientes.
                </li>

                <li>
                    Apoyar a los más necesitados, ofreciendo servicios notariales a precios asequibles o de forma
                    gratuita.
                </li>

                <li>
                    Usar tecnologías de forma innovadora para mejorar la calidad de sus servicios y la experiencia de
                    sus clientes.
                </li>

                <li>
                    La notaría se compromete a realizar un proceso de mejora continua para garantizar que sus servicios
                    cumplan
                    con los requisitos de esta política de calidad.
                </li>
            </ul>
            </p>
        </div>
    </div>

@endsection
