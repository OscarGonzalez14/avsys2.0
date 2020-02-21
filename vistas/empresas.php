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

<div class="content-wrapper">        
        <!-- Main content -->
<section class="content">
  <input type="hidden" id="sucursal_paciente" value="<?php echo $_SESSION["cedula"];?>">
  <div id="resultados_ajax"></div>
  <h3 align="center">MODULO EMPRESAS</h3>

  <div class="row">
    <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h1 class="box-title"><button class="btn btn-dark btn-lg"  data-toggle="modal" data-target="#nuevaEmpresasModal"><i class="fa fa-plus" aria-hidden="true"></i> Crear Empresa</button></h1>                            
            <div class="box-tools pull-right"></div>
          </div>
    <div class="panel-body table-responsive">                          
        <table id="paciente_data" class="table table-bordered table-striped">
          <thead>                              
              <tr>                                  
                <th>Cod.</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th>NIT</th>
                <th>Responsable RRHH</th>                                
                <th width="10%">Editar</th>                                
              </tr>
          </thead>
          <tbody>                     
          </tbody>
      </table>                     
    </div><!--Fin tabla Datatable -->                 
                    
  </div><!-- /.box -->
  </div><!-- /.col -->
  </div><!-- /.row -->
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

<script type="text/javascript" src="js/empresas.js"></script>
<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

