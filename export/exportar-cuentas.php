<?php
header('Content-Encoding: UTF-8');

header('Content-type: text/csv; charset=UTF-8');

header("Content-Disposition: attachment; filename=enrutar_cuentas.csv");

header("Pragma: no-cache");

header("Expires: 0");

header('Content-Transfer-Encoding: binary');

echo "\xEF\xBB\xBF";
// wget -O /dev/null https://pruebas-comisa.softmor.com/api/public/prueba_cron

include_once '../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.modelo.php';




echo "RUTA,";
echo "CUENTA,";
echo "TOTAL,";
echo "ENGANCHE,";
echo "PAGO ADICIONAL,";
echo "SALDO,";
echo "SALDO ACTUAL,";
echo "ULTIMA FECHA DE ABONO,";
echo "TOTAL PAGADO,";
echo "FORMA PAGO,";
echo "DIA PAGO,";
echo "PAGO,";
echo "STATUS CUENTA,";
echo "FECHA PRIMER PAGO,";
echo "FECHA PROXIMO PAGO,";
echo "ORDEN \n";

//http://localhost/comisa.com/export/exportar-cuentas.php

$cuentas = ContratosModelo::mdlMostrarSaldosRuta('R3');
foreach ($cuentas as $key => $ctr) {

    // $fecha_abono = date($ctr['ctr_ultima_fecha_abono'], "Y-m-d");
    $fecha_abono = date('Y-m-d', strtotime($ctr['ctr_ultima_fecha_abono']));
    $proximo_pago = date('Y-m-d', strtotime($ctr['ctr_proximo_pago']));

    echo $ctr['ctr_ruta'] . ",";
    echo $ctr['ctr_numero_cuenta'] . ",";
    echo $ctr['ctr_total'] . ",";
    echo $ctr['ctr_enganche'] . ",";
    echo $ctr['ctr_pago_adicional'] . ",";
    echo $ctr['ctr_saldo'] . ",";
    echo $ctr['ctr_saldo_actual'] . ",";
    echo $fecha_abono . ",";
    echo $ctr['ctr_total_pagado'] . ",";
    echo $ctr['ctr_forma_pago'] . ",";
    echo $ctr['ctr_dia_pago'] . ",";
    echo $ctr['ctr_pago_credito'] . ",";
    echo $ctr['ctr_status_cuenta'] . ",";
    echo $proximo_pago . ",";
    echo ",";
    echo $ctr['ctr_orden'] . "\n";
}
