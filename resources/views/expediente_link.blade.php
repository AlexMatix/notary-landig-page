@extends('template.layout')

@section('title', 'Vinculación de expediente · Notaría Pública Número 4')

{{--
    NOTA DE MANTENIMIENTO — no borrar.

    Esta vista está acoplada a resources/js/expediente-link.js, que es el ÚNICO
    JavaScript propio del sitio (llega por @vite, ver el final del archivo).
    Todos los id de este documento son contrato con ese bundle: no renombrar
    step-1-rfc, step-1-5-register, step-2-confirm, step-3-documents,
    step-*-alert, rfc-input, btn-verify-rfc, grantor-register-form,
    register-rfc-input, btn-cancel-register, btn-submit-register, profile-name,
    profile-rfc, btn-cancel-profile, btn-confirm-profile, doc-catalog-input,
    catalog-list, selected-doc-id, doc-description, file-input, file-label,
    btn-upload-doc, uploaded-history-body, no-docs-row ni expediente-token.

    Dos consecuencias que explican decisiones de este archivo:

    1. showAlert() hace `element.className = 'alert alert-' + type`, es decir
       REEMPLAZA la lista de clases. Cualquier clase que se añada aquí a los
       cuatro divs de alerta se destruye en la primera alerta. Por eso se
       estilizan por id en style.css. Los atributos (role, tabindex) sí sobreviven.

    2. El bundle restaura los textos de tres botones al terminar su spinner
       ('Buscar Perfil', 'Guardar y Vincular', 'Sí, Vincular Expediente').
       Esas tres etiquetas se dejan tal cual: cambiarlas aquí haría que el botón
       cambiara de texto solo después de la primera interacción. Mejorarlas exige
       editar el bundle y correr `npm run build`.

    Los guardas en línea (onclick con reportValidity/confirm) funcionan sin
    rebuild: un manejador en línea se registra al parsear el elemento, o sea
    antes que el addEventListener del bundle, y stopImmediatePropagation()
    impide que el listener posterior corra.
--}}

@section('content')

    <div class="site-section overflow-hidden bg-light" id="expediente-wizard" style="min-height: 80vh;">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-12 col-md-10 text-center">
                    <h1 class="section-heading mb-3" style="line-height: 1.4;">
                        Vinculación de <br><strong>expediente digital</strong>
                    </h1>
                    <p class="text-muted mx-auto" style="font-size: 1.1rem; max-width: 44em;">
                        Complete los siguientes pasos para asociar sus datos de identidad e iniciar
                        la carga de los documentos de su trámite.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">

                @if(isset($error_message))
                    {{-- Dos causas opuestas, dos pantallas. Antes ambas ramas del
                         controlador devolvían el mismo texto, así que a quien tenía
                         una liga perfecta y un ERP caído se le decía que su liga no
                         servía. --}}
                    <div class="executive-card text-center py-5">
                        <div class="mb-4" aria-hidden="true">
                            <span class="icon-times-circle" style="font-size: 4rem; color: #dc3545;"></span>
                        </div>

                        <h2 class="h4 mb-3">{{ $error_title ?? 'No pudimos abrir este expediente' }}</h2>

                        <p class="text-muted mx-auto mb-4" style="font-size: 1.05rem; max-width: 36em; text-align: left;">
                            {{ $error_message }}
                        </p>

                        @if(($error_kind ?? null) === 'servicio')
                            {{-- href vacío recarga la URL actual con el token intacto:
                                 reintento sin una línea de JavaScript. --}}
                            <p class="mb-4">
                                <a href="" class="btn btn-primary">Volver a intentar</a>
                            </p>
                        @endif

                        <div class="n4-error-contacto text-left mx-auto" style="max-width: 36em;">
                            <h3 class="h6 mb-3">Cómo comunicarse con la notaría</h3>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">Circuito Juan Pablo II 3117, Col. Las Ánimas, Puebla, Puebla.</li>
                                <li class="mb-2">Lunes a viernes, de 09:00 a 17:00 h.</li>
                                <li class="mb-2">
                                    <a href="{{ route('contact') }}">Enviar un mensaje por el formulario de contacto</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else

                    <div class="executive-card">

                        {{-- ============ PASO 1: VERIFICACIÓN DE RFC ============ --}}
                        <div id="step-1-rfc" class="wizard-step">
                            @include('partials.wizard-pasos', ['actual' => 1])

                            <h2 class="h4 mb-4 text-center">Validar su identidad</h2>
                            <div id="step-1-alert" class="alert alert-danger d-none" role="alert" tabindex="-1"></div>

                            <form id="rfc-form" onsubmit="return false;">
                                <div class="form-group mb-2">
                                    <label for="rfc-input">RFC (Registro Federal de Contribuyentes)</label>
                                    <input type="text" id="rfc-input" class="form-control text-center"
                                           style="font-size: 1.2rem; text-transform: uppercase;"
                                           placeholder="ABCD123456XYZ"
                                           inputmode="text" autocapitalize="characters" autocomplete="off"
                                           spellcheck="false" maxlength="13" minlength="12" required
                                           pattern="[A-Za-zÑñ&amp;]{3,4}[0-9]{6}[A-Za-z0-9]{3}"
                                           aria-describedby="ayuda-rfc">
                                    <small id="ayuda-rfc" class="form-text text-muted">
                                        Trece caracteres si es persona física, doce si es persona moral.
                                        No es la CURP: el RFC es más corto y aparece en su constancia de
                                        situación fiscal.
                                    </small>
                                </div>

                                <button type="submit" id="btn-verify-rfc" class="btn btn-primary btn-block"
                                        onclick="if(!document.getElementById('rfc-input').reportValidity()){event.stopImmediatePropagation();return false;}">
                                    Buscar Perfil
                                </button>
                            </form>

                            <p class="text-muted small text-center mt-3 mb-0">
                                Si se corta la conexión, vuelva a abrir esta misma liga y escriba de nuevo
                                su RFC. El expediente conserva lo que ya se haya guardado.
                            </p>
                        </div>

                        {{-- ============ PASO 1.5: REGISTRO ============ --}}
                        <div id="step-1-5-register" class="wizard-step d-none">
                            @include('partials.wizard-pasos', ['actual' => 2])

                            <h2 class="h4 mb-4 text-center">Registro de identidad</h2>
                            <div id="step-1-5-alert" class="alert alert-danger d-none" role="alert" tabindex="-1"></div>
                            <p class="text-muted text-center mb-4">
                                Su RFC todavía no está registrado. Complete los siguientes datos para
                                vincularse a este expediente. Sólo tendrá que hacerlo una vez.
                            </p>

                            <form id="grantor-register-form">
                                <div class="form-section-header mb-3">
                                    <h3 class="h6 font-weight-bold mb-1">Datos personales</h3>
                                    <p class="text-muted small">
                                        Escriba sus nombres y apellidos tal como aparecen en su
                                        identificación oficial.
                                    </p>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="reg-name">Nombre</label>
                                        <input type="text" id="reg-name" class="form-control" name="name"
                                               autocomplete="given-name" autocapitalize="words" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reg-father">Apellido paterno</label>
                                        <input type="text" id="reg-father" class="form-control" name="father_last_name"
                                               autocomplete="family-name" autocapitalize="words" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reg-mother">Apellido materno</label>
                                        <input type="text" id="reg-mother" class="form-control" name="mother_last_name"
                                               autocapitalize="words" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="reg-knownas">También conocido o conocida como <span class="text-muted">(opcional)</span></label>
                                        <input type="text" id="reg-knownas" class="form-control" name="knownAs"
                                               autocapitalize="words">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="reg-birthplace">Lugar de nacimiento</label>
                                        <input type="text" id="reg-birthplace" class="form-control" name="place_of_birth"
                                               autocapitalize="words" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="reg-birthdate">Fecha de nacimiento</label>
                                        {{-- max: sin él, el campo aceptaba fechas de nacimiento futuras --}}
                                        <input type="date" id="reg-birthdate" class="form-control" name="birthdate"
                                               max="{{ now()->toDateString() }}" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="register-rfc-input">RFC</label>
                                        <input type="text" id="register-rfc-input" class="form-control text-uppercase"
                                               name="rfc" maxlength="13" autocapitalize="characters"
                                               spellcheck="false" required readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reg-curp">CURP</label>
                                        <input type="text" id="reg-curp" class="form-control text-uppercase" name="curp"
                                               maxlength="18" autocapitalize="characters" spellcheck="false"
                                               pattern="[A-Za-z]{4}[0-9]{6}[A-Za-z]{6}[A-Za-z0-9]{2}" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="reg-nationality">Nacionalidad</label>
                                        <select class="form-control" id="reg-nationality" name="nationality" required>
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
                                    <h3 class="h6 font-weight-bold mb-1">Datos de contacto</h3>
                                    <p class="text-muted small">Por aquí le confirmaremos lo relativo a su trámite.</p>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="reg-phone">Número de teléfono</label>
                                        <input type="tel" id="reg-phone" class="form-control" name="phone"
                                               inputmode="tel" autocomplete="tel" maxlength="25" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="reg-email">Correo electrónico</label>
                                        <input type="email" id="reg-email" class="form-control" name="email"
                                               inputmode="email" autocomplete="email" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="reg-civil">Estado civil</label>
                                        <select class="form-control" id="reg-civil" name="civil_status" required>
                                            <option value="Soltero(a)">Soltero(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                            <option value="Divorciado(a)">Divorciado(a)</option>
                                            <option value="Viudo(a)">Viudo(a)</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="reg-occupation">Ocupación</label>
                                        <input type="text" id="reg-occupation" class="form-control" name="occupation"
                                               autocapitalize="sentences" required>
                                    </div>
                                </div>

                                <div class="form-section-header mt-4 mb-3">
                                    <h3 class="h6 font-weight-bold mb-1">Domicilio</h3>
                                    <p class="text-muted small">Dirección del otorgante.</p>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="reg-street">Calle</label>
                                        <input type="text" id="reg-street" class="form-control" name="street"
                                               autocomplete="address-line1" autocapitalize="words" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="reg-colony">Colonia</label>
                                        <input type="text" id="reg-colony" class="form-control" name="colony"
                                               autocomplete="address-level3" autocapitalize="words" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="reg-noext">Número exterior</label>
                                        <input type="text" id="reg-noext" class="form-control" name="no_ext"
                                               inputmode="numeric" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="reg-noint">Número interior <span class="text-muted">(opcional)</span></label>
                                        <input type="text" id="reg-noint" class="form-control" name="no_int"
                                               inputmode="numeric">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="reg-municipality">Municipio</label>
                                        <input type="text" id="reg-municipality" class="form-control" name="municipality"
                                               autocapitalize="words" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    {{-- OJO: la etiqueta dice "Estado" pero el campo se llama
                                         no_locality, y linkGrantor() reenvía $request->all() tal
                                         cual al ERP. Si el ERP interpreta no_locality como número
                                         de localidad, el estado de residencia entra en el campo
                                         equivocado del expediente. Verificar contra el contrato
                                         del ERP antes de tocar estos dos name. --}}
                                    <div class="form-group col-md-6">
                                        <label for="reg-state">Estado</label>
                                        <input type="text" id="reg-state" class="form-control" name="no_locality"
                                               autocapitalize="words" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="reg-locality">Localidad</label>
                                        <input type="text" id="reg-locality" class="form-control" name="locality"
                                               autocapitalize="words" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="reg-zip">Código postal</label>
                                        <input type="text" id="reg-zip" class="form-control" name="zipcode"
                                               inputmode="numeric" pattern="[0-9]{5}" maxlength="5"
                                               autocomplete="postal-code" required>
                                    </div>
                                </div>

                                <input type="hidden" name="type" value="1">
                                <input type="hidden" name="beneficiary" value="0">

                                {{-- "Atrás" ejecutaba formRegister.reset() sin preguntar: borraba
                                     veinte campos capturados en un celular, y estaba en la misma
                                     fila y con el mismo peso visual que "Guardar". Ahora confirma,
                                     y baja a btn-link para que haya UNA sola acción evidente. --}}
                                <div class="n4-wizard-actions d-flex justify-content-between align-items-center">
                                    <button type="button" id="btn-cancel-register" class="btn btn-link px-0"
                                            onclick="if(!confirm('¿Desea volver al paso anterior? Se perderán los datos que ya capturó en este formulario.')){event.stopImmediatePropagation();return false;}">
                                        Volver
                                    </button>
                                    <button type="submit" id="btn-submit-register" class="btn btn-primary">
                                        Guardar y Vincular
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- ============ PASO 2: CONFIRMACIÓN ============ --}}
                        <div id="step-2-confirm" class="wizard-step d-none">
                            @include('partials.wizard-pasos', ['actual' => 2])

                            <h2 class="h4 mb-4 text-center">Confirmar su perfil</h2>
                            <div id="step-2-alert" class="alert alert-danger d-none" role="alert" tabindex="-1"></div>

                            <div class="profile-card p-4 mb-4"
                                 style="background: rgba(13, 43, 62, 0.03); border-radius: 8px;">
                                <p id="profile-name" class="font-weight-bold text-center mb-2 h5"
                                   style="color: #0d2b3e;">CARGANDO...</p>
                                <p id="profile-rfc" class="text-muted text-center mb-0">RFC: XXXX000000XXX</p>
                            </div>

                            <p class="text-center mb-4">
                                ¿Confirma que estos son sus datos y desea vincularse a este expediente?
                            </p>

                            <div class="n4-wizard-actions d-flex justify-content-between align-items-center">
                                <button id="btn-cancel-profile" class="btn btn-link px-0">No, regresar</button>
                                <button id="btn-confirm-profile" class="btn btn-primary">Sí, Vincular Expediente</button>
                            </div>
                        </div>

                        {{-- ============ PASO 3: DOCUMENTOS ============ --}}
                        <div id="step-3-documents" class="wizard-step d-none">
                            @include('partials.wizard-pasos', ['actual' => 3])

                            <h2 class="h4 mb-3 text-center">Carga de documentos</h2>
                            <p class="text-muted text-center mb-4">
                                Elija el tipo de documento y suba el archivo correspondiente.
                            </p>

                            <div id="step-3-alert" class="alert alert-success d-none" role="alert" tabindex="-1"></div>

                            <div class="upload-zone p-4 mb-4"
                                 style="background: #f8f9fa; border: 1px solid rgba(13,43,62,.12); border-radius: 12px;">
                                <div class="form-group mb-3">
                                    <label for="doc-catalog-input">1. Tipo de documento</label>
                                    <input list="catalog-list" id="doc-catalog-input" class="form-control"
                                           autocomplete="off"
                                           placeholder="Escriba para buscar (por ejemplo: identificación, acta…)">
                                    <datalist id="catalog-list"></datalist>
                                    <input type="hidden" id="selected-doc-id">
                                    <p id="doc-description" class="text-muted small mt-2" style="min-height: 20px;"></p>
                                </div>

                                {{-- El .custom-file de Bootstrap no actualiza su etiqueta solo:
                                     depende del bundle. Si el bundle está rancio o falla, el
                                     usuario elegía un archivo y la caja seguía diciendo "Elegir
                                     archivo...". El input nativo muestra el nombre gratis, lo
                                     localiza el sistema operativo y es más grande al tacto.
                                     #file-label se conserva porque el bundle le escribe. --}}
                                <div class="form-group mb-4">
                                    <label for="file-input">2. Archivo</label>
                                    <input type="file" class="form-control-file" id="file-input"
                                           accept="image/jpeg,image/png,image/heic,application/pdf"
                                           aria-describedby="ayuda-archivo">
                                    <small id="file-label" class="d-block mt-2 text-muted"></small>
                                    <small id="ayuda-archivo" class="form-text text-muted">
                                        Puede tomar la foto con la cámara de su teléfono.
                                        Formatos: JPG, PNG o PDF. Tamaño máximo: 10 MB.
                                    </small>
                                </div>

                                <button id="btn-upload-doc" class="btn btn-primary btn-block font-weight-bold" disabled>
                                    <span class="icon-cloud-upload mr-2" aria-hidden="true"></span> Subir Documento
                                </button>
                            </div>

                            <div class="mt-5">
                                <h3 class="h6 font-weight-bold mb-3">Documentos que envió ahora</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Documento</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col" class="text-right">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="uploaded-history-body">
                                            <tr id="no-docs-row">
                                                <td colspan="3" class="text-center text-muted">
                                                    Todavía no ha enviado ningún documento en esta visita.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- Antes: onclick="location.reload()". La recarga borraba la tabla
                                 del historial (sólo vive en el DOM) y devolvía al usuario al paso 1
                                 frente a un campo de RFC vacío, sin ninguna confirmación de que sus
                                 documentos habían llegado. Peor pantalla posible al final de un
                                 flujo largo. El modal es de Bootstrap 4, que sí carga desde CDN. --}}
                            <div class="text-center mt-5">
                                <button type="button" class="btn btn-primary"
                                        data-toggle="modal" data-target="#modal-fin">
                                    He terminado de subir mis documentos
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="modal fade" id="modal-fin" tabindex="-1" role="dialog"
                         aria-labelledby="modal-fin-titulo" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="border-radius: 12px; border: 1px solid rgba(13,43,62,.12);">
                                <div class="modal-body p-4 text-center">
                                    <h2 class="h5 mb-3" id="modal-fin-titulo">Sus documentos quedaron registrados</h2>
                                    <p class="text-muted mb-4">
                                        La notaría revisará lo que envió. Si falta algún documento o alguno
                                        no se lee con claridad, se comunicarán con usted. Puede cerrar esta página.
                                    </p>
                                    <p class="text-muted small mb-4">
                                        Si necesita subir algo más, vuelva a abrir la misma liga y escriba su RFC:
                                        el expediente conserva lo que ya recibió.
                                    </p>
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                        Seguir subiendo documentos
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                </div>
            </div>

        </div>

        <input type="hidden" id="expediente-token" value="{{ $token }}">
    </div>

@endsection

@section('scripts')
    @vite(['resources/js/expediente-link.js'])
@endsection
