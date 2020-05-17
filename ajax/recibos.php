<?php

require_once("../config/conexion.php");
require_once("../modelos/Recibos.php");


    require_once('../modelos/Recibos.php');
    $recibo = new Recibos();


switch ($_GET["op"]) {

case "get_numero_recibo":

    $datos= $recibo->get_recibo_sucursal($_POST["sucursal"]);	

    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["numero_rec"] = $row["numero_rec"];								
		}
		      
	echo json_encode($output);
		}
break;

case "get_numero_recibo_abonos":

    $datos= $recibo->get_recibo_num($_POST["sucursal_correlativo"]);	

    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["num_recibo"] = $row["num_recibo"];								
		}
		      
	echo json_encode($output);
		}
break;

case "get_datos_recibo_inicial":

    $datos= $recibo->get_datos_pac_rec_ini($_POST["sucursal"],$_POST["id_usuario"]);	

    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["id_ventas"] = $row["id_ventas"];
			$output["sucursal"] = $row["sucursal"];
			$output["subtotal"] = $row["subtotal"];
			$output["numero_venta"] = $row["numero_venta"];
			$output["nombres"] = $row["nombres"];
			$output["telefono"] = $row["telefono"];
			$output["id_paciente"] = $row["id_paciente"];
			$output["tipo_pago"] = $row["tipo_pago"];										
		}
		      
	echo json_encode($output);
		}
break;

//DATOS ARO RECIBO INICIAL
case "get_datos_recibo_aros":

    $datos= $recibo->get_detalle_aros_rec_ini($_POST["numero_venta"]);	

    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["marca"] = $row["marca"];
			$output["color"] = $row["color"];
			$output["modelo"] = $row["modelo"];
										
		}
		      
	echo json_encode($output);
}
break;
///////////////////LISTA LETRAS ABONO ANTERIOR EMPRESARIAL
case "get_abono_anterior":

    $datos= $recibo->get_detalle_abono_anterior($_POST["numero_venta"]);	

    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["abono_anterior"] = number_format($row["abono_anterior"],2,".",",");
		}
		      
	echo json_encode($output);
		}
break;

//////////////GET LETRA MENSUAL Y SALADO EMPRESARIAL
case "get_letra_mensual":

    $datos= $recibo->get_detalle_letra_abono($_POST["numero_venta"]);	

    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["cuota_mensual"] = number_format($row["cuota_mensual"],2,".",",");
			$output["saldo_actual"] = number_format($row["saldo_actual"],2,".",".");
		}
		      
	echo json_encode($output);
}
break;

case "get_datos_recibo_lente":

    $datos= $recibo->get_detalle_lentes_rec_ini($_POST["numero_venta"]);	

    // si existe el proveedor entonces recorre el array
	if(is_array($datos)==true and count($datos)>0){
		foreach($datos as $row){					
			$output["dis_lente"] = $row["dis_lente"];							
	}
		      
	echo json_encode($output);
}
break;

case "registrar_abono_inicial";
	$recibo->agrega_detalle_abono($_POST['num_recibo'],$_POST['num_venta'],$_POST['monto'],$_POST['sucursal'],$_POST['id_paciente'],$_POST['id_usuario'],$_POST['hora'],$_POST['telefono'],$_POST['paciente'],$_POST['empresa'],$_POST['cant_letras'],$_POST['abono_ant'],$_POST['abono_act'],$_POST['saldo'],$_POST['forma_pago'],$_POST['marca_aro'],$_POST['modelo_aro'],$_POST['color_aro'],$_POST['lente'],$_POST['tipo_ar'],$_POST['photo'],$_POST['observaciones'],$_POST['asesor'],$_POST['prox_abono'],$_POST['id_empresa'],$_POST['vendedor_com'],$_POST['opto_com'],$_POST["user_cobros"],$_POST["forma_pagos"],$_POST["forma_venta"]);
break;
    

case "listar_recibos_print":

	$datos=$recibo->get_recibos_print($_POST['mes_recibo'],$_POST['ano_recibo'],$_POST['empresa_recibo']);
 	$data= Array();

    foreach($datos as $row)
	{
		$sub_array = array();
		$sub_array[] = date("d-m-Y", strtotime($row["fecha"]));
		$sub_array[] = $row["numero_recibo"];
		$sub_array[] = $row["numero_venta"];
		$sub_array[] = $row["abono_act"];
		$sub_array[] = $row["paciente"];
		$sub_array[] = $row["empresa"];
		$sub_array[] = '<a href="print_recibos.php?numero_recibo_pac='.$row["numero_recibo"].'" method="POST" target="_blank"><button type="button"  class="btn btn-infos btn-md"><i class="glyphicon glyphicon-edit"></i> Imprimir</button></a>';
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

