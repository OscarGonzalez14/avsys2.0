  

  function init(){

}


window.onload=function()
    {
      var btn_checkbox = document.getElementById("btn_checkbox");

      btn_checkbox.onclick = function()
      {
       if(document.form.input_checkbox.checked)
       {
        alert("Tu solicitud ha sido en Enviada en un momento nos ponemos en contacto contigo");
       }else{
        alert("Debes Aceptar los terminos y condiciones");
        return false;
       }
      }
    }



    /////VALIDAR TIPO DE TARJETA


window.onload=function(){
  $("#tipo_tarjeta").change(function () {

          
    $("#tipo_tarjeta option:selected").each(function () {
      id_tipo = $(this).val();
      $.post('ajax/miembros.php?op=periodo_pagos', { id_tipo: id_tipo }, function(data){
        $("#periodo_pago").html(data);
      });            
    });
  })
};



  //la funcion guardaryeditar(e); se llama cuando se da click al boton submit  
      
      function guardaryeditar(e){

        e.preventDefault(); //No se activará la acción predeterminada del evento
        var formData = new FormData($("#pacientes_cargo_form")[0]);

          //var password1= $("#password1").val();
          //var password2= $("#password2").val();
            
             //si el password conincide entonces se envia el formulario
          // if(password1 == password2){

               $.ajax({

            url: "ajax/afiliaciones.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function(datos){

              console.log(datos);

              $('#pacientes_cargo_form"')[0].reset();
            $('#myModal').modal('hide');

            $('#resultados_ajax').html(datos);
            $('#pacientes_cargo').DataTable().ajax.reload();
        
                        //limpiar();

            }
               });

           //} //cierre de la validacion


          /* else {

                 bootbox.alert("No coincide el password");
           }*/

      } 

function validaCampos(){

    var tarjeta = $("#n_tarjeta").val();
    //var edad = $("#edad").val();
    //var direccion = $("#direccion").val();
    //validamos campos
    if($.trim(tarjeta) == ""){
    toastr.error("No ha ingresado en numero de Tarjeta","Aviso!");
        return false;
    }


} 




function plan_basico(){

  var header = document.getElementById("head");

  //$('#myModal').modal('show');
  $('.modal-title').text("Afiliarme a Plan Clásico");
  $('#tipo_plan').val("Plan Básico");
  header.style.backgroundColor = "white";
  document.getElementById("titulo").style.color = "black";
  
}


     
function plan_preferencial(){

  var header = document.getElementById("head");
  

  //$('#myModal').modal('show');
  $('.modal-title').text("Afiliarme a Plan Preferencial");
  $('#tipo_plan').val("Plan Preferencial");
  header.style.backgroundColor = "#686868";
  document.getElementById("titulo").style.color = "white";


}



function plan_premium(){

  var header = document.getElementById("head");

  //$('#myModal').modal('show');
  $('.modal-title').text("Afiliarme a Plan Premium");
  $('#tipo_plan').val("Plan Premium");
  header.style.backgroundColor = "#2b2b2b";
  document.getElementById("titulo").style.color = "white";

  
}

/*$('.av-date').datepicker({
    
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months",
    showButtonPanel: true
    

});*/

document.addEventListener('DOMContentLoaded', () => {
 const marcascarousel = document.querySelectorAll('.carousel');
    M.Carousel.init(marcascarousel,{

        duration: 170,
        dist: -80,
        shift: 5,
        padding: 5,
        numVisible: 3,
        indicators: true, 
        noWrap: false,
        onCycleTo: 4
    });
});


  init();