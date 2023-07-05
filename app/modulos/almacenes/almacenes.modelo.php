
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
            $sql = "INSERT INTO tbl_almacenes_ams (ams_nombre,ams_id_sucursal,ams_fecha_registro,ams_usuario_registro,ams_vendedor) VALUES(?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams['ams_nombre']);
            $pps->bindValue(2, $ams['ams_id_sucursal']);
            $pps->bindValue(3, $ams['ams_fecha_registro']);
            $pps->bindValue(4, $ams['ams_usuario_registro']);
            $pps->bindValue(5, $ams['ams_vendedor']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarAlmacenes($ams)
    {
        try {
            //code...
            $sql = "UPDATE tbl_almacenes_ams SET ams_nombre = ?, ams_vendedor = ? WHERE ams_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams['ams_nombre']);
            $pps->bindValue(2, $ams['ams_vendedor']);
            $pps->bindValue(3, $ams['ams_id']);
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
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_tipo = 'V' AND ams_id_sucursal = ? AND ams_estado = 1";
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
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_nombre = ? AND ams_estado = 1";
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

    public static function mdlSumarCantidadesSku($pds_sku, $pds_stok)
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
            $sql = "INSERT INTO tbl_preregistro_mercancia_prm (prm_folio,prm_id_proveedor,prm_fecha_registro,prm_codigo,prm_usuario_registro,prm_id_detalle,prm_tipo) VALUES(?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $prm['prm_folio']);
            $pps->bindValue(2, $prm['prm_id_proveedor']);
            $pps->bindValue(3, $prm['prm_fecha_registro']);
            $pps->bindValue(4, $prm['prm_codigo']);
            $pps->bindValue(5, $prm['prm_usuario_registro']);
            $pps->bindValue(6, $prm['prm_id_detalle']);
            $pps->bindValue(7, $prm['prm_tipo']);
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
            $sql = " SELECT * FROM tbl_preregistro_mercancia_prm ORDER BY prm_id DESC";
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
    public static function mdlMostrarPreRegistrosByCodigos()
    {
        try {
            //code...
            $sql = " SELECT prm.*, pvs.pvs_nombre FROM tbl_preregistro_mercancia_prm prm JOIN tbl_proveedores_pvs pvs ON prm.prm_id_proveedor = pvs.pvs_id WHERE prm.prm_codigo != '' ORDER BY prm.prm_id DESC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
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

    public static function mdlActualizarStatusPreRegistro($prm_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_preregistro_mercancia_prm SET prm_status = 'APROBADO' WHERE prm_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $prm_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarCodigoPreRegistro($prm_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_preregistro_mercancia_prm SET prm_codigo = '' WHERE prm_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $prm_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarSerieByModelo($spds_modelo)
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_series_producto_spds WHERE spds_modelo = ? ORDER BY spds_id DESC LIMIT 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_modelo);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarSeries()
    {
        try {
            //code...
            $sql = "SELECT spds.spds_id, spds.spds_modelo, spds.spds_serie,spds.spds_situacion, spds.spds_ultima_mod, spds.spds_serie_completa, mpds.mpds_suc, mpds.mpds_modelo, mpds.mpds_descripcion, ams.ams_nombre FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id JOIN tbl_almacenes_ams ams ON spds.spds_almacen = ams.ams_id WHERE ams.ams_tipo IN('M','V') ORDER BY mpds.mpds_modelo ASC";
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
    public static function mdlMostrarSeries2()
    {
        try {
            //code...
            $sql = "SELECT spds.spds_id, spds.spds_modelo, spds.spds_serie,spds.spds_situacion, spds.spds_ultima_mod, spds.spds_serie_completa, mpds.mpds_suc, mpds.mpds_modelo, COUNT(mpds.mpds_modelo) AS total_m, mpds.mpds_descripcion, ams.ams_nombre FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id JOIN tbl_almacenes_ams ams ON spds.spds_almacen = ams.ams_id WHERE ams.ams_tipo IN('M','V') GROUP BY mpds.mpds_modelo";
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
    public static function mdlMostrarSeriesById($spds_id)
    {
        try {
            //code...
            $sql = "SELECT spds.spds_id, spds.spds_modelo, spds.spds_serie,spds.spds_situacion, spds.spds_ultima_mod, spds.spds_serie_completa, mpds.mpds_suc, mpds.mpds_modelo, mpds.mpds_descripcion, ams.ams_nombre FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id JOIN tbl_almacenes_ams ams ON spds.spds_almacen = ams.ams_id WHERE spds.spds_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_id);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarSeriesById2($spds_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_series_producto_spds WHERE spds_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_id);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarSeriesByPrmId($spds_prm_id)
    {
        try {
            //code...
            $sql = "SELECT spds.spds_id, spds.spds_serie,spds.spds_situacion, spds.spds_ultima_mod, spds.spds_serie_completa, mpds.mpds_suc, mpds.mpds_modelo, mpds.mpds_descripcion, ams.ams_nombre FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id JOIN tbl_almacenes_ams ams ON spds.spds_almacen = ams.ams_id WHERE spds.spds_prm_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_prm_id);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlAgregarSeries($spds)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_series_producto_spds (spds_modelo,spds_serie,spds_almacen,spds_situacion,spds_ultima_mod,spds_prm_id,spds_serie_completa) VALUES(?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds['spds_modelo']);
            $pps->bindValue(2, $spds['spds_serie']);
            $pps->bindValue(3, $spds['spds_almacen']);
            $pps->bindValue(4, $spds['spds_situacion']);
            $pps->bindValue(5, $spds['spds_ultima_mod']);
            $pps->bindValue(6, $spds['spds_prm_id']);
            $pps->bindValue(7, $spds['spds_serie_completa']);
            $pps->execute();
            return $con->lastInsertId();
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarAlmacenesByTipo()
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_tipo = 'M' AND ams_estado = 1";
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
    public static function mdlMostrarAlmacenesByTipoVendedor()
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_tipo = 'V' AND ams_estado = 1";
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
    public static function mdlMostrarAlmacenesByTipoContrato()
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_tipo = 'C' AND ams_estado = 1";
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
    public static function mdlMostrarAlmacenesByTipoTrasladoExterno()
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_tipo = 'T' AND ams_estado = 1";
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
    public static function mdlMostrarAlmacenesByTipoDestino()
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_almacenes_ams WHERE ams_tipo = 'X' AND ams_estado = 1";
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

    public static function mdlMostrarSeriesBySerie($spds_serie_completa)
    {
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
        try {
            //code...
            $sql = "SELECT spds.*, mpds.mpds_suc, mpds.mpds_modelo, mpds.mpds_descripcion, ams.ams_nombre, CONCAT(mpds.mpds_descripcion,' - ',mpds.mpds_modelo, ' - ', spds.spds_serie_completa) AS label FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id JOIN tbl_almacenes_ams ams ON spds.spds_almacen = ams.ams_id  WHERE (spds.spds_serie_completa LIKE '%$spds_serie_completa%' OR mpds.mpds_descripcion LIKE '%$spds_serie_completa%') AND spds.spds_almacen = ? AND spds.spds_situacion != 'TRASPASO'";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams['ams_id']);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarSeriesByAutocomplete($spds)
    {
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipoContrato();
        try {
            //code...
            $sql = "SELECT spds.*, mpds.mpds_suc, mpds.mpds_modelo, mpds.mpds_descripcion, ams.ams_nombre, CONCAT(mpds.mpds_descripcion,' - ',mpds.mpds_modelo, ' - ', spds.spds_serie_completa) AS label FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id JOIN tbl_almacenes_ams ams ON spds.spds_almacen = ams.ams_id  WHERE (spds.spds_serie_completa LIKE '%$spds%' OR mpds.mpds_descripcion LIKE '%$spds%') AND spds.spds_almacen != ? AND spds.spds_situacion != 'TRASPASO'";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams['ams_id']);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlAsignarAlmacen($spds)
    {
        try {
            //code...
            $sql = "UPDATE tbl_series_producto_spds SET spds_almacen = ?, spds_situacion = ?, spds_ultima_mod = ? WHERE spds_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds['spds_almacen']);
            $pps->bindValue(2, $spds['spds_situacion']);
            $pps->bindValue(3, $spds['spds_ultima_mod']);
            $pps->bindValue(4, $spds['spds_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlAsignarVendedor($ams)
    {
        try {
            //code...
            $sql = "UPDATE tbl_almacenes_ams SET ams_vendedor = ? WHERE ams_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams['ams_vendedor']);
            $pps->bindValue(2, $ams['ams_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarProductosByAlmacenID($ams_id)
    {
        try {
            //code...
            $sql = "SELECT spds.spds_id, spds.spds_serie,spds.spds_situacion, spds.spds_ultima_mod, spds.spds_serie_completa, mpds.*, ams.ams_nombre, ams.ams_vendedor FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id JOIN tbl_almacenes_ams ams ON spds.spds_almacen = ams.ams_id  WHERE ams.ams_id = ? ORDER BY spds_ultima_mod DESC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_id);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarProductosByAlmacenNombre($ams_nombre)
    {
        try {
            //code...
            $sql = "SELECT spds.spds_id, spds.spds_serie,spds.spds_situacion, spds.spds_ultima_mod, spds.spds_serie_completa, mpds.*, ams.ams_nombre, ams.ams_vendedor FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id JOIN tbl_almacenes_ams ams ON spds.spds_almacen = ams.ams_id  WHERE ams.ams_nombre = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_nombre);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarAlmacenesByID($ams_id)
    {
        try {
            //code...
            $sql = "SELECT ams.*, usr.* FROM tbl_almacenes_ams ams JOIN tbl_usuarios_usr usr ON ams.ams_vendedor = usr.usr_id WHERE ams.ams_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarAlmacenByID($ams_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_almacenes_ams ams WHERE ams_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_id);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlQuitarTraspasoMercancia($spds_serie_completa)
    {
        try {
            //code...
            $sql = "DELETE FROM tbl_series_producto_spds WHERE spds_serie_completa = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_serie_completa);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarAlmacenesByVendedor($ams_vendedor)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_almacenes_ams ams WHERE ams_vendedor = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_vendedor);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarSeriesBySerieCompleta($spds_serie_completa)
    {
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
        try {
            //code...
            $sql = "SELECT * FROM tbl_series_producto_spds WHERE spds_serie_completa = ? AND spds_almacen = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_serie_completa);
            $pps->bindValue(2, $ams['ams_id']);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarSeriesBySerieCompleta2($spds_serie_completa)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_series_producto_spds WHERE spds_serie_completa = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_serie_completa);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarAlmacenByNombre($ams_nombre)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_almacenes_ams WHERE ams_nombre = ? AND ams_estado = 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams_nombre);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlRegistrarBitacora($bcra)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_bitacora_mercancia_bcra (bcra_movimiento,bcra_fecha,bcra_usuario,bcra_nota,bcra_spds_id) VALUES(?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $bcra['bcra_movimiento']);
            $pps->bindValue(2, $bcra['bcra_fecha']);
            $pps->bindValue(3, $bcra['bcra_usuario']);
            $pps->bindValue(4, $bcra['bcra_nota']);
            $pps->bindValue(5, $bcra['bcra_spds_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    //REGISTRAR INVENTARIO
    public static function mdlRegistrarInventario($itr)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_inventario_itr (itr_ii,itr_id_modelo,itr_if,itr_ficha) VALUES(?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr['itr_ii']);
            $pps->bindValue(2, $itr['itr_id_modelo']);
            $pps->bindValue(3, $itr['itr_if']);
            $pps->bindValue(4, $itr['itr_ficha']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarInventarioProveedor($itr)
    {
        try {
            //code...
            $pvs_clave = $itr['pvs_clave'];
            $cantidad = $itr['cantidad'];
            $sql = "UPDATE tbl_inventario_itr SET $pvs_clave = $pvs_clave + $cantidad WHERE itr_id_modelo = ? AND itr_estado = 'PENDIENTE'";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr['itr_id_modelo']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarInventario($campo, $itr_id_modelo)
    {
        try {
            //code...
            $sql = "UPDATE tbl_inventario_itr SET $campo = $campo + 1 WHERE itr_id_modelo = ? AND itr_estado = 'PENDIENTE'";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_id_modelo);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarInventario2($campo, $itr_id_modelo)
    {
        try {
            //code...
            $sql = "UPDATE tbl_inventario_itr SET $campo = $campo - 1 WHERE itr_id_modelo = ? AND itr_estado = 'PENDIENTE'";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_id_modelo);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarInventario3($campo, $cantidad, $itr_id_modelo)
    {
        try {
            //code...
            $sql = "UPDATE tbl_inventario_itr SET $campo = $campo + $cantidad WHERE itr_id_modelo = ? AND itr_estado = 'PENDIENTE'";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_id_modelo);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarInventarioByModelo($itr_id_modelo)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_inventario_itr WHERE itr_id_modelo = ? AND itr_estado = 'PENDIENTE'";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_id_modelo);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarInventarioByProveedor($campo, $itr_id_modelo)
    {
        try {
            //code...
            $sql = "SELECT $campo AS clave FROM tbl_inventario_itr WHERE itr_id_modelo = ? AND itr_estado = 'PENDIENTE'";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_id_modelo);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarInventarioByProveedor2($campo, $itr_id_modelo, $itr_ficha)
    {
        try {
            //code...
            $sql = "SELECT $campo AS clave FROM tbl_inventario_itr WHERE itr_id_modelo = ? AND itr_ficha = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_id_modelo);
            $pps->bindValue(2, $itr_ficha);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarInventarioSumCampo($campo, $itr_ficha)
    {
        try {
            //code...
            $sql = "SELECT SUM($campo) AS total FROM tbl_inventario_itr WHERE itr_ficha = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_ficha);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlActualizarInventarioFinal($itr_if, $itr_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_inventario_itr SET itr_if = ? WHERE itr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_if);
            $pps->bindValue(2, $itr_id);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarInventario()
    {
        try {
            //code...
            $sql = "SELECT itr.*, mpds.* FROM tbl_inventario_itr itr JOIN tbl_modelos_productos_mpds mpds ON itr.itr_id_modelo = mpds.mpds_id WHERE itr.itr_estado = 'PENDIENTE' ORDER BY mpds.mpds_modelo ASC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarInventarioByFicha($itr_ficha)
    {
        try {
            //code...
            $sql = "SELECT itr.*, mpds.* FROM tbl_inventario_itr itr JOIN tbl_modelos_productos_mpds mpds ON itr.itr_id_modelo = mpds.mpds_id WHERE itr.itr_estado != 'PENDIENTE' AND itr.itr_ficha = ? ORDER BY mpds.mpds_modelo ASC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_ficha);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarInventarioByFichaTR($itr_ficha)
    {
        try {
            //code...
            $sql = "SELECT itr.*, mpds.* FROM tbl_inventario_itr itr JOIN tbl_modelos_productos_mpds mpds ON itr.itr_id_modelo = mpds.mpds_id WHERE   itr.itr_ficha = ? ORDER BY mpds.mpds_modelo ASC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_ficha);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlActualizarInventarioFinalUSR($itr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_inventario_itr SET itr_if_usr = ? WHERE itr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr['itr_if_usr']);
            $pps->bindValue(2, $itr['itr_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public  static function mdlFichaActualInventario()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_inventario_itr WHERE itr_estado = 'PENDIENTE' ORDER BY itr_id DESC LIMIT 1;";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlActualizarEstadoInventario($itr_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_inventario_itr SET itr_estado = 'CERRADO' WHERE itr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_id);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlObtenerUltimaSerie($spds_modelo)
    {
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
        try {
            //code...
            $sql = "SELECT * FROM tbl_series_producto_spds WHERE spds_modelo = ? AND spds_almacen = ? AND spds_situacion = '-' ORDER BY spds_id DESC LIMIT 1;";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_modelo);
            $pps->bindValue(2, $ams['ams_id']);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGenerarCodigoSerie($spds_codigo, $spds_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_series_producto_spds SET spds_codigo = ? WHERE spds_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_codigo);
            $pps->bindValue(2, $spds_id);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarSerie($spds_id)
    {
        try {
            //code...
            $sql = "DELETE FROM tbl_series_producto_spds WHERE spds_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_id);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarCodigosSeries()
    {
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
        try {
            //code...
            $sql = "SELECT spds.*, mpds.mpds_modelo, mpds.mpds_descripcion FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id WHERE spds.spds_almacen = ? AND spds.spds_codigo != '' AND spds.spds_situacion = '-' ORDER BY spds.spds_id DESC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ams['ams_id']);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarAlmacenesTipoVM()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_almacenes_ams WHERE ams_tipo IN('M','V') AND ams_estado = 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarSeriesByAutocompleteBitacora($spds)
    {
        try {
            //code...
            $sql = "SELECT spds.*, mpds.mpds_suc, mpds.mpds_modelo, mpds.mpds_descripcion, ams.ams_nombre, CONCAT(mpds.mpds_descripcion,' - ',mpds.mpds_modelo, ' - ', spds.spds_serie_completa) AS label FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id JOIN tbl_almacenes_ams ams ON spds.spds_almacen = ams.ams_id  WHERE (spds.spds_serie_completa LIKE '%$spds%' OR mpds.mpds_descripcion LIKE '%$spds%')";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarBitacora($bcra_spds_id)
    {
        try {
            //code...
            $sql = "SELECT bcra.*, spds.*, mpds.* FROM tbl_bitacora_mercancia_bcra bcra JOIN tbl_series_producto_spds spds ON bcra.bcra_spds_id = spds.spds_id JOIN tbl_modelos_productos_mpds mpds ON spds.spds_modelo = mpds.mpds_id WHERE bcra.bcra_spds_id = ? ORDER BY bcra.bcra_fecha ASC";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $bcra_spds_id);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    // Reparar inventario
    public static function mdlSumarInventarioInsert($column, $datos)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_inventario_itr (itr_id_modelo,{$column},itr_ficha) VALUES(?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $datos['itr_id_modelo']);
            $pps->bindValue(2, $datos['itr_value']);
            $pps->bindValue(3, $datos['itr_ficha']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlSumarInventarioUpdate($column, $itr_id_modelo, $itr_ficha)
    {
        try {
            //code...
            $sql = "UPDATE tbl_inventario_itr SET {$column} = {$column} + 1  WHERE itr_id_modelo = ? AND itr_ficha = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_id_modelo);
            $pps->bindValue(2, $itr_ficha);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            return $th->getMessage();
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarInventarioByModeloFicha($itr_id_modelo, $itr_ficha)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_inventario_itr WHERE itr_id_modelo = ? AND itr_ficha = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_id_modelo);
            $pps->bindValue(2, $itr_ficha);
            $pps->execute();
            return $pps->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarInventarioByModeloFichaAll($itr_ficha)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_inventario_itr WHERE itr_ficha = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_ficha);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return $th->getMessage();
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarSeriesModelos()
    {
        //
        try {
            //code...
            $sql = "SELECT mds.mpds_id,pvs.pvs_clave FROM tbl_series_producto_spds spds JOIN tbl_modelos_productos_mpds  mds ON mds.mpds_id = spds.spds_modelo JOIN tbl_proveedores_pvs pvs  ON pvs.pvs_id = mds.mpds_proveedor ORDER BY mds.mpds_id ASC ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlSumarFinalInventarioUpdate($itr_id_modelo, $itr_ficha, $itr_if)
    {
        try {
            //code...
            $sql = "UPDATE tbl_inventario_itr SET itr_if = ?  WHERE itr_id_modelo = ? AND itr_ficha = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_if);
            $pps->bindValue(2, $itr_id_modelo);
            $pps->bindValue(3, $itr_ficha);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            return $th->getMessage();
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlSumarInicialInventarioUpdate($itr_id_modelo, $itr_ficha, $itr_ii)
    {
        try {
            //code...
            $sql = "UPDATE tbl_inventario_itr SET itr_ii = ?  WHERE itr_id_modelo = ? AND itr_ficha = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $itr_ii);
            $pps->bindValue(2, $itr_id_modelo);
            $pps->bindValue(3, $itr_ficha);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            return $th->getMessage();
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlQuitarPreRegistro($prm_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_preregistro_mercancia_prm SET prm_codigo = '' WHERE prm_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $prm_id);
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
    public static function mdlQuitarCodigosInventario($spds_id)
    {
        try {
            //code...
            $sql = "UPDATE tbl_series_producto_spds SET spds_codigo = '' WHERE spds_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $spds_id);
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
}
