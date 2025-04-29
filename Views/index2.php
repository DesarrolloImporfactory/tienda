<?php include 'Views/templates/header2.php'; ?>


<main style="background-color: #f9f9f9;">
    <!-- Slider -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade custom-carousel" data-bs-ride="carousel">
        <div class="carousel-inner"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Fin Slider -->
    <!-- Seccion de ofertas y promociones -->
    <div class="seccion">
    <div class="flex_seccionOfertas container">
        <!-- OFERTA 1 -->
        <div class="promotion-card">
            <?php 
            // Ruta de la imagen para la oferta 1
            $imagenOferta1 = SERVERURL . "" . IMAGEN_OFERTA1;
            ?>
            <img src="<?php echo $imagenOferta1; ?>" 
                 onerror="this.onerror=null; this.src='https://new.imporsuitpro.com/public/img/imgntfound1825x600.png';" 
                 class="promotion-image" alt="Smartphone">
            
            <div class="promotion-content" style="color: <?php echo COLOR_TEXTO_OFERTA1; ?>;">
                <h2><?php echo TITULO_OFERTA1; ?></h2>
                <h1><?php echo OFERTA1; ?></h1>
                <p><?php echo DESCRIPCION_OFERTA1; ?></p>

                <?php if ($imagenOferta1 !== 'https://new.imporsuitpro.com/public/img/imgntfound1825x600.png') : ?>
                    <a href="<?php echo ENLACE_OFERTA1; ?>" target="_blank">
                        <button class="btn btn-light"
                            style="background-color: <?php echo COLOR_BTN_OFERTA1; ?>; color: <?php echo COLOR_TEXTOBTN_OFERTA1; ?>;"><?php echo TEXTO_BTN_OFERTA1; ?></button>
                    </a>
                <?php else: ?>
                    <!-- Si la imagen no existe, no mostramos el botón -->
                    <p class="no-image">Imagen no disponible</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- OFERTA 2 -->
        <div class="promotion-card">
            <?php 
            // Ruta de la imagen para la oferta 2
            $imagenOferta2 = SERVERURL . "" . IMAGEN_OFERTA2;
            ?>
            <img src="<?php echo $imagenOferta2; ?>" 
                 onerror="this.onerror=null; this.src='https://new.imporsuitpro.com/public/img/imgntfound1825x600.png';" 
                 class="promotion-image" alt="Headphones">
            
            <div class="promotion-content" style="color: <?php echo COLOR_TEXTO_OFERTA2; ?>;">
                <h2><?php echo TITULO_OFERTA2; ?></h2>
                <h1><?php echo OFERTA2; ?></h1>
                <p><?php echo DESCRIPCION_OFERTA2; ?></p>

                <?php if ($imagenOferta2 !== 'https://new.imporsuitpro.com/public/img/imgntfound1825x600.png') : ?>
                    <a href="<?php echo ENLACE_OFERTA2; ?>" target="_blank">
                        <button class="btn btn-light"
                            style="background-color: <?php echo COLOR_BTN_OFERTA2; ?>; color: <?php echo COLOR_TEXTOBTN_OFERTA2; ?>;"><?php echo TEXTO_BTN_OFERTA2; ?></button>
                    </a>
                <?php else: ?>
                    <!-- Si la imagen no existe, no mostramos el botón -->
                    <p class="no-image">Imagen no disponible</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


    <!-- Fin Seccion ofertas y promociones -->
    <!-- seccion iconos -->
    <section class="container">
        <div class="row" id="iconos-container" style="max-width: 1150px; margin: auto;">
            <!-- Los iconos serán insertados aquí dinámicamente -->
        </div>
    </section>
    <!-- fin seccion iconos -->
    <!-- Productos Destacados -->
    <div class="mas_vendidos">
    <div class="caja container">
        <h2>Productos destacados</h2>
        <div class="carousel-wrapper">
            <button class="carousel-btn prev">&#10094;</button>
            <div class="carousel-track" id="productos-destacados">
                <!-- Las cards se insertarán aquí dinámicamente -->
            </div>
            <button class="carousel-btn next">&#10095;</button>
        </div>
    </div>
</div>
    <!-- Fin Productos destacados -->
    <!-- Sección Ahorra -->
    <div class="ahorro-section">
    <?php
    $imagen_promocion = SERVERURL . IMAGEN_PROMOCION;
    $es_imagen_valida = !empty(IMAGEN_PROMOCION) && IMAGEN_PROMOCION !== 'public/img/imgntfound.png';
?>
<div class="ahorro-section">
    <div class="ahorro-image">
        <img src="<?php echo $imagen_promocion; ?>" 
             onerror="this.onerror=null; this.src='https://new.imporsuitpro.com/public/img/imgntfound1825x600.png';" 
             alt="Producto">
    </div>
    <div class="ahorro-content" style="background-color: <?php echo COLOR_FONDO_PROMOCION; ?>;">
        <div class="text-content d-flex flex-column">
            <h2 style="color: <?php echo COLOR_LETRA_PROMOCION; ?>;"><?php echo TITULO_PROMOCION; ?></h2>

            <?php if ($es_imagen_valida): ?>
                <h1 style="color: <?php echo COLOR_LETRA_PROMOCION; ?>;">$<?php echo PRECIO_PROMOCION; ?></h1>
            <?php endif; ?>

            <p style="color: <?php echo COLOR_LETRA_PROMOCION; ?>;"><?php echo DESCRIPCION_PROMOCION; ?></p>

            <?php if ($es_imagen_valida): ?>
                <a href="<?php echo ENLACE_BTN_PROMOCION; ?>" target="_blank">
                    <button class="tienda-btn"
                        style="background-color: <?php echo COLOR_BTN_PROMOCION; ?>; color: <?php echo COLOR_LETRABTN_PROMOCION; ?>;">
                        <?php echo TEXTO_BTN_PROMOCION; ?>
                    </button>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
    <!-- Fin Sección Ahorra -->

    <!-- boton whatsapp -->

    <a href="https://wa.me/<?php echo formatPhoneNumber(TELEFONO); ?>" class="whatsapp-btn" target="_blank"><i class="bi bi-whatsapp"></i>
        <span class="testi tooltip-text" id="tooltip">¿Tienes alguna duda? Escríbenos</span>
    </a>
    <!-- Fin boton whatsapp-->
</main>

<!-- boton whatsapp-->
<script>
  window.addEventListener('load', () => {
    const tooltip = document.querySelector('.tooltip-text');

    // Espera 3 segundos, luego muestra el tooltip
    setTimeout(() => {
      tooltip.style.visibility = 'visible';
      tooltip.style.opacity = '1';

      // Luego de 3 segundos más, lo oculta
      setTimeout(() => {
        tooltip.style.visibility = 'hidden';
        tooltip.style.opacity = '0';
      }, 3000);
    }, 3000);
  });
</script>
<!-- Fin boton whatsapp-->

<script>
    $(document).ready(function() {
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

        /* Slider */
        let formDataSlider = new FormData();
formDataSlider.append("id_plataforma", ID_PLATAFORMA);

$.ajax({
    url: SERVERURL + 'Tienda/bannertienda',
    method: 'POST',
    data: formDataSlider,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(data) {
        let inner = '';
        let alineacion = "";

        $.each(data, function(index, banner) {
            let image_path = obtenerURLImagen(banner.fondo_banner, SERVERURL);

            if (banner.alineacion == 1) {
                alineacion = "text-align: left;";
            } else if (banner.alineacion == 2) {
                alineacion = "text-align: center;";
            } else if (banner.alineacion == 3) {
                alineacion = "text-align: right;";
            }

            const isActive = index === 0 ? 'active' : '';

            inner += `
                <div class="carousel-item ${isActive}">
                    <img src="${image_path}" onerror="this.onerror=null; this.src='https://new.imporsuitpro.com/public/img/imgntfound.png';" 
                         class="d-block w-100" style="object-fit: cover; height: 400px;" alt="Banner">
                    <div class="carousel-caption d-none d-md-block" style="${alineacion}">
                        <h1 style="color:${banner.color_texto_banner}; font-weight: bold;">${banner.titulo}</h1>
                        <p style="color:${banner.color_texto_banner}; font-size: 18px;">${banner.texto_banner}</p>
                        <a class="btn btn-primary" 
                           href="${banner.enlace_boton}" 
                           style="color:${banner.color_textoBtn_banner} !important; background-color:${banner.color_btn_banner} !important;" 
                           target="_blank">
                            ${banner.texto_boton}
                        </a>
                    </div>
                </div>`;
        });

        $('.carousel-inner').html(inner);

        // Activar el primer item manualmente por seguridad
        $('#carouselExampleFade .carousel-item').first().addClass('active');

        // Iniciar el carousel manualmente para asegurar transiciones suaves
        $('#carouselExampleFade').carousel({
            interval: 5000, // 5 segundos por slide
            ride: 'carousel',
            pause: false,
            wrap: true
        });
    },
    error: function(error) {
        console.error('Error fetching banner data', error);
    }
});

        /* Fin Slider */
        /* iconos */
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
                        var enlace_icon = icono.enlace_icon || '#';
                        var subtexto_icon = icono.subtexto_icon || '';
                        var color_icono = icono.color_icono

                        // Aquí está el HTML para el nuevo diseño con el formato correcto
                        var iconoItem = `
                       <div class="col-md-4 mb-3 icon_responsive">
                                <a ${enlace_icon}>
                                    <div class="card1 card_icon1 text-center">
                                        <div class="card-body1 d-flex flex-row justify-content-between align-items-center" >
                                            <i class="fa ${icon_text} fa-2x me-3" style="color: ${color_icono} !important"></i>
                                            <div class="text-end">
                                                <h5 class="card-title">${texto}</h5>
                                                <p class="card-text1 card-text_icon" style="font-size: 12px !important;">${subtexto_icon}</p>
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
        /* Fin iconos */
        /* Productos Destacados */
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
        try {
            var productos = JSON.parse(response);
        } catch (e) {
            console.error('Error al parsear la respuesta:', e);
            return;
        }

        if (productos && Array.isArray(productos)) {
            var $productosContainer = $("#productos-destacados");
            $productosContainer.empty();

            var productosAMostrar = productos.slice(0, 12);
            productosAMostrar.forEach(function(producto) {
                var precioEspecial = parseFloat(producto.pvp_tienda);
                var precioNormal = parseFloat(producto.pref_tienda);

                var image_path = obtenerURLImagen(producto.imagen_principal_tienda, SERVERURL);

                let oferta = precioNormal > 0 ? `<div class="mas_vendidos-tag">OFERTA</div>` : '';
                const urlProducto = producto.funnelish === '1' && producto.funnelish_url ? 
                    ensureProtocol(producto.funnelish_url) : 
                    `producto2?id=${producto.id_producto_tienda}`;

                var productItem = `
                    <div class="item">
                        <div class="overflow-hidden mas_vendidos-card card bg-transparent rounded-4">
                            ${oferta}
                            <a href="${urlProducto}">
                                <div class="mas_vendidos-image-wrapper img-container">
                                    <img src="${image_path}" onerror="this.onerror=null; this.src='https://new.imporsuitpro.com/public/img/imgntfound.png';" class="mas_vendidos-image" alt="${producto.nombre_producto_tienda}">
                                </div>
                            </a>
                            <div class="mas_vendidos-info">
                                <h5 class="card-title">${producto.nombre_producto_tienda}</h5>
                                <p class="mas_vendidos-price">
                                    ${precioNormal > 0 ? `<span class="mas_vendidos-old-price">$${number_format(precioNormal, 2)}</span>` : ''}
                                    $${number_format(precioEspecial, 2)}
                                </p>
                            </div>
                        </div>
                    </div>
                `;

                $productosContainer.append(productItem);
            });

            iniciarCarruselPersonalizado();
        } else {
            console.error('La respuesta no contiene productos válidos.');
        }
    },
    error: function(error) {
        console.log('Error al cargar los productos destacados:', error);
    }
});

function iniciarCarruselPersonalizado() {
    const track = document.querySelector('.carousel-track');
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');
    const items = document.querySelectorAll('.carousel-track .item');

    let currentIndex = 0;

    function updateCarousel() {
        const itemWidth = items[0].getBoundingClientRect().width;
        track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;

        // Deshabilitar botones si está en los extremos
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= items.length - 1;
    }

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentIndex < items.length - 1) {
            currentIndex++;
            updateCarousel();
        }
    });

    updateCarousel();
}



function ensureProtocol(url) {
    if (url && !/^https?:\/\//i.test(url)) {
        return `https://${url}`;
    }
    return url;
}







        /* Fin productos destacados */
    });

    function number_format(number, decimals = 2) {
        return number.toFixed(decimals);
    }
</script>

<?php include 'Views/templates/footer2.php'; ?>