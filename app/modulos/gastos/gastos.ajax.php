<?php

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class GastosAjax
{
    public $gts_nombre;
    public $gts_presupuesto;
    public $tgts_id;
    public $gts_id;

    

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