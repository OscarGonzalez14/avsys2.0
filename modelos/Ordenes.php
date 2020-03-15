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

public function get_rxfinal_autocomplete($id_consulta){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select p.id_paciente,p.nombres,c.id_consulta,c.oiesferasf,c.oicolindrosf,c.oiejesf,c.oiprismaf,c.oiadicionf,c.odesferasf,c.odcilindrosf,c.odejesf,c.dprismaf,c.oddicionf,c.dip,c.oddip,c.oidip,c.aood,c.aooi,c.apod,c.opoi from pacientes as p inner join consulta as c on p.id_paciente=c.id_paciente where c.id_consulta=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_consulta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
} 
 
public function get_pacientes_ordenes(){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select c.id_consulta,Date_format(c.fecha_reg,'%d/%m/%Y') as fecha,p.nombres,e.nombre from consulta as c inner join pacientes as p on p.id_paciente=c.id_paciente inner join empresas as e on p.id_empresas=e.id_empresas;";
  $sql=$conectar->prepare($sql);
  //$sql->bindValue(1,$sucursal_paciente);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function ventas_aro_orden($id_paciente){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select p.nombres,p.id_paciente,a.modelo,a.categoria,a.color,a.medidas,d.numero_venta from pacientes as p inner join detalle_ventas as d on p.id_paciente=d.id_paciente inner join producto as a on d.id_producto=a.id_producto where a.categoria='aros' and p.id_paciente=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
} 


public function ventas_aro_orden_item($numero_venta){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select d.numero_venta,p.modelo,p.categoria,p.color,p.medidas from detalle_ventas as d inner join producto as p on p.id_producto=d.id_producto where p.categoria='aros' and d.numero_venta=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_venta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}


///////////////////ORDENES VENCIDAS////////////////////
public function get_ordenes_vencidas(){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select id_orden,numero_orden,fecha, paciente,fecha, lentes, optica,sucursal,estado,timestampdiff(hour,fecha_creacion,current_timestamp)as horas,timestampdiff(hour,fecha_creacion,current_timestamp)-72 as retraso,timestampdiff(day,fecha_creacion,current_timestamp)as dias  from ordenes where estado<4 having horas >72 order by fecha DESC;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_consulta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
} 

}
