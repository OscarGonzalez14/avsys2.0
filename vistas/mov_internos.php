
<?php

 require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){
     require_once("../modelos/Usuarios.php");
     require_once("../modelos/Movimientos.php"); 

    $envio = new Envios();
     
?>

<?php require_once("header.php");?>

<?php if($_SESSION["productos"]==1)
{ ?>
   


<div class="content-wrapper">
  <?php require_once("modal/lentes_envio_modal.php");?>        
  <h3 align="center">CONTROL DE MOVIMIENTO DE PRODUCTOS</h3>
<br>
  <div class='row'>
    <div class='col-sm-1'></div>
      <div class='col-sm-10 row1'>
        <div align="left"><strong><?php echo "Usuario: " . $_SESSION["usuario"]."<span style='color:white'>Sucursal-Sucursal</span>Movimientos en Bodega"."<p align='right' id='date'></p>"; ?></strong></div>
      <div class="form-group row">

      <div class="col-xs-2">
          <label for="ex1">Numero Envio</label>
          <input class="form-control" id="numero_envio" name="numero_envio" type="text" value="<?php $cod_envio=$envio->numero_movimiento();?>"  readonly>
      </div>

      <div class="col-xs-4">         
      <label for="sucursal">Seleccionar Bodega</label>
      <select id="sucursal_origen" class="form-control form-control-success">
        <option value="">Seleccionar</option>
        <option value="Metrocentro">Metrocentro</option>
        <option value="Santa Ana">Santa Ana</option>
     </select>    
      </div>

      </div>
    </div><!--Fin row1-->
<div class='col-sm-1'></div>
</div><!-- /. Fincontent-wrapper -->
 

 <div class="row"><!--Row 3-->
  <div class="col-sm-1"></div>
  
    <div class="col-sm-10 row2">

<table id="detalles" class="table table-striped">

<div class="col-xs-3">
   <label for="ex1">Trasladar Aros</label>
   <button class="btn btn-dark btn-block pull-left" type="button" data-toggle="modal" data-target="#modalEnvios"><span class="glyphicon glyphicon-sunglasses"></span> Aros</button>
</div> 

<div class="col-xs-3">
   <label for="ex1">Trasladar Accesorios</label>
   <button class="btn btn-dark btn-block pull-left" type="button" data-toggle="modal" data-target="#modalEnvios"><i class="fa fa-tag" aria-hidden="true"></i></span> Accesorios</button>
</div> 

<thead>
    <th class="all" colspan="6"></th>               
</thead>               

    <thead>
      <tr class="bg-primary">  
        <th colspan="1">Item</th>
        <th colspan="4">Descripcion</th>
        <th colspan="2">Cantidad</th>
        <th> Ub. Origen</th>
        <th> Ub. Destino</th>
      </tr>
    </thead>                  
  <tbody id="listProdEnvios"></tbody>          
<input type="hidden" name="tipo_traslado" value="interno">
<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
               
  </table>
 <div class="boton_registrar">
<button type="button" onClick="registrarTraslados()" class="btn btn-dark pull-right btn-block" id="btn_enviar"><span class="glyphicon glyphicon-share-alt">  Realizar Traslado</button>

</div>

    </div> 

  <div class="col-sm-1"></div>
</div><!--Fin row -->
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
document.getElementById("date").innerHTML = d + "/" + m + "/" + y+" "+h;
 </script>
  
  <!--FIN DE CONTENIDO-->
   
  <?php  } else {

       require("noacceso.php");
  }
  
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

   <?php require_once("footer.php");?>

<!--AJAX PRODUCTOS-->
<script type="text/javascript" src="js/movimientos.js"></script>


<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>

