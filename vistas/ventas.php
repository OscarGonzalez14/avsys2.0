
<?php

 require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

     require_once("../modelos/Compras.php");
     require_once("../modelos/Categorias.php");
     require_once("../modelos/Usuarios.php");

      require_once("../modelos/Ventas.php");
     
       $venta = new Ventas();
    
     
      $compra = new Compras();
      $categoria = new Categoria();

      $cat = $categoria->get_categorias();
    
?>


<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php require_once("header.php");?>

<!-- FIN DEL HEADER - LIBRERIAS -->



  <?php if($_SESSION["ventas"]==1)
     {

     ?>

<style>
.navbar-inverse{
    border: 1px;

}

.row1{

  border-style: solid;
  border-color: black;
  border-width: 2px;
  background: white;

}

.row2{

  background: #E0E0E0;

}

#line1{

  background: black;

}
</style>     
<div class="content-wrapper">        
        <!-- Main content -->
    <?php require_once("modal/lista_pacientes_modal.php");?>
    <?php require_once("modal/lista_productos_ventas_modal.php");?>
    <?php require_once("modal/lista_lentes_ventas_modal.php");?>
    <?php require_once("modal/lista_acc_ventas_modal.php");?>
    <?php require_once("modal/lista_ar_ventas_modal.php");?>
    <?php require_once("modal/lista_photo_ventas_modal.php");?>
    <?php require_once("modal/detalle_abonos_pac.php");?>
    <?php require_once("modal/abono_inicial.php");?>
    <?php require_once("modal/listar_paciente_sin_consulta_venta.php");?>
    <?php require_once("modal/modal_sumar_orden.php");?>
    <?php require_once("modal/modal_add_desc_planilla.php");?>
    <?php require_once("modal/load_beneficiarios_ventas.php");?>
    <?php require_once("modal/orden_desc_inicial.php");?>
    <?php require_once("modal/modal_de_beneficiarios_venta.php");?>

  <div>
      <nav class="navbar navbar-inverse">

      <ul class="nav navbar-nav">
          <li class="active"><a href="#">MODULO DE VENTAS</a></li>
          <li><a href="#">Creditos y Pagos</a></li>
          <li><a href="consultar_ventas.php">Reportes General de Ventas</a></li>

      </ul>
      </div>
    </nav>        
<div class="row"><!--Row 2-->
  <div class="col-sm-1"></div>
  <div class="col-sm-10 row2">
    <div class="form-group row">
      <div class="col-xs-2">
        <label for="sel1">Tipo de Venta:</label>
            <select class="form-control" id="tipo_venta" name="tipo_venta">
                <option value="">Seleccione</option>
                <option value="Credito">Crédito</option>
                <option value="Contado">Contado</option>
        </select>
    </div>

     
  <div class="col-xs-3">
      <div class="form-group">
      <label for="sel1">Tipo de Pago:</label>
      <select class="form-control" name="tipo_pago" id="tipo_pago"></select>
      </div>      
    </div>

  <div class="col-xs-2">
      <div class="form-group">
      <label for="sel1">Plazo:</label>
      <select class="form-control" name="plazo" id="plazo"></select>
      </div>      
    </div>

      <div class="col-xs-2">
        <label for="sel1">Existe Consulta:</label>                
        <select class="form-control" name="consulta_ex" id="consulta_ex" required>
          <option value="Si" id="">Si</option>
          <option value="No" id="">No</option>             
        </select>
      </div> 

    <div class="col-xs-3">
      <label for="sel1">Sucursal:</label>                
      <select class="form-control" name="sucursal" id="sucursal" required>
          <option  value="<?php echo $_SESSION["sucursal"];?>"><?php echo $_SESSION["sucursal"];?></option>          
      </select>
    </div> 

 
  </div>
</div> 

</div><!--Fin row 2-->

<div class="row"><!--Row 1-->
  <div class="col-sm-1"></div>
  <div class="col-sm-10 row1">

   <div align="left"><strong><?php echo "Asesor: " . $_SESSION["sucursal"]."<p align='right' id='date'></p>"; ?></strong></div>

    <div class="form-group row">

      <div class="col-xs-2">
        <label for="ex1">#Venta</label>
        <input class="form-control" id="numero_venta" name="numero_venta" type="text" readonly>
      </div>

      <div class="col-xs-4">
        <label for="ex3">Encargado de la Cuenta</label>
        <input class="form-control" id="nombre_pac" type="text" name="nombre_pac" readonly>
      </div>
     <div class="col-xs-4" id="pac_eval">
        <label for="ex3">Paciente evaluado o Beneficiario</label>
        <input class="form-control" id="pac_evaluado" type="text" name="nombre_pac">
      </div>      

    <div class="col-xs-2">
      <label>Buscar Paciente</label>
      <button class="btn btn-blue btn-block paciente_venta"><span class="glyphicon glyphicon-search"></span> </button>       
    </div>

    </div> 

  </div>

  <div class="col-sm-1"></div>
</div><!--Fin row 1-->

<!--=======AGREGAR PRODUCTOS==============-->
<br>
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10 row2">

    <div class="form-group row">

<div class="col-xs-3">
  <button class="btn btn-dark btn-block ventas_record" type="button" data-toggle="modal" data-target="#lista_productos_ventas_Modal" id="ventas_aros_suc"><span class="glyphicon glyphicon-plus"></span> Aros</button>
  </div>

  <div class="col-xs-2">
    <button class="btn btn-dark btn-block ventas_record" type="button" data-toggle="modal" data-target="#lista_lentes_ventas_Modal"><span class="glyphicon glyphicon-sunglasses"></span>  Lentes</button>  
  </div> 

    <div class="col-xs-2">
    <button class="btn btn-dark btn-block ventas_record" type="button" data-toggle="modal" data-target="#lista_acc_ventas_Modal"><span class="glyphicon glyphicon-tasks"></span>  Accesorios</button>  
  </div>

      <div class="col-xs-2">
    <button class="btn btn-dark btn-block ventas_record" type="button" data-toggle="modal" data-target="#lista_ar_ventas_Modal"><span class="glyphicon glyphicon-tasks"></span>  Tipo AR</button>  
  </div>

  <div class="col-xs-3">
    <button class="btn btn-dark btn-block ventas_record" type="button" data-toggle="modal" data-target="#lista_photo_ventas_Modal"><span class="glyphicon glyphicon-tasks"></span>  Photosensible</button>  
  </div>

  </div><!--form-group-->
    </div> 

</div><!--Fin row 2-->
<!--===============*************************-->



<div class="row"><!--Row 3-->
  <div class="col-sm-1"></div>
  
    <div class="col-sm-10 row2">

<table id="detalles" class="table table-striped">


      <thead>
        <tr class="bg-primary" id="line1">               
          <th class="all" colspan="6"></th> 
               
        </tr>
      </thead>               

          <thead>
           <tr class="bg-success">
            <th class="all">Item</th>
            <th>Cantidad</th>
            <th width="30%">Descripcion</th>
         
            <th width="10%">Desc. %</th>
            <th width="10%">P. Unitario</th>
            <th >Subtotal</th>
            </tr>
          </thead>
                  
          <div id="resultados_ventas_ajax"></div>
                 

                 <tbody id="listProdVentas">
                  
                </tbody>

          <thead>            
    <th class="all" colspan="3"><p align="center">SUMAS</p></th> 
    <th class="all" colspan="2"><p align="right"></p></th>
    <th style="background:white" class="all" colspan="2" ><h5 id="subtotal" name="subtotal" align="center">000.00</h5><input type="hidden"></th>
                
</tr>
</thead>

<input type="hidden" name="grabar" value="si">
<input type="hidden" name="id_usuario" id="id_user" value="<?php echo $_SESSION["id_usuario"];?>"/>
<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
<input type="hidden" name="id_paciente" id="id_paciente"/>                
  </table>
 <div class="boton_registrar">
<button type="button" class="btn btn-dark pull-right btn-block" id="btn_enviar" onClick="registrarVenta()"><i class="fa fa-save" aria-hidden="true"></i>  Registrar Venta</button>
</div>

</div> 

<div class="col-sm-1"></div>
</div><!--Fin row -->

<!--MODAL DE PRUEBA-->

<!--MODAL DE PRUEBA-->
</div><!-- /.content-wrapper -->
<!--ORDEN DE DESCUENTO MODAL-->


<!-- FIN ORDEN DE DESCUENTO MODAL-->
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
document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
document.getElementById("hora").value = h;
 </script>

  <!--FIN DE CONTENIDO-->

       <!--VISTA MODAL PARA AGREGAR PROVEEDOR-->
    <?php require_once("modal/lista_proveedores_modal.php");?>
    <!--VISTA MODAL PARA AGREGAR PROVEEDOR-->
    
     <!--VISTA MODAL PARA AGREGAR PRODUCTO-->
    <?php require_once("modal/lista_productos_modal.php");?>


   
  <?php  } else {

       require("noacceso.php");
  }
  
   
  ?><!--CIERRE DE SESSION DE PERMISO -->

   <?php require_once("footer.php");?>


   
    <!--AJAX PROVEEDORES-->
<script type="text/javascript" src="js/paciente.js"></script>

   <!--AJAX PRODUCTOS-->
<script type="text/javascript" src="js/productos.js"></script>
<script type="text/javascript" src="js/ventas.js"></script>
<script type="text/javascript" src="js/recibos.js"></script>
<script type="text/javascript" src="js/desc_planilla.js"></script>
<script>
(function($, window) {
    'use strict';

    var MultiModal = function(element) {
        this.$element = $(element);
        this.modalCount = 0;
    };

    MultiModal.BASE_ZINDEX = 1040;

    MultiModal.prototype.show = function(target) {
        var that = this;
        var $target = $(target);
        var modalIndex = that.modalCount++;

        $target.css('z-index', MultiModal.BASE_ZINDEX + (modalIndex * 20) + 10);

        // Bootstrap triggers the show event at the beginning of the show function and before
        // the modal backdrop element has been created. The timeout here allows the modal
        // show function to complete, after which the modal backdrop will have been created
        // and appended to the DOM.
        window.setTimeout(function() {
            // we only want one backdrop; hide any extras
            if(modalIndex > 0)
                $('.modal-backdrop').not(':first').addClass('hidden');

            that.adjustBackdrop();
        });
    };

    MultiModal.prototype.hidden = function(target) {
        this.modalCount--;

        if(this.modalCount) {
           this.adjustBackdrop();

            // bootstrap removes the modal-open class when a modal is closed; add it back
            $('body').addClass('modal-open');
        }
    };

    MultiModal.prototype.adjustBackdrop = function() {
        var modalIndex = this.modalCount - 1;
        $('.modal-backdrop:first').css('z-index', MultiModal.BASE_ZINDEX + (modalIndex * 20));
    };

    function Plugin(method, target) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('multi-modal-plugin');

            if(!data)
                $this.data('multi-modal-plugin', (data = new MultiModal(this)));

            if(method)
                data[method](target);
        });
    }

    $.fn.multiModal = Plugin;
    $.fn.multiModal.Constructor = MultiModal;

    $(document).on('show.bs.modal', function(e) {
        $(document).multiModal('show', e.target);
    });

    $(document).on('hidden.bs.modal', function(e) {
        $(document).multiModal('hidden', e.target);
    });
}(jQuery, window));

    
  </script>
  <script>
    function mayus(e) {
    e.value = e.value.toUpperCase();
}
  </script>
<?php
   
  } else {

         header("Location:".Conectar::ruta()."vistas/index.php");

     }

?>





