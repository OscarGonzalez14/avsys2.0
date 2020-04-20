<?php

require_once("../config/conexion.php");


class Paciente extends Conectar
{

public function get_pacientes_consultas($sucursal_paciente){

  $conectar=parent::conexion();
  parent::set_names();

  $sql="select p.id_paciente, p.fecha_reg,p.sucursal,p.nombres,CONCAT(e.nombre,' ',e.direccion) AS nombre,p.telefono from pacientes as p inner join empresas as e on e.id_empresas=p.id_empresas where sucursal=? order by id_paciente DESC;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$sucursal_paciente);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_pacientes(){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select p.nombres,c.encargado,c.id_consulta,p.id_paciente,p.sucursal from pacientes as p inner join consulta as c on p.id_paciente=c.id_paciente ORDER BY c.id_consulta DESC;";

  $sql=$conectar->prepare($sql);
  //$sql->bindValue(1,$sucursal_paciente);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

} 

public function mostar_pacientes(){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select*from pacientes;";

  $sql=$conectar->prepare($sql);
  //$sql->bindValue(1,$sucursal_paciente);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}

public function mostar_pacientes_sin_consulta($id_paciente){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select*from pacientes where id_paciente=?;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}


public function get_pacientes_encargado($id_paciente,$id_consulta){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select p.nombres,c.encargado,c.id_consulta,p.id_paciente,p.sucursal from pacientes as p inner join consulta as c on p.id_paciente=c.id_paciente where p.id_paciente=? and c.id_consulta=?;
";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$id_consulta);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}      

public function codigo_paciente(){

    $conectar=parent::conexion();
    parent::set_names();
     
    $sql="select codigo from pacientes;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado as $k=>$v){
        $codigo["numero"]=$v["codigo"];
    }               

    if(empty($codigo["numero"]))
      {
        echo 'AV001';
    }else{
      $num     = substr($codigo["numero"] , 2);
      $dig     = $num + 1;
      $fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
      echo 'AV'.$fact;
    } 
}

  
public function registrar_paciente($codigo_paciente,$nombres,$telefono,$edad,$ocupacion,$sucursal,$dui,$correo,$id_usuario,$cod_empresa_pac,$nit,$tel_oficina,$direccion_completa){

      $conectar= parent::conexion();
      parent::set_names();
      $sql="insert into pacientes values(null,?,?,?,?,?,?,?,?,null,?,?,?,?,?);";
          
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["codigo_paciente"]);
        $sql->bindValue(2, $_POST["nombres"]);
        $sql->bindValue(3, $_POST["telefono"]);
        $sql->bindValue(4, $_POST["edad"]);
        $sql->bindValue(5, $_POST["ocupacion"]);
        $sql->bindValue(6, $_POST["sucursal"]);
        $sql->bindValue(7, $_POST["dui"]);
        $sql->bindValue(8, $_POST["correo"]);
        $sql->bindValue(9, $_POST["id_usuario"]);
        $sql->bindValue(10, $_POST["cod_empresa_pac"]);
        $sql->bindValue(11, $_POST["nit"]);
        $sql->bindValue(12, $_POST["tel_oficina"]);
        $sql->bindValue(13, $_POST["direccion_completa"]);
       // $sql->bindValue(14, $_POST["tel_oficina"]);

        $sql->execute();
      
}


  public function editar_paciente($nombres,$telefono,$edad,$dui,$ocupacion,$correo,$cod_emp,$id_paciente){


           $conectar= parent::conexion();
           parent::set_names();

           $sql="update pacientes set 
                nombres=?,
                telefono=?,
                edad=?,
                dui=?,
                ocupacion=?,
                correo=?,
                id_empresas=?                   
                where 
                id_paciente=?";

          
            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $_POST["nombres"]);
            $sql->bindValue(2, $_POST["telefono"]);
            $sql->bindValue(3, $_POST["edad"]);
            $sql->bindValue(4, $_POST["dui"]);
            $sql->bindValue(5, $_POST["ocupacion"]);
            $sql->bindValue(6, $_POST["correo"]);
            $sql->bindValue(7, $_POST["cod_emp"]);
            $sql->bindValue(8, $_POST["id_paciente"]);
            $sql->execute();
      
         
        }

public function valida_registro($telefono){
    $conectar= parent::conexion();
    parent::set_names();

    $sql="select * from pacientes where telefono=?";

    $sql=$conectar->prepare($sql);

    //$sql->bindValue(1, $correo);
    $sql->bindValue(1, $telefono);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }

public function eliminar_paciente($id_paciente)
        {

        $conectar=parent::conexion();

        $sql="delete from pacientes where id_paciente=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_paciente);
        $sql->execute();

        return $resultado=$sql->fetch(PDO::FETCH_ASSOC);   

}

 public function get_paciente_por_id($id_paciente){

    $conectar= parent::conexion();
    //$output = array();
    $sql="select p.id_paciente, p.codigo,p.fecha_reg,p.sucursal,p.nombres,e.nombre,p.telefono,p.correo,p.ocupacion,p.edad,p.dui from pacientes as p inner join empresas as e on e.id_empresas=p.id_empresas where id_paciente=?";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_paciente);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }


}




