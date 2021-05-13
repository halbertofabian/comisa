<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '../../config.php';
require '../vendor/autoload.php';
require '../src/config/db.php';


$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/prueba', function (Request $request, Response $response) {

    try {
        //code...
        $sql = "SELECT * FROM `tbl_productos_pds` ORDER BY `pds_id_producto` ASC";
        $db = Conexion::conectar();
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

$app->post('/login', function (Request $request, Response $response) {
    echo "Aqui toy";
});

$app->get('/traspaso/{id}', function (Request $request, Response $response, array $args) {
    $id = "T-".$args['id'];
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
        $con = Conexion::conectar();
        $pps = $con->prepare($sql);
        $pps->bindValue(1, $id);
        $pps->execute();
        $rs = $pps->fetch();
        $listp = json_decode($rs["tps_lista_productos"], true);
        $informacionQR = array(
            'productos'=>$listp
    ,
            
            'infvendedor' => array(
                'idusr' => $rs["tps_user_id_receptor"],
                'nombre' => $rs["receptor"],
                'camioneta' => $rs["destino"],
            )
        );
        echo json_encode($informacionQR,true);
    } catch (PDOException $th) {
        //throw $th;
        return false;
    } finally {
        $pps = null;
        $con = null;
    }
});

$app->run();
