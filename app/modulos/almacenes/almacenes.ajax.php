
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/02/2021 12:50
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

session_start();
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/almacenes/almacenes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/almacenes/almacenes.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class AlmacenesAjax
{

    public $tps_numero_traspaso;

    public function ajaxMerncanciaDevuelta()
    {
        $res = AlmacenesControlador::ctrMerncanciaDevuelta($this->tps_numero_traspaso);
        echo json_encode($res, true);
    }
    public function ajaxEliminarAlmacen()
    {
        $res = AlmacenesControlador::ctrEliminarAlmacenes();
        echo json_encode($res, true);
    }
    public function ajaxAgregarDetallePreRegistro()
    {
        $res = AlmacenesModelo::mdlAgregarDetallePreRegistro($_POST);
        echo json_encode($res, true);
    }
    public function ajaxMostrarDetallePreRegistro()
    {
        $res = AlmacenesModelo::mdlMostrarDetallePreRegistro($_POST['dprm_id_prm']);
        echo json_encode($res, true);
    }
    public function ajaxEliminarPreRegistro()
    {
        $res = AlmacenesModelo::mdlEliminarPreRegistro($_POST['dprm_id']);
        echo json_encode($res, true);
    }
    public function ajaxActualizarCantidadPreRegistro()
    {
        $res = AlmacenesModelo::mdlActualizarCantidadPreRegistro($_POST);
        echo json_encode($res, true);
    }
    public function ajaxGuardarPreRegistro()
    {
        $res = AlmacenesControlador::ctrGuardarPreRegistro();
        echo json_encode($res, true);
    }
    public function ajaxAprobarPreRegistro()
    {
        $res = AlmacenesControlador::ctrAprobarPreRegistro();
        echo json_encode($res, true);
    }
}

if (isset($_POST['btnSincronizarInventario'])) {
    $consultarMerncanciaDevuelta = new AlmacenesAjax();
    $consultarMerncanciaDevuelta->tps_numero_traspaso = $_POST['tps_num_traspaso'];
    $consultarMerncanciaDevuelta->ajaxMerncanciaDevuelta();
}
if (isset($_POST['btnEliminarAlmacen'])) {
    $eliminarAlmacen = new AlmacenesAjax();
    $eliminarAlmacen->ajaxEliminarAlmacen();
}
if (isset($_POST['btnAgregarDetallePreRegistro'])) {
    $agregarDetallePreRegistro = new AlmacenesAjax();
    $agregarDetallePreRegistro->ajaxAgregarDetallePreRegistro();
}
if (isset($_POST['btnMostrarDetallePreRegistro'])) {
    $mostrarDetallePreRegistro = new AlmacenesAjax();
    $mostrarDetallePreRegistro->ajaxMostrarDetallePreRegistro();
}
if (isset($_POST['btnEliminarPreRegistro'])) {
    $eliminarPreRegistro = new AlmacenesAjax();
    $eliminarPreRegistro->ajaxEliminarPreRegistro();
}
if (isset($_POST['btnActualizarPreRegistro'])) {
    $actualizarCantidadPreRegistro = new AlmacenesAjax();
    $actualizarCantidadPreRegistro->ajaxActualizarCantidadPreRegistro();
}
if (isset($_POST['btnGuardarPreRegistro'])) {
    $guardarPreRegistro = new AlmacenesAjax();
    $guardarPreRegistro->ajaxGuardarPreRegistro();
}
if (isset($_POST['btnAprobarPreRegistro'])) {
    $aprobarPreRegistro = new AlmacenesAjax();
    $aprobarPreRegistro->ajaxAprobarPreRegistro();
}
