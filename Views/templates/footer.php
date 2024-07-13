<footer>
    <p>&copy; 2024 © IMPORSUIT</p>
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
</body>


<script>
    let LOGO_TIENDA = response[0].logo_url;
    let COLOR_BACKGROUND = response[0].color;
    let COLOR_BOTONES = response[0].color_botones;
    let COLOR_TEXTO_BOTON = response[0].texto_boton;
    let TEXTO_BTN_SLIEDER = response[0].texto_btn_slider;
    let COLOR_TEXTO_CABECERA = response[0].texto_cabecera;
    $(document).ready(function() {
        let formData = new FormData();
        formData.append("id_plataforma", ID_PLATAFORMA);
        // Realiza la solicitud AJAX para obtener la lista de bodegas
        $.ajax({
            url: SERVERURL + "Tienda/obtener_informacion_tienda",
            type: "POST",
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            dataType: "json",
            success: function(response) {
                LOGO_TIENDA = response[0].logo_url;
                COLOR_BACKGROUND = response[0].color;
                COLOR_BOTONES = response[0].color_botones;
                COLOR_TEXTO_BOTON = response[0].texto_boton;
                TEXTO_BTN_SLIEDER = response[0].texto_btn_slider;
                COLOR_TEXTO_CABECERA = response[0].texto_cabecera;

                $("#imagen_logo").attr("src", SERVERURL + LOGO_TIENDA).show();
            },
            error: function(error) {
                console.error("Error al obtener la lista de bodegas:", error);
            },
        });
    });
</script>

</html>