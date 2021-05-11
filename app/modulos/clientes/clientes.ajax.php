
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 31/01/2021 16:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/clientes/clientes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/clientes/clientes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';

require_once DOCUMENT_ROOT . 'app/lib/PHPExcel/Classes/PHPExcel/IOFactory.php';

class ClientesAjax
{
    public $cts_id;
    public function ajaxAgregarClientes()
    {
        $res = ClientesControlador::ctrAgregarClientes();
        echo json_encode($res, true);
    }

    public function ajaxConsultarCliente()
    {
        $res = ClientesModelo::mdlMostrarClientes($this->cts_id);
        echo json_encode($res, true);
    }
    public function ajaxImportarClientes()
    {

        $respuesta = ClientesControlador::ctrImportarcLIEExcel();
        echo json_encode($respuesta, true);
    }
}

if (isset($_POST['btnNewClientAdd'])) {
    $agregarClientes = new ClientesAjax();
    $agregarClientes->ajaxAgregarClientes();
}
if (isset($_POST['btnImportarClientes'])) {
    $impotarProductos = new ClientesAjax();
    $impotarProductos->ajaxImportarClientes();
}
if (isset($_POST['btnVerCliente'])) {
    $consultarCliente = new ClientesAjax();
    $consultarCliente->cts_id = $_POST['cts_id'];
    $consultarCliente->ajaxConsultarCliente();
}
