<?php
require_once('../config/conexion.php');

require_once('../modelos/Empresa.php');

 

  $empresa= new Empresa();
  
  switch($_GET["op"]){
  
    case 'guardar_empresa': 

    $datos= $empresa->registrar_empresa($_POST["nombre_emp"],$_POST["telefono_emp"],$_POST["direccion_emp"],$_POST["nit_emp"],$_POST["responsable"],$_POST["user_emp"],$_POST["pass_emp"],$_POST["correo_emp"],$_POST["user_reg"]);
    
    break;

    case 'listar_en_pacientes':
    	     
    $datos=$empresa->get_empresas_en_pacientes();
 	$data= Array();

     foreach($datos as $row){
					
		$sub_array = array();
	          $sub_array[] = $row["id_empresas"];
		$sub_array[] = $row["nombre"];
		$sub_array[] = substr($row["direccion"],0,28);
        $sub_array[] = '<button type="button" onClick="agregar_empresa_pac('.$row["id_empresas"].');" id="'.$row["id_empresas"].'" class="btn btn-edit btn-md"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>';
        $data[] = $sub_array;
	}

    $results = array(
 		"sEcho"=>1, //Información para el datatables
 		"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 		"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 		"aaData"=>$data);
 	echo json_encode($results);
    break;

    case "buscar_empresa_paciente":
	$datos=$empresa->add_empresa_paciente($_POST["id_empresa"]);
          
	    if(is_array($datos)==true and count($datos)>0){
				foreach($datos as $row)
				{
					$output["id_empresas"] = $row["id_empresas"];
					$output["nombre"] = $row["nombre"];				
					
				}	
		}

	echo json_encode($output);

    break;
	

}//cierre switch
  
?>