<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '../../config.php';
require '../vendor/autoload.php';
require '../src/config/db.php';

// Requerir controlador y modelo de contratos 

require_once '../../app/modulos/contratos/contratos.controlador.php';
require_once '../../app/modulos/contratos/contratos.modelo.php';





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

$app->post('/comisa-datos2', function (Request $request, Response $response) {
    $json = $request->getBody();

    $datosVendedor = json_decode($json, true);



    $subirctr = ContratosControlador::ctrSubirPreContrato($datosVendedor);

    return json_encode($subirctr, true);

    # code...

});
$app->post('/comisa-datos', function (Request $request, Response $response) {
    $json = $request->getBody();
    $datosVendedor = json_decode($json, true);
    try {

        $sql = "INSERT INTO tbl_contratos_2 (cts_todo,fecha) VALUES(?,?)";
        $con = ConexionAPI::conectarAPI();
        $pps = $con->prepare($sql);
        $pps->bindValue(1, $datosVendedor);
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
$app->run();
