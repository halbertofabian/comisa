
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 13/04/2021 11:42
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class ComisionesControlador
{
    public static function ctrCalcularComisiones()
    {
        if (isset($_POST['btnCalcularComisiones'])) {


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

            $_POST['tgts_fecha_gasto'] = FECHA;

            $_POST['tgts_ruta'] = "";
            $_POST['tgts_usuario_responsable'] = $_SESSION['session_usr']['usr_id'];
            $_POST['tgts_categoria'] = 29;

            $empleado = UsuariosModelo::mdlMostrarUsuarios($_POST['id_igs_usuario_responsable']);

            $_POST['tgts_concepto'] = " del Cobrador / Vendedor <strong>" . $empleado['usr_nombre'] . '</strong>';

            $_POST['tgts_mp'] = "EFECTIVO";
            $_POST['tgts_nota'] = "";
            $_POST['tgts_tipo'] = "COMISION";

            $crearGasto = GastosModelo::mdlCrearGasto($_POST);
            if ($crearGasto) {
                if ($_POST['igs_abono_deuda'] > 0) {
                    UsuariosModelo::mdlDisminuirDeudaExterna($_POST['id_igs_usuario_responsable'], $_POST['igs_abono_deuda']);
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
    public function ctrActualizarComisiones()
    {
    }
    public function ctrMostrarComisiones()
    {
    }
    public function ctrEliminarComisiones()
    {
    }
}
