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
case "get_datos_aro_orden_desc":
    	$datos= $empresarial->get_detalle_aro_orden($_POST["id_paciente"],$_POST["venta_numero"]);
			if(is_array($datos)==true and count($datos)>0){
				foreach($datos as $row){			

					$output["detalle_aro"] = $row["detalle_aro"];
					
}
		      
	echo json_encode($output);
}
    break;     
}
?>
