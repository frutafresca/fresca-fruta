<?php
session_start();
if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Administrador</title>
    <!-- Favicon-->
    <script src="js/all.js"></script>
    <link rel="stylesheet" href="css/letra1.css">
    <link rel="stylesheet" href="css/letra2.css">
    <link rel="stylesheet" href="css/estiloss.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/imagen.css">
    <link rel="stylesheet" href="css/letra.css">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top" style="background-color: #8DE525">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav" id="letra">
        <div class="container">
            <img width="120" src="" alt="">
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menú
                <i class="fas fa-bars"></i>
            </button>
            <br>
            <br>
            <a href="../index.php"><img width="160" src="http://localhost/frutafresca/img/logo.png?id=<?php echo $_SESSION["correo_usu"]; ?>" alt="tt"></a>
            <div class="collapse navbar-collapse" id="navbarResponsive" id="letra">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Inicio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="menu.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Productos</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="dashboard/usuarios.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Administrar</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Controladores/Cerrar_Sesion.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
<?php
} else {
  echo "<script> document.location.href='dashboard/404.php';</script>";
}
?>