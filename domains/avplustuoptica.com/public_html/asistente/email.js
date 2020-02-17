 function registrar_afiliacion(){    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var correo = $("#correo").val();
    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
//alert(correo);
    $.ajax({
    url:"email.php?op=afiliacion",
    method:"POST",
    data:{'correo':correo},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },    
      
      
  }); 

  
  }
   
   