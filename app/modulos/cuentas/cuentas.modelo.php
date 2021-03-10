
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/03/2021 08:35
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class CuentasModelo
{
    public static function mdlAgregarCuentas($cbco)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_cuentas_banco_cbco (cbco_nombre,cbco_saldo) VALUES(?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps -> bindValue(1,$cbco['cbco_nombre']);
            $pps -> bindValue(2,$cbco['cbco_saldo']);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarCuentas()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarCuentas()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_cuentas_banco_cbco";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps ->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarCuentas()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}


