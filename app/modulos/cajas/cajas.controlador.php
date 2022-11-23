
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/01/2021 19:49
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class CajasControlador
{
    public function ctrAgregarCajas()
    {
        if (isset($_POST['btnRegistrarCaja'])) {
            $_POST['cja_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['cja_fecha_registro'] = FECHA;
            $_POST['cja_uso'] = 0;

            $agregarCaja = CajasModelo::mdlAgregarCajas($_POST);



            if ($agregarCaja) {
                AppControlador::msj('success', '¡Muy bien!', 'Caja registrada', HTTP_HOST . 'cajas');
            } else {
                AppControlador::msj('error', '¡Error!', 'No se pudo registrar la caja, intenta de nuevo');
            }
        }
    }
    public function ctrActualizarCajas()
    {
    }
    public function ctrMostrarCajas()
    {
    }
    public function ctrEliminarCajas()
    {
    }

    public  function ctrAbrirCaja()
    {
        if (isset($_POST['btnAbrirCaja'])) {

            $_POST['copn_usuario_abrio'] = $_SESSION['session_usr']['usr_id'];
            $_POST['copn_fecha_abrio'] = FECHA;
            $_POST['copn_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
            $_POST['copn_ingreso_inicio'] = str_replace(",", "", $_POST['copn_ingreso_inicio']);

            $abrirCaja = CajasModelo::mdlAbrirCaja($_POST);

            if ($abrirCaja) {

                $ultimaCajaAbierta = CajasModelo::mdlConsultarUltimaCajaAbierta(
                    array(
                        'copn_usuario_abrio' => $_SESSION['session_usr']['usr_id'],
                        'copn_id_caja' => $_POST['copn_id_caja'],
                        'copn_id_sucursal' => $_SESSION['session_suc']['scl_id']
                    )
                );

                $asignarCajaUsuario = UsuariosModelo::mdlActualizarCajaUsuario($_SESSION['session_usr']['usr_id'], $ultimaCajaAbierta['copn_id']);

                if ($asignarCajaUsuario) {
                    CajasModelo::mdlActualizarDisponibilidadCaja(1, $_POST['copn_id_caja'], $ultimaCajaAbierta['copn_id'], '');
                    $_SESSION['session_usr']['usr_caja'] =  $ultimaCajaAbierta['copn_id'];
                    AppControlador::msj('success', 'CAJA ABIERTA', '', HTTP_HOST);
                } else {
                }
            }
        }
    }

    public  function ctrAbrirCaja2()
    {
        if (isset($_POST['btnAbrirCaja'])) {

            // preArray($_POST['copn_id_caja']);

            // return;

            if($_POST['copn_id_caja'] == 0){
                AppControlador::msj('error', 'Seleccione una caja para este usuario', '', HTTP_HOST . 'flujo-caja');
                return;
            }


            $_POST['copn_fecha_abrio'] = FECHA;
            $_POST['copn_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
            $_POST['copn_ingreso_inicio'] = str_replace(",", "", $_POST['copn_ingreso_inicio']);

            $abrirCaja = CajasModelo::mdlAbrirCaja($_POST);

            if ($abrirCaja) {

                $ultimaCajaAbierta = CajasModelo::mdlConsultarUltimaCajaAbierta(
                    array(
                        'copn_usuario_abrio' => $_POST['copn_usuario_abrio'],
                        'copn_id_caja' => $_POST['copn_id_caja'],
                        'copn_id_sucursal' => $_SESSION['session_suc']['scl_id']
                    )
                );

                $asignarCajaUsuario = UsuariosModelo::mdlActualizarCajaUsuario($_POST['copn_usuario_abrio'], $ultimaCajaAbierta['copn_id']);



                if ($asignarCajaUsuario) {

                    // Registrar ingreso en caja del saldo 


                    $ingresoCaja = IngresosModelo::mdlAgregarIngresos(array(
                        'igs_concepto' => 'INICIO DE CAJA',
                        'igs_monto' => $_POST['copn_ingreso_inicio'],
                        'igs_fecha_registro' => FECHA,
                        'igs_usuario_registro' => $_SESSION['session_usr']['usr_nombre'],
                        'igs_mp' => 'EFECTIVO',
                        'igs_id_sucursal' => $_SESSION['session_suc']['scl_id'],
                        'igs_id_corte' => $ultimaCajaAbierta['copn_id'],
                        'igs_ruta' => '',
                        'igs_usuario_responsable' => $_POST['copn_usuario_abrio'],
                        'igs_id_corte_2' => $ultimaCajaAbierta['copn_id'],
                        'igs_referencia' => '',
                        'igs_tipo' => '',
                        'igs_cuenta' => ''


                    ));

                    if ($ingresoCaja) {
                        CajasModelo::mdlActualizarDisponibilidadCaja(1, $_POST['copn_id_caja'], $ultimaCajaAbierta['copn_id'], $_POST['copn_ingreso_inicio']);


                        //$_SESSION['session_usr']['usr_caja'] =  $ultimaCajaAbierta['copn_id'];
                        AppControlador::msj('success', 'CAJA ABIERTA', '', HTTP_HOST . 'flujo-caja');
                    } else {
                        AppControlador::msj('error', 'Error no identificado', '', HTTP_HOST . 'flujo-caja');
                    }
                } else {
                }
            }
        }
    }



    // TERMINAR FUNCION 
    public  function ctrAbrirCajaAutomatico($datos)
    {

        $_POST['copn_fecha_abrio'] = FECHA;
        $_POST['copn_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
        $_POST['copn_ingreso_inicio'] = str_replace(",", "", 0);
        $_POST['copn_id_caja'] = $datos['usr_caja_asg'];
        $_POST['copn_usuario_abrio'] = $datos['usr_id'];

        // copn_id_caja , copn_usuario_abrio , 

        // copn_ingreso_inicio , copn_fecha_abrio , copn_id_sucursal

        $abrirCaja = CajasModelo::mdlAbrirCaja($_POST);

        if ($abrirCaja) {

            $ultimaCajaAbierta = CajasModelo::mdlConsultarUltimaCajaAbierta(
                array(
                    'copn_usuario_abrio' => $_POST['copn_usuario_abrio'],
                    'copn_id_caja' => $_POST['copn_id_caja'],
                    'copn_id_sucursal' => $_SESSION['session_suc']['scl_id']
                )
            );

            $asignarCajaUsuario = UsuariosModelo::mdlActualizarCajaUsuario($_POST['copn_usuario_abrio'], $ultimaCajaAbierta['copn_id']);



            if ($asignarCajaUsuario) {

                // Registrar ingreso en caja del saldo 

                $ingresoCaja = IngresosModelo::mdlAgregarIngresos(array(
                    'igs_concepto' => 'INICIO DE CAJA AUTOMATICO',
                    'igs_monto' => $_POST['copn_ingreso_inicio'],
                    'igs_fecha_registro' => FECHA,
                    'igs_usuario_registro' => $_SESSION['session_usr']['usr_nombre'],
                    'igs_mp' => 'EFECTIVO',
                    'igs_id_sucursal' => $_SESSION['session_suc']['scl_id'],
                    'igs_id_corte' => $ultimaCajaAbierta['copn_id'],
                    'igs_ruta' => '',
                    'igs_usuario_responsable' => $_POST['copn_usuario_abrio'],
                    'igs_id_corte_2' => $ultimaCajaAbierta['copn_id'],
                    'igs_referencia' => '',
                    'igs_tipo' => '',
                    'igs_cuenta' => ''
                ));

                if ($ingresoCaja) {
                    CajasModelo::mdlActualizarDisponibilidadCaja(1, $_POST['copn_id_caja'], $ultimaCajaAbierta['copn_id'], $_POST['copn_ingreso_inicio']);
                }
            }
        }
    }

    public static function ctrCerrarCaja()
    {

        if (isset($_POST['btnCerrarCaja'])) {

            $crt_id = $_POST['usr_caja'];


            $bandera_saldo = $_POST['bandera_saldo'];




            if ($bandera_saldo == 2) {

                // SALDO A FAVOR (INGRESO)

                $igs_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);


                $igs_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_POST['usr_id']);

                $_POST['igs_mp'] = 'EFECTIVO';


                $_POST['igs_referencia'] = "";
                $_POST['igs_cuenta'] = "";

                $_POST['igs_concepto'] = "SALDO EXTRA A FAVOR";
                $_POST['igs_ruta'] = "";
                $_POST['igs_tipo'] = "COBRANZA";


                $_POST['igs_id_corte'] = $igs_id_corte['usr_caja'];
                $_POST['igs_id_corte_2'] = $igs_id_corte2['usr_caja'];


                $_POST['igs_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
                $_POST['igs_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
                // $_POST['igs_id_corte'] = CortesControlador::crtConsultarUltimoCorte();

                $_POST['igs_monto'] = str_replace(",", "", $_POST['copn_favor']);
                $_POST['igs_fecha_registro'] = FECHA;
                $_POST['igs_usuario_responsable'] = $_POST['usr_id'];

                $igs = IngresosModelo::mdlAgregarIngresos($_POST);
            } elseif ($bandera_saldo == 3) {
                // SALDO DEBE  (GASTO) - DEBE = 11
                if ($_POST['usr_caja'] == $_SESSION['session_usr']['usr_caja']) {
                    $categoria = 16; // PRESTAMO

                } else {
                    $categoria = 11; // DEBE 
                }

                $tgts_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                if ($tgts_id_corte2['usr_caja'] == 0) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo'
                    );
                }
                $tgts_id_corte = $_POST['usr_caja'];



                if ($tgts_id_corte == 0) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Para poder hacer un cargo a este usuario, necesita sincronizarse a una caja o cargar cartera'
                    );
                }
                $_POST['tgts_id_corte'] = $tgts_id_corte;
                $_POST['tgts_id_corte2'] = $tgts_id_corte2['usr_caja'];

                $_POST['tgts_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
                $_POST['tgts_id_sucursal'] = $_SESSION['session_suc']['scl_id'];




                $_POST['tgts_cantidad'] =   str_replace(",", "", $_POST['copn_debe']);
                $_POST['tgts_fecha_gasto'] = FECHA;


                $_POST['tgts_ruta'] = "";
                $_POST['tgts_usuario_responsable'] = $_POST['usr_id'];
                $_POST['tgts_categoria'] = $categoria;

                $empleado = UsuariosModelo::mdlMostrarUsuarios($_POST['usr_id']);

                $_POST['tgts_concepto'] = "FALTANTE DE <strong>" . $empleado['usr_nombre'] . '</strong>';

                $_POST['tgts_mp'] = "EFECTIVO";
                $_POST['tgts_nota'] = "";


                $gts =  GastosModelo::mdlCrearGasto($_POST);
            }





            if ($_POST['usr_caja'] == $_SESSION['session_usr']['usr_caja']) {
                // CAJA GENERAL
                $montos = array(

                    'monto_ingresos_e' => CortesModelo::mdlConsultarMontoIngresosPEByCorte2($crt_id),
                    'monto_ingresos_b' => CortesModelo::mdlConsultarMontoIngresosPBByCorte2($crt_id),
                    'monto_gastos_e' => CortesModelo::mdlConsultarMontoGastosPEByCorte2($crt_id),
                    'monto_gastos_b' => CortesModelo::mdlConsultarMontoGastosPBByCorte2($crt_id),
                );
            } else {

                // CAJA DE CADA COBRADOR Y VENDEDORES
                $montos = array(

                    'monto_ingresos_e' => CortesModelo::mdlConsultarMontoIngresosPEByCorte($crt_id),
                    'monto_ingresos_b' => CortesModelo::mdlConsultarMontoIngresosPBByCorte($crt_id),
                    'monto_gastos_e' => CortesModelo::mdlConsultarMontoGastosPEByCorte($crt_id),
                    'monto_gastos_b' => CortesModelo::mdlConsultarMontoGastosPBByCorte($crt_id),
                );
            }







            $monto_e =  $montos['monto_ingresos_e']['monto_total'] == NULL ? 0 : $montos['monto_ingresos_e']['monto_total'];

            $monto_g_e = $montos['monto_gastos_e']['monto_total'] ==  NULL ? 0 : $montos['monto_ingresos_e']['monto_total'];

            $monto_b =  $montos['monto_ingresos_b']['monto_total'];

            $monto_g_b = $montos['monto_gastos_b']['monto_total'];

            $ingreso_caja = str_replace(",", "", $_POST['copn_ingreso_inicio']);
            $ingreso_caja = $ingreso_caja ==  "" ? 0 : $ingreso_caja;
            // preArray($monto_e);
            // preArray($ingreso_caja);
            // preArray($monto_g_e);

            $totalEfectivo = $monto_e +  $ingreso_caja - $monto_g_e;
            $totalBanco = $monto_b - $monto_g_b;

            $_POST['copn_ingreso_efectivo'] = str_replace(",", "", $_POST['copn_ingreso_efectivo_usuario']);
            $_POST['copn_ingreso_banco'] = str_replace(",", "", $_POST['copn_ingreso_banco']);

            $_POST['copn_usuario_cerro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['copn_efectivo_real'] = $totalEfectivo;
            $_POST['copn_banco_real'] = $totalBanco;
            $_POST['copn_fecha_cierre'] = FECHA;

            // if ($_POST['copn_tabulador'] != "") {
            //     $_POST['copn_tabulador'] = json_encode($_POST['copn_tabulador'],2);
            // }




            $ActaulizarCajaCierre = CajasModelo::mdlCerrarCaja($_POST);

            if ($_POST['copn_tipo_caja'] == "CAJA_COBRADOR") {
                $redireccionamiento = HTTP_HOST . 'flujo-caja';
            } elseif ($_POST['copn_tipo_caja'] == "CAJA_VENDEDOR") {
                $redireccionamiento = HTTP_HOST . 'flujo-caja';
            } elseif ($_POST['copn_tipo_caja'] == "CAJA_COBRANZA_G") {
                $redireccionamiento = HTTP_HOST . 'app/report/reporte-cobranza-usuario.php?copn_id=' . $crt_id;
            } elseif ($_POST['copn_tipo_caja'] == "CAJA_VENDEDOR_G") {
                $redireccionamiento = HTTP_HOST . 'app/report/reporte-ventas-usuario.php?copn_id=' . $crt_id;
            } else {
                $redireccionamiento = HTTP_HOST . 'app/report/reporte-cobranza-usuario.php?copn_id=' . $crt_id;
            }

            if ($ActaulizarCajaCierre) {
                $cerrarCajaUsuario = UsuariosModelo::mdlActualizarCajaUsuario($_POST['usr_id'], 0);
               

                if ($cerrarCajaUsuario) {
                    $cerrarCaja = CajasModelo::mdlActualizarDisponibilidadCaja(0, $_POST['cja_id_caja'], 0, $_POST['copn_saldo']);
                    if ($cerrarCaja) {


                        if ($_POST['usr_caja'] == $_SESSION['session_usr']['usr_caja']) {
                            $_SESSION['session_usr']['usr_caja'] =  0;
                        }

                        return array(
                            'mensaje' => 'Corte realizado',
                            'status' => true,
                            'pagina' => $redireccionamiento
                        );
                    } else {
                        return array(
                            'mensaje' => 'Ocurrio un error',
                            'status' => false,
                            'pagina' => HTTP_HOST
                        );
                    }
                }
            }


            // var_dump($totalEfectivo);
            // echo "<br>";
            // var_dump($totalBanco);
        }
    }
}
