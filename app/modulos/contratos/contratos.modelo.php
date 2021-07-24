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
            $sql = "INSERT INTO tbl_contrato_crt_1 (ctrs_id, ctrs_cuenta, ctrs_cliente, ctrs_vendedor, 
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
            $sql = "UPDATE tbl_contrato_crt_1 SET ctrs_forma_pago=?,ctrs_fecha_pp=?,ctrs_dia_pago=?,ctrs_horario_pago=?,
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

    public static function mdlAsignarCuenta($ctr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_contrato_crt_1 SET ctr_numero_cuenta =?,ctr_ruta = ? WHERE ctr_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps -> bindValue(1,$ctr['ctr_numero_cuenta']);
            $pps -> bindValue(2,$ctr['ctr_ruta']);
            $pps -> bindValue(3,$ctr['ctr_id']);
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
                $sql = "SELECT ctrs.*, clts.clts_nombre FROM tbl_contrato_crt_1 ctrs 
            JOIN tbl_clientes_clts clts ON clts.clts_id=ctrs.ctrs_cliente WHERE clts.clts_nombre LIKE  '%" . $clts_nom . "%'";
            } elseif ($clts_nom == '' && $id_ctr != '') {
                $sql = "SELECT ctrs.*, clts.clts_nombre FROM tbl_contrato_crt_1 ctrs 
            JOIN tbl_clientes_clts clts ON clts.clts_id=ctrs.ctrs_cliente WHERE ctrs.ctrs_id LIKE  '%" . $id_ctr . "%' ";
            } elseif ($clts_nom != '' && $id_ctr != '') {
                $sql = "SELECT ctrs.*, clts.clts_nombre FROM tbl_contrato_crt_1 ctrs 
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

            $sql = "SELECT ctr.*,usr.usr_nombre FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id WHERE ctr_folio =?";

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

            $sql = "SELECT ctrs.*, clts.* FROM tbl_contrato_crt_1 ctrs
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

    public static function mdlMostrarUltimaCuenta($ctr_ruta)
    {
        try {
            //c4ode...

            $sql = "SELECT ctr_numero_cuenta FROM tbl_contrato_crt_1 WHERE ctr_ruta = ? ORDER BY ctr_numero_cuenta DESC LIMIT 1";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_ruta);
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
            $sql = "INSERT INTO tbl_contrato_crt_1 (ctr_folio,ctr_fecha_contrato,ctr_id_vendedor,ctr_cliente,ctr_productos,ctr_total,ctr_enganche,ctr_pago_adicional,ctr_saldo,ctr_elaboro,ctr_nota,ctr_fotos,ctr_nombre_ref_1,ctr_parentesco_ref_1,ctr_direccion_ref_1,ctr_colonia_ref_1,ctr_telefono_ref_1) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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

            $sql = "SELECT ctr.*,usr.usr_nombre FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id ORDER BY ctr.ctr_fecha_contrato DESC";

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

    public static function mdlSubirPreContratos($ctr)
    {
        try {
            $sql = " INSERT INTO tbl_contrato_crt_1 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $ctr['ctr_id']);
            $pps->bindValue(2, $ctr['ctr_folio']);
            $pps->bindValue(3, $ctr['ctr_fecha_contrato']);
            $pps->bindValue(4, $ctr['ctr_id_vendedor']);
            $pps->bindValue(5, $ctr['ctr_cliente']);
            $pps->bindValue(6, $ctr['ctr_numero_cuenta']);
            $pps->bindValue(7, $ctr['ctr_ruta']);
            $pps->bindValue(8, $ctr['ctr_forma_pago']);
            $pps->bindValue(9, $ctr['ctr_dia_pago']);
            $pps->bindValue(10, $ctr['ctr_proximo_pago']);

            $pps->bindValue(11, $ctr['ctr_plazo_credito']);
            $pps->bindValue(12, $ctr['ctr_tipo_pago']);
            $pps->bindValue(13, $ctr['ctr_productos']);
            $pps->bindValue(14, $ctr['ctr_total']);
            $pps->bindValue(15, $ctr['ctr_enganche']);
            $pps->bindValue(16, $ctr['ctr_pago_adicional']);
            $pps->bindValue(17, $ctr['ctr_saldo']);
            $pps->bindValue(18, $ctr['ctr_elaboro']);
            $pps->bindValue(19, $ctr['ctr_nota']);
            $pps->bindValue(20, $ctr['ctr_fotos']);

            $pps->bindValue(21, $ctr['ctr_nombre_ref_1']);
            $pps->bindValue(22, $ctr['ctr_parentesco_ref_1']);
            $pps->bindValue(23, $ctr['ctr_direccion_ref_1']);
            $pps->bindValue(24, $ctr['ctr_colonia_ref_1']);
            $pps->bindValue(25, $ctr['ctr_telefono_ref_1']);
            $pps->bindValue(26, $ctr['clts_curp']);
            $pps->bindValue(27, $ctr['clts_telefono']);
            $pps->bindValue(28, $ctr['clts_domicilio']);
            $pps->bindValue(29, $ctr['clts_col']);
            $pps->bindValue(30, $ctr['clts_entre_calles']);

            $pps->bindValue(31, $ctr['clts_trabajo']);
            $pps->bindValue(32, $ctr['clts_puesto']);
            $pps->bindValue(33, $ctr['clts_direccion_tbj']);
            $pps->bindValue(34, $ctr['clts_col_tbj']);
            $pps->bindValue(35, $ctr['clts_tel_tbj']);
            $pps->bindValue(36, $ctr['clts_antiguedad_tbj']);
            $pps->bindValue(37, $ctr['clts_igs_mensual_tbj']);
            $pps->bindValue(38, $ctr['clts_tipo_vivienda']);
            $pps->bindValue(39, $ctr['clts_vivienda_anomde']);
            $pps->bindValue(40, $ctr['clts_antiguedad_viviendo']);

            $pps->bindValue(41, $ctr['clts_coordenadas']);
            $pps->bindValue(42, $ctr['clts_nom_conyuge']);
            $pps->bindValue(43, $ctr['clts_tbj_conyuge']);
            $pps->bindValue(44, $ctr['clts_tbj_puesto_conyuge']);
            $pps->bindValue(45, $ctr['clts_tbj_dir_conyuge']);
            $pps->bindValue(46, $ctr['clts_tbj_col_conyuge']);
            $pps->bindValue(47, $ctr['clts_tbj_tel_conyuge']);
            $pps->bindValue(48, $ctr['clts_tbj_ant_conyuge']);
            $pps->bindValue(49, $ctr['clts_tbj_ing_conyuge']);
            $pps->bindValue(50, $ctr['clts_nom_fiador']);

            $pps->bindValue(51, $ctr['clts_parentesco_fiador']);
            $pps->bindValue(52, $ctr['clts_tel_fiador']);
            $pps->bindValue(53, $ctr['clts_dir_fiador']);
            $pps->bindValue(54, $ctr['clts_col_fiador']);
            $pps->bindValue(55, $ctr['clts_tbj_fiador']);
            $pps->bindValue(56, $ctr['clts_tbj_dir_fiador']);
            $pps->bindValue(57, $ctr['clts_tbj_tel_fiador']);
            $pps->bindValue(58, $ctr['clts_tbj_col_fiador']);
            $pps->bindValue(59, $ctr['clts_tbj_ant_fiador']);
            $pps->bindValue(60, $ctr['clts_fotos_fiador']);

            $pps->bindValue(61, $ctr['clts_nom_ref2']);
            $pps->bindValue(62, $ctr['clts_parentesco_ref2']);
            $pps->bindValue(63, $ctr['clts_dir_ref2']);
            $pps->bindValue(64, $ctr['clts_col_ref2']);
            $pps->bindValue(65, $ctr['clts_tel_ref2']);
            $pps->bindValue(66, $ctr['clts_nom_ref3']);
            $pps->bindValue(67, $ctr['clts_parentesco_ref3']);
            $pps->bindValue(68, $ctr['clts_dir_ref3']);
            $pps->bindValue(69, $ctr['clts_col_ref3']);
            $pps->bindValue(70, $ctr['clts_tel_ref3']);

            $pps->bindValue(71, $ctr['sobre_enganche_pendiente']);
            $pps->bindValue(72, $ctr['clts_registro_venta']);
            $pps->bindValue(73, $ctr['clts_caja']);
            $pps->bindValue(74, $ctr['clts_folio_nuevo']);
            $pps->bindValue(75, $ctr['ctr_pago_credito']);

            $pps->bindValue(76, $ctr['ctr_aprovado_ventas']);
            $pps->bindValue(77, $ctr['clts_fachada_color']);
            $pps->bindValue(78, $ctr['clts_puerta_color']);
            $pps->bindValue(79, $ctr['ctr_status_cuenta']);
            $pps->bindValue(80, $ctr['ctr_saldo_actual']);





            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarPreContratos($ctr)
    {
        try {
            $sql = "UPDATE tbl_contrato_crt_1  SET ctr_cliente =?,ctr_numero_cuenta = ?, ctr_ruta = ? , ctr_forma_pago = ?,ctr_dia_pago = ? , ctr_proximo_pago = ?, ctr_plazo_credito = ?, ctr_total = ?, ctr_enganche = ?, ctr_pago_adicional = ?, ctr_saldo = ?, ctr_nota = ?, ctr_nombre_ref_1 = ?, ctr_parentesco_ref_1 = ?, ctr_direccion_ref_1 = ?,ctr_colonia_ref_1 = ?, ctr_telefono_ref_1 = ?, clts_curp = ?, clts_telefono = ?,clts_domicilio = ?, clts_col = ?, clts_entre_calles = ?, clts_trabajo = ?, clts_puesto = ?, clts_direccion_tbj = ?, clts_col_tbj = ?, clts_tel_tbj = ?,    clts_antiguedad_tbj = ?, clts_igs_mensual_tbj = ?, clts_tipo_vivienda = ?, clts_vivienda_anomde = ?, clts_antiguedad_viviendo = ?, clts_coordenadas = ?, clts_nom_conyuge = ?, clts_tbj_conyuge = ?, clts_tbj_puesto_conyuge = ?, clts_tbj_dir_conyuge = ?, clts_tbj_col_conyuge = ?, clts_tbj_tel_conyuge = ?, clts_tbj_ant_conyuge = ?, clts_tbj_ing_conyuge = ?, clts_nom_fiador = ?, clts_parentesco_fiador = ?, clts_tel_fiador  = ?, clts_dir_fiador = ?, clts_col_fiador = ?, clts_tbj_fiador = ?, clts_tbj_dir_fiador = ?, clts_tbj_tel_fiador = ?, clts_tbj_col_fiador = ?,clts_tbj_ant_fiador = ?, clts_nom_ref2 = ?, clts_parentesco_ref2 = ?, clts_dir_ref2 = ?, clts_col_ref2 = ?, clts_tel_ref2 = ?, clts_nom_ref3 = ?, clts_parentesco_ref3 = ?, clts_dir_ref3 = ?, clts_col_ref3 = ?, clts_tel_ref3 = ?, sobre_enganche_pendiente = ? , ctr_pago_credito = ?,ctr_aprovado_ventas = ? , ctr_fecha_contrato = ?, clts_fachada_color =? , clts_puerta_color = ? , ctr_status_cuenta =?, ctr_saldo_actual=? WHERE ctr_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);


            $pps->bindValue(1, $ctr['ctr_cliente']);
            $pps->bindValue(2, $ctr['ctr_numero_cuenta']);
            $pps->bindValue(3, $ctr['ctr_ruta']);
            $pps->bindValue(4, $ctr['ctr_forma_pago']);
            $pps->bindValue(5, $ctr['ctr_dia_pago']);

            $pps->bindValue(6, $ctr['ctr_proximo_pago']);
            $pps->bindValue(7, $ctr['ctr_plazo_credito']);
            $pps->bindValue(8, $ctr['ctr_total']);
            $pps->bindValue(9, $ctr['ctr_enganche']);
            $pps->bindValue(10, $ctr['ctr_pago_adicional']);

            $pps->bindValue(11, $ctr['ctr_saldo']);
            $pps->bindValue(12, $ctr['ctr_nota']);
            $pps->bindValue(13, $ctr['ctr_nombre_ref_1']);
            $pps->bindValue(14, $ctr['ctr_parentesco_ref_1']);
            $pps->bindValue(15, $ctr['ctr_direccion_ref_1']);

            $pps->bindValue(16, $ctr['ctr_colonia_ref_1']);
            $pps->bindValue(17, $ctr['ctr_telefono_ref_1']);
            $pps->bindValue(18, $ctr['clts_curp']);
            $pps->bindValue(19, $ctr['clts_telefono']);
            $pps->bindValue(20, $ctr['clts_domicilio']);

            $pps->bindValue(21, $ctr['clts_col']);
            $pps->bindValue(22, $ctr['clts_entre_calles']);
            $pps->bindValue(23, $ctr['clts_trabajo']);
            $pps->bindValue(24, $ctr['clts_puesto']);
            $pps->bindValue(25, $ctr['clts_direccion_tbj']);

            $pps->bindValue(26, $ctr['clts_col_tbj']);
            $pps->bindValue(27, $ctr['clts_tel_tbj']);
            $pps->bindValue(28, $ctr['clts_antiguedad_tbj']);
            $pps->bindValue(29, $ctr['clts_igs_mensual_tbj']);
            $pps->bindValue(30, $ctr['clts_tipo_vivienda']);

            $pps->bindValue(31, $ctr['clts_vivienda_anomde']);
            $pps->bindValue(32, $ctr['clts_antiguedad_viviendo']);
            $pps->bindValue(33, $ctr['clts_coordenadas']);
            $pps->bindValue(34, $ctr['clts_nom_conyuge']);
            $pps->bindValue(35, $ctr['clts_tbj_conyuge']);

            $pps->bindValue(36, $ctr['clts_tbj_puesto_conyuge']);
            $pps->bindValue(37, $ctr['clts_tbj_dir_conyuge']);
            $pps->bindValue(38, $ctr['clts_tbj_col_conyuge']);
            $pps->bindValue(39, $ctr['clts_tbj_tel_conyuge']);
            $pps->bindValue(40, $ctr['clts_tbj_ant_conyuge']);

            $pps->bindValue(41, $ctr['clts_tbj_ing_conyuge']);
            $pps->bindValue(42, $ctr['clts_nom_fiador']);
            $pps->bindValue(43, $ctr['clts_parentesco_fiador']);
            $pps->bindValue(44, $ctr['clts_tel_fiador']);
            $pps->bindValue(45, $ctr['clts_dir_fiador']);

            $pps->bindValue(46, $ctr['clts_col_fiador']);
            $pps->bindValue(47, $ctr['clts_tbj_fiador']);
            $pps->bindValue(48, $ctr['clts_tbj_dir_fiador']);
            $pps->bindValue(49, $ctr['clts_tbj_tel_fiador']);
            $pps->bindValue(50, $ctr['clts_tbj_col_fiador']);

            $pps->bindValue(51, $ctr['clts_tbj_ant_fiador']);
            $pps->bindValue(52, $ctr['clts_nom_ref2']);
            $pps->bindValue(53, $ctr['clts_parentesco_ref2']);
            $pps->bindValue(54, $ctr['clts_dir_ref2']);
            $pps->bindValue(55, $ctr['clts_col_ref2']);

            $pps->bindValue(56, $ctr['clts_tel_ref2']);
            $pps->bindValue(57, $ctr['clts_nom_ref3']);
            $pps->bindValue(58, $ctr['clts_parentesco_ref3']);
            $pps->bindValue(59, $ctr['clts_dir_ref3']);
            $pps->bindValue(60, $ctr['clts_col_ref3']);

            $pps->bindValue(61, $ctr['clts_tel_ref3']);
            $pps->bindValue(62, $ctr['sobre_enganche_pendiente']);
            $pps->bindValue(63, $ctr['ctr_pago_credito']);
            $pps->bindValue(64, $ctr['ctr_aprovado_ventas']);
            $pps->bindValue(65, $ctr['ctr_fecha_contrato']);

            $pps->bindValue(66, $ctr['clts_fachada_color']);
            $pps->bindValue(67, $ctr['clts_puerta_color']);
            $pps->bindValue(68, $ctr['ctr_status_cuenta']);
            $pps->bindValue(69, $ctr['ctr_saldo_actual']);
            $pps->bindValue(70, $ctr['ctr_id']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlActualizarPreContratosExcel($ctr)
    {
        try {
            $sql = "UPDATE tbl_contrato_crt_1  SET ctr_cliente =?,ctr_numero_cuenta = ?, ctr_ruta = ? , ctr_forma_pago = ?,ctr_dia_pago = ? , ctr_proximo_pago = ?, ctr_plazo_credito = ?, ctr_total = ?, ctr_enganche = ?, ctr_pago_adicional = ?, ctr_saldo = ?, ctr_nota = ?, ctr_nombre_ref_1 = ?, ctr_parentesco_ref_1 = ?, ctr_direccion_ref_1 = ?,ctr_colonia_ref_1 = ?, ctr_telefono_ref_1 = ?, clts_curp = ?, clts_telefono = ?,clts_domicilio = ?, clts_col = ?, clts_entre_calles = ?, clts_trabajo = ?, clts_puesto = ?, clts_direccion_tbj = ?, clts_col_tbj = ?, clts_tel_tbj = ?,    clts_antiguedad_tbj = ?, clts_igs_mensual_tbj = ?, clts_tipo_vivienda = ?, clts_vivienda_anomde = ?, clts_antiguedad_viviendo = ?, clts_coordenadas = ?, clts_nom_conyuge = ?, clts_tbj_conyuge = ?, clts_tbj_puesto_conyuge = ?, clts_tbj_dir_conyuge = ?, clts_tbj_col_conyuge = ?, clts_tbj_tel_conyuge = ?, clts_tbj_ant_conyuge = ?, clts_tbj_ing_conyuge = ?, clts_nom_fiador = ?, clts_parentesco_fiador = ?, clts_tel_fiador  = ?, clts_dir_fiador = ?, clts_col_fiador = ?, clts_tbj_fiador = ?, clts_tbj_dir_fiador = ?, clts_tbj_tel_fiador = ?, clts_tbj_col_fiador = ?,clts_tbj_ant_fiador = ?, clts_nom_ref2 = ?, clts_parentesco_ref2 = ?, clts_dir_ref2 = ?, clts_col_ref2 = ?, clts_tel_ref2 = ?, clts_nom_ref3 = ?, clts_parentesco_ref3 = ?, clts_dir_ref3 = ?, clts_col_ref3 = ?, clts_tel_ref3 = ?, sobre_enganche_pendiente = ? , ctr_pago_credito = ?,ctr_aprovado_ventas = ? , ctr_fecha_contrato = ?, clts_fachada_color =? , clts_puerta_color = ? , ctr_status_cuenta =?, ctr_saldo_actual=? WHERE ctr_numero_cuenta = ? AND ctr_ruta = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);


            $pps->bindValue(1, $ctr['ctr_cliente']);
            $pps->bindValue(2, $ctr['ctr_numero_cuenta']);
            $pps->bindValue(3, $ctr['ctr_ruta']);
            $pps->bindValue(4, $ctr['ctr_forma_pago']);
            $pps->bindValue(5, $ctr['ctr_dia_pago']);

            $pps->bindValue(6, $ctr['ctr_proximo_pago']);
            $pps->bindValue(7, $ctr['ctr_plazo_credito']);
            $pps->bindValue(8, $ctr['ctr_total']);
            $pps->bindValue(9, $ctr['ctr_enganche']);
            $pps->bindValue(10, $ctr['ctr_pago_adicional']);

            $pps->bindValue(11, $ctr['ctr_saldo']);
            $pps->bindValue(12, $ctr['ctr_nota']);
            $pps->bindValue(13, $ctr['ctr_nombre_ref_1']);
            $pps->bindValue(14, $ctr['ctr_parentesco_ref_1']);
            $pps->bindValue(15, $ctr['ctr_direccion_ref_1']);

            $pps->bindValue(16, $ctr['ctr_colonia_ref_1']);
            $pps->bindValue(17, $ctr['ctr_telefono_ref_1']);
            $pps->bindValue(18, $ctr['clts_curp']);
            $pps->bindValue(19, $ctr['clts_telefono']);
            $pps->bindValue(20, $ctr['clts_domicilio']);

            $pps->bindValue(21, $ctr['clts_col']);
            $pps->bindValue(22, $ctr['clts_entre_calles']);
            $pps->bindValue(23, $ctr['clts_trabajo']);
            $pps->bindValue(24, $ctr['clts_puesto']);
            $pps->bindValue(25, $ctr['clts_direccion_tbj']);

            $pps->bindValue(26, $ctr['clts_col_tbj']);
            $pps->bindValue(27, $ctr['clts_tel_tbj']);
            $pps->bindValue(28, $ctr['clts_antiguedad_tbj']);
            $pps->bindValue(29, $ctr['clts_igs_mensual_tbj']);
            $pps->bindValue(30, $ctr['clts_tipo_vivienda']);

            $pps->bindValue(31, $ctr['clts_vivienda_anomde']);
            $pps->bindValue(32, $ctr['clts_antiguedad_viviendo']);
            $pps->bindValue(33, $ctr['clts_coordenadas']);
            $pps->bindValue(34, $ctr['clts_nom_conyuge']);
            $pps->bindValue(35, $ctr['clts_tbj_conyuge']);

            $pps->bindValue(36, $ctr['clts_tbj_puesto_conyuge']);
            $pps->bindValue(37, $ctr['clts_tbj_dir_conyuge']);
            $pps->bindValue(38, $ctr['clts_tbj_col_conyuge']);
            $pps->bindValue(39, $ctr['clts_tbj_tel_conyuge']);
            $pps->bindValue(40, $ctr['clts_tbj_ant_conyuge']);

            $pps->bindValue(41, $ctr['clts_tbj_ing_conyuge']);
            $pps->bindValue(42, $ctr['clts_nom_fiador']);
            $pps->bindValue(43, $ctr['clts_parentesco_fiador']);
            $pps->bindValue(44, $ctr['clts_tel_fiador']);
            $pps->bindValue(45, $ctr['clts_dir_fiador']);

            $pps->bindValue(46, $ctr['clts_col_fiador']);
            $pps->bindValue(47, $ctr['clts_tbj_fiador']);
            $pps->bindValue(48, $ctr['clts_tbj_dir_fiador']);
            $pps->bindValue(49, $ctr['clts_tbj_tel_fiador']);
            $pps->bindValue(50, $ctr['clts_tbj_col_fiador']);

            $pps->bindValue(51, $ctr['clts_tbj_ant_fiador']);
            $pps->bindValue(52, $ctr['clts_nom_ref2']);
            $pps->bindValue(53, $ctr['clts_parentesco_ref2']);
            $pps->bindValue(54, $ctr['clts_dir_ref2']);
            $pps->bindValue(55, $ctr['clts_col_ref2']);

            $pps->bindValue(56, $ctr['clts_tel_ref2']);
            $pps->bindValue(57, $ctr['clts_nom_ref3']);
            $pps->bindValue(58, $ctr['clts_parentesco_ref3']);
            $pps->bindValue(59, $ctr['clts_dir_ref3']);
            $pps->bindValue(60, $ctr['clts_col_ref3']);

            $pps->bindValue(61, $ctr['clts_tel_ref3']);
            $pps->bindValue(62, $ctr['sobre_enganche_pendiente']);
            $pps->bindValue(63, $ctr['ctr_pago_credito']);
            $pps->bindValue(64, $ctr['ctr_aprovado_ventas']);
            $pps->bindValue(65, $ctr['ctr_fecha_contrato']);

            $pps->bindValue(66, $ctr['clts_fachada_color']);
            $pps->bindValue(67, $ctr['clts_puerta_color']);
            $pps->bindValue(68, $ctr['ctr_status_cuenta']);
            $pps->bindValue(69, $ctr['ctr_saldo_actual']);
            $pps->bindValue(70, $ctr['ctr_numero_cuenta']);
            $pps->bindValue(71, $ctr['ctr_ruta']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdObtenerFolioNuevo()
    {
        try {
            //c4ode...

            $sql = "SELECT ctr_id FROM tbl_contrato_crt_1  ORDER BY ctr_id DESC LIMIT 1";

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

    public static function mdlMostrarContratosByFolioCaja($ctr_filtro)
    {
        try {
            //code...
            $sql = "SELECT ctr.ctr_id,ctr.ctr_folio,ctr.ctr_fecha_contrato,ctr.ctr_id_vendedor,usr.usr_nombre, ctr.clts_domicilio, ctr.clts_col, ctr.clts_entre_calles, ctr.ctr_cliente,ctr.ctr_numero_cuenta,ctr.ctr_ruta,ctr.clts_curp,ctr.clts_telefono,ctr.clts_registro_venta,ctr.clts_caja,ctr.clts_folio_nuevo FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id WHERE ctr.ctr_folio LIKE '%$ctr_filtro%' OR ctr.clts_folio_nuevo LIKE '%$ctr_filtro%' OR ctr.clts_caja LIKE '%$ctr_filtro%' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $con = null;
            $pss = null;
        }
    }

    public static function mdlMostrarContratosById($ctr_id)
    {
        try {
            //c4ode...
            $sql = "SELECT ctr.*,usr.usr_nombre FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id  WHERE ctr.ctr_id  = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    // filtros

    public static function mdlMostrarContratosLimit()
    {
        try {
            $sql = "SELECT ctr.ctr_id,ctr.ctr_folio,ctr.ctr_fecha_contrato,ctr.ctr_id_vendedor,usr.usr_nombre, ctr.clts_domicilio, ctr.clts_col, ctr.clts_entre_calles, ctr.ctr_cliente,ctr.ctr_numero_cuenta,ctr.ctr_ruta,ctr.ctr_elaboro,ctr.clts_curp,ctr.clts_telefono,ctr.clts_registro_venta,ctr.clts_caja,ctr.clts_folio_nuevo,ctr.ctr_aprovado_ventas FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id ORDER BY ctr.ctr_fecha_contrato DESC LIMIT 10 ";
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

    public static function mdlMostrarContratosLimitExcel()
    {
        try {
            $sql = "SELECT ctr.*, usr.usr_nombre  FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id ORDER BY ctr.ctr_fecha_contrato DESC LIMIT 10 ";
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
    public static function mdlMostrarContratosFolio($ctr_filtro)
    {
        try {
            $sql = "SELECT ctr.ctr_id,ctr.ctr_folio,ctr.ctr_fecha_contrato,ctr.ctr_id_vendedor,usr.usr_nombre, ctr.clts_domicilio, ctr.clts_col, ctr.clts_entre_calles, ctr.ctr_cliente,ctr.ctr_numero_cuenta,ctr.ctr_ruta,ctr.ctr_elaboro,ctr.clts_curp,ctr.clts_telefono,ctr.clts_registro_venta,ctr.clts_caja,ctr.clts_folio_nuevo,ctr.ctr_aprovado_ventas FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id WHERE ctr.ctr_folio LIKE '%$ctr_filtro%' OR ctr.clts_folio_nuevo LIKE '%$ctr_filtro%' OR ctr.ctr_numero_cuenta LIKE '%$ctr_filtro%' OR ctr.ctr_ruta LIKE '%$ctr_filtro%' OR ctr.ctr_cliente LIKE '%$ctr_filtro%' OR concat_ws('',ctr_numero_cuenta,ctr_ruta) LIKE '$ctr_filtro%' ORDER BY ctr.ctr_fecha_contrato DESC";
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
    public static function mdlMostrarContratosFolioExcel($ctr_filtro)
    {
        try {
            $sql = "SELECT usr.usr_nombre, ctr.* FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id WHERE ctr.ctr_folio LIKE '%$ctr_filtro%' OR ctr.clts_folio_nuevo LIKE '%$ctr_filtro%' OR ctr.ctr_numero_cuenta LIKE '%$ctr_filtro%' OR ctr.ctr_ruta LIKE '%$ctr_filtro%' OR ctr.ctr_cliente LIKE '%$ctr_filtro%' OR concat_ws('',ctr_numero_cuenta,ctr_ruta) LIKE '$ctr_filtro%' ORDER BY ctr.ctr_fecha_contrato DESC";
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

    public static function mdlMostrarContratosFecha($ctr_vendedor, $ctr_fecha_inicio, $ctr_fecha_fin)
    {
        try {
            $sql = "SELECT ctr.ctr_id,ctr.ctr_folio,ctr.ctr_fecha_contrato,ctr.ctr_id_vendedor,usr.usr_nombre, ctr.clts_domicilio, ctr.clts_col, ctr.clts_entre_calles, ctr.ctr_cliente,ctr.ctr_numero_cuenta,ctr.ctr_ruta,ctr.ctr_elaboro,ctr.clts_curp,ctr.clts_telefono,ctr.clts_registro_venta,ctr.clts_caja,ctr.clts_folio_nuevo,ctr.ctr_aprovado_ventas FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id WHERE ctr.ctr_id_vendedor
            LIKE '%$ctr_vendedor%' AND ( ctr.ctr_fecha_contrato BETWEEN ? AND ? ) ORDER BY ctr.ctr_fecha_contrato DESC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_fecha_inicio);
            $pps->bindValue(2, $ctr_fecha_fin);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarContratosFechaExcel($ctr_vendedor, $ctr_fecha_inicio, $ctr_fecha_fin)
    {
        try {
            $sql = "SELECT usr.usr_nombre,ctr.* FROM tbl_contrato_crt_1 ctr JOIN tbl_usuarios_usr usr ON ctr.ctr_id_vendedor = usr.usr_id WHERE ctr.ctr_id_vendedor
            LIKE '%$ctr_vendedor%' AND ( ctr.ctr_fecha_contrato BETWEEN ? AND ? ) ORDER BY ctr.ctr_fecha_contrato DESC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_fecha_inicio);
            $pps->bindValue(2, $ctr_fecha_fin);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlmBuscarContratosCodigo($ctr_numero_cuenta, $ctr_ruta)
    {
        try {
            //code..
            $sql = "SELECT ctr_numero_cuenta, ctr_ruta FROM tbl_contrato_crt_1 WHERE ctr_numero_cuenta =? AND ctr_ruta = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ctr_numero_cuenta);
            $pps->bindValue(2, $ctr_ruta);
            $pps->execute();
            return $pps->fetch();
        } catch (PdoException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
