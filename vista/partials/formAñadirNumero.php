
                    <form class="formActualizarDesc" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                      <!-- <textarea name="descipcionPerfil" cols="30" placeholder="Descripcion" rows="10" maxlength="170" require></textarea> -->
                      <input type="text" name="numero" id="" maxlength="20" placeholder="Numero celular" required>
                      <input type="submit" value="Actualizar descripción" class="botonRegistrarse" >

                    </form>
                    <?php
                      if (isset($_POST["numero"])){
                          $numero2 = $_POST["numero"];
                          $ActuDescripcion = $obj -> AñadirDescripcion($numero2, $_SESSION["usuario"]["id"]);
                            // echo 'Actualizado correctamente, recarga la pagina';
                      }
                      
                    ?>



