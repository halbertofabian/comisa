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

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarContratos()
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
    public static function mdlMostrarContratos($clts_nom)
    {
        try {
            //code...
            $sql = "SELECT ctrs.*, clts.clts_nombre FROM tbl_contratos_ctrs ctrs 
            JOIN tbl_clientes_clts clts ON clts.clts_id=ctrs.ctrs_cliente WHERE clts.clts_nombre LIKE  '%" . $clts_nom . "%'";
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
    public static function mdlEliminarContratos()
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




