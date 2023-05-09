
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 02/04/2021 12:42
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class ProveedoresModelo
{
    public static function mdlAgregarProveedores($pvs)
    {
        try {
            $sql = "INSERT INTO tbl_proveedores_pvs (pvs_nombre,pvs_telefono) VALUES(?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pvs['pvs_nombre']);
            $pps->bindValue(2, $pvs['pvs_telefono']);
            $pps->execute();
            return $con->lastInsertId();
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarProveedores()
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
    public static function mdlMostrarProveedores()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_proveedores_pvs WHERE pvs_status = 1";
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
    public static function mdlMostrarProveedoresByNombre($pvs_nombre)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_proveedores_pvs WHERE pvs_nombre = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pvs_nombre);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarProveedoresByID($pvs_id )
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_proveedores_pvs WHERE pvs_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pvs_id );
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarProveedores()
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
