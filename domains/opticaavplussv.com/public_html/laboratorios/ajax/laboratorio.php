<?php


require_once("../config/conexion.php");

require_once("../Modelos/Ordenes.php");

$laboratorio = new Ordenes();


switch ($_GET["op"]) {

case "listar_ordenes_metrocentro":
          
$datos=$laboratorio->get_ordenes_metrocentro($_POST["empresa"]);

  $data= Array();



  	foreach($datos as $row){
		$sub_array = array();

    $event='';
    $est = '';
    $atrib = '';
    $modal = '';

    if($row["estado"] == 0){
      $est = 'PENDIENTE';
      $atrib = "btn btn-warning btn-block";
      //$modal ="#detalle_venta";
    }elseif ($row["estado"] == 1) {
      $est = 'EN PROCESO';
      $atrib = "btn btn-info btn-block";
    }
    elseif ($row["estado"] == 2) {
      $est = 'ENVIADO';
      $atrib = "btn btn-success btn-block";
    }elseif ($row["estado"] == 3) {
      $est = 'RECHAZADO';
      $atrib = "btn btn-danger btn-block";
    }elseif ($row["estado"] == 4) {
      $est = 'RECIBIDO';
      $atrib = "btn btn-success btn-block";
    }


		//$estado = "Enviado de Optica a laboratorio";
        $sub_array[] = $row["numero_orden"];
		$sub_array[] = $row["fecha"];
		$sub_array[] = $row["dias"]." / ".$row["horas"]." horas";
		$sub_array[] = $row["paciente"];
		$sub_array[] = $row["lentes"];
    $sub_array[] = '<button style="border-radius: 8px" class="'.$atrib.'" data-toggle="modal" data-target="#nueva_orden"><i class="fa fa-clock-o""></i> '.$est.'</button>';

		$sub_array[] = '<button type="button" style="border-radius:8px" class="btn btn-primary btn-md" onClick="mostrar_orden('.$row["id_orden"].')" ><i class="fa fa-file-pdf-o"></i> Descargar</button>';
		
    $sub_array[] = '<button type="submit" style="background: back;border-radius:8px" class="btn btn-dark btn-md" onClick="envio_a_optica('.$row["id_orden"].')"><i class="fa fa-arrow-circle-o-right"></i> Enviar a AV Plus</button>';             

			/*$sub_array[] = '<button type="button" name="hola" id="'.$row["id_producto"].'" class="btn btn-primary btn-md " onClick="agregarDetalleVenta('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';*/
                        
			
		$data[] = $sub_array;
			 
	}


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
     break;


case "listar_ordenes_empresarial":
          
$datos=$laboratorio->get_ordenes_arce($_POST["empresa"]);

  $data= Array();

    foreach($datos as $row){
    $sub_array = array();

    $event='';
    $est = '';
    $atrib = '';
    $modal = '';

    if($row["estado"] == 0){
      $est = 'PENDIENTE';
      $atrib = "btn btn-warning btn-block";
      //$modal ="#detalle_venta";
    }elseif ($row["estado"] == 1) {
      $est = 'EN PROCESO';
      $atrib = "btn btn-info btn-block";
    }
    elseif ($row["estado"] == 2) {
      $est = 'ENVIADO';
      $atrib = "btn btn-success btn-block";
    }elseif ($row["estado"] == 3) {
      $est = 'RECHAZADO';
      $atrib = "btn btn-danger btn-block";
    }elseif ($row["estado"] == 4) {
      $est = 'RECIBIDO';
      $atrib = "btn btn-success btn-block";
    }


    //$estado = "Enviado de Optica a laboratorio";
        $sub_array[] = $row["numero_orden"];
    $sub_array[] = $row["fecha"];
    $sub_array[] = $row["dias"]." / ".$row["horas"]." horas";
    $sub_array[] = $row["paciente"];
    $sub_array[] = $row["lentes"];
    $sub_array[] = '<button style="border-radius: 8px" class="'.$atrib.'" data-toggle="modal" data-target="#nueva_orden"><i class="fa fa-clock-o""></i> '.$est.'</button>';

    $sub_array[] = '<button type="button" style="border-radius:8px" class="btn btn-primary btn-md" onClick="mostrar_orden('.$row["id_orden"].')" ><i class="fa fa-file-pdf-o"></i> Descargar</button>';
    
    $sub_array[] = '<button type="submit" style="background: back;border-radius:8px" class="btn btn-dark btn-md" onClick="envio_a_optica('.$row["id_orden"].')"><i class="fa fa-arrow-circle-o-right"></i> Enviar a AV Plus</button>';             

      /*$sub_array[] = '<button type="button" name="hola" id="'.$row["id_producto"].'" class="btn btn-primary btn-md " onClick="agregarDetalleVenta('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';*/
                        
      
    $data[] = $sub_array;
       
  }


      $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);
     break;


case "listar_ordenes_sa":
          
$datos=$laboratorio->get_ordenes_sa($_POST["empresa"]);

  $data= Array();



  	foreach($datos as $row){
		$sub_array = array();

    $event='';
    $est = '';
    $atrib = '';
    $modal = '';

    if($row["estado"] == 0){
      $est = 'Pendiente';
      //$icon="<span class='glyphicon glyphicon-print detalle'></span>";
      //$event = $row["numero_venta"];
      $atrib = "btn btn-danger";
      //$modal ="#detalle_venta";
    }elseif ($row["estado"] == 1) {
      $est = 'En Proceso';
      $atrib = "btn btn-success";
    }
    elseif ($row["estado"] == 2) {
      $est = 'Enviado a AVPLUS';
      $atrib = "btn btn-warning";
    }

		//$estado = "Enviado de Optica a laboratorio";
        $sub_array[] = $row["numero_orden"];
		$sub_array[] = $row["fecha"];
		$sub_array[] = $row["dias"]."dias  / ".$row["horas"]." horas";
		$sub_array[] = $row["paciente"];
		$sub_array[] = $row["lentes"];
    $sub_array[] = '<button style="border-radius: 8px" class="'.$atrib.'" data-toggle="modal" data-target="#nueva_orden"><i class="fa fa-clock-o""></i> '.$est.'</button>';

		$sub_array[] = '<button type="button" style="border-radius:8px" class="btn btn-danger btn-md" onClick="mostrar_orden('.$row["id_orden"].')" ><i class="fa fa-file-pdf-o"></i> Descargar</button>';
		
    $sub_array[] = '<button type="submit" style="background: back;border-radius:8px" class="btn btn-dark btn-md" onClick="envio_a_optica('.$row["id_orden"].')"><i class="fa fa-arrow-circle-o-right"></i> Enviar a AV Plus</button>';             

			/*$sub_array[] = '<button type="button" name="hola" id="'.$row["id_producto"].'" class="btn btn-primary btn-md " onClick="agregarDetalleVenta('.$row["id_producto"].')"><i class="fa fa-plus"></i> Agregar</button>';*/
                        
			
		$data[] = $sub_array;
			 
	}


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
     break; 
     
     ////listar Arce

  case 'listar_ordenes_id':

  //selecciona el id del usuario
  $update=$laboratorio->update_estado($_POST["id_orden"]);

  $datos=$laboratorio->get_orden_por_id($_POST["id_orden"]);


          // si existe el id del usuario entonces recorre el array
        if(is_array($datos)==true and count($datos)>0){


        foreach($datos as $row)
        {
          $output["paciente"] = $row["paciente"];
          $output["id_orden"] = $row["id_orden"];
          $output["optica"] = $row["optica"];
          
          $output["odesfera"] = $row["odesfera"];
          $output["odcilindro"] = $row["odcilindro"];
          $output["odeje"] = $row["odeje"];
          $output["oddicion"] = $row["oddicion"];
          $output["odprisma"] = $row["odprisma"];
          
          $output["oiesfera"] = $row["oiesfera"];
          $output["oicilindros"] = $row["oicilindros"];
          $output["oieje"] = $row["oieje"];
          $output["oiadicion"] = $row["oiadicion"];
          $output["oiprisma"] = $row["oiprisma"];
          $output["policarbonato"] = $row["policarbonato"];
          $output["antirreflejo"] = $row["antirreflejo"];
          $output["lentes"] = $row["lentes"];
          $output["colorlente"] = $row["colorlente"];
          $output["base"] = $row["base"];
          $output["numero_orden"] = $row["numero_orden"];
          
          $output["sucursal"] = $row["sucursal"];
          
          $output["odoblea"] = $row["odoblea"];
          $output["odpupilar"] = $row["odpupilar"];
          $output["oddplejos"] = $row["oddplejos"];
          $output["oddpcerca"] = $row["oddpcerca"];
          $output["oioblea"] = $row["oioblea"];
          $output["oipupilar"] = $row["oipupilar"];
          $output["oidplejos"] = $row["oidplejos"];
          $output["oidpcerca"] = $row["oidpcerca"];
          
          $output["aro"] = $row["aro"];
          $output["coloraro"] = $row["coloraro"];
          $output["medidas_lente"] = $row["medidas_lente"];
          $output["medida_a"] = $row["medida_a"];
          $output["medida_b"] = $row["medida_b"];
          $output["medida_c"] = $row["medida_c"];
          $output["medida_d"] = $row["medida_d"];
          
          $output["diseno_aro"] = $row["diseno_aro"];
          $output["materiales"] = $row["materiales"];
 
        }


                  echo json_encode($output);


          } else {
                 
                 //si no existe el registro entonces no recorre el array
                $errors[]="orden no existe";

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
       
       
    case 'enviar_optica':
      $actualiza=$laboratorio->envio_a_optica($_POST["id_orden"]);

    break;

}//Fin Switch