<?php
require_once DOCUMENT_ROOT . 'app/modulos/conexion/conexion.php';
class GastosModelo
{
    public static function mdlConsultarCategorias($gts_id = "")
    {
        try {
            if ($gts_id == "") {
                $sql = "SELECT * FROM tbl_categoria_gastos_gts ORDER BY gts_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($gts_id != "") {
                $sql = "SELECT * FROM tbl_categoria_gastos_gts WHERE gts_id  = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $gts_id);
                $pps->execute();
                return $pps->fetch();
            }
        } catch (PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlCrearCategoria($categoria)
    {

        try {
            $sql = "INSERT INTO tbl_categoria_gastos_gts (gts_nombre,gts_presupuesto) VALUES(?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $categoria['gts_nombre']);
            $pps->bindValue(2, $categoria['gts_presupuesto']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlCrearGasto($gasto)
    {

        try {
            $sql = "INSERT INTO tbl_gastos_tgts (tgts_ruta,tgts_usuario_responsable,tgts_categoria,tgts_concepto,tgts_fecha_gasto,tgts_cantidad,tgts_mp,tgts_nota,tgts_usuario_registro,tgts_id_sucursal,tgts_id_corte,tgts_id_corte2,tgts_tipo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $gasto['tgts_ruta']);
            $pps->bindValue(2, $gasto['tgts_usuario_responsable']);
            $pps->bindValue(3, $gasto['tgts_categoria']);
            $pps->bindValue(4, $gasto['tgts_concepto']);
            $pps->bindValue(5, $gasto['tgts_fecha_gasto']);
            $pps->bindValue(6, $gasto['tgts_cantidad']);
            $pps->bindValue(7, $gasto['tgts_mp']);
            $pps->bindValue(8, $gasto['tgts_nota']);
            $pps->bindValue(9, $gasto['tgts_usuario_registro']);
            $pps->bindValue(10, $gasto['tgts_id_sucursal']);
            $pps->bindValue(11, $gasto['tgts_id_corte']);
            $pps->bindValue(12, $gasto['tgts_id_corte2']);
            $pps->bindValue(13, $gasto['tgts_tipo']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    //SELECT tgts.*,gts.gts_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria = gts.gts_id

    public static function mdlConsultarGastos($tgts_id = "", $gts_categoria = "", $tgst_usuario = "")
    {
        try {

            if ($tgts_id == "" &&  $gts_categoria != "") {

                $sql = "SELECT tgts.* FROM tbl_gastos_tgts tgts  WHERE tgts.tgts_categoria = ? AND tgts.tgts_id_sucursal = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $gts_categoria);
                $pps->bindValue(2, $_SESSION['session_suc']['scl_id']);
                $pps->execute();
                return $pps->fetchAll();
            } else if ($tgts_id == "" && $tgst_usuario == "") {
                $sql = "SELECT tgts.*,gts.gts_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria = gts.gts_id WHERE  tgts.tgts_id_sucursal = ?  ORDER BY tgts.tgts_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);

                $pps->execute();
                return $pps->fetchAll();
            } else if ($tgst_usuario != "") {
                $sql = "SELECT tgts.*,gts.gts_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria = gts.gts_id WHERE  tgts.tgts_id_sucursal = ? AND tgts_usuario_registro = ?  ORDER BY tgts.tgts_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                $pps->bindValue(2, $tgst_usuario);

                $pps->execute();
                return $pps->fetchAll();
            } elseif ($tgts_id != "") {
                $sql = "SELECT tgts.*,gts.gts_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria = gts.gts_id WHERE tgts.tgts_id  = ? AND tgts.tgts_id_sucursal = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $tgts_id);
                $pps->bindValue(2, $_SESSION['session_suc']['scl_id']);
                $pps->execute();
                return $pps->fetch();
            }
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarGastosPorFecha($tgts)
    {
        try {

            if ($tgts['tgts_categoria'] == ""  && $tgts['tgts_fecha_gasto_inicio'] == "" && $tgts['tgts_fecha_gasto_fin'] == "") {
                $sql = "SELECT tgts.*,gts.gts_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria = gts.gts_id ORDER BY tgts.tgts_id DESC";
            } elseif ($tgts['tgts_categoria'] != ""  && $tgts['tgts_fecha_gasto_inicio'] == "" && $tgts['tgts_fecha_gasto_fin'] == "") {
                $sql = "SELECT tgts.*,gts.gts_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria = gts.gts_id WHERE tgts_categoria = '$tgts[tgts_categoria]' ORDER BY tgts.tgts_id DESC";
            } elseif ($tgts['tgts_categoria'] != ""  && $tgts['tgts_fecha_gasto_inicio'] != "" && $tgts['tgts_fecha_gasto_fin'] != "") {
                $sql = "SELECT tgts.*,gts.gts_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria = gts.gts_id WHERE tgts_categoria = '$tgts[tgts_categoria]' AND tgts_fecha_gasto BETWEEN '$tgts[tgts_fecha_gasto_inicio]' AND '$tgts[tgts_fecha_gasto_fin]' ORDER BY tgts.tgts_id DESC";
            } elseif ($tgts['tgts_categoria'] == ""  && $tgts['tgts_fecha_gasto_inicio'] != "" && $tgts['tgts_fecha_gasto_fin'] != "") {
                $sql = "SELECT tgts.*,gts.gts_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria = gts.gts_id WHERE tgts_fecha_gasto BETWEEN '$tgts[tgts_fecha_gasto_inicio]' AND '$tgts[tgts_fecha_gasto_fin]' ORDER BY tgts.tgts_id DESC";
            }
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            return $th->getMessage();
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlEliminarGasto($tgts_id)
    {

        try {
            $sql = "DELETE FROM  tbl_gastos_tgts  WHERE tgts_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tgts_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarCategoria($gts_id)
    {

        try {
            $sql = "DELETE FROM  tbl_categoria_gastos_gts  WHERE gts_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $gts_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarGastosFecha($fecha_inicio, $fecha_final)
    {
        try {
            $sql = "SELECT * FROM tbl_gastos_tgts WHERE tgts_fecha_gasto BETWEEN '$fecha_inicio' AND '$fecha_final' ";
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
    public static function mdlMostrarGastosFechas($fecha_inicio, $fecha_fin)
    {
        try {
            //code...
            // $sql = "SELECT cra.*,crt.ctr_id,crt.ctr_folio,crt.ctr_cliente, crt.clts_telefono, crt.clts_curp, crt.clts_domicilio, crt.clts_col, crt.clts_entre_calles, crt.clts_coordenadas, crt.clts_fachada_color, crt.clts_puerta_color, crt.ctr_numero_cuenta, crt.ctr_ruta, crt.ctr_productos, crt.ctr_forma_pago, crt.ctr_dia_pago, crt.ctr_plazo_credito, crt.ctr_pago_credito, crt.ctr_total, crt.ctr_enganche, crt.sobre_enganche_pendiente, crt.ctr_pago_adicional, crt.ctr_saldo_actual, crt.ctr_fecha_contrato,crt.ctr_proximo_pago, crt.ctr_total_pagado FROM tbl_cartelera_cra cra JOIN tbl_contrato_crt_1 crt ON crt.ctr_id = cra.cra_contrato WHERE  crt.ctr_status_cuenta = 'VIGENTE' AND crt.ctr_enrutar = 'S' AND  cra.cra_cobranza_status = '1' AND crt.ctr_ruta = ?  ORDER BY cra.cra_orden ASC";
            $sql = "SELECT * FROM tbl_gastos_tgts WHERE DATE(tgts_fecha_gasto) BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY tgts_id  DESC";

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
    public static function mdlEditarNota($tabla, $campo, $nota, $valor, $id)
    {
        try {
            $sql = "UPDATE $tabla SET $campo = ? WHERE $valor = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $nota);
            $pps->bindValue(2, $id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlConsultarGastoByCaja($tgts_id_corte)
    {

        try {
            //code...
            $sql = "SELECT tgts.*,gts.*,usr.usr_nombre FROM tbl_gastos_tgts tgts  JOIN tbl_categoria_gastos_gts gts ON gts.gts_id = tgts.tgts_categoria JOIN tbl_usuarios_usr usr ON usr.usr_id = tgts.tgts_usuario_responsable  WHERE tgts_id_corte = ? ORDER BY tgts.tgts_id DESC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tgts_id_corte);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }

    public static function mdlConsultarGastoByCaja2($tgts_id_corte2)
    {

        try {
            //code...
            $sql = "SELECT tgts.*,gts.*,usr.usr_nombre FROM tbl_gastos_tgts tgts  JOIN tbl_categoria_gastos_gts gts ON gts.gts_id = tgts.tgts_categoria JOIN tbl_usuarios_usr usr ON usr.usr_id = tgts.tgts_usuario_responsable  WHERE tgts_id_corte2 = ? ORDER BY tgts.tgts_id DESC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tgts_id_corte2);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }

    public static function mdlConsultarCajaAbierta($tbl_gastos_tgts)
    {

        try {
            //code...
            $sql = "SELECT copn_fecha_cierre FROM tbl_caja_open_copn WHERE copn_id = ?  ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tbl_gastos_tgts);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }

    public static function mdlAgregarGastoGasEmpleado($gtsg)
    {
        try {
            $sql = "INSERT INTO tbl_gastos_gasolina_gtsg (gtsg_usuario_registro,gtsg_usuario_responsable,
            gtsg_vehiculo_placas,gtsg_precio_litro,gtsg_cantidad_litros,gtsg_monto,gtsg_fecha_registro,gtsg_kilometraje,gtsg_copn_id) VALUES(?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $gtsg['gtsg_usuario_registro']);
            $pps->bindValue(2, $gtsg['gtsg_usuario_responsable']);
            $pps->bindValue(3, $gtsg['gtsg_vehiculo_placas']);
            $pps->bindValue(4, $gtsg['gtsg_precio_litro']);
            $pps->bindValue(5, $gtsg['gtsg_cantidad_litros']);
            $pps->bindValue(6, $gtsg['gtsg_monto']);
            $pps->bindValue(7, $gtsg['gtsg_fecha_registro']);
            $pps->bindValue(8, $gtsg['gtsg_kilometraje']);
            $pps->bindValue(9, $gtsg['gtsg_copn_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarResumenGas($dts)
    {

        try {
            //code...
            $sql = "SELECT gtsg.*,usr.usr_nombre FROM tbl_gastos_gasolina_gtsg gtsg 
            JOIN tbl_usuarios_usr usr ON usr.usr_id = gtsg.gtsg_usuario_responsable 
            WHERE gtsg.gtsg_fecha_registro BETWEEN ? AND ? AND gtsg.gtsg_usuario_responsable=?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dts['gtsg_fecha_inicio']);
            $pps->bindValue(2, $dts['gtsg_fecha_fin']);
            $pps->bindValue(3, $dts['gtsg_usuario_responsableGas']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }

    public static function mdlMostrarResumenGasall($dts)
    {

        try {
            //code...
            $sql = "SELECT gtsg.*,usr.usr_nombre FROM tbl_gastos_gasolina_gtsg gtsg 
            JOIN tbl_usuarios_usr usr ON usr.usr_id = gtsg.gtsg_usuario_responsable 
            WHERE gtsg.gtsg_fecha_registro BETWEEN ? AND ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dts['gtsg_fecha_inicio']);
            $pps->bindValue(2, $dts['gtsg_fecha_fin']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }

    public static function mdlMostrarResumenGastosxy($dts)
    {

        try {
            //code...tbl_categoria_gastos_gts
            $sql = "SELECT gts.*,usr.usr_nombre, cat.gts_nombre FROM tbl_gastos_tgts gts 
            JOIN tbl_usuarios_usr usr ON usr.usr_id = gts.tgts_usuario_responsable
            JOIN tbl_categoria_gastos_gts cat ON cat.gts_id = gts.tgts_categoria 
            WHERE (gts.tgts_fecha_gasto BETWEEN ? AND ?) AND gts.tgts_usuario_responsable=? AND gts.tgts_categoria =? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dts['gts_fecha_inicio']);
            $pps->bindValue(2, $dts['gts_fecha_fin']);
            $pps->bindValue(3, $dts['tgts_usuario_responsable']);
            $pps->bindValue(4, $dts['tgts_categoria']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }
    public static function mdlMostrarResumenGastosx($dts)
    {

        try {
            //code...tbl_categoria_gastos_gts
            $sql = "SELECT gts.*,usr.usr_nombre, cat.gts_nombre FROM tbl_gastos_tgts gts 
            JOIN tbl_usuarios_usr usr ON usr.usr_id = gts.tgts_usuario_responsable
            JOIN tbl_categoria_gastos_gts cat ON cat.gts_id = gts.tgts_categoria 
            WHERE (gts.tgts_fecha_gasto BETWEEN ? AND ?) AND gts.tgts_usuario_responsable=? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dts['gts_fecha_inicio']);
            $pps->bindValue(2, $dts['gts_fecha_fin']);
            $pps->bindValue(3, $dts['tgts_usuario_responsable']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }
    public static function mdlMostrarResumenGastosy($dts)
    {

        try {
            //code...tbl_categoria_gastos_gts
            $sql = "SELECT gts.*,usr.usr_nombre, cat.gts_nombre FROM tbl_gastos_tgts gts 
            JOIN tbl_usuarios_usr usr ON usr.usr_id = gts.tgts_usuario_responsable
            JOIN tbl_categoria_gastos_gts cat ON cat.gts_id = gts.tgts_categoria 
            WHERE (gts.tgts_fecha_gasto BETWEEN ? AND ?) AND gts.tgts_categoria =? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dts['gts_fecha_inicio']);
            $pps->bindValue(2, $dts['gts_fecha_fin']);
            $pps->bindValue(3, $dts['tgts_categoria']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }

    public static function mdlMostrarResumenGastosall($dts)
    {

        try {
            //code...
            $sql = "SELECT gts.*,usr.usr_nombre, cat.gts_nombre FROM tbl_gastos_tgts gts 
            JOIN tbl_usuarios_usr usr ON usr.usr_id = gts.tgts_usuario_responsable
            JOIN tbl_categoria_gastos_gts cat ON cat.gts_id = gts.tgts_categoria 
            WHERE (gts.tgts_fecha_gasto BETWEEN ? AND ?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dts['gts_fecha_inicio']);
            $pps->bindValue(2, $dts['gts_fecha_fin']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }

   
    public static function mdlMostrarSumDebeAllUsr($fi,$ff)
    {

        try {
            //code...
            $sql = "SELECT tgts_usuario_responsable,SUM(tgts_cantidad) AS sumadbe,tgts_fecha_gasto FROM tbl_gastos_tgts 
            WHERE tgts_categoria=11 AND (tgts_fecha_gasto BETWEEN ? AND ?) 
            GROUP BY tgts_usuario_responsable ORDER BY tgts_usuario_responsable ASC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $fi);
            $pps->bindValue(2, $ff);
           
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }
    public static function mdlMostrarSumDebeUsr($idus,$fi,$ff)
    {

        try {
            //code...
            $sql = "SELECT SUM(tgts_cantidad) AS sumadbe,tgts_fecha_gasto FROM tbl_gastos_tgts 
            WHERE tgts_categoria=11 AND tgts_usuario_responsable=? AND (tgts_fecha_gasto BETWEEN ? AND ?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $idus);
            $pps->bindValue(2, $fi);
            $pps->bindValue(3, $ff);
           
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;;
        }
    }
}
