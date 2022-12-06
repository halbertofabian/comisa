
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/01/2021 19:49
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/ingresos/ingresos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.modelo.php';

require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class CajasAjax
{
    public $usr_caja;
    public $cja_id_caja;
    public function ajaxCerrarCaja()
    {
        $res = CajasControlador::ctrCerrarCaja();
        echo json_encode($res, true);
    }
    public function ajaxMostrarCajasById()
    {
        $res = CajasModelo::mdlMostrarCajasById($this->usr_caja);
        echo json_encode($res, true);
    }

    public function ajaxMostrarCajasOpenById(){

        $res = CajasModelo::mdlConsultarCajaById($this->cja_id_caja);
        echo json_encode($res, true);
        
    }

    public function ajaxEliminarCaja (){
        $res = CajasModelo::mdlEliminarCaja($_POST['cja_id_caja']);
        echo json_encode($res, true);
    }
    public function ajaxCajaCheckCobrador (){
        $res = CajasModelo::mdlCheckCobrador($_POST['cja_id_caja'], $_POST['cja_cobrador_check']);
        echo json_encode($res, true);
    }
    
    
}

if (isset($_POST['btnCerrarCaja'])) {
    $cerrarCaja = new CajasAjax();
    $cerrarCaja->ajaxCerrarCaja();
}

if (isset($_POST['btnBuscarCajaCorte'])) {
    $consultarCaja = new CajasAjax();
    $consultarCaja -> usr_caja = $_POST['usr_caja'];
    $consultarCaja -> ajaxMostrarCajasById();

}


if (isset($_POST['btnBuscarCajaSaldo'])) {
    $consultarCaja = new CajasAjax();
    $consultarCaja -> cja_id_caja = $_POST['cja_id_caja'];
    $consultarCaja -> ajaxMostrarCajasOpenById();

}

if (isset($_POST['btnDeleteCaja'])) {
    $btnEliminarCaja = new CajasAjax();
    $btnEliminarCaja -> ajaxEliminarCaja();

}

if (isset($_POST['btncheckedCajaCobrador'])) {
    $btnCheckCobrador = new CajasAjax();
    $btnCheckCobrador -> ajaxCajaCheckCobrador();

}




