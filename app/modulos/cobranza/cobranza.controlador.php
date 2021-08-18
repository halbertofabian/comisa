
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
                'usr' => json_encode($usrLogin, true),
                'scl' => json_encode($sucursal, true),
                'scl_url_access' => HTTP_HOST
            );
        }
    }
}
