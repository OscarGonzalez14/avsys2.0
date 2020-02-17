<?php
require_once("../config/conexion.php");

class Ordenes extends Conectar
{

public function get_detalle_ordenes(){
	$conectar = parent::conexion();
	parent::set_names();

	$sql="select*from ordenes order by id_orden DESC";
	$sql=$conectar->prepare($sql);
	$sql->execute();

	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

////////LISTAR ORDENES VENCIDAS
public function get_detalle_ordenes_vencidas(){
	$conectar = parent::conexion();
	parent::set_names();
	$sql="select id_orden,numero_orden,fecha,optica,paciente, sucursal,timestampdiff(hour,fecha_creacion,current_timestamp)as horas from ordenes having horas>72";
	$sql=$conectar->prepare($sql);
	$sql->execute();

	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
   
public function recibir_orden($id_orden){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="update ordenes set estado=4 where id_orden=?";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_orden);
  $sql->execute();
}    
 
public function rechazar_orden($id_orden){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="update ordenes set estado=3 where id_orden=?";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_orden);
  $sql->execute();
}

public function get_filas_ordenes_vencidas(){
	$conectar= parent::conexion();
         
    $sql="select id_orden,numero_orden,timestampdiff(hour,fecha_creacion,current_timestamp)as horas,timestampdiff(day,fecha_creacion,current_timestamp)as dias  from ordenes where optica='Lomed' having horas>72 order by fecha DESC;";           
    $sql=$conectar->prepare($sql);
    $sql->execute();
    $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
    return $sql->rowCount();      
}   
 

}
