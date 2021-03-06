
<?php

  require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){
        

?>


<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php require_once("header.php");?>
  <style>
    #tamanoModal{
      width: 75% !important;
    }
     #encabezado{
        background-color: #034f84;
        color: white;
    }

  </style>
<!-- FIN DEL HEADER - LIBRERIAS -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">   
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Modulo de Consultas.       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
    
   <div id="resultados_ajax"></div>

       <!--VISTA MODAL PARA VER DETALLE COMPRA EN VISTA MODAL-->
     <?php require_once("modal/detalle_consultas.php");?>
    <ul class="breadcrumb">
  <li><a href="pacientes.php">Regresar</a></li>
 </ul>
   
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Consultas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="consultas_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                   <th>Fecha Consulta</th>
                  <th>Paciente</th>
                  <th>Atendió</th>
                  <th>Detalle Consulta</th>
                  <th>Editar</th>
                </tr>
                </thead>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <!--FORMULARIO VENTANA MODAL CONSULTAS-->
<div class="modal fade" id="consultasModal" role="dialog">
  <div class="modal-dialog" id="tamanoModal">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="encabezado">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <i class="fa fa-user-md" aria-hidden="true"></i> <strong>  EDITAR CONSULTA</strong> 
      </div>  
<div class="modal-body">

  <div class="col-xs-3">
    <label for="ex1">Cod.Paciente</label>
    <input class="form-control" id="codigop" name="codigop" type="text" readonly>
  </div>

  <div class="col-xs-6">
    <label for="ex3">Nombre</label>
    <input class="form-control" id="nombre_pac" type="text" name="nombre_pac" readonly>
  </div>

  <div class="col-xs-3">
    <label for="ex3">Fecha Consulta</label>
    <input class="form-control" id="fecha_consulta" type="text" name="fecha_consulta" readonly>
  </div>
     
  <div class="col-xs-12">
    <label for="comment">Motivo de Consulta</label>
    <input class="form-control" id="mot_consulta" name="mot_consulta" type="text">
  </div>

  <div class="col-xs-12">
    <label for="comment">Patologias</label>
    <input class="form-control" rows="2" id="patologias_c" name="patologias"></textarea>
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
        <td> <input type="text" class="form-control" placeholder="---" name="odesferasl_e" id="odesferasl_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odcilndrosl_e" id="odcilndrosl_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odejesl" id="odejesl_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odprismal" id="odprismal_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odadicionl" id="odadicionl_e"></td>
        
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiesfreasl" id="oiesfreasl_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oicilindrosl" id="oicilindrosl_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiejesl" id="oiejesl_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiprismal" id="oiprismal_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiadicionl" id="oiadicionl_e"></td>
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
        <td> <input type="text" class="form-control" placeholder="---" name="odesferasa" id="odesferasa_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odcilindrosa" id="odcilindrosa_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odejesa" id="odejesa_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="dprismaa" id="dprismaa_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oddiciona" id="oddiciona_e"></td>        
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiesferasa" id="oiesferasa_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oicolindrosa" id="oicolindrosa_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiejesa" id="oiejesa_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiprismaa" id="oiprismaa_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiadiciona" id="oiadiciona_e"></td>
      </tr>
      
    </tbody>
  </table>
</div><!--FIN AUTOREFRACT-->
</div><!--FIN DISPLAY FELEX--> 

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
        <td> <input type="text" class="form-control" placeholder="---" name="odavsclejos" id="odavsclejos_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odavphlejos" id="odavphlejos_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odavcclejos" id="odavcclejos_e"></td>
        <td style="background-color:#E0E0E0"> <input type="text" class="form-control" placeholder="---" name="odavsccerca" id="odavsccerca_e"></td>
        <td style="background-color:#E0E0E0"> <input type="text" class="form-control" placeholder="---" name="odavcccerca" id="odavcccerca_e"></td>
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiavesferasf" id="oiavesferasf_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiavcolindrosf" id="oiavcolindrosf_e"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiavejesf" id="oiavejesf_e"></td>
        <td style="background-color:#E0E0E0"> <input type="text" class="form-control" placeholder="---" name="oiavprismaf" id="oiavprismaf_e"></td>
        <td style="background-color:#E0E0E0"> <input type="text" class="form-control" placeholder="---" name="oiavadicionf" id="oiavadicionf_e"></td>
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
        <td> <input type="text" class="form-control" placeholder="---" name="odesferasf" id="odesferasf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odcilindrosf" id="odcilindrosf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="odejesf" id="odejesf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="dprismaf" id="dprismaf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="prisodcorrige" id="prisodcorrige"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oddicionf" id="oddicionf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="addodcorrige" id="addodcorrige"></td>        
      </tr>
      <tr>
        <td>OI</td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiesferasf" id="oiesferasf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oicolindrosf" id="oicolindrosf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiejesf" id="oiejesf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiprismaf" id="oiprismaf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="prisoicorrige" id="prisoicorrige"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="oiadicionf" id="oiadicionf"></td>
        <td> <input type="text" class="form-control" placeholder="---" name="addoicorrige" id="addoicorrige"></td>
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
<div>

  <button type="submit" id="agregar" name="agregar" class="btn btn-blue btn-block" onClick="editarConsultas();"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
Editar</button>
</div>


  </div>
        
      
    </div>
  </div>
 <!--FIN FORMULARIO VENTANA MODAL-->
  </div>
  <!-- /.content-wrapper -->

   
  

   <?php require_once("footer.php");?>

    <!--AJAX PROVEEDORES-->
<script type="text/javascript" src="js/consultas.js"></script>


<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");
     }

?>