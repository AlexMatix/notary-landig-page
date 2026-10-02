<!doctype html>
<html lang="es">
<head>
    <title>@yield('title', 'Autenticación') · Portal de Clientes Notaría 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/portal.css') }}">
    <link href="{{ asset('images/logo.png') }}" rel="icon" type="image/x-icon" />
</head>
<body class="portal-body">
    
    <div class="split-login-container">
        <!-- Left Side: Branding -->
        <div class="login-branding d-none d-lg-flex">
            <div class="branding-content">
                <img src="{{ asset('images/logo.png') }}" alt="Escudo Notaría 4" class="hero-logo" />
                <h1 class="hero-title">Portal de Seguimiento Notarial</h1>
                <p class="hero-subtitle">Consulta el avance de tus trámites, gestiones y testimonios en tiempo real con certeza y seguridad jurídica.</p>
            </div>
        </div>

        <!-- Right Side: Form -->
        <div class="login-form-wrapper">
            <a href="{{ route('index') }}" class="back-link">
                <span class="material-icons" style="font-size: 18px;">arrow_back</span>
                Volver a la Notaría
            </a>
            
            <div class="login-form-container">
                <div class="mobile-brand d-lg-none text-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mobile-logo" />
                </div>

                @yield('content')
            </div>
        </div>
    </div>

    @yield('scripts')
</body>
</html>
