<?php
$host = "mysql:host=localhost;dbname=frutafresca";
$usuario = "root";
$contrasena = "";

try {
     //Conexion exitosa	
     $pdo = new PDO($host, $usuario, $contrasena);
     $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {      
     //error Conexion
     print "Error!". $e->getMessage() ."br/>";
     die();
}
?>
