<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validando información... </title>
</head>

<body>
  <?php
  //Llamar a la conexion base de datos
  include_once '../dao/conexion.php';
  if ($_POST) {
    //Captura de información
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = md5($_POST['contrasena']);
    $sql_inicio = "SELECT*FROM tbl_usuario WHERE correo_usu ='$correo' AND contrasena_usu='$contrasena'";
    $consulta_resta = $pdo->prepare($sql_inicio);
    $consulta_resta->execute(array($correo, $contrasena));
    $resultado = $consulta_resta->rowCount();
    $prueba = $consulta_resta->fetch(PDO::FETCH_OBJ);
    //Ingreso al sistema
    if ($resultado) {
      $_SESSION["correo_usu"] = $prueba->correo_usu;
      $_SESSION["idusuario"] = $prueba->idusuario;
      $rol_prueba = $prueba->roles_idroles;
      if ($rol_prueba == 1) {
        echo "<script> document.location.href='../dashboard/index.php';</script>";
      } else {
        if ($rol_prueba == 2) {
          echo "<script> document.location.href='../comprar.php';</script>";
        } 
      }
    } else {
      echo "<script>alert('Correo y/o contraseña incorrecto');</script>";

      echo "<script> document.location.href='../Usuario/iniciar sesion.php';</script>";
    }
  }
  ?>
</body>

</html>