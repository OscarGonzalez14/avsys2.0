<?php
require_once("../config/conexion.php");
class Creditos extends Conectar
{	


	public function get_pacientes_metrocentro()
	{
		$conectar=parent::conexion();
		$sql="select p.nombres,p.id_paciente,c.monto,c.id_credito,c.saldo,c.numero_venta,v.sucursal from pacientes as p inner join creditos as c on p.id_paciente=c.id_paciente join ventas as v where c.numero_venta=v.numero_venta and v.sucursal='Metrocentro'
        group by p.id_paciente order by c.id_credito desc;";
		$sql=$conectar->prepare($sql);
		$sql->execute();
		return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
	}


///////////////LISTAR CREDITOS DATATABLES COBROS EMPRESARIAL
public function get_pacientes_empresarial()
  {
    $conectar=parent::conexion();
    $sql="select p.id_paciente,c.plazo,c.id_credito,c.monto,c.saldo,p.nombres,e.nombre,p.telefono,v.tipo_pago,v.sucursal,c.numero_venta,c.id_credito from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente inner join empresas as e on e.id_empresas=p.id_empresas join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Descuento en Planilla' order by id_credito asc;
    ";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  }

public function get_pacientes_metro()
  {
    $conectar=parent::conexion();
    $sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,v.sucursal,c.numero_venta,c.id_credito from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_venta='Contado' order by id_credito asc;
    ";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_pacientes_c_automatico()
  {
    $conectar=parent::conexion();
    $sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,v.sucursal,c.numero_venta,c.id_credito from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Cargo Automatico' order by id_credito asc;
    ";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_pacientes_c_personal()
  {
    $conectar=parent::conexion();
    $sql="select p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,v.sucursal,c.numero_venta,c.id_credito from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and v.tipo_pago='Creditos Personales' order by id_credito asc;
    ";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  //////////
public function get_detalle_paciente_abonos($id_paciente){
  $conectar=parent::conexion();
  parent::set_names();
  $sql="select p.nombres,p.telefono,p.id_paciente,v.numero_venta,v.vendedor,v.sucursal,v.fecha_venta from pacientes as p inner join ventas as v on p.id_paciente=v.id_paciente where p.id_paciente=? limit 1;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

  ///////////
public function get_detalle_paciente($numero_venta){
	$conectar=parent::conexion();
	parent::set_names();
	$sql="select p.id_paciente, p.nombres, p.telefono, e.nombre,c.monto,c.plazo,c.numero_venta,c.monto,c.saldo from empresas as e inner join pacientes as p on e.id_empresas=p.id_empresas inner join creditos as c on p.id_paciente=c.id_paciente where c.numero_venta=?;";
	$sql=$conectar->prepare($sql);
	$sql->bindValue(1,$numero_venta);
	$sql->execute();
	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

//////////////////////REGISTRAR ABONOS
public function agrega_abono_pacientes(){

       
  //echo json_encode($_POST['arrayCompra']);
  $str = '';
  $abonosp = array();
  $abonosp = json_decode($_POST['array_abonos_pacientes']);


   
   $conectar=parent::conexion();


  foreach ($abonosp as $k => $v) {
      
       $abono = $v->abono;
       //$p_abono = $v->$p_abono;

       $id_credito = $_POST["id_credito"];
       $id_usuario = $_POST["id_usuario"];
       $id_paciente = $_POST["id_paciente"];
       $forma_pago = $_POST["forma_pago"];
       $p_abono = $_POST["p_abono"];
       $n_recibo = $_POST["n_recibo"];

        $sql="insert into abonos
        values(null,?,?,now(),?,?,?,?,?);";


        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$abono);
        $sql->bindValue(2,$forma_pago);
        $sql->bindValue(3,$p_abono);
        $sql->bindValue(4,$id_paciente);
        $sql->bindValue(5,$id_usuario);
        $sql->bindValue(6,$id_credito);
        $sql->bindValue(7,$n_recibo);
       
        $sql->execute();
         
        $sql3="select * from creditos where id_credito=?;";


             
             $sql3=$conectar->prepare($sql3);

             $sql3->bindValue(1,$id_credito);
             $sql3->execute();

             $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);

                  foreach($resultado as $b=>$row){

                    $re["saldo_act"] = $row["saldo"];

                  }

                //la cantidad total es la resta del stock menos la cantidad de productos vendido
                $saldo_total = $row["saldo"] - $abono;

             
               //si existe el producto entonces actualiza el stock en producto
              
               if(is_array($resultado)==true and count($resultado)>0) {
                     
                  //actualiza el stock en la tabla producto

                 $sql4 = "update creditos set 
                      
                      saldo=?
                      where 
                      id_credito=?
                 ";


                $sql4 = $conectar->prepare($sql4);
                $sql4->bindValue(1,$saldo_total);
                $sql4->bindValue(2,$id_credito);
                $sql4->execute();

               } //cierre la condicional


       }//cierre del foreach
      
}

//////////////////CARGA DETALLES DE LOS ABONOS DE CADA PACIENTE

public function get_detalle_abonos($id_paciente){

  $conectar=parent::conexion();
  parent::set_names();
  
  $sql="select p.id_paciente,a.n_recibo,p.telefono,v.vendedor,a.fecha_abono,p.nombres,e.nombre,a.monto_abono,v.tipo_pago from abonos as a inner join pacientes as p on a.id_paciente=p.id_paciente inner join empresas as e on p.id_empresas=e.id_empresas join ventas as v where a.numero_venta=v.numero_venta and v.tipo_pago='Descuento en Planilla' and p.id_paciente=?";

          //echo $sql; exit();
  $sql=$conectar->prepare($sql);            

  $sql->bindValue(1,$id_paciente);
  $sql->execute();
  $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

  $html= "
      <thead style='background-color:#A9D0F5'>
          <th>Fecha Abono</th>
          <th>Paciente</th>
          <th>Empresa</th>
          <th>Monto Abono</th>
      </thead>";           

              foreach($resultado as $row)
        {

         
$html.="<tr class='filas'>
<td>".$row['fecha_abono']."</td>
<td>".$row['nombres']."</td>
<td>".$row['nombre']."</td> 
<td>".'$ '.$row['monto_abono']."</td>";
 
  $subtotal= $subtotal+$row["monto_abono"];  //CALCULAR TOTAL ABONOS       
              
}

  $html .= "<tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                    <p style='text-align:right; border: solid 1px black'>TOTAL ABONADO:&nbsp; </p>
                                    </th>

                                    <th>

                                    <p style='text-align:right; border: solid 1px black'><strong>".$subtotal."&nbsp;</strong></p>

                                   </th> 
                                </tfoot>";
      
      echo $html;

}
///METODO PARA CARGAR DATOS DEL PACEINTE EN MODAL DE ABONOS


//METODO PARA VER SI EXISTEN ABONOS ANTERIORES
public function comprobar_abonos_ant($id_paciente,$id_credito){

  $conectar= parent::conexion();

  $sql="select a.id_abono,a.monto_abono,c.id_credito from abonos as a inner join creditos as c on a.id_credito=c.id_credito where a.id_paciente=? and a.id_credito=?;";

  $sql=$conectar->prepare($sql);

  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$id_credito);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}


public function abonos_paciente_inicial($id_paciente,$id_credito){

  $conectar = parent::conexion();

  $sql="select c.id_credito,p.id_paciente,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,
  c.numero_venta,'0' as monto_abono, now() as fecha,round((c.monto/c.plazo)+0.001,2) as abono_act from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v where v.numero_venta=c.numero_venta and p.id_paciente=? and c.id_credito=?;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$id_credito);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function abonos_paciente_numerov_idp($id_paciente,$id_credito){

  $conectar = parent::conexion();

  $sql="select a.id_abono,p.id_paciente,c.id_credito,c.monto,c.saldo,p.nombres,p.empresa,p.telefono,v.tipo_pago,c.numero_venta,a.monto_abono, now() as fecha,round((c.monto/c.plazo)+0.001,2) as abono_act from abonos as a inner join creditos as c on a.id_credito=c.id_credito inner join pacientes as p on c.id_paciente=p.id_paciente join ventas as v  where v.numero_venta=c.numero_venta and   p.id_paciente=? and c.id_credito=? order by id_abono desc limit 1;";

  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$id_paciente);
  $sql->bindValue(2,$id_credito);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

  public function detalle_credito_aros($numero_venta){

    $conectar = parent::conexion();

    $sql="select d.numero_venta,p.marca,p.modelo,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and numero_venta=? and p.categoria='aros';";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_venta);
    $sql->execute();

    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}    



  public function detalle_credito_lentes($numero_venta){

    $conectar = parent::conexion();

    $sql="select d.numero_venta,p.marca,p.modelo,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and numero_venta=? and p.categoria='lentes';";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_venta);
    $sql->execute();

    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

} 

  public function detalle_credito_ar($numero_venta){

    $conectar = parent::conexion();

    $sql="select d.numero_venta,p.marca,p.modelo,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and numero_venta=? and p.categoria='anti-reflejantes';";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_venta);
    $sql->execute();

    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

} 


public function detalle_credito_photo($numero_venta){

    $conectar = parent::conexion();

    $sql="select d.numero_venta,p.marca,p.modelo,p.color from detalle_ventas as d, producto as p where d.id_producto=p.id_producto and numero_venta=? and p.categoria='photosensibles';";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_venta);
    $sql->execute();

    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

} 

public function cobros_pacientes(){

    $conectar = parent::conexion();

    $sql="select p.nombres, p.empresa,p.telefono,a.fecha_abono,max(a.proximo_abono)as pbono,c.monto,c.saldo,datediff(now(), max(proximo_abono)) as estado from pacientes as p inner join abonos as a on p.id_paciente=a.id_paciente inner join creditos as c on c.id_credito=a.id_credito group by(p.nombres);";

          $sql=$conectar->prepare($sql);

          $sql->execute();

          return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


}


  public function comprobar_recibos_ant($n_recibo){

  $conectar= parent::conexion();

  $sql="select*from abonos where n_recibo=?;
";

  $sql=$conectar->prepare($sql);

  $sql->bindValue(1,$n_recibo);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}


public function get_total_venta($numero_venta){

    $conectar=parent::conexion();
    parent::set_names();

    $sql="select subtotal from ventas where numero_venta=?;";
    
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$numero_venta);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);             

}

}//FIN DE LA CLASE











