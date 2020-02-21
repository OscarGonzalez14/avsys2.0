
<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["correo"])){



       /*Se llaman los modelos y se crean los objetos para llamar el numero de registros en el menu lateral izquierdo y en el home*/
      
      require_once("../modelos/Proveedores.php");
      require_once("../modelos/Compras.php");
      require_once("../modelos/Pacientes.php");
      require_once("../modelos/Ventas.php");

      
       $proveedor = new Proveedor();
       $compra = new Compras();
       $paciente = new Paciente();
       $venta = new Ventas();



        $datos=$compra->get_compras_anio_actual();

        $datos_venta=$venta->get_ventas_anio_actual();  


?>


<?php require_once("header.php");?>

     
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">BIENVENID@: <span style="text-transform: uppercase;"><?php echo $_SESSION["usuario"];?></span> </h1>
      <br>
      <h1 align="center">OPTICA AV PLUS <span style="text-transform: uppercase;"><?php echo $_SESSION["cedula"];?></span></h1>
      <br>
<div align="center"><img src="../img/logooficial2.png" align="center"/></div>    </section>
<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["cedula"];?>"/>
<?php
     
     } else {

         header("Location:".Conectar::ruta()."vistas/index.php");
        exit();
     }
  ?>


