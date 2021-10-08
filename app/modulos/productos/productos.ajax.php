<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 20/10/2020 21:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
require_once DOCUMENT_ROOT . 'app/lib/PHPExcel/Classes/PHPExcel/IOFactory.php';

class ProductosAjax
{
    public $pdt_nombre;

    public function ajaxImportarProductos()
    {

        $respuesta = ProductosControlador::ctrImportarProductosExcel();
        echo json_encode($respuesta, true);
    }
    public function ajaxmostrarProductosAlmacenid()
    {

        $respuesta = ProductosModelo::mdlMostrarProductosAlmId($_POST);
        echo json_encode($respuesta, true);
    }
    public function ajaxEliminarProducto()
    {

        $respuesta = ProductosModelo::mdlEliminarProductos($_POST);
        echo json_encode($respuesta, true);
    }
    public function ajaxBuscarProductos()
    {
        $res = ProductosModelo::mdlAutocompleteProductos($this->pdt_nombre);
        echo json_encode($res, true);
    }
    public function ajaxGuardarSeries()
    {
        $res = ProductosControlador::ctrAgregarSeries();
        echo json_encode($res, true);
    }
}


if (isset($_POST['btnImportarProductos'])) {
    $impotarProductos = new ProductosAjax();
    $impotarProductos->ajaxImportarProductos();
}
if (isset($_POST['selectAlmacen'])) {
    $mostrarProductos = new ProductosAjax();
    $mostrarProductos->ajaxmostrarProductosAlmacenid();
}
if (isset($_POST['btnEliminarProducto'])) {
    $eliminarProducto = new ProductosAjax();
    $eliminarProducto->ajaxEliminarProducto();
}
if (isset($_GET['term'])) {
    $buscarProductos = new ProductosAjax();
    $buscarProductos->pdt_nombre = $_GET['term'];
    $buscarProductos->ajaxBuscarProductos();
}
if (isset($_POST['btnGuardarSeries'])) {
    $generarSeries = new ProductosAjax();
    $generarSeries->ajaxGuardarSeries();
}