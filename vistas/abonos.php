
<?php

 require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

     require_once("../modelos/Creditos.php");

     
       $venta = new Creditos();
    
?>


<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php require_once("header.php");?>

<!-- FIN DEL HEADER - LIBRERIAS -->



  <?php if($_SESSION["ventas"]==1)
     {

     ?>

<style>

  .tam,
  .tam:hover,
  .tam:active{

    weight: 400;

  }


</style>     
<div class="content-wrapper">        
        <!-- Main content -->

<?php require_once("modal/detalle_abonos_pac.php");?>

<div class="row">
<h1 align="center"> MODULO ABONOS</h1>
  <div class="col-sm-12"></div>
</div>

 <div class="row">
 <div class="col-sm-1"></div>
  <div class="col-sm-2">
    <a href="creditos_sucursal.php"><h1><button class="btn btn-blue btn-block abonos" id="metro"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Sucursal</button></h1></a>
   </div>

   <div class="col-sm-2">
  <a href="cobros_emp.php"><h1><button class="btn btn-blue btn-block" id="empresarial"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Empresarial</button></h1></a>
   </div>

      <div class="col-sm-3">
  <a href="creditos_cargo.php"><h1><button class="btn btn-dark btn-block" id="c_automatico"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Cargo Automatico</button></h1></a>
   </div>

      <div class="col-sm-3">
<h1><button class="btn btn-blue btn-block" id="metro" onClick="lista_creditos_personal()"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> C. Personales</button></h1>
   </div>
 <div class="col-sm-1"></div>
 
 </div><!--FIN ROW 1-->  


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
<!--<script type="text/javascript" src="js/ventas.js"></script>-->



<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>

