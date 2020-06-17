 <style>
    #tam_cat_a{
      width: 85% !important;
    }
     #head_cat_a{
        background-color:#000040;
        color: white;
    }
</style>
<!-- Modal -->
<?php require_once("modal/detalle_abonos_modal.php");?>
<div class="modal fade" id="listar_categoria_a" role="dialog" aria-hidden="true" data-modal-index="1">  
  <div class="modal-dialog modal-lg" role="document" id="tam_cat_a">
  <div class="modal-content">
  <div class="modal-header" id="head_cat_a">
  <h3 class="modal-title" id="exampleModalLongTitle" align="center">PACIENTES CONSTANTE (CATEGORÍA A)</h3>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="modal-body">

<table class="table table-bordered" id="categoria_a_data" width="100%">
  <thead>
 <!--<tr>
    <th colspan="3" style="text-align:center;background:black;color:white;padding:1px !important">Secion 1</th>
  </tr>-->
    <tr>
      <th colspan='1' class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Fecha Credito</th>
      <th colspan='1' class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px; display: block; overflow: hidden;min-width: 140px;text-align:center" width="30%">Vendedor</th>
      <th colspan='1' class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Optometra</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Empresa</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;min-width: 140px;text-align:center" width="30%">PACIENTE</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Telefono</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Jefe Inmediato</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Tel. Jefe Inmediato</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Referencia 1</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Tel. Ref 1</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Referencia 2</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Tel. Re 2</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Diagnostico</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Aro</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Precio Aro</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Lente</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Precio Lente</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Monto Crédito</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Cuotas</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Plazo</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">A. Efectuados</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Pendientes</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Atrasadas</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Dias mora</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Mora</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center">Saldo Pagar</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center"">Abonados</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center"">Total</th>
      <th class="all" style="font-size:10px;white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center"">Det. Abonos</th>
    </tr>
  </thead>
  <tbody style="text-align:center;font-size:10px !important">
    
  </tbody>
  <tfoot>
  <tr>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Fecha Cr"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px; display: block; overflow: hidden;min-width: 140px;text-align:center" width="30%" name="Vendedor"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Optometra"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Empresa"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;min-width: 140px;text-align:center" width="30%" name="PACIENTE"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Telefon" id="total_aro"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="efe Inmediat"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Tel. Jefe Inmediato"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Referencia 1"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Tel. Ref 1"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Referencia 2"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Tel. Re 2"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Diagnostico"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Aro"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Precio a" ></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Lente"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Precio"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Monto"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Cuotas"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Plazo"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="A. Efectuados"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Pendientes"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Atrasadas"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Dias mora"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Mora"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center" name="Saldo Pagar"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center"" name="Abonados"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center"" name="det_abono"></th>
      <th class="all" style="white-space: nowrap;text-transform: uppercase;min-width: 130px;text-align:center"" name="Total">Total</th>
    </tr>
  </tfoot>
</table>

</div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
  </div>
  </div>
</div>
</div>
<script type="text/javascript" src="js/sum.js"></script>
<script type="text/javascript" src="js/creditos.js"></script>
<script>

    $(function(){
      $('.btn[data-toggle=modal]').on('click', function(){
        var $btn = $(this);
        var currentDialog = $btn.closest('.modal-dialog'),
        targetDialog = $($btn.attr('data-target'));;
        if (!currentDialog.length)
          return;
        targetDialog.data('previous-dialog', currentDialog);
        currentDialog.addClass('aside');
        var stackedDialogCount = $('.modal.in .modal-dialog.aside').length;
        if (stackedDialogCount <= 5){
          currentDialog.addClass('aside-' + stackedDialogCount);
        }
      });

      $('.modal').on('hide.bs.modal', function(){
        var $dialog = $(this);  
        var previousDialog = $dialog.data('previous-dialog');
        if (previousDialog){
          previousDialog.removeClass('aside');
          $dialog.data('previous-dialog', undefined);
        }
      });
    })

</script>