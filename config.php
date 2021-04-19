<?php
$lifetime=1209600;
@session_start();
setcookie(session_name(),session_id(),time()+$lifetime);


date_default_timezone_set('America/Mexico_city');
$fecha = date('Y-m-d h:i:s');
define('FECHA', $fecha);

/**
ssh -p 22 camadmx@camad.edu.mx
M*mRyGK5^Hiw

 */
//M*mRyGK5^Hiw
$fileDir = "comisa/";
$fileType = ".jpg";

$folder = explode("/", $_SERVER['REQUEST_URI']);

define('FOLDER', $folder[1]);

// Definiendo la ruta de la web 
define('HTTP_HOST', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . FOLDER . '/');

// Definiendo el directorio del proyecto
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/' . $folder[1] . '/');

define('DB_NAME', 'db_comisa');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');


// Titulo de la aplicación
define('TITULO_APP', 'COMISA');

define('VERSION_APP', '1.0.0');


// Logo blanco y negro
define('LOGO_BN',  HTTP_HOST . 'app/assets/images/sistema/'.$fileDir.'logo_n'.$fileType);



// Logo de color
define('LOGO_C', HTTP_HOST . 'app/assets/images/sistema/'.$fileDir.'logo'.$fileType);

// Icono de aplicación 
define('ICON_APP', HTTP_HOST . 'app/assets/images/sistema/'.$fileDir.'icono'.$fileType);

define('DESAROLLADOR', 'Softmor Studios');

define('SITIO_WEB', 'https://www.softmor.com/');

define("CLIENTE_ID", 'sus_000001');
define("SUCURSAL_ID", 'c456153babf04c97a490ac8dd6630550');
define('SUB_FIJO', 'ST-');




function preArray($array)
{
    echo "<pre>", var_dump($array), "</pre>";
}

function cargarComponente($componente, $rutas = "", $label = "", $paginas = "")
{
    include_once 'app/componentes/' . $componente . '.php';
}

function cargarPagina($pagina, $rutas = "")
{
    include_once 'app/view/' . $pagina . '.php';
}

function cargarview($view, $rutas = "")
{
    include_once 'app/modulos/' . $view . '/' . $view . '.php';
}

function cargarview2($view, $rutas = "")
{
    include_once 'app/modulos/' . $view . '.php';
}

// Función para iniciar la aplicación
function iniciarApp()
{

    include_once 'app/modulos/app/app.php';
}

function startLoadButton()
{
    echo '
    <script>
    $(".btn-load").attr("disabled", true);
    $(".btn-load").html(` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Por favor espere...`)
    </script>';
}



function stopLoadButton($label)
{
    echo '
    <script>
    $(".btn-load").attr("disabled", false);
    $(".btn-load").html("' . $label . '")
    </script>';
}

function is_valid_email($str)
{
    $matches = null;
    return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
}

function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
    $arBytes = array(
        0 => array(
            "UNIT" => "TB",
            "VALUE" => pow(1024, 4)
        ),
        1 => array(
            "UNIT" => "GB",
            "VALUE" => pow(1024, 3)
        ),
        2 => array(
            "UNIT" => "MB",
            "VALUE" => pow(1024, 2)
        ),
        3 => array(
            "UNIT" => "KB",
            "VALUE" => 1024
        ),
        4 => array(
            "UNIT" => "B",
            "VALUE" => 1
        ),
    );
    foreach ($arBytes as $arItem) {
        if ($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", ",", strval(round($result, 2))) . " " . $arItem["UNIT"];
            break;
        }
    }
    return $result;
}
function format_folder_size($size)
{
    if ($size >= 1073741824) {
        $size = number_format($size / 1073741824, 2) . ' GB';
    } elseif ($size >= 1048576) {
        $size = number_format($size / 1048576, 2) . ' MB';
    } elseif ($size >= 1024) {
        $size = number_format($size / 1024, 2) . ' KB';
    } elseif ($size > 1) {
        $size = $size . ' bytes';
    } elseif ($size == 1) {
        $size = $size . ' byte';
    } else {
        $size = '0 bytes';
    }
    return $size;
}

function get_folder_size($folder_name)
{
    $total_size = 0;
    $file_data = scandir($folder_name);
    foreach ($file_data as $file) {
        if ($file === '.' or $file === '..') {
            continue;
        } else {
            $path = $folder_name . '/' . $file;
            $total_size = $total_size + filesize($path);
        }
    }
    return format_folder_size($total_size);
}


function getTypeImg($filename)
{
    $size = getimagesize($filename);

    switch ($size['mime']) {
        case "image/gif":
            return "Image is a gif";
            break;
        case "image/jpeg":
            return "Image is a jpeg";
            break;
        case "image/png":
            return "Image is a png";
            break;
        case "image/bmp":
            return "Image is a bmp";
            break;
    }
}

function verifica_rango($date_inicio, $date_fin, $date_nueva)
{
    $date_inicio = strtotime($date_inicio);
    $date_fin = strtotime($date_fin);
    $date_nueva = strtotime($date_nueva);
    if (($date_nueva >= $date_inicio) && ($date_nueva <= $date_fin))
        return true;
    return false;
}
function fechaCastellano($fecha)
{
    $hora = substr($fecha, 10, 10);
    $fecha = substr($fecha, 0, 10);
    
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $anio = date('Y', strtotime($fecha));
    $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $nombredia = str_replace($dias_EN, $dias_ES, $dia);
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
    return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio.' - '.$hora;
}