<style>
    #tamaModal{
      width: 45% !important;
    }
     #head-style_add{
        background-color:#23969c;
        color: white;
    }
</style>
<div id="beneficiarios_venta" class="modal fade" role="dialog" data-modal-index="2">
  <div class="modal-dialog" id="tamaModal">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="head-style_add"><div id="valida_rec"></div>
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h5 class="modal-title" align="center"><i class="fa fa-list" aria-hidden="true"></i> AGREGAR BENEFICIARIO&nbsp;&nbsp;&nbsp;&nbsp;<span></span></h5>
      </div>
      <div class="modal-body">
            <div class="table-responsive">        
          <table id="lista_beneficiario_venta" class="table table-bordered table-striped">               
                <thead>
                  <tr>
                    <th >Encargado de la Cuenta</th>
                    <th >Beneficiario</th>   
                    <th >Agregar</th>
                  </tr>
                </thead>               
            </table>
            <!--</div>-->
    <div class="modal-footer">
    <button type="button" class="btn btn-dark pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
</div>
</div>
      </div>
  </div style="display:block">
      <div class="modal-footer">
        <button type="button" onClick="update_descuento_planilla();" class="btn btn-dark btn-md"><i class="fa fa-save" aria-hidden="true"></i>  Registra Orden</button>
       <a  id="" href="" style="margin-top:8px;" target="_blank"><button type="button" class="btn btn-blue btn-md reiniciar_ventas"><i class="fa fa-print" aria-hidden="true"></i>  Imprimir</button></a>
  
      </div>
  </div>

  </div>
  

<!-- FIN ORDEN DE DESCUENTO MODAL-->