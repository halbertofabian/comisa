
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

require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';
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
    public function ajaxBuscarProductoBySerie()
    {
        $respuesta = AlmacenesModelo::mdlMostrarSeriesBySerie($_POST['auto_complete_producto']);

        echo json_encode($respuesta, true);
    }
    public function ajaxAsignarAlmacen()
    {
        $res = AlmacenesControlador::ctrAsignarAlmacenes();

        echo json_encode($res, true);
    }
    public function ajaxAsignarAlmacenTraspaso()
    {
        $res = AlmacenesControlador::ctrAsignarAlmacenesTraspaso();

        echo json_encode($res, true);
    }
    public function ajaxAsignarVendedor()
    {
        $res = AlmacenesModelo::mdlAsignarVendedor($_POST);
        echo json_encode($res, true);
    }
    public function ajaxMostrarAlmacenes()
    {
        $res = AlmacenesControlador::ctrMostrarAlmacenes();
        print json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public function ajaxMostrarProductos()
    {
        $res = AlmacenesModelo::mdlMostrarProductosByAlmacenID($_POST['ams_id']);
        echo json_encode($res, true);
    }
    public function ajaxAsignarAlmacenesContrato()
    {
        $res = AlmacenesControlador::ctrAsignarAlmacenesContrato();

        echo json_encode($res, true);
    }
    public function ajaxQuitarProductoContrato()
    {
        $res = AlmacenesControlador::ctrQuitarProductosContrato($_POST);

        echo json_encode($res, true);
    }
    public function ajaxMostrarAlmacenesByTipo()
    {
        $res = AlmacenesControlador::ctrMostrarAlmacenesByTipo();

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
if (isset($_POST['auto_complete_producto'])) {
    $obtenerProducto = new AlmacenesAjax();
    $obtenerProducto->ajaxBuscarProductoBySerie();
}
if (isset($_POST['btnAsignarAlmacen'])) {
    $asignarAlmacen = new AlmacenesAjax();
    $asignarAlmacen->ajaxAsignarAlmacen();
}
if (isset($_POST['btnAsignarAlmacenTraspaso'])) {
    $asignarAlmacen = new AlmacenesAjax();
    $asignarAlmacen->ajaxAsignarAlmacenTraspaso();
}
if (isset($_POST['btnAsignarVendedor'])) {
    $asignarVendedor = new AlmacenesAjax();
    $asignarVendedor->ajaxAsignarVendedor();
}
if (isset($_POST['btnMostrarAlmacenes'])) {
    $mostrarAlmacenes = new AlmacenesAjax();
    $mostrarAlmacenes->ajaxMostrarAlmacenes();
}
if (isset($_POST['btnMostrarProductos'])) {
    $mostrarProductos = new AlmacenesAjax();
    $mostrarProductos->ajaxMostrarProductos();
}
if (isset($_POST['btnAsignarAlmacenContrato'])) {
    $asignarAlmacenContrato = new AlmacenesAjax();
    $asignarAlmacenContrato->ajaxAsignarAlmacenesContrato();
}
if (isset($_POST['btnQuitarProductoContrato'])) {
    $quitarProducto = new AlmacenesAjax();
    $quitarProducto->ajaxQuitarProductoContrato();
}
if (isset($_POST['btnMostrarAlmacenesByTipo'])) {
    $mostrarAlmacenesTipo = new AlmacenesAjax();
    $mostrarAlmacenesTipo->ajaxMostrarAlmacenesByTipo();
}
