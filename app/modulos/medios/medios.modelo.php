
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 22/10/2020 15:27
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class MediosModelo
{
    public static function mdlAgregarMedios($mds)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_medios_mds (mds_tipo,mds_nombre,mds_titulo,mds_texto_alternativo,mds_leyenda,mds_descripcion,mds_url,mds_fecha_subida,mds_usuario_registro) VALUES(?,?,?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindParam(1, $mds['mds_tipo']);
            $pps->bindParam(2, $mds['mds_nombre']);
            $pps->bindParam(3, $mds['mds_titulo']);
            $pps->bindParam(4, $mds['mds_texto_alternativo']);
            $pps->bindParam(5, $mds['mds_leyenda']);
            $pps->bindParam(6, $mds['mds_descripcion']);
            $pps->bindParam(7, $mds['mds_url']);
            $pps->bindParam(8, $mds['mds_fecha_subida']);
            $pps->bindParam(9, $mds['mds_usuario_registro']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarMedios()
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
    public static function mdlMostrarMedios($mds_id = "")
    {
        try {
            //code...
            if ($mds_id == "") {
                $sql = "SELECT  * FROM tbl_medios_mds ORDER BY mds_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($mds_id != "") {
                $sql = "SELECT  * FROM tbl_medios_mds WHERE mds_id = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $mds_id);
                $pps->execute();
                return $pps->fetch();
            }
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarMedios($mds_id)
    {
        try {
            //code...
            $sql = "DELETE FROM tbl_medios_mds WHERE mds_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $mds_id);
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
