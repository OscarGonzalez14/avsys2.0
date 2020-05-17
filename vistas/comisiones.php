
<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

    require_once("../modelos/Comisiones.php");

       $nombres = new Comisiones();

       $name = $nombres->listar_nombres_usuario();
              

?>


<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php require_once("header.php");?>

<!-- FIN DEL HEADER - LIBRERIAS -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>COMISIONES MENSUALES</h4>
      
    </section>

    <!-- Main content -->
    <section class="content">
    
   <div id="resultados_ajax"></div>

     <div class="panel panel-default">
        
        <div class="panel-body">

            <form class="form-inline">
              <div class="form-group">
               
                 <div class="col-sm-10">
                    <select name="mes_comision" id="mes_comision" class="form-control">
                                <option value="">MES</option>
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
                  <select name="ano_comsion" id="ano_comsion" class="form-control">
                                  <option value="">AÑO</option>
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
                
                <div class="col-sm-10">
                  <select name="tipo_comsion" id="tipo_comision" class="form-control">
                                  <option value="">TIPO COMISION</option>
                                  <option value="venta">VENTA</option>
                                  <option value="evaluacion">EVALUACION</option>
                                  <option value="cobro">COBRO</option>
                                </select>
                </div>
              </div>
              <div class="form-group row">
                
                <div class="col-sm-10">
                  <select name="user_comisiona" id="user_comisiona" class="form-control">
                      <option value="">USUARIO</option>
                        <?php
                           for($i=0; $i<sizeof($name);$i++){
                             
                             ?>
                              <option value="<?php echo $name[$i]["apellidos"]?>"><?php echo $name[$i]["apellidos"];?></option>
                             <?php
                           }
                        ?>
                  </select>
                </div>
              </div>

               <div class="btn-group text-center">
                 <button type="button" class="btn btn-primary" id="btn_comision"><i class="fa fa-search" aria-hidden="true"></i> Consultar</button>
               </div>
           </form>

       </div>
      </div>


       <!--VISTA MODAL PARA VER DETALLE VENTA EN VISTA MODAL-->
     <?php require_once("modal/detalle_venta_modal.php");?>
    
   
      <div class="row">
        <div class="col-xs-12">
          
          <div class="table-responsive">
            <div class="box-header">
              <h3 class="box-title">Lista de Comisiones por mes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="comisiones_mes_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style='text-align: center;font-size: 12px;'>Fecha</th>
                  <th style='text-align: center;font-size: 12px;'>#Venta</th>
                  <th style='text-align: center;font-size: 12px;'>#Recibo</th>
                  <th style='text-align: center;font-size: 12px;'>Monto Abono</th>
                  <th style='text-align: center;font-size: 12px;'><span id="title_user"></span></th>
                  <th style='text-align: center;font-size: 12px;'><span id="comision_monto"></span></th>
                  <th style='text-align: center;font-size: 12px;'>Tipo venta</th>
                  <th style='text-align: center;font-size: 12px;'>Tipo Cliente</th> 
                 
                </tr>
                </thead>
                     <tbody style="text-align:center">
                    </tbody>
                    <tfoot style="text-align:center">
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th id="abonos_monto"></th>
                        <th></th>
                        <th id='id_comi' style="text-align:center"></th>
                        <th></th>
                        <th></th>

                      </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


   <?php require_once("footer.php");?>

    <!--AJAX PROVEEDORES-->
<script type="text/javascript" src="js/comisiones.js"></script>
<script type="text/javascript" src="js/sum.js"></script>





<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");
     }

?>