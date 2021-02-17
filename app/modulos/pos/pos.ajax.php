
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 29/10/2020 19:53
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/pos/pos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/pos/pos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class POSAjax
{
    public function empezarVentaAjax()
    {
        $res = POSControlador::ctrEmpezarVenta();
        echo json_encode($res, true);
    }

    public function emarcarProductosAjax()
    {
        $res = POSControlador::ctrMarcarProducto();
        echo json_encode($res, true);
    }
}
if (isset($_POST['btnEmpezarVenta'])) {
    $empezarVenta = new POSAjax();
    $empezarVenta->empezarVentaAjax();
}

if (isset($_POST['btnMarcarProducto'])) {
    $marcarProductos = new POSAjax();
    $marcarProductos->emarcarProductosAjax();
}
