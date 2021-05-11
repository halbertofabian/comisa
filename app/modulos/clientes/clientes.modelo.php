
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
    public static function mdlAgregarClientes($cts)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_clientes_clts(clts_ruta, clts_usuario_registro, clts_fecha_registro, 
            clts_nombre, clts_telefono, clts_domicilio, clts_col, clts_entre_calles, clts_fachada_color, 
            clts_puerta_color, clts_cred_elector_n, clts_trabajo, clts_puesto, clts_direccion_tbj, clts_col_tbj, 
            clts_tel_tbj, clts_antiguedad_tbj, clts_igs_mensual_tbj, clts_tipo_vivienda, clts_antiguedad_viviendo,
            clts_vivienda_anomde, clts_nreg_propiedad, clts_nom_conyuge, clts_tbj_conyuge, clts_tbj_puesto_conyuge,
            clts_tbj_dir_conyuge, clts_tbj_col_conyuge, clts_tbj_tel_conyuge, clts_tbj_ant_conyuge, clts_nom_fiador, 
            clts_parentesco_fiador, clts_tel_fiador, clts_dir_fiador, clts_col_fiador, clts_tbj_fiador, clts_tbj_dir_fiador, 
            clts_tbj_tel_fiador, clts_tbj_col_fiador, clts_fc_elector_fiador, clts_tbj_ant_fiador, clts_nom_ref1, 
            clts_parentesco_ref1, clts_dir_ref1, clts_col_ref1, clts_tel_ref1, clts_nom_ref2, clts_parentesco_ref2, 
            clts_dir_ref2, clts_col_ref2, clts_tel_ref2,clts_ubicacion,clts_foto_ine,clts_foto_cpdomicilio) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts['clts_ruta']);
            $pps->bindValue(2, $cts['clts_usuario_registro']);
            $pps->bindValue(3, $cts['clts_fecha_registro']);

            $pps->bindValue(4, $cts['clts_nombre']);
            $pps->bindValue(5, $cts['clts_telefono']);
            $pps->bindValue(6, $cts['clts_domicilio']);
            $pps->bindValue(7, $cts['clts_col']);
            $pps->bindValue(8, $cts['clts_entre_calles']);
            $pps->bindValue(9, $cts['clts_fachada_color']);

            $pps->bindValue(10, $cts['clts_puerta_color']);
            $pps->bindValue(11, $cts['clts_cred_elector_n']);
            $pps->bindValue(12, $cts['clts_trabajo']);
            $pps->bindValue(13, $cts['clts_puesto']);
            $pps->bindValue(14, $cts['clts_direccion_tbj']);
            $pps->bindValue(15, $cts['clts_col_tbj']);

            $pps->bindValue(16, $cts['clts_tel_tbj']);
            $pps->bindValue(17, $cts['clts_antiguedad_tbj']);
            $pps->bindValue(18, $cts['clts_igs_mensual_tbj']);
            $pps->bindValue(19, $cts['clts_tipo_vivienda']);
            $pps->bindValue(20, $cts['clts_antiguedad_viviendo']);
            $pps->bindValue(21,$cts['clts_vivienda_anomde']); 
            $pps->bindValue(22,$cts['clts_nreg_propiedad']); 
            $pps->bindValue(23,$cts['clts_nom_conyuge']); 
            $pps->bindValue(24,$cts['clts_tbj_conyuge']);
            $pps->bindValue(25,$cts['clts_tbj_puesto_conyuge']);
            $pps->bindValue(26,$cts['clts_tbj_dir_conyuge']);
            $pps->bindValue(27,$cts['clts_tbj_col_conyuge']);
            $pps->bindValue(28,$cts['clts_tbj_tel_conyuge']);
            $pps->bindValue(29,$cts['clts_tbj_ant_conyuge']);
            $pps->bindValue(30,$cts['clts_nom_fiador']);
            $pps->bindValue(31,$cts['clts_parentesco_fiador']);
            $pps->bindValue(32,$cts['clts_tel_fiador']);
            $pps->bindValue(33,$cts['clts_dir_fiador']);
            $pps->bindValue(34,$cts['clts_col_fiador']);
            $pps->bindValue(35,$cts['clts_tbj_fiador']);
            $pps->bindValue(36,$cts['clts_tbj_dir_fiador']); 
            $pps->bindValue(37,$cts['clts_tbj_tel_fiador']); 
            $pps->bindValue(38,$cts['clts_tbj_col_fiador']);
            $pps->bindValue(39,$cts['clts_fc_elector_fiador']);
            $pps->bindValue(40,$cts['clts_tbj_ant_fiador']);
            $pps->bindValue(41,$cts['clts_nom_ref1']);
            $pps->bindValue(42,$cts['clts_parentesco_ref1']);
            $pps->bindValue(43,$cts['clts_dir_ref1']);
            $pps->bindValue(44,$cts['clts_col_ref1']);
            $pps->bindValue(45,$cts['clts_tel_ref1']);
            $pps->bindValue(46,$cts['clts_nom_ref2']);
            $pps->bindValue(47,$cts['clts_parentesco_ref2']); 
            $pps->bindValue(48,$cts['clts_dir_ref2']);
            $pps->bindValue(49,$cts['clts_col_ref2']);
            $pps->bindValue(50,$cts['clts_tel_ref2']);

            $pps->bindValue(51,$cts['clts_ubicacion']);
            $pps->bindValue(52,$cts['clts_foto_ine']);
            $pps->bindValue(53,$cts['clts_foto_cpdomicilio']);

            

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarClientes()
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
    public static function mdlMostrarClientes($cts_id = "")
    {
        try {
            //code...
            if ($cts_id == "") {
                $sql = "SELECT * FROM tbl_clientes_cts";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);

                $pps->execute();
                return $pps->fetchAll();
            } elseif ($cts_id != "") {
                $sql = "SELECT * FROM tbl_clientes_cts WHERE cts_id = ?";
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
}
