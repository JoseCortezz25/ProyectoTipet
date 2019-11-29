
                    <form clas="formularioAñadirMascota" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                      <div class="Cajita-contImg">
                        <?php if(empty($obtenerFotoPerfil)):  
                          echo "<img src='../imagenes/imagenes_app/user.png'>";
                        ?> 
                        <?php else:  ?>
                          <img src="<?php echo $obtenerFotoPerfil[0]['direccion'];?>" alt="">
                        <?php endif;?>
                      </div>
                      <input type="text" name="nombre_Mascota"  placeholder="Nombre de la Mascota" maxlength="100" required>
                      <!-- <input type="text" name="descipcion_mascota"  placeholder="Descripcion" maxlength="220" requiere> -->
                      <textarea name="descipcion_mascota" cols="30" placeholder="Descripcion" rows="10" maxlength="170"></textarea>
                      <!-- <hr><hr> -->
                      <!-- <label for="fecha_mascota">Fecha de nacimiento de la mascota</label> -->
                      
                      <div class="contenedorFormularioExtras">

                        <div class="contenedorSubirImg">
                          <img src="../imagenes/imagenes_app/subirImg.png" alt="">
                          <input type="file" name="archivo" class="" required>
                        </div>

                        <div class="contenedorSubirImg">
                          <!-- <label for="date"><img src="../imagenes/imagenes_app/calendario.png" alt="" ></label> -->
                          <input type="date" name="fecha_mascota" id="date" required>
                        </div>
                        <!-- <input type="date" name="fecha_mascota" requiere> -->


                        <select name="opcion" required>
                          <option disabled selected> Tipo de publicacion</option>
                          <option>Perdido</option>
                          <option>Adopción</option>
                          <option>Pareja</option>
                          <option>Publicacion normal</option>
                        </select>
                        <!-- <input type="text" name="raza_mascota"  placeholder="Ingrese la raza de la mascota"> -->
                        <select name="raza_mascota" required>
                          <option disabled selected>Tipo de animal</option>
                          <option>Perro</option>
                          <option>Gato</option>
                        </select>

                        <select name="ubicacion" required>
                          <option disabled selected>Ciudad</option>
                          <option>Bogotá</option>
                          <option>Neiva</option>
                          <option>Medellin</option>
                          <option>Cali</option>
                          <option>Barranquilla</option>
                        </select>
                      
                      </div>

                      <br>  
                      <!-- <label for="archivo">Subir foto de la mascota </label>
                      
                      <input type="file" name="archivo" class="">
                      <input type="text" name="raza_mascota" id="" placeholder="Ingrese la raza de la mascota"> -->
                      <input type="submit" value="Ingresar datos" class="botonRegistrarse">

                    </form>
                    <?php
                      if (isset($_POST["nombre_Mascota"], $_POST["descipcion_mascota"], $_POST["fecha_mascota"], $_POST["opcion"], $_POST["raza_mascota"], $_POST["ubicacion"],$_FILES['archivo']['tmp_name'],$_FILES['archivo']['name'],$_FILES['archivo']['type'],$_FILES['archivo']['size'])){
                          $nombre = $_POST["nombre_Mascota"];
                          $descripcion = $_POST["descipcion_mascota"];
                          $idDelUsuario = $_SESSION["usuario"]["id"];
                          $fecha = $_POST["fecha_mascota"];
                          $opcion = $_POST["opcion"];
                          $raza = $_POST["raza_mascota"];
                          $ciudad = $_POST["ubicacion"];
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

                            $guardardatos = $obj -> guardarDatos($nombre,$descripcion,$idDelUsuario,$fecha,$opcion,$raza,$ciudad,$destino);
                          }else{
                            echo 'No subido';
                          }
                      
                      
                      }else{
                          // echo 'Por favor, complete el formulario';
                      }
                    ?>

