
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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
            if ($usrLogin['usr_rol'] == 'Baja de usuario') {
                return array(
                    'status' => false,
                    'mensaje' => '¡' . $usrLogin['usr_nombre'] . ', no tienes acceso a la aplicación !',
                    'usr' => $usrLogin,
                    'scl' => $sucursal,
                    'scl_url_access' => HTTP_HOST
                );
            } else {
                return array(
                    'status' => true,
                    'mensaje' => '¡' . $usrLogin['usr_nombre'] . ', bienvenido a la app de comisa cobranza!',
                    'usr' => $usrLogin,
                    'scl' => $sucursal,
                    'scl_url_access' => HTTP_HOST
                );
            }
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

        $cra_etiqueta = '';
        if (!isset($_POST['cra_estado'])) {
            $_POST['cra_estado'] = 'PENDIENTE';
            $cra_etiqueta = '';
        } else {
            $_POST['cra_estado'] = 'INACTIVA';
            $cra_etiqueta = 'LZR';
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
                'cra_estado' => $_POST['cra_estado'],
                'cra_etiqueta' => $cra_etiqueta
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
            'cra_estado' => $cta['cra_estado'] == "" ? "PENDIENTE" : $cta['cra_estado'],
            'cra_etiqueta' => isset($cta['cra_etiqueta']) ? $cta['cra_etiqueta'] : ''
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


            // Guardar datos

            CobranzaControlador::ctrGuardarDatos(array(
                'cra_referencias' => $cta['cra_referencias'],
                'cra_id' => $cta['abs_id_contrato'],
                'clts_telefono' => $cta['clts_telefono'],
                'clts_coordenadas' => $cta['clts_coordenadas'],
                'ctr_id' => $cta['ctr_id'],

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

            CobranzaControlador::ctrGuardarDatos(array(
                'cra_referencias' => $cts_r['cra_referencias'],
                'cra_id' => $cts_r['cra_id'],
                'clts_telefono' => $cts_r['clts_telefono'],
                'clts_coordenadas' => $cts_r['clts_coordenadas'],
                'ctr_id' => $cts_r['cra_contrato'],

            ));
        }
    }

    public static function ctrSubirDatosCobranzaApp($datos)
    {

        // PARA SUBIR PAGOS 
        //Registrar pagos completados
        if (isset($datos[0]['Completados'])) {
            $cts_c = json_encode($datos[0]['Completados'], true);
            CobranzaControlador::ctrReEnrutarCuentasCompletadas($cts_c);
        }
        if (isset($datos[1]['Abonos'])) {
            $abs_c = json_encode($datos[1]['Abonos'], true);
            CobranzaControlador::ctrRegistrarAbonosCobranzaApp($abs_c);
        }


        // PARA FINZALIZAR COBRANZA
        if (isset($datos[0]['Reagendados'])) {
            $cts_r = json_encode($datos[0]['Reagendados'], true);
            CobranzaControlador::ctrRegistrarReagendado($cts_r);
        }

        if (isset($datos[1]['Pendientes'])) {
            // $cts_r = json_encode($datos[1]['Pendientes'], true);
            $data = json_decode(json_encode($datos[1]['Pendientes'], true), true);
            foreach ($data as $key => $pdt) {
                CobranzaControlador::ctrGuardarDatos(array(
                    'cra_referencias' => $pdt['cra_referencias'],
                    'cra_id' => $pdt['cra_id'],
                    'clts_telefono' => $pdt['clts_telefono'],
                    'clts_coordenadas' => $pdt['clts_coordenadas'],
                    'ctr_id' => $pdt['cra_contrato'],

                ));
            }
        }

        if (isset($datos[4]['LZR'])) {
            $data = json_decode(json_encode($datos[4]['LZR'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
        if (isset($datos[5]['CCT'])) {
            $data = json_decode(json_encode($datos[5]['CCT'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
        if (isset($datos[6]['SRV'])) {
            $data = json_decode(json_encode($datos[6]['SRV'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
        if (isset($datos[7]['RCG'])) {
            $data = json_decode(json_encode($datos[7]['RCG'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
        if (isset($datos[8]['SPR'])) {
            $data = json_decode(json_encode($datos[8]['SPR'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
        if (isset($datos[9]['TRT'])) {
            $data = json_decode(json_encode($datos[9]['TRT'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
        if (isset($datos[10]['SLS'])) {
            $data = json_decode(json_encode($datos[10]['SLS'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
        if (isset($datos[11]['CVS'])) {
            $data = json_decode(json_encode($datos[11]['CVS'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
        if (isset($datos[12]['FLS'])) {
            $data = json_decode(json_encode($datos[12]['FLS'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
        if (isset($datos[13]['JDC'])) {
            $data = json_decode(json_encode($datos[13]['JDC'], true), true);
            foreach ($data as $key => $etq) {

                CobranzaControlador::ctrActualizarEtiquetas(
                    array(
                        'cra_estado' => $etq['cra_estado'],
                        'cra_etiqueta' => $etq['cra_etiqueta'],
                        'cra_id' => $etq['cra_id'],
                        'cra_gestion' => $etq['cra_gestion'],
                    ),
                    array(
                        'ctr_etiqueta' => $etq['cra_etiqueta'],
                        'ctr_id' => $etq['cra_contrato'],
                        'ctr_gestion' => $etq['cra_gestion'],
                    ),
                    $etq
                );
            }
        }
    }

    public static function ctrActualizarEtiquetas($cra, $ctr, $t = "")
    {
        CobranzaModelo::ctrActualizarEtiquetasDirectosCra($cra);
        CobranzaModelo::ctrActualizarEtiquetasDirectosCtr($ctr);

        CobranzaControlador::ctrGuardarDatos(array(
            'cra_referencias' => $t['cra_referencias'],
            'cra_id' => $t['cra_id'],
            'clts_telefono' => $t['clts_telefono'],
            'clts_coordenadas' => $t['clts_coordenadas'],
            'ctr_id' => $t['cra_contrato'],

        ));
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

        $abs = CobranzaModelo::mdlObtenerAbonoByID($_POST['abs_id']);

        if ($_POST['abs_codigo'] == $abs['abs_codigo']) {
            $cancelar  = CobranzaModelo::mdlCancelarPago(array(
                'abs_motivo_cancelacion' => $abs['abs_motivo_cancelacion'],
                'abs_id' => $_POST['abs_id'],
            ));

            if ($cancelar) {
                return array(
                    'status' => true,
                    'mensaje' => 'Pago cancelado',
                    // 'pagina' => HTTP_HOST . 'autorizar-pagos/' . $_POST['usr_id']
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo cancelar el pago, intente de nuevo',
                    // 'pagina' => HTTP_HOST . 'autorizar-pagos/' . $_POST['usr_id']
                );
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => 'El código de cancelación no es correcto.'
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
        $igs_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
        if ($igs_id_corte2['usr_caja'] == 0) {
            return array(
                'status' => false,
                'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo'
            );
        }

        // if ($_SESSION['session_usr']['usr_caja'] == 0 || $_SESSION['session_usr']['usr_caja'] == "") {
        //     return array(
        //         'status' => false,
        //         'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo',

        //     );
        // }

        // Validar que el usuario tenga caja asignada
        $usr = UsuariosModelo::mdlMostrarUsuarios($usr_id);
        if ($usr['usr_caja_asg'] == 0) {
            return array(
                'status' => false,
                'mensaje' => 'Favor de asignarle una caja a este usuario',

            );
        }

        // Validar que la caja este abierta
        if ($usr['usr_caja'] == 0) {
            return array(
                'status' => false,
                'mensaje' => 'Favor de abrir la caja de este usaurio',

            );
        }

        $listarAbonos = CobranzaModelo::mdlListarPagosPendientesV2($usr_id);
        if (!$listarAbonos) {
            return array(
                'status' => false,
                'mensaje' => 'No hay cobros por autorizar',

            );
        }

        // Verificar cuentas de banco
        $isEmptyBanco = 0;
        $contador_efectivo = 0;
        $contador_banco = 0;
        $array_banco = array();
        foreach ($listarAbonos as  $abs_t) {

            if ($abs_t['abs_mp'] == 'EFECTIVO') {
                $contador_efectivo += dnum($abs_t['abs_monto']);
            }
            // Contar cuantas vinculadas a banco
            if ($abs_t['abs_mp'] == 'BANCO') {
                $contador_banco += dnum($abs_t['abs_monto']);

                if ($abs_t['abs_cuenta'] == '') {
                    $isEmptyBanco++;
                }

                // agregar datos banco 
                $datos_banco = array(
                    'igs_concepto' => 'Depositio / Transferencia #' . $abs_t['abs_id'],
                    'igs_monto' => dnum($abs_t['abs_monto']),
                    'igs_referencia' => $abs_t['abs_referancia'],
                    'igs_cuenta' => $abs_t['abs_cuenta'],
                    'igs_usuario_responsable' => $usr_id
                );

                array_push($array_banco, $datos_banco);
            }
        }
        if ($isEmptyBanco > 0) {
            return array(
                'status' => false,
                'mensaje' => 'Asignale una cuenta bancaría a los cobros realizados con tranferncia o deposito',

            );
        }

        // preArray($listarAbonos);

        // return;

        $id_pago = CobranzaModelo::mdlInsertPagos($pago_name);
        foreach ($listarAbonos as  $abs) {

            $totalPagdoTmp = dnum($abs['ctr_total_pagado']);
            $saldoActualTmp = $abs['ctr_saldo_actual'];

            // ADEUDO CALCULADO
            $nuevoSaldo = $saldoActualTmp - dnum($abs['abs_monto']);

            // TOTAL PAGADO
            $nuevoPagdo = $totalPagdoTmp + dnum($abs['abs_monto']);

            $status_cuenta = $nuevoSaldo <=  0 ? 'PAGADA' : 'VIGENTE';

            CobranzaModelo::mdlActualizarSaldoV2(array(
                'ctr_saldo_actual' => $nuevoSaldo,
                'ctr_ultima_fecha_abono' => $abs['abs_fecha_cobro'],
                'ctr_total_pagado' => $nuevoPagdo,
                'ctr_id' => $abs['ctr_id'],
                'ctr_status_cuenta' => $status_cuenta
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
        // Registrar ingresos automaticos 
        if ($contador_efectivo > 0) {
            IngresosControlador::ctrAgregarIngresoAbonoEfectivo(array(
                'igs_usuario_responsable' => $usr_id,
                'igs_monto' => $contador_efectivo,
                'igs_concepto' => 'Cobranza ' . $pago_name,
            ));
        }

        if ($contador_banco > 0) {
            foreach ($array_banco as  $dbco) {
                IngresosControlador::ctrAgregarIngresoAbonoBanco($dbco);
            }
        }


        return array(
            'status' => true,
            'mensaje' => 'Cobranza autorizada',
            'pagina' => HTTP_HOST . 'app/report/reporte-cobranza-autorizada.php?abs_save=' . $id_pago,
            'pagina2' => HTTP_HOST . 'flujo-caja/' . $usr_id
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

    public static function ctrCrearFicha()
    {
        if (date('Y-m-d') == date('Y-m-d', strtotime('this Thursday'))) {
            $fcbz = CobranzaModelo::mdlMostrarUltimaFicha();

            // $fechaHoy = date('Y-m-d');
            // Datos de la base
            $fcbz_numero_base = $fcbz['fcbz_numero'];
            $fcbz_ano_base = $fcbz['fcbz_ano'];

            $fcbz_fecha_termino_base = $fcbz['fcbz_fecha_termino'];

            $fcbz_ano_atual = date('Y', strtotime('This year'));

            $fcbz_numero_siguiente = $fcbz_ano_base == $fcbz_ano_atual ? $fcbz_numero_base + 1 : 1;


            $fecha_inicio =  date('Y-m-d', strtotime($fcbz_fecha_termino_base . '+ 1 days'));
            $fecha_termino =  date('Y-m-d', strtotime($fcbz_fecha_termino_base . '+ 7 days'));

            $res = CobranzaModelo::mdlCrearFicha(array(
                'fcbz_numero' => $fcbz_numero_siguiente,
                'fcbz_fecha_inicio' => $fecha_inicio,
                'fcbz_fecha_termino' => $fecha_termino,
                'fcbz_ano' => $fcbz_ano_atual,
            ));
        }
    }



    public static function ctrIniciarSeguimientoCobranza()
    {


        $cobradores = CobranzaModelo::mdlMostrarCobradoresActvos();

        foreach ($cobradores as $key => $cbr) {

            # code...
            $datos_ficha = CobranzaModelo::mdlMostrarUltimaFicha();

            $scbz_inicio = CobranzaModelo::mdlMostrarCarteraActiva($cbr['usr_ruta']);

            $scbz_cuentas_semana = CobranzaModelo::mdlMostrarCobroSemana($cbr['usr_ruta'], $datos_ficha['fcbz_fecha_inicio'], $datos_ficha['fcbz_fecha_termino']);


            $scbz_cuentas_descontar = dnum($scbz_inicio['scbz_inicio']) - dnum($scbz_cuentas_semana['scbz_cuentas_semana']);

            $seg_anterior = CobranzaModelo::mdlMostrarSeguimientoAnterior($cbr['usr_ruta']);

            if (!$seg_anterior) {
                $scbz_meta_porcentaje = 50;
            } else {
                $scbz_meta_porcentaje =  dnum($seg_anterior['scbz_meta_porcentaje']) + 5;
            }

            $scbz_meta_cobro = dnum($scbz_cuentas_semana['scbz_cuentas_semana']) *  $scbz_meta_porcentaje / 100;

            //
            $cct_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'CCT');
            $lzr_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'LZR');
            $srv_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'SRV');
            $rcg_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'RCG');
            $spr_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'SPR');
            $trt_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'TRT');
            $sls_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'SLS');
            $cvs_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'CVS');
            $fls_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'FLS');
            $jdc_cuentas = CobranzaModelo::mdlMostrarSeguimientoCobranza($cbr['usr_ruta'], 'JDC');

            $scbz_seguimiento_array = array(
                'scbz_cct' => array(
                    'cct_total' => count($cct_cuentas),
                    'cct_cuentas' => json_encode($cct_cuentas, true),
                    'cct_objetivo' => '',
                    'cct_alcance' => ''
                ),

                'scbz_lzr' => array(
                    'lzr_total' => count($lzr_cuentas),
                    'lzr_cuentas' => json_encode($lzr_cuentas, true),
                    'lzr_objetivo' => '',
                    'lzr_alcance' => ''
                ),
                'scbz_srv' => array(
                    'srv_total' => count($srv_cuentas),
                    'srv_cuentas' => json_encode($srv_cuentas, true),
                    'srv_objetivo' => '',
                    'srv_alcance' => ''
                ),
                'scbz_rcg' => array(
                    'rcg_total' => count($rcg_cuentas),
                    'rcg_cuentas' => json_encode($rcg_cuentas, true),
                    'rcg_objetivo' => '',
                    'rcg_alcance' => ''
                ),
                'scbz_spr' => array(
                    'spr_total' => count($spr_cuentas),
                    'spr_cuentas' => json_encode($spr_cuentas, true),
                    'spr_objetivo' => '',
                    'spr_alcance' => ''
                ),
                'scbz_trt' => array(
                    'trt_total' => count($trt_cuentas),
                    'trt_cuentas' => json_encode($trt_cuentas, true),
                    'trt_objetivo' => '',
                    'trt_alcance' => ''
                ),
                'scbz_sls' => array(
                    'sls_total' => count($sls_cuentas),
                    'sls_cuentas' => json_encode($sls_cuentas, true),
                    'sls_objetivo' => '',
                    'sls_alcance' => ''
                ),
                'scbz_cvs' => array(
                    'cvs_total' => count($cvs_cuentas),
                    'cvs_cuentas' => json_encode($cvs_cuentas, 2),
                    'cvs_objetivo' => '',
                    'cvs_alcance' => ''
                ),
                'scbz_fls' => array(
                    'fls_total' => count($fls_cuentas),
                    'fls_cuentas' => json_encode($fls_cuentas, 2),
                    'fls_objetivo' => '',
                    'fls_alcance' => ''
                ),
                'scbz_jdc' => array(
                    'jdc_total' => count($jdc_cuentas),
                    'jdc_cuentas' => json_encode($jdc_cuentas, 2),
                    'jdc_objetivo' => '',
                    'jdc_alcance' => ''
                )
            );

            $scbz_seguimiento = json_encode($scbz_seguimiento_array, true);


            $scbz_meta_array = array(
                'scbz_inicio' => dnum($scbz_inicio['scbz_inicio']),
                'scbz_cuentas_semana' => dnum($scbz_cuentas_semana['scbz_cuentas_semana']),
                'scbz_cuentas_descontar' => $scbz_cuentas_descontar,
                'scbz_meta_porcentaje' => $scbz_meta_porcentaje,
                'scbz_meta_cobro' => $scbz_meta_cobro,
                // 'scbz_alcance_anterior' => '',
                'scbz_porcentaje_alcanzado' => '',
                'scbz_total_pagadas' => '',
                'scbz_ficha' => $datos_ficha['fcbz_id'],
                'scbz_seguimiento' => $scbz_seguimiento,
                'scbz_ruta' => $cbr['usr_ruta']
            );
        }
    }

    public static function ctrBuscarCobro()
    {
        if ($_POST['urs_id'] != "") {

            $igs_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
            if ($igs_id_corte2['usr_caja'] > 0) {

                // if ($_SESSION['session_usr']['usr_caja']  > 0) {
                // PROCEDIMINTO PARA ABRIR CAJA DEL USUARIO
                $usr = UsuariosModelo::mdlMostrarUsuarios($_POST['urs_id']);
                if ($usr['usr_caja_asg'] > 0) {
                    if ($usr['usr_caja'] == 0 || $usr['usr_caja'] == "") {
                        // ABRIR CAJA DEL USUARIO

                        $abrirCaja = new CajasControlador();
                        $abrirCaja->ctrAbrirCajaAutomatico(array(
                            'usr_caja_asg' => $usr['usr_caja_asg'],
                            'usr_id' => $usr['usr_id'],
                        ));
                    }
                }
            }
        }

        // return CobranzaModelo::mdlBuscarPagosUsr($_POST['urs_id']);
        $pagos = CobranzaModelo::mdlBuscarPagosUsr($_POST['urs_id']);
        $array_pagos = array();
        foreach ($pagos as $key => $pgs) {
            $cuenta_banco = '';
            if ($pgs['abs_mp'] == 'BANCO') {
                $cuenta_banco = CuentasModelo::mdlMostrarNombreCTA($pgs['abs_cuenta']);
                $cuenta_banco = $cuenta_banco['cbco_nombre'] == null ? '' : $cuenta_banco['cbco_nombre'];
                // preArray($cuenta_banco);
            }
            $array_datos = array(
                'ctr_cliente' => $pgs['ctr_cliente'],
                'ctr_forma_pago' => $pgs['ctr_forma_pago'],
                'ctr_dia_pago' => $pgs['ctr_dia_pago'],
                'abs_id' => $pgs['abs_id'],
                'abs_folio' => $pgs['abs_folio'],
                'abs_id_cobrador' => $pgs['abs_id_cobrador'],
                'abs_id_contrato' => $pgs['abs_id_contrato'],
                'abs_monto' => $pgs['abs_monto'],
                'abs_mp' => $pgs['abs_mp'],
                'abs_referancia' => $pgs['abs_referancia'],
                'abs_nota' => $pgs['abs_nota'],
                'abs_estado_abono' => $pgs['abs_estado_abono'],
                'abs_fecha_cobro' => $pgs['abs_fecha_cobro'],
                'abs_estado_base' => $pgs['abs_estado_base'],
                'abs_motivo_cancelacion' => $pgs['abs_motivo_cancelacion'],
                'abs_save' => $pgs['abs_save'],
                'abs_verificacion' => $pgs['abs_verificacion'],
                'abs_cuenta_id' => $pgs['abs_cuenta'],
                'abs_cuenta_text' => $cuenta_banco,
                'cra_fecha_cobro' => $pgs['cra_fecha_cobro'],
                'cra_fecha_reagenda' => $pgs['cra_fecha_reagenda'],
                'cra_fecha_proxima_pago' => $pgs['cra_fecha_proxima_pago'],
                'ctr_id' => $pgs['ctr_id'],
                'ctr_folio' => $pgs['ctr_folio'],
                'ctr_ruta' => $pgs['ctr_ruta'],
                'ctr_numero_cuenta' => $pgs['ctr_numero_cuenta'],
                'ctr_status_cuenta' => $pgs['ctr_status_cuenta'],
                'ctr_saldo_actual' => $pgs['ctr_saldo_actual'],
                'usr_nombre' => $pgs['usr_nombre'],
            );
            array_push($array_pagos, $array_datos);
        }
        return $array_pagos;
        // preArray($pagos);
    }

    public static function ctrGuardarDatos($datos)
    {

        CobranzaModelo::mdlAgregaReferencias(array(
            'cra_referencias' => $datos['cra_referencias'],
            'cra_id' => $datos['cra_id'],

        ));

        CobranzaModelo::mdlAgregaDatosTelGeo(array(
            'clts_telefono' => $datos['clts_telefono'],
            'clts_coordenadas' => $datos['clts_coordenadas'],
            'ctr_id' => $datos['ctr_id'],
        ));
    }
    public static function ctrRedndimiento($ruta, $usr_id)
    {
        $total_cuentas = CobranzaModelo::mdlTotalCuentasRedimiento($ruta);

        $total_cuentas_semanales = CobranzaModelo::mdlTotalSemanalesRedimiento($ruta);

        $cuentas_catorcenales = CobranzaModelo::mdlTotalFormaPagoRedimiento($ruta, "CATORCENALES");
        $cuentas_quincenales = CobranzaModelo::mdlTotalFormaPagoRedimiento($ruta, "QUINCENALES");
        $cuentas_mensuales = CobranzaModelo::mdlTotalFormaPagoRedimiento($ruta, "MENSUALES");

        $ficha = CobranzaModelo::mdlFichaActual();
        $fecha_inicio = $ficha['fcbz_fecha_inicio'];
        $fecha_fin = $ficha['fcbz_fecha_termino'];

        $total_cuentas_catorcenales = array();
        foreach ($cuentas_catorcenales as $catorcenales) {
            if ($catorcenales['cra_fecha_cobro'] <= $fecha_fin || ($catorcenales['cra_fecha_reagenda'] <= $fecha_fin && $catorcenales['cra_fecha_reagenda'] != '0000-00-00')) {
                array_push($total_cuentas_catorcenales, $catorcenales);
            }
        }

        $total_cuentas_quincenales = array();
        foreach ($cuentas_quincenales as $quincenales) {
            if ($quincenales['cra_fecha_cobro'] <= $fecha_fin || ($quincenales['cra_fecha_reagenda'] <= $fecha_fin && $quincenales['cra_fecha_reagenda'] != '0000-00-00')) {
                array_push($total_cuentas_quincenales, $quincenales);
            }
        }

        $total_cuentas_mensuales = array();
        foreach ($cuentas_mensuales as $mensuales) {
            if ($mensuales['cra_fecha_cobro'] <= $fecha_fin || ($mensuales['cra_fecha_reagenda'] <= $fecha_fin && $mensuales['cra_fecha_reagenda'] != '0000-00-00')) {
                array_push($total_cuentas_mensuales, $mensuales);
            }
        }

        $total_semanales = $total_cuentas_semanales['total'];
        $total_catorcenales = sizeof($total_cuentas_catorcenales);
        $total_quincenales = sizeof($total_cuentas_quincenales);
        $total_mensuales = sizeof($total_cuentas_mensuales);

        $total_cuentas_cobro = $total_semanales + $total_catorcenales + $total_quincenales + $total_mensuales;

        $total_cuentas_cobradas = CobranzaModelo::mdlCuentasCobradasRendimiento($usr_id, $fecha_inicio, $fecha_fin)['total_cuentas'];
        $total_cuentas_acumulado = CobranzaModelo::mdlCuentasCobradasRendimiento($usr_id, $fecha_inicio, $fecha_fin)['total_cobrado'];

        $porcentaje_cobrado = ($total_cuentas_cobradas / $total_cuentas_cobro) * 100;

        $total_ganado = $total_cuentas_acumulado * 10 / 100;

        $totales = array(
            'total_cuentas' => $total_cuentas['total'],
            'total_semanales' => $total_semanales,
            'total_catorcenales' => $total_catorcenales,
            'total_quincenales' => $total_quincenales,
            'total_mensuales' => $total_mensuales,
            'total_cuentas_cobro' => $total_cuentas_cobro,
            'total_cuentas_cobradas' => $total_cuentas_cobradas,
            'porcentaje_cobrado' => $porcentaje_cobrado,
            'total_cuentas_acumulado' => $total_cuentas_acumulado != null ? $total_cuentas_acumulado : 0,
            'total_ganado' => $total_ganado,

        );

        return $totales;
    }

    public static function ctrSolicitarCancelacionAbono()
    {

        $abs_id = $_POST['abs_id'];
        $abs_motivo_cancelacion = strtoupper($_POST['abs_motivo_cancelacion']);
        $abs_codigo = rand(10000, 99999);

        $abs = CobranzaModelo::mdlObtenerAbonoByID($abs_id);
        $abs_monto = number_format($abs['abs_monto'], 2);
        // $correos = ['lf_alberto@outlook.com','alberto@softmor.com'];

        $correos = explode(",", SucursalesModelo::mdlMostrarSucursales(SUCURSAL_ID)['scl_correo_notificacion']);
        $sucursal = SucursalesModelo::mdlMostrarSucursales(SUCURSAL_ID)['scl_nombre'];

        $res = CobranzaModelo::mdlAgregarMotivoCancelacionAbs($abs_id, $abs_motivo_cancelacion, $abs_codigo);
        if ($res) {
            try {


                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.hostinger.mx';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'notificaciones@comisa.softmor.com';                     // SMTP username
                $mail->Password   = 'S4RT6#@Dxs';                               // SMTP password
                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('notificaciones@comisa.softmor.com', "COMISA - " . $sucursal);
                foreach ($correos as $correo) {
                    $mail->addAddress($correo);
                }
                // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "SOLICITUD DE CANCELACIÓN";
                $mail->Body  = "
                <table>
                    <tr>
                        <td><strong>Sucursal:</strong><td>
                        <td>$sucursal<td>
                    <tr>
                    <tr>
                        <td><strong>Monto:</strong><td>
                        <td>$$abs_monto<td>
                    <tr>
                    <tr>
                        <td><strong>Folio:</strong><td>
                        <td>$abs[abs_folio]<td>
                    <tr>
                    <tr>
                        <td><strong>Fecha:</strong><td>
                        <td>" . fechaCastellano($abs['abs_fecha_cobro']) . "<td>
                    <tr>
                    <tr>
                        <td><strong>Motivo de cancelación:</strong><td>
                        <td>$abs_motivo_cancelacion<td>
                    <tr>
                    <tr>
                        <td><strong>Código:</strong><td>
                        <td><strong>$abs_codigo</strong><td>
                    <tr>
                </table>
                ";

                if ($mail->send()) {
                    return array(
                        'status' => true,
                        'mensaje' => 'La solicitud de cancelación se envio correctamente.'
                    );
                }
            } catch (PHPMailer $th) {
                throw $th;
                return false;
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Hubo un error al enviar la solicitud de cancelación.'
            );
        }
    }
    public static function ctrReenviarCodigoCancelacion()
    {

        $abs_id = $_POST['abs_id'];
        $abs_codigo = rand(10000, 99999);

        $abs = CobranzaModelo::mdlObtenerAbonoByID($abs_id);
        $abs_monto = number_format($abs['abs_monto'], 2);
        // $correos = ['lf_alberto@outlook.com','alberto@softmor.com'];

        $correos = explode(",", SucursalesModelo::mdlMostrarSucursales(SUCURSAL_ID)['scl_correo_notificacion']);
        $sucursal = SucursalesModelo::mdlMostrarSucursales(SUCURSAL_ID)['scl_nombre'];

        $res = CobranzaModelo::mdlUpdateCodigoDeCancelacion($abs_id, $abs_codigo);
        if ($res) {
            try {


                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.hostinger.mx';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'notificaciones@comisa.softmor.com';                     // SMTP username
                $mail->Password   = 'S4RT6#@Dxs';                               // SMTP password
                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('notificaciones@comisa.softmor.com', "COMISA - " . $sucursal);
                foreach ($correos as $correo) {
                    $mail->addAddress($correo);
                }
                // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "SOLICITUD DE CANCELACIÓN";
                $mail->Body  = "
                <table>
                    <tr>
                        <td><strong>Sucursal:</strong><td>
                        <td>$sucursal<td>
                    <tr>
                    <tr>
                        <td><strong>Monto:</strong><td>
                        <td>$$abs_monto<td>
                    <tr>
                    <tr>
                        <td><strong>Folio:</strong><td>
                        <td>$abs[abs_folio]<td>
                    <tr>
                    <tr>
                        <td><strong>Fecha:</strong><td>
                        <td>" . fechaCastellano($abs['abs_fecha_cobro']) . "<td>
                    <tr>
                    <tr>
                        <td><strong>Motivo de cancelación:</strong><td>
                        <td>$abs[abs_motivo_cancelacion]<td>
                    <tr>
                    <tr>
                        <td><strong>Código:</strong><td>
                        <td><strong>$abs_codigo</strong><td>
                    <tr>
                </table>
                ";

                if ($mail->send()) {
                    return array(
                        'status' => true,
                        'mensaje' => 'El codigo de cancelción se reenvio correctamente.'
                    );
                }
            } catch (PHPMailer $th) {
                throw $th;
                return false;
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Hubo un error al reenviar el codigo de cancelación.'
            );
        }
    }
    public static function ctrVerificarCancelacionAbono()
    {

        $abs_id = $_POST['abs_id'];
        $abs_codigo = $_POST['abs_codigo'];

        $abs = CobranzaModelo::mdlObtenerAbonoByID($abs_id);

        if ($abs_codigo == $abs['abs_codigo']) {
            $datos1 = array(
                'abs_motivo_cancelacion' => $abs['abs_motivo_cancelacion'],
                'abs_id' => $abs['abs_id'],
            );
            $cambiarEstado = CobranzaModelo::mdlCancelarPago($datos1);
            if ($cambiarEstado) {
                $res1 = CobranzaModelo::mdlUltimaFechaCobro($abs['abs_id_contrato']);
                if ($res1) {
                    $id_contrato = CobranzaModelo::mdlObtenerContratoCobrado($abs['abs_id_contrato']);

                    $datos2 = array(
                        'abs_monto' => $abs['abs_monto'],
                        'ctr_ultima_fecha_abono' => $res1['abs_fecha_cobro'],
                        'abs_id_contrato' => $id_contrato['ctr_id'],
                    );
                    $res2 = CobranzaModelo::mdlActualizarContrato($datos2);
                    if ($res2) {
                        return array(
                            'status' => true,
                            'mensaje' => 'El abono se cancelo correctamente.'
                        );
                    } else {
                        return array(
                            'status' => false,
                            'mensaje' => 'Hubo un error al cancelar el abono.'
                        );
                    }
                }
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => 'El código de cancelación no es correcto.'
            );
        }
    }

    public static function ctrHistorialFichas()
    {
        $fichas = CobranzaModelo::mdlMostrarFichas();
        $fichas_array = array();
        foreach ($fichas as $key => $fch) {
            array_push($fichas_array, array(
                'gds_id' => $fch['gds_id'],
                'gds_nombre' => $fch['gds_nombre'],
                'gds_buttom' => '<a href="' . HTTP_HOST . 'app/report/reporte-cobranza-autorizada.php?abs_save=' . $fch['gds_id'] . '" target="_blank" class="btn btn-primary">Ver reporte</a>'
            ));
        }
        return $fichas_array;
    }

    public static function ctrAplicarDescuento()
    {

        $datos_abono = array(
            'abs_folio' => uniqid() . '-D',
            'abs_id_cobrador' => $_POST['abs_id_cobrador'],
            'abs_id_contrato' => $_POST['abs_id_contrato'],
            'abs_monto' => dnum($_POST['abs_descuento']),
            'abs_mp' => 'DESCUENTO',
            'abs_referancia' => '-',
            'abs_nota' => 'Descuento aplicado por oficina',
            'abs_estado_abono' => 'AUTORIZADO',
            'abs_fecha_cobro' => FECHA,
        );
        $abonar = CobranzaModelo::mdlAgregarDescuento($datos_abono);

        if ($abonar) {
            // Descontar en el contrato 
            $descuento = CobranzaModelo::mdlAplicarDescuentoContrato(array(
                'abs_monto' => dnum($_POST['abs_descuento']),
                'ctr_ultima_fecha_abono' => FECHA,
                'ctr_id' => $_POST['cra_contrato'],
            ));

            if ($descuento) {
                return array(
                    'status' => true,
                    'mensaje' => 'Descuento aplicado.'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Ocurrio un error inesperado, llame a soporte.'
                );
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => 'El descuento no se aplico correctamente, intente de nuevo.'
            );
        }
    }
}
