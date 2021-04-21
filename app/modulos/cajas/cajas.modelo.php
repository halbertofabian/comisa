
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/01/2021 19:49
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class CajasModelo
{
    public static function mdlAgregarCajas($cja)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_caja_cja (cja_nombre,cja_id_sucursal,cja_usuario_registro,cja_fecha_registro,cja_uso) VALUES(?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cja['cja_nombre']);
            $pps->bindValue(2, $cja['cja_id_sucursal']);
            $pps->bindValue(3, $cja['cja_usuario_registro']);
            $pps->bindValue(4, $cja['cja_fecha_registro']);
            $pps->bindValue(5, $cja['cja_uso']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarCajas()
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
    public static function mdlMostrarCajasDisponibles($scl_id = "", $cja_uso = 0)
    {
        try {
            //code...
            if ($scl_id != "") {

                $sql = "SELECT * FROM tbl_caja_cja WHERE cja_id_sucursal = ? AND cja_uso = ?";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $scl_id);
                $pps->bindValue(2, $cja_uso);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarCajas($scl_id = "")
    {
        try {
            //code...
            if ($scl_id == "") {
                $sql = "SELECT * FROM tbl_caja_cja";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($scl_id != "") {
                $sql = "SELECT * FROM tbl_caja_cja WHERE cja_id_sucursal = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlMostrarCajasById($copn_id = "")
    {
        try {
            //code...
            if ($copn_id != "") {

                $sql = "SELECT copn.*,usr.*,cja.*,scl.* FROM tbl_caja_open_copn copn  JOIN  tbl_usuarios_usr usr ON usr.usr_id = copn.copn_usuario_abrio JOIN tbl_caja_cja cja ON cja.cja_id_caja = copn.copn_id_caja JOIN tbl_sucursal_scl scl ON scl.scl_id = copn.copn_id_sucursal   WHERE copn.copn_id = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $copn_id);
                $pps->execute();
                return $pps->fetch();
            } elseif ($copn_id == "") {
                $sql = "SELECT copn.*,usr.*,cja.*,scl.* FROM tbl_caja_open_copn copn  JOIN  tbl_usuarios_usr usr ON usr.usr_id = copn.copn_usuario_abrio JOIN tbl_caja_cja cja ON cja.cja_id_caja = copn.copn_id_caja JOIN tbl_sucursal_scl scl ON scl.scl_id = copn.copn_id_sucursal   WHERE copn.copn_id_sucursal = ?  ORDER BY copn_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarCajasById2($copn_id = "")
    {
        try {
            //code...
            if ($copn_id != "") {

                $sql = "SELECT copn.*,usr.*,cja.*,scl.* FROM tbl_caja_open_copn copn  JOIN  tbl_usuarios_usr usr ON usr.usr_id = copn.copn_usuario_abrio JOIN tbl_caja_cja cja ON cja.cja_id_caja = copn.copn_id_caja JOIN tbl_sucursal_scl scl ON scl.scl_id = copn.copn_id_sucursal   WHERE copn.copn_id = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $copn_id);
                $pps->execute();
                return $pps->fetch();
            } elseif ($copn_id == "") {
                $sql = "SELECT copn.*,usr.*,cja.*,scl.* FROM tbl_caja_open_copn copn  JOIN  tbl_usuarios_usr usr ON usr.usr_id = copn.copn_usuario_abrio JOIN tbl_caja_cja cja ON cja.cja_id_caja = copn.copn_id_caja JOIN tbl_sucursal_scl scl ON scl.scl_id = copn.copn_id_sucursal   WHERE copn.copn_id_sucursal = ?  ORDER BY copn_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarCajas()
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

    public static function mdlAbrirCaja($copn)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_caja_open_copn  (copn_ingreso_inicio,copn_usuario_abrio,copn_fecha_abrio,copn_id_caja,copn_id_sucursal) VALUES (?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $copn['copn_ingreso_inicio']);
            $pps->bindValue(2, $copn['copn_usuario_abrio']);
            $pps->bindValue(3, $copn['copn_fecha_abrio']);
            $pps->bindValue(4, $copn['copn_id_caja']);
            $pps->bindValue(5, $copn['copn_id_sucursal']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarUltimaCajaAbierta($copn)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_caja_open_copn WHERE copn_usuario_abrio = ? AND copn_id_caja = ? AND copn_id_sucursal = ? ORDER BY copn_id DESC LIMIT 1 ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $copn['copn_usuario_abrio']);
            $pps->bindValue(2, $copn['copn_id_caja']);
            $pps->bindValue(3, $copn['copn_id_sucursal']);

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
    public static function mdlActualizarDisponibilidadCaja($cja_uso, $cja_id_caja, $cja_copn_id, $cja_saldo)
    {
        try {
            //code...
            $sql = "UPDATE tbl_caja_cja SET cja_uso = ?, cja_copn_id = ?, cja_saldo = ? WHERE cja_id_caja = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cja_uso);
            $pps->bindValue(2, $cja_copn_id);
            $pps->bindValue(3, $cja_saldo);
            $pps->bindValue(4, $cja_id_caja);
            $pps->execute();
            return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlCerrarCaja($copn)
    {
        try {
            //code...
            $sql = "UPDATE tbl_caja_open_copn SET copn_usuario_cerro = ?, copn_ingreso_efectivo = ?, 
            copn_ingreso_banco = ?, copn_efectivo_real = ?, copn_banco_real = ?, copn_fecha_cierre = ?, copn_saldo = ?, copn_registro = ?, copn_tipo_caja = ?, copn_tabulador = ? WHERE copn_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $copn['copn_usuario_cerro']);
            $pps->bindValue(2, $copn['copn_ingreso_efectivo']);
            $pps->bindValue(3, $copn['copn_ingreso_banco']);
            $pps->bindValue(4, $copn['copn_efectivo_real']);
            $pps->bindValue(5, $copn['copn_banco_real']);
            $pps->bindValue(6, $copn['copn_fecha_cierre']);
            $pps->bindValue(7, $copn['copn_saldo']);
            $pps->bindValue(8, $copn['copn_registro']);
            $pps->bindValue(9, $copn['copn_tipo_caja']);
            $pps->bindValue(10, $copn['copn_tabulador']);
            $pps->bindValue(11, $copn['copn_id']);



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

    public static function mdlConsultarCajaById($cja_id_caja)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_caja_cja WHERE cja_id_caja = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cja_id_caja);
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


    // Reportes 
    public static function mdlMostrarCajasCobranzaById($copn_id = "")
    {
        try {
            //code...
            if ($copn_id != "") {

                $sql = "SELECT copn.*,usr.*,cja.*,scl.* FROM tbl_caja_open_copn copn  JOIN  tbl_usuarios_usr usr ON usr.usr_id = copn.copn_usuario_abrio JOIN tbl_caja_cja cja ON cja.cja_id_caja = copn.copn_id_caja JOIN tbl_sucursal_scl scl ON scl.scl_id = copn.copn_id_sucursal   WHERE copn.copn_id = ?  ORDER BY copn.copn_id  DESC  ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $copn_id);
                $pps->execute();
                return $pps->fetch();
            } elseif ($copn_id == "") {
                $sql = "SELECT copn.*,usr.*,cja.*,scl.* FROM tbl_caja_open_copn copn  JOIN  tbl_usuarios_usr usr ON usr.usr_id = copn.copn_usuario_abrio JOIN tbl_caja_cja cja ON cja.cja_id_caja = copn.copn_id_caja JOIN tbl_sucursal_scl scl ON scl.scl_id = copn.copn_id_sucursal     ORDER BY copn.copn_id  DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlMostrarCajasByIdUsuario($usr_id = "")
    {
        try {
            //code...
            $sql = "SELECT copn.*,usr.*,cja.*,scl.* FROM tbl_caja_open_copn copn  JOIN  tbl_usuarios_usr usr ON usr.usr_id = copn.copn_usuario_abrio JOIN tbl_caja_cja cja ON cja.cja_id_caja = copn.copn_id_caja JOIN tbl_sucursal_scl scl ON scl.scl_id = copn.copn_id_sucursal   WHERE usr.usr_id = ?  ORDER BY copn.copn_id  DESC  ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarIngresosCajaEfectivo($igs_id_corte_2, $igs_tipo = 'COBRANZA')
    {
        try {

            $sql = "SELECT igs.igs_id,igs.igs_concepto,igs.igs_monto,igs.igs_fecha_registro,igs.igs_usuario_registro,igs.igs_mp,igs.igs_tipo,usr.usr_nombre  FROM tbl_ingresos_igs igs JOIN tbl_usuarios_usr usr ON usr.usr_id = igs.igs_usuario_responsable WHERE igs_id_corte_2 = ?  AND igs.igs_mp = 'EFECTIVO' AND igs.igs_concepto != 'INICIO DE CAJA' AND igs_tipo = ?  ORDER BY igs_fecha_registro ASC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte_2);
            $pps->bindValue(2, $igs_tipo);
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
    public static function mdlConsultarReIngresosCajaCobranzaEfectivo($igs_id_corte_2, $igs_tipo = 'REINGRESOS_COBRANZA')
    {
        try {

            $sql = "SELECT igs.igs_id,igs.igs_concepto,igs.igs_monto,igs.igs_fecha_registro,igs.igs_usuario_registro,igs.igs_mp,igs.igs_tipo,usr.usr_nombre  FROM tbl_ingresos_igs igs JOIN tbl_usuarios_usr usr ON usr.usr_id = igs.igs_usuario_responsable WHERE igs_id_corte_2 = ?  AND igs.igs_mp = 'EFECTIVO' AND igs.igs_concepto != 'INICIO DE CAJA' AND igs_tipo = ? ORDER BY igs_fecha_registro ASC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte_2);
            $pps->bindValue(2, $igs_tipo);
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

    public static function mdlConsultarPrestamoCPCajaCobranzaEfectivo($igs_id_corte_2)
    {
        try {

            $sql = "SELECT SUM(igs_monto) AS CP_SAMUEL FROM `tbl_ingresos_igs` WHERE igs_tipo = 'PRESTO_CP_SAMUEL_COBRANZA' AND igs_id_corte_2 = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte_2);
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
    public static function mdlConsultarIngresosCajaCobranzaBanco($igs_id_corte_2)
    {
        try {

            $sql = "SELECT igs.igs_id,igs.igs_concepto,igs.igs_monto,igs.igs_fecha_registro,igs.igs_usuario_registro,igs.igs_mp,igs.igs_referencia,igs.igs_cuenta,usr.usr_nombre  FROM tbl_ingresos_igs igs JOIN tbl_usuarios_usr usr ON usr.usr_id = igs.igs_usuario_responsable WHERE igs_id_corte_2 = ?  AND igs.igs_mp != 'EFECTIVO' AND igs.igs_concepto != 'INICIO DE CAJA' ORDER BY igs_fecha_registro ASC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $igs_id_corte_2);
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
    public static function mdlConsultarCuentas($cbco_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_cuentas_banco_cbco  WHERE cbco_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cbco_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarGastosCajaEfectivo($tgts_id_corte2,$tgts_tipo = "COBRANZA")
    {
        try {
            $sql = "SELECT tgts.tgts_id, tgts.tgts_concepto,tgts.tgts_fecha_gasto,tgts.tgts_cantidad,tgts.tgts_mp,tgts.tgts_usuario_registro,gts.gts_nombre,usr.usr_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON gts.gts_id = tgts.tgts_categoria JOIN tbl_usuarios_usr usr ON usr.usr_id = tgts.tgts_usuario_responsable WHERE tgts_id_corte2 = ? AND tgts_mp = 'EFECTIVO' AND tgts.tgts_tipo = ? ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tgts_id_corte2);
            $pps->bindValue(2, $tgts_tipo);
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

    public static function mdlConsultarGastosVentasCajaEfectivo($tgts_id_corte2)
    {
        try {
            $sql = "SELECT tgts.tgts_id, tgts.tgts_concepto,tgts.tgts_fecha_gasto,tgts.tgts_cantidad,tgts.tgts_mp,tgts.tgts_usuario_registro,gts.gts_nombre,usr.usr_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON gts.gts_id = tgts.tgts_categoria JOIN tbl_usuarios_usr usr ON usr.usr_id = tgts.tgts_usuario_responsable WHERE tgts_id_corte2 = ? AND tgts_mp = 'EFECTIVO' AND tgts.tgts_tipo = 'VENTAS' ";

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
            $con = null;
        }
    }


    public static function mdlConsultarGastosComisionesCajaEfectivo($tgts_id_corte2)
    {
        try {
            $sql = "SELECT tgts.tgts_id, tgts.tgts_concepto,tgts.tgts_fecha_gasto,tgts.tgts_cantidad,tgts.tgts_mp,tgts.tgts_usuario_registro,gts.gts_nombre,usr.usr_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON gts.gts_id = tgts.tgts_categoria JOIN tbl_usuarios_usr usr ON usr.usr_id = tgts.tgts_usuario_responsable WHERE tgts_id_corte2 = ? AND tgts_mp = 'EFECTIVO' AND tgts.tgts_tipo = 'COMISION' ";

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
            $con = null;
        }
    }

    public static function mdlConsultarGastosSueldosCajaEfectivo($tgts_id_corte2)
    {
        try {
            $sql = "SELECT tgts.tgts_id, tgts.tgts_concepto,tgts.tgts_fecha_gasto,tgts.tgts_cantidad,tgts.tgts_mp,tgts.tgts_usuario_registro,gts.gts_nombre,usr.usr_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON gts.gts_id = tgts.tgts_categoria JOIN tbl_usuarios_usr usr ON usr.usr_id = tgts.tgts_usuario_responsable WHERE tgts_id_corte2 = ? AND tgts_mp = 'EFECTIVO' AND tgts.tgts_tipo = 'SUELDO' ";

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
            $con = null;
        }
    }

    public static function mdlConsultarGastosVariosCajaEfectivo($tgts_id_corte2,$tgts_tipo = "VARIOS-COBRANZA")
    {
        try {
            $sql = "SELECT tgts.tgts_id, tgts.tgts_concepto,tgts.tgts_fecha_gasto,tgts.tgts_cantidad,tgts.tgts_mp,tgts.tgts_usuario_registro,gts.gts_nombre,usr.usr_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON gts.gts_id = tgts.tgts_categoria JOIN tbl_usuarios_usr usr ON usr.usr_id = tgts.tgts_usuario_responsable WHERE tgts_id_corte2 = ? AND tgts_mp = 'EFECTIVO' AND tgts.tgts_tipo = ? ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tgts_id_corte2);
            $pps->bindValue(2, $tgts_tipo);
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

    public static function mdlConsultarGastosPrestamosCajaEfectivo($tgts_id_corte2)
    {
        try {
            $sql = "SELECT tgts.tgts_id, tgts.tgts_concepto,tgts.tgts_fecha_gasto,tgts.tgts_cantidad,tgts.tgts_mp,tgts.tgts_usuario_registro,gts.gts_nombre,usr.usr_nombre FROM tbl_gastos_tgts tgts JOIN tbl_categoria_gastos_gts gts ON gts.gts_id = tgts.tgts_categoria JOIN tbl_usuarios_usr usr ON usr.usr_id = tgts.tgts_usuario_responsable WHERE tgts_id_corte2 = ? AND tgts_mp = 'EFECTIVO' AND tgts.tgts_tipo = 'PRESTAMO' ";

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
            $con = null;
        }
    }

    public static function mdlMostrarUsuarioCajaUso($cja_copn_id)
    {
        try {
            $sql = "SELECT usr.usr_nombre FROM tbl_caja_open_copn copn JOIN tbl_usuarios_usr usr ON  copn.copn_usuario_abrio = usr.usr_id WHERE copn.copn_id = ? ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cja_copn_id);
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
}
