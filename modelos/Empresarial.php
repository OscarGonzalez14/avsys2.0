<?php
require_once("../config/conexion.php");

class Empresarial extends Conectar
{
	////////////DEVUELVE DETALLE AROS A RECIBO INICIAL
public function get_detalle_nueva_orden($id_paciente,$venta_numero){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select p.id_paciente,p.nombres,p.dui,p.nit,p.ocupacion,p.edad,p.telefono,e.nombre,v.subtotal,v.subtotal/c.plazo as cuotas,c.plazo,c.finaliza_credito,v.numero_venta,p.correo from empresas as e inner join pacientes as p on p.id_empresas=e.id_empresas inner join ventas as v on v.id_paciente=p.id_paciente join creditos as c where c.id_paciente=v.id_paciente and p.id_paciente=? and v.numero_venta=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$venta_numero);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_detalle_aro_orden($id_paciente,$venta_numero){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select d.id_paciente,CONCAT('Mod.:',p.modelo, '-', p.marca, ' - col.', p.color) AS detalle_aro,p.categoria,d.numero_venta,d.id_producto from detalle_ventas as d inner join producto as p on d.id_producto=p.id_producto where d.id_paciente=? and d.numero_venta=? and p.categoria='aros'";
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

public function guardar_orden_descuento($numero_venta,$numero_orden,$fecha_creacion,$aro,$photo,$arnti,$lente,$id_usuario,$id_paciente,$fin_orden,$dui,$nit,$correo,$jefe_inmediato,$tel_jefe_inmediato,$cargo_jefe_inmediato,$pac_beneficiario,$pac_parentesco,$tel_ben,$direccion_parentesco,$ref_uno,$tel_ref_uno,$ref_dos,$tel_ref_dos){

  $ref_uno=$_POST["ref_uno"];
  $numero_venta=$_POST["numero_venta"];
  $id_paciente=$_POST["id_paciente"];
  
      $conectar= parent::conexion();
      parent::set_names();
      $sql="insert into desc_planilla values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
          
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["numero_venta"]);
        $sql->bindValue(2, $_POST["numero_orden"]);
        $sql->bindValue(3, $_POST["fecha_creacion"]);
        $sql->bindValue(4, $_POST["aro"]);
        $sql->bindValue(5, $_POST["photo"]);
        $sql->bindValue(6, $_POST["arnti"]);
        $sql->bindValue(7, $_POST["lente"]);
        $sql->bindValue(8, $_POST["id_usuario"]);
        $sql->bindValue(9, $_POST["id_paciente"]);
        $sql->bindValue(10, $_POST["fin_orden"]);
        $sql->bindValue(11, $_POST["dui"]);
        $sql->bindValue(12, $_POST["nit"]);
        $sql->bindValue(13, $_POST["correo"]);
        $sql->bindValue(14, $_POST["pac_beneficiario"]);
        $sql->bindValue(15, $_POST["pac_parentesco"]);
        $sql->bindValue(16, $_POST["tel_ben"]);
        $sql->bindValue(17, $_POST["direccion_parentesco"]);
        $sql->execute();

        $sql12 = "update creditos set referencia_uno=?,tel_ref_uno=?,tel_ref_dos=?,jefe_inmediato=?,tel_jefe=?,cargo_jefe=?,numero_orden=?,referencia_dos=? where numero_venta=? and id_paciente=?";


        $sql12 = $conectar->prepare($sql12);
        $sql12->bindValue(1,$ref_uno);
        $sql12->bindValue(2,$tel_ref_uno);
        $sql12->bindValue(3,$tel_ref_dos);
        $sql12->bindValue(4,$jefe_inmediato);
        $sql12->bindValue(5,$tel_jefe_inmediato);
        $sql12->bindValue(6,$cargo_jefe_inmediato);
        $sql12->bindValue(7,$numero_orden);
        $sql12->bindValue(8,$ref_dos);
        $sql12->bindValue(9,$numero_venta);
        $sql12->bindValue(10,$id_paciente);        
        $sql12->execute();


        $sql3="update detalle_ventas set numero_orden=? where numero_venta=?;";
        $sql3 = $conectar->prepare($sql3);
        $sql3->bindValue(1,$numero_orden);
        $sql3->bindValue(2,$numero_venta);
        $sql3->execute();   
        
      
}

//////////////////////GET ORDENES DE DESCUENTO DATOS
public function get_datos_ordenes_print($num_de_orden,$id_paciente){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select p.id_paciente,p.nombres,e.nombre,p.ocupacion,c.saldo,c.monto_cuota,p.ocupacion,p.dui,p.nit,p.telefono,p.edad,p.telefono_oficina,p.correo,c.fecha_adquirido,c.finaliza_credito,c.numero_orden,p.direccion,c.referencia_uno,c.tel_ref_uno,c.referencia_dos,c.tel_ref_dos,c.jefe_inmediato,c.tel_jefe,c.cargo_jefe,c.jefe_inmediato,c.tel_jefe,c.cargo_jefe from pacientes as p inner join creditos as c on c.id_paciente=p.id_paciente inner join empresas as e on p.id_empresas=e.id_empresas where  c.numero_orden=? and p.id_paciente=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$num_de_orden);
  $sql->bindValue(2,$id_paciente);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
     

//////////////////////DATOS DE SERVICIO PRESTADO
public function servicio_prestado(){
  $conectar=parent::conexion();
  parent::set_names();

  $sql=";";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$num_de_orden);
  $sql->bindValue(2,$id_paciente);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

///////////////FUNCION PARA LISTAR ORDENES DE DESCUENTO
public function get_descuentos_planilla(){
   	$conectar=parent::conexion();
   	parent::set_names();
   	$sql="select o.numero_orden,o.id_desc_planilla,o.numero_venta,p.nombres,e.nombre from desc_planilla as o inner join pacientes as p on p.id_paciente=o.id_paciente inner join empresas as e on p.id_empresas=e.id_empresas;";

   	$sql=$conectar->prepare($sql);
   	$sql->execute();
   	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function buscar_orden($id_paciente){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select numero_orden,id_paciente from desc_planilla where id_paciente=?;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->execute();

  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}
public function pacientes_orden($id_paciente){

    $conectar= parent::conexion();         
    $sql= "select *from pacientes where id_paciente=?;";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function pacientes_ultima_orden($id_paciente){

    $conectar= parent::conexion();         
    $sql= "select max(o.numero_orden)as num_order,sum(v.subtotal) from desc_planilla as o inner join ventas as v on o.id_paciente=v.id_paciente where v.tipo_pago='Descuento en Planilla' and  o.id_paciente=?;";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$id_paciente);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function ultimo_credito_empresarial($numero_orden){

    $conectar= parent::conexion();         
    $sql="select p.nombres,e.nombre,c.monto,c.saldo,c.monto-c.saldo as abonado,DATE(DATE_ADD(c.fecha_adquirido, INTERVAL  c.plazo MONTH)) as finalizacion,c.plazo-abonos as letras_abonadas,c.abonos as pendientes,c.plazo from empresas as e inner join pacientes as p on p.id_empresas=e.id_empresas inner join creditos as c on c.id_paciente=p.id_paciente where c.numero_orden=?;";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
  }

public function update_descuento_planilla(){       
//echo json_encode($_POST['arrayCompra']);
$str = '';
$detalles = array();
$detalles = json_decode($_POST['arrayUpdate_venta']);
   
$conectar=parent::conexion();
  foreach ($detalles as $k => $v) {
    //echo $v->codProd;
    //IMPORTANTE:estas variables son del array detalles
    $cantidad = $v->cantidad;
    $codProd = $v->codProd;
    $modelo = $v->modelo;
    $marca = $v->marca;
    $color = $v->color;
    $medidas = $v->medidas;
    $precio_venta = $v->precio_venta; 
    $dscto = $v->dscto;
    $importe = $v->importe;
    $id_ingreso = $v->id_ingreso;
    $categoriaub = $v->categoriaub;

    $numero_venta = $_POST["numero_venta"];
    $cod_pac = ["cod_pac"];
    $nombre_pac = $_POST["nombre_pac"];
    $tipo_pago =$_POST["tipo_pago"];
    $subtotal = $_POST["subtotal"];
    $usuario = $_POST["usuario"];
    $sucursal = $_POST["sucursal"];
    $tipo_venta = $_POST["tipo_venta"];
    $id_usuario = $_POST["id_usuario"];
    $id_paciente = $_POST["id_paciente"];

    $cuotas_anterior_add = $_POST["cuotas_anterior_add"];
    $nuevo_saldo_ad = $_POST["nuevo_saldo_ad"];
    $hasta_ord_add = $_POST["hasta_ord_add"];
    $monto_cuotas_add = $_POST["monto_cuotas_add"];
    $plazo = $_POST["plazo"];
    $numero_orden_ad = $_POST["numero_orden_ad"];    
    //$abonos = $_POST["plazo"];
    //$numero_orden = $_POST["numero_orden"];
    /*$monto_cuota = $subtotal/$plazo;
    $referencia_uno = "0";
    $tel_ref_uno = "0";
    $referencia_dos = "0";
    $tel_ref_dos = "0";
    $jefe_inmediato = "0";
    $tel_jefe = "0";
    $cargo_jefe = "0";*/

    $sql="insert into detalle_ventas values(null,?,?,?,?,?,?,?,now(),?,?);";
    $sql=$conectar->prepare($sql);

    $sql->bindValue(1,$numero_venta);
    //$sql->bindValue(2,$cod_pac);
    $sql->bindValue(2,$codProd);
    $sql->bindValue(3,$marca." ".$modelo);
    $sql->bindValue(4,$importe);
    $sql->bindValue(5,$cantidad);
    $sql->bindValue(6,$dscto);
    $sql->bindValue(7,$importe);
    $sql->bindValue(8,$id_usuario);
    $sql->bindValue(9,$id_paciente);
        
    $sql->execute();
         

    $sql11="select * from existencias where id_producto=? and bodega=? and id_ingreso=? and categoriaub=?;";
           
    $sql11=$conectar->prepare($sql11);
    $sql11->bindValue(1,$codProd);
    $sql11->bindValue(2,$sucursal);
    $sql11->bindValue(3,$id_ingreso);
    $sql11->bindValue(4,$categoriaub);
    $sql11->execute();

      $resultados = $sql11->fetchAll(PDO::FETCH_ASSOC);
                  foreach($resultados as $b=>$row){
                    $re["existencia"] = $row["stock"];
                  }
      //la cantidad total es la suma de la cantidad más la cantidad actual
      $cantidad_totales = $row["stock"] - $cantidad;

      //si existe el producto entonces actualiza el stock en producto              
      if(is_array($resultados)==true and count($resultados)>0) {                     
        $sql12 = "update existencias set stock=? where id_producto=? and bodega=? and id_ingreso=? and categoriaub=?";
      $sql12 = $conectar->prepare($sql12);
      $sql12->bindValue(1,$cantidad_totales);
      $sql12->bindValue(2,$codProd);
      $sql12->bindValue(3,$sucursal);
      $sql12->bindValue(4,$id_ingreso);
      $sql12->bindValue(5,$categoriaub);
      $sql12->execute();               
  }

}//cierre del foreach

$sql2="insert into ventas values(null,now(),?,?,?,?,?,?,?,?,?);";
           $sql2=$conectar->prepare($sql2);        
          
           $sql2->bindValue(1,$numero_venta);
           $sql2->bindValue(2,$nombre_pac);
           $sql2->bindValue(3,$usuario);       
           $sql2->bindValue(4,$subtotal);
           $sql2->bindValue(5,$tipo_pago);
           $sql2->bindValue(6,$tipo_venta);          
           $sql2->bindValue(7,$id_usuario);
           $sql2->bindValue(8,$id_paciente);
           $sql2->bindValue(9,$sucursal);
           $sql2->execute();
                     
          $sql14 = "update creditos set saldo=?,monto=?,monto_cuota=?,plazo=? where numero_orden=?";
          $sql14 = $conectar->prepare($sql14);
          $sql14->bindValue(1,$nuevo_saldo_ad);
          $sql14->bindValue(2,$nuevo_saldo_ad);
          $sql14->bindValue(3,$monto_cuotas_add);
          $sql14->bindValue(4,$hasta_ord_add);
          $sql14->bindValue(5,$numero_orden_ad);
          $sql14->execute();               
  
}

public function calculo_credito_ant($numero_orden){
    $conectar= parent::conexion();         
    $sql= "select saldo, plazo from creditos where numero_orden=?;";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_orden);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}

}
?>