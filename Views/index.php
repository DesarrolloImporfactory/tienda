<?php include 'Views/templates/header.php'; ?>

<main style="background-color: #f9f9f9;">
    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/banner_definitiva1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título 1</h5>
                    <p>Descripción 1</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/banner_definitiva2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título 2</h5>
                    <p>Descripción 2</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/banner_definitiva1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título 3</h5>
                    <p>Descripción 3</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- fin slider -->

    <!-- animacion -->
    <div class="marquee-container">
        <div class="marquee">
            <p class="marquee-content">- PRUEBA -</p>
            <p class="marquee-content">- PRUEBA -</p>
        </div>
    </div>
    <!-- fin animacion -->

    <!-- categorias -->
    <div class="container mt-4">
        <h1 style="text-align: center">Categorías</h1>
        <br>
        <div class="caja" style="margin-bottom: 50px;">
            <div class="owl-carousel owl-theme" id="categories-container">
                <!-- Aquí se insertarán las categorías dinámicamente -->
            </div>
        </div>
    </div>
    <!-- fin categorias -->
    <div class="degraded-line"></div>
    <!-- destacados -->
    <div class="container mt-4">
        <h1 class="text-center">Destacados</h1>
        <br>
        <!-- Productos -->
        <div class="owl-carousel owl-theme mb-5" id="productos-carousel">
            <!-- Los productos se cargarán aquí dinámicamente -->
        </div>
        <!-- Fin Productos -->
    </div>

    <!-- fin destacados -->

    <!-- Iconos -->
    <div class="container" style="margin-bottom: 20px;">
        <div class="row" id="iconos-container">
            <!-- Los iconos se cargarán aquí dinámicamente -->
        </div>
    </div>
    <!-- Fin Iconos -->

    <!-- animacion -->
    <div class="marquee-container">
        <div class="marquee">
            <p class="marquee-content">- PRUEBA -</p>
            <p class="marquee-content">- PRUEBA -</p>
        </div>
    </div>
    <!-- fin animacion -->

    <!-- Testimonios -->
    <div class="container mt-4 testimonios">
        <h1 style="text-align: center">Testimonios</h1>
        <br>
        <div class="caja" style="margin-bottom: 50px;">
            <div class="owl-carousel owl-theme" id="testimonios-carousel">
                <!-- Los testimonios se cargarán aquí dinámicamente -->
            </div>
        </div>
    </div>
    <!-- Fin Testimonios -->

</main>

<script>
    $(document).ready(function() {
        /* Categorias */
        let formDataCategoria = new FormData();
        formDataCategoria.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/categoriastienda',
            method: 'POST',
            data: formDataCategoria,
            contentType: false,
            processData: false,
            success: function(response) {
                let categorias = JSON.parse(response); // Asegúrate de que la respuesta sea un objeto JSON

                // Verifica si la respuesta es un array o un objeto
                if (!Array.isArray(categorias)) {
                    categorias = Object.values(categorias);
                }

                categorias.forEach(categoria => {
                    let imagePath = categoria.imagen ? categoria.imagen : 'https://cdn.icon-icons.com/icons2/2633/PNG/512/office_gallery_image_picture_icon_159182.png';
                    let categoriaHtml = `
                        <div class="item">
                            <div class="category-container d-flex flex-column align-items-center">
                                <a href="categoria_1.php?id_cat=${categoria.id_linea}" class="category-link">
                                    <div class="category-image rounded-circle" style="background-image: url('sysadmin/${imagePath}');"></div>
                                </a>
                                <a class="btn category-button boton texto_boton" style="border-radius: 0.5rem;" href="categoria_1.php?id_cat=${categoria.id_linea}" role="button">
                                    ${categoria.nombre_linea}
                                </a>
                            </div>
                        </div>
                    `;

                    $('#categories-container').append(categoriaHtml);
                });

                $('#categories-container').owlCarousel({
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
                            items: 3
                        }
                    },
                    nav: true,
                    navText: [
                        '<i class="fas fa-chevron-left"></i>',
                        '<i class="fas fa-chevron-right"></i>'
                    ]
                });
            },
            error: function(error) {
                console.error("Error al consumir la API:", error);
            }
        });
        /* Fin Categorias */
        /* Destacados */
        // Inicializar el carrusel vacío
        $("#productos-carousel").owlCarousel({
            loop: false,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            },
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ]
        });

        // Cargar productos destacados mediante AJAX
        let formDataProductos = new FormData();
        formDataProductos.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/destacadostienda',
            method: 'POST',
            data: formDataProductos,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response); // Agregar esto para depurar la respuesta
                try {
                    var productos = JSON.parse(response);
                } catch (e) {
                    console.error('Error al parsear la respuesta:', e);
                    return;
                }

                if (productos && Array.isArray(productos)) {
                    var $carousel = $("#productos-carousel");

                    productos.forEach(function(producto) {
                        var precioEspecial = producto.valor3_producto;
                        var precioNormal = producto.valor4_producto;

                        var ahorro = 0;
                        if (precioNormal > 0) {
                            ahorro = 100 - (precioEspecial * 100 / precioNormal);
                        }

                        var productItem = `
                            <div class="item">
                                <div class="grid-container">
                                    <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                        <div class="img-container" style="aspect-ratio: 1 / 1; overflow: hidden; margin-bottom: -120px">
                                            <a href="producto_1.php?id=${producto.id_producto}">
                                                <img src="${producto.image_path.startsWith('http') ? producto.image_path : 'sysadmin/' + producto.image_path.replace('../..', '')}" class="card-img-top mx-auto d-block" alt="Product Name" style="object-fit: cover; width: 55%; height: 55%; margin-top: 10px;">
                                            </a>
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <p class="card-text flex-grow-1">
                                                <a href="producto_1.php?id=${producto.id_producto}" style="text-decoration: none; color:black;">
                                                    <strong>${producto.nombre_producto}</strong>
                                                </a>
                                            </p>
                                            <div class="product-footer mb-2">
                                                <div class="d-flex flex-row">
                                                    <div>
                                                        <span style="font-size: 15px; color:#4461ed; padding-right: 10px;">
                                                            <strong>$ ${number_format(precioEspecial, 2)}</strong>
                                                        </span>
                                                    </div>
                                                    ${precioNormal > 0 ? `
                                                    <div>
                                                        <span class="tachado" style="font-size: 15px; padding-right: 10px;">
                                                            <strong>$ ${number_format(precioNormal, 2)}</strong>
                                                        </span>
                                                    </div>
                                                    <div class="px-2" style="background-color: #4464ec; color:white; border-radius: 0.3rem;">
                                                        <span style="font-size: 15px;"><i class="bx bxs-purchase-tag"></i>
                                                            <strong>AHORRA UN ${number_format(ahorro)}%</strong>
                                                        </span>
                                                    </div>
                                                    ` : ''}
                                                </div>
                                            </div>
                                            <a style="z-index:2; height: 40px; font-size: 16px" class="btn boton texto_boton mt-2" href="producto_1.php?id=${producto.id_producto}">Comprar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        // Agregar el producto al carrusel
                        $carousel.trigger('add.owl.carousel', [$(productItem)]);
                    });

                    // Refrescar el carrusel
                    $carousel.trigger('refresh.owl.carousel');
                } else {
                    console.error('La respuesta no contiene productos válidos.');
                }
            },
            error: function(error) {
                console.log('Error al cargar los productos destacados:', error);
            }
        });
        /* Fin Destacados */

        /* Iconos */
        // Cargar iconos mediante AJAX
        let formDataIconos = new FormData();
        formDataIconos.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/iconostienda',
            method: 'POST',
            data: formDataIconos,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response); // Para depurar la respuesta
                try {
                    var iconos = JSON.parse(response);
                } catch (e) {
                    console.error('Error al parsear la respuesta:', e);
                    return;
                }

                if (iconos && Array.isArray(iconos)) {
                    var $iconosContainer = $("#iconos-container");

                    iconos.forEach(function(icono) {
                        var texto = icono.texto || '';
                        var icon_text = icono.icon_text || '';
                        var enlace_icon = icono.enlace_icon || '';
                        var subtexto_icon = icono.subtexto_icon || '';

                        var enlaceHTML = enlace_icon ? `href="${enlace_icon}" target="_blank" style="text-decoration: none; color: inherit;"` : '';

                        var iconoItem = `
                            <div class="col-md-4 icon_responsive">
                                <a ${enlaceHTML}>
                                    <div class="card card_icon text-center">
                                        <div class="card-body card-body_icon d-flex flex-row">
                                            <div style="margin-right: 20px;">
                                                <i class="fas ${icon_text} fa-2x"></i> <!-- Cambia el icono según corresponda -->
                                            </div>
                                            <div>
                                                <h5 class="card-title card-title_icon">${texto}</h5>
                                                <p class="card-text card-text_icon" style="font-size: 12px;">${subtexto_icon}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;

                        // Agregar el icono al contenedor
                        $iconosContainer.append(iconoItem);
                    });
                } else {
                    console.error('La respuesta no contiene iconos válidos.');
                }
            },
            error: function(error) {
                console.log('Error al cargar los iconos:', error);
            }
        });
        /* Fin Iconos */
        /* Testimonios */
        // Inicializar el carrusel vacío
        $("#testimonios-carousel").owlCarousel({
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
                    items: 3
                }
            },
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ]
        });

        // Cargar testimonios mediante AJAX
        let formDataTestimonio = new FormData();
        formDataTestimonio.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/testimoniostienda',
            method: 'POST',
            data: formDataIconos,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response); // Para depurar la respuesta
                try {
                    var testimonios = JSON.parse(response);
                } catch (e) {
                    console.error('Error al parsear la respuesta:', e);
                    return;
                }
                
                if (testimonios && Array.isArray(testimonios)) {
                    var $carousel = $("#testimonios-carousel");

                    testimonios.forEach(function(testimonio) {
                        var id_testimonio = testimonio.id_testimonio;
                        var nombre_testimonio = testimonio.nombre || '';
                        var texto_testimonio = testimonio.testimonio || '';
                        var image_path = testimonio.imagen || 'https://cdn.icon-icons.com/icons2/2633/PNG/512/office_gallery_image_picture_icon_159182.png';

                        var testimonioItem = `
                            <div class="item d-flex flex-column">
                                <div class="testimonios-container">
                                    <div class="testimonios-image rounded-circle" style="background-image: url('${image_path.startsWith('http') ? image_path : 'sysadmin/' + image_path.replace('../..', '')}');">
                                    </div>
                                    <p class="card-text"><strong>${nombre_testimonio}</strong></p>
                                    <p class="card-text testimonio-text">${texto_testimonio}</p>
                                </div>
                            </div>
                        `;

                        // Agregar el testimonio al carrusel
                        $carousel.trigger('add.owl.carousel', [$(testimonioItem)]);
                    });

                    // Refrescar el carrusel
                    $carousel.trigger('refresh.owl.carousel');
                } else {
                    console.error('La respuesta no contiene testimonios válidos.');
                }
            },
            error: function(error) {
                console.log('Error al cargar los testimonios:', error);
            }
        });
        /* Fin Testimonios*/
    });

    function number_format(number, decimals = 2) {
        return number.toFixed(decimals);
    }
</script>

<?php include 'Views/templates/footer.php'; ?>