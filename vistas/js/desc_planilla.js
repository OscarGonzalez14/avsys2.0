function init(){

}

function registar_orden_descuento(){
	var  nombre_emp=$("#nombre_emp").val();  
    

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(nombre_emp != "" ){
    $.ajax({
    url:"../ajax/empresa.php?op=guardar_empresa",
    method:"POST",
    data:{nombre_emp:nombre_emp,telefono_emp:telefono_emp,direccion_emp:direccion_emp,nit_emp:nit_emp,responsable:responsable,user_emp:user_emp,pass_emp:pass_emp,correo_emp:correo_emp,user_reg:user_reg},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },        
      
  success:function(data){
  setTimeout ("bootbox.alert('Se ha Registrado la empresa con exito');", 100);
  //refresca la pagina, se llama a la funtion explode
  setTimeout ("explode();", 2000);          
}

  }); 

  }else{
    bootbox.alert("El campo nombre empresa es obligatorio!!");
    return false;
  } //cierre del condicional de validacion de los campos del paciente
  
    
}

init();