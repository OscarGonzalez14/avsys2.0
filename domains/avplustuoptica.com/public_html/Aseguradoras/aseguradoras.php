<?php 
require_once("header.php");
require_once("config/conexion.php");
if(isset($_SESSION["nombre"])){
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Empresas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						
						<nav id="nav" style="background-color: rgba(19, 21, 25, 0.9);">
							<ul >
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu" style="background-color: rgba(19, 21, 25, 0.7);">
										<ul>
											<li><a href="expedientes.php">Expedientes Clinicos</a></li>
											<li><a href="cotizaciones.php">PRE-Ventas</a></li>
											<li><a href="#">Ventas</a></li>
											<li><a href="#">Formularios</a></li>
											<li><a href="#">Precios</a></li>
											<li><a href="#">Acerca de Nosotros</a></li>
										    <li><a href="logout.php">Salir</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">

						<div class="row"> 
					
          					<div class="col-sm-2"></div>
          					<div class="col-sm-8">
          					   <?php
          					   $name_user= $_SESSION["usuario"];
          					   //echo $name_user;
          					   
          					   if($name_user=='empresa'){
          					       $width_img='350';
          					       $height_img='175';
          					       $display='none';
          					   }elseif($name_user=='hilasal'){
          					       $width_img='400';
          					       $height_img='175';
          					       $display='inline';
          					   }elseif($name_user=='indufoam'){
          					       $width_img='400';
          					       $height_img='175';
          					       $display='inline';
          					   }
          					   elseif($name_user=='asesuisa'){
          					       $width_img='410';
          					       $height_img='190';
          					       $display='inline';
          					   }
          					   elseif($name_user=='spacifico'){
          					       $width_img='225';
          					       $height_img='225';
          					       $display='inline';
          					   }
          					       elseif($name_user=='sherwin'){
          					       $width_img='380';
          					       $height_img='200';
          					       $display='inline';
          					   }
          					   ?>
          					             				 
                         		<img src="logooficial.png" alt="logoAvPlus" width="320" height="200" style="margin:auto;">
                         		<img src="images/<?php echo $_SESSION["logo"];?>" alt="logoAvPlus" width="<?php echo $width_img;?>" height="<?php echo $height_img;?>" style="margin:auto; border-radius: 10%; display:<?php echo $display;?>; >
	                        </div>
                         	<div>

          					</div>
          				<div class="col-sm-2"></div>
        					</div>
							<h2>OPTICA AV PLUS</h2>
							<p>BIENVENIDOS <strong><span><?php echo $_SESSION["nombre"];?></span></strong><br>A NUESTRO SITIO DE ALIADOS ESTRATEGICOS.</p>
							<ul class="actions special">
	
							</ul>
						</div>
						
					</section>



			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php } else{
echo "Acceso denegado";
  } ?>
  
  