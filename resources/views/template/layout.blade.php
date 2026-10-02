<!doctype html>
<html lang="es-MX">

<head>
    <title>@yield('title', 'Notaría Pública Número 4 · Distrito Judicial de Puebla')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="@yield('meta_description', 'Notaría Pública Número 4 del Distrito Judicial de Puebla. Certeza jurídica en compraventas, poderes, actas constitutivas y testamentos. Circuito Juan Pablo II 3117, Las Ánimas, Puebla.')">
    <meta property="og:title" content="@yield('title', 'Notaría Pública Número 4 · Puebla')">
    <meta property="og:description"
        content="@yield('meta_description', 'Notaría Pública Número 4 del Distrito Judicial de Puebla.')">
    <meta property="og:image" content="{{ asset('images/portada1.jpg') }}">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#0d2b3e">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    {{--
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
    {{--
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- Fancybox, Owl Carousel y AOS: ~45 KB de CSS para cuatro librerías cuyo
    JavaScript no existe en public/js/ y devuelve 404. Retirados. --}}
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/quote.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('images/logo.png')}}" rel="icon" type="image/png" />
</head>

<body>

    <a class="n4-skip" href="#contenido">Ir al contenido</a>

    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target" id="menu-movil">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"
                        onclick="document.body.classList.remove('offcanvas-menu'); return false;"
                        style="cursor:pointer;"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body">
                <ul class="site-nav-wrap">
                    <li><a href="{{route('index')}}" class="nav-link">Inicio</a></li>
                    <li><a href="{{route('services_catalog')}}" class="nav-link">Servicios</a></li>
                    <li><a href="{{route('us')}}" class="nav-link">Identidad</a></li>
                    <li><a href="{{route('mailbox_complaints')}}" class="nav-link">Buzón de quejas y sugerencias</a>
                    </li>
                    <li><a href="{{route('contact')}}" class="nav-link">Contactar</a></li>
                    @auth
                        <li><a href="{{route('portal')}}" class="nav-link" style="color: #c5a059;">Mi Portal</a></li>
                    @else
                        <li><a href="{{route('login')}}" class="nav-link" style="color: #c5a059;">Portal de Clientes</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>


        <header class="site-navbar site-navbar-target py-3" role="banner">
            <div class="container">
                <div class="row align-items-center justify-content-between">

                    <!-- Logo Izquierda -->
                    <div class="col-auto">
                        <div class="site-logo">
                            <a href="{{route('index')}}"><img class="image-logo" src="{{asset('images/logo.png')}}"
                                    alt="Notaría 4"
                                    style="height: 65px; width: auto; object-fit: contain; transition: transform 0.3s ease;"></a>
                        </div>
                    </div>

                    <!-- Navegación Centrada -->
                    <div class="col text-center d-none d-lg-block">
                        <nav class="site-navigation position-relative" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav executive-menu">
                                <li><a href="{{route('index')}}" class="nav-link">Inicio</a></li>
                                <li><a href="{{route('services_catalog')}}" class="nav-link">Servicios</a></li>
                                <li><a href="{{route('us')}}" class="nav-link">Identidad</a></li>
                                <li><a href="{{route('mailbox_complaints')}}" class="nav-link">Buzón de quejas y
                                        sugerencias</a></li>
                                @auth
                                    <li><a href="{{route('portal')}}" class="nav-link" style="color: #c5a059;">Mi Portal</a>
                                    </li>
                                @else
                                    <li><a href="{{route('login')}}" class="nav-link" style="color: #c5a059;">Portal de
                                            Clientes</a></li>
                                @endauth
                            </ul>
                        </nav>
                    </div>

                    <!-- Botón Derecha -->
                    <div class="col-auto d-none d-lg-block text-right">
                        <a href="{{route('contact')}}"
                            class="btn btn-executive-nav rounded-pill px-4 py-2">Contactar</a>
                    </div>

                    <!-- Menú Móvil -->
                    <div class="col-auto d-inline-block d-lg-none" style="z-index: 9999; position: relative;">
                        <a href="javascript:void(0)" role="button" aria-expanded="false" aria-controls="menu-movil"
                            aria-label="Abrir el menú"
                            onclick="this.setAttribute('aria-expanded', document.body.classList.toggle('offcanvas-menu')); return false;"
                            class="site-menu-toggle"><span class="icon-menu h3 text-white"
                                aria-hidden="true"></span></a>
                    </div>

                </div>
            </div>
        </header>

        <main id="contenido">
            @yield('front-page')
            @yield('Quote-Info')
            @yield('content')
        </main>

        {{-- La fotografía anterior (hero_bg_footer.jpg) era stock y mostraba un mazo
        de juez — instrumento del poder judicial, no de un fedatario — y no
        tenía velo alguno, así que el párrafo del nombramiento quedaba en
        blanco sobre una libreta color crema. Navy sólido: 12:1 garantizado.
        El texto largo del nombramiento vive ahora en la banda de
        Acreditación del index; aquí queda la ficha corta. --}}
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="footer-heading">Sobre nosotros</h2>
                        <p class="n4-nombramiento">
                            Notaría Pública Número 4 del Distrito Judicial de Puebla, con residencia
                            en la Ciudad de Puebla. En funciones desde 2004. Circuito Juan Pablo II
                            3117, Col. Las Ánimas, Puebla, Puebla.
                        </p>
                        <ul class="list-unstyled social">
                            <li><a href="https://www.facebook.com/Notaria-Pública-Número-4-186640313029576/"
                                    target="_blank" rel="noopener"
                                    aria-label="Notaría Pública Número 4 en Facebook"><span class="icon-facebook"
                                        aria-hidden="true"></span></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5 ml-auto">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="footer-heading">Enlaces de interés</h2>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('mailbox_complaints')}}">Buzón de quejas y sugerencias</a></li>
                                    <li><a href="{{route('us')}}">Identidad institucional</a></li>
                                    <li><a href="{{route('contact')}}">Contacto</a></li>
                                    <li><a href="{{route('privacy')}}">Aviso de privacidad</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="footer-heading">Horario de atención</h2>
                                <p>Lunes a viernes, de 09:00 a 17:00 h.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    {{-- public/js/ no existe: los diez asset('js/...') que había aquí devolvían
    404 en todas las páginas (main.js, AOS, Owl Carousel, Fancybox,
    jquery.sticky, jquery.waypoints, animateNumber, easing, y las copias
    locales de jQuery y Popper). Retirados.

    Lo que sí carga y de lo que sí depende el sitio: jQuery slim, Popper y
    Bootstrap 4 desde CDN, arriba. El wizard de expediente trae su propio
    bundle por @vite en su sección de scripts.

    Ninguna interacción de este sitio depende ya de JavaScript propio: el
    menú móvil usa classList en línea, el catálogo usa collapse y tabs de
    Bootstrap, el campo de fecha es type="date" nativo y las animaciones
    son CSS puro. Si algún día se reponen esos archivos, revisar antes que
    no dupliquen comportamiento que hoy ya funciona sin ellos. --}}

    @yield('scripts')
</body>

</html>