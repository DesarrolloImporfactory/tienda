<?php include 'Views/templates/header3.php'; ?>
<?php $id_producto = $_GET['id']; ?>


<main>
    <section style="margin-top: 100px;">
        <div class="container containerProducto3">
            <div class="row rowProducto3">
                <div class="col">
                    <div class="d-flex flex-column">
                        <img style="width: 400px; height: 400px;" class="border rounded mx-auto" src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSWzLcnrQcRxHe0xxyr8bQQMd1oz6iqoLJlxWaCYUIMYi9zDjF2U2VO7Aldk5aUAs57iO-3H-gpby8Qql8_M3MDQVP4AMU1V4gmW-RDT0Ey1yHk23lUuT5XJDj1p0bLO5rXKrfXwA&usqp=CAc" alt="">
                        <div style="max-width: 400px;" class="d-flex gap-3 mt-3 w-100 mx-auto" >
                            <img class="rounded border " width="60" height="60" src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSWzLcnrQcRxHe0xxyr8bQQMd1oz6iqoLJlxWaCYUIMYi9zDjF2U2VO7Aldk5aUAs57iO-3H-gpby8Qql8_M3MDQVP4AMU1V4gmW-RDT0Ey1yHk23lUuT5XJDj1p0bLO5rXKrfXwA&usqp=CAc" alt="">
                            <img class="rounded border " width="60" height="60" src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSWzLcnrQcRxHe0xxyr8bQQMd1oz6iqoLJlxWaCYUIMYi9zDjF2U2VO7Aldk5aUAs57iO-3H-gpby8Qql8_M3MDQVP4AMU1V4gmW-RDT0Ey1yHk23lUuT5XJDj1p0bLO5rXKrfXwA&usqp=CAc" alt="">
                            <img class="rounded border " width="60" height="60" src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSWzLcnrQcRxHe0xxyr8bQQMd1oz6iqoLJlxWaCYUIMYi9zDjF2U2VO7Aldk5aUAs57iO-3H-gpby8Qql8_M3MDQVP4AMU1V4gmW-RDT0Ey1yHk23lUuT5XJDj1p0bLO5rXKrfXwA&usqp=CAc" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h4 class="" id="nombre-producto"></h4>
                    <div class="precios_producto align-items-center gap-3">
                        <p class="display-6 mb-0">
                            <strong id="precio-especial"></strong>
                        </p>
                        <div id="precio-normal-container">
                            <p class="fs-4 mb-0">
                                <span id="precio-normal"></span>
                            </p>
                        </div>
                        <div id="ahorra-container" class="text-white rounded p-1 px-3"
                            style="background-color: #4464ec;">
                            <p class="mb-0 d-flex align-items-center gap-3" style="font-size: 13px;">
                                <i class="bx bxs-purchase-tag" style="color: white; font-size: 17px;"></i>
                                <span id="ahorra"></span> 
                            </p>
                        </div>
                    </div>
                    <div class="my-4"> 
                        <label for="quantity" class="form-label">Cantidad</label>
                        <input type="number" id="cantidad_producto" class="form-control"
                            style="border-radius:0.3rem !important;width: 20%;" id="quantity" value="1" min="1">
                    </div>
                    <a class="jump-button btn btn-primary texto_boton rounded w-100" href="#" id="comprar-ahora">
                        COMPRAR AHORA
                    </a>
                    <div id="landing">

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imagenModalLabel">Visualización de Imagen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="" id="imagenEnModal" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section> 
</main>
<script>

$(document).ready(function () {
        var id_producto = '<?php echo $_GET['id']; ?>';
        let formData = new FormData();
        formData.append("id_plataforma", ID_PLATAFORMA);
        formData.append("id_producto_tienda", id_producto);

        var id_productoPrincipal = "";

        $.ajax({
            url: SERVERURL + 'Tienda/obtener_productos_tienda',
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function (response) {

                if (response.length > 0) {

                    var producto = response[0]; // Asumimos que el primer producto es el deseado

                    var precioEspecial = parseFloat(producto.pvp_tienda);
                    var precioNormal = parseFloat(producto.pref_tienda);

                    var ahorro = 0;
                    if (precioNormal > 0) {
                        ahorro = 100 - (precioEspecial * 100 / precioNormal);
                    } else {
                        $('#precio-normal-container').hide();
                        $('#ahorra-container').hide();
                    }
                    $('#nombre-producto').text(producto.nombre_producto_tienda);
                    $('#precio-especial').text('$' + parseFloat(precioEspecial).toFixed(2));
                    $('#precio-normal').text('$' + parseFloat(precioNormal).toFixed(2));
                    $('#ahorra').text('%' + parseFloat(ahorro).toFixed(2));

                    // Ocultamos el precio normal y el contenedor de ahorro ya que no se utilizan en el ejemplo proporcionado
                    if (ahorro == 0) {
                        $('#ahorra-container').hide();
                    }

                    // Manejo de imágenes
                    var mainImageSrc = producto.imagen_principal_tienda;
                    mainImageSrc = obtenerURLImagen(mainImageSrc, SERVERURL);

                    $('#main-image').attr('src', mainImageSrc);

                    // Miniaturas - comenzamos con la imagen principal como primera miniatura
                    var thumbnailsHtml = `
                <a class="list-group-item list-group-item-action active" style="max-width: 100px !important; max-height: 100px !important; padding:0;" id="list-image0-list" data-bs-toggle="list" href="#list-image0" role="tab" aria-controls="image0">
                    <img src="${mainImageSrc}" class="img-thumbnail">
                </a>
            `;

                    // Suponemos que `producto.imagenes` es un array de URLs de imágenes
                    if (producto.imagenes && producto.imagenes.length > 0) {
                        producto.imagenes.forEach(function (imagen, index) {
                            var imagePath = imagen.url;
                            imagePath = obtenerURLImagen(imagePath, SERVERURL);
                            thumbnailsHtml += `
                        <a class="list-group-item list-group-item-action ${index === 0 ? 'active' : ''}" style="max-width: 100px !important; max-height: 100px !important; padding:0;" id="list-image${index + 1}-list" data-bs-toggle="list" href="#list-image${index + 1}" role="tab" aria-controls="image${index + 1}">
                            <img src="${imagePath}" class="img-thumbnail">
                        </a>
                    `;
                        });
                        $('#list-tab').html(thumbnailsHtml);

                        // Eventos para las miniaturas
                        $('#list-tab a').on('click', function (e) {
                            e.preventDefault();
                            var targetImage = $(this).find('img').attr('src');
                            $('#main-image').attr('src', targetImage);
                        });
                    }

                    // Solicitud adicional para cargar imágenes adicionales
                    $.ajax({
                        url: SERVERURL + 'Tienda/listar_imagenAdicional_productosTienda',
                        method: 'POST',
                        data: formData,
                        processData: false, // No procesar los datos
                        contentType: false, // No establecer ningún tipo de contenido
                        dataType: "json",
                        success: function (imagenesAdicionales) {
                            if (imagenesAdicionales && imagenesAdicionales.length > 0) {
                                imagenesAdicionales.forEach(function (imagen, index) {
                                    var imagePath = imagen.url;
                                    imagePath = obtenerURLImagen(imagePath, SERVERURL);
                                    thumbnailsHtml += `
                                <a class="list-group-item list-group-item-action" style="max-width: 100px !important; max-height: 100px !important; padding:0;" id="list-image-extra${index + 1}-list" data-bs-toggle="list" href="#list-image-extra${index + 1}" role="tab" aria-controls="image-extra${index + 1}">
                                    <img src="${imagePath}" class="img-thumbnail">
                                </a>
                            `;
                                });
                                // Añadimos las miniaturas adicionales al contenedor
                                $('#list-tab').append(thumbnailsHtml);

                                // Reasignamos los eventos de click para las nuevas miniaturas
                                $('#list-tab a').on('click', function (e) {
                                    e.preventDefault();
                                    var targetImage = $(this).find('img').attr('src');
                                    $('#main-image').attr('src', targetImage);
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Error al obtener las imágenes adicionales:', error);
                            console.log(xhr.responseText);
                        }
                    });

                    // Modal para la imagen principal
                    $('#main-image').on('click', function () {
                        var modalImageSrc = $(this).attr('src');
                        $('#imagenEnModal').attr('src', modalImageSrc);
                    });

                    // Botón de comprar
                    $('#comprar-ahora').on('click', function () {
                        agregar_tmp(producto.id_producto, parseFloat(producto.pvp_tienda), producto.id_inventario);
                    });

                    id_productoPrincipal = producto.id_producto;
                    cargarLanding(id_producto);
                } else {
                    console.error('No se encontraron productos.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error al obtener los datos:', error);
                console.log(xhr.responseText);
            }
        });


        // Manejo del navbar y logo al hacer scroll
        window.onscroll = function () {
            var nav = document.getElementById('navbarId');
            var logo = document.getElementById("navbarLogo");
            logo.style.maxHeight = "60px";
            logo.style.maxWidth = "60px";
            if (window.pageYOffset > 100) {
                nav.style.height = "70px";
            } else {
                nav.style.height = "100px";
                logo.style.maxHeight = "100px";
                logo.style.maxWidth = "100px";
            }
        };

        // Evento para mostrar el modal de imagen
        $('#imagenModal').on('show.bs.modal', function (event) {
            var imageSrc = $('#main-image').attr('src');
            $('#imagenEnModal').attr('src', imageSrc);
        });

        /* Carga de landing */
        /* cargarLanding(id_productoPrincipal); */
        /* Fin carga de landing */
    });
</script>

<?php include 'Views/templates/footer3.php'; ?>
