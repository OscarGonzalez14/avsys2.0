<?php

   require_once("config/conexion.php");

    if(isset($_SESSION["dui"])){

    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Miembros</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Planes AV Plus</title>

  <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="css/animate.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/estilos.css" rel="stylesheet">

  <!-- boxed bg -->
  <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="color/default.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area"  style="background-color:#034f84;">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
            </div>
            <div class="col-sm-6 col-md-6" >
              <p class="bold text-right"><i class="fa fa-user" aria-hidden="true"></i> Bienvenido/a: <?php echo $_SESSION["nombre"];?></p>
            </div>
          </div>
        </div>
      </div>
      
    </nav>



    <section id="service" class="home-section nopadding paddingtop-60">

      <div class="container">

        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <img src="img/portada/img2.jpg" class="img-responsive" alt="" />
            </div>
          </div>
          <div class="col-sm-3 col-md-3">

            <div class="wow fadeInRight" data-wow-delay="0.1s">

               
<i class="fa fa-id-card-o fa-3x" aria-hidden="true"></i>               

                  <h5 class="h-light" style="color:white;" align="center"><?php echo $_SESSION["tipo_plan"];?></h5>

                </div>
              </div>
            </div>

            


          </div>
          <div class="col-sm-3 col-md-3">

            <div class="wow fadeInRight" data-wow-delay="0.1s">
              <div class="service-box">

              <div class="service-desc">
                  <h5 class="h-light" style="color:white;" align="center">Cuotas Pagadas: 1</h5>
<p style="color:black">.</p>
                </div>
              </div>
            </div>



          </div>

        </div>
      </div>
    </section>
    <!-- /Section: services -->
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nombre</th>
        <th>Parentesco</th>
        <th>Edad</th>
      </tr>
    </thead>
    <tbody>
      
      <tr class="success">
        <td>1</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
      </tr>
      <tr class="danger">
        <td>2</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
      </tr>
      <tr class="info">
        <td>3</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
      </tr>
      <tr class="warning">
        <td>4</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
      </tr>
   
    </tbody>
  </table>
  </div>
  <div class="col-md-1"></div>

</div>

</body>

<?php } else{
echo "no es miembro";
	} ?>