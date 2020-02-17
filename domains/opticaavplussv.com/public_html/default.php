
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, user-scalable=no">

<style>
    body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, 
pre, form, fieldset, input, textarea, p, blockquote, th, td { 
  padding:0;
  margin:0;}

fieldset, img {border:0}

ol, ul, li {list-style:none}

:focus {outline:none}

body,
input,
textarea,
select {
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  color: #4c4c4c;
}

p {
  font-size: 12px;
  width: 150px;
  display: inline-block;
  margin-left: 18px;
}
h1 {
  font-size: 32px;
  font-weight: 300;
  color: #4c4c4c;
  text-align: center;
  padding-top: 10px;
  margin-bottom: 10px;
}

html{
  background-color: #ffffff;
}

.testbox {
  margin: 20px auto;
  width: 343px; 
  height: 464px; 
  -webkit-border-radius: 8px/7px; 
  -moz-border-radius: 8px/7px; 
  border-radius: 8px/7px; 
  background-color: #ebebeb; 
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  border: solid 1px #cbc9c9;
}

input[type=radio] {
  visibility: hidden;
}

form{
  margin: 0 30px;
}

label.radio {
	cursor: pointer;
  text-indent: 35px;
  overflow: visible;
  display: inline-block;
  position: relative;
  margin-bottom: 15px;
}

label.radio:before {
  background: #3a57af;
  content:'';
  position: absolute;
  top:2px;
  left: 0;
  width: 20px;
  height: 20px;
  border-radius: 100%;
}

label.radio:after {
	opacity: 0;
	content: '';
	position: absolute;
	width: 0.5em;
	height: 0.25em;
	background: transparent;
	top: 7.5px;
	left: 4.5px;
	border: 3px solid #ffffff;
	border-top: none;
	border-right: none;

	-webkit-transform: rotate(-45deg);
	-moz-transform: rotate(-45deg);
	-o-transform: rotate(-45deg);
	-ms-transform: rotate(-45deg);
	transform: rotate(-45deg);
}

input[type=radio]:checked + label:after {
	opacity: 1;
}

hr{
  color: #a9a9a9;
  opacity: 0.3;
}

input[type=text],input[type=password]{
  width: 200px; 
  height: 39px; 
  -webkit-border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  -moz-border-radius: 0px 4px 4px 0px/0px 0px 4px 4px; 
  border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  background-color: #fff; 
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  border: solid 1px #cbc9c9;
  margin-left: -5px;
  margin-top: 13px; 
  padding-left: 10px;
}

input[type=password]{
  margin-bottom: 25px;
}

#icon {
  display: inline-block;
  width: 30px;
  background-color: #3a57af;
  padding: 8px 0px 8px 15px;
  margin-left: 15px;
  -webkit-border-radius: 4px 0px 0px 4px; 
  -moz-border-radius: 4px 0px 0px 4px; 
  border-radius: 4px 0px 0px 4px;
  color: white;
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09);
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  border: solid 0px #cbc9c9;
}

.gender {
  margin-left: 30px;
  margin-bottom: 30px;
}

.accounttype{
  margin-left: 8px;
  margin-top: 20px;
}

a.button {
  font-size: 14px;
  font-weight: 600;
  color: white;
  padding: 6px 25px 0px 20px;
  margin: 10px 8px 20px 0px;
  display: inline-block;
  float: right;
  text-decoration: none;
  width: 50px; height: 27px; 
  -webkit-border-radius: 5px; 
  -moz-border-radius: 5px; 
  border-radius: 5px; 
  background-color: #3a57af; 
  -webkit-box-shadow: 0 3px rgba(58,87,175,.75); 
  -moz-box-shadow: 0 3px rgba(58,87,175,.75); 
  box-shadow: 0 3px rgba(58,87,175,.75);
  transition: all 0.1s linear 0s; 
  top: 0px;
  position: relative;
}

a.button:hover {
  top: 3px;
  background-color:#2e458b;
  -webkit-box-shadow: none; 
  -moz-box-shadow: none; 
  box-shadow: none;
  
}

.boton {
  /* Centrados en una fila */
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}


</style>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<div class="testbox">
  <h1>Control de Asistencia</h1>

  <form action="avplusp/ajax/asistencia.php" method="post" name="formulario" id="formulario">
      <hr>
    <span id="date" name="date"></span>
    <div class="accounttype">
      <input type="radio" id="tipo_reg" name="tipo_reg" value="Entrada" class="tipo_reg"/>
      <label for="tipo_reg" class="radio">Entrada</label>
      <input type="radio" value="Salida" id="radioTwo" name="tipo_reg" class="tipo_reg"/>
      <label for="radioTwo" class="radio">Salida</label>
    </div>
  <hr>
  <label id="icon" for="codigo_emp"><i class="icon-unlock"></i></label>
  <input type="text" name="codigo_emp" id="codigo_emp" placeholder="Código en MAYUSCULA" onkeyup="nombres(this)" required/>
  <label id="icon" for="name"><i class="icon-user"></i></label>
  <input type="text" name="name" id="name" placeholder="Nombre" required/>
  <input type="hidden" name="hora" id="hora"/>
  <input type="hidden" name="fecha" id="fecha"/>
  <br>
  <br>
    <div class="boton">
    <button type="submit" id="agregar" name="agregar" class="btn btn-blue btn-block" style="float:none; text-align: center; font-size: 20px; color: white; background: #3a57af; padding: 10px; border-radius: 10px"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
        MARCAR</button>
    </div>
  </form>
</div>

 <script>
 
 
n =  new Date();
//Año
y = n.getFullYear();
//Mes
m = n.getMonth() + 1;
//Día
d = n.getDate();
h = n.getHours();   

h=n.getHours()+":"+n.getMinutes()+":"+n.getSeconds();

//Lo ordenas a gusto.
document.getElementById("date").innerHTML = d + "/" + m + "/" + y+ "   ---  "+h;
document.getElementById("fecha").value = d + "/" + m + "/" + y;
document.getElementById("hora").value = h;


function nombres(e) {
e.value = e.value.toUpperCase();
  //var x = document.getElementById("fname").value;
  //document.getElementById("demo").innerHTML = x;
  var nombre = document.getElementById('codigo_emp').value;
  //alert(nombre);   

    if(nombre=='MT02'){
    document.getElementById('name').value='ARELY FLORES';
    }
    if(nombre=='MT03'){
    document.getElementById('name').value='empleado no existe';
    }
    if(nombre=='MT04'){
    document.getElementById('name').value='DENIS CORVERA';
    }
    if(nombre=='MT05'){
    document.getElementById('name').value='JOSUE RODRIGUEZ';
    }
    if(nombre=='MT06'){
    document.getElementById('name').value='JANET CRUZ';
    }
        if(nombre=='MT07'){
    document.getElementById('name').value='MAURICIO FLORES';
    }
    if(nombre=='MT08'){
    document.getElementById('name').value='CRISTIAN RAMIREZ';
    }
        if(nombre=='MT09'){
    document.getElementById('name').value='empleado no existe';
    }
}


function mayus(e) {
    e.value = e.value.toUpperCase();
}


// bindamos al evento submit del elemento formulario la función de validación
document.getElementById("formulario").addEventListener("submit", function(event){
    let hasError = false;

    // obtenemos todos los input radio del grupo tipo_reg que esten chequeados
    // si no hay ninguno lanzamos alerta
    if(!document.querySelector('input[name="tipo_reg"]:checked')) {
      alert('Error!! Debe especifica si es Entrada o Salida');
      hasError = true;
      }

    
    // si hay algún error no efectuamos la acción submit del form
    if(hasError) event.preventDefault();
});

 </script>


























