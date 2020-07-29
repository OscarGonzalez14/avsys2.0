<style>
    #size-modal{
      width: 65% !important;
    }
     #encabezado{
        background-color: #034f84;
        color: white;
    }

  </style>


   <div class="modal fade" id="detalle_abonos_modal" data-modal-index="-1">
          <div class="modal-dialog" id="size-modal">
            <div class="bg-warning">
              <div class="modal-header" id="encabezado">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center"><i class="fa fa-search-plus" aria-hidden="true"></i> DETALLE DE ABONOS POR PACIENTE</h4>
              </div>             
              <div class="modal-body">
    <div class="container box">        
        <!--column-12 -->
<div class="table-responsive">          
    <div class="box-body">               
      <table id="detalle_paciente" class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color:black; color:white">
          <tr>
            <th style="text-align:center">No. Venta </th>
            <th style="text-align:center">Fecha Venta</th>
            <th style="text-align:center">Vendedor</th>                        
          </tr>
        </thead>

        <tbody>                            
          <td><input type="text" name="numero_venta" id="numero_venta" class="form-control" readonly style="text-align:center;color:black"></td>
          <td><input type="text" name="fecha_venta" id="fecha_venta" class="form-control" readonly style="text-align:center;color:black"></td>
          <td><input type="text" name="vendedor" id="vendedor" class="form-control" readonly style="text-align:center;color:black;text-transform:uppercase"></td>
        </tbody>

      </table>
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalles_abono" class="table table-striped table-bordered table-condensed table-hover">
              <thead style="background-color:#A9D0F5">
                    <th>Fecha Abono</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Monto Abono</th>                                    
              </thead>                                       
            </table>
          </div>                         
      </div>
            <!-- /.box-body -->

              <!--BOTON CERRAR DE LA VENTANA MODAL-->
             <div class="modal-footer" id="footer">
                <button type="button" class="btn btn-dark pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                
              </div>
              <!--modal-footer-->
          <!--</div>-->
          <!-- /.box -->

        </div>
        <!--/.col (12) -->
      </div>
      <!-- /.row -->
       
     
              </div>
              <!--modal body-->
              </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

     

    

        
  