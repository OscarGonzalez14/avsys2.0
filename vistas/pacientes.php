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
                <th>Empresa</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Agregar</th>                                 
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
<!--FORMULARIO VENTANA MODAL CONSULTAS-->
<div class="modal fade" id="consultasModal" role="dialog">
    <div class="modal-dialog" id="tamanoModal">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="encabezado">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
<i class="fa fa-user-md" aria-hidden="true"></i> <strong>  NUEVA CONSULTA</strong>
        
      </div>  
        <div class="modal-body">

    <form class="form-horizontal" method="post" action="../ajax/registra_consulta.php">
    <div class="form-group row">

  <div class="col-xs-3">
        <label for="ex1">Cod.Paciente</label>
        <input class="form-control" id="codigop" name="codigop" type="text" readonly>
  </div>



      <div class="col-xs-9">
        <label for="ex3">Nombre</label>
        <input class="form-control" id="nombre_pac" type="text" name="nombre_pac" readonly>
      </div>
     
 <div class="col-xs-12">
      <label for="comment">Motivo de Consulta</label>
      <textarea cols="80" class="form-control" rows="2" id="motivo" name="motivo"></textarea>
    </div>

    <div class="col-xs-12">
      <label for="comment">Patologias</label>
      <textarea cols="80" class="form-control" rows="2" id="patologias" name="patologias"></textarea>
    </div>

<p>.</p>
<div class="lens-auto" style="display:flex">
<hr style="color:blue;">
    
<div class="lenso" style="margin:5px">
<h5 style="color:blue;text-align:center"><strong>Lensometria</strong></h5>
<table class="table" style="border: solid 2px gray;border-radius:8px;width:100%" width="100%">

    <thead class="thead-light">
      <tr>
        <th style="text-align:center">OJO</th>
        <th style="text-align:center">ESFERAS</th>
        <th style="text-align:center">CILIDROS</th>
        <th style="text-align:center">EJE</th>
        <th style="text-align:center">PRISMA</th>
        <th style="text-align:center">ADICION</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>OD</td>
        <td> <input type="text" class="form-control" placeholder="---" name="odesferasl"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odcilndrosl"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odejesl"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odprismal"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odadicionl"></td>
        
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiesfreasl" ></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oicilindrosl" ></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiejesl" ></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiprismal" ></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiadicionl"></td>
      </tr>
      
    </tbody>
  </table>
</div><!--FIN LENSO-->
<hr style="color:blue;">
<div class="autorefract" style="margin:5px">


<table class="table" style="border: solid 2px gray;border-radius:8px;width:100%" width="100%">
    <h5 style="color:blue;text-align:center"><strong>Autorefractometro</strong></h5>
    <thead class="thead-light">
      <tr>
        <th style="text-align:center">OJO</th>
        <th style="text-align:center">ESFERAS</th>
        <th style="text-align:center">CILIDROS</th>
        <th style="text-align:center">EJE</th>
        <th style="text-align:center">PRISMA</th>
        <th style="text-align:center">ADICION</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>OD</td>
        <td> <input type="text" class="form-control" placeholder="---" name="odesferasa"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odcilindrosa"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odejesa"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="dprismaa"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oddiciona"></td>        
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiesferasa"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oicolindrosa"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiejesa"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiprismaa"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiadiciona"></td>
      </tr>
      
    </tbody>
  </table>
</div><!--FIN AUTOREFRACT-->

</div>
  <!--==================== FIN Autorefractometro==================-->
<!--=======OBLEAS=======-->
<div class="" style="margin:5px">

<table class="table" style="border: solid 2px gray;border-radius:8px;width:100%" width="100%">
    <tr>
        
        <td> <input type="text" class="form-control" placeholder="DIP" name="dip"></td>
        <td> <input type="text" class="form-control" placeholder="OD" name="oddip"></td>
        <td> <input type="text" class="form-control" placeholder="OI" name="oidip"></td>
        <td>AO</td>
        <td><input type="text" class="form-control" placeholder="OD" name="aood"></td>
        <td><input type="text" class="form-control" placeholder="OI" name="aooi"></td>
        <td>AP</td>
        <td><input type="text" class="form-control" placeholder="OD" name="apod"></td>
        <td><input type="text" class="form-control" placeholder="OI" name="opoi"></td>
      </tr>      
  </tbody>
  </table>
</div>
<!--======= FIN OBLEAS=======-->

  <!--==================== Rx Final==================-->
<div class="final-agudeza" style="display:flex">
  <!--==================== AgudezaVisual==================-->
<div class="aguvisual" style="margin:5px">
<table class="table" style="border: solid 2px gray;border-radius:8px;width:100%">
<div><center><h5 style="color:blue;"><strong>Agudeza Visual</strong></h5></center></div>
    <thead class="thead-light">
    <tr>
    <td colspan="1">.</td>
      <td style="text-align:center;" colspan="3">VISION LEJANA</td>
      <td style="text-align:center; background-color:#E0E0E0" colspan="2">VISION CERCANA</td>
    </tr>

      <tr>
        <th style="text-align:center" colspan="1">OJO</th>
        <th style="text-align:center" colspan="1">S/C</th>
        <th style="text-align:center" colspan="1">PH</th>
        <th style="text-align:center" colspan="1">C/C</th>
        <th style="text-align:center;background-color:#E0E0E0" colspan="1">S/C</th>
        <th style="text-align:center;background-color:#E0E0E0" colspan="1">C/C</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>OD</td>
        <td> <input type="text" class="form-control" placeholder="---" name="odavsclejos"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odavphlejos"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odavcclejos"></td>
        <td style="background-color:#E0E0E0"> <input type="text" class="form-control" placeholder="---" name="odavsccerca"></td>
        <td style="background-color:#E0E0E0"> <input type="text" class="form-control" placeholder="---" name="odavcccerca"></td>
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiavesferasf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiavcolindrosf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiavejesf"></td>
        <td style="background-color:#E0E0E0"> <input type="text" class="form-control" placeholder="---" name="oiavprismaf"></td>
        <td style="background-color:#E0E0E0"> <input type="text" class="form-control" placeholder="---" name="oiavadicionf"></td>
      </tr>
  </tbody>
  </table>
  </div>

  <!--==================== FIN AgudezaVisual==================-->

<div class="rxfinal" style="margin:5px">
<table class="table" style="border: solid 2px gray;border-radius:8px;width:100%">
<div><center><h5 style="color:blue;"><strong>RX Final</strong></h5></center></div>
    <thead class="thead-light">
      <tr>
        <th style="text-align:center">OJO</th>
        <th style="text-align:center">ESFERAS</th>
        <th style="text-align:center">CILIDROS</th>
        <th style="text-align:center">EJE</th>
        <th style="text-align:center">PRISMA</th>
        <th style="text-align:center">CORRIGE</th>
        <th style="text-align:center">ADICION</th>
        <th style="text-align:center">CORRIGE</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>OD</td>
        <td> <input type="text" class="form-control" placeholder="---" name="odesferasf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odcilindrosf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odejesf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="dprismaf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="prisodcorrige"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oddicionf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="addodcorrige"></td>        
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiesferasf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oicolindrosf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiejesf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiprismaf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="prisoicorrige"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiadicionf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="addoicorrige"></td>
      </tr>
    <tr style="display:hidden">
      <td colspan="1" style="display:hidden"></td>
      <td style="text-align:center;display:hidden" colspan="3"></td>
      <td style="text-align:center;display:hidden" colspan="4"><span style="color:white">.</span></td>
    </tr>
  </table>

  </div>
  <!--rxfinal-->
</div><!--fin agudezaVisual Rxfinal-->

<div class="col-xs-12">
    <label for="ex3">Test de ISHIHARA</label>
    <input class="form-control" id="ishihara" type="text" name="ishihara" placeholder="Lentes sugeridos">
</div>

<div class="col-xs-12">
    <label for="ex3">Test de AMSLER</label>
    <input class="form-control" id="amsler" type="text" name="amsler" placeholder="Lentes sugeridos">
</div>

<div class="col-xs-12">
    <label for="ex3">Superficie Ocular y Anexos</label>
    <input class="form-control" id="anexos" type="text" name="anexos" placeholder="Lentes sugeridos">
</div>

 
    <div class="col-xs-12">
        <label for="ex3">Lentes Sugeridos</label>
        <input class="form-control" id="sugeridos" type="text" name="sugeridos" placeholder="Lentes sugeridos">
    </div>

    <div class="col-xs-12">
      <label for="comment">Diagnostico</label>
      <textarea cols="80" class="form-control" rows="2" id="diagnostico" name="diagnostico" placeholder="Diagnostico"></textarea>
    </div>

    <div class="col-xs-12">
        <label for="ex3">Medicamento</label>
        <input class="form-control" id="medicamento" type="text" name="medicamento" placeholder="Medicamento">
    </div>

        <div class="col-xs-12">
      <label for="comment">Observaciones</label>
      <textarea cols="80" class="form-control" rows="2" id="observaciones" name="observaciones" placeholder="Observaciones"></textarea>
    </div>

    <div class="col-xs-12">
      
        <input class="form-control" id="codigos" name="codigos" type="hidden" value="codigos" readonly>
  </div>
 <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
     </div>


    <button type="submit" id="agregar" name="agregar" class="btn btn-blue btn-block" id="addEmpresa"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
Guardar</button>
  </form>

  </div>
        <div class="modal-footer">
          <button class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
 <!--FIN FORMULARIO VENTANA MODAL-->
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

