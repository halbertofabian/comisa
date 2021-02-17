
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


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';

require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class CajasAjax
{
    public function ajaxCerrarCaja()
    {
        $res = CajasControlador::ctrCerrarCaja();
        echo json_encode($res,true);
    }
}

if (isset($_POST['btnCerrarCaja'])) {
    $cerrarCaja = new CajasAjax();
    $cerrarCaja->ajaxCerrarCaja();
}
