<footer class="pt-5 shadow border-top bg-light">
    <div class="footer pb-4 border-bottom">
        <div class="container">
        <div class="row w-100 text-center text-md-start d-flex justify-content-center align-items-start">
                
                <!-- Acerca de la tienda -->
                <div class="col-md-3 text-center">
                    <h5 class="text-dark mb-2">Acerca de <?php echo NOMBRE_TIENDA; ?></h5>
                    <hr class="mx-auto my-2 w-50">
                    <img class="rounded" src="<?php echo SERVERURL . LOGO_TIENDA; ?>" alt="IMPORT SHOP" height="50px">
                </div>
                <!-- Espaciado entre columnas -->
                <div class="col-md-1 d-none d-md-block"></div>


                <div class="col-md-3 pe-md-4 mt-4 mt-md-0">
                    <h5 class="text-dark mb-2 text-center">Síguenos</h5> 
                    <hr class="w-100 mx-auto my-2">
                    <div class="d-flex flex-row align-items-center gap-5 justify-content-center">
                        <a href="<?php echo FACEBOOK; ?>" target="_blank" class="align-items-center justify-content-center p-2 rounded-circle bg-light" style="transition: transform 0.3s ease-in-out;" onmouseover="this.style.transform='scale(1.3)'; this.querySelector('i').style.color='#1877F2';" onmouseout="this.style.transform='scale(1)'; this.querySelector('i').style.color='black';">
                            <i class="fab fa-facebook fs-2"></i>
                        </a>
                        <a href="<?php echo INSTRAGRAM; ?>" target="_blank" class="align-items-center justify-content-center p-2 rounded-circle bg-light" style="transition: transform 0.3s ease-in-out;" onmouseover="this.style.transform='scale(1.3)'; this.querySelector('i').style.color='#E4405F';" onmouseout="this.style.transform='scale(1)'; this.querySelector('i').style.color='black';">
                            <i class="fab fa-instagram fs-2"></i>
                        </a>
                        <a href="<?php echo TIKTOK; ?>" target="_blank" class="align-items-center justify-content-center p-2 rounded-circle bg-light" style="transition: transform 0.3s ease-in-out;" onmouseover="this.style.transform='scale(1.3)'; this.querySelector('i').style.color='#30D5C8';" onmouseout="this.style.transform='scale(1)'; this.querySelector('i').style.color='black';">
                            <i class="fab fa-tiktok fs-2"></i>
                        </a>
                    </div>
                </div>
                <!-- Espacio entre columnas -->
                <div class="col-md-1 d-none d-md-block"></div>

                <div class="col-md-3 mt-4 mt-md-0">
                    <h5 class="text-dark mb-2 text-center">Contacto</h5>
                    <hr class="w-50 mx-auto my-2">
                    <p class="testi d-flex align-items-center justify-content-center text-dark">
                        <i class="fab fa-whatsapp fs-2 me-2 text-success"></i> 
                        <?php echo formatPhoneNumber(TELEFONO); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="footer py-3 text-center text-white cp">
        <p class="mb-0" style="font-size: 13px;">
            &copy; 2025 Construye tu tienda online con <strong>IMPORSUIT S.A.</strong> | Todos los derechos reservados.
        </p>
    </div>
</footer>
<style>
    .cp{
        background-color: <?php echo COLOR_BACKGROUND; ?>;
    }
</style>
<!-- librerias adiconale -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.3/date-1.5.2/fc-5.0.1/fh-4.0.1/kt-2.12.1/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.3/sr-1.4.1/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://kit.fontawesome.com/0022adc953.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    function limpiar_carrito() {
        return new Promise((resolve, reject) => {
            session_id = "<?php echo session_id(); ?>";
            let formData = new FormData();
            formData.append("session_id", session_id);

            $.ajax({
                url: SERVERURL + 'Tienda/limpiar_carrito',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(data) {
                    // Resuelve la promesa cuando la limpieza del carrito se completa
                    resolve(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Rechaza la promesa en caso de error
                    reject(errorThrown);
                },
            });
        });
    }
</script>
</body>

</html>