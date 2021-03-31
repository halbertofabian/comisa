
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 29/03/2021 10:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class PrestamosControlador
{
    public static function ctrAgregarPrestamos()
    {
        if (isset($_POST['btnGuardarPrestamos'])) {
            $_POST['pms_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['pms_fecha_registro'] = FECHA;
            $_POST['pms_cantidad'] = str_replace(",", "", $_POST['pms_cantidad']);
            $_POST['pms_cantidad_adeudo'] = $_POST['pms_cantidad'];

            $guardar = PrestamosModelo::mdlAgregarPrestamos($_POST);

            if ($guardar) {
                // Cargar el prestamo a caja principal

                $tgts_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                if ($tgts_id_corte2['usr_caja'] == 0) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo'
                    );
                }
                $tgts_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                if ($tgts_id_corte['usr_caja'] == 0) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Para poder hacer un cargo a este usuario, necesita sincronizarse a una caja o cargar cartera'
                    );
                }
                $_POST['tgts_id_corte'] = $tgts_id_corte['usr_caja'];
                $_POST['tgts_id_corte2'] = $tgts_id_corte2['usr_caja'];

                $_POST['tgts_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
                $_POST['tgts_id_sucursal'] = $_SESSION['session_suc']['scl_id'];




                $_POST['tgts_cantidad'] =  $_POST['pms_cantidad'];
                $_POST['tgts_fecha_gasto'] = FECHA;


                $_POST['tgts_ruta'] = "";
                $_POST['tgts_usuario_responsable'] = $_SESSION['session_usr']['usr_id'];
                $_POST['tgts_categoria'] = 16;

                $empleado = UsuariosModelo::mdlMostrarUsuarios($_POST['pms_usuario']);
                $_POST['tgts_concepto'] = " al empleado <strong>" . $empleado['usr_nombre'] . '</strong>';

                $_POST['tgts_mp'] = "EFECTIVO";
                $_POST['tgts_nota'] = "";

                $crearGasto = GastosModelo::mdlCrearGasto($_POST);

                if ($crearGasto) {
                    return array(
                        'status' => true,
                        'mensaje' => 'Se guardo correctamente el prestamo'
                    );
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'No se registro el gasto como prstamo, pero si se registro el prestamo, nota: Tienes que realizar el gasto de manera manual'
                    );
                }
            } else {

                return array(
                    'status' => false,
                    'mensaje' => 'Se produjo un error, intente de nuevo'
                );
            }
        }
    }
    public function ctrActualizarPrestamos()
    {
    }
    public function ctrMostrarPrestamos()
    {
    }
    public function ctrEliminarPrestamos()
    {
    }
}
