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
?>

<body>
  <div class="body">
  <div class="contenedorHomeSidebar">
    <!-- ----------------------------------------------------- -->
    <!-- ----------------------------------------------------- -->
    <!-- ----------------------------------------------------- -->
    
      <div class="contenedorHomeSidebar-ContPerfil">
        <a href="perffil.html"><p class="contenedorHomeSidebar-ContPerfil-contInfo"><?php echo $_SESSION["usuario"]["nombre"]; ?></p></a>
        <!-- <a href="perffil.html"><p class="contenedorHomeSidebar-ContPerfil-contInfo">< ?php echo $_SESSION["usuario"]["email"]; ?></p></a> -->
        <div class="contenedorHomeSidebar-ContPerfil-contImgPerfil">
          <img src="../imagenes/imagenes_app/user.png" alt="">
        </div>

      </div>
    
    <!-- ----------------------------------------------------- -->
    <!-- ----------------------------------------------------- -->
    <!-- <div class="contenedorHomeSidebar-buscador"> -->
      <!-- ----------------------------------------------------- -->
    <!-- <form action="" method="post" class="contenedorHomeSidebar-buscador">
        <input type="text" name="" id="" placeholder="Buscar">
      <button type="submit" class="lupa"></button>
    </form> -->
    <!-- </div> -->
    <!-- ----------------------------------------------------- -->
    <!-- ----------------------------------------------------- -->
    <!-- ----------------------------------------------------- -->
    <h2>Tips</h2>
    <div class="contenedorHomeSidebar-ContSugerencias">
      <div class="contenedorHomeSidebar-ContSugerencias-caja">
        asds
      </div>
      <div class="contenedorHomeSidebar-ContSugerencias-caja">
        asds
      </div>
      <div class="contenedorHomeSidebar-ContSugerencias-caja">
        asds
      </div>
    </div>
    <!-- ----------------------------------------------------- -->
    <!-- ----------------------------------------------------- -->
    <!-- ----------------------------------------------------- -->
    
    <div class="configuracion">
      <div class="cajaConfiguracion">
        <img src="logo.png" alt="">
        <a href="cerrar-sesion.php" class="">Cerrar sesión</a>
      </div>
      <div class="cajaConfiguracion">

      </div>
      <div class="cajaConfiguracion">
        <!-- <img src="Imagenes/icon" alt=""> -->
        <!-- <img src="https://img.icons8.com/small/96/000000/settings-3.png"> -->
        <img src="Imagenes/icons8-configuración-3-96.png" alt="">
        <p>Configuracion</p>
      </div>
    </div>
  </div>

  <!-- ----------------------------------------------------- -->
  <!-- ----------------------------------------------------- -->
  <!-- ----------------------------------------------------- -->

  <div class="contenedorHomeContenido">
    <div class="contenedorHomeContenido-Menu">
      <a href="" class="active">Inicio</a>
      <a href="#" id="boton1">Adopción</a>
      <a href="#" id="boton2">Pareja</a>
      <a href="#" id="boton2">Perdido</a>
    </div>

<!-- -----------------------------------------------  -->
<!-- -----------------------------------------------  -->
<!-- -----------------------------------------------  -->
<div class="contenedorAviso">

    <strong>Aviso: </strong>Tipet aun sigue en desarrollo, por lo cual, la pagina puede traer errores al ejecutar ciertas funciones. Los diseños y demás estan en version de prueba. Nuevas funcionalidades y mejora en el diseño llegarán en proximas versiones. Gracias.

</div>
<div class="contenedorFormula">
  <h2>Registra tu mascota</h2>
        <form action="#" method="post">
            <input type="text" name="nombre_Mascota" id="" placeholder="Nombre de la Mascota">
            <input type="text" name="descipcion_mascota" id="" placeholder="Descripcion">
            <label for="">Fecha de nacimiento de la mascota</label>
            <input type="date" name="fecha_mascota" id="" >
            <select name="opcion">
                <option>Perdido</option>
                <option>Adopción</option>
                <option>Pareja</option>
            </select>
            <input type="text" name="raza_mascota" id="" placeholder="Ingrese la raza de la mascota">
            <input type="submit" value="Ingresar datos" class="btn border bg-success rounded text-white">
        </form>
        <!-- , $_POST["descipcion_mascota"], $_POST["fecha_mascota"]), $_POST["opcion"], $_POST["raza_mascota"] -->
        </div>
        <div class="contenedorFormula">

            <?php
            if (isset($_POST["nombre_Mascota"], $_POST["descipcion_mascota"], $_POST["fecha_mascota"], $_POST["opcion"], $_POST["raza_mascota"])){
                $nombre = $_POST["nombre_Mascota"];
                $descripcion = $_POST["descipcion_mascota"];
                $idDelUsuario = $_SESSION["usuario"]["id"];
                $fecha = $_POST["fecha_mascota"];
                $opcion = $_POST["opcion"];
                $raza = $_POST["raza_mascota"];
                $guardardatos = $obj -> guardarDatos($nombre,$descripcion,$idDelUsuario,$fecha,$opcion,$raza);
            }else{
                echo 'Por favor, complete el formulario';
            }
?>


<h2>Mascotas:</h2>
<?php foreach($publicaciones as $publicaciones):?>

<div class="contenedor">
    <h4><?php echo $publicaciones['nombreMascota']?> </h4>
    <!-- <h4>< ?php echo $publicaciones['idPublicacion']?> </h4> -->
    <br>
    <?php echo $publicaciones['descripcion']?> 
    <br>
    <?php  
      $añadir = $obj -> obtenerPublicacion($publicaciones['idPublicacion']);
    ?> 
    
    <h4>Dueño: <strong class="usuario"><?php echo $añadir[0]['nombre']?> </strong></h4>
    <br>
    <div class="tipo"><?php echo $publicaciones['tipoMascota']?> </div>
    <br>
    <?php echo $publicaciones['razaMascota']?> 
    <br>
    <!-- <a href="intento2.php?blog_id2=< ?php echo $publicaciones['idPublicacion']; ?>"> Ver mas</a> -->
</div>

<?php endforeach; ?>

    </div>

<!-- -----------------------------------------------  -->
<!-- -----------------------------------------------  -->
<!-- -----------------------------------------------  -->

  </div>
  </div>
</body>

<style>

.contenedor{
    width:90%;
    background: #fff;
    padding:10px;
    margin-top:30px;
    margin-bottom:30px;
    border-radius:20px;
}
.tipo{
    /* background: #e74c3c; */
    color: #e74c3c;
    border-radius: 20px;
    /* width:10%; */
    font-weight: bold;
}
.usuario{
    color: blue;
    border-radius: 20px;
    font-weight: bold;
}
a{
  color:#000;
}
a:hover{
  text-decoration:none;
}
.contenedorAviso{
    background-color: #e74c3c;
    color: #fff;
    padding: 10px;
    border-radius:10px
}
</style>
</html>
<!-- 
<div class="container">
	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="jumbotron">
			<div class="container text-center">
				<h1><strong>Bienvenido</strong> < ?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
				<p>Panel de control | <span class="label label-info">< ?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Admin' : 'Cliente'; ?></span></p>
				<p>
					<a href="cerrar-sesion.php" class="btn btn-primary btn-lg">Cerrar sesión</a>
				</p>
			</div>
		</div>
	</div>
</div>/.container -->


<?php include 'partials/footer.php';?>