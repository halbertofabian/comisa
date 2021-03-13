
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 12/03/2021 10:42
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/fichas/fichas.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/fichas/fichas.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class FichasAjax
{
    public function ajaxConsultarFichasByUsr()
    {
        if ($_POST['fch_fecha_inicio'] != "" && $_POST['fch_fecha_fin']) {

            
            
        } else {
            $res = FichasModelo::mdlConsultarFichaByUsuario($_POST['fch_usr'],'COBRANZA');
            echo json_encode($res, true);
        }
    }
}

if (isset($_POST['buscarFichaByUsr'])) {
    $buscar = new FichasAjax();
    $buscar->ajaxConsultarFichasByUsr();
}
