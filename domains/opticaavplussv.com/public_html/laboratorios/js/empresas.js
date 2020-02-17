var tabla_ordenes;

function init(){

	listar_ordenes();

}

function listar_ordenes()
{

var empresa= $("#empresa").val();

if(empresa != ""){

	tabla_ordenes=$('#ordenes_lab').dataTable(
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
					url: 'ajax/laboratorio.php?op=listar_ordenes',
					type : "post",
					//dataType : "json",
					data:{empresa:empresa},							
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

		        }else{
	        	alert("Sin resultados");
	        	return false;
	        }
}


 //Mostrar datos del producto en la ventana modal 
function mostrar_orden(id_orden)
{
	$.post("ajax/laboratorio.php?op=listar_ordenes_id",{id_orden : id_orden}, function(data, status)
	{
		data = JSON.parse(data);


		    	    //window.location="orden_pdf.php";
		    	    
		    	    $('#sucursal').html(data.sucursal);

					$('#paciente').html(data.paciente);
                    $('#optica').html(data.optica);
					$('#odesfera').html(data.odesfera);
					$('#odcilindro').html(data.odcilindro);
					$('#odeje').html(data.odeje);
					$('#odadicion').html(data.oddicion);
					$('#odprisma').html(data.odprisma);
					
					$('#oiesfera').html(data.oiesfera);
					$('#oicilindro').html(data.oicilindros);
					$('#oieje').html(data.oieje);
					$('#oiadicion').html(data.oiadicion);
					$('#oiprisma').html(data.oiprisma);

					/*$('#producto').val(data.producto);

					$("#producto").attr('disabled', false);


					$('#presentacion').val(data.presentacion);
	

					$('#unidad').val(data.unidad);
					$('#moneda').val(data.moneda);

				    $("#moneda").attr('disabled', false);

	                $('#precio_compra').val(data.precio_compra);
					$('#precio_venta').val(data.precio_venta);
					$('#stock').val(data.stock);
					$('#estado').val(data.estado);
					$('#datepicker').val(data.fecha_vencimiento);
					$('.modal-title').text("Editar Producto");
					$('#id_producto').val(id_producto);
					$('#producto_uploaded_image').html(data.producto_imagen);
					$('#resultados_ajax').html(data);
					$("#producto_data").DataTable().ajax.reload();*/



				
				
				
				
		});
        
setTimeout ("pruebaDivAPdf();", 2500);       
	}


    function pruebaDivAPdf() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#orden_pdf')[0];

        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };

        pdf.fromHTML(
            source, 
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, 
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                pdf.save('Prueba.pdf');
            }, margins
        );
    }




init();