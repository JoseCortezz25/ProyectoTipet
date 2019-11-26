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
  <?php include 'partials/header.php'; ?>
  <div class="contenedorHome">
   
    <!-- -------------------- Columna Uno -------------------- -->
    <div class="contenedorHome-Columnas">

      <div class="Caja">
        <!-- <div class="aviso"> -->
          <!-- <p><b>Aviso:</b> Tipet sigue en version de desarrollo, lo cual puede traer problemas al momento de ejercutar ciertas funciones. Gracias.</p> -->
          <!-- <p>Para probar nuevar versiones se recomienda <b>borrar cache</b></p>
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
      <div class="Caja">
        <!-- <div class="ex3">
          <label for="item-3" class="contenedorMiniMenu"><img src="../imagenes/imagenes_app/menu.png" alt=""></label>
          <input type="checkbox" name="one" id="item">
          <div class="hide">Equation billions upon billions! Courage of our questions decipherment, take root and flourish, cosmic ocean paroxysm of global death. Light years inconspicuous motes of rock and gas from which we spring something incredible is waiting to be known,
                muse about!
          </div>
        </div> -->
      

      </div>

    </div>

    <!-- -------------------- Columna Dos -------------------- -->
    <div class="contenedorHome-Columnas">
      <div class="contenedorBienvenida">
        <div class="titulo2">
          Hey! <?php echo $_SESSION["usuario"]["nombre"]; ?>
          <br>  
          <span>¿Alguna novedad?</span>
        </div>
      </div>
      
      <div class="contenedorHome-Formulario">
      <p>hola</p>
        <?php include 'partials/formAñadirMascota.php'; ?>
        <!-- <a href="https://api.whatsapp.com/send?phone=573166226046&text=hola%20¿qué%20tal%20estás?">Mensaje</a> -->
      </div>

      <div class="contenedorPublicaciones">

        <!-- --------  Publicacion --------  -->
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
                  <p class="nombreMascota"><?php echo $publicaciones['nombreMascota'];?></p>
                  <!-- <p><?php echo $publicaciones['idPublicacion']; ?></p> -->
                  
                  <p class="descripcionMascota"><?php echo $publicaciones['descripcion']?> </p>
                  <strong class="botonTipo2"><?php echo $publicaciones['ubicacion']?></strong>
                  <?php if($publicaciones['tipoMascota'] == 'Publicacion normal'): ?>

                  <?php else: ?>
                    <div class="contenedorInferior">
                      <strong class="botonTipo"><?php echo $publicaciones['tipoMascota']?></strong>
                      

                      <?php $obtenerNumeros = $obj -> obtenerNumeros($publicaciones['idUsuario']);?> 
                        <?php if($obtenerNumeros['numero'] == 0): ?>
                        <?php else: ?> 
                          
                          <button class="accordion"><img src="../imagenes/imagenes_app/mensaje.png" alt=""></button>
                          <div class="panel">
                            <?php 
                              $mensaje = 'Hola, soy ' . $_SESSION["usuario"]["nombre"] . ' estoy interesado en ' . $publicaciones['nombreMascota'];
                            ?>
                            <a class="botonRegistrarse" href="https://api.whatsapp.com/send?phone=57<?php echo $obtenerNumeros['numero']; ?>&text=<?php echo $mensaje;?>" id="mensaje<?php echo $num; ?>">Mensaje</a> 
                          
                          </div>
                        <?php endif; ?>
                      </div>
                  <?php endif; ?>
                    
                </div>

            </div>
              <?php $linksito = $publicaciones['direccionImg']; ?>
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
  <!-- <script>
    // let idUser =  < ?php echo $_SESSION['usuario']['id'];?>
        function cargarData(id){
          let url = 'reporte.php';
          $.ajax({
            type: 'POST',
            url: url,
            data: 'id=' + id,
            // data: {
            //   'id': id, 
            //  'idUser': idUser
            // },
            success:function(response){
              alert(response)
            }
          })
        }
      
  </script> -->
</body>
  <?php include 'partials/footer.php';?>
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
</html>

                    
                    <!-- < ?php $obtenerNumeros = $obj -> obtenerNumeros($publicaciones['idUsuario']);?> 
                    <a href="https://api.whatsapp.com/send?phone=57< ?php echo $obtenerNumeros['numero']; ?>&text=hola prueba" id="mensaje<?php echo $num; ?>">Mensaje</a>  -->
                    


                    <!-- <button onclick="cargarData(< ?php echo $publicaciones['idPublicacion']; ?>)">Regresar</button> -->
                    <!-- <script>
                      function cargarData(id, idUser){
                          console.log(id)
                          console.log('-----------------')
                          console.log(idUser)
                      }
                    </script> -->

                    <!-- <div class="contenedorMenuPublicacion"> -->
                      <!-- < ?php include 'partials/MenuPublicacion.php';?> -->
                    <!-- </div> -->
