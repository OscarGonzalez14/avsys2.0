<style>
    #tamaModal_ant{
      width: 75% !important;
    }
     #head-style_ant{
        background-color:#800000;
        color: white;
    }
</style>

<div id="modal_sumar_orden" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamaModal_ant">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="head-style_ant"><div id="valida_rec"></div>
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h5 class="modal-title" align="center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong> ADVERTENCIA!!!&nbsp;&nbsp;Este Paciente ya Posee una Orden de Descuento Ya Activa;</strong></h5>
      </div>
      <div class="modal-body">
    
    <div class="form-group row">

      <div class="col-xs-2">
        <label for="ex2">No.Orden Activa:</label>
        <input class="form-control" id="orden_anterior" type="text">
      </div>
    <div class="col-xs-4">
      <label>Paciente</label>
      <input type="text" class="form-control" id="paciente_ord_ant" name="paciente_ord" required onkeypress="return false;">
    </div>
      <div class="col-xs-4">
        <label for="ex1">Empresa:</label>
        <input class="form-control" id="empresa_ord_ant" name="empresa_ord" type="text" required onkeypress="return false;">
      </div>
      <div class="col-xs-2">
        <label for="ex2">Monto Aprobado:</label>
        <input class="form-control" id="monto_ord_ant" type="text" name="monto_ord" required onkeypress="return false;">
      </div>
      
      <div class="col-xs-2">
        <label for="ex3">Letras Pendientes:</label>
        <input class="form-control" id="cuotas_pendientes" type="text" name="cuotas_ord" required onkeypress="return false;">
      </div>
 <br>

<div>
  <table  class="table table-striped table-bordered table-condensed table-hover">
  <h5 align="center">SERVICIO QUE RECIBIÓ</h5>       
    <thead style="background-color:#3e4444;color: white ">
       <tr>
      <th style="text-align:center;color:white">DETALLE ARO</th>
      <th style="text-align:center;color:white">DISEÑO LENTE</th>
      <th style="text-align:center;color:white">TIPO AR</th>
      <th style="text-align:center;color:white">PHOTOSENSIBLE</th>
      </tr>
     </thead>

     <tbody>
      <td align='center'><input class='form-control' type='text' class='monto' name='detalle_aro_ord' id="detalle_aro_ord" style="text-align: center;" readonly></td>
      <td align='center'><input class='form-control' type='text' class='monto' name='lente_ord' id="lente_ord" style="text-align: center;" readonly></td>
      <td align='center'><input class='form-control' type='text' class='monto' name='ar_ord' id="ar_ord" style="text-align: center;" readonly></td>
      <td align='center'><input class='form-control' type='text' class='monto' name='photo_ord' id="photo_ord" style="text-align: center;" readonly></td>
    </tbody>
  </table>
  </div>
<input class='form-control' type='hidden' class='monto' name='codigo_de aro' id="codigo_de_aro" style="text-align: center;" readonly>
</div>
<p align="right"><strong>Desea Sumar esta venta a una orden ya Existente!!</strong></p>
  </div style="display:block">
      <div class="modal-footer">
        <button type="button" onClick="load_modal_orden_descuento()" class="btn btn-dark btn-md" id="btn_enviar_ord_desc"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  No</button>
       <a  id="" href="" style="margin-top:8px;" target="_blank"><button type="button" class="btn btn-blue btn-md reiniciar_ventas"><i class="fa fa-puzzle-piece" aria-hidden="true"></i>  Si</button></a>
  
      </div>
  </div>

  </div>
</div>  
