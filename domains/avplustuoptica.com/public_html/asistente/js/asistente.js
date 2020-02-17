//$(document).ready(ocultar_section_formas);
$(document).ready(ocultar_section_slidema);
//$(document).ready(ocultar_section_slidefm);

//////////////////OCULTAR FORMAS    ==============

function ocultar_section_formas(){

  document.getElementById("section-formas").style.display = "none";
    }
function ocultar_section_slidema(){

  document.getElementById("slidema").style.display = "none";
    }
function ocultar_section_slidefm(){

  document.getElementById("slidefm").style.display = "none";
    }

//////////////////MOSTRAR FORMAS  ===================

function mostrar_section_formas_m(){
  document.getElementById("section-formas").style.display = "block";
  mostrar_section_slidema();
  }

function mostrar_section_formas_f(){
  document.getElementById("section-formas").style.display = "block";
  mostrar_section_slidefm();
  }


function mostrar_section_slidema(){
  document.getElementById("slidema").style.display = "block";
  show_slide_hombres();
  }
function mostrar_section_slidefm(){
  document.getElementById("slidefm").style.display = "block";
  show_slide_mujeres();
  } 

/////////////////////MUESTRA ELEMENTOS DE PANEL

  $(document).ready(function(){
  $(".oculta-plan").click(function(){
    $("#tabla-planes").hide(1000);
  });
});

  $(document).ready(function(){
  $("#muestra-plan").click(function(){
    $("#tabla-planes").show(1000);
  });
});

////======MUESTRA FORMAS

  $(document).ready(function(){
  $("#muestra-formas-s").click(function(){
    $("#formas-s").show(1000);
  });
});

////======MUESTRA MARCAS

  $(document).ready(function(){
  $("#muestra-marcas").click(function(){
    $("#marcas").show(1000);
  });
});

////======MUESTRA LENTES

  $(document).ready(function(){
  $("#muestra-lentes").click(function(){
    $("#container2").show(1000);
  });
});

//==========PLANES
$(function() {
    $(".oculta-plan").click(function() {
        var name = this.name;
        //var cls = this.className;
        //var id= this.id;

        document.getElementById('plan-seleccionado').innerHTML = name;
    });
});

function show_slide_hombres(){

	const elementosCarousel = document.querySelectorAll('#slidema');
	M.Carousel.init(elementosCarousel,{
		duration: 180,
		dist: -80,
		shift: 5,
		padding: 5,
		numVisible: 3,
		indicators: true, 
		noWrap: false,
		onCycleTo: 4
	})
ocultar_section_slidefm();
}

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('#slidefm');
    var instances = M.Carousel.init(elems, options);
  });

function show_slide_mujeres(){
  const elementosCarousel = document.querySelectorAll('#slidefm');
  M.Carousel.init(elementosCarousel,{
    duration: 180,
    dist: -80,
    shift: 5,
    padding: 5,
    numVisible: 3,
    indicators: true, 
    noWrap: false,
    onCycleTo: 4
  })
  ocultar_section_slidema()
}

//================FORMAS
  $(document).ready(function(){
  $(".forma-hombre").click(function(){
    $("#formas-s").hide(1000);
  });
});

$(function() {
    $(".forma-hombre").click(function() {
        var name = this.name;
        document.getElementById('forma-seleccionado').innerHTML = name;
    });
});

//==================

  $(document).ready(function(){
  $(".forma-femenino").click(function(){
    $("#formas-s").hide(1000);
  });
});


$(function() {
    $(".forma-femenino").click(function() {
    var name = this.name;
    document.getElementById('forma-seleccionado').innerHTML = name;
    });
});

//================MARCAS
  $(document).ready(function(){
  $(".marcas-s").click(function(){
    var name_marca = this.name;
    var plan = document.getElementById("plan-seleccionado").innerHTML;
    //alert(name+x);
if( plan != ""){     
    if (plan == 'Clasico' && name_marca =='AndVas') {
    document.getElementById('marca-seleccionado').innerHTML = name_marca;
    $("#marcas").hide(1000);
  }
else if( plan == 'Preferencial'  && name_marca == 'Guess'){
    document.getElementById('marca-seleccionado').innerHTML = name_marca;
    $("#marcas").hide(1000);
  }else if(plan == 'Preferencial'  && name_marca == 'AndVas'){
    document.getElementById('marca-seleccionado').innerHTML = name_marca;
    $("#marcas").hide(1000);
  }    
  else if(plan == 'Preferencial'  && name_marca == 'Converse'){
    document.getElementById('marca-seleccionado').innerHTML = name_marca;
      $("#marcas").hide(1000); 
  }
else if(plan == 'Preferencial'  && name_marca == 'Harley'){
    document.getElementById('marca-seleccionado').innerHTML = name_marca;
      $("#marcas").hide(1000); 
  }
else if(plan == 'Preferencial'  && name_marca == 'Candies'){
    document.getElementById('marca-seleccionado').innerHTML = name_marca;
      $("#marcas").hide(1000); 
  }
else if(plan == 'Preferencial'  && name_marca == 'Van Heusen'){
    document.getElementById('marca-seleccionado').innerHTML = name_marca;
      $("#marcas").hide(1000); 
  }
else if(plan == 'Preferencial'  && name_marca == 'Timberland'){
    document.getElementById('marca-seleccionado').innerHTML = name_marca;
      $("#marcas").hide(1000); 
  }

else if(plan == 'Premium'  && name_marca !=""){
    document.getElementById('marca-seleccionado').innerHTML = name_marca;
      $("#marcas").hide(1000); 
  }      
else{
      alert("Esta Marca esta Disponible este Plan");
    }
  


} else{
  alert("Debe Seleccionar primero un Plan");
}
    
  });
});

/*$(function() {
    $(".marcas-s").click(function() {
        var name = this.name;
        //var cls = this.className;
        //var id= this.id;

        
    });
});
*/


//================LENTES
  $(document).ready(function(){
  $(".lentes-s").click(function(){
    $("#container2").hide(1000);
  });
});

$(function() {
    $(".lentes-s").click(function() {
        var name = this.name;
        //var cls = this.className;
        //var id= this.id;

        document.getElementById('lente-seleccionado').innerHTML = name;
    });
});


function valida_marca(){

var x = document.getElementById("plan-seleccionado").innerHTML;

alert(x);
return false;
}


function agregar_items_plan(){

  var plan_def = document.getElementById('plan-seleccionado').innerHTML;
  tit_plan = "Plan";   
  document.getElementById('plan-definitivo').value = tit_plan+": "+plan_def;

  var forma_def = document.getElementById('forma-seleccionado').innerHTML;
  tit_forma = "Forma";   
  document.getElementById('forma-definitivo').value = tit_forma+": "+forma_def;

  var lente_def = document.getElementById('lente-seleccionado').innerHTML;
  tit_lente = "Lente";   
  document.getElementById('lente-definitivo').value = tit_lente+": "+lente_def;


  var marca_def = document.getElementById('marca-seleccionado').innerHTML;
  tit_marca = "Marca";   
  document.getElementById('marca-definitivo').value = tit_marca+": "+marca_def;

}

////////////////VALICAION DE INPUTS DE AFILIACION============

  var tarjeta = new Cleave('#numero_tarjeta', {
    creditCard: true,
    //delimiter: '-',
     //blocks: [4],
    onCreditCardTypeChanged: function (type) {
     console.log(type);
    if (type === 'visa'){
      document.getElementById("icono").className = "fa fa-cc-visa fa-2x";
    }

    if (type === 'amex'){
      document.getElementById("icono").className = "fa fa-cc-amex fa-2x";
    }

    if (type === 'mastercard'){
      document.getElementById("icono").className = "fa fa-cc-mastercard fa-2x";
    }

    }
});

var expiracion = new Cleave('#fecha_vec', {
    date: true,
    datePattern: ['m', 'yy'],
    delimiter: '/',
    blocks: [2,4],
});

var dui = new Cleave('#dui', {
    delimiter: '-',
    blocks: [8, 1],
    uppercase: true
});

var celular = new Cleave('#celular', {
    delimiter: '-',
    blocks: [4, 4],
    uppercase: true
});


  $(document).ready(function(){
    $('#tipo_tarjeta').formSelect();
  });


  $(document).ready(function(){
    $('#periodo_pago').formSelect();
  });
  ////VALIDAR TIPO TARJETA

window.onload=function(){
  $("#tipo_tarjeta").change(function () {

          
    $("#tipo_tarjeta option:selected").each(function () {
      id_tipo = $(this).val();
      $.post('miembros.php?op=periodo_pagos', { id_tipo: id_tipo }, function(data){
        $("#periodo_pago").html(data);
      });            
    });
  })
};

$(document).ready(function() {
  $(":checkbox").click(function(event) {
    if ($(this).is(":checked"))
      $(".myClass").show();
    else
      $(".myClass").hide();
  });
});

////
$(document).ready(function () {             
   $('#terminos').hide();
}); 

$(document).ready(function()
  {
    $("#check1").on( "click", function() {  
      $('#terminos').toggle(1000);
      });
});


