<header>
    <nav class="contenedorHeader-nav">
      <!-- <div class="contenedorHeader-Img"><img src="Imagenes/logo.png" alt=""></div> -->
      <!-- <a href="usuario.php" class="link-gradient">Tipet <strong>BETA </strong></a>  -->
      <a href="usuario.php" class="link-gradient">Tipet</a> 
    </nav>

    <nav class="contenedorHeader-nav">
      <!-- <a href="usuario.php">Inicio</a>-->
       <a href="perfil-config.php">Configuración</a> 
      <a href="cerrar-sesion.php" class="botonTipo2">Cerrar Sesión</a>  
      <a href="perfil.php">

        <!-- <p>< ?php echo $_SESSION["usuario"]["nombre"];?></p> -->
        <div class="Cajita-contImgMenu">
          <?php if(empty($obtenerFotoPerfil)):  
             echo "<img src='../imagenes/imagenes_app/user.png'>";
          ?> 
          <?php else:  ?>
            <img src="<?php echo $obtenerFotoPerfil[0]['direccion'];?>" alt="">
          <?php endif;?>
        </div>

      </a>

    </nav>
</header>