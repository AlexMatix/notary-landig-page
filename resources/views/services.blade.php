@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{asset('images/portada1.jpg')}});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">

                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-12 intro">
                            <h1 class="text-white"><strong>Notaría Pública Nº4 <br></strong> Catalogo de servicios</h1>
                            <p class="text-white">En la Notaría Pública No. 4 ponemos a su disposición
                                diferentes servicios para proteger sus tratos con
                                clientes, proveedores, empleados y prestadores de
                                servicio. Hemos capacitado a un talentoso grupo de
                                abogados para atender las necesidades de las
                                empresas actuales. Nuestro servicio es personalizado
                                y flexible de acuerdo a sus circunstancias.</p>
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
            @foreach($services as $category => $service)
                <div class="mb-5 text-center">
                    <h2 class="section-heading"><strong class="text-black">Servicios de </strong> {{$category}}</h2>
                    {{--                    <p class="mb-5">En la Notaría Pública No. 4 ponemos a su disposición una gama--}}
                    {{--                        completa de servicios generales, que darán seguridad jurídica a su--}}
                    {{--                        patrimonio.</p>--}}
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

    <div class="site-section bg-light">
        <div class="container">
            <iframe style="width: 100%; height: 800px" src="{{asset('files/services_notary.pdf')}}"></iframe>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="requirements" tabindex="-1" role="dialog" aria-labelledby="ScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ScrollableTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
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
