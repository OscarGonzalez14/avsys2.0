<?php

require_once("../config/conexion.php");
require_once("../modelos/Creditos.php");

$creditos= new Creditos();


switch ($_GET["op"]) {

case 'get_pacientes_sucursal':
$datos=$creditos->get_pacientes_metro();
		$data = Array();

	foreach ($datos as $row) {

		//$monto_credito= $row["monto"];
		//$plazo_credito= $row["plazo"];
		//$cuota_mensual= $monto_credito/$plazo_credito;

		$sub_array= array();
			$total_order =0;
			$event='';
			$evento='';
			$est = '';
			$atrib = '';
			$modal = '';
			$icon = '';
			$class = '';
			$txt = ' Abonar';
			$color = 'dark';
				 
			if($row["saldo"] <= 0){
				$est = 'Factura';
				$icon="<span class='glyphicon glyphicon-print detalle'></span>";
				$event = $row["numero_venta"];
				$atrib = "btn btn-blue btn-md";
				$modal ="#detalle_venta";
				$txt = ' CANCELADO';
				$color = 'edit';
				$evento ="";
				$class = '';
				$href='imprimir_factura.php?numero_venta='.$row['numero_venta'].'';				 

			}
			else{
				if($row["saldo"] > 0){
					$est = 'Pendiente';
					$icon="<span class='glyphicon glyphicon-usd'></span>";
					$atrib = "btn btn-default";
					$evento = 'onClick="abonoPaciente('.$row["id_paciente"].','.$row["id_credito"].')"';
					$modal ="";
					$class="abonos_p";
					$href="";
		}
	}
		$sub_array[] = $row["id_paciente"];
		$sub_array[] = $row["nombres"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = "$ ".number_format($row["monto"],2,".",",");
		$sub_array[] = "$ ".number_format($row["saldo"],2,".",",");		     
		$sub_array[] = $row["numero_venta"];
		//$sub_array[] = "$ ".number_format($row["abonos"],2,".",","); 

		$sub_array[] = '<button class="btn btn-'.$color.' '.$class.' btn-block" id="'.$row["numero_venta"].'" data-toggle="modal" data-target="#detalle_abonos" data-backdrop="static" data-keyboard="false"><i class="fa fa-usd"></i>' .$txt.'</i></button>';
		$sub_array[] = '<button type="button" id="'.$row["id_paciente"].'" class="btn btn-dark btn-block det_abonos"><i class="glyphicon glyphicon-user"></i> Historial Abonos</button>';

		$sub_array[] = '<a href="'.$href.'" method="POST" target="_blank"><button type="button"  class="btn '.$atrib.' btn-md"><i class="glyphicon glyphicon-edit"></i> Imprimir</button></a>';

		$total_order = $total_order + floatval($row["saldo"]);
		$data[]= $sub_array;
	}
      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data,
 			//'total' => number_format($total_order, 2),

 		);
 		echo json_encode($results);
	break;

case 'pacientes_empresarial':

	$datos=$creditos->get_pacientes_empresarial($_POST["id_empresas"]);
	$data = Array();

	foreach ($datos as $row) {

		$monto_credito= $row["monto"];
		$plazo_credito= $row["plazo"];
		$cuota_mensual= $monto_credito/$plazo_credito;

		$sub_array= array();
			$total_order =0;
			$event='';
			$evento='';
			$est = '';
			$atrib = '';
			$modal = '';
			$icon = '';
			$class = '';
			$txt = ' Abonar';
			$color = 'dark';
				 
			if($row["saldo"] <= 0){
				$est = 'Factura';
				$icon="<span class='glyphicon glyphicon-print detalle'></span>";
				$event = $row["numero_venta"];
				$atrib = "btn btn-blue btn-md";
				$modal ="#detalle_venta";
				$txt = ' CANCELADO';
				$color = 'edit';
				$evento ="";
				$class = '';
				$href='imprimir_factura.php?numero_venta='.$row['numero_venta'].'';				 

			}
			else{
				if($row["saldo"] > 0){
					$est = 'Pendiente';
					$icon="<span class='glyphicon glyphicon-usd'></span>";
					$atrib = "btn btn-default";
					$evento = 'onClick="abonoPaciente('.$row["id_paciente"].','.$row["id_credito"].')"';
					$modal ="";
					$class="abonos_p";
					$href="";
		}
	}
		$sub_array[] = $row["id_paciente"];
		$sub_array[] = $row["nombres"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = "$ ".number_format($row["monto"],2,".",",");
		$sub_array[] = "$ ".number_format($row["saldo"],2,".",",");		     
		$sub_array[] = "$ ".number_format($cuota_mensual,2,".",",");
		//$sub_array[] = "$ ".number_format($row["abonos"],2,".",","); 

		$sub_array[] = '<button class="btn btn-'.$color.' '.$class.' btn-block" id="'.$row["numero_venta"].'" data-toggle="modal" data-target="#detalle_abonos" data-backdrop="static" data-keyboard="false"><i class="fa fa-usd"></i>' .$txt.'</i></button>';
		$sub_array[] = '<button type="button" id="'.$row["id_paciente"].'" name="'.$row["numero_venta"].'" class="btn btn-dark btn-block det_abonos"><i class="glyphicon glyphicon-user"></i> Historial Abonos</button>';

		$sub_array[] = '<a href="'.$href.'" method="POST" target="_blank"><button type="button"  class="btn '.$atrib.' btn-md"><i class="glyphicon glyphicon-edit"></i> Imprimir</button></a>';

		$total_order = $total_order + floatval($row["saldo"]);
		$data[]= $sub_array;
	}
      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data,
 			//'total' => number_format($total_order, 2),

 		);
 		echo json_encode($results);
	break;

case "ver_detalle_abonos":

  	   $datos= $creditos->get_detalle_abonos($_POST["id_paciente"],$_POST["numero_v"]);	


  	 break;

case 'get_pacientes_c_automatico':

	$datos=$creditos->get_pacientes_c_automatico();

		$data = Array();

	foreach ($datos as $row) {

		$monto_credito= $row["monto"];
		$plazo_credito= $row["plazo"];
		$cuota_mensual= $monto_credito/$plazo_credito;

		$sub_array= array();
			$total_order =0;
			$event='';
			$evento='';
			$est = '';
			$atrib = '';
			$modal = '';
			$icon = '';
			$class = '';
			$txt = ' Abonar';
			$color = 'dark';
				 
			if($row["saldo"] <= 0){
				$est = 'Factura';
				$icon="<span class='glyphicon glyphicon-print detalle'></span>";
				$event = $row["numero_venta"];
				$atrib = "btn btn-blue btn-md";
				$modal ="#detalle_venta";
				$txt = ' CANCELADO';
				$color = 'edit';
				$evento ="";
				$class = '';
				$href='imprimir_factura.php?numero_venta='.$row['numero_venta'].'';				 

			}
			else{
				if($row["saldo"] > 0){
					$est = 'Pendiente';
					$icon="<span class='glyphicon glyphicon-usd'></span>";
					$atrib = "btn btn-default";
					$evento = 'onClick="abonoPaciente('.$row["id_paciente"].','.$row["id_credito"].')"';
					$modal ="";
					$class="abonos_p";
					$href="";
		}
	}
		$sub_array[] = $row["id_paciente"];
		$sub_array[] = $row["nombres"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = "$ ".number_format($row["monto"],2,".",",");
		$sub_array[] = "$ ".number_format($row["saldo"],2,".",",");		     
		$sub_array[] = "$ ".number_format($cuota_mensual,2,".",",");
		//$sub_array[] = "$ ".number_format($row["abonos"],2,".",","); 

		$sub_array[] = '<button class="btn btn-'.$color.' '.$class.' btn-block" id="'.$row["numero_venta"].'" data-toggle="modal" data-target="#detalle_abonos" data-backdrop="static" data-keyboard="false"><i class="fa fa-usd"></i>' .$txt.'</i></button>';
		$sub_array[] = '<button type="button" id="'.$row["id_paciente"].'" class="btn btn-dark btn-block det_abonos"><i class="glyphicon glyphicon-user"></i> Historial Abonos</button>';

		$sub_array[] = '<a href="'.$href.'" method="POST" target="_blank"><button type="button"  class="btn '.$atrib.' btn-md"><i class="glyphicon glyphicon-edit"></i> Imprimir</button></a>';

		$total_order = $total_order + floatval($row["saldo"]);
		$data[]= $sub_array;
	}
      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data,
 			//'total' => number_format($total_order, 2),

 		);
 		echo json_encode($results);
	break;


	case 'get_pacientes_c_personal':

	$datos=$creditos->get_pacientes_c_personal();

	$data = Array();

	foreach ($datos as $row) {

		$sub_array= array();
				$event='';
				$est = '';
				$atrib = '';
				$modal = '';
				 
				if($row["saldo"] == 0){
					$est = 'Factura';
					$icon="<span class='glyphicon glyphicon-print detalle'></span>";
					$event = $row["numero_venta"];
					$atrib = "btn btn-blue btn-md";
					$modal ="#detalle_venta";
				 

				}
				else{
					if($row["saldo"] > 0){
						$est = 'Pendiente';
						$icon="<span class='glyphicon glyphicon-usd'></span>";
						$atrib = "btn btn-default";
						$event = "";
						$modal ="";
				}
			}
		//$sub_array[] = $row["id_paciente"];
		$sub_array[] = $row["nombres"];
		$sub_array[] = $row["monto"];
		$sub_array[] = $row["saldo"];
		//$sub_array[] = $row["telefono"];
		//$sub_array[] = $row["empresa"];
		$sub_array[] = $row["sucursal"];

		$sub_array[] = '<button class="btn btn-blue abonarp" id="'.$row["numero_venta"].'" onClick="abonoPaciente('.$row["id_paciente"].','.$row["id_credito"].')"><i class="fa fa-usd"></i> Abonar</i></button>';
		$sub_array[] = '<button class="btn btn-dark"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>';

		$sub_array[] = '<button type="button" name="estado" id="'.$event.'" class="'.$atrib.'" data-toggle="modal" data-target="'.$modal.'">'.$icon." ".$est.'</button>';


		$data[]= $sub_array;

	}
      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;


	case "listar_creditos_paciente":


   $datos= $creditos->get_detalle_paciente($_POST["numero_venta"]);	

            // si existe el proveedor entonces recorre el array
	      if(is_array($datos)==true and count($datos)>0){

				  foreach($datos as $row)
				{
					
					//$output["telefono"] = $row["telefono"];
					$output["nombres"] = $row["nombres"];
					$output["numero_venta"] = $row["numero_venta"];
					$output["telefono"] = $row["telefono"];
					$output["nombre"] = $row["nombre"];
					$output["monto"] =$row["monto"];
					$output["saldo"] =number_format($row["saldo"],2,".",",");
					$output["id_paciente"] = $row["id_paciente"];
			        $output["id_empresas"] = $row["id_empresas"];
			        $output["optometra"] = $row["optometra"];
			        $output["vendedor"] = $row["vendedor"];
			        $output["tipo_pago"] = $row["tipo_pago"];
			        $output["tipo_venta"] = $row["tipo_venta"];
			        							
				}	
		      
		          echo json_encode($output);


	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                $errors[]="no existe";

	        }


	         //inicio de mensaje de error

				if (isset($errors)){
			
					?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach ($errors as $error) {
										echo $error;
									}
				?>
					</div>
					<?php
			      }

break;
///////////////LISTAR DETALLE PACIENTES EN ABONOS
case "ver_detalle_pac_abonos":
    $datos= $creditos->get_detalle_paciente_abonos($_POST["id_paciente"]);	

	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row)
		{					
			$output["telefono"] = $row["telefono"];
			$output["numero_venta"] = $row["numero_venta"];
			$output["vendedor"] = $row["vendedor"];
			$output["fecha_venta"] = $row["fecha_venta"];
			$output["sucursal"] = $row["sucursal"];
												
		}		
		      
        echo json_encode($output);
} 

break;



	case "buscar_abonos_paciente":

	$comprobar_abonos=$creditos->comprobar_abonos_ant($_POST["id_paciente"] ,$_POST["id_credito"]);

	if(is_array($comprobar_abonos)==true and count($comprobar_abonos)>0){

		$datos=$creditos->abonos_paciente_numerov_idp($_POST["id_paciente"], $_POST["id_credito"]);

	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					$output["id_paciente"] = $row["id_paciente"];
					$output["id_credito"] = $row["id_credito"];
					$output["monto"] = $row["monto"];
					$output["saldo"] = $row["saldo"];
					$output["nombres"] = $row["nombres"];
					$output["empresa"] = $row["empresa"];
					$output["telefono"] = $row["telefono"];
					$output["tipo_pago"] = $row["tipo_pago"];
					$output["numero_venta"] = $row["numero_venta"];
					$output["monto_abono"] = $row["monto_abono"];
					$output["abono_act"] = $row["abono_act"];
					$output["fecha"] = date("d-m-Y", strtotime($row["fecha"]));
					
				}
		
		     

	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                 $output["error"]="El numero de venta seleccionado está inactivo, intenta con otro";

	        }

	        echo json_encode($output);

	        }else{

	$abono_ini=$creditos->abonos_paciente_inicial($_POST["id_paciente"], $_POST["id_credito"]);

	      if(is_array($abono_ini)==true and count($abono_ini)>0){

				foreach($abono_ini as $row)
				{
					$output["id_credito"] = $row["id_credito"];
					$output["id_paciente"] = $row["id_paciente"];
					$output["monto"] = $row["monto"];
					$output["saldo"] = $row["saldo"];
					$output["nombres"] = $row["nombres"];
					$output["empresa"] = $row["empresa"];
					$output["telefono"] = $row["telefono"];
					$output["tipo_pago"] = $row["tipo_pago"];
					$output["numero_venta"] = $row["numero_venta"];
					$output["monto_abono"] = $row["monto_abono"];
					$output["abono_act"] = $row["abono_act"];
					$output["fecha"] = date("d-m-Y", strtotime($row["fecha"]));
					
				}
		
		     

	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                 $output["error"]="El numero de venta seleccionado está inactivo, intenta con otro";

	        }

	        echo json_encode($output);



	        }

	break; 


case "buscar_cobros_paciente":


$datos=$creditos->cobros_pacientes();
$data = Array();
	foreach ($datos as $row) {

$sub_array= array();

		$txt = '  Sin Retraso ';
		$icon = "<span class='glyphicon glyphicon-ok'></span><span class='glyphicon glyphicon-ok'></span>";
		$atrib = 'btn btn-edit btn-md';

		if($row["estado"]==0){

			$txt='Fecha Abono';
			$atrib='btn btn-info btn-md';
			$icon = '<i class="fa fa-bell pull-right">';
		}elseif($row["estado"]>=1 && $row["estado"]<=3){

			$txt='Retraso '.$row["estado"].' dias .';
			$atrib='btn btn-warning btn-md';
			$icon = '<span class="pull-right-container badge bg-red"><span>';

		}elseif ($row["estado"]>3) {
			$txt='Retraso '.$row["estado"].' dias <i class="fa fa-volume-control-phone" aria-hidden="true"></i>';
			$atrib='btn btn-danger btn-md';
			$icon = '<span class="pull-right-container badge bg-red"></span>';
		}

		$sub_array[] = $row["empresa"];
		$sub_array[] = $row["nombres"];
		$sub_array[] = $row["telefono"];
		$sub_array[] = date("d-m-Y", strtotime($row["fecha_abono"]));
		$sub_array[] = date("d-m-Y",strtotime($row["pbono"]));
		$sub_array[] = $row["monto"];
		$sub_array[] = $row["saldo"];
		//$sub_array[] = $row["n_recibo"];

		$sub_array[] = '<button type="button" name="estado" class="'.$atrib.'">'.$icon." ".$txt.'</button>';
		$data[]= $sub_array;

	}
      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
   

break;


//DETALLE DE CREDITOS
case "buscar_detalle_credito_aros":

   $datos= $creditos->detalle_credito_aros($_POST["numero_venta"]);	

      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					
					$output["marca"] = $row["marca"];
					$output["modelo"] = $row["modelo"];
					$output["color"] = $row["color"];		
							
				}
			      
		          echo json_encode($output);


	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                $errors[]="no existe";

	        }

			if (isset($errors)){
			
					?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach ($errors as $error) {
										echo $error;
									}
								?>
					</div>
					<?php
			      }

  	break;

  	case "buscar_detalle_credito_lentes":

   $datos= $creditos->detalle_credito_lentes($_POST["numero_venta"]);	

      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{

					$output["modelo"] = $row["modelo"];
							
				}
			      
		          echo json_encode($output);

	        } 
  	break;

  	case "buscar_detalle_credito_ar":

   $datos= $creditos->detalle_credito_ar($_POST["numero_venta"]);	

      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{

					$output["modelo"] = $row["modelo"];
							
				}
			      
		          echo json_encode($output);

	        } 
  	break;

case "buscar_detalle_credito_photo":

   $datos= $creditos->detalle_credito_photo($_POST["numero_venta"]);	

      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{

					$output["modelo"] = $row["modelo"];
							
				}
			      
		          echo json_encode($output);

	        } 
  	break;
  	
  	case "registrar_abono_pacientes";

  	$comprobar_recibos=$creditos->comprobar_recibos_ant($_POST["n_recibo"]);
    
    if(is_array($comprobar_recibos)==true and count($comprobar_recibos)==0){ 

	$creditos->agrega_abono_pacientes();

	}else{

		$errors[]="Este Numero de Recibo ya Existe";
	}

	     //mensaje success
     if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
	 //fin success

	 //mensaje error
         if (isset($errors)){
			
			?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<script>alert("Numero de Recibo ya Existe");</script> 
						<?php
							foreach ($errors as $error) {
									echo $error;
								}
							?>
				</div>
			<?php

			}

	 //fin mensaje e
     break;

     case "registrar_abono_cancelacion";


	$creditos->agrega_cancelacion();

     break;
	



///////////////LISTAR DETALLE PACIENTES EN ABONOS
case "suma_total_creditos":
    $datos= $creditos->get_suma_creditos($_POST["id_empresa_total"]);	

	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row)
		{					
			$output["suma_creditos"] = "$ ".number_format($row["suma_creditos"],2,".",",");
								
		}		
		      
        echo json_encode($output);
} 

break;

case "suma_total_abonos":
    $datos= $creditos->get_suma_abonos($_POST["id_empresa_total"]);	

	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row)
		{					
			$output["suma_abonos"] = "$ ".number_format($row["suma_abonos"],2,".",",");
								
		}	      
    echo json_encode($output);
} 

break;

}