@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{asset('images/portada1.jpg')}});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">

                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-12 intro">
                            <h1 class="text-white name-notary"><strong> Buzón de quejas de Notaría Pública nº4 </strong>
                            </h1>
                            <p class="text-white">
                                La notaría 4, como institución pública, debe garantizar un alto nivel de calidad en sus
                                servicios y estar comprometida con la satisfacción de sus clientes y usuarios.
                                El buzón de quejas permite a los clientes y usuarios expresar sus quejas y sugerencias
                                de forma anónima y confidencial, lo que me ayuda a identificar áreas de mejora en mis
                                servicios y a mejorar mi comunicación con los clientes y usuarios.
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
                <h3 class="section-heading"><strong class="text-black"> En nuestro buzón de quejas tu decides si
                        es anonima o puedes dejar tu contacto y nombre para que podamos comunicarnos con usted </strong></h3>
            </div>

            @if($alert)
                <div class="alert alert-warning" role="alert">
                    <strong>Gracias por ponerte en contacto con nosotros,</strong> revisaremos a profundidad su inquietud
                    y nos pondremos en contacto con ustedes
                </div>
            @endif

            <form action="{{route('mailbox-create')}}" method="post">
                <div class="form-group row">
                    @csrf
                    <div class="col-md-12 mb-4 mb-lg-0">
                        <input name="name" type="text" class="form-control" placeholder="Nombre completo (No es obligatorio)">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input name="email" type="text" class="form-control"
                               placeholder="Escribe tu email (No es obligatorio)">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input name="phone" type="number" class="form-control"
                               placeholder="Escribe tu celular (No es obligatorio)">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input required name="affair" type="text" class="form-control" placeholder="Asunto">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                                        <textarea required name="complaint" id="" class="form-control"
                                                  placeholder="Escriba aquí su mensaje" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 mr-auto">
                        <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5"
                               value="Enviar Queja">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
