<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Av Plus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/about.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once('nav.php'); ?>

<!-- Container (Services Section) -->
<div id="home" class="container-fluid text-center">
<div>
<video controls autoplay>
    <source src="../images/about.mp4" type="video/mp4">
  </video>
</div>



<!-- Container (Pricing Section) -->
<div id="acerca" class="container-fluid">

  <div class="row slideanim">
    <div class="col-sm-6 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>MISIÓN</h1>
        </div>
        <div class="panel-body">
          <p>Ser Pioneros en el tema de Salud Visual  en El Salvador y Crentroamerica utilizando la tecnologia para mantener una tendencia de innovacion, haciendole la vida mas facil a los pacientes, mostrandoles altos estandares de calidad y precio; que ayuden a mejorar su salud visual; con una alta calidad en asesoria, atencion que satisfaga su necesidad.</p>
          
        </div>
        <div class="panel-footer">
        
        </div>
      </div>      
    </div>     
    <div class="col-sm-6 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>VISION</h1>
        </div>
        <div class="panel-body">
        <p>Ser reconocidos en el mercado de El Salvador y CentroAmerica,  como la optica numero uno del pais, que brinde servicios innovadores en atencion, asesoría, calidad; a un precio adecuado, sin perder de vista al paciente y a su familia en el tema de Salud Visual.
        </p>
        </div>
        <div class="panel-footer">
          
        </div>
      </div>      
    </div>       
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACTANOS</h2>
  <div class="row">
  <div class="col-sm-2"></div>
    <div class="col-sm-4">
      <p><strong>Metrocentro</strong></p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Centro Comercial Metrocentro, 4ta. Etapa, Local #7</p>
      <p><span class="glyphicon glyphicon-phone"></span> 2260-1653</p>
      
    </div>

    <div class="col-sm-4">
      <p><strong>Santa Ana</strong></p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Plaza El Trebol</p>
      <p><span class="glyphicon glyphicon-phone"></span> 2445-3150</p>
      
    </div>
  <div class="col-sm-2"></div>        
 </div>
 </div>
 </div>
   
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>