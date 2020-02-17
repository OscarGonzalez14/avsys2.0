 <style>
    #tamModal{
      width: 75% !important;
    }
     #head{
        background-color: #034f84;
        color: white;
    }
</style>

   <div class="modal fade" id="lista_productos_ventas_Modal">
          <div class="modal-dialog" id="tamModal">

            <div class="bg-info">
              <div class="modal-header" id="head">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-user-circle" aria-hidden="true"></i> Seleccione un Producto</h4>
              </div>
              <div class="modal-body">

                 <div class="container box">
        
        <!--column-12 -->
        <div class="table-responsive">
             <div class="box-body">
             <table id="lista_productos_ventas_data" class="table table-bordered table-striped">
               
                <thead>
                  <tr>
                      <th>Cod.</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Color</th>
                    <th>Medidas</th>
                    <th>Precio Venta</th>
                    <th>Bodega</th>
                    <th>Stock</th>
                    <th>Ubicacion</th>
                    <th>Agregar</th>           
                    </tr>
                </thead>

               
              </table>
            </div>
            <!-- /.box-body -->

              <!--BOTON CERRAR DE LA VENTANA MODAL-->
             <div class="modal-footer">
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

       

        
  