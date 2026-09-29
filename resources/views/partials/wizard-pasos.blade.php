{{--
    Indicador de pasos del wizard de expediente.

    Vive DENTRO de cada panel, con su paso ya marcado, en lugar de una sola vez
    en la cabecera. Así showStep() del bundle lo revela junto con el panel
    correcto y no hace falta una sola línea de JavaScript nueva para
    sincronizarlo.

    Uso: @include('partials.wizard-pasos', ['actual' => 1])
--}}
@php $pasos = ['Identidad', 'Sus datos', 'Documentos']; @endphp
<ol class="n4-pasos-wizard" aria-label="Progreso de la vinculación">
    @foreach($pasos as $i => $etiqueta)
        @php $n = $i + 1; @endphp
        <li class="n4-pasos-wizard__item @if($n < $actual) is-done @elseif($n === $actual) is-current @endif"
            @if($n === $actual) aria-current="step" @endif>
            <span class="n4-pasos-wizard__num" aria-hidden="true">{{ $n }}</span>
            <span class="n4-pasos-wizard__txt">{{ $etiqueta }}</span>
            <span class="sr-only">
                @if($n < $actual) (completado) @elseif($n === $actual) (paso actual) @else (pendiente) @endif
            </span>
        </li>
    @endforeach
</ol>
