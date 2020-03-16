<?php
require_once("../config/conexion.php");

class Empresarial extends Conectar
{
	////////////DEVUELVE DETALLE AROS A RECIBO INICIAL
public function get_detalle_nueva_orden($id_paciente,$venta_numero){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select p.id_paciente,p.nombres,p.ocupacion,p.edad,p.telefono,e.nombre,v.subtotal,v.subtotal/c.plazo as cuotas,c.plazo,v.numero_venta,p.correo from empresas as e inner join pacientes as p on p.id_empresas=e.id_empresas inner join ventas as v on v.id_paciente=p.id_paciente join creditos as c where c.id_paciente=v.id_paciente and p.id_paciente=? and v.numero_venta=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$venta_numero);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_detalle_aro_orden($id_paciente,$venta_numero){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select d.id_paciente,CONCAT('Mod.:',p.modelo, '-', p.marca, ' - col.', p.color) AS detalle_aro,p.categoria,d.numero_venta from detalle_ventas as d inner join producto as p on d.id_producto=p.id_producto where d.id_paciente=? and d.numero_venta=?; and p.categoria='aros'";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$venta_numero);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_detalle_lente_orden($id_paciente,$venta_numero){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select d.id_paciente,p.modelo AS detalle_lente,p.categoria,d.numero_venta from detalle_ventas as d inner join producto as p on d.id_producto=p.id_producto where id_paciente=? and numero_venta=? and p.categoria='lentes';";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$venta_numero);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}


}
?>