<?php

include 'Conexion.php';
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion
{
    protected static $cnx;

    // Generar metodo para conectarse
    private static function getConexion(){
        // self para invocar esta clase en si
        self::$cnx = Conexion::conectar();
    }
    
    // desconectar 
    private static function desconectar(){
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
        // $usuario->setPrivilegio($filas["descripcion"]);
        // $usuario->setFecha_registro($filas["numero"]);

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
        // $resultado->bindValue(":numero", $usuario->getNumero());

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

// Tooltip

    public static function guardarDatos($nombre,$descripcion,$idDelUsuario,$fecha,$opcion,$raza,$ciudad,$destino){
        $consulta = "INSERT INTO publicaciones(nombreMascota,descripcion,idUsuario,fecha,tipoMascota,razaMascota,ubicacion,direccionImg) 
                     VALUES ('$nombre','$descripcion','$idDelUsuario','$fecha','$opcion','$raza','$ciudad','$destino')";

        self::getConexion();
        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }

    public static function obtenerPublicacion($idPublicacion){
        $query  =  "SELECT 
                        a.nombre
                    FROM
                        usuarios a,
                        publicaciones b
                    WHERE a.id = b.idUsuario AND idPublicacion = :idPublicacion";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);
        

        $resultado -> execute([
            'idPublicacion' => $idPublicacion
        ]);
        // $resultado->execute();

        return $resultado->fetchAll();
    }


    public static function obtenerPublicaciones(){
        self::getConexion();

        $query = self::$cnx->prepare("
            SELECT *
            FROM publicaciones 
        ");
        $query->execute();

        return $query->fetchAll();

    }
    public static function obtenerPublicacionesMascotas(){
        self::getConexion();

        $query = self::$cnx->prepare("
            SELECT *
            FROM publicaciones WHERE tipoMascota = 'Adopción'
        ");
        $query->execute();

        return $query->fetchAll();
    }

    public static function obtenerPublicacionesPerdido(){
        self::getConexion();

        $query = self::$cnx->prepare("
            SELECT *
            FROM publicaciones WHERE tipoMascota = 'Perdido'
        ");
        $query->execute();

        return $query->fetchAll();
    }

    public static function obtenerPublicacionesPareja(){
        self::getConexion();

        $query = self::$cnx->prepare("
            SELECT *
            FROM publicaciones WHERE tipoMascota = 'Pareja'
        ");
        $query->execute();

        return $query->fetchAll();
    }

    public static function obtenerPublicacionesUsuario($idUsuario){
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
    public static function guardarImg($nombreMascota,$destino,$idDelUsuario){
        $consulta = "INSERT INTO imagenpublicacion(nombreMascota,imagenMascota,idUsuario)
        VALUES ('$nombreMascota','$destino','$idDelUsuario')";

        self::getConexion();
        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }
    // ----------------------------------------------------

    public static function guardarImgPerfil($nombreArchivo,$destino,$idDelUsuario){
        $consulta = "INSERT INTO imagenperfil(nombreArchivo,direccion,idUsuario)
                    VALUES ('$nombreArchivo','$destino','$idDelUsuario')";

        self::getConexion();
        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }



    public static function obtenerFotoPerfil($idUsuario){
        self::getConexion();

        $query = self::$cnx->prepare("SELECT * FROM imagenperfil WHERE imagenperfil.idUsuario = :idUsuario");
        $query->execute([
            'idUsuario' => $idUsuario
        ]);

        return $query->fetchAll();
    }

    public static function obtenerFotoPerfilPublicacion($idUsuarioPost){
        self::getConexion();

        $query = self::$cnx->prepare("SELECT 
                                        imagenperfil.direccion 
                                    FROM imagenperfil, publicaciones 
                                    WHERE imagenperfil.idUsuario = :idUsuario");
        $query->execute([
            'idUsuario' => $idUsuarioPost
        ]);

        if(isset($query)){
            return $query->fetch();
        }else{
            return $query = null;
        }
        
    }
    public static function ActualizarImgPerfil($nombreArchivo,$destino,$idDelUsuario){
        $consulta = "UPDATE imagenperfil
                     SET nombreArchivo='$nombreArchivo', direccion='$destino' 
                     WHERE idUsuario=$idDelUsuario";

        self::getConexion();
        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }

 
    public static function obtenerNumero($idUsuario){
        self::getConexion();

        $query = self::$cnx->prepare("SELECT numero FROM usuarios WHERE usuarios.id = :idUsuario");
        $query->execute([
            'idUsuario' => $idUsuario
        ]);

        if(isset($query)){
            return $query->fetchAll();
        }else{
            return $query = null;
        }
    }
    
    public static function obtenerNumeros($idUsuarioPost){
        self::getConexion();

        $query = self::$cnx->prepare("SELECT usuarios.numero 
                                    FROM usuarios, publicaciones 
                                    WHERE usuarios.id = $idUsuarioPost");
        $query->execute();


        return $query->fetch();
        
    }
    // -----------------------------------------------------------------------------------------------------
    public static function obtenerDescripcion($idUsuario){
        self::getConexion();

        $query = self::$cnx->prepare("SELECT descripcion FROM usuarios WHERE usuarios.id = :idUsuario");
        $query->execute([
            'idUsuario' => $idUsuario
        ]);

        if(empty($query)){
            return $query = null;
        }else{
            return $query->fetch();
        }
    }
    public static function ActualizarDescripcion($descripcion, $idDelUsuario){
        $consulta = "UPDATE usuarios SET descripcion = '$descripcion' WHERE id = $idDelUsuario";
        

        self::getConexion();
        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }

    public static function AñadirDescripcion($descripcion,$idDelUsuario ){
        $consulta = "INSERT INTO usuario(descripcion)
                     VALUES ('$descripcion')
                     WHERE usuario.id = $idDelUsuario";

        self::getConexion();
        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }
    // ----------------------------------------------------------------------------------------

    public static function obtenerNumeroUser($idUsuario){
        self::getConexion();

        $query = self::$cnx->prepare("SELECT numero FROM usuarios WHERE usuarios.id = :idUsuario");
        $query->execute([
            'idUsuario' => $idUsuario
        ]);

        if(empty($query)){
            return $query = null;
        }else{
            return $query->fetch();
        }
    }

    public static function AñadirNumeroUser($numero,$idDelUsuario){
        self::getConexion();
        // $consulta = "INSERT INTO usuarios(numero)
        //              VALUES ('$numero')
        //              WHERE usuario.id = $idDelUsuario";

        $consulta = "UPDATE usuarios SET numero = '$numero' WHERE id = $idDelUsuario";

        $query = self::$cnx->prepare($consulta);

        $query -> execute();
    }


    public static function borrarPublicacion($id){
        $mensaje = 'La data es: ' . $id;
        return $mensaje;
            // if (isset($_POST['btnBorrar'])) {
            //     $consulta = "DELETE FROM publicaciones
            //                 WHERE idUsuario = $idPublicacion";

            //     self::getConexion();
            //     $query = self::$cnx->prepare($consulta);

            //     $query->execute();
            // }

        
        
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
