
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
            $sql = "INSERT INTO tbl_productos_pds (pds_visivilidad,pds_sku,pds_nombre,pds_descripcion_corta,pds_descripcion_larga,pds_marca,pds_modelo,pds_categoria,pds_caracteristicas,pds_etiquetas,pds_stok,pds_stok_min,pds_stok_max,pds_precio_compra,pds_precio_publico,pds_precio_mayoreo,pds_precio_especial,pds_precio_promocion,pds_fecha_inicio_promocion,pds_fecha_fin_promocion,pds_imagen_portada,pds_imagenes,pds_fecha_creacion,pds_fecha_modificacion,pds_usaurio_registro,pds_usuario_modifico,pds_estado,pds_sucursal_id,pds_suscriptor_id,pds_ams_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pds['pds_visivilidad']);
            $pps->bindValue(2, $pds['pds_sku']);
            $pps->bindValue(3, $pds['pds_nombre']);
            $pps->bindValue(4, $pds['pds_descripcion_corta']);
            $pps->bindValue(5, $pds['pds_descripcion_larga']);
            $pps->bindValue(6, $pds['pds_marca']);
            $pps->bindValue(7, $pds['pds_modelo']);
            $pps->bindValue(8, $pds['pds_categoria']);
            $pps->bindValue(9, $pds['pds_caracteristicas']);
            $pps->bindValue(10, $pds['pds_etiquetas']);
            $pps->bindValue(11, $pds['pds_stok']);
            $pps->bindValue(12, $pds['pds_stok_min']);
            $pps->bindValue(13, $pds['pds_stok_max']);
            $pps->bindValue(14, $pds['pds_precio_compra']);
            $pps->bindValue(15, $pds['pds_precio_publico']);
            $pps->bindValue(16, $pds['pds_precio_mayoreo']);
            $pps->bindValue(17, $pds['pds_precio_especial']);
            $pps->bindValue(18, $pds['pds_precio_promocion']);
            $pps->bindValue(19, $pds['pds_fecha_inicio_promocion']);
            $pps->bindValue(20, $pds['pds_fecha_fin_promocion']);
            $pps->bindValue(21, $pds['pds_imagen_portada']);
            $pps->bindValue(22, $pds['pds_imagenes']);
            $pps->bindValue(23, $pds['pds_fecha_creacion']);
            $pps->bindValue(24, $pds['pds_fecha_modificacion']);
            $pps->bindValue(25, $pds['pds_usaurio_registro']);
            $pps->bindValue(26, $pds['pds_usuario_modifico']);
            $pps->bindValue(27, $pds['pds_estado']);

            $pps->bindValue(28, $pds['pds_sucursal_id']);
            $pps->bindValue(29, $pds['pds_suscriptor_id']);
            $pps->bindValue(30, $pds['pds_ams_id']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarProductos()
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
            $sql = "SELECT * FROM tbl_productos_pds WHERE pds_ams_id =? AND pds_stok>0";
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
            pds_descripcion_corta LIKE '%" . $text . "%' OR pds_categoria LIKE '%" . $text . "%') AND pds_ams_id =$ams_id ";
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

    
}
