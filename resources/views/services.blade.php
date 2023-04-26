@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{mix('resources/images/portada1.jpg')}});">

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
            <iframe style="width: 100%; height: 800px" src="{{mix('resources/files/services_notary.pdf')}}"></iframe>
        </div>
    </div>
@endsection
