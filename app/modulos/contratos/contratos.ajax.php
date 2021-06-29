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
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/clientes/clientes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/ingresos/ingresos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';


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
    public function ajaxMostrarContratos()
    {
        //$res = ContratosModelo::mdlMostrarContratos($_POST['btn_Mostar_ctrs']);
        $res = ContratosControlador::ctrMostrarContratos();
        echo json_encode($res, true);
    }
    public function ajaxEditarContrato()
    {
        $res = ContratosControlador::ctrActualizarContratos();
        echo json_encode($res, true);
    }

    public function ajaxRegistrarVentasContrato(){

        $res = ContratosControlador::ctrRegistrarVentasContrato();
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

if (isset($_POST['btn_Mostar_ctrs'])) {
    $mostrarContratos = new ContratosAjax();
    $mostrarContratos->ajaxMostrarContratos();
}

if (isset($_POST['btnEditarctrs'])) {
    $editarcontrato = new ContratosAjax();
    $editarcontrato->ajaxEditarContrato();
}

if(isset($_POST['btnRegistrarVentasContrato'])){

    $registrarVentas = new ContratosAjax();
    $registrarVentas -> ajaxRegistrarVentasContrato();

}