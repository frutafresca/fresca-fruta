<?php
session_start();

if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <script src="js/all.js"></script>
        <link rel="stylesheet" href="css/letra1.css">
        <link rel="stylesheet" href="css/letra2.css">
        <link rel="stylesheet" href="css/estiloss.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/imagen.css">
        <link rel="stylesheet" href="css/letra.css">
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <title>Productos</title>
    </head>

    <body id="page-top" style="background-color: #8DE525">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav" background-color=#010304;>
            <div class="container">
                <img width="120" src="#" alt="">
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menú
                    <i class="fas fa-bars"></i>
                </button>
                <a href="../index.php"><img width="160" src="http://localhost/frutafresca/img/logo.png?id=<?php echo $_SESSION["correo_usu"]; ?>" alt="tt"></a>
                <div class="collapse navbar-collapse" id="navbarResponsive" id="letra">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Inicio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="menu.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Productos</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="comprar.php?id=<?php echo $_SESSION["correo_usu"]; ?>">Comprar</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Controladores/Cerrar_Sesion.php">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
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
                    <h2 class="page-section-heading text-secondary mb-0 d-inline-block">Productos </h2>
                </div>
                <br>
                <center>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body" style="background-color: #ffffff;">
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
                    <div class="container">
                        <div class="row">
                            <?php foreach ($resultado_mostrar as $datos) {
                                if ($datos['categoria_producto_idcategoria_producto'] == 1) {
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="item shadow mb-4">
                                            <div class="card-body" style="background-color: #ffffff;">
                                                <img class="card-img-top rounded" src="<?php echo $datos['foto_producto']; ?>" alt="">
                                                <h4 class="card-title">
                                                    <p class="item-title"><?php echo $datos['nombre_producto'] ?></p>
                                                </h4>
                                                <p><?php echo $datos['descripcion_producto'] ?></p>
                                                <div class="item-details">
                                                    <p class="item-price">$<?php echo $datos['precio_producto'] ?></p>
                                                    <br>
                                                    <?php
                                                    if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) { ?>
                                                        <center>
                                                            <br>
                                                            <button class="item-button btn btn-primary addToCart" type="submit">Añadir al carrito</button>
                                                            <br>
                                                        </center>
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
                                        <div class="item shadow mb-4">
                                            <div class="card-body" style="background-color: #ffffff;">
                                                <img class="card-img-top rounded" src="<?php echo $datos['foto_producto']; ?>" alt="">
                                                <h4 class="card-title">
                                                    <p class="item-title"><?php echo $datos['nombre_producto'] ?></p>
                                                </h4>
                                                <p><?php echo $datos['descripcion_producto'] ?></p>
                                                <div class="item-details">
                                                    <p class="item-price">$<?php echo $datos['precio_producto'] ?></p>
                                                    <br>
                                                    <?php
                                                    if (isset($_SESSION["correo_usu"]) or isset($_SESSION["idusuario"])) { ?>
                                                        <center>
                                                            <br>
                                                            <button class="item-button btn btn-primary addToCart" type="submit">Añadir al carrito</button>
                                                            <br>
                                                        </center>
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
                                        <label class="mb-0">Total</label>

                                        <p class="ml-4 mb-0 shoppingCartTotal" name="total">$0</p>
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
                                        <?php
                                        if (['total'] == 0) { ?>
                                            <button class="btn btn-success ml-auto comprarButton" type="button" data-toggle="modal" data-target="#comprarModal">Debes agregar productos</button>
                                        <?php  } else { ?>
                                            <button class="btn btn-success ml-auto comprarButton" type="button" data-toggle="modal" data-target="#comprarModal">Comprar</button>
                                        <?php  } ?>

                                    </div>
                                </div>
                            </div>

                            <!-- END TOTAL -->

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

    </html>
<?php
} else {
    echo "<script> document.location.href='dashboard/404.php';</script>";
}
?>