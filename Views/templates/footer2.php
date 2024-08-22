<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5 style="text-transform: uppercase;">Acerca de <?php echo NOMBRE_TIENDA; ?></h5>
                    <img src="<?php echo SERVERURL . LOGO_TIENDA; ?>" alt="IMPORT SHOP" width="40px" height="40px">
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">
                    <h5>Síguenos</h5>
                    <p>
                        <a href="<?php echo FACEBOOK; ?>" target="_blank"><i class="fab fa-facebook"></i> Facebook</a><br>
                        <a href="<?php echo INSTRAGRAM; ?>" target="_blank"><i class="fab fa-instagram"></i> Instagram</a><br>
                        <a href="<?php echo TIKTOK; ?>" target="_blank"><i class="fab fa-tiktok"></i> TikTok</a>
                    </p>
                </div>
                <div class="col-md-3">
                    <h5>Información de contacto</h5>
                    <p><i class="fab fa-whatsapp"></i> <?php echo formatPhoneNumber(TELEFONO); ?></p>
                    <!-- <p><i class="fas fa-envelope"></i> ventas@imporshop.app</p> -->
                </div>
            </div>
        </div>
    </div>
    <div class="footer copyright text-center">
        <p>&copy; 2024 Construye tu tienda online con IMPORSUIT S.A.| Todos los derechos reservados.</p>
    </div>
</footer>
<!-- No repetir la carga de jQuery -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.3/date-1.5.2/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/sr-1.4.1/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://kit.fontawesome.com/0022adc953.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<script>
    // Cargar categorías y construir el menú de navegación
    let formDataCategoria = new FormData();
    formDataCategoria.append("id_plataforma", ID_PLATAFORMA);

    $.ajax({
        url: SERVERURL + 'Tienda/categoriastienda',
        method: 'POST',
        data: formDataCategoria,
        contentType: false,
        processData: false,
        success: function(response) {
            let categorias = JSON.parse(response);

            // Verifica si la respuesta es un array o un objeto
            if (!Array.isArray(categorias)) {
                categorias = Object.values(categorias);
            }

            let categoriasHtml = '';

            categorias.forEach(categoria => {
                categoriasHtml += `
                <li class="nav-item">
                    <a class="nav-link" href="categoria2?id_cat=${categoria.id_linea}">${categoria.nombre_linea}</a>
                </li>
            `;
            });

            // Agrega el HTML generado al menú de navegación
            $('#categories-menu').html(categoriasHtml);

            // Inicializar OwlCarousel para pantallas grandes
            if (window.innerWidth >= 992) {
                $('#categories-menu').addClass('owl-carousel');
                $('#categories-menu').owlCarousel({
                    loop: false,
                    margin: 10,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        992: {
                            items: 5 // Muestra 5 ítems en pantallas grandes
                        }
                    },
                    nav: true,
                    navText: [
                        '<i class="fas fa-chevron-left"></i>',
                        '<i class="fas fa-chevron-right"></i>'
                    ]
                });
            } else {
                $('#categories-menu').removeClass('owl-carousel');
            }
        },
        error: function(error) {
            console.error("Error al consumir la API:", error);
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const subNavbar = document.getElementById('subNavbar');

        navbarToggler.addEventListener('click', function() {
            subNavbar.classList.toggle('show');
        });
    });

    // Abrir el panel del carrito cuando se haga clic en el icono
    $('#cartDropdown').on('click', function(event) {
        event.preventDefault();

        // Mostrar el panel del carrito y el overlay
        $('#cartSidebar').addClass('open');
        $('#cartOverlay').addClass('show');

        session_id = "<?php echo session_id(); ?>";
        let formData = new FormData();
        formData.append("session_id", session_id); // Añadir el SKU al FormData

        // Cargar los productos del carrito vía AJAX
        $.ajax({
            url: SERVERURL + 'Tienda/buscar_carrito', // Cambia esta URL a tu API real
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    let cartHTML = '';
                    let total = 0; // Variable para almacenar el total

                    data.forEach(function(product) {
                        let enlace_imagen = obtenerURLImagen(product.image_path, "https://new.imporsuitpro.com/");
                        let precioProducto = parseFloat(product.precio_tmp).toFixed(2);
                        let cantidadProducto = parseInt(product.cantidad_tmp);
                        let subtotal = precioProducto * cantidadProducto;

                        total += subtotal; // Sumar al total

                        cartHTML += `
                    <div class="cart-product" data-product-id="${product.id_tmp}">
                        <img src="${enlace_imagen}" class="icon-button" alt="imagen" width="50px">
                        <button class="eliminar_producto_carrito custom-delete-button"><i class='bx bx-x' style="color:white;"></i></button>
                        <p><strong>${product.nombre_producto}</strong></p>
                        <p>${precioProducto}</p>
                        <div class="d-flex flex-row gap-3">
                            <p>Cantidad: <span class="product-quantity">${cantidadProducto}</span></p>
                            <div class="quantity-controls">
                                <button class="btn btn-sm btn-primary increase-quantity">+</button>
                                <button class="btn btn-sm btn-secondary decrease-quantity">-</button>
                            </div>
                        </div>
                        <hr>
                    </div>`;
                    });

                    cartHTML += `<hr><p><strong>Total: $${total.toFixed(2)}</strong></p>`;
                    cartHTML += `<button id="realizarCompraBtn" class="btn btn-success">Realizar compra</button>`;

                    $('#cartContent').html(cartHTML);
                } else {
                    $('#cartContent').html('<p>No hay productos en el carrito.</p>');
                }
            },
            error: function() {
                $('#cartContent').html('<p>Error al cargar el carrito.</p>');
            }
        });
    });

    // Función para realizar la compra
    $(document).on('click', '#realizarCompraBtn', function() {
        alert('Compra realizada con éxito. Aquí puedes agregar la lógica de redirección o envío a tu API.');
        // Aquí puedes agregar la lógica para enviar los datos del carrito al backend y procesar la compra
    });

    // Cerrar el panel del carrito cuando se haga clic en el botón de cerrar
    $('#closeCart').on('click', function() {
        $('#cartSidebar').removeClass('open');
        $('#cartOverlay').removeClass('show');
    });

    // Cerrar el panel del carrito cuando se haga clic fuera del mismo (en el overlay)
    $('#cartOverlay').on('click', function() {
        $('#cartSidebar').removeClass('open');
        $('#cartOverlay').removeClass('show');
    });

    // Aumentar o disminuir la cantidad de productos
    $(document).on('click', '.increase-quantity', function() {
        let productId = $(this).closest('.cart-product').data('product-id');
        let quantityElement = $(`.cart-product[data-product-id="${productId}"] .product-quantity`);
        let currentQuantity = parseInt(quantityElement.text());
        let newQuantity = currentQuantity + 1;

        let formData = new FormData();
        formData.append("id_tmp", productId);
        formData.append("cantidad_nueva", newQuantity);

        $.ajax({
            url: 'https://new.imporsuitpro.com/Tienda/sumar_carrito', // URL de la API para actualizar la cantidad
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function(response) {
                if (response.status == 200) {
                    quantityElement.text(newQuantity);
                    // Recargar el carrito para actualizar el total
                    $('#cartDropdown').trigger('click');
                } else {
                    alert('Error al actualizar la cantidad');
                }
            },
            error: function() {
                alert('Error al actualizar la cantidad');
            }
        });
    });

    $(document).on('click', '.eliminar_producto_carrito', function() {
        let productId = $(this).closest('.cart-product').data('product-id');
        let productElement = $(this).closest('.cart-product'); // Referencia al contenedor del producto en el DOM

        let formData = new FormData();
        formData.append("id_tmp", productId);

        $.ajax({
            url: 'https://new.imporsuitpro.com/Tienda/eliminar_carrito', // URL de la API para eliminar el producto del carrito
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function(response) {
                if (response.status == 200) {
                    // Eliminar el producto del DOM tras una eliminación exitosa
                    productElement.remove();
                    // Recargar el carrito para actualizar el total
                    $('#cartDropdown').trigger('click');
                } else {
                    alert('Error al eliminar el producto.');
                }
            },
            error: function() {
                alert('Error al eliminar el producto.');
            }
        });
    });

    $(document).on('click', '.decrease-quantity', function() {
        let productId = $(this).closest('.cart-product').data('product-id');
        let quantityElement = $(`.cart-product[data-product-id="${productId}"] .product-quantity`);
        let currentQuantity = parseInt(quantityElement.text());

        // Asegurarnos de que la cantidad no sea menor que 1
        if (currentQuantity > 1) {
            let newQuantity = currentQuantity - 1;

            let formData = new FormData();
            formData.append("id_tmp", productId);
            formData.append("cantidad_nueva", newQuantity);

            $.ajax({
                url: 'https://new.imporsuitpro.com/Tienda/sumar_carrito', // URL de la API para actualizar la cantidad
                method: 'POST',
                data: formData,
                processData: false, // No procesar los datos
                contentType: false, // No establecer ningún tipo de contenido
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        quantityElement.text(newQuantity);
                        // Recargar el carrito para actualizar el total
                        $('#cartDropdown').trigger('click');
                    } else {
                        alert('Error al actualizar la cantidad');
                    }
                },
                error: function() {
                    alert('Error al actualizar la cantidad');
                }
            });
        } else {
            alert('La cantidad no puede ser menor que 1');
        }
    });

    function obtenerURLImagen(imagePath, serverURL) {
        // Verificar si el imagePath no es null
        if (imagePath) {
            // Verificar si el imagePath ya es una URL completa
            if (imagePath.startsWith("http://") || imagePath.startsWith("https://")) {
                // Si ya es una URL completa, retornar solo el imagePath
                return imagePath;
            } else {
                // Si no es una URL completa, agregar el serverURL al inicio
                return `${serverURL}${imagePath}`;
            }
        } else {
            // Manejar el caso cuando imagePath es null
            console.error("imagePath es null o undefined");
            return null; // o un valor por defecto si prefieres
        }
    }
</script>
</body>

</html>