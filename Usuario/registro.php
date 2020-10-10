<?php
//Llamar a la conexion base de datos
include_once '../dao/conexion.php';

// mostrar los datis de la bd

$sql_mostrar = "SELECT * FROM tbl_usuario";
// preparar la sentencia 
$consulta_mostrar = $pdo->prepare($sql_mostrar);
//ejecutar la consulta 
$consulta_mostrar->execute();
$resultado_mostrar = $consulta_mostrar->fetchAll();

//Captura de información
if ($_POST) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cedula = $_POST['cedula'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $contrasena = md5($_POST['contrasena']);
  $roles = $_POST['roles'];
  //LLamo al campo cédula y verifico que no esté registrado
  $sql_restaexistente = "SELECT * FROM tbl_usuario WHERE cedula_usu='$cedula'";
  $consulta_resta = $pdo->prepare($sql_restaexistente);
  $consulta_resta->execute();
  //Filtrar
  $resultado_resta = $consulta_resta->rowCount();
  var_dump($resultado_resta);
  if ($resultado_resta) {
    echo "<script>alert('La cédula ingresada ya existe!, por favor verificala e intenta nuevamente');</script>";
  } else {
    //sentencia Sql
    $sql_insertar = "INSERT INTO tbl_usuario (nombre_usu,apellido_usu,cedula_usu,telefono_usu,correo_usu,contrasena_usu,roles_idroles)VALUES (?,?,?,?,?,?,?)";
    //Preparar consulta
    $consulta_insertar = $pdo->prepare($sql_insertar);
    //Ejecutar la sentencia
    $consulta_insertar->execute(array($nombre, $apellido, $cedula, $telefono, $correo, $contrasena,$roles));
    echo "<script>alert('Datos almacenados correctamente');</script>";
    // refrescar pagina 
    header('location:registro.php');
  }
}
?>
<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon-->
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="../js/jquery-3.5.1.js"></script>
  <script src="../js/bootstrap.js"></script>
  <link rel="stylesheet" href="../css/iniciosesion.css">
  <link rel="stylesheet" href="../css/letra1.css">
  <link rel="stylesheet" href="../css/letra2.css">
  <link href="../css/styles.css" rel="stylesheet" />
  <title>Registrarse</title>

</head>

<body style="background-color: rgb(255, 227, 203);">
  <?php require_once '../Navbar/navbar_invi.php'; ?>
  <br>
  <br>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Registro</h5>
            <form class="form-signin" method=POST>
              <div class="form-label-group">
                <input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Nombre" required autofocus>
                <label for="inputNombre">Nombre</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="inputApellido" name="apellido" class="form-control" placeholder="Apellido" required autofocus>
                <label for="inputApellido">Apellido</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="inputCedula" name="cedula" class="form-control" placeholder="Cédula" required autofocus>
                <label for="inputCedula">Cédula</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="inputTelefono" name="telefono" class="form-control" placeholder="Telefono" required autofocus>
                <label for="inputTelefono">Telefono</label>
              </div>
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="correo" class="form-control" placeholder="Correo" required autofocus>
                <label for="inputEmail">Correo</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="contrasena" class="form-control" placeholder="Contraseña" required>
                <label for="inputPassword">Contraseña</label>
              </div>
              <div class="form-label-group">
                <select name="roles" class="form-control" required autofocus>
                  <option value="">Seleccione un rol</option>
                  <option value="1">Administrador</option>
                  <option value="2">Cliente</option>
                </select>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrarse</button>
              <br>
              <div class="text-center">
                <a href="iniciar sesion.php" type="submit">
                  <p>Iniciar sesión</p>
                </a></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>

  <!-- Sección de copyright-->
  <div class="copyright py-4 text-center text-white" id="letra">
    <div class="container"><small>FrutaFresca © Tu sitio web 2020</small></div>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <!-- Contact form JS-->
  <script src="assets/mail/jqBootstrapValidation.js"></script>
  <script src="assets/mail/contact_me.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>

</body>
</html>