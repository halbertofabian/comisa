
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 29/03/2021 10:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/prestamos/prestamos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/prestamos/prestamos.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class PrestamosAjax
{
    public function ajaxRegistrarPrestamo()
    {
        $res = PrestamosControlador::ctrAgregarPrestamos();
        echo json_encode($res, true);
    }
}

if (isset($_POST['btnGuardarPrestamos'])) {

    $guardar = new PrestamosAjax();
    $guardar->ajaxRegistrarPrestamo();
}
