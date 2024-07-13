<script>
    const SERVERURL = "<?php echo SERVERURL ?>";
    const MARCA = "<?php echo MARCA ?>";
    const ID_PLATAFORMA = "<?php echo ID_PLATAFORMA ?>";
</script>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto PHP</title>
    <link rel="icon" href="https://marketing4ecommerce.net/wp-content/uploads/2024/02/imagen-generada-con-nightcafe-e1708680739301.jpg" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- <link rel="stylesheet" href="/Views/templates/css/header_style.php"> -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>

    <?php include 'Views/templates/css/header_style.php'; ?>
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
                },
                error: function(error) {
                    console.error("Error al obtener la lista de bodegas:", error);
                },
            });
        });
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand d-lg-none ms-auto" href="#">
                <img src="/img/logo_imporsuit.png" alt="IMPORT SHOP">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="font-size: 20px;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catálogo</a>
                    </li>
                </ul>
                <a class="navbar-brand d-none d-lg-block mx-auto" href="#">
                    <img src="/img/logo_imporsuit.png" alt="IMPORT SHOP">
                </a>
                <form class="d-flex ms-auto">
                    <input class="form-control search-box" type="search" placeholder="Buscar" aria-label="Buscar">
                </form>
            </div>
        </div>
    </nav>