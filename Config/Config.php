<?php
const HOST = '3.233.119.65';
const USER = "imporsuit_system";
const PASSWORD = "imporsuit_system";
const DB = "imporsuitpro_new";
const CHARSET = "utf8";



if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == "192.168.100.12") { 
    define('ENVIRONMENT', 'development');
} else {
    define('ENVIRONMENT', 'production');
}
if (ENVIRONMENT == 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    define("SERVERURL", "https://new.imporsuitpro.com/");
} else {
}

$Ur = $_SERVER['HTTP_HOST'];



$url_actual = "https://" . $_SERVER['HTTP_HOST'] . '/';
$nombre_actual = str_replace("imporsuitpro.com", "", $Ur);
if (str_contains($Ur, "comprapor")) $url_actual =  str_replace("comprapor.com", "imporsuitpro.com", $url_actual);
if (str_contains($Ur, "comprapor")) $nombre_actual = str_replace("comprapor.com", "", $nombre_actual);
if (str_contains($Ur, "merkapro.ec")) $url_actual = str_replace("merkapro.ec", "imporsuitpro.com", $url_actual);
if (str_contains($Ur, "merkapro.ec")) $nombre_actual = str_replace("merkapro.ec", "", $nombre_actual);

//recibe pruebad.imporsuitpro.com ydebe ser new.imporsuitpro.com


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
if (str_contains($hostNuevo, "merkapro.ec")) $hostNuevo = str_replace("merkapro.ec", "", $hostNuevo);

if (str_contains($hostNuevo, "connect-mas.com")) $hostNuevo = str_replace("connect-mas.com", "", $hostNuevo);

$recuperado = str_replace("new.", "", $hostNuevo); 
$url_actual = "https://" . $recuperado . "imporsuitpro.com";
if (str_contains($hostAntiguo, "comprapor.com")) $url_actual = str_replace("imporsuitpro.com", "comprapor.com", $url_actual);
if (str_contains($hostAntiguo, "merkapro.ec")) $url_actual = str_replace("imporsuitpro.com", "merkapro.ec", $url_actual);
if (str_contains($hostAntiguo, "connect-mas.com")) $url_actual = str_replace("imporsuitpro.com", "connect-mas.com", $url_actual);

if($_SERVER["HTTP_HOST"] == "localhost"|| $_SERVER['HTTP_HOST'] == "192.168.100.12"){
    $url_actual = "https://propeldesign.imporsuitpro.com";
}
$id_plataforma = "SELECT * FROM plataformas where url_imporsuit = '$url_actual' or dominio = '$hostAntiguo'";
//echo $id_plataforma;
$result = $mysqli->query($id_plataforma);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_plataforma = $row['id_plataforma'];

        $id_matriz = $row['id_matriz'];
    }
} else {
    echo "0 resultss";
}
if($_SERVER["HTTP_HOST"] == "localhost" || $_SERVER['HTTP_HOST'] == "192.168.100.12") $id_matriz = 1;
//echo $id_matriz;
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
/*define("SERVERURL", 'https://new.imporsuitpro.com/');
*/define("MARCA", $marca);
