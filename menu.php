<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <p class="pplaz"></p>

            <div class="container">
                <div class="row">
                    <?php foreach ($resultado_mostrar as $datos) {
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
                    ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
</body>

</html