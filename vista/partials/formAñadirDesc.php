
                    <form class="formActualizarDesc" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                      <textarea name="descipcionPerfil" cols="30" placeholder="Descripcion" rows="10" maxlength="170" require></textarea>
                      <input type="submit" value="Actualizar descripción" class="botonRegistrarse">

                    </form>
                    <?php
                      if (isset($_POST["descipcionPerfil"])){
                          $descipcionPerfil2 = $_POST["descipcionPerfil"];
                          $ActuDescripcion = $obj -> AñadirDescripcion($descipcionPerfil2, $_SESSION["usuario"]["id"]);
                            // echo 'Actualizado correctamente, recarga la pagina';
                      }
                      
                    ?>



