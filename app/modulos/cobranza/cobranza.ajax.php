
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 18/08/2021 12:07
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/cobranza/cobranza.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/ingresos/ingresos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/ingresos/ingresos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/cuentas/cuentas.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cuentas/cuentas.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cobranza/cobranza.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/sucursales/sucursales.modelo.php';

require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
require_once DOCUMENT_ROOT . 'app/lib/PHPExcel/Classes/PHPExcel/IOFactory.php';

require_once  DOCUMENT_ROOT . 'app/lib/phpMailer/Exception.php';
require_once  DOCUMENT_ROOT . 'app/lib/phpMailer/PHPMailer.php';
require_once  DOCUMENT_ROOT . 'app/lib/phpMailer/SMTP.php';
class CobranzaAjax
{
    public function ajaxImportarSaldos()
    {
        $respuesta = CobranzaControlador::ctrActualizarFechaR();
        echo json_encode($respuesta, true);
    }
    public function ajaxCancelarPago()
    {
        $respuesta = CobranzaControlador::ctrCancelarPagos();
        echo json_encode($respuesta, true);
    }

    public function ajaxAutorizarPagos()
    {
        $respuesta = CobranzaControlador::ctrProcesarPagoAPIV2($_POST['usr_id'], $_POST['usr_nombre']);
        echo json_encode($respuesta, true);
    }
    public function ajaxAutorizarCobranza()
    {
        $respuesta = CobranzaModelo::mdlActualizarCobranzaAutizo($_POST['usr_id'], $_POST['usr_autorizar_cobranza']);
        echo json_encode($respuesta, true);
    }
    public function ajaxBuscarEnrute()
    {
        $ctr = CobranzaModelo::mdlMostrardatosEnrute($_POST);
        // preArray($ctr);
        // return;
        $cra = CobranzaModelo::mdlMostrarEnture($ctr['ctr_id']);
        echo json_encode(array(
            'ctr' => $ctr,
            'cra' => $cra,
        ), true);
    }

    public function ajaxEnrutarCuenta()
    {
        $respuesta = CobranzaControlador::ctrEnrutarCuenta();
        echo json_encode($respuesta, true);
    }

    public function ajaxMostrarEnrute()
    {
        $respuesta = CobranzaModelo::mdlMostrarCartelera();
        $tabla = ' <table class="table table-striped table-hover tablas" >
        <thead>
            <tr>
                <th>RUTA</th>
                <th># CUENTA</th>
                <th> FECHA PROXIMO DE PAGO</th>
                <th> FECHA  REAGENDADA</th>
                <th> ORDEN </th>
            </tr>
        </thead>
        <tbody>';
        foreach ($respuesta as $key => $cra) {

            $tabla .= '<tr>';
            $tabla .= '<td>' . $cra['ctr_ruta'] . '</td>';
            $tabla .= '<td>' . $cra['ctr_numero_cuenta'] . '</td>';
            $tabla .= '<td>' . fechaCastellano($cra['cra_fecha_cobro']) . '</td>';
            $tabla .= '<td>' . $cra['cra_fecha_reagenda'] . '</td>';
            $tabla .= '<td>' . $cra['cra_orden'] . '</td>';
            $tabla .= '</tr>';
        }
        $tabla .= '</tbody>
        </table>';
        echo $tabla;
    }
    public function ajaxEstadoCuenta()
    {
        $respuesta = CobranzaModelo::mdlConsultarEstadoCuenta($_POST['ec_ruta'], $_POST['ec_cuenta']);
        echo json_encode($respuesta, true);
    }
    public function ajaxEstadoCuenta2()
    {
        $respuesta = CobranzaModelo::mdlConsultarEstadoCuenta2($_POST['ctr_id']);
        echo json_encode($respuesta, true);
    }
    public function ajaxEstadoCuenta3()
    {
        $respuesta = CobranzaModelo::mdlConsultarEstadoCuenta3($_POST['cra_id']);
        echo json_encode($respuesta, true);
    }
    public function ajaxActualizarSaldos()
    {
        $respuesta = CobranzaControlador::ctrActualizarSaldos();
        echo json_encode($respuesta, true);
    }

    public function ajaxBuscarPagos()
    {

        $respuesta = CobranzaControlador::ctrBuscarCobro();
        echo json_encode($respuesta, true);
    }

    public function ajaxListarStatusClientes()
    {
        $etiquetas = AppControlador::listarEtiquetas();
        // preArray($etiquetas);
        $res = array();
        foreach ($etiquetas as $key => $etq) {
            $contador = CobranzaModelo::mdlContarEtiqueta($etq['etiqueta'], $_POST['ctr_ruta']);
            array_push($res, array(
                'data' => $etq,
                'count' => $contador['contador']
            ));
        }
        echo json_encode($res, true);
    }

    public function ajaxMostrarCuentasStatus()
    {
        $respuesta = CobranzaModelo::mdlMostrarCarteleraContratos($_POST['cra_status'], $_POST['ctr_ruta']);
        $array_cuentas = array();
        foreach ($respuesta as $cta) {
            $coordenadas = explode("|", $cta['clts_coordenadas']);
           
            array_push($array_cuentas, array(
                'ctr_ruta' => $cta['ctr_ruta'],
                'ctr_numero_cuenta' => $cta['ctr_numero_cuenta'],
                'ctr_cliente' => $cta['ctr_cliente'],
                'clts_domicilio' => $cta['clts_domicilio'],
                'clts_col' => $cta['clts_col'],
                'clts_coordenadas' => $coordenadas[0],
                'ctr_saldo_actual' => $cta['ctr_saldo_actual'],
                'cra_fecha_cobro' => $cta['cra_fecha_cobro'],
                'cra_fecha_reagenda' => $cta['cra_fecha_reagenda'],
                'cra_orden' => $cta['cra_orden'],
            ));
            # code...
        }
        print json_encode($array_cuentas, JSON_UNESCAPED_UNICODE);
        // echo json_encode($respuesta, true);
    }
    public function ajaxAsignarCuentaBanco()
    {
        // $respuesta = CobranzaControlador::ctrBuscarCobro();
        $respuesta = CobranzaModelo::mdlAgregarCuentaBanco($_POST);
        echo json_encode($respuesta, true);
    }
    public function ajaxSolicitarCancelacion()
    {
        // $respuesta = CobranzaControlador::ctrBuscarCobro();
        $respuesta = CobranzaControlador::ctrSolicitarCancelacionAbono();
        echo json_encode($respuesta, true);
    }
    public function ajaxBuscarCodigoCancelacion()
    {
        // $respuesta = CobranzaControlador::ctrBuscarCobro();
        $respuesta = CobranzaModelo::mdlObtenerAbonoByID($_POST['abs_id']);
        echo json_encode($respuesta, true);
    }
    public function ajaxVerificarCancelacion()
    {
        // $respuesta = CobranzaControlador::ctrBuscarCobro();
        $respuesta = CobranzaControlador::ctrVerificarCancelacionAbono();
        echo json_encode($respuesta, true);
    }
    public function ajaxHistorialFicha()
    {
        $respuesta = CobranzaControlador::ctrHistorialFichas();
        // echo json_encode($respuesta, true);
        print json_encode($respuesta, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX

    }
    public function ajaxAplicarDesto()
    {
        // $respuesta = CobranzaControlador::ctrBuscarCobro();
        $respuesta = CobranzaControlador::ctrSolicitarDescuento();
        echo json_encode($respuesta, true);
    }
    public function ajaxAprobarDesto()
    {
        // $respuesta = CobranzaControlador::ctrBuscarCobro();
        $respuesta = CobranzaControlador::ctrAprobarescuento($_POST['abs_id'], $_POST['abs_codigo']);
        echo json_encode($respuesta, true);
    }

    public function ajaxCodigoRetiro()
    {
        $respuesta = CobranzaControlador::ctrCodigoRetiro();
        echo json_encode($respuesta, true);
    }
    public function ajaxAplicarCodigoRetiro()
    {
        $respuesta = CobranzaControlador::ctrAplicarCodigoRetiro();
        echo json_encode($respuesta, true);
    }
    public function ajaxConsultarFichasByAnio()
    {
        $respuesta = CobranzaModelo::mdlConsultarFichasByAnio($_POST['fcbz_ano']);
        echo json_encode($respuesta, true);
    }
    public function ajaxConsultarRendimiento()
    {
        $respuesta = CobranzaModelo::mdlConsultarRendimientoFiltro($_POST['rto_ruta'], $_POST['fcbz_id']);
        echo json_encode($respuesta, true);
    }
    public function ajaxConsultarRendimientoV2()
    {
        $respuesta = CobranzaControlador::ctrRedndimientoV2($_POST['fcbz_id']);
        echo json_encode($respuesta, true);
    }
    public function ajaxConsultarRutasRendimiento()
    {
        $respuesta = CobranzaModelo::mdlConsultarRutasRto($_POST['fcbz_id']);
        echo json_encode($respuesta, true);
    }
} //Aqui termina la clase

if (isset($_POST['btnImportarSaldos'])) {
    $importarSaldos = new CobranzaAjax();
    $importarSaldos->ajaxImportarSaldos();
}

if (isset($_POST['btnCancelarPago'])) {
    $cancelarPago = new CobranzaAjax();
    $cancelarPago->ajaxCancelarPago();
}

if (isset($_POST['btnAutorizarPagos'])) {
    $btnAutorizar = new CobranzaAjax();
    $btnAutorizar->ajaxAutorizarPagos();
}

if (isset($_POST['btnDenegarCobro'])) {
    $btnAutorizarCobranza = new CobranzaAjax();
    $btnAutorizarCobranza->ajaxAutorizarCobranza();
}

if (isset($_POST['btnBuscarEnrute'])) {
    $btnBuscarEnruta = new CobranzaAjax();
    $btnBuscarEnruta->ajaxBuscarEnrute();
}
if (isset($_POST['formEnrutarCuenta'])) {
    $btnEnrutarCuenta = new CobranzaAjax();
    $btnEnrutarCuenta->ajaxEnrutarCuenta();
}

if (isset($_POST['btnMostrarEnrute'])) {
    $btnBuscarEnrute = new CobranzaAjax();
    $btnBuscarEnrute->ajaxMostrarEnrute();
}
if (isset($_POST['btn_consultar_cuenta'])) {
    $btnBuscarEstadoCuenta = new CobranzaAjax();
    $btnBuscarEstadoCuenta->ajaxEstadoCuenta();
}
if (isset($_POST['btn_consultar_cuenta2'])) {
    $btnBuscarEstadoCuenta2 = new CobranzaAjax();
    $btnBuscarEstadoCuenta2->ajaxEstadoCuenta2();
}
if (isset($_POST['btn_consultar_cuenta3'])) {
    $btnBuscarEstadoCuenta3 = new CobranzaAjax();
    $btnBuscarEstadoCuenta3->ajaxEstadoCuenta3();
}
if (isset($_POST['btnActualizarSaldos'])) {
    $actualizarSaldos = new CobranzaAjax();
    $actualizarSaldos->ajaxActualizarSaldos();
}

if (isset($_POST['btnConsultarPagos'])) {
    $consultarPagos = new CobranzaAjax();
    $consultarPagos->ajaxBuscarPagos();
}

if (isset($_POST['btnListarStatus'])) {
    $btnListarStatus = new CobranzaAjax();
    $btnListarStatus->ajaxListarStatusClientes();
}

if (isset($_POST['btnMostrarCuentasStatus'])) {
    $btnMostrarCuentasStatus = new CobranzaAjax();
    $btnMostrarCuentasStatus->ajaxMostrarCuentasStatus();
}

if (isset($_POST['btnAsignarCuentaBanco'])) {
    $btnAsignarCuentaBanco = new CobranzaAjax();
    $btnAsignarCuentaBanco->ajaxAsignarCuentaBanco();
}
if (isset($_POST['btnSolicitar'])) {
    $btnSolicitar = new CobranzaAjax();
    $btnSolicitar->ajaxSolicitarCancelacion();
}
if (isset($_POST['btnBuscarCodigo'])) {
    $btnBuscarCodigo = new CobranzaAjax();
    $btnBuscarCodigo->ajaxBuscarCodigoCancelacion();
}
if (isset($_POST['btnVerificar'])) {
    $btnVerificarCodigo = new CobranzaAjax();
    $btnVerificarCodigo->ajaxVerificarCancelacion();
}

if (isset($_POST['btnMostrarHistorialTable'])) {
    $btnMostrarHistorialTable = new CobranzaAjax();
    $btnMostrarHistorialTable->ajaxHistorialFicha();
}
if (isset($_POST['btnAplicarDesto'])) {
    $btnAplicarDesto = new CobranzaAjax();
    $btnAplicarDesto->ajaxAplicarDesto();
}
if (isset($_POST['btnAprobarDescuento'])) {
    $btnAprobarDesto = new CobranzaAjax();
    $btnAprobarDesto->ajaxAprobarDesto();
}
if (isset($_POST['btnCodigoRetiro'])) {
    $btnAprobarDesto = new CobranzaAjax();
    $btnAprobarDesto->ajaxCodigoRetiro();
}
if (isset($_POST['btnAplicarCodigoRetiro'])) {
    $btnAprobarDesto = new CobranzaAjax();
    $btnAprobarDesto->ajaxAplicarCodigoRetiro();
}


if (isset($_POST['btnConsultarFichasByAnio'])) {
    $btnConsultarFichasByAnio = new CobranzaAjax();
    $btnConsultarFichasByAnio->ajaxConsultarFichasByAnio();
}
if (isset($_POST['btnConsultarRendimiento'])) {
    $btnConsultarRendimiento = new CobranzaAjax();
    $btnConsultarRendimiento->ajaxConsultarRendimiento();
}
if (isset($_POST['btnConsultarRendimientoV2'])) {
    $btnConsultarRendimientoV2 = new CobranzaAjax();
    $btnConsultarRendimientoV2->ajaxConsultarRendimientoV2();
}
if (isset($_POST['btnConsultarRutas'])) {
    $btnConsultarRutas = new CobranzaAjax();
    $btnConsultarRutas->ajaxConsultarRutasRendimiento();
}
