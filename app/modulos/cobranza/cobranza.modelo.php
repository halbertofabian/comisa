
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
    public static function ContratosCobranza($ruta)
    {
        try {
            //code...
            // $sql = "SELECT cra.*,crt.ctr_id,crt.ctr_folio,crt.ctr_cliente, crt.clts_telefono, crt.clts_curp, crt.clts_domicilio, crt.clts_col, crt.clts_entre_calles, crt.clts_coordenadas, crt.clts_fachada_color, crt.clts_puerta_color, crt.ctr_numero_cuenta, crt.ctr_ruta, crt.ctr_productos, crt.ctr_forma_pago, crt.ctr_dia_pago, crt.ctr_plazo_credito, crt.ctr_pago_credito, crt.ctr_total, crt.ctr_enganche, crt.sobre_enganche_pendiente, crt.ctr_pago_adicional, crt.ctr_saldo_actual, crt.ctr_fecha_contrato,crt.ctr_proximo_pago, crt.ctr_total_pagado FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 crt ON crt.ctr_id = cra.cra_contrato WHERE  crt.ctr_status_cuenta = 'VIGENTE' AND crt.ctr_enrutar = 'S' AND  cra.cra_cobranza_status = '1' AND crt.ctr_ruta = ?  ORDER BY cra.cra_orden ASC";
            $sql = "SELECT cra.*,crt.ctr_id,crt.ctr_folio,crt.ctr_cliente, crt.clts_telefono, crt.clts_curp, crt.clts_domicilio, crt.clts_col, crt.clts_entre_calles, crt.clts_coordenadas, crt.clts_fachada_color, crt.clts_puerta_color, crt.ctr_numero_cuenta, crt.ctr_ruta, crt.ctr_productos, crt.ctr_forma_pago, crt.ctr_dia_pago, crt.ctr_plazo_credito, crt.ctr_pago_credito, crt.ctr_total, crt.ctr_enganche, crt.sobre_enganche_pendiente, crt.ctr_pago_adicional, crt.ctr_saldo_actual, crt.ctr_fecha_contrato,crt.ctr_proximo_pago, crt.ctr_total_pagado, crt.ctr_ultima_fecha_abono, crt.ctr_elaboro FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 crt ON crt.ctr_id = cra.cra_contrato WHERE  crt.ctr_status_cuenta = 'VIGENTE'  AND  cra.cra_cobranza_status = '1' AND crt.ctr_ruta = ?  ORDER BY cra.cra_orden ASC";

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
    public static function mdlMostrarCarteleraCobranza($ruta)
    {
        try {
            //code...
            // $sql = "SELECT cra.*,crt.ctr_id,crt.ctr_folio,crt.ctr_cliente, crt.clts_telefono, crt.clts_curp, crt.clts_domicilio, crt.clts_col, crt.clts_entre_calles, crt.clts_coordenadas, crt.clts_fachada_color, crt.clts_puerta_color, crt.ctr_numero_cuenta, crt.ctr_ruta, crt.ctr_productos, crt.ctr_forma_pago, crt.ctr_dia_pago, crt.ctr_plazo_credito, crt.ctr_pago_credito, crt.ctr_total, crt.ctr_enganche, crt.sobre_enganche_pendiente, crt.ctr_pago_adicional, crt.ctr_saldo_actual, crt.ctr_fecha_contrato,crt.ctr_proximo_pago, crt.ctr_total_pagado FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 crt ON crt.ctr_id = cra.cra_contrato WHERE  crt.ctr_status_cuenta = 'VIGENTE' AND crt.ctr_enrutar = 'S' AND  cra.cra_cobranza_status = '1' AND crt.ctr_ruta = ?  ORDER BY cra.cra_orden ASC";
            $sql = "SELECT cra.*,crt.ctr_id,crt.ctr_folio,crt.ctr_cliente, crt.clts_telefono, crt.clts_curp, crt.clts_domicilio, crt.clts_col, crt.clts_entre_calles, crt.clts_coordenadas, crt.clts_fachada_color, crt.clts_puerta_color, crt.ctr_numero_cuenta, crt.ctr_ruta, crt.ctr_productos, crt.ctr_forma_pago, crt.ctr_dia_pago, crt.ctr_plazo_credito, crt.ctr_pago_credito, crt.ctr_total, crt.ctr_enganche, crt.sobre_enganche_pendiente, crt.ctr_pago_adicional, crt.ctr_saldo_actual, crt.ctr_fecha_contrato,crt.ctr_proximo_pago, crt.ctr_total_pagado, crt.ctr_ultima_fecha_abono, crt.ctr_elaboro FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 crt ON crt.ctr_id = cra.cra_contrato WHERE  crt.ctr_status_cuenta = 'VIGENTE'  AND  cra.cra_cobranza_status = '1' AND crt.ctr_ruta = ?  ORDER BY cra.cra_orden ASC";

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
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_total=?,ctr_enganche=?,ctr_pago_adicional=?,ctr_saldo=?,ctr_saldo_actual=?,ctr_ultima_fecha_abono=?,ctr_total_pagado = ?, ctr_forma_pago = ?, ctr_dia_pago = ?, ctr_pago_credito = ?, ctr_status_cuenta = ?, ctr_proximo_pago = ?, ctr_enrutar = ?, ctr_orden = ? WHERE ctr_numero_cuenta = ? AND ctr_ruta = ?";


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
            $pps->bindValue(12, $ctr['ctr_proximo_pago']);
            $pps->bindValue(13, $ctr['ctr_enrutar']);
            $pps->bindValue(14, $ctr['ctr_orden']);
            $pps->bindValue(15, $ctr['ctr_numero_cuenta']);
            $pps->bindValue(16, $ctr['ctr_ruta']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarSaldos2($ctr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_total=?,ctr_enganche=?,ctr_pago_adicional=?,ctr_saldo=?,ctr_saldo_actual=?,ctr_ultima_fecha_abono=?,ctr_total_pagado = ?, ctr_forma_pago = ?, ctr_dia_pago = ?, ctr_pago_credito = ?, ctr_status_cuenta = ?, ctr_proximo_pago = ?, ctr_enrutar = ?, ctr_orden = ?, ctr_saldo_base = ? WHERE ctr_id = ?";


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
            $pps->bindValue(12, $ctr['ctr_proximo_pago']);
            $pps->bindValue(13, $ctr['ctr_enrutar']);
            $pps->bindValue(14, $ctr['ctr_orden']);
            $pps->bindValue(15, $ctr['ctr_saldo_base']);
            $pps->bindValue(16, $ctr['ctr_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public  static function mdlCambiarEstadoCarteleraCompletado($cra_id, $cra_fecha_proxima_pago)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET cra_fecha_proxima_pago = ?, cra_estado = 'COMPLETADO', cra_cobranza_status = 0 WHERE cra_id = ? and cra_cobranza_status = 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra_fecha_proxima_pago);
            $pps->bindValue(2, $cra_id);
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

    public static function mdlCambiarEstadoCartelera($cra)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET cra_fecha_reagenda = ?, cra_estado = ?, cra_cobranza_status = 1 WHERE cra_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_fecha_reagenda']);
            $pps->bindValue(2, $cra['cra_estado']);
            $pps->bindValue(3, $cra['cra_id']);
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

    public static function mdlCambiarEstadoCarteleraReagendado($cra)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET cra_fecha_reagenda = ?, cra_estado = 'REAGENDADO', cra_cobranza_status = 0 WHERE cra_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_fecha_reagenda']);
            $pps->bindValue(2, $cra['cra_id']);
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
    public  static function mdlInsertarSiguienteEnrutamientoReagendado($cra)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_cartelera_cra (cra_contrato, cra_fecha_cobro,cra_fecha_reagenda,cra_orden) VALUES(?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_contrato']);
            $pps->bindValue(2, $cra['cra_fecha_cobro']);
            $pps->bindValue(3, $cra['cra_fecha_reagenda']);
            $pps->bindValue(4, $cra['cra_orden']);
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
    public static function mdlMostrarAbonosPorAutorizarByCobrador($abs_id_cobrador = "")
    {
        try {
            //code...
            if ($abs_id_cobrador == "") {
                $sql = " SELECT ctr.ctr_cliente,ctr.ctr_forma_pago,ctr.ctr_dia_pago,abs_c.*,cra.cra_fecha_cobro,cra.cra_fecha_reagenda,cra.cra_fecha_proxima_pago,ctr.ctr_id,ctr.ctr_folio,ctr.ctr_ruta,ctr.ctr_numero_cuenta,ctr.ctr_status_cuenta,ctr.ctr_saldo_actual,usr.usr_nombre FROM tbl_abonos_cobranza_abs abs_c JOIN tbl_cartelera_cra cra ON abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id JOIN tbl_usuarios_usr usr ON abs_c.abs_id_cobrador = usr.usr_id WHERE  abs_estado_abono =  'POR AUTORIZAR' OR abs_estado_abono = 'CANCELADO-A' ORDER BY abs_c.abs_id ASC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } else {
                $sql = " SELECT ctr.ctr_cliente,ctr.ctr_forma_pago,ctr.ctr_dia_pago,abs_c.*,cra.cra_fecha_cobro,cra.cra_fecha_reagenda,cra.cra_fecha_proxima_pago,ctr.ctr_id,ctr.ctr_folio,ctr.ctr_ruta,ctr.ctr_numero_cuenta,ctr.ctr_status_cuenta,ctr.ctr_saldo_actual,usr.usr_nombre FROM tbl_abonos_cobranza_abs abs_c JOIN tbl_cartelera_cra cra ON abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id JOIN tbl_usuarios_usr usr ON abs_c.abs_id_cobrador = usr.usr_id WHERE ( abs_estado_abono =  'POR AUTORIZAR' OR abs_estado_abono = 'CANCELADO-A') AND abs_id_cobrador = ? ORDER BY abs_c.abs_id ASC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $abs_id_cobrador);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarAbonosByFicha($abs_save = "")
    {
        try {
            //code...

            $sql = " SELECT ctr.ctr_cliente,ctr.ctr_forma_pago,ctr.ctr_dia_pago,abs_c.*,cra.cra_fecha_cobro,cra.cra_fecha_reagenda,cra.cra_fecha_proxima_pago,ctr.ctr_id,ctr.ctr_folio,ctr.ctr_ruta,ctr.ctr_numero_cuenta,ctr.ctr_status_cuenta,ctr.ctr_saldo_actual,usr.usr_nombre FROM tbl_abonos_cobranza_abs abs_c JOIN tbl_cartelera_cra cra ON abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id JOIN tbl_usuarios_usr usr ON abs_c.abs_id_cobrador = usr.usr_id WHERE  abs_save = ? ORDER BY abs_c.abs_id ASC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_save);
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

    public static function mdlOrdenarP($ctr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_orden = ? WHERE ctr_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr['cra_orden']);
            $pps->bindValue(2, $ctr['cra_contrato']);
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
    public static function mdlMostrarCarteleraOrden()
    {
        try {
            //code...
            $sql = "SELECT cra_contrato,cra_orden FROM tbl_cartelera_cra ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
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
    public static function ContratosOrden()
    {
        try {
            //code...
            $sql = "SELECT cra_contrato,cra_orden FROM tbl_cartelera_cra ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
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

    public static function mdlRegistrarSigienteEnrutamiento($cra)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_cartelera_cra (cra_contrato,cra_fecha_cobro,cra_fecha_reagenda,cra_estado,cra_orden,cra_etiqueta) VALUES(?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_contrato']);
            $pps->bindValue(2, $cra['cra_fecha_cobro']);
            $pps->bindValue(3, $cra['cra_fecha_reagenda']);
            $pps->bindValue(4, $cra['cra_estado']);
            $pps->bindValue(5, $cra['cra_orden']);
            $pps->bindValue(6, $cra['cra_etiqueta']);
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

    public static function mdlRegistrarNuevoEnrutamiento($cra)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_cartelera_cra (cra_contrato,cra_fecha_cobro,cra_fecha_reagenda,cra_estado,cra_orden,cra_referencias) VALUES(?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_contrato']);
            $pps->bindValue(2, $cra['cra_fecha_cobro']);
            $pps->bindValue(3, $cra['cra_fecha_reagenda']);
            $pps->bindValue(4, $cra['cra_estado']);
            $pps->bindValue(5, $cra['cra_orden']);
            $pps->bindValue(6, $cra['cra_referencias']);
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
    public static function mdlActualizarSigienteEnrutamiento($cra, $cra_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET cra_fecha_cobro = ?,cra_fecha_reagenda = ?,cra_estado = ?,cra_orden = ?, cra_etiqueta = ? WHERE cra_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_fecha_cobro']);
            $pps->bindValue(2, $cra['cra_fecha_reagenda']);
            $pps->bindValue(3, $cra['cra_estado']);
            $pps->bindValue(4, $cra['cra_orden']);
            $pps->bindValue(5, $cra['cra_etiqueta']);
            $pps->bindValue(6, $cra_id);
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

    public static function mdlActualizarNuevoEnrutamiento($cra, $cra_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET cra_fecha_cobro = ?,cra_fecha_reagenda = ?,cra_estado = ?,cra_orden = ?,cra_referencias = ?  WHERE cra_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_fecha_cobro']);
            $pps->bindValue(2, $cra['cra_fecha_reagenda']);
            $pps->bindValue(3, $cra['cra_estado']);
            $pps->bindValue(4, $cra['cra_orden']);
            $pps->bindValue(5, $cra['cra_referencias']);
            $pps->bindValue(6, $cra_id);
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


    public static function mdlActualizarEnruteReagendado($cra_contrato, $cra_fecha_reagenda)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET cra_fecha_reagenda = ? WHERE cra_contrato = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra_fecha_reagenda);
            $pps->bindValue(2, $cra_contrato);
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

    public static function mdlActualizarSiguienteEnrrute($cra)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET cra_fecha_cobro = ?,cra_fecha_reagenda = ?, cra_estado = 'PENDIENTE' , cra_etiqueta = ''  WHERE cra_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_fecha_cobro']);
            $pps->bindValue(2, $cra['cra_fecha_reagenda']);
            $pps->bindValue(3, $cra['cra_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlFizalizarCobranza($next_day, $now_day)
    {
        try {
            //code...
            // $sql = "UPDATE tbl_cartelera_cra SET cra_fecha_reagenda = '2022-01-01' WHERE cra_fecha_cobro <= '2021-12-31' AND  cra_fecha_reagenda <= '2021-12-31'
            //  UPDATE tbl_cartelera_cra SET cra_fecha_reagenda = '2021-12-28' WHERE cra_fecha_reagenda <= '2021-12-27' AND cra_fecha_reagenda != '0000-00-00'
            $sql = "UPDATE tbl_cartelera_cra SET cra_fecha_reagenda = '{$next_day}' WHERE cra_fecha_cobro <= '{$now_day}' AND  cra_fecha_reagenda <= '{$now_day}'; UPDATE tbl_cartelera_cra SET cra_fecha_reagenda = '{$next_day}' WHERE cra_fecha_reagenda <= '{$now_day}' AND cra_fecha_reagenda != '0000-00-00'; ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlCancelarPago($abs)
    {
        try {
            //code...
            $sql = "UPDATE tbl_abonos_cobranza_abs SET abs_estado_abono = 'CANCELADO-A', abs_motivo_cancelacion = ? WHERE abs_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs['abs_motivo_cancelacion']);
            $pps->bindValue(2, $abs['abs_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlListarPagosPendientes($abs_id_cobrador)
    {
        try {
            $sql = "SELECT * FROM tbl_abonos_cobranza_abs WHERE abs_id_cobrador = ? AND abs_estado_abono = 'POR AUTORIZAR' ";
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
    public static function mdlListarPagosPendientesV2($abs_id_cobrador)
    {
        try {
            $sql = " SELECT ctr.ctr_cliente,ctr.ctr_forma_pago,ctr.ctr_dia_pago,abs_c.*,cra.cra_fecha_cobro,cra.cra_fecha_reagenda,cra.cra_fecha_proxima_pago,ctr.ctr_id,ctr.ctr_folio,ctr.ctr_ruta,ctr.ctr_numero_cuenta,ctr.ctr_status_cuenta,ctr.ctr_saldo_actual,ctr_total_pagado,usr.usr_nombre FROM tbl_abonos_cobranza_abs abs_c JOIN tbl_cartelera_cra cra ON abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id JOIN tbl_usuarios_usr usr ON abs_c.abs_id_cobrador = usr.usr_id WHERE  abs_estado_abono =  'POR AUTORIZAR' AND abs_c.abs_id_cobrador = ?  ORDER BY ctr.ctr_numero_cuenta ASC ";
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
    public static function mdlListarPagosAutorizadosByAbsSave($abs_save)
    {
        try {
            $sql = " SELECT ctr.ctr_cliente,ctr.ctr_forma_pago,ctr.ctr_dia_pago,abs_c.*,cra.cra_fecha_cobro,cra.cra_fecha_reagenda,cra.cra_fecha_proxima_pago,ctr.ctr_id,ctr.ctr_folio,ctr.ctr_ruta,ctr.ctr_numero_cuenta,ctr.ctr_status_cuenta,ctr.ctr_saldo_actual,ctr_total_pagado,usr.usr_nombre,usr.usr_ruta FROM tbl_abonos_cobranza_abs abs_c JOIN tbl_cartelera_cra cra ON abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id JOIN tbl_usuarios_usr usr ON abs_c.abs_id_cobrador = usr.usr_id WHERE  abs_c.abs_save =?  ORDER BY ctr.ctr_numero_cuenta ASC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_save);
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
    public static function mdlListarFichasByGdsId($gds_id)
    {
        try {
            $sql = " SELECT * FROM tbl_pagos_gds WHERE gds_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $gds_id);
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


    // ACTUALIZAR SALDO 
    public static  function mdlActualizarSaldoV2($datos)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_saldo_actual = ?, ctr_ultima_fecha_abono = ?,ctr_total_pagado = ?, ctr_status_cuenta = ? WHERE ctr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $datos['ctr_saldo_actual']);
            $pps->bindValue(2, $datos['ctr_ultima_fecha_abono']);
            $pps->bindValue(3, $datos['ctr_total_pagado']);
            $pps->bindValue(4, $datos['ctr_status_cuenta']);
            $pps->bindValue(5, $datos['ctr_id']);
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

    // CONSULTAR SALDO ACTUAL BASE
    public static function mdlConsultarSaldoBaseV2($ctr_id)
    {
        try {
            $sql = "SELECT ctr_saldo_actual FROM tbl_contrato_crt_1 WHERE ctr_id =? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindParam(1, $ctr_id);
            $pps->execute();
            return $pps->fetch();
            //code...
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    // VERIFICACION SALDO

    public static function mdlVerificacionSaldo($datos)
    {
        try {
            //code...
            $sql = "UPDATE tbl_abonos_cobranza_abs SET abs_verificacion = ?, abs_save = ?, abs_estado_abono = 'AUTORIZADO' WHERE abs_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $datos['abs_verificacion']);
            $pps->bindValue(2, $datos['abs_save']);
            $pps->bindValue(3, $datos['abs_id']);
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





    public static function mdlObtenerContratoCobrado($cra_id)
    {
        try {
            $sql = "SELECT ctr.ctr_id,ctr.ctr_ruta,ctr.ctr_numero_cuenta ,ctr.ctr_saldo_actual,ctr.ctr_total_pagado,ctr.ctr_ultima_fecha_abono FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id WHERE cra_id = ? ";
            $con = Conexion::conectar();
            $pps  = $con->prepare($sql);
            $pps->bindValue(1, $cra_id);
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

    public static function mdlObtenerContratoCobrado2($ctr_id)
    {
        try {
            $sql = "SELECT ctr_saldo_actual,ctr_total_pagado,ctr_ultima_fecha_abono FROM tbl_contrato_crt_1  WHERE ctr_id = ? ";
            $con = Conexion::conectar();
            $pps  = $con->prepare($sql);
            $pps->bindValue(1, $ctr_id);
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

    public static function mdlActualizarSaldosContrato($ctr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_saldo_actual = ? , ctr_total_pagado = ? , ctr_ultima_fecha_abono = ? WHERE ctr_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr['ctr_saldo_actual']);
            $pps->bindValue(2, $ctr['ctr_total_pagado']);
            $pps->bindValue(3, $ctr['ctr_ultima_fecha_abono']);
            $pps->bindValue(4, $ctr['ctr_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            return;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlActualizarEstadoPago($abs_id, $abs_save)
    {
        try {
            //code...
            $sql = "UPDATE tbl_abonos_cobranza_abs SET abs_estado_abono = 'AUTORIZADO' , abs_save = ? WHERE abs_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_save);
            $pps->bindValue(2, $abs_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            return;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlInsertPagos($gds_nombre)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_pagos_gds (gds_nombre) VALUES(?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $gds_nombre);
            $pps->execute();
            return $con->lastInsertId();
        } catch (PDOException $th) {
            //throw $th;
            return;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlActualiarRef($cra)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET cra_referencias = ? WHERE cra_contrato = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, json_encode($cra['cra_ref'], true));
            $pps->bindValue(2, $cra['ctr_id']);
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


    public static function mdlMostrarFichas()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_pagos_gds  GROUP BY  gds_id DESC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
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


    public static function mdlCobranzaAutizo($usr_id)
    {
        try {
            //code...
            $sql = "SELECT usr_autorizar_cobranza FROM tbl_usuarios_usr WHERE usr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
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

    public static function mdlActualizarCobranzaAutizo($usr_id, $usr_autorizar_cobranza)
    {
        try {
            //code...
            $sql = " UPDATE tbl_usuarios_usr SET  usr_autorizar_cobranza = ?  WHERE usr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_autorizar_cobranza);
            $pps->bindValue(2, $usr_id);
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

    public static function mdlMostrardatosEnrute($ctr)
    {
        try {
            //code...
            $sql = "SELECT ctr_id,ctr_ruta,ctr_cliente,ctr_numero_cuenta,ctr_forma_pago,ctr_dia_pago,ctr_proximo_pago,ctr_total,ctr_enganche,ctr_pago_adicional,ctr_saldo,ctr_pago_credito,ctr_status_cuenta,ctr_saldo_actual,DATE(ctr_ultima_fecha_abono) AS ctr_ultima_fecha_abono,ctr_total_pagado,ctr_orden,ctr_saldo_base FROM tbl_contrato_crt_1 WHERE ctr_numero_cuenta = ? AND ctr_ruta =  ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr['ctr_cuenta']);
            $pps->bindValue(2, $ctr['ctr_ruta']);
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

    public static function mdlMostrarEnture($ctr_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_cartelera_cra WHERE cra_contrato= ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_id);
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

    public static function Contratos()
    {
        try {
            //code...
            $sql = "SELECT cra.*,ctr.ctr_ruta,ctr.ctr_numero_cuenta FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 ctr  ON ctr.ctr_id = cra.cra_contrato ORDER BY cra.cra_id DESC LIMIT 10";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
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
    public static function mdlMostrarCartelera()
    {
        try {
            //code...
            $sql = "SELECT cra.*,ctr.ctr_ruta,ctr.ctr_numero_cuenta FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 ctr  ON ctr.ctr_id = cra.cra_contrato ORDER BY cra.cra_id DESC LIMIT 10";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
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

    public static function mdlConsultarEnrute($cra_contrato)
    {
        try {
            //code...
            $sql = "SELECT cra_id FROM tbl_cartelera_cra WHERE cra_contrato= ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra_contrato);
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
    public static function mdlConsultarEstadoCuenta($ec_ruta, $ec_cuenta)
    {
        try {
            //code...
            $sql = "SELECT ctr.ctr_id,ctr.ctr_cliente,ctr.ctr_numero_cuenta,ctr.ctr_ruta,ctr.ctr_forma_pago,ctr.ctr_dia_pago,ctr.ctr_proximo_pago,ctr.ctr_plazo_credito,ctr.ctr_productos,ctr.ctr_pago_credito,ctr.ctr_total,ctr.ctr_enganche,ctr.ctr_pago_adicional,ctr.ctr_saldo,ctr.ctr_saldo_actual,ctr.ctr_saldo_base,ctr.ctr_ultima_fecha_abono,ctr.ctr_total_pagado,ctr_elaboro  FROM tbl_contrato_crt_1 ctr WHERE ctr.ctr_ruta = ? AND ctr.ctr_numero_cuenta = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ec_ruta);
            $pps->bindValue(2, $ec_cuenta);
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
    public static function mdlConsultarEstadoCuenta2($ctr_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_cartelera_cra WHERE cra_contrato = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_id);
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
    public static function mdlConsultarEstadoCuenta3($cra_id, $abs_estado_abono = "")
    {
        try {
            //code...
            if ($abs_estado_abono == "") {
                $sql = "SELECT * FROM tbl_abonos_cobranza_abs WHERE abs_id_contrato = ? ORDER BY abs_fecha_cobro DESC";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $cra_id);
                $pps->execute();
                return $pps->fetchAll();
            } else {
                $sql = "SELECT * FROM tbl_abonos_cobranza_abs WHERE abs_id_contrato = ? AND abs_estado_abono = ? ORDER BY abs_fecha_cobro DESC";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $cra_id);
                $pps->bindValue(2, $abs_estado_abono);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlEditarCuentas($ctr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_forma_pago = ?, ctr_dia_pago = ? , ctr_pago_credito = ? , ctr_status_cuenta =  'VIGENTE' , ctr_enrutar = 'S', clts_coordenadas = ? , ctr_orden = ? WHERE ctr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr['ctr_forma_pago']);
            $pps->bindValue(2, $ctr['ctr_dia_pago']);
            $pps->bindValue(3, $ctr['ctr_pago_credito']);
            $pps->bindValue(4, $ctr['clts_coordenadas']);
            $pps->bindValue(5, $ctr['ctr_orden']);
            $pps->bindValue(6, $ctr['ctr_id']);
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
    public static function mdlUpdateSaldos($ctr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_saldo_base = ?, ctr_saldo_actual = ? WHERE ctr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, str_replace(',', '', $ctr['ec_saldo_base']));
            $pps->bindValue(2, str_replace(',', '', $ctr['ec_saldo_actual']));
            $pps->bindValue(3, $ctr['ctr_id']);
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

    public static function mdlBuscarPagosUsr($usr_id)
    {
        try {
            //code...
            if ($usr_id == "") {

                $sql = "SELECT ctr.ctr_cliente,ctr.ctr_forma_pago,ctr.ctr_dia_pago,abs_c.*,cra.cra_fecha_cobro,cra.cra_fecha_reagenda,cra.cra_fecha_proxima_pago,ctr.ctr_id,ctr.ctr_folio,ctr.ctr_ruta,ctr.ctr_numero_cuenta,ctr.ctr_status_cuenta,ctr.ctr_saldo_actual,usr.usr_nombre FROM tbl_abonos_cobranza_abs abs_c JOIN tbl_cartelera_cra cra ON abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id JOIN tbl_usuarios_usr usr ON abs_c.abs_id_cobrador = usr.usr_id WHERE  abs_estado_abono =  'POR AUTORIZAR' ORDER BY ctr.ctr_numero_cuenta ASC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sql = "SELECT ctr.ctr_cliente,ctr.ctr_forma_pago,ctr.ctr_dia_pago,abs_c.*,cra.cra_fecha_cobro,cra.cra_fecha_reagenda,cra.cra_fecha_proxima_pago,ctr.ctr_id,ctr.ctr_folio,ctr.ctr_ruta,ctr.ctr_numero_cuenta,ctr.ctr_status_cuenta,ctr.ctr_saldo_actual,usr.usr_nombre FROM tbl_abonos_cobranza_abs abs_c JOIN tbl_cartelera_cra cra ON abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id JOIN tbl_usuarios_usr usr ON abs_c.abs_id_cobrador = usr.usr_id WHERE  abs_estado_abono =  'POR AUTORIZAR' AND abs_c.abs_id_cobrador = ?  ORDER BY ctr.ctr_numero_cuenta ASC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $usr_id);
                $pps->execute();
                return $pps->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $th) {
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlCrearFicha($fcbz)
    {
        try {
            $sql = "INSERT INTO tbl_ficha_fcbz  (fcbz_numero,fcbz_fecha_inicio,fcbz_fecha_termino,fcbz_ano) VALUES (?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $fcbz['fcbz_numero']);
            $pps->bindValue(2, $fcbz['fcbz_fecha_inicio']);
            $pps->bindValue(3, $fcbz['fcbz_fecha_termino']);
            $pps->bindValue(4, $fcbz['fcbz_ano']);
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

    public static function mdlMostrarUltimaFicha()
    {
        try {
            $sql = " SELECT * FROM tbl_ficha_fcbz ORDER BY fcbz_id DESC LIMIT 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
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
    public static function mdlMostrarCobradoresActvos()
    {
        try {
            //code...
            $sql = "SELECT usr_id, usr_ruta FROM tbl_usuarios_usr WHERE usr_rol = 'Cobrador' AND usr_ruta != '' ORDER BY CAST( REPLACE(usr_ruta,'R','') AS INT) ASC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
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

    public static function mdlMostrarSeguimientoCobranza($ctr_ruta, $ctr_etiqueta)
    {
        try {
            //code...
            $sql = "SELECT ctr_numero_cuenta FROM tbl_contrato_crt_1 WHERE ctr_ruta = ? AND ctr_etiqueta = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_ruta);
            $pps->bindValue(2, $ctr_etiqueta);
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
    public static function mdlMostrarCarteraActiva($ctr_ruta)
    {
        try {
            //code...
            $sql = "SELECT COUNT(cra_id) AS scbz_inicio FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 ctr ON ctr.ctr_id = cra.cra_contrato WHERE ctr.ctr_ruta = ?  ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_ruta);
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
    public static function mdlMostrarCobroSemana($ctr_ruta, $fecha_inicio, $fecha_fin)
    {
        try {
            //code...
            $sql = "SELECT COUNT(cra_id) AS scbz_cuentas_semana  FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 ctr ON ctr.ctr_id = cra.cra_contrato WHERE ctr.ctr_ruta = ? AND (cra_fecha_cobro BETWEEN ? AND ?  OR cra_fecha_reagenda BETWEEN ? AND ? ) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_ruta);
            $pps->bindValue(2, $fecha_inicio);
            $pps->bindValue(3, $fecha_fin);
            $pps->bindValue(4, $fecha_inicio);
            $pps->bindValue(5, $fecha_fin);
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
    public static function mdlMostrarSeguimientoAnterior($ctr_ruta)
    {
        try {
            //code...
            $sql = "SELECT * tbl_seguimiento_scbz WHERE scbz_ruta = ? ORDER BY scbz_id DESC LIMIT 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_ruta);
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

    public static function mdlObtenerAbonosCobranza($abs_id_cobrador)
    {
        try {
            //code...
            $sql = "SELECT COUNT(abs_id) as abs_id FROM tbl_abonos_cobranza_abs WHERE abs_id_cobrador = ? AND abs_estado_abono = 'POR AUTORIZAR'";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_id_cobrador);
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

    public static function  ctrActualizarEtiquetasDirectosCra($cra)
    {

        try {
            //code..
            $sql = "UPDATE tbl_cartelera_cra  SET cra_estado = ?, cra_etiqueta = ?, cra_gestion = ? WHERE cra_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra['cra_estado']);
            $pps->bindValue(2, $cra['cra_etiqueta']);
            $pps->bindValue(3, $cra['cra_gestion']);
            $pps->bindValue(4, $cra['cra_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        }
    }
    public static function ctrActualizarEtiquetasDirectosCtr($ctr)
    {
        try {
            //code..
            $sql = "UPDATE tbl_contrato_crt_1  SET ctr_etiqueta = ?, ctr_gestion = ? WHERE ctr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr['ctr_etiqueta']);
            $pps->bindValue(2, $ctr['ctr_gestion']);
            $pps->bindValue(3, $ctr['ctr_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        }
    }

    public static function mdlMostrarContratos2()
    {
        try {
            $sql = " SELECT * FROM `tbl_contratos_2`";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
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

    public static function mdlMostrarCarteleraContratos($cra_etiqueta = "", $ctr_ruta = "")
    {
        try {

            $sql = "SELECT cra.*,ctr.ctr_id,ctr.ctr_numero_cuenta,ctr.ctr_ruta,ctr.ctr_saldo_actual,ctr.ctr_ultima_fecha_abono,ctr.ctr_status_cuenta,ctr.ctr_cliente FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id WHERE ctr.ctr_ruta = ? AND cra.cra_etiqueta = ? AND ctr.ctr_status_cuenta = 'VIGENTE' ORDER BY cra_orden ASC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_ruta);
            $pps->bindValue(2, $cra_etiqueta);
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

    public static function mdlContarEtiqueta($cra_etiqueta, $ctr_ruta)
    {
        try {
            //code...
            $sql = "SELECT COUNT(ctr.ctr_ruta) AS contador  FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id WHERE ctr.ctr_status_cuenta = 'VIGENTE' AND cra.cra_etiqueta = ? AND ctr.ctr_ruta = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cra_etiqueta);
            $pps->bindValue(2, $ctr_ruta);
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


    public  static function mdlAgregaReferencias($datos)
    {
        try {
            //code...
            $sql = "UPDATE tbl_cartelera_cra SET  cra_referencias = ? WHERE cra_id  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $datos['cra_referencias']);
            $pps->bindValue(2, $datos['cra_id']);
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
    public  static function mdlAgregaDatosTelGeo($datos)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET clts_telefono = ?, clts_coordenadas = ? WHERE ctr_id  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $datos['clts_telefono']);
            $pps->bindValue(2, $datos['clts_coordenadas']);
            $pps->bindValue(3, $datos['ctr_id']);
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

    public  static function mdlAgregarCuentaBanco($datos)
    {
        try {
            //code...
            $sql = "UPDATE tbl_abonos_cobranza_abs SET abs_referancia = ?, abs_cuenta = ? WHERE abs_id  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $datos['abs_referencia_e']);
            $pps->bindValue(2, $datos['abs_cuenta_e']);
            $pps->bindValue(3, $datos['abs_id_e']);
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

    public  static function mdlTotalCuentasRedimiento($ruta)
    {
        try {
            //code...
            $sql = "SELECT COUNT(ctr_id) AS total FROM tbl_contrato_crt_1 WHERE ctr_ruta = ? AND (ctr_status_cuenta = 'VIGENTE' OR ctr_status_cuenta = 'NUEVA');";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ruta);
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
    public  static function mdlTotalSemanalesRedimiento($ruta)
    {
        try {
            //code...
            $sql = "SELECT COUNT(ctr_id) AS total FROM tbl_contrato_crt_1 WHERE ctr_ruta = ? AND ctr_forma_pago = 'SEMANALES' AND (ctr_status_cuenta = 'VIGENTE' OR ctr_status_cuenta = 'NUEVA');";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ruta);
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
    public  static function mdlTotalFormaPagoRedimiento($ruta, $forma_pago)
    {
        try {
            //code...
            $sql = "SELECT ctr.ctr_id, cra.cra_fecha_cobro, cra.cra_fecha_reagenda  FROM tbl_contrato_crt_1 AS ctr JOIN tbl_cartelera_cra AS cra ON cra.cra_contrato = ctr.ctr_id WHERE ctr_ruta = ? AND ctr_forma_pago = ? AND (ctr_status_cuenta = 'VIGENTE' OR ctr_status_cuenta = 'NUEVA');";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ruta);
            $pps->bindValue(2, $forma_pago);
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
    public  static function mdlFichaActual()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_ficha_fcbz ORDER BY fcbz_id DESC LIMIT 1;";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
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
    public  static function mdlCuentasCobradasRendimiento($usr_id, $fecha_inicio, $fecha_fin)
    {
        try {
            //code...
            $sql = "SELECT COUNT(*) AS total_cuentas, SUM(abs_monto) AS total_cobrado FROM tbl_abonos_cobranza_abs WHERE abs_estado_abono = 'AUTORIZADO' AND abs_id_cobrador = ? AND DATE(abs_fecha_cobro) BETWEEN ? AND ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->bindValue(2, $fecha_inicio);
            $pps->bindValue(3, $fecha_fin);
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

    public  static function mdlAgregarMotivoCancelacionAbs($abs_id, $abs_motivo_cancelacion, $abs_codigo)
    {
        try {
            //code...
            $sql = "UPDATE tbl_abonos_cobranza_abs SET abs_motivo_cancelacion = ?, abs_codigo = ? WHERE abs_id  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_motivo_cancelacion);
            $pps->bindValue(2, $abs_codigo);
            $pps->bindValue(3, $abs_id);
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
    public  static function mdlUpdateCodigoDeCancelacion($abs_id, $abs_codigo)
    {
        try {
            //code...
            $sql = "UPDATE tbl_abonos_cobranza_abs SET abs_codigo = ? WHERE abs_id  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_codigo);
            $pps->bindValue(2, $abs_id);
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

    public  static function mdlObtenerAbonoByID($abs_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_abonos_cobranza_abs WHERE abs_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_id);
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

    public  static function mdlActualizarContrato($abs)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_saldo_actual = ctr_saldo_actual + ?, ctr_total_pagado = ctr_total_pagado - ?, ctr_ultima_fecha_abono = ?, ctr_status_cuenta = 'VIGENTE' WHERE ctr_id  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs['abs_monto']);
            $pps->bindValue(2, $abs['abs_monto']);
            $pps->bindValue(3, $abs['ctr_ultima_fecha_abono']);
            $pps->bindValue(4, $abs['abs_id_contrato']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public  static function mdlAplicarDescuentoContrato($abs)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_saldo_actual = ctr_saldo_actual - ?, ctr_total_pagado = ctr_total_pagado + ?, ctr_ultima_fecha_abono = ?, ctr_status_cuenta = 'VIGENTE' WHERE ctr_id  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs['abs_monto']);
            $pps->bindValue(2, $abs['abs_monto']);
            $pps->bindValue(3, $abs['ctr_ultima_fecha_abono']);
            $pps->bindValue(4, $abs['ctr_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public  static function mdlUltimaFechaCobro($abs_id_contrato)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_abonos_cobranza_abs WHERE abs_estado_abono = 'AUTORIZADO' AND abs_id_contrato = ? ORDER BY abs_id DESC LIMIT 1;";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_id_contrato);
            $pps->execute();
            return $pps->fetch();
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlAgregarDescuento($abs)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_abonos_cobranza_abs (abs_folio,abs_id_cobrador,abs_id_contrato,abs_monto,abs_mp,abs_referancia,abs_nota,abs_estado_abono,abs_fecha_cobro, abs_codigo) VALUES (?,?,?,?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs['abs_folio']);
            $pps->bindValue(2, $abs['abs_id_cobrador']);
            $pps->bindValue(3, $abs['abs_id_contrato']);
            $pps->bindValue(4, $abs['abs_monto']);
            $pps->bindValue(5, $abs['abs_mp']);
            $pps->bindValue(6, $abs['abs_referancia']);
            $pps->bindValue(7, $abs['abs_nota']);
            $pps->bindValue(8, $abs['abs_estado_abono']);
            $pps->bindValue(9, $abs['abs_fecha_cobro']);
            $pps->bindValue(10, $abs['abs_codigo']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarAbsCancelados()
    {
        try {
            //code...
            $sql = "SELECT abs.abs_id,abs.abs_estado_abono,abs.abs_folio,abs.abs_monto,abs.abs_mp,abs.abs_nota,abs.abs_fecha_cobro,abs.abs_motivo_cancelacion,abs.abs_codigo,usr.usr_nombre,usr.usr_ruta,ctr.ctr_cliente,ctr.ctr_numero_cuenta,ctr.ctr_ruta FROM tbl_abonos_cobranza_abs abs JOIN tbl_usuarios_usr usr ON abs.abs_id_cobrador = usr.usr_id  JOIN tbl_cartelera_cra cra ON abs.abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id WHERE abs.abs_codigo != '' AND (abs.abs_estado_abono = 'POR AUTORIZAR' || abs.abs_estado_abono = 'AUTORIZADO') ORDER BY abs.abs_id DESC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarRetirosCaja()
    {
        try {
            //code...
            $sql = " SELECT * FROM `tbl_caja_open_copn` WHERE copn_codigo != '' ORDER BY copn_id DESC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }




    public static function mdlConsultarAbsDescuento()
    {
        try {
            //code...
            $sql = " SELECT abs.abs_id,abs.abs_folio,abs.abs_monto,abs.abs_mp,abs.abs_nota,abs.abs_fecha_cobro,abs.abs_motivo_cancelacion,abs.abs_codigo,usr.usr_nombre,usr.usr_ruta,ctr.ctr_cliente,ctr.ctr_numero_cuenta,ctr.ctr_ruta,ctr.ctr_productos,ctr.ctr_saldo_actual,ctr.ctr_ultima_fecha_abono FROM tbl_abonos_cobranza_abs abs JOIN tbl_usuarios_usr usr ON abs.abs_id_cobrador = usr.usr_id JOIN tbl_cartelera_cra cra ON abs.abs_id_contrato = cra.cra_id JOIN tbl_contrato_crt_1 ctr ON cra.cra_contrato = ctr.ctr_id WHERE abs.abs_codigo != '' AND abs.abs_estado_abono = 'DESCUENTO POR AUTORIZAR' ORDER BY abs.abs_id DESC;";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public  static function mdlAplicarDescuento($abs_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_abonos_cobranza_abs SET abs_estado_abono = 'AUTORIZADO', abs_codigo = '' WHERE abs_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abs_id);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public  static function mdlCodigoRetiro($datos)
    {
        try {
            //code...
            $sql =  "UPDATE tbl_caja_open_copn SET copn_codigo =  ? , copn_retiro = ? WHERE copn_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $datos['copn_codigo']);
            $pps->bindValue(2, $datos['copn_retiro']);
            $pps->bindValue(3, $datos['copn_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public  static function mdlConsultarCodigoRetiro($copn_id)
    {
        try {
            //code...
            $sql =  "SELECT copn_codigo FROM tbl_caja_open_copn WHERE copn_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $copn_id);
            $pps->execute();
            return $pps->fetch();
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public  static function mdlBorrarCodigoRetiro($copn_id)
    {
        try {
            //code...
            $sql =  "UPDATE tbl_caja_open_copn SET copn_codigo =  '' WHERE copn_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $copn_id);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public  static function mdlGuardarRendimiento($rto)
    {
        try {
            //code...
            $sql =  "INSERT INTO tbl_rendimiento_rto (rto_id_usuario, rto_ruta, rto_ficha, rto_total_cuentas, rto_total_semanales,
            rto_total_catorcenales, rto_total_quincenales, rto_total_mensuales, rto_total_cuentas_cobro)
            VALUES(?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $rto['rto_id_usuario']);
            $pps->bindValue(2, $rto['rto_ruta']);
            $pps->bindValue(3, $rto['rto_ficha']);
            $pps->bindValue(4, $rto['rto_total_cuentas']);
            $pps->bindValue(5, $rto['rto_total_semanales']);
            $pps->bindValue(6, $rto['rto_total_catorcenales']);
            $pps->bindValue(7, $rto['rto_total_quincenales']);
            $pps->bindValue(8, $rto['rto_total_mensuales']);
            $pps->bindValue(9, $rto['rto_total_cuentas_cobro']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public  static function mdlObtenerRendimiento($rto_id_usuario, $rto_ficha)
    {
        try {
            //code...
            $sql =  "SELECT * FROM tbl_rendimiento_rto WHERE rto_id_usuario = ? AND rto_ficha = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $rto_id_usuario);
            $pps->bindValue(2, $rto_ficha);
            $pps->execute();
            return $pps->fetch();
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
