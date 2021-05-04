
<?php

/**
 *  Desarrollador: 
 *  Fecha de creación: 04/05/2021 11:16
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/ventas/ventas.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/ventas/ventas.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class VentasAjax
{
    public function ajaxcrearPlantilla()
    {
        $respuesta = VentasControlador::ctrCrearPlantilla();
        echo json_encode($respuesta, true);
    }
}

if (isset($_POST['btn_crear_plantilla'])) {
    $crearPlantilla = new VentasAjax();
    $crearPlantilla->ajaxcrearPlantilla();
}



