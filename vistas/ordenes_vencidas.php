
<?php

require_once("../config/conexion.php");

if(isset($_SESSION["id_usuario"])){
    
    require_once("../modelos/Ordenes.php");
     
       $ordenes = new Ordenes();
        

?>

<?php require_once("header.php");?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1> ORDENES VENCIDAS</h1>
<div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="data_ordenes_vencidas_retraso" class="table table-bordered table-striped dataTable no-footer dtr-inline collapsed">
                <thead>
                <tr>
                  <th>No. Orden</th>
                  <th>Fecha Envio</th>
                  <th>Laboratorio</th>
                  <th>Sucursal</th>
                  <th>Nombre de Paciente</th>
                  <th>Tipo Lente</th>
                  <th>Horas Retraso</th>
                 </tr>
                </thead>                
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!--MODAL CREAR NUEVA ORDEN-->

</div>
<?php require_once("footer.php");?>
<script type="text/javascript" src="js/ordenes.js"></script>
<script>
<?php
   
 } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>







