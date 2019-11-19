<?php

include 'Conexion.php';
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion
{
    protected static $cnx;

    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    /**
     * Metodo que sirve para validar el login
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function login($usuario){
        $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if ($filas["usuario"] == $usuario->getUsuario()
                && $filas["password"] == $usuario->getPassword()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Metodo que sirve obtener un usuario
     *
     * @param      object         $usuario
     * @return     object
     */
    public static function getUsuario($usuario){
        $query = "SELECT id,nombre,email,usuario,privilegio,fecha_registro FROM usuarios WHERE usuario = :usuario AND password = :password";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();
        $usuario->setId($filas["id"]);
        $usuario->setNombre($filas["nombre"]);
        $usuario->setUsuario($filas["usuario"]);
        $usuario->setEmail($filas["email"]);
        $usuario->setPrivilegio($filas["privilegio"]);
        $usuario->setFecha_registro($filas["fecha_registro"]);

        return $usuario;
    }

    /**
     * Metodo que sirve para registrar usuarios
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function registrar($usuario){
        $query = "INSERT INTO usuarios (nombre,email,usuario,password,privilegio) VALUES (:nombre,:email,:usuario,:password,:privilegio)";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":nombre", $usuario->getNombre());
        $resultado->bindValue(":email", $usuario->getEmail());
        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());
        $resultado->bindValue(":privilegio", $usuario->getPrivilegio());

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }



    public function guardarDatos($nombre,$descripcion,$idDelUsuario,$fecha,$opcion,$raza,$destino){
        $consulta = "INSERT INTO publicaciones(nombreMascota,descripcion,idUsuario,fecha,tipoMascota,razaMascota,direccionImg) 
                     VALUES ('$nombre','$descripcion','$idDelUsuario','$fecha','$opcion','$raza','$destino')";

        self::getConexion();
        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }



    public function obtenerPublicacion($idPublicacion){
        // return $dado;
        // $idPublicacion = 1;
        $query  =  "SELECT 
                        a.nombre
                    FROM
                        usuarios a,
                        publicaciones b
                    WHERE a.id = b.idUsuario AND idPublicacion = :idPublicacion";
        // $query = " SELECT 
        //                         publicaciones.*,
        //                         usuarios.nombreCompleto

        //                     FROM publicaciones

        //                     INNER JOIN usuarios
        //                         ON publicaciones.idUsuario = usuarios.idUsuario

        //                     WHERE idPublicacion = :idPublicacion";
        self::getConexion();

        $resultado = self::$cnx->prepare($query);
        

        $resultado -> execute([
            'idPublicacion' => $idPublicacion
        ]);
        // $resultado->execute();

        return $resultado->fetchAll();
    }


    public function obtenerPublicaciones(){
        self::getConexion();

        $query = self::$cnx->prepare("
            SELECT *
            FROM publicaciones
        ");
        $query->execute();

        return $query->fetchAll();

    }

    public function obtenerPublicacionesUsuario($idUsuario){
        self::getConexion();

        $query = self::$cnx->prepare("SELECT *
                                FROM 
                                    publicaciones
                                WHERE
                                    publicaciones.idUsuario = :idUsuario");
        $query->execute([
            'idUsuario' => $idUsuario
        ]);

        return $query->fetchAll();
    }
    // Descontinuado
    public function guardarImg($nombreMascota,$destino,$idDelUsuario){
        $consulta = "INSERT INTO imagenpublicacion(nombreMascota,imagenMascota,idUsuario)
        VALUES ('$nombreMascota','$destino','$idDelUsuario')";

        self::getConexion();
        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }
    // ----------------------------------------------------

    public function guardarImgPerfil($nombreArchivo,$destino,$idDelUsuario){
        $consulta = "INSERT INTO imagenperfil(nombreArchivo,direccion,idUsuario)
                    VALUES ('$nombreArchivo','$destino','$idDelUsuario')";

        self::getConexion();
        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }



    public function obtenerFotoPerfil($idUsuario){
        self::getConexion();

        $query = self::$cnx->prepare("SELECT * FROM imagenperfil WHERE imagenperfil.idUsuario = :idUsuario");
        $query->execute([
            'idUsuario' => $idUsuario
        ]);

        return $query->fetchAll();
    }

    public function obtenerFotoPerfilPublicacion($idUsuarioPost){
        self::getConexion();

        $query = self::$cnx->prepare("SELECT 
                                        imagenperfil.direccion 
                                    FROM imagenperfil, publicaciones 
                                    WHERE imagenperfil.idUsuario = :idUsuario");
        $query->execute([
            'idUsuario' => $idUsuarioPost
        ]);

        if(isset($query)){
            return $query->fetchAll();
        }else{
            return $query = null;
        }
        
    }
    // $archivoTem,$destino,$_SESSION["usuario"]["id"]
    // public function guardarImgPublicacion($destino){
    //     $consulta = "INSERT INTO publicaciones(direccionImg)
    //                  VALUES ('$destino')";

    //     self::getConexion();
    //     $query = self::$cnx->prepare($consulta);

    //     $query -> execute();
    // }

    // public function obtenerImgPublicacion(){
    //     $consulta = "SELECT 
    //                      publicaciones.direccionImg
    //                 FROM 
    //                     publicaciones ";

    //     self::getConexion();
    //     $query = self::$cnx->prepare($consulta);

    //     $query -> execute();

    //     return $query->fetch();
    // }

}
