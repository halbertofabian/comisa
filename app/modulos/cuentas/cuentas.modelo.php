
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
            $pps->bindValue(1, $cbco['cbco_nombre']);
            $pps->bindValue(2, $cbco['cbco_saldo']);

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
    public static function mdlActualizarCuentas()
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


    public static function mdlActualizarSaldoCuenta($cbco_id, $cbco_ingreso)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cuentas_banco_cbco SET cbco_saldo = cbco_saldo + ?  WHERE cbco_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cbco_ingreso);
            $pps->bindValue(2, $cbco_id);
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
    public static function mdlMostrarCuentas()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_cuentas_banco_cbco";
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
    public static function mdlEliminarCuentas()
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

    public static function mdlMostrarCuentasId($id_cuenta)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_ingresos_igs WHERE igs_cuenta = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $id_cuenta);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarNombreCTA($id_cuenta)
    {
        try {
            //code...
            $sql = "SELECT cbco_nombre FROM tbl_cuentas_banco_cbco WHERE cbco_id=$id_cuenta";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
