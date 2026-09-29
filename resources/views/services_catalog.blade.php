@extends('template.layout')

@section('title', 'Catálogo de servicios · Notaría Pública Número 4')
@section('meta_description', 'Actos notariales que formaliza la Notaría Pública Número 4 del Distrito Judicial de Puebla y los documentos que debe reunir para cada uno.')

@section('front-page')
    <div class="hero inner-page" style="background-image: url({{ asset('images/portada1.jpg') }});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 intro">
                    <p class="n4-eyebrow">Notaría Pública Número 4 · Distrito Judicial de Puebla</p>
                    <h1 class="name-notary">Catálogo de servicios</h1>
                    <span class="hero-rule" aria-hidden="true"></span>
                    <p class="lead">
                        Instrumentos notariales para formalizar y dar plena validez a sus actos
                        civiles y operaciones corporativas.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-section bg-light">
        <div class="container">

            <div class="row mb-5">
                <div class="col-12 col-lg-8">
                    <h2 class="section-heading mb-3"><strong>Seleccione una categoría</strong></h2>
                    <p class="text-muted mb-0">
                        Consulte por categoría los actos que la notaría formaliza y los documentos
                        que debe reunir para cada uno. El catálogo completo también está disponible
                        en PDF.
                    </p>
                </div>
            </div>

            {{-- getOperations() depende de un host externo. Si cae, esta página se
                 quedaba con el encabezado y nada debajo. @forelse da la salida honesta. --}}
            @forelse($categoryOperations ?? [] as $index => $category)
                @if($loop->first)
                    <ul class="nav nav-pills mb-5 justify-content-center" id="catalog-tab" role="tablist">
                @endif
                        <li class="nav-item m-1">
                            <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                               id="tab-cat-{{ $index }}" data-toggle="pill"
                               href="#content-cat-{{ $index }}" role="tab"
                               aria-controls="content-cat-{{ $index }}"
                               aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                {{ ucwords(mb_strtolower($category->name ?? 'Sin categoría', 'UTF-8')) }}
                            </a>
                        </li>
                @if($loop->last)
                    </ul>

                    <div class="tab-content" id="catalog-tabContent">
                        @foreach($categoryOperations as $i => $cat)
                            <div class="tab-pane fade {{ $i == 0 ? 'show active' : '' }}"
                                 id="content-cat-{{ $i }}" role="tabpanel"
                                 aria-labelledby="tab-cat-{{ $i }}">
                                <div class="row">
                                    @forelse($cat->operation ?? [] as $opIndex => $operation)
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="executive-card executive-card--operation h-100">
                                                <h3 class="mb-4" style="font-size: 1.15rem; font-weight: 600; line-height: 1.4;">
                                                    {{ ucwords(mb_strtolower($operation->name ?? 'Sin nombre', 'UTF-8')) }}
                                                </h3>

                                                @if(!empty($operation->config) && !empty($operation->config->documents_required))
                                                    <button class="n4-disclose" type="button"
                                                            data-toggle="collapse"
                                                            data-target="#req-{{ $i }}-{{ $opIndex }}"
                                                            aria-expanded="false"
                                                            aria-controls="req-{{ $i }}-{{ $opIndex }}">
                                                        <span>Ver requisitos</span>
                                                        <span class="n4-disclose__chevron icon-keyboard_arrow_down"
                                                              aria-hidden="true"></span>
                                                    </button>

                                                    <div class="collapse mt-3" id="req-{{ $i }}-{{ $opIndex }}">
                                                        <ul class="n4-rule-list mb-0">
                                                            @foreach($operation->config->documents_required as $document)
                                                                <li>{{ $documentsMap[$document->id] ?? 'Documento no encontrado' }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p class="text-muted">
                                                Esta categoría no tiene operaciones publicadas en línea.
                                            </p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @empty
                <div class="text-center py-5">
                    <p class="mb-4 mx-auto" style="max-width: 40em;">
                        En este momento no podemos mostrar el catálogo en línea.
                        Puede consultarlo en el documento completo o comunicarse con la notaría.
                    </p>
                    <a class="btn btn-primary" href="{{ asset('files/services_notary.pdf') }}"
                       target="_blank" rel="noopener">Abrir el catálogo en PDF</a>
                </div>
            @endforelse

        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 col-lg-8">
                    <h2 class="section-heading mb-3"><strong>Catálogo completo</strong></h2>
                    <p class="text-muted mb-0">
                        El documento reúne todos los actos y sus requisitos.
                    </p>
                </div>
            </div>

            {{-- El visor va acompañado de un enlace visible: en Safari de iOS un
                 iframe de PDF renderiza una sola página, o nada. --}}
            <p class="mb-4">
                <a class="btn btn-primary" href="{{ asset('files/services_notary.pdf') }}"
                   target="_blank" rel="noopener">Abrir el catálogo en PDF</a>
            </p>

            <div class="executive-card executive-card--media d-none d-lg-block">
                <iframe title="Catálogo de servicios notariales en PDF"
                        style="height: 800px;"
                        src="{{ asset('files/services_notary.pdf') }}"></iframe>
            </div>
        </div>
    </div>
@endsection
