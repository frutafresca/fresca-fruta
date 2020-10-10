<?php
//Captura de imagen
$directorio = "imagenes/";

$archivo = $directorio . basename($_FILES['file']['name']);

$tipo_archivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

//Validar que es imagen
$checarsiimagen = getimagesize($_FILES['file']['tmp_name']);

//var_dump($size);

if ($checarsiimagen != false) {
    $size = $_FILES['file']['size'];
    //Validando tamano del archivo
    if ($size > 700000) {
        echo "El archivo excede el limite, debe ser menor de 700kb";
    } else {
        if ($tipo_archivo == 'jpg' || $tipo_archivo == 'jpeg' || $tipo_archivo == 'png') {
            //Se validó el archivo correctamente
            if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
                include_once 'dao/conexion.php';
                //Var_dump ($_FILES['file']);
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $tplato = $_POST['tiplato'];
                //sentencia Sql
                $sql_insertar = "INSERT INTO producto (nombre_producto,descripcion_producto,precio_producto,foto_producto,categoria_producto_idcategoria_producto)VALUES (?,?,?,?,?)";
                //Preparar consulta
                $consulta_insertar = $pdo->prepare($sql_insertar);
                //Ejecutar la sentencia
                $consulta_insertar->execute(array($nombre, $descripcion, $precio, $archivo, $tplato));
                echo "<script>alert('El registro se subió correctamente');</script>";
                echo "<script> document.location.href='../frutafresca/dashboard/edicionproductos.php';</script>";
            } else {
                echo "Ocurrió un error";
            }
        } else {
            echo "Solo se admiten archivos jpg, png y jpeg";
        }
    }
} else {
    echo "Error: el archivo no es una imagen";
}