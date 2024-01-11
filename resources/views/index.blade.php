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
                    <h3 class="mb-4 section-heading"> <strong> Norma Romero Cortés </strong> Notario Titular </h3>
                    {{--                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, explicabo iste a labore id est quas, doloremque veritatis! Provident odit pariatur dolorem quisquam, voluptatibus voluptates optio accusamus, vel quasi quidem!</p>--}}

                </div>

                <div class="col-lg-7 text-center">
                    <div class="row mb-5 mb-lg-0">
                        <div class="col-12">
                            <img src="{{asset('images/maestra_norma.png')}}"  alt="Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row align-items-center mt-2">
                <div class="col-lg-7 text-center">
                    <div class="row mb-5 mb-lg-0">
                        <div class="col-12">
                            <img src="images/atty_1.jpg" alt="Image" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ml-auto order-lg-1">
                    <h3 class="mb-4 section-heading"> <strong> Norma Alma Cortés Caballero </strong> Notario auxiliar </h3>
{{--                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, explicabo iste a labore id est quas, doloremque veritatis! Provident odit pariatur dolorem quisquam, voluptatibus voluptates optio accusamus, vel quasi quidem!</p>--}}

                </div>
            </div>
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

    <div class="site-section bg-light">
        <div class="container">
            @foreach($services as $category => $service)
                <div class="mb-5 text-center">
                    <h2 class="section-heading"><strong class="text-black">Servicios de </strong> {{$category}}</h2>
                </div>
                <div class="row">
                    @foreach($service as $name => $requirements)
                        <div class="col-lg-4 mb-5">

                            <div class="practicing">
                                <div class="practicing-inner">
                                    <div class="wrap-icon">
                                        <span class="flaticon-shield"></span>
                                    </div>
                                    <h3>{{$name}}</h3>
                                    <button class="btn btn-sm" onclick="viewModalRequirements('{{$name}}', '{{json_encode($requirements)}}')">Ver requisitos</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="requirements" tabindex="-1" role="dialog" aria-labelledby="ScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ScrollableTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="requirements_body">

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script type="application/javascript">
        function viewModalRequirements(name, requirements) {
            $('#requirements').modal('show');
            var title = document.getElementById('ScrollableTitle');
            title.innerHTML = name;

            var body = document.getElementById('requirements_body');

            var text_body = '';
            requirements = JSON.parse(requirements);

            for (var tTitle in requirements){
                text_body = text_body + '<strong>' + tTitle + '</strong>';
                text_body = text_body + '<ol>';
                for (var tbody in requirements[tTitle]){
                    text_body = text_body + '<li>' + requirements[tTitle][tbody] + '</li>';
                }
                text_body = text_body + '</ol>';
            }

            body.innerHTML = text_body;
        }
    </script>
@endsection
