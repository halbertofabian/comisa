
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 04/01/2021 22:49
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class SucursalesModelo
{
    public static function mdlAgregarSucursales($scl)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_sucursal_scl (scl_id,scl_nombre,scl_direccion,scl_rfc,scl_telefono,scl_sub_fijo,scl_acceso_usr,scl_usuario_registro,scl_fecha_registro) VALUES (?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $scl['scl_id']);
            $pps->bindValue(2, $scl['scl_nombre']);
            $pps->bindValue(3, $scl['scl_direccion']);
            $pps->bindValue(4, $scl['scl_rfc']);
            $pps->bindValue(5, $scl['scl_telefono']);
            $pps->bindValue(6, $scl['scl_sub_fijo']);
            $pps->bindValue(7, $scl['scl_acceso_usr']);
            $pps->bindValue(8, $scl['scl_usuario_registro']);
            $pps->bindValue(9, $scl['scl_fecha_registro']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarSucursales()
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
    public static function mdlMostrarSucursales($scl_id = "")
    {
        try {
            //code...
            if ($scl_id == "") {
                $sql = "SELECT * FROM tbl_sucursal_scl";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);

                $pps->execute();
                return $pps->fetchAll();
            } elseif ($scl_id != "") {
                $sql = "SELECT * FROM tbl_sucursal_scl WHERE scl_id = ?";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $scl_id);
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
    public static function mdlEliminarSucursales()
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
