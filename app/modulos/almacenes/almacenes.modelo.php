
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/02/2021 12:50
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class AlmacenesModelo
{
    public static function mdlAgregarAlmacenes($ams)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_almacenes_ams (ams_nombre,ams_id_sucursal,ams_fecha_registro,ams_usuario_registro) VALUES(?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams['ams_nombre']);
            $pps->bindValue(2, $ams['ams_id_sucursal']);
            $pps->bindValue(3, $ams['ams_fecha_registro']);
            $pps->bindValue(4, $ams['ams_usuario_registro']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarAlmacenes()
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
    public static function mdlMostrarAlmacenes($scl_id = "")
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_id_sucursal = ? AND ams_estado = 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $scl_id);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarAlmacenesByNombre($ams_nombre)
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_nombre = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_nombre);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarAlmacenes($ams_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_almacenes_ams SET ams_estado = 0 WHERE ams_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarAlamcenesTraspaso($tps_tipo, $scl_id = "")
    {


        try {
            //code...
            if ($tps_tipo == 'I') {
                $sql = "SELECT ams.*,scl.* FROM tbl_almacenes_ams ams JOIN tbl_sucursal_scl scl ON ams.ams_id_sucursal = scl.scl_id  WHERE ams.ams_id_sucursal = ?";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $scl_id);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($tps_tipo == 'E') {
                $sql = "SELECT ams.*,scl.* FROM tbl_almacenes_ams ams JOIN tbl_sucursal_scl scl ON ams.ams_id_sucursal = scl.scl_id";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarMerncanciaDevuelta($tps_num_traspaso)
    {

        try {
            //code...
            $sql = "SELECT tps.*,ams_o.ams_nombre,ams_d.ams_nombre,usr.usr_nombre FROM tbl_traspasos_tps tps JOIN tbl_almacenes_ams ams_o ON tps.tps_ams_id_origen = ams_o.ams_id JOIN tbl_almacenes_ams ams_d ON tps.tps_ams_id_destino = ams_d.ams_id JOIN tbl_usuarios_usr usr ON tps.tps_user_id_receptor = usr.usr_id WHERE tps.tps_num_traspaso = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $tps_num_traspaso);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlSumarCantidadesSku($pds_sku,$pds_stok)
    {
        try {
            //code...
            $sql = "UPDATE tbl_productos_pds SET pds_stok= pds_stok + ? WHERE pds_sku =?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pds_stok);
            $pps->bindValue(2, $pds_sku);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlRestarCantidadesSku($pds_sku)
    {
        try {
            //code...
            $sql = "UPDATE tbl_productos_pds SET pds_stok = 0 WHERE pds_sku =?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pds_sku);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlAgregarDetallePreRegistro($dprm)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_detalle_preregistro_mercancia_dprm (dprm_mpds_id,dprm_descripcion,dprm_cantidad,dprm_id_prm) VALUES(?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dprm['dprm_mpds_id']);
            $pps->bindValue(2, $dprm['dprm_descripcion']);
            $pps->bindValue(3, $dprm['dprm_cantidad']);
            $pps->bindValue(4, $dprm['dprm_id_prm']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarDetallePreRegistro($dprm_id_prm)
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_detalle_preregistro_mercancia_dprm WHERE dprm_id_prm = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dprm_id_prm);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlEliminarPreRegistro($dprm_id)
    {
        try {
            //code...
            $sql = "DELETE FROM tbl_detalle_preregistro_mercancia_dprm WHERE dprm_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dprm_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarCantidadPreRegistro($dprm)
    {
        try {
            //code...
            $sql = "UPDATE tbl_detalle_preregistro_mercancia_dprm SET dprm_cantidad = ? WHERE dprm_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dprm['dprm_cantidad']);
            $pps->bindValue(2, $dprm['dprm_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGuardarPreRegistro($prm)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_preregistro_mercancia_prm (prm_folio,prm_id_proveedor,prm_fecha_registro,prm_codigo,prm_usuario_registro,prm_id_detalle) VALUES(?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $prm['prm_folio']);
            $pps->bindValue(2, $prm['prm_id_proveedor']);
            $pps->bindValue(3, $prm['prm_fecha_registro']);
            $pps->bindValue(4, $prm['prm_codigo']);
            $pps->bindValue(5, $prm['prm_usuario_registro']);
            $pps->bindValue(6, $prm['prm_id_detalle']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarPreRegistros()
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_preregistro_mercancia_prm WHERE prm_status = 'ESPERA' ORDER BY prm_id DESC";
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
    public static function mdlMostrarPreRegistrosByID($prm_id)
    {
        try {
            //code...
            $sql = " SELECT prm.*, pvs.pvs_nombre FROM tbl_preregistro_mercancia_prm prm JOIN tbl_proveedores_pvs pvs ON prm.prm_id_proveedor = pvs.pvs_id WHERE prm.prm_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $prm_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
