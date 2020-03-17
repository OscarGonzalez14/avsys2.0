function init(){

}
$(document).on('click', '.num_ord_correlativo', function(){

  $.ajax({
      url:"../ajax/empresarial.php?op=get_numero_mumero_order",
      method:"POST",
      // data:{sucursal_correlativo:sucursal_correlativo},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#num_order_descuento").val(data.num_order);         
      }
    })
});

function registra_orden_descuento(){

var numero_venta=$("#venta_numero_ord").val();
var numero_orden=$("#num_order_descuento").val();
var fecha_creacion=$("#date").val();
var aro=$("#detalle_aro_ord").val();
var photo=$("#photo_ord").val();
var arnti=$("#ar_ord").val();
var lente=$("#lente_ord").val();
var referencia_uno=$("#ref_uno").val();
var tel_ref_uno=$("#tel_ref_uno").val();
var referencia_dos=$("#ref_dos").val();
var tel_ref_dos=$("#tel_ref_dos").val();
var id_usuario=$("#id_user").val();
var id_paciente=$("#id_paciente").val();

if(numero_orden != "" ){
    $.ajax({
    url:"../ajax/empresarial.php?op=guardar_orden_desc",
    method:"POST",
    data:{numero_venta:numero_venta,numero_orden:numero_orden,fecha_creacion:fecha_creacion,aro:aro,photo:photo,arnti:arnti,lente:lente,referencia_uno:referencia_uno,tel_ref_uno:tel_ref_uno,referencia_dos:referencia_dos,tel_ref_dos:tel_ref_dos,id_usuario:id_usuario,id_paciente:id_paciente},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },        
      
  success:function(data){
  setTimeout ("bootbox.alert('Se ha Registrado la orden con exito');", 100);
  //refresca la pagina, se llama a la funtion explode
  setTimeout ("explode();", 2000);          
}

  }); 

  }else{
    bootbox.alert("Debe llenar todos los campos!!");
    return false;
  } //cierre del condicional de validacion de los campos del paciente
  
    
}


init();