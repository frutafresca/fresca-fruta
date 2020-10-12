<?php
$host = "mysql:host=localhost;dbname=mydb";
$usuario = "root";
$contrasena = "";

try {
     //Conexion exitosa	
     $pdo = new PDO($host, $usuario, $contrasena);
} catch(PDOException $e){
     print_r('Error connection: ' . $e->getMessage());
 
     die();
}
?>