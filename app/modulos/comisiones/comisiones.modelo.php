
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 13/04/2021 11:42
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class ComisionesModelo
{
    public static function mdlAgregarComisiones()
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
    public static function mdlActualizarComisiones()
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
    public static function mdlMostrarComisiones()
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
    public static function mdlEliminarComisiones()
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

    public static function mdlMostrarInfoCobranzaComisiones($iduser, $fechai, $fechaf)
    {

        try {
            //code...
            $sql = "SELECT igs.*, usr.usr_nombre FROM tbl_ingresos_igs igs 
            JOIN tbl_usuarios_usr usr ON igs.igs_usuario_responsable = usr.usr_id 
            WHERE (igs.igs_fecha_registro BETWEEN ? AND ?) AND 
            ((igs.igs_tipo='COBRANZA' OR igs.igs_tipo = 'CONTADO_VENTAS' OR igs.igs_tipo = 'S/E_VENTAS') AND igs.igs_usuario_responsable=?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $fechai);
            $pps->bindValue(2, $fechaf);
            $pps->bindValue(3, $iduser);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarGastos($iduser, $fechai, $fechaf)
    {

        try {
            //code...
            $sql = "SELECT * FROM tbl_gastos_tgts 
            WHERE (tgts_fecha_gasto BETWEEN ? AND ?) AND 
            (tgts_categoria='11' AND tgts_usuario_responsable=?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $fechai);
            $pps->bindValue(2, $fechaf);
            $pps->bindValue(3, $iduser);
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
