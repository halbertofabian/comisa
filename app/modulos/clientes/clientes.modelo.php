
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 31/01/2021 16:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class ClientesModelo
{
    public static function mdlAgregarClientesByExcel($cts)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_clientes_clts (clts_id,clts_numero,clts_ruta, clts_usuario_registro, clts_fecha_registro, 
            clts_nombre, clts_telefono, clts_domicilio, clts_col, clts_entre_calles, clts_fachada_color, 
            clts_puerta_color, clts_trabajo, clts_puesto, clts_direccion_tbj, clts_col_tbj, 
            clts_tel_tbj, clts_antiguedad_tbj, clts_igs_mensual_tbj,clts_no_cred,clts_tipo_vivienda, clts_antiguedad_viviendo,
            clts_vivienda_anomde, clts_nreg_propiedad, clts_nom_conyuge, clts_tbj_conyuge, clts_tbj_puesto_conyuge,
            clts_tbj_dir_conyuge, clts_tbj_col_conyuge, clts_tbj_tel_conyuge, clts_tbj_ant_conyuge, clts_nom_fiador, 
            clts_parentesco_fiador, clts_tel_fiador, clts_dir_fiador, clts_col_fiador, clts_tbj_fiador, clts_tbj_dir_fiador, 
            clts_tbj_tel_fiador, clts_tbj_col_fiador, clts_fc_elector_fiador, clts_tbj_ant_fiador, clts_nom_ref1, 
            clts_parentesco_ref1, clts_dir_ref1, clts_col_ref1, clts_tel_ref1, clts_nom_ref2, clts_parentesco_ref2, 
            clts_dir_ref2, clts_col_ref2, clts_tel_ref2,clts_ubicacion,clts_foto_ine,clts_foto_ineReverso,clts_foto_cpdomicilio,clts_tipo_cliente,clts_curp,clts_observaciones,clts_cuentas) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $cts['clts_id']);
            $pps->bindValue(2, $cts['clts_numero']);
            $pps->bindValue(3, $cts['clts_ruta']);
            $pps->bindValue(4, $cts['clts_usuario_registro']);
            $pps->bindValue(5, $cts['clts_fecha_registro']);

            $pps->bindValue(6, $cts['clts_nombre']);
            $pps->bindValue(7, $cts['clts_telefono']);
            $pps->bindValue(8, $cts['clts_domicilio']);
            $pps->bindValue(9, $cts['clts_col']);
            $pps->bindValue(10, $cts['clts_entre_calles']);

            $pps->bindValue(11, $cts['clts_fachada_color']);
            $pps->bindValue(12, $cts['clts_puerta_color']);
            $pps->bindValue(13, $cts['clts_trabajo']);
            $pps->bindValue(14, $cts['clts_puesto']);
            $pps->bindValue(15, $cts['clts_direccion_tbj']);

            $pps->bindValue(16, $cts['clts_col_tbj']);
            $pps->bindValue(17, $cts['clts_tel_tbj']);
            $pps->bindValue(18, $cts['clts_antiguedad_tbj']);
            $pps->bindValue(19, $cts['clts_igs_mensual_tbj']);
            $pps->bindValue(20, $cts['clts_no_cred']);

            $pps->bindValue(21, $cts['clts_tipo_vivienda']);
            $pps->bindValue(22, $cts['clts_antiguedad_viviendo']);
            $pps->bindValue(23, $cts['clts_vivienda_anomde']);
            $pps->bindValue(24, $cts['clts_nreg_propiedad']);
            $pps->bindValue(25, $cts['clts_nom_conyuge']);

            $pps->bindValue(26, $cts['clts_tbj_conyuge']);
            $pps->bindValue(27, $cts['clts_tbj_puesto_conyuge']);
            $pps->bindValue(28, $cts['clts_tbj_dir_conyuge']);
            $pps->bindValue(29, $cts['clts_tbj_col_conyuge']);
            $pps->bindValue(30, $cts['clts_tbj_tel_conyuge']);

            $pps->bindValue(31, $cts['clts_tbj_ant_conyuge']);
            $pps->bindValue(32, $cts['clts_nom_fiador']);
            $pps->bindValue(33, $cts['clts_parentesco_fiador']);
            $pps->bindValue(34, $cts['clts_tel_fiador']);
            $pps->bindValue(35, $cts['clts_dir_fiador']);

            $pps->bindValue(36, $cts['clts_col_fiador']);
            $pps->bindValue(37, $cts['clts_tbj_fiador']);
            $pps->bindValue(38, $cts['clts_tbj_dir_fiador']);
            $pps->bindValue(39, $cts['clts_tbj_tel_fiador']);
            $pps->bindValue(40, $cts['clts_tbj_col_fiador']);

            $pps->bindValue(41, $cts['clts_fc_elector_fiador']);
            $pps->bindValue(42, $cts['clts_tbj_ant_fiador']);
            $pps->bindValue(43, $cts['clts_nom_ref1']);
            $pps->bindValue(44, $cts['clts_parentesco_ref1']);
            $pps->bindValue(45, $cts['clts_dir_ref1']);

            $pps->bindValue(46, $cts['clts_col_ref1']);
            $pps->bindValue(47, $cts['clts_tel_ref1']);
            $pps->bindValue(48, $cts['clts_nom_ref2']);
            $pps->bindValue(49, $cts['clts_parentesco_ref2']);
            $pps->bindValue(50, $cts['clts_dir_ref2']);

            $pps->bindValue(51, $cts['clts_col_ref2']);
            $pps->bindValue(52, $cts['clts_tel_ref2']);
            $pps->bindValue(53, $cts['clts_ubicacion']);
            $pps->bindValue(54, $cts['clts_foto_ine']);
            $pps->bindValue(55, $cts['clts_foto_ineReverso']);

            $pps->bindValue(56, $cts['clts_foto_cpdomicilio']);
            $pps->bindValue(57, $cts['clts_tipo_cliente']);
            $pps->bindValue(58, $cts['clts_curp']);
            $pps->bindValue(59, $cts['clts_observaciones']);
            $pps->bindValue(60, $cts['clts_cuentas']);


            $pps->execute();


            return $pps->errorInfo();
        } catch (PDOException $th) {
            throw $th->getMessage();
            return  $th->getMessage();
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlAgregarClientesMorososByExcel($cts)
    {

        try {
            //code...
            $sql = "INSERT INTO tbl_clientes_problemas_clts (clts_id,clts_ruta,clts_nombre,clts_telefono,clts_domicilio,clts_col,clts_ubicacion,clts_tipo_cliente,clts_curp,clts_observaciones,clts_cuenta,clts_articulo,clts_fecha_venta) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?) ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $cts["clts_id"]);
            $pps->bindValue(2, $cts["clts_ruta"]);
            $pps->bindValue(3, $cts["clts_nombre"]);
            $pps->bindValue(4, $cts["clts_telefono"]);
            $pps->bindValue(5, $cts["clts_domicilio"]);
            $pps->bindValue(6, $cts["clts_col"]);
            $pps->bindValue(7, $cts["clts_ubicacion"]);
            $pps->bindValue(8, $cts["clts_tipo_cliente"]);
            $pps->bindValue(9, $cts["clts_curp"]);
            $pps->bindValue(10, $cts["clts_observaciones"]);
            $pps->bindValue(11, $cts["clts_cuenta"]);
            $pps->bindValue(12, $cts["clts_articulo"]);
            $pps->bindValue(13, $cts["clts_fecha_venta"]);

            $pps->execute();


            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            throw $th->getMessage();
            return  $th->getMessage();
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlAgregarClientesMorosos($cts)
    {

        try {
            //code...
            $sql = "INSERT INTO tbl_clientes_problemas_clts (clts_ruta,clts_nombre,clts_telefono,clts_domicilio,clts_col,clts_ubicacion,clts_tipo_cliente,clts_curp,clts_observaciones,clts_cuenta,clts_articulo,clts_fecha_venta) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts["clts_ruta"]);
            $pps->bindValue(2, $cts["clts_nombre"]);
            $pps->bindValue(3, $cts["clts_telefono"]);
            $pps->bindValue(4, $cts["clts_domicilio"]);
            $pps->bindValue(5, $cts["clts_col"]);
            $pps->bindValue(6, $cts["clts_ubicacion"]);
            $pps->bindValue(7, $cts["clts_tipo_cliente"]);
            $pps->bindValue(8, $cts["clts_curp"]);
            $pps->bindValue(9, $cts["clts_observaciones"]);
            $pps->bindValue(10, $cts["clts_cuenta"]);
            $pps->bindValue(11, $cts["clts_articulo"]);
            $pps->bindValue(12, $cts["clts_fecha_venta"]);
            $pps->execute();
            return $pps->rowCount() > 0;
            // return $pps->errorInfo();
        } catch (PDOException $th) {
            throw $th->getMessage();
            return  $th->getMessage();
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarClientes($cts)
    {
        try {
            //code...
            $sql = "UPDATE tbl_clientes_problemas_clts SET clts_ruta = ?,clts_nombre = ?,clts_telefono = ?,clts_domicilio = ?,clts_col = ?,clts_ubicacion = ?,clts_tipo_cliente = ?,clts_curp = ?,clts_observaciones = ?,clts_cuenta = ?,clts_articulo = ?,clts_fecha_venta = ?
            WHERE clts_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts["clts_ruta"]);
            $pps->bindValue(2, $cts["clts_nombre"]);
            $pps->bindValue(3, $cts["clts_telefono"]);
            $pps->bindValue(4, $cts["clts_domicilio"]);
            $pps->bindValue(5, $cts["clts_col"]);
            $pps->bindValue(6, $cts["clts_ubicacion"]);
            $pps->bindValue(7, $cts["clts_tipo_cliente"]);
            $pps->bindValue(8, $cts["clts_curp"]);
            $pps->bindValue(9, $cts["clts_observaciones"]);
            $pps->bindValue(10, $cts["clts_cuenta"]);
            $pps->bindValue(11, $cts["clts_articulo"]);
            $pps->bindValue(12, $cts["clts_fecha_venta"]);
            $pps->bindValue(13, $cts["clts_id"]);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function actualizarInfIdClient($cts)
    {
        try {
            //code...
            $sql = "UPDATE tbl_clientes_clts SET clts_nombre=?,clts_telefono=?,clts_domicilio=?,clts_col=?,clts_entre_calles=?,
            clts_fachada_color=?,clts_puerta_color=?,clts_cred_elector_n=?,clts_trabajo=?,clts_puesto=?,clts_direccion_tbj=?,clts_col_tbj=?,clts_tel_tbj=?,
            clts_antiguedad_tbj=?,clts_igs_mensual_tbj=?,clts_tipo_vivienda=?,clts_antiguedad_viviendo=?,clts_vivienda_anomde=?,
            clts_nreg_propiedad=?,clts_nom_conyuge=?,clts_tbj_conyuge=?,clts_tbj_puesto_conyuge=?,clts_tbj_dir_conyuge=?,
            clts_tbj_col_conyuge=?,clts_tbj_tel_conyuge=?,clts_tbj_ant_conyuge=?,clts_nom_fiador=?,clts_parentesco_fiador=?,
            clts_tel_fiador=?,clts_dir_fiador=?,clts_col_fiador=?,clts_tbj_fiador=?,clts_tbj_dir_fiador=?,clts_tbj_tel_fiador=?,
            clts_tbj_col_fiador=?,clts_fc_elector_fiador=?,clts_tbj_ant_fiador=?,clts_nom_ref1=?,clts_parentesco_ref1=?,clts_dir_ref1=?,
            clts_col_ref1=?,clts_tel_ref1=?,clts_nom_ref2=?,clts_parentesco_ref2=?,clts_dir_ref2=?,clts_col_ref2=?,clts_tel_ref2=? 
            WHERE clts_id=?";
            //Son 48 parametros
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $cts['clts_nombre']);
            $pps->bindValue(2, $cts['clts_telefono']);
            $pps->bindValue(3, $cts['clts_domicilio']);
            $pps->bindValue(4, $cts['clts_col']);
            $pps->bindValue(5, $cts['clts_entre_calles']);
            $pps->bindValue(6, $cts['clts_fachada_color']);

            $pps->bindValue(7, $cts['clts_puerta_color']);
            $pps->bindValue(8, $cts['clts_cred_elector_n']);
            $pps->bindValue(9, $cts['clts_trabajo']);
            $pps->bindValue(10, $cts['clts_puesto']);
            $pps->bindValue(11, $cts['clts_direccion_tbj']);
            $pps->bindValue(12, $cts['clts_col_tbj']);

            $pps->bindValue(13, $cts['clts_tel_tbj']);
            $pps->bindValue(14, $cts['clts_antiguedad_tbj']);
            $pps->bindValue(15, $cts['clts_igs_mensual_tbj']);
            $pps->bindValue(16, $cts['clts_tipo_vivienda']);
            $pps->bindValue(17, $cts['clts_antiguedad_viviendo']);
            $pps->bindValue(18, $cts['clts_vivienda_anomde']);
            $pps->bindValue(19, $cts['clts_nreg_propiedad']);
            $pps->bindValue(20, $cts['clts_nom_conyuge']);
            $pps->bindValue(21, $cts['clts_tbj_conyuge']);
            $pps->bindValue(22, $cts['clts_tbj_puesto_conyuge']);
            $pps->bindValue(23, $cts['clts_tbj_dir_conyuge']);
            $pps->bindValue(24, $cts['clts_tbj_col_conyuge']);
            $pps->bindValue(25, $cts['clts_tbj_tel_conyuge']);
            $pps->bindValue(26, $cts['clts_tbj_ant_conyuge']);
            $pps->bindValue(27, $cts['clts_nom_fiador']);
            $pps->bindValue(28, $cts['clts_parentesco_fiador']);
            $pps->bindValue(29, $cts['clts_tel_fiador']);
            $pps->bindValue(30, $cts['clts_dir_fiador']);
            $pps->bindValue(31, $cts['clts_col_fiador']);
            $pps->bindValue(32, $cts['clts_tbj_fiador']);
            $pps->bindValue(33, $cts['clts_tbj_dir_fiador']);
            $pps->bindValue(34, $cts['clts_tbj_tel_fiador']);
            $pps->bindValue(35, $cts['clts_tbj_col_fiador']);
            $pps->bindValue(36, $cts['clts_fc_elector_fiador']);
            $pps->bindValue(37, $cts['clts_tbj_ant_fiador']);
            $pps->bindValue(38, $cts['clts_nom_ref1']);
            $pps->bindValue(39, $cts['clts_parentesco_ref1']);
            $pps->bindValue(40, $cts['clts_dir_ref1']);
            $pps->bindValue(41, $cts['clts_col_ref1']);
            $pps->bindValue(42, $cts['clts_tel_ref1']);
            $pps->bindValue(43, $cts['clts_nom_ref2']);
            $pps->bindValue(44, $cts['clts_parentesco_ref2']);
            $pps->bindValue(45, $cts['clts_dir_ref2']);
            $pps->bindValue(46, $cts['clts_col_ref2']);
            $pps->bindValue(47, $cts['clts_tel_ref2']);
            $pps->bindValue(48, $cts['clts_id']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function actualizar2InfIdClient($cts)
    {
        try {
            //code...
            $sql = "UPDATE tbl_clientes_clts SET clts_nombre=?,clts_telefono=?,clts_domicilio=?,clts_col=?,clts_entre_calles=?,
            clts_fachada_color=?,clts_puerta_color=?,clts_cred_elector_n=?,clts_trabajo=?,clts_puesto=?,clts_direccion_tbj=?,clts_col_tbj=?,clts_tel_tbj=?,
            clts_antiguedad_tbj=?,clts_igs_mensual_tbj=?,clts_tipo_vivienda=?,clts_antiguedad_viviendo=?,clts_vivienda_anomde=?,
            clts_nreg_propiedad=?,clts_nom_conyuge=?,clts_tbj_conyuge=?,clts_tbj_puesto_conyuge=?,clts_tbj_dir_conyuge=?,
            clts_tbj_col_conyuge=?,clts_tbj_tel_conyuge=?,clts_tbj_ant_conyuge=?,clts_nom_fiador=?,clts_parentesco_fiador=?,
            clts_tel_fiador=?,clts_dir_fiador=?,clts_col_fiador=?,clts_tbj_fiador=?,clts_tbj_dir_fiador=?,clts_tbj_tel_fiador=?,
            clts_tbj_col_fiador=?,clts_fc_elector_fiador=?,clts_tbj_ant_fiador=?,clts_nom_ref1=?,clts_parentesco_ref1=?,clts_dir_ref1=?,
            clts_col_ref1=?,clts_tel_ref1=?,clts_nom_ref2=?,clts_parentesco_ref2=?,clts_dir_ref2=?,clts_col_ref2=?,clts_tel_ref2=?,
            clts_ubicacion=?,clts_foto_ine=?,clts_foto_ineReverso=?,clts_foto_cpdomicilio=?
            WHERE clts_id=?";
            //Son 48 parametros
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $cts['clts_nombre']);
            $pps->bindValue(2, $cts['clts_telefono']);
            $pps->bindValue(3, $cts['clts_domicilio']);
            $pps->bindValue(4, $cts['clts_col']);
            $pps->bindValue(5, $cts['clts_entre_calles']);
            $pps->bindValue(6, $cts['clts_fachada_color']);

            $pps->bindValue(7, $cts['clts_puerta_color']);
            $pps->bindValue(8, $cts['clts_cred_elector_n']);
            $pps->bindValue(9, $cts['clts_trabajo']);
            $pps->bindValue(10, $cts['clts_puesto']);
            $pps->bindValue(11, $cts['clts_direccion_tbj']);
            $pps->bindValue(12, $cts['clts_col_tbj']);

            $pps->bindValue(13, $cts['clts_tel_tbj']);
            $pps->bindValue(14, $cts['clts_antiguedad_tbj']);
            $pps->bindValue(15, $cts['clts_igs_mensual_tbj']);
            $pps->bindValue(16, $cts['clts_tipo_vivienda']);
            $pps->bindValue(17, $cts['clts_antiguedad_viviendo']);
            $pps->bindValue(18, $cts['clts_vivienda_anomde']);
            $pps->bindValue(19, $cts['clts_nreg_propiedad']);
            $pps->bindValue(20, $cts['clts_nom_conyuge']);
            $pps->bindValue(21, $cts['clts_tbj_conyuge']);
            $pps->bindValue(22, $cts['clts_tbj_puesto_conyuge']);
            $pps->bindValue(23, $cts['clts_tbj_dir_conyuge']);
            $pps->bindValue(24, $cts['clts_tbj_col_conyuge']);
            $pps->bindValue(25, $cts['clts_tbj_tel_conyuge']);
            $pps->bindValue(26, $cts['clts_tbj_ant_conyuge']);
            $pps->bindValue(27, $cts['clts_nom_fiador']);
            $pps->bindValue(28, $cts['clts_parentesco_fiador']);
            $pps->bindValue(29, $cts['clts_tel_fiador']);
            $pps->bindValue(30, $cts['clts_dir_fiador']);
            $pps->bindValue(31, $cts['clts_col_fiador']);
            $pps->bindValue(32, $cts['clts_tbj_fiador']);
            $pps->bindValue(33, $cts['clts_tbj_dir_fiador']);
            $pps->bindValue(34, $cts['clts_tbj_tel_fiador']);
            $pps->bindValue(35, $cts['clts_tbj_col_fiador']);
            $pps->bindValue(36, $cts['clts_fc_elector_fiador']);
            $pps->bindValue(37, $cts['clts_tbj_ant_fiador']);
            $pps->bindValue(38, $cts['clts_nom_ref1']);
            $pps->bindValue(39, $cts['clts_parentesco_ref1']);
            $pps->bindValue(40, $cts['clts_dir_ref1']);
            $pps->bindValue(41, $cts['clts_col_ref1']);
            $pps->bindValue(42, $cts['clts_tel_ref1']);
            $pps->bindValue(43, $cts['clts_nom_ref2']);
            $pps->bindValue(44, $cts['clts_parentesco_ref2']);
            $pps->bindValue(45, $cts['clts_dir_ref2']);
            $pps->bindValue(46, $cts['clts_col_ref2']);
            $pps->bindValue(47, $cts['clts_tel_ref2']);
            $pps->bindValue(48, $cts['clts_ubicacion']);
            $pps->bindValue(49, $cts['clts_foto_ine']);
            $pps->bindValue(50, $cts['clts_foto_ineReverso']);
            $pps->bindValue(51, $cts['clts_foto_cpdomicilio']);
            $pps->bindValue(52, $cts['clts_id']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarClientes($cts_id = "")
    {
        try {
            //code...
            if ($cts_id == "") {
                $sql = "SELECT * FROM tbl_clientes_clts";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);

                $pps->execute();
                return $pps->fetchAll();
            } elseif ($cts_id != "") {
                $sql = "SELECT * FROM tbl_clientes_clts WHERE clts_id = ?";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $cts_id);
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
    public static function mdlMostrarClientesByNomb($cts_nom)
    {
        try {
            //code...
            if ($cts_nom != "") {
                $sql = "SELECT * FROM tbl_clientes_clts WHERE clts_nombre LIKE '%" . $cts_nom . "%'";
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
    public static function mdlEliminarClientes()
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

    public static function mdlMostrarClientesMaloPorID($clts_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_clientes_problemas_clts WHERE clts_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $clts_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarClientesMalHistorial()
    {
        try {
            //code...
            $sql = "SELECT clts_id,clts_ruta,clts_nombre,clts_telefono,clts_domicilio,clts_col,clts_ubicacion,clts_tipo_cliente,clts_curp,clts_observaciones,clts_cuenta,clts_articulo,clts_fecha_venta FROM tbl_clientes_problemas_clts ORDER BY clts_id DESC";
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
    public static function mdlMostrarClientesListaBlanca()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_contrato_crt_1 ctr WHERE ctr_status_cuenta IN(SELECT gst_status FROM tbl_gestion_status_gst WHERE gst_lista = 'B') ORDER BY ctr_id DESC";
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
    public static function mdlMostrarClientesListaNegra()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_contrato_crt_1 ctr WHERE ctr_status_cuenta IN(SELECT gst_status FROM tbl_gestion_status_gst WHERE gst_lista = 'N') ORDER BY ctr_id DESC";
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
}
