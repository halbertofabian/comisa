<?php

class Conexion
{

    static public function conectar()
    {

        try {
            //code...
            $link = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER,
                DB_PASSWORD
            );

            $link->exec("set names utf8mb4");

            return $link;
        } catch (PDOException $th) {
            throw $th;
            return false;
        }
    }
}
