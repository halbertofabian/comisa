<?php
// wget -O /dev/null https://pruebas-comisa.softmor.com/api/public/finalizar_cobranza
include_once 'config.php';


require_once DOCUMENT_ROOT . 'app/modulos/cobranza/cobranza.modelo.php';


// $listarAbonos = CobranzaModelo::mdlListarPagosPendientes(88);
// $array_contratos = array();
// foreach ($listarAbonos as  $abs) {
//     $cts = CobranzaModelo::mdlObtenerContratoCobrado($abs['abs_id_contrato']);
//     $contratos = array(
//         'abono' => $abs,
//         'contrato' => $cts,
//     );
//     array_push($array_contratos, $contratos);
// }
// // ACTUALIZAR  SALDOS
// foreach ($array_contratos as  $cts) {
//     # code...
//     $nuevo_saldo = dnum($cts['contrato']['ctr_saldo_actual']) - dnum($cts['abono']['abs_monto']);
//     $total_pagado = dnum($cts['contrato']['ctr_total_pagado']) + dnum($cts['abono']['abs_monto']);

//     $saldo_act = CobranzaModelo::mdlActualizarSaldosContrato(array(
//         'ctr_saldo_actual' => $nuevo_saldo,
//         'ctr_total_pagado' => $total_pagado,
//         'ctr_ultima_fecha_abono' => $cts['abono']['abs_fecha_cobro'],
//         'ctr_id' => $cts['contrato']['ctr_id']
//     ));

//     if ($saldo_act) {
//         // CobranzaModelo::mdlActualizarEstadoPago($cts['abono']['abs_id']);
//     }
// }

$ref = array(
    'ctr_id' => 6353,
    'cra_ref' => array(
        0 => 'Ref 1',
        1 => 'Ref 2',
        2 => 'Ref 3',
    )
);

$ref1 = json_encode($ref, true);
echo $ref1;

// $array  = json_decode($ref1, true);
// preArray($array);

// $dias = "1-16";
// $dias = explode('-', $dias);
// $dia1 = $dias[0];
// $dia2 = $dias[1];
// $fecha_mes = date('Y-m', strtotime('this month'));
// $dia1 = $dia1 < 10 ? "0" . $dia1 : $dia1;
// $dia2 = $dia2 < 10 ? "0" . $dia2 : $dia2;

// $fecha_mes_1 = $fecha_mes . '-' . $dia1;
// $fecha_mes_2 = $fecha_mes . '-' . $dia2;
// // echo $fecha_mes_2 .'<br>';
// if ($fecha_mes_1 > FECHA_ACTUAL) {
//     $next_day = $fecha_mes_1;
// } else if ($fecha_mes_2 > FECHA_ACTUAL) {
//     $next_day = $fecha_mes_2;
// } else {
//     $next_mes = date('Y-m', strtotime('next month'));
//     $next_day = $next_mes . '-' . $dia1;
// }

// $next_day =  date('Y-m-d', strtotime('+ 1 days'));

// echo $next_day;
