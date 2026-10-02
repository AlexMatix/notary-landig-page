@extends('template.portal-layout')

@section('title', 'Mis Trámites')

@section('breadcrumb')
    <span class="material-icons" style="font-size: 16px;">home</span>
    <a href="{{ route('portal') }}">Inicio</a>
    <span class="material-icons" style="font-size: 16px;">chevron_right</span>
    <span>Mis Trámites</span>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--notary-navy); margin-bottom: 0.25rem;">Trámites Activos</h2>
        <p style="color: var(--neutral-slate-500); margin-bottom: 0;">Gestiona y consulta el estado de tus operaciones notariales.</p>
    </div>
</div>

@if(isset($error) && $error)
    <div class="modern-error-banner mb-4">
        <span class="material-icons">error_outline</span>
        <span>{{ $error }}</span>
    </div>
@endif

@if(isset($procedures) && count($procedures) > 0)
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(min(100%, 350px), 1fr)); gap: 1.5rem;">
        @foreach($procedures as $procedure)
        @php
            $proc = collect($procedure);
            $expediente = $proc->get('expediente') ?? $proc->get('name') ?? 'S/N';
            $status = $proc->get('status') ?? 'En proceso';
            $operation = ($proc->get('operations') && count($proc->get('operations')) > 0) ? $proc->get('operations')[0]['name'] : 'Operación General';
            
            // Map status to semantic o2c-badge
            $badgeClass = 'o2c-badge--neutral';
            if(stripos($status, 'complet') !== false || stripos($status, 'firmad') !== false || stripos($status, 'finaliz') !== false || stripos($status, 'aceptad') !== false) {
                $badgeClass = 'o2c-badge--verified';
            } elseif(stripos($status, 'proceso') !== false || stripos($status, 'trámite') !== false || stripos($status, 'gestión') !== false || stripos($status, 'gestiones') !== false) {
                $badgeClass = 'o2c-badge--pending';
            } elseif(stripos($status, 'detenid') !== false || stripos($status, 'cancelad') !== false || stripos($status, 'rechazad') !== false) {
                $badgeClass = 'o2c-badge--blocker';
            }
        @endphp
        <div style="background-color: var(--neutral-white); border: 1px solid var(--neutral-slate-200); border-top: 4px solid var(--accent-gold); border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05); display: flex; flex-direction: column;">
            
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                <div>
                    <span style="font-family: monospace; color: var(--neutral-slate-500); font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">Expediente: #{{ $expediente }}</span>
                    <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--notary-navy); margin-bottom: 0;">{{ $operation }}</h3>
                </div>
                <span class="o2c-badge {{ $badgeClass }}">{{ $status }}</span>
            </div>

            @if($proc->get('date'))
            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--neutral-slate-500); font-size: 0.875rem; margin-bottom: 1.5rem;">
                <span class="material-icons" style="font-size: 16px;">calendar_today</span>
                Fecha de inicio: {{ \Carbon\Carbon::parse($proc->get('date'))->format('d/m/Y') }}
            </div>
            @else
            <div style="margin-bottom: 1.5rem;"></div>
            @endif

            <div style="margin-top: auto; padding-top: 1.25rem; border-top: 1px solid var(--neutral-slate-200);">
                <a href="{{ route('portal.show', $proc->get('id')) }}" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; width: 100%; padding: 0.75rem 1rem; box-sizing: border-box; background-color: var(--neutral-slate-50); border: 1px solid var(--neutral-slate-200); border-radius: 8px; color: var(--notary-navy); font-weight: 600; text-decoration: none; transition: background-color 0.2s ease;">
                    Ver Detalle Completo
                    <span class="material-icons" style="font-size: 18px;">arrow_forward</span>
                </a>
            </div>

        </div>
        @endforeach
    </div>
@else
    @if(!isset($error) || !$error)
    <div style="text-align: center; padding: 4rem 2rem; background-color: var(--neutral-white); border: 1px dashed var(--neutral-slate-400); border-radius: 12px;">
        <span class="material-icons" style="font-size: 48px; color: var(--neutral-slate-300); margin-bottom: 1rem;">folder_open</span>
        <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--neutral-slate-900); margin-bottom: 0.5rem;">Sin Trámites Activos</h3>
        <p style="color: var(--neutral-slate-500); margin-bottom: 0;">No encontramos expedientes asociados a tu RFC ({{ session('rfc') ?? 'Cliente' }}). Si crees que se trata de un error, por favor contacta a la Notaría.</p>
    </div>
    @endif
@endif
@endsection
