<?php
//Llamar a la conexion
include_once '../dao/conexion.php';
//Captura id
$id = $_GET['id_editar'];
$nombre = $_GET['nombre'];
$direccion = $_GET['direccion'];
$telefono = $_GET['telefono'];
$correo = $_GET['correo'];
$descripcion = $_GET['descripcion'];
//Sentencia sql
$sql_actualizar = "UPDATE negocio SET nombre_negocio=?,direccion_negocio=?,telefono_negocio=?,correo_negocio=?, descripcion_negocio=? WHERE idnegocio=?";
//Preparar la consulta
$consultar_actualizar = $pdo->prepare($sql_actualizar);
//Ejecutar
$consultar_actualizar->execute(array($nombre, $direccion, $telefono, $correo,$descripcion,$id));
//Redireccionar
header('location:local.php');