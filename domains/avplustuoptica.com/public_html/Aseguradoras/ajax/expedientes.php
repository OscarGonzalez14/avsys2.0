<?php 
require_once("../config/conexion.php");
  //llamo al modelo Producto


  require_once("../modelos/Expedientes.php");

  $consultas = new Consulta();

  switch($_GET["op"]){


  case "listar":

  	$datos=$consultas->get_consultas();

     //Vamos a declarar un array
 	 $data= Array();

     foreach($datos as $row)
			{
				$sub_array = array();		

				//$sub_array = array();
				$sub_array[] = date("d-m-Y", strtotime($row["fecha_reg"]));
				$sub_array[] = $row["nombres"];
				$sub_array[] = $row["diagnostico"];
				$sub_array[] = '<button type="button" class="btn btn-blue detconsultas" id="'.$row["id_consulta"].'" data-toggle="modal" data-target="#detalle_consulta"><i class="fa fa-eye" aria-hidden="true"></i></i> Ver Detalles</button>';       
			

				$data[] = $sub_array;
			 
			 }


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;

    case 'ver_consultas':

      $datos= $consultas->get_detalle_consultas($_POST["id_consulta"]);	

            // si existe el proveedor entonces recorre el array
	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
				$output["fecha_reg"] = date("d-m-Y", strtotime($row["fecha_reg"]));
				$output["id_consulta"] = $row["id_consulta"];
				$output["nombres"] = $row["nombres"];
				$output["sugeridos"] = $row["sugeridos"];
				$output["diagnostico"] = $row["diagnostico"];
				$output["usuario"] = $row["usuario"];
				$output["codigo"] = $row["codigo"];
				$output["oiesfreasl"] = $row["oiesfreasl"];
				$output["oicilindrosl"] = $row["oicilindrosl"];
				$output["oiejesl"] = $row["oiejesl"];
				$output["oiprismal"]= $row["oiprismal"];
				$output["oiadicionl"]= $row["oiadicionl"];
				$output["odesferasl"]= $row["odesferasl"];
				$output["odcilndrosl"]= $row["odcilndrosl"];
				$output["odejesl"]= $row["odejesl"];
				$output["odprismal"]= $row["odprismal"];
				$output["odadicionl"]= $row["odadicionl"];
				$output["oiesferasa"]= $row["oiesferasa"];
				$output["oicolindrosa"]= $row["oicolindrosa"];
				$output["oiejesa"]= $row["oiejesa"];
				$output["oiprismaa"]= $row["oiprismaa"];
				$output["oiadiciona"]=$row["oiadiciona"];
				$output["odesferasa"]=$row["odesferasa"];
				$output["odcilindrosa"]=$row["odcilindrosa"];
				$output["odejesa"]=$row["odejesa"];
				$output["dprismaa"]=$row["dprismaa"];
				$output["oddiciona"]=$row["oddiciona"];
				$output["sugeridos"]=$row["sugeridos"];
				$output["diagnostico"]=$row["diagnostico"];
				$output["medicamento"]=$row["medicamento"];
				$output["observaciones"]=$row["observaciones"];
				$output["oiesferasf"]=$row["oiesferasf"];
				$output["oicolindrosf"]=$row["oicolindrosf"];
				$output["oiejesf"]=$row["oiejesf"];
				$output["oiprismaf"]=$row["oiprismaf"];
				$output["oiadicionf"]=$row["oiadicionf"];
				$output["odesferasf"]=$row["odesferasf"];
				$output["odcilindrosf"]=$row["odcilindrosf"];
				$output["odejesf"]=$row["odejesf"];
				$output["dprismaf"]=$row["dprismaf"];
				$output["oddicionf"]=$row["oddicionf"];

									
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


}

  ?>