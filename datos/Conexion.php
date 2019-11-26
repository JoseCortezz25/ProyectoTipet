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
            $cn = new PDO("mysql:host=127.0.0.1:52225;dbname=proyectotipetdb;charset=utf8mb4", "azure", "6#vWHD_$");
            // $cn = new PDO("Data Source=tcp:servidorproyectotipet.database.windows.net,1433;Initial Catalog=ProyectoTipet;User Id=AlfonsoChavarro@servidorproyectotipet.database.windows.net;Password=JoseCortez3166226046");

            return $cn;

        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}
