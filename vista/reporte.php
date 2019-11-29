<?php
    try {

        $cn = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");

        // echo 'conexion exitosa';
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }

    if(isset($_POST['id'])){  

        // echo $_POST['id'];  
        // echo '---'; 
        // echo $_POST['idUser'];
        // echo '<br>';
        $id = $_POST['id'];
        // echo  $id;

        $consulta = "DELETE FROM publicaciones
        WHERE idPublicacion = $id"; 

        $query = $cn->prepare($consulta);

        $query->execute();
        echo 'Se elimino con exito';

    }else{
        echo 'nah';
    }

