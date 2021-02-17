
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 02/12/2020 17:09
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class CuponesModelo
{
    public static function mdlAgregarCupones($cps)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_cupones_cps (cps_codigo,cps_nombre,cps_asociado,cps_fecha_inicio,cps_fecha_fin,cps_tope,cps_usuario_registro,cps_fecha_registro,cps_sku_producto,cps_restricciones)  VALUES(?,?,?,?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cps['cps_codigo']);
            $pps->bindValue(2, $cps['cps_nombre']);
            $pps->bindValue(3, $cps['cps_asociado']);
            $pps->bindValue(4, $cps['cps_fecha_inicio']);
            $pps->bindValue(5, $cps['cps_fecha_fin']);
            $pps->bindValue(6, $cps['cps_tope']);
            $pps->bindValue(7, $cps['cps_usuario_registro']);
            $pps->bindValue(8, $cps['cps_fecha_registro']);
            $pps->bindValue(9, $cps['cps_sku_producto']);
            $pps->bindValue(10, $cps['cps_restricciones']);
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
    public static function mdlActualizarCupones()
    {
        try {
            //code...
            $sql = " ";
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
    public static function mdlMostrarCupones($cps_codigo = "")
    {
        try {
            //code...
            if ($cps_codigo != "") {
                $sql = "SELECT * FROM tbl_cupones_cps WHERE cps_codigo = ?";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $cps_codigo);
                $pps->execute();
                return $pps->fetch();
            } else {
                $sql = "SELECT * FROM tbl_cupones_cps WHERE cps_estado = 1";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarCupones()
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

    public static function mdlAcualizarContadorCupon($cps_codigo)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cupones_cps SET cps_tope = cps_tope -1 WHERE cps_codigo = ?;
            UPDATE tbl_cupones_cps SET cps_uso = cps_uso +1 WHERE cps_codigo = ?;
            ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cps_codigo);
            $pps->bindValue(2, $cps_codigo);
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
}
