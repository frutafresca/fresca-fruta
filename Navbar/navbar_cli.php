<?php
session_start();
if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Invitado</title>
    <!-- Favicon-->
    <script src="../frutafresca/js/all.js"></script>
    <link rel="stylesheet" href="../frutafresca/css/letra1.css">
    <link rel="stylesheet" href="../frutafresca/css/letra2.css">
    <link rel="stylesheet" href="../frutafresca/css/estiloss.css">
    <link rel="stylesheet" href="../frutafresca/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frutafresca/css/imagen.css">
    <link rel="stylesheet" href="../frutafresca/css/letra.css">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top" style="background-color: rgb(255, 227, 203);">
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav" background-color=#010304;>
        <div class="container">
            <img width="120" src="#" alt="">
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menú
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive" id="letra">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/frutafresca/index.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Inicio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/frutafresca/menu.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Productos</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/frutafresca/productos.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Comprar</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Controladores/Cerrar_Sesion.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
<?php
} else {
  echo "<script> document.location.href='../frutafresca/dashboard/404.php';</script>";
}
?>