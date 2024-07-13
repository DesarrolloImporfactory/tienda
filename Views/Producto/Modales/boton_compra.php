<style>
    .modal-content {
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        background-color: <?php echo COLOR_FONDO; ?>;
        color: <?php echo COLOR_LETRAS; ?>;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .modal-header .btn-close {
        color: white;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        border-top: none;
        padding: 10px 20px;
    }

    .modal-footer .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .modal-footer .btn-primary {
        background-color: #ffc107;
        border-color: #ffc107;
        color: white;
    }

    .bnt_elegir {
        background-color: #1337EC;
        border-color: #1337EC;
        color: white;
    }

    .bnt_elegir:hover {
        background-color: #102BB4;
        border-color: #102BB4;
        color: white;
    }
</style>

<div class="modal fade" id="boton_compraModal" tabindex="-1" aria-labelledby="boton_compraModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="boton_compraModalLabel"><i class="fas fa-edit"></i> Solicitar Pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="boton_compra">
                    <input type="hidden" id="id_productoTmp" name="id_productoTmp">
                    <input type="hidden" id="precio_productoTmp" name="precio_productoTmp">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre y Apellido</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre y Apellido">
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" placeholder="Teléfono" oninput="this.value = this.value.replace(/[^0-9+]/g, '')">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="provincia" class="form-label">Provincia</label>
                            <select id="provincia" class="form-select">
                                <option selected>Selecciona una opción</option>
                                <!-- Agregar opciones aquí -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <select id="ciudad" class="form-select">
                                <option selected>Selecciona una opción</option>
                                <!-- Agregar opciones aquí -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="calle_principal" class="form-label">Calle Principal</label>
                            <input type="text" class="form-control" id="calle_principal" placeholder="Calle Principal">
                        </div>
                        <div class="col-md-6">
                            <label for="calle_secundaria" class="form-label">Calle Secundaria</label>
                            <input type="text" class="form-control" id="calle_secundaria" placeholder="Calle Secundaria">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <!-- <div class="col-md-6">
                            <label for="numero_casa" class="form-label">Número de Casa</label>
                            <input type="text" class="form-control" id="numero_casa" placeholder="Número de Casa">
                        </div> -->
                        <div class="mb-3">
                            <label for="referencia" class="form-label">Referencia</label>
                            <input type="text" class="form-control" id="referencia" placeholder="Referencia">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones para la entrega</label>
                        <input type="text" class="form-control" id="observacion" placeholder="Referencias Adicionales (Opcional)">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="boton_compra">Solicitar</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Manejar el envío del formulario
    $('#boton_compra').on('submit', function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario

        let formData = new FormData();
        formData.append("valor", $('#monto').val());
        if ($('#cuenta').val() == "") {
            formData.append("id_cuenta", $('#formadePago').val());
        } else {
            formData.append("id_cuenta", $('#cuenta').val());
        }
        formData.append("otro", $('#otroId').val());

        $.ajax({
            url: SERVERURL + 'wallet/solicitarPago',
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            success: function(response) {
                response = JSON.parse(response);
                if (response.status == 400) {
                    Swal.fire({
                        icon: 'error',
                        title: "Error",
                        text: response.message
                    });
                } else if (response.status == 200) {

                    Swal.fire({
                        icon: 'success',
                        title: "Exito",
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        cargar_saldoWallet();
                        $('#boton_compraModal').modal('hide');
                    });
                }
            },
            error: function(error) {
                console.error('Error al solicitar el pago:', error);
                alert('Hubo un error al solicitar el pago.');
            }
        });
    });

    // Función para cargar provincias
    function cargarProvincias() {
        $.ajax({
            url: "" + SERVERURL + "Ubicaciones/obtenerProvincias", // Reemplaza con la ruta correcta a tu controlador
            method: "GET",
            success: function(response) {
                let provincias = JSON.parse(response);
                let provinciaSelect = $("#provincia");
                provinciaSelect.empty();
                provinciaSelect.append('<option value="">Provincia *</option>'); // Añadir opción por defecto

                provincias.forEach(function(provincia) {
                    provinciaSelect.append(
                        `<option value="${provincia.codigo_provincia}">${provincia.provincia}</option>`
                    );
                });

                // Refrescar Select2 para que muestre las nuevas opciones
                provinciaSelect.trigger("change.select2");
            },
            error: function(error) {
                console.log("Error al cargar provincias:", error);
            },
        });
    }

    // Función para cargar ciudades según la provincia seleccionada
    function cargarCiudades() {
        let provinciaId = $("#provincia").val();
        if (provinciaId) {
            $.ajax({
                url: SERVERURL + "Ubicaciones/obtenerCiudades/" + provinciaId, // Reemplaza con la ruta correcta a tu controlador
                method: "GET",
                success: function(response) {
                    let ciudades = JSON.parse(response);
                    let ciudadSelect = $("#ciudad");
                    ciudadSelect.empty();
                    ciudadSelect.append('<option value="">Ciudad *</option>'); // Añadir opción por defecto

                    ciudades.forEach(function(ciudad) {
                        ciudadSelect.append(
                            `<option value="${ciudad.id_cotizacion}">${ciudad.ciudad}</option>`
                        );
                    });

                    // Refrescar Select2 para que muestre las nuevas opciones
                    ciudadSelect.trigger("change.select2");

                    ciudadSelect.prop("disabled", false); // Habilitar el select de ciudades
                },
                error: function(error) {
                    console.log("Error al cargar ciudades:", error);
                },
            });
        } else {
            $("#ciudad")
                .empty()
                .append('<option value="">Ciudad *</option>')
                .prop("disabled", true)
                .trigger("change.select2"); // Refrescar Select2 para mostrar el estado deshabilitado
        }
    }
</script>