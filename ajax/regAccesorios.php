<?php
	include '../config/conn.php';

$desc_acc = $_POST["des_acc"];
$marca_acc= $_POST["marca_acc"];
$precio_acc= $_POST["precio_acc"];
$id_usuario_acc= $_POST["id_usuario_acc"];
$categoria_acc= $_POST["categoria_acc"];
$ubicacion_acc= $_POST["ubicacion_acc"];
$cat_acc= $_POST["cat_acc"];



$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO producto (modelo,marca,precio_venta,id_usuario,categoria,categoriau,descripcion) VALUES (?,?,?,?,?,?,?);";

$statement = $cnn->prepare( $sql );
	//Enlazar los parámetros de la consulta con los valores del formulario

 
$statement->bindParam(1,$desc_acc, PDO::PARAM_STR );
$statement->bindParam(2,$marca_acc, PDO::PARAM_STR);
$statement->bindParam(3,$precio_acc, PDO::PARAM_INT); 
$statement->bindParam(4,$id_usuario_acc, PDO::PARAM_STR);
$statement->bindParam(5,$categoria_acc, PDO::PARAM_STR);
$statement->bindParam(6,$ubicacion_acc, PDO::PARAM_STR);
$statement->bindParam(7,$cat_acc, PDO::PARAM_STR);



echo $statement->execute() ? header('Location: ../vistas/productos.php')
:"Error de registro"  ;


	//vaciar memoria
	$statement->closeCursor();
	$conexion = null;