
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
            $sql = "INSERT INTO tbl_ingresos_igs (igs_concepto,igs_monto,igs_fecha_registro,igs_usuario_registro,igs_mp,igs_id_sucursal,igs_id_corte,igs_ruta,igs_usuario_responsable,igs_id_corte_2,igs_referencia,igs_tipo,igs_cuenta) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs['igs_concepto']);
            $pps->bindValue(2, $igs['igs_monto']);
            $pps->bindValue(3, $igs['igs_fecha_registro']);
            $pps->bindValue(4, $igs['igs_usuario_registro']);
            $pps->bindValue(5, $igs['igs_mp']);
            $pps->bindValue(6, $igs['igs_id_sucursal']);
            $pps->bindValue(7, $igs['igs_id_corte']);
            $pps->bindValue(8, $igs['igs_ruta']);
            $pps->bindValue(9, $igs['igs_usuario_responsable']);
            $pps->bindValue(10, $igs['igs_id_corte_2']);
            $pps->bindValue(11, $igs['igs_referencia']);
            $pps->bindValue(12, $igs['igs_tipo']);
            $pps->bindValue(13, $igs['igs_cuenta']);
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
    public static function mdlMostrarIngresos($usr_id = "")
    {
        try {
            //code...
            if ($usr_id == "") {
                $sql = "SELECT * FROM tbl_ingresos_igs WHERE igs_id_sucursal =? ORDER BY igs_id DESC";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($usr_id != "") {
                $sql = "SELECT * FROM tbl_ingresos_igs WHERE igs_id_sucursal =? AND igs_usuario_registro = ? ORDER BY igs_id DESC";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                $pps->bindValue(2, $usr_id);
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

    public static function mdlConsultarIngresoByCaja($igs_id_corte)
    {

        try {
            //code...
            $sql = "SELECT igs.*,usr.usr_nombre FROM tbl_ingresos_igs igs JOIN tbl_usuarios_usr usr ON usr.usr_id = igs.igs_usuario_responsable  WHERE igs_id_corte = ? ORDER BY igs_id DESC  ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }

    public static function mdlConsultarCajaAbierta($igs_id_corte)
    {

        try {
            //code...
            $sql = "SELECT copn_fecha_cierre FROM tbl_caja_open_copn WHERE copn_id = ?  ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }



    public static function mdlConsultarIngresoByCaja2($igs_id_corte_2)
    {

        try {
            //code...
            $sql = "SELECT igs.*,usr.usr_nombre FROM tbl_ingresos_igs igs JOIN tbl_usuarios_usr usr ON usr.usr_id = igs.igs_usuario_responsable  WHERE igs_id_corte_2 = ? ORDER BY igs_id DESC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte_2);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }

    public static function mdlMostrarResumenIngresosId($inf)
    {
        try {
            $sql = "SELECT igs.*,usr.usr_nombre FROM tbl_ingresos_igs igs 
            JOIN tbl_usuarios_usr usr ON usr.usr_id=igs.igs_usuario_responsable
            WHERE (igs.igs_concepto!='INICIO DE CAJA' AND igs.igs_concepto!='REINGRESOS_COBRANZA') AND 
            (igs.igs_fecha_registro BETWEEN ? AND ?) AND igs.igs_usuario_responsable=? ORDER BY igs.igs_fecha_registro DESC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $inf['igs_fecha_inicio']);
            $pps->bindValue(2, $inf['igs_fecha_fin']);
            $pps->bindValue(3, $inf['igs_usuario_responsable']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarResumenIngresosAll($inf)
    {
        try {
            $sql = "SELECT igs.*,usr.usr_nombre FROM tbl_ingresos_igs igs 
            JOIN tbl_usuarios_usr usr ON usr.usr_id=igs.igs_usuario_responsable
            WHERE (igs.igs_concepto!='INICIO DE CAJA' AND igs.igs_concepto!='REINGRESOS_COBRANZA') AND 
            (igs.igs_fecha_registro BETWEEN ? AND ?) ORDER BY igs.igs_fecha_registro DESC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $inf['igs_fecha_inicio']);
            $pps->bindValue(2, $inf['igs_fecha_fin']);
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
