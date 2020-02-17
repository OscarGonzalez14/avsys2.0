<?php 
require_once("header.php");
require_once("nav.php");

?>

	<h3 style="text-align: center;">EXPEDIENTES CLINICOS   -   OPTICA AV PLUS</h3>


<div class="row">

	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<section class="content">
    
   <div id="resultados_ajax"></div>

  
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="consultas_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fecha Consulta</th>
                  <th>Paciente</th>
                  <th>Diagnostico</th>
                  <th>Detalles</th>                 
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
	</div>
	<div class="col-sm-1"></div>	
</div>

 <style>
    #tamanoModal{
      width: 65% !important;
    }
     #encabezado{
        background-color: #034f84;
        color: white;
    }

  #encabezado2{
        background-color: #034f84;
        color: white;
  }
  </style>



<div id="detalle_consulta" class="modal fade" role="dialog">
  <div class="modal-dialog" id="tamanoModal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="encabezado">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style='text-align:center'> <span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> EXPEDIENTE CLINICO   -  OPTICA AV PLUS</h4>
      </div>
      <div class="modal-body"><!--Modal body-->
        
<div class="table-responsive">          
  <table class="table">
    <thead style="background-color: black; color: white;">
        <tr>
        <th colspan="2" style='text-align:center'>Codigo</th>
        <th colspan="2" style='text-align:center'>Paciente</th>
        <th  style='text-align:center'>Fecha de consulta</th>
        <th style='text-align:center'>Atendido por:</th>
        </tr>
    </thead>
    <tbody>                            
        <tr>
        <td colspan="2"><p id="codigo" name="codigo" align="center"></p></td>
        <td colspan="2"><p id="nombres" name="nombres" align="center"></p></td>
        <td><p colspan="1" id="fecha_reg" name="fecha_reg" align="center"></p></td>
        <td><p colspan="1" id="usuario" name="usuario" align="center"></p></td>
    </tbody>
    
    </tbody>

    <thead style="background-color:black" align="center">
        <tr>
            <th colspan="6" style='text-align:center; color:white'>Diagnostico</th>
        </tr>
    </thead>
    <tbody>                            
        <tr>
            <td colspan="6"><p id="diagnostico" name="diagnostico" align="center"></p></td>     
        </tr>
    </tbody>
    
    <thead class="thead-default" align="center">
    <tr><th colspan="6" style='text-align:center; color:black' ><strong>LENSOMETRIA</strong></th></tr>
    </thead>
    
    <thead>
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
        <td>OI</td>
        <td> <p name="oiesfreasl" id="oiesfreasl" align="center" style="color:black"></p></td>
        <td> <p name="oicilindrosl" id="oicilindrosl" align="center"></p></td>
        <td> <p name="oiejesl" id="oiejesl" align="center"></p></td>
        <td> <p name="oiprismal" id="oiprismal" align="center"></p></td>
        <td> <p name="oiadicionl" id="oiadicionl" align="center"></p></td>
        
      </tr>
      <tr>
        <td>OD</td>
        <td> <p name="odesferasl" id="odesferasl" align="center"></p></td>
        <td> <p name="odcilndrosl" id="odcilndrosl" align="center"></p></td>
        <td> <p name="odejesl" id="odejesl" align="center"></p></td>
        <td> <p name="odprismal" id="odprismal" align="center"></p></td>
        <td> <p name="odadicionl" id="odadicionl" align="center"></p></td>
        
      </tr>
    </tbody>
    
    <thead class="thead-default" align="center">
        <tr>
          <th colspan="6" style='text-align:center; color:black'><strong>RX AUTOREFRACTOMETRO</strong></th>          
         </tr>
    </thead>


    <thead class="thead-default">
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
        <td>OI</td>
        <td> <p name="oiesferasa" id="oiesferasa" align="center"></p></td>
        <td> <p name="oicolindrosa" id="oicolindrosa" align="center"></p></td>
        <td> <p name="oiejesa" id="oiejesa" align="center"></p></td>
        <td> <p name="oiprismaa" id="oiprismaa" align="center"></p></td>
        <td> <p name="oiadiciona" id="oiadiciona" align="center"></p></td>
        
      </tr>
      <tr>
        <td>OD</td>
        <td> <p name="odesferasa" id="odesferasa" align="center"></p></td>
        <td> <p name="odcilindrosa" id="odcilindrosa" align="center"></p></td>
        <td> <p name="odejesa" id="odejesa" align="center"></p></td>
        <td> <p name="dprismaa" id="dprismaa" align="center"></p></td>
        <td> <p name="oddiciona" id="oddiciona" align="center"></p></td>        
      </tr>

    <thead class="thead-default" align="center" style='color: black'>
      <tr>
          <th colspan="6"  style='text-align:center; color:black'><strong>RX FINAL</strong></th>          
      </tr>
    </thead>
    
    </tbody>
    
    
    <thead class="thead-default">
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
        <td>OI</td>
        <td> <p name="oiesferasf" id="oiesferasf" align="center"></p></td>
        <td> <p name="oicolindrosf" id="oicolindrosf" align="center"></p></td>
        <td> <p name="oiejesf" id="oiejesf" align="center"></p></td>
        <td> <p name="oiprismaf" id="oiprismaf" align="center"></p></td>
        <td> <p name="oiadicionf" id="oiadicionf" align="center"></p></td>
        
      </tr>
      <tr>
        <td>OD</td>
        <td> <p name="odesferasf" id="odesferasf" align="center"></p></td>
        <td> <p name="odcilindrosf" id="odcilindrosf" align="center"></p></td>
        <td> <p name="odejesf" id="odejesf" align="center"></p></td>
        <td> <p name="dprismaf" id="dprismaf" align="center"></p></td>
        <td> <p name="oddicionf" id="oddicionf" align="center"></p></td>        
      </tr>
    </tbody>
    
    <thead style="background-color:#034f84: color: white" >
          <tr>
            <th colspan="3"><p align="center">Medicamento</p></th>
            <th colspan="3"><p align="center">Lentes sugeridos</p></th>
          </tr>
    </thead>
    <tbody>                            
        <tr>
            <td colspan="3"><p id="medicamento" name="medicamento" align="center"></p></td>
            <td colspan="3"><p id="sugeridos" name="sugeridos" align="center"></p></td>
        </tr>
    </tbody>

        <thead style="background-color:black; color: white" >
          <tr>
            <th colspan="6" style='text-align:center'>Observaciones</th>
          </tr>
        </thead>
          <tbody>                            
              <tr>
                <td colspan="6"><p id="observaciones" name="observaciones" align="center"></p></td>  
            </tr>
                
          </tbody>
  
  </table><!--fin tabla-->
  </div>

        
        
      </div><!--Fin Modal body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">SALIR</button>
      </div>
    </div>

  </div>
</div>       
  
<?php 
require_once("footer.php");
?>

<script type="text/javascript" src="js/expedientes.js"></script>

</html>

