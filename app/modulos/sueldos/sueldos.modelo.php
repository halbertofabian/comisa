
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 14/04/2021 17:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class SueldosModelo
{
    public static function mdlAgregarSueldos()
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
    public static function mdlActualizarSueldos()
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
    public static function mdlMostrarSueldos($idus)
    {
        try {
            //code...
            $sql = "SELECT usr_deuda_int,usr_deuda_ext,usr_sueldo,usr_imss FROM tbl_usuarios_usr WHERE usr_id=?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $idus);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarSueldos()
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

    
    public static function mdlmostrarInfoDeuda($inf)
    {
        try {
            //code...
            $sql = "SELECT pms.*, usr.usr_deuda_ext,usr.usr_deuda_int FROM tbl_prestamos_pms pms
            JOIN tbl_usuarios_usr usr ON usr.usr_id=pms.pms_usuario 
            WHERE pms.pms_usuario=? AND pms.pms_tipo=?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $inf['pms_usuario']);
            $pps->bindValue(2, $inf['pms_tipo']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlRegistrarAbono($infAbono)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_abonos_empleados_absemp(absemp_fecha, absemp_abono, absemp_id_usuario, absemp_tipo_prestamo) 
            VALUES (?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $infAbono['absemp_fecha']);
            $pps->bindValue(2, $infAbono['absemp_abono']);
            $pps->bindValue(3, $infAbono['absemp_id_usuario']);
            $pps->bindValue(4, $infAbono['absemp_tipo_prestamo']);
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
