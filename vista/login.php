<?php include 'partials/head.php';?>
<!-- < ?php include 'partials/menu.php';?> -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="Estilos/normalize.css"> -->
    <link rel="stylesheet" href="assets/Estilos.css">
    <link rel="stylesheet" href="assets/Mobile.css">

</head>

<body>
    <span></span>
    <header>
        <nav class="contenedorHeader-nav">
            <div class="contenedorHeader-Img"><img src="Imagenes/logo.png" alt=""></div>
            <a href="" class="link-gradient">Tipet <strong>BETA</strong></a>
           
        </nav>
        <nav class="contenedorHeader-nav">

			<form id="loginForm" action="validarCode.php" method="POST" role="form">
					<input type="text" name="txtUsuario"  id="usuario" autofocus required placeholder="Usuario"> <!---class="form-control"-->
					<input type="password" name="txtPassword" required id="password" placeholder="Contraseña"><!-- class="form-control"  -->
					<button type="submit" class="botonRegistrarse2">Ingresar</button>
			</form>
        </nav>
    </header>
    
    <main class="center">
        <section class="contenedorInicio2  center">
 
        <section class="contenedorInicio">

            <div class="contenedorInicio-Img">
                <div class="contenedorInicio-logo-Img-contenedor"><img src="../imagenes/imagenes_app/icono_hueso.png" alt=""></div>
                <p>Busca la pareja ideal</p>
            </div>

            <div class="contenedorInicio-Img">
                <div class="contenedorInicio-logo-Img-contenedor"><img src="../imagenes/imagenes_app/icono_perro.png" alt=""></div>
                <p>Adopta</p>
            </div>

        </section>

        <section class="contenedorInicio center">

            <div class="contenedorInicio-logo-Img">
                <!-- <div class="contenedorInicio-logo-Img-contenedor2"><img src="Imagenes/logo.png" alt=""></div>   -->
                <h3>Abre una cuenta</h3>

                <!-- <div class="contenedorInicio-boton">
                    <a href="registrarse.php" class="contenedorInicio-boton-botones">Registrarse</a>
                    <a href="login.php" class="contenedorInicio-boton-botones">Inicio Sección</a>
				</div> -->
				
				<form action="registroCode.php" method="POST" role="form">
							<!-- <legend>Registro de usuarios</legend> -->
							<!-- <div class="form-group">
								<label for="nombre">Nombre</label> -->
								<br><br>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre">
							<!-- </div> -->
								<br><br>
							<!-- <div class="form-group">
								<label for="email">E-mail</label> -->
								<input type="email" name="txtEmail" class="form-control" id="email"  required placeholder="Ingresa tu dirección de e-mail">
							<!-- </div> -->
									<br><br>
							<!-- <div class="form-group">
								<label for="usuario">Usuario</label> -->
								<input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="usuario">
							<!-- </div> -->
							<br><br>
							<!-- <div class="form-group">
								<label for="password">Password</label> -->
								<input type="password" name="txtPassword" class="form-control" required id="password" placeholder="Contraseña">
							<!-- </div> -->
							<br><br>
							<button type="submit" class="botonRegistrarse2">Registrar</button>
						</form>


            </div>
        </section>

            
        </section>
    

    </main>
    <footer>
        <p>Hecho con ❤</p>
    </footer>


    <style>
        footer{
            background:#fff;
            padding:10px;
        }
        footer p{
            text-align:center;
        }
    </style>
<?php include 'partials/footer.php';?>