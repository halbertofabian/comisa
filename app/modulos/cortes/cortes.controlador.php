
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/01/2021 03:01
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class CortesControlador
{
    public function ctrAgregarCortes()
    {
    }
    public function ctrActualizarCortes()
    {
    }
    public function ctrMostrarCortes()
    {
    }
    public function ctrEliminarCortes()
    {
    }

    public static function crtConsultarUltimoCorte()
    {
        return $_SESSION['session_usr']['usr_caja'];
    }
}
