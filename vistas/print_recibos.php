
<?php
/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

require_once("../config/conexion.php");
   if(isset($_SESSION["nombre"]) and isset($_SESSION["correo"])){

require_once("../modelos/Recibos.php");

$recibos=new Recibos();


//$datos=$recibos->get_recibo_id($_GET["numero_venta"]);
//$venta=$recibos->get_detalle_venta($_GET["numero_recibo_pac"]);
$datos_recibo = $recibos->print_recibo_paciente($_GET["numero_recibo_pac"]);
$get_num_rec =$_GET["numero_recibo_pac"];
///////


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

<td width="65%" height="111">
<table style="width:95%;">

 <tr>
    <td style="text-align:center; font-size:12px"><strong>OPTICA AVPLUS S.A de C.V.</strong></td>
  </tr>

  <tr>
    <td style="text-align:center; font-size:12px"><strong>GIRO: </strong>OTROS SERVICIO RELACIONADOS CON LA SALUD</td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:12px">Boulevard de los Heroes. Centro Comercial Metrocentro Local#7 San Salvador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="date"></span></td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:12px"><span>Telefonos: 2260-1653&nbsp;&nbsp;&nbsp;</span>E-mail: metrocentro@opticaavplussv.com<br><span style="text-align:center; font-size:11px"><?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy; ?></span></td>
  </tr>
  
  
</table><!--fin segunda tabla-->
</td>
<td width="15%" height="111">
<table>
    
  <tr>
    <td style="text-align:right; font-size:12px"><strong style="text-align:right; font-size:12px">RECIBO</strong></td>
  </tr>
  <tr>
    <td style="text-align:right;font-size:13px;color:red;"><strong >No.&nbsp;<span><?php echo $get_num_rec;?></strong></td>
  </tr>
  
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna--> 
</tr>
</table>

<div style="height:360px;width:100%;margin-top:0px;">
    
    <table width="80%" class="change_order_items">

<tr>
    <th bgcolor="#034f84" colspan="57" style="padding:4px;border:black 0.5px solid;color:white"><span class="Estilo11">RECIBI DE</span></th>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 0.5px solid;color:white"><span class="Estilo11">TELEFONO</span></th>
    <th bgcolor="#034f84" colspan="24" style="padding:4px;border:black 0.5px solid;color:white"><span class="Estilo11">EMPRESA</span></th>
</tr>


<?php
  
  for($i=0;$i<sizeof($datos_recibo);$i++){

?>

<tr style="font-size:10pt" class="even_row">
    <td style="text-align: center" colspan="57"><div align="center"><span class=""><?php echo $datos_recibo[$i]["nombres"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo $datos_recibo[$i]["telefono"];?></span></div></td>
    <td style="text-align: right" colspan="24"><div align="center"><span class=""><?php echo $datos_recibo[$i]["nombre"];?></span></div></td>
</tr>

<tr>
    <td style="text-align: right" colspan="76"><div align="center"><span style="font-size: 12px"><strong>CANTIDAD EN LETRAS: </strong> <?php echo $datos_recibo[$i]["cant_letras"];?></span></div></td>
    <td style="text-align: right" colspan="24"><div align="center"><span class="" style="font-size: 12px"><strong>PROXIMO ABONO: </strong><?php echo $datos_recibo[$i]["prox_abono"];?></span></div></td>
</tr>
<tr>
    <td  colspan="100" style="border: white 1px solid;padding: 5px"></td>
    
</tr>
<tr>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">MONTO</span></th>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">ABONO ANT.</span></th>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">ABONO ACTUAL</span></th>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">SALDO</span></th>
    <th bgcolor="#034f84" colspan="24" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">FORMA DE PAGO</span></th>
</tr>

<tr style="font-size:10pt" class="even_row">
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo "$ ".$datos_recibo[$i]["monto"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo $datos_recibo[$i]["a_anteriores"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo "$ ".$datos_recibo[$i]["abono_act"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo "$ ".$datos_recibo[$i]["saldo"];?></span></div></td>
    <td style="text-align: center" colspan="24"><div align="center"><span class=""><?php echo $datos_recibo[$i]["forma_pago"];?></span></div></td>
</tr>


<tr style="font-size:10pt" class="even_row">
    <td style="text-align: center" colspan="19"><div align="center"><span class="">Marca Aro</span></div></td>
    <td style="text-align: center;color:#034f84;font-size:11px" colspan="19"><div align="center"><span class=""><strong><?php echo $datos_recibo[$i]["marca_aro"];?></strong></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class="">Modelo</span></div></td>
    <td style="text-align: center;color:#034f84;font-size:11px" colspan="19"><div align="center"><span class=""><strong><?php echo $datos_recibo[$i]["modelo_aro"];?></strong></span></div></td>
    <td style="text-align: center" colspan="8"><div align="center"><span class="">Color</span></div></td>
    <td style="text-align: center;color:#034f84;font-size:11px" colspan="16"><div align="center"><span class=""><strong><?php echo $datos_recibo[$i]["color_aro"];?></strong></span></div></td>
</tr>

<tr style="font-size:10pt" class="even_row">
    <td style="text-align: center" colspan="19"><div align="center"><span class="">Lente</span></span></div></td>
    <td style="text-align: center;color:#034f84;font-size:9px" colspan="19"><div align="center"><span class=""><?php echo $datos_recibo[$i]["lente"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class="">Tipo AR</span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""></span></div></td>
    <td style="text-align: center" colspan="8"><div align="center"><span class=""style="font-size:14px;text-align:left">Photosensible</span></div></td>
    <td style="text-align: center" colspan="16"><div align="center"><span class=""></span></div></td>
</tr>
<tr>
    <td style="text-align: center" colspan="19"><div align="center"><span>Observaciones</span></div></td>
    <td style="text-align: center" colspan="81"><div align="center"><span class=""></span></div></td>
</tr>
<br><br><br><br>
<tr>
    <td  colspan="100" style="border: white 1px solid;padding: 5px"></td>
    
</tr>
<tr>
    <td  colspan="40" style="border: white 1px solid;padding: 5px">Firma paciente:___________________________</td>
    <td  colspan="30" style="border: white 1px solid;padding: 5px"><div align="center"><span class=""><?php echo "Asesor:".": ".$datos_recibo[$i]["id_usuario"];?></span></div></td>
    <td  colspan="30" style="border: white 1px solid;padding: 5px"><div align="center"><span class=""><?php echo $datos_recibo[$i]["numero_venta"];?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:12px"><strong>Original: Emisor</strong></span</div></td>
</tr>

<?php
  }
?>

</table>


</div>


<!--Recibo parte 2-->
<table style="width: 100%;">
<tr>
<td width="20%" height="111"><h1 style="text-align: left; margin-right:20px;"><img src="../public/images/logooficial.jpg" width="150" height="80"  /></h1></td>

<td width="65%" height="111">
<table style="width:95%;">

 <tr>
    <td style="text-align:center; font-size:12px"><strong>OPTICA AVPLUS S.A de C.V.</strong></td>
  </tr>

  <tr>
    <td style="text-align:center; font-size:12px"><strong>GIRO: </strong>OTROS SERVICIO RELACIONADOS CON LA SALUD</td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:12px">Boulevard de los Heroes. Centro Comercial Metrocentro Local#7 San Salvador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="date"></span></td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:12px"><span>Telefonos: 2260-1653&nbsp;&nbsp;&nbsp;</span>E-mail: metrocentro@opticaavplussv.com<br><span style="text-align:center; font-size:11px"><?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy; ?></span></td>
  </tr>
  
  
</table><!--fin segunda tabla-->
</td>
<td width="15%" height="111">
<table>
    
  <tr>
    <td style="text-align:right; font-size:12px"><strong style="text-align:right; font-size:12px">RECIBO</strong></td>
  </tr>
  <tr>
    <td style="text-align:right;font-size:13px;color:red;"><strong >No.&nbsp;<span><?php echo $get_num_rec;?></strong></td>
  </tr>
</table><!--fin segunda tabla-->
</td> <!--fin segunda columna--> 
</tr>
</table>

<div style="height:360px;width:100%;margin-top:0px;">
    
    <table width="80%" class="change_order_items">

<tr>
    <th bgcolor="#034f84" colspan="57" style="padding:4px;border:black 0.5px solid;color:white"><span class="Estilo11">RECIBI DE</span></th>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 0.5px solid;color:white"><span class="Estilo11">TELEFONO</span></th>
    <th bgcolor="#034f84" colspan="24" style="padding:4px;border:black 0.5px solid;color:white"><span class="Estilo11">EMPRESA</span></th>
</tr>


<?php
  
  for($i=0;$i<sizeof($datos_recibo);$i++){

?>

<tr style="font-size:10pt" class="even_row">
    <td style="text-align: center" colspan="57"><div align="center"><span class=""><?php echo $datos_recibo[$i]["nombres"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo $datos_recibo[$i]["telefono"];?></span></div></td>
    <td style="text-align: right" colspan="24"><div align="center"><span class=""><?php echo $datos_recibo[$i]["nombre"];?></span></div></td>
</tr>

<tr>
    <td style="text-align: right" colspan="76"><div align="center"><span style="font-size: 12px"><strong>CANTIDAD EN LETRAS: </strong> <?php echo $datos_recibo[$i]["cant_letras"];?></span></div></td>
    <td style="text-align: right" colspan="24"><div align="center"><span class="" style="font-size: 12px"><strong>PROXIMO ABONO: </strong><?php echo $datos_recibo[$i]["prox_abono"];?></span></div></td>
</tr>
<tr>
    <td  colspan="100" style="border: white 1px solid;padding: 5px"></td>
    
</tr>
<tr>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">MONTO</span></th>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">ABONO ANT.</span></th>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">ABONO ACTUAL</span></th>
    <th bgcolor="#034f84" colspan="19" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">SALDO</span></th>
    <th bgcolor="#034f84" colspan="24" style="padding:4px;border:black 1px solid;color:white;"><span class="Estilo11">FORMA DE PAGO</span></th>
</tr>

<tr style="font-size:10pt" class="even_row">
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo "$ ".$datos_recibo[$i]["monto"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo $datos_recibo[$i]["a_anteriores"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo "$ ".$datos_recibo[$i]["abono_act"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""><?php echo "$ ".$datos_recibo[$i]["saldo"];?></span></div></td>
    <td style="text-align: center" colspan="24"><div align="center"><span class=""><?php echo $datos_recibo[$i]["forma_pago"];?></span></div></td>
</tr>

<tr style="font-size:10pt" class="even_row">
    <td style="text-align: center" colspan="19"><div align="center"><span class="">Marca Aro</span></div></td>
    <td style="text-align: center;color:#034f84;font-size:11px" colspan="19"><div align="center"><span class=""><strong><?php echo $datos_recibo[$i]["marca_aro"];?></strong></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class="">Modelo</span></div></td>
    <td style="text-align: center;color:#034f84;font-size:11px" colspan="19"><div align="center"><span class=""><strong><?php echo $datos_recibo[$i]["modelo_aro"];?></strong></span></div></td>
    <td style="text-align: center" colspan="8"><div align="center"><span class="">Color</span></div></td>
    <td style="text-align: center;color:#034f84;font-size:11px" colspan="16"><div align="center"><span class=""><strong><?php echo $datos_recibo[$i]["color_aro"];?></strong></span></div></td>
</tr>

<tr style="font-size:10pt" class="even_row">
    <td style="text-align: center" colspan="19"><div align="center"><span class="">Lente</span></span></div></td>
    <td style="text-align: center;color:#034f84;font-size:9px" colspan="19"><div align="center"><span class=""><?php echo $datos_recibo[$i]["lente"];?></span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class="">Tipo AR</span></div></td>
    <td style="text-align: center" colspan="19"><div align="center"><span class=""></span></div></td>
    <td style="text-align: center" colspan="8"><div align="center"><span class=""style="font-size:14px;text-align:left">Photosensible</span></div></td>
    <td style="text-align: center" colspan="16"><div align="center"><span class=""></span></div></td>
</tr>

<tr>
    <td style="text-align: center" colspan="19"><div align="center"><span>Observaciones</span></div></td>
    <td style="text-align: center" colspan="81"><div align="center"><span class=""></span></div></td>
</tr>
<br><br><br><br>
<tr>
    <td  colspan="100" style="border: white 1px solid;padding: 5px"></td>
    
</tr>
<tr>
    <td  colspan="40" style="border: white 1px solid;padding: 5px">Firma paciente:___________________________</td>
    <td  colspan="30" style="border: white 1px solid;padding: 5px"><div align="center"><span class=""><?php echo "Asesor:".": ".$datos_recibo[$i]["id_usuario"];?></span></div></td>
    <td  colspan="30" style="border: white 1px solid;padding: 5px"><div align="center"><span class=""><?php echo $datos_recibo[$i]["numero_venta"];?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:12px"><strong>Duplicado: Cliente</strong></span</div></td>
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
