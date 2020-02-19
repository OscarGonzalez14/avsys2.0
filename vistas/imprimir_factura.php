
<?php
/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

require_once("../config/conexion.php");
   if(isset($_SESSION["nombre"]) and isset($_SESSION["correo"])){

require_once("../modelos/Ventas.php");

$detalle_venta =new Ventas();




ob_start(); 

   
?>
<body style="margin:0px">
    
   <style>
      html{margin-top: 0;
          margin-left: 30px;
          margin-bottom: 0;
         }
 
   </style> 
    
<link type="text/css" rel="stylesheet" href="dompdf/css/print_static.css"/>
<div>

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

$sql = "select d.cantidad_venta, d.producto,d.precio_venta,d.descuento,v.subtotal,d.importe from  detalle_ventas as d, ventas as v where d.numero_venta=v.numero_venta and d.numero_venta='$venta'";
$result = $conn->query($sql);
 ?>
<table style="width:100%;border:solid black 1px;">
  <tr>
    <th style='background: #034f84;color: white'>Cantidad</th>
    <th style='background: #034f84;color: white'>Descripcion</th>
    <th style='background: #034f84;color: white'>Ventas Afectas</th>
  </tr>
<?php 


 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     
  echo "<tr style='border:black 1px solid'>" ."<td style='text-align: center;border-right: 1px solid black'>". $row["cantidad_venta"]."</td>". "<td style='text-align: center;;border-right: 1px solid black'>" . $row["producto"]. "</td>". "<td style='text-align: center;'>".$row["precio_venta"]."</td>"."</tr>";
}
} else {
    echo "0 results";
}
$conn->close();


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






