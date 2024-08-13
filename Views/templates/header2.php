<?php
// Inicializa cURL para la primera API
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

// Define las constantes basadas en la respuesta de la primera API
define('NOMBRE_TIENDA', $data[0]['nombre_tienda']);
define('FAVICON', $data[0]['favicon']);
define('LOGO_TIENDA', $data[0]['logo_url']);
define('FACEBOOK', $data[0]['facebook']);
define('INSTRAGRAM', $data[0]['instagram']);
define('TIKTOK', $data[0]['tiktok']);
define('TELEFONO', $data[0]['whatsapp']);

// Inicializa cURL consulta de api plantilla2
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SERVERURL . 'Tienda/obtener_ofertas_plantilla2'); // Cambia esta URL según la API que necesites
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['id_plataforma' => ID_PLATAFORMA])); // Cambia los parámetros según lo necesario
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecuta la solicitud y obtiene la respuesta
$response2 = curl_exec($ch);
curl_close($ch);

// Verifica si se obtuvo una respuesta
if ($response2 === false) {
    die('Error al obtener la información adicional.');
}

// Decodifica la respuesta JSON
$data2 = json_decode($response2, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error al decodificar la respuesta JSON: ' . json_last_error_msg());
}

// Define la constante adicional basada en la respuesta de la segunda API
define('COLOR_BACKGROUND', $data2[0]['color']);
define('COLOR_BOTONES', $data2[0]['color_botones']);
define('COLOR_TEXTO_BOTON', $data2[0]['texto_boton']);
define('COLOR_TEXTO_CABECERA', $data2[0]['texto_cabecera']);
define('COLOR_TEXTO_PRECIO', $data2[0]['texto_precio']);

/* constantes seccion ofertas */
define('TITULO_OFERTA1', $data2[0]['titulo_oferta1']);
define('OFERTA1', $data2[0]['oferta1']);
define('DESCRIPCION_OFERTA1', $data2[0]['descripcion_oferta1']);
define('TEXTO_BTN_OFERTA1', $data2[0]['texto_btn_oferta1']);
define('ENLACE_OFERTA1', $data2[0]['enlace_oferta1']);
define('COLOR_BTN_OFERTA1', $data2[0]['color_btn_oferta1']);
define('COLOR_TEXTO_OFERTA1', $data2[0]['color_texto_oferta1']);
define('COLOR_TEXTOBTN_OFERTA1', $data2[0]['color_textoBtn_oferta1']);
define('IMAGEN_OFERTA1', $data2[0]['imagen_oferta1']);
define('TITULO_OFERTA2', $data2[0]['titulo_oferta2']);
define('OFERTA2', $data2[0]['oferta2']);
define('DESCRIPCION_OFERTA2', $data2[0]['descripcion_oferta2']);
define('TEXTO_BTN_OFERTA2', $data2[0]['texto_btn_oferta2']);
define('ENLACE_OFERTA2', $data2[0]['enlace_oferta2']);
define('COLOR_BTN_OFERTA2', $data2[0]['color_btn_oferta2']);
define('COLOR_TEXTO_OFERTA2', $data2[0]['color_texto_oferta2']);
define('COLOR_TEXTOBTN_OFERTA2', $data2[0]['color_textoBtn_oferta2']);
define('IMAGEN_OFERTA2', $data2[0]['imagen_oferta2']);
/* fin contrantes seccion ofertas */

?>

<?php include 'Views/templates/css/header2_style.php'; ?>
<script>
    const SERVERURL = "<?php echo SERVERURL ?>";
    const MARCA = "<?php echo MARCA ?>";
    const ID_PLATAFORMA = "<?php echo ID_PLATAFORMA ?>";
</script>

<?php
function obtenerPrimeraSeccion()
{
    // Obtener el esquema (http o https)
    $esquema = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';

    // Obtener el host (dominio)
    $host = $_SERVER['HTTP_HOST'];

    // Construir la primera sección de la URL
    $primera_seccion = $esquema . '://' . $host;

    return $primera_seccion;
}

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

// Obtener la primera sección de la URL
$primera_seccion = obtenerPrimeraSeccion();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NOMBRE_TIENDA; ?></title>
    <link rel="icon" href="<?php echo SERVERURL . FAVICON; ?>" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Cargar jQuery antes que cualquier script que lo necesite -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css">


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><?php echo NOMBRE_TIENDA; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <form class="d-flex me-auto">
                        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class='bx bx-cart-download menu-icon'></i> <span class="badge bg-primary">0</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Sub-Nav -->
        <div class="navbar navbar-expand-lg sub-nav bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="subNavbar">
                    <ul class="navbar-nav justify-content-center flex-lg-row flex-column w-100">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Comprar todo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Computadoras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tabletas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Drones y cámaras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Audio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Celulares</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">T.V. y cine en casa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tecnología portátil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Oferta</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>