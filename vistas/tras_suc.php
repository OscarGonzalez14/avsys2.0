
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
  <?php require_once("modal/listar_aros_env_suc.php");?>        
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
      <label for="sucursal">Sucursal Origen</label>
      <select id="suc_origen" name="suc_origen" class="form-control form-control-success">
        <option selected value="">Seleccionar</option>
        <option value="Metrocentro">Metrocentro</option>
        <option value="Santa Ana">Santa Ana</option>
     </select>    
      </div>

      <div class="col-xs-4">         
      <label for="sucursal">Sucursal Destino</label>
      <select id="suc_destino" name="suc_destino" class="form-control form-control-success">
        <option selected value="">Seleccionar</option>
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
   <button class="btn btn-dark btn-block pull-left" type="button" data-toggle="modal" data-target="#envSucursal"><span class="glyphicon glyphicon-sunglasses"></span> Aros</button>
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
        <th>Item</th>
        <th>Descripcion</th>
        <th>Cantidad</th>
        <th>Ubicación de Origen</th>
      </tr>
    </thead>                  
  <tbody id="listEnviosSucursal"></tbody>          
<input type="hidden" name="tipo_traslado" id="tipo_traslado" value="sucursal-sucursal">
<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
               
  </table>
 <div class="boton_registrar">
<button type="button" onClick="registrarTrasladosSucursales()" class="btn btn-dark pull-right btn-block" id="btn_enviar"><span class="glyphicon glyphicon-share-alt">  Realizar Traslado a Sucursal</button>

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

