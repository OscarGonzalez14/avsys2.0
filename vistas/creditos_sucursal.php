
<?php

require_once("../config/conexion.php");
  if(isset($_SESSION["id_usuario"])){
  require_once("../modelos/Creditos.php");     
  
  $venta = new Creditos();
    
?>
<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php require_once("header.php");?>

<?php if($_SESSION["ventas"]==1)
  {

?>
   
<div class="content-wrapper">        
        <!-- Main content -->

<?php require_once("modal/detalle_abonos_pac.php");?>
<?php require_once("modal/detalle_abonos_modal.php");?>

<ul class="breadcrumb">
  <li><a href="abonos.php">Regresar</a></li>
  <li><a href="recibos_contado.php">Recibos contado</a></li>
 </ul>
<input type="hidden" name="id_empresa" id="cod_emp" class="form-control" style="border: solid #212529 1px;border-radius: 5px" readonly>
  <h3 align="center" id="titulo_ventana_abono">ABONOS DE CONTADO <?php echo strtoupper($_SESSION["sucursal"]);?></h3>

<div class="row">
  <div class="col-sm-12" style="margin-left:35px;">
  <h4 align="center" id="titulo"></h4>
   <table id="creditos_de_sucursal" class="table table-bordered table-striped">
     <thead>
       <tr>
        <th style='text-align: left;'>Id</th>
        <th style='text-align: left;'>Paciente</th>
        <th style='text-align: left;'>Empresa</th>        
        <th style='text-align: left;'>Monto Creditos</th>
        <th style='text-align: left;'>Saldo</th>
        <th style='text-align: left;'>#Venta</th>
        <th style='text-align: center;'>Abonar</th>
        <th style='text-align: left;'>Historial</th>
        <th style='text-align: center;'>Imprimir Factura</th>
       </tr>
     </thead>
     <tbody>
   </table> 
  </div>

</div>
<hr style="height: 2px; width: 80%; color:black">

</div><!-- /.content-wrapper -->
<script>
n =  new Date();
//Año
y = n.getFullYear();
//Mes
m = n.getMonth() + 1;
//Día
d = n.getDate();

h=n.getHours()+":"+n.getMinutes()+":"+n.getSeconds();

//Lo ordenas a gusto.
document.getElementById("fecha").innerHTML = d + "/" + m + "/" + y;
 </script>
  

   
  <?php  } else {

       require("noacceso.php");
  }
  
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

   <?php require_once("footer.php");?>


<script type="text/javascript" src="js/creditos.js"></script>
<script type="text/javascript" src="js/recibos.js"></script>
<script type="text/javascript" src="js/empresa.js"></script>
<script type="text/javascript" src="js/sum.js"></script>




<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>

