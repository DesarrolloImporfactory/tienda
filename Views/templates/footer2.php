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
                    <a class="nav-link" href="categoria?id_cat=${categoria.id_linea}">${categoria.nombre_linea}</a>
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
</script>
</body>

</html>