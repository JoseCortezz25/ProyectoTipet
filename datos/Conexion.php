<?php

class Conexion
{

    /**
     * Conexión a la base datos
     *
     * @return PDO
     */
    public static function conectar()
    {
        try {
            // $cn = new PDO("mysql:host=sql312.tonohost.com;dbname=ottos_24810011_proyecto", "ottos_24810011", "JoseCortez3166226046");
            // $cn = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");
            $cn = new PDO("mysql:host=127.0.0.1:52225;dbname=proyectotipetdb;charset=utf8mb4", "azure", "6#vWHD_$");
            return $cn;

        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}
