
<?php
/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

require_once("../config/conexion.php");
   if(isset($_SESSION["nombre"]) and isset($_SESSION["correo"])){

//require_once("../modelos/Empresarial.php");

//$empresarial=new Empresarial();
//$datos=$recibos->get_recibo_id($_GET["numero_venta"]);
//$venta=$recibos->get_detalle_venta($_GET["numero_recibo_pac"])
//$datos_orden_descuento=$empresarial->get_datos_ordenes_print($_GET["numero_orden_pac"],$_GET["numero_paciente"]);
//$fecha_hoy=date("m-Y");
//$orden_numero=$_GET["numero_orden_pac"];
ob_start(); 
   
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Corte de Caja</title>
        
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
<table style="width: 100%;">
<tr>
<td width="20%" height="111"><h1 style="text-align: left; margin-right:20px;"><img src="../public/images/logooficial.jpg" width="100" height="50"  /></h1></td>

<td width="70%" height="111">
<table style="width:95%;">

 <tr>
    <td style="text-align:center; font-size:18px"><strong>CORTE DE CAJA DIARIO</strong></td>
  </tr>
    
</table><!--fin segunda tabla-->
</td>
<td width="10%" height="111">
<table>
    
  <tr>
    <td style="text-align:right; font-size:12px"><strong style="text-align:right; font-size:12px">No. Corte</strong></td>
  </tr>
  <tr>
    <td style="text-align:right;font-size:15px;color:red;"><strong >No. <span><?php echo $get_num_rec;?></strong></td>
  </tr>  
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna--> 
</tr>
</table><div style="width:100%;margin-top:0px;">
<table style="width:100%">
<tr>
  <th bgcolor="black" colspan="100" style="font-size:12px;color:white;width:100%;text-align:center"><span >VENTAS DE CONTADO</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
    <th bgcolor="#034f84" colspan="25" style="font-size:12px;color:white;width:25%"><span >Nombre Cliente</span></th>
    <th bgcolor="#034f84" colspan="23" style="font-size:12px;color:white;width:23%"><span >Vendedor</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Monto Credito</span></th>
    <th bgcolor="#034f84" colspan="12" style="font-size:12px;color:white;width:12%"><span >Forma Cobro</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Total cobrado</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Saldo</span></th>
</tr>
<?php 
require_once("../config/mysqliconn.php");
date_default_timezone_set('America/El_Salvador'); $hoy = date("Y-m-d");
///////////////////VENTAS DE CONTADO
$sql3 = "select*from corte_diario where abonos_realizados='0' and fecha_ingreso='$hoy' and tipo_venta='Contado';";
$results= $conn->query($sql3);
//////////////VENTAS CREDITO EMPRESARIAL
$sql4 = "select*from corte_diario where abonos_realizados='0' and fecha_ingreso='$hoy' and tipo_venta='Credito' and tipo_pago='Descuento en Planilla';";
$venta_emp= $conn->query($sql4);
?>

<?php 
if ($results->num_rows > 0) {
  while($row = $results->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>". $row["total_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["tipo_pago"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;;width:10%' colspan='10'>". $row["monto_cobrado"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>". $row["saldo_credito"]."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>

<tr>
  <td><span style='color:white'>H</span></td>
</tr>
<tr>
  <th bgcolor="black" colspan="100" style="font-size:12px;color:white;width:100%;text-align:center"><span >VENTAS CREDITO EMPRESARIAL</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
    <th bgcolor="#034f84" colspan="25" style="font-size:12px;color:white;width:25%"><span >Nombre Cliente</span></th>
    <th bgcolor="#034f84" colspan="23" style="font-size:12px;color:white;width:23%"><span >Vendedor</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Monto Credito</span></th>
    <th bgcolor="#034f84" colspan="12" style="font-size:12px;color:white;width:12%"><span >Forma Cobro</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Total cobrado</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Saldo</span></th>
</tr>

<?php 
if ($venta_emp->num_rows > 0) {
  while($row = $venta_emp->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>". $row["total_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["tipo_pago"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;;width:10%' colspan='10'>". $row["monto_cobrado"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>". $row["saldo_credito"]."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>
</table>
<h5 style='text-align: center;'>RECUPERADO</h5>
</div>
<div>
<table style="width:100%">
<tr>
  <th bgcolor="#008080" colspan="100" style="font-size:12px;color:white;width:100%;text-align:center"><span >VENTAS DE CONTADO</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
    <th bgcolor="#034f84" colspan="25" style="font-size:12px;color:white;width:25%"><span >Nombre Cliente</span></th>
    <th bgcolor="#034f84" colspan="23" style="font-size:12px;color:white;width:23%"><span >Vendedor</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Monto Credito</span></th>
    <th bgcolor="#034f84" colspan="12" style="font-size:12px;color:white;width:12%"><span >Forma Cobro</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Total cobrado</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Saldo</span></th>
</tr>
<?php 
require_once("../config/mysqliconn.php");
date_default_timezone_set('America/El_Salvador'); $hoy = date("Y-m-d");
///////////////////VENTAS DE CONTADO
$sql7 = "select *from corte_diario where abonos_realizados>'0' and fecha_ingreso='$hoy' and tipo_venta='Contado';";
$recuperado_contado= $conn->query($sql7);
//////////////RECUPERADO CREDITO EMPRESARIAL
$sql5 = "select *from corte_diario where abonos_realizados>'0' and fecha_ingreso='$hoy' and tipo_pago='Descuento en Planilla';";
$recuperado_emp= $conn->query($sql5);
?>

<?php 
if ($recuperado_contado->num_rows > 0) {
  while($row = $recuperado_contado->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>". $row["total_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["tipo_pago"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;;width:10%' colspan='10'>"."$".number_format($row["monto_cobrado"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["saldo_credito"],2,".",",")."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>

<tr>
  <td><span style='color:white'>H</span></td>
</tr>
<tr>
  <th bgcolor="#008080" colspan="100" style="font-size:12px;color:white;width:100%;text-align:center"><span >VENTAS CREDITO EMPRESARIAL</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
    <th bgcolor="#034f84" colspan="25" style="font-size:12px;color:white;width:25%"><span >Nombre Cliente</span></th>
    <th bgcolor="#034f84" colspan="23" style="font-size:12px;color:white;width:23%"><span >Vendedor</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Monto Credito</span></th>
    <th bgcolor="#034f84" colspan="12" style="font-size:12px;color:white;width:12%"><span >Forma Cobro</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Total cobrado</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Saldo</span></th>
</tr>

<?php 
if ($recuperado_emp->num_rows > 0) {
  while($row = $recuperado_emp->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>". $row["total_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["tipo_pago"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;;width:10%' colspan='10'>". $row["monto_cobrado"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>". $row["saldo_credito"]."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>
</table>
</div>
</body>
</html>


  <?php
  
  $salida_html = ob_get_contents();
  date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy;
  $user=$_SESSION["id_usuario"];

  ob_end_clean(); 

    require_once("dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    $dompdf->set_paper('letter', 'landscape');
    //$dompdf->set_option('dpi', 256);
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream($hoy." ".$user, array('Attachment'=>'0'));


  } else{

     header("Location:".Conectar::ruta()."vistas/index.php");
  }
    
?>
