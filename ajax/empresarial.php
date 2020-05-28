<?php    

//llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Categorías
  require_once("../modelos/Empresarial.php");
 
  $empresarial = new Empresarial();

 switch($_GET["op"]){

    case "get_datos_orden_descuento":
    	$datos= $empresarial->get_detalle_nueva_orden($_POST["id_paciente"],$_POST["venta_numero"]);
			if(is_array($datos)==true and count($datos)>0){
				foreach($datos as $row){			

					$output["nombre"] = $row["nombre"];
					$output["nombres"] = $row["nombres"];
					$output["ocupacion"] = $row["ocupacion"];			
					$output["edad"] = $row["edad"]." "."años";
					$output["telefono"] = $row["telefono"];
					$output["subtotal"] = $row["subtotal"];
					$output["cuotas"] = number_format($row["cuotas"],2,".",",");
					$output["numero_venta"] = $row["numero_venta"];
					$output["correo"] = $row["correo"];
					$output["finaliza_credito"] = $row["finaliza_credito"];
					$output["dui"] = $row["dui"];
					$output["nit"] = $row["nit"];
					$output["telefono_oficina"] = $row["telefono_oficina"];  
		}
		      
	echo json_encode($output);
}

 break;
////CARGA LENTES MODAL PRDEN
case "get_datos_aro_orden_desc":
    $datos= $empresarial->get_detalle_aro_orden($_POST["id_paciente"],$_POST["venta_numero"]);
		if(is_array($datos)==true and count($datos)>0){
			foreach($datos as $row){
				$output["detalle_aro"] = $row["detalle_aro"];
				$output["id_producto"] = $row["id_producto"];
		      }
			echo json_encode($output);
		}
break;

case "get_datos_lente_orden_desc":
    $datos= $empresarial->get_detalle_lente_orden($_POST["id_paciente"],$_POST["venta_numero"]);
		if(is_array($datos)==true and count($datos)>0){
			foreach($datos as $row){
				$output["detalle_lente"] = $row["detalle_lente"];					
			}		      
		echo json_encode($output);
		}
break;

case "get_datos_ar_orden_desc":
    $datos= $empresarial->get_detalle_ar_orden($_POST["id_paciente"],$_POST["venta_numero"]);
		if(is_array($datos)==true and count($datos)>0){
			foreach($datos as $row){
				$output["detalle_ar"] = $row["detalle_ar"];					
			}		      
		echo json_encode($output);
		}
break;

case "get_datos_photo_orden_desc":
    $datos= $empresarial->get_detalle_photo_orden($_POST["id_paciente"],$_POST["venta_numero"]);
		if(is_array($datos)==true and count($datos)>0){
			foreach($datos as $row){
				$output["detalle_photo"] = $row["detalle_photo"];					
			}		      
		echo json_encode($output);
		}
break;  

///////////////////GET NUMERO_RECIBO*********************
case "get_numero_mumero_order":

    $datos= $empresarial->get_recibo_num_order();	

    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["num_order"] = $row["num_order"];								
		}
		      
	echo json_encode($output);
		}
break;

case "guardar_orden_desc":
$empresarial->guardar_orden_descuento($_POST['numero_venta'],$_POST['numero_orden'],$_POST['fecha_creacion'],$_POST['aro'],$_POST['photo'],$_POST['arnti'],$_POST['lente'],$_POST['id_usuario'],$_POST['id_paciente'],$_POST['fin_orden'],$_POST['dui'],$_POST['nit'],$_POST['correo'],$_POST['jefe_inmediato'],$_POST['tel_jefe_inmediato'],$_POST['cargo_jefe_inmediato'],$_POST['pac_beneficiario'],$_POST['pac_parentesco'],$_POST['tel_ben'],$_POST['ref_uno'],$_POST['tel_ref_uno'],$_POST['ref_dos'],$_POST['tel_ref_dos'],$_POST['subtotal'],$_POST['plazo']);
break;

 case "listar_ordenes_descuento":

    $datos=$empresarial->get_descuentos_planilla();

     //Vamos a declarar un array
 	 $data= Array();

     foreach($datos as $row)
      {
        $sub_array = array();       
       
        $sub_array[] = $row["numero_orden"];
        $sub_array[] = $row["nombres"];
        $sub_array[] = $row["nombre"];        

        $sub_array[] = '<button type="button" onClick="cambiarEstado();" name="estado" id="" class=""></button>';
                
        $data[] = $sub_array;
      }

      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;

case "buscar_orden":

    $datos= $empresarial->buscar_orden($_POST["id_paciente"]);
    $orden= $empresarial->pacientes_orden($_POST["id_paciente"]);
    
//$paciente= $empresarial->odern_por_paciente($_POST["id_paciente"]);
		if(is_array($datos)==true and count($datos)>0){
			foreach($orden as $row){
				$output["paciente_id"] = $row["id_paciente"];
			}
		}else{
			foreach($orden as $row){
			$output["id_paciente"] = $row["id_paciente"];
			}
		}
			
		echo json_encode($output);

     break;

    case "buscar_ultima_orden_pacientes":

    $datos= $empresarial->pacientes_ultima_orden($_POST["id_paciente"]);
    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["num_order"] = $row["num_order"];								
		}
		      
	echo json_encode($output);
		}
break;

    case "ultimo_credito_empresarial":

    $datos= $empresarial->ultimo_credito_empresarial($_POST["numero_orden"]);
    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["nombres"] = $row["nombres"];
			$output["nombre"] = $row["nombre"];
			$output["monto"] = $row["monto"];
			$output["saldo"] = $row["saldo"];
			$output["abonado"] = number_format($row["abonado"],2,".",",");
			$output["finalizacion"] = date("d/m/Y", strtotime($row["finalizacion"]));
			$output["letras_abonadas"] = $row["letras_abonadas"];
			$output["pendientes"] = $row["pendientes"];
			$output["plazo"] = $row["plazo"]." meses";
			$output["fecha_adquirido"] = date("d/m/Y", strtotime($row["fecha_adquirido"]));								
		}
		      
	echo json_encode($output);
		}
break;

case "update_descuento_planilla";
require_once('../modelos/Empresarial.php');
	$empresarial = new Empresarial();
	$empresarial->update_descuento_planilla();
break;

 case "calculo_credito_ant":

    $datos= $empresarial->calculo_credito_ant($_POST["numero_orden"]);
    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["saldo"] = $row["saldo"];
			$output["plazo"] = $row["plazo"];								
		}
		      
	echo json_encode($output);
		}
break;

case "buscar_beneficiario":
$datos=$empresarial->get_beneficiarios_venta($_POST["id_paciente"]);
	
$data= Array();

    foreach($datos as $row)

	{
		$sub_array = array();			
			
	        $sub_array[] = $row["nombres"];
			$sub_array[] = $row["encargado"];
			$sub_array[] = '<button type="button" onClick="load_beneficiarios_ventas('.$row["id_paciente"].',\''.$row["encargado"].'\');" class="btn btn-success btn-md">Agregar</button>';              
                                                
		$data[] = $sub_array;
	}

      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 	  echo json_encode($results);
break;

    case "complete_campos_beneficiario_venta":
    $datos= $empresarial->load_beneficiarios_orden($_POST["id_paciente"],$_POST["encargado"]);	

	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row)
		{					
			$output["encargado"] = $row["encargado"];
			$output["parentesco_beneficiario"] = $row["parentesco_beneficiario"];
			$output["telefono_beneficiario"] = $row["telefono_beneficiario"];
											
		}		
		      
        echo json_encode($output);
} 

break;
case "listar_descuentos_planilla_print":

	$datos=$empresarial->get_all_ordenes_print();
	$data= Array();

    foreach($datos as $row)

	{
		$sub_array = array();			
			
	       // $sub_array[] = $row["nombres"];
	        //$sub_array[] = date("d-m-Y",strtotime($row["fecha_reg"]));
			$sub_array[] = $row["nombres"];
			$sub_array[] = $row["nombre"];
			$sub_array[] = "$ ".number_format($row["monto"],2,".",",");
			$sub_array[] = "$ ".number_format($row["saldo"],2,".",",");
			            
            $sub_array[] = '<a href="imprimir_orden_desc.php?numero_orden_pac='.$row["numero_orden"].'&'.'numero_paciente='.$row["id_paciente"].'" target="_blank"><button type="button" class="btn btn-infos btn-md"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button></a>';
           
		$data[] = $sub_array;
	}

      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;

}
?>
