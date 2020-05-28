<style>
    #tamaModal{
      width: 85% !important;
    }
     #head-style_add{
        background-color:#23969c;
        color: white;
    }
</style>
<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); $fecha_hoy=date("m-Y");?>
<div id="modal_add_desc_planilla" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamaModal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="head-style_add"><div id="valida_rec"></div>
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h5 class="modal-title" align="center"><i class="fa fa-list" aria-hidden="true"></i> AGREGAR VENTA A DESCUENTO EN PLANILLA&nbsp;&nbsp;&nbsp;&nbsp;<span></span></h5>
      </div>
      <div class="modal-body">
    
    <div class="form-group row"> 

<div class="col-xs-2">
        <label for="ex2">No.Orden:</label>
        <input class="form-control" id="numero_orden_ad" type="text" name="num_ord">
      </div>

    <div class="col-xs-4">
      <label>Paciente encargado de la cuenta</label>
      <input type="text" class="form-control" id="paciente_encargado_add" name="paciente_encargado_add" required onkeypress="return false;">
    </div>

      <div class="col-xs-4">
        <label for="ex1">Empresa:</label>
        <input class="form-control" id="empresa_ord_add" name="empresa_ord_add" type="text" required onkeypress="return false;">
      </div>

      <div class="col-xs-2">
        <label for="ex2">Monto Anterior:</label>
        <input class="form-control" id="monto_anterior_add" type="text" name="monto_anterior_add" required onkeypress="return false;">
      </div>
      
      <div class="col-xs-2">
        <label for="ex3">Saldo Actual:</label>
        <input class="form-control" id="cuotas_anterior_add" type="text" name="cuotas_anterior_add" required onkeypress="return false;">
      </div>

      <div class="col-xs-2">
        <label for="ex3">Nuevo Saldo:</label>
        <input class="form-control" id="nuevo_saldo_ad" type="text" name="nuevo_saldo_ad">
      </div>

      <div class="col-xs-2">
        <label for="ex3">Letras Pendientes:</label>
        <input class="form-control" id="pendientes_ad" type="text" name="pendientes_ad">
      </div>

      <div class="col-xs-2">
        <label for="ex3"> Plazo Venta Actual</label>
        <select class="form-control nuevo_monto_cuotas" name="hasta_ord_add" id="hasta_ord_add">
          <option value='0'>Seleccione</option>
          <option value='2' class="nuevo_monto_cuotas"> 2 Meses</option>
          <option value='3' class="nuevo_monto_cuotas"> 3 Meses</option>
          <option value='4' class="nuevo_monto_cuotas"> 4 Meses</option>
          <option value='5' class="nuevo_monto_cuotas"> 5 Meses</option>
          <option value='6' class="nuevo_monto_cuotas"> 6 Meses</option>
          <option value='7' class="nuevo_monto_cuotas"> 7 Meses</option>
          <option value='8' class="nuevo_monto_cuotas"> 8 Meses</option>
          <option value='9' class="nuevo_monto_cuotas"> 9 Meses</option>
          <option value='10' class="nuevo_monto_cuotas"> 10 Meses</option>
          <option value='11' class="nuevo_monto_cuotas"> 11 Meses</option>
          <option value='12' class="nuevo_monto_cuotas"> 12 Meses</option>
          <option value='13' class="nuevo_monto_cuotas"> 13 Meses</option>
          <option value='14' class="nuevo_monto_cuotas"> 14 Meses</option>
          <option value='15' class="nuevo_monto_cuotas"> 15 Meses</option>
          <option value='15' class="nuevo_monto_cuotas"> 16 Meses</option>
          <option value='17' class="nuevo_monto_cuotas"> 17 Meses</option>
          <option value='18' class="nuevo_monto_cuotas"> 18 Meses</option>

        </select>
      </div>

      <div class="col-xs-2">
        <label for="ex3">Nuevo Plazo:</label>
        <input class="form-control" id="new_place" type="text" name="new_place">
      </div>

      <div class="col-xs-2">
        <label for="ex3">Monto Cuotas</label>
        <input class="form-control" id="monto_cuotas_add" type="text" name="monto_cuotas_add"  required>
      </div>      
      <!--***************DATOS DEL BENEFICIARIO-->
      <div class="col-xs-5">
        <label for="ex1">Nombre del beneficiario:</label>
        <input class="form-control beneficiarios_empresarial" id="benefiaciario_add" name="benefiaciario_add" type="text" required onkeyup="mayus(this);" readonly placeholder="Haga Clic para seleccionar benefiacirio">
      </div>
            <div class="col-xs-4">
        <label for="ex1">Parentesco:</label>
        <input class="form-control" id="parentesco_add" name="parentesco_add" type="text" required onkeyup="mayus(this);">
      </div>
            <div class="col-xs-3">
        <label for="ex1">Telefono:</label>
        <input class="form-control" id="telefono_add" name="telefono_add" type="text" required onkeyup="mayus(this);">
      </div>
      <!--***************FIN DATOS DEL BENEFICIARIO-->
<br>
<input class='form-control' type='hidden' class='monto' name='codigo_de aro' id="codigo_de_aro" style="text-align: center;" readonly>
</div>
  </div style="display:block">
      <div class="modal-footer">
        <button type="button" onClick="update_descuento_planilla();" class="btn btn-dark btn-md show_nota_inicial" id="update_orden_des"><i class="fa fa-save" aria-hidden="true"></i>  Registra Orden</button>
       <a  id="join_orders" href="" style="margin-top:8px;" target="_blank"><button type="button" class="btn btn-blue btn-md reiniciar_ventas"><i class="fa fa-print" aria-hidden="true"></i>  Imprimir</button></a>
       <a id="print_nota_update" href="" style="margin-top:8px;" target="_blank"><button type="button" class="btn btn-danger btn-md "><i class="fa fa-print" aria-hidden="true"></i> Nota Abono</button></a> 
  
      </div>
  </div>

  </div>
</div>  

<!-- FIN ORDEN DE DESCUENTO MODAL-->