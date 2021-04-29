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
$app->run();
