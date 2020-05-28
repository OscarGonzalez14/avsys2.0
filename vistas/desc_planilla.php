<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){      
       
?>
<?php
 
  require_once("header.php");

?>


    <?php if($_SESSION["desc_planilla"]==1)
     {

     ?>


  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <h2>Listado Ordenes de Descuento</h2>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                          
                          <table id="listar_ordenes_descuento_data" class="table table-bordered table-striped">

                            <thead>                              
                                <tr>                                  
                                <th>Paciente</th>
                                <th>Empresa</th>
                                <th>Monto</th>
                                <th>Saldo</th>
                                <th>Imprimir</th>
                                </tr>
                            </thead>

                            <tbody>
                              

                            </tbody>


                          </table>
                     
                    </div>
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  
</div>
 <!--FIN FORMULARIO VENTANA MODAL-->


 
  <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/desc_planilla.js"></script>



<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

