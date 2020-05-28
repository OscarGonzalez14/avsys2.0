
<?php
/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

require_once("../config/conexion.php");
   if(isset($_SESSION["nombre"]) and isset($_SESSION["correo"])){

require_once("../modelos/Empresarial.php");

$empresarial=new Empresarial();


//$datos=$recibos->get_recibo_id($_GET["numero_venta"]);
//$venta=$recibos->get_detalle_venta($_GET["numero_recibo_pac"])
$datos_orden_descuento=$empresarial->get_datos_ordenes_print($_GET["numero_orden_pac"],$_GET["numero_paciente"]);
$fecha_hoy=date("m-Y");
$orden_numero=$_GET["numero_orden_pac"];


ob_start(); 

   
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Orden Descuento</title>
        
        <style>
          html {
                margin: 0;
          }
          body {
                font-family: "Times New Roman", serif;
                margin: 0mm 6mm 6mm 6mm;
          }
        </style>
        <link type="text/css" rel="stylesheet" href="dompdf/css/print_static.css"/>
    </head>
    <body>

<div><!--ENCABEZADO-->
<table style="width: 100%;margin: 0mm 2mm 2mm 2mm;">
<tr>
    <td width="20%"><h1 style="text-align: left; margin-right:20px;"><img src="../public/images/logooficial.jpg" width="150"/></h1></td>
    <td width="65%">
      <table style="width:95%;">
        <tr>
          <td style="text-align:center; font-size:20px;color:#034f84"><strong>OPTICA AV PLUS S.A de C.V.</strong></td>
        </tr>
        <tr>
          <td style="text-align:center; font-size:15px;color:#034f84"><strong>ORDEN DE DESCUENTO EN PLANILLA</strong></td>
        </tr>  
        <tr>
          <td style="text-align:center; font-size:12px"><span>San Salvador </span><?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy; ?></span></td>
        </tr>  
      </table><!--fin segunda tabla-->
    </td>
  <td width="10%">
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
</div><!-- FIN ENCABEZADO-->

<div  style="width:95%;margin-top:0px;"><!--DATOS PERSONALES-->
    <table width="80%" class="change_order_items">
<?php
  
  for($i=0;$i<sizeof($datos_orden_descuento);$i++){

?>

<tr style="font-size:10pt" class="even_row">
  <td style="text-align:left" colspan="100"><div align="left"><span class=""><span><strong>Empresa:&nbsp; <strong></span><?php echo $datos_orden_descuento[$i]["nombre"];?></span></div></td>    
</tr>

<tr><td style="font-size:13px" colspan="100"><span>Por la presente y de conformidad con el artículo No. 136 del código de trabajo,publicado en el Diario Oficial del 31 de julio de 1972, autorizo a Ud. A descontar de mi sueldo mensual que devengo en esta empresa como empleado(a) de la misma; la cantidad de:&nbsp;</span> <strong><u><span><?php echo "$&nbsp;".$datos_orden_descuento[$i]["saldo"];?></span></u></strong><span>&nbsp; en cuotas mensuales de:&nbsp;<strong><u><span><?php echo "$&nbsp;".number_format($datos_orden_descuento[$i]["monto_cuota"],2,".",",");?></span></u></strong> </span><span>las cuales deberán pagar por mi cuenta a partir del:&nbsp;<strong><span><?php echo $datos_orden_descuento[$i]["fecha_adquirido"];?></span> </strong> hasta : <strong><?php echo $datos_orden_descuento[$i]["finaliza_credito"];?></strong> hasta</span>.<span>durante el tiempo a finalizar la deuda; por tanto autorizo; a que se realicen los pagos en conceptos de productos y servicios visuales.</span><br><br><br></td>
</tr>
<tr>
  <td colspan="50" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Encargado de cuenta: </strong><span><?php echo $datos_orden_descuento[$i]["nombres"];?></span></td>
  <td colspan="26" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Ocupación: </strong><span><?php echo $datos_orden_descuento[$i]["ocupacion"];?></span></td>
  <td colspan="10" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Edad:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["edad"];?></span></td>
  <td colspan="14" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>DUI:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["dui"];?></span></td>
</tr>
<tr>
  <td colspan="20" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>NIT:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["nit"];?></span></td>
  <td colspan="20" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Celular:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["telefono"];?></span></td>
  <td colspan="30" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Telefono Oficina:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["telefono_oficina"];?></span></td>
      <td colspan="30" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Correo:&nbsp;</strong><span style="font-size:14px"><?php echo $datos_orden_descuento[$i]["correo"];?></span></td>
  </tr>
<tr>
  <td colspan="100" style="border: solid black 1px;border-top: solid black 1px;font-size:12px"><strong>Direccion completa:&nbsp;</strong><span><?php echo $datos_orden_descuento[$i]["direccion"];?></span></td>
</tr>
<tr>
  <td style="text-align:center;background:#D8D8D8" colspan="100"><strong>REFERENCIAS PERSONALES</strong></td>
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
<tr>
  <td colspan="100" style="text-align:center;background:#D8D8D8"><strong>DETALLE BENEFICIARIOS Y VENTAS</strong></td>
</tr>

<tr style="height:150px">
  <td colspan="100">
</td>
    <?php
//$numero=$_GET["numero_venta"];
$servername = "localhost";
$username = "oscargz";
$password = "oscar14";
$dbname = "avplu2";

$numero=$_GET["numero_orden_pac"];
$id_pac=$_GET["numero_paciente"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php

//$venta = $_GET["numero_venta"];

$sql3 = "select numero_orden,sum(precio_venta) as total,count(producto) as count from detalle_ventas where numero_orden='$numero';";
$resultados = $conn->query($sql3);
$sql2="select p.id_paciente,DATE_FORMAT(d.fecha_venta,'%d-%m-%Y')as fecha,p.nombres,d.producto,d.precio_venta,d.cantidad_venta,d.beneficiario,d.numero_venta from pacientes as p inner join detalle_ventas as d on p.id_paciente=d.id_paciente where p.id_paciente='$id_pac' and numero_orden='$numero' order by d.numero_venta asc";
$results = $conn->query($sql2);
 ?>
<div style="height:210px"><!--DETALLE VENTAS Y BENEFICIARIOS-->
<table style="width:100%;border:solid white 1px;border-collapse: collapse;border-radius: 30px;">
  <tr>
    <th style='background: #034f84;color: white;border-right:white solid 1px;font-size: 10px' colspan="15">FECHA VENTA</th>
    <th style='background: #034f84;color: white;border-right:white solid 1px;font-size: 10px' colspan="35">DESCRIPCION</th>
    <th style='background: #034f84;color: white;border-right:white solid 1px;font-size: 10px' colspan="5">PRECIO</th>
    <th style='background: #034f84;color: white;border-right:white solid 1px;font-size: 10px' colspan="5">CANTIDAD</th>
    <th style='background: #034f84;color: white;border-right:white solid 1px;font-size: 10px' colspan="35">BENEFICIARIO</th>
    <th style='background: #034f84;color: white;border-right:white solid 1px;font-size: 10px' colspan="5">No. VENTA</th>    
  </tr>   
  </tr>


<?php 
if ($results->num_rows > 0) {
  while($row = $results->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: center;border-right: 1px solid white;font-size:9' colspan='15'>". $row["fecha"]."</td>"."<td style='text-align: center;border-right: 1px solid white;font-size:9' colspan='35'>". $row["producto"]."</td>"."<td style='text-align: center;border-right: 1px solid white;font-size:9' colspan='5'>"."$". number_format($row["precio_venta"],2,".",",")."</td>"."<td style='text-align: center;border-right: 1px solid white;font-size:9' colspan='5'>".$row["cantidad_venta"]."</td>"."<td style='text-align: center;border-right: 1px solid white;font-size:9' colspan='35'>".$row["beneficiario"]."<td style='text-align: center;border-right: 1px solid white;font-size:9' colspan='5'>".$row["numero_venta"]. "</td>". "</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>
<tr>
  <td>
    <?php
      if ($resultados->num_rows > 0) {
  while($row = $resultados->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: right;border-top: 1px solid black;font-size:9' colspan='100'>".'<strong>'.'Numero de Productos:&nbsp;'.$row["count"]."&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Total $".number_format($row["total"],2,".",",").'</strong>'."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
$conn->close();
    ?>
  </td>
</tr>
</table>
</div>
</div>
    <!--FIN SERVICIOS PRESTADOS-->
  </td>
</tr>
</table>

</div><!--FIN DATOS PERSONALES-->
<span style="text-align:center;font-size:14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma del Solicitante:&nbsp;&nbsp;&nbsp;________________________&nbsp;&nbsp;&nbsp;Firma y Sello Óptica Av Plus:_________________________________</span>
<p style="text-align:center">***</p>
<table>
 
    <tr>
    <td style="text-align:center" colspan="100"><span style="font-size:13px"><strong>Area de RRHH y Departamento de Contabilidad</strong></span></td>
    </tr>
    <tr>
      <td colspan="100"><span style="font-size:13px"><strong>Presente:</strong></span><br>
  <span style="text-align:justify;font-size:13px">Al tomar nota de la carta anterior, me comprometo a descontar del sueldo mensual de Sr.(a) con nombre:&nbsp;______________________________ &nbsp;las cuotas de:&nbsp; _____________durante un periodo de tiempo que consta de:___________ para remitirlas a su cuenta con pago de forma:<br>___<strong>mensual<strong>&nbsp;&nbsp;&nbsp;___<strong>Quincenal.<strong>&nbsp;&nbsp;&nbsp;Cada fecha:&nbsp;&nbsp;&nbsp;_________________________</span><br><br>
   <span style="font-size:12px;text-align:center">Nombre del Tesorero o Pagador:__________________________________&nbsp;&nbsp;&nbsp;Sello de Aprobacion:___________________&nbsp;&nbsp;&nbsp;Telefonos:_______________</span><br></td>
    </tr>
  </tr>
</table><br>
  
<p align="center" style="text-align:center;font-size:12px">Metrocentro San Salvador 4ta Etapa, local No.7&nbsp;&nbsp;-&nbsp;&nbsp;<strong>Telefonos</strong>: 2260-1653&nbsp;&nbsp;&nbsp;<strong>E-mail:</strong> metrocentro@opticaavplussv.com<br>Santa Ana Plaza El Trebol&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<strong>Telefonos:</strong> 2445-3150&nbsp;&nbsp;&nbsp;<strong>E-mail:</strong> opticaavplussantana@gmail.com.com
 </p>
</body>
</html>


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
