<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li>
    <a href="laboratorios.php"><button class="btn btn-dark btn-block"><i class="fa fa-home"></i> <strong>Inicio</strong> </button></a>
  </li>
    <li class="nav-item">
      <p style="color:white"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIENVENIDOS <span><?php echo "LABORATORIOS " . strtoupper($_SESSION["nombre"]);?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;SISTEMA DE ORDENES EN LINEA -  OPTICA AV PLUS </p>
    </li>
  </ul>
 <ul class="navbar-nav ml-auto">
  <li>
    <a href="logout.php"><button class="btn btn-dark btn-block"><i class="fa fa-sign-out"></i> <strong>Salir</strong> </button></a>
  </li>
  </ul>
</nav>