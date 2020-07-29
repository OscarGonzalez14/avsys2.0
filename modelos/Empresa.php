<?php
require_once("../config/conexion.php");

class Empresa extends Conectar
{
	public function registrar_empresa($nombre_emp,$user_emp,$pass_emp,$direccion_emp,$nit_emp,$telefono_emp,$responsable,$correo_emp,$user_reg){

        $conectar= parent::conexion();
        parent::set_names();


        $sql="insert into empresas values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

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
        $sql->bindValue(15,"0");
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
    $sql="select e.id_empresas,e.nombre,date_format(c.fecha_adquirido,'%d-%m-%Y')as adquirido,v.vendedor,v.optometra,v.numero_venta,p.id_paciente,v.aro,v.precio_aro,v.m_lentes,v.p_lentes,p.nombres,p.telefono,c.jefe_inmediato,c.tel_jefe,c.referencia_uno,c.referencia_uno,c.tel_ref_uno,
        c.referencia_dos,c.tel_ref_dos, p.nombres,v.subtotal,datediff(now(),max(a.fecha_abono)) as estado,c.monto/c.plazo as cuota,c.plazo,c.abonos,c.plazo-abonos as pendientes,c.monto-saldo as abonado from
        creditos as c inner join pacientes as p on p.id_paciente=c.id_paciente inner join abonos as a on c.id_paciente=a.id_paciente
        inner join ventas as v on v.id_paciente=p.id_paciente inner join empresas as e on e.id_empresas=p.id_empresas where e.id_empresas=? group by p.id_paciente having estado<60;";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_empresa);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }

  public function listar_pacientes_cat_b($id_empresa){

    $conectar= parent::conexion();
    //$output = array();
    $sql="select e.id_empresas,e.nombre,date_format(c.fecha_adquirido,'%d-%m-%Y')as adquirido,v.vendedor,v.optometra,v.numero_venta,p.id_paciente,v.aro,v.precio_aro,v.m_lentes,v.p_lentes,p.nombres,p.telefono,c.jefe_inmediato,c.tel_jefe,c.referencia_uno,c.referencia_uno,c.tel_ref_uno,
        c.referencia_dos,c.tel_ref_dos, p.nombres,v.subtotal,datediff(now(),max(a.fecha_abono)) as estado,c.monto/c.plazo as cuota,c.plazo,c.abonos,c.plazo-abonos as pendientes,c.monto-saldo as abonado from
        creditos as c inner join pacientes as p on p.id_paciente=c.id_paciente inner join abonos as a on c.id_paciente=a.id_paciente
        inner join ventas as v on v.id_paciente=p.id_paciente inner join empresas as e on e.id_empresas=p.id_empresas where e.id_empresas=? group by p.id_paciente having estado>60 and estado<90;";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_empresa);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }

    public function listar_pacientes_cat_c($id_empresa){

    $conectar= parent::conexion();
    //$output = array();
    $sql="select e.id_empresas,e.nombre,date_format(c.fecha_adquirido,'%d-%m-%Y')as adquirido,v.vendedor,v.optometra,v.numero_venta,p.id_paciente,v.aro,v.precio_aro,v.m_lentes,v.p_lentes,p.nombres,p.telefono,c.jefe_inmediato,c.tel_jefe,c.referencia_uno,c.referencia_uno,c.tel_ref_uno,
        c.referencia_dos,c.tel_ref_dos, p.nombres,v.subtotal,datediff(now(),max(a.fecha_abono)) as estado,c.monto/c.plazo as cuota,c.plazo,c.abonos,c.plazo-abonos as pendientes,c.monto-saldo as abonado from
        creditos as c inner join pacientes as p on p.id_paciente=c.id_paciente inner join abonos as a on c.id_paciente=a.id_paciente
        inner join ventas as v on v.id_paciente=p.id_paciente inner join empresas as e on e.id_empresas=p.id_empresas where e.id_empresas=? group by p.id_paciente having  estado>90;";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_empresa);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

  }

}