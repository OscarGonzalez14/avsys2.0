<style>
    #tamaModal{
      width: 75% !important;
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

    <div class="col-xs-5">
      <label>Paciente encargado de la cuenta</label>
      <input type="text" class="form-control" id="paciente_encargado_add" name="paciente_encargado_add" required onkeypress="return false;">
    </div>

      <div class="col-xs-5">
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

      <div class="col-xs-3">
        <label for="ex3"> Nuevo Plazo</label>
        <select class="form-control nuevo_monto_cuotas" name="hasta_ord_add" id="hasta_ord_add">
          <option value='0'>Seleccione</option>
          <option value='2' clas="nuevo_monto_cuotas"> 2 Meses</option>
          <option value='3' clas="nuevo_monto_cuotas"> 3 Meses</option>
          <option value='4' clas="nuevo_monto_cuotas"> 4 Meses</option>
          <option value='5' clas="nuevo_monto_cuotas"> 5 Meses</option>
          <option value='6' clas="nuevo_monto_cuotas"> 6 Meses</option>
          <option value='7' clas="nuevo_monto_cuotas"> 7 Meses</option>
          <option value='8' clas="nuevo_monto_cuotas"> 8 Meses</option>
          <option value='9' clas="nuevo_monto_cuotas"> 9 Meses</option>
          <option value='10' clas="nuevo_monto_cuotas"> 10 Meses</option>
          <option value='11' clas="nuevo_monto_cuotas"> 11 Meses</option>
          <option value='12' clas="nuevo_monto_cuotas"> 12 Meses</option>
        </select>
      </div>

      <div class="col-xs-2">
        <label for="ex3">Monto Cuotas</label>
        <input class="form-control" id="monto_cuotas_add" type="text" name="monto_cuotas_add"  required>
      </div>      
      <!--***************DATOS DEL BENEFICIARIO-->
      <div class="col-xs-4">
        <label for="ex1">Nombre del beneficiario:</label>
        <input class="form-control" id="benefiaciario_add" name="benefiaciario_add" type="text" required onkeypress="return false;">
      </div>
            <div class="col-xs-3">
        <label for="ex1">Parentesco:</label>
        <input class="form-control" id="parentesco_add" name="parentesco_add" type="text" required onkeypress="return false;">
      </div>
            <div class="col-xs-2">
        <label for="ex1">Telefono:</label>
        <input class="form-control" id="telefono_add" name="telefono_add" type="text" required onkeypress="return false;">
      </div>
            <div class="col-xs-3">
        <label for="ex1">Direccion:</label>
        <input class="form-control" id="direccion_pac_add" name="direccion_pac_add" type="text" required onkeypress="return false;">
      </div>
      <!--***************FIN DATOS DEL BENEFICIARIO-->
    <div class="col-xs-6">
        <label for="ex3">1° Referencia*</label>
        <input class="form-control num_ord_correlativo" id="ref_uno_add" type="text" name="ref_uno" placeholder="ESCRIBA REFERENCIA 1" required>
    </div>
    
    <div class="col-xs-4">
      <label for="ex3">Teléfono 1° Referencia*</label>
      <input class="form-control" id="tel_ref_uno_add" type="text" name="tel_ref_uno" placeholder="TELEFONO REF. 1" required>
     </div>

    <div class="col-xs-8">
        <label for="ex3">2° Referencia*</label>
        <input class="form-control" id="ref_dos_add" type="text" name="ref_dos" placeholder="ESCRIBA REFERENCIA 2" required>
    </div>
    <div class="col-xs-3">
      <label for="ex3">Teléfono 2° Referencia*</label>
      <input class="form-control" id="tel_ref_dos_add" type="text" name="tel_ref_dos" placeholder="TELEFONO REF. 2" required>
    </div>
 
<br>

<input class='form-control' type='hidden' class='monto' name='codigo_de aro' id="codigo_de_aro" style="text-align: center;" readonly>
</div>
  </div style="display:block">
      <div class="modal-footer">
        <button type="button" onClick="update_descuento_planilla();" class="btn btn-dark btn-md"><i class="fa fa-save" aria-hidden="true"></i>  Registra Orden</button>
       <a  id="" href="" style="margin-top:8px;" target="_blank"><button type="button" class="btn btn-blue btn-md reiniciar_ventas"><i class="fa fa-print" aria-hidden="true"></i>  Imprimir</button></a>
  
      </div>
  </div>

  </div>
</div>  

<!-- FIN ORDEN DE DESCUENTO MODAL-->