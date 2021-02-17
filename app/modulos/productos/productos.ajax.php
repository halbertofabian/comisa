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

    public function ajaxImportarProductos()
    {

        $respuesta = ProductosControlador::ctrImportarProductosExcel();
        echo json_encode($respuesta, true);
    }
}


if (isset($_POST['btnImportarProductos'])) {
    $impotarProductos = new ProductosAjax();
    $impotarProductos->ajaxImportarProductos();
}
