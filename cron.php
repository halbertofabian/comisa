<?php
// wget -O /dev/null https://pruebas-comisa.softmor.com/api/public/prueba_cron
include_once 'config.php';



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

$next_day =  date('Y-m-d', strtotime('next Monday'));

echo $next_day;
