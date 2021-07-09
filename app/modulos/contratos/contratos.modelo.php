<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 04/02/2021 18:14
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class ContratosModelo
{
    public static function mdlAgregarContratos($ctr)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_contratos_ctrs(ctrs_id, ctrs_cuenta, ctrs_cliente, ctrs_vendedor, 
            ctrs_fecha_registro, ctrs_forma_pago, ctrs_fecha_pp	,ctrs_dia_pago, ctrs_horario_pago, ctrs_plazo_credito, 
            ctrs_detalles_vt, ctrs_foto_evidencia, ctrs_foto_pagare, ctrs_foto_fachada) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr['ctrs_id']);
            $pps->bindValue(2, $ctr['ctrs_cuenta']);
            $pps->bindValue(3, $ctr['ctrs_cliente']);
            $pps->bindValue(4, $ctr['ctrs_vendedor']);
            $pps->bindValue(5, $ctr['ctrs_fecha_registro']);
            $pps->bindValue(6, $ctr['ctrs_forma_pago']);
            $pps->bindValue(7, $ctr['ctrs_fecha_pp']);
            $pps->bindValue(8, $ctr['ctrs_dia_pago']);
            $pps->bindValue(9, $ctr['ctrs_horario_pago']);
            $pps->bindValue(10, $ctr['ctrs_plazo_credito']);
            $pps->bindValue(11, $ctr['ctrs_detalles_vt']);
            $pps->bindValue(12, $ctr['ctrs_foto_evidencia']);
            $pps->bindValue(13, $ctr['ctrs_foto_pagare']);
            $pps->bindValue(14, $ctr['ctrs_foto_fachada']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarContratos($ctr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contratos_ctrs SET ctrs_forma_pago=?,ctrs_fecha_pp=?,ctrs_dia_pago=?,ctrs_horario_pago=?,
            ctrs_plazo_credito=?,ctrs_foto_evidencia=?,ctrs_foto_pagare=?,ctrs_foto_fachada=? WHERE ctrs_id=?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr['ctrs_forma_pago']);
            $pps->bindValue(2, $ctr['ctrs_fecha_pp']);
            $pps->bindValue(3, $ctr['ctrs_dia_pago']);
            $pps->bindValue(4, $ctr['ctrs_horario_pago']);
            $pps->bindValue(5, $ctr['ctrs_plazo_credito']);
            $pps->bindValue(6, $ctr['ctrs_foto_evidencia']);
            $pps->bindValue(7, $ctr['ctrs_foto_pagare']);
            $pps->bindValue(8, $ctr['ctrs_foto_fachada']);
            $pps->bindValue(9, $ctr['ctrs_id']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarContratos($clts_nom, $id_ctr)
    {
        try {
            //c4ode...
            if ($clts_nom != '' && $id_ctr == '') {
                $sql = "SELECT ctrs.*, clts.clts_nombre FROM tbl_contratos_ctrs ctrs 
            JOIN tbl_clientes_clts clts ON clts.clts_id=ctrs.ctrs_cliente WHERE clts.clts_nombre LIKE  '%" . $clts_nom . "%'";
            } elseif ($clts_nom == '' && $id_ctr != '') {
                $sql = "SELECT ctrs.*, clts.clts_nombre FROM tbl_contratos_ctrs ctrs 
            JOIN tbl_clientes_clts clts ON clts.clts_id=ctrs.ctrs_cliente WHERE ctrs.ctrs_id LIKE  '%" . $id_ctr . "%' ";
            } elseif ($clts_nom != '' && $id_ctr != '') {
                $sql = "SELECT ctrs.*, clts.clts_nombre FROM tbl_contratos_ctrs ctrs 
            JOIN tbl_clientes_clts clts ON clts.clts_id=ctrs.ctrs_cliente WHERE (clts.clts_nombre LIKE  '%" . $clts_nom . "%') AND (ctrs.ctrs_id LIKE  '%" . $id_ctr . "%')";
            } elseif ($clts_nom == '' && $id_ctr == '') {
                $sql = "";
            }

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

    public static function mdlMostrarContratoByFolio($ctr_folio)
    {
        try {
            //c4ode...

            $sql = "SELECT ctr.*,usr.usr_nombre FROM tbl_contrato_crt ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id WHERE ctr_folio =?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_folio);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarInfoContrato($idctr)
    {
        try {
            //c4ode...

            $sql = "SELECT ctrs.*, clts.* FROM tbl_contratos_ctrs ctrs
            JOIN tbl_clientes_clts clts ON clts.clts_id=ctrs.ctrs_cliente WHERE ctrs.ctrs_id=?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $idctr);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlPreregistrarContrato($data)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_contrato_crt (ctr_folio,ctr_fecha_contrato,ctr_id_vendedor,ctr_cliente,ctr_productos,ctr_total,ctr_enganche,ctr_pago_adicional,ctr_saldo,ctr_elaboro,ctr_nota,ctr_fotos,ctr_nombre_ref_1,ctr_parentesco_ref_1,ctr_direccion_ref_1,ctr_colonia_ref_1,ctr_telefono_ref_1) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $data['ctr_folio']);
            $pps->bindValue(2, $data['ctr_fecha_contrato']);
            $pps->bindValue(3, $data['ctr_id_vendedor']);
            $pps->bindValue(4, $data['ctr_cliente']);
            $pps->bindValue(5, $data['ctr_productos']);
            $pps->bindValue(6, $data['ctr_total']);
            $pps->bindValue(7, $data['ctr_enganche']);
            $pps->bindValue(8, $data['ctr_pago_adicional']);
            $pps->bindValue(9, $data['ctr_saldo']);
            $pps->bindValue(10, $data['ctr_elaboro']);
            $pps->bindValue(11, $data['ctr_nota']);
            $pps->bindValue(12, $data['ctr_fotos']);

            $pps->bindValue(13, $data['ctr_nombre_ref_1']);
            $pps->bindValue(14, $data['ctr_parentesco_ref_1']);
            $pps->bindValue(15, $data['ctr_direccion_ref_1']);
            $pps->bindValue(16, $data['ctr_colonia_ref_1']);
            $pps->bindValue(17, $data['ctr_telefono_ref_1']);
            $pps->execute();
            return $con->lastInsertId();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarContratos($tps_num_traspaso)
    {
        try {
            //c4ode...

            $sql = "SELECT * FROM tbl_contratos_2 ctrs WHERE caja_id = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tps_num_traspaso);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarContratosAll()
    {
        try {
            //c4ode...

            $sql = "SELECT ctr.*,usr.usr_nombre FROM tbl_contrato_crt ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id ORDER BY ctr.ctr_folio DESC";

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
}
