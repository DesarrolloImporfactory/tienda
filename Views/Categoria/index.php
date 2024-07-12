<?php include 'Views/templates/header.php'; ?>
<?php include 'Views/Categoria/css/categoria_style.php'; ?>

<main>

    <!-- area de categorias -->
    <div class="container-fluid mt-4">
        <h1 style="text-align: center">Categorías</h1>
        <br>
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
                                <div class="accordion" id="accordionCategoriasModal">
                                    <!-- Este es el acordeón padre para la categoría principal -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingCategoriasModal">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategoriasModal" aria-expanded="true" aria-controls="collapseCategoriasModal">
                                                <strong>Categorías</strong>
                                            </button>
                                        </h2>
                                        <div id="collapseCategoriasModal" class="accordion-collapse collapse show" aria-labelledby="headingCategoriasModal" data-bs-parent="#accordionCategoriasModal">
                                            <div class="accordion-body">
                                                <!-- Aquí comienza el acordeón anidado para las subcategorías -->
                                                <div class="accordion" id="accordionSubcategoriasModal"></div>
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
                                    <div class="accordion" id="accordionSubcategorias"></div>
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

</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializa los sliders
        initSlider('slider-rango-precios-left', 'valorMinimo-left', 'valorMaximo-left', 'inputValorMinimo-left', 'inputValorMaximo-left');
        initSlider('slider-rango-precios-modal', 'valorMinimo-modal', 'valorMaximo-modal', 'inputValorMinimo-modal', 'inputValorMaximo-modal');

        // Obtén las instancias de noUiSlider para cada slider
        const sliderLeft = document.getElementById('slider-rango-precios-left').noUiSlider;
        const sliderModal = document.getElementById('slider-rango-precios-modal').noUiSlider;

        // Función para sincronizar los sliders
        function sincronizarSliders(sourceSlider, targetSlider) {
            sourceSlider.on('update', function(values) {
                // Verifica si los valores son diferentes para evitar la actualización innecesaria
                const targetValues = targetSlider.get().map(v => parseFloat(v));
                if (values[0] != targetValues[0] || values[1] != targetValues[1]) {
                    targetSlider.set(values);
                }
            });
        }

        // Sincroniza los sliders entre sí
        sincronizarSliders(sliderLeft, sliderModal);
        sincronizarSliders(sliderModal, sliderLeft);

        // Carga las categorías dinámicamente
        cargarCategorias();

        // Evento scroll para navbar
        window.onscroll = function() {
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

        // Form submit handlers
        document.getElementById('form-rango-precios-left').addEventListener('submit', function(event) {
            event.preventDefault();
            filtrarProductos('left');
        });

        document.getElementById('form-rango-precios-modal').addEventListener('submit', function(event) {
            event.preventDefault();
            filtrarProductos('modal');
        });
    });

    function cargarCategorias() {
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

                if (!Array.isArray(categorias)) {
                    categorias = Object.values(categorias);
                }

                let categoriasHtml = '';
                categorias.forEach(categoria => {
                    let categoryHtml = `
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-${categoria.id_linea}">
                                <button class="accordion-button collapsed" type="button" style="font-size: 12px;" onclick="window.location.href='categoria_1.php?id_cat=${categoria.id_linea}'">
                                    ${categoria.nombre_linea}
                                </button>
                            </h2>
                        </div>
                    `;
                    categoriasHtml += categoryHtml;
                });

                $('#accordionSubcategorias').html(categoriasHtml);
                $('#accordionSubcategoriasModal').html(categoriasHtml);
            },
            error: function(error) {
                console.error("Error al consumir la API:", error);
            }
        });
    }

    // Función para inicializar un slider
    function initSlider(sliderId, valorMinimoId, valorMaximoId, inputValorMinimoId, inputValorMaximoId, onSliderUpdateCallback) {
        var slider = document.getElementById(sliderId);
        noUiSlider.create(slider, {
            start: [parseInt(localStorage.getItem(inputValorMinimoId) || 0), parseInt(localStorage.getItem(inputValorMaximoId) || 3000)],
            connect: true,
            range: {
                'min': 0,
                'max': 3000
            }
        });

        slider.noUiSlider.on('update', function(values, handle) {
            var value = values[handle];
            var valorMinimo = document.getElementById(valorMinimoId);
            var valorMaximo = document.getElementById(valorMaximoId);
            var inputValorMinimo = document.getElementById(inputValorMinimoId);
            var inputValorMaximo = document.getElementById(inputValorMaximoId);

            if (handle) {
                valorMaximo.textContent = Math.round(value);
                inputValorMaximo.value = Math.round(value);
                localStorage.setItem(inputValorMaximoId, Math.round(value));
            } else {
                valorMinimo.textContent = Math.round(value);
                inputValorMinimo.value = Math.round(value);
                localStorage.setItem(inputValorMinimoId, Math.round(value));
            }

            // Ejecutar el callback después de actualizar el slider
            if (onSliderUpdateCallback) {
                onSliderUpdateCallback(values[0], values[1]);
            }
        });
    }

    // Función para filtrar productos
    function filtrarProductos(context) {
        var valorMin = document.getElementById(`inputValorMinimo-${context}`).value;
        var valorMax = document.getElementById(`inputValorMaximo-${context}`).value;

        fetch('categoria_1.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `valorMinimo=${valorMin}&valorMaximo=${valorMax}`
            })
            .then(response => response.text())
            .then(data => {
                document.querySelector('.right-column').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }
</script>

<?php include 'Views/templates/footer.php'; ?>