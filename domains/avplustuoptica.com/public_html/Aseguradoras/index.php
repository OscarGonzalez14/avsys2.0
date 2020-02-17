<?php

require_once("config/conexion.php");

  if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){

    require_once("modelos/Usuarios.php");

    $usuario = new Empresas();

    $usuario->login();

   }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </head>
  <body>
  
 <form method="post" class="login" autocomplete="off">    
  <div class="form-reg">
    <div class="login-div">
      <div class="row img-logo">
        <div class="logo center"></div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          <input id="usuario" type="text" class="validate" name="usuario">
          <label for="usuario">Usuario</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="pass" type="password" class="validate" name="password">
          <label for="pass">Contraseña</label>
          
        </div>
      </div>
      <div class="row">
        <input type="hidden" name="enviar" class="form-control" value="si">
      </div>
      <div class="row"></div>
      <div class="row">
       
      <div class="col s12 right-align center"> <button class="btn waves-effect waves-light" type="submit" name="action" style="background: black; color: white">Entrar
    
  </button></div>
      </div>
    </div>
</div>
</form>
</html>
