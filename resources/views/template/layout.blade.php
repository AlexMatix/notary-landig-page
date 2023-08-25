<!doctype html>
<html lang="es">

<head>
    <title>Notaría 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>

<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    {{--    TODO  poner el logo de la notaría y cambiar los menus a español--}}
    <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center position-relative">

                <div class="col">
                    <div class="site-logo">
                        <a href="{{route('index')}}"><img class="image-logo" src="{{asset('images/logo.png')}}"
                                                  alt="Notaria"></a>
                    </div>
                </div>

                <div class="col-9 text-right text-lg-left">

                    <span class="d-inline-block d-lg-none"><a href="#"
                                                              class=" site-menu-toggle js-menu-toggle py-5 "><span
                                class="icon-menu h3 text-black"></span></a></span>

                    <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto ">
                            <li><a href="{{route('index')}}" class="nav-link primary-color-text">Inicio</a></li>
                            {{--                            <li class="has-children">--}}
                            {{--                                <a href="practice-areas.html" class="nav-link">Practice Areas</a>--}}
                            {{--                                <ul class="dropdown">--}}
                            {{--                                    <li><a href="#">Bankruptcy Law</a></li>--}}
                            {{--                                    <li><a href="#">Business Law</a></li>--}}
                            {{--                                    <li><a href="#">Civil Rights Law</a></li>--}}
                            {{--                                    <li><a href="#">Criminal Law</a></li>--}}
                            {{--                                    <li><a href="#">Immigration Law</a></li>--}}
                            {{--                                    <li><a href="#">Family Law</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </li>--}}
                            <li><a href="{{route('services')}}" class="nav-link primary-color-text">Servicios</a></li>
{{--                            <li><a href="{{route('us')}}" class="nav-link primary-color-text">¿Quienes somos?</a></li>--}}
                            <li><a href="{{route('contact')}}" class="nav-link primary-color-text">Contactanos</a></li>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>

    </header>

    @yield('front-page')

    @yield('content')

    <footer class="site-footer" style="background-image: url({{asset('images/hero_bg_footer.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="footer-heading mb-4">Sobre nosotros</h2>
                    <p align="justify">En la Notaría Pública No. 4 ponemos a su disposición
                        diferentes servicios para proteger sus tratos con
                        clientes, proveedores, empleados y prestadores de
                        servicio. Hemos capacitado a un talentoso grupo de
                        abogados para atender las necesidades de las
                        empresas actuales. Nuestro servicio es personalizado
                        y flexible de acuerdo a sus circunstancias. </p>
                    <ul class="list-unstyled social">
                        <li><a href="https://www.facebook.com/Notaria-Pública-Número-4-186640313029576/" target="_blank"><span class="icon-facebook"></span></a></li>
{{--                        <li><a href="#"><span class="icon-instagram"></span></a></li>--}}
{{--                        <li><a href="#"><span class="icon-twitter"></span></a></li>--}}
{{--                        <li><a href="#"><span class="icon-linkedin"></span></a></li>--}}
                    </ul>
                </div>
                <div class="col-lg-5 ml-auto">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="footer-heading mb-4">Enlaces de interes</h2>
                            <ul class="list-unstyled">
{{--                                <li><a href="#">Nosotros</a></li>--}}
{{--                                <li><a href="#">Testimonios</a></li>--}}
{{--                                <li><a href="#">Terminos de uso</a></li>--}}
{{--                                <li><a href="#">Privacidad</a></li>--}}
                                <li><a href="{{route('contact')}}">Contactanos</a></li>
                            </ul>
                        </div>
{{--                        <div class="col-lg-3">--}}
{{--                            <h2 class="footer-heading mb-4">Resources</h2>--}}
{{--                            <ul class="list-unstyled">--}}
{{--                                <li><a href="#">About Us</a></li>--}}
{{--                                <li><a href="#">Testimonials</a></li>--}}
{{--                                <li><a href="#">Terms of Service</a></li>--}}
{{--                                <li><a href="#">Privacy</a></li>--}}
{{--                                <li><a href="#">Contact Us</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <h2 class="footer-heading mb-4">Support</h2>--}}
{{--                            <ul class="list-unstyled">--}}
{{--                                <li><a href="#">About Us</a></li>--}}
{{--                                <li><a href="#">Testimonials</a></li>--}}
{{--                                <li><a href="#">Terms of Service</a></li>--}}
{{--                                <li><a href="#">Privacy</a></li>--}}
{{--                                <li><a href="#">Contact Us</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <h2 class="footer-heading mb-4">Company</h2>--}}
{{--                            <ul class="list-unstyled">--}}
{{--                                <li><a href="#">About Us</a></li>--}}
{{--                                <li><a href="#">Testimonials</a></li>--}}
{{--                                <li><a href="#">Terms of Service</a></li>--}}
{{--                                <li><a href="#">Privacy</a></li>--}}
{{--                                <li><a href="#">Contact Us</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
{{--            <div class="row pt-5 mt-5 text-center">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="border-top pt-5">--}}
{{--                        <p>--}}
{{--                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
{{--                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>--}}
{{--                            All rights reserved | This template is made with <i class="icon-heart text-danger"--}}
{{--                                                                                aria-hidden="true"></i> by <a--}}
{{--                                href="https://colorlib.com" target="_blank">Colorlib</a>--}}
{{--                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </footer>

</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>

</body>

</html>

