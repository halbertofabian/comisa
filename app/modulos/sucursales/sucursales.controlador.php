
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 04/01/2021 22:49
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class SucursalesControlador
{
    public  function ctrAgregarSucursales()
    {
        if (isset($_POST['btnGuardarSucursal'])) {

            $_POST['scl_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['scl_fecha_registro'] = FECHA;
            $_POST['scl_id'] = md5($_POST['scl_nombre']);
            $_POST['scl_acceso_usr'] = '["' . $_SESSION['session_usr']['usr_matricula'] . '"]';

            $crearSuc = SucursalesModelo::mdlAgregarSucursales($_POST);

            if ($crearSuc) {
                AppControlador::msj('success', '!Muy buen¡', 'Sucursal creada', HTTP_HOST . 'sucursales');
            } else {
                AppControlador::msj('error', '!Error¡', 'Ocurrio un error, intenta de nuevo');
            }
        }
    }
    public function ctrActualizarSucursales()
    {
    }
    public function ctrMostrarSucursales()
    {
    }
    public function ctrEliminarSucursales()
    {
    }

    public function ctrAccederSucursal()
    {
        if (isset($_POST['btnAccederSucursal'])) {

            $sucursal = SucursalesModelo::mdlMostrarSucursales($_POST['scl_id']);

            $accesos_usr =  json_decode($sucursal['scl_acceso_usr'], true);
            $bandera = false;

            if ($accesos_usr != NULL) {
                for ($i = 0; $i < sizeof($accesos_usr); $i++) {
                    if ($_SESSION['session_usr']['usr_matricula'] == $accesos_usr[$i]) {
                        $bandera = true;
                    }
                }
            }

            if ($bandera) {
                $_SESSION['session_suc'] = $sucursal;
                AppControlador::msj('success', '¡Bienvenido(a)!', 'A sucursal ' . $_SESSION['session_suc']['scl_nombre'], HTTP_HOST);
            } else {
                AppControlador::msj('warning', '¡Upss!', 'No tienes acceso a está sucursal, intenta con otra');
            }






            //



        }
    }
}
