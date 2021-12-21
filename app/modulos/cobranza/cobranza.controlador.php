
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
            $counEnrutar = 0;

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
                $ctr_proximo_pago = $objPHPExcel->getActiveSheet()->getCell('N' . $i)->getCalculatedValue();
                $ctr_siguiente_fecha_pago = $objPHPExcel->getActiveSheet()->getCell('O' . $i)->getCalculatedValue();
                $ctr_orden = $objPHPExcel->getActiveSheet()->getCell('P' . $i)->getCalculatedValue();
                $ctr_reagendado = $objPHPExcel->getActiveSheet()->getCell('Q' . $i)->getCalculatedValue();

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
                $ctr_proximo_pago =  $ctr_proximo_pago == ""  ? $ctr['ctr_proximo_pago']   :   $ctr_proximo_pago;




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
                    "ctr_status_cuenta" => $ctr_status_cuenta,
                    'ctr_proximo_pago' => $ctr_proximo_pago
                );

                $res = CobranzaModelo::mdlActualizarSaldos($data);

                if ($res) {
                    $countUpdate += 1;
                }


                $enrurar_cta = CobranzaControlador::ctrEnrrutarCuenta(
                    array(
                        'ctr_forma_pago' =>  $ctr_forma_pago,
                        'ctr_dia_pago' =>  $ctr_dia_pago,
                        'ctr_siguiente_fecha_pago' =>  $ctr_siguiente_fecha_pago,
                        'cra_contrato' =>  $ctr['ctr_id'],
                        'ctr_orden' =>  $ctr_orden,
                        'ctr_reagendado' =>  $ctr_reagendado,
                    )
                );
                if ($enrurar_cta) {
                    $counEnrutar += 1;
                }
            }

            return array(
                'status' => true,
                'mensaje' => "Cuentas enrutadas",
                'update' => $counEnrutar
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

    public static function ctrEnrrutarCuenta($cta)
    {
        if ($cta['ctr_forma_pago'] == 'SEMANALES') {
            $next_day =  date('Y-m-d', strtotime('next Monday'));
            if ($cta['ctr_dia_pago'] == 'LUNES') {
                $next_day =  date('Y-m-d', strtotime('next Monday'));
            } else if ($cta['ctr_dia_pago'] == 'MARTES') {
                $next_day =  date('Y-m-d', strtotime('next Tuesday'));
            } else if ($cta['ctr_dia_pago'] == 'MIERCOLES') {
                $next_day =  date('Y-m-d', strtotime('next Wednesday'));
            } else if ($cta['ctr_dia_pago'] == 'JUEVES') {
                $next_day =  date('Y-m-d', strtotime('next Thursday'));
            } else if ($cta['ctr_dia_pago'] == 'VIERNES') {
                $next_day =  date('Y-m-d', strtotime('next Friday'));
            } else if ($cta['ctr_dia_pago'] == 'SABADO') {
                $next_day =  date('Y-m-d', strtotime('next Saturday'));
            } else if ($cta['ctr_dia_pago'] == 'DOMINGO') {
                $next_day =  date('Y-m-d', strtotime('next Sunday'));
            }
        } else if ($cta['ctr_forma_pago'] == 'CATORCENALES') {
            $next_day = $cta['ctr_siguiente_fecha_pago'];
        } else if ($cta['ctr_forma_pago'] == 'QUINCENALES') {
            $dias = $cta['ctr_dia_pago'];
            $dias = explode('-', $dias);
            $dia1 = $dias[0];
            $dia2 = $dias[1];
            $fecha_mes = date('Y-m', strtotime('this month'));
            $dia1 = $dia1 < 10 ? "0" . $dia1 : $dia1;
            $dia2 = $dia2 < 10 ? "0" . $dia2 : $dia2;

            $fecha_mes_1 = $fecha_mes . '-' . $dia1;
            $fecha_mes_2 = $fecha_mes . '-' . $dia2;
            if ($fecha_mes_1 > FECHA_ACTUAL) {
                $next_day = $fecha_mes_1;
            } else if ($fecha_mes_2 > FECHA_ACTUAL) {
                $next_day = $fecha_mes_2;
            } else {
                $next_mes = date('Y-m', strtotime('next month'));
                $next_day = $next_mes . '-' . $dia1;
            }
        } else if ($cta['ctr_forma_pago'] == 'MENSUALES') {
            $dia = $cta['ctr_dia_pago'];
            $fecha_mes = date('Y-m', strtotime('this month'));
            $dia = $dia < 10 ? "0" . $dia : $dia;
            $fecha_mes = $fecha_mes . '-' . $dia;

            if ($fecha_mes > FECHA_ACTUAL) {
                $next_day = $fecha_mes;
            } else {
                $next_mes = date('Y-m', strtotime('next month'));
                $next_day = $next_mes . '-' . $dia;
            }
        }

        $datos_e = array(
            'cra_contrato' => $cta['cra_contrato'],
            'cra_fecha_cobro' => $next_day,
            'cra_fecha_reagenda' => $cta['ctr_reagendado'] == "" ? "0000-00-00" : $cta['ctr_reagendado'],
            'cra_orden' => $cta['ctr_orden'],


        );
        $enrutar = CobranzaModelo::mdlRegistrarSigienteEnrutamiento($datos_e);
        return $enrutar;
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
                    $cra_fecha_reagenda = '00:00:00';
                    //$next_day =  date('Y-m-d', strtotime($cts_c['cra_fecha_cobro'] . '+ 7 days'));
                    break;
                    // CATORCENALES
                case 'CATORCENALES':

                    break;

                    // QUINCENALES
                case 'QUINCENALES':

                    break;

                    // MENSUALES  
                case 'MENSUALES':

                    break;

                default:
                    # code...
                    break;
            }
            // Actualizar el estado a COMPLETADO
            $status_cobranza = CobranzaModelo::mdlCambiarEstadoCarteleraCompletado($cts_c['cra_id'], $next_day);

            //Enrutar el siguiente cobro
            if ($status_cobranza) {
                CobranzaModelo::mdlInsertarSiguienteEnrutamientoReagendado(array(
                    'cra_contrato' => $cts_c['cra_contrato'],
                    'cra_fecha_cobro' => $next_day,
                    'cra_orden' => $cts_c['cra_orden'],
                    'cra_fecha_reagenda' => $cra_fecha_reagenda
                ));
            }

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

    public static function ctrRegistrarReagendados($cts_reagendado)
    {
    }
    public static function ctrRegistrarPorLocalizar($cts_por_localizar)
    {
        $cts_por_localizar = json_decode($cts_por_localizar, true);
        foreach ($cts_por_localizar as  $cts_l) {
            CobranzaModelo::mdlCambiarEstadoCartelera(array(
                'cra_fecha_reagenda' => date('Y-m-d', strtotime('+ 1 days')),
                'cra_id' =>  $cts_l['cra_id'],
                'cra_estado' => 'POR LOCALIZAR'
            ));
        }
    }
    public static function ctrRegistrarPendientes($cts_pendientes)
    {
        $cts_pendientes = json_decode($cts_pendientes, true);
        foreach ($cts_pendientes as  $cts_p) {
            CobranzaModelo::mdlCambiarEstadoCartelera(array(
                'cra_fecha_reagenda' => date('Y-m-d', strtotime('+ 1 days')),
                'cra_id' =>  $cts_p['cra_id'],
                'cra_estado' => 'PENDIENTE'
            ));
        }
    }

    public static function ctrRegistrarReagendado($cts_reagendado)
    {
        $cts_reagendado = json_decode($cts_reagendado, true);
        foreach ($cts_reagendado as  $cts_r) {
            $status_r =  CobranzaModelo::mdlCambiarEstadoCarteleraReagendado(array(
                'cra_fecha_reagenda' => $cts_r['cra_fecha_reagenda'],
                'cra_id' => $cts_r['cra_id']
            ));
            if ($status_r) {
                CobranzaModelo::mdlInsertarSiguienteEnrutamientoReagendado(array(
                    'cra_contrato' => $cts_r['cra_contrato'],
                    'cra_fecha_cobro' => $cts_r['cra_fecha_cobro'],
                    'cra_orden' => $cts_r['cra_orden'],
                    'cra_fecha_reagenda' => $cts_r['cra_fecha_reagenda'],
                ));
            }
        }
    }

    public static function ctrSubirDatosCobranzaApp($datos)
    {
        //Registrar pagos completados
        if (isset($datos[0]['Completados'])) {
            $cts_c = json_encode($datos[0]['Completados'], true);
            CobranzaControlador::ctrReEnrutarCuentasCompletadas($cts_c);
        }
        if (isset($datos[1]['Abonos'])) {
            $abs_c = json_encode($datos[1]['Abonos'], true);
            CobranzaControlador::ctrRegistrarAbonosCobranzaApp($abs_c);
        }

        // Reagendar pagos 
        if (isset($datos[0]['Reagendados'])) {
            $cts_r = json_encode($datos[0]['Reagendados'], true);
            CobranzaControlador::ctrRegistrarReagendado($cts_r);
        }


        // CAMBIO DE ESTADO
        if (isset($datos[1]['Por_localizar'])) {
            $cts_l = json_encode($datos[1]['Por_localizar'], true);
            CobranzaControlador::ctrRegistrarPorLocalizar($cts_l);
        }
        if (isset($datos[2]['Pendientes'])) {
            $cts_p = json_encode($datos[2]['Pendientes'], true);
            CobranzaControlador::ctrRegistrarPendientes($cts_p);
        }
        if (isset($datos[3]['Mas_tarde'])) {
            $cts_p = json_encode($datos[3]['Mas_tarde'], true);
            CobranzaControlador::ctrRegistrarPendientes($cts_p);
        }
    }

    public static function ctrOrdenarP()
    {
        $orden = CobranzaModelo::mdlMostrarCarteleraOrden();
        foreach ($orden as $key => $ctr) {
            CobranzaModelo::mdlOrdenarP($ctr);
        }
    }
}
