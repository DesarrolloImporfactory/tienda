<?php
// Inicializa cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SERVERURL . 'Tienda/obtener_informacion_tienda');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['id_plataforma' => ID_PLATAFORMA]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecuta la solicitud y obtiene la respuesta
$response = curl_exec($ch);
curl_close($ch);

// Verifica si se obtuvo una respuesta
if ($response === false) {
    die('Error al obtener la información de la tienda.');
}

// Decodifica la respuesta JSON
$data = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error al decodificar la respuesta JSON: ' . json_last_error_msg());
}

// Define las constantes
define('LOGO_TIENDA', $data[0]['logo_url']);
define('COLOR_BACKGROUND', $data[0]['color']);
define('COLOR_BOTONES', $data[0]['color_botones']);
define('COLOR_TEXTO_BOTON', $data[0]['texto_boton']);
define('TEXTO_BTN_SLIEDER', $data[0]['texto_btn_slider']);
define('COLOR_TEXTO_CABECERA', $data[0]['texto_cabecera']);
?>

<?php include 'Views/templates/css/header_style.php'; ?>
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

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand d-lg-none ms-auto" href="#">
                <img src="<?php echo SERVERURL . LOGO_TIENDA; ?>" alt="IMPORT SHOP">
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
                    <img src="<?php echo SERVERURL . LOGO_TIENDA; ?>" id="imagen_logo" alt="IMPORT SHOP">
                </a>
                <form class="d-flex ms-auto">
                    <input class="form-control search-box" type="search" placeholder="Buscar" aria-label="Buscar">
                </form>
            </div>
        </div>
    </nav>