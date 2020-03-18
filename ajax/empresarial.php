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
$empresarial->guardar_orden_descuento($_POST['numero_venta'],$_POST['numero_orden'],$_POST['fecha_creacion'],$_POST['aro'],$_POST['photo'],$_POST['arnti'],$_POST['lente'],$_POST['referencia_uno'],$_POST['tel_ref_uno'],$_POST['referencia_dos'],$_POST['tel_ref_dos'],$_POST['id_usuario'],$_POST['id_paciente']);
break;

}
?>