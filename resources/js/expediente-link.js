import axios from 'axios';

document.addEventListener('DOMContentLoaded', function() {
    
    const wizardContainer = document.getElementById('expediente-wizard');
    if (!wizardContainer) return; // Only execute if we are on the relative page

    console.log("Expediente Link Wizard Initialized.");

    // Elementos DOM Globales
    const tokenEl = document.getElementById('expediente-token');
    if (!tokenEl) {
        console.warn("Elemento 'expediente-token' no encontrado.");
        return;
    }
    const token = tokenEl.value;
    
    // Paso 1 Elementos
    const step1Rfc = document.getElementById('step-1-rfc');
    const inputRfc = document.getElementById('rfc-input');
    const btnVerifyRfc = document.getElementById('btn-verify-rfc');
    const alert1 = document.getElementById('step-1-alert');

    // Paso 2 Elementos
    const step2Confirm = document.getElementById('step-2-confirm');
    const profileName = document.getElementById('profile-name');
    const profileRfc = document.getElementById('profile-rfc');
    const btnConfirm = document.getElementById('btn-confirm-profile');
    const btnCancel = document.getElementById('btn-cancel-profile');
    const alert2 = document.getElementById('step-2-alert');

    // Paso 1.5 Elementos (Registro)
    const step15Register = document.getElementById('step-1-5-register');
    const formRegister = document.getElementById('grantor-register-form');
    const registerRfcInput = document.getElementById('register-rfc-input');
    const btnCancelRegister = document.getElementById('btn-cancel-register');
    const alert15 = document.getElementById('step-1-5-alert');
    const btnSubmitRegister = document.getElementById('btn-submit-register');

    // Paso 3 Elementos (Rediseñados)
    const step3Docs = document.getElementById('step-3-documents');
    const inputCatalog = document.getElementById('doc-catalog-input');
    const datalistCatalog = document.getElementById('catalog-list');
    const hiddenDocId = document.getElementById('selected-doc-id');
    const docDescription = document.getElementById('doc-description');
    const fileInput = document.getElementById('file-input');
    const fileLabel = document.getElementById('file-label');
    const btnUpload = document.getElementById('btn-upload-doc');
    const uploadedHistoryBody = document.getElementById('uploaded-history-body');
    const alert3 = document.getElementById('step-3-alert');

    // Estado global
    let currentGrantorId = null;
    let documentCatalog = []; // Caché del catálogo
    let uploadedCount = 0;

    // AXIOS CONFIG (Adding standard headers if needed)
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    let tokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (tokenMeta) {
        axios.defaults.headers.common['X-CSRF-TOKEN'] = tokenMeta.getAttribute('content');
    }

    /**
     * Helper: Muestra Alertas
     */
    function showAlert(element, message, type = 'danger') {
        if (!element) {
            console.warn("showAlert called but element is null. Message:", message);
            return;
        }
        element.className = `alert alert-${type}`;
        element.innerHTML = message;
        element.classList.remove('d-none');
    }

    /**
     * Helper: Cambio de Pantallas
     */
    function showStep(stepElement) {
        if (!stepElement) return;

        if (step1Rfc) step1Rfc.classList.add('d-none');
        if (step15Register) step15Register.classList.add('d-none');
        if (step2Confirm) step2Confirm.classList.add('d-none');
        if (step3Docs) step3Docs.classList.add('d-none');
        
        stepElement.classList.remove('d-none');
    }


    /* =======================================================
       EVENTOS Y LISTENERS (Con verificaciones de nulidad)
       ======================================================= */
    if (btnVerifyRfc) btnVerifyRfc.addEventListener('click', async function() {
        const rfcValue = inputRfc.value.trim().toUpperCase();
        
        if(rfcValue === '') {
            showAlert(alert1, 'Por favor, ingrese un RFC válido.');
            return;
        }

        btnVerifyRfc.disabled = true;
        btnVerifyRfc.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Buscando...';
        alert1.classList.add('d-none');

        try {
            const response = await axios.post('/ajax/expediente/verify-rfc', {
                rfc: rfcValue,
                token: token
            });

            const data = response.data;
            
            if (data && data.grantor) {
                // Caso 1: Ya está vinculado a este expediente -> Ir directo a documentos
                if (data.linked === true) {
                    showStep(step3Docs);
                    showAlert(alert3, 'Usted ya se encuentra vinculado a este expediente. Puede proceder con la carga de documentos.', 'success');
                    loadDocumentCatalog();
                    return;
                }

                // Caso 2: Existe en el sistema pero no está vinculado -> Confirmar vínculos
                currentGrantorId = data.grantor.id;
                profileName.innerText = `${data.grantor.name} ${data.grantor.father_last_name || ''} ${data.grantor.mother_last_name || ''}`;
                profileRfc.innerText = `RFC: ${data.grantor.rfc}`;
                showStep(step2Confirm);
            } else {
                // Caso 3: No existe en el sistema -> Obligar registro
                registerRfcInput.value = rfcValue;
                alert15.classList.add('d-none');
                showStep(step15Register);
            }

        } catch (error) {
            console.error(error);
            const msg = error.response?.data?.message || 'Error del servidor al consultar el RFC. Intente más tarde.';
            showAlert(alert1, msg);
        } finally {
            btnVerifyRfc.disabled = false;
            btnVerifyRfc.innerHTML = 'Buscar Perfil';
        }
    });


    /* =======================================================
       EVENTO: CANCELAR CONFIRMACIÓN O REGISTRO (Paso 2 / 1.5 -> Paso 1)
       ======================================================= */
    btnCancel.addEventListener('click', function() {
        currentGrantorId = null;
        showStep(step1Rfc);
    });

    btnCancelRegister.addEventListener('click', function() {
        formRegister.reset();
        showStep(step1Rfc);
    });

    /* =======================================================
       EVENTO: ENVIAR FORMULARIO DE REGISTRO (Paso 1.5 -> Paso 3)
       ======================================================= */
    if (formRegister) formRegister.addEventListener('submit', async function(e) {
        e.preventDefault();

        btnSubmitRegister.disabled = true;
        btnSubmitRegister.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Guardando...';
        alert15.classList.add('d-none');

        // Formar el FormData manualmente
        const formData = new FormData(formRegister);
        formData.append('token', token);

        try {
            // Mandar todos los datos al proxy /ajax/expediente/link 
            // que llama al ERP /procedure/storeGrantor/
            const response = await axios.post('/ajax/expediente/link', formData);

            // Guardamos el ID retornado del grantor recién creado/vinculado
            if (response.data && response.data.data && response.data.data.id) {
                currentGrantorId = response.data.data.id;
            } else if (response.data && response.data.id) {
                currentGrantorId = response.data.id;
            }

            // Exito, pasamos directo a documentos
            showStep(step3Docs);
            showAlert(alert3, '¡Su perfil ha sido creado y vinculado exitosamente! Ahora suba sus documentos.', 'success');
            loadDocumentCatalog();

        } catch (error) {
            console.error(error);
            const msg = error.response?.data?.message || 'Error al intentar registrar su información. Verifique que los formatos sean correctos.';
            showAlert(alert15, msg);
        } finally {
            btnSubmitRegister.disabled = false;
            btnSubmitRegister.innerHTML = 'Guardar y Vincular';
        }
    });


    /* =======================================================
       EVENTO: CONFIRMAR VINCULACIÓN (Paso 2 -> Paso 3)
       ======================================================= */
    if (btnConfirm) btnConfirm.addEventListener('click', async function() {
        const rfcValue = profileRfc.innerText.replace('RFC: ', '').trim();
        if(!rfcValue) return;

        btnConfirm.disabled = true;
        btnCancel.disabled = true;
        btnConfirm.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Vinculando...';
        alert2.classList.add('d-none');

        try {
            // Enviamos el RFC al proxy para que el ERP lo busque y vincule
            const response = await axios.post('/ajax/expediente/link', {
                rfc: rfcValue,
                token: token
            });

            // Si es exitoso, mostrar el paso 3 y cargar el catálogo de documentos
            if (response.data && response.data.data && response.data.data.id) {
                currentGrantorId = response.data.data.id;
            } else if (response.data && response.data.id) {
                currentGrantorId = response.data.id;
            }
            
            showStep(step3Docs);
            showAlert(alert3, '¡Perfil vinculado exitosamente! Ahora puede subir sus documentos.', 'success');
            loadDocumentCatalog();

        } catch (error) {
            console.error(error);
            const msg = error.response?.data?.message || 'Ocurrió un error al intentar vincular su perfil.';
            showAlert(alert2, msg);
            btnConfirm.disabled = false;
            btnCancel.disabled = false;
            btnConfirm.innerHTML = 'Sí, Vincular Expediente';
        }
    });


    /* =======================================================
       CARGAR CATÁLOGO DE DOCUMENTOS (Paso 3)
       ======================================================= */
    async function loadDocumentCatalog() {
        try {
            const response = await axios.get(`/ajax/expediente/${token}/documents`);
            let documents = [];
            
            if (Array.isArray(response.data)) {
                documents = response.data;
            } else if (response.data && response.data.data) {
                documents = response.data.data;
            } else if (response.data && response.data.documents) {
                documents = response.data.documents;
            }
            
            if(documents.length === 0) {
                showAlert(alert3, 'No se pudo cargar el catálogo de documentos.', 'warning');
                return;
            }

            // Guardar en caché y poblar datalist
            documentCatalog = documents;
            renderCatalogDatalist(documents);

        } catch (error) {
            console.error(error);
            showAlert(alert3, 'Error al conectar con el servidor para obtener el catálogo.', 'danger');
        }
    }

    /**
     * Llena el datalist para el buscador
     */
    function renderCatalogDatalist(documents) {
        datalistCatalog.innerHTML = '';
        documents.forEach(doc => {
            const option = document.createElement('option');
            option.value = doc.name;
            option.setAttribute('data-id', doc.id);
            datalistCatalog.appendChild(option);
        });
    }

    /* =======================================================
       LÓGICA DE SELECCIÓN Y AUTOCOMPLETADO
       ======================================================= */
    if (inputCatalog) inputCatalog.addEventListener('change', function() {
        const val = this.value;
        const matchingDoc = documentCatalog.find(doc => doc.name === val);

        if (matchingDoc) {
            hiddenDocId.value = matchingDoc.id;
            docDescription.innerText = matchingDoc.description || 'Sin descripción disponible.';
            inputCatalog.classList.add('is-valid');
            inputCatalog.classList.remove('is-invalid');
        } else if (val !== "") {
            hiddenDocId.value = '';
            docDescription.innerText = '⚠️ Por favor, seleccione un elemento del catálogo oficial.';
            inputCatalog.classList.add('is-invalid');
            inputCatalog.classList.remove('is-valid');
        } else {
            hiddenDocId.value = '';
            docDescription.innerText = '';
            inputCatalog.classList.remove('is-valid', 'is-invalid');
        }
        checkUploadButton();
    });

    if (fileInput) fileInput.addEventListener('change', function() {
        const fileName = this.files[0]?.name || 'Elegir archivo...';
        fileLabel.innerText = fileName;
        checkUploadButton();
    });

    function checkUploadButton() {
        btnUpload.disabled = !(hiddenDocId.value && fileInput.files.length > 0);
    }

    /* =======================================================
       EVENTO: SUBIR DOCUMENTO INDIVIDUAL
       ======================================================= */
    if (btnUpload) btnUpload.addEventListener('click', async function() {
        const docId = hiddenDocId.value;
        const file = fileInput.files[0];

        if (!docId || !file) return;

        btnUpload.disabled = true;
        btnUpload.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Subiendo...';

        const formData = new FormData();
        formData.append('file', file);
        formData.append('document_id', docId);
        formData.append('token', token);
        formData.append('grantor_id', currentGrantorId);

        try {
            const response = await axios.post('/ajax/expediente/upload', formData, {
                headers: { 'Content-Type': 'multipart/form-data' }
            });

            // Éxito: Agregar al historial
            addToFileHistory(inputCatalog.value);
            
            // Limpiar formulario para la siguiente carga
            inputCatalog.value = '';
            hiddenDocId.value = '';
            docDescription.innerText = '';
            fileInput.value = '';
            fileLabel.innerText = 'Elegir archivo...';
            inputCatalog.classList.remove('is-valid');
            
            showAlert(alert3, 'Archivo subido correctamente.', 'success');
            setTimeout(() => alert3.classList.add('d-none'), 3000);

        } catch (error) {
            console.error(error);
            showAlert(alert3, 'Error al subir el archivo. Verifique el tamaño y formato.', 'danger');
        } finally {
            btnUpload.innerHTML = '<span class="icon-cloud-upload mr-2"></span> Subir Documento';
            checkUploadButton();
        }
    });

    function addToFileHistory(docName) {
        // Remover fila de "No hay documentos" si es el primero
        const noDocsRow = document.getElementById('no-docs-row');
        if (noDocsRow) noDocsRow.remove();

        const row = document.createElement('tr');
        row.innerHTML = `
            <td><strong style="color:#0d2b3e;">${docName}</strong></td>
            <td><span class="badge badge-success px-2 py-1">Cargado</span></td>
            <td class="text-right text-success"><span class="icon-check"></span></td>
        `;
        uploadedHistoryBody.prepend(row);
        uploadedCount++;
    }

});
