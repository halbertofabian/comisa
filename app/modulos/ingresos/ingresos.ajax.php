
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/11/2020 13:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/ingresos/ingresos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/ingresos/ingresos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class IngresosAjax
{
    public $igs_id_corte;
    public $usr_id;
    public function ajaxEliminarIngreso()
    {
        $res = IngresosControlador::ctrEliminarIngresos();
        echo json_encode($res, true);
    }

    public function ajaxAgregarIngreso()
    {
        $res = IngresosControlador::ctrAgregarIngresos();
        echo json_encode($res, true);
    }
    public function ajaxConsultarIngresosByCaja()

    {
        if ($_SESSION['session_usr']['usr_id'] == $this->usr_id) {
            $res = IngresosModelo::mdlConsultarIngresoByCaja2($this->igs_id_corte);
        } else {
            $res = IngresosModelo::mdlConsultarIngresoByCaja($this->igs_id_corte);
        }
        echo json_encode($res, true);
    }
}


if (isset($_POST['btnEliminarIngreso'])) {
    $eliminarIngreso = new IngresosAjax();
    $eliminarIngreso->ajaxEliminarIngreso();
}

if (isset($_POST['btnConsultarIngresosByCaja'])) {
    $consutar = new IngresosAjax();
    $consutar->igs_id_corte = $_POST['igs_id_corte'];
    $consutar->usr_id = $_POST['usr_id'];
    $consutar->ajaxConsultarIngresosByCaja();
}


if (isset($_POST['btnAgregarIngreso'])) {
    $btnAgregarIngreso = new IngresosAjax();
    $btnAgregarIngreso->ajaxAgregarIngreso();
}
