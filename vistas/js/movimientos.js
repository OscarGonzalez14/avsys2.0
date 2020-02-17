
 var tabla_en_envios;
 var tabla_requisiciones;
 var tabla_envios_suc;


function init(){
	
	listarEnvio();
    envios_sucursal();
	$("#producto_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})
    
    //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){

		   
		    /*habilita los campos categoria, producto, moneda ya que si se 
            editaba uno que tenia registro asociado entonces al crear un nuevo registro aparecian los campos deshabilitados*/
			 $("#categoria").attr('disabled', false);
			 $("#producto").attr('disabled', false);
			 $("#moneda").attr('disabled', false);
			
			
			$(".modal-title").text("Agregar Aros");
		
	  });

	
}

function listarEnvio(){

	tabla_en_envios=$('#lista_envios_data').dataTable(
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
					url: '../ajax/movimientos.php?op=listar_en_envios',
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


////**************LISTAR ENVIOS A SUSCURSAL***********************//////////
function envios_sucursal(){

	tabla_envios_suc=$('#envios_suc_data').dataTable(
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
					url: '../ajax/movimientos.php?op=listar_envios_sucursal',
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

$(document).ready(function(){
	$("#sucursal_origen").change(function () {	
		$("#sucursal_origen option:selected").each(function () {
			id_tipo = $(this).val();
			$.post('../ajax/movimientos.php?op=select_gaveta_destino', { id_tipo: id_tipo }, function(data){
				$(".ubicaciones_destino").html(data);
			});            
		});
	})
});




$(document).ready(function(){
	$("#sucursal").change(function () {

					
		$("#sucursal option:selected").each(function () {
			id_tipo = $(this).val();
			$.post('../ajax/bodegas.php?op=select-sucursal', { id_tipo: id_tipo }, function(data){
				$(".ubicaciones").html(data);
			});            
		});
	})
});

//BUSCAR PRODUCTO TRASLADO
var detallesE = [];	
function traslado_Aros(id_producto,id_ingreso){
    $.ajax({
		url:"../ajax/movimientos.php?op=buscar_producto_traslados",
		method:"POST",
		data:{id_producto:id_producto,id_ingreso:id_ingreso},
		cache: false,
		dataType:"json",

		success:function(data){                     
		var obj = {
			cantidad : 1,
			id_ingreso: id_ingreso,
			codProd  : id_producto,
			modelo   : data.modelo,
			marca    : data.marca,
			color    : data.color,
			stock    : data.stock,
			medidas  : data.medidas,
			categoriaub : data.categoriaub

		};
		                
    detallesE.push(obj);
	listarTrasladoAros();
	$('#modalEnvios').modal("hide");

    }//fin success		

	});//fin de ajax
}// fin de funcion
		  

function listarTrasladoAros(){
$('#listProdEnvios').html('');
var filas = ""; 	
for(var i=0; i<detallesE.length; i++){
	 var filas = filas + "<tr><td colspan='1'>"+(i+1)+"</td> <td name='modelo[]' colspan='2'>"+detallesE[i].modelo+"</td> <td name='marca[]' colspan='1'>" +detallesE[i].marca+"</td> <td name='color[]' colspan='2'>" +
	 detallesE[i].color+"</td><td colspan='1'><input type='number' class='cantidad' name='cantidad[]' id=cantidad_"+i+" onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidadAjax(event, this, "+(i)+");' value='"+detallesE[i].cantidad+"'><td>"+detallesE[i].categoriaub+"</td><td><select id='ubicacion_de_destino' class='form-control form-control-success ubicaciones_destino' style='border-color: #5bc0de; border: solid 2px #5bc0de'></td></tr>";
}
	$('#listProdEnvios').html(filas);      
  }

function registrarTraslados(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var ub_origen = $("#ub_de_origen").val();
    var ub_destino = $("#ubicacion_de_destino").val();
    var numero_envio = $("#numero_envio").val();   //var comprador = $("#comprador").html();
  	var sucursal = $("#sucursal_origen").val();
    var id_usuario = $("#id_usuario").val();
    var usuario = $("#usuario").val();
 
	if(sucursal == "" || ub_destino =="" || ub_origen==ub_destino){
 		alert("Algun campo está incorrecto o no fue seleccionado");
		return false;
	} 
    
    else{
    console.log('Proof');   
    $.ajax({
		url:"../ajax/movimientos.php?op=registrar_ingreso",
		method:"POST",
		data:{'arrayIngreso':JSON.stringify(detallesE),'ub_origen':ub_origen,'ub_destino':ub_destino,'id_usuario':id_usuario,'numero_envio':numero_envio,'sucursal':sucursal,'usuario':usuario},
		cache: false,		
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},         
		success:function(data){
		console.log(data);
        detalles = [];
        $('#listProdEnvios').html('');
        setTimeout ("bootbox.alert('Se ha registrado el envio con éxito');", 100);       
 
        setTimeout ("explode();", 2000); 
	}


	});	

}	
	
}
/////////////TRASLADO DE SUCURSAL A SUCURSAL**************************
var detallesEn = [];	
function trasladosaSucursal(id_producto){
    $.ajax({
		url:"../ajax/movimientos.php?op=buscar_producto_traslados",
		method:"POST",
		data:{id_producto:id_producto},
		cache: false,
		dataType:"json",

		success:function(data){                     
		var obj = {
			cantidad : 1,
			codProd  : id_producto,
			modelo   : data.modelo,
			marca    : data.marca,
			color    : data.color,
			stock    : data.stock,
			medidas  : data.medidas,
			categoriaub : data.categoriaub							
		};
		                
    detallesEn.push(obj);
	listarTrasladoSucursal();
	$('#envSucursal').modal("hide");

    }//fin success		

	});//fin de ajax
}// fin de funcion

function listarTrasladoSucursal(){
$('#listEnviosSucursal').html('');
var filas = ""; 	
for(var i=0; i<detallesEn.length; i++){
	 var filas = filas + "<tr><td>"+(i+1)+"</td> <td name='modelo[]'>"+detallesEn[i].modelo+" "+detallesEn[i].marca+" "+detallesEn[i].medidas+" "+detallesEn[i].color+"<td><input type='number' class='cantidad' name='cantidad[]' id=cantidad_"+i+" onClick='fijarCantidad(event, this, "+(i)+");' onKeyUp='setCantidadAjax(event, this, "+(i)+");' value='"+detallesEn[i].cantidad+"'> </td><td>"+detallesEn[i].categoriaub+"</td></tr>";
}
	$('#listEnviosSucursal').html(filas);      
}

function registrarTrasladosSucursales(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var suc_origen = $("#suc_origen").val();
    var suc_destino = $("#suc_destino").val();
    var numero_envio = $("#numero_envio").val();   //var comprador = $("#comprador").html();
  	//var origen = $("#origin").val();
    var id_usuario = $("#id_usuario").val();
    var usuario = $("#usuario").val();
    var tipo_traslado = $('#tipo_traslado').val();
 
	if(suc_origen==suc_destino || suc_origen == "" || suc_destino == ""){
 		alert("Revise las Sucursales de Origen y Destino");
		return false;
	} 
    else{
    console.log('Proof');   
    $.ajax({
		url:"../ajax/movimientos.php?op=registrar_traslados_sucursal",
		method:"POST",
		data:{'arrayTrasladosSucursal':JSON.stringify(detallesEn),'suc_origen':suc_origen,'suc_destino':suc_destino,'numero_envio':numero_envio,'id_usuario':id_usuario,'usuario':usuario,'tipo_traslado':tipo_traslado},
		cache: false,		
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},         
		success:function(data){
		console.log(data);
        detalles = [];
        $('#listEnviosSucursal').html('');
        setTimeout ("bootbox.alert('Se ha registrado el traslado con éxito');", 100);       
 
        setTimeout ("explode();", 2000); 
		}
	});	
	}	
	
}

function fijarCantidad(event, obj, idx){
  	event.preventDefault();
  	detallesEn[idx].cantidad = parseInt(obj.value);
}

/////////////-------------------********************FIN TRALADO SUCURSAL

  function setCantidad(event, obj, idx){
  	event.preventDefault();
  	detallesE[idx].cantidad = parseInt(obj.value);
 
  }

       function explode(){

	    location.reload();
}  

init();