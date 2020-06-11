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
					$output["direccion"] = $row["direccion"];	
				}	
		}

	echo json_encode($output);

    break;


case 'listar_detalle_empresas':
    	     
    $datos=$empresa->get_detalle_empresas();
 	$data= Array();

     foreach($datos as $row){					
		$sub_array = array();
	    $sub_array[] = $row["nombre"];
        $sub_array[] = '<button style="font-size:12px" type="button"  class="btn btn-dark btn-md" onClick="eliminarp('.$row["id_empresas"].')"><i class="fa fa-eye" aria-hidden="true"></i>Detalles</button>';
        $sub_array[] = "$ ".number_format($row["creditos_generales"],2,".",",");
        $sub_array[] = "$ ".number_format($row["c_canceladas"],2,".",",");
        $sub_array[] = "$ ".number_format($row["constantes"],2,".",",");
        $sub_array[] = "$ ".number_format($row["poco_constantes"],2,".",",");
        $sub_array[] = "$ ".number_format($row["irrecuperables"],2,".",",");
        $sub_array[] = "$ ".number_format($row["abonos_realizados"],2,".",",");  
        $sub_array[] = '<button style="font-size:12px" type="button"  class="btn btn-dark btn-md cat_a" id="'.$row["id_empresas"].'"><i class="fa fa-eye" aria-hidden="true"></i>Pacientes</button>';
        $sub_array[] = '<button style="font-size:12px" type="button"  class="btn btn-dark btn-md cat_b" id="'.$row["id_empresas"].'"><i class="fa fa-eye" aria-hidden="true"></i>Pacientes</button>';
        $sub_array[] = '<button style="font-size:12px" type="button"  class="btn btn-dark btn-md cat_c" id="'.$row["id_empresas"].'"><i class="fa fa-eye" aria-hidden="true"></i>Pacientes</button>';
		
        $data[] = $sub_array;
	}

    $results = array(
 		"sEcho"=>1, //Información para el datatables
 		"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 		"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 		"aaData"=>$data);
 	echo json_encode($results);
    break;

case 'listar_pacientes_cat_a':
             
    $datos=$empresa->listar_pacientes_cat_a($_POST["id_empresas"]);
    $data= Array();

     foreach($datos as $row){

        $dias_mora=$row["estado"];
        $atr=number_format(($row["estado"]/30),0,'.',',');
        if ($dias_mora<30) {
            $d_mora=0;
        }else{
            $d_mora=$dias_mora-30;
        }

        if ($d_mora>=30){
            $mora=$row["subtotal"]*0.05;
        }else{
            $mora=0;
        }

        if ($atr>1) {
            $c_atrasadas=$row["cuota"]*$atr;
        }else{
            $c_atrasadas=0;
        }

        $total=$row['subtotal']+$c_atrasadas;
        $saldo_pagar=$c_atrasadas+$mora;

        $sub_array = array();
        
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["adquirido"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["vendedor"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["optometra"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["nombre"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["nombres"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["telefono"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["jefe_inmediato"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["tel_jefe"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["referencia_uno"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["tel_ref_uno"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["referencia_dos"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["tel_ref_dos"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<button style="font-size:12px;text align:center" type="button"  class="btn btn-dark btn-md edit_consultas"><i class="fa fa-eye" aria-hidden="true"></i>Expediente</button>'.'</strong>';
        $sub_array[] ='<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["aro"].'</span>'.'</strong>';
        $sub_array[] ='<strong style="font-size:12px">'.'$'.number_format($row["precio_aro"],2,'.',',').'</strong>';
        $sub_array[] ='<strong style="font-size:12px">'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["m_lentes"].'</span>'.'</strong>';
        $sub_array[] ='<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.'$'.number_format($row["p_lentes"],2,'.',',').'</span>'.'</strong>';

        $sub_array[] = '<strong style="font-size:12px">'.'<span style="font-size:12px;text-transform: uppercase;">'."$".number_format($row["subtotal"],2,".",",").'</span>'.'</strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'<span style="font-size:12px;text-transform: uppercase;">'."$".number_format($row["cuota"],2,".",",").'</span>'.'</strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["plazo"].'</span>'.'</strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["abonos"].'</span>'.'</strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["pendientes"].'</span>'.'</strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'$'.number_format($c_atrasadas,2,".",',').'<strong>';
        $sub_array[] = '<strong style="font-size:12px">'.$d_mora.'<strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'$'.number_format($mora,2,'.',',').'<strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'$'.number_format($saldo_pagar,2,'.',',').'<strong>';         
        $sub_array[] = '<strong style="font-size:12px">'.'<span style="font-size:12px;text-transform: uppercase;">'."$".number_format($row["abonado"],2,".",",").'</span>'.'</strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'$'.number_format($total,2,'.',',').'<strong>';
        $sub_array[] = '<button type="button" id="'.$row["id_paciente"].'" name="'.$row["numero_venta"].'" class="btn btn-dark btn-block det_abonos"><i class="glyphicon glyphicon-user"></i> Historial Abonos</button>';


        
        $data[] = $sub_array;
    }

    $results = array(
        "sEcho"=>1, //Información para el datatables
        "iTotalRecords"=>count($data), //enviamos el total registros al datatable
        "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
        "aaData"=>$data);
    echo json_encode($results);
    break;
///////////////////////////////Pacientes Categoria B
    case 'listar_pacientes_cat_b':
             
    $datos=$empresa->listar_pacientes_cat_b($_POST["id_empresas"]);
    $data= Array();

     foreach($datos as $row){

        $dias_mora=$row["estado"];
        $atr=number_format(($row["estado"]/30),0,'.',',');
        if ($dias_mora<30) {
            $d_mora=0;
        }else{
            $d_mora=$dias_mora;
        }

        if ($d_mora>=30){
            $mora=$row["subtotal"]*0.05;
        }else{
            $mora=0;
        }

        if ($atr>1) {
            $c_atrasadas=$row["cuota"]*$atr;
        }else{
            $c_atrasadas=0;
        }

        $total=$row['subtotal']+$c_atrasadas;
        $saldo_pagar=$c_atrasadas+$mora;

        $sub_array = array();
        
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["adquirido"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["vendedor"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["optometra"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["nombre"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["nombres"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["telefono"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["jefe_inmediato"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["tel_jefe"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["referencia_uno"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["tel_ref_uno"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["referencia_dos"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["tel_ref_dos"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<button style="font-size:12px;text align:center" type="button"  class="btn btn-dark btn-md edit_consultas"><i class="fa fa-eye" aria-hidden="true"></i>Expediente</button>'.'</strong>';
        $sub_array[] ='<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["aro"].'</span>'.'</strong>';
        $sub_array[] ='<strong style="font-size:12px">'.'$'.number_format($row["precio_aro"],2,'.',',').'</strong>';
        $sub_array[] ='<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["m_lentes"].'</span>'.'</strong>';
        $sub_array[] ='<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.'$'.number_format($row["p_lentes"],2,'.',',').'</span>'.'</strong>';

        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'."$".number_format($row["subtotal"],2,".",",").'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'."$".number_format($row["cuota"],2,".",",").'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["plazo"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["abonos"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["pendientes"].'</span>'.'</strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'$'.number_format($c_atrasadas,2,".",',').'<strong>';
        $sub_array[] = '<strong style="font-size:12px">'.$d_mora.'<strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'$'.number_format($mora,2,'.',',').'<strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'$'.number_format($saldo_pagar,2,'.',',').'<strong>';         
        $sub_array[] = '<strong style="font-size:12px">'.'<span style="font-size:12px;text-transform: uppercase;">'."$".number_format($row["abonado"],2,".",",").'</span>'.'</strong>';
        $sub_array[] = '<strong style="font-size:12px">'.'$'.number_format($total,2,'.',',').'<strong>';
        $sub_array[] = '<button type="button" id="'.$row["id_paciente"].'" name="'.$row["numero_venta"].'" class="btn btn-dark btn-block det_abonos"><i class="glyphicon glyphicon-user"></i> Historial Abonos</button>';


        
        $data[] = $sub_array;
    }

    $results = array(
        "sEcho"=>1, //Información para el datatables
        "iTotalRecords"=>count($data), //enviamos el total registros al datatable
        "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
        "aaData"=>$data);
    echo json_encode($results);
    break;

///////////////////////////////Pacientes Categoria C
    case 'listar_pacientes_cat_c':
             
    $datos=$empresa->listar_pacientes_cat_c($_POST["id_empresas"]);
    $data= Array();

     foreach($datos as $row){

        $dias_mora=$row["estado"];
        $atr=number_format(($row["estado"]/30),0,'.',',');
        if ($dias_mora<30) {
            $d_mora=0;
        }else{
            $d_mora=$dias_mora;
        }

        if ($d_mora>=30){
            $mora=$row["subtotal"]*0.05;
        }else{
            $mora=0;
        }

        if ($atr>1) {
            $c_atrasadas=$row["cuota"]*$atr;
        }else{
            $c_atrasadas=0;
        }

        $total=$row['subtotal']+$c_atrasadas;
        $saldo_pagar=$c_atrasadas+$mora;

        $sub_array = array();
        
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["adquirido"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["vendedor"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["optometra"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["nombre"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["nombres"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["telefono"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["jefe_inmediato"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["tel_jefe"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["referencia_uno"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["tel_ref_uno"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["referencia_dos"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["tel_ref_dos"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<button style="font-size:12px;text align:center" type="button"  class="btn btn-dark btn-md edit_consultas"><i class="fa fa-eye" aria-hidden="true"></i>Expediente</button>'.'</strong>';
        $sub_array[] ='<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["aro"].'</span>'.'</strong>';
        $sub_array[] ='$'.number_format($row["precio_aro"],2,'.',',');
        $sub_array[] ='<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["m_lentes"].'</span>'.'</strong>';
        $sub_array[] ='<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.'$'.number_format($row["p_lentes"],2,'.',',').'</span>'.'</strong>';

        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'."$".number_format($row["subtotal"],2,".",",").'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'."$".number_format($row["cuota"],2,".",",").'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["plazo"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["abonos"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'.$row["pendientes"].'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'$'.number_format($c_atrasadas,2,".",',').'<strong>';
        $sub_array[] = '<strong>'.$d_mora.'<strong>';
        $sub_array[] = '<strong>'.'$'.number_format($mora,2,'.',',').'<strong>';
        $sub_array[] = '<strong>'.'$'.number_format($saldo_pagar,2,'.',',').'<strong>';         
        $sub_array[] = '<strong>'.'<span style="font-size:12px;text-transform: uppercase;">'."$".number_format($row["abonado"],2,".",",").'</span>'.'</strong>';
        $sub_array[] = '<strong>'.'$'.number_format($total,2,'.',',').'<strong>';
        $sub_array[] = '<button type="button" id="'.$row["id_paciente"].'" name="'.$row["numero_venta"].'" class="btn btn-dark btn-block det_abonos"><i class="glyphicon glyphicon-user"></i> Historial Abonos</button>';


        
        $data[] = $sub_array;
    }

    $results = array(
        "sEcho"=>1, //Información para el datatables
        "iTotalRecords"=>count($data), //enviamos el total registros al datatable
        "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
        "aaData"=>$data);
    echo json_encode($results);
    break;

}//cierre switch
  
?>