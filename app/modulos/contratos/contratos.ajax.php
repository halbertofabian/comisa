<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 04/02/2021 18:14
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/clientes/clientes.modelo.php';


class ContratosAjax
{
    public function ajaxConsultarCliente()
    {
        $res = ClientesModelo::mdlMostrarClientes($_POST['clts_id']);
        echo json_encode($res, true);
    }
    public function ajaxCrearContrato()
    {
        $res = ContratosControlador::ctrAgregarContratos();
        echo json_encode($res, true);
    }

}
if (isset($_POST['btnMostrarInfCltId'])) {
    $consultarCliente = new ContratosAjax();
    $consultarCliente->ajaxConsultarCliente();
}
if (isset($_POST['btnNewContratoAdd'])) {
    $crearcontrato = new ContratosAjax();
    $crearcontrato->ajaxCrearContrato();
}

