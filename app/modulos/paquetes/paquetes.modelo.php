
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 27/11/2020 01:39
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class PaquetesModelo
{
    public static function mdlAgregarPaquetes($pqt)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_paquete_pqt (pqt_sku,pqt_nombre,pqt_modalidad,pqt_duracion,pqt_descripcion,pqt_costo,pqt_usuario_registro,pqt_fecha_registro,pqt_id_sucursal) VALUES(?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pqt['pqt_sku']);
            $pps->bindValue(2, $pqt['pqt_nombre']);
            $pps->bindValue(3, $pqt['pqt_modalidad']);
            $pps->bindValue(4, $pqt['pqt_duracion']);
            $pps->bindValue(5, $pqt['pqt_descripcion']);
            $pps->bindValue(6, $pqt['pqt_costo']);
            $pps->bindValue(7, $_SESSION['session_usr']['usr_id']);
            $pps->bindValue(8, FECHA);
            $pps->bindValue(9, $_SESSION['session_suc']['scl_id']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarPaquetes($pqt)
    {
        try {
            //code...
            $sql = "UPDATE  tbl_paquete_pqt SET pqt_nombre = ? , pqt_modalidad = ? , pqt_duracion = ? , pqt_descripcion = ? , pqt_costo = ?, pqt_usuario_registro = ? WHERE pqt_sku = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pqt['pqt_nombre']);
            $pps->bindValue(2, $pqt['pqt_modalidad']);
            $pps->bindValue(3, $pqt['pqt_duracion']);
            $pps->bindValue(4, $pqt['pqt_descripcion']);
            $pps->bindValue(5, $pqt['pqt_costo']);
            $pps->bindValue(6, $_SESSION['session_usr']['usr_id']);
            $pps->bindValue(7, $pqt['pqt_sku']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarPaquetes($pqt_sku = "", $pqt_id_sucursal = "")
    {
        try {
            //code...
            if ($pqt_sku == "") {
                $sql = "SELECT pqt.*, usr.usr_nombre FROM tbl_paquete_pqt pqt  JOIN tbl_usuarios_usr usr ON pqt.pqt_usuario_registro = usr.usr_id WHERE pqt_estado_actividad = 1 AND pqt_id_sucursal = ?   ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($pqt_sku != "") {
                $sql = "SELECT * FROM tbl_paquete_pqt WHERE pqt_estado_actividad = 1  AND pqt_sku = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                // $pps->bindValue(1, $_SESSION['session_suc']['scl_id']);
                $pps->bindValue(1, $pqt_sku);
                $pps->execute();
                return $pps->fetch();
            }
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarPaquetes($pqt_sku)
    {
        try {
            //code...
            $sql = "UPDATE tbl_paquete_pqt SET pqt_estado_actividad = 0 WHERE pqt_sku = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pqt_sku);
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
