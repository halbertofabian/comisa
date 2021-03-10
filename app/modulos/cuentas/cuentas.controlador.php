
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/03/2021 08:35
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class CuentasControlador
{
    public function ctrAgregarCuentas()
    {

        if (isset($_POST['btnGuardarCuenta'])) {

            $_POST['cbco_saldo'] = str_replace(",","",$_POST['cbco_saldo']);
            $guardarCuenta = CuentasModelo::mdlAgregarCuentas($_POST);

            if ($guardarCuenta) {
                AppControlador::msj('success', '¡Muy bien!', 'Cuenta creada con éxito', HTTP_HOST . 'cuentas');
            } else {
                AppControlador::msj('error', 'Error', 'La cuenta no pudo ser creada, intente de nuevo');
            }
        }
    }

    public function ctrAgregarEgreso(){
        if(isset($_POST['btnGuardarEgreso'])){
            $_POST[''] = "";
        }
    }
    public function ctrActualizarCuentas()
    {
    }
    public function ctrMostrarCuentas()
    {
    }
    public function ctrEliminarCuentas()
    {
    }
}
