
<?php
/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

require_once("../config/conexion.php");
   if(isset($_SESSION["nombre"]) and isset($_SESSION["correo"])){

require_once("../modelos/Empresarial.php");

$empresarial=new Empresarial();


//$datos=$recibos->get_recibo_id($_GET["numero_venta"]);
//$venta=$recibos->get_detalle_venta($_GET["numero_recibo_pac"])
$datos_orden_descuento = $empresarial->get_datos_ordenes_print($get_num_orden =$_GET["numero_orden_pac"],$id_paciente =$_GET["numero_paciente"]);
$fecha_hoy=date("m-Y");


ob_start(); 

   
?>
<head>
  <meta charset="UTF-8"/>
</head>
<body style="margin:0px">
    
<script>
    n =  new Date();
    //Año
    y = n.getFullYear();
    //Mes
    m = n.getMonth() + 1;
    //Día
    d = n.getDate();
    h=n.getHours()+":"+n.getMinutes()+":"+n.getSeconds();
    document.getElementById("date").innerHTML = d + "/" + m + "/" + y+"  "+h;
</script>
   <style>
      html{margin-top: 0;
          margin-left: 30px;
          margin-bottom: 0;
         }
 
   </style> 
    
<link type="text/css" rel="stylesheet" href="dompdf/css/print_static.css"/>
<table style="width: 100%;">
<tr>
<td width="20%" height="111"><h1 style="text-align: left; margin-right:20px;"><img src="../public/images/logooficial.jpg" width="150" height="80"  /></h1></td>

<td width="70%" height="111">
<table style="width:95%;">

 <tr>
    <td style="text-align:center; font-size:12px"><strong>OPTICA AVPLUS S.A de C.V.</strong></td>
  </tr>

  <tr>
    <td style="text-align:center; font-size:12px">Boulevard de los Heroes. Centro Comercial Metrocentro Local#7 San Salvador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="date"></span></td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:12px"><span>Telefonos: 2260-1653&nbsp;&nbsp;&nbsp;</span>E-mail: metrocentro@opticaavplussv.com<br><span style="text-align:center; font-size:11px"></span></td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:12px"><span>San Salvador </span><?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy; ?></span></td>
  </tr>
  
  
</table><!--fin segunda tabla-->
</td>
<td width="10%" height="111">
<table>
    
  <tr>
    <td style="text-align:right; font-size:12px"><strong style="text-align:right; font-size:12px">No.Orden</strong></td>
  </tr>
  <tr>
    <td style="text-align:center;font-size:16px;color:red;"><?php echo $get_num_orden;?></td>
  </tr>
  
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna--> 
</tr>
</table>

<div style="height:360px;width:100%;margin-top:0px;">
    
  <table width="80%" class="change_order_items">

<?php
  
  for($i=0;$i<sizeof($datos_orden_descuento);$i++){

?>

<tr style="font-size:10pt" class="even_row">
  <td style="border: solid white 1px; text-align:left" colspan="100"><div align="left"><span class=""><span>Empresa: </span><?php echo $datos_orden_descuento[$i]["nombre"];?></span></div></td>    
</tr>

<tr><td style="border: solid white 1px;font-size:14px" colspan="100"><span>Por la presente y de conformidad con el artículo con el artículo No. 136 del código de trabajo,publicado en el Diario de Oficial del 31 de julio de 1972, autorizo a Ud. A descontar de mi sueldo mensual que devengo en esta empresa como empleado(a) de la misma; la cantidad de</span> <strong><u><span><?php echo "$".$datos_orden_descuento[$i]["monto"];?></span></u></strong><span>&nbsp; en cuotoas mensuales de:&nbsp;<strong><u><span><?php echo "$".number_format($datos_orden_descuento[$i]["cuotas"],2,".",",");?></span></u></strong> </span><span>las cuales deberán pagar por mi cuenta a partir del mes de&nbsp;<strong><span><?php echo $fecha_hoy;?></span> </strong> hasta el mes de: <strong><?php echo $datos_orden_descuento[$i]["fin_orden"];?></strong> hasta_________ </span>.<span>durante el tiempo a finalizar la deuda; por tanto autorizo; a que se realicen los pagos en conceptos de productos y servicios visuales.</span><br><br>Atentamente:<br><br>

  <strong>Nombre Compreto: </strong><u><span><?php echo $datos_orden_descuento[$i]["nombres"];?></span></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Función Laboral: </strong><u><span><?php echo $datos_orden_descuento[$i]["ocupacion"];?></span></u><br>
  <strong>DUI: </strong><u></u> 
</td>
</tr>
<?php
  }
?>
</table>
    
</div>


  <?php
  
  $salida_html = ob_get_contents();
  ob_end_clean(); 

    require_once("dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    //$dompdf->set_option('dpi', 256);
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream("Listado de Productos.pdf", array('Attachment'=>'0'));


  } else{

     header("Location:".Conectar::ruta()."vistas/index.php");
  }
    
?>
