
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/02/2021 12:50
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class AlmacenesModelo
{
    public static function mdlAgregarAlmacenes($ams)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_almacenes_ams (ams_nombre,ams_id_sucursal,ams_fecha_registro,ams_usuario_registro) VALUES(?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams['ams_nombre']);
            $pps->bindValue(2, $ams['ams_id_sucursal']);
            $pps->bindValue(3, $ams['ams_fecha_registro']);
            $pps->bindValue(4, $ams['ams_usuario_registro']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarAlmacenes()
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
    public static function mdlMostrarAlmacenes($scl_id = "")
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_id_sucursal = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $scl_id);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarAlmacenes()
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

    public static function mdlMostrarAlamcenesTraspaso($tps_tipo, $scl_id = "")
    {


        try {
            //code...
            if ($tps_tipo == 'I') {
                $sql = "SELECT ams.*,scl.* FROM tbl_almacenes_ams ams JOIN tbl_sucursal_scl scl ON ams.ams_id_sucursal = scl.scl_id  WHERE ams.ams_id_sucursal = ?";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $scl_id);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($tps_tipo == 'E') {
                $sql = "SELECT ams.*,scl.* FROM tbl_almacenes_ams ams JOIN tbl_sucursal_scl scl ON ams.ams_id_sucursal = scl.scl_id";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
