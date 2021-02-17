<?php
header('Content-Encoding: UTF-8');

header('Content-type: text/csv; charset=UTF-8');

header("Content-Disposition: attachment; filename=alumnos_export.csv");

header("Pragma: no-cache");

header("Expires: 0");

header('Content-Transfer-Encoding: binary');

echo "\xEF\xBB\xBF";
session_start();

include_once '../../../config.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';

$usuarios = UsuariosModelo::mdlMostrarUsuarios("", "Alumno");


echo "ID,";
echo "Matricula,";
echo "Nombre,";
echo "Apellido paterno,";
echo "Apellido Materno,";
echo "Teléfono,";
echo "Correo electrónico,";
echo "Calle,";
echo "Número exterior,";
echo "Número interior,";
echo "Código postal,";
echo "Colonia,";
echo "Estado,";
echo "Municipio\n";
foreach ($usuarios as $key => $usr) {
    echo $usr['usr_id'] . ",";
    echo $usr['usr_matricula'] . ",";
    echo $usr['usr_nombre'] . ",";
    echo $usr['usr_app'] . ",";
    echo $usr['usr_apm'] . ",";
    echo $usr['usr_telefono'] . ",";
    echo $usr['usr_correo'] . ",";
    echo $usr['usr_calle'] . ",";
    echo $usr['usr_ne'] . ",";
    echo $usr['usr_ni'] . ",";
    echo $usr['usr_cp'] . ",";
    echo $usr['usr_colonia'] . ",";
    echo $usr['usr_estado'] . ",";
    echo $usr['usr_municipio'] . "\n";
}


