
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

require_once DOCUMENT_ROOT . 'app/modulos/cuentas/cuentas.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cuentas/cuentas.controlador.php';

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

    public function ajaxListarIngresosPaginados()
    {
        $draw = isset($_POST['draw']) ? (int) $_POST['draw'] : 0;

        if (!isset($_SESSION['session_usr']['usr_nombre'], $_SESSION['session_suc']['scl_id'])) {
            echo json_encode(array(
                'draw' => $draw,
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => array()
            ));
            return;
        }

        $inicio = isset($_POST['start']) ? (int) $_POST['start'] : 0;
        $cantidad = isset($_POST['length']) ? (int) $_POST['length'] : 10;
        $busqueda = isset($_POST['search']['value']) ? trim($_POST['search']['value']) : '';
        $fechaInicio = isset($_POST['fecha_inicio']) ? trim($_POST['fecha_inicio']) : '';
        $fechaFin = isset($_POST['fecha_fin']) ? trim($_POST['fecha_fin']) : '';

        $resultado = IngresosModelo::mdlConsultarIngresosPaginados(
            $_SESSION['session_usr']['usr_nombre'],
            $inicio,
            $cantidad,
            $busqueda,
            $fechaInicio,
            $fechaFin
        );

        echo json_encode(array(
            'draw' => $draw,
            'recordsTotal' => $resultado['total'],
            'recordsFiltered' => $resultado['filtrados'],
            'data' => $resultado['datos']
        ));
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

    public function ajaxMostrarResumenIngresos()
    {
        if ($_POST['igs_usuario_responsable'] > 0 ) {

            $respuesta = IngresosModelo::mdlMostrarResumenIngresosId($_POST);
        } else {
            $respuesta = IngresosModelo::mdlMostrarResumenIngresosAll($_POST);
        }
        echo json_encode($respuesta, true);
    }
    public function ajaxEditaCpsIngresos()
    {
        $res = IngresosControlador::ctrActualizarIngresos();
        echo json_encode($res, true);
    }
}


if (isset($_POST['btnEliminarIngreso'])) {
    $eliminarIngreso = new IngresosAjax();
    $eliminarIngreso->ajaxEliminarIngreso();
}

if (isset($_POST['listarIngresosPaginados'])) {
    $listarIngresos = new IngresosAjax();
    $listarIngresos->ajaxListarIngresosPaginados();
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

if (isset($_POST['btnMostrarIngresosUsr'])) {
    $MostrarResumenIngresos = new IngresosAjax();
    $MostrarResumenIngresos->ajaxMostrarResumenIngresos();
}

if (isset($_POST['editarinfIgs'])) {
    $editacamposdeIngresos = new IngresosAjax();
    $editacamposdeIngresos->ajaxEditaCpsIngresos();
}
