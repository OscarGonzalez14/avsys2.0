<?php
   require_once("../config/conexion.php");
    if(isset($_SESSION["id_usuario"])){
     require_once("../modelos/Recibos.php");
     $empresa = new Recibos();
     $emp = $empresa->listar_empresas_recibo();  
?>

<?php 
  require_once("header.php");
?>
<?php if($_SESSION["ventas"]==1){
?>
  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
        <!-- Main content -->
<ul class="breadcrumb">
  <li><a href="creditos_sucursal.php">Regresar</a></li>
</ul>
<section class="content">             
    <div id="resultados_ajax"></div>
        <h3>RECIBOS EMPRESARIAL</h3>
<div class="panel panel-default">
        
        <div class="panel-body">

            <form class="form-inline">
              <div class="form-group">
               
                 <div class="col-sm-10">
                    <select name="recibo" id="mes_recibo" class="form-control">
                                <option value="todos">MES</option>
                                <option value="01">ENERO</option>
                                <option value="02">FEBRERO</option>
                                <option value="03">MARZO</option>
                                <option value="04">ABRIL</option>
                                <option value="05">MAYO</option>
                                <option value="06">JUNIO</option>
                                <option value="07">JULIO</option>
                                <option value="08">AGOSTO</option>
                                <option value="09">SEPTIEMBRE</option>
                                <option value="10">OCTUBRE</option>
                                <option value="11">NOVIEMBRE</option>
                                <option value="12">DICIEMBRE</option>
                              </select>
                 </div>
              </div>

              <div class="form-group row">
                
                <div class="col-sm-10">
                  <select name="ano_recibo" id="ano_recibo" class="form-control">
                    <option value="todos">AÑO</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                    <option value="2036">2036</option>
                    <option value="2037">2037</option>
                    <option value="2038">2038</option>
                    <option value="2039">2039</option>
                    <option value="2040">2040</option>
                </select>
                </div>
              </div>
              
              <div class="form-group row">     

               <div class="btn-group text-center">
                 <button type="button" class="btn btn-primary" id="btn_print_recibos_contado"><i class="fa fa-search" aria-hidden="true"></i> Consultar</button>
               </div>
           </form>

       </div>
      </div
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
                          
                          <table id="recibos_contado_data" class="table table-bordered table-striped">
                            <thead>                              
                                <tr>                                  
                                <th>Fecha</th>
                                <th>#Recibo</th>
                                <th>#Venta</th>
                                <th>Monto</th>
                                <th>Paciente</th>
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
    
    
 
  <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/recibos.js"></script>



<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

