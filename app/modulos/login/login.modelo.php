<?php

require_once DOCUMENT_ROOT . 'app/modulos/conexion/conexion.php';

class LoginModelo
{
    public static function mdlIniciarSesion($usr_correo)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_usuarios_usr WHERE usr_correo = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps -> bindValue(1,$usr_correo);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $e) {
            throw $e;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlIniciarSesionAuto($usr_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_usuarios_usr WHERE usr_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps -> bindValue(1,$usr_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $e) {
            throw $e;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}

