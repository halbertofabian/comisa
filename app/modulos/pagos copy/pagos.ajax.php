
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 12:00
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

session_start();
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class PagosAjax

{
    public $usr_matricula;
    public $fpg_id;
    public $ppg_concepto;
    public function ajaxBuscarAlumnoPagos()
    {

        $res = PagosControlador::ctrMostrarPagosAlumnos();
        echo json_encode($res, true);
    }
    public function ajaxBuscarFichaPagos()
    {

        $res = PagosControlador::ctrMostrarDatosFichaPago();
        echo json_encode($res, true);
    }

    public function ajaxBuscarAbonoConcepto()
    {

        $res = PagosModelo::mdlMostrarAbonosAlumnoConcepto($this->fpg_id, $this->ppg_concepto);
        echo json_encode($res, true);
    }

    public function ajaxRegistarAbono()
    {

        $res = PagosControlador::ctrAgregarPagos();
        echo json_encode($res, true);
    }
}

if (isset($_POST['btnRevisarPagos'])) {
    $revisarPgos = new PagosAjax();
    $revisarPgos->usr_matricula = $_POST['usr_matricula'];
    $revisarPgos->ajaxBuscarAlumnoPagos();
}

if (isset($_POST['btnBuscarFichaPago'])) {
    $revisarPgos = new PagosAjax();
    $revisarPgos->fpg_id = $_POST['fpg_id'];
    $revisarPgos->ajaxBuscarFichaPagos();
}


if (isset($_POST['btnBuscarAbonoConcepto'])) {
    $revisarPgos = new PagosAjax();
    $revisarPgos->fpg_id = $_POST['fpg_id'];
    $revisarPgos->ppg_concepto = $_POST['ppg_concepto'];
    $revisarPgos->ajaxBuscarAbonoConcepto();
}


if (isset($_POST['btnRegistrarAbono'])) {
    $revisarPgos = new PagosAjax();
    $revisarPgos->ajaxRegistarAbono();
}
