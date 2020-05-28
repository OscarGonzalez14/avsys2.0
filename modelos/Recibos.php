<?php

require_once("../config/conexion.php");

class Recibos extends Conectar{

public function numero_recibo(){

	$conectar=parent::conexion();
	parent::set_names();
		 
	$sql="select numero_recibo from recibos where sucursal= 'Santa Ana';";
		$sql=$conectar->prepare($sql);
	    $sql->execute();
	    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		  //aqui selecciono solo un campo del array y lo recorro que es el campo numero_venta
		foreach($resultado as $k=>$v){
		    $numero_recibo["numero"]=$v["numero_recibo"];               
		}//fin foreach
//luego despues de tener seleccionado el numero_venta digo que si el campo numero_venta està vacio entonces se le asigna un F000001 de lo contrario ira sumando
	if(empty($numero_recibo["numero"])){
		    echo '0000001';
	}else{
		$num=substr($numero_recibo["numero"] , 1);
		$dig     = $num + 1;
		$fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
		echo '0'.$fact;
		                    //echo 'F'.$new_cod;
		} 
	}

public function numero_orden(){

		    $conectar=parent::conexion();
		    parent::set_names();

		 
		    $sql="select numero_orden from ordenes;";

		    $sql=$conectar->prepare($sql);

		    $sql->execute();
		    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		       //aqui selecciono solo un campo del array y lo recorro que es el campo numero_venta
		       foreach($resultado as $k=>$v){

		                 $numero_orden["numero"]=$v["numero_orden"];

		               
		          
		             }
		          //luego despues de tener seleccionado el numero_venta digo que si el campo numero_venta està vacio entonces se le asigna un F000001 de lo contrario ira sumando

		        

		                   if(empty($numero_orden["numero"]))
		                {
		                  echo 'AV001';
		                }else
		          
		                  {
		                    $num     = substr($numero_orden["numero"] , 2);
		                    $dig     = $num + 1;
		                    $fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
		                    echo 'AV'.$fact;
		                    //echo 'F'.$new_cod;
		                  } 

		       //return $data;
	}	

public function get_numero_recibo($numero_venta){


          $conectar= parent::conexion();
	       
	      $sql= "select max(numero_recibo) as numero_recibo from recibos where numero_venta=?";

           $sql=$conectar->prepare($sql);
           $sql->bindValue(1, $numero_venta);
           $sql->execute();

           return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}

///CORRELATIVO DE RECIBO POR SUCURSAL
public function get_recibo_sucursal($sucursal){

    $conectar= parent::conexion();	       
	  $sql= "select max(numero_recibo)+1 as numero_rec from recibos where sucursal=?";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $sucursal);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function get_recibo_num($sucursal_correlativo){

    $conectar= parent::conexion();         
    $sql= "select max(numero_recibo+1) as num_recibo from recibos where sucursal=?";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $sucursal_correlativo);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}


//FUNCION PARA CARGAR DATOS EN RECIBO INICIAL

public function get_datos_pac_rec_ini($sucursal){

    $conectar= parent::conexion();
	       
	  $sql= "select v.id_ventas,v.sucursal,v.subtotal,v.numero_venta,p.nombres,p.telefono,p.id_paciente from ventas as v join pacientes as p where p.id_paciente=v.id_paciente  and v.sucursal=? order by id_ventas DESC limit 1;";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $sucursal);
    $sql->execute();

    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

}
/////COMPROBAR NUMERO DE RECIBO

public function valida_num_recibo($num_recibo){
    $conectar=parent::conexion();
    parent::set_names();

    $sql="select * from recibos where numero_recibo=?";

    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $num_recibo);
    $sql->execute();

    return $resultado=$sql->fetchAll();
}


////////FUNCION PARA REGISTAR ABONO INICIAL

public function agrega_detalle_abono($num_recibo,$num_venta,$monto,$sucursal,$id_paciente,$id_usuario,$hora,$telefono,$paciente,$empresa,$cant_letras,$abono_ant,$abono_act,$saldo,$forma_pago,$marca_aro,$modelo_aro,$color_aro,$lente,$tipo_ar,$photo,$observaciones,$asesor,$prox_abono,$id_empresa,$vendedor_com,$opto_com){

$abono_act = $_POST["abono_act"];
$conectar=parent::conexion();  

  $sql="insert into recibos values(null,?,?,?,now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $sql=$conectar->prepare($sql);

  $sql->bindValue(1,$num_recibo);
  $sql->bindValue(2,$num_venta);
  $sql->bindValue(3,$monto);
  $sql->bindValue(4,$sucursal);
  $sql->bindValue(5,$id_paciente);
  $sql->bindValue(6,$id_usuario);
  $sql->bindValue(7,$hora);
  $sql->bindValue(8,$telefono);
  $sql->bindValue(9,$paciente);
  $sql->bindValue(10,$empresa);
  $sql->bindValue(11,$cant_letras);
  $sql->bindValue(12,$abono_ant);
  $sql->bindValue(13,$abono_act);
  $sql->bindValue(14,$saldo);
  $sql->bindValue(15,$forma_pago);
  $sql->bindValue(16,$marca_aro);
  $sql->bindValue(17,$modelo_aro);
  $sql->bindValue(18,$color_aro);
  $sql->bindValue(19,$lente);
  $sql->bindValue(20,$tipo_ar);
  $sql->bindValue(21,$photo);
  $sql->bindValue(22,$observaciones);
  $sql->bindValue(23,$asesor);
  $sql->bindValue(24,$prox_abono);
  $sql->execute();

    /////////////////REGISTRAR COMISION
  $sql50="select p.id_paciente,date_format(max(a.fecha_abono),'%d-%m-%Y') as fecha_abono,a.monto_abono,datediff(now(), max(a.fecha_abono)) as estado,c.saldo from abonos as a inner join creditos as c on a.numero_venta=c.numero_venta inner join pacientes as p on  c.id_paciente=p.id_paciente where p.id_paciente=? limit 1;";
             
    $sql50=$conectar->prepare($sql50);
    $sql50->bindValue(1,$id_paciente);
    $sql50->execute();
    $comision=0;
    $resultado_est = $sql50->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultado_est as $b=>$row){
        $estado_credito = $estado_credito+$row["estado"];        

    }
  //print_r($estado_credito);exit();
  if ($estado_credito>0) {
    $comision=$abono_act*0.05;
  }else{
   $comision=0; 
  }


  
  $sql74="insert into comisiones values(null,now(),?,?,?,?,?,?,?);";
  $sql74=$conectar->prepare($sql74);
  $sql74->bindValue(1,$abono_act);
  $sql74->bindValue(2,$comision);
  $sql74->bindValue(3,$vendedor_com);
  $sql74->bindValue(4,$opto_com);
  $sql74->bindValue(5,$num_recibo);
  $sql74->bindValue(6,$num_venta);
  $sql74->bindValue(7,$id_usuario);
  $sql74->execute();

  ////////////////FIN REGISTRAR COMISION
  
  //////REGISTRAR ABONOS
  
  $sql2="insert into abonos values(null,?,?,now(),?,?,?,?,?);";
  $sql2=$conectar->prepare($sql2);
  $sql2->bindValue(1,$abono_act);
  $sql2->bindValue(2,$forma_pago);
  //$sql2->bindValue(3,$prox_abono);
  $sql2->bindValue(3,$id_paciente);
  $sql2->bindValue(4,$id_usuario);
  $sql2->bindValue(5,$num_recibo);
  $sql2->bindValue(6,$num_venta);
  $sql2->bindValue(7,$sucursal);
  $sql2->execute();



  $num_venta = $_POST["num_venta"];
  $sql11="select * from creditos where numero_venta=?;";
             
    $sql11=$conectar->prepare($sql11);
    $sql11->bindValue(1,$num_venta);
    $sql11->execute();

    $resultados = $sql11->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultados as $b=>$row){
        $re["saldo_actual"] = $row["saldo"];
        $re["abono_realizados"] = $row["abonos"];

    }
    //la cantidad total es la suma de la cantidad más la cantidad actual
    $cantidad_totales = $row["saldo"] - $abono_act;
    $abonos_pendientes = $row["abonos"]+1;             
    //si existe el producto entonces actualiza el stock en producto              
      if(is_array($resultados)==true and count($resultados)>0) {                     
                  //actualiza el stock en la tabla producto
        $sql12 = "update creditos set                       
            saldo=?,
            abonos=?
            where 
            numero_venta=?
        ";
        $sql12 = $conectar->prepare($sql12);
        $sql12->bindValue(1,$cantidad_totales);
        $sql12->bindValue(2,$abonos_pendientes);
        $sql12->bindValue(3,$num_venta);
        //$sql12->bindValue(3,$sucursal);
        $sql12->execute();               
    }//Fin del if


    //////////UPDATE CANCELADAS
    $sql33="select c.monto,c.saldo,p.id_empresas from creditos as c inner join pacientes as p on c.id_paciente=p.id_paciente where p.id_empresas=? and c.saldo=0 and c.tipo_credito='Descuento en Planilla';";
             
    $sql33=$conectar->prepare($sql33);
    $sql33->bindValue(1,$id_empresa);
    $sql33->execute();

    $resultados5 = $sql33->fetchAll(PDO::FETCH_ASSOC);

      $sum_canceladas=0;    
      foreach($resultados5 as $b=>$row){
        $sum_canceladas= $sum_canceladas+$row["monto"];

    }
                 
      if(is_array($resultados5)==true and count($resultados5)>0) {                     
                  //actualiza el stock en la tabla producto
        $sql31 = "update empresas set c_canceladas=? where id_empresas=?";
        $sql31 = $conectar->prepare($sql31);
        $sql31->bindValue(1,$sum_canceladas);
        $sql31->bindValue(2,$id_empresa);
        $sql31->execute();               
    }//Fin del if

    ////////////FIN UPDATE CANCELADAS

    //////////////UPDATE CONSTANTES
$sql34="select p.id_empresas,date_format(max(a.fecha_abono),'%d-%m-%Y') as fecha_abono,a.monto_abono,datediff(now(), max(a.fecha_abono)) as estado,c.saldo from abonos as a inner join creditos as c on a.numero_venta=c.numero_venta inner join pacientes as p on  c.id_paciente=p.id_paciente where p.id_empresas=? and c.tipo_credito='Descuento en Planilla' group by p.id_paciente having estado<=60;";
             
    $sql34=$conectar->prepare($sql34);
    $sql34->bindValue(1,$id_empresa);
    $sql34->execute();

    $resultados6 = $sql34->fetchAll(PDO::FETCH_ASSOC);

      $sum_constantes=0;    
      foreach($resultados6 as $b=>$row){
        $sum_constantes = $sum_constantes +$row["saldo"];

    }
                 
      if(is_array($resultados6)==true and count($resultados6)>0) {                     
                  //actualiza el stock en la tabla producto
        $sql31 = "update empresas set constantes=? where id_empresas=?";
        $sql31 = $conectar->prepare($sql31);
        $sql31->bindValue(1,$sum_constantes);
        $sql31->bindValue(2,$id_empresa);
        $sql31->execute();               
    }//Fin del if
    //////////FIN UPDATE CONSTANTES

    //////////////UPDATE POCOnCONSTANTES
$sql35="select p.id_empresas,date_format(max(a.fecha_abono),'%d-%m-%Y') as fecha_abono,a.monto_abono,datediff(now(), max(a.fecha_abono)) as estado,c.saldo from abonos as a inner join creditos as c on a.numero_venta=c.numero_venta inner join pacientes as p on  c.id_paciente=p.id_paciente where p.id_empresas=? and c.tipo_credito='Descuento en Planilla' group by p.id_paciente having estado>60 AND estado<90;";
             
    $sql35=$conectar->prepare($sql35);
    $sql35->bindValue(1,$id_empresa);
    $sql35->execute();

    $resultados7 = $sql35->fetchAll(PDO::FETCH_ASSOC);

      $poco_constantes=0;    
      foreach($resultados7 as $b=>$row){
        $poco_constantes = $poco_constantes +$row["saldo"];

    }
                 
      if(is_array($resultados7)==true and count($resultados7)>0) {                     
                  //actualiza el stock en la tabla producto
        $sql36 = "update empresas set poco_constantes=? where id_empresas=?";
        $sql36 = $conectar->prepare($sql36);
        $sql36->bindValue(1,$poco_constantes);
        $sql36->bindValue(2,$id_empresa);
        $sql36->execute();               
    }//Fin del if
    //////////FIN UPDATE CONSTANTES

    //////////////UPDATE IRRECUPERABLES
$sql37="select p.id_empresas,date_format(max(a.fecha_abono),'%d-%m-%Y') as fecha_abono,a.monto_abono,datediff(now(), max(a.fecha_abono)) as estado,c.saldo from abonos as a inner join creditos as c on a.numero_venta=c.numero_venta inner join pacientes as p on  c.id_paciente=p.id_paciente where p.id_empresas=? and c.tipo_credito='Descuento en Planilla' group by p.id_paciente having estado>90;";
             
    $sql37=$conectar->prepare($sql37);
    $sql37->bindValue(1,$id_empresa);
    $sql37->execute();

    $resultados8 = $sql37->fetchAll(PDO::FETCH_ASSOC);

      $irrecuperables=0;    
      foreach($resultados8 as $b=>$row){
        $irrecuperables= $irrecuperables +$row["saldo"];

    }
                 
      if(is_array($resultados8)==true and count($resultados8)>0) {                     
        //actualiza el stock en la tabla producto
        $sql38 = "update empresas set irrecuperables=? where id_empresas=?";
        $sql38 = $conectar->prepare($sql38);
        $sql38->bindValue(1,$irrecuperables);
        $sql38->bindValue(2,$id_empresa);
        $sql38->execute();               
    }//Fin del if
    //////////FIN UPDATE CONSTANTES

 ////////////ABONOS REALIZADOS
 $sql39="select a.monto_abono,p.id_empresas,c.saldo from abonos as a inner join pacientes as  p on a.id_paciente=p.id_paciente inner join creditos as c on c.numero_venta=a.numero_venta where c.saldo>0 and p.id_empresas=?;";
             
    $sql39=$conectar->prepare($sql39);
    $sql39->bindValue(1,$id_empresa);
    $sql39->execute();

    $resultados9 = $sql39->fetchAll(PDO::FETCH_ASSOC);

      $abono_realizados=0;    
      foreach($resultados9 as $b=>$row){
        $abono_realizados= $abono_realizados + $row["monto_abono"];

    }
                 
      if(is_array($resultados9) == true and count($resultados9)>0) {                     
        //actualiza el stock en la tabla producto
        $sql40 = "update empresas set abonos_realizados=? where id_empresas=?";
        $sql40 = $conectar->prepare($sql40);
        $sql40->bindValue(1,$abono_realizados);
        $sql40->bindValue(2,$id_empresa);
        $sql40->execute();               
    }//Fin del if
 /////////FIN ABONOS REALIZADOS   
      
}//FIN FUNCTION REGISTRA ABONOS

public function get_recibos_print(){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select*from recibos order by id_recibo DESC limit 5;";
  $sql=$conectar->prepare($sql);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
public function get_recibo_id($numero_venta){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select*from recibos where numero_venta=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_venta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

////CARGAR DATOS DE PACIENTE EN RECIBO

public function get_detalle_recibo_paciente($numero_venta){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select e.nombre,p.nombres,p.telefono,r.numero_venta,r.numero_recibo,r.cant_letras,r.monto,r.a_anteriores,r.abono_act,r.saldo,r.forma_pago,r.asesor,r.id_usuario,r.prox_abono,r.marca_aro,r.modelo_aro,r.color_aro from pacientes as p inner join recibos as r on p.id_paciente=r.id_paciente inner join empresas as e on p.id_empresas=e.id_empresas where numero_venta=? order by r.numero_recibo desc limit 1;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_venta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function print_recibo_paciente($numero_recibo_pac){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select e.nombre,p.nombres,p.telefono,r.numero_venta,r.numero_recibo,r.cant_letras,r.monto,r.a_anteriores,r.abono_act,r.saldo,r.forma_pago,r.asesor,r.id_usuario,r.prox_abono,r.marca_aro,r.modelo_aro,r.color_aro,r.lente from pacientes as p inner join recibos as r on p.id_paciente=r.id_paciente inner join empresas as e on p.id_empresas=e.id_empresas where r.numero_recibo=? order by r.numero_recibo desc limit 1;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_recibo_pac);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
////////////DEVUELVE DETALLE AROS A RECIBO INICIAL
public function get_detalle_aros_rec_ini($numero_venta){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select p.marca,p.color,p.modelo,p.categoria,d.id_producto,d.numero_venta from producto as p join detalle_ventas as d where p.id_producto=d.id_producto and d.numero_venta=? and categoria='aros';";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_venta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
/////////////DEVUELVE ABONO ANTERIOR

public function get_detalle_abono_anterior($numero_venta){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select monto_abono as abono_anterior,numero_venta from abonos where numero_venta=? order by id_abono DESC limit 1;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_venta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_detalle_letra_abono($numero_venta){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select monto as monto_credito,monto/plazo as cuota_mensual,saldo-(monto/plazo) as saldo_actual, numero_venta from creditos where numero_venta=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_venta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
public function get_detalle_lentes_rec_ini($numero_venta){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select p.id_producto,p.modelo as dis_lente,p.categoria,v.numero_venta from detalle_ventas as v inner join producto as p on p.id_producto=v.id_producto where v.numero_venta=? and p.categoria='lentes';";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_venta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_detalle_venta($numero_venta){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="select*from ventas where numero_venta=?;";
  $sql=$conectar->prepare($sql);
  $sql->bindValue(1,$numero_venta);
  $sql->execute();
  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}



}





