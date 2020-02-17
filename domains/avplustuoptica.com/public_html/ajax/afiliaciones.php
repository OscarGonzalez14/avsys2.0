<?php
include '../config/conn.php';

   $nombre = $_POST["nombre"];
   $dui = $_POST["dui"];
   $celular = $_POST["celular"];
   $telefono = "";
   $correo = $_POST["correo"];
   $tipo_tarjeta = $_POST["tipo_tarjeta"];
   $fecha_pagos = "";
  // $password2=$_POST["password2"];
   $n_tarjeta = $_POST["n_tarjeta"];
   $vencimiento_tar = $_POST["vencimiento_tar"];
   $codigo = "";
   $direccion = "";
   $forma_pago = "Cargo Automatico Planes";
   $lugar_trabajo = "";
   $cuota_mensal = $_POST["cuota"];
   $tipo_plan = $_POST["tipo_plan"];
   $correo = $_POST["correo"];

$conexion = new Conexion();
$cnn = $conexion->getConexion();
$sql = "INSERT INTO pacientes_afiliados (nombre,codigo,direccion,dui,tarjeta_n,fecha_vencimiento_tarjeta,tipo_tarjeta,telefono,celular,fecha_pago,forma_pago,lugar_trabajo,tipo_plan,couta_mensual,correo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

$statement = $cnn->prepare( $sql );
	//Enlazar los parámetros de la consulta con los valores del formulario

 
$statement->bindParam(1,$nombre, PDO::PARAM_STR );
$statement->bindParam(2,$codigo, PDO::PARAM_STR);
$statement->bindParam(3,$direccion, PDO::PARAM_INT); 
$statement->bindParam(4,$dui, PDO::PARAM_INT);
$statement->bindParam(5,$n_tarjeta, PDO::PARAM_STR );    
$statement->bindParam(6,$vencimiento_tar,PDO::PARAM_STR );   
$statement->bindParam(7,$tipo_tarjeta, PDO::PARAM_STR );       
$statement->bindParam(8,$telefono, PDO::PARAM_STR );
$statement->bindParam(9,$celular, PDO::PARAM_STR );    
$statement->bindParam(10,$fecha_pagos, PDO::PARAM_STR );   
$statement->bindParam(11,$forma_pago, PDO::PARAM_STR );       
$statement->bindParam(12,$lugar_trabajo, PDO::PARAM_STR );     
$statement->bindParam(13,$tipo_plan,PDO::PARAM_STR );     
$statement->bindParam(14,$cuota_mensual, PDO::PARAM_STR );    
$statement->bindParam(15,$correo, PDO::PARAM_STR );    
     


echo $statement->execute() ? header('Location: ../index.php')
:"Afiliacion registrada Exitosamente"  ;


	//vaciar memoria
	$statement->closeCursor();
	$conexion = null;



