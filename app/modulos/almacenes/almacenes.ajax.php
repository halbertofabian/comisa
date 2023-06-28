
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

require_once DOCUMENT_ROOT . 'app/modulos/cobranza/cobranza.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cobranza/cobranza.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.controlador.php';
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
        $res = AlmacenesControlador::ctrAsignarAlmacenes($_POST);

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
    public function ajaxAgregarInventarioFinal()
    {
        $res = AlmacenesModelo::mdlActualizarInventarioFinalUSR($_POST);
        echo json_encode($res, true);
    }
    public function ajaxCerrarInventario()
    {
        $res = AlmacenesControlador::ctrCerrarInventario();
        echo json_encode($res, true);
    }
    public function ajaxEmpezarInventario()
    {
        $res = AlmacenesControlador::ctrEmpezarInventario();
        echo json_encode($res, true);
    }
    public function ajaxMostrarInventario()
    {
        $res = AlmacenesModelo::mdlMostrarInventario();
        echo json_encode($res, true);
    }
    public function ajaxGenerarCodigoSerie()
    {
        $res = AlmacenesControlador::ctrGenerarCodigoSerie();
        echo json_encode($res, true);
    }
    public function ajaxEliminarSerie()
    {
        $res = AlmacenesControlador::ctrEliminarSerie();
        echo json_encode($res, true);
    }
    public function ajaxObtenerAlmacenByID()
    {
        $res = AlmacenesModelo::mdlMostrarAlmacenByID($_POST['ams_id']);
        echo json_encode($res, true);
    }
    public function ajaxMostrarAlmacenesVM()
    {
        $res = AlmacenesModelo::mdlMostrarAlmacenesTipoVM();
        echo json_encode($res, true);
    }
    public function ajaxCambiarProductoContrato()
    {
        $res = AlmacenesControlador::ctrCambiarProductosContrato($_POST);

        echo json_encode($res, true);
    }
    public function ajaxBuscarProductoAutocomplete()
    {
        $respuesta = AlmacenesModelo::mdlMostrarSeriesByAutocomplete($_POST['auto_complete_producto2']);

        echo json_encode($respuesta, true);
    }
    public function ajaxGenerarTrasladoExterno()
    {
        $res = AlmacenesControlador::ctrGenerarTrasladoExterno();
        echo json_encode($res, true);
    }

    public function AjaxSerieCompleta()
    {
        $res = AlmacenesModelo::mdlMostrarSeriesBySerieCompleta($_POST['auto_complete_serie']);
        echo json_encode($res, true);
    }

    public function ajaxBuscarProductoAutocompleteBitacora()
    {
        $respuesta = AlmacenesModelo::mdlMostrarSeriesByAutocompleteBitacora($_POST['auto_complete_bitacora']);

        echo json_encode($respuesta, true);
    }
    public function ajaxMostrarBitacora()
    {
        $res = AlmacenesControlador::ctrMostrarBitacora();
        print json_encode($res, JSON_UNESCAPED_UNICODE);
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
if (isset($_POST['btnAgregarInventario'])) {
    $agregarInventarioFinal = new AlmacenesAjax();
    $agregarInventarioFinal->ajaxAgregarInventarioFinal();
}
if (isset($_POST['btnCerrarInventario'])) {
    $cerarInventario = new AlmacenesAjax();
    $cerarInventario->ajaxCerrarInventario();
}
if (isset($_POST['btnEmpezarInventario'])) {
    $empezarInventario = new AlmacenesAjax();
    $empezarInventario->ajaxEmpezarInventario();
}
if (isset($_POST['btnMostrarInventario'])) {
    $mostrarInventario = new AlmacenesAjax();
    $mostrarInventario->ajaxMostrarInventario();
}
if (isset($_POST['btnGenerarCodigoSerie'])) {
    $generarCodigo = new AlmacenesAjax();
    $generarCodigo->ajaxGenerarCodigoSerie();
}
if (isset($_POST['btnEliminarSerie'])) {
    $eliminarSerie = new AlmacenesAjax();
    $eliminarSerie->ajaxEliminarSerie();
}
if (isset($_POST['btnObtenerAlmacenByID'])) {
    $obtenerAlmacen = new AlmacenesAjax();
    $obtenerAlmacen->ajaxObtenerAlmacenByID();
}
if (isset($_POST['btnMostrarAlmacenesVM'])) {
    $mostrarAlmacenesVM = new AlmacenesAjax();
    $mostrarAlmacenesVM->ajaxMostrarAlmacenesVM();
}
if (isset($_POST['btnCambiarProductoContrato'])) {
    $cambiarProducto = new AlmacenesAjax();
    $cambiarProducto->ajaxCambiarProductoContrato();
}
if (isset($_POST['auto_complete_producto2'])) {
    $obtenerProducto2 = new AlmacenesAjax();
    $obtenerProducto2->ajaxBuscarProductoAutocomplete();
}
if (isset($_POST['btnGenerarTraslado'])) {
    $generarTrasladoExterno = new AlmacenesAjax();
    $generarTrasladoExterno->ajaxGenerarTrasladoExterno();
}
if (isset($_POST['btnSerieCompleta'])) {
    $btnSerieCompleta = new AlmacenesAjax();
    $btnSerieCompleta->AjaxSerieCompleta();
}
if (isset($_POST['auto_complete_bitacora'])) {
    $obtenerProductoBitacora = new AlmacenesAjax();
    $obtenerProductoBitacora->ajaxBuscarProductoAutocompleteBitacora();
}
if (isset($_POST['btnMostrarBitacora'])) {
    $mostrarBitacora = new AlmacenesAjax();
    $mostrarBitacora->ajaxMostrarBitacora();
}
