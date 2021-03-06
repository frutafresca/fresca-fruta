<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>inicio</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Fonts CSS-->
    <link rel="stylesheet" href="css/heading.css">
    <link rel="stylesheet" href="css/body.css">
</head>

<body id="page-top">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        include_once 'dao/conexion.php';
        $sql_inicio = "SELECT*FROM tbl_usuario WHERE correo_usu ='$id' ";
        $consulta_resta = $pdo->prepare($sql_inicio);
        $consulta_resta->execute();
        $resultado = $consulta_resta->rowCount();
        $prueba = $consulta_resta->fetch(PDO::FETCH_OBJ);
        //Validacion de roles
        if ($resultado) {
            $rol = $prueba->roles_idroles;
            if ($rol == 1) {
                require_once 'Navbar/navbar_admin.php';
            } else if ($rol == 2) {
                require_once 'Navbar/navbar_cli.php';
            }
        }
    } else {
        require_once 'Navbar/navbar_invi.php';
    }
    include_once 'dao/conexion.php';
    //Mostrar los datos almacenados
    $sql_mostrar = "SELECT * FROM producto";
    //Prepara sentencia
    $Consultar_mostrar = $pdo->prepare($sql_mostrar);
    //Ejecutar consulta
    $Consultar_mostrar->execute();
    $resultado_mostrar = $Consultar_mostrar->fetchAll();
    //Imprimir var dump -> Arreglos u objetos
    ?>
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <div class="text-center">
                <br>
                <br>
                <h2 class="page-section-heading text-secondary mb-0 d-inline-block">Productos </h2>
            </div>
            <br>
            <center>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <b>
                            <p>Categorias</p>
                        </b>
                        <u><a class="nav-link" href="#item-5">Frutas</a></u>
                        <u><a class="nav-link" href="#item-1">Verduras</a></u>

                    </div>
                </div>

                <p id="item-5"></p><br><br><br>
                <b>
                    <p align="center">Frutas</p>
                </b>
                <p></p>

                <div class="container">
                    <div class="row">
                        <?php foreach ($resultado_mostrar as $datos) {
                            if ($datos['categoria_producto_idcategoria_producto'] == 1) {
                        ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <img class="card-img-top rounded" src="<?php echo $datos['foto_producto']; ?>" alt="">
                                            <h4 class="card-title">
                                                <p><?php echo $datos['nombre_producto'] ?></p>
                                            </h4>
                                            <p><?php echo $datos['descripcion_producto'] ?></p>
                                            <p>$<?php echo $datos['precio_producto'] ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->

                <p id="item-1"></p><br><br>
                <b>
                    <p align="center">Verduras</p>
                </b>
                <!-- Page Content -->
                <div class="container">
                    <div class="row">
                        <?php foreach ($resultado_mostrar as $datos) {
                            if ($datos['categoria_producto_idcategoria_producto'] == 2) {
                        ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <img class="card-img-top rounded" src="<?php echo $datos['foto_producto']; ?>" alt="">
                                            <h4 class="card-title">
                                                <p><?php echo $datos['nombre_producto'] ?></p>
                                            </h4>
                                            <p><?php echo $datos['descripcion_producto'] ?></p>
                                            <p>$<?php echo $datos['precio_producto'] ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <!-- /.row -->
                </div>
                
                <?php
                if (!isset($_SESSION["correo_usu"]) or !isset($_SESSION["idusuario"])) { ?>
                    <center> Si quieres comprar debes
                        <br>
                        <a href="Usuario/iniciar sesion.php">Iniciar sesion</button></a>
                        <br>
                        o
                        <br>
                        <a href="Usuario/registro.php">Registrarse</button></a>
                    </center>
                <?php }
                ?>

        </div>
</body>

</html