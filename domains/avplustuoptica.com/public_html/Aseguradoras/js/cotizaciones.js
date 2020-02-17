var tabla;

  //Función que se ejecuta al inicio
function init(){
	
	listar();

}

//Función Listar
function listar()
{
	tabla=$('#cotizaciones_data').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            		           
		            'pdf'
		        ],
		"ajax":
				{
					url: 'ajax/cotizaciones.php?op=listar',
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

	  //VER DETALLE paciente-VENTA
	 $(document).on('click', '.detalle', function(){
	 	//toma el valor del id
		var numero_venta = $(this).attr("id");

		$.ajax({
			url:"ajax/cotizaciones.php?op=ver_detalle_paciente_venta",
			method:"POST",
			data:{numero_venta:numero_venta},
			cache:false,
			dataType:"json",
			success:function(data)
			{
				

				$("#nombres").html(data.nombres);
				$("#numero_venta").html(data.numero_venta);
				$("#telefono").html(data.telefono);
				$("#fecha_venta").html(data.fecha_venta);
				$("#vendedor").html(data.usuario);
				$("#sucursal").html(data.sucursal);
                 
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
				//alert(data);
				
			}
		})
	});

	  //VER DETALLE VENTA
	 $(document).on('click', '.detalle', function(){
	 	//toma el valor del id
		var numero_venta = $(this).attr("id");

		$.ajax({
			url:"ajax/cotizaciones.php?op=ver_detalle_venta",
			method:"POST",
			data:{numero_venta:numero_venta},
			cache:false,
			//dataType:"json",
			success:function(data)
			{
				
				$("#detalles").html(data);
                 
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
				//alert(data);
				
			}
		})
	});

function aprobar_cot(){

	document.getElementById('est_cot').innerHTML = 'APROBADO';
	document.getElementById("est_cot").className = "btn btn-success";
}

function denegar_cot(){

	document.getElementById('est_cot').innerHTML = 'DENEGADO';
	document.getElementById("est_cot").className = "btn btn-danger";
}

 init();