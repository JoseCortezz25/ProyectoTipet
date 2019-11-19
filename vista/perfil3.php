<?php include 'partials/head.php';?>
<!-- < ?php include 'datos/conexion2.php';?> -->
<?php
  // error_reporting(E_ALL ^ E_NOTICE);
  if (isset($_SESSION["usuario"])) {
      if ($_SESSION["usuario"]["privilegio"] == 1) {
          header("location:admin.php");
      }
  } else {
      header("location:login.php");
  }
  include '../datos/UsuarioDao.php';
  $obj = new UsuarioDao();
  // Obtener registros
  $publicaciones = $obj -> obtenerPublicacionesUsuario($_SESSION["usuario"]["id"]);
  $obtenerFotoPerfil = $obj -> obtenerFotoPerfil($_SESSION["usuario"]["id"]);
  
?>

<body>

  <div class="contenedorHome">

    <!-- -------------------- Columna Uno -------------------- -->
    <div class="contenedorHome-Columnas">
      <div class="Caja"><a href="usuario.php" class="link-gradient">Tipet <strong>BETA</strong></a></div>
      <!-- --------------- Caja de secciones --------------- -->
      <div class="Caja">
          <!-- <div class="seccion"><a href="">a</a></div>
          <div class="seccion"><a href="">a</a></div>
          <div class="seccion"><a href="">a</a></div> -->

        <!--------- Primera caja --------->
        <div class="Cajita">
            <div class="Cajita-contImg">
              <?php if(empty($obtenerFotoPerfil)):  
                echo "<img src='../imagenes/imagenes_app/user.png'>";
              ?> 
              <?php else:  ?>
                <img src="<?php echo $obtenerFotoPerfil[0]['direccion'];?>" alt="">
              <?php endif;?>
            </div>
            <p class="tn"><a href="perfil.php"><?php echo $_SESSION["usuario"]["nombre"]; ?></a></p>
        </div>

        <!--------- Segunda caja --------->
        <div class="Cajita">
            <div class="Cajita-contImg2">
              <!-- <img src="https://img.icons8.com/pastel-glyph/64/000000/pet-tray.png"> -->
              <!-- <img src="https://img.icons8.com/cute-clipart/2x/dog-footprint.png" alt=""> -->
              <img src="https://img.icons8.com/cute-clipart/64/000000/dog.png">
            </div>
            <p>Mis mascotas</p>
        </div>
        <!--------- Tercera Caja --------->
        <div class="Cajita">
          <a href="cerrar-sesion.php">
              <div class="Cajita-contImg2">
                <img src="https://img.icons8.com/cute-clipart/64/000000/exit.png">
              </div>
              <p>Cerrar Session</p>
          </a>
        </div>

      </div>
     
     
      <div class="Caja">
        
      </div>
    </div>
    <!-- -------------------- Columna Dos -------------------- -->
    <div class="contenedorHome-Columnas">

      <h2><span>Tus</span> mascotas</h2>
      <div class="contenedorFormula">

  <h2>Registra tu mascota</h2>

        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
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
            <label for="archivo">Subir archivo</label>
            <br>
            <input type="file" name="archivo">
            <input type="text" name="raza_mascota" id="" placeholder="Ingrese la raza de la mascota">
            <input type="submit" value="Ingresar datos">

        </form>
        <!-- , $_POST["descipcion_mascota"], $_POST["fecha_mascota"]), $_POST["opcion"], $_POST["raza_mascota"] -->
        </div>
        <div class="contenedorFormula">

           
          <!-- <form action="< ?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
              <label for="archivo">Subir archivo</label>
              <input type="file" name="archivo">
              <input type="submit" value="subir">
          </form> -->
          <!-- < ?php
            // $archivoTem = 0;
            // $nombre = "hola";
          //   if(isset($_FILES['archivo']['tmp_name'],$_FILES['archivo']['name'],$_FILES['archivo']['type'],$_FILES['archivo']['size'])){
          //     $archivoTem = $_FILES['archivo']['tmp_name'];
          //     $nombre = $_FILES['archivo']['name'];
          //     $tipo = $_FILES['archivo']['type'];
          //     $tamaño = $_FILES['archivo']['size'];
  
          //     $destino = '../imagenes/'.$nombre;
              
          //     if(move_uploaded_file($archivoTem,$destino)):
          //       // $subirImagen = $obj -> guardarImg($nombre,$destino,$_SESSION["usuario"]["id"]);
          //         echo 'Archivo subido con exito';
          //       $subirImagen = $obj -> guardarImgPerfil($nombre,$destino,$_SESSION["usuario"]["id"]);
          //   ? >
          //         <img src="< ?php echo $destino; ?>" width='10px'>
          //       < ?php
          //     }else{
          //       echo 'No subido';
          //     }
          //   }
            //     < ?php $linksito = $obtenerFotoPerfil[0]['direccion']; ? >
     <script>
        document.getElementById('fondoImagen').style.backgroundImage= 'url('img_tree.png')''< ?php echo $linksito?>'; -->
 <!-- </script>  -->
       <!-- ?>  -->
        </div>
        <div class="contenedorPublicaciones">

        <!-- --------  Publicacion --------  -->
        <!-- < ?php echo print_r($publicaciones);?> -->
        <!-- < ?php if(empty($publicaciones)): ?> -->
          <?php $num =1; ?>
          <?php foreach($publicaciones as $publicaciones):?>

              <div id="fondoImagen<?php echo $num; ?>" class="contenedorPublicacion" >

                  <div class="contenedorPublicacion-perfil">
                      <div class="contenedorPublicacion-perfil-contImg">
                      <!-- <?php 
                        if(empty($obtenerFotoPerfil[0]['direccion'])){ 
                            echo "<img src='$obtenerFotoPerfil[0]['direccion']'>";
                        }else{
                          echo "<img src='../imagenes/imagenes_app/user.png'>";
                        }
                      ?> -->
                        <img src="<?php echo $obtenerFotoPerfil[0]['direccion'];?>" alt="">
                        <!-- <img src="https://cdn.pixabay.com/photo/2019/04/18/10/31/flying-dog-4136563_960_720.jpg" alt="">           -->
                      </div>
                      <?php  $añadir = $obj -> obtenerPublicacion($publicaciones['idPublicacion']);?> 
                      <p><?php echo $añadir[0]['nombre']?> </p>

                  </div>

                  <div class="contenedorPublicacion-contenido">
                    <p class="nombreMascota"><?php echo $publicaciones['nombreMascota']?></p>
                    <p class="descripcionMascota"><?php echo $publicaciones['descripcion']?> </p>
                    <strong class="botonTipo"><?php echo $publicaciones['tipoMascota']?></strong>
                  </div>
                  <?php 

                    if(empty($publicaciones['direccionImg'])): ?>
                      <!-- <p>mal</p> -->
                    <?php else: ?>
                      <!-- <p>bien</p> -->
                    <?php endif ?>

                    
                   <?php
                    $linksito = $publicaciones['direccionImg']; 
                    // echo $linksito;
                  ?>
              <script>
                document.getElementById("fondoImagen<?php echo $num; ?>").style.backgroundImage = "url('<?php echo $linksito; ?>')";
              </script>
              </div>
              
            <?php  $num++; ?>
          <?php endforeach; ?>
        <!-- < ?php else:  ?>
          <p>No tienes publicaciones :(</p>
        < ?php endif  ?> -->
        <!-- --------  Fin Publicacion --------  -->
             


        </div>
    </div>
    <!-- -------------------- Columna Tres -------------------- -->
    <div class="contenedorHome-Columnas">
          <div class="Caja2">
                  <h2>Tips <span>de la semana</span></h2>
                  <!-- -------------------- Columna Cajas -------------------- -->
                  <div class="CajaSugerencias">
                      <div class="vacio">  #1 </div>
                      <p> <b>Acaricia a tu perro.</b> Un trato amoroso es muy aconsejable para la salud de tu mascota. Tómate algún momento del día para compartir con tu perro y consigue un tiempo de calidad. Aprovecha para acariciarlo, abrazarlo o darle un masaje relajante en patas y muslos.</p>
                  </div>
                  <div class="CajaSugerencias">
                      <div class="vacio">  #2  </div>
                      <p><b>Hazle hacer ejercicio.</b> Emplea unos minutos de tu día para jugar con él, ya sea lanzando una pelota o darle un largo paseo por el parque.</p>
                  </div>
                  <div class="CajaSugerencias">
                      <div class="vacio">  #3  </div>
                      <p><b>Visitas al veterinario.</b> Dentro de los cuidados que necesita un animal son importantes las visitas regulares al veterinario donde le pongan las vacunas y el chip obligatorio.</p>
                  </div>
                  <div class="CajaSugerencias">
                      <div class="vacio"> #4  </div>
                      <p><b>Alimentación.</b> Es importante que los perros sigan una buena alimentación. Hablar con el veterinario nos ayudará a saber los nutrientes necesarios para nuestra mascota según su raza, condición física y peso.</p>
                  </div>
          </div>
    </div>

  </div>

</body>
</html>


<!-- < ?php include 'partials/footer.php';?> -->
