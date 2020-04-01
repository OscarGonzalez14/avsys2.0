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
    <div class="col-xs-2">
       <label>No.Venta</label>
       <input type="text" class="form-control" id="venta_numero_ord" name="venta_numero_ord" required onkeypress="return false;">
    </div>

    <div class="col-xs-4">
      <label>Paciente encargado de la cuenta</label>
      <input type="text" class="form-control" id="paciente_ord_ad" name="paciente_ord" required onkeypress="return false;">
    </div>

      <div class="col-xs-4">
        <label for="ex1">Empresa:</label>
        <input class="form-control" id="empresa_ord" name="empresa_ord" type="text" required onkeypress="return false;">
      </div>

      <div class="col-xs-3">
        <label for="ex2">Monto Anterior:</label>
        <input class="form-control" id="monto_ord" type="text" name="monto_ord" required onkeypress="return false;">
      </div>
      
      <div class="col-xs-3">
        <label for="ex3">Monto cuotas:</label>
        <input class="form-control" id="cuotas_ord" type="text" name="cuotas_ord" required onkeypress="return false;">
      </div>

      <div class="col-xs-3">
        <label for="ex3">A partir:</label>
        <input class="form-control" id="desde_ord" type="text" name="desde_ord" onkeypress="return false;" value="<?php echo $fecha_hoy;?>">
      </div>

      <div class="col-xs-3">
        <label for="ex3">Hasta</label>
        <input class="form-control" id="hasta_ord" type="date" name="hasta_ord" placeholder="DUI" required onkeypress="return false;">
      </div>

      <div class="col-xs-2">
        <label for="ex3">Ocupación</label>
        <input class="form-control" id="ocupacion_ord" type="text" name="ocupacion_ord" placeholder="ocupacion del paciente" required>
      </div>

      <div class="col-xs-1">
        <label for="ex3">Edad</label>
        <input class="form-control" id="edad_ord" type="text" name="edad_ord" placeholder="correo del paciente" required>
      </div>

      <div class="col-xs-2">
        <label for="ex3">DUI*</label>
        <input class="form-control num_ord_correlativo" id="dui_ord" type="text" name="dui_ord" placeholder="correo del paciente" required>
      </div>

      <div class="col-xs-2">
        <label for="ex3">NIT</label>
        <input class="form-control" id="nit_ord" type="text" name="nit_ord" placeholder="correo del paciente" required>
      </div>

      <div class="col-xs-3">
        <label for="ex3">Correo</label>
        <input class="form-control" id="correo_ord" type="text" name="correo_ord" placeholder="correo del paciente" required>
      </div>

      <div class="col-xs-2">
        <label for="ex3">Teléfono*</label>
        <input class="form-control num_ord_correlativo" id="tel_ord" type="text" name="tel_ord" required onkeypress="return false;">
      </div>

      <div class="col-xs-2">
        <label for="ex3">Teléfono Oficina</label>
        <input class="form-control" id="tel_oficina_ord" type="text" name="tel_oficina_ord" placeholder="Empresa del paciente" required>
      </div>      
      <!--***************DATOS DEL BENEFICIARIO-->
      <div class="col-xs-4">
        <label for="ex1">Nombre del beneficiario:</label>
        <input class="form-control" id="empresa_ord" name="empresa_ord" type="text" required onkeypress="return false;">
      </div>
            <div class="col-xs-3">
        <label for="ex1">Parentesco:</label>
        <input class="form-control" id="empresa_ord" name="empresa_ord" type="text" required onkeypress="return false;">
      </div>
            <div class="col-xs-2">
        <label for="ex1">Telefono:</label>
        <input class="form-control" id="empresa_ord" name="empresa_ord" type="text" required onkeypress="return false;">
      </div>
            <div class="col-xs-3">
        <label for="ex1">Direccion:</label>
        <input class="form-control" id="empresa_ord" name="empresa_ord" type="text" required onkeypress="return false;">
      </div>
      <!--***************FIN DATOS DEL BENEFICIARIO-->
    <div class="col-xs-6">
        <label for="ex3">1° Referencia*</label>
        <input class="form-control num_ord_correlativo" id="ref_uno" type="text" name="ref_uno" placeholder="ESCRIBA REFERENCIA 1" required>
    </div>
    
    <div class="col-xs-4">
      <label for="ex3">Teléfono 1° Referencia*</label>
      <input class="form-control" id="tel_ref_uno" type="text" name="tel_ref_uno" placeholder="TELEFONO REF. 1" required>
     </div>

    <div class="col-xs-8">
        <label for="ex3">2° Referencia*</label>
        <input class="form-control" id="ref_dos" type="text" name="ref_dos" placeholder="ESCRIBA REFERENCIA 2" required>
    </div>
    <div class="col-xs-3">
      <label for="ex3">Teléfono 2° Referencia*</label>
      <input class="form-control" id="tel_ref_dos" type="text" name="tel_ref_dos" placeholder="TELEFONO REF. 2" required>
    </div>
    <!--***********DATOS JEFE INMEDIATO-->
    <div class="col-xs-3">
      <label for="ex3">Nombre jefe inmediato*</label>
      <input class="form-control" id="tel_ref_dos" type="text" name="tel_ref_dos" placeholder="TELEFONO REF. 2" required>
    </div>

    <div class="col-xs-3">
      <label for="ex3">Teléfono Jefe Inmediato*</label>
      <input class="form-control" id="tel_ref_dos" type="text" name="tel_ref_dos" placeholder="TELEFONO REF. 2" required>
    </div>

    <div class="col-xs-3">
      <label for="ex3">Cargo*</label>
      <input class="form-control" id="tel_ref_dos" type="text" name="tel_ref_dos" placeholder="TELEFONO REF. 2" required>
    </div>  
    <!--***********FIN DATOS JEFE INMEDIATO-->     
<br>

<h5 align="center" style="display:block" SERVICIO QUE RECIBIÓ</h5>       
  <table  class="table table-striped table-bordered table-condensed table-hover">
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
<input class='form-control' type='hidden' class='monto' name='codigo_de aro' id="codigo_de_aro" style="text-align: center;" readonly>
</div>
  </div style="display:block">
      <div class="modal-footer">
        <button type="button" onClick="registra_orden_descuento()" class="btn btn-dark btn-md" id="btn_enviar_ord_desc"><i class="fa fa-save" aria-hidden="true"></i>  Registrar Orden</button>
       <a  id="n_orden_desc_current" href="" style="margin-top:8px;" target="_blank"><button type="button" class="btn btn-blue btn-md reiniciar_ventas"><i class="fa fa-print" aria-hidden="true"></i>  Imprimir</button></a>
  
      </div>
  </div>

  </div>
</div>  

<!-- FIN ORDEN DE DESCUENTO MODAL-->