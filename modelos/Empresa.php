<?php
require_once("../config/conexion.php");

class Empresa extends Conectar
{
	public function registrar_empresa($nombre_emp,$user_emp,$pass_emp,$direccion_emp,$nit_emp,$telefono_emp,$responsable,$correo_emp,$user_reg){

        $conectar= parent::conexion();
        parent::set_names();


        $sql="insert into empresas values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

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
        $sql->bindValue(10,"0");
        $sql->bindValue(11,"0");
        $sql->bindValue(12,"0");
        $sql->bindValue(13,"0");
        $sql->bindValue(14,"0");
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
    $sql="select id_empresas,nombre,direccion from empresas where id_empresas=?";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_empresa);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }

public function get_detalle_empresas(){
    $conectar=parent::conexion();
    parent::set_names();
    $sql="select nombre,c_canceladas,constantes,poco_constantes,irrecuperables,creditos_generales,id_empresas,abonos_realizados from empresas;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

    public function listar_pacientes_cat_a($id_empresa){

    $conectar= parent::conexion();
    //$output = array();
    $sql="select p.id_empresas,p.nombres,date_format(max(a.fecha_abono),'%d-%m-%Y') as ultimo_abono,datediff(now(), max(a.fecha_abono)) as estado,c.saldo from abonos as a inner join creditos as c on a.numero_venta=c.numero_venta inner join pacientes as p on  c.id_paciente=p.id_paciente where p.id_empresas=? and c.tipo_credito='Descuento en Planilla' group by p.id_paciente having estado<=60;";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_empresa);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }

}