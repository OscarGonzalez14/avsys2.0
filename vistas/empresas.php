<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){    
    require_once("../modelos/Usuarios.php");
    require_once("../modelos/Pacientes.php");
    $codigo = new Paciente();      
       
?>

<?php require_once("header.php"); ?>
<?php require_once("modal/listar_cat_a.php");?>
<?php require_once("modal/listar_cat_b.php");?>
<?php require_once("modal/modal_consultas.php");?>
<?php if($_SESSION["pacientes"]==1)
     {

     ?>

  <style>
    #tamanoModal{
      width: 75% !important;
    }
     #encabezado{
        background-color: #034f84;
        color: white;
    }
    .modal:nth-of-type(even) {
    z-index: 1052 !important;
}
     .modal-backdrop.show:nth-of-type(even) {
    z-index: 1051 !important;
}
  </style>

<div class="content-wrapper">        
        <!-- Main content -->
<section class="content">
  <input type="hidden" id="sucursal_paciente" value="<?php echo $_SESSION["sucursal"];?>">
  <div id="resultados_ajax"></div>
  
  <div class="row">
    <div class="col-md-12">

    <div class="panel-body table-responsive">                          
        <table id="get_detalle_empresas_data" class="table table-bordered table-striped">
        <button class="btn btn-dark btn-lg"  data-toggle="modal" data-target="#nuevaEmpresasModal"><i class="fa fa-plus" aria-hidden="true"></i> Crear Empresa</button><h5 style='color:white;font-size: 1px'>.</h5>
        <h3 align="center" style='background: #000040;color:white;padding:5px;margin-top: 0px'>VENTAS DE ORDEN DE DESCUENTO</h3>
          <thead>                              
              <tr>                                  
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">Empresa</th>
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">Detalles</th>
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">Total Creditos</th>
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">C.Canceladas</th>
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">C.Constantes</th>
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">C.Poco Constantes</th>
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">Irrecuperables</th>
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">Abonos Efectuados</th>
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">Categoría A</th>
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">Categoría B</th> 
                <th style="font-size:12px;background-color:black;text-align:center;color:white;" colspan="1">Categoría C</th>                     
              </tr>
          </thead>
          <tbody style='text-align: center;'>                     
          </tbody>

          <tfoot>
              <tr>                                  
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">Empresa</th>
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">Detalles</th>
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1" id='tot_creditos'></th>
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">C.Canceladas</th>
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">C.Constantes</th>
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">C.Poco Constantes</th>
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">Irrecuperables</th>
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">Abonos Efectuados</th>
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">Categoría A</th>
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">Categoría B</th> 
                <th style="font-size:12px;background-color:white;text-align:center;color:white;" colspan="1">Categoría C</th>                     
              </tr>
          </tfoot>
      </table>                     
    </div><!--Fin tabla Datatable -->                 

  </div><!-- /.col -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
    
   <!--FORMULARIO VENTANA MODAL-->
  
<div class="modal fade" id="nuevaEmpresasModal" role="dialog">
  <div class="modal-dialog modal-lg">    
      <!-- Modal content-->
  <div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Agregar Nueva Empresa</h4>
  </div>
<div class="modal-body">

    <div class="row">

      <div class="col-xs-9">
        <label>Nombre Empresa</label>
        <input type="text" class="form-control" id="nombre_emp" name="nombre_emp" placeholder="ESCRIBA EL NOMBRE DE LA EMPRESA" onkeyup="mayus(this);">
      </div>

      <div class="col-xs-3">
        <label for="ex1">Telefono</label>
        <input class="form-control" id="telefono_emp" name="telefono_emp" type="text">
      </div>

      <div class="col-xs-12">
        <label for="ex3">Dirección</label>
        <input class="form-control" id="direccion_emp" type="text" name="direccion_emp" onkeyup="mayus(this);">
      </div>

      <div class="col-xs-4">
        <label for="ex3">NIT</label>
        <input class="form-control" id="nit_emp" type="text" name="nit_emp" placeholder="NIT EMPRESA">
      </div>

      <div class="col-xs-8">
        <label for="ex3">Responsable RRHH</label>
        <input class="form-control" id="responsable" type="text" name="responsable" placeholder="REPRESENTANTE DE LA EMPRESA" onkeyup="mayus(this);">
      </div>

      <div class="col-xs-3">
        <label for="ex3">Usuario</label>
        <input class="form-control" id="user_emp" type="text" name="user_emp" placeholder="USUARIO DE ACCESO">
      </div>

      <div class="col-xs-3">
        <label for="ex3">Password</label>
        <input class="form-control" id="pass_emp" type="text" name="pass_emp" placeholder="CONTRASEÑA DE ACCESO">
      </div>
      <div class="col-xs-6">
        <label for="ex3">Correo</label>
        <input class="form-control" id="correo_emp" type="text" name="correo_emp" placeholder="CORREO EMPRESA">
      </div>

    </div>
<br>
<input type="hidden" name="user_reg" id="user_reg" value="<?php echo $_SESSION["usuario"];?>"/>
<button type="submit"  class="btn btn-primary btn-block" onClick="guardarEmpresa();"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
Guardar</button>


  </div>
        <div class="modal-footer">
          <button class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


 <!--FIN FORMULARIO VENTANA MODAL-->
 <script type="text/javascript" src="js/cleave.js"></script>
<script>

function mayus(e) {
    e.value = e.value.toUpperCase();
}

var telefono = new Cleave('#telefono_emp', {
    delimiter: '-',
    blocks: [4,4],
    uppercase: true
});

var nit = new Cleave('#nit_emp', {
    delimiter: '-',
    blocks: [4,6,3,1],
    uppercase: true
});
 </script>

   
  <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/empresa.js"></script>
<script type="text/javascript" src="js/sum.js"></script>
<script type="text/javascript" src="js/consultas.js"></script>
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
<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

