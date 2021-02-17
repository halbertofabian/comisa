
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/11/2020 13:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/ingresos/ingresos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/ingresos/ingresos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class IngresosAjax
{
    public function ajaxEliminarIngreso()
    {
        $res = IngresosControlador::ctrEliminarIngresos();
        echo json_encode($res, true);
    }
}


if (isset($_POST['btnEliminarIngreso'])) {
    $eliminarIngreso = new IngresosAjax();
    $eliminarIngreso->ajaxEliminarIngreso();
}
