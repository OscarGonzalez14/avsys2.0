<?php
require_once("../config/conexion.php");

class Empresa extends Conectar
{
	public function registrar_empresa($nombre_emp,$user_emp,$pass_emp,$direccion_emp,$nit_emp,$telefono_emp,$responsable,$correo_emp,$user_reg){

        $conectar= parent::conexion();
        parent::set_names();

        $sql="insert into empresas values(null,?,?,?,?,?,?,?,?,?);";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["nombre_emp"]);
        $sql->bindValue(2,$_POST["user_emp"]);
        $sql->bindValue(3,$_POST["pass_emp"]);
        $sql->bindValue(4,$_POST["direccion_emp"]);
        $sql->bindValue(5,$_POST["nit_emp"]);
        $sql->bindValue(6,$_POST["telefono_emp"]);
        $sql->bindValue(7,$_POST["responsable"]);
        $sql->bindValue(8,$_POST["correo_emp"]);
        $sql->bindValue(9,$_POST["user_reg"]);
        $sql->execute();
      

        }

	public function get_empresas_en_pacientes(){

          $conectar=parent::conexion();
          parent::set_names();
          $sql="select id_empresas, nombre,direccion from empresas";
          $sql=$conectar->prepare($sql);
          $sql->execute();

          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_empresa_paciente($id_empresa){

    $conectar= parent::conexion();
    //$output = array();
    $sql="select id_empresas,nombre from empresas where id_empresas=?";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_empresa);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }      
}