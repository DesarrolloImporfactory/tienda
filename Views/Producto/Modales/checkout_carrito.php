<style>
    /* Seccion Hidden */
    .list-group-item {
        display: flex;
        flex-direction: column;
        /* Asegura que el contenido fluya de arriba hacia abajo */
    }

    .edit-section {
        width: 100%;
        /* Ocupa todo el ancho disponible */
        /* Otros estilos que desees aplicar */
    }

    .hidden {
        display: none;
        /* Oculta la sección */
    }

    /* Este estilo se aplica cuando se muestra la sección */
    .edit-section:not(.hidden) {
        display: block;
        /* O 'flex' si necesitas más control sobre el contenido interior */
    }

    .caja_transparente {
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .caja_variable {
        padding-top: 10px;
        padding-right: 10px !important;
        padding-left: 10px !important;
        border-radius: 0.5rem;
        background-color: #dedbdb;
    }

    .caja_oferta {
        padding: 10px;
        border-radius: 0.5rem;
        background-color: rgba(0, 164, 251, 0.5);
        /* 50% de opacidad */
    }

    .discount-code-container {
        max-width: 300px;
        /* O el ancho que prefieras */
        padding-top: 10px;
    }

    .applied-discount {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
        padding: 5px 10px;
        background: #f2f2f2;
        /* Fondo gris claro para destacar */
        border-radius: 5px;
    }

    .discount-tag {
        font-weight: bold;
    }

    .close {
        font-size: 20px;
        color: #000;
        opacity: 0.6;
    }

    .close:hover {
        opacity: 1;
    }

    .sub_titulos {
        font-size: 17px;
        font-weight: 700;
    }

    hr {
        border: none;
        /* Quita el borde predeterminado */
        height: 2px;
        /* Ajusta el grosor de la línea */
        background-color: #000;
        /* Ajusta el color de la línea */
        margin: 15px 0;
        /* Ajusta el espaciado vertical de la línea */
    }

    .input-group-text {
        /* background: transparent; */
        background: #d1d1d1;
        color: black !important;
        padding-right: 0;
        /* Remover el espacio a la derecha del ícono si es necesario */
    }

    .form-group .input-group .form-control {
        border: 1px solid #ced4da;
        /* Ajusta al color de borde deseado */
        border-left: none;
        /* Remueve el borde izquierdo donde se unen el ícono y el input */
    }

    /* Ajusta el tamaño y el color del icono según sea necesario */
    .bx {
        font-size: 1.5rem;
        /* Tamaño del icono */
        color: black;
        /* Color del icono */
        margin-right: 10px;
    }

    .icon-btn.active i {
        color: white;
        /* O puedes usar #FFFFFF */
    }

    .form-group {
        margin: 0 !important;
    }

    .btn_comprar {
        border-radius: 0.8rem;
        padding-right: 25%;
        padding-left: 25%;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        font-size: 17px;
    }

    /* animaciones del boton comprar */
    /* Animación Bounce */
    .bounce {
        animation: bounce 1.2s ease-in-out infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    /* Animación Shake */
    .shake {
        animation: shake 6s linear infinite;
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        10%,
        20%,
        30%,
        40%,
        50%,
        60%,
        70%,
        80%,
        90% {
            transform: translateX(5px);
        }

        15%,
        25%,
        35%,
        45%,
        55%,
        65%,
        75%,
        85%,
        95% {
            transform: translateX(-5px);
        }
    }

    /* Animación Pulse */
    .pulse {
        animation: pulse 1s ease-in-out infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    .selectable-combo {
        border-radius: 0.6rem;
        border: 2px solid grey;
        /* Borde inicial */
        padding: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        /* Transición para suavizar el cambio */
    }

    .selectable-combo.selected {
        border-color: blue;
        /* Cambiar el borde a azul cuando esté seleccionado */
        background-color: #e0f7ff;
        /* Fondo azul claro cuando esté seleccionado */
    }
</style>


<div id="checkout_carritoModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div id="tituloFormularioPreview">
                    <h4 id="texto_tituloPreview">PAGA AL RECIBIR EN CASA!</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="combos_carritoContainer">
                    <!-- Aquí se llenará el contenido dinámico con AJAX -->
                </div>
                <div class="custom-card-body">
                    <div id="productos_carritoContainer">
                        <!-- Aquí se llenará el contenido dinámico con AJAX -->
                    </div>
                    <div class="custom-card-footer">
                        <div class="custom-summary">
                            <div>Subtotal</div>
                            <div><span id="productos_carritoSubtotal"></span></div>
                        </div>
                        <div class="custom-summary">
                            <div>Envío</div>
                            <!-- <div class="free-shipping">Gratis</div> -->
                        </div>
                        <div class="custom-summary" id="descuento_carrito" style="display: none;">
                            <div>Descuento</div>
                            <div><span id="productos_carritoDescuento" style="color: red; font-weight: 600"></span></div>
                        </div>
                        <div class="custom-total">
                            <div>Total</div>
                            <div class="total-price"><span id="productos_carritoTotal"></span></div>
                        </div>
                    </div>
                </div>

                <form class="form-horizontal" id="formulario">
                    <input type="hidden" id="id_productoTmp_carrito" name="id_productoTmp_carrito">
                    <input type="hidden" id="total_carrito" name="total_carrito">
                    <input type="hidden" id="combo_selected" name="combo_selected" value="0">
                    <input type="hidden" id="combo_id" name="combo_id">

                    <input type="hidden" id="total_principal" name="total_principal">

                    <div id="gracias" class="modal-content">
                        <div id="previewContainer" class="p-3">
                            <div id="resultados" class="modal-body" style="padding: 5px">
                            </div>

                            <div id="tarifasEnvioPreview">
                                <hr />
                                <p id="titulo_tarifaPreview" style="font-weight:bold;">Método de envío</p>
                                <div class="caja_transparente d-flex flex-row">
                                    <label for="envioGratisPreview"> Envío gratis</label>
                                    <label id="gratisPreview" style="width: 60%; text-align: end; font-weight:bold;">Gratis</label>
                                </div>
                                <hr />
                            </div>

                            <!--  código de descuento -->
                            <div class="discount-code-container" id="codigosDescuentoPreview">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Código de descuento" id="etiqueta_descuentoPreview" aria-label="Código de descuento">
                                    <button class="btn btn-dark" id="textoBtn_aplicarPreview" type="button">Aplicar</button>
                                </div>
                                <div class="applied-discount">
                                    <span class="discount-tag">4SALE $4.00</span>
                                </div>
                            </div>
                            <!--  código de descuento -->

                            <!-- Nombre y apellidos -->
                            <div class="form-group mb-3" id="nombresApellidosPreview">
                                <label class="sub_titulos">Nombres y Apellidos</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="icono_nombresApellidosPreview"><i class='bx bxs-user'></i></span>
                                    <input type="text" class="form-control" id="txt_nombresApellidosPreview" name="txt_nombresApellidosPreview" placeholder="Nombre y Apellido">
                                </div>
                            </div>
                            <!-- Fin Nombre y apellidos -->

                            <!-- Teléfono -->
                            <div class="form-group mb-3" id="telefonoPreview">
                                <label class="sub_titulos">Teléfono</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="icono_telefonoPreview"><i class='bx bxs-phone-call'></i></span>
                                    <input type="text" class="form-control" id="txt_telefonoPreview" name="txt_telefonoPreview" placeholder="Teléfono">
                                </div>
                            </div>
                            <!-- Fin Teléfono -->

                            <!-- Calle Principal -->
                            <div class="form-group mb-3" id="calle_principalPreview">
                                <label class="sub_titulos" id="titulo_calle_principalPreview">Calle Principal</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="icono_calle_principalPreview"><i class='bx bx-map'></i></span>
                                    <input type="text" class="form-control" id="txt_calle_principalPreview" name="txt_calle_principalPreview" placeholder="">
                                </div>
                            </div>
                            <!-- Fin Calle Principal -->

                            <!-- Calle Secundaria -->
                            <div class="form-group mb-3" id="calle_secundariaPreview">
                                <label class="sub_titulos" id="titulo_calle_secundariaPreview">Calle Secundaria</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="icono_calle_secundariaPreview"><i class='bx bx-map'></i></span>
                                    <input type="text" class="form-control" id="txt_calle_secundariaPreview" name="txt_calle_secundariaPreview" placeholder="">
                                </div>
                            </div>
                            <!-- Fin Calle Secundaria -->

                            <!-- Barrio o Referencia -->
                            <div class="form-group mb-3" id="barrio_referenciaPreview">
                                <label class="sub_titulos" id="titulo_barrio_referenciaPreview">Barrio o Referencia</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="icono_barrio_referenciaPreview"><i class='bx bx-map'></i></span>
                                    <input type="text" class="form-control" id="txt_barrio_referenciaPreview" name="txt_barrio_referenciaPreview" placeholder="">
                                </div>
                            </div>
                            <!-- Fin Barrio o Referencia -->

                            <!-- Provincia -->
                            <div class="form-group mb-3" id="provinciaPreview">
                                <label class="sub_titulos" id="titulo_provinciaPreview">Provincia</label>
                                <select class="form-control" id="provinica" name="provinica">
                                    <option value="">Provincia *</option>
                                </select>
                            </div>
                            <!-- Fin Provincia -->

                            <!-- Ciudad -->
                            <div class="form-group mb-3" id="ciudadPreview">
                                <label class="sub_titulos" id="titulo_ciudadPreview">Ciudad</label>
                                <div id="div_ciudad">
                                    <select class="form-control" id="ciudad_entrega" name="ciudad_entrega">
                                        <option value="">Ciudad *</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Fin Ciudad -->

                            <!-- Comentario -->
                            <div class="form-group mb-3" id="comentarioPreview">
                                <label class="sub_titulos" id="titulo_comentarioPreview">Comentario</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="icono_barrio_referenciaPreview"><i class='bx bx-message-dots'></i></span>
                                    <input type="text" class="form-control" id="txt_comentarioPreview" name="txt_comentarioPreview" placeholder="">
                                </div>
                            </div>
                            <!-- Fin Comentario -->
                        </div>

                        <div class="card p-3 mb-3" style="border: 1px solid #007bff; background-color: #e9f4ff; width: 90%; align-self: center;" id="seccion_oferta">
                            <div class="d-flex justify-content-start align-items-center">
                                <input type="checkbox" id="Seleccion_oferta" class="me-2" onchange="toggleSeleccion_oferta(this)">
                                <input type="hidden" id="id_producto_oferta" name="id_producto_oferta">
                                <input type="hidden" id="oferta_selected" name="oferta_selected" value="0">
                                <label for="Seleccion_oferta" class="m-0">
                                    <strong><span style="font-weight:bold;" id="nombre_oferta"></span></strong> por solo
                                    <strong><span id="precio_oferta"></span></strong>
                                </label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <!-- Botón Comprar -->
                            <div id="btn_comprarPreview" class="d-flex justify-content-center" style="padding: 20px;">
                                <button class="btn btn-dark btn_comprar" id="textoBtn_comprarPreview" type="button" onclick="realizar_pedido()">COMPRAR AHORA</button>
                            </div>
                            <!-- Fin Botón Comprar -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    // Funcion para que consuma los datos de checkout.json y los utilice

    document.addEventListener('DOMContentLoaded', function() {
        loadAndSetInitialData();
    });

    function loadAndSetInitialData() {
        id_plataforma = <?php echo ID_PLATAFORMA; ?>

        $.getJSON(SERVERURL + 'Models/modales/' + id_plataforma + '_modal.json', function(data) {
            data.forEach(item => {
                processItem(item);
            });
        }).fail(handleLoadingError);
    }

    function processItem(item) {
        Object.keys(item.content).forEach(key => {
            updateFieldAndPreview(key, item.content[key], item.id_elemento);
        });
        toggleVisibility(item.estado, item.id_elemento);
        reorderElements(item.id_elemento, item.posicion);
    }

    function updateFieldAndPreview(key, value, id_elemento) {
        const field = $('#' + key);
        const previewField = $('#' + key + 'Preview');

        // Aplicar valor al campo y disparar evento change para asegurar cualquier lógica de UI
        updateFieldValue(field, value);

        // Específico para animaciones y colores
        if (key === 'animacionBtn_comprar') {
            const btnPreview = $('#textoBtn_comprarPreview');
            btnPreview.removeClass('bounce shake pulse');
            btnPreview.addClass(value);
        } else if (key.startsWith('color')) {
            // Asegurarse de que se actualice el color directamente en la vista previa adecuadamente
            applyColor(key, value, previewField);
        } else if (key.includes('txt_')) {
            previewField.attr('placeholder', value);
        } else if (key.includes('icono')) {
            previewField.html("<i class='" + value + "'></i>");
        } else {
            previewField.text(value);
        }
    }

    function applyColor(key, value, previewField) {
        if (key === 'colorBtn_comprar') {
            // Aplicar el color directamente al botón de compra en la vista previa
            $('#textoBtn_comprarPreview').css('background-color', value);
        } else if (key === 'colorTxt_titulo') {
            $('#texto_tituloPreview').css('color', value);
        } else {
            // Aplica color general si es necesario a otros elementos
            previewField.css('color', value);
        }
    }

    function updateFieldValue(field, value) {
        if (field.is(':checkbox')) {
            field.prop('checked', value === 'on');
        } else {
            field.val(value).change(); // Trigger change for preview updates
        }
    }

    function updatePreviewField(key, previewField, value) {
        if (!previewField.length) {
            console.warn('No preview field found for', key);
            return;
        }

        if (key.includes('txt_')) {
            previewField.attr('placeholder', value);
        } else if (key.includes('icono')) {
            previewField.html("<i class='" + value + "'></i>");
        } else {
            previewField.text(value);
        }
    }

    function toggleVisibility(state, id_elemento) {
        const preview = $('#' + id_elemento + 'Preview');
        const toggleButton = $('#' + id_elemento).find('.toggle-visibility i');

        // Actualiza la visibilidad del elemento
        if (state === '0') {
            preview.hide();
            toggleButton.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            preview.show();
            toggleButton.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    }

    function reorderElements(id_elemento, position) {
        const element = $('#' + id_elemento);
        const preview = $('#' + id_elemento + 'Preview');
        reorderElement(element, position, '.list-group');
        reorderElement(preview, position, '#previewContainer');
    }

    function reorderElement(element, position, containerSelector) {
        if (element.index() !== position) {
            element.detach();
            position === 0 ? $(containerSelector).prepend(element) : $(containerSelector).children().eq(position - 1).after(element);
        }
    }

    function updateTextAlignment(value) {
        const textAlign = value === '1' ? 'left' : value === '2' ? 'center' : 'right';
        $('#tituloFormularioPreview').css('text-align', textAlign);
    }

    function updateColor(key, value) {
        if (key === 'colorTxt_titulo') {
            $('#texto_tituloPreview').css('color', value);
        } else if (key === 'colorBtn_aplicar') {
            $('#textoBtn_aplicarPreview').css('background-color', value);
        } else if (key === 'colorBtn_comprar') {
            $('#textoBtn_comprarPreview').css('background-color', value);
        }
    }

    function handleLoadingError(jqXHR, textStatus, errorThrown) {
        console.error('Error loading JSON:', textStatus, errorThrown);
    }

    function consultar_configuracion() {
        return new Promise((resolve, reject) => {
            let formData = new FormData();
            formData.append("id_plataforma", ID_PLATAFORMA);

            $.ajax({
                url: SERVERURL + "Tienda/obtener_configuracion",
                type: "POST",
                data: formData,
                processData: false, // No procesar los datos
                contentType: false, // No establecer ningún tipo de contenido
                dataType: "json",
                success: function(response) {
                    // Verifica que la respuesta sea un array y que tenga al menos un elemento
                    if (Array.isArray(response) && response.length > 0) {
                        resolve(response[0].id); // Resuelve la promesa con el id_configuracion
                    } else {
                        reject("No se encontró la configuración o está vacía");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    reject(errorThrown); // Rechaza la promesa con el error
                }
            });

        });
    }

    function formatearTelefono(telefono) {
        // Si el número tiene exactamente 9 dígitos, agrega "593" al inicio
        if (telefono.length === 9 && /^\d{9}$/.test(telefono)) {
            return '593' + telefono;
        }
        // Si el número empieza con "0", reemplaza el "0" por "593"
        if (telefono.startsWith('0')) {
            return '593' + telefono.slice(1);
        }
        // Si el número empieza con "+593", quita el "+"
        if (telefono.startsWith('+593')) {
            return telefono.slice(1);
        }
        // Si el número ya comienza con "593", lo deja igual
        if (telefono.startsWith('593')) {
            return telefono;
        }
        // Si no cumple con ninguno de los casos anteriores, retorna el número tal cual
        return telefono;
    }

    /* boton de comprar */
    async function realizar_pedido() {
        try {
            // Obtener la configuración, pero manejar el caso en que no se devuelva nada
            let id_configuracion;
            try {
                id_configuracion = await consultar_configuracion(); // Espera a que consultar_configuracion se resuelva
            } catch (error) {
                console.warn("No se pudo obtener la configuración: ", error);
                id_configuracion = ""; // Asignar valor vacío si no se pudo obtener la configuración
            }

            const session_id = "<?php echo session_id(); ?>";

            let formData = new FormData();
            formData.append("combo_selected", $('#combo_selected').val());
            formData.append("combo_id", $('#combo_id').val());
            formData.append("id_plataforma", ID_PLATAFORMA);
            formData.append("id_producto", $('#id_productoTmp_carrito').val());
            formData.append("total", $('#total_carrito').val());
            formData.append("nombre", $('#txt_nombresApellidosPreview').val());
            formData.append("telefono", formatearTelefono($('#txt_telefonoPreview').val()));
            formData.append("provincia", $('#provinica').val());
            formData.append("ciudad", $('#ciudad_entrega').val());
            formData.append("calle_principal", $('#txt_calle_principalPreview').val());
            formData.append("calle_secundaria", $('#txt_calle_secundariaPreview').val());
            formData.append("referencia", $('#txt_barrio_referenciaPreview').val());
            formData.append("observacion", $('#txt_comentarioPreview').val());
            formData.append("oferta_selected", $('#oferta_selected').val());
            formData.append("id_producto_oferta", $('#id_producto_oferta').val());
            formData.append("tmp", session_id);
            formData.append("id_configuracion", id_configuracion); // Usa el id_configuracion, que podría estar vacío

            $.ajax({
                url: SERVERURL + 'Tienda/guardar_pedido_carrito',
                method: 'POST',
                data: formData,
                processData: false, // No procesar los datos
                contentType: false, // No establecer ningún tipo de contenido
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 400) {
                        toastr.error(
                            "NO SE REALIZO LA PETICION CORRECTAMENTE",
                            "NOTIFICACIÓN", {
                                positionClass: "toast-bottom-center"
                            }
                        );
                    } else if (response.status == 200) {
                        toastr.success("SE REALIZO LA PETICION CORRECTAMENTE", "NOTIFICACIÓN", {
                            positionClass: "toast-bottom-center",
                        });

                        cerrarCarrito(); // Cerrar carrito
                        limpiar_carrito(); // Limpiar carrito
                        $('#cartDropdown').trigger('click'); // Recargar el carrito

                        $('#checkout_carritoModal').modal('hide'); // Cerrar modal
                    }
                },
                error: function(error) {
                    console.error('Error al solicitar el pago:', error);
                    alert('Hubo un error al solicitar el pago.');
                }
            });
        } catch (error) {
            console.error("Error al obtener la configuración o realizar el pedido: ", error);
            alert("Error al obtener la configuración o realizar el pedido");
        }
    }
    /* Fin boton de comprar */

    $(document).ready(function() {
        // Escuchar clics en los combos
        $('#combos_carritoContainer').on('click', '.selectable-combo', function() {
            // Verificar si el combo ya está seleccionado
            if ($(this).hasClass('selected')) {
                // Si está seleccionado, deseleccionarlo
                $(this).removeClass('selected');
                $('#combo_selected').val(0); // Marcar que no hay combo seleccionado
                $('#combo_id').val(''); // Limpiar el id del combo
                $("#descuento_carrito").hide();

                $('#productos_carritoSubtotal').text("$" + $('#total_principal').val());
                $('#productos_carritoTotal').text("$" + $('#total_principal').val());

            } else {
                // Si no está seleccionado, deseleccionar otros combos
                $('.selectable-combo').removeClass('selected');

                // Seleccionar este combo
                $(this).addClass('selected');

                // Obtener el id_combo del atributo data-id-combo
                let idCombo = $(this).data('id-combo');

                // Actualizar los valores de los inputs hidden
                $('#combo_selected').val(1); // Marcar que hay un combo seleccionado
                $('#combo_id').val(idCombo); // Asignar el id del combo seleccionado

                /* combo */
                let formData_combo = new FormData();
                formData_combo.append("id_combo", idCombo);

                $.ajax({
                    url: SERVERURL + "Tienda/obtener_combo_idCombo",
                    type: "POST",
                    data: formData_combo,
                    processData: false, // No procesar los datos
                    contentType: false, // No establecer ningún tipo de contenido
                    dataType: "json",
                    success: function(response) {

                        /* detalle combo */
                        let formData_detalle = new FormData();
                        formData_detalle.append("id_combo", idCombo);

                        // Inicializar el acumulador
                        let totalPvp = 0;
                        let precio_total = 0;
                        let valor_combo = response[0].valor;
                        let estado_combo = response[0].estado_combo;
                        let ahorro = "";

                        $.ajax({
                            url: SERVERURL + "Tienda/obtener_detalle_combo_id",
                            type: "POST",
                            data: formData_detalle,
                            processData: false, // No procesar los datos
                            contentType: false, // No establecer ningún tipo de contenido
                            dataType: "json",
                            success: function(response2) {
                                // Iterar sobre cada elemento en la respuesta
                                response2.forEach(function(detalle_combo) {
                                    // Sumar el pvp de cada elemento al acumulador
                                    totalPvp += parseFloat(detalle_combo.pvp) * detalle_combo.cantidad; // Asegúrate de convertir a número
                                });

                                if (estado_combo == 1) {
                                    precio_total = totalPvp * (1 - valor_combo / 100);
                                    ahorro = `<span class="custom-discount" id="ahorro_preview">${valor_combo}% OFF</span>`;
                                } else if (estado_combo == 2) {
                                    precio_total = totalPvp - valor_combo;
                                }

                                $('#productos_carritoSubtotal').text(`$${totalPvp.toFixed(2)}`);
                                $('#productos_carritoTotal').text(`$${precio_total.toFixed(2)}`);

                                if (estado_combo == 1) {
                                    $('#productos_carritoDescuento').text(`-${valor_combo}%`);

                                } else if (estado_combo == 2) {
                                    $('#productos_carritoDescuento').text(`-$${valor_combo}`);
                                }

                                $("#descuento_carrito").show();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alert(errorThrown);
                            },
                        });
                        /* Fin detalle combo */
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    },
                });

                /* Fin combo */
            }
        });
    });

    function toggleSeleccion_oferta(checkbox) {

        if (checkbox.checked) {
            // Si el checkbox está seleccionado, asignar el valor "1"
            $("#oferta_selected").val(1);
        } else {
            // Si el checkbox está deseleccionado, asignar el valor "0"
            $("#oferta_selected").val(0);
        }
    }
</script>