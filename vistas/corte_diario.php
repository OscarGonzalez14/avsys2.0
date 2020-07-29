
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
                margin: 5mm 6mm 6mm 6mm;
          }
        </style>
        <link type="text/css" rel="stylesheet" href="dompdf/css/print_static.css"/>
    </head>
    <body>
<table style="width: 100%;">
<tr>
<td width="20%"><h1 style="text-align: left; margin-right:20px;"><img src="../public/images/logooficial.jpg" width="100" height="50"  /></h1></td>

<td width="65%">
<table style="width:95%;">

 <tr>
    <td style="text-align:center; font-size:18px"><strong>CORTE DE CAJA DIARIO</strong></td>
  </tr>
    
</table><!--fin segunda tabla-->
</td>
<td width="15%">
<table>
    <?php date_default_timezone_set('America/El_Salvador');
    $date_act = date("d-m-Y H:i:s");?>
  <tr>
    <td style="text-align:right; font-size:12px"><strong style="text-align:right; font-size:13px">No. Corte</strong></td>
  </tr>
  <tr>
    <td style="text-align:right;font-size:15px;color:red;"><span style="font-size:16px"><?php echo $date_act;?></strong></td>
  </tr>  
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna--> 
</tr>
</table><div style="width:100%;margin-top:0px;">
<table style="width:100%">
<tr>
  <th bgcolor="black" colspan="105" style="font-size:12px;color:white;width:100%;text-align:center"><span >VENTAS DE CONTADO</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Venta</span></th>
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
////////////ventas cargo automatico
$sql6 = "select*from corte_diario where abonos_realizados='0' and fecha_ingreso='$hoy' and tipo_venta='Credito' and tipo_pago='Cargo Automatico';";
$venta_cargo= $conn->query($sql6);
?>

<?php 
if ($results->num_rows > 0) {
  while($row = $results->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_venta"]."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["total_factura"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["tipo_pago"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;;width:10%' colspan='10'>".'$'.number_format($row["monto_cobrado"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["saldo_credito"],2,'.',',')."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>

<tr>
  <td><span style='color:white'>H</span></td>
</tr>
<tr>
  <th bgcolor="black" colspan="105" style="font-size:12px;color:white;width:100%;text-align:center"><span >VENTAS CREDITO EMPRESARIAL</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Venta</span></th>
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
  echo "<tr>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_venta"]."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["total_factura"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["tipo_pago"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["monto_cobrado"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["saldo_credito"],2,".",",")."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>
<tr>
  <td><span style='color:white'>H</span></td>
</tr>
<tr>
  <th bgcolor="black" colspan="105" style="font-size:12px;color:white;width:100%;text-align:center"><span >VENTAS CARGO AUTOMATICO</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Venta</span></th>
    <th bgcolor="#034f84" colspan="25" style="font-size:12px;color:white;width:25%"><span >Nombre Cliente</span></th>
    <th bgcolor="#034f84" colspan="23" style="font-size:12px;color:white;width:23%"><span >Vendedor</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Monto Credito</span></th>
    <th bgcolor="#034f84" colspan="12" style="font-size:12px;color:white;width:12%"><span >Forma Cobro</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Total cobrado</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Saldo</span></th>
</tr>
<?php 
if ($venta_cargo->num_rows > 0) {
  while($row = $venta_cargo->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_venta"]."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["total_factura"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["tipo_pago"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["monto_cobrado"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["saldo_credito"],2,".",",")."</td>"."</tr>";
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
  <th bgcolor="#008080" colspan="105" style="font-size:12px;color:white;width:100%;text-align:center"><span >RECUPERADO CONTADO</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Venta</span></th>
    <th bgcolor="#034f84" colspan="25" style="font-size:12px;color:white;width:25%"><span >Nombre Cliente</span></th>
    <th bgcolor="#034f84" colspan="23" style="font-size:12px;color:white;width:23%"><span >Vendedor</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Monto Credito</span></th>
    <th bgcolor="#034f84" colspan="12" style="font-size:12px;color:white;width:12%"><span >Forma Cobro</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Total cobrado</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Saldo</span></th>
</tr>
<?php 


///////////////////VENTAS DE CONTADO
$sql7 = "select *from corte_diario where abonos_realizados>'0' and fecha_ingreso='$hoy' and tipo_venta='Contado';";
$recuperado_contado= $conn->query($sql7);
//////////////RECUPERADO CREDITO EMPRESARIAL
$sql5 = "select*from corte_diario where abonos_realizados>'0' and fecha_ingreso='$hoy' and tipo_pago='Descuento en Planilla';";
$recuperado_emp= $conn->query($sql5);
$sql_ca = "select*from corte_diario where abonos_realizados>'0' and fecha_ingreso='$hoy' and tipo_pago='Cargo Automatico';";
$recuperado_cargos= $conn->query($sql_ca);
?>

<?php 
if ($recuperado_contado->num_rows > 0) {
  while($row = $recuperado_contado->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: center;;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_venta"]."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>".'$'.number_format($row["total_factura"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["forma_cobro"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;;width:10%' colspan='10'>"."$".number_format($row["monto_cobrado"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>"."$".number_format($row["saldo_credito"],2,".",",")."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>

<tr>
  <td><span style='color:white'>H</span></td>
</tr>
<tr>
  <th bgcolor="#008080" colspan="105" style="font-size:12px;color:white;width:100%;text-align:center"><span >RECUPERADO EMPRESARIAL</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Venta</span></th>
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
  echo "<tr>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_venta"]."</td>"."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>".'$'.number_format($row["total_factura"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["forma_cobro"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>".'$'.number_format($row["monto_cobrado"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>".'$'.number_format($row["saldo_credito"],2,".",",")."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>

<tr>
  <td><span style='color:white'>H</span></td>
</tr>
<tr>
  <th bgcolor="#008080" colspan="105" style="font-size:12px;color:white;width:100%;text-align:center"><span >RECUPERADO CARGO AUTOMATICO</span></th>
</tr>
  <tr>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Factura</span></th>
    <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Recibo</span></th>
     <th bgcolor="#034f84" colspan="5" style="font-size:12px;color:white;width:5%"><span >#Vendedor</span></th>
    <th bgcolor="#034f84" colspan="25" style="font-size:12px;color:white;width:25%"><span >Nombre Cliente</span></th>
    <th bgcolor="#034f84" colspan="23" style="font-size:12px;color:white;width:23%"><span >Vendedor</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Monto Credito</span></th>
    <th bgcolor="#034f84" colspan="12" style="font-size:12px;color:white;width:12%"><span >Forma Cobro</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Total cobrado</span></th>
    <th bgcolor="#034f84" colspan="10" style="font-size:12px;color:white;width:10%"><span >Saldo</span></th>
</tr>

<?php 
if ($recuperado_cargos->num_rows > 0) {
  while($row = $recuperado_cargos->fetch_assoc()) {     
  echo "<tr>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_factura"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_recibo"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:5%' colspan='5'>". $row["n_venta"]."</td>"."<td style='text-align: center;border: 1px solid blak;font-size:9;width:25%' colspan='25'>". $row["paciente"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:23%' colspan='23'>". $row["vendedor"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>".'$'.number_format($row["total_factura"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:12%' colspan='12'>". $row["forma_cobro"]."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>".'$'.number_format($row["monto_cobrado"],2,".",",")."</td>"."<td style='text-align: center;border: 1px solid black;font-size:9;width:10%' colspan='10'>".'$'.number_format($row["saldo_credito"],2,".",",")."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
?>
</table>
<?php

date_default_timezone_set('America/El_Salvador'); $fecha_hoy = date("d-m-Y"); 
////////////////RESUMEN VENTAS CONTADO
$sql11 = "select sum(subtotal) as ventas_cont from ventas where tipo_venta='Contado' and fecha_venta='$fecha_hoy';";
$venta_contado= $conn->query($sql11);
/////////////RESUMEN VENTAS CREDITO
$sql12 = "select sum(subtotal) as ventas_credito from ventas where tipo_venta='Credito' and fecha_venta='$fecha_hoy';";
$venta_credito= $conn->query($sql12);

//////////RECUPERADO CONTADO
$sql13 = "select sum(monto_cobrado) as contado_rec from corte_diario where abonos_realizados>'0' and fecha_ingreso='$hoy' and tipo_venta='Contado';";
$recu_contado= $conn->query($sql13);

//////////RECUPERADO CREDITO
$sql14 = "select sum(monto_cobrado) as credito_rec from corte_diario where abonos_realizados>'0' and fecha_ingreso='$hoy' and tipo_venta='Credito';";
$recu_credito= $conn->query($sql14);
///////////////////COBROS EFECTIVO
//$sql15 ="select sum(monto_cobrado) as cobro_efectivo from corte_diario where forma_cobro='Efectivo' and fecha_ingreso='$hoy';";
//$cobro_efectivo= $conn->query($sql15);
/////////COBROS SERFINSA
$sql16 ="select sum(monto_cobrado) as cobro_serfinsa from corte_diario where forma_cobro='SERFINSA' and fecha_ingreso='$hoy';";
$cobro_serfinsa= $conn->query($sql16);
////////////RECUPERADO CHEQUE
$sql17 ="select sum(monto_cobrado) as cobro_cheques from corte_diario where tipo_venta='Credito' and forma_cobro='Cheque' and fecha_ingreso='$hoy';";
$cobro_cheques= $conn->query($sql17);
//////////////////////RECUPERADO CREDITO-EFECTIVO
$sql18 ="select sum(monto_cobrado) as cobro_efectivos from corte_diario where tipo_venta='Credito' and forma_cobro='Efectivo' and fecha_ingreso='$hoy';";
$cobro_efectivos= $conn->query($sql18);
//////////RESUMEN RECUPERADO credito-t.credito
$sql19 ="select sum(monto_cobrado) as cobro_tar_cre from corte_diario where tipo_venta='Credito' and forma_cobro='Tarjeta de Credito' and fecha_ingreso='$hoy';";
$cobro_tar_cre= $conn->query($sql19);
/////RECUPRADO TARDEBITO
$sql20 ="select sum(monto_cobrado) as cobros_tar_deb from corte_diario where tipo_venta='Credito' and forma_cobro='Tarjeta de Debito' and fecha_ingreso='$hoy';";
$cobros_tar_deb= $conn->query($sql20);
//////////RECUPRADO CREDITO-CREDOMATIC
$sql21 ="select sum(monto_cobrado) as cobros_credomatic_cre from corte_diario where tipo_venta='Credito' and forma_cobro='Credomatic' and fecha_ingreso='$hoy';";
$cobros_credomatic_cre= $conn->query($sql21);
/////////////RECUPRADO DAVIVIENDA CREDITO
$sql22 ="select sum(monto_cobrado) as cobros_davivienda_cre from corte_diario where tipo_venta='Credito' and forma_cobro='Davivienda' and fecha_ingreso='$hoy';";
$cobros_davivienda_cre= $conn->query($sql22);
/////////////RECUPRADO AGRICOLA CREDITO
$sql23 ="select sum(monto_cobrado) as cobros_agricola_cre from corte_diario where tipo_venta='Credito' and forma_cobro='Agricola' and fecha_ingreso='$hoy';";
$cobros_agricola_cre= $conn->query($sql23);


/////////////////|||RECUPERADOS||||////////////////
/////////////////|||  CONTADO  ||||///////////////////
$sql24 ="select sum(monto_cobrado) as cobro_contado_rec from corte_diario where tipo_venta='Contado' and forma_cobro='Efectivo' and fecha_ingreso='$hoy';";
$cobro_contado_rec= $conn->query($sql24);
//////////RECUPERADO CONTADO CHEQUE
$sql25 ="select sum(monto_cobrado) as cobro_contado_cheque from corte_diario where tipo_venta='Contado' and forma_cobro='Cheque' and fecha_ingreso='$hoy';";
$cobro_contado_cheque= $conn->query($sql25);
?>
</div>
<h5 style='text-align: center;'>RESUMEN VENTAS Y COBROS</h5>
<table style="width: 100%;margin: 0mm 2mm 2mm 2mm;">
  <tr>
    <td colspan="24" style="text-align:center;font-size:12px;background:#008080;color:white">RESUMEN VENTAS</td>
    <td colspan="80" style="text-align:center;font-size:12px;background:black;color:white">RESUMEN VENTAS</td>    
  </tr>
  <tr>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="14">VENTAS CONTADO</td>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="10"><strong><?php if($venta_contado->num_rows>0){while($row = $venta_contado->fetch_assoc()){echo "$".number_format($row["ventas_cont"],2,".",",");}} ?></strong></td>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="9">EFECTIVO</td>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="9">CHEQUE</td>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="9">SERFINSA</td>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="9">T.CREDITO</td>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="10">T.DEBITO</td>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="10">CREDOMATIC</td>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="10">DAVIVIENDA</td>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="10">AGRICOLA</td>
</tr>
  <tr>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="14">VENTAS CREDITO</td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"><strong><?php if($venta_credito->num_rows>0){while($row = $venta_credito->fetch_assoc()){echo "$".number_format($row["ventas_credito"],2,".",",");}} ?></strong></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"></td>

    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"> </td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"></td>
</tr>
<tr>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="14">RECUPERADO CONT</td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"><strong><?php if($recu_contado->num_rows>0){while($row = $recu_contado->fetch_assoc()){echo "$".number_format($row["contado_rec"],2,".",",");}} ?></strong></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"><?php if($cobro_contado_rec->num_rows>0){while($row = $cobro_contado_rec->fetch_assoc()){echo "$".number_format($row["cobro_contado_rec"],2,".",",");}} ?></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"><?php if($cobro_contado_cheque->num_rows>0){while($row = $cobro_contado_cheque->fetch_assoc()){echo "$".number_format($row["cobro_contado_cheque"],2,".",",");}} ?></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"></td>

    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"> </td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"></td>
  </tr>

  <tr>
    <td style="font-size:11px;text-align:center;border: 1px solid black;" colspan="14">RECUPERADO CRED.</td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"><strong><?php if($recu_credito->num_rows>0){while($row = $recu_credito->fetch_assoc()){echo "$".number_format($row["credito_rec"],2,".",",");}} ?></strong></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"><?php if($cobro_efectivos->num_rows>0){while($row = $cobro_efectivos->fetch_assoc()){echo "$".number_format($row["cobro_efectivos"],2,".",",");}} ?></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"><?php if($cobro_cheques->num_rows>0){while($row = $cobro_cheques->fetch_assoc()){echo "$".number_format($row["cobro_cheques"],2,".",",");}} ?></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"><?php if($cobro_serfinsa->num_rows>0){while($row = $cobro_serfinsa->fetch_assoc()){echo "$".number_format($row["cobro_serfinsa"],2,".",",");}} ?></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="9"><?php if($cobro_tar_cre->num_rows>0){while($row = $cobro_tar_cre->fetch_assoc()){echo "$".number_format($row["cobro_tar_cre"],2,".",",");}} ?></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"><?php if($cobros_tar_deb->num_rows>0){while($row = $cobros_tar_deb->fetch_assoc()){echo "$".number_format($row["cobros_tar_deb"],2,".",",");}} ?></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"><?php if($cobros_credomatic_cre->num_rows>0){while($row = $cobros_credomatic_cre->fetch_assoc()){echo "$".number_format($row["cobros_credomatic_cre"],2,".",",");}} ?> </td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"> <?php if($cobros_davivienda_cre->num_rows>0){while($row = $cobros_davivienda_cre->fetch_assoc()){echo "$".number_format($row["cobros_davivienda_cre"],2,".",",");}} ?></td>
    <td style="font-size:12px;text-align:center;border: 1px solid black;" colspan="10"> <?php if($cobros_agricola_cre->num_rows>0){while($row = $cobros_agricola_cre->fetch_assoc()){echo "$".number_format($row["cobros_agricola_cre"],2,".",",");}} ?></td>    
  </tr>
</table>
<br>
<div style="font-size:12px;text-align:center;">
  <span>Elaborado por: ________________________________&nbsp;&nbsp;&nbsp;</span><span>Recibido por: _________________________________</span>
</div>
</body>
</html>


  <?php
  
  $salida_html = ob_get_contents();
 
  $user=$_SESSION["id_usuario"];

  ob_end_clean(); 

    require_once("dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    $dompdf->set_paper('letter', 'landscape');
    //$dompdf->set_option('dpi', 256);
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream($date_act." ".$user, array('Attachment'=>'0'));


  } else{

     header("Location:".Conectar::ruta()."vistas/index.php");
  }
    
?>
