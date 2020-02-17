<?php


  //llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Producto
  require_once("../modelos/Movimientos.php");

  $envio = new Envios();

	switch ($_GET["op"]) {

case "listar_en_envios":
  $datos=$envio->get_productos_envio();
 	$data= Array();
    
    foreach($datos as $row)
		{
			$sub_array = array();
				  $stock="";
				  if($row["stock"]<=5){                      
            $stock = $row["stock"];
            $atributo = "badge bg-red-active";
                            
			} else {
				  $stock = $row["stock"];
          $atributo = "badge bg-green";
      }

				//$sub_array = array();
				$sub_array[] = $row["id_ingreso"];
                $sub_array[] = $row["id_producto"];
				$sub_array[] = $row["modelo"];
				$sub_array[] = $row["marca"];
				$sub_array[] = $row["color"];
				$sub_array[] = $row["medidas"];
                 $sub_array[] = '<span class="'.$atributo.'">'.$row["stock"].'</span>';				
            	$sub_array[] = $row["bodega"];
                $sub_array[] = $row["categoriaub"];
			$sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" class="btn btn-dark btn-md " onClick="traslado_Aros('.$row["id_producto"].','.$row["id_ingreso"].')"><i class="fa fa-plus"></i> Agrega Envio</button>';              
      //$data[] = $sub_array;
			$data[] = $sub_array;
	}


      $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


     break;
     
//////////////////LISTAR MODAL ENVIOS SSUCURSAL

case "listar_envios_sucursal":

  $datos=$envio->get_productos_envio();
  $data= Array();
    
    foreach($datos as $row)
    {
      $sub_array = array();
          $stock="";
          if($row["stock"]<=5){                      
            $stock = $row["stock"];
            $atributo = "badge bg-red-active";
                            
      } else {
          $stock = $row["stock"];
          $atributo = "badge bg-green";
      }

        //$sub_array = array();
      $sub_array[] = $row["id_producto"];
      $sub_array[] = $row["id_ingreso"];
        $sub_array[] = $row["modelo"];
        $sub_array[] = $row["marca"];
        $sub_array[] = $row["color"];
        $sub_array[] = $row["medidas"];
        $sub_array[] = '<span class="'.$atributo.'">'.$row["stock"].'</span>';        
        $sub_array[] = $row["bodega"];
        $sub_array[] = $row["categoriaub"];
      $sub_array[] = '<button type="button" name="" id="'.$row["id_producto"].'" class="btn btn-dark btn-md " onClick="trasladosaSucursal('.$row["id_producto"].','.$row["id_ingreso"].')"><i class="fa fa-plus"></i> Agrega Envio</button>';              
     
      $data[] = $sub_array;
  }


      $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);


     break;



 case "buscar_productos_envios";


        
    $datos=$envio->get_producto_por_id($_POST["id_producto"],$_POST["id_ingreso"]);

            /*comprobamos que el producto esté activo, de lo contrario no lo agrega
	      if(is_array($datos)==true and count($datos)>0){*/

				foreach($datos as $row)
				{
					
					$output["id_producto"] = $row["id_producto"];
					$output["modelo"] = $row["modelo"];
					$output["marca"] = $row["marca"];
					$output["color"] = $row["color"];
					//$output["precio_venta"] = $row["precio_venta"];
					$output["stock"] = $row["stock"];
				     
					
					
				}
		


	        echo json_encode($output);

     break;
     
case "buscar_producto_traslados";
          
        $datos=$envio->producto_tralado_por_id($_POST["id_producto"],$_POST["id_ingreso"]);

        foreach($datos as $row)
        {
          
          $output["id_producto"] = $row["id_producto"];
          $output["modelo"] = $row["modelo"];
          $output["marca"] = $row["marca"];
          $output["color"] = $row["color"];
          $output["medidas"] = $row["medidas"];
          $output["stock"] = $row["stock"];
          $output["categoriaub"] = $row["categoriaub"];     
          
          
        }

        echo json_encode($output);

     break;     


     case "registrar_ingreso";

	    $envio->agrega_detalle_ingreso();



     break;

     /*case "activarydesactivar":
              
                //los parametros id_usuario y est vienen por via ajax
              $datos = $usuarios->get_usuario_por_id($_POST["id_usuario"]);
                
                //valida el id del usuario
                 if(is_array($datos)==true and count($datos)>0){
                    
                    //edita el estado del usuario 
                    $usuarios->editar_estado($_POST["id_usuario"],$_POST["est"]);
                 }
         break;*/

         case "listar_requisiones":

         $datos = $envio->listar_requisiones();

         //declaramos el array

         $data = Array();


         foreach($datos as $row){

            
            $sub_array= array();

             //ESTADO
          $est = '';
         
           /*$atrib = "btn btn-warning btn-md estado";
          if($row["estado"] == 0){
            $est = 'PENDIENTE';
            $atrib = "btn btn-warning btn-md estado";
          }
          else{
            if($row["estado"] == 1){
              $est = 'ACTIVO';
              
            } 
          }*/


            //cargo

            /*if($row["cargo"]==1){

              $cargo="ADMINISTRADOR";

            } else{

              if($row["cargo"]==0){
                   
                   $cargo="EMPLEADO";
              }
            }*/


         $sub_array[]= $row["codigo_envio"];
         //$sub_array[] = $row["codigo_envio"];
         $sub_array[] = $row["sucursal_origen"];
         $sub_array[] = $row["sucursal_destino"];
         //$sub_array[] = $cargo;
         //$sub_array[] = $row[""];
         $sub_array[] = $row["usuario"];
         $sub_array[] = $row["modelo"];
         //$sub_array[] = date("d-m-Y",strtotime($row["fecha_ingreso"]));

              
         $sub_array[] = '<button type="button" name="estado"> Pendiente</button>';



        
       $data[]=$sub_array;
      
          
         }

         $results= array( 

         "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
         echo json_encode($results);


         break;
         
case "buscar_producto_traslados";
          
        $datos=$envio->producto_tralado_por_id($_POST["id_producto"]);

        foreach($datos as $row)
        {
          
          $output["id_producto"] = $row["id_producto"];
          $output["modelo"] = $row["modelo"];
          $output["marca"] = $row["marca"];
          $output["color"] = $row["color"];
          $output["medidas"] = $row["medidas"];
          $output["stock"] = $row["stock"];
          $output["categoriaub"] = $row["categoriaub"];     
          
          
        }

        echo json_encode($output);

     break;
    case "registrar_traslados_sucursal";
      $envio->traslado_a_sucursal();
    break;
    
     case 'select_gaveta_destino':

    if ($_POST['id_tipo']=='Metrocentro') {
      $html="
        <option value='Gav#24 ECONOMICO MASCULINO'>Gav#24 ECONOMICO MASCULINO</option>	
		<option value='Gav#23 ECONOMICO MASCULINO'>Gav#23 ECONOMICO MASCULINO</option>	
		<option value='Gav#21 ECONOMICO FEMENINO'>Gav#21 ECONOMICO FEMENINO</option>	
		<option value='Gav#20 MARCAS MASCULINO TODO TAMAÑO'>Gav#20 MARCAS MASCULINO TODO TAMAÑO</option>
		<option value='Gav#17 ECONOMICO FEMENINO/MASCULINO'>Gav#17 ECONOMICO FEMENINO/MASCULINO</option>	
		<option value='Gav#16 ANDVAS TODO COLOR MASCULINO/FEMENINO'>Gav#16 ANDVAS TODO COLOR MASCULINO/FEMENINO</option>	
		<option value='Gav#15 ANDVAS TODO COLOR MASCULINO/FEMENINO'>Gav#15 ANDVAS TODO COLOR MASCULINO/FEMENINO</option>	
		<option value='Gav#14 ANDVAS TODO COLOR MASCULINO/FEMENINO'>Gav#14 ANDVAS TODO COLOR MASCULINO/FEMENINO</option>	
		<option value='Gav#13 RAY-BAN MASCULINO MEDIANO/PEQUEÑO'>Gav#13 RAY-BAN MASCULINO MEDIANO/PEQUEÑO</option>
		<option value='Gav#12 RAY-BAN MASCULINO'>Gav#12 RAY-BAN MASCULINO</option>
	    <option value='Gav#11 MARCAS DEPORTIVO MASCULINO'>Gav#11 MARCAS DEPORTIVO MASCULINO</option>
	    <option value='Gav#15 ANDVAS TODO COLOR FEM/MASC'>Gav#15 ANDVAS TODO COLOR FEM/MASC</option>
		<option value='Gav#14 ANDVAS TODO COLOR'>Gav#14 ANDVAS TODO COLOR</option>
		<option value='Gav#9 MARCAS MASCULINO GRANDE'>Gav#9 MARCAS MASCULINO GRANDE</option>
		<option value='Gav#8 MARCAS MASCULINO MATE'>Gav#8 MARCAS MASCULINO MATE</option>
		<option value='Gav#7 MARCAS FEMENINO/MASCULINO OVALADOS'>Gav#7 MARCAS FEMENINO/MASCULINO OVALADOS</option>
		<option value='Gav#6 MARCAS FEMENINO MEDIANO PEQUEÑO'>Gav#6 MARCAS FEMENINO MEDIANO PEQUEÑO</option>
		<option value='Gav#5 MARCAS FEMENINO MEDIANOS/GRANDE'>Gav#5 MARCAS FEMENINO MEDIANOS/GRANDE</option>
		<option value='Gav#4 MARCAS FEMENINO TODO TAMAÑO'>Gav#4 MARCAS FEMENINO TODO TAMAÑO</option>
		<option value='Gav#3 MARCAS FEMENINO TODO TAMAÑO'>Gav#3 MARCAS FEMENINO TODO TAMAÑO</option>
		<option value='Gav#2 MARCAS NIÑO'>Gav#2 MARCAS NIÑO</option>
		<option value='Gav#1 ANDVAS NIÑO'>Gav#1 ANDVAS NIÑO</option>
		<option value='GAVETA ACCESORIOS'>GAVETA ACCESORIOS</option>
        <option value='MU#37 RAY BAN ACETATO METALICO#12'>MU#37 RAY BAN ACETATO METALICO#12</option>			
		<option value='MU#37 RAY BAN ACETATO#11'>MU#37 RAY BAN ACETATO#11</option>
		<option value='MU#37 RAY BAN ACETATO#10'>MU#37 RAY BAN ACETATO#10</option>
		<option value='MU#37 RAY BAN ACETATO#9'>MU#37 RAY BAN ACETATO#9</option>
		<option value='MU#37 RAY BAN ACETATO#8'>MU#37 RAY BAN ACETATO#8</option>	
		<option value='MU#37 RAY BAN ACETATO#7'>MU#37 RAY BAN ACETATO#7</option>
		<option value='MU#37 MARCAS ACETATO HOMBRE#6'>MU#37 MARCAS ACETATO HOMBRE#6</option>
		<option value='MU#37 MARCAS ACETATO HOMBRE#5'>MU#37 MARCAS ACETATO HOMBRE#5</option>	
		<option value='MU#37 MARCAS METAL FEMENINO#4'>MU#37 MARCAS METAL FEMENINO#4</option>
        <option value='MU#37 MARCAS ACETATO FEMENINO#3'>MU#37 MARCAS ACETATO FEMENINO#3</option>			
		<option value='MU#37 MARCAS ACETATO FEMENINO#2'>MU#37 MARCAS ACETATO FEMENINO#2</option>
	    <option value='MU#37 MARCAS ACETATO FEMENINO#1'>MU#37 MARCAS ACETATO FEMENINO#1</option>
	    <option value='MU#36 MARCAS METALICO MASCULINO#6'>MU#36 MARCAS METALICO MASCULINO#6</option>
	    <option value='MU#36 MARCAS METALICO MASCULINO#5'>MU#36 MARCAS METALICO MASCULINO#5</option>
	    <option value='MU#36 MARCAS METALICO MASCULINO#4'>MU#36 MARCAS METALICO MASCULINO#4</option>
		<option value='MU#36 ANDVAS#3'>MU#36 ANDVAS#3</option>
		<option value='MU#36 ANDVAS#2'>MU#36 ANDVAS#2</option>
		<option value='MU#36 ANDVAS#1'>MU#36 ANDVAS#1</option>
        <option value='EX#35 MARCAS FEMENINO, METAL-ACETATO'>EX#35 MARCAS FEMENINO, METAL-ACETATO</option>
        <option value='EX#34 RAYBAN METAL ACETATO'>EX#34 RAYBAN METAL ACETATO</option>
        <option value='EX#33 ANDVAS ACETATO'>EX#33 ANDVAS ACETATO</option>
        <option value='EX#32 MARCAS ACETATO METAL'>EX#32 MARCAS ACETATO METAL</option>
        <option value='EX#31 MARCAS INTERM. ACETATO METAL'>EX#31 MARCAS INTERM. ACETATO METAL</option>
        <option value='EX#30 ANDVAS ACETATO-METAL'>EX#30 ANDVAS ACETATO-METAL</option>
        <option value='ME#29 METAL MARCAS #37'>ME#29 METAL MARCAS #37</option>
        <option value='ME#29 METAL MARCAS #36'>ME#29 METAL MARCAS #36</option>
        <option value='ME#29 ACETATO MARCAS #35'>ME#29 ACETATO MARCAS #35</option>
        <option value='ME#29 ACETATO MARCAS #34'>ME#29 ACETATO MARCAS #34</option>
        <option value='ME#29 ACETATO MARCAS #33'>'ME#29 ACETATO MARCAS #33</option>
        <option value='ME#29 ACETATO RAYBAN #32'>'ME#29 ACETATO RAYBAN #32</option>
        <option value='ME#29 ACETATO RAYBAN #31'>'ME#29 ACETATO RAYBAN #31</option>
        <option value='ME#29 METAL ECONOMICO #30'>'ME#29 METAL ECONOMICO #30</option>
        <option value='ME#29 ACETATO ANDVAS #29'>ME#29 ACETATO ANDVAS #29</option>
        <option value='ME#29 ACETATO ANDVAS #28'>ME#29 ACETATO ANDVAS #28</option>
        <option value='ME#29 ACETATO ANDVAS #27'>ME#29 ACETATO ANDVAS #27</option>
        <option value='ME#29 ACETATO ANDVAS #26'>ME#29 ACETATO ANDVAS #26</option>
        <option value='ME#29 ACETATO ANDVAS #25'>ME#29 ACETATO ANDVAS #25</option>
        <option value='ME#28 ACETATO METAL MARCA #24'>ME#28 ACETATO METAL MARCA #24</option>
        <option value='ME#28 ACETATO PULL&BEAR #23'>ME#28 ACETATO PULL&BEAR #23</option>
        <option value='ME#28 ACETATO RAYBAN #22'>ME#28 ACETATO RAYBAN #22</option>
        <option value='ME#28 RAY BAN #21'>ME#28 RAY BAN #21</option>
        <option value='ME#28 ACETATO METAL ECONOMICO #20'>ME#28 ACETATO METAL ECONOMICO #20</option>
        <option value='ME#28 ACETATO METAL ECONOMICO #19'>ME#28 ACETATO METAL ECONOMICO #19</option>
        <option value='ME#28 ACETATO METALICO ECONOMICO #18'>ME#28 ACETATO METALICO ECONOMICO #18</option>
        <option value='ME#28 ACETATO ANDVAS #17'>ME#28 ACETATO ANDVAS #17</option>
        <option value='ME#28 ACETATO ANDVAS #16'>ME#28 ACETATO ANDVAS #16</option>
        <option value='ME#28 ACETATO ANDVAS #15'>ME#28 ACETATO ANDVAS #15</option>
        <option value='ME#28 ACETATO ANDVAS #14'>ME#28 ACETATO ANDVAS #14</option>
        <option value='ME#28 ACETATO ANDVAS #13'>ME#28 ACETATO ANDVAS #13</option>
        
        <option value='ME#27 MARCAS #12'>ME#27 MARCAS #12</option>
        <option value='ME#27 CONVERSE #11'>ME#27 CONVERSE #11</option>
        <option value='ME#27 CONVERSE #10'>ME#27 CONVERSE #10</option>
        <option value='ME#27 METAL #9'>ME#27 METAL #9</option>
        <option value='ME#27 METAL #8'>ME#27 METAL #8</option>
        <option value='ME#27 METAL #7'>ME#27 METAL #7</option>
        <option value='ME#27 METAL #6'>ME#27 METAL #6</option>
        <option value='ME#27 ANDVAS #5'>ME#27 ANDVAS #5</option>
        <option value='ME#27 ANDVAS #4'>ME#27 ANDVAS #4</option>
        <option value='ME#27 ANDVAS #3'>ME#27 ANDVAS #3</option>
        <option value='ME#27 ANDVAS #2'>ME#27 ANDVAS #2</option>
        <option value='ME#27 ANDVAS #1'>ME#27 ANDVAS #1</option>
        
        <option value='Gav#6 Marcas Femenino, mediano/Pequeño'>Gav#6 Marcas Femenino, mediano/Pequeño</option>
        	<option value='Gav#24 Economico Masculino, Todo tamaño, Meta'>Gav#24 Economico Masculino, Todo tamaño, Meta</option>
        <option value='Gav#20 Marcas, Masculino, Todo tamaño Metalic'>Gav#20 Marcas, Masculino, Todo tamaño Metalic</option>
      ";
      echo $html;
    }
    
    if ($_POST['id_tipo']=='Santa Ana') {
    $html="
    <option value=''>Seleccio25ne</option>
    <option value='Gav#24 ECONOMICO MASCULINO'>Gav#24 ECONOMICO MASCULINO</option>
    ";  
    echo $html;
  }  

  break;

}