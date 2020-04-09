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
        <input class="form-control" id="orden_anteriores" type="text" data-toggle="modal" data-target="#beneficiarios_venta">
      </div>
    <div class="col-xs-4">
      <label>Paciente</label>
      <input type="text" class="form-control" id="paciente_ord_ant" name="paciente_ord" required onkeypress="return false;">
    </div>
      <div class="col-xs-2">
        <label for="ex1">Empresa:</label>
        <input class="form-control" id="empresa_ord_ant" name="empresa_ord" type="text" required onkeypress="return false;">
      </div>
      <div class="col-xs-2">
        <label for="ex2">Monto actual:</label>
        <input class="form-control" id="monto_ord_ant" type="text" name="monto_ord" required onkeypress="return false;">
      </div>
      <div class="col-xs-2">
        <label for="ex2">Plazo:</label>
        <input class="form-control" id="plazo_ord_ant" type="text" name="monto_ord" required onkeypress="return false;">
      </div>
      
      <div class="col-xs-2">
        <label for="ex3">Monto Abonado:</label>
        <input class="form-control" id="monto_abonado" type="text" name="cuotas_ord" required onkeypress="return false;">
      </div>
    <div class="col-xs-2">
        <label for="ex3">Saldo:</label>
        <input class="form-control" id="saldo_credito_ant" type="text" name="cuotas_ord" required onkeypress="return false;">
      </div>

      <div class="col-xs-2">
        <label for="ex3">Letras Abonadas:</label>
        <input class="form-control" id="letras_abonadas" type="text" name="cuotas_ord" required onkeypress="return false;">
      </div>

      <div class="col-xs-2">
        <label for="ex3">Letras Pendientes:</label>
        <input class="form-control" id="letras_pendientes" type="text" name="cuotas_ord" required onkeypress="return false;">
      </div>

      <div class="col-xs-3">
        <label for="ex3">Finalizacion del Credito:</label>
        <input class="form-control" id="finzaliza_credito" type="text" name="cuotas_ord" required onkeypress="return false;">
      </div>
 <br>

<input class='form-control' type='hidden' class='monto' name='codigo_de aro' id="codigo_de_aro" style="text-align: center;" readonly>
</div>
<p align="right"><strong>Desea Sumar esta venta a una orden ya Existente!!</strong></p>
  </div style="display:block">
      <div class="modal-footer">
        <button type="button" onClick="load_modal_orden_descuento()" class="btn btn-dark btn-md complete_orden_ant" id="btn_enviar_ord_desc"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  No</button>
       <button type="button" class="btn btn-blue btn-md reiniciar_ventas" onClick="modal_unir_ordenes()"><i class="fa fa-puzzle-piece" aria-hidden="true"></i>  Si</button>
  
      </div>
  </div>

  </div>
</div>  
