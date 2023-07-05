
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
            $_POST['pms_usuario'] = $_POST['pms_usuario'];
            $_POST['pms_cantidad'] = str_replace(",", "", $_POST['pms_cantidad']);
            $_POST['pms_cantidad_adeudo'] = $_POST['pms_cantidad'];
            $_POST['pms_semanas_pago'] = $_POST['pms_semanas_pago'];
            $_POST['pms_fecha_registro'] = FECHA;
            $_POST['pms_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['pms_tipo'] = $_POST['pms_tipo'];
            $_POST['pms_codigo'] = rand(10000, 99999);



            $pms_id = PrestamosModelo::mdlAgregarPrestamos($_POST);

            if ($pms_id) {
                // Cargar el prestamo a caja principal

                return array(
                    'status' => true,
                    'mensaje' => 'Por favor solicite el codigo de aprobación.',
                    'pms_id' => $pms_id,
                );

                // $tgts_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                // if ($tgts_id_corte2['usr_caja'] == 0) {
                //     return array(
                //         'status' => false,
                //         'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo'
                //     );
                // }
                // $tgts_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                // if ($tgts_id_corte['usr_caja'] == 0) {
                //     return array(
                //         'status' => false,
                //         'mensaje' => 'Para poder hacer un cargo a este usuario, necesita sincronizarse a una caja o cargar cartera'
                //     );
                // }
                // $_POST['tgts_id_corte'] = $tgts_id_corte['usr_caja'];
                // $_POST['tgts_id_corte2'] = $tgts_id_corte2['usr_caja'];

                // $_POST['tgts_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
                // $_POST['tgts_id_sucursal'] = $_SESSION['session_suc']['scl_id'];




                // $_POST['tgts_cantidad'] =   str_replace(",", "", $_POST['pms_cantidad']);
                // $_POST['tgts_fecha_gasto'] = FECHA;


                // $_POST['tgts_ruta'] = "";
                // $_POST['tgts_usuario_responsable'] = $_SESSION['session_usr']['usr_id'];
                // $_POST['tgts_categoria'] = 16;

                // $empleado = UsuariosModelo::mdlMostrarUsuarios($_POST['pms_usuario']);

                // $_POST['tgts_concepto'] = " al empleado <strong>" . $empleado['usr_nombre'] . '</strong>';

                // $_POST['tgts_mp'] = "EFECTIVO";
                // $_POST['tgts_nota'] = "";
                // $_POST['tgts_tipo'] = "PRESTAMO";

                // $crearGasto = GastosModelo::mdlCrearGasto($_POST);

                // if ($crearGasto) {
                //     if ($_POST['pms_tipo'] == 'Externo') {
                //         $usr_prestamo = UsuariosModelo::mdlAcomularDeudaExterna($_POST['pms_usuario'], $_POST['tgts_cantidad']);
                //     } elseif ($_POST['pms_tipo'] == 'Interno') {
                //         $usr_prestamo = UsuariosModelo::mdlAcomularDeudaInterna($_POST['pms_usuario'], $_POST['tgts_cantidad']);
                //     }

                //     if ($usr_prestamo) {
                //         return array(
                //             'status' => true,
                //             'mensaje' => 'Se guardo correctamente el prestamo'
                //         );
                //     } else {
                //         return array(
                //             'status' => false,
                //             'mensaje' => 'No se registro el gasto como prestamo, pero si se registro el prestamo, nota: Tienes que realizar el gasto de manera manual'
                //         );
                //     }
                // } else {
                //     return array(
                //         'status' => false,
                //         'mensaje' => 'No se registro el gasto como prestamo, pero si se registro el prestamo, nota: Tienes que realizar el gasto de manera manual'
                //     );
                // }
            } else {

                return array(
                    'status' => false,
                    'mensaje' => 'Se produjo un error, intente de nuevo'
                );
            }
        }
    }
    public static function ctrValidarPrestamo()
    {
        $pms_id = $_POST['pms_id'];
        $pms_codigo = $_POST['pms_codigo'];
        $pms = PrestamosModelo::mdlMostrarPrestamosById($pms_id);
        if ($pms['pms_codigo'] == $pms_codigo) {
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




            $_POST['tgts_cantidad'] =   str_replace(",", "", $pms['pms_cantidad']);
            $_POST['tgts_fecha_gasto'] = FECHA;


            $_POST['tgts_ruta'] = "";
            $_POST['tgts_usuario_responsable'] = $_SESSION['session_usr']['usr_id'];
            $_POST['tgts_categoria'] = 16;

            $empleado = UsuariosModelo::mdlMostrarUsuarios($pms['pms_usuario']);

            $_POST['tgts_concepto'] = " al empleado <strong>" . $empleado['usr_nombre'] . '</strong>';

            $_POST['tgts_mp'] = "EFECTIVO";
            $_POST['tgts_nota'] = "";
            $_POST['tgts_tipo'] = "PRESTAMO";

            $crearGasto = GastosModelo::mdlCrearGasto($_POST);

            if ($crearGasto) {
                $status = PrestamosModelo::mdlAprobarEstadoPrestamo($pms_id);
                $res_pms_codigo = PrestamosModelo::mdlQuitarPrestamo($pms_id);
                if ($pms['pms_tipo'] == 'Externo') {
                    $usr_prestamo = UsuariosModelo::mdlAcomularDeudaExterna($pms['pms_usuario'], $_POST['tgts_cantidad']);
                } elseif ($pms['pms_tipo'] == 'Interno') {
                    $usr_prestamo = UsuariosModelo::mdlAcomularDeudaInterna($pms['pms_usuario'], $_POST['tgts_cantidad']);
                }

                if ($usr_prestamo) {

                    return array(
                        'status' => true,
                        'mensaje' => 'Se guardo correctamente el prestamo'
                    );
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'No se registro el gasto como prestamo, pero si se registro el prestamo, nota: Tienes que realizar el gasto de manera manual'
                    );
                }
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se registro el gasto como prestamo, pero si se registro el prestamo, nota: Tienes que realizar el gasto de manera manual'
                );
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => 'El codigo para validar el prestamo es incorrecto.'
            );
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
