
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

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cupones/cupones.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/cupones/cupones.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class PagosAjax

{
    public $usr_matricula;
    public $fpg_id;
    public $ppg_concepto;
    public $ppg_id;
    public $ppg_ficha_pago;
    public $ppg_ficha_venta;
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

    public function ajaxEmpezarVenta()
    {

        $res = PagosControlador::ctrEmpezarVentaFicha();
        echo json_encode($res, true);
    }
    public function ajaxAgregarCarrito()
    {

        $res = PagosControlador::ctrAgregarCarrito();
        echo json_encode($res, true);
    }
    public function ajaxQuitarCarrito()
    {
        $res = PagosModelo::mdlEliminarRegistroCarrito($this->ppg_id);
        echo json_encode($res, true);
    }

    public function ajaxListarCarrito()
    {
        $res = PagosModelo::mdlMostrarCarritoAlumno($this->ppg_ficha_pago, $this->ppg_ficha_venta);
        echo json_encode($res, true);
    }
    public function ajaxAplicarCupon()
    {
        $res = PagosControlador::ctrAplicarCupon();
        echo json_encode($res, true);
    }

    public function ajaxSolicitudCancelacion()
    {
        $res = PagosControlador::ctrSolicitudCancelacion();
        echo json_encode($res, true);
    }
    public function ajaxCambioEstadoSolicitud()
    {
        $res = PagosControlador::ctrCambioEstadoSolicitud();
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

if (isset($_POST['btnEmpezarFichaVenta'])) {
    $revisarPgos = new PagosAjax();
    $revisarPgos->ajaxEmpezarVenta();
}

if (isset($_POST['btnAgregarPPG'])) {
    $revisarPgos = new PagosAjax();
    $revisarPgos->ajaxAgregarCarrito();
}
if (isset($_POST['btnQuitarElementoCarrito'])) {
    $revisarPgos = new PagosAjax();
    $revisarPgos->ppg_id = $_POST['ppg_id'];
    $revisarPgos->ajaxQuitarCarrito();
}

if (isset($_POST['btnListarCarrito'])) {
    $revisarPgos = new PagosAjax();
    $revisarPgos->ppg_ficha_pago = $_POST['ppg_ficha_pago'];
    $revisarPgos->ppg_ficha_venta = $_POST['ppg_ficha_venta'];
    $revisarPgos->ajaxListarCarrito();
}


if (isset($_POST['btnAplicarCupon'])) {
    $revisarPgos = new PagosAjax();
    $revisarPgos->ajaxAplicarCupon();
}

if (isset($_POST['btnCanelarFichaPago'])) {
    $cancelarFicha = new PagosAjax();
    $cancelarFicha->ajaxSolicitudCancelacion();
}

if (isset($_POST['btnCambioEstadoSolicitud'])) {
    $cancelarFicha = new PagosAjax();
    $cancelarFicha->ajaxCambioEstadoSolicitud();
}

