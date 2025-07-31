@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{ asset('images/portada1.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">

                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-12 intro">
                            <h1 class="text-white"><strong>Notaría Pública Nº4 <br></strong> Catalogo de servicios</h1>
                            <p class="text-white">En la Notaría Pública No. 4 ponemos a su disposición
                                diferentes servicios para proteger sus tratos con
                                clientes, proveedores, empleados y prestadores de
                                servicio. Hemos capacitado a un talentoso grupo de
                                abogados para atender las necesidades de las
                                empresas actuales. Nuestro servicio es personalizado
                                y flexible de acuerdo a sus circunstancias.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    @endsection



    @if($verify==1)
        @section('Quote-Info')

            <div class ="quote-container" id="quote-section">
                @if($quote->user->staff != null)
                    <span class = "staff-info font-weight-bold">Asesor/a que creó la cotización: {{$quote->user->staff->full_name}}</span>
                @endif
                @if (isset($quote) && isset($quote->quote->detail_quote) && count($quote->quote->detail_quote) > 0)
                    <div class="quote-detail-card">
        
                
                    <div class="quote-header">
                        <div class="quote-toolbar card-header text-white d-flex justify-content-between align-items-center">
                            <h2 class="quote-title mb-0">Detalle de Cotización</h2>
                        </div>
                    </div>
        
                    <div class="quote-content card-body p-4">
                        {{-- Iterar sobre cada operación en detail_quote --}}
                        @foreach ($quote->quote->detail_quote as $i => $operation)
                            <div class="operation-section">
                                <h3 class="operation-section-title">
                                    <span class="highlight-name">{{ ucwords($operation->name ?? 'N/A') }}</span>
                                </h3>
        
                                {{-- Iterar sobre los campos de cada operación --}}
                                @if (isset($operation->operation_fields) && is_array($operation->operation_fields))
                                    @foreach ($operation->operation_fields as $field)
                                        <div class="field-block">
                                            <h4 class="field-name">{{ ucwords($field->name ?? 'N/A') }}</h4>
                                            <ul class="concept-list">
                                    
                                                {{-- Iterar sobre los conceptos de la descripción --}}
                                                @if (isset($field->description) && is_array($field->description))
                                                    @foreach ($field->description as $concept)
                                                        <li class="concept-item">
                                                            <span class="concept-label">{{ $concept->concept ?? 'N/A' }}</span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                            <div class="field-subtotal">
                                                <span class="subtotal-label">Subtotal {{ ucwords($field->name ?? 'N/A') }}:</span>
                                                <span class="subtotal-value">${{ number_format($field->total ?? 0, 2) }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
        
                                {{-- Mostrar el total de la operación si existe --}}
                                @if (isset($operation->operation_total))
                                    <div class="operation-total-block">
                                        <div class="final-operation-total">
                                            <span class="total-label">Total {{ ucwords($operation->name ?? 'N/A') }}:</span>
                                            <span class="total-value">${{ number_format($operation->operation_total->total ?? 0, 2) }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{-- Separador entre operaciones --}}
                            @if (!$loop->last)
                                <hr class="section-divider" />
                            @endif
                        @endforeach
        
                        {{-- Mostrar el total general si existe --}}
                        @if (isset($quote->quote->total_quote->general_total))
                            <div class="overall-total-block mt-4 pt-3 border-top">
                                <h3 class="overall-total-title text-center">Total General</h3>
                                <div class="overall-total-summary text-right">
                                    <span class="overall-total-label font-weight-bold">Total: </span>
                                    <span class="overall-total-value font-weight-bold">
                                        ${{ number_format($quote->quote->total_quote->general_total ?? 0, 2) }}
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                @else
                    <div class="alert alert-info mt-4">
                        No hay detalles de operaciones disponibles para esta cotización.
                    </div>
                @endif
            </div>    
        @endsection
    @else

        <div class="modal fade" id="verifyQuote" tabindex="-1" role="dialog" aria-labelledby="ScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ScrollableTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            {{ $textNotification }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> 
    
    @endif
    

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            @foreach ($services as $category => $service)
                <div class="mb-5 text-center">
                    <h2 class="section-heading"><strong class="text-black">Servicios de </strong> {{ $category }}</h2>
                </div>
                <div class="row">
                    @foreach ($service as $name => $requirements)
                        <div class="col-lg-4 mb-5">

                            <div class="practicing">
                                <div class="practicing-inner">
                                    <div class="wrap-icon">
                                        <span class="flaticon-shield"></span>
                                    </div>
                                    <h3>{{ $name }}</h3>
                                    <button class="btn btn-sm"
                                        onclick="viewModalRequirements('{{ $name }}', '{{ json_encode($requirements) }}')">Ver
                                        requisitos
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <iframe style="width: 100%; height: 800px" src="{{ asset('files/services_notary.pdf') }}"></iframe>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="requirements" tabindex="-1" role="dialog" aria-labelledby="ScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ScrollableTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="requirements_body">

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal -->
    

    <script type="application/javascript">
        function viewModalRequirements(name, requirements) {
            $('#requirements').modal('show');
            var title = document.getElementById('ScrollableTitle');
            title.innerHTML = name;

            var body = document.getElementById('requirements_body');

            var text_body = '';
            requirements = JSON.parse(requirements);

            for (var tTitle in requirements){
                text_body = text_body + '<strong>' + tTitle + '</strong>';
                text_body = text_body + '<ol>';
                for (var tbody in requirements[tTitle]){
                    text_body = text_body + '<li>' + requirements[tTitle][tbody] + '</li>';
                }
                text_body = text_body + '</ol>';
            }

            body.innerHTML = text_body;
        }

        @if($verify)
            document.addEventListener('DOMContentLoaded', function() {
                $('#verifyQuote').modal('show');
            });
        @endif
            
    </script>
@endsection