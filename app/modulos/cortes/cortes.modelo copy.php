<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/01/2021 03:01
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class CortesModelo2
{
    public static function mdlAgregarCortes()
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
    public static function mdlActualizarCortes()
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
    public static function mdlMostrarCortes($cts = "", $cts_last = false)
    {
        try {
            //code...
            if ($cts != "" && $cts_last) {
                $sql = "SELECT * FROM tbl_cortes_cts ORDER BY cts_id LIMIT 1";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetch();
            }
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarCortes()
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

    public static function mdlConsultarTodasVentasFichaAdminByCorte($cts_id, $vts_estado)
    {
        try {
            //code...
            $sql = "SELECT SUM(vfch_monto) AS vfch_monto_total FROM tbl_ficha_venta_vfch WHERE  vfch_id_corte = ? AND  vfch_estado = ? AND vfch_id_sucursal  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts_id);
            $pps->bindValue(2, $vts_estado);
            $pps->bindValue(3, $_SESSION['session_suc']['scl_id']);
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

    public static function mdlConsultarTodasVentasFichaAdminByCorteMP($cts_id, $vts_estado, $mp)
    {
        try {
            //code...
            $sql = "SELECT SUM(vfch_monto) AS monto_total FROM tbl_ficha_venta_vfch WHERE  vfch_id_corte = ? AND  vfch_estado = ? AND vfch_id_sucursal  = ? AND vfch_mp = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts_id);
            $pps->bindValue(2, $vts_estado);
            $pps->bindValue(3, $_SESSION['session_suc']['scl_id']);
            $pps->bindValue(4, $mp);
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
    public static function mdlConsultarTodasVentasFichaAdminByCorteMPE($cts_id, $vts_estado)
    {
        try {
            //code...
            $sql = "SELECT SUM(vfch_monto) AS monto_total FROM tbl_ficha_venta_vfch WHERE  vfch_id_corte = ? AND  vfch_estado = ? AND vfch_id_sucursal  = ? AND vfch_mp != 'EFECTIVO' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts_id);
            $pps->bindValue(2, $vts_estado);
            $pps->bindValue(3, $_SESSION['session_suc']['scl_id']);
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


    public static function mdlConsultarTodasIngresosAdminByCorte($cts_id, $vts_estado = "")
    {
        try {
            //code...
            $sql = "SELECT SUM(igs_monto) AS igs_monto_total FROM tbl_ingresos_igs WHERE  igs_id_corte = ? AND igs_id_sucursal  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts_id);
            $pps->bindValue(2, $_SESSION['session_suc']['scl_id']);
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

    public static function mdlConsultarTodasIngresosAdminByCorteMPE($cts_id, $vts_estado = "")
    {
        try {
            //code...
            $sql = "SELECT SUM(igs_monto) AS igs_monto FROM tbl_ingresos_igs WHERE  igs_id_corte = ? AND igs_id_sucursal  = ? AND igs_mp != 'EFECTIVO' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts_id);
            $pps->bindValue(2, $_SESSION['session_suc']['scl_id']);
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
    public static function mdlConsultarTodasIngresosAdminByCorteMP($cts_id, $vts_estado = "")
    {
        try {
            //code...
            $sql = "SELECT SUM(igs_monto) AS igs_monto FROM tbl_ingresos_igs WHERE  igs_id_corte = ? AND igs_id_sucursal  = ? AND igs_mp = 'EFECTIVO' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts_id);
            $pps->bindValue(2, $_SESSION['session_suc']['scl_id']);
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


    public static function mdlConsultarTodasGastosAdminByCorteMPE($cts_id, $vts_estado = "")
    {
        try {
            //code...
            $sql = "SELECT SUM(tgts_cantidad) AS tgts_cantidad FROM tbl_gastos_tgts WHERE  tgts_id_corte = ? AND tgts_id_sucursal  = ? AND tgts_mp != 'EFECTIVO' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts_id);
            $pps->bindValue(2, $_SESSION['session_suc']['scl_id']);
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
    public static function mdlConsultarTodasGastosAdminByCorteMP($cts_id, $vts_estado = "")
    {
        try {
            //code...
            $sql = "SELECT SUM(tgts_cantidad) AS tgts_cantidad FROM tbl_gastos_tgts WHERE  tgts_id_corte = ? AND tgts_id_sucursal  = ? AND tgts_mp = 'EFECTIVO' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts_id);
            $pps->bindValue(2, $_SESSION['session_suc']['scl_id']);
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

    public static function mdlConsultarTodasGastosAdminByCorte($cts_id, $vts_estado = "")
    {
        try {
            //code...
            $sql = "SELECT SUM(tgts_cantidad) AS tgts_monto_total FROM tbl_gastos_tgts WHERE  tgts_id_corte = ? AND tgts_id_sucursal  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts_id);
            $pps->bindValue(2, $_SESSION['session_suc']['scl_id']);
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





    public static function mdlConsultarMontoFichasPEByCorte($vfch_id_corte)
    {
        try {
            //code...
            $sql = "SELECT SUM(vfch_monto) monto_total FROM tbl_ficha_venta_vfch WHERE vfch_mp = 'EFECTIVO' AND vfch_estado = 'PAGADO' AND vfch_id_corte = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $vfch_id_corte);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarTodoFichasPEByCorte($vfch_id_corte)
    {
        try {
            //code...
            $sql = "SELECT *  FROM tbl_ficha_venta_vfch WHERE vfch_mp = 'EFECTIVO' AND vfch_estado = 'PAGADO' AND vfch_id_corte = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $vfch_id_corte);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarMontoFichasPBByCorte($vfch_id_corte)
    {
        try {
            //code...
            $sql = "SELECT SUM(vfch_monto) monto_total FROM tbl_ficha_venta_vfch WHERE vfch_mp != 'EFECTIVO' AND vfch_estado = 'PAGADO' AND vfch_id_corte = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $vfch_id_corte);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarTodoFichasPBByCorte($vfch_id_corte)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_ficha_venta_vfch WHERE vfch_mp != 'EFECTIVO' AND vfch_estado = 'PAGADO' AND vfch_id_corte = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $vfch_id_corte);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlConsultarMontoIngresosPEByCorte($igs_id_corte)
    {
        try {
            //code...
            $sql = "SELECT SUM(igs_monto) monto_total FROM tbl_ingresos_igs WHERE igs_mp = 'EFECTIVO' AND igs_id_corte = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarMontoIngresosPEByCorte2($igs_id_corte)
    {
        try {
            //code...
            $sql = "SELECT SUM(igs_monto) monto_total FROM tbl_ingresos_igs WHERE igs_mp = 'EFECTIVO' AND igs_id_corte_2 = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }



    public static function mdlConsultarTodoIngresosPEByCorte($igs_id_corte)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_ingresos_igs WHERE igs_mp = 'EFECTIVO' AND igs_id_corte = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarMontoIngresosPBByCorte($igs_id_corte)
    {
        try {
            //code...
            $sql = "SELECT SUM(igs_monto) monto_total FROM tbl_ingresos_igs WHERE igs_mp != 'EFECTIVO' AND igs_id_corte = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarTodoIngresosPBByCorte($igs_id_corte)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_ingresos_igs WHERE igs_mp != 'EFECTIVO' AND igs_id_corte = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlConsultarMontoGastosPEByCorte($tgts_id_corte)
    {
        try {
            //code...
            $sql = "SELECT SUM(tgts_cantidad) monto_total FROM tbl_gastos_tgts WHERE tgts_mp = 'EFECTIVO' AND tgts_id_corte = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tgts_id_corte);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarTodoGastosPEByCorte($tgts_id_corte)
    {
        try {
            //code...
            $sql = "SELECT tgts.*,gts.* FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON tgts.tgts_categoria=gts.gts_id WHERE tgts_mp = 'EFECTIVO' AND tgts_id_corte = ?";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tgts_id_corte);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarMontoGastosPBByCorte($tgts_id_corte)
    {
        try {
            //code...
            $sql = "SELECT SUM(tgts_cantidad) monto_total FROM tbl_gastos_tgts WHERE tgts_mp != 'EFECTIVO' AND tgts_id_corte = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tgts_id_corte);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarTodoGastosPBByCorte($tgts_id_corte)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_gastos_tgts WHERE tgts_mp != 'EFECTIVO' AND tgts_id_corte = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tgts_id_corte);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
