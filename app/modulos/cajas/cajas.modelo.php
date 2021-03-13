
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
            copn_ingreso_banco = ?, copn_efectivo_real = ?, copn_banco_real = ?, copn_fecha_cierre = ?, copn_saldo = ?, copn_registro = ?, copn_tipo_caja = ? WHERE copn_id = ? ";
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
            $pps->bindValue(10, $copn['copn_id']);

            
            
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
            $pps ->bindValue(1,$cja_id_caja);
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
