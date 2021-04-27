
<?php

/**
 *  Desarrollador: 
 *  Fecha de creación: 13/04/2021 11:42
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/comisiones/comisiones.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/sueldos/sueldos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/comisiones/comisiones.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class ComisionesAjax
{
    public function ajaxMostrarInfoCobranza()
    {
        $cobros = ComisionesModelo::mdlMostrarInfoCobranzaComisiones($_POST['id_usr'], $_POST['date_inicio'], $_POST['date_fin']);
        $gastos = ComisionesModelo::mdlMostrarGastos($_POST['id_usr'], $_POST['date_inicio'], $_POST['date_fin']);
        $deuda_ext = UsuariosModelo::mdlConsultarDeudaExterna($_POST['id_usr']);
        $respuesta = array(
            'cobro' => $cobros,
            'debe' => $gastos,
            'deuda_ext' => $deuda_ext
        );
        echo json_encode($respuesta, true);
    }

    public function ajaxCalcularComisiones()
    {
        $respuesta = ComisionesControlador::ctrCalcularComisiones();
        echo json_encode($respuesta, true);
    }
}

if (isset($_POST['btnRepComision'])) {
    $mostrarCobranza_Comision = new ComisionesAjax();
    $mostrarCobranza_Comision->ajaxMostrarInfoCobranza();
}

if (isset($_POST['btnCalcularComisiones'])) {
    $calcularComision = new ComisionesAjax();
    $calcularComision->ajaxCalcularComisiones();
}
