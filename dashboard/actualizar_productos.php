<?php
//Llamar a la conexion
include_once '../dao/conexion.php';
//Captura id
$id = $_GET['id_editar'];
$nombre = $_GET['nombre'];
$descripcion = $_GET['descripcion'];
$precio = $_GET['precio'];
//Sentencia sql
$sql_actualizar = "UPDATE producto SET nombre_producto=?,descripcion_producto=?,precio_producto=? WHERE idproducto=?";
//Preparar la consulta
$consultar_actualizar = $pdo->prepare($sql_actualizar);
//Ejecutar
$consultar_actualizar->execute(array($nombre, $descripcion, $precio, $id));
//Redireccionar
header('location:edicionproductos.php');