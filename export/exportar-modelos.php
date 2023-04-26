<?php
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header("Content-Disposition: attachment; filename=exportar_modelos.csv");
header("Pragma: no-cache");
header("Expires: 0");
header('Content-Transfer-Encoding: binary');
echo "\xEF\xBB\xBF";
include_once '../config.php';
require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.modelo.php';
$modelos = ProductosModelo::mdlMostrarModelos();
echo "MODELO,";
echo "PRODUCTO,";
echo "PROVEEDOR,";
echo "CREDITO,";
echo "ENGANCHE,";
echo "PAGO SEMANAL,";
echo "CONTADO,";
echo "A UN MES,";
echo "A DOS MESES \n";
foreach ($modelos as $key => $mpds) {
    echo $mpds['mpds_modelo'] . ",";
    echo $mpds['mpds_descripcion'] . ",";
    echo $mpds['pvs_nombre'] . ",";
    echo $mpds['mpds_credito'] . ",";
    echo $mpds['mpds_enganche'] . ",";
    echo $mpds['mpds_pago_semanal'] . ",";
    echo $mpds['mpds_contado'] . ",";
    echo $mpds['mpds_un_mes'] . ",";
    echo $mpds['mpds_dos_meses'] . "\n";
}