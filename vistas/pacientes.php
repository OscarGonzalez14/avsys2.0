<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){    
    require_once("../modelos/Usuarios.php");
    require_once("../modelos/Pacientes.php");
    $codigo = new Paciente();      
       
?>

<?php require_once("header.php"); ?>

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

  </style>
  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
<section class="content">
  <input type="hidden" id="sucursal_paciente" value="<?php echo $_SESSION["sucursal"];?>">
  <div id="resultados_ajax"></div>
  <h3 align="center">PACIENTES <span style="text-transform: uppercase;"><?php echo $_SESSION["sucursal"];?></span></h3>

<div class="row">
  <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
  <h1 class="box-title"><button class="btn btn-dark btn-lg"  data-toggle="modal" data-target="#pacienteModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Paciente</button></h1>
  
  <a href="#"><button class="btn btn-dark btn-lg"><i class="fa fa-list-alt" aria-hidden="true"></i>Expedientes</button></h1></a>
  <div class="box-tools pull-right"></div></div>
                    <!-- /.box-header -->
                    <!-- centro -->
    <div class="panel-body table-responsive">                          
        <table id="paciente_data" class="table table-bordered table-striped">

            <thead>                              
                <tr>                                  
                <th>Codigo</th>
                <th>Fecha</th>
                <th>Nombres</th>
                <th>Teléfono</th>
                <th>Correo</th>                                
                <th>Editar</th>                                
                </tr>
            </thead>
          <tbody></tbody>
        </table>
    </div>                 
                    <!--Fin centro -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
    
   <!--FORMULARIO VENTANA MODAL-->
  
<div class="modal fade" id="pacienteModal" data-modal-index="1">
    <div class="modal-dialog modal-lg">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Agregar Paciente</h4>
        </div>
<div class="modal-body">

  
    <div class="form-group row">

      <div class="col-xs-3">
       <label>Codigo de Paciente</label>
    <input type="text" class="form-control" id="codigo_paciente" name="codigo_paciente" readonly value="<?php $codigos=$codigo->codigo_paciente(); ?>">
      </div>

      <div class="col-xs-9">
        <label for="ex1">Nombre</label>
        <input class="form-control" id="nombres" name="nombres" type="text" placeholder="Escriba el Nombre del paciente"  required onkeyup="mayus(this);">
      </div>
      <div class="col-xs-3">
        <label for="ex2">Telefono</label>
        <input class="form-control" id="telefono" type="text" name="telefono" required>
      </div>

      <div class="col-xs-2">
        <label for="ex3">Edad</label>
        <input class="form-control" id="edad" type="number" name="edad" placeholder="edad" required>
      </div>

      <div class="col-xs-3">
        <label for="ex3">DUI</label>
        <input class="form-control" id="dui" type="text" name="dui" placeholder="DUI" required>
      </div>

      <div class="col-xs-4">
        <label for="ex3">Ocupación</label>
        <input class="form-control" id="ocupacion" type="text" name="ocupacion" placeholder="ocupacion del paciente" onkeyup="mayus(this);" required>
      </div>

      <div class="col-xs-4">
        <label for="ex3">Correo</label>
        <input class="form-control" id="correo" type="text" name="correo" placeholder="correo del paciente" required>
      </div>

      <div class="col-xs-7">
        <label for="ex3">Empresa</label>
        <input class="form-control" id="empresa" type="text" name="empresa" placeholder="Empresa del paciente" required readonly>
      </div>

      <div class="col-xs-1">
      <label>Buscar</label>
      <button class="btn btn-blue btn-block" data-toggle="modal" data-target="#empresasModal"><span class="glyphicon glyphicon-search"></button>       
    </div>

    </div>

<input type="hidden" name="cod_emp" id="cod_emp"/>
<input type="hidden" name="id_paciente" id="id_paciente"/>
<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>

<button class="btn btn-primary btn-block" onClick="guardarPaciente();"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
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
 <!-- Modal -->
<div id="empresasModal" class="modal fade" data-modal-index="2">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EMPRESAS</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">        
             <table id="lista_pacientes_data_emp" class="table table-bordered table-striped">               
                <thead>
                  <tr>
                    <th >Codigo</th>          
                    <th >Nombre</th>
                    <th >Sucursal</th>
                    <th >Agregar</th>
                  </tr>
                </thead>               
              </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
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
<script type="text/javascript" src="js/cleave.js"></script>
<script>

function mayus(e) {
    e.value = e.value.toUpperCase();
}

var medidas = new Cleave('#dui', {
    delimiter: '-',
    blocks: [8,1],
    uppercase: true
});

$(document).on('click', '#addEmpresa', function() {
        $('#myModal').modal('show');
    });

 </script>

  
  <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/paciente.js"></script>
<script type="text/javascript" src="js/empresa.js"></script>

<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

