@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{asset('images/portada1.jpg')}});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12" style="margin-top: 120px; position: relative; z-index: 2;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-10 intro text-center text-lg-left">
                            <h1 class="text-white name-notary mb-4"><strong>Notaría Pública Número 4 del Distrito Judicial de Puebla con Residencia en la Ciudad Puebla<br> </strong> Buzón de Quejas y Sugerencias</h1>
                            <p class="lead text-white mb-5" style="font-weight: 300;">Garantizar un alto nivel de resguardo y calidad en nuestros servicios es nuestra máxima prioridad. Este espacio confidencial nos permite escuchar sus observaciones y así implementar la mejora continua en todos los niveles operativos.</p>
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

            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5">
                    
                    @if($alert)
                        <div class="alert alert-warning" role="alert">
                            <strong>Gracias por sus comentarios.</strong> Revisaremos a profundidad su inquietud y, en caso de haber proporcionado sus datos de contacto, nos comunicaremos con usted a la brevedad.
                        </div>
                    @endif

                    <form action="{{route('mailbox-create')}}" method="post" class="executive-card">
                        <h3 class="mb-4 text-center section-heading">Escríbanos su reporte</h3>
                        <p class="text-center text-muted mb-5">Usted decide si desea mantener el anonimato o proporcionar sus datos de contacto para permitirnos darle seguimiento personalizado.</p>
                        
                        <div class="form-group row">
                            @csrf
                            <div class="col-md-12 mb-4 mb-lg-0">
                                <input name="name" type="text" class="form-control" placeholder="Nombre completo (Opcional)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input name="email" type="text" class="form-control"
                                       placeholder="Correo electrónico (Opcional)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input name="phone" type="number" class="form-control"
                                       placeholder="Número celular (Opcional)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input required name="affair" type="text" class="form-control" placeholder="Asunto del reporte">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea required name="complaint" id="" class="form-control"
                                          placeholder="Detalle estructuradamente sus comentarios o queja" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-3 text-center">
                                <input type="submit" class="btn btn-block btn-primary px-5 py-3"
                                       value="Enviar Reporte">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
