<?php

 require_once("config/conexion.php");

     

     if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){

       require_once("modelos/Afiliados.php");

       $usuario = new Afiliados();

       $usuario->login();

   }

?>

<html lang="en">
  <head>
    <title>AVPLUS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
 
    <script src="datepicker/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="estilos.css">
<style>
     img {
  width: 100%;
  height: auto;
}
</style>

  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="border-bottom top-bar py-2">
      <div class="container">
        <div class="row">

          <div class="col-md-6">
            <ul class="social-media">
              <li><a href="#" class="p-2"><i style="color:white" class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></span></a></li>
              <li><a href="#" class="p-2"><i style="color:white" class="fa fa-twitter-square fa-2x"></i></a></li>
              <li><a href="#" class="p-2"><i style="color:white" class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
             
          </div>
        </div>
      </div> 
    </div>
   

    <div class="site-blocks-cover overlay" style="background-image: url(images/bg1.png);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
            <div class="row justify-content-center mb-4">
              <div class="col-md-8 text-center">
                <h1><strong>Optica AV Plus </strong><br><span class="typed-words"></span></h1>
                
                <div><a href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in" aria-hidden="true"></i> INGRESAR</a>                
                </div>
                 <div class="btn-afiliacion col text-center"><br><br>
        <a href="asistente/index.php"><button type="button" class="btn btn-primary">Asistente de Afiliación</button></a>
      </div>
 <div class="container-fluid">

      
      <div class="row">
         <div class="col-lg-12">
        
        <div class="box-body">
            
            <?php


            if(isset($_GET["m"])) {
               
           switch($_GET["m"]){


               case "1";
               ?>

               <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> El Usuario y/o Contraseña es incorrecto o no tienes permiso!</h4>
                     
                </div>

                <?php
                break;


                case "2";
                ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Los campos estan vacios</h4>
                     
                </div>
                <?php
                break;



             }

         }


            ?>

             
        </div>
    

        </div>
      </div>
  </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>  



<div class="somos">
  <div class="video">
    <a align="center" style="text-align:center; color:white; margin: auto"><i class="fa fa-play fa-2x" aria-hidden="true"></i><span style="color: white; font-size: 38px; font-family:'Helvetica'"> Quienes somos</span></a>
  </div>
</div>

<section class="site-section" style="background-image: url(images/lentes.jpg);  background-size: cover" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container" >
        <div class="row mb-5 justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="text-black h1 site-section-heading text-center"><strong>Nuestros Planes</strong></h2>
            
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a data-toggle="modal" data-target="#modal_afiliacion" class="media-1" onclick="plan_basico();">
              <img src="images/planclasico.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>AFILIARME</h2>
                
              </div>
            </a>
            
          </div>
          <br>
          <div class="col-md-6 col-lg-4">
            <a data-toggle="modal" data-target="#modal_afiliacion" class="media-1" onclick="plan_preferencial();">
              <img src="images/preferencial.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>AFILIARME</h2>
                
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a data-toggle="modal" data-target="#modal_afiliacion" class="media-1" onclick="plan_premium();">
              <img src="images/planpremium.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>AFILIARME</h2>
                
              </div>
            </a>
          </div>

                    
        </div>
      </div>

    </section>

<?php require_once("modal/login.php"); ?>
<?php require_once("modal/modal_compras.php"); ?>

  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/typed.js"></script>
            <script>
            var typed = new Typed('.typed-words', {
            strings: ["Mira una Nueva Experiencia"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
            });
 
            </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <script type="text/javascript" src="formAfiliacion.js"></script>
 
  <script src="js/main.js"></script>  
  </body>
</html>




