<?php include 'partials/head.php';?>
<!-- < ?php include 'datos/conexion2.php';?> -->
<?php
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
  $publicaciones = $obj -> obtenerPublicaciones();
  $obtenerFotoPerfil = $obj -> obtenerFotoPerfil($_SESSION["usuario"]["id"]);
    
  
?>

<body>
<!-- vamos a valer en bases de datos, crack -->
  <div class="contenedorHome">

    <!-- -------------------- Columna Uno -------------------- -->
    <div class="contenedorHome-Columnas">
      <div class="Caja"><a href="" class="link-gradient">Tipet <strong>BETA</strong></a></div>
      <!-- --------------- Caja de secciones --------------- -->
      <div class="Caja">
          <!-- <div class="seccion"><a href="">a</a></div>
          <div class="seccion"><a href="">a</a></div>
          <div class="seccion"><a href="">a</a></div> -->

        <!--------- Primera caja --------->
        <div class="Cajita">
          <a href="perfil.php">
            <div class="Cajita-contImg">
              
              <?php if(empty($obtenerFotoPerfil)):  
                echo "<img src='../imagenes/imagenes_app/user.png'>";
              ?> 
              <?php else:  ?>
                <img src="<?php echo $obtenerFotoPerfil[0]['direccion'];?>" alt="">
              <?php endif;?>

              <!-- <img src="< ?php echo $obtenerFotoPerfil[0]['direccion'];?>" alt=""> -->
                <!-- <img src="https://img.icons8.com/windows/96/000000/user.png"> -->



              </div>
              <p class="tn"><?php echo $_SESSION["usuario"]["nombre"]; ?></p>
            </a>
        </div>

        <!--------- Segunda caja --------->
        <div class="Cajita">
          <a href="perfil.php">
            <div class="Cajita-contImg2">
              <!-- <img src="https://img.icons8.com/pastel-glyph/64/000000/pet-tray.png"> -->
              <!-- <img src="https://img.icons8.com/cute-clipart/2x/dog-footprint.png" alt=""> -->
              <img src="https://img.icons8.com/cute-clipart/64/000000/dog.png">
            </div>
            <p>Mis mascotas</p>
            </a>
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
        <div class="aviso">
          <p><b>Aviso:</b> Tipet sigue en version de desarrollo, lo cual puede traer problemas al momento de ejercutar ciertas funciones. Gracias.</p>
        </div>
      </div>
    </div>
    <!-- -------------------- Columna Dos -------------------- -->
    <div class="contenedorHome-Columnas">
    <!-- <div class="aviso">
      <p>Array ( [0] => Array ( [direccion] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg [0] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg ) [1] => Array ( [direccion] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg [0] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg ) [2] => Array ( [direccion] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg [0] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg ) [3] => Array ( [direccion] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg [0] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg ) [4] => Array ( [direccion] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg [0] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg ) [5] => Array ( [direccion] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg [0] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg ) [6] => Array ( [direccion] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg [0] => ../imagenes/WhatsApp Image 2019-11-15 at 12.12.07 PM.jpeg ) ) 1</p>
    </div> -->
      <h2>Mascotas <span>populares</span></h2>
        <!-- <div class="aviso">
          <strong>Aviso: </strong>Tipet aun sigue en desarrollo, por lo cual, la pagina puede traer errores al ejecutar ciertas funciones. Los diseños y demás estan en version de prueba. Nuevas funcionalidades y mejora en el diseño llegarán en proximas versiones. Gracias.
        </div> -->
        <div class="contenedorPublicaciones">

        <!-- --------  Publicacion --------  -->
        <?php $num =1; ?>
        <?php foreach($publicaciones as $publicaciones):?>
            <div id="fondoImagen<?php echo $num; ?>" class="contenedorPublicacion">
                <div class="contenedorPublicacion-perfil">
                    <div class="contenedorPublicacion-perfil-contImg">
                      <!-- <img src="https://cdn.pixabay.com/photo/2019/04/18/10/31/flying-dog-4136563_960_720.jpg" alt="">           -->
                      <?php  $obtenerFotoPerfilPublicacion = $obj ->  obtenerFotoPerfilPublicacion($publicaciones['idUsuario']);?>
                            <?php if(empty($obtenerFotoPerfilPublicacion)):  
                              echo "<img src='../imagenes/imagenes_app/user.png'>";
                            ?> 
                            <?php else:  ?>
                              <img src="<?php echo $obtenerFotoPerfilPublicacion[0]['direccion'] ?>">
                            <?php endif;?>
                    </div>
                    <?php  $añadir = $obj -> obtenerPublicacion($publicaciones['idPublicacion']);?> 
                    <p><?php echo $añadir[0]['nombre']?> </p>
                </div>

                <div class="contenedorPublicacion-contenido">
                  <p class="nombreMascota"><?php echo $publicaciones['nombreMascota']?></p>
                  <p class="descripcionMascota"><?php echo $publicaciones['descripcion']?> </p>
                  <strong class="botonTipo"><?php echo $publicaciones['tipoMascota']?></strong>
                </div>
            </div>

            <?php
                    $linksito = $publicaciones['direccionImg']; 
                    // echo $linksito;
                  ?>
              <script>
                document.getElementById("fondoImagen<?php echo $num; ?>").style.backgroundImage = "url('<?php echo $linksito; ?>')";
              </script>
              <?php  $num++; ?>
        <?php endforeach; ?>

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
