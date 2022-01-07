
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

    public function ajaxEnrutarCuenta()
    {
        $respuesta = CobranzaControlador::ctrEnrutarCuenta();
        echo json_encode($respuesta, true);
    }

    public function ajaxMostrarEnrute()
    {
        $respuesta = CobranzaModelo::mdlMostrarCartelera();
        $tabla = ' <table class="table table-striped table-hover tablas" >
        <thead>
            <tr>
                <th>RUTA</th>
                <th># CUENTA</th>
                <th> FECHA PROXIMO DE PAGO</th>
                <th> FECHA  REAGENDADA</th>
                <th> ORDEN </th>
            </tr>
        </thead>
        <tbody>';
        foreach ($respuesta as $key => $cra) {

            $tabla .= '<tr>';
            $tabla .= '<td>' . $cra['ctr_ruta'] . '</td>';
            $tabla .= '<td>' . $cra['ctr_numero_cuenta'] . '</td>';
            $tabla .= '<td>' . fechaCastellano($cra['cra_fecha_cobro']) . '</td>';
            $tabla .= '<td>' . $cra['cra_fecha_reagenda'] . '</td>';
            $tabla .= '<td>' . $cra['cra_orden'] . '</td>';
            $tabla .= '</tr>';
        }
        $tabla .= '</tbody>
        </table>';
        echo $tabla;
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
if (isset($_POST['formEnrutarCuenta'])) {
    $btnEnrutarCuenta = new CobranzaAjax();
    $btnEnrutarCuenta->ajaxEnrutarCuenta();
}

if (isset($_POST['btnMostrarEnrute'])) {
    $btnBuscarEnrute = new CobranzaAjax();
    $btnBuscarEnrute->ajaxMostrarEnrute();
}
