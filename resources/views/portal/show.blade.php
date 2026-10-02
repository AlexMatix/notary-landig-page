@extends('template.portal-layout')

@php
    $proc = collect($procedure);
    $expediente = $proc->get('expediente') ?? $proc->get('name') ?? 'S/N';
    $status = $proc->get('status') ?? 'En proceso';
    $operation = ($proc->get('operations') && count($proc->get('operations')) > 0) ? $proc->get('operations')[0]['name'] : 'Operación General';
    
    $gestiones = collect($proc->get('processing_income') ?? []);
    $documentos = collect($proc->get('documents') ?? []);
    $testimonios = collect($proc->get('testimonies') ?? []);
    $instrument = $proc->get('instrument') ?? 'S/N';
    $grantors = collect($proc->get('grantors') ?? []);

    $faseActual = 1;
    if ($documentos->count() > 0) $faseActual = 2;
    if ($proc->get('date')) $faseActual = 3;
    if ($gestiones->count() > 0 && $proc->get('date')) $faseActual = 4;
    
    $testimonioEntregado = false;
    foreach($testimonios as $test) {
        if (in_array(collect($test)->get('status'), [3, 4, 'ACCEPTED', 'ENTREGADO'])) {
            $testimonioEntregado = true;
            $faseActual = 5;
            break;
        }
    }

    $badgeClass = 'o2c-badge--neutral';
    if(stripos($status, 'complet') !== false || stripos($status, 'firmad') !== false || stripos($status, 'finaliz') !== false || stripos($status, 'aceptad') !== false) {
        $badgeClass = 'o2c-badge--verified';
    } elseif(stripos($status, 'proceso') !== false || stripos($status, 'trámite') !== false || stripos($status, 'gestión') !== false || stripos($status, 'gestiones') !== false) {
        $badgeClass = 'o2c-badge--pending';
    } elseif(stripos($status, 'detenid') !== false || stripos($status, 'cancelad') !== false || stripos($status, 'rechazad') !== false) {
        $badgeClass = 'o2c-badge--blocker';
    }
@endphp

@section('title', 'Expediente ' . $expediente)

@section('breadcrumb')
    <span class="material-icons" style="font-size: 16px;">home</span>
    <a href="{{ route('portal') }}">Inicio</a>
    <span class="material-icons" style="font-size: 16px;">chevron_right</span>
    <a href="{{ route('portal') }}">Mis Trámites</a>
    <span class="material-icons" style="font-size: 16px;">chevron_right</span>
    <span>Expediente #{{ $expediente }}</span>
@endsection

@section('content')
<div style="margin-bottom: 2rem;">
    <a href="{{ route('portal') }}" class="portal-action-link" style="display: inline-flex; align-items: center; gap: 0.25rem;">
        <span class="material-icons" style="font-size: 18px;">arrow_back</span>
        Volver a Mis Trámites
    </a>
</div>

<!-- Resumen Legal Banner -->
<div style="background-color: var(--neutral-white); border: 1px solid var(--neutral-slate-200); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(15, 23, 42, 0.03); margin-bottom: 2rem; border-left: 4px solid var(--notary-navy);">
    <div class="d-flex justify-content-between align-items-start" style="flex-wrap: wrap; gap: 1rem;">
        <div>
            <h1 style="font-size: 1.75rem; font-weight: 700; color: var(--notary-navy); margin-bottom: 0.5rem;">{{ $operation }}</h1>
            <div style="display: flex; gap: 1.5rem; color: var(--neutral-slate-500); font-size: 0.875rem;">
                <span style="display: flex; align-items: center; gap: 0.25rem;"><span class="material-icons" style="font-size: 16px;">folder_open</span> Expediente: #{{ $expediente }}</span>
                <span style="display: flex; align-items: center; gap: 0.25rem;"><span class="material-icons" style="font-size: 16px;">gavel</span> Instrumento: #{{ $instrument }}</span>
                @if($proc->get('date'))
                <span style="display: flex; align-items: center; gap: 0.25rem;"><span class="material-icons" style="font-size: 16px;">event</span> Fecha Firma: {{ \Carbon\Carbon::parse($proc->get('date'))->format('d/m/Y') }}</span>
                @endif
            </div>
        </div>
        <div>
            <span class="o2c-badge {{ $badgeClass }}">{{ $status }}</span>
        </div>
    </div>
</div>

<!-- Stepper de Progreso -->
<div style="background-color: var(--neutral-white); border: 1px solid var(--neutral-slate-200); border-radius: 12px; padding: 2rem; margin-bottom: 2rem;">
    <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--notary-navy); margin-bottom: 2.5rem;">Progreso General</h3>
    
    <div style="overflow-x: auto; padding-bottom: 1rem;">
        <div style="position: relative; display: flex; justify-content: space-between; text-align: center; min-width: 600px;">
            <!-- Conector base -->
            <div style="position: absolute; top: 16px; left: 10%; right: 10%; height: 2px; background-color: var(--neutral-slate-200); z-index: 1;"></div>
            <!-- Conector activo -->
            <div style="position: absolute; top: 16px; left: 10%; width: {{ ($faseActual - 1) * 20 }}%; height: 2px; background-color: var(--success-green); z-index: 1; transition: width 0.5s ease;"></div>

            @php
                $fases = ['Integración Documental', 'Elaboración de Proyecto', 'Firma de Escritura', 'Gestiones Registrales', 'Testimonio Final'];
            @endphp

            @foreach($fases as $index => $nombre)
                @php
                    $isCompleted = $faseActual > ($index + 1);
                    $isCurrent = $faseActual == ($index + 1);
                    $isFuture = $faseActual < ($index + 1);
                    
                    $bgColor = $isCompleted ? 'var(--success-green)' : ($isCurrent ? 'var(--accent-gold)' : 'var(--neutral-white)');
                    $borderColor = $isCompleted ? 'var(--success-green)' : ($isCurrent ? 'var(--accent-gold)' : 'var(--neutral-slate-300)');
                    $textColor = ($isCompleted || $isCurrent) ? 'var(--neutral-white)' : 'var(--neutral-slate-400)';
                    $labelColor = ($isCompleted || $isCurrent) ? 'var(--neutral-slate-900)' : 'var(--neutral-slate-400)';
                    $fontWeight = ($isCompleted || $isCurrent) ? '600' : '400';
                @endphp
                <div style="z-index: 2; width: 20%; position: relative;">
                    <div style="width: 32px; height: 32px; border-radius: 50%; background-color: {{ $bgColor }}; border: 2px solid {{ $borderColor }}; color: {{ $textColor }}; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-weight: 600; font-size: 0.875rem; box-shadow: 0 0 0 4px var(--neutral-white); transition: all 0.3s ease;">
                        @if($isCompleted)
                            <span class="material-icons" style="font-size: 16px;">check</span>
                        @else
                            {{ $index + 1 }}
                        @endif
                    </div>
                    <div style="margin-top: 1rem; font-size: 0.875rem; color: {{ $labelColor }}; font-weight: {{ $fontWeight }}; line-height: 1.2; padding: 0 5px;">{{ $nombre }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem; margin: 0;">
    <!-- Checklist Documental -->
    <div style="flex: 1; min-width: 300px; background-color: var(--neutral-white); border: 1px solid var(--neutral-slate-200); border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(15, 23, 42, 0.03);">
        <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--notary-navy); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <span class="material-icons" style="color: var(--neutral-slate-400);">checklist</span>
            Checklist Documental
        </h3>
        
        @if($documentos->count() > 0)
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                @foreach($documentos as $doc)
                    @php
                        $hasFile = collect($doc)->get('pivot') && collect(collect($doc)->get('pivot'))->get('file');
                        $origin = collect(collect($doc)->get('pivot'))->get('origin');
                        $scanQualityRaw = collect(collect($doc)->get('pivot'))->get('scan_quality');
                        
                        $scanQualityObj = is_string($scanQualityRaw) ? json_decode($scanQualityRaw, true) : $scanQualityRaw;
                        $qualityString = null;
                        if (is_array($scanQualityObj)) {
                            $type = $scanQualityObj['document_type_estimation'] ?? null;
                            $failures = $scanQualityObj['page_quality_failures'] ?? 0;
                            $parts = [];
                            if ($type) $parts[] = $type;
                            $parts[] = $failures > 0 ? "Obs. de calidad: $failures" : "Óptimo";
                            $qualityString = implode(' | ', $parts);
                        } elseif ($scanQualityRaw) {
                            $qualityString = $scanQualityRaw;
                        }
                    @endphp
                    <div style="display: flex; flex-direction: column; padding-bottom: 1rem; border-bottom: 1px solid var(--neutral-slate-100);">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.25rem;">
                            <span style="font-size: 0.875rem; color: var(--neutral-slate-700); font-weight: 500;">{{ collect($doc)->get('name') }}</span>
                            @if($hasFile)
                                <div style="display: flex; gap: 0.5rem; align-items: center;">
                                    <span class="o2c-badge o2c-badge--verified" style="font-size: 0.75rem; padding: 0.25rem 0.65rem;">Entregado</span>
                                    @if(collect($doc)->get('url'))
                                        <button type="button" onclick="openDocumentModal('{{ collect($doc)->get('url') }}', '{{ collect($doc)->get('name') }}')" style="font-size: 0.75rem; background-color: var(--notary-navy); color: var(--neutral-white); padding: 0.25rem 0.65rem; border-radius: 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.25rem; font-weight: 500; transition: background-color 0.2s ease; border: none; cursor: pointer;" onmouseover="this.style.backgroundColor='var(--notary-navy-dark)'" onmouseout="this.style.backgroundColor='var(--notary-navy)'">
                                            <span class="material-icons" style="font-size: 12px;">visibility</span> Ver
                                        </button>
                                    @endif
                                </div>
                            @else
                                <span class="o2c-badge o2c-badge--blocker" style="font-size: 0.75rem; padding: 0.25rem 0.65rem;">Faltante</span>
                            @endif
                        </div>
                        @if($hasFile && $qualityString)
                            <div style="display: flex; gap: 0.5rem; align-items: center; margin-top: 0.25rem;">
                                @if($qualityString)
                                    <span style="font-size: 0.7rem; background-color: var(--neutral-slate-50); color: var(--neutral-slate-600); padding: 0.125rem 0.375rem; border-radius: 4px; border: 1px solid var(--neutral-slate-200); display: flex; align-items: center; gap: 0.125rem;"><span class="material-icons" style="font-size: 10px;">high_quality</span> {{ $qualityString }}</span>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 2rem 0; color: var(--neutral-slate-500); font-size: 0.875rem;">
                No hay documentos registrados para este expediente.
            </div>
        @endif
    </div>

    <!-- Otorgantes -->
    <div style="flex: 1; min-width: 300px; background-color: var(--neutral-white); border: 1px solid var(--neutral-slate-200); border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(15, 23, 42, 0.03);">
        <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--notary-navy); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <span class="material-icons" style="color: var(--neutral-slate-400);">group</span>
            Partes (Otorgantes)
        </h3>
        
        @if($grantors->count() > 0)
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                @foreach($grantors as $grantor)
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem; padding-bottom: 1rem; border-bottom: 1px solid var(--neutral-slate-100);">
                        <div style="width: 32px; height: 32px; min-width: 32px; background-color: var(--neutral-slate-50); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--notary-navy); font-weight: 600; font-size: 0.875rem; border: 1px solid var(--neutral-slate-200);">
                            {{ strtoupper(substr(collect($grantor)->get('name'), 0, 1)) }}
                        </div>
                        <div>
                            <span style="font-size: 0.875rem; color: var(--neutral-slate-900); font-weight: 600; display: block; line-height: 1.2;">{{ collect($grantor)->get('name') }} {{ collect($grantor)->get('last_name') }} {{ collect($grantor)->get('mother_last_name') }}</span>
                            <span style="font-size: 0.75rem; color: var(--neutral-slate-500); display: block; margin-top: 0.25rem;">RFC: <span style="font-family: monospace;">{{ collect($grantor)->get('rfc') ?? 'No registrado' }}</span></span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 2rem 0; color: var(--neutral-slate-500); font-size: 0.875rem;">
                No hay partes registradas para este expediente.
            </div>
        @endif
    </div>

    <!-- Gestiones -->
    <div style="flex: 1; min-width: 300px; background-color: var(--neutral-white); border: 1px solid var(--neutral-slate-200); border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(15, 23, 42, 0.03);">
        <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--notary-navy); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <span class="material-icons" style="color: var(--neutral-slate-400);">account_balance</span>
            Gestiones y Avisos
        </h3>

        @if($gestiones->count() > 0)
            <div style="position: relative; padding-left: 1rem; border-left: 2px solid var(--neutral-slate-200); margin-left: 0.5rem;">
                @foreach($gestiones as $gestion)
                    <div style="position: relative; margin-bottom: 1.5rem;">
                        <div style="position: absolute; left: -21px; top: 4px; width: 10px; height: 10px; border-radius: 50%; background-color: var(--accent-gold); border: 2px solid var(--neutral-white); box-shadow: 0 0 0 1px var(--neutral-slate-200);"></div>
                        <div>
                            <h4 style="font-size: 0.875rem; font-weight: 600; color: var(--neutral-slate-900); margin-bottom: 0.25rem;">{{ collect($gestion)->get('name') }}</h4>
                            <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.75rem;">
                                <span style="color: var(--neutral-slate-500);">{{ collect($gestion)->get('status') }}</span>
                                @if(collect($gestion)->get('date'))
                                    <span style="color: var(--neutral-slate-300);">|</span>
                                    <span style="color: var(--neutral-slate-500);">{{ \Carbon\Carbon::parse(collect($gestion)->get('date'))->format('d/m/Y') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 2rem 0; color: var(--neutral-slate-500); font-size: 0.875rem;">
                Aún no hay gestiones registradas para este expediente.
            </div>
        @endif
    </div>

    <!-- Testimonio -->
    <div style="flex: 1; min-width: 300px; background-color: var(--neutral-white); border: 1px solid var(--neutral-slate-200); border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(15, 23, 42, 0.03);">
        <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--notary-navy); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <span class="material-icons" style="color: var(--neutral-slate-400);">verified</span>
            Estatus del Testimonio
        </h3>
        
        <div style="margin-bottom: 1.5rem;">
            <span style="display: block; font-size: 0.75rem; color: var(--neutral-slate-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Fecha de Firma Legal</span>
            @if($proc->get('date'))
                <strong style="font-size: 1rem; color: var(--neutral-slate-900); text-transform: capitalize;">{{ \Carbon\Carbon::parse($proc->get('date'))->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}</strong>
            @else
                <strong style="font-size: 1rem; color: var(--neutral-slate-400);">No programada aún</strong>
            @endif
        </div>

        <div>
            <span style="display: block; font-size: 0.75rem; color: var(--neutral-slate-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Disponibilidad de Entrega</span>
            @if($testimonioEntregado)
                <div style="background-color: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 8px; padding: 1rem; display: flex; align-items: flex-start; gap: 0.75rem;">
                    <span class="material-icons" style="color: var(--success-green); font-size: 20px;">task_alt</span>
                    <div>
                        <strong style="color: var(--neutral-slate-900); font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">¡Testimonio Disponible!</strong>
                        <span style="color: var(--neutral-slate-600); font-size: 0.875rem;">Su testimonio está finalizado o ya fue entregado. Si no lo tiene, puede pasar a recogerlo.</span>
                    </div>
                </div>
            @else
                <div style="background-color: var(--neutral-slate-50); border: 1px solid var(--neutral-slate-200); border-radius: 8px; padding: 1rem; display: flex; align-items: flex-start; gap: 0.75rem;">
                    <span class="material-icons" style="color: var(--neutral-slate-400); font-size: 20px;">hourglass_empty</span>
                    <div>
                        <strong style="color: var(--neutral-slate-900); font-size: 0.875rem; display: block; margin-bottom: 0.25rem;">En proceso de elaboración</strong>
                        <span style="color: var(--neutral-slate-600); font-size: 0.875rem;">El testimonio aún no ha sido concluido. Se le notificará al finalizar.</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Document Modal -->
<div id="documentModal" style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(15, 23, 42, 0.7); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(4px);">
  <div style="background-color: var(--neutral-white); width: 90%; max-width: 1000px; height: 90vh; border-radius: 16px; overflow: hidden; display: flex; flex-direction: column; box-shadow: 0 20px 40px rgba(0,0,0,0.3); animation: modalIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
    <div style="background-color: var(--notary-navy); padding: 1.25rem 1.5rem; display: flex; justify-content: space-between; align-items: center;">
      <h5 style="color: var(--neutral-white); margin: 0; font-size: 1.125rem; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
          <span class="material-icons" style="font-size: 20px;">description</span> 
          <span id="documentModalTitle">Visor de Documento</span>
      </h5>
      <button type="button" onclick="closeDocumentModal()" style="background: none; border: none; color: var(--neutral-white); opacity: 0.8; cursor: pointer; padding: 0.25rem; display: flex; align-items: center; justify-content: center; transition: opacity 0.2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
        <span class="material-icons" style="font-size: 24px;">close</span>
      </button>
    </div>
    <div style="flex: 1; position: relative; background-color: #f8f9fa;">
      <!-- Loading Spinner -->
      <div id="documentLoading" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: flex; flex-direction: column; align-items: center; gap: 1rem; color: var(--neutral-slate-400);">
          <span class="material-icons" style="font-size: 48px; animation: spin 2s linear infinite;">autorenew</span>
          <span style="font-size: 0.875rem; font-weight: 500;">Cargando documento...</span>
      </div>
      <iframe id="documentIframe" src="" style="width: 100%; height: 100%; border: none; position: relative; z-index: 1;" onload="document.getElementById('documentLoading').style.display='none'"></iframe>
    </div>
  </div>
</div>

<style>
@keyframes spin { 100% { transform: rotate(360deg); } }
@keyframes modalIn {
  from { opacity: 0; transform: scale(0.95) translateY(10px); }
  to { opacity: 1; transform: scale(1) translateY(0); }
}
body.modal-open { overflow: hidden; }
</style>

<script>
function openDocumentModal(url, title) {
    document.getElementById('documentModalTitle').innerText = title || 'Visor de Documento';
    document.getElementById('documentLoading').style.display = 'flex';
    document.getElementById('documentIframe').src = url;
    document.getElementById('documentModal').style.display = 'flex';
    document.body.classList.add('modal-open');
}

function closeDocumentModal() {
    document.getElementById('documentModal').style.display = 'none';
    document.getElementById('documentIframe').src = '';
    document.body.classList.remove('modal-open');
}

// Close on background click
document.getElementById('documentModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDocumentModal();
    }
});
</script>

@endsection
