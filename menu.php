<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Productos</title>
</head>

<body>
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
    ?>
    <?php
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
                <h2 class="page-section-heading text-secondary mb-0 d-inline-block">Productos </h2>
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
                        <u><a class="nav-link" href="#item-2">Aseo</a></u>
                        <u><a class="nav-link" href="#item-3">Granos</a></u>
                        <u><a class="nav-link" href="#item-4">Lacteos</a></u>
                        <u><a class="nav-link" href="#item-6">Carnes frias</a></u>
                    </div>
                </div>
                <center>

                    <p id="item-5"></p><br><br><br>
                    <p class="tituloplaz" align="center">Frutas</p>
                    <div class="container">
                        <div class="row">
                            <?php foreach ($resultado_mostrar as $datos) {
                                if ($datos['categoria_producto_idcategoria_producto'] == 1) {
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="item shadow mb-4">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <p class="item-title"><?php echo $datos['nombre_producto'] ?></p>
                                                </h4>
                                                <h3><?php echo $datos['descripcion_producto'] ?></h3>
                                                <div class="item-details">
                                                    <h4 class="item-price">$<?php echo $datos['precio_producto'] ?></h4>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <?php
                                                    if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) { ?>

                                                        <br>
                                                        <button class="item-button btn btn-primary addToCart" type="submit">Añadir al carrito</button>
                                                        <br>

                                                </div>
                                            <?php }
                                            ?>
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
                    <p class="tituloplaz" align="center">Verduras</p>
                    <!-- Page Content -->
                    <div class="container">
                        <div class="row">
                            <?php foreach ($resultado_mostrar as $datos) {
                                if ($datos['categoria_producto_idcategoria_producto'] == 2) {
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="item shadow mb-4">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <p class="item-title"><?php echo $datos['nombre_producto'] ?></p>
                                                </h4>
                                                <h3><?php echo $datos['descripcion_producto'] ?></h3>
                                                <div class="item-details">
                                                    <h4 class="item-price">$<?php echo $datos['precio_producto'] ?></h4>
                                                    <br>
                                                    <?php
                                                    if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) { ?>

                                                        <br>
                                                        <button class="item-button btn btn-primary addToCart" type="submit">Añadir al carrito</button>
                                                        <br>

                                                </div>
                                            <?php }
                                            ?>
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

                    <p id="item-2"></p><br><br>
                    <p align="center">Aseo</p>
                    <!-- Page Content -->
                    <!-- Page Content -->
                    <div class="container">
                        <div class="row">
                            <?php foreach ($resultado_mostrar as $datos) {
                                if ($datos['categoria_producto_idcategoria_producto'] == 3) {
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="item shadow mb-4">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <p class="item-title"><?php echo $datos['nombre_producto'] ?></p>
                                                </h4>
                                                <h3><?php echo $datos['descripcion_producto'] ?></h3>
                                                <div class="item-details">
                                                    <h4 class="item-price">$<?php echo $datos['precio_producto'] ?></h4>
                                                    <br>
                                                    <?php
                                                    if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) { ?>

                                                        <br>
                                                        <button class="item-button btn btn-primary addToCart" type="submit">Añadir al carrito</button>
                                                        <br>

                                                </div>
                                            <?php }
                                            ?>
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

                    <p id="item-3"></p><br><br>
                    <p class="tituloplaz" align="center">Granos</p>
                    <!-- Page Content -->
                    <!-- Page Content -->
                    <div class="container">
                        <div class="row">
                            <?php foreach ($resultado_mostrar as $datos) {
                                if ($datos['categoria_producto_idcategoria_producto'] == 4) {
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="item shadow mb-4">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <p class="item-title"><?php echo $datos['nombre_producto'] ?></p>
                                                </h4>
                                                <h3><?php echo $datos['descripcion_producto'] ?></h3>
                                                <div class="item-details">
                                                    <h4 class="item-price">$<?php echo $datos['precio_producto'] ?></h4>
                                                    <br>
                                                    <?php
                                                    if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) { ?>

                                                        <br>
                                                        <button class="item-button btn btn-primary addToCart" type="submit">Añadir al carrito</button>
                                                        <br>

                                                </div>
                                            <?php }
                                            ?>
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

                    <p id="item-4"></p><br><br>
                    <p align="center">Lacteos</p>
                    <!-- Page Content -->
                    <!-- Page Content -->
                    <div class="container">
                        <div class="row">
                            <?php foreach ($resultado_mostrar as $datos) {
                                if ($datos['categoria_producto_idcategoria_producto'] == 5) {
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="item shadow mb-4">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <p class="item-title"><?php echo $datos['nombre_producto'] ?></p>
                                                </h4>
                                                <h3><?php echo $datos['descripcion_producto'] ?></h3>
                                                <div class="item-details">
                                                    <h4 class="item-price">$<?php echo $datos['precio_producto'] ?></h4>
                                                    <br>
                                                    <?php
                                                    if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) { ?>

                                                        <br>
                                                        <button class="item-button btn btn-primary addToCart" type="submit">Añadir al carrito</button>
                                                        <br>

                                                </div>
                                            <?php }
                                            ?>
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

                    <p id="item-6"></p><br><br>
                    <p class="tituloplaz" align="center">Carnes frias</p>
                    <!-- Page Content -->
                    <!-- Page Content -->
                    <div class="container">
                        <div class="row">
                            <?php foreach ($resultado_mostrar as $datos) {
                                if ($datos['categoria_producto_idcategoria_producto'] == 6) {
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="item shadow mb-4">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <p class="item-title"><?php echo $datos['nombre_producto'] ?></p>
                                                </h4>
                                                <h3><?php echo $datos['descripcion_producto'] ?></h3>
                                                <div class="item-details">
                                                    <h4 class="item-price">$<?php echo $datos['precio_producto'] ?></h4>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <?php
                                                    if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) { ?>

                                                        <br>
                                                        <button class="item-button btn btn-primary addToCart" type="submit">Añadir al carrito</button>
                                                        <br>

                                                </div>
                                            <?php }
                                            ?>
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

        </div>
        <?php
        if (!isset($_SESSION["correo_usu"]) or !isset($_SESSION["idusuario"])) { ?>
            <center> Si quieres comprar debes
                <br>
                <a href="Usuario/iniciar sesion.php">
                    <button class="btn btn-primary btn-xs" type="submit">Iniciar sesion</button></a>
                <br>
                o
                <br>
                <a href="Usuario/registro.php">
                    <button class="btn btn-primary btn-xs" type="submit">Registrarse</button></a>
            </center>
        <?php }
        ?>
        <?php
        if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) { ?>

            <!-- END SECTION STORE -->
            <!-- START SECTION SHOPPING CART -->
            <section class="shopping-cart">
                <div class="container">
                    <h1 class="text-center">Carrito de compras</h1>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="shopping-cart-header">
                                <h6>Producto</h6>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="shopping-cart-header">
                                <h6 class="text-truncate">Precio</h6>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="shopping-cart-header">
                                <h6>Cantidad</h6>
                            </div>
                        </div>
                    </div>
                    <!-- ? START SHOPPING CART ITEMS -->
                    <div class="shopping-cart-items shoppingCartItemsContainer">
                    </div>
                    <!-- ? END SHOPPING CART ITEMS -->

                    <!-- START TOTAL -->
                    <div class="row">
                        <div class="col-12">
                            <div class="shopping-cart-total d-flex align-items-center">
                                <p class="mb-0">Total</p>
                                <p class="ml-4 mb-0 shoppingCartTotal">0$</p>
                                <div class="toast ml-auto bg-info" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                    <div class="toast-header">
                                        <span>✅</span>
                                        <strong class="mr-auto ml-1 text-secondary">Elemento en el carrito</strong>
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="toast-body text-white">
                                        Se aumentó correctamente la cantidad
                                    </div>
                                </div>
                                <button class="btn btn-success ml-auto comprarButton" type="button" data-toggle="modal" data-target="#comprarModal">Comprar</button>
                            </div>
                        </div>
                    </div>

                    <!-- END TOTAL -->
                <?php }
                ?>

                <!-- START MODAL COMPRA -->
                <div class="modal fade" id="comprarModal" tabindex="-1" aria-labelledby="comprarModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="comprarModalLabel">Gracias por su compra</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Pronto recibirá su pedido</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL COMPRA -->


                </div>

            </section>
            <!-- END SECTION SHOPPING CART -->
            <!-- SCRIPTS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
            <script src="tienda.js"></script>
</body>

</html