
<?php

require_once("../config/conexion.php");

if(isset($_SESSION["id_usuario"])){
    
    require_once("../modelos/Recibos.php");
     
       $n_orden = new Recibos();
        

?>

<?php require_once("header.php");?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1> ORDENES A LABORATORIOS</h1>
    
   <div id="resultados_ajax"></div>

    <div class="panel panel-default">        
        <div class="panel-body">
          <div class="btn-group text-center">
            <a class="btn btn-dark btn-lg" data-toggle="modal" data-target="#nueva_orden"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Orden</a>
          </div>
       </div>
    </div>   
   
  <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="data_ordenes" class="table table-bordered table-striped dataTable no-footer dtr-inline collapsed">
                <thead>
                <tr>
                  <th>No. Orden</th>
                  <th>Fecha Envio</th>
                  <th>Laboratorio</th>
                  <th>Sucursal</th>
                  <th>Nombre de Paciente</th>
                  <th>Detalles</th>
                  <th>Rechazar Orden</th>
                  <th>Recibir Orden</th>
                  <th>Estado</th>
                </tr>
                </thead>                
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!--MODAL CREAR NUEVA ORDEN-->

 <style>
    #tamModal{
      width: 55% !important;
    }
     #head{
        background-color: #034f84;
        color: white;
    }
</style>



<!-- Modal -->
<div id="nueva_orden" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamModal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" align="center"><i class="fa fa-plus" aria-hidden="true"></i> NUEVA ORDEN A LABORATORIOS</h5>
      </div>
      <div class="modal-body">
     <!--Tabla generalidades del paciente-->

    <form method="post" action="../ajax/registra_ordenes.php"> 
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <tr>
             <th><p align="center">Sucursal</p></th>  
            <th><p align="center">Nombre del Paciente</p></th>
            <th><p align="center">Seleccione Laboratorio</p></th>
          </tr>
        </thead>

        <tbody>
        <td align="center"><select class='form-control' id='sucursal' name='sucursal'><option value='' required>Seleccione Sucursal</option><option value='Metrocentro'>Metrocentro</option><option value='Empresarial'>Empresarial</option><option value='Santa Ana'>Santa Ana</option></select></td></td>   
        <td><input type='text' class='form-control' id='paciente' name='paciente'></td>
          <td align="center"><select class='form-control' id='foptica' name='optica'><option value='' required>Seleccione</option><option value='Lomed'>Lomed</option><option value='PrismaLab'>PrismaLab</option><option value='OptiProcesos'>OptiProcesos</option></select></td></td>
        </tbody>
      </table>

      <table class="table">

    <thead class="thead-light">
      <tr>
        <th style="text-align:center;">OJO</th>
        <th style="text-align:center">ESFERA</th>
        <th style="text-align:center">CILIDRO</th>
        <th style="text-align:center">EJE</th>
        <th style="text-align:center">ADICION</th>
        <th style="text-align:center">PRISMA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>OD</td>
        <td> <input type="text" class="form-control" placeholder="---" name="odesfreasl" ></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odcilindrosl" ></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odejesl" ></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odadicionl" ></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odprismal"></td>
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiesferasl"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oicilndrosl"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiejesl"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiadicionl"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiprismal"></td>
        
      </tr>
    </tbody>
  </table>

  <table class="table">
    <tbody>
      <tr>
        <td><strong>POLICARBONATO</strong></td>
        <td><input type="text" class="form-control" name="policarbonato" ></td>
        <td><strong>AR</strong>&nbsp;&nbsp;&nbsp;<label class="checkbox-inline"><input type="checkbox" name="anti" value="Si">Si</label>
        <label class="checkbox-inline"><input type="checkbox" value="No" name="anti">No</label></td>
        <td style="text-align:right"><strong>CLASE DE LENTES</strong></td>
        <td colspan="2"><input type="text" class="form-control" name="tipo_lentes" ></td>
      </tr>
      <tr>
        <td colspan="2"> <input type="text" class="form-control" placeholder="COLOR" name="color_lente"></td>
        <td colspan="2"> <input type="text" class="form-control" placeholder="BASE" name="base_lente"></td>
          
      </tr>
    </tbody>
  </table>

  <table class="table">

    <thead class="thead-light">
      <tr>
       <th style="text-align:center;">OJO</th>
        <th style="text-align:center;background-color:#034f84;color:white">ALTURA OBLEA</th>
        <th style="text-align:center;background-color:#034f84;color:white">ALTURA PUILAR</th>
        <th style="text-align:center;background-color:#034f84;color:white">D.P LEJOS</th>
        <th style="text-align:center;background-color:#034f84;color:white">D.P CERCA</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>OD</td>
        <td> <input type="text" class="form-control" name="odoblea" ></td>
        <td> <input type="text" class="form-control" name="odpupilar" ></td>
        <td> <input type="text" class="form-control" name="oddplejos" ></td>
        <td> <input type="text" class="form-control" name="odpcerca" ></td>
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" name="oioblea"></td>
        <td> <input type="text" class="form-control" name="oipupilar"></td>
        <td> <input type="text" class="form-control" name="oidplejos"></td>
        <td> <input type="text" class="form-control" name="oidpcerca"></td>
        
      </tr>

      <tr>
        <td>ARO</td>
        <td> <input type="text" class="form-control" name="aro"></td>
        <td> <input type="text" class="form-control" name="color_aro" placeholder="COLOR"></td>
        <td> <input type="text" class="form-control" name="medidas_aro" placeholder="MEDIDAS"></td>        
      </tr>
      <tr>
        <td colspan="5"> <input type="text" class="form-control" placeholder="OBSERVACIONES" name="odesferasl"></td>
      </tr>
    </tbody>
  </table>

<div class="row">

  <div class="col-sm-3">
    <label for="medida_lente_a">A Horizontal:</label>
    <input type="text" class="form-control" id="medida_lente_a" name="medida_lente_a" placeholder="A">
  </div>
  <div class="col-sm-3">
    <label for="medida_lente_b">B Vertical:</label>
    <input type="text" class="form-control" id="medida_lente_b" name="medida_lente_b" placeholder="B">
  </div>
  <div class="col-sm-3">
    <label for="medida_lente_c">C Diagonal:</label>
    <input type="text" class="form-control" id="medida_lente_c" name="medida_lente_c" placeholder="C">
  </div>
  <div class="col-sm-3">
    <label for="medida_lente_d">D Puente:</label>
    <input type="text" class="form-control" id="medida_lente_d" name="medida_lente_d" placeholder="D" required>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6">
    <label for="diseño_aro">Diseño Aro</label>
    <select class='form-control' id='diseno_aro' name='diseno_aro'><option value='' required>Seleccione Diseño</option><option value='Completo'>Completo</option><option value='Semi-Aereo'>Semi-Aereo</option><option value='Aereo'>Aereo</option></select>
  </div>
  <div class="col-sm-6">
    <label for="materiales">Materiales:</label>
    <select class='form-control' id='materiales' name='materiales'><option value='' required>Seleccione Material</option><option value='Acetato'>Acetato</option><option value='Metalico'>Metalico</option><option value='Termoplastico'>Termoplastico</option></select>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <label for="numero_orden">No. Orden:</label>
    <input type="text" class="form-control" id="numero_orden" name="numero_orden" value="<?php $codigo=$n_orden->numero_orden();?>" readonly>
  </div>
  <div class="col-sm-6">
    <label for="fecha">Fecha y Hora de Envio:</label>
    <input id="fecha" type="text" name="fecha" class="form-control" readonly>
  </div>
</div>


</div> 
<input type="hidden" name="id_usuario" id="id_usuario_ini" value="<?php echo $_SESSION["usuario"]; ?>"/>
<input type="hidden" name="estado" id="estado" value="Enviado de Optica a Laboratorio"/>
<input id="id_credito" type="hidden" name="id_credito">
<input id="id_paciente_ini" type="hidden" name="id_paciente_ini">

<br>

      </div>
      <div class="modal-footer">
    <button type="submit"  class="btn btn-dark pull-right btn-block" id="btn_enviar_ini"><i class="fa fa-save" aria-hidden="true"></i>  Crear Orden</button>
</form>    
      </div>
    </div>

  </div>
</div>
<!--MUESTRA DETALLE ORDEN-->



<!-- ==========MODAL MUESTRA ORDEN-->
<div id="show_orden" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamModal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" align="center"><i class="fa fa-plus" aria-hidden="true"></i> NUEVA ORDEN A LABORATORIOS</h5>
      </div>
      <div class="modal-body">
     <!--Tabla generalidades del paciente-->

    <form class="form-horizontal"> 
      <table  class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <tr>
            <th><p align="center">Fecha Creación</p></th>
            <th><p align="center">Creado por:</p></th>
            <th><p align="center">Sucursal</p></th>
            <th><p align="center" colspan='3'>Nombre del Paciente</p></th>
            <th><p align="center">Laboratorio</p></th>
          </tr>
        </thead>

        <tbody>
        <td><input type='text' class='form-control' id='fecha_crea' name='fecha_crea' readonly></td>
        <td><input type='text' class='form-control' id='user_cre' name='user_cre' readonly></td>
        <td><input type='text' class='form-control' id='sucursal' name='sucursal' readonly></td>
        <td><input type='text' class='form-control' id='paciente_o' name='paciente_o' readonly></td>
        <td><input type='text' class='form-control' id='laboratorio_o' name='laboratorio_o' readonly></td>
        </tbody>
      </table>

  <table class="table">
    <thead class="thead-light">
      <tr>
        <th style="text-align:center;">OJO</th>
        <th style="text-align:center">ESFERA</th>
        <th style="text-align:center">CILIDRO</th>
        <th style="text-align:center">EJE</th>
        <th style="text-align:center">ADICION</th>
        <th style="text-align:center">PRISMA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>OD</td>
        <td> <input type="text" class="form-control" placeholder="---" id="odesfreasl_o" ></td>
        <td> <input type="text" class="form-control" placeholder="---" id="odcilindrosl_o" ></td>
        <td> <input type="text" class="form-control" placeholder="---" id="odejesl_o" ></td>
        <td> <input type="text" class="form-control" placeholder="---" id="odprismal_o" ></td>
        <td> <input type="text" class="form-control" placeholder="---" id="odadicionl_o"></td>
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" id="oiesferasl_o"></td>
        <td> <input type="text" class="form-control" placeholder="---" id="oicilndrosl_o"></td>
        <td> <input type="text" class="form-control" placeholder="---" id="oiejesl_o"></td>
        <td> <input type="text" class="form-control" placeholder="---" id="oiprismal_o"></td>
        <td> <input type="text" class="form-control" placeholder="---" id="oiadicionl_o"></td>
        
      </tr>
    </tbody>
  </table>



<div class="row">
  <div class="col-sm-4">
    <label for="medida_lente">Medidas:</label>
    <input type="text" class="form-control" id="medida_lente" name="medida_lente">
  </div>
  <div class="col-sm-2">
    <label for="medida_lente_a">A:</label>
    <input type="text" class="form-control" id="medida_lente_a" name="medida_lente_a" placeholder="A">
  </div>
  <div class="col-sm-2">
    <label for="medida_lente_b">B:</label>
    <input type="text" class="form-control" id="medida_lente_b" name="medida_lente_b" placeholder="B">
  </div>
  <div class="col-sm-2">
    <label for="medida_lente_c">C:</label>
    <input type="text" class="form-control" id="medida_lente_c" name="medida_lente_c" placeholder="C">
  </div>
  <div class="col-sm-2">
    <label for="medida_lente_d">D:</label>
    <input type="text" class="form-control" id="medida_lente_d" name="medida_lente_d" placeholder="D" required>
  </div>
</div>
<br>

<div class="row">
  <div class="col-sm-6">
    <label for="numero_orden">No. Orden:</label>
    <input type="text" class="form-control" id="numero_orden" name="numero_orden" value="<?php $codigo=$n_orden->numero_orden();?>" readonly>
  </div>
  <div class="col-sm-6">
    <label for="fecha">Fecha y Hora de Envio:</label>
    <input id="fecha" type="text" name="fecha" class="form-control" readonly>
  </div>
</div>
</div> 
</div>
      <div class="modal-footer">
</form>    
      </div>
    </div>

  </div>
</div>
<?php require_once("footer.php");?>

    <!--AJAX VENTAS-->
<script type="text/javascript" src="js/ordenes.js"></script>

 <script>
n =  new Date();
//Año
y = n.getFullYear();
//Mes
m = n.getMonth() + 1;
//Día
d = n.getDate();

h=n.getHours()+":"+n.getMinutes()+":"+n.getSeconds();

//Lo ordenas a gusto.
document.getElementById("fecha").value = d + "/" + m + "/" + y+" - "+h;
 </script>
<?php
   
 } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>







