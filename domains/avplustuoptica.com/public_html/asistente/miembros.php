<?php

switch ($_GET["op"]) {

	case 'periodo_pagos':


	if ($_POST['id_tipo']=='debito') {
		$html="
			
			<option value='15'>15 c/mes</option>
			<option value='30'>30 c/mes</option>			
			";
	
		echo $html;

	}elseif($_POST['id_tipo']=='credito'){

	
	$html= "

		<option value='Descuento en Planilla'>Fecha Actual de c/mes</option>
	 	
	 	";
	
		echo $html;
		}else{

	$html= "<option value=''>Seleccione</option>
	";
	
		echo $html;
		}

		
break;
	
}

