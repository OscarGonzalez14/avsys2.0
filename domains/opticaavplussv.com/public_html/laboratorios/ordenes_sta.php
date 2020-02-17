<?php

   require_once("config/conexion.php");

    if(isset($_SESSION["nombre"])){

    
    
?>

<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
    <title>Laboratorios</title>
    <script src="https://use.fontawesome.com/385b4d76c6.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <link rel="stylesheet" href="estilos.css">
    

<head>
	<meta charset="UTF-8">
	<title>Laboratorios</title>
</head>
<body>

<?php require_once("nav.php");?>
<input id="empresa" type="hidden" value="<?php echo $_SESSION['usuario'];?>">

<br>
<!--=============PENDIENTE=============-->
		<!--<button type="button" class="btn btn-primary btn-block" style="background:black; color: white; border-radius: 0px; border:0px">Bienvenidos Laboratorios <?php echo $_SESSION["nombre"];?></button>-->
    <h3 style="text-align:center; color:black">ORDENES SANTA ANA</h3>
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
    <table id="ordenes_sta" class="table" style="background: white; width:100%;color:black">
            <thead>
            <tr>
              <th style="color:black;">No.Orden</th>
              <th style="color:black;">Fecha</th>
              <th style="color:black;">Tiempo Transcurrido</th>
              <th style="color:black">Paciente</th>
              <th style="color:black;">Tipo Lente</th>
              <th style="color:black;">Estado</th>
              <th style="color:black;">Descargar</th>
              <th style="color:black;">Enviar a Optica</th>
            </tr>
            </thead>                
        </table>
  </div>
  <div class="col-sm-1"></div>
  </div>

<br>

<div id='orden_pdf' style=" visibility: hidden;">
<p>No. Orden: <span id='numero_orden' name='numero_orden'></span><span style="color:white">iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</span>Fecha Impresion: <span id='fecha' name='fecha'></span></p>
  <table style="width:100%">
      
 <tr>
    <td><strong><p>Paciente</p></p></strong></td>
    <td><strong><p>Empresa</p></p></strong></td> 
 </tr>  

  <tr>
    <td><p type='text' id='paciente' name='paciente'></p></td>
    <td>AV Plus&nbsp; <p type='text' id='sucursal' name='sucursal'></p></td>
  </tr>
</table>

<table style="width:100%">
  <tr>
    <td>-</td>
    <td>Esfera</td>
    <td>Cilindro</td>
    <td>Eje</td>
    <td>Adicion</td>
    <td>Prisma</td>
  </tr>

    <tr>
    <td>OD</td>
    <td><p id='odesfera' name='odesfera'></td>
    <td><p id='odcilindro' name='odcilindro'></td>
    <td><p id='odeje' name='odeje'></td>
    <td><p id='odadicion' name='odadicion'></td>
    <td><p id='odprisma' name='odprisma'></td>
  </tr>
  
 <tr>
    <td>OI</td>
    <td><p id='oiesfera' name='oiesfera'></td>
    <td><p id='oicilindro' name='oicilindro'></td>
    <td><p id='oieje' name='oieje'></td>
    <td><p id='oiadicion' name='oiadicion'></td>
    <td><p id='oiprisma' name='oiprisma'></td>
  </tr>
</table>

<table style="width:100%">
  <tr>
    <td>Policarbonato</td>
    <td>Antireflejo</td>
    <td>Lente</td>
  </tr>

  <tr>
    <td><p id='policarbonato' name='policarbonato'></td>
    <td><p id='antireflejo' name='antireflejo'></td>
    <td><p id='lente' name='lente'></td>
  </tr>
<p id='cr' name='cr'></td>
  </tr>
</table>
<table>
      <tr>
    <td>Color Lente</td>
    <td>Base</td>
    <td>CR-39</td>
  </tr>

    <tr>
    <td><p id='color' name='color'></td>
    <td><p id='base' name='base'></td>
    <td>  
</table>
<table>
  <tr>
    <td>-</td>
    <td>Altura Oblea</td>
    <td>Altura Pupilar</td>
    <td>D.P. Lejos</td>
    <td>D.P. Cerca</td>
  </tr>

    <tr>
    <td>OD</td>
    <td><p id='odoblea' name='odoblea'></td>
    <td><p id='odpupilar' name='odpupilar'></td>
    <td><p id='odplejos' name='odplejos'></td>
    <td><p id='odpcerca' name='odpcerca'></td>
  </tr>
  
 <tr>
    <td>OI</td>
    <td><p id='oioblea' name='oioblea'></td>
    <td><p id='oipupilar' name='oipupilar'></td>
    <td><p id='oiplejos' name='oiplejos'></td>
    <td><p id='oipcerca' name='oipcerca'></td>
  </tr>
</table>

<table>
  <tr>
    <td>Aro</td>
    <td>color</td>
    <td>Medida</td>
  </tr>
  
 <tr>
    <td><p id='aro' name='aro'></td>
    <td><p id='color_aro' name='color_aro'></td>
    <td><p id='medida_aro' name='medida_aro'></td>
  </tr>
</table>

<table>
  <tr>
    <td>A (Horizontal)</td>
    <td>B (Vertical)</td>
    <td>C (Diagonal)</td>
    <td>D (Puente)</td>
  </tr>
  
 <tr>
     <td><p id='m_a' name='m_a'></td>
    <td><p id='m_b' name='m_b'></td>
    <td><p id='m_c' name='m_c'></td>
    <td><p id='m_d' name='m_d'></td>
  </tr>
</table>

<table>
  <tr>
    <td>Diseño Aro</td>
    <td>Material</td>
  </tr>
  
 <tr>
     <td><p id='diseno_aro' name='diseno_aro'></td>
    <td><p id='materiales' name='materiales'></td>
  </tr>
</table>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<!--<script type="text/javascript" src="js/ordenes.js"></script>-->
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
document.getElementById("fecha").innerHTML = d + "/" + m + "/" + y+" - "+h;
 </script>
</body>
</html>

<?php } else{
echo "Acceso denegado";
  } ?>
  
  
  
  
  