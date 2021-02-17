
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 12:00
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class PagosModelo
{
    public static function mdlAgregarPagos($ppg)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_paquetes_pagos_ppg (ppg_ficha_pago,ppg_monto,ppg_fecha_registro,ppg_concepto,ppg_referencia,ppg_usuario_registro,ppg_adeudo,ppg_estado_pagado,ppg_fecha_pagado,ppg_mp,ppg_id_sucursal) VALUES (?,?,?,?,?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg['ppg_ficha_pago']);
            $pps->bindValue(2, $ppg['ppg_monto']);
            $pps->bindValue(3, $ppg['ppg_fecha_registro']);
            $pps->bindValue(4, $ppg['ppg_concepto']);
            $pps->bindValue(5, $ppg['ppg_referencia']);
            $pps->bindValue(6, $ppg['ppg_usuario_registro']);
            $pps->bindValue(7, $ppg['ppg_adeudo']);
            $pps->bindValue(8, $ppg['ppg_estado_pagado']);
            $pps->bindValue(9, $ppg['ppg_fecha_pagado']);
            $pps->bindValue(10, $ppg['ppg_mp']);
            $pps->bindValue(11, $ppg['ppg_id_sucursal']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarPagos()
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


    public static function mdlMostrarPagosAlumnos($fpg_alumno)
    {
        try {
            //code...
            $sql = "SELECT fpg.*,pqt.*,usr.* FROM tbl_ficha_pago_fpg fpg JOIN tbl_paquete_pqt pqt ON pqt.pqt_sku = fpg_paquete JOIN tbl_usuarios_usr usr ON usr.usr_id = fpg.fpg_alumno WHERE fpg.fpg_alumno = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $fpg_alumno);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarAbonosAlumno($ppg_id)
    {
        try {
            //code...
            $sql = " SELECT fpg.* FROM tbl_ficha_pago_fpg fpg WHERE fpg.fpg_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg_id);
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


    public static function mdlMostrarAbonosAlumnoConcepto($ppg_ficha_pago, $ppg_concepto)
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_paquetes_pagos_ppg  WHERE ppg_ficha_pago = ? AND ppg_concepto = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg_ficha_pago);
            $pps->bindValue(2, $ppg_concepto);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarDatosFichaPago($ppg)
    {
        try {
            //code...
            $sql = "SELECT ppg.ppg_adeudo,fpg.*  FROM tbl_paquetes_pagos_ppg ppg JOIN tbl_ficha_pago_fpg fpg ON fpg.fpg_id = ppg.ppg_ficha_pago WHERE ppg.ppg_ficha_pago = ? AND ppg.ppg_concepto = ? AND ppg_id_sucursal = ? ORDER BY ppg.ppg_id DESC LIMIT 1 ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg['ppg_ficha_pago']);
            $pps->bindValue(2, $ppg['ppg_concepto']);
            $pps->bindValue(3, $ppg['ppg_id_sucursal']);
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
    public static function mdlMostrarPagos()
    {
        try {
            //code...
            $sql = "SELECT ppg.*,pqt.pqt_nombre,usr.usr_nombre,usr.usr_matricula FROM tbl_paquetes_pagos_ppg ppg JOIN tbl_ficha_pago_fpg fpg ON fpg.fpg_id = ppg.ppg_ficha_pago JOIN tbl_paquete_pqt pqt ON pqt.pqt_sku = fpg.fpg_paquete JOIN tbl_usuarios_usr usr ON usr.usr_id = fpg.fpg_alumno";
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
    public static function mdlEliminarPagos()
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
