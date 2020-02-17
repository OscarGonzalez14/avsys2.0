<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Asistente</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link rel="stylesheet" href="icon/css/fontello.css">
    <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/modal_afliacion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css'>
    <script src="https://use.fontawesome.com/385b4d76c6.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/cleave.js"></script>

   </head>
<body>
<nav style="background-color: black">
  <div class="nav-wrapper" style="padding:4px  ">
    <a href="../index.php" class="brand-logo"><i class="fa fa-home" aria-hidden="true"></i></a>

  </div>
</nav>
<div class="container-portada">
        <div class="capa-gradient"></div>
        <div class="container-details">
            <div class="details">
                <h1>BIENVENIDO A NUESTRO ASISTENTE DE AFILIACIÓN</h1>
                
                <a href="#tablero"><button style="align-content: center">INICIAR</button></a>
            </div>
        </div>
</div>
<div class="seccion1">
<div id="tablero">
  <div id="tablero-planes">
    <h3 class="header-planes">TU PLAN</h3>
      <div class="tabla-planes">
        <div class="col-p" id="mi-plan-select">
        <div class="table-plan" style="background-color: rgba(0,0,0,.70);">
          <a style="background-color:white; color: black; border-radius:7px;  font-size:18px;font-weight:900" id="muestra-plan" href="#tabla-planes">PLAN:&nbsp;<span style="color:blue; font-weight:900" id="plan-seleccionado"></span></a>
      </div>
    </div>

      <div class="col-p">
        <div class="table-plan" style="background-color: rgba(0,0,0,.70);">
          <a style="background-color:white; color: black; border-radius:7px; font-size:18px;font-weight:900" id="muestra-formas-s" href="#formas-s">FORMA:&nbsp;<span id="forma-seleccionado" style="color:blue; font-weight:900"></span></a>
      </div>
    </div>

            <div class="col-p">
        <div class="table-plan" style="background-color: rgba(0,0,0,.70);">
          <a style="background-color:white; color: black; border-radius:7px; font-size:18px;font-weight:900" id="muestra-marcas" href="#marcas">MARCA:&nbsp;<span id="marca-seleccionado" style="color:blue; font-weight:900"></span></a>
      </div>
    </div>
            <div class="col-p">
        <div class="table-plan" style="background-color: rgba(0,0,0,.70);">
          <a style="background-color:white; color: black; border-radius:7px; font-size:18px;font-weight:900" id="muestra-lentes" href="#container2">LENTE:&nbsp;<span id="lente-seleccionado" style="color:blue; font-weight:900"></span></a>
      </div>
    </div>


</div>
</div>
</div>


<div id="tabla-planes" id="tabla-planes">
    <h3 class="header-planes" style="color:white">ELIJE TU PLAN</h3>

  <div class="tabla-planes">

    <div class="col-p">
      <div class="table-plan">
        <h2 class="tit-plan">Clásico</h2>
        <div class="pop"><i class="fa fa-star" aria-hidden="true" style="color:black"></i></div>
        <div class="precios">
          $6.99
        <span>Mensuales</span>
        </div>
          <a class="oculta-plan" name="Clasico">Seleccionar</a>
      </div>
    </div>

  <div class="col-p">
    <div class="table-plan">
      <h2 class="tit-plan">Preferencial</h2>
      <div class="pop"><i class="fa fa-star" aria-hidden="true" style="color:black"></i><i class="fa fa-star" aria-hidden="true" style="color:black"></i></div>
      <div class="precios">
      $9.99
      <span>Mensuales</span>
      </div>
      <a class="oculta-plan" name="Preferencial">Seleccionar</a>
    </div>
  </div>

  <div class="col-p">
    <div class="table-plan">
      <h2 class="tit-plan">Premium</h2>
      <div class="pop"><i class="fa fa-star" aria-hidden="true" style="color:black"></i><i class="fa fa-star" aria-hidden="true" style="color:black"></i><i class="fa fa-star" aria-hidden="true" style="color:black"></i></div>
      <div class="precios">
      $12.99
      <span>Mensuales</span>
      </div>
      <a class="oculta-plan" name="Premium">Seleccionar</a>
    </div>
  </div>

</div>
</div>
<br>
</div><!--=======================================SECCION 1 FINAL==================-->
<section class="formas-s" id="formas-s">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h3 class="center-align titulo" style="color: white">ELIJE TU FORMA</h3>
      
          <div class="genero">
            <div class="gen">
              <a onclick="mostrar_section_formas_m();">Hombre</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="mostrar_section_formas_f()">&nbsp;Mujer</a>
            </div>  
          </div>

          <div id="section-formas">
          <!--Carousel Mujer-->
          <div class="carousel center-align" id="slidefm">
              <div class="carousel-item">
                <img src="image/f1.jpg" href="javascript:void(0);" class="forma-femenino" name="Acetato Cuadrado"><!--Acetato Cuadrado-->
              </div>

              <div class="carousel-item">
                <img src="image/f2.jpg" alt=""  class="forma-femenino" name="Acetato Rectangular"><!--Acetato Rectangular-->
              </div>

              <div class="carousel-item">
                <img src="image/f3.jpg" alt="" class="forma-femenino" name="Metalico"><!-- Metalico-->
              </div>

              <div class="carousel-item">
                <img src="image/f4.jpg" alt="" class="forma-femenino" name="Ovalado"><!--Ovalado-->
              </div>

              <div class="carousel-item">
                <img src="image/f5.jpg" alt="" class="forma-femenino" name="Agatado"><!--Agatado-->
              </div>
          </div>
          <!--Carousel Hombre-->

          <div class="carousel center-align" id="slidema">
          <div class="carousel-item">
                <img src="image/m1.jpg" alt="" href="javascript:void(0);" class="forma-hombre" name="Acetato Rectangular"><!--Acetato Cuadrado-->
            </div>

            <div class="carousel-item">
                <img src="image/m2.jpg" alt="" href="javascript:void(0);"  class="forma-hombre" name="Acetato Rectangular"><!--Acetato Rectangular-->
            </div>

            <div class="carousel-item">
                <img src="image/m3.jpg" alt="" class="forma-hombre" name="Metalico"><!-- Metalico-->
            </div>

            <div class="carousel-item">
                <img src="image/m4.jpg" alt="" class="forma-hombre" name="Redondo">
            </div>

            <div class="carousel-item">
                <img src="image/m5.jpg" alt="" class="forma-hombre" name="Ovalado">
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>  
</section>



<div class="container2" id="container2">
 
  <div class="timeline">
      <h3 class="center-align titulo" style="color: black">ELIJE TU LENTE</h3>
 <h5 class="center-align titulo-slide" style="color: black">Deslice y haga click para elegir su lente</h5>
    <div class="swiper-container">

    <img src="image/gafas.png" width="100%" style="max-width: 1100px">        
      <div class="swiper-wrapper">
        <div class="swiper-slide" data-year="VISION SENCILLA">
          <img src="image/vs.png" width="100%" style="max-width: 1100px" class="lentes-s" name="Visión Sencilla">
          <div class="swiper-slide-content"><span class="timeline-year"></span>
            
          </div>
        </div>
        <div class="swiper-slide"  data-year="BIFOCAL">
        <img src="image/bifo.png" width="100%" style="max-width: 1100px" class="lentes-s" name="Bifocal">
          <div class="swiper-slide-content"><span class="timeline-year"></span>
            <!--<h4 class="timeline-title">BIFOCAL</h4>
            <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
          </div>
        </div>
        <div class="swiper-slide" data-year="MULTIFOCAL">
          <img src="image/multi.png" width="100%" style="max-width: 1100px" class="lentes-s" name="Multi Focal">
          <div class="swiper-slide-content"><span class="timeline-year"></span>
            <!--<h4 class="timeline-title">MULTIFOCAL</h4>
            <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
          </div>
        </div>
       <!-- <div class="swiper-slide" style="background-image: url(https://picsum.photos/1920/500?random=4);" data-year="2005">
          <div class="swiper-slide-content"><span class="timeline-year">2005</span>
            <h4 class="timeline-title">Your Event Title</h4>
            <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>-->

      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
<br><br>
</div>

<!--Slide Marcas-->
<div class="marcas" id="marcas">
    <div class="row">
      <div class="col s12">
      <h4 class="center-align" style="color:white">ELIJE TU MARCA</h4>
        <div class="carousel center-align" id="slidemarcas">

        <div class="carousel-item">
                <img src="image/andvas.png" alt="" class="marcas-s" name="AndVas">
            </div>

          <div class="carousel-item">
                <img src="image/guess.png" alt="" class="marcas-s" name="Guess">
          </div>
                
          <div class="carousel-item">
                <img src="image/converse.png" alt="" class="marcas-s" name="Converse">
            </div>

            <div class="carousel-item">
                <img src="image/harley.png" class="marcas-s" name="Harley">
            </div>

            <div class="carousel-item">
                <img src="image/rayban.png" class="marcas-s" name="RayBan">
            </div>

            <div class="carousel-item">
                <img src="image/lacoste.png" class="marcas-s" name="Lacoste">
            </div> 
            
            <div class="carousel-item">
                <img src="image/oakley.png" class="marcas-s" name="Oakley">
            </div>

            <div class="carousel-item">
                <img src="image/nike.png" class="marcas-s" name="Nike">
            </div> 

            <div class="carousel-item">
                <img src="image/tommy.png" class="marcas-s" name="Tommy">
            </div> 

            <div class="carousel-item">
                <img src="image/candies.png" class="marcas-s" name="Candies">
            </div> 

            <div class="carousel-item">
                <img src="image/gant.png" class="marcas-s" name="Gant">
            </div> 

            <div class="carousel-item">
                <img src="image/vanheusen.png" class="marcas-s" name="Van Heusen">
            </div> 

            <div class="carousel-item">
                <img src="image/timber.png" class="marcas-s" name="Timberland">
            </div> 

        <!--fin item marcas-->                

        </div>
      </div>
    </div>
  </div>
<!-- Fin Slide Marcas-->
<div class="btn-afiliar">
  <a class="modal-trigger" href="#login" onclick="agregar_items_plan()">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
    AFILIARME
  </a>
</div>


<div id="login" class="modal modal-afiliacion">
  <h5 class="modal-close" style="text-align: right; margin-right: 7px">&#10005;</h5>
  <div class="modal-content center">
    <h4>AFILIARME</h4>
    <br>

<form action="../ajax/asistente_afiliaciones.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input id="nombre" name="nombre" type="text" class="browser-default" required>
          <label for="nombre">Nombre Completo</label>
        </div>

        <div class="input-field col s6">
          <input id="dui" name="dui" type="text" class="validate" required>
          <label for="dui">DUI</label>
        </div>

        <div class="input-field col s6">
          <input id="celular" name="celular" type="text" class="validate" required>
          <label for="celular">Celular</label>
        </div>

        <div class="input-field col s12">
          <input id="correo" name ="correo" type="email" class="validate" required>
          <label for="correo">Correo</label>
        </div>

        <div class="input-field col s12">
            <select id="tipo_tarjeta" name="tipo_tarjeta" required>
            <option value="c">Seleccione su tipo de Tarjeta</option>
              <option value="credito">Crédito</option>
              <option value="debito">Debito</option>

            </select>
        </div>

        <div class="input-field col s12">
           <select name="periodo_pago" id="periodo_pago" required>         
           </select>
           
        </div>  

        <div class="input-field col s8">
          <input id="numero_tarjeta" type="text" class="numero_tarjeta" name="numero_tarjeta" required> <i class="fa fa-credit-card-alt fa-2x card" aria-hidden="true" id="icono"></i>
          <label for="numero_tarjeta">Numero Tarjeta</label>
        </div>



        <div class="input-field col s4">
          <input id="fecha_vec" name="fecha_vec" type="text" class="fecha_vec" placeholder="MM/AAAA" maxlength="7" required> 
          <label for="fecha_vec">Fecha Venc.</label>
        </div>
        <br>

 
        <div class="input-field col s6">
          <input id="plan-definitivo" name="plan-definitivo" type="text" class="validate" value="" readonly="">          
        </div>

        <div class="input-field col s6">
          <input id="forma-definitivo" name="forma-definitivo" type="text" class="validate" value="" readonly="">          
        </div>

        <div class="input-field col s6">
          <input id="lente-definitivo" name="lente-definitivo" type="text" class="validate" value="" readonly="">          
        </div>

        <div class="input-field col s6">
          <input id="marca-definitivo" name="marca-definitivo" type="text" class="validate" value="" readonly="">          
        </div>
</div>



<br>
    <div class="row" id="terms">
    <div>      
     <input id="check1" type="button" value="Ver Terminos y condiciones">
     </div>
        <br>
        <p style="text-align: justify;" id="terminos" >
          Por este medio AUTORIZO a OPTICA AV PLUS de El Salvador, para cargar de forma MENSUAL sobre la tarjeta de Credito descrita en
          la información general de este formulario.
          Declaro que OPTICA AV PLUS de El Salvador, me ha explicado de forma comprensible, la manera del funcionamiento del servicio de
          cargos automaticos; por lo que ACEPTO que si en caso de que fuera denegada la respectiva transacción, OPTICA AV PLUS, podrá
          cancelar temporalmente el servicio contratado hasta que el cargo sea efectivo.
          Es responsabilidad de Tarjetahabiente la verificación de la exactitud de los datos en este formulario, así como de informar a OPTICA
          AV PLUS de los cambios en fechas de vencimientos o de plasticos, para seguir con la debida programación de cobro mensual para
          la desactivación de este deberá de informar con cinco días de anticipación, para lo cual se le generara un nuevo formulario en cual se
          denomina cancelación del cargo automático
        </p>
        <br>
</div>

    <p>
      <input type="checkbox" id="test5" />
      <label for="test5">Acepto terminos y condiciones</label>
    </p>
      <br>
<div class="row">
        <!-- CHANGED THE DIV BELOW (Changed size to col s10 offset-s1 
        to match the divs above and added center-align -->
        <div class="col s10 offset-s1 center-align">
            <button class="btn waves-effect waves-light" type="submit" name="action" style="background-color: black" onclick="registrar_afiliacion()">
                Enviar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>

  
</form>
  </div><!--Fin class-form-->  
</div>

</div>
 <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
          


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js'></script>
<script src="js/main.js"></script>
<script src="js/asistente.js"></script>
<script src="email.js"></script>

<script>

        //M.AutoInit();
        var options={};
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });
    </script>

    <script>
  // slide lentes
  var timelineSwiper = new Swiper ('.timeline .swiper-container', {
  direction: 'vertical',
  loop: false,
  speed: 1600,
  pagination: '.swiper-pagination',
  paginationBulletRender: function (swiper, index, className) {
    var year = document.querySelectorAll('.swiper-slide')[index].getAttribute('data-year');
    return '<span class="' + className + '">' + year + '</span>';
  },
  paginationClickable: true,
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  breakpoints: {
    768: {
      direction: 'horizontal',
    }
  }
});
</script>
</body>
</html>
