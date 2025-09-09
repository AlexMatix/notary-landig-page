@extends('template.layout')

@section('front-page')
    <div class="hero overlay" style="background-image: url({{ asset('images/portada1.jpg') }});">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">

                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-12 intro">
                            <h1 class="text-white"><strong>Notaría Pública Nº4 <br></strong> Servicios</h1>
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
@section('content')

    <div class = "accordion-title">
        <h4>Seleccione la categoría para consultar los servicios que ponemos a su disposición</h4>
    </div>    

    <div class="accordion-container"> 
        @foreach($categoryOperations as $category) 
            <div class="accordion-element">
                <div class="accordion-header">
                    <h3>{{ ucwords($category->name ?? 'N/A') }}</h3>
                    <span class="icon">&#9660;</span> 
                </div>
                <div class="accordion-body">
                    @if (!empty($category->operation))
                        @foreach($category->operation as $operation)
                            <div class="sub-accordion-element">
                                <div class="sub-accordion-header">
                                    <h4>{{ ucwords($operation->name ?? 'N/A') }}</h4>
                                    <span class="icon">&#9660;</span> 
                                </div>
                                <div class="sub-accordion-body">
                                    @if (!empty($operation->config) && !empty($operation->config->documents_required))
                                        <h5>Requisitos:</h5>
                                        <ul>
                                            @foreach($operation->config->documents_required as $document)
                                                <li>
                                                    {{$documentsMap[$document->id] ?? 'Documento no encontrado'}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                
            </div>
        @endforeach
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', () => {

        /**
        * Alterna la clase 'expanded' y ajusta la altura de los elementos del acordeón.
        * También actualiza la altura de los elementos padres para acomodar el contenido.
        * @param {HTMLElement} header El encabezado del acordeón (accordion-header o sub-accordion-header).
        */
        const toggleAccordion = (header) => {
            const body = header.nextElementSibling;
            const isExpanded = header.classList.toggle('expanded');
        
            //  Agregamos un pequeño margen extra a la altura calculada
            const heightBuffer = 20; // Unos píxeles extra para asegurar que no se corte el final
        
            // Alterna la altura del elemento actual
            if (isExpanded) {
                body.style.maxHeight = (body.scrollHeight + heightBuffer) + "px";
            } else {
                body.style.maxHeight = null;
            }

            // Ajuste de altura para los padres (solución al problema de contenido cortado)
            let parentBody = header.closest('.accordion-body');
            if (parentBody) {
                // Se asegura de que el padre se expanda lo suficiente para mostrar al hijo
                // También se agrega el buffer aquí
                parentBody.style.maxHeight = (parentBody.scrollHeight + body.scrollHeight + heightBuffer) + "px";
            }
        };
    
        // Manejador de eventos único para todos los encabezados del acordeón
        document.querySelectorAll('.accordion-header, .sub-accordion-header').forEach(header => {
            header.addEventListener('click', (event) => {
            
                const isSubAccordion = header.classList.contains('sub-accordion-header');
                let parentContainer;

                if (isSubAccordion) {
                    // Para sub-acordeones, el contenedor padre para cerrar hermanos es el .accordion-body
                    parentContainer = header.closest('.accordion-body');
                } else {
                    // Para acordeones principales, el contenedor padre para cerrar hermanos es el .accordion-container
                    parentContainer = document.querySelector('.accordion-container');
                }

                if (!parentContainer) return; 
            
                // Cierra todos los elementos hermanos
                parentContainer.querySelectorAll('.accordion-header, .sub-accordion-header').forEach(otherHeader => {
                    if (otherHeader !== header && otherHeader.classList.contains('expanded')) {
                        otherHeader.classList.remove('expanded');
                        otherHeader.nextElementSibling.style.maxHeight = null;

                        // Ajustar la altura de los padres al cerrar un elemento
                        // 🕵️‍♀️ Aquí también se necesita ajustar la altura del padre al contraer un elemento hijo
                        const otherParentBody = otherHeader.closest('.accordion-body');
                        if(otherParentBody) {
                            otherParentBody.style.maxHeight = (otherParentBody.scrollHeight - (otherHeader.nextElementSibling.scrollHeight || 0)) + "px";
                            // Si el resultado es negativo o muy pequeño, lo reseteamos a null o a una altura mínima si se desea
                            if (parseFloat(otherParentBody.style.maxHeight) < otherParentBody.clientHeight) { // Usa clientHeight para evitar valores negativos si se contrae demasiado
                                otherParentBody.style.maxHeight = null; // O ajusta a una altura mínima si el padre aún tiene contenido
                            }
                        }
                    }
                });

            // Llama a la función principal para desplegar el elemento actual
            toggleAccordion(header);
        });
    });
});
</script>

    {{-- @foreach($operations as $i => $operation)

        <h3 class="operation-section-title">
            <span class="highlight-name">{{ ucwords($operation->name ?? 'N/A') }}</span>
        </h3>

    @endforeach --}}

    <div class="site-section bg-light">
        <div class="container">
            <iframe style="width: 100%; height: 800px" src="{{ asset('files/services_notary.pdf') }}"></iframe>
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