@extends('template.portal-auth')

@section('title', 'Crear Cuenta')

@section('content')
<div class="form-header text-center">
    <h2 class="welcome-text">Crear Cuenta</h2>
    <p class="welcome-subtext">Regístrate usando tu RFC asociado a trámites activos</p>
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

<form action="{{ route('register') }}" method="POST" class="auth-form">
    @csrf
    
    <div class="form-group mb-4">
        <label for="name" class="custom-label">Nombre Completo</label>
        <div class="custom-input-wrapper">
            <span class="material-icons">person_outline</span>
            <input type="text" class="custom-input" id="name" name="name" value="{{ old('name') }}" placeholder="Juan Pérez" required autofocus>
        </div>
    </div>

    <div class="form-group mb-4">
        <label for="rfc" class="custom-label">RFC</label>
        <div class="custom-input-wrapper">
            <span class="material-icons">badge</span>
            <input type="text" class="custom-input" id="rfc" name="rfc" value="{{ old('rfc') }}" placeholder="ABCD123456789" required maxlength="13" style="text-transform: uppercase;">
        </div>
        <small style="color: var(--neutral-slate-500); font-size: 0.75rem; margin-top: 0.5rem; display: block;">Asegúrate de capturar el mismo RFC que proporcionaste en la Notaría.</small>
    </div>

    <div class="form-group mb-4">
        <label for="email" class="custom-label">Correo Electrónico</label>
        <div class="custom-input-wrapper">
            <span class="material-icons">mail_outline</span>
            <input type="email" class="custom-input" id="email" name="email" value="{{ old('email') }}" placeholder="tu@correo.com" required>
        </div>
    </div>

    <div class="row" style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
        <div class="form-group" style="flex: 1; margin-bottom: 0;">
            <label for="password" class="custom-label">Contraseña</label>
            <div class="custom-input-wrapper">
                <span class="material-icons">lock_outline</span>
                <input type="password" class="custom-input" id="password" name="password" placeholder="••••••••" required>
            </div>
        </div>

        <div class="form-group" style="flex: 1; margin-bottom: 0;">
            <label for="password_confirmation" class="custom-label">Confirmar Contraseña</label>
            <div class="custom-input-wrapper">
                <span class="material-icons">lock_outline</span>
                <input type="password" class="custom-input" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
            </div>
        </div>
    </div>

    <button type="submit" class="submit-button mt-4">
        Registrarse y Validar
    </button>
    
    <div class="mt-4 text-center">
        <p style="color: var(--neutral-slate-600); font-size: 0.875rem;">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}" style="color: var(--accent-gold); font-weight: 600; text-decoration: none;">Inicia sesión aquí</a>
        </p>
    </div>
</form>
@endsection
