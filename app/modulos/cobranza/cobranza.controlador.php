
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
                $ctr_enrutar = $objPHPExcel->getActiveSheet()->getCell('R' . $i)->getCalculatedValue();
                $ctr_estado = $objPHPExcel->getActiveSheet()->getCell('S' . $i)->getCalculatedValue();

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
                    "ctr_status_cuenta" => $ctr_status_cuenta,
                    'ctr_proximo_pago' => $ctr_proximo_pago,
                    'ctr_enrutar' => $ctr_enrutar,
                    'ctr_orden' => $ctr_orden,
                );

                $res = CobranzaModelo::mdlActualizarSaldos($data);

                if ($res) {
                    $countUpdate += 1;
                }

                if ($ctr_enrutar == 'S') {

                    $enrurar_cta = CobranzaControlador::ctrEnrrutarCuenta(
                        array(
                            'ctr_forma_pago' =>  $ctr_forma_pago,
                            'ctr_dia_pago' =>  $ctr_dia_pago,
                            'ctr_siguiente_fecha_pago' =>  $ctr_siguiente_fecha_pago,
                            'cra_contrato' =>  $ctr['ctr_id'],
                            'ctr_orden' =>  $ctr_orden,
                            'ctr_reagendado' =>  $ctr_reagendado,
                            'cra_estado' => $ctr_estado
                        )
                    );
                    if ($enrurar_cta) {
                        $counEnrutar += 1;
                    }
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

    public static function ctrActualizarFechaR()
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
                $ctr_reagendado = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();

                $ctr = ContratosModelo::mdlMostrarSaldosContratos($ctr_numero_cuenta, $ctr_ruta);


                $act_r = CobranzaModelo::mdlActualizarEnruteReagendado($ctr['ctr_id'], $ctr_reagendado);

                if ($act_r) {
                    $countUpdate += 1;
                }
            }

            return array(
                'status' => true,
                'mensaje' => "Cuentas Reagendas",
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


    public static function ctrEnrutarCuenta()
    {

        $ctr_proximo_pago = explode('-', $_POST['ctr_proximo_pago']);
        $_POST['ctr_proximo_pago'] = $ctr_proximo_pago[2] . '-' . $ctr_proximo_pago[1] . '-' . $ctr_proximo_pago[0];

        $ctr_ultima_fecha_abono = explode('-', $_POST['ctr_ultima_fecha_abono']);
        $_POST['ctr_ultima_fecha_abono'] = $ctr_ultima_fecha_abono[2] . '-' . $ctr_ultima_fecha_abono[1] . '-' . $ctr_ultima_fecha_abono[0];


        $dia_pago = "";
        if ($_POST['ctr_forma_pago'] == 'SEMANALES') {
            $dia_pago = $_POST['ctr_dia_pago'];
        } else if ($_POST['ctr_forma_pago'] == 'CATORCENALES') {
            $dia_pago = $_POST['ctr_dia_pago'];
            // FECHA PROXIMO COBRO
        } else if ($_POST['ctr_forma_pago'] == 'QUINCENALES') {
            $dia_pago = $_POST['ctr_dia_pago_2'];
        } else if ($_POST['ctr_forma_pago'] == 'MENSUALES') {
            $dia_pago = $_POST['ctr_dia_pago_2'];
        }

        $_POST['ctr_dia_pago'] = $dia_pago;

        $data = array(
            "ctr_id" => $_POST['ctr_id'],
            "ctr_total" => dnum($_POST['ctr_total']),
            "ctr_enganche" => dnum($_POST['ctr_enganche']),
            "ctr_pago_adicional" => dnum($_POST['ctr_pago_adicional']),
            "ctr_saldo" => dnum($_POST['ctr_saldo']),
            "ctr_saldo_actual" => dnum($_POST['ctr_saldo_actual']),
            "ctr_ultima_fecha_abono" => $_POST['ctr_ultima_fecha_abono'],
            "ctr_total_pagado" => dnum($_POST['ctr_total_pagado']),
            "ctr_forma_pago" => $_POST['ctr_forma_pago'],
            "ctr_dia_pago" => $_POST['ctr_dia_pago'],
            "ctr_pago_credito" => dnum($_POST['ctr_pago_credito']),
            "ctr_status_cuenta" => $_POST['ctr_status_cuenta'],
            'ctr_proximo_pago' => $_POST['ctr_proximo_pago'],
            'ctr_enrutar' => 'S',
            'ctr_orden' => $_POST['ctr_orden'],
            'ctr_saldo_base' => $_POST['ctr_saldo_base']
        );


        if (!isset($_POST['cra_estado'])) {
            $_POST['cra_estado'] = 'PENDIENTE';
        }
        if ($_POST['cra_fecha_reagenda'] == "") {
            $_POST['cra_fecha_reagenda'] = '0000-00-00';
        }
        $res = CobranzaModelo::mdlActualizarSaldos2($data);



        $enrurar_cta = CobranzaControlador::ctrEnrrutarCuenta(
            array(
                'ctr_forma_pago' =>  $_POST['ctr_forma_pago'],
                'ctr_dia_pago' =>  $_POST['ctr_dia_pago'],
                'ctr_siguiente_fecha_pago' =>  $_POST['cra_fecha_cobro'],
                'cra_contrato' =>  $_POST['ctr_id'],
                'ctr_orden' =>  $_POST['ctr_orden'],
                'ctr_reagendado' =>  $_POST['cra_fecha_reagenda'],
                'cra_estado' => $_POST['cra_estado']
            )
        );

        if ($enrurar_cta) {
            return  array(
                'status' => true,
                'mensaje' => 'Cuenta enrutada'
            );
        } else {
            return  array(
                'status' => false,
                'mensaje' => 'No se realizaron cambios'
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
            'cra_fecha_reagenda' =>  $cta['ctr_reagendado'] == "" ? '0000-00-00' : $cta['ctr_reagendado'],
            'cra_orden' => $cta['ctr_orden'],
            'cra_estado' => $cta['cra_estado'] == "" ? "PENDIENTE" : $cta['cra_estado']
        );


        $isexit = CobranzaModelo::mdlConsultarEnrute($cta['cra_contrato']);

        if ($isexit) {
            // ACTUALIZAR
            $enrutar = CobranzaModelo::mdlActualizarSigienteEnrutamiento($datos_e, $isexit['cra_id']);
        } else {
            $enrutar = CobranzaModelo::mdlRegistrarSigienteEnrutamiento($datos_e);
        }
        return $enrutar;
    }
    public static function ctrEnrrutarCuentasNuevas($cta)
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
            $next_day = $cta['ctr_fecha_reagendada'];
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
            'cra_contrato' => $cta['ctr_id'],
            'cra_fecha_cobro' => $next_day,
            'cra_fecha_reagenda' =>  $cta['ctr_fecha_reagendada'] == "" ? '0000-00-00' : $cta['ctr_fecha_reagendada'],
            'cra_orden' => $cta['ctr_orden'],
            'cra_estado' =>  "PENDIENTE",
            'cra_referencias' =>  $cta['ctr_referencias'],

        );


        $isexit = CobranzaModelo::mdlConsultarEnrute($cta['ctr_id']);

        if ($isexit) {
            // ACTUALIZAR
            $enrutar = CobranzaModelo::mdlActualizarNuevoEnrutamiento($datos_e, $isexit['cra_id']);
        } else {
            $enrutar = CobranzaModelo::mdlRegistrarNuevoEnrutamiento($datos_e);
        }
        return $enrutar;
    }

    public static function ctrReEnrutarCuentasCompletadas($cts_completadas)
    {
        $cts_completadas = json_decode($cts_completadas, true);

        foreach ($cts_completadas as  $cta) {

            // Saber la forma de pago
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
                $next_day = $cta['cra_fecha_sig_pago'];
            } else if ($cta['ctr_forma_pago'] == 'QUINCENALES') {
                $dias = $cta['ctr_dia_pago'];
                $dias = explode('-', $dias);
                $dia1 = $dias[0];
                $dia2 = $dias[1];
                $fecha_mes = date('Y-m', strtotime('this month'));
                $dia1 = $dia1 < 10 ? "0" . $dia1 : $dia1;
                $dia2 = $dia2 < 10 ? "0" . $dia2 : $dia2;

                // $dia = $dia1 < 10 ? "0" . $dia1 : $dia1;

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

            CobranzaModelo::mdlActualizarSiguienteEnrrute(array(
                'cra_fecha_cobro' => $next_day,
                'cra_fecha_reagenda' => "0000-00-00",
                'cra_estado' => 'PENDIENTE',
                'cra_id' => $cta['cra_id']
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

    public static function ctrRegistrarReagendados($cts_reagendado)
    {
    }
    public static function ctrRegistrarPorLocalizar($cts_por_localizar)
    {
        $cts_por_localizar = json_decode($cts_por_localizar, true);

        foreach ($cts_por_localizar as  $cts_l) {
            CobranzaModelo::mdlActualizarSiguienteEnrrute(array(
                'cra_fecha_cobro' => $cts_l['cra_fecha_cobro'],
                'cra_fecha_reagenda' => date('Y-m-d', strtotime('+ 1 days')),
                'cra_estado' => 'POR LOCALIZAR',
                'cra_id' => $cts_l['cra_id']
            ));
        }
    }
    public static function ctrRegistrarPendientes($cts_pendientes)
    {
        $cts_pendientes = json_decode($cts_pendientes, true);
        foreach ($cts_pendientes as  $cts_p) {
            CobranzaModelo::mdlActualizarSiguienteEnrrute(array(
                'cra_fecha_cobro' => $cts_p['cra_fecha_cobro'],
                'cra_fecha_reagenda' => date('Y-m-d', strtotime('+ 1 days')),
                'cra_estado' => 'PENDIENTE',
                'cra_id' => $cts_p['cra_id']
            ));
        }
    }

    public static function ctrRegistrarReagendado($cts_reagendado)
    {
        $cts_reagendado = json_decode($cts_reagendado, true);
        foreach ($cts_reagendado as  $cts_r) {
            CobranzaModelo::mdlActualizarSiguienteEnrrute(array(
                'cra_fecha_cobro' => $cts_r['cra_fecha_cobro'],
                'cra_fecha_reagenda' => $cts_r['cra_fecha_reagenda'],
                'cra_estado' => 'PENDIENTE',
                'cra_id' => $cts_r['cra_id']
            ));
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
        // if (isset($datos[2]['Pendientes'])) {
        //     $cts_p = json_encode($datos[2]['Pendientes'], true);
        //     CobranzaControlador::ctrRegistrarPendientes($cts_p);
        // }
        // if (isset($datos[3]['Mas_tarde'])) {
        //     $cts_p = json_encode($datos[3]['Mas_tarde'], true);
        //     CobranzaControlador::ctrRegistrarPendientes($cts_p);
        // }
    }

    public static function ctrOrdenarP()
    {
        $orden = CobranzaModelo::mdlMostrarCarteleraOrden();
        foreach ($orden as $key => $ctr) {
            CobranzaModelo::mdlOrdenarP($ctr);
        }
    }
    public static function ejecutarFinalizarCobranza()
    {
        $next_day = date('Y-m-d', strtotime('+ 1 days'));
        $now_day = FECHA_ACTUAL;
        CobranzaModelo::mdlFizalizarCobranza($next_day, $now_day);
    }

    public static function ctrCancelarPagos()
    {
        $cancelar  = CobranzaModelo::mdlCancelarPago(array(
            'abs_motivo_cancelacion' => $_POST['abs_motivo_cancelacion'],
            'abs_id' => $_POST['abs_id'],
        ));

        if ($cancelar) {
            return array(
                'status' => true,
                'mensaje' => 'Pago cancelado',
                'pagina' => HTTP_HOST . 'autorizar-pagos/' . $_POST['usr_id']
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'No se pudo cancelar el pago, intente de nuevo',
                'pagina' => HTTP_HOST . 'autorizar-pagos/' . $_POST['usr_id']
            );
        }
    }

    public static function ctrProcesarPago()
    {
        $listarAbonos = CobranzaModelo::mdlListarPagosPendientes($_POST['usr_id']);
        $array_contratos = array();
        foreach ($listarAbonos as  $abs) {
            $cts = CobranzaModelo::mdlObtenerContratoCobrado($abs['abs_id_contrato']);
            $contratos = array(
                'abono' => $abs,
                'contrato' => $cts,
            );
            array_push($array_contratos, $contratos);
        }
        // ACTUALIZAR  SALDOS
        foreach ($array_contratos as  $cts) {
            # code...
            $nuevo_saldo = dnum($cts['contrato']['ctr_saldo_actual']) - dnum($cts['abono']['abs_monto']);
            $total_pagado = dnum($cts['contrato']['ctr_total_pagado']) + dnum($cts['abono']['abs_monto']);

            $saldo_act = CobranzaModelo::mdlActualizarSaldosContrato(array(
                'ctr_saldo_actual' => $nuevo_saldo,
                'ctr_total_pagado' => $total_pagado,
                'ctr_ultima_fecha_abono' => $cts['abono']['abs_fecha_cobro'],
                'ctr_id' => $cts['contrato']['ctr_id']
            ));

            if ($saldo_act) {
                // CobranzaModelo::mdlActualizarEstadoPago($cts['abono']['abs_id']);
            }
        }

        // GUARDAR LA UBICACIÓN DE LOS REPORTE

    }
    public static function ctrProcesarPagoAPI($usr_id, $pago_name)
    {
        $id_pago = CobranzaModelo::mdlInsertPagos($pago_name);
        $listarAbonos = CobranzaModelo::mdlListarPagosPendientes($usr_id);

        $array_contratos = array();
        foreach ($listarAbonos as  $abs) {
            $contrato = CobranzaModelo::mdlObtenerContratoCobrado($abs['abs_id_contrato']);
            $contratos = array(
                'abono' => $abs,
                'contrato' => $contrato,
            );
            array_push($array_contratos, $contratos);
        }
        // ACTUALIZAR  SALDOS
        $countAct = 0;
        foreach ($array_contratos as  $cts) {
            # code...

            $ctr_solo = CobranzaModelo::mdlObtenerContratoCobrado2($cts['contrato']['ctr_id']);
            $abono = dnum($cts['abono']['abs_monto']);
            $nuevo_saldo = dnum($ctr_solo['ctr_saldo_actual']);
            $total_pagado = dnum($ctr_solo['ctr_total_pagado']);

            $nuevo_saldo =  $nuevo_saldo - $abono;
            $total_pagado = $total_pagado  + $abono;
            $saldo_act = CobranzaModelo::mdlActualizarSaldosContrato(array(
                'ctr_saldo_actual' => $nuevo_saldo,
                'ctr_total_pagado' => $total_pagado,
                'ctr_ultima_fecha_abono' => $cts['abono']['abs_fecha_cobro'],
                'ctr_id' => $cts['contrato']['ctr_id']
            ));

            if ($saldo_act) {
                CobranzaModelo::mdlActualizarEstadoPago($cts['abono']['abs_id'], $id_pago);
                $countAct++;
            }
        }

        return array(
            'status' => true,
            'mensaje' => 'Saldos actualizados con éxito',
            'contador' => $countAct,
            'pagina' => HTTP_HOST . 'autorizar-pagos'
        );

        // GUARDAR LA UBICACIÓN DE LOS REPORTE

    }

    public static function ctrProcesarPagoAPIV2($usr_id, $pago_name)
    {
        $id_pago = CobranzaModelo::mdlInsertPagos($pago_name);
        $listarAbonos = CobranzaModelo::mdlListarPagosPendientesV2($usr_id);

        foreach ($listarAbonos as  $abs) {

            $totalPagdoTmp = dnum($abs['ctr_total_pagado']);
            $saldoActualTmp = $abs['ctr_saldo_actual'];

            // ADEUDO CALCULADO
            $nuevoSaldo = $saldoActualTmp - dnum($abs['abs_monto']);

            // TOTAL PAGADO
            $nuevoPagdo = $totalPagdoTmp + dnum($abs['abs_monto']);


            CobranzaModelo::mdlActualizarSaldoV2(array(
                'ctr_saldo_actual' => $nuevoSaldo,
                'ctr_ultima_fecha_abono' => $abs['abs_fecha_cobro'],
                'ctr_total_pagado' => $nuevoPagdo,
                'ctr_id' => $abs['ctr_id']
            ));
            $ctr_saldo_actualizado = CobranzaModelo::mdlConsultarSaldoBaseV2($abs['ctr_id']);

            $verificacionSaldo = dnum($ctr_saldo_actualizado['ctr_saldo_actual']) == $nuevoSaldo ? 1 : 0;

            CobranzaModelo::mdlVerificacionSaldo(array(
                'abs_verificacion' => $verificacionSaldo,
                'abs_save' =>  $id_pago,
                'abs_id' => $abs['abs_id']
            ));
            # code...
        }
        return array(
            'status' => true,
            'mensaje' => 'Cobranza autorizada',
            'pagina' => ''
        );
    }

    public static function ctrEnrutarCuentasNuevas($cuentas)
    {

        $cts_act = 0;
        $cts_cra = 0;
        foreach ($cuentas as $key => $cts) {
            // CAMBIAR DATOS  NECESARIOS PARA EL CONTRATO
            $act_datos = CobranzaModelo::mdlEditarCuentas($cts);
            if ($act_datos) {
                $cts_act += 1;
            }

            //ENRRUTAR CUENTA 
            $enrutar_cts = CobranzaControlador::ctrEnrrutarCuentasNuevas($cts);
            if ($enrutar_cts) {
                $cts_cra += 1;
            }
        }

        return array(
            'status' => true,
            'mensaje' =>  'Se enrutaron ' . $cts_cra . ' cuentas'
        );
    }
    public static function ctrActualizarSaldos()
    {

        if (isset($_POST['btnActualizarSaldos'])) {
            $res = CobranzaModelo::mdlUpdateSaldos($_POST);

            if ($res) {
                return array(
                    'status' => true,
                    'mensaje' =>  'Se actualizaron los saldos correctamente!'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' =>  'Hubo un error al actualizar los saldos!'
                );
            }
        }
    }
}
