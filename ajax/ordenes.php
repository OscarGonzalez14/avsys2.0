<?php    

//llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Categorías
  require_once("../modelos/Ordenes.php");

 
  $ordenes = new Ordenes();

 switch($_GET["op"]){
     case "listar_ordenes":

     $datos=$ordenes->get_detalle_ordenes();

     //Vamos a declarar un array
 	 $data= Array();

     foreach($datos as $row)

			{
				$sub_array = array();

				$estado = "";
				$class="";
				$atrib="";
				if ($row["estado"]==0) {
					$estado ='ENVIADA A LABORATORIO';
					$class = "btn btn-warning btn-block";
				}elseif ($row['estado']==1) {
					$estado='ORDEN DESCARGADA EN LAB.';
					$class = "btn btn-primary btn-block";
				}elseif ($row['estado']==2) {
					$estado='DESPACHADO DE LABORATORIO';
					$class = "btn btn-info btn-block";
				}elseif ($row['estado']==3) {
					$estado='ORDEN RECHAZADA';
					$class = "btn btn-danger btn-block";
				}elseif ($row['estado']==4) {
					$estado='ORDEN RECIBIDA EN OPTICA';
					$class = "btn btn-edit btn-block";
				}
				
				
			
	             $sub_array[] = $row["numero_orden"];
	             $sub_array[] = $row["fecha"];
				 $sub_array[] = $row["optica"];
				 $sub_array[] = $row["sucursal"];
				 $sub_array[] = $row["paciente"];
            
                $sub_array[] = '<button type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#show_orden" onClick="show_orden_data('.$row["id_orden"].')"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>';
                $sub_array[] = '<button type="button" class="btn btn-dark btn-md"  onClick="rechazar_orden('.$row["id_orden"].')" ><i class="fa fa-thumbs-o-down"></i> Rechazar</button>';
                 $sub_array[] = '<button type="button" class="btn btn-dark btn-md"  onClick="recibir_orden('.$row["id_orden"].')" ><i class="fa fa-smile-o"></i> Recibir</button>';
                  $sub_array[]='<button type="button" class="'.$class.'"></i>'.$estado.'</button>';
				 $data[] = $sub_array;
			}

      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


break;

case "listar_ordenes_vencidas":
	$datos=$ordenes->get_detalle_ordenes_vencidas();
    $data= Array();


    foreach($datos as $row)
	{

		$retraso = $row["horas"]-72;

		$sub_array = array();			
	    $sub_array[] = $row["numero_orden"];
	    $sub_array[] = $row["fecha"];
		$sub_array[] = $row["optica"];
		$sub_array[] = $row["sucursal"];
		$sub_array[] = $row["paciente"];            
        $sub_array[] = '<button type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#show_orden" onClick="show_orden_data('.$row["id_orden"].')"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button>';
        $sub_array[] = $retraso ." "." horas de retraso"; 
        $data[] = $sub_array;
	}

      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


break;
     
case 'recibe_orden':
    
      $actualiza=$ordenes->recibir_orden($_POST["id_orden"]);
break;

case 'rechazar_orden':
    
      $actualiza=$ordenes->rechazar_orden($_POST["id_orden"]);
break;
     
     
}
?>
