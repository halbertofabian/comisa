<?php
header('Content-Encoding: UTF-8');

header('Content-type: text/csv; charset=UTF-8');

header("Content-Disposition: attachment; filename=exportar_ruta_" . $_GET['usr_ruta'] . ".csv");

header("Pragma: no-cache");

header("Expires: 0");

header('Content-Transfer-Encoding: binary');

echo "\xEF\xBB\xBF";
// wget -O /dev/null https://pruebas-comisa.softmor.com/api/public/prueba_cron

include_once '../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.modelo.php';
$contratos = array();
$cuentas = ContratosModelo::mdlMostrarSaldosRuta($_GET['usr_ruta']);
foreach ($cuentas as $key => $ctr) {
    // $fecha_abono = date($ctr['ctr_ultima_fecha_abono'], "Y-m-d");
    $fecha_abono = $ctr['ctr_ultima_fecha_abono'] == "0000-00-00" ? "00-00-0000" : date('Y-m-d', strtotime($ctr['ctr_ultima_fecha_abono']));
    $proximo_pago = $ctr['ctr_proximo_pago'] == "0000-00-00" ? "00-00-0000" : date('Y-m-d', strtotime($ctr['ctr_proximo_pago']));

    $datos = array(
        'ctr_ruta' => $ctr['ctr_ruta'],
        'ctr_numero_cuenta' => $ctr['ctr_numero_cuenta'],
        'ctr_cliente' => $ctr['ctr_cliente'],
        'clts_domicilio' => str_replace(',', ' ', $ctr['clts_domicilio']),
        'clts_col' => str_replace(',', ' ', $ctr['clts_col']),
        'clts_coordenadas' => $ctr['clts_coordenadas'],
        'clts_telefono' => $ctr['clts_telefono'],
        'ctr_total' => $ctr['ctr_total'],
        'ctr_enganche' => $ctr['ctr_enganche'],
        'ctr_pago_adicional' => $ctr['ctr_pago_adicional'],
        'ctr_saldo' => $ctr['ctr_saldo'],
        'ctr_saldo_actual' => $ctr['ctr_saldo_actual'],
        'fecha_abono' => $fecha_abono,
        'ctr_total_pagado' => $ctr['ctr_total_pagado'],
        'ctr_forma_pago' => $ctr['ctr_forma_pago'],
        'ctr_dia_pago' => "D:" . $ctr['ctr_dia_pago'],
        'ctr_pago_credito' => $ctr['ctr_pago_credito'],
        'ctr_status_cuenta' => $ctr['ctr_status_cuenta'],
        'proximo_pago' => $proximo_pago,
        'ctr_orden' => $ctr['ctr_orden'],
        'ctr_enrutar' => $ctr['ctr_enrutar']
    );

    array_push($contratos, $datos);
}

echo "RUTA,";
echo "CUENTA,";
echo "CLIENTE,";
echo "DOMICILIO,";
echo "COLONIA,";
echo "COORDENADAS,";
echo "TELEFONO,";
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
// echo "FECHA PRIMER PAGO,";
echo "FECHA PROXIMO PAGO,";
echo "ORDEN,";
echo "ENRUTE \n";

//http://localhost/comisa.com/export/exportar-cuentas.php

foreach ($contratos as $key => $ctr) {

    echo $ctr['ctr_ruta'] . ",";
    echo $ctr['ctr_numero_cuenta'] . ",";
    echo $ctr['ctr_cliente'] . ",";
    echo $ctr['clts_domicilio'] . ",";
    echo $ctr['clts_col'] . ",";
    echo $ctr['clts_coordenadas'] . ",";
    echo $ctr['clts_telefono'] . ",";
    echo $ctr['ctr_total'] . ",";
    echo $ctr['ctr_enganche'] . ",";
    echo $ctr['ctr_pago_adicional'] . ",";
    echo $ctr['ctr_saldo'] . ",";
    echo $ctr['ctr_saldo_actual'] . ",";
    echo $ctr['fecha_abono'] . ",";
    echo $ctr['ctr_total_pagado'] . ",";
    echo $ctr['ctr_forma_pago'] . ",";
    echo $ctr['ctr_dia_pago'] . ",";
    echo $ctr['ctr_pago_credito'] . ",";
    echo $ctr['ctr_status_cuenta'] . ",";
    echo $ctr['proximo_pago'] . ",";
    echo $ctr['ctr_orden'] . ",";
    echo $ctr['ctr_enrutar'] . "\n";
}
