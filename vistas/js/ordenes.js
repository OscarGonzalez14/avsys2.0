var tabla_ordenes;
var tabla_ordenes_vencidas;
var tabla_paciente_ordenes;

function init(){
listar_ordenes();
listar_ordenes_vencidas();
listar_en_ordenes_pac();
}
/////////////LISTAR PACIENTES EN ORDENES
function listar_en_ordenes_pac(){

	tabla_paciente_ordenes=$('#lista_pacientes_ordenes_data').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		         
		            'excelHtml5',

		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/ordenes.php?op=listar_pac_en_ordenes',
					type : "post",
					dataType : "json",
					//data:{sucursal_paciente:sucursal_paciente},					
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
//Función Listar
function listar_ordenes()
{
	tabla_ordenes=$('#data_ordenes').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',		           
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/ordenes.php?op=listar_ordenes',
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

function listar_ordenes_vencidas()
{
	tabla_ordenes_vencidas=$('#data_ordenes_vencidas').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',		           
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/ordenes.php?op=listar_ordenes_vencidas',
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


////////RECHAZAR ORDEN
function recibir_orden(id_orden){
	$.ajax({
		url:"../ajax/ordenes.php?op=recibe_orden",
		method:"POST",
		data:{id_orden:id_orden},
		cache: false,		
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},
	});	
	setTimeout ("explode();", 1000);
}


////////RECHAZAR ORDEN
function rechazar_orden(id_orden){
	$.ajax({
		url:"../ajax/ordenes.php?op=rechazar_orden",
		method:"POST",
		data:{id_orden:id_orden},
		cache: false,		
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},
	});	
	setTimeout ("explode();", 1000);
}

  function explode(){

	    location.reload();
}

function envio_a_optica(id_orden){
	$.ajax({
		url:"ajax/laboratorio.php?op=enviar_optica",
		method:"POST",
		data:{id_orden:id_orden},
		cache: false,		
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},
	});	
	setTimeout ("explode();", 1000);
}

function show_orden(id_orden)
{
	$.post("ajax/ordenes.php?op=show_ordenes_id",{id_orden : id_orden}, function(data, status)
	{
		data = JSON.parse(data);

		$('#paciente').html(data.paciente);
		$('#sucursal').html(data.sucursal);
		$('#odesfera').html(data.odesfera);
		$('#odcilindro').html(data.odcilindro);
		$('#odeje').html(data.odeje);
		$('#odadicion').html(data.oddicion);
		$('#odprisma').html(data.odprisma);
		
		});
        
	}

$(document).on('click', '.add_pac_orden', function(){
    //toma el valor del id
    var id_paciente = $(this).attr("id");
    $('#modalPaciente').modal('hide');
    $.ajax({
      url:"../ajax/ordenes.php?op=complete_campos_orden",
      method:"POST",
      data:{id_paciente:id_paciente},
      cache:false,
      dataType:"json",
      success:function(data)
      {       
        $("#paciente").val(data.nombres);
        $("#odesfreaslord").val(data.odesferasf);
        $("#odcilindroslord").val(data.odcilindrosf);
        $("#odejeslord").val(data.odejesf);
        $("#odadicionlord").val(data.dprismaf);
        $("#odprismalord").val(data.oddicionf);
        $("#oiesferaslord").val(data.oiesferasf);
        $("#oicilndroslord").val(data.oicolindrosf);
        $("#oiejeslord").val(data.oiejesf);
        $("#oiadicionlord").val(data.oiprismaf);
        $("#oiprismalord").val(data.oiadicionf);
                
      }
    })
  });

init();