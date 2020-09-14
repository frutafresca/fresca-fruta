<?php
$host = "mysql:host=localhost;dbname=mydb";
$usuario = "root";
$contrasena = "";

try {
     //Conexion exitosa	
     $pdo = new PDO($host, $usuario, $contrasena);
} catch (PDOExeception $e) { 
         
     //error Conexion
     print "Error!". $e->getMessage() ."br/>";
     die();
}
?>