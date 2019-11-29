
<form class="formActualizarDesc" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
  <input type="text" name="numero" id="" maxlength="20" placeholder="Numero celular" required>
  <input type="submit" value="Añadir numero" class="botonRegistrarse" >
</form>
<?php
  if (isset($_POST["numero"])){
    $numero2 = $_POST["numero"];
    $ActuDescripcion = $obj -> AñadirNumeroUser($numero2, $_SESSION["usuario"]["id"]);
  }
?>



