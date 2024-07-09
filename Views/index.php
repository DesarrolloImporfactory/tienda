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
    <div class="container mb-3">
        <div class="row">
            <?php
            include './auditoria.php';
            $sql = "SELECT * FROM caracteristicas_tienda WHERE accion=1 or accion=2 or accion=3";
            $query = mysqli_query($conexion, $sql);
            while ($row = mysqli_fetch_array($query)) {
                $texto = $row['texto'];
                $icon_text = $row['icon_text'];
                $enlace_icon = $row['enlace_icon'];
                $subtexto_icon = $row['subtexto_icon'];

                if ($enlace_icon == '') {
                    $enlace_icon = '';
                } else {
                    $enlace_icon = 'href="' . $enlace_icon . '" target="_blank" class="text-decoration-none text-reset"';
                }
            ?>
                <div class="col-md-4 mb-4">
                    <a <?php echo $enlace_icon ?>>
                        <div class="card text-center h-100">
                            <div class="card-body d-flex flex-row align-items-center">
                                <div class="me-3">
                                    <i class="fas <?php echo $icon_text ?> fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1"><?php echo $texto ?></h5>
                                    <p class="card-text text-muted" style="font-size: 12px;"><?php echo $subtexto_icon ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Fin Iconos -->

    <?php
    $sql = "SELECT * FROM testimonios";
    $query = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($query);
    if ($count != 0) {
    ?>

        <div class="container mt-4 testimonios">
            <h1 class="text-center">Testimonios</h1>
            <br>
            <!-- Testimonios -->
            <div class="mb-5">
                <div class="owl-carousel owl-theme">
                    <?php
                    include './auditoria.php';
                    $sql = "SELECT * FROM testimonios";
                    $query = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $id_testimonio = $row['id_testimonio'];
                        $nombre_testimonio = $row['nombre'];
                        $testimonio = $row['testimonio'];
                        $image_path = $row['imagen'];
                    ?>
                        <div class="item d-flex flex-column">
                            <div class="testimonios-container text-center">
                                <div class="testimonios-image rounded-circle mb-3" style="background-image: url('sysadmin/<?php echo str_replace("../..", "", $image_path); ?>'); width: 100px; height: 100px; background-size: cover; background-position: center;">
                                    <!-- Imagen del testimonio -->
                                </div>
                                <p class="card-text"><strong><?php echo $nombre_testimonio; ?></strong></p>
                                <p class="card-text testimonio-text"><?php echo $testimonio; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $(".owl-carousel").owlCarousel({
                        loop: false, // Establece a 'true' si quieres que el carrusel sea infinito
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
                        nav: true, // Muestra las flechas de navegación
                        navText: [
                            '<i class="fas fa-chevron-left"></i>',
                            '<i class="fas fa-chevron-right"></i>'
                        ] // Puedes personalizar el texto o el HTML de las flechas aquí
                    });
                });
            </script>
            <!-- Fin Testimonios -->
        </div>
    <?php
    } ?>

    <!-- FOOTER -->
    <!-- Botón flotante para WhatsApp -->
    <?php
    if (!function_exists('formatPhoneNumber')) {
        function formatPhoneNumber($number)
        {
            // Eliminar caracteres no numéricos excepto el signo +
            $number = preg_replace('/[^\d+]/', '', $number);

            // Verificar si el número ya tiene el código de país +593
            if (!preg_match('/^\+593/', $number)) {
                // Si el número comienza con 0, quitarlo
                if (strpos($number, '0') === 0) {
                    $number = substr($number, 1);
                }
                // Agregar el código de país +593 al inicio del número
                $number = '+593' . $number;
            }

            return $number;
        }
    }

    // Usar la función formatPhoneNumber para imprimir el número formateado
    /* $telefono = get_row('perfil', 'telefono', 'id_perfil', 1); */
    $telefonoFormateado = formatPhoneNumber($telefono);
    ?>

    <?php
    /* $ws_flotante = get_row('perfil', 'whatsapp_flotante', 'id_perfil', 1); */
    if ($ws_flotante == 1) { ?>
        <a href="https://wa.me/<?php echo $telefonoFormateado ?>" class="whatsapp-float" target="_blank"><i class="bx bxl-whatsapp-square ws_flotante"></i></a>
    <?php } ?>

    <footer class="footer-contenedor">
        <?php
        $sql   = "SELECT * FROM  perfil  where id_perfil=1";
        $query = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $nombre_empresa       = $row['nombre_empresa'];
            $giro_empresa       = $row['giro_empresa'];
            $telefono       = $row['telefono'];
            $email       = $row['email'];
            $logo_url       = $row['logo_url'];
            $facebook       = $row['facebook'];
            $instagram       = $row['instagram'];
            $tiktok       = $row['tiktok'];

        ?>
            <div class="footer-contenido div-alineado-izquierda">
                <h4>Acerca de <?php echo $nombre_empresa ?></h4>
                <img id="navbarLogo" src="sysadmin/<?php echo str_replace("../..", "", $logo_url)
                                                    ?>">
                <span class="descripcion">
                    <?php echo $giro_empresa ?>
                </span>
            </div>
            <div class="footer-contenido">
                <h5>Legal</h5>
                <ul class="lista_legal">
                    <?php
                    $sql   = "SELECT * FROM  politicas_empresa";
                    $query = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        $nombre_politica       = $row['nombre'];
                        $id_politica       = $row['id_politica'];
                    ?>
                        <li><a style="text-decoration: none; color:#5a5a5a" href="<?php echo $protocol ?>://<?php echo $domain ?>/politicas.php?id=<?php echo $id_politica ?>" target="_blank"><?php echo $nombre_politica; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="footer-contenido">
                <h5>Siguenos</h5>
                <div class="redes">
                    <?php if ($facebook  !== "") { ?>
                        <a class="icon-redes" href="<?php echo $facebook ?>">
                            <img src="https://img.icons8.com/color/48/000000/facebook.png" alt="facebook">
                        </a>
                    <?php } ?>
                    <?php if ($instagram  !== "") { ?>
                        <a class="icon-redes" href="<?php echo $instagram ?>">
                            <img src="https://img.icons8.com/color/48/000000/instagram-new.png" alt="instagram">
                        </a>
                    <?php } ?>
                    <?php if ($tiktok  !== "") { ?>
                        <a class="icon-redes" href="<?php echo $tiktok ?>">
                            <img src="https://img.icons8.com/color/48/000000/tiktok.png" alt="tiktok">
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="footer-contenido">
                <h5>
                    Información de contacto
                </h5>
                <span class="descripcion">
                    <span class="icons">
                        <i class='bx bxl-whatsapp ws'></i> <?php echo $telefono ?>
                    </span>
                    <span class="icons">
                        <i class='bx bx-mail-send send'></i><?php echo $email ?>
                    </span>
                </span>
            </div>
        <?php } ?>
    </footer>
    <div class="text-center p-4 derechos-autor">© 2024 IMPORSUIT S.A. | Todos los derechos reservados.
    </div>
    <!-- Fin footer -->
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
        // Cargar productos destacados
        let formDataDestacados = new FormData();
        formDataDestacados.append("id_plataforma", ID_PLATAFORMA);

        $.ajax({
            url: SERVERURL + 'Tienda/destacadostienda',
            method: 'POST',
            data: formDataDestacados,
            contentType: false,
            processData: false,
            success: function(response) {
                let productos = JSON.parse(response);

                productos.forEach(producto => {
                    let imagePath = producto.image_path.startsWith('http') ? producto.image_path : `sysadmin/${producto.image_path.replace("../..", "")}`;
                    let productoHtml = `
                        <div class="item">
                            <div class="card h-100" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <div class="img-container" style="aspect-ratio: 1 / 1; overflow: hidden; margin-bottom: -120px">
                                    <a href="producto_1.php?id=${producto.id_producto}">
                                        <img src="${imagePath}" class="card-img-top mx-auto d-block" alt="${producto.nombre_producto}" style="object-fit: cover; width: 55%; height: 55%; margin-top: 10px;">
                                    </a>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <p class="card-text flex-grow-1">
                                        <a href="producto_1.php?id=${producto.id_producto}" class="text-decoration-none text-dark">
                                            <strong>${producto.nombre_producto}</strong>
                                        </a>
                                    </p>
                                    <div class="product-footer mb-2">
                                        <div class="d-flex flex-row">
                                            <div>
                                                <span class="text-primary fs-5 pe-2">
                                                    <strong>${producto.precio_especial}</strong>
                                                </span>
                                            </div>
                                            <div>
                                                ${producto.precio_normal > 0 ? `<span class="text-muted text-decoration-line-through fs-5 pe-2"><strong>${producto.precio_normal}</strong></span>` : ''}
                                            </div>
                                            ${producto.precio_normal > 0 ? `<div class="px-2 bg-primary text-white rounded"><span class="fs-6"><i class="bx bxs-purchase-tag"></i><strong>AHORRA UN ${Math.round(100 - (producto.precio_especial * 100 / producto.precio_normal))}%</strong></span></div>` : ''}
                                        </div>
                                    </div>
                                    <a class="btn btn-primary mt-2" href="producto_1.php?id=${producto.id_producto}" style="height: 40px; font-size: 16px">Comprar</a>
                                </div>
                            </div>
                        </div>
                    `;

                    $('#productos-carousel').append(productoHtml);
                });

                $('#productos-carousel').owlCarousel({
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
            },
            error: function(error) {
                console.error("Error al consumir la API de productos destacados:", error);
            }
        });
        /* Fin Destacados */
    });
</script>

<?php include 'Views/templates/footer.php'; ?>