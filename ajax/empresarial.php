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
$empresarial->guardar_orden_descuento($_POST['numero_venta'],$_POST['numero_orden'],$_POST['fecha_creacion'],$_POST['aro'],$_POST['photo'],$_POST['arnti'],$_POST['lente'],$_POST['referencia_uno'],$_POST['tel_ref_uno'],$_POST['referencia_dos'],$_POST['tel_ref_dos'],$_POST['id_usuario'],$_POST['id_paciente'],$_POST['fin_orden'],$_POST['id_aro'],$_POST['dui'],$_POST['nit'],$_POST['correo']);
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
}
?>
