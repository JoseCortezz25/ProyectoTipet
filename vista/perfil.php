<?php include 'partials/head.php';?> 
 <!-- < ?php include 'datos/conexion2.php';?>  -->
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
  $obtenerDesc = $obj -> obtenerDescripcion($_SESSION["usuario"]["id"]);
?> 

<body>
    <?php include 'partials/header.php'; ?>
    <div class="contenedorPerfil">

        <!-- ------------------- Caja 1 ------------------ -->
        <div class="contenedorPerfilCaja">
          <!-- --------------------------------------- -->

          <!-- --------------------------------------- -->
            <div class="cajaFotoPerfil">
              <?php if(empty($obtenerFotoPerfil)):  
                  echo "<img src='../imagenes/imagenes_app/user.png'>";
              ?> 
              <?php else:  ?>
                  <img src="<?php echo $obtenerFotoPerfil[0]['direccion'];?>" alt="">
              <?php endif;?>
            </div>

          <!-- --------------------------------------- -->
            <div class="cajaContenidoPerfil">
              <p class="nombreUser"><a href="perfil.php"><?php echo $_SESSION["usuario"]["nombre"]; ?></a></p>

            </div>
          <!-- --------------------------------------- -->
            <div class="cajaContenidoPerfil"> 
              <p><?php echo $obtenerDesc['descripcion']; ?></p>    
            </div>
            <!-- --------------------------------------- -->

              <!-- < ?php if(empty($obtenerFotoPerfil)):  ?> 

                  < ?php include 'partials/formAñadirFotoPerfil.php'; ?>  
              < ?php else: ?>

                  < ?php include 'partials/formActualizarFoto.php'; ?>
              < ?php endif; ?>  -->


                  
              <!-- --------------------------------------- -->
        </div>
        <!-- ------------------- Caja 2 ------------------ -->
        <!-- ----------------- Contenido ----------------- -->
        <div class="contenedorPerfilCaja">


          <div class="contenedorFiltrar">
            <p>Tus <strong>mascotas</strong></p>
            <div class="contenedorFiltrarBoton">-</div>
          </div>
          <div class="contenedorOpcionesPerfil">
            <div class="opciones">Adopción</div>
            <div class="opciones">Perdidos</div>
            <div class="opciones">Pareja</div>                      
          </div>
          <!-- <div class="contenedorPublicacionesPerfil"> -->
            <?php $num =1; ?>
          <?php foreach($publicaciones as $publicaciones):?>
              <div id="fondoImagen<?php echo $num; ?>" class="contenedorPublicacion">

                  <div class="contenedorPublicacion-perfil">
                    <!-- Contenedor de perfil -->
                    <div class="contenedorPublicacion-perfil-nav">

                      <div class="contenedorPublicacion-perfil-contImg">
                        <?php  $obtenerFotoPerfilPublicacion = $obj ->  obtenerFotoPerfilPublicacion($publicaciones['idUsuario']);?>
                              <?php if(empty($obtenerFotoPerfilPublicacion)):  
                                echo "<img src='../imagenes/imagenes_app/user.png'>";
                              ?> 
                              <?php else:  ?>
                                <img src="<?php echo $obtenerFotoPerfilPublicacion['direccion'] ?>">
                              <?php endif;?>
                      </div>
                      <?php  $añadir = $obj -> obtenerPublicacion($publicaciones['idPublicacion']);?> 
                      <p><?php echo $añadir[0]['nombre']?> </p>
                      
                    </div>

                    <div class="contenedorPublicacion-perfil-nav">
                      <!-- <button onclick="cargarData(< ?php echo $publicaciones['idPublicacion']; ?>)">Regresar</button> -->
                    </div>
                    <!-- ------------------------------------------ -->
                  </div>

                  <div class="contenedorPublicacion-contenido">
                    <p class="nombreMascota"><?php echo $publicaciones['nombreMascota']?></p>
                    <!-- <p><?php echo $publicaciones['idPublicacion']; ?></p> -->
                    
                    <p class="descripcionMascota"><?php echo $publicaciones['descripcion']?> </p>
                    <?php if($publicaciones['tipoMascota'] == 'Publicacion normal'): ?>

                    <?php else: ?>
                      <strong class="botonTipo"><?php echo $publicaciones['tipoMascota']?></strong>
                    <?php endif; ?>
                  </div>

              </div>
              <?php $linksito = $publicaciones['direccionImg']; ?>
                <script>
                  document.getElementById("fondoImagen<?php echo $num; ?>").style.backgroundImage = "url('<?php echo $linksito; ?>')";
                </script>
                <?php  $num++; ?>
          <?php endforeach; ?>
          <!-- </div> -->
        </div>

    </div>

</body>
</html>


<!-- < ?php include 'partials/footer.php';?> -->
