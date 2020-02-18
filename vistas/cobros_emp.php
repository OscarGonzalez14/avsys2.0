
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

  <h2 align="center">ABONOS EMPRESARIAL</h2>
  
<div class="row">
  <div class="col-sm-12">
  <h4 align="center" id="titulo"></h4>
   <table id="creditos_empresarial" class="table table-bordered table-striped">
     <thead>
       <tr>
        <th>Paciente</th>
        <th>Monto</th>
        <th>Saldo</th>
        <th>Sucursal</th>
        <th>Abonar</th>        
        <th>Detalle Crédito</th>
        <th>Imprimir Factura</th>
       </tr>
     </thead>
     <tbody>
     </tbody>
   </table> 
  </div>

</div>

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



<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>

