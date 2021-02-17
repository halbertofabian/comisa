
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 16/02/2021 10:36
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/traspasos/traspasos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/traspasos/traspasos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class TraspasosAjax
{
    public function ajaxMostrarProductosAlamacen()
    {
        $respuesta = ProductosModelo::mdlMostrarProductosAlamacen($_POST['tps_ams_id_origen']);
        echo json_encode($respuesta, true);
    }
}

if (isset($_POST['btnBuscarProductosAlmacenOrigin'])) {
    $mostrarProductos = new TraspasosAjax();
    $mostrarProductos->ajaxMostrarProductosAlamacen();
}
