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
  
?> 

<body>

    <div class="contenedorPerfil">
        <!-- ------------------- Caja 1 ------------------ -->
        <div class="contenedorPerfilCaja">
          <a href="usuario.php" class="link-gradient">Tipet <strong>BETA</strong></a>
          <div class="cerrarSesionBtn"><a href="cerrar-sesion.php">Cerrar Sesion</a></div>
        </div>
        <!-- ------------------- Caja 2 ------------------ -->
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
              

              <div class="cajaInputsPerfil"> 
                <?php if(empty($obtenerFotoPerfil)):  ?>
                  <button class="accordion">Añade tu foto de perfil</button>
                  <div class="panel">
                    <?php include 'partials/formAñadirFotoPerfil.php'; ?>  
                  </div>
                <?php endif; ?>
                
                <form class="formularioAñadirMascota" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                  <h2>Añade tus mascotas</h2>
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
                  <!-- <button class="accordion">Añade tus mascotas</button>
                  <div class="panel">
                      < ?php include 'partials/formAñadirMascota.php'; ?>
                  </div> -->
              </div>
              <!-- --------------------------------------- -->
        </div>
        <!-- ------------------- Caja 3 ------------------ -->
        <!-- ----------------- Contenido ----------------- -->
        <div class="contenedorPerfilCaja">
            <div class="contenedorFiltrar">
                <p>Tus <strong>mascotas</strong>😊</p>
                <div class="contenedorFiltrarBoton">-</div>
            </div>


            <!-- Contenido de las mascotas publicadas -->
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


        </div>

    </div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
</body>
<style>
        .cajaInputsPerfil{
            /* border:1px solid #000; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top:20px;
        }
        .cajaInputsPerfil button{
            background: #fff;
        }
        .accordion {
            /* background-color: #eee; */
            width: 80%;
            margin: 0 auto;
            
            /* color: #444; */
            cursor: pointer;
            font-weight: bold;
            padding: 18px;
            /* width: 100%; */
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
          }
          
          .active, .accordion:hover {
            font-weight: bold;
            /* border-image: linear-gradient(to top right, #B066FE, #63E2FF); */
            color: #B066FE;
            border-bottom: 2px solid transparent; 
            /* padding: 6px; */
            border-image:  linear-gradient(to top right, #B066FE, #63E2FF);
            border-image-slice: 2;
          }
          
          .panel {
            /* border:1px solid #000; */
            width: 80%;
            padding: 0 18px;
            margin: 0 auto;
            display: none;
            background-color: white;
            overflow: hidden;
          }       
          .cajaInputsPerfil .panel:nth-of-type(2) form {
            /* display: flex;
            flex-direction: column; */
          }
          .cajaInputsPerfil .panel:nth-of-type(2) input,select{
              outline: none;
          }
          .cajaInputsPerfil .panel:nth-of-type(2) input[type="text"]{
            background-color: #ecf0f1;
            width: 100%;
            border:none;
            padding: 13px 10px;
            border-radius: 10px;
            margin: 8px 0px;
          }
          .cajaInputsPerfil .panel:nth-of-type(2) input[type="date"],select{
            background-color: #ecf0f1;
            /* width: 100%; */
            padding: 7px 10px;
            border-radius: 10px;
            border:none;
          }
          .cajaInputsPerfil .panel:nth-of-type(2) label{
              display: block;
              width: 100%;
              /* margin: 20px 0px; */
          }

          .cajaInputsPerfil .panel input[type="file"]{
            padding: 10px;
            /* background-image: linear-gradient(to top right, #B066FE, #63E2FF); */
          }
          /* .cajaInputsPerfil .panel:nth-of-type(2) select{
            background-color: #ecf0f1;
            padding: 7px 10px;
            border-radius: 10px;
            border:none;  
          } */
</style>
</html>


<!-- < ?php include 'partials/footer.php';?> -->
