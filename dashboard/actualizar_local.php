<?php
//Llamar a la conexion
include_once '../dao/conexion.php';
//Captura id
$id = $_GET['id_editar'];
$nombre = $_GET['nombre'];
$direccion = $_GET['direccion'];
$telefono = $_GET['telefono'];
$ciudad = $_GET['correo'];
//Sentencia sql
$sql_actualizar = "UPDATE negocio SET nombre_negocio=?,direccion_negocio=?,telefono_negocio=?,correo_negocio=? WHERE idnegocio=?";
//Preparar la consulta
$consultar_actualizar = $pdo->prepare($sql_actualizar);
//Ejecutar
$consultar_actualizar->execute(array($nombre, $direccion, $telefono, $ciudad,$id));
//Redireccionar
header('location:local.php');