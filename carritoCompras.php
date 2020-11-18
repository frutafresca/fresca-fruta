<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="css/styles.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
    <h3>Vista de productos</h3>

    <div align=center>


        <table class="table table-dark" style="width:600px;">

            <thead>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php foreach ($resultado_mostrar as $datos) { ?>
                    <tr style="width:600px;">
                        <td style="width:100px;"><?php echo $datos['nombre_producto'] ?></td>
                        <td style="width:100px;"><?php echo $datos['descripcion_producto'] ?></td>
                        <td style="width:300px;">
                            <form action="carritoCompras.php" method="post">
                                <input type="hidden" name="txtProducto" value="<?php echo $datos['nombre_producto'] ?>">
                                <input type="number" name="cant" style="width:50px;" min="0"><br>
                                <input type="hidden" name="txtPrecio" value="$<?php echo $datos['precio_producto'] ?>">
                                <input type="submit" value="Agregar" name="btnAgregar">
                            </form>
                        </td>

                    </tr>
            </tbody>
        <?php
                }
        ?>
        </table>

    </div>

    </div>
    
</body>

</html>