<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '../../config.php';
require '../vendor/autoload.php';
require '../src/config/db.php';

// Requerir controlador y modelo de contratos 


require_once '../../app/modulos/usuarios/usuarios.modelo.php';
require_once '../../app/modulos/usuarios/usuarios.controlador.php';
require_once '../../app/modulos/sucursales/sucursales.modelo.php';

require_once '../../app/modulos/contratos/contratos.controlador.php';
require_once '../../app/modulos/contratos/contratos.modelo.php';

require_once '../../app/modulos/cobranza/cobranza.controlador.php';
require_once '../../app/modulos/cobranza/cobranza.modelo.php';

require_once '../../app/modulos/almacenes/almacenes.controlador.php';
require_once '../../app/modulos/almacenes/almacenes.modelo.php';

require_once '../../app/modulos/productos/productos.controlador.php';
require_once '../../app/modulos/productos/productos.modelo.php';






$app = new \Slim\App([
    'settings' => [
        'addContentLengthHeader' => false
    ]
]);

// ['settings' => ['' => true]]

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/prueba', function (Request $request, Response $response) {

    try {
        //code...
        $sql = "SELECT * FROM `tbl_productos_pds` ORDER BY `pds_id_producto` ASC";
        $db = ConexionAPI::conectarAPI();
        $rs = $db->query($sql);
        if ($rs->rowCount() > 0) {

            echo json_encode(array(
                'status' => true,
                'mensaje' => 'Listado de productos',
                'data' => $rs->fetchAll(PDO::FETCH_ASSOC)
            ), true);
        } else {
            echo json_encode(array(
                'status' => false,
                'mensaje' => 'No hay resultados',
                'data' => ''
            ), true);
        }
    } catch (PDOException $e) {
        //throw $th;
        echo json_encode(array(
            'status' => false,
            'mensaje' => $e->getMessage() . '',
            'data' => ''
        ));
    }
});

$app->get('/clientes_control', function (Request $request, Response $response) {

    try {
        //code...
        $sql = "SELECT clts_id,clts_ruta,clts_nombre,clts_telefono,clts_domicilio,clts_col,clts_ubicacion,clts_tipo_cliente,clts_curp,clts_observaciones,clts_cuenta,clts_articulo,clts_fecha_venta FROM tbl_clientes_problemas_clts ORDER BY clts_id DESC";
        $db = ConexionAPI::conectarAPI();
        $rs = $db->query($sql);
        if ($rs->rowCount() > 0) {

            echo json_encode(array(
                'status' => true,
                'mensaje' => 'Listado de productos',
                'data' => $rs->fetchAll(PDO::FETCH_ASSOC)
            ), true);
        } else {
            echo json_encode(array(
                'status' => false,
                'mensaje' => 'No hay resultados',
                'data' => ''
            ), true);
        }
    } catch (PDOException $e) {
        //throw $th;
        echo json_encode(array(
            'status' => false,
            'mensaje' => $e->getMessage() . '',
            'data' => ''
        ));
    }
});


$app->get('/productos', function (Request $request, Response $response) {

    try {
        //code...
        $sql = "SELECT pds_sku,pds_nombre,pds_precio_credito,pds_enganche,pds_pago_semanal,pds_precio_contado,pds_precio_compra_mes_1,pds_precio_compra_mes_2 FROM tbl_productos_pds WHERE pds_estado = 'Activo' AND pds_ams_id = 1 ORDER BY pds_id_producto DESC";
        $db = ConexionAPI::conectarAPI();
        $rs = $db->query($sql);
        if ($rs->rowCount() > 0) {

            echo json_encode(array(
                'status' => true,
                'mensaje' => 'Listado de productos',
                'data' => $rs->fetchAll(PDO::FETCH_ASSOC)
            ), true);
        } else {
            echo json_encode(array(
                'status' => false,
                'mensaje' => 'No hay resultados',
                'data' => ''
            ), true);
        }
    } catch (PDOException $e) {
        //throw $th;
        echo json_encode(array(
            'status' => false,
            'mensaje' => $e->getMessage() . '',
            'data' => ''
        ));
    }
});

$app->get('/acceso/{clave}', function (Request $request, Response $response, array $args) {
    $clave =  $args['clave'];
    try {
        //code...
        $sql = "SELECT true FROM tbl_sucursal_scl WHERE scl_clave_acceso = ?";
        $con = ConexionAPI::conectarAPI();
        $pps = $con->prepare($sql);
        $pps->bindValue(1, $clave);
        $pps->execute();
        $rs = $pps->fetch();

        echo json_encode($rs, true);
    } catch (PDOException $e) {
        //throw $th;
        echo json_encode(array(
            'status' => false,
            'mensaje' => $e->getMessage() . '',
            'data' => ''
        ));
    }
});

$app->post('/login', function (Request $request, Response $response) {
    echo "Aqui toy";
});

$app->post('/comisa-datos', function (Request $request, Response $response) {
    $json = $request->getBody();

    $datosVendedor = json_decode($json, true);

    // preArray($datosVendedor);
    // return;

    $subirctr = ContratosControlador::ctrSubirPreContrato($datosVendedor);

    return json_encode($subirctr, true);

    # code...

});



$app->get('/sicronizar_datos_2', function (Request $request, Response $response) {
    $json = $request->getBody();
    $datosTraspasos = json_decode($json, true);

    try {

        $sql = "UPDATE tbl_traspasos_tps SET tps_lista_productos_devueltos = ?  ";
        $con = ConexionAPI::conectarAPI();
        $pps = $con->prepare($sql);
        $pps->bindValue(1, $json);
        // $pps->bindValue(2, $datosTraspasos[0]['tps_num']);
        $pps->execute();
    } catch (PDOException $th) {
        throw $th;
    } finally {
        $pps = null;
        $con = null;
    }
    $datos = array('mensaje' => 'Los productos se sincronizarón correctamente');

    return json_encode($datos);
});


$app->post('/sincronizar_datos', function (Request $request, Response $response) {
    $json = $request->getBody();
    $datosTraspasos = json_decode($json, true);

    try {

        $sql = "UPDATE tbl_traspasos_tps SET tps_lista_productos_devueltos = ? WHERE tps_num_traspaso = ? ";
        $con = ConexionAPI::conectarAPI();
        $pps = $con->prepare($sql);
        $pps->bindValue(1, $json);
        $pps->bindValue(2, $datosTraspasos[0]['tps_num']);
        $pps->execute();
    } catch (PDOException $th) {
        throw $th;
    } finally {
        $pps = null;
        $con = null;
    }
    $datos = array('mensaje' => 'Los productos se sincronizarón correctamente');

    return json_encode($datos);
});

$app->get('/traspaso/{id}', function (Request $request, Response $response, array $args) {
    $id = "T-" . $args['id'];
    try {
        //code...
        $sql = "SELECT tps.*,usr_reg.usr_nombre AS registro,
        ams_ori.ams_nombre AS origen,
        usr_rec.usr_nombre AS receptor,
        ams_des.ams_nombre AS destino FROM tbl_traspasos_tps tps 
        JOIN tbl_usuarios_usr usr_reg ON usr_reg.usr_id =tps.tps_user_registro 
        JOIN tbl_almacenes_ams ams_ori ON ams_ori.ams_id=tps.tps_ams_id_origen 
        JOIN tbl_usuarios_usr usr_rec ON usr_rec.usr_id =tps.tps_user_id_receptor 
        JOIN tbl_almacenes_ams ams_des ON ams_des.ams_id=tps.tps_ams_id_destino 
        WHERE tps_num_traspaso=? LIMIT 1 ";
        $con = ConexionAPI::conectarAPI();
        $pps = $con->prepare($sql);
        $pps->bindValue(1, $id);
        $pps->execute();
        $rs = $pps->fetch(PDO::FETCH_ASSOC);
        $listp = json_decode($rs["tps_lista_productos"], true);
        $informacionQR = array(
            'tps_num' => $id,
            'productos' => $listp,

            'infvendedor' => array(
                'idusr' => $rs["tps_user_id_receptor"],
                'nombre' => $rs["receptor"],
                'camioneta' => $rs["destino"],
                'tps_num' => $id
            )
        );
        echo json_encode(array($informacionQR), true);
    } catch (PDOException $th) {
        //throw $th;
        return false;
    } finally {
        $pps = null;
        $con = null;
    }
});


$app->get('/prueba2', function (Request $request, Response $response, array $args) {
    // $json = $request->getBody();
    // $datosTraspasos = json_decode($json, true);
    $datosTraspasos = '[{"tps_num":"T-0011","productos":[{"id":"0003","nombre":"BASE DE CAMA INDIVIDUAL\/0003","categoria":"MADERA","cantidad":"5"},{"id":"0004","nombre":"BASE DE CAMA MATRIMONIAL\/0004","categoria":"MADERA","cantidad":"5"},{"id":"0006","nombre":"BUROES (PAR)\/0006","categoria":"MADERA","cantidad":"4"},{"id":"0008","nombre":"CAJONERA DE 10 MARIN\/0008","categoria":"MADERA","cantidad":"4"}],"infvendedor":{"idusr":"105","nombre":"LUIS FERNANDO FERNANDEZ","camioneta":"CAMIONETA XL90"}}]';

    $json = json_decode($datosTraspasos, true);
    preArray($json[0]['tps_num']);
});


$app->post('/loginCobranza', function (Request $request, Response $response) {
    $json = $request->getBody();

    $usr = json_decode($json, true);

    $login_msj =  CobranzaControlador::ctrLoginCobrador($usr);


    return json_encode($login_msj, true);

    # code...

});
$app->get('/obtener_ventas/{ctr_id_vendedor}/{filtro}', function (Request $request, Response $response, array $args) {
    $ctr_id_vendedor =  $args['ctr_id_vendedor'];
    $filtro =  $args['filtro'];

    $getAllCtra = ContratosModelo::mdlConsultarVentasVendedor($ctr_id_vendedor, $filtro);

    return json_encode($getAllCtra, true);
});

$app->get('/obtener_pendientes/{ctr_id_vendedor}', function (Request $request, Response $response, array $args) {
    $ctr_id_vendedor =  $args['ctr_id_vendedor'];

    $getAllCtra = ContratosModelo::mdlConsultarPendientesVendedor($ctr_id_vendedor);

    return json_encode($getAllCtra, true);
});



//API'S PARA LA APP DE COMISA COBRNZA

$app->get('/sincronizar_cra/{ruta}', function (Request $request, Response $response, array $args) {
    $ruta =  $args['ruta'];

    $getAllCtra = CobranzaModelo::mdlMostrarCarteleraCobranza($ruta);

    return json_encode($getAllCtra, true);
});

$app->get('/autorizar_cobranza/{usr_id}', function (Request $request, Response $response, array $args) {
    $usr_id =  $args['usr_id'];

    $autorizar = CobranzaModelo::mdlCobranzaAutizo($usr_id);

    if ($autorizar['usr_autorizar_cobranza'] == 1) {
        return json_encode(array(
            'status' => true,
            'mensaje' => 'Cobranza autorizada'
        ), true);
    } else {
        return json_encode(array(
            'status' => false,
            'mensaje' => 'Tu cobranza no fue autorizada, llama a oficina'
        ), true);
    }
});
$app->get('/actualizar_saldos/{usr_id}', function (Request $request, Response $response, array $args) {
    $usr_id =  $args['usr_id'];

    $getAllCtra = CobranzaControlador::ctrProcesarPagoAPI($usr_id, '');
    return json_encode($getAllCtra, true);
});



$app->post('/subir_contratos_new_2', function (Request $request, Response $response) {

    $json = $request->getBody();
    $datosVendedor = json_decode($json, true);
    try {

        $sql = "INSERT INTO tbl_contratos_2 (cts_todo,fecha) VALUES(?,?)";
        $con = ConexionAPI::conectarAPI();
        $pps = $con->prepare($sql);
        $pps->bindValue(1, $json);
        $pps->bindValue(2, FECHA);

        $pps->execute();
    } catch (PDOException $th) {
        //throw $th;
    } finally {
        $pps = null;
        $con = null;
    }
    $datos = array('mensaje' => 'Los datos se agregaron correctamente');

    return json_encode($datos);
    // $subirctr = ContratosControlador::ctrSubirPreContrato($datosVendedor);

    // return json_encode($subirctr, true);

    # code...

});


$app->post('/subir_contratos_new', function (Request $request, Response $response) {
    $json = $request->getBody();

    $data = json_decode($json, true);

    $cobranza =  CobranzaControlador::ctrEnrutarCuentasNuevas($data);
    // $datos = array(
    //     'status' => true,
    //     'mensaje' => 'Registros sincronizados'
    // );
    return json_encode($cobranza, true);
    // return json_encode($login_msj, true);
    # code...
});


$app->post('/comisa-datos-cobranza', function (Request $request, Response $response) {
    $json = $request->getBody();

    $data = json_decode($json, true);

    $cobranza =  CobranzaControlador::ctrSubirDatosCobranzaApp($data);

    if (isset($data[2]['usr_id'])) {
        $abonos = CobranzaModelo::mdlObtenerAbonosCobranza($data[2]['usr_id']);
    }
    $datos = array(
        'status' => true,
        'mensaje' => 'Registros sincronizados',
        'abonos' => $abonos['abs_id']
    );

    return json_encode($datos, true);
    // return json_encode($login_msj, true);
    # code...

});
$app->post('/-', function (Request $request, Response $response) {
    $json = $request->getBody();
    $datosVendedor = json_decode($json, true);
    try {

        $sql = "INSERT INTO tbl_contratos_2 (cts_todo,fecha) VALUES(?,?)";
        $con = ConexionAPI::conectarAPI();
        $pps = $con->prepare($sql);
        $pps->bindValue(1, $json);
        $pps->bindValue(2, FECHA);

        $pps->execute();
    } catch (PDOException $th) {
        //throw $th;
    } finally {
        $pps = null;
        $con = null;
    }
    $datos = array('mensaje' => 'Los datos se agregaron correctamente');

    return json_encode($datos);
});


$app->post('/cobranza-ref', function (Request $request, Response $response) {
    $json = $request->getBody();

    $data = json_decode($json, true);

    $ref = CobranzaModelo::mdlActualiarRef($data);

    $datos = array(
        'status' => true,
        'mensaje' => 'Referencias actualizadas'
    );

    return  json_encode($datos, true);
    // $cobranza =  CobranzaControlador::ctrSubirDatosCobranzaApp($data);
    // $datos = array(
    //     'status' => true,
    //     'mensaje' => 'Registros sincronizados'
    // );

    // return json_encode($datos, true);
    // return json_encode($login_msj, true);
    # code...

});
$app->get('/ordenar', function (Request $request, Response $response) {


    $cobranza =  CobranzaControlador::ctrOrdenarP();
    $datos = array(
        'status' => true,
        'mensaje' => 'Registros sincronizados'
    );

    return json_encode($datos, true);
    // return json_encode($login_msj, true);
    # code...

});


$app->get('/finalizar_cobranza', function (Request $request, Response $response, array $args) {
    // $ruta =  $args['ruta'];

    $getAllCtra = CobranzaControlador::ejecutarFinalizarCobranza();

    return json_encode($getAllCtra, true);
});



$app->get('/crear_nueva_ficha', function (Request $request, Response $response, array $args) {
    // $ruta =  $args['ruta'];

    $getAllCtra = CobranzaControlador::ctrCrearFicha();

    return json_encode($getAllCtra, true);
});

$app->get('/consultar_contratos_new/{ruta}', function (Request $request, Response $response, array $args) {
    $ruta =  $args['ruta'];

    $getAllCtra = ContratosModelo::mdlFiltrarContratoPorRuta2($ruta);

    return json_encode($getAllCtra, true);
});

$app->get('/consultar_rendimiento/{ruta}/{usr_id}', function (Request $request, Response $response, array $args) {
    $ruta =  $args['ruta'];
    $usr_id =  $args['usr_id'];

    $getRendimiento = CobranzaControlador::ctrRedndimiento($ruta, $usr_id);

    return json_encode($getRendimiento, true);
});

$app->get('/conexion_api', function (Request $request, Response $response, array $args) {
    // $ruta =  $args['ruta'];

});

$app->get('/abonos_espera_cancelacion', function (Request $request, Response $response, array $args) {

    $response = json_encode(CobranzaModelo::mdlConsultarAbsCancelados(), true);

    return $response;
});
$app->get('/retiro_caja', function (Request $request, Response $response, array $args) {

    $response = json_encode(CobranzaModelo::mdlConsultarRetirosCaja(), true);

    return $response;
});
$app->get('/descuentos_por_autorizar', function (Request $request, Response $response, array $args) {

    $descuentos = CobranzaModelo::mdlConsultarAbsDescuento();
    $array_descuentos = array();
    foreach ($descuentos as $key => $data) {
        array_push($array_descuentos, array(
            "abs_id" => $data['abs_id'],
            "abs_folio" => $data['abs_folio'],
            "abs_monto" => $data['abs_monto'],
            "abs_mp" => $data['abs_mp'],
            "abs_nota" => $data['abs_nota'],
            "abs_fecha_cobro" => $data['abs_fecha_cobro'],
            "abs_motivo_cancelacion" => $data['abs_motivo_cancelacion'],
            "abs_codigo" => $data['abs_codigo'],
            "usr_nombre" => $data['usr_nombre'],
            "usr_ruta" => $data['usr_ruta'],
            "ctr_cliente" => $data['ctr_cliente'],
            "ctr_numero_cuenta" => $data['ctr_numero_cuenta'],
            "ctr_ruta" => $data['ctr_ruta'],
            "ctr_productos" => json_decode($data['ctr_productos'], true),
            "ctr_saldo_actual" => $data['ctr_saldo_actual'],
            "ctr_ultima_fecha_abono" => $data['ctr_ultima_fecha_abono'],
        ));
    }

    return json_encode($array_descuentos, true);
});

$app->get('/autorizar_descuento/{abs_id}/{abs_codigo}', function (Request $request, Response $response, array $args) {
    $abs_id = $args['abs_id'];
    $abs_codigo = $args['abs_codigo'];
    $res = CobranzaControlador::ctrAprobarescuento($abs_id, $abs_codigo);
    if ($res['status']) {
        return json_encode(array(
            'status' => true,
            'mensaje' => $res['mensaje']
        ), true);
    } else {
        return json_encode(array(
            'status' => false,
            'mensaje' => $res['mensaje']
        ), true);
    }
});

$app->get('/saldos_por_autorizar', function (Request $request, Response $response, array $args) {
    $saldos = ContratosModelo::mdlMostrarSaldosJson();

    $array_saldos = array();
    foreach ($saldos as $key => $data) {
        array_push($array_saldos, array(
            "ctr_json_saldos" => json_decode($data['ctr_json_saldos'], true),
            "ctr_codigo" => $data['ctr_codigo'],
        ));
    }
    return json_encode($array_saldos, true);
});

$app->get('/cancelar_codigo_abono/{abs_id}', function (Request $request, Response $response, array $args) {
    $abs_id = $args['abs_id'];
    $res = CobranzaControlador::ctrCancelarCodigoAbono($abs_id);
    if ($res['status']) {
        return json_encode(array(
            'status' => true,
            'mensaje' => $res['mensaje']
        ), true);
    } else {
        return json_encode(array(
            'status' => false,
            'mensaje' => $res['mensaje']
        ), true);
    }
});

//CREAR NUEVA FICHA
$app->get('/crear_ficha', function (Request $request, Response $response, array $args) {

    CobranzaControlador::ctrGenerarNuevaFicha();
});
//CREAR RENDIMIENTO
$app->get('/crear_redimiento', function (Request $request, Response $response, array $args) {

    CobranzaControlador::ctrGuardarRendimiento();
});

//APIS PARA VALIDAR DESCARGA Y FINALIZAR COBRANZA

$app->get('/autorizar_cobranza_codigo/{usr_id}', function (Request $request, Response $response, array $args) {
    $usr_id =  $args['usr_id'];
    $res = UsuariosControlador::ctrGenerarCodigoDescarga($usr_id);
    if ($res['status']) {
        return json_encode(array(
            'status' => true,
            'mensaje' => $res['mensaje']
        ), true);
    } else {
        return json_encode(array(
            'status' => false,
            'mensaje' => $res['mensaje']
        ), true);
    }
});
$app->get('/validar_cobranza_descarga/{usr_id}/{usr_codigo_descarga}', function (Request $request, Response $response, array $args) {
    $usr_id =  $args['usr_id'];
    $usr_codigo_descarga =  $args['usr_codigo_descarga'];
    $res = UsuariosControlador::ctrValidarCodigoDescarga($usr_id, $usr_codigo_descarga);
    if ($res['status']) {
        return json_encode(array(
            'status' => true,
            'mensaje' => $res['mensaje']
        ), true);
    } else {
        return json_encode(array(
            'status' => false,
            'mensaje' => $res['mensaje']
        ), true);
    }
});

$app->get('/autorizar_terminar_cobranza_codigo/{usr_id}', function (Request $request, Response $response, array $args) {
    $usr_id =  $args['usr_id'];
    $res = UsuariosControlador::ctrGenerarCodigoFinalizarCbza($usr_id);
    if ($res['status']) {
        return json_encode(array(
            'status' => true,
            'mensaje' => $res['mensaje']
        ), true);
    } else {
        return json_encode(array(
            'status' => false,
            'mensaje' => $res['mensaje']
        ), true);
    }
});
$app->get('/validar_terminar_cobranza/{usr_id}/{usr_codigo_descarga}', function (Request $request, Response $response, array $args) {
    $usr_id =  $args['usr_id'];
    $usr_codigo_descarga =  $args['usr_codigo_descarga'];
    $res = UsuariosControlador::ctrValidarFinalizarCbza($usr_id, $usr_codigo_descarga);
    if ($res['status']) {
        return json_encode(array(
            'status' => true,
            'mensaje' => $res['mensaje']
        ), true);
    } else {
        return json_encode(array(
            'status' => false,
            'mensaje' => $res['mensaje']
        ), true);
    }
});

//API PARA TRASPASOS DE CONTRATOS
$app->post('/comisa_datos_traspasos', function (Request $request, Response $response) {
    $json = $request->getBody();
    $data = json_decode($json, true);
    $traspaso =  ContratosControlador::ctrRegistrarTraspasoContrato($data);
    return json_encode($traspaso, true);
});

//API PARA GUARDAR LOS STATUS DE LAS LISTAS BLANCA Y NEGRA
$app->get('/crear_status', function (Request $request, Response $response, array $args) {
    $res = ContratosControlador::ctrRegistrarStatusListas();
    return json_encode($res, true);
});

$app->get('/pre_registro_mercancia', function (Request $request, Response $response, array $args) {

    $prm = AlmacenesModelo::mdlMostrarPreRegistrosByCodigos();


    $array_prm = array();
    foreach ($prm as $key => $data) {
        $dprm = AlmacenesModelo::mdlMostrarDetallePreRegistro($data['prm_id_detalle']);
        array_push($array_prm, array(
            "prm_folio" => $data['prm_folio'],
            "pvs_nombre" => $data['pvs_nombre'],
            "prm_fecha_registro" => $data['prm_fecha_registro'],
            "prm_codigo" => $data['prm_codigo'],
            "prm_status" => $data['prm_status'],
            "prm_usuario_registro" => $data['prm_usuario_registro'],
            "prm_productos" => $dprm,
        ));
    }
    return json_encode($array_prm, true);
});

//API TRASPASO DE MERCANCIA A OTRA SUCURSAL
$app->post('/traspaso_mercancia', function (Request $request, Response $response) {
    $json = $request->getBody();
    $data = json_decode($json, true);

    $traspaso =  AlmacenesControlador::ctrTraspasoDeMercanciaSucursal($data);
    return json_encode($traspaso, true);
});

$app->get('/quitar_traspaso_mercancia/{spds_serie_completa}', function (Request $request, Response $response, array $args) {
    $spds_serie_completa =  $args['spds_serie_completa'];
    $res = AlmacenesModelo::mdlQuitarTraspasoMercancia($spds_serie_completa);
    if ($res) {
        return json_encode(array(
            'status' => true,
            'mensaje' => 'Se quito el producto correctamente',
        ), true);
    } else {
        return json_encode(array(
            'status' => false,
            'mensaje' => 'Hubo un error',
        ), true);
    }
});

//APIS PARA LA APP DE VENTAS 2023

//OBTENER TODOS LOS PRODUCTOS
$app->get('/consultar_modelos_mercancia', function (Request $request, Response $response, array $args) {
    $res = ProductosModelo::mdlMostrarModelos();
    return json_encode($res, true);
});

//OBTENER TODOS LOS PRODUCTOS POR VENDEDOR
$app->get('/consultar_mercancia/usr/{usr_id}', function (Request $request, Response $response, array $args) {
    $usr_id =  $args['usr_id'];
    $ams = AlmacenesModelo::mdlMostrarAlmacenesByVendedor($usr_id);
    $pds = AlmacenesModelo::mdlMostrarProductosByAlmacenID($ams['ams_id']);
    return json_encode($pds, true);
});

//LOGIN PARA EL ENCARGADO DE ASIGNAR MERCANCIA A LOS VENDEDORES

$app->post('/login_encargado_mercancia', function (Request $request, Response $response) {
    $json = $request->getBody();

    $usr = json_decode($json, true);

    $login_msj =  CobranzaControlador::ctrLoginEncargadoMercancia($usr);


    return json_encode($login_msj, true);

    # code...

});

$app->get('/asignar_mercancia/{ams_nombre}/{spds_serie_completa}', function (Request $request, Response $response, array $args) {
    $ams_nombre =  $args['ams_nombre'];
    $spds_serie_completa =  $args['spds_serie_completa'];
    $ams = AlmacenesModelo::mdlMostrarAlmacenByNombre($ams_nombre);
    $spds = AlmacenesModelo::mdlMostrarSeriesBySerieCompleta($spds_serie_completa);
    if ($spds) {
        $datos = array(
            'spds_almacen' => $ams['ams_id'],
            'spds_situacion' => 'SALIDA',
            'spds_id' => $spds['spds_id'],
        );
        $res = AlmacenesModelo::mdlAsignarAlmacen($datos);
        if ($res) {
            $productos = AlmacenesModelo::mdlMostrarProductosByAlmacenNombre($ams_nombre);
            return json_encode(array(
                'status' => true,
                'mensaje' => 'Se agrego el producto correctamente',
                'productos' => $productos,
            ), true);
        }
    } else {
        return json_encode(array(
            'status' => false,
            'mensaje' => 'El numero de serie no se encuentra en su inventario',
        ), true);
    }
});
$app->get('/mostrar_productos/{ams_nombre}', function (Request $request, Response $response, array $args) {
    $ams_nombre =  $args['ams_nombre'];
    $res = AlmacenesModelo::mdlMostrarProductosByAlmacenNombre($ams_nombre);
    return json_encode($res, true);
});
$app->get('/mostrar_almacenes_vendedor', function (Request $request, Response $response, array $args) {
    $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipoVendedor();
    $ams_vendedores = array();
    foreach ($ams as $dato) {
        $ams_vendedores[] = $dato['ams_nombre'];
    }
    return json_encode($ams_vendedores, true);
});
$app->post('/quitar_producto', function (Request $request, Response $response) {
    $json = $request->getBody();
    $datos = json_decode($json, true);
    $res = AlmacenesControlador::ctrQuitarProductosContrato($datos);
    $productos = AlmacenesModelo::mdlMostrarProductosByAlmacenNombre($datos['ams_nombre']);
    return json_encode(array(
        'res' => $res,
        'productos' => $productos,
    ), true);
});
$app->post('/generar_reporte_mercancia',function (Request $request, Response $response) {
    $json = $request->getBody();
    $datos = json_decode($json, true);
    $_SESSION['session_app'] = $datos['usr_nombre'];
    $ams = AlmacenesModelo::mdlMostrarAlmacenByNombre($datos['ams_nombre']);
    $url_reporte = HTTP_HOST . 'app/report/reporte-mercancia-app.php?ams_id=' . $ams['ams_id'];
    return json_encode(array(
        'url_reporte' => $url_reporte,
    ), true);
});

$app->run();
