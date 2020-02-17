<?php

require_once("../config/conexion.php");

class Ordenes extends Conectar {


public function get_ordenes_metrocentro($empresa){

  $empresa=$_POST["empresa"];

  $conectar= parent::conexion();
       
  $sql= "select id_orden,numero_orden,fecha, paciente, lentes, optica,sucursal,estado,timestampdiff(hour,fecha_creacion,current_timestamp)as horas,timestampdiff(day,fecha_creacion,current_timestamp)as dias  from ordenes where optica=? and sucursal='Metrocentro' and estado<>4 order by fecha DESC;";

      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $empresa);
      $sql->execute();

      return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
      }
      

public function get_ordenes_sa($empresa){

  $empresa=$_POST["empresa"];

  $conectar= parent::conexion();
       
  $sql= "select id_orden,numero_orden,fecha, paciente, lentes, optica,sucursal,estado,timestampdiff(hour,fecha_creacion,current_timestamp)as horas,timestampdiff(day,fecha_creacion,current_timestamp)as dias  from ordenes where optica=? and sucursal='Santa Ana' order by fecha DESC;";

      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $empresa);
      $sql->execute();

      return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
      }
      
public function get_ordenes_arce($empresa){

  $empresa=$_POST["empresa"];

  $conectar= parent::conexion();
       
  $sql= "select id_orden,numero_orden,fecha, paciente, lentes, optica,sucursal,estado,timestampdiff(hour,fecha_creacion,current_timestamp)as horas,timestampdiff(day,fecha_creacion,current_timestamp)as dias  from ordenes where optica=? and sucursal='Empresarial' order by fecha DESC;";

      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $empresa);
      $sql->execute();

      return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}            
      
//listar Arce      

        public function get_orden_por_id($id_orden){

            
            $conectar= parent::conexion();
            parent::set_names();

            $sql="select * from ordenes where id_orden=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $id_orden);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

public function get_orden_completa_id($cod_orden){

        $conectar=parent::conexion();
        parent::set_names();
            
          
            $cod_orden = $_POST["cod_orden"];
            


        $sql="select * from ordenes where id_orden=?;";

    
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$cod_orden);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
public function update_estado($id_orden){

  $conectar=parent::conexion();
  parent::set_names();
  //$cod_orden = $_POST["cod_orden"];

  $sql="update ordenes set estado=1 where id_orden=?";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_orden);
  $sql->execute();

}

public function envio_a_optica($id_orden){

  $conectar=parent::conexion();
  parent::set_names();
  //$cod_orden = $_POST["cod_orden"];

  $sql="update ordenes set estado=2 where id_orden=?";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_orden);
  $sql->execute();

}


}