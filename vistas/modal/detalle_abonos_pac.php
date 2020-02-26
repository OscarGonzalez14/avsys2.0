<script type="text/javascript">

  $(document).ready(ocultar_btn_imprimir);
  function ocultar_btn_imprimir(){

  document.getElementById("print_rec_current").style.display = "none";
}
</script>

 <style>
    #tamModal{
      width: 85% !important;
    }
     #head{
        background-color: #034f84;
        color: white;
    }
</style>

<!-- Modal -->
<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
<div id="detalle_abonos" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamModal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="head"><div id="valida_rec"></div>
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h5 class="modal-title" align="center"><i class="fa fa-usd" aria-hidden="true"></i> ABONO INICIAL&nbsp;&nbsp;&nbsp;&nbsp;<span></span></h5>
      </div>
      <div class="modal-body">
     <!--Tabla generalidades del paciente-->
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <tr>
            <th><p align="center"><p>No. Venta</p></th>
            <th><p align="center" ><p>Recibí de:</p></th>
            <th><p align="center" ><p>Telefono:</p></th>
            <th><p align="center" ><p>Empresa:</p></th>
            <th> <p align="center">No. Recibo</p></th>
          </tr>
        </thead>
        
        <tbody>
        <td><input type='text' class='form-control' id='num_venta_rec_ini' name='num_venta_rec_ini' readonly></td>          
          <td align="center"><input type="text" name="nombres_ini" id="nombres_ini" class='form-control' readonly></td>
          <td align="center"><input type="text" name="telefono" id="telefono" class='form-control' readonly></td>
          <td align="center"><input type="text" name="empresa_emp" id="empresa_emp" class='form-control' readonly></td>          
          <td align="center"><input type="text" name="num_recibo" id="num_recibo" class="form-control" style="text-align: right;" readonly> </td>
        </tbody>
      </table>
    <td align="center" colspan="4" id="cant_letras"><input type="text" class="form-control" id="texto" placeholder="CANTIDAD EN LETRAS"></td><br>
        <!--Tabla detalles del Credito-->       
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color: #034f84 ;color: white ">
          <tr>

          <th><p align="center">Valor de la Venta</p></th>
          <th><p align="center">Abono Anterior</p></th>
          <th><p align="center">Saldo Actual</p></th>
          <th><p align="center">Abono Actual</p></th>
          <th><p align="center"> NuevoSaldo</p></th> 
          <th><p align="center">Forma de Pago</p></th>
          <th><p align="center">Proximo Abono</p></th>

          </tr>
        </thead>

        <tbody>
          <td align='center'><input class='form-control' type='text' class='monto' name='monto' id="monto" style="text-align: right;" readonly></td>
          <td align='center'><input class='form-control' type='text' class='monto' name='abono_ant' id="abono_ant" style="text-align: right;" readonly></td>
          <td align='center'><input class='form-control' type='text' class='monto' name='saldo_act' id="saldo_act" style="text-align: right;" readonly></td>
          <td align='center'><input class='form-control' type='text' name='numero' id="numero" onkeyup="nuevo_saldo()" style="text-align: right;" required placeholder="ABONO ACTUAL"></td>          <td align='center'><input class='form-control' type='text' class='saldo' name='saldo' id="saldo" style="text-align: right;" readonly></td>
          <td align='center'><select class='form-control' id='forma_pago' name='forma_pago'><option value=''>Seleccione</option><option value='Efectivo'>Efectivo</option><option value='Tarjeta de Credito'>Tarjeta de Credito</option><option value='Tarjeta de Debito'>Tarjeta de Debito</option><option value='Cargo Automatico'>Cargo Automatico</option><option value='Cheque'>Cheque</option></select></td>
          <td><input type='text' class='form-control' id='datepicker' name='pr_abono'></td>

        </tbody>

      </table>

<div class="row">
  <div class="col-sm-4">
  <div class="input-group">
  <span class="input-group-addon">Marca de Aro</span>
  <input id="marca_aro" type="text" class="form-control" name="marca_aro" placeholder="---">
  </div>
  </div>
  <div class="col-sm-4">
      <div class="input-group">
  <span class="input-group-addon">Modelo</span>
  <input id="modelo_aro" type="text" class="form-control" name="modelo_aro" >
  </div>
  </div>
  <div class="col-sm-4">
      <div class="input-group">
  <span class="input-group-addon">Color</span>
  <input id="color_aro" type="text" class="form-control" name="color_aro" >
  </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-4">
  <div class="input-group">
  <span class="input-group-addon">Diseño de Lente</span>
  <input id="dis_lente" type="text" class="form-control" name="dis_lente" placeholder="---">
  </div>
  </div>
  <div class="col-sm-4">
      <div class="input-group">
  <span class="input-group-addon">Tipo de AR</span>
  <input id="tipo_ar" type="text" class="form-control" name="tipo_ar" >
  </div>
  </div>
  <div class="col-sm-4">
    <div class="input-group">
  <span class="input-group-addon">Marca de Photosensible</span>
  <input id="photo" type="text" class="form-control" name="photo" >
  </div>
  </div><br>
<div class="col-sm-12">
      <div class="input-group">
  <span class="input-group-addon">Observaciones</span>
  <input id="observaciones" type="text" class="form-control" name="observaciones" value="Sin Observaciones">
  </div>
  </div>  
  
  
</div>


<input type="hidden" name="id_usuario" id="id_usuario_ini" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
<input id="id_credito" type="hidden" name="id_credito">
<input id="id_paciente_ini" type="hidden" name="id_paciente_ini">
<input type="hidden" name="usuario" id="id_usuario" value="<?php echo $_SESSION["usuario"];?>"/>
<input type="hidden" name="date" id="date" value="<?php echo $hoy;?>">
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>">
<input type="hidden" name="hora" id="hora" value="4:00 pm">


  </div style="display:block">
      <div class="modal-footer">
        <button type="button" onClick="registra_abono_inicial()" class="btn btn-dark btn-md" id="btn_enviar_ini"><i class="fa fa-save" aria-hidden="true"></i>  Registrar Abono</button>
       <a  id="print_rec_current" href="" style="margin-top:8px;"><button type="button" class="btn btn-blue btn-md"><i class="fa fa-print" aria-hidden="true"></i>  Imprimir</button></a>
  
      </div>
  </div>

  </div>
</div>

<script>

$(document).on('click', '#btn_enviar_ini', function(){
    mostrar_btn_imprimir_rec();
    var num_recibo_current = $("#num_recibo").val();
    document.getElementById("print_rec_current").href = 'print_recibos.php?numero_recibo_pac='+num_recibo_current;
    
  });

function mostrar_btn_imprimir_rec(){
  document.getElementById("print_rec_current").style.display = "block";
}
function nuevo_saldo(){

  var saldo_act = document.getElementById("saldo_act").value;
  var abono = document.getElementById("numero").value;
  var nuevo_saldo =  saldo_act-abono;
  var saldo = Math.round10(nuevo_saldo, -1);

  document.getElementById("saldo").value = saldo;
  if(saldo==0){
    document.getElementById('datepicker').style.display = 'none';
    document.getElementById('pr_abono_ini').style.display = 'none';
  }else{
    document.getElementById('datepicker').style.display = 'block';
    document.getElementById('pr_abono_ini').style.display = 'block';

  }

}

    document.getElementById("numero").addEventListener("keyup",function(e){
    document.getElementById("texto").value = NumeroALetras(this.value);
});
 
 
function Unidades(num){
 
  switch(num)
  {
    case 1: return "UN";
    case 2: return "DOS";
    case 3: return "TRES";
    case 4: return "CUATRO";
    case 5: return "CINCO";
    case 6: return "SEIS";
    case 7: return "SIETE";
    case 8: return "OCHO";
    case 9: return "NUEVE";
  }
 
  return "";
}
 
function Decenas(num){
 
  decena = Math.floor(num/10);
  unidad = num - (decena * 10);
 
  switch(decena)
  {
    case 1:
      switch(unidad)
      {
        case 0: return "DIEZ";
        case 1: return "ONCE";
        case 2: return "DOCE";
        case 3: return "TRECE";
        case 4: return "CATORCE";
        case 5: return "QUINCE";
        default: return "DIECI" + Unidades(unidad);
      }
    case 2:
      switch(unidad)
      {
        case 0: return "VEINTE";
        default: return "VEINTI" + Unidades(unidad);
      }
    case 3: return DecenasY("TREINTA", unidad);
    case 4: return DecenasY("CUARENTA", unidad);
    case 5: return DecenasY("CINCUENTA", unidad);
    case 6: return DecenasY("SESENTA", unidad);
    case 7: return DecenasY("SETENTA", unidad);
    case 8: return DecenasY("OCHENTA", unidad);
    case 9: return DecenasY("NOVENTA", unidad);
    case 0: return Unidades(unidad);
  }
}//Unidades()
 
function DecenasY(strSin, numUnidades){
  if (numUnidades > 0)
    return strSin + " Y " + Unidades(numUnidades)
 
  return strSin;
}//DecenasY()
 
function Centenas(num){
 
  centenas = Math.floor(num / 100);
  decenas = num - (centenas * 100);
 
  switch(centenas)
  {
    case 1:
      if (decenas > 0)
        return "CIENTO " + Decenas(decenas);
      return "CIEN";
    case 2: return "DOSCIENTOS " + Decenas(decenas);
    case 3: return "TRESCIENTOS " + Decenas(decenas);
    case 4: return "CUATROCIENTOS " + Decenas(decenas);
    case 5: return "QUINIENTOS " + Decenas(decenas);
    case 6: return "SEISCIENTOS " + Decenas(decenas);
    case 7: return "SETECIENTOS " + Decenas(decenas);
    case 8: return "OCHOCIENTOS " + Decenas(decenas);
    case 9: return "NOVECIENTOS " + Decenas(decenas);
  }
 
  return Decenas(decenas);
}//Centenas()
 
function Seccion(num, divisor, strSingular, strPlural){
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)
 
  letras = "";
 
  if (cientos > 0)
    if (cientos > 1)
      letras = Centenas(cientos) + " " + strPlural;
    else
      letras = strSingular;
 
  if (resto > 0)
    letras += "";
 
  return letras;
}//Seccion()
 
function Miles(num){
  divisor = 1000;
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)
 
  strMiles = Seccion(num, divisor, "MIL", "MIL");
  strCentenas = Centenas(resto);
 
  if(strMiles == "")
    return strCentenas;
 
  return strMiles + " " + strCentenas;
 
  //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
}//Miles()
 
function Millones(num){
  divisor = 1000000;
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)
 
  strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
  strMiles = Miles(resto);
 
  if(strMillones == "")
    return strMiles;
 
  return strMillones + " " + strMiles;
 
  //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
}//Millones()
 
function NumeroALetras(num,centavos){
  var data = {
    numero: num,
    enteros: Math.floor(num),
    centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
    letrasCentavos: "",
  };
  if(centavos == undefined || centavos==false) {
    data.letrasMonedaPlural="DOLARES";
    data.letrasMonedaSingular="DOLAR";
  }else{
    data.letrasMonedaPlural="CENTAVOS";
    data.letrasMonedaSingular="CENTAVOS";
  }
 
  if (data.centavos > 0)
    data.letrasCentavos = "CON " + NumeroALetras(data.centavos,true);
 
  if(data.enteros == 0)
    return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  if (data.enteros == 1)
    return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
  else
    return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
}//NumeroALetras()

// Conclusión
(function() {
  /**
   * Ajuste decimal de un número.
   *
   * @param {String}  tipo  El tipo de ajuste.
   * @param {Number}  valor El numero.
   * @param {Integer} exp   El exponente (el logaritmo 10 del ajuste base).
   * @returns {Number} El valor ajustado.
   */
  function decimalAdjust(type, value, exp) {
    // Si el exp no está definido o es cero...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Si el valor no es un número o el exp no es un entero...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
      return NaN;
    }
    // Shift
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
  }

  // Decimal round
  if (!Math.round10) {
    Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };
  }
  // Decimal floor
  if (!Math.floor10) {
    Math.floor10 = function(value, exp) {
      return decimalAdjust('floor', value, exp);
    };
  }
  // Decimal ceil
  if (!Math.ceil10) {
    Math.ceil10 = function(value, exp) {
      return decimalAdjust('ceil', value, exp);
    };
  }
})();
</script>