<!-- < ?php 
    include '../../datos/UsuarioDao.php'; -->
<!-- ?> -->

                    <form clas="formularioAñadirMascota" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                      <input type="text" name="nombre_Mascota" id="" placeholder="Nombre de la Mascota">
                      <input type="text" name="descipcion_mascota" id="" placeholder="Descripcion">
                      <label for="">Fecha de nacimiento de la mascota</label>
                      <input type="date" name="fecha_mascota" id="" >
                      <select name="opcion">
                          <option>Perdido</option>
                          <option>Adopción</option>
                          <option>Pareja</option>
                      </select>
                      <br>  
                      <label for="archivo">Subir foto de la mascota </label>
                      
                      <input type="file" name="archivo" class="">
                      <input type="text" name="raza_mascota" id="" placeholder="Ingrese la raza de la mascota">
                      <input type="submit" value="Ingresar datos" class="botonRegistrarse">

                    </form>
                    <?php
                      if (isset($_POST["nombre_Mascota"], $_POST["descipcion_mascota"], $_POST["fecha_mascota"], $_POST["opcion"], $_POST["raza_mascota"],$_FILES['archivo']['tmp_name'],$_FILES['archivo']['name'],$_FILES['archivo']['type'],$_FILES['archivo']['size'])){
                          $nombre = $_POST["nombre_Mascota"];
                          $descripcion = $_POST["descipcion_mascota"];
                          $idDelUsuario = $_SESSION["usuario"]["id"];
                          $fecha = $_POST["fecha_mascota"];
                          $opcion = $_POST["opcion"];
                          $raza = $_POST["raza_mascota"];
                          // $guardardatos = $obj -> guardarDatos($nombre,$descripcion,$idDelUsuario,$fecha,$opcion,$raza);
                          // Imagen
                          $archivoTem = $_FILES['archivo']['tmp_name'];
                          $nombre2 = $_FILES['archivo']['name'];
                          $tipo = $_FILES['archivo']['type'];
                          $tamaño = $_FILES['archivo']['size'];
                          $destino = '../imagenes/'.$nombre2;
                          // $guardardatos = $obj -> guardarDatos($nombre,$descripcion,$idDelUsuario,$fecha,$opcion,$raza,$destino);
                          if(move_uploaded_file($archivoTem,$destino)){

                            echo 'Archivo subido con exito';

                            $guardardatos = $obj -> guardarDatos($nombre,$descripcion,$idDelUsuario,$fecha,$opcion,$raza,$destino);
                          }else{
                            echo 'No subido';
                          }
                      
                      
                      }else{
                          echo 'Por favor, complete el formulario';
                      }
                    ?>

