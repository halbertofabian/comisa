
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/02/2021 12:50
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

session_start();
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/almacenes/almacenes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/almacenes/almacenes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class AlmacenesAjax
{
    
    public $tps_numero_traspaso;

    public function ajaxMerncanciaDevuelta(){
        $res = AlmacenesControlador::ctrMerncanciaDevuelta($this->tps_numero_traspaso);
        echo json_encode($res, true);
    }

}

if(isset($_POST['btnSincronizarInventario'])){
    $consultarMerncanciaDevuelta = new AlmacenesAjax();
    $consultarMerncanciaDevuelta -> tps_numero_traspaso = $_POST['tps_num_traspaso'];
    $consultarMerncanciaDevuelta -> ajaxMerncanciaDevuelta();

}

