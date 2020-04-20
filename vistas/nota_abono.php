
<?php
/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

require_once("../config/conexion.php");
   if(isset($_SESSION["nombre"]) and isset($_SESSION["correo"])){

require_once("../modelos/Empresarial.php");

$empresarial=new Empresarial();


//$datos=$recibos->get_recibo_id($_GET["numero_venta"]);
//$venta=$recibos->get_detalle_venta($_GET["numero_recibo_pac"])
$datos_nota_abono = $empresarial->nota_abonos_print($_GET["numero_orden_pac"],$_GET["numero_paciente"]);
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
    <td style="text-align:center; font-size:16px;color:#034f84"><strong>PAGARÉ SIN PROTESTO</strong></td>
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
<?php
  
  for($i=0;$i<sizeof($datos_nota_abono);$i++){

?>
<p style="font-size:16px;text-align:justify">
  Por: <strong>$<span><?php echo number_format($datos_nota_abono[$i]["saldo"],2,".",",");?></span></strong>
<br><br><br>

Por este pagaré,  Yo:<strong><span>&nbsp;<?php echo $datos_nota_abono[$i]["nombres"];?></span></strong>  de <strong><span>&nbsp;<?php echo $datos_nota_abono[$i]["edad"];?></span></strong>   años de edad; del domicilio de:<strong><span>&nbsp;<?php echo $datos_nota_abono[$i]["direccion"];?> </span></strong>   Departamento de: San Salvador  con Documento Único de Identidad número: <strong><span>&nbsp;<?php echo $datos_nota_abono[$i]["dui"];?></span></strong>(en adelante, “el Deudor”), prometo pagar incondicionalmente a Optica AV Plus S. A. de C. V. de este  domicilio,  con número de Identificación Tributaria No. 0614 191018 101 1 (Adelante, el “Acreedor”), la suma de &nbsp;<strong>$<span><?php echo number_format($datos_nota_abono[$i]["saldo"],2,".",",");?></span></strong>&nbsp;Dolares de Estados Unidos de America, moneda de curso legal, en dinero en efectivo, en caso de retraso el día sesenta.  El Deudor cancelará la presente obligación mediante un solo pago. El pago lo hará el Deudor en cualquiera de las sucursales de Optica AV Plus.<br><br><br>

<strong>La suma adeudada contenida en este pagaré, devengará los siguientes intereses:</strong><br>

a)&nbsp;<u>De 01 a 60 días posteriores al plazo de pago, el cero por ciento de interés (0.0%).</u><br>
b)&nbsp;<u>De 61 a 90 días posteriores al plazo de pago, el cinco por ciento de interés (5%) anual.</u><br>
c)&nbsp;<u>De 91 en adelante al plazo de pago, un diez por ciento de interés (10.0%) anual.</u><br><br><br>

En caso de incumplimiento de pago en los términos aquí prometidos o de incumplimiento de cualquier otro compromiso aquí establecido, el Acreedor podrá tener por vencida, liquida y exigible la obligación y recurrir legalmente a su cobro, renunciando el Deudor a su domicilio y a los requerimientos de pago. En caso de ejecución, el Deudor responderá por la suma que se le adeude al Acreedor en ese momento por concepto de capital así como los intereses ordinarios que adeude conforme a las tasas referidas. La obligación del Deudor se origina de operaciones mercantiles entre el Acreedor y el Deudor. Este título se rige por las disposiciones del Código de Comercio y se suscribe en San Salvador, El Salvador.<br><br><br>

Para los efectos de esta obligación mercantil el Deudor fija como domicilio especial la ciudad de San Salvador, a cuyos tribunales se somete y en caso de acción judicial renuncia al derecho de apelar del decreto de embargo, sentencia de remate y de toda otra providencia apelable que se dictare en su contra en el juicio mercantil ejecutivo o en sus incidentes, siendo a cargo del Deudor los costos procesales y cualquier otro gastos que el Acreedor hiciere en el cobro de este Pagaré, inclusive los llamados gastos personales y aun cuando por regla general no hubiere condenación en costos y faculta al Acreedor para que designe a su entera libertad a la persona depositaria de los bienes que se embarguen, a quien releva de la obligación de rendir fianza.<br><br><br>

Firmo de conformidad de lo anteriormente mencionado<br>

San Salvador, El Salvador,&nbsp;<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy; ?><br><br>
Firma  Deudor: ______________________
</p>
<?php
  }
?>
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
