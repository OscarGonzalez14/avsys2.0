
<?php
/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

require_once("../config/conexion.php");
   if(isset($_SESSION["nombre"]) and isset($_SESSION["correo"])){

require_once("../modelos/Empresarial.php");

$empresarial=new Empresarial();


//$datos=$recibos->get_recibo_id($_GET["numero_venta"]);
//$venta=$recibos->get_detalle_venta($_GET["numero_recibo_pac"])
$datos_orden_descuento = $empresarial->get_datos_ordenes_print($_GET["numero_orden_pac"],$_GET["numero_paciente"]);
$fecha_hoy=date("m-Y");
$orden_numero=$_GET["numero_orden_pac"];


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
    <td style="text-align:center; font-size:24px;color:#034f84"><strong>OPTICA AV PLUS S.A de C.V.</strong></td>
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
    <td style="text-align:center;font-size:16px;color:red;"><?php echo $orden_numero;?></td>
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
  <td style="text-align:left" colspan="100"><div align="left"><span class=""><span><strong>Empresa:&nbsp; <strong></span><?php echo $datos_orden_descuento[$i]["nombre"];?></span></div></td>    
</tr>

<tr><td style="font-size:12px" colspan="100"><span>Por la presente y de conformidad con el artículo No. 136 del código de trabajo,publicado en el Diario Oficial del 31 de julio de 1972, autorizo a Ud. A descontar de mi sueldo mensual que devengo en esta empresa como empleado(a) de la misma; la cantidad de</span> <strong><u><span><?php echo "$".$datos_orden_descuento[$i]["saldo"];?></span></u></strong><span>&nbsp; en cuotas mensuales de:&nbsp;<strong><u><span><?php echo "$".number_format($datos_orden_descuento[$i]["monto_cuota"],2,".",",");?></span></u></strong> </span><span>las cuales deberán pagar por mi cuenta a partir del:&nbsp;<strong><span><?php echo $datos_orden_descuento[$i]["fecha_adquirido"];?></span> </strong> hasta : <strong><?php echo $datos_orden_descuento[$i]["finaliza_credito"];?></strong> hasta</span>.<span>durante el tiempo a finalizar la deuda; por tanto autorizo; a que se realicen los pagos en conceptos de productos y servicios visuales.</span><br><br><strong>Atentamente:</strong><br><br></td>
</tr>
<tr>
  <td colspan="70" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Nombre Compreto: </strong><span><?php echo $datos_orden_descuento[$i]["nombres"];?></span></td>
  <td colspan="30" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Ocupación: </strong><span><?php echo $datos_orden_descuento[$i]["ocupacion"];?></span></td>
</tr>
<tr>
  <td colspan="20" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Edad:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["edad"];?></span></td>
  <td colspan="30" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>DUI:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["dui"];?></span></td>
  <td colspan="25" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>NIT:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["nit"];?></span></td>
  <td colspan="25" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Celular:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["telefono"];?></span></td>
</tr>
<tr>
  <td colspan="100" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Direccion completa:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["direccion"];?></span></td>
</tr>
<tr>
  <td colspan="30" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Telefono Oficina:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["telefono_oficina"];?></span></td>
    <td colspan="70" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Correo:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["correo"];?></span></td> 
</tr>

<tr>
  <td style="text-align:center;font-size:14px;background:#D8D8D8" colspan="100">REFERENCIAS PERSONALES</td>
</tr>

<tr>
  <td colspan="60" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Referencia 1:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["referencia_uno"];?></span></td>
  <td colspan="40" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Telefono Referencia 1:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["tel_ref_uno"];?></span></td>
</tr>

<tr>
  <td colspan="60" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Referencia 2:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["referencia_dos"];?></span></td>
  <td colspan="40" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Telefono Refererencia 2:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["tel_ref_dos"];?></span></td>
</tr>
<tr>
  <td colspan="40" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Jefe Inmediato:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["jefe_inmediato"];?></span></td>
  <td colspan="30" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Tel. Jefe Inmediato:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["tel_jefe"];?></span></td>
  <td colspan="30" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Cargo:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["cargo_jefe"];?></span></td>
</tr>

<?php
  }
?>
</table>
    
</div>
<!--SERVICIO PRESTADO-->
<div style="margin-top: 13px;height:220px">
<h4 style="text-align:center"> SERVICIOS PRESTADOS</h4>
<?php
//$numero=$_GET["numero_venta"];
$servername = "localhost";
$username = "root";
$password = "oscar14";
$dbname = "avplu2";

$numero=$_GET["numero_orden_pac"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$venta = $_GET["numero_venta"];

$sql = "select RTRIM(producto) as productos, numero_venta,numero_orden from detalle_ventas where numero_orden='$numero' order by numero_venta;";
$result = $conn->query($sql);
 ?>

<table style="width:106%;border:solid black 1px;border-collapse: collapse;border-radius: 30px;">
  <tr>
    <th style='background: #034f84;color: white;border-right: black solid 1px;font-size: 12px' colspan="60">Descripcion</th>
    <th style='background: #034f84;color: white;border-right: black solid 1px;font-size: 12px' colspan="20">Numero venta</th>
    <th style='background: #034f84;color: white;border-right: black solid 1px;font-size: 12px' colspan="20">Numero Orden</th>
    
  </tr>

<?php 
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {     
  echo "<tr style='border:black 1px solid;border-radius:8px;min-height:800px;font-size:11;'>"."<td style='text-align: center;border-right: 1px solid black;font-size:11' colspan='60'>". $row["productos"]."</td>"."<td style='text-align: center;border-right: 1px solid black;font-size:11' colspan='20'>".$row["numero_venta"]. "</td>"."<td style='text-align: center;border-left: 1px solid black;font-size:11' colspan='20'>".$row["numero_orden"]."<td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
$conn->close();
?>
</table>
</div>
<div>
  <p align="center" style="text-align:center;font-size:12px">Firma del Solicitante:&nbsp;&nbsp;&nbsp;________________________&nbsp;&nbsp;&nbsp;Firma y Sello Óptica Av Plus:_________________________</p><br>
  <span style="font-size:12px">Presente:</span><br>
  <span style="text-align:justify;font-size:12px">Al tomar nota de la carta anterior, me comprometo a descontar del sueldo mensual de Sr.(a) con nombre:&nbsp;&nbsp;&nbsp;__________________________________________ las cuotas de durante un periodo de tiempo que consta de:___________ para remitirlas a su cuenta con pago de forma:&nbsp;&nbsp;&nbsp;___<strong>mensual<strong>&nbsp;&nbsp;&nbsp;___<strong>Quincenal.<strong><br>   Cada fecha:&nbsp;&nbsp;&nbsp;_________________________</span><br><br>
 <span style="font-size:12px;text-align:center">Nombre del Tesorero o Pagador:__________________________________&nbsp;&nbsp;&nbsp;Sello de Aprobacion:___________________&nbsp;&nbsp;&nbsp;Telefonos:_______________</span><br><br><br>

 <p align="center" style="text-align:center;font-size:12px">Metrocentro San Salvador 4ta Etapa No 7, San Salvador,&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Telefonos: 2260-1653&nbsp;&nbsp;&nbsp;E-mail: metrocentro@opticaavplussv.com<br>Santa Ana Plaza El Trebol
 </p>
 </div>
  <?php
  
  $salida_html = ob_get_contents();
  ob_end_clean(); 

    require_once("dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    //$dompdf->set_option('dpi', 256);
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream("Orden de Descuento.pdf", array('Attachment'=>'0'));


  } else{

     header("Location:".Conectar::ruta()."vistas/index.php");
  }
    
?>
