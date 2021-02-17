
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 27/11/2020 01:39
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/paquetes/paquetes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/paquetes/paquetes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class PaquetesAjax
{
    public $pqt_sku;

    public function ajaxListarPaqueteBySku()
    {
        $res = PaquetesModelo::mdlMostrarPaquetes($this->pqt_sku);
        echo json_encode($res, true);
    }
    public function ajaxEliminarPaqueteBySku()
    {
        $res = PaquetesControlador::ctrEliminarPaquetes();
        echo json_encode($res, true);
    }
}

if (isset($_POST['btnBuscarPaquete'])) {
    $listarPaquete = new PaquetesAjax();
    $listarPaquete->pqt_sku = $_POST['pqt_sku'];
    $listarPaquete->ajaxListarPaqueteBySku();
}

if (isset($_POST['btnEliminarPaquete'])) {
    $eliminarPaquete = new PaquetesAjax();
    $eliminarPaquete->ajaxEliminarPaqueteBySku();
}
