
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


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/cobranza/cobranza.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cobranza/cobranza.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
require_once DOCUMENT_ROOT . 'app/lib/PHPExcel/Classes/PHPExcel/IOFactory.php';
class CobranzaAjax
{
    public function ajaxImportarSaldos()
    {
        $respuesta = CobranzaControlador::ctrActualizarSaldosByExcel();
        echo json_encode($respuesta, true);
    }
    public function ajaxCancelarPago()
    {
        $respuesta = CobranzaControlador::ctrCancelarPagos();
        echo json_encode($respuesta, true);
    }

    public function ajaxAutorizarPagos()
    {
        $respuesta = CobranzaControlador::ctrProcesarPagoAPI($_POST['usr_id'], $_POST['usr_nombre']);
        echo json_encode($respuesta, true);
    }
    public function ajaxAutorizarCobranza()
    {
        $respuesta = CobranzaModelo::mdlActualizarCobranzaAutizo($_POST['usr_id'], $_POST['usr_autorizar_cobranza']);
        echo json_encode($respuesta, true);
    }
    public function ajaxBuscarEnrute()
    {
        $ctr = CobranzaModelo::mdlMostrardatosEnrute($_POST);
        // preArray($ctr);
        // return;
        $cra = CobranzaModelo::mdlMostrarEnture($ctr['ctr_id']);
        echo json_encode(array(
            'ctr' => $ctr,
            'cra' => $cra,
        ), true);
    }
}
if (isset($_POST['btnImportarSaldos'])) {
    $importarSaldos = new CobranzaAjax();
    $importarSaldos->ajaxImportarSaldos();
}

if (isset($_POST['btnCancelarPago'])) {
    $cancelarPago = new CobranzaAjax();
    $cancelarPago->ajaxCancelarPago();
}

if (isset($_POST['btnAutorizarPagos'])) {
    $btnAutorizar = new CobranzaAjax();
    $btnAutorizar->ajaxAutorizarPagos();
}

if (isset($_POST['btnDenegarCobro'])) {
    $btnAutorizarCobranza = new CobranzaAjax();
    $btnAutorizarCobranza->ajaxAutorizarCobranza();
}

if (isset($_POST['btnBuscarEnrute'])) {
    $btnBuscarEnruta = new CobranzaAjax();
    $btnBuscarEnruta->ajaxBuscarEnrute();
}
