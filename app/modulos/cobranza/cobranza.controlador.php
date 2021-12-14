
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 18/08/2021 12:07
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class CobranzaControlador
{
    public function ctrAgregarCobranza()
    {
    }
    public function ctrActualizarCobranza()
    {
    }
    public function ctrMostrarCobranza()
    {
    }
    public function ctrEliminarCobranza()
    {
    }

    public static function  ctrLoginCobrador($usr)
    {

        $usrLogin = UsuariosModelo::mdlLoginCobranza($usr);

        if (!$usrLogin  || !password_verify($usr['usr_clave'], $usrLogin['usr_clave'])) {
            return array(
                'status' => false,
                'mensaje' => 'Usuario o contraseña incorrectos, intente de nuevo'
            );
        } else {

            $sucursal = SucursalesModelo::mdlMostrarSucursales(SUCURSAL_ID);
            return array(
                'status' => true,
                'mensaje' => '¡' . $usrLogin['usr_nombre'] . ', bienvenido a la app de comisa cobranza!',
                'usr' => $usrLogin,
                'scl' => $sucursal,
                'scl_url_access' => HTTP_HOST
            );
        }
    }
    public static function ctrActualizarSaldosByExcel()
    {
        try {

            $nombreArchivo = $_FILES['archivoExcel']['tmp_name'];

            // Cargar hoja de calculo
            $leerExcel = PHPExcel_IOFactory::createReaderForFile($nombreArchivo);

            $objPHPExcel = $leerExcel->load($nombreArchivo);

            //var_dump($objPHPExcel);

            $objPHPExcel->setActiveSheetIndex(0);

            $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
            $countUpdate = 0;

            for ($i = 2; $i <= $numRows; $i++) {

                $ctr_ruta = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                $ctr_numero_cuenta = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                $ctr_total = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                $ctr_enganche = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                $ctr_pago_adicional = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                $ctr_saldo = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                $ctr_saldo_actual = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                $ctr_ultima_fecha_abono = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                $ctr_total_pagado = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
                $ctr_forma_pago = $objPHPExcel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
                $ctr_dia_pago = $objPHPExcel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
                $ctr_pago_credito = $objPHPExcel->getActiveSheet()->getCell('L' . $i)->getCalculatedValue();
                $ctr_status_cuenta = $objPHPExcel->getActiveSheet()->getCell('M' . $i)->getCalculatedValue();

                $ctr = ContratosModelo::mdlMostrarSaldosContratos($ctr_numero_cuenta, $ctr_ruta);
                //En caso de que la cuenta exista
                $ctr_total =  $ctr_total == ""  ? $ctr['ctr_total']   :   $ctr_total;
                $ctr_enganche =  $ctr_enganche == ""  ? $ctr['ctr_enganche']   :   $ctr_enganche;
                $ctr_pago_adicional =  $ctr_pago_adicional == ""  ? $ctr['ctr_pago_adicional']   :   $ctr_pago_adicional;
                $ctr_saldo =  $ctr_saldo == ""  ? $ctr['ctr_saldo']   :   $ctr_saldo;
                $ctr_saldo_actual =  $ctr_saldo_actual == ""  ? $ctr['ctr_saldo_actual']   :   $ctr_saldo_actual;
                $ctr_ultima_fecha_abono =  $ctr_ultima_fecha_abono == ""  ? $ctr['ctr_ultima_fecha_abono']   :   $ctr_ultima_fecha_abono;
                $ctr_total_pagado =  $ctr_total_pagado == ""  ? $ctr['ctr_total_pagado']   :   $ctr_total_pagado;
                $ctr_forma_pago =  $ctr_forma_pago == ""  ? $ctr['ctr_forma_pago']   :   $ctr_forma_pago;
                $ctr_dia_pago =  $ctr_dia_pago == ""  ? $ctr['ctr_dia_pago']   :   $ctr_dia_pago;
                $ctr_pago_credito =  $ctr_pago_credito == ""  ? $ctr['ctr_pago_credito']   :   $ctr_pago_credito;
                $ctr_status_cuenta =  $ctr_status_cuenta == ""  ? $ctr['ctr_status_cuenta']   :   $ctr_status_cuenta;




                $data = array(
                    "ctr_ruta" => $ctr_ruta,
                    "ctr_numero_cuenta" => $ctr_numero_cuenta,
                    "ctr_total" => $ctr_total,
                    "ctr_enganche" => $ctr_enganche,
                    "ctr_pago_adicional" => $ctr_pago_adicional,
                    "ctr_saldo" => $ctr_saldo,
                    "ctr_saldo_actual" => $ctr_saldo_actual,
                    "ctr_ultima_fecha_abono" => $ctr_ultima_fecha_abono,
                    "ctr_total_pagado" => $ctr_total_pagado,
                    "ctr_forma_pago" => $ctr_forma_pago,
                    "ctr_dia_pago" => $ctr_dia_pago,
                    "ctr_pago_credito" => $ctr_pago_credito,
                    "ctr_status_cuenta" => $ctr_status_cuenta
                );

                $res = CobranzaModelo::mdlActualizarSaldos($data);

                if ($res) {
                    $countUpdate += 1;
                }
            }

            return array(
                'status' => true,
                'mensaje' => "Carga de saldos con éxito",
                'update' => $countUpdate
            );
        } catch (Exception $th) {
            $th->getMessage();
            return array(
                'status' => false,
                'mensaje' => "No se encuentra el archivo solicitado, por favor carga el archivo correcto",
                'insert' =>  "",
                'update' => ""
            );
        }
    }

    public static function ctrReEnrutarCuentasCompletadas($cts_completadas)
    {
        $cts_completadas = json_decode($cts_completadas, true);
        //preArray($cts_completadas);
        // return;

        foreach ($cts_completadas as  $cts_c) {

            // Saber la forma de pago
            switch ($cts_c['ctr_forma_pago']) {
                case 'SEMANALES':
                    // Calcular  el día en fecha de la siguiente semana por default es lunes
                    $next_day =  date('Y-m-d', strtotime('Monday next week'));
                    if ($cts_c['ctr_dia_pago'] == 'LUNES') {
                        $next_day =  date('Y-m-d', strtotime('Monday next week'));
                    } else if ($cts_c['ctr_dia_pago'] == 'MARTES') {
                        $next_day =  date('Y-m-d', strtotime('Tuesday next week'));
                    } else if ($cts_c['ctr_dia_pago'] == 'MIERCOLES') {
                        $next_day =  date('Y-m-d', strtotime('Wednesday next week'));
                    } else if ($cts_c['ctr_dia_pago'] == 'JUEVES') {
                        $next_day =  date('Y-m-d', strtotime('Thursday next week'));
                    } else if ($cts_c['ctr_dia_pago'] == 'VIERNES') {
                        $next_day =  date('Y-m-d', strtotime('Friday next week'));
                    } else if ($cts_c['ctr_dia_pago'] == 'SABADO') {
                        $next_day =  date('Y-m-d', strtotime('Saturday next week'));
                    } else if ($cts_c['ctr_dia_pago'] == 'DOMINGO') {
                        $next_day =  date('Y-m-d', strtotime('Sunday next week'));
                    }

                    break;
                    // QUINCENALES
                    // CATROCELAES
                    // MENSUALES   
                default:
                    # code...
                    break;
            }
            // Actualizar el estado a COMPLETADO
            CobranzaModelo::mdlCambiarEstadoCarteleraCompletado($cts_c['cra_id'],$next_day);
            //Enrutar el siguiente cobro
            CobranzaModelo::mdlInsertarSiguienteEnrutamiento(array(
                'cra_contrato' => $cts_c['cra_contrato'],
                'cra_fecha_cobro' => $next_day,
                'cra_orden' => $cts_c['cra_orden'],
            ));
            # code...
        }
    }
    public static function ctrRegistrarAbonosCobranzaApp($abs_completos)
    {
        $abs_completos = json_decode($abs_completos, true);

        foreach ($abs_completos as  $abs_c) {
            CobranzaModelo::mdlRegistrarAbono($abs_c);
        }
    }

    public static function ctrSubirDatosCobranzaApp($datos)
    {
        //  var_dump($datos[0]['Completados']);
        // preArray(date('Y-m-d', strtotime('Friday next week')));
        // return;
        $cts_c = json_encode($datos[0]['Completados'], true);
        $abs_c = json_encode($datos[1]['Abonos'], true);
        CobranzaControlador::ctrReEnrutarCuentasCompletadas($cts_c);
        CobranzaControlador::ctrRegistrarAbonosCobranzaApp($abs_c);
    }
}
