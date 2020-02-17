<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

           
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bodegas</title>
    <script src="https://use.fontawesome.com/385b4d76c6.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/stilos.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    
    <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>

</head>
<body>
<?php require_once("modal/lista_productos_bodega.php");?>
<?php require_once("modal/lista_acc_bodegas.php");?>
<div id="tabla-planes">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="productos.php">Regresar</a></li>
    <li class="breadcrumb-item"><a href="mov_internos.php">Movimientos Internos</a></li>
    <li class="breadcrumb-item"><a href="tras_suc.php">Traslados a Sucursal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bodegas</li>
  </ol>
</nav>
   <div class="tabla-planes">

    <div class="col-p">
      <div class="table-plan" id="sa">
        <br>
          <a class="show_bdsa" data-toggle="modal" data-target="#lista_productos_bodegas_Modal">Ingresar Productos</a>
          <a class="show_bdsa" data-toggle="modal" data-target="#lista_acc_bodegas_Modal">Ingresar Accesorios</a>
          <a>Historial de Ingresos</a>
      </div>
    </div>
</div>

  
</div>
</div><!--====/item bodegas=====-->

<br>

<div class="tabla-planes"><!--Items Productos-->
  <form>
      
        <div class="row">
    <div class="form-group has-success col-sm-6">
      <label for="sucursal">Bodega</label>
      <select id="sucursal" class="form-control form-control-success" style="border-color: #5bc0de; border: solid 2px #5bc0de">
        <option selected value="">Seleccionar</option>
        <option value="Metrocentro">Metrocentro</option>
        <option value="Santa Ana">Santa Ana</option>
        <option value="Bodega Central">Bodega Central</option>
      </select>
    </div>

    <div class="form-group has-success col-sm-6">
      <label for="ubicacion">Ubicacion</label>
      <select id="ubicaciong" class="form-control form-control-success" style="border-color: #5bc0de; border: solid 2px #5bc0de">        
    </select>
    </div>
</div>


    
</div>

<div class="row">
    
    <div class='col-sm-2'></div>
    
    <div class='col-sm-8'>

  <div style="overflow-x:auto;">
  <table class="w3-table w3-bordered" id="tabla_bodegas">
    <thead>
      <tr>                
        <th style="text-align: center; font-size:20px; font-family: 'Helvetica';">Item</th>
        <th style="text-align: center; font-size:20px; font-family: 'Helvetica';">Producto</th>
        <th style="text-align: center; font-size:20px; font-family: 'Helvetica';">Cantidad</th>
      </tr>
    </thead>

    <tbody id="listIngresoSA">
      
    </tbody>    

  </table>
</div>
</div>
<br>

</form>
</div><!-- Fin Items Productos-->
<br>
<div class='row'>
    <div class='col-sm-4'></div>
    <div class='col-sm-4'>
        <button type="button" class="btn btn-block" style='background:black; border-radius:0px;color:white' onclick="updateBodega()">Registrar Ingreso</button>
    </div>
    <div class='col-sm-4'></div>
</div>
    <div class='col-sm-2'></div>
</div><!--finrow--->

<br>
<br>
   
  <div class="row">
  <div class="col-sm-1"></div>
        <div class="col-sm-10">
          
          <div class="box">
            <div class="box-header">
              <h5 class="box-title" style="text-align:center">Existencias</h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="productos_en_existencia" class="table table-bordered table-striped dataTable no-footer dtr-inline collapsed">
                <thead>
                <tr>
                    <th>Cod</th>
                  <th>Modelo</th>
                  <th>Marca</th>
                  <th>Medidas</th>
                  <th>Color</th>
                  <th>Stock</th>
                  <th>Bodega</th>
                  <th>Ubicación</th>
                </tr>
                </thead>                
              </table>
            </div>
          </div>
        </div>
    <div class="col-sm-1"></div>
      </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="js/bodegas.js"></script>
<script type="text/javascript" src="js/productos.js"></script>

</body>
</html>
 <?php  } else {

       require("noacceso.php");
  }
   
  ?><!--CIERRE DE SESSION DE PERMISO --><!--
<script type="text/javascript" src="js/bodegas.js"></script>-->




















