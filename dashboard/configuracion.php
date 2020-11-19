<?php
session_start();

if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php?id=<?php echo $_SESSION["correo_usu"]; ?>">
                        <span>Inicio</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="local.php">
                        <span>Local</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="edicionproductos.php">
                        <span>Editor de Productos</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="usuarios.php">
                        <span>Administrar usuarios</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="pedidos.php">
                        <span>Pedidos</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <footer class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <img width="80" src="#" alt="">
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <div class="topbar-divider d-none d-sm-block"></div>
                                <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    $id = $_SESSION["correo_usu"];
                                    include_once '../dao/conexion.php';
                                    $sql_inicio = "SELECT*FROM tbl_usuario WHERE correo_usu ='$id' ";
                                    $consulta_resta = $pdo->prepare($sql_inicio);
                                    $consulta_resta->execute();
                                    $resultado = $consulta_resta->rowCount();
                                    $prueba = $consulta_resta->fetch(PDO::FETCH_OBJ);
                                    //Validacion de roles
                                    if ($resultado) {
                                        $Nombre = $prueba->nombre_usu . " " . $prueba->apellido_usu;
                                    ?>
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $Nombre; ?></span>
                                    <?php } ?>
                                    <img class="img-profile rounded-circle" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/12fb29e2-0b71-4eee-b72f-a6f470cb5309/d6ad6kz-0535912e-c691-4719-8cd5-c7f6d505f2a5.jpg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="configuracion.php">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Configuración
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../Controladores/Cerrar_Sesion.php" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Cerrar sesión
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </footer>
                    <?php
                    //Captura el id del usuario a editar
                    $id1 = $_SESSION["correo_usu"];
                    include_once '../dao/conexion.php';
                    $sql_inicio1 = "SELECT*FROM tbl_usuario WHERE correo_usu ='$id1' ";
                    $consulta_resta1 = $pdo->prepare($sql_inicio1);
                    $consulta_resta1->execute();
                    $resultado1 = $consulta_resta1->rowCount(array($id1));
                    $prueba1 = $consulta_resta1->fetch(PDO::FETCH_OBJ);
                    ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                                        <div class="card card-signin my-5">
                                            <div class="card-body">
                                                <div align="center">
                                                    <!---FORMULARIO DE EDITAR-->
                                                    <h5 class="card-title text-center">Editar datos</h5>
                                                    <form action="actualizar_usuario.php" method="GET">
                                                        <input class="form-control" placeholder="Nombre" required autofocus type="text" name="nombre" value="<?php echo $prueba1->nombre_usu; ?>">
                                                        <br>
                                                        <input class="form-control" placeholder="Apellido" required type="text" name="apellido" value="<?php echo $prueba1->apellido_usu; ?>">
                                                        <br>
                                                        <input class="form-control" placeholder="Cédula" required type="number" name="cedula" value="<?php echo $prueba1->cedula_usu; ?>">
                                                        <br>
                                                        <input class="form-control" placeholder="Teléfono" required type="number" name="telefono" value="<?php echo $prueba1->telefono_usu; ?>">
                                                        <br>
                                                        <input class="form-control" placeholder="id" required type="hidden" name="id_editar" value="<?php echo $prueba1->idusuario; ?>">
                                                        <br>
                                                        <button class="btn btn-primary btn-xs" type="Submit">Editar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Fruta fresca &copy; Tu sitio 2020</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesion</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Al seleccionar cerrar sesion, finaliza la sesión</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="../Controladores/Cerrar_Sesion.php">Cerrar sesion</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

    </body>

    </html>
<?php
} else {
    echo "<script> document.location.href='dashboard/404.php';</script>";
}
?>