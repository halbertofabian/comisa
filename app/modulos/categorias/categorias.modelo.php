
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 28/10/2020 14:27
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class CategoriasModelo
{
    public static function mdlAgregarCategorias($ctg)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_categorias_ctg (ctg_nombre,ctg_categoria_padre,ctg_fecha_creacion) VALUES(?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $ctg['ctg_nombre']);
            $pps->bindValue(2, $ctg['ctg_categoria_padre']);
            $pps->bindValue(3, $ctg['ctg_fecha_creacion']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarCategorias()
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
    public static function mdlMostrarCategorias($ctg_nombre = "")
    {
        try {
           
            //code...
            if ($ctg_nombre == "") {
                $sql = "SELECT * FROM tbl_categorias_ctg ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($ctg_nombre != "") {
                $sql = "SELECT * FROM tbl_categorias_ctg WHERE ctg_nombre LIKE '%$ctg_nombre%' ";
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
    public static function mdlEliminarCategorias()
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
