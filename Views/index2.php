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
        <div class="flex_seccionOfertas">
            <div class="promotion-card">
                <img src="<?php echo SERVERURL."".IMAGEN_OFERTA1; ?>" class="promotion-image" alt="Smartphone">
                <div class="promotion-content">
                    <h2><?php echo TITULO_OFERTA1; ?></h2>
                    <h1><?php echo OFERTA1; ?></h1>
                    <p><?php echo DESCRIPCION_OFERTA1; ?></p>
                    <a href="<?php echo ENLACE_OFERTA1; ?>" target="_blank">
                    <button class="btn btn-light" style="background-color: <?php echo COLOR_BTN_OFERTA1; ?>;"><?php echo TEXTO_BTN_OFERTA1; ?></button>
                    </a>
                </div>
            </div>
            <div class="promotion-card">
                <img src="<?php echo SERVERURL."".IMAGEN_OFERTA2; ?>" class="promotion-image" alt="Headphones">
                <div class="promotion-content">
                    <h2><?php echo TITULO_OFERTA2; ?></h2>
                    <h1><?php echo OFERTA2; ?></h1>
                    <p><?php echo DESCRIPCION_OFERTA2; ?></p>
                    <a href="<?php echo ENLACE_OFERTA2; ?>" target="_blank">
                    <button class="btn btn-light" style="background-color: <?php echo COLOR_BTN_OFERTA2; ?>;"><?php echo TEXTO_BTN_OFERTA2; ?></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Seccion ofertas y promociones -->
    <div class="seccion">
        <div class="caja">
            <div class="seccion_iconos">
                <div class="d-flex flex-row">
                    <i class='bx bx-timer menu-icon'></i>
                    <span>Disponible para ti 24/7 </span>
                </div>
                <div class="d-flex flex-row">
                    <i class='bx bx-money-withdraw menu-icon'></i>
                    <span>Precios bajos garantizados</span>
                </div>
                <div class="d-flex flex-row">
                    <i class="fa-solid fa-headset menu-icon"></i>
                    <span>Atención al cliente</span>
                </div>
                <div class="d-flex flex-row">
                    <i class='bx bxs-lock menu-icon'></i>
                    <span>Pago Contra Entrega </span>
                </div>
            </div>
        </div>
    </div>
    <div class="mas_vendidos">
        <div class="caja">
            <h2>Más vendidos</h2>
            <div class="flex_mas_vendidos">
                <div class="mas_vendidos-card">
                    <div class="mas_vendidos-tag">OFERTA</div>
                    <div class="mas_vendidos-image-wrapper">
                        <img src="https://marketing4ecommerce.net/wp-content/uploads/2024/02/imagen-generada-con-nightcafe-e1708680739301.jpg" class="mas_vendidos-image" alt="Product 1">
                    </div>
                    <div class="mas_vendidos-info">
                        <p>Fitboot fitness con seguimiento del ritmo cardíaco</p>
                        <p class="mas_vendidos-price"><span class="mas_vendidos-old-price">$999.00</span> $984.00</p>
                    </div>
                </div>
                <div class="mas_vendidos-card">
                    <div class="mas_vendidos-tag">OFERTA</div>
                    <div class="mas_vendidos-image-wrapper">
                        <img src="https://marketing4ecommerce.net/wp-content/uploads/2024/02/imagen-generada-con-nightcafe-e1708680739301.jpg" class="mas_vendidos-image" alt="Product 2">
                    </div>
                    <div class="mas_vendidos-info">
                        <p>JP Laptop para juegos de 15,6" de 256GB</p>
                        <p class="mas_vendidos-price"><span class="mas_vendidos-old-price">$999.00</span> $984.00</p>
                    </div>
                </div>
                <div class="mas_vendidos-card">
                    <div class="mas_vendidos-tag">OFERTA</div>
                    <div class="mas_vendidos-image-wrapper">
                        <img src="https://marketing4ecommerce.net/wp-content/uploads/2024/02/imagen-generada-con-nightcafe-e1708680739301.jpg" class="mas_vendidos-image" alt="Product 3">
                    </div>
                    <div class="mas_vendidos-info">
                        <p>HKI Tech drone cuadricóptero con cámara y mando 360</p>
                        <p class="mas_vendidos-price">$999.00</p>
                    </div>
                </div>
                <div class="mas_vendidos-card">
                    <div class="mas_vendidos-tag">OFERTA</div>
                    <div class="mas_vendidos-image-wrapper">
                        <img src="https://marketing4ecommerce.net/wp-content/uploads/2024/02/imagen-generada-con-nightcafe-e1708680739301.jpg" class="mas_vendidos-image" alt="Product 4">
                    </div>
                    <div class="mas_vendidos-info">
                        <p>Smartphone Z Pixel Max 128GB desbloqueado</p>
                        <p class="mas_vendidos-price"><span class="mas_vendidos-old-price">$999.00</span> $984.00</p>
                    </div>
                </div>
                <div class="mas_vendidos-card">
                    <div class="mas_vendidos-tag">OFERTA</div>
                    <div class="mas_vendidos-image-wrapper">
                        <img src="https://marketing4ecommerce.net/wp-content/uploads/2024/02/imagen-generada-con-nightcafe-e1708680739301.jpg" class="mas_vendidos-image" alt="Product 5">
                    </div>
                    <div class="mas_vendidos-info">
                        <p>Audífonos inalámbricos con cancelación del ruido</p>
                        <p class="mas_vendidos-price"><span class="mas_vendidos-old-price">$999.00</span> $984.00</p>
                    </div>
                </div>
                <div class="mas_vendidos-card">
                    <div class="mas_vendidos-tag">OFERTA</div>
                    <div class="mas_vendidos-image-wrapper">
                        <img src="https://marketing4ecommerce.net/wp-content/uploads/2024/02/imagen-generada-con-nightcafe-e1708680739301.jpg" class="mas_vendidos-image" alt="Product 6">
                    </div>
                    <div class="mas_vendidos-info">
                        <p>Gafas de realidad virtual Safay GEN 2 de 256 GB con mandos táctiles</p>
                        <p class="mas_vendidos-price">$999.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sección Ahorra -->
    <div class="ahorro-section">
        <div class="ahorro-image">
            <img src="https://static.wixstatic.com/media/c837a6_42dd66a436e846648736f4bc9546bf14~mv2.png/v1/fill/w_1825,h_600,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/c837a6_42dd66a436e846648736f4bc9546bf14~mv2.png" alt="Producto">
            <!-- <div class="circle-badge">Mejor precio</div> -->
        </div>
        <div class="ahorro-content">
            <div class="text-content  d-flex flex-column">
                <h2>Ahorra hasta</h2>
                <h1>$150</h1>
                <p>en laptops y tabletas seleccionadas</p>
                <small>Aplican los términos y condiciones</small>
                <button class="tienda-btn">Tienda</button>
            </div>
        </div>
    </div>
    <!-- Fin Sección Ahorra -->

</main>

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
                        alineacion = "text-align-last: left;";
                    } else if (banner.alineacion == 2) {
                        alineacion = "text-align-last: center;";
                    } else if (banner.alineacion == 3) {
                        alineacion = "text-align-last: right;";
                    }

                    const isActive = index === 0 ? 'active' : '';
                    inner += `<div class="carousel-item ${isActive}">
                                <img src="${image_path}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block" style="${alineacion}">
                                    <div class="tag">${banner.subtitulo}</div>
                                    <h1>${banner.titulo}</h1>
                                    <p>${banner.texto_banner}</p>
                                    <a class="btn btn-primary" href="${banner.enlace_boton}" target="_blank">${banner.texto_boton}</a>
                                </div>
                              </div>`;
                });

                $('.carousel-inner').html(inner);
            },
            error: function(error) {
                console.error('Error fetching banner data', error);
            }
        });
        /* Fin Slider */
    });
</script>

<?php include 'Views/templates/footer2.php'; ?>