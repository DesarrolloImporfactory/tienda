<?php
const HOST = '3.233.119.65';
const USER = "imporsuit_system";
const PASSWORD = "imporsuit_system";
const DB = "imporsuitpro_new";
const CHARSET = "utf8";



if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('ENVIRONMENT', 'development');
} else {
    define('ENVIRONMENT', 'production');
}
if (ENVIRONMENT == 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    define("SERVERURL", "http://localhost/imporsutipro/");
} else {
}

$Ur = $_SERVER['HTTP_HOST'];



$url_actual = "https://" . $_SERVER['HTTP_HOST'] . '/';
$nombre_actual = str_replace("imporsuitpro.com", "", $Ur);
if (str_contains($Ur, "comprapor")) $url_actual =  str_replace("comprapor.com", "imporsuitpro.com", $url_actual);
if (str_contains($Ur, "comprapor")) $nombre_actual = str_replace("comprapor.com", "", $nombre_actual);

//recibe tony.imporsuitpro.com ydebe ser new.imporsuitpro.com


$url_actual = str_replace($nombre_actual, "new.", $url_actual);

$mysqli = new mysqli(HOST, USER, PASSWORD, DB);
$mysqli->set_charset(CHARSET);
if ($mysqli->connect_errno) {
    echo "Error al conectarse con la base de datos";
    exit;
}






const LAAR_USER = "import.uio.api";
const LAAR_PASSWORD = "Imp@rt*23";
const LAAR_ENDPOINT_AUTH = "https://api.laarcourier.com:9727/authenticate";
const LAAR_ENDPOINT = "https://api.laarcourier.com:9727/guias/contado";
const LLAR_ENDPOINT_CANCEL = 'https://api.laarcourier.com:9727/guias/anular/';

// devolver el host antes de new
$hostAntiguo = $_SERVER['HTTP_HOST'];
$hostNuevo = str_replace("imporsuitpro.com", "", $hostAntiguo);

if (str_contains($hostNuevo, "comprapor.com")) $hostNuevo = str_replace("comprapor.com", "", $hostNuevo);

$recuperado = str_replace("new.", "", $hostNuevo);
$url_actual = "https://" . $recuperado . "imporsuitpro.com";

$id_plataforma = "SELECT * FROM plataformas where url_imporsuit = '$url_actual' or dominio = '$hostAntiguo'";
$result = $mysqli->query($id_plataforma);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_plataforma = $row['id_plataforma'];
        
        $id_matriz = $row['id_matriz'];
    }
} else {
    echo "0 resultss";
}


$url_matriz = "SELECT * FROM matriz where idmatriz = '$id_matriz'";
$result = $mysqli->query($url_matriz);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $url_matriz = $row['url_matriz'];
         $marca = $row['marca'];
        //echo $url_matriz;
       // $id_matriz = $row['id_matriz'];
    }
} else {
    echo "0 resultss";
}

$mysqli->close();




define("ID_PLATAFORMA", $id_plataforma);
define("SERVERURL", $url_matriz);
define("MARCA", $marca);

