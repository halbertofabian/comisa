<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 04/02/2021 18:14
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';

require_once DOCUMENT_ROOT . 'app/modulos/clientes/clientes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/ingresos/ingresos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.modelo.php';

require_once DOCUMENT_ROOT . 'app/lib/PHPExcel/Classes/PHPExcel/IOFactory.php';


class ContratosAjax
{
    public $producto;
    public $ctr_id;
    public $ruta;
    public $metodo_pgo;
    public function ajaxConsultarCliente()
    {
        $res = ClientesModelo::mdlMostrarClientes($_POST['clts_id']);
        echo json_encode($res, true);
    }
    public function ajaxCrearContrato()
    {
        $res = ContratosControlador::ctrAgregarContratos();
        echo json_encode($res, true);
    }
    public function ajaxMostrarContratos()
    {
        //$res = ContratosModelo::mdlMostrarContratos($_POST['btn_Mostar_ctrs']);
        $res = ContratosControlador::ctrMostrarContratos();
        echo json_encode($res, true);
    }
    public function ajaxEditarContrato()
    {
        $res = ContratosControlador::ctrActualizarContratos();
        echo json_encode($res, true);
    }

    public function ajaxRegistrarVentasContrato()
    {

        $res = ContratosControlador::ctrRegistrarVentasContrato();
        echo json_encode($res, true);
    }

    public function ajaxBuscarContrato()
    {

        $res = ContratosModelo::mdlMostrarContratoByFolio($_POST['crt_folio']);
        echo json_encode($res, true);
    }

    public function ajaxBuscarContrato2()
    {

        $res = ContratosModelo::mdlMostrarContratosByFolioCaja($_POST['crt_filtro']);
        echo json_encode($res, true);
    }

    public function ajaxActualizarContrato()
    {
        $res = ContratosControlador::ctrActualizarContrato();
        echo json_encode($res, true);
    }
    public function ajaxListarContrato()
    {
        $res = ContratosControlador::ctrListarContrato();
        echo json_encode($res, true);
    }
    public function ajaxImportarContratos()
    {

        $respuesta = ContratosControlador::ctrSubirContratoByExcel();
        echo json_encode($respuesta, true);
    }

    public function ajaxConsultarContratoById()
    {
        $respuesta = ContratosModelo::mdlMostrarContratosById($_POST['ctr_id']);
        echo json_encode($respuesta, true);
    }

    public function ajaxConsultarUltimoCuentaRuta()
    {
        $respuesta = ContratosModelo::mdlMostrarUltimaCuenta($_POST['ctr_ruta']);
        echo json_encode($respuesta, true);
    }
    public function ajaxAsignarCuenta()
    {
        $respuesta = ContratosModelo::mdlAsignarCuenta($_POST);
        echo json_encode($respuesta, true);
    }
    public function ajaxRegistrarClienteMal()
    {
        $respuesta = ContratosControlador::ctrClientesMalH();
        echo json_encode($respuesta, true);
    }
    public function ajaxGuardarProductos()
    {
        $respuesta = ContratosControlador::ctrGuardarProductos();
        echo json_encode($respuesta, true);
    }
    public function ajaxBuscarProductos()
    {
        $res = ContratosModelo::mdlAutocompleteProductos($this->producto);
        echo json_encode($res, true);
    }
    public function ajaxMostrarProductos()
    {
        $respuesta = ContratosModelo::mdlMostrarProductosPorID($this->ctr_id);
        echo json_encode($respuesta, true);
    }
    public function ajaxImportarStatus()
    {
        $respuesta = ContratosControlador::ctrImportarStatusExcel();
        echo json_encode($respuesta, true);
    }
    public function ajaxFiltrarContratosPorRuta()
    {
        $respuesta = ContratosModelo::mdlFiltrarContratoPorRuta($this->ruta, $this->metodo_pgo);
        echo json_encode($respuesta, true);
    }
    public function ajaxInsertEnrutamiento()
    {
        $respuesta = ContratosControlador::ctrInsertEnrutamiento();
        echo json_encode($respuesta, true);
    }
    public function ajaxInsertEnrutamiento2()
    {
        $respuesta = ContratosControlador::ctrInsertEnrutamiento2();
        echo json_encode($respuesta, true);
    }
    public function ajaxInsertEnrutamiento3()
    {
        $respuesta = ContratosControlador::ctrInsertEnrutamiento3();
        echo json_encode($respuesta, true);
    }
    public function ajaxInsertEnrutamiento4()
    {
        $respuesta = ContratosControlador::ctrInsertEnrutamiento4();
        echo json_encode($respuesta, true);
    }
    public function ajaxConsultarCartelera()
    {
        $respuesta = ContratosModelo::mdlConsultarCartelera();
        echo json_encode($respuesta, true);
    }
    public function ajaxEliminarCartelera()
    {
        $respuesta = ContratosControlador::ctrEliminarCartelera();
        echo json_encode($respuesta, true);
    }
    public function ajaxCambiarPocisiones()
    {
        $respuesta = ContratosControlador::ctrCambiarPosiciones();
        echo json_encode($respuesta, true);
    }
    public function ajaxRegistrarContrato()
    {
        $respuesta = ContratosControlador::ctrRegistrarContrato();
        echo json_encode($respuesta, true);
    }
    public function ajaxMostrarFotos()
    {
        $respuesta = ContratosModelo::mdlMostrarFotosCliente($_POST['ctrs_id']);
        echo json_encode($respuesta, true);
    }
    public function ajaxGuardarImagenesCliente()
    {
        $res = ContratosControlador::ctrGuardarFotosCliente();
        echo json_encode($res, true);
    }
    public function ajaxGuardarImagenesFiador()
    {
        $res = ContratosControlador::ctrGuardarFotosFiador();
        echo json_encode($res, true);
    }
    public function ajaxConsultarPendienteContrato()
    {
        $res = ContratosModelo::mdlConsultarPendienteContrato($_POST['ctr_id']);
        echo json_encode($res, true);
    }
    public function ajaxActualizarStatusPendiente1()
    {
        $res = ContratosModelo::mdlActualizarStatusPendiente1($_POST);
        echo json_encode($res, true);
    }
    public function ajaxActualizarStatusPendiente2()
    {
        $res = ContratosModelo::mdlActualizarStatusPendienteRealizados($_POST);
        echo json_encode($res, true);
    }
    public function ajaxObtenerUltimaOrden()
    {
        $res = ContratosModelo::mdlConsultarOrdenPorRuta($_POST['crt_ruta']);
        echo json_encode($res, true);
    }
    public function ajaxMostrarContratosAll()
    {
        $respuesta = ContratosModelo::mdlConsultarContratosAllV2($_POST['ctr_anio']);
        $array_contratos = array();
        foreach ($respuesta as $ctr) {
            array_push($array_contratos, array(
                'acciones' => '<a href="'. HTTP_HOST . 'contratos/buscar/' . $ctr['ctr_id'] .'" class="btn btn-primary">'.$ctr['ctr_id'] .'</a>',
                'ctr_folio' => $ctr['ctr_folio'],
                'ctr_numero_cuenta' => $ctr['ctr_numero_cuenta'] . ' ' . $ctr['ctr_ruta'],
                'ctr_fecha_contrato' => $ctr['ctr_fecha_contrato'],
                'ctr_cliente' =>  dstring($ctr['ctr_cliente']),
                'clts_curp' => $ctr['clts_curp'],
                'clts_domicilio' => dstring($ctr['clts_domicilio'] . ' ' . $ctr['clts_col']),
                'ctr_status_cuenta' => dstring($ctr['ctr_status_cuenta']),
            ));
            # code...
        }

        print json_encode($array_contratos, JSON_UNESCAPED_UNICODE);
    }
    public function ajaxActualizarStatusListaBlanca()
    {
        $res = ContratosControlador::ctrActualizarStatusListaBlanca();
        echo json_encode($res, true);
    }
    public function ajaxActualizarStatusListaNegra()
    {
        $res = ContratosControlador::ctrActualizarStatusListaNegra();
        echo json_encode($res, true);
    }
    public function ajaxAgregarStatusLista()
    {
        $res = ContratosControlador::ctrAgregarStatusLista();
        echo json_encode($res, true);
    }
    public function ajaxMostrarListaStatus()
    {
        $res = ContratosModelo::mdlMostrarStatusListas();
        echo json_encode($res, true);
    }
}
if (isset($_POST['btnMostrarInfCltId'])) {
    $consultarCliente = new ContratosAjax();
    $consultarCliente->ajaxConsultarCliente();
}
if (isset($_POST['btnNewContratoAdd'])) {
    $crearcontrato = new ContratosAjax();
    $crearcontrato->ajaxCrearContrato();
}

if (isset($_POST['btn_Mostar_ctrs'])) {
    $mostrarContratos = new ContratosAjax();
    $mostrarContratos->ajaxMostrarContratos();
}

if (isset($_POST['btnEditarctrs'])) {
    $editarcontrato = new ContratosAjax();
    $editarcontrato->ajaxEditarContrato();
}

if (isset($_POST['btnRegistrarVentasContrato'])) {

    $registrarVentas = new ContratosAjax();
    $registrarVentas->ajaxRegistrarVentasContrato();
}

if (isset($_POST['btnBuscarContratos'])) {
    $buscarContrato = new ContratosAjax();
    $buscarContrato->ajaxBuscarContrato();
}

if (isset($_POST['btnBuscarContratos2'])) {

    $buscarContrato = new ContratosAjax();
    $buscarContrato->ajaxBuscarContrato2();
}

if (isset($_POST['btnGuadarDatosContrato'])) {
    $actualizarContrato = new ContratosAjax();
    $actualizarContrato->ajaxActualizarContrato();
}

if (isset($_POST['btnListarContratos'])) {
    $listarContrato = new ContratosAjax();
    $listarContrato->ajaxListarContrato();
}

if (isset($_POST['btnImportarContratos'])) {
    $impotarProductos = new ContratosAjax();
    $impotarProductos->ajaxImportarContratos();
}

if (isset($_POST['btnConsultarContrato'])) {
    $mostrarContratoId = new ContratosAjax();
    $mostrarContratoId->ajaxConsultarContratoById();
}

if (isset($_POST['btnBuscarRuta'])) {
    $mostrarUltimaCuenta = new ContratosAjax();
    $mostrarUltimaCuenta->ajaxConsultarUltimoCuentaRuta();
}

if (isset($_POST['btnAsignarRutaCuenta'])) {
    $asignarRutaCuenta = new ContratosAjax();
    $asignarRutaCuenta->ajaxAsignarCuenta();
}
if (isset($_POST['btnRegistrarClienteMalH'])) {
    $registrarClienteH = new ContratosAjax();
    $registrarClienteH->ajaxRegistrarClienteMal();
}
if (isset($_POST['btnGuardarProductos'])) {
    $guardarProductos = new ContratosAjax();
    $guardarProductos->ajaxGuardarProductos();
}
if (isset($_GET['term'])) {
    $buscarProductos = new ContratosAjax();
    $buscarProductos->producto = $_GET['term'];
    $buscarProductos->ajaxBuscarProductos();
}
if (isset($_POST['btnMostrarProductos'])) {
    $mostrarProductos = new ContratosAjax();
    $mostrarProductos->ctr_id = $_POST['ctrs_id'];
    $mostrarProductos->ajaxMostrarProductos();
}
if (isset($_POST['btnImportarStatus'])) {
    $impotarStatus = new ContratosAjax();
    $impotarStatus->ajaxImportarStatus();
}
if (isset($_POST['btnSelectedRuta'])) {
    $filtrarContratosPorRuta = new ContratosAjax();
    $filtrarContratosPorRuta->ruta = $_POST['crt_ruta'];
    $filtrarContratosPorRuta->metodo_pgo = $_POST['metodo_pgo'];
    $filtrarContratosPorRuta->ajaxFiltrarContratosPorRuta();
}
if (isset($_POST['btnInsertContrato'])) {
    $insertarCartelera = new ContratosAjax();
    $insertarCartelera->ajaxInsertEnrutamiento();
}
if (isset($_POST['btnInsertContrato2'])) {
    $insertarCartelera = new ContratosAjax();
    $insertarCartelera->ajaxInsertEnrutamiento2();
}
if (isset($_POST['btnInsertContrato3'])) {
    $insertarCartelera = new ContratosAjax();
    $insertarCartelera->ajaxInsertEnrutamiento3();
}
if (isset($_POST['btnInsertContrato4'])) {
    $insertarCartelera = new ContratosAjax();
    $insertarCartelera->ajaxInsertEnrutamiento4();
}
if (isset($_POST['btnConsultarCartelera'])) {
    $consultarCartelera = new ContratosAjax();
    $consultarCartelera->ajaxConsultarCartelera();
}
if (isset($_POST['btnEliminarCartelera'])) {
    $eliminarCartelera = new ContratosAjax();
    $eliminarCartelera->ajaxEliminarCartelera();
}
if (isset($_POST['btnCambiarPosiciones'])) {
    $pocisiones = new ContratosAjax();
    $pocisiones->ajaxCambiarPocisiones();
}
if (isset($_POST['btnContratoAdd'])) {
    $registrarContrato = new ContratosAjax();
    $registrarContrato->ajaxRegistrarContrato();
}

if (isset($_POST['btnshowFotos'])) {
    $mostrarFotos = new ContratosAjax();
    $mostrarFotos->ajaxMostrarFotos();
}
if (isset($_POST['btnAgregarFotosCliente'])) {
    $guardarImagenesCliente = new ContratosAjax();
    $guardarImagenesCliente->ajaxGuardarImagenesCliente();
}
if (isset($_POST['btnAgregarFotosFiador'])) {
    $guardarImagenesFiador = new ContratosAjax();
    $guardarImagenesFiador->ajaxGuardarImagenesFiador();
}
if (isset($_POST['btnPendiente'])) {
    $mostrarPendiente = new ContratosAjax();
    $mostrarPendiente->ajaxConsultarPendienteContrato();
}
if (isset($_POST['cambiarPendiente'])) {
    $cambiarPendiente = new ContratosAjax();
    $cambiarPendiente->ajaxActualizarStatusPendiente1();
}
if (isset($_POST['cambiarPendienteRealizado'])) {
    $cambiarPendienteRealizado = new ContratosAjax();
    $cambiarPendienteRealizado->ajaxActualizarStatusPendiente2();
}
if (isset($_POST['btnObtenerUltimaOrden'])) {
    $ObtenerUltimaOrden = new ContratosAjax();
    $ObtenerUltimaOrden->ajaxObtenerUltimaOrden();
}
if (isset($_POST['btnMostrarContratosAll'])) {
    $mostrarcontrattosAll = new ContratosAjax();
    $mostrarcontrattosAll->ajaxMostrarContratosAll();
}
if (isset($_POST['btnAgregarListaBlanca'])) {
    $actualizarListaBlanca = new ContratosAjax();
    $actualizarListaBlanca->ajaxActualizarStatusListaBlanca();
}
if (isset($_POST['btnAgregarListaNegra'])) {
    $actualizarListaNegra = new ContratosAjax();
    $actualizarListaNegra->ajaxActualizarStatusListaNegra();
}
if (isset($_POST['btnAddStatusLista'])) {
    $agregarStatusLista = new ContratosAjax();
    $agregarStatusLista->ajaxAgregarStatusLista();
}
if (isset($_POST['btnMostrarLista'])) {
    $mostrarLista = new ContratosAjax();
    $mostrarLista->ajaxMostrarListaStatus();
}
