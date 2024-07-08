<?php include 'includes/header.php'; ?>
<style>
    .card {
        transition: transform .2s;
        /* Animación para el efecto de hover */
    }

    .card:hover {
        transform: scale(1.05);
        /* Aumenta ligeramente el tamaño de la tarjeta al pasar el ratón */
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .text-muted {
        text-decoration: line-through;
        /* Efecto tachado para el precio anterior */
    }

    .text-price {
        color: red;
        font-weight: bold;
    }

    .left-column {
        width: 20%;
        padding: 20px;
        padding-top: 60px;
        position: -webkit-sticky;
        /* Para compatibilidad con Safari */
        position: sticky;
        top: 0;
        /* Ajusta esto a la altura de cualquier cabecera o menú que tengas */
        height: 100%;
        /* O la altura que quieras que tenga */
    }

    .right-column {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Esto centrará sus hijos horizontalmente */
        align-self: start;
        /* Añade esta línea para alinear la propia .right-column al inicio de su contenedor flex */
        width: 80%;
        padding: 20px;
        padding-top: 60px;
        min-height: 600px;
        /* Ajusta esto según la altura mínima que desees */
    }

    .content_left_right {
        display: flex;
    }

    #accordionCategorias .card {
        margin-bottom: 0.5rem;
        border: none;
        /* Elimina los bordes si lo deseas */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Sombra suave para dar profundidad */
    }

    #accordionCategorias .card-header {
        padding: 0;
        /* Ajusta el relleno según sea necesario */
        background: #fff;
        /* Fondo blanco o el color que prefieras */
        border-bottom: 1px solid #eaeaea;
        /* Borde suave en la parte inferior */
    }

    #accordionCategorias .btn {
        width: 100%;
        /* Asegúrate de que los botones usen todo el ancho disponible */
        text-align: left;
        /* Alinea el texto a la izquierda */
        padding: 0;
        /* Ajusta el relleno para aumentar la altura de las filas */
        color: #333;
        /* Color de texto */
        background-color: transparent;
        /* Fondo transparente */
        border: none;
        /* Sin bordes */
        border-radius: 0.25rem;
        /* Esquinas ligeramente redondeadas */
    }

    #accordionCategorias .btn:hover,
    #accordionCategorias .btn:focus {
        color: #0056b3;
        /* Cambia el color del texto al pasar el mouse o enfocar */
        text-decoration: none;
        /* Elimina la decoración de subrayado */
        background-color: #f8f9fa;
        /* Fondo ligeramente más oscuro al pasar el mouse o enfocar */
    }

    #accordionCategorias .collapse.show {
        max-height: none;
        /* Asegúrate de que el contenido colapsable pueda expandirse completamente */
    }

    /* Transición suave para el colapso y la expansión */
    #accordionCategorias .collapse {
        transition: max-height 0.4s ease;
        padding-top: 0;
    }

    #accordionCategorias .btn {
        text-transform: capitalize;
        /* Solo la primera letra de cada palabra en mayúsculas */
        font-size: 1rem;
        /* Ajusta al tamaño de fuente deseado */
    }

    /* Esconde la columna izquierda en pantallas pequeñas */
    @media (max-width: 768px) {
        .left-column {
            display: none;
        }

        .right-column {
            width: 100%;
            padding: 0px;
        }
    }

    /* Estilo para el modal que ocupe toda la pantalla */
    .fullscreen-modal .modal-dialog {
        width: 100%;
        max-width: none;
        height: 100%;
        margin: 0;
    }

    .fullscreen-modal .modal-content {
        height: 100%;
        border-radius: 0;
    }

    /* Slide de rango de precions con noUiSlider */
    /* Base del Slider */
    .noUi-target {
        background-color: #B2B2B2;
        height: 10px;
        border-radius: 5px;
    }

    /* Conexión entre las manijas */
    .noUi-connect {
        background-color: <?php echo get_row('perfil', 'color', 'id_perfil', '1') ?>;
        /* Tu color de elección para la barra activa */
    }

    /* Manijas del Slider */
    .noUi-handle {
        outline: none;
        top: -5px;
        /* Ajusta esta propiedad para cambiar la posición vertical de la manija */
        border: 1px solid #D3D3D3;
        /* Borde de la manija */
        background-color: white;
        border-radius: 50%;
        width: 19px !important;
        /* Ancho de la manija */
        height: 19px !important;
        /* Altura de la manija */
        box-shadow: none;
        cursor: pointer;
        background-image: none !important;
    }

    .noUi-handle::after,
    .noUi-handle::before {
        content: none !important;
        /* Elimina el contenido de los pseudo-elementos */
    }

    /* Tooltips (los que muestran los valores encima de las manijas) */
    .noUi-tooltip {
        display: none;
        /* Oculta el tooltip por defecto de noUiSlider */
    }

    .caja_categorias {
        padding-top: 20px !important;
        padding-bottom: 40px !important;
        border-radius: 25px;
        -webkit-box-shadow: -2px 5px 5px 0px rgba(0, 0, 0, 0.23);
        -moz-box-shadow: -2px 2px 5px 0px rgba(0, 0, 0, 0.23);
        box-shadow: -2px 2px 5px 0px rgba(0, 0, 0, 0.23);
        background-color: white;
        position: relative;
        z-index: 10;
        /* Asegúrate de que esto sea mayor que el z-index de otros elementos */
        display: flex;
        /* Usa flexbox para alinear elementos internos */
        justify-content: flex-start;
        /* Alinea el menú a la izquierda */
        width: 100%;
        /* O el ancho que desees para esta caja */
        box-sizing: border-box;
        /* Asegura que el padding no añada al ancho total */
    }

    .filtro-flotante {
        position: absolute;
        right: 20;
    }

    .btn_filtro {
        font-size: 20px !important;
        background: transparent;
        color: black !important;
        border-radius: 0.5rem !important;
    }

    .row {
        width: 100%;
    }

    .ver-todo-btn {
        background-color: transparent;
        /* Hace que el fondo sea transparente */
        color: #b4b4b4;
        /* Establece el color inicial del texto */
        text-decoration: none;
        /* Elimina el subrayado */
        padding: .375rem .75rem;
        /* Añade algo de padding */
        border: 1px solid white;
        /* Añade un borde si lo deseas */
        border-radius: .25rem;
        /* Redondea las esquinas si lo deseas */
        transition: color .3s;
        /* Suaviza la transición del color */
    }

    .ver-todo-btn:hover {
        color: black;
        /* Cambia el color del texto al pasar el ratón por encima */
        background-color: rgba(255, 255, 255, .3);
        /* Opcional: cambia ligeramente el color de fondo al pasar el ratón por encima */
    }

    /* Estilo sin imagen doble de producto*/
    .image-sin-hover {
        position: relative;
    }

    /* Fin estilo sin imagen doble de producto*/

    /* Estilo imagen doble de producto*/
    .img-container {
        position: relative;
    }

    .img-container .hover-img {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        transition: opacity 0.7s ease-in-out;
        opacity: 0;
        display: block !important;
    }

    .img-container:hover .hover-img {
        opacity: 1;
    }

    .img-container:hover .primary-img {
        opacity: 0;
    }

    /* Fin estilo imagen doble de producto*/
</style>
<main>

    <!-- area de categorias -->
    <div class="container-fluid mt-4">
        <h1 style="text-align: center">Categorías</h1>
        <br>
        <?php
        $categorias_acordion = mysqli_query($conexion, "SELECT * FROM lineas");
        ?>
        <div class="content_left_right">

            <!-- Modal -->
            <div class="modal fade" id="leftColumnModal" tabindex="-1" aria-labelledby="leftColumnModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <!-- Cabeza del modal con el botón de cerrar -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="leftColumnModalLabel">Filtros</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Contenido del modal -->
                        <div class="modal-body">
                            <!-- Aquí incluyes el contenido de tu left-column -->
                            <div class="filtro_productos caja px-3">
                                <!-- Acordeón -->
                                <div class="accordion" id="accordionCategorias">
                                    <!-- Este es el acordeón padre para la categoría principal -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingCategorias">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategorias" aria-expanded="true" aria-controls="collapseCategorias">
                                                <strong>Categorías</strong>
                                            </button>
                                        </h2>
                                        <div id="collapseCategorias" class="accordion-collapse collapse show" aria-labelledby="headingCategorias" data-bs-parent="#accordionCategorias">
                                            <div class="accordion-body">
                                                <!-- Aquí comienza el acordeón anidado para las subcategorías -->
                                                <div class="accordion" id="accordionSubcategorias">
                                                    <?php while ($categoria_acordion = mysqli_fetch_assoc($categorias_acordion)) : ?>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="heading-<?php echo htmlspecialchars($categoria_acordion['nombre_linea']); ?>">
                                                                <button class="accordion-button collapsed" type="button" style="font-size: 12px;" onclick="window.location.href='categoria_1.php?id_cat=<?php echo urlencode($categoria_acordion['id_linea']); ?>'">
                                                                    <?php echo htmlspecialchars($categoria_acordion['nombre_linea']); ?>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                    <?php endwhile;
                                                    // Reiniciar el puntero al principio del conjunto de resultados
                                                    mysqli_data_seek($categorias_acordion, 0); ?>
                                                </div>
                                                <!-- Fin del acordeón anidado para las subcategorías -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Acordeón -->

                                <div>
                                    <form id="form-rango-precios-modal" method="post">
                                        <div class="filter-header"><strong>Rango de precios</strong></div>
                                        <div id="slider-rango-precios-modal"></div>
                                        <p>Valor mínimo: $<span id="valorMinimo-modal">0</span></p>
                                        <p>Valor máximo: $<span id="valorMaximo-modal">0</span></p>
                                        <input type="hidden" id="inputValorMinimo-modal" name="valorMinimo" value="0">
                                        <input type="hidden" id="inputValorMaximo-modal" name="valorMaximo" value="0">
                                        <button type="submit" class="btn-filter">Filtrar</button>
                                    </form>
                                </div>

                                <script>
                                    document.getElementById('btn-filtrar').addEventListener('click', function() {
                                        var valorMin = document.getElementById('valorMinimo').textContent;
                                        var valorMax = document.getElementById('valorMaximo').textContent;

                                        fetch('categoria_1.php', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/x-www-form-urlencoded',
                                                },
                                                body: `valorMinimo=${valorMin}&valorMaximo=${valorMax}`
                                            })
                                            .then(response => response.text())
                                            .then(data => {
                                                // Suponiendo que la respuesta sea un fragmento de HTML con los productos filtrados
                                                document.querySelector('.right-column').innerHTML = data;
                                            })
                                            .catch(error => console.error('Error:', error));
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Modal -->

            <div class="left-column d-none d-lg-block">
                <div class="filtro_productos caja px-3">
                    <!-- Acordeón -->
                    <div class="accordion" id="accordionCategorias">
                        <!-- Este es el acordeón padre para la categoría principal -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCategorias">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategorias" aria-expanded="true" aria-controls="collapseCategorias">
                                    <strong>Categorías</strong>
                                </button>
                            </h2>
                            <div id="collapseCategorias" class="accordion-collapse collapse show" aria-labelledby="headingCategorias" data-bs-parent="#accordionCategorias">
                                <div class="accordion-body">
                                    <!-- Aquí comienza el acordeón anidado para las subcategorías -->
                                    <div class="accordion" id="accordionSubcategorias">
                                        <?php while ($categoria_acordion = mysqli_fetch_assoc($categorias_acordion)) : ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-<?php echo htmlspecialchars($categoria_acordion['nombre_linea']); ?>">
                                                    <button class="accordion-button collapsed" type="button" style="font-size: 12px;" onclick="window.location.href='categoria_1.php?id_cat=<?php echo urlencode($categoria_acordion['id_linea']); ?>'">
                                                        <?php echo htmlspecialchars($categoria_acordion['nombre_linea']); ?>
                                                    </button>
                                                </h2>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                    <!-- Fin del acordeón anidado para las subcategorías -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Acordeón -->

                    <div>
                        <form id="form-rango-precios-left" method="post">
                            <div class="filter-header"><strong>Rango de precios</strong></div>
                            <div id="slider-rango-precios-left"></div>
                            <p>Valor mínimo: $<span id="valorMinimo-left">0</span></p>
                            <p>Valor máximo: $<span id="valorMaximo-left">0</span></p>
                            <input type="hidden" id="inputValorMinimo-left" name="valorMinimo" value="0">
                            <input type="hidden" id="inputValorMaximo-left" name="valorMaximo" value="0">
                            <button type="submit" class="btn-filter">Filtrar</button>
                        </form>
                    </div>

                    <script>
                        document.getElementById('btn-filtrar').addEventListener('click', function() {
                            var valorMin = document.getElementById('valorMinimo').textContent;
                            var valorMax = document.getElementById('valorMaximo').textContent;

                            fetch('categoria_1.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: `valorMinimo=${valorMin}&valorMaximo=${valorMax}`
                                })
                                .then(response => response.text())
                                .then(data => {
                                    // Suponiendo que la respuesta sea un fragmento de HTML con los productos filtrados
                                    document.querySelector('.right-column').innerHTML = data;
                                })
                                .catch(error => console.error('Error:', error));
                        });
                    </script>
                </div>
            </div>

            <div class="right-column">
                <div class="caja_categorias">
                    <form id="ordenarForm" method="post">
                        <div class="custom-select-wrapper" onclick="this.querySelector('.custom-select').classList.toggle('open');">
                            <div class="custom-select">
                                <div class="custom-select-trigger">Ordenar por</div>
                                <div class="custom-options">
                                    <button type="submit" class="option" name="ordenar_por" value="Mayor precio">Mayor precio</button>
                                    <button type="submit" class="option" name="ordenar_por" value="Menor precio">Menor precio</button>
                                </div>
                            </div>
                        </div>
                        <!-- Campos ocultos para mantener los valores de rango de precios -->
                        <input type="hidden" name="valorMinimo" value="<?php echo htmlspecialchars($valorMinimo); ?>">
                        <input type="hidden" name="valorMaximo" value="<?php echo htmlspecialchars($valorMaximo); ?>">
                    </form>
                    <!-- Botón que se muestra solo en pantallas pequeñas -->
                    <div class="d-lg-none filtro-flotante">
                        <button type="button" class="btn_filtro btn" data-bs-toggle="modal" data-bs-target="#leftColumnModal">
                            <i class='bx bxs-filter-alt'></i> Filtro
                        </button>
                    </div>
                </div>
                <div class="row" style="padding-top: 15px;">
                    <!-- Categoría 1 -->
                    <?php
                    if (isset($_GET['id_cat'])) {
                        if (isset($categorias) and $categorias != '') {
                            $lista_cat = substr($categorias, 0, -1);
                            $sql = "SELECT * FROM productos WHERE (pagina_web='1' AND stock_producto > 0 AND id_linea_producto IN ($lista_cat) AND valor3_producto >= $valorMinimo AND valor3_producto <= $valorMaximo OR id_linea_producto=$id_categoria) " . $orderSql;
                        } else {
                            $lista_cat = "''";
                            $sql = "SELECT * FROM productos WHERE (pagina_web='1' AND stock_producto > 0 AND id_linea_producto=$id_categoria AND valor3_producto >= $valorMinimo AND valor3_producto <= $valorMaximo) " . $orderSql;
                        }
                    } else {
                        $sql = "SELECT * FROM productos WHERE (pagina_web='1' AND stock_producto > 0 AND valor3_producto >= $valorMinimo AND valor3_producto <= $valorMaximo) " . $orderSql;
                    }

                    $query = mysqli_query($conexion, $sql);
                    if (!$query) {
                        die("Error en la consulta: " . mysqli_error($conexion));
                    }
                    $num_registros = mysqli_num_rows($query);
                    //echo $num_registros, ' Productos';
                    while ($row = mysqli_fetch_array($query)) {
                        $id_producto          = $row['id_producto'];
                        $codigo_producto      = $row['codigo_producto'];
                        $nombre_producto      = $row['nombre_producto'];
                        $descripcion_producto = $row['descripcion_producto'];
                        $linea_producto       = $row['id_linea_producto'];
                        $med_producto         = $row['id_med_producto'];
                        $id_proveedor         = $row['id_proveedor'];
                        $inv_producto         = $row['inv_producto'];
                        $impuesto_producto    = $row['iva_producto'];
                        $costo_producto       = $row['costo_producto'];
                        $utilidad_producto    = $row['utilidad_producto'];
                        $precio_producto      = $row['valor1_producto'];
                        $precio_mayoreo       = $row['valor2_producto'];
                        $precio_especial      = $row['valor3_producto'];
                        $precio_normal        = $row['valor4_producto'];
                        $stock_producto       = $row['stock_producto'];
                        $stock_min_producto   = $row['stock_min_producto'];
                        $online               = $row['pagina_web'];
                        $status_producto      = $row['estado_producto'];
                        $date_added           = date('d/m/Y', strtotime($row['date_added']));
                        $image_path           = $row['image_path'];
                        $id_imp_producto      = $row['id_imp_producto'];
                        $url_a1               = $row['url_a1'];
                    ?>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="card h-100" style="border-radius: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <a href="producto_1.php?id=<?php echo $id_producto ?>" class="category-link">
                                    <?php
                                    // condicion para poner el hover si existe el secundario
                                    $secondaryImagePath2 = strpos(strtolower($url_a1), "http") === 0 ? $url_a1 : 'sysadmin/' . str_replace("../..", "", $url_a1);
                                    if (!empty($url_a1) && @getimagesize($secondaryImagePath2)) { // El @ suprime los errores si getimagesize falla
                                    ?>
                                        <div class="img-container d-flex" style="aspect-ratio: 1 / 1; overflow: hidden; justify-content: center; align-items: center;">
                                        <?php } else { ?>
                                            <div class="image-sin-hover d-flex" style="aspect-ratio: 1 / 1; overflow: hidden; justify-content: center; align-items: center;">
                                            <?php } ?>

                                            <img src="<?php echo strpos(strtolower($image_path), "http") === 0 ? $image_path : 'sysadmin/' . str_replace("../..", "", $image_path); ?>" class="card-img-top primary-img" alt="Nombre del Producto" style="object-fit: cover; width: 80%; height: 80%;">
                                            <?php
                                            // Suponiendo que $url_a1 es la URL de la imagen secundaria
                                            $secondaryImagePath = strpos(strtolower($url_a1), "http") === 0 ? $url_a1 : 'sysadmin/' . str_replace("../..", "", $url_a1);
                                            if (!empty($url_a1) && @getimagesize($secondaryImagePath)) { // El @ suprime los errores si getimagesize falla
                                            ?>
                                                <img src="<?php echo $secondaryImagePath; ?>" class="card-img-top hover-img" alt="Imagen Secundaria del Producto" style="object-fit: cover; width: 80%; height: 80%;">
                                            <?php } ?>
                                            </div>
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <a href="producto_1.php?id=<?php echo $id_producto ?>" style="text-decoration: none; color:black;">
                                        <h6 class="card-title titulo_producto"><?php echo $nombre_producto; ?></h6>
                                    </a>
                                    <div class="product-footer mb-2">
                                        <span class="text-muted"><?php if ($precio_normal > 0) {
                                                                        echo get_row('perfil', 'moneda', 'id_perfil', 1) . $precio_normal;
                                                                    } ?></span>
                                        <span class="text-price"><?php echo get_row('perfil', 'moneda', 'id_perfil', 1) . number_format($precio_especial, 2); ?></span>
                                    </div>
                                    <a class="btn btn-primary mt-auto" href="#" onclick="agregar_tmp(<?php echo $id_producto; ?>, <?php echo $precio_especial; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal">Comprar</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Fin area de categorias -->


    <!-- FOOTER -->
    <!-- Botón flotante para WhatsApp -->
    <?php
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

    // Usar la función formatPhoneNumber para imprimir el número formateado
    $telefono = get_row('perfil', 'telefono', 'id_perfil', 1);
    $telefonoFormateado = formatPhoneNumber($telefono);
    ?>

    <?php
    $ws_flotante = get_row('perfil', 'whatsapp_flotante', 'id_perfil', 1);
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

<?php include 'includes/footer.php'; ?>