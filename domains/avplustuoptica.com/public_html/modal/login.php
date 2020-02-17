<style>

  .modal-body {

    max-height: calc(100vh - 210px);
    overflow-y: auto;
}

 #head{
        background-color: black;
        color: white;
        
    }
 #head{

    text-align:center;

 }   

#head h4{

    margin:auto;
    line-height:51px;
    vertical-align:middle;

} 

#cuerpo{
  
background-image: url("images/back_modal2.jpg");
background-repeat: no-repeat;
background-size: cover;
height: 400px;
} 

.login-box{

  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

</style>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" id="head">
          <h4 class="modal-title" align="center" id="titulo">REGISTRARME</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


      <!-- Modal body -->
<div class="modal-body" id="cuerpo">
        
  <div class="portada">

    <div class="login-box">


      
      <form method="post" class="login" autocomplete="off">    
              <div class="form-group">              
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                </div>

                <div class="form-group">              
                  <input type="text" class="form-control" id="pwd" name="pwd" placeholder="Contraseña">
                </div>

            <div class="form-group">

              <input type="hidden" name="enviar" class="form-control" value="si">
       
            </div>        

              <button type="submit" class="btn btn-primary btn-block">Entrar</button>        
          </form>
    </div>
<div class="blur"></div>  
  </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
      </div>

    </div>
  </div>
</div>