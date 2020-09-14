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
if ($_POST) {
  //Captura de información
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];
$sql_inicio= "SELECT*FROM tbl_usuario WHERE correo_usu ='$correo' AND contrasena_usu='$contrasena'";
  $consulta_resta = $pdo->prepare($sql_inicio);
  $consulta_resta->execute(array($correo,$contrasena));
  $resultado=$consulta_resta->rowCount();
  $prueba=$consulta_resta->fetch(PDO::FETCH_OBJ);
  //Ingreso al sistema
  if ($resultado) {
      echo "<script> document.location.href='../dashboard/index.php';</script>";
    } else {
    echo "<script>alert('Correo y/o contraseña incorrecto, o validacion de usuario denegadas');</script>";
    
    echo "<script> document.location.href='../iniciosesion.php';</script>";
  }
}
?>
</body>
</html>