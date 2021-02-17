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
            $sql = "INSERT INTO tbl_gastos_tgts (tgts_categoria,tgts_concepto,tgts_fecha_gasto,tgts_cantidad,tgts_mp,tgts_nota,tgts_usuario_registro,tgts_id_sucursal,tgts_id_corte) VALUES(?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $gasto['tgts_categoria']);
            $pps->bindValue(2, $gasto['tgts_concepto']);
            $pps->bindValue(3, $gasto['tgts_fecha_gasto']);
            $pps->bindValue(4, $gasto['tgts_cantidad']);
            $pps->bindValue(5, $gasto['tgts_mp']);
            $pps->bindValue(6, $gasto['tgts_nota']);
            $pps->bindValue(7, $gasto['tgts_usuario_registro']);
            $pps->bindValue(8, $gasto['tgts_id_sucursal']);
            $pps->bindValue(9, $gasto['tgts_id_corte']);
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

    public static function mdlConsultarGastos($tgts_id = "", $gts_categoria = "")
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
            } else if ($tgts_id == "") {
                $sql = "SELECT tgts.*,gts.gts_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria = gts.gts_id WHERE  tgts.tgts_id_sucursal = ?  ORDER BY tgts.tgts_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                
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
}
