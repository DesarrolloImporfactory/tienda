<footer class="pt-5 shadow border-top">
    <div class="footer pb-4 border-bottom">
        <div class="container">
            <div class="row w-100">
                <div class="text-center col-md-3">
                    <h5 class="mb-0" style="text-transform: capitalize;">Acerca de <?php echo NOMBRE_TIENDA; ?></h5>
                    <hr class="mx-auto my-2">
                    <img class="rounded" src="<?php echo SERVERURL . LOGO_TIENDA; ?>" alt="IMPORT SHOP" height="40px">
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-3 pe-md-4 mt-5 mt-md-0">
                    <h5 class="text-center mb-0">Síguenos</h5> 
                    <hr class="w-100 mx-auto my-2">
                    <div class="d-flex flex-row d-flex align-items-center gap-5 d-flex justify-content-center">
                        <a href="<?php echo FACEBOOK; ?>" target="_blank" class="text-dark fs-2 d-inline-flex align-items-center justify-content-center p-2 rounded-circle bg-light shadow-sm transition-hover"><i class="fab fa-facebook fs-2"></i></a>
                        <a href="<?php echo INSTRAGRAM; ?>" target="_blank" class="text-dark fs-2 d-inline-flex align-items-center justify-content-center p-2 rounded-circle bg-light shadow-sm transition-hover"><i class="fab fa-instagram fs-2"></i></a>
                        <a href="<?php echo TIKTOK; ?>" target="_blank" class="text-dark fs-2 d-inline-flex align-items-center justify-content-center p-2 rounded-circle bg-light shadow-sm transition-hover"><i class="fab fa-tiktok fs-2"></i></a>
                    </div>
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-3 mt-5 mt-md-0">
                    <h5 class="mb-0 text-center text-nowrap">Contacto</h5>
                    <hr class="w-100 mx-auto my-2">

                    <p class="text-center"><i class="fab fa-whatsapp fs-2 text-dark"></i> <?php echo formatPhoneNumber(TELEFONO); ?></p>
                    <!-- <p><i class="fas fa-envelope"></i> ventas@imporshop.app</p> -->
                </div>
            </div>
        </div>
    </div>
    <div class="footer py-4 copyright text-center">
        <p style="font-size: 13px;" class="mb-0">&copy; 2024 Construye tu tienda online con IMPORSUIT S.A. | Todos los derechos reservados.</p>
    </div>
</footer>
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