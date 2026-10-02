@extends('template.portal-auth')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="form-header text-center">
    <h2 class="welcome-text">Inicia sesión</h2>
    <p class="welcome-subtext">Ingresa tus credenciales para acceder a tus trámites</p>
</div>

@if($errors->any())
    <div class="modern-error-banner">
        <span class="material-icons">error_outline</span>
        <div>
            @foreach($errors->all() as $error)
                <span class="d-block">{{ $error }}</span>
            @endforeach
        </div>
    </div>
@endif

<form action="{{ route('login') }}" method="POST" class="auth-form">
    @csrf
    
    <div class="form-group mb-4">
        <label for="email" class="custom-label">Correo Electrónico</label>
        <div class="custom-input-wrapper">
            <span class="material-icons">mail_outline</span>
            <input type="email" class="custom-input" id="email" name="email" value="{{ old('email') }}" placeholder="tu@correo.com" required autofocus>
        </div>
    </div>

    <div class="form-group mb-4">
        <label for="password" class="custom-label">Contraseña</label>
        <div class="custom-input-wrapper">
            <span class="material-icons">lock_outline</span>
            <input type="password" class="custom-input" id="password" name="password" placeholder="••••••••" required>
        </div>
    </div>

    <button type="submit" class="submit-button mt-4">
        Iniciar Sesión
    </button>
    
    <div class="mt-4 text-center">
        <p style="color: var(--neutral-slate-600); font-size: 0.875rem;">
            ¿No tienes cuenta? <a href="{{ route('register') }}" style="color: var(--accent-gold); font-weight: 600; text-decoration: none;">Regístrate aquí</a>
        </p>
    </div>
</form>
@endsection
