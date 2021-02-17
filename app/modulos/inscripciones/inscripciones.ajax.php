
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 10:46
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/inscripciones/inscripciones.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/inscripciones/inscripciones.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class InscripcionesAjax
{
    public function ajaxCrearInscripcion()
    {
        $res = InscripcionesControlador::ctrAgregarInscripciones();
        echo json_encode($res, true);
    }
}

if (isset($_POST['btnInscribirAlumnos'])) {
    $crearInscripcion = new InscripcionesAjax();
    $crearInscripcion->ajaxCrearInscripcion();
}
