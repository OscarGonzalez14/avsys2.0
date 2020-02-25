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

public function get_recibo_num(){

    $conectar= parent::conexion();         
    $sql= "select max(numero_recibo+1) as num_recibo from recibos where sucursal='Metrocentro'";

    $sql=$conectar->prepare($sql);
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

public function agrega_detalle_abono($num_recibo,$num_venta,$monto,$sucursal,$id_paciente,$id_usuario,$hora,$telefono,$paciente,$empresa,$cant_letras,$abono_ant,$abono_act,$saldo,$forma_pago,$marca_aro,$modelo_aro,$color_aro,$lente,$tipo_ar,$photo,$observaciones,$asesor,$prox_abono){


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

    }
    //la cantidad total es la suma de la cantidad más la cantidad actual
    $cantidad_totales = $row["saldo"] - $abono_act;             
    //si existe el producto entonces actualiza el stock en producto              
      if(is_array($resultados)==true and count($resultados)>0) {                     
                  //actualiza el stock en la tabla producto
        $sql12 = "update creditos set                       
            saldo=?
            where 
            numero_venta=?
        ";
        $sql12 = $conectar->prepare($sql12);
        $sql12->bindValue(1,$cantidad_totales);
        $sql12->bindValue(2,$num_venta);
        //$sql12->bindValue(3,$sucursal);
        $sql12->execute();               
    }//Fin del if
      
}//fin de la funcion

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





