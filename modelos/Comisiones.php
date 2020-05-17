<?php

require_once("../config/conexion.php");

class Comisiones extends Conectar{
/////////////LISTAR USUARIOS
public function listar_nombres_usuario(){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select apellidos from usuarios;";
  $sql=$conectar->prepare($sql);
  //$sql->bindValue(1,$sucursal_paciente);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}

///////////////LISTAR COMISION ASESORES
public function listar_comisiones_asesores($mes,$ano,$user_com){
  $conectar=parent::conexion();
  $mes=$_POST["mes"];
  $ano=$_POST["ano"]; 
  $fecha= ($ano."-".$mes."%");

  parent::set_names();
  $sql="select id_comision,fecha_abono,monto_abono,numero_venta,n_recibo,usuario_vendedor,comision_asesor,tipo_venta,tipo_cliente from comisiones where fecha_abono like ? and usuario_vendedor=?;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$fecha);
  $sql->bindValue(2,$user_com);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}

///////////////LISTAR COMISION OPTOMETRAS
public function listar_comisiones_optometras($mes,$ano,$user_com){
  $conectar=parent::conexion();
  $mes=$_POST["mes"];
  $ano=$_POST["ano"]; 
  $fecha= ($ano."-".$mes."%");

  parent::set_names();
  $sql="select id_comision,fecha_abono,monto_abono,numero_venta,n_recibo,usuario_optometra,comision_opto,tipo_venta,tipo_cliente from comisiones where fecha_abono like ? and usuario_optometra=?;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$fecha);
  $sql->bindValue(2,$user_com);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}

///////////////LISTAR COMISION COBROS
public function listar_comisiones_cobros($mes,$ano,$user_com){
  $conectar=parent::conexion();
  $mes=$_POST["mes"];
  $ano=$_POST["ano"]; 
  $fecha= ($ano."-".$mes."%");

  parent::set_names();
  $sql="select id_comision,fecha_abono,monto_abono,numero_venta,n_recibo,usuario_cobros,comision_cobros,tipo_venta,tipo_cliente from comisiones where fecha_abono like ? and usuario_cobros=?;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$fecha);
  $sql->bindValue(2,$user_com);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}

}


