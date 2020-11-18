<?php 
session_start();

if(isset($_SESSION['carrito'])){
    foreach($_SESSION['carrito'] as $indice => $arreglo){
        echo "Producto:".$indice."<br>";
        foreach($arreglo as $key => $value){
            echo $key .":".$value;

        }
    }
}else {
    echo "<script>alert('El carrito está vacío');</script>";
    echo "<script> document.location.href='carritoCompras.php';</script>";
}
?>