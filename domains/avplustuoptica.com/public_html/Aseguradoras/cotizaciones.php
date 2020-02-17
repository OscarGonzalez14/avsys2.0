<?php 
require_once("header.php");
require_once("nav.php");

?>

	<h3 style="text-align: center;">COTIZACIONES   -   OPTICA AV PLUS</h3>


<div class="row">

	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<section class="content">
    
   <div id="resultados_ajax"></div>

       <!--VISTA MODAL PARA VER DETALLE COMPRA EN VISTA MODAL
     //<?php //require_once("modal/detalle_consultas.php");?>
    -->   
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="cotizaciones_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fecha Cotizacion</th>
                  <th>Paciente</th>
                  <th>Monto</th>
                  <th>Estado</th>
                  <th>Detalles</th>
                  <th>Aprobar</th>
                  <th>Denegar</th>                 
                </tr>
                </thead>
                
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
	<div class="col-sm-1"></div>	
</div>


<!--MODAL DETALLE COTIZACION-->
 <style>
    #tamanoModal{
      width: 75% !important;
    }
     #encabezado{
        background-color: #034f84;
        color: white;
    }

  #encabezado2{
        background-color: #034f84;
        color: white;
  }
  </style>

<!--MODAL COTIZACION-->
   
    <div id="detalle_venta" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamanoModal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="encabezado">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style='text-align:center'> <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> DETALLE DE COTIZACIÓN</h4>
      </div>
      <div class="modal-body"><!--Modal body-->
        
<div class="table-responsive">          
  <table class="table">
   
   <thead style="background-color:black; color:white">
    <tr>
        <th>Paciente</th>
        <th>Telefono</th>
        <th>No. Cotizacion </th>
        <th>Fecha Cotización</th>
        <th>Atendió</th>
        <th>Sucursal</th>
    </tr>
    </thead>
        <tbody>
          <td> <h5 id="nombres"></h5><input type="hidden" name="nombres" id="nombres"></td>
          <td> <h5 id="telefono"></h5><input type="hidden" name="telefono" id="telefono"></td>
          <td><h5 id="numero_venta"></h5><input type="hidden" name="numero_venta" id="numero_venta"></td>
          <td><h5 id="fecha_venta"></h5><input type="hidden" name="fecha_venta" id="fecha_venta"></td>
          <td><h5 id="vendedor"></h5><input type="hidden" name="vendedor" id="vendedor"></td>
          <td><h5 id="sucursal"></h5><input type="hidden" name="sucursal" id="sucursal"></td>
    </tbody>
  
  </table><!--fin tabla-->
  </div>
  
  <!--TABLA DETALLES-->
<div class="table-responsive">          
  <table class="table" id="detalles">
   
   <thead style="background-color:black; color:white">
        <th>Cantidad</th>
            <th colspan="2">Producto</th>
            <th>Precio Unitario</th>
            <th>Descuento</th>
            <th>Total</th>
    </thead>
  
  </table><!--fin tabla-->
  </div>
        
<!--FIN TABLA DETALLES-->  
      </div><!--Fin Modal body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">SALIR</button>
      </div>
    </div>

  </div>
</div>       

     

 <!-- Modal -->
  <div class="modal fade" id="denegacion" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="encabezado2">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> MOTIVO DENEGACIÓN</h4>
        </div>
        <div class="modal-body">
           <form>
    <div class="form-group">
      <label for="comment">Describa el motivo de la denegación</label>
      <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-paper-plane" aria-hidden="true"></i> ENVIAR</button>
        </div>
      </div>
      
    </div>
  </div>   

        
  

        
  
<?php 
require_once("footer.php");
?>

<script type="text/javascript" src="js/cotizaciones.js"></script>
