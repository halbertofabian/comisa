
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 20/10/2020 21:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class ProductosModelo
{
    public static function mdlAgregarProductos($pds)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_productos_pds (pds_sku,pds_nombre,pds_categoria,pds_stok,pds_stok_min,pds_precio_credito,pds_enganche,pds_pago_semanal,pds_precio_contado,pds_precio_compra_mes_1,pds_precio_compra_mes_2,pds_imagen_portada,pds_fecha_creacion,pds_fecha_modificacion,pds_usaurio_registro,pds_usuario_modifico,pds_estado,pds_sucursal_id,pds_suscriptor_id,pds_ams_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pds['pds_sku']);
            $pps->bindValue(2, $pds['pds_nombre']);
            $pps->bindValue(3, $pds['pds_categoria']);
            $pps->bindValue(4, $pds['pds_stok']);
            $pps->bindValue(5, $pds['pds_stok_min']);

            $pps->bindValue(6, $pds['pds_precio_credito']);
            $pps->bindValue(7, $pds['pds_enganche']);
            $pps->bindValue(8, $pds['pds_pago_semanal']);
            $pps->bindValue(9, $pds['pds_precio_contado']);
            $pps->bindValue(10, $pds['pds_precio_compra_mes_1']);

            $pps->bindValue(11, $pds['pds_precio_compra_mes_2']);
            $pps->bindValue(12, $pds['pds_imagen_portada']);
            $pps->bindValue(13, $pds['pds_fecha_creacion']);
            $pps->bindValue(14, $pds['pds_fecha_modificacion']);
            $pps->bindValue(15, $pds['pds_usaurio_registro']);

            $pps->bindValue(16, $pds['pds_usuario_modifico']);
            $pps->bindValue(17, $pds['pds_estado']);
            $pps->bindValue(18, $pds['pds_sucursal_id']);
            $pps->bindValue(19, $pds['pds_suscriptor_id']);
            $pps->bindValue(20, $pds['pds_ams_id']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarProductosExcelInventario($data)
    {
        try {
            //code...
            $sql = "UPDATE tbl_productos_pds SET pds_stok = ? WHERE pds_sku = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $data['pds_stok']);
            $pps->bindValue(2, $data['pds_sku']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarProductosActivos($pds_estado = 'Activo', $pds_sku = "")
    {
        try {

            //code...
            if ($pds_sku == "") {
                $sql = "SELECT * FROM tbl_productos_pds WHERE pds_estado = ? AND (pds_sucursal_id = ? AND pds_suscriptor_id = ? )";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $pds_estado);
                $pps->bindValue(2, SUCURSAL_ID);
                $pps->bindValue(3, CLIENTE_ID);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($pds_sku != "") {
                $sql = "SELECT * FROM tbl_productos_pds WHERE pds_sku = ? AND  pds_estado = ? AND (pds_sucursal_id = ? AND pds_suscriptor_id = ? )";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $pds_sku);
                $pps->bindValue(2, $pds_estado);
                $pps->bindValue(3, SUCURSAL_ID);
                $pps->bindValue(4, CLIENTE_ID);
                $pps->execute();
                return $pps->fetch();
            }
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarProductoBySKUFast($pds_sku = "")
    {
        try {

            $sql = "SELECT pds_id_producto FROM tbl_productos_pds WHERE  pds_sku = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pds_sku);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarProductos()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarProductosAlamacen($ams_id)
    {
        try {
            $sql = "SELECT * FROM tbl_productos_pds WHERE pds_ams_id =?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_id);
            $pps->execute();
            return $pps->fetchAll();
        } catch (\Throwable $th) {
            return false;
        } finally {

            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarProductosAlamacenInventario($ams_id)
    {
        try {
            $sql = "SELECT * FROM tbl_productos_pds WHERE pds_ams_id =?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_id);
            $pps->execute();
            return $pps->fetchAll();
        } catch (\Throwable $th) {
            return false;
        } finally {

            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarProductosAlamacenFiltrado($text, $ams_id)
    {
        try {
            $sql = "SELECT * FROM tbl_productos_pds WHERE (pds_sku LIKE '%" . $text . "%' OR 
            pds_nombre LIKE '%" . $text . "%' OR pds_categoria LIKE '%" . $text . "%') AND pds_ams_id =$ams_id ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_id);
            $pps->execute();
            return $pps->fetchAll();
        } catch (\Throwable $th) {
            return false;
        } finally {

            $pps = null;
            $con = null;
        }
    }

    public static function mdlActualizarStokOrigen($cantidad, $id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_productos_pds SET pds_stok= pds_stok - ? WHERE pds_id_producto=?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cantidad);
            $pps->bindValue(2, $id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarStokDestino($cantidad, $id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_productos_pds SET pds_stok= pds_stok + ? WHERE pds_id_producto=?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cantidad);
            $pps->bindValue(2, $id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarProductosAlmId($dts)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_productos_pds WHERE pds_ams_id =? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dts['pds_ams_id']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function ctrRegistrarVentasproductos($data)
    {

        try {
            //code...
            $sql = "INSERT INTO tbl_venta_producto_vpds (vpds_contrato,vpds_sku,vpds_cantidad,vpds_fecha_venta) VALUES (?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $data['vpds_contrato']);
            $pps->bindValue(2, $data['vpds_sku']);
            $pps->bindValue(3, $data['vpds_cantidad']);
            $pps->bindValue(4, $data['vpds_fecha_venta']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
