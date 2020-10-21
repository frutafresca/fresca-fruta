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
    ?>
    <?php
    include_once 'dao/conexion.php';
    //Mostrar los datos almacenados
    $sql_mostrar = "SELECT * FROM negocio";
    //Prepara sentencia
    $Consultar_mostrar = $pdo->prepare($sql_mostrar);
    //Ejecutar consulta
    $Consultar_mostrar->execute();
    $resultado_mostrar = $Consultar_mostrar->fetchAll();
    foreach ($resultado_mostrar as $datos) {
    ?>
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading mb-0"><?php echo $datos['nombre_negocio'] ?></h1>
                <!-- Masthead Subheading-->
                <p class="pre-wrap masthead-subheading font-weight-light mb-0"><?php echo $datos['descripcion_negocio'] ?></p>
            </div>
        </header>

        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="mb-4">Dirección</h4>
                        <p class="pre-wrap lead mb-0"> <?php echo $datos['direccion_negocio'] ?></p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="mb-4">Telefono</h4>
                        <p class="pre-wrap lead mb-0"><?php echo $datos['telefono_negocio'] ?></p>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="mb-4">Correo</h4>
                        <p class="pre-wrap lead mb-0"> <?php echo $datos['correo_negocio'] ?></p>
                    </div>
                </div>
            </div>
        </footer>
    <?php } ?>
    <!-- Copyright Section-->
    <section class="copyright py-4 text-center text-white">
        <div class="container"><small class="pre-wrap">Copyright © Your Website 2020</small></div>
    </section>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed"><a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>