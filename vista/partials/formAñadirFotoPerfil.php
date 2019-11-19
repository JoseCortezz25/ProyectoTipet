<!-- < ?php 
    include '../../datos/UsuarioDao.php';
?> -->

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="archivo">
    <br>
    <input type="submit" value="Subir foto" class="botonRegistrarse">
</form> 


<?php 
    $archivoTem = 0;
    $nombre = "hola";
    if(isset($_FILES['archivo']['tmp_name'],$_FILES['archivo']['name'],$_FILES['archivo']['type'],$_FILES['archivo']['size'])){
        $archivoTem = $_FILES['archivo']['tmp_name'];
        $nombre = $_FILES['archivo']['name'];
        $tipo = $_FILES['archivo']['type'];
        $tamaño = $_FILES['archivo']['size'];
    
        $destino = '../imagenes/'.$nombre;
                
        if(move_uploaded_file($archivoTem,$destino)){
            echo 'Archivo subido con exito';
            $subirImagen = $obj -> guardarImgPerfil($nombre,$destino,$_SESSION["usuario"]["id"]);
        }else{
            echo 'No se pudo subir la foto';
        }
    }
?> 