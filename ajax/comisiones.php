<?php

require_once("../config/conexion.php");
require_once("../modelos/Comisiones.php");


$comisiones = new Comisiones();


switch ($_GET["op"]) {

case "listar_comisiones_asesor":
$datos=$comisiones->listar_comisiones_asesores($_POST["mes"],$_POST["ano"],$_POST["user_com"]);
	$data= Array();

    foreach($datos as $row)

	{
		$sub_array = array();			
			
	    $sub_array[] = date("d-m-Y", strtotime($row["fecha_abono"]));
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["numero_venta"].'</p>';
        $sub_array[] = '<span style="text-align:center;font-size=8px">'.$row["n_recibo"].'</span>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'."$ ".number_format($row["monto_abono"],2,".",",").'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["usuario_vendedor"].'</p>';
        $sub_array[] = "$ ".number_format($row["comision_asesor"],2,".",",");
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["tipo_venta"].'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["tipo_cliente"].'</p>';
        //$sub_array[] = $row[""];
        //$sub_array[] = $row[""];      
                                                
		$data[] = $sub_array;
	}

    $results = array(
 		"sEcho"=>1, //Información para el datatables
 		"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 		"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 		"aaData"=>$data);
 	echo json_encode($results);
break;


////////////////////LISTAR COMISION OPTOMETRAS
case "listar_comisiones_optometras":
$datos=$comisiones->listar_comisiones_optometras($_POST["mes"],$_POST["ano"],$_POST["user_com"]);

 $data= Array();

    foreach($datos as $row)

    {
        $sub_array = array();           
            
        $sub_array[] = date("d-m-Y", strtotime($row["fecha_abono"]));
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["numero_venta"].'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["n_recibo"].'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'."$ ".number_format($row["monto_abono"],2,".",",").'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["usuario_optometra"].'</p>';
        $sub_array[] = "$ ".number_format($row["comision_opto"],2,".",",");
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["tipo_venta"].'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["tipo_cliente"].'</p>';
        //$sub_array[] = $row[""];
        //$sub_array[] = $row[""];      
                                                
        $data[] = $sub_array;
    }

    $results = array(
        "sEcho"=>1, //Información para el datatables
        "iTotalRecords"=>count($data), //enviamos el total registros al datatable
        "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
        "aaData"=>$data);
    echo json_encode($results);
break;

////////////////////LISTAR COMISION COBROS
case "listar_comisiones_cobros":
$datos=$comisiones->listar_comisiones_cobros($_POST["mes"],$_POST["ano"],$_POST["user_com"]);

function redondear_dos_decimal($valor) {
   $float_redondeado=round($valor * 100) / 100;
   return $float_redondeado;
}
    $data= Array();

    foreach($datos as $row)

    {
        $sub_array = array();           
            
        $sub_array[] = date("d-m-Y", strtotime($row["fecha_abono"]));
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["numero_venta"].'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["n_recibo"].'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'."$ ".number_format($row["monto_abono"],2,".",",").'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["usuario_cobros"].'</p>';
        $sub_array[] = "$".number_format($row["comision_cobros"],2,".",",");
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["tipo_venta"].'</p>';
        $sub_array[] = '<p style="text-align:center;font-size=8px">'.$row["tipo_cliente"].'</p>';
        //$sub_array[] = $row[""];
        //$sub_array[] = $row[""];      
                                                
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