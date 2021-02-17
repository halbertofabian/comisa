
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 28/10/2020 14:27
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/categorias/categorias.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/categorias/categorias.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class CategoriasAjax
{
    public $ctg_nombre;
    public function listarCategoriasAJAX()
    {
        $res = CategoriasModelo::mdlMostrarCategorias($this->ctg_nombre);
        echo json_encode($res, true);
    }
    public function agregarCategoriaAjax()
    {
        $_POST['ctg_fecha_creacion'] = FECHA;

        $res = CategoriasModelo::mdlAgregarCategorias($_POST);
        echo json_encode($res, true);
    }
    public function listarCategoriaNombreAJAX()
    {
        $res = CategoriasModelo::mdlMostrarCategorias($this->ctg_nombre);
        echo json_encode($res, true);
    }
}

if (isset($_POST['btnListarCategoria'])) {
    $listarCategoria = new CategoriasAjax();
    $listarCategoria ->ctg_nombre = $_POST['ctg_nombre'];
    $listarCategoria->listarCategoriasAJAX();
}
if (isset($_POST['btnAgregarCategoria'])) {
    $agregarCategoria = new CategoriasAjax();
    $agregarCategoria->agregarCategoriaAjax();
}

