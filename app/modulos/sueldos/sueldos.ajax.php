
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


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/sueldos/sueldos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/sueldos/sueldos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class SueldosAjax
{
    public function ajaxMostrarInfoUser()
    {
        $respuesta = SueldosModelo::mdlMostrarSueldos($_POST['id__usr_sueldo']);
        echo json_encode($respuesta, true);
    }

    public function ajaxCalcularSueldo()
    {
        $respuesta = SueldosControlador::ctrCalcularSueldo();
        echo json_encode($respuesta, true);
    }
    public function ajaxMostrarinfodeuda()
    {
        $respuesta = SueldosModelo::mdlmostrarInfoDeuda($_POST);
        echo json_encode($respuesta, true);
    }

    public function ajaxAbonodeuda()
    {
        $respuesta = SueldosControlador::ctrAbonardeuda();
        echo json_encode($respuesta, true);
    }
}

if (isset($_POST['btnConsultaInfSueldo'])) {
    $mostrarinfUsuarios = new SueldosAjax();
    $mostrarinfUsuarios->ajaxMostrarInfoUser();
}

if (isset($_POST['btnCalcularSueldo'])) {
    $CalcularSueldoUsuarios = new SueldosAjax();
    $CalcularSueldoUsuarios->ajaxCalcularSueldo();
}

if (isset($_POST['btnMostrarDeuda'])) {
    $Mostrarinfodeuda = new SueldosAjax();
    $Mostrarinfodeuda->ajaxMostrarinfodeuda();
}

if (isset($_POST['btnAbonoDeuda'])) {
    $Abonodeuda = new SueldosAjax();
    $Abonodeuda->ajaxAbonodeuda();
}
