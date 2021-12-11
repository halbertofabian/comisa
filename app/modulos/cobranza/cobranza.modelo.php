
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 18/08/2021 12:07
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class CobranzaModelo
{
    public static function mdlAgregarCobranza()
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
    public static function mdlActualizarCobranza()
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
    public static function mdlMostrarCobranza()
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
    public static function mdlEliminarCobranza()
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
    public static function mdlMostrarCarteleraCobranza($ruta)
    {
        try {
            //code...
            $sql = "SELECT cra.*,crt.ctr_id,crt.ctr_folio,crt.ctr_cliente, crt.clts_telefono, crt.clts_curp, crt.clts_domicilio, crt.clts_col, crt.clts_entre_calles, crt.clts_coordenadas, crt.clts_fachada_color, crt.clts_puerta_color, crt.ctr_numero_cuenta, crt.ctr_ruta, crt.ctr_productos, crt.ctr_forma_pago, crt.ctr_dia_pago, crt.ctr_plazo_credito, crt.ctr_pago_credito, crt.ctr_total, crt.ctr_enganche, crt.sobre_enganche_pendiente, crt.ctr_pago_adicional, crt.ctr_saldo_actual, crt.ctr_fecha_contrato,crt.ctr_proximo_pago, crt.ctr_total_pagado FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 crt ON crt.ctr_id = cra.cra_contrato WHERE crt.ctr_ruta = ? AND  cra.cra_fecha_cobro = '" . FECHA_ACTUAL . "' OR cra.cra_fecha_reagenda = '" . FECHA_ACTUAL . "' ORDER BY cra.cra_orden ASC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ruta);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarSaldos($ctr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_total=?,ctr_enganche=?,ctr_pago_adicional=?,ctr_saldo=?,ctr_saldo_actual=?,ctr_ultima_fecha_abono=?,ctr_total_pagado = ?, ctr_forma_pago = ?, ctr_dia_pago = ?, ctr_pago_credito = ?, ctr_status_cuenta = ?WHERE ctr_numero_cuenta = ? AND ctr_ruta = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $ctr['ctr_total']);
            $pps->bindValue(2, $ctr['ctr_enganche']);
            $pps->bindValue(3, $ctr['ctr_pago_adicional']);
            $pps->bindValue(4, $ctr['ctr_saldo']);
            $pps->bindValue(5, $ctr['ctr_saldo_actual']);
            $pps->bindValue(6, $ctr['ctr_ultima_fecha_abono']);
            $pps->bindValue(7, $ctr['ctr_total_pagado']);
            $pps->bindValue(8, $ctr['ctr_forma_pago']);
            $pps->bindValue(9, $ctr['ctr_dia_pago']);
            $pps->bindValue(10, $ctr['ctr_pago_credito']);
            $pps->bindValue(11, $ctr['ctr_status_cuenta']);
            $pps->bindValue(12, $ctr['ctr_numero_cuenta']);
            $pps->bindValue(13, $ctr['ctr_ruta']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public  static function mdlCambiarEstadoCarteleraCompletado($cra_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET cra_estado = 'COMPLETADO' WHERE cra_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            throw $th;
            return null;
        } finally {
            $con = null;
            $pps = null;
        }
    }

    public  static function mdlInsertarSiguienteEnrutamiento($cra)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_cartelera_cra (cra_contrato, cra_fecha_cobro, cra_orden) VALUES(?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_contrato']);
            $pps->bindValue(2, $cra['cra_fecha_cobro']);
            $pps->bindValue(3, $cra['cra_orden']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            throw $th;
            return null;
        } finally {
            $con = null;
            $pps = null;
        }
    }

    public  static function mdlRegistrarAbono($abs)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_abonos_cobranza_abs (abs_folio,abs_id_cobrador,abs_id_contrato,abs_monto,abs_mp,abs_referancia,abs_nota,abs_fecha_cobro) VALUES(?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs['abs_folio']);
            $pps->bindValue(2, $abs['abs_id_cobrador']);
            $pps->bindValue(3, $abs['abs_id_contrato']);
            $pps->bindValue(4, dnum($abs['abs_monto']));
            $pps->bindValue(5, $abs['abs_mp']);
            $pps->bindValue(6, $abs['abs_referancia']);
            $pps->bindValue(7, $abs['abs_nota']);
            $pps->bindValue(8, $abs['abs_fecha_cobro']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarAbonosPorAutorizarByCobrador($abs_id_cobrador)
    {
        try {
            //code...
            $sql = "SELECT ctr.ctr_cliente,abs_c.*,cra.cra_fecha_cobro,cra.cra_fecha_reagenda,ctr.ctr_id,ctr.ctr_folio,ctr.ctr_ruta,ctr.ctr_numero_cuenta,ctr.ctr_status_cuenta,ctr.ctr_saldo_actual,usr.usr_nombre FROM tbl_abonos_cobranza_abs abs_c JOIN tbl_cartelera_cra cra ON abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id JOIN tbl_usuarios_usr usr ON abs_c.abs_id_cobrador = usr.usr_id WHERE abs_id_cobrador = ? AND  abs_estado_abono =  'POR AUTORIZAR' ORDER BY cra.cra_orden ASC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_id_cobrador);
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
}
