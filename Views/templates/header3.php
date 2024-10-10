<?php
session_start();

// Oculta los errores en producción
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); // Cambiar a 0 para desactivar la visualización de errores por completo
// Fin Oculta los errores en producción

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
define('COLOR_CABECERA', $data2[0]['color_cabecera']);
define('COLOR_TEXTO_CABECERA', $data2[0]['color_texto_cabecera']);
define('COLOR_HOVER_CABECERA', $data2[0]['color_hover_cabecera']);
define('COLOR_TEXTO_PRECIO', $data2[0]['color_texto_precio']);


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

/* promocion */
define('TITULO_PROMOCION', $data2[0]['titulo_promocion']);
define('PRECIO_PROMOCION', $data2[0]['precio_promocion']);
define('DESCRIPCION_PROMOCION', $data2[0]['descripcion_promocion']);
define('TEXTO_BTN_PROMOCION', $data2[0]['texto_btn_promocion']);
define('ENLACE_BTN_PROMOCION', $data2[0]['enlace_btn_promocion']);
define('COLOR_BTN_PROMOCION', $data2[0]['color_btn_promocion']);
define('COLOR_FONDO_PROMOCION', $data2[0]['color_fondo_promocion']);
define('COLOR_LETRA_PROMOCION', $data2[0]['color_letra_promocion']);
define('COLOR_LETRABTN_PROMOCION', $data2[0]['color_letraBtn_promocion']);
define('IMAGEN_PROMOCION', $data2[0]['imagen_promocion']);
/* fin promocion */

?>

<?php include 'Views/templates/css/header3_style.php'; ?>
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