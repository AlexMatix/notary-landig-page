<!doctype html>
<html lang="es">
<head>
    <title>@yield('title', 'Mi Portal') · Notaría Pública No. 4</title>
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
    
    <!-- Header -->
    <header class="portal-header">
        <div class="portal-header-left">
            <a href="{{ route('portal') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Notaría 4" class="portal-logo" />
            </a>
            <div class="portal-brand-text">Portal de Clientes</div>
        </div>
        
        <div class="portal-header-right">
            <a href="{{ route('index') }}" class="portal-header-link d-none d-md-block">Sitio Institucional</a>
            
            <div class="portal-user-chip">
                <div class="portal-user-avatar">
                    <span class="material-icons" style="font-size: 16px;">person</span>
                </div>
                <span>{{ session('rfc') ?? 'Cliente' }}</span>
            </div>
            
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="portal-btn-logout">
                    <span class="material-icons" style="font-size: 18px;">logout</span>
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="portal-main">
        <nav class="portal-breadcrumb">
            @yield('breadcrumb')
        </nav>
        
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="portal-footer">
        © {{ date('Y') }} Notaría Pública No. 4 de Puebla · Plataforma de Servicios Notariales
    </footer>

    @yield('scripts')
</body>
</html>
