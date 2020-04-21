var tabla_ordenes_empresarial;

function init(){
	listar_ordenes_descuento_empresarial();
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

var id_usuario=$("#id_user").val();
var id_paciente=$("#id_paciente").val();
var fin_orden = $("#hasta_ord").val();
//var id_aro = $("#codigo_de_aro").val();

var dui = $("#dui_ord").val();
var nit = $("#nit_ord").val();
var correo = $("#correo_ord").val();


var jefe_inmediato = $("#jefe_inmediato").val();
var tel_jefe_inmediato = $("#tel_jefe_inmediato").val();
var cargo_jefe_inmediato = $("#cargo_jefe_inmediato").val();

var pac_beneficiario = $("#pac_beneficiario").val();
var pac_parentesco =$("#pac_parentesco").val();
var tel_ben =$("#tel_ben").val();
//var direccion_parentesco =$("#direccion_parentesco").val();
var ref_uno = $("#ref_uno").val();
var tel_ref_uno = $("#tel_ref_uno").val();
var ref_dos = $("#ref_dos").val();
var tel_ref_dos = $("#tel_ref_dos").val();

var subtotal = $("#subtotal").html();
var plazo = $("#plazo").val();


if(numero_orden != "" && ref_uno != "" && tel_ref_uno != "" && jefe_inmediato != "" && tel_jefe_inmediato != ""){
	
    $.ajax({
    url:"../ajax/empresarial.php?op=guardar_orden_desc",
    method:"POST",
    data:{numero_venta:numero_venta,numero_orden:numero_orden,fecha_creacion:fecha_creacion,aro:aro,photo:photo,arnti:arnti,lente:lente,id_usuario:id_usuario,id_paciente:id_paciente,fin_orden:fin_orden,dui:dui,nit:nit,correo:correo,jefe_inmediato:jefe_inmediato,tel_jefe_inmediato:tel_jefe_inmediato,cargo_jefe_inmediato:cargo_jefe_inmediato,pac_beneficiario:pac_beneficiario,pac_parentesco:pac_parentesco,tel_ben:tel_ben,ref_uno:ref_uno,tel_ref_uno:tel_ref_uno,ref_dos:ref_dos,tel_ref_dos:tel_ref_dos,subtotal:subtotal,plazo:plazo},
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
  //setTimeout ("explode();", 2000);          
}

  }); 

  }else{
    bootbox.alert("Debe llenar todos los campos Obligatorios** !!");
    return false;
  } //cierre del condicional de validacion de los campos del paciente
  
    
}
//////////////////COCULTAR BOTONES
$(document).ready(hidden_btn_imprimir);
  function hidden_btn_imprimir(){
  document.getElementById("n_orden_desc_current").style.display = "none";
}

$(document).ready(hidden_btn_nota);
  function hidden_btn_nota(){
  document.getElementById("nota_abono_init").style.display = "none";
}

$(document).ready(hidden_btn_join_order);
  function hidden_btn_join_order(){
  document.getElementById("join_orders").style.display = "none";
}

function mostrar_btn_join_order(){
  document.getElementById("join_orders").style.display = "block";
}
$(document).ready(nota_update_print);
  function nota_update_print(){
  document.getElementById("print_nota_update").style.display = "none";
}
function print_nota_update(){
  document.getElementById("print_nota_update").style.display = "block";
}

$(document).on('click', '#btn_enviar_ord_desc', function(){
    
    var num_de_orden = $("#num_order_descuento").val();
    var id_paciente = $("#id_paciente").val();
    if(num_de_orden !=""){
    document.getElementById("n_orden_desc_current").href='imprimir_orden_desc.php?numero_orden_pac='+num_de_orden+'&'+'numero_paciente='+id_paciente;
    mostrar_btn_orden_desc();
    }else{
    	alert("Actualizado");
    	return false;
    }
  });

$(document).on('click', '.show_nota_inicial', function(){
    
    var num_de_orden = $("#num_order_descuento").val();
    var id_paciente = $("#id_paciente").val();
    if(num_de_orden !=""){
    document.getElementById("nota_abono_init").href='nota_abono.php?numero_orden_pac='+num_de_orden+'&'+'numero_paciente='+id_paciente;
    mostrar_btn_nota();
    }else{
    	alert("Actualizado");
    	return false;
    }
  });
///////////////MOSTRAR BOTON DE ORDEN ACTUALIZADA
$(document).on('click', '#update_orden_des', function(){
    
    var num_de_orden = $("#numero_orden_ad").val();
    var id_paciente = $("#id_paciente").val();
    if(num_de_orden !=""){
    document.getElementById("join_orders").href='imprimir_orden_desc.php?numero_orden_pac='+num_de_orden+'&'+'numero_paciente='+id_paciente;
    mostrar_btn_join_order();
    }else{
    	alert("Actualizacion Exitosa!!");
    	return false;
    }
  });
//////////////////////SHOW NOTA DE ABONO
$(document).on('click', '#join_orders', function(){
    
    var num_de_orden = $("#numero_orden_ad").val();
    var id_paciente = $("#id_paciente").val();
    if(num_de_orden !=""){
    document.getElementById("print_nota_update").href='nota_abono.php?numero_orden_pac='+num_de_orden+'&'+'numero_paciente='+id_paciente;
    print_nota_update();
    }else{
    	alert("Actualizado");
    	return false;
    }
  });

function listar()
{
	tabla=$('#').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/empresarial.php?op=listar_ordenes_descuento',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 10 registros hace una paginación
	    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
	    
	    "language": {
 
			    "sProcessing":     "Procesando...",
			 
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			 
			    "sZeroRecords":    "No se encontraron resultados",
			 
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			 
			    "sInfo":           "Mostrando un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando un total de 0 registros",
			 
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			 
			    "sInfoPostFix":    "",
			 
			    "sSearch":         "Buscar:",
			 
			    "sUrl":            "",
			 
			    "sInfoThousands":  ",",
			 
			    "sLoadingRecords": "Cargando...",
			 
			    "oPaginate": {
			 
			        "sFirst":    "Primero",
			 
			        "sLast":     "Último",
			 
			        "sNext":     "Siguiente",
			 
			        "sPrevious": "Anterior"
			 
			    },
			 
			    "oAria": {
			 
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			 
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			 
			    }

			   }//cerrando language
	       
	}).DataTable();
}

function mostrar_btn_orden_desc(){
  document.getElementById("n_orden_desc_current").style.display = "block";
}
function mostrar_btn_nota(){
  document.getElementById("nota_abono_init").style.display = "block";
}


function update_descuento_planilla(){    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var numero_venta = $("#numero_venta").val();
    var cod_pac = $("#cod_pac").val();
    var nombre_pac = $("#nombre_pac").val();
    var tipo_pago = $("#tipo_pago").val();
    var subtotal = $("#subtotal").html();
    var usuario = $("#usuario").val();
    var tipo_venta = $("#tipo_venta").val();
    var sucursal = $("#sucursal").val();
    var id_usuario = $("#id_user").val();
    var id_paciente = $("#id_paciente").val();
    var plazo = $("#plazo").val();
    var descripcion = $("#descripcion").val();
    var importe = $("#importe").val();
    var numero_orden_ad = $("#numero_orden_ad").val();

	var cuotas_anterior_add = $("#cuotas_anterior_add").val();
	var nuevo_saldo_ad = $("#nuevo_saldo_ad").val();
	var monto_cuotas_add = $("#monto_cuotas_add").val();
	var nuevo_plazo = $("#new_place").val();

	var benefiaciario_add = $("#benefiaciario_add").val();
	var parentesco_add = $("#parentesco_add").val();
	var telefono_add = $("#telefono_add").val();
	var fecha = $("#date").val();
	var pac_evaluado = $("#pac_evaluado").val();

//validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
   if(nombre_pac!="" && sucursal!="" && tipo_venta!="" && plazo !='0'){

    $("#descuento").attr('disabled', 'disabled');
     console.log('error!');

    $.ajax({
		url:"../ajax/empresarial.php?op=update_descuento_planilla",
		method:"POST",
		data:{'arrayUpdate_venta':JSON.stringify(detalles), 'numero_venta':numero_venta,'nombre_pac':nombre_pac, 'tipo_pago':tipo_pago,'subtotal':subtotal,'tipo_venta':tipo_venta,'usuario':usuario,'sucursal':sucursal,'id_usuario':id_usuario,'id_paciente':id_paciente,'plazo':plazo,'descripcion':descripcion,'importe':importe,'numero_orden_ad':numero_orden_ad,'cuotas_anterior_add':cuotas_anterior_add,'nuevo_saldo_ad':nuevo_saldo_ad,'monto_cuotas_add':monto_cuotas_add,nuevo_plazo:nuevo_plazo,'benefiaciario_add':benefiaciario_add,'parentesco_add':parentesco_add,'telefono_add':telefono_add,'fecha':fecha,'pac_evaluado':pac_evaluado},
		cache: false,
		dataType:"html",
		error:function(x,y,z){
			d_pacole.log(x);
			console.log(y);
			console.log(z);
		},    
      
			
		success:function(data){

	    var nombre_pac = $("#nombre_pac").val("");

            
            detalles = [];
            $('#listProdVentas').html('');           
       	
		}

	});

}
}

$(document).on('click', '.nuevo_monto_cuotas', function(){
nuevo_monto_cuotas();   
  
});

function nuevo_monto_cuotas(){

   var plazo_act = $("#hasta_ord_add").val();
   var saldo_act = $("#nuevo_saldo_ad").val();   
   var letras_pendientes= $("#pendientes_ad").val();

   var nuevo_plazo = (parseInt(plazo_act))+(parseInt(letras_pendientes));
   document.getElementById('new_place').value=nuevo_plazo;

   var nueva_cuota = (parseInt(saldo_act))/(parseInt(nuevo_plazo)); 
   document.getElementById("monto_cuotas_add").value=Math.round10(nueva_cuota, -2);


}

/////////////////CARGAR BENEFICIARIOS EN ORDEN DE DESCUENTO
$(document).on("click",".beneficiarios_empresarial", function(){
$('#beneficiarios_venta').modal('show');
var id_paciente= $("#id_paciente").val();
if(id_paciente != ""){
tabla_ventas_sucursal= $('#lista_beneficiario_venta').DataTable({

	    
	       "aProcessing": true,//Activamos el procesamiento del datatables
	       "aServerSide": true,//Paginación y filtrado realizados por el servidor
	      dom: 'Bfrtip',//Definimos los elementos del control de tabla
	      buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],

	         "ajax":{
	            url:"../ajax/empresarial.php?op=buscar_beneficiario",
                type : "post",
				//dataType : "json",
				data:{id_paciente:id_paciente},						
				error: function(e){
					console.log(e.responseText);

				},

	          
	          },

	            "bDestroy": true,
				"responsive": true,
				"bInfo":true,
				"iDisplayLength": 10,//Por cada 10 registros hace una paginación
			    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)

	          "language": {
 
			    "sProcessing":     "Procesando...",
			 
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			 
			    "sZeroRecords":    "No se encontraron resultados",
			 
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			 
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			 
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			 
			    "sInfoPostFix":    "",
			 
			    "sSearch":         "Buscar:",
			 
			    "sUrl":            "",
			 
			    "sInfoThousands":  ",",
			 
			    "sLoadingRecords": "Cargando...",
			 
			    "oPaginate": {
			 
			        "sFirst":    "Primero",
			 
			        "sLast":     "Último",
			 
			        "sNext":     "Siguiente",
			 
			        "sPrevious": "Anterior"
			 
			    },
			 
			    "oAria": {
			 
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			 
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			 
			    }

			   }, //cerrando language

			    //"scrollX": true



	      });

	        }else{
	        	alert("Seleccione la Sucursal");
	        	return false;
	        }//cierre condicional 

	    });

function load_beneficiarios_ventas(id_paciente,encargado){



	$.post("../ajax/empresarial.php?op=complete_campos_beneficiario_venta",{id_paciente:id_paciente,encargado:encargado}, function(data, status)
	{
		data = JSON.parse(data);

		 //alert(data.cedula);

		   console.log(data);

		$('#pac_beneficiario').val(data.encargado);
		$('#pac_parentesco').val(data.parentesco_beneficiario);
		$('#tel_ben').val(data.telefono_beneficiario);

		$('#benefiaciario_add').val(data.encargado);
		$('#parentesco_add').val(data.parentesco_beneficiario);
		$('#telefono_add').val(data.telefono_beneficiario);

		$('#beneficiarios_venta').modal('hide');	
		});
	
}
//////////////////////////////LISTAR ORDENES DE DESCUENTO
function listar_ordenes_descuento_empresarial(){

	tabla_ordenes_empresarial=$('#listar_ordenes_descuento_data').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/empresarial.php?op=listar_descuentos_planilla_print',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 10 registros hace una paginación
	    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
	    
	    "language": {
 
			    "sProcessing":     "Procesando...",
			 
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			 
			    "sZeroRecords":    "No se encontraron resultados",
			 
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			 
			    "sInfo":           "Mostrando un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando un total de 0 registros",
			 
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			 
			    "sInfoPostFix":    "",
			 
			    "sSearch":         "Buscar:",
			 
			    "sUrl":            "",
			 
			    "sInfoThousands":  ",",
			 
			    "sLoadingRecords": "Cargando...",
			 
			    "oPaginate": {
			 
			        "sFirst":    "Primero",
			 
			        "sLast":     "Último",
			 
			        "sNext":     "Siguiente",
			 
			        "sPrevious": "Anterior"
			 
			    },
			 
			    "oAria": {
			 
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			 
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			 
			    }

			   }//cerrando language
	       
	}).DataTable();
}





(function() {
  /**
   * Ajuste decimal de un número.
   *
   * @param {String}  tipo  El tipo de ajuste.
   * @param {Number}  valor El numero.
   * @param {Integer} exp   El exponente (el logaritmo 10 del ajuste base).
   * @returns {Number} El valor ajustado.
   */
  function decimalAdjust(type, value, exp) {
    // Si el exp no está definido o es cero...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Si el valor no es un número o el exp no es un entero...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
      return NaN;
    }
    // Shift
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
  }

  // Decimal round
  if (!Math.round10) {
    Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };
  }
  // Decimal floor
  if (!Math.floor10) {
    Math.floor10 = function(value, exp) {
      return decimalAdjust('floor', value, exp);
    };
  }
  // Decimal ceil
  if (!Math.ceil10) {
    Math.ceil10 = function(value, exp) {
      return decimalAdjust('ceil', value, exp);
    };
  }
})();
init();