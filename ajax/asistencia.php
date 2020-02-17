<?php

include '../config/conn.php';

$cod_emp = $_POST["codigo_emp"];
$hora = $_POST["hora"];
$fecha = $_POST["fecha"];
$tipo_reg = $_POST["tipo_reg"];
$nombre =$_POST["name"];
$ip= $_SERVER['REMOTE_ADDR'];


$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO asistencia (fecha,hora,tipo_registro,cod_empleado,Empleado,ip_client) VALUES (?,?,?,?,?,?);";

$statement = $cnn->prepare( $sql );
	//Enlazar los parámetros de la consulta con los valores del formulario

 
$statement->bindParam(1,$fecha, PDO::PARAM_STR );
$statement->bindParam(2,$hora, PDO::PARAM_STR);
$statement->bindParam(3,$tipo_reg, PDO::PARAM_STR); 
$statement->bindParam(4,$cod_emp, PDO::PARAM_STR);
$statement->bindParam(5,$nombre, PDO::PARAM_STR);
$statement->bindParam(6,$ip);    



echo $statement->execute() ? header('Location: reg_exitosa.php')
:"Asistencia Registrada Exitosamente"  ;


	//vaciar memoria
	$statement->closeCursor();
	$conexion = null;