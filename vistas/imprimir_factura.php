
<?php
/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

require_once("../config/conexion.php");
   if(isset($_SESSION["nombre"]) and isset($_SESSION["correo"])){

require_once("../modelos/Ventas.php");
require_once("../modelos/Creditos.php");


$detalle_venta =new Ventas();
$creditos =new Creditos();

$total_venta = $creditos->get_total_venta($_GET["numero_venta"]);

ob_start(); 

   
?>
<head>
  <meta charset="UTF-8"/>
</head>
<body style="margin:0px">
    
   <style>
      html{margin-top: 0;
          margin-left: 30px;
          margin-bottom: 0;
  }

 
   </style> 
    
<link type="text/css" rel="stylesheet" href="dompdf/css/print_static.css"/>
<div style="height:150px; border: solid 1px white;"></div>
<div style="height:300px; border: solid 1px white;">
<!---**********NOTAAAAAAA: CAMBIA AL SUBIR AL HOSTING CONECTION BD*************-->
<?php
$numero=$_GET["numero_venta"];
$servername = "localhost";
$username = "root";
$password = "oscar14";
$dbname = "avplu2";

echo $numero;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$venta = $_GET["numero_venta"];

$sql = "select d.cantidad_venta, d.producto,d.precio_venta*d.cantidad_venta as afectas,d.precio_venta,d.descuento,v.subtotal,d.importe from  detalle_ventas as d, ventas as v where d.numero_venta=v.numero_venta and d.numero_venta='$venta'";
$result = $conn->query($sql);
 ?>

<table style="width:100%;border:solid black 1px;border-collapse: collapse;border-radius: 30px;">
  <tr>
    <th style='background: #034f84;color: white'>Cantidad</th>
    <th style='background: #034f84;color: white' colspan="2">Descripcion</th>
    <th style='background: #034f84;color: white'>P. Unitario</th>
    <th style='background: #034f84;color: white'>Ventas no sujetas</th>
    <th style='background: #034f84;color: white'>Ventas Afectas</th>
  </tr>

<?php 
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {     
  echo "<tr style='border:black 1px solid;border-radius:8px;min-height:800px;'>"."<td style='text-align: center;border-right: 1px solid black'>". $row["cantidad_venta"]."</td>". "<td style='text-align: center;border-right: 1px solid black' colspan='2'>" . $row["producto"]. "</td>"."<td style='text-align: center;border-right: 1px solid black'>" . $row["precio_venta"]."<td>"."</td>". "</td>". "<td style='text-align: center;'>".$row["afectas"]."</td>"."</tr>";
 }//Fin while

} else {
    echo "0 results";
}
$conn->close();

?>

<?php 
for($j=0;$j<count($total_venta);$j++){
      
?>
<tr>
  <td colspan="4" rowspan="2" style="border:solid #034f84 1px">Son:<br></td>
  <td colspan="1" style="border:solid #034f84 1px;text-align:right;"><span><?php echo $total_venta[$j]["subtotal"];?></span></td>
</tr>
<tr>
  <td colspan="3" style="color:white; margin-top:solid white 1px">Son:<br></td>
 </tr>
    <?php } ?>
</table>
</div>



<div>
<div style="height:100px; border: solid 1px white;"></div>
<?php
$servername = "localhost";
$username = "root";
$password = "oscar14";
$dbname = "avplu2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$venta = $_GET["numero_venta"];

$sql = "select d.cantidad_venta, d.producto,d.precio_venta*d.cantidad_venta as afectas,d.precio_venta,d.descuento,v.subtotal,d.importe from  detalle_ventas as d, ventas as v where d.numero_venta=v.numero_venta and d.numero_venta='$venta'";
$result = $conn->query($sql);
 ?>
<table style="width:100%;border:solid black 1px;border-collapse: collapse;border-radius: 30px;">
  <tr>
    <th style='background: #034f84;color: white'>Cantidad</th>
    <th style='background: #034f84;color: white'>Descripcion</th>
    <th style='background: #034f84;color: white'>P. Unitario</th>
    <th style='background: #034f84;color: white'>Ventas Afectas</th>
  </tr>
<?php 


 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     
  echo "<tr style='border:black 1px solid;border-radius:8px;'>" ."<td style='text-align: center;border-right: 1px solid black'>". $row["cantidad_venta"]."</td>". "<td style='text-align: center;border-right: 1px solid black'>" . $row["producto"]. "</td>"."<td style='text-align: center;border-right: 1px solid black'>" . $row["afectas"]. "</td>". "<td style='text-align: center;'>".$row["precio_venta"]."</td>"."</tr>";

}
} else {
    echo "0 results";
}
$conn->close();

?>

<?php 
for($j=0;$j<count($total_venta);$j++){
      //echo $total_venta[$j]["subtotal"];
?>
<tr>
  <td colspan="3" style="border:solid blue 1px">Son Cantidad en Letras</td>

  <td colspan="1" style="border:solid blue 1px"><span><?php echo $total_venta[$j]["subtotal"];?></span></td>
</tr>
    <?php } ?>
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






