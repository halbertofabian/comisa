<?php
header('Content-Encoding: UTF-8');

header('Content-type: text/csv; charset=UTF-8');

header("Content-Disposition: attachment; filename=exportar_productos.csv");

header("Pragma: no-cache");

header("Expires: 0");

header('Content-Transfer-Encoding: binary');

echo "\xEF\xBB\xBF";

include_once '../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.modelo.php';

$productos = ProductosModelo::mdlMostrarProductosAlamacenInventario(1);

echo "SKU,";
echo "Nombre,";
echo "Existencias \n";
foreach ($productos as $key => $pds) :
    $pds_sku = explode("/", $pds['pds_sku']);
    echo $pds_sku[0] . ",";
    echo explode(",", "", $pds['pds_nombre']) . ",";
    echo $pds['pds_stok'] . "\n";
endforeach;
