
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/11/2020 13:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class IngresosModelo
{
    public static function mdlAgregarIngresos($igs)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_ingresos_igs (igs_concepto,igs_monto,igs_fecha_registro,igs_usuario_registro,igs_mp,igs_id_sucursal,igs_id_corte) VALUES(?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs['igs_concepto']);
            $pps->bindValue(2, $igs['igs_monto']);
            $pps->bindValue(3, $igs['igs_fecha_registro']);
            $pps->bindValue(4, $igs['igs_usuario_registro']);
            $pps->bindValue(5, $igs['igs_mp']);
            $pps->bindValue(6, $igs['igs_id_sucursal']);
            $pps->bindValue(7, $igs['igs_id_corte']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarIngresos()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarIngresos()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_ingresos_igs WHERE igs_id_sucursal =? ORDER BY igs_id DESC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarIngresos($igs_id)
    {
        try {
            //code...
            $sql = "DELETE FROM tbl_ingresos_igs WHERE igs_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarIngresos2Fecha($fecha_inicio, $fecha_final)
    {
        try {
            $sql = "SELECT * FROM tbl_ingresos_igs WHERE igs_fecha_registro BETWEEN '$fecha_inicio' AND '$fecha_final' ";
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
}
