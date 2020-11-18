<?php
//Llamar a la conexión
include_once '../dao/conexion.php';
//Captura id
$id = $_GET['id_editar'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$cedula = $_GET['cedula'];
$telefono = $_GET['telefono'];
//Sentencia sql
$sql_actualizar = "UPDATE tbl_usuario SET nombre_usu=?,apellido_usu=?,telefono_usu=?,cedula_usu=? WHERE idusuario=?";
//Preparar la consulta
$consultar_actualizar = $pdo->prepare($sql_actualizar);
//Ejecutar
$consultar_actualizar->execute(array($nombre, $apellido, $telefono, $cedula, $id));
//Redireccionar
//Redireccionar
echo "<script>alert('Sus datos se actualizaron correctamente');</script>";

echo "<script> document.location.href='usuarios.php';</script>";