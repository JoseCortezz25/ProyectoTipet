<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="archivoAct">
    <br>
    <input type="submit" value="Actualizar foto" class="botonRegistrarse">
</form> 


<?php 
    $archivoTem = 0;
    $nombre = "hola";
    if(isset($_FILES['archivoAct']['tmp_name'],$_FILES['archivoAct']['name'],$_FILES['archivoAct']['type'],$_FILES['archivoAct']['size'])){
        $archivoTem = $_FILES['archivoAct']['tmp_name'];
        $nombre = $_FILES['archivoAct']['name'];
        $tipo = $_FILES['archivoAct']['type'];
        $tamaño = $_FILES['archivoAct']['size'];
    
        $destino = '../imagenes/'.$nombre;
                
        if(move_uploaded_file($archivoTem,$destino)){
            echo 'Archivo subido con exito';
            $ActualizarFotoPerfil = $obj -> ActualizarImgPerfil($nombre,$destino,$_SESSION["usuario"]["id"]);
        }else{
            echo 'No se pudo subir la foto';
        }
    }
?> 