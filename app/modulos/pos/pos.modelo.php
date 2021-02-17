
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 29/10/2020 19:53
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class POSModelo
{
    public static function mdlAgregarPOS()
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
    public static function mdlActualizarPOS()
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
    public static function mdlMostrarPOS()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarPOS()
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

    public static function mdlEmpezarVenta($vts)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_ventas_vts (vts_id_venta,vts_id_cliente,vts_id_vendedor,vts_fecha_venta,vts_usuario_registro,vts_usuario_responsable,vts_estado_pagado,vts_id_modulo,vts_id_sucursal,vts_id_suscriptor) VALUES(?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindParam(1, $vts['vts_id_venta']);
            $pps->bindParam(2, $vts['vts_id_cliente']);
            $pps->bindParam(3, $vts['vts_id_vendedor']);
            $pps->bindParam(4, $vts['vts_fecha_venta']);
            $pps->bindParam(5, $vts['vts_usuario_registro']);
            $pps->bindParam(6, $vts['vts_usuario_responsable']);
            $pps->bindParam(7, $vts['vts_estado_pagado']);
            $pps->bindParam(8, $vts['vts_id_modulo']);
            $pps->bindParam(9, $vts['vts_id_sucursal']);
            $pps->bindParam(10, $vts['vts_id_suscriptor']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarVentaSiguientePOS()
    {
        try {
            //code...
            $sql = "SELECT (vts_id_venta+1) AS vts_id_venta FROM tbl_ventas_vts  ORDER BY vts_id_venta DESC limit 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarVentaDetalleProducto($dpds_id_producto, $dpds_id_venta)
    {
        try {
            //code...
            $sql = "SELECT *   FROM tbl_detale_productos_dpds WHERE dpds_id_producto = ? AND dpds_id_venta = ? AND (dpds_id_sucursal = ? AND dpds_id_suscriptor = ?  ) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dpds_id_producto);
            $pps->bindValue(2, $dpds_id_venta);
            $pps->bindValue(3, SUCURSAL_ID);
            $pps->bindValue(4, CLIENTE_ID);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlRegistroVentaDetalleProducto($dpds)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_detale_productos_dpds (dpds_id_producto,dpds_id_venta,dpds_precio_compra,dpds_total_compra,dpds_precio_venta,dpds_cantidad,dpds_ganancia,dpds_total,dpds_estado_detalle,dpds_id_sucursal,dpds_id_suscriptor) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dpds['dpds_id_producto']);
            $pps->bindValue(2, $dpds['dpds_id_venta']);
            $pps->bindValue(3, $dpds['dpds_precio_compra']);
            $pps->bindValue(4, $dpds['dpds_total_compra']);
            $pps->bindValue(5, $dpds['dpds_precio_venta']);
            $pps->bindValue(6, $dpds['dpds_cantidad']);
            $pps->bindValue(7, $dpds['dpds_ganancia']);
            $pps->bindValue(8, $dpds['dpds_total']);
            $pps->bindValue(9, $dpds['dpds_estado_detalle']);
            $pps->bindValue(10, $dpds['dpds_id_sucursal']);
            $pps->bindValue(11, $dpds['dpds_id_suscriptor']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlActualizarVentaDetalleProducto($dpds)
    {
        try {
            //code...
            $sql = "UPDATE  tbl_detale_productos_dpds SET  dpds_total_compra = ? ,dpds_cantidad = ?,dpds_ganancia = ?,dpds_total = ? WHERE dpds_id_detalle = ? AND (dpds_id_sucursal = ? AND dpds_id_suscriptor = ?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dpds['dpds_total_compra']);
            $pps->bindValue(2, $dpds['dpds_cantidad']);
            $pps->bindValue(3, $dpds['dpds_ganancia']);
            $pps->bindValue(4, $dpds['dpds_total']);
            $pps->bindValue(5, $dpds['dpds_id_detalle']);
            $pps->bindValue(6, SUCURSAL_ID);
            $pps->bindValue(7, CLIENTE_ID);
            $pps->execute();
            return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
