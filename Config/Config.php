<?php
const HOST = '3.233.119.65';
const USER = "imporsuit_system";
const PASSWORD = "imporsuit_system";
const DB = "imporsuitpro_new";
const CHARSET = "utf8";

// Determinar el entorno
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('ENVIRONMENT', 'development');
} else {
    define('ENVIRONMENT', 'production');
}

// Configuración de errores en desarrollo
if (ENVIRONMENT == 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    define("SERVERURL", "http://localhost/imporsutipro/");
}

// Obtener la URL actual
$Ur = $_SERVER['HTTP_HOST'];
$url_actual = "https://" . $Ur . "/";

// Verificar si el dominio contiene "imporsuitpro.com"
if (strpos($Ur, 'imporsuitpro.com') === false) {
    // Si no contiene el dominio, agregarlo
    $Ur .= '.imporsuitpro.com';
    $url_actual = "https://" . $Ur . "/";
}

// Modificar el subdominio a "new"
$nombre_actual = str_replace("imporsuitpro.com", "", $Ur);
$nombre_actual = str_replace(".com", "", $nombre_actual);
$url_actual = str_replace($nombre_actual, "new.", $url_actual);

// Conexión a la base de datos
$mysqli = new mysqli(HOST, USER, PASSWORD, DB);
$mysqli->set_charset(CHARSET);
if ($mysqli->connect_errno) {
    echo "Error al conectarse con la base de datos";
    exit;
}

// Obtener datos de la matriz
$matriz = [];
$sql = "SELECT * FROM matriz WHERE url_matriz = '$url_actual'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $matriz = $row;
    }
} else {
    echo "0 results";
}

// Variables de configuración de la matriz
$id_matriz = $matriz['idmatriz'] ?? '';
$color_fondo = $matriz['color_fondo_login'] ?? '';
define("MATRIZ", $id_matriz);
$url_matriz = $matriz['url_matriz'] ?? '';
if (ENVIRONMENT == "production") {
    define("SERVERURL", $url_matriz);
}

// Configuración de otras variables
$logo = $matriz['logo'] ?? '';
$marca = $matriz['marca'] ?? '';
$prefijo = $matriz['prefijo'] ?? '';
$color_letras = $matriz['color_letras'] ?? '';
$color_hover = $matriz['color_hover'] ?? '';
$color_letra_hover = $matriz['color_letra_hover'] ?? '';
$banner_inicio = $matriz['banner_inicio'] ?? '';
$dominio = $matriz['dominio'] ?? '';
$login_image = $matriz['login_image'] ?? '';
$color_boton_login  = $matriz['color_boton_login'] ?? '';
$color_hover_login = $matriz['color_hover_login'] ?? '';
$color_favorito = $matriz['color_favorito'] ?? '';

const LAAR_USER = "import.uio.api";
const LAAR_PASSWORD = "Imp@rt*23";
const LAAR_ENDPOINT_AUTH = "https://api.laarcourier.com:9727/authenticate";
const LAAR_ENDPOINT = "https://api.laarcourier.com:9727/guias/contado";
const LLAR_ENDPOINT_CANCEL = 'https://api.laarcourier.com:9727/guias/anular/';

// Determinar el host antiguo y nuevo
$hostAntiguo = $_SERVER['HTTP_HOST'];
$hostNuevo = str_replace("imporsuitpro.com", "", $hostAntiguo);
$recuperado = str_replace("new.", "", $hostNuevo);
$url_actual = "https://" . $recuperado . "imporsuitpro.com";

// Consultar la plataforma
$id_plataforma = "";
$sql = "SELECT * FROM plataformas WHERE url_imporsuit = '$url_actual'";
echo $sql;
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_plataforma = $row['id_plataforma'];
    }
} else {
    echo "0 resultss";
}
$mysqli->close();

// Definiciones de constantes de la matriz
define("COLOR_FONDO", $color_fondo);
define("IMAGEN_LOGO", $logo);
define("MARCA", $marca);
define("PREFIJOS", $prefijo);

define("COLOR_LETRAS", $color_letras);
define("COLOR_HOVER", $color_hover);
define("COLOR_LETRA_HOVER", $color_letra_hover);
define("BANNER_INICIO", $banner_inicio);
define("DOMINIO", $dominio);
define("LOGIN_IMAGE", $login_image);
define("COLOR_BOTON_LOGIN", $color_boton_login);
define("COLOR_HOVER_LOGIN", $color_hover_login);
define("COLOR_FAVORITO", $color_favorito);
define("ID_PLATAFORMA", $id_plataforma);
