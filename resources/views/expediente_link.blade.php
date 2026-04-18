@extends('template.layout')
@section('content')

    <div class="site-section overflow-hidden bg-light" id="expediente-wizard" style="min-height: 80vh; padding-top: 150px;">
        <div class="container">

            <!-- HEADER WIZARD -->
            <div class="row mb-5 justify-content-center">
                <div class="col-12 col-md-10 text-center animate-fade-in-up delay-100">
                    <h2 class="section-heading mb-3" style="line-height: 1.4;">Vinculación de <br><strong>Expediente
                            Digital</strong></h2>
                    <p class="text-muted" style="font-size: 1.1rem;">
                        Por favor, complete los siguientes pasos para asociar sus datos de identidad de forma segura e
                        iniciar la carga documental correspondiente a su trámite.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 animate-fade-in-up delay-200">

                    @if(isset($error_message))
                        <!-- PANTALLA DE ERROR DE TOKEN -->
                        <div class="executive-card text-center py-5">
                            <div class="mb-4">
                                <span class="icon-times-circle" style="font-size: 5rem; color: #dc3545;"></span>
                            </div>
                            <h3 class="mb-3" style="color: #0d2b3e;">Acceso Inválido</h3>
                            <p class="text-muted" style="font-size: 1.1rem; max-width: 500px; margin: 0 auto;">
                                {{ $error_message }}
                            </p>
                            <div class="mt-4">
                                <a href="{{ route('index') }}" class="btn btn-outline-secondary px-4 py-2">Volver al Inicio</a>
                            </div>
                        </div>
                    @else

                        <div class="executive-card">
                            <!-- Contenedores Injectables via JS -->

                            <!-- PASO 1: VERIFICACIÓN RFC -->
                            <div id="step-1-rfc" class="wizard-step">
                                <h4 class="mb-4 text-center" style="color: #0d2b3e;">Paso 1: Validar Identidad</h4>
                                <div id="step-1-alert" class="alert alert-danger d-none"></div>
                                <p class="text-muted text-center mb-4">Ingrese su RFC (Registro Federal de Contribuyentes) para
                                    localizar su perfil.</p>

                                <div class="form-group mb-4">
                                    <input type="text" id="rfc-input" class="form-control text-center"
                                        placeholder="Ej. ABCD123456XYZ" style="font-size: 1.2rem; text-transform: uppercase;">
                                </div>

                                <button id="btn-verify-rfc" class="btn btn-primary btn-block py-3">Buscar Perfil</button>
                            </div>

                            <!-- PASO 1.5: FORMULARIO DE REGISTRO -->
                            <div id="step-1-5-register" class="wizard-step d-none">
                                <h4 class="mb-4 text-center" style="color: #0d2b3e;">Registro de Identidad</h4>
                                <div id="step-1-5-alert" class="alert alert-danger d-none"></div>
                                <p class="text-muted text-center mb-4">No encontramos su RFC en nuestro sistema. Por favor,
                                    complete sus datos para registrarse y vincularse a este expediente.</p>

                                <form id="grantor-register-form">
                                    <div class="form-section-header mb-3">
                                        <h6 class="font-weight-bold text-primary mb-1">Datos Personales</h6>
                                        <p class="text-muted small">Ingresa los nombres, apellidos, fecha y lugar de nacimiento.
                                        </p>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Nombre *</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Apellido Paterno *</label>
                                            <input type="text" class="form-control" name="father_last_name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Apellido Materno *</label>
                                            <input type="text" class="form-control" name="mother_last_name" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label>También conocido/a como</label>
                                            <input type="text" class="form-control" name="knownAs">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Lugar de nacimiento *</label>
                                            <input type="text" class="form-control" name="place_of_birth" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Fecha de Nacimiento *</label>
                                            <input type="date" class="form-control" name="birthdate" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>RFC *</label>
                                            <input type="text" class="form-control text-uppercase" id="register-rfc-input"
                                                name="rfc" required readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>CURP *</label>
                                            <input type="text" class="form-control text-uppercase" name="curp" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Nacionalidad *</label>
                                            <select class="form-control" name="nationality" required>
                                                <option value="MX">Mexicana</option>
                                                <option value="US">Estadounidense</option>
                                                <option value="CA">Canadiense</option>
                                                <option value="ES">Española</option>
                                                <option value="CO">Colombiana</option>
                                                <option value="AR">Argentina</option>
                                                <option value="CL">Chilena</option>
                                                <option value="PE">Peruana</option>
                                                <option value="VE">Venezolana</option>
                                                <option value="BR">Brasileña</option>
                                                <option value="FR">Francesa</option>
                                                <option value="DE">Alemana</option>
                                                <option value="IT">Italiana</option>
                                                <option value="GB">Británica</option>
                                                <option value="PT">Portuguesa</option>
                                                <option value="CN">China</option>
                                                <option value="JP">Japonesa</option>
                                                <option value="IN">India</option>
                                                <option value="AU">Australiana</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-section-header mt-4 mb-3">
                                        <h6 class="font-weight-bold text-primary mb-1">Datos de Contacto y Otros</h6>
                                        <p class="text-muted small">Información de contacto y detalles adicionales.</p>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Número de teléfono *</label>
                                            <input type="text" class="form-control" name="phone" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Correo *</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Estado civil *</label>
                                            <select class="form-control" name="civil_status" required>
                                                <option value="Soltero(a)">Soltero(a)</option>
                                                <option value="Casado(a)">Casado(a)</option>
                                                <option value="Divorciado(a)">Divorciado(a)</option>
                                                <option value="Viudo(a)">Viudo(a)</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Ocupación *</label>
                                            <input type="text" class="form-control" name="occupation" required>
                                        </div>
                                    </div>

                                    <div class="form-section-header mt-4 mb-3">
                                        <h6 class="font-weight-bold text-primary mb-1">Domicilio</h6>
                                        <p class="text-muted small">Información de la dirección del otorgante.</p>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Calle *</label>
                                            <input type="text" class="form-control" name="street" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Colonia *</label>
                                            <input type="text" class="form-control" name="colony" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Número exterior *</label>
                                            <input type="text" class="form-control" name="no_ext" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Número interior</label>
                                            <input type="text" class="form-control" name="no_int">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Municipio *</label>
                                            <input type="text" class="form-control" name="municipality" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Estado *</label>
                                            <input type="text" class="form-control" name="no_locality" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Localidad *</label>
                                            <input type="text" class="form-control" name="locality" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Código postal *</label>
                                            <input type="text" class="form-control" name="zipcode" required>
                                        </div>
                                    </div>

                                    <input type="hidden" name="type" value="1">
                                    <!-- Tipo de Grantor (e.g., Físico por default) -->
                                    <input type="hidden" name="beneficiary" value="0"> <!-- Si es beneficiario controlador -->

                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" id="btn-cancel-register"
                                            class="btn btn-outline-danger py-2 px-4">Atrás</button>
                                        <button type="submit" id="btn-submit-register" class="btn btn-primary py-2 px-4">Guardar
                                            y Vincular</button>
                                    </div>
                                </form>
                            </div>


                            <!-- PASO 2: CONFIRMACIÓN DE PERFIL -->
                            <div id="step-2-confirm" class="wizard-step d-none">
                                <h4 class="mb-4 text-center" style="color: #0d2b3e;">Paso 2: Confirmar Perfil</h4>
                                <div id="step-2-alert" class="alert alert-danger d-none"></div>

                                <div class="profile-card p-4 mb-4"
                                    style="background: rgba(13, 43, 62, 0.03); border-radius: 8px;">
                                    <h5 id="profile-name" class="font-weight-bold text-center mb-2" style="color: #0d2b3e;">
                                        CARGANDO...</h5>
                                    <p id="profile-rfc" class="text-muted text-center mb-0">RFC: XXXX000000XXX</p>
                                </div>

                                <p class="text-center mb-4">¿Confirma que estos son sus datos correctos para vincularse al
                                    presente expediente?</p>

                                <div class="d-flex justify-content-between">
                                    <button id="btn-cancel-profile" class="btn btn-outline-danger py-2 px-4">No,
                                        regresar</button>
                                    <button id="btn-confirm-profile" class="btn btn-primary py-2 px-4">Sí, Vincular
                                        Expediente</button>
                                </div>
                            </div> <!-- End Step 2 -->

                            <!-- PASO 3: CARGA DE DOCUMENTOS -->
                            <div id="step-3-documents" class="wizard-step d-none">
                                    <h4 class="mb-3 text-center" style="color: #0d2b3e;">Paso 3: Carga de Documentos</h4>
                                    <p class="text-muted text-center mb-4">Seleccione el tipo de documento del catálogo oficial
                                        y suba el archivo correspondiente.</p>

                                    <div id="step-3-alert" class="alert alert-success d-none"></div>

                                    <!-- FORMULARIO DE CARGA ÚNICO -->
                                    <div class="upload-zone p-4 mb-4"
                                        style="background: #f8f9fa; border: 2px dashed #dee2e6; border-radius: 12px;">
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold">1. Seleccione el Tipo de Documento</label>
                                            <input list="catalog-list" id="doc-catalog-input" class="form-control"
                                                placeholder="Escriba para buscar (ej. Identificación, Acta...)">
                                            <datalist id="catalog-list">
                                                <!-- Se llenará vía JS -->
                                            </datalist>
                                            <input type="hidden" id="selected-doc-id">
                                            <p id="doc-description" class="text-muted small mt-2 italic"
                                                style="min-height: 20px;"></p>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label class="font-weight-bold">2. Seleccione el Archivo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file-input">
                                                <label class="custom-file-label" for="file-input" id="file-label">Elegir
                                                    archivo...</label>
                                            </div>
                                        </div>

                                        <button id="btn-upload-doc" class="btn btn-primary btn-block py-2 font-weight-bold"
                                            disabled>
                                            <span class="icon-cloud-upload mr-2"></span> Subir Documento
                                        </button>
                                    </div>

                                    <!-- TABLA DE HISTORIAL -->
                                    <div class="mt-5">
                                        <h6 class="font-weight-bold text-primary mb-3">Documentos Cargados en esta Sesión</h6>
                                        <div class="table-responsive">
                                            <table class="table table-hover" style="font-size: 0.9rem;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Documento</th>
                                                        <th>Estado</th>
                                                        <th class="text-right">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="uploaded-history-body">
                                                    <tr id="no-docs-row">
                                                        <td colspan="3" class="text-center text-muted">Aún no se han subido
                                                            documentos.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="text-center mt-5">
                                        <button class="btn btn-outline-success px-5 py-2 font-weight-bold"
                                            onclick="location.reload()">
                                            Finalizar Carga
                                        </button>
                                    </div>
                                </div> <!-- End Step 3 -->

                            </div> <!-- End Executive Card -->
                    @endif

                    </div>
                </div>

            </div>
        </div>

        <!-- DATA TOKEN INVISIBLE -->
        <input type="hidden" id="expediente-token" value="{{ $token }}">

@endsection

    @section('scripts')
        <!-- Cargamos script en crudo (Vite Asset) -->
        @vite(['resources/js/expediente-link.js'])
    @endsection