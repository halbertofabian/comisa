
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
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_total=?,ctr_enganche=?,ctr_pago_adicional=?,ctr_saldo=?,ctr_saldo_actual=?,ctr_ultima_fecha_abono=?,ctr_total_pagado=? WHERE ctr_numero_cuenta = ? AND ctr_ruta = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr['ctr_total']);
            $pps->bindValue(2, $ctr['ctr_enganche']);
            $pps->bindValue(3, $ctr['ctr_pago_adicional']);
            $pps->bindValue(4, $ctr['ctr_saldo']);
            $pps->bindValue(5, $ctr['ctr_saldo_actual']);
            $pps->bindValue(6, $ctr['ctr_ultima_fecha_abono']);
            $pps->bindValue(7, $ctr['ctr_total_pagado']);
            $pps->bindValue(8, $ctr['ctr_numero_cuenta']);
            $pps->bindValue(9, $ctr['ctr_ruta']);
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
