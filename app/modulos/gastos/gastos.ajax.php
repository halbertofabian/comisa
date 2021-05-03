<?php

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';


require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';


require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class GastosAjax
{
    public $gts_nombre;
    public $gts_presupuesto;
    public $tgts_id;
    public $gts_id;
    public $tgts_id_corte;
    public $usr_id;



    public function ajaxCrearCategoria()
    {
        $categoria = array(
            'gts_nombre' => $this->gts_nombre,
            'gts_presupuesto' => $this->gts_presupuesto
        );

        $res = GastosControlador::ctrCrearCategoria($categoria);

        echo json_encode($res);
    }
    public function ajaxListarCategorias()
    {

        $res = GastosModelo::mdlConsultarCategorias();

        echo json_encode($res);
    }
    public function ajaxListarGastos()
    {
        $res = GastosModelo::mdlConsultarGastosPorFecha($_POST);
        echo json_encode($res, true);
    }

    public function ajaxEliminarGasto()
    {
        $eliminarGasto = GastosControlador::ctrEliminarGasto($this->tgts_id);
        echo json_encode($eliminarGasto);
    }
    public function ajaxEliminarCategoria()
    {
        $eliminarCategoria = GastosControlador::ctrEliminarCategoria($this->gts_id);
        echo json_encode($eliminarCategoria);
    }

    public function ajaxConsultarGastosByCaja()
    {
        if ($_SESSION['session_usr']['usr_id'] == $this->usr_id) {
            $res = GastosModelo::mdlConsultarGastoByCaja2($this->tgts_id_corte);
        } else {
            $res = GastosModelo::mdlConsultarGastoByCaja($this->tgts_id_corte);
        }
        echo json_encode($res, true);
    }

    public function ajaxAgregarGasto()
    {
        $res = GastosControlador::ctrCrearGasto();
        echo json_encode($res, true);
    }

    public function ajaxRegistrarGastoGasVendedor()
    {
        $res = GastosControlador::ctrAgregarGastoGasVendedor();
        echo json_encode($res, true);
    }

    public function ajaxMostrarResumenGas()
    {
        if ($_POST['gtsg_usuario_responsableGas'] > 0) {
            $respuesta = GastosModelo::mdlMostrarResumenGas($_POST);
        } else {
            $respuesta = GastosModelo::mdlMostrarResumenGasall($_POST);
        }

        echo json_encode($respuesta, true);
    }

    public function ajaxMostrarResumenGastos()
    {
        if ($_POST['tgts_usuario_responsable'] > 0 && $_POST['tgts_categoria']>0) {

            $respuesta = GastosModelo::mdlMostrarResumenGastosxy($_POST);
        } elseif ($_POST['tgts_usuario_responsable'] > 0) {
            $respuesta = GastosModelo::mdlMostrarResumenGastosx($_POST);
        } elseif ($_POST['tgts_categoria']>0) {
            $respuesta = GastosModelo::mdlMostrarResumenGastosy($_POST);
        } else {
            $respuesta = GastosModelo::mdlMostrarResumenGastosall($_POST);
        }

        echo json_encode($respuesta, true);
    }
}


if (isset($_POST['btnCrearCategoria'])) {
    $crearCategoria = new GastosAjax();
    $crearCategoria->gts_nombre = $_POST['gts_nombre'];
    $crearCategoria->gts_presupuesto = $_POST['gts_presupuesto'];
    $crearCategoria->ajaxCrearCategoria();
}

if (isset($_POST['btnListarCategorias'])) {
    $listarCategorias = new GastosAjax();
    $listarCategorias->ajaxListarCategorias();
}

if (isset($_POST['listarGastos'])) {
    $listarGastos = new GastosAjax();
    $listarGastos->ajaxListarGastos();
}

if (isset($_POST['btnEliminarGasto'])) {
    $eliminarGastos = new GastosAjax();
    $eliminarGastos->tgts_id = $_POST['tgts_id'];
    $eliminarGastos->ajaxEliminarGasto();
}

if (isset($_POST['btnEliminarCategoria'])) {
    $eliminarGastos = new GastosAjax();
    $eliminarGastos->gts_id = $_POST['gts_id'];
    $eliminarGastos->ajaxEliminarCategoria();
}

if (isset($_POST['btnConsultarGastosByCaja'])) {
    $consutar = new GastosAjax();
    $consutar->tgts_id_corte = $_POST['tgts_id_corte'];
    $consutar->usr_id = $_POST['usr_id'];
    $consutar->ajaxConsultarGastosByCaja();
}



if (isset($_POST['btnGuardarGasto'])) {
    $btnGuardarGasto = new GastosAjax();
    $btnGuardarGasto->ajaxAgregarGasto();
}

if (isset($_POST['btnGuardarGastoGas'])) {

    $guardar = new GastosAjax();
    $guardar->ajaxRegistrarGastoGasVendedor();
}

if (isset($_POST['btnMostrarResumenGas'])) {
    $MostrarResumenGas = new GastosAjax();
    $MostrarResumenGas->ajaxMostrarResumenGas();
}

if (isset($_POST['btnMostrarGastosUsr'])) {
    $MostrarResumenGastos = new GastosAjax();
    $MostrarResumenGastos->ajaxMostrarResumenGastos();
}
