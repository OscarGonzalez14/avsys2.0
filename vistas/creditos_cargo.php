
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
<?php require_once("modal/detalle_abonos_modal.php");?><br>
<h3 align="center" id="titulo_ventana_abono">ABONOS CARGOS</h3>

<ul class="breadcrumb">
  <li><a href="abonos.php">Regresar</a></li>
  <li><a href="recibos_emp.php">Recibos Empresarial</a></li>
 </ul>

<div class="row">
  <div class="col-sm-12" style="margin-left:35px;">
  <h4 align="center" id="titulo"></h4>
   <table id="creditos_cargo_auto" class="table table-bordered table-striped">
     <thead>
       <tr>
        <th style='text-align: left;'>Id</th>
        <th style='text-align: left;'>Paciente</th>
        <th style='text-align: left;'>Empresa</th>        
        <th style='text-align: left;'>Monto Creditos</th>
        <th style='text-align: left;'>Saldo</th>
        <th style='text-align: left;'>Cuota</th>
        <th style='text-align: left;'>Historial</th>                
        <th style='text-align: center;'>Abonar</th>      
        <th style='text-align: center;'>Imprimir Factura</th>
       </tr>
     </thead>
     <tbody>
     </tbody>
     <tfoot>
      <tr>
       <th></th>
        <th></th>
        <th></th>        
        <th id="monto_creditos_ca"></th>
        <th id="monto_saldo_ca"></th>
        <th id="monto_cuota_ca"></th>
        <!--<th id="monto_abonado"></th>-->
        <th></th>                
        <th></th>      
        <th></th>
      </tr>
     </tfoot>
   </table> 
  </div>

</div>
<hr style="height: 2px; width: 80%; color:black">

</div><!-- /.content-wrapper -->
 <div id="empresasModal" class="modal fade" data-modal-index="2">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EMPRESAS</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">        
             <table id="lista_pacientes_data_emp" class="table table-bordered table-striped">               
                <thead>
                  <tr>
                    <th >Codigo</th>          
                    <th >Nombre</th>
                    <th >Sucursal</th>
                    <th >Agregar</th>
                  </tr>
                </thead>               
              </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>

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

