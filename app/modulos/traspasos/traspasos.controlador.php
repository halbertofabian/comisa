
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 16/02/2021 10:36
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class TraspasosControlador
{
    public function ctrAgregarTraspasos()
    {
    }
    public function ctrActualizarTraspasos()
    {
    }
    public function ctrMostrarTraspasos()
    {
    }
    public function ctrEliminarTraspasos()
    {
    }

    public function ctrTraspasarProductosAlamacen()
    {

        $almancenidOrigen = $_POST["tps_ams_id_origen"];
        $almancenidDestino = $_POST["tps_ams_id_destino"];
        $arrayproductos = json_decode($_POST["tps_lista_productos"], true);
        foreach ($arrayproductos as $key => $inf) {
            # code...
            $skuDestino = $inf['id'] . "/" . $_SESSION["session_suc"]["scl_id"] . "/" . $almancenidDestino;
            $skuOrigen = $inf['id'] . "/" . $_SESSION["session_suc"]["scl_id"] . "/" . $almancenidOrigen;
            $pds_stok = $inf['cantidad'];

            $verificaexistencia = ProductosModelo::mdlMostrarProductosActivos("Activo", $skuDestino);
            //DATOS PARA TABLA TRASPASOS
            $traspasoData = array(
                'tps_id' => "",
                'tps_num_traspaso' => $_POST["tps_num_traspaso"],
                'tps_user_registro' => $_POST["tps_user_registro"],
                'tps_tipo' => $_POST["tps_tipo"],
                'tps_ams_id_origen' => $almancenidOrigen,
                'tps_ams_id_destino' => $almancenidDestino,
                'tps_user_id_receptor' => $_POST["tps_user_id_receptor"],
                'tps_lista_productos' => json_encode($arrayproductos, true),
                'tps_fecha' => FECHA

            );
            $infPexistente = ProductosModelo::mdlMostrarProductosActivos("Activo", $skuOrigen);
            //DATOS PARA LA TABLA PRODUCTOS:INSERT O UPDATE
            $data = array(
                "pds_id_producto" => "",
                'pds_visivilidad' => $infPexistente["pds_visivilidad"],
                "pds_sku" => $skuDestino,
                "pds_nombre" => $infPexistente["pds_nombre"],
                "pds_descripcion_corta" => $infPexistente["pds_descripcion_corta"],
                'pds_descripcion_larga' => $infPexistente["pds_descripcion_larga"],
                'pds_marca' => $infPexistente["pds_marca"],
                'pds_modelo' =>  $infPexistente["pds_modelo"],
                "pds_categoria" => $infPexistente["pds_categoria"],
                'pds_caracteristicas' => $infPexistente["pds_caracteristicas"],
                "pds_etiquetas" => $infPexistente["pds_etiquetas"],
                "pds_stok" => $pds_stok,
                'pds_stok_max' =>  $infPexistente["pds_stok_max"],
                'pds_stok_min' =>  $infPexistente["pds_stok_min"],
                "pds_precio_compra" => $infPexistente["pds_precio_compra"],
                "pds_precio_publico" => $infPexistente["pds_precio_publico"],
                'pds_precio_mayoreo' =>  $infPexistente["pds_precio_mayoreo"],
                'pds_precio_especial' =>  $infPexistente["pds_precio_especial"],
                'pds_precio_promocion' => $infPexistente["pds_precio_promocion"],
                'pds_fecha_inicio_promocion' => $infPexistente["pds_fecha_inicio_promocion"],
                'pds_fecha_fin_promocion' => $infPexistente["pds_fecha_fin_promocion"],
                "pds_imagen_portada" => $infPexistente["pds_imagen_portada"],
                'pds_imagenes' =>  $infPexistente["pds_imagenes"],
                "pds_fecha_creacion" => FECHA,
                'pds_fecha_modificacion' =>  "",
                "pds_usaurio_registro" => $_SESSION['session_usr']['usr_nombre'],
                'pds_usuario_modifico' => "",
                "pds_estado" => 'Activo',
                "pds_sucursal_id" => $_SESSION['session_suc']['scl_id'],
                "pds_suscriptor_id" => $_SESSION['session_sus']['sus_id'],
                'pds_ams_id' => $almancenidDestino,

                "usr_rol" => 'Alumno',
                "usr_fecha_registro" => FECHA,
                "usr_id_sucursal" => SUCURSAL_ID,
                'pds_marca' => ''
            );

            if ($verificaexistencia) {
                //existe: se tiene que actualizar
                //ACTUALIZAR: SUMAR AL STOK DESTINO LA CANTIDAD TRASPASADA
                $actualizarStokDestino = ProductosModelo::mdlActualizarStokDestino($pds_stok, $verificaexistencia["pds_id_producto"]);
                //RESTAR DEL STOK ORIGEN LA CANTIDAD TRASPASADA
                $actualizarStokOrigen = ProductosModelo::mdlActualizarStokOrigen($pds_stok, $infPexistente["pds_id_producto"]);
            } else {
                //no existe: se tiene que registrar
                //INSERTAR PRODUCTO (SOLO SE CAMBIO: SKU, STOK, Y ID ALMACEN)
                $insertarP = ProductosModelo::mdlAgregarProductos($data);
                //RESTAR DEL STOK ORIGEN LA CANTIDAD TRASPASADA
                $actualizarStokOrigen = ProductosModelo::mdlActualizarStokOrigen($pds_stok, $infPexistente["pds_id_producto"]);
                //var_dump($actualizarStokOrigen);
            }
        }


        if ($actualizarStokOrigen && $actualizarStokDestino) {
            $traspaso = TraspasosModelo::mdlTraspasarProductosAlamacen($traspasoData);
            echo "actualizado";
        } elseif ($insertarP && $actualizarStokOrigen) {
            # code...
            $traspaso = TraspasosModelo::mdlTraspasarProductosAlamacen($traspasoData);
            echo "registrado";
        } else {
            echo "error XD";
        }
    }

    public function ctrFiltrarProductosAlamacen()
    {
        $palabra = $_POST["teclasoltada"];
        $idalmacen=$_POST['tps_ams_id_origen'];
        $query = ProductosModelo::mdlMostrarProductosAlamacen($idalmacen);
        if ($palabra != "") {

            $query = ProductosModelo::mdlMostrarProductosAlamacenFiltrado($palabra,$idalmacen);
        }
        return $query;
    }
}
