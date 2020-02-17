<?php

  //llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Venta
  require_once("../modelos/Cotizaciones.php");

  $cotizaciones = new Cotizaciones();


  switch ($_GET["op"]) {

  	case 'listar':

  		$datos=$cotizaciones->get_cotizaciones();

  		$data= Array();

     	foreach($datos as $row){

     		$sub_array = array();

     		$sub_array[] = date("d-m-Y",strtotime($row["fecha_venta"]));
     		$sub_array[] = $row["paciente"];
			$sub_array[] = $row["subtotal"];
			$sub_array[] = '<button type="button" name="estado" class="btn btn-default"> <span id="est_cot">PENDIENTE</span></button>';
			$sub_array[] = '<button class="btn btn-blue detalle" id="'.$row["numero_venta"].'"  data-toggle="modal" data-target="#detalle_venta"><i class="fa fa-eye"></i></button>';
			$sub_array[] = '<button type="button" name="estado" class="btn btn-success" onClick="aprobar_cot()"><i class="fa fa-thumbs-o-up"></i></button>';
			$sub_array[] = '<button type="button" name="estado" class="btn btn-danger" onClick="denegar_cot()" data-toggle="modal" data-target="#denegacion"><i class="fa fa-thumbs-o-down"></i></button>';

			$data[] = $sub_array;
			 

     	}

     	$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

case "ver_detalle_venta":

  	   $datos= $cotizaciones->get_detalle_ventas_paciente($_POST["numero_venta"]);	

break;



 case "ver_detalle_paciente_venta":


   $datos= $cotizaciones->get_detalle_paciente($_POST["numero_venta"]);	

      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					
					$output["nombres"] = $row["nombres"];
					$output["numero_venta"] = $row["numero_venta"];
					$output["telefono"] = $row["telefono"];
					$output["fecha_venta"] = date("d-m-Y", strtotime($row["fecha_venta"]));
					$output["usuario"] = $row["usuario"];
					$output["sucursal"] = $row["sucursal"];

									
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

	        //fin de mensaje de error	    


  	break;


}