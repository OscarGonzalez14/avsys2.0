 <style>
    #tamModalsp{
      width: 50% !important;
    }
     #head{
        background-color: #034f84;
        color: white;
    }
</style>
 <!-- Modal-->
  <div class="modal fade" id="modalPaciente_no_consulta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="tamModalsp">
      <div class="modal-content">
        <div class="modal-header" id="head">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">AGREGAR VENTA A PACIENTE</h4>
        </div>
        <div class="modal-body">
          <div class="row" style="padding:15px">
             <table id="lista_pacientes_sin_consulta" class="table-responsive" style="width:100%">              
                <thead>
                  <tr>
                    <th>Paciente </th>          
                    <th>Agregar</th>
                  </tr>
                </thead>               
              </table>                
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
       

        
  