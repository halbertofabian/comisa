
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
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class TraspasosModelo
{
    public static function mdlAgregarTraspasos()
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
    public static function mdlActualizarTraspasos()
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
    public static function mdlMostrarTraspasos()
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
    public static function mdlEliminarTraspasos()
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

    public static function mdlTraspasarProductosAlamacen($tps)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_traspasos_tps(tps_num_traspaso,tps_user_registro, tps_tipo, 
            tps_ams_id_origen, tps_ams_id_destino, tps_user_id_receptor, tps_lista_productos, tps_fecha) 
            VALUES (?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tps['tps_num_traspaso']);
            $pps->bindValue(2, $tps['tps_user_registro']);
            $pps->bindValue(3, $tps['tps_tipo']);
            $pps->bindValue(4, $tps['tps_ams_id_origen']);
            $pps->bindValue(5, $tps['tps_ams_id_destino']);
            $pps->bindValue(6, $tps['tps_user_id_receptor']);
            $pps->bindValue(7, $tps['tps_lista_productos']);
            $pps->bindValue(8, $tps['tps_fecha']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarUltimoTraspaso()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_traspasos_tps ORDER BY tps_id DESC LIMIT 1 ";
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

    public static function mdlConsultarTraspasoId($idtps)
    {
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
            $pps->bindValue(1, $idtps);
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
}
