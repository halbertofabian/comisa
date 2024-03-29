
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 14/04/2021 17:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class SueldosControlador
{
    public function ctrAgregarSueldos()
    {
    }
    public function ctrActualizarSueldos()
    {
    }
    public function ctrMostrarSueldos()
    {
    }
    public function ctrEliminarSueldos()
    {
    }

    public static function ctrCalcularSueldo()
    {
        if (isset($_POST['btnCalcularSueldo'])) {
            $tgts_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
            if ($tgts_id_corte2['usr_caja'] == 0) {
                return array(
                    'status' => false,
                    'mensaje' => 'Necesitas abrir caja para guardar comisiomes, intente de nuevo',
                    'pagina' => HTTP_HOST . 'mi-caja'
                );
            }
            $tgts_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
            if ($tgts_id_corte['usr_caja'] == 0) {
                return array(
                    'status' => false,
                    'mensaje' => 'Para poder hacer un cargo a este usuario, necesita sincronizarse a una caja o cargar cartera',
                    'pagina' => HTTP_HOST . 'mi-caja'
                );
            }
            $_POST['tgts_id_corte'] = $tgts_id_corte['usr_caja'];
            $_POST['tgts_id_corte2'] = $tgts_id_corte2['usr_caja'];

            $_POST['tgts_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['tgts_id_sucursal'] = $_SESSION['session_suc']['scl_id'];

            $_POST['tgts_cantidad'] =  str_replace(",", "", $_POST['igs_pago']);

            $_POST['igs_abono_deuda'] =  str_replace(",", "", $_POST['igs_abono_deuda']);

            $_POST['igs_deuda_int'] = str_replace(",", "", $_POST['igs_deuda_int']);


            $_POST['tgts_fecha_gasto'] = FECHA;

            $_POST['tgts_ruta'] = "";
            $_POST['tgts_usuario_responsable'] = $_SESSION['session_usr']['usr_id'];
            $_POST['tgts_categoria'] = 34;

            $empleado = UsuariosModelo::mdlMostrarUsuarios($_POST['id__usr_sueldo']);

            $_POST['tgts_concepto'] = " del empleado <strong>" . $empleado['usr_nombre'] . '</strong>';

            $_POST['tgts_mp'] = "EFECTIVO";
            $_POST['tgts_nota'] = "";
            $_POST['tgts_tipo'] = "SUELDO";

            $crearGasto = GastosModelo::mdlCrearGasto($_POST);
            if ($crearGasto) {
                if ($_POST['igs_abono_deuda'] > 0) {

                    $_POST['absemp_fecha'] = FECHA;
                    $_POST['absemp_abono'] = $_POST['igs_abono_deuda'];
                    $_POST['absemp_id_usuario'] = $_POST['id__usr_sueldo'];
                    $_POST['absemp_tipo_prestamo'] = 'Externo';
                    $_POST['absemp_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];

                    SueldosModelo::mdlRegistrarAbono($_POST);
                    UsuariosModelo::mdlDisminuirDeudaExterna($_POST['id__usr_sueldo'], $_POST['igs_abono_deuda']);
                }
                if ($_POST['igs_deuda_int'] > 0) {
                    $_POST['absemp_fecha'] = FECHA;
                    $_POST['absemp_abono'] = $_POST['igs_deuda_int'];
                    $_POST['absemp_id_usuario'] = $_POST['id__usr_sueldo'];
                    $_POST['absemp_tipo_prestamo'] = 'Interno';
                    $_POST['absemp_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];

                    SueldosModelo::mdlRegistrarAbono($_POST);
                    UsuariosModelo::mdlDisminuirDeudaInterna($_POST['id__usr_sueldo'], $_POST['igs_deuda_int']);
                }
                return array(
                    'status' => true,
                    'mensaje' => 'Movimiento registrado con éxito',
                    'pagina' => HTTP_HOST
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo registrar este movimientos, intenta de nuevo.',
                    'pagina' => HTTP_HOST . 'comosiones'
                );
            }
        }
    }

    public static function ctrAbonardeuda()
    {
        if (isset($_POST)) {
            $_POST['absemp_fecha'] = FECHA;
            $_POST['absemp_abono'] = str_replace(",", "", $_POST['absemp_abono']);
            $_POST['absemp_id_usuario'] = $_POST['pms_usuario'];
            $_POST['absemp_tipo_prestamo'] = $_POST['pms_tipo'];
            $_POST['absemp_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];

            $abonoregistrado = SueldosModelo::mdlRegistrarAbono($_POST);




            if ($abonoregistrado) {

                $empleado = UsuariosModelo::mdlMostrarUsuarios($_POST['pms_usuario']);
                // Ingreso a caja 

                //Cortes controlador
                $igs_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                if ($igs_id_corte2['usr_caja'] == 0) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo'
                    );
                }

                $igs_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                if ($igs_id_corte['usr_caja'] == 0) {

                    return array(
                        'status' => false,
                        'mensaje' => 'Para poder hacer un cargo a este usuario, necesita sincronizarse a una caja o cargar cartera'
                    );
                }




                $_POST['igs_mp'] = 'EFECTIVO';


                $_POST['igs_referencia'] = "";
                $_POST['igs_cuenta'] = "";

                $_POST['igs_concepto'] = "Abono del empleado <strong>" . $empleado['usr_nombre'] . "</strong>";
                $_POST['igs_ruta'] = "";
                $_POST['igs_tipo'] = "ABONOS_COBRANZA";


                $_POST['igs_id_corte'] = $igs_id_corte['usr_caja'];
                $_POST['igs_id_corte_2'] = $igs_id_corte2['usr_caja'];


                $_POST['igs_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
                $_POST['igs_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
                // $_POST['igs_id_corte'] = CortesControlador::crtConsultarUltimoCorte();

                $_POST['igs_monto'] = str_replace(",", "", $_POST['absemp_abono']);
                $_POST['igs_fecha_registro'] = FECHA;
                $_POST['igs_usuario_responsable'] = $_SESSION['session_usr']['usr_id'];

                $igs = IngresosModelo::mdlAgregarIngresos($_POST);

                if ($_POST['absemp_tipo_prestamo'] == "Interno") {
                    UsuariosModelo::mdlDisminuirDeudaInterna($_POST['absemp_id_usuario'], $_POST['absemp_abono']);
                }
                if ($_POST['absemp_tipo_prestamo'] == "Externo") {
                    UsuariosModelo::mdlDisminuirDeudaExterna($_POST['absemp_id_usuario'], $_POST['absemp_abono']);
                }
                return array(
                    'status' => true,
                    'mensaje' => 'Abono registrado con éxito',
                    'pagina' => HTTP_HOST
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo registrar abono, intenta de nuevo.',
                    'pagina' => HTTP_HOST . 'abonos'
                );
            }
        }
    }
}
