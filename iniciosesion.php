<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/Classdiamond2/img/plazoleta/plaz25.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="css/letra1.css">
    <link rel="stylesheet" href="css/letra2.css">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="stylesheet" href="../css/letra.css">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Iniciar Sesión</title>
</head>
<body id="page-top" style="background-color: rgb(255, 227, 203);">
<?php require_once 'Navbar/navbar_invi.php'; ?>
    <!-- Navbar-->
    <!-- Navigation-->
    <?php
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      include_once 'dao/conexion.php';
      $sql_inicio= "SELECT*FROM tbl_usuario WHERE correo_usu ='$id'";
      $consulta_resta = $pdo->prepare($sql_inicio);
      $consulta_resta->execute();
      $resultado=$consulta_resta->rowCount();
      $prueba=$consulta_resta->fetch(PDO::FETCH_OBJ);
      //Validacion de roles
    if ($resultado) {
        require_once 'Navbar/navbar_admin.php';
      }
    }
  ?>

        <br>
        <br>
    <!-- Formulario inicio de sesion-->
        <div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">         
            <div class="col-md-9 col-lg-8 mx-auto">  
            <p>Bienvenidos a frutafresca, Inicio de sesion</p>            
              <form action="controlar/inicio_sesion.php" method="POST" autocomplete="off">
                <div class="form-label-group">
                  <input type="email" id="inputEmail" name="correo" class="form-control" placeholder="Correo" required autofocus>
                  <label for="inputEmail">Correo</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="contrasena" class="form-control" placeholder="Contraseña" required>
                  <label for="inputPassword">Contraseña</label>
                </div>

                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Iniciar sesión</button>
                <div class="text-center">
                <a href="..registro.php" type="submit"><p >Regístrarse ahora</p></a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- Copyright Section-->
 <div class="copyright py-4 text-center text-white" id="letra">
    <div class="container"><small>Frutafresca © Tu sitio web 2020</small></div>
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
    <div class="container-fluid">
</body>
</html>