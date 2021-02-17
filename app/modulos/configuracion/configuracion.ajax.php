
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 22/11/2020 04:09
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/configuracion/configuracion.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/sucursales/sucursales.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/configuracion/configuracion.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';

require_once DOCUMENT_ROOT . 'app/lib/phpMailer/Exception.php';
require_once DOCUMENT_ROOT . 'app/lib/phpMailer/PHPMailer.php';
require_once DOCUMENT_ROOT . 'app/lib/phpMailer/SMTP.php';

class ConfiguracionAjax
{
    public function ajaxAccesoSucursalUsr()
    {
        $res = ConfiguracionControlador::ctrAccesoSucursalUsr();
        echo json_encode($res, true);
    }
}

if (isset($_POST['btnAccesoSucursalUsr'])) {
    $acceso = new ConfiguracionAjax();
    $acceso->ajaxAccesoSucursalUsr();
}
