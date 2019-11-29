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
  $publicaciones = $obj -> obtenerPublicacionesPareja();
  $obtenerFotoPerfil = $obj -> obtenerFotoPerfil($_SESSION["usuario"]["id"]);
  $eli = $obj -> borrarPublicacion($_SESSION["usuario"]["id"]);
  
?>

  <body>
  <?php include 'partials/header.php'; ?>
  <div class="contenedorHome">
   
    <!-- -------------------- Columna Uno -------------------- -->
    <div class="contenedorHome-Columnas">

      <div class="Caja">
        <!-- <div class="aviso">
          <p><b>Aviso:</b> Tipet sigue en version de desarrollo, lo cual puede traer problemas al momento de ejercutar ciertas funciones. Gracias.</p>
        </div> -->
      </div>

      <div class="Caja">

        <a href="usuario-adopcion.php">
          <div class="CajaOpciones2">
            <p>Adopcion </p>
          </div>
        </a>
        
        <a href="usuario-perdido.php">
          <div class="CajaOpciones2">
            <p>Perdidos</p>
          </div>
        </a>

        <a href="usuario-pareja.php">
          <div class="CajaOpciones2">
            <p>Pareja</p>
          </div>
        </a>
      </div>


    </div>

    <!-- -------------------- Columna Dos -------------------- -->
    <div class="contenedorHome-Columnas">
      <div class="contenedorBienvenida">
        <div class="titulo2">
          <span> Mascotas dispuestas a buscar </span> pareja
        </div>
      </div>
      
      <!-- <div class="contenedorHome-Formulario">
        < ?php include 'partials/formAñadirMascota.php'; ?>
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
                  <p><?php echo $publicaciones['idPublicacion']; ?></p>
                  <button id="ntm" name="btnBorrar" value="">Borrar</button>
                  <p id="men">men</p>
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
      <div class="titulo1">Tips <span>de la semana</span></div>
          <div class="Caja2">
                  
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
