
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
            $sql = "INSERT INTO  tbl_clientes_cts (cts_ruta,cts_nombre,cts_telefono_1,cts_domicilio,cts_colonia,cts_calles,cts_fachada_color,cts_puerta_color,cts_trabajo,cts_puesto,cts_direccion_trabajo,cts_colonia_trabajo,cts_telefono_trabajo,cts_antiguedad_trabajo,cts_ingreso_mensual_trabajo,cts_credencial_elector,cts_tipo_casa,cts_tiempo_casa,cts_nombre_casa,cts_reg_propiedad,cts_fecha_registro,cts_usuario_registro) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts['cts_ruta']);

            $pps->bindValue(2, $cts['cts_nombre']);
            $pps->bindValue(3, $cts['cts_telefono_1']);
            $pps->bindValue(4, $cts['cts_domicilio']);
            $pps->bindValue(5, $cts['cts_colonia']);
            $pps->bindValue(6, $cts['cts_calles']);
            $pps->bindValue(7, $cts['cts_fachada_color']);
            $pps->bindValue(8, $cts['cts_puerta_color']);
            $pps->bindValue(9, $cts['cts_trabajo']);
            $pps->bindValue(10, $cts['cts_puesto']);
            $pps->bindValue(11, $cts['cts_direccion_trabajo']);
            $pps->bindValue(12, $cts['cts_colonia_trabajo']);
            $pps->bindValue(13, $cts['cts_telefono_trabajo']);

            $pps->bindValue(14, $cts['cts_antiguedad_trabajo']);
            $pps->bindValue(15, $cts['cts_ingreso_mensual_trabajo']);
            $pps->bindValue(16, $cts['cts_credencial_elector']);
            $pps->bindValue(17, $cts['cts_tipo_casa']);
            $pps->bindValue(18, $cts['cts_tiempo_casa']);
            $pps->bindValue(19, $cts['cts_nombre_casa']);
            $pps->bindValue(20, $cts['cts_reg_propiedad']);
            $pps->bindValue(21, $cts['cts_fecha_registro']);
            $pps->bindValue(22, $cts['cts_usuario_registro']);

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
