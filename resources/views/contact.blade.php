@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{asset('images/portada1.jpg')}});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12" style="margin-top: 120px; position: relative; z-index: 2;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-8 intro text-center text-lg-left">
                            <h1 class="text-white name-notary mb-4"><strong>Contáctenos</strong> para recibir atención especializada</h1>
                            <p class="lead text-white mb-5" style="font-weight: 300;">En la Notaría Pública Número 4 del Distrito Judicial de Puebla con Residencia en la Ciudad Puebla ponemos nuestra experiencia a su entera disposición. Si desea una cita o asesoría, complete el formulario y uno de nuestros expertos jurídicos se pondrá en contacto con usted en breve para guiarle paso a paso.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            @if($alert)
                <div class="alert alert-warning" role="alert">
                    <strong>Gracias por comunicarse con nosotros.</strong> Uno de nuestros asesores jurídicos analizará su mensaje y se pondrá en contacto con usted a la brevedad.
                </div>
            @endif

            <div class="row">
                <div class="col-lg-7 mb-5">
                    <form action="{{route('contact-create')}}" method="post" class="executive-card">
                        <h3 class="mb-4 text-center section-heading">Envíenos un mensaje</h3>
                        <div class="form-group row">
                            @csrf
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <input required name="name" type="text" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-md-6">
                                <input required name="last_name" type="text" class="form-control"
                                       placeholder="Apellidos">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input required name="email" type="email" class="form-control"
                                       placeholder="Dirección de correo electronico">
                            </div>

                            <div class="col-md-6">
                                <input required name="phone" type="number" class="form-control"
                                       placeholder="Número Celular">
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input required name="affair" type="text" class="form-control" placeholder="Asunto">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                        <textarea required name="message" id="" class="form-control"
                                                  placeholder="Escriba aquí su mensaje" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-3 text-center">
                                <input type="submit" class="btn btn-block btn-primary px-5 py-3"
                                       value="Enviar mensaje">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 ml-auto">
                    {{--                                <h3 class="text-black mb-4">Contact Info</h3>--}}
                    {{--                                <ul class="list-unstyled footer-link">--}}
                    {{--                                    <li class="d-block mb-3">--}}
                    {{--                                        <span class="d-block text-black">Address:</span>--}}
                    {{--                                        <span>34 Street Name, City Name Here, United States</span></li>--}}
                    {{--                                    <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+1 242 4942 290</span></li>--}}
                    {{--                                    <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>--}}
                    {{--                                </ul>--}}
                    <div class="executive-card overflow-hidden p-0 d-flex align-items-center justify-content-center h-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.495240457843!2d-98.23381102512722!3d19.0419513821557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc0b431685abf%3A0xbe6704bb6fb987ef!2sNotaria%20P%C3%BAblica%20No.%204!5e0!3m2!1ses-419!2smx!4v1682451691473!5m2!1ses-419!2smx"
                            style="border:0; width: 100%; height: 100%; min-height: 400px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
