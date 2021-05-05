
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 04/05/2021 11:16
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class VentasModelo
{
    public static function mdlAgregarVentas()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarVentas()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarVentas()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps ->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarVentas()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlCrearPlantilla($infplantilla)
    {
        
        try {
            //code...
            $sql = "INSERT INTO tbl_plantilla_ventas_pvts(pvts_usr_registro, pvts_num_semana, pvts_fecha_inicio, pvts_fecha_fin) 
            VALUES (?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $infplantilla['pvts_usr_registro']);
            $pps->bindValue(2, $infplantilla['pvts_num_semana']);
            $pps->bindValue(3, $infplantilla['pvts_fecha_inicio']);
            $pps->bindValue(4, $infplantilla['pvts_fecha_fin']);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarPlantillas()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_plantilla_ventas_pvts";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps ->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarinfoPlantillasId($idp)
    {
        try {
            //code...
            $sql = "SELECT dvts.*, usr.usr_nombre FROM tbl_datos_ventas_dvts dvts
             JOIN tbl_usuarios_usr usr ON usr.usr_id =dvts.dvts_id_vendedor
             WHERE dvts_id_plantilla=?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $idp);
            $pps -> execute();
            return $pps ->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlinsertarDatosPlantilla($dts)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_datos_ventas_dvts(dvts_id_vendedor, dvts_id_plantilla, 
            dvts_sabado, dvts_domingo, dvts_lunes, dvts_martes, dvts_miercoles, dvts_jueves, dvts_viernes, dvts_total) 
            VALUES (?,?,?,?,?,?,?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dts['dvts_id_vendedor']);
            $pps->bindValue(2, $dts['dvts_id_plantilla']);
            $pps->bindValue(3, $dts['dvts_sabado']);
            $pps->bindValue(4, $dts['dvts_domingo']);
            $pps->bindValue(5, $dts['dvts_lunes']);
            $pps->bindValue(6, $dts['dvts_martes']);
            $pps->bindValue(7, $dts['dvts_miercoles']);
            $pps->bindValue(8, $dts['dvts_jueves']);
            $pps->bindValue(9, $dts['dvts_viernes']);
            $pps->bindValue(10, $dts['dvts_total']);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlupdateDatosPlantilla($dts)
    {
        try {
            //code...
            $sql = "UPDATE tbl_datos_ventas_dvts SET dvts_sabado=?,dvts_domingo=?,dvts_lunes=?,dvts_martes=?,dvts_miercoles=?,
            dvts_jueves=?,dvts_viernes=?,dvts_total=? WHERE dvts_id=?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $dts['dvts_sabado']);
            $pps->bindValue(2, $dts['dvts_domingo']);
            $pps->bindValue(3, $dts['dvts_lunes']);
            $pps->bindValue(4, $dts['dvts_martes']);
            $pps->bindValue(5, $dts['dvts_miercoles']);
            $pps->bindValue(6, $dts['dvts_jueves']);
            $pps->bindValue(7, $dts['dvts_viernes']);
            $pps->bindValue(8, $dts['dvts_total']);
            $pps->bindValue(9, $dts['dvts_id']);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}


