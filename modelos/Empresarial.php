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
  $sql="select d.id_paciente,CONCAT('Mod.:',p.modelo, '-', p.marca, ' - col.', p.color) AS detalle_aro,p.categoria,d.numero_venta from detalle_ventas as d inner join producto as p on d.id_producto=p.id_producto where d.id_paciente=? and d.numero_venta=? and p.categoria='aros'";
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
public function get_detalle_ar_orden($id_paciente,$venta_numero){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select d.id_paciente,p.modelo AS detalle_ar,p.categoria,d.numero_venta from detalle_ventas as d inner join producto as p on d.id_producto=p.id_producto where id_paciente=? and numero_venta=? and p.categoria='anti-reflejantes';";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$venta_numero);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
public function get_detalle_photo_orden($id_paciente,$venta_numero){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select d.id_paciente,p.modelo AS detalle_photo,p.categoria,d.numero_venta from detalle_ventas as d inner join producto as p on d.id_producto=p.id_producto where id_paciente=? and numero_venta=? and p.categoria='photosensibles';";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$venta_numero);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
////////////////GET NUMERO ORDENES DE DESCUENTO

public function get_recibo_num_order(){

    $conectar= parent::conexion();         
    $sql= "select max(numero_orden+1) as num_order from desc_planilla;";

    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function guardar_orden_descuento($numero_venta,$numero_orden,$fecha_creacion,$aro,$photo,$arnti,$lente,$referencia_uno,$tel_ref_uno,$referencia_dos,$tel_ref_dos,$id_usuario,$id_paciente){

      $conectar= parent::conexion();
      parent::set_names();
      $sql="insert into desc_planilla values(null,?,?,?,?,?,?,?,?,?,?,?,?,?);";
          
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["numero_venta"]);
        $sql->bindValue(2, $_POST["numero_orden"]);
        $sql->bindValue(3, $_POST["fecha_creacion"]);
        $sql->bindValue(4, $_POST["aro"]);
        $sql->bindValue(5, $_POST["photo"]);
        $sql->bindValue(6, $_POST["arnti"]);
        $sql->bindValue(7, $_POST["lente"]);
        $sql->bindValue(8, $_POST["referencia_uno"]);
        $sql->bindValue(9, $_POST["tel_ref_uno"]);
        $sql->bindValue(10, $_POST["referencia_dos"]);
        $sql->bindValue(11, $_POST["tel_ref_dos"]);
        $sql->bindValue(12, $_POST["id_usuario"]);
        $sql->bindValue(13, $_POST["id_paciente"]);
        $sql->execute();
      
}

}
?>