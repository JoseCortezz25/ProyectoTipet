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

            $cn = new PDO("mysql:host=127.0.0.1:52225;dbname=ProyectoTipetDB", "azure", "6#Vwhd_$");

            return $cn;

        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}
