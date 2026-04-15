@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{ asset('images/portada1.jpg') }});">
        <div class="hero-executive-gradient"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12" style="margin-top: 120px; position: relative; z-index: 2;">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-10 intro text-center text-lg-left">
                            <h1 class="text-white name-notary mb-4"><strong>Notaría Pública Número 4 del Distrito Judicial de Puebla con Residencia en la Ciudad Puebla<br></strong> Catálogo de Servicios</h1>
                            <p class="lead text-white mb-5" style="font-weight: 300;">Ofrecemos una gama superior de instrumentos notariales diseñados para formalizar, proteger y dar plena validez a sus actos civiles y operaciones corporativas estratégicas. Nuestro compromiso es garantizar su certeza jurídica con inmediatez y eficacia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="executive-card modern-shadow mb-5">
                <div class="accordion-title text-center mb-4">
                    <h4 class="section-heading" style="color: #0d2b3e;">Explore nuestras categorías jurídicas para consultar el catálogo detallado de servicios notariales</h4>
                </div>    

                <!-- Navegación por Categorías (Tabs) -->
                <ul class="nav nav-pills mb-4 justify-content-center" id="catalog-tab" role="tablist">
                    @foreach($categoryOperations as $index => $category)
                        <li class="nav-item m-1">
                            <a class="nav-link px-4 py-2 {{ $index == 0 ? 'active' : '' }}" style="border-radius: 30px; font-weight: 500;" id="tab-cat-{{ $index }}" data-toggle="pill" href="#content-cat-{{ $index }}" role="tab" aria-controls="content-cat-{{ $index }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                {{ ucwords($category->name ?? 'N/A') }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Contenido de las Categorías -->
                <div class="tab-content mt-5" id="catalog-tabContent">
                    @foreach($categoryOperations as $index => $category)
                        <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="content-cat-{{ $index }}" role="tabpanel" aria-labelledby="tab-cat-{{ $index }}">
                            <div class="row">
                                @if (!empty($category->operation))
                                    @foreach($category->operation as $opIndex => $operation)
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <!-- Tarjeta de Operación -->
                                            <div class="executive-card h-100 p-4 border" style="box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.2s;">
                                                <h4 class="mb-4" style="color: #0d2b3e; font-size: 1.15rem; font-weight: 600; line-height: 1.4;">{{ ucwords($operation->name ?? 'N/A') }}</h4>
                                                
                                                @if (!empty($operation->config) && !empty($operation->config->documents_required))
                                                    <button class="btn btn-sm d-flex align-items-center justify-content-between w-100" style="background-color: rgba(13, 43, 62, 0.05); border: 1px solid rgba(13, 43, 62, 0.1); color: #0d2b3e; font-weight: 500; border-radius: 8px;" type="button" data-toggle="collapse" data-target="#req-{{ $index }}-{{ $opIndex }}" aria-expanded="false" aria-controls="req-{{ $index }}-{{ $opIndex }}">
                                                        Ver Requisitos <span class="icon">&#9660;</span>
                                                    </button>
                                                    
                                                    <div class="collapse mt-3" id="req-{{ $index }}-{{ $opIndex }}">
                                                        <div class="card card-body p-3 bg-light border-0" style="border-radius: 8px;">
                                                            <ul class="text-left text-muted pl-3 mb-0" style="font-size: 0.9em; list-style: disc;">
                                                                @foreach($operation->config->documents_required as $document)
                                                                    <li class="mb-1">{{$documentsMap[$document->id] ?? 'Documento no encontrado'}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center text-muted">
                                        <p>Actualmente no existen operaciones públicas disponibles documentadas bajo esta jerarquía jurídica.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

    {{-- @foreach($operations as $i => $operation)

        <h3 class="operation-section-title">
            <span class="highlight-name">{{ ucwords($operation->name ?? 'N/A') }}</span>
        </h3>

    @endforeach --}}

    <div class="site-section">
        <div class="container">
            <div class="executive-card overflow-hidden p-0 d-flex align-items-center justify-content-center modern-shadow">
                <iframe style="width: 100%; height: 800px; border:0;" src="{{ asset('files/services_notary.pdf') }}"></iframe>
            </div>
        </div>
    </div>

    
    

    {{-- <script type="application/javascript">


        @if($verify)
            document.addEventListener('DOMContentLoaded', function() {
                $('#verifyQuote').modal('show');
            });
        @endif
            
    </script> --}}
@endsection