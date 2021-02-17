
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 17/01/2021 22:11
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/informes/informes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/informes/informes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class InformesAjax
{
    public function ajaxInform_1()
    {
        $res = InformesControlador::ctrInforme_1(array(
            'ifs_sucursal' => $_SESSION['session_suc']['scl_id'],
            'ifs_fecha_inicio' => $_POST['ifs_fecha_inicio'],
            'ifs_fecha_fin' => $_POST['ifs_fecha_fin'],
            'ifs_concepto' => $_POST['ifs_concepto'],
        ));

        echo json_encode($res, true);
    }
}

if (isset($_POST['btnFiltrarInforme_1'])) {
    $informe_1 = new InformesAjax();
    $informe_1->ajaxInform_1();
}
