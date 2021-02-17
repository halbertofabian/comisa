
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 10:46
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class InscripcionesModelo
{
    public static function mdlAgregarInscripciones($ins)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_ficha_pago_fpg(fpg_alumno,fpg_paquete,fpg_inscripcion,fpg_examen,fpg_guia,fpg_incorporacion,fpg_certificado,fpg_semana,fpg_numero_semana,fpg_liga,fpg_usuario_registro,fpg_fecha_registro,fpg_id_sucursal) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ins['ins_alumno']);
            $pps->bindValue(2, $ins['ins_paquete']);
            $pps->bindValue(3, $ins['fpg_inscripcion']);
            $pps->bindValue(4, $ins['fpg_examen']);
            $pps->bindValue(5, $ins['fpg_guia']);
            $pps->bindValue(6, $ins['fpg_incorporacion']);
            $pps->bindValue(7, $ins['fpg_certificado']);
            $pps->bindValue(8, $ins['fpg_semana']);
            $pps->bindValue(9, $ins['fpg_numero_semana']);
            $pps->bindValue(10, $ins['fpg_liga']);
            $pps->bindValue(11, $ins['fpg_usuario_registro']);
            $pps->bindValue(12, FECHA);
            $pps->bindValue(13, $_SESSION['session_suc']['scl_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarInscripciones()
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
    public static function mdlMostrarInscripciones($usr_id = "")
    {
        try {
            //code...
            if ($usr_id == "") {
                $sql = "SELECT fpg.*, pqt.*,usr.* FROM tbl_ficha_pago_fpg fpg JOIN tbl_usuarios_usr usr ON usr.usr_id = fpg.fpg_alumno JOIN tbl_paquete_pqt pqt ON pqt.pqt_sku = fpg.fpg_paquete WHERE fpg.fpg_id_sucursal = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($usr_id != "") {
                $sql = "SELECT fpg.*, pqt.*,usr.* FROM tbl_ficha_pago_fpg fpg JOIN tbl_usuarios_usr usr ON usr.usr_id = fpg.fpg_alumno JOIN tbl_paquete_pqt pqt ON pqt.pqt_sku = fpg.fpg_paquete WHERE usr.usr_id = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $usr_id);
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

    public static function mdlMostrarUltimaInscripcionAlumno($usr_id)
    {
        try {
            //code...
            $sql = "SELECT fpg.fpg_id,usr.usr_matricula FROM tbl_ficha_pago_fpg fpg JOIN tbl_usuarios_usr usr ON usr.usr_id = fpg.fpg_alumno WHERE usr.usr_id = ? ORDER BY fpg.fpg_id DESC LIMIT 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarInscripciones()
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

    public static function mdlMostrarInscripcionesById($fpg_id)
    {
        try {
            //code...
            $sql = "SELECT fpg.*,pqt.*,usr.* FROM tbl_ficha_pago_fpg fpg JOIN tbl_paquete_pqt pqt ON pqt.pqt_sku = fpg.fpg_paquete JOIN tbl_usuarios_usr usr ON usr.usr_id = fpg.fpg_alumno WHERE fpg.fpg_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $fpg_id);
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
