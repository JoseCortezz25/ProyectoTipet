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
  $numeroUser = $obj -> obtenerNumeroUser($_SESSION["usuario"]["id"]);
  // $obtenerNumero = $obj -> obtenerNumeros();
?> 

<body>
    <?php include 'partials/header.php'; ?>
    <div class="contenedorPerfil">

        <!-- ------------------- Caja 1 ------------------ -->
        <div class="contenedorPerfilCaja">
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
        </div>
        <!-- ------------------- Caja 2 ------------------ -->
        <!-- ----------------- Contenido ----------------- -->
        <div class="contenedorPerfilCaja2">


          <div class="contenedorFiltrar2">
            <p>Configuración del perfil</p>
          </div>
            
          <div class="contenedorConfig">
            <?php if(empty($obtenerFotoPerfil)):  ?> 
                  <p>Añade tu foto de perfil</p>
                  <?php include 'partials/formAñadirFotoPerfil.php'; ?>  
              <?php else: ?>
                  <p>Actualiza tu foto de perfil</p>
                  <?php include 'partials/formActualizarFoto.php'; ?>
              <?php endif; ?> 
          </div>
          <br>
          <div class="contenedorConfig">
         

            <?php if(empty($obtenerDesc)):  ?> 
                  <p>Añade una descripcion a tu perfil</p>
                  <?php include 'partials/formAñadirDesc.php'; ?>  
            <?php else: ?>
                  <p>Modifica la descripcion a tu perfil</p>
                  <?php include 'partials/formActualizarDesc.php'; ?>
            <?php endif; ?> 
          </div>
          <br>
          <div class="contenedorConfig">
            <!-- < ?php if(empty($obtenerDesc)):  ?> 
                  <p>Añade una descripcion a tu perfil</p>
                  < ?php include 'partials/formAñadirDesc.php'; ?>  
            < ?php else: ?> -->
                  <p>Añade un numero personal</p>
                  <?php include 'partials/formAñadirNumero.php'; ?> 
           <!--- < ?php endif; ?>  -->
          </div>

        </div>

    </div>

</body>
</html>


<!-- < ?php include 'partials/footer.php';?> -->
