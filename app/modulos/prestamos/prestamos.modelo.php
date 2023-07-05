
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 29/03/2021 10:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class PrestamosModelo
{
    public static function mdlAgregarPrestamos($pms)
    {
        try {
            $sql = "INSERT INTO tbl_prestamos_pms (pms_usuario,pms_cantidad,pms_cantidad_adeudo,pms_semanas_pago,pms_fecha_registro,pms_usuario_registro,pms_tipo,pms_codigo) VALUES(?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pms['pms_usuario']);
            $pps->bindValue(2, $pms['pms_cantidad']);
            $pps->bindValue(3, $pms['pms_cantidad_adeudo']);
            $pps->bindValue(4, $pms['pms_semanas_pago']);
            $pps->bindValue(5, $pms['pms_fecha_registro']);
            $pps->bindValue(6, $pms['pms_usuario_registro']);
            $pps->bindValue(7, $pms['pms_tipo']);
            $pps->bindValue(8, $pms['pms_codigo']);
            $pps->execute();
            // return $pps->rowCount() > 0;
            return $con->lastInsertId();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarPrestamos()
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
    public static function mdlMostrarPrestamos()
    {
        try {
            //code...
            $sql = "SELECT pms.*, usr.usr_nombre FROM tbl_prestamos_pms pms JOIN tbl_usuarios_usr usr ON pms.pms_usuario = usr.usr_id WHERE pms.pms_codigo !=''; ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlQuitarPrestamo($pms_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_prestamos_pms SET pms_codigo = '' WHERE pms_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pms_id);
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
    public static function mdlMostrarPrestamosById($pms_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_prestamos_pms WHERE pms_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pms_id);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlAprobarEstadoPrestamo($pms_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_prestamos_pms SET pms_estado_prestamo = 'APROBADO' WHERE pms_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pms_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarPrestamos()
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
}
