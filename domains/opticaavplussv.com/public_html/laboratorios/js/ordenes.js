var tabla_ordenes_metro;
var tabla_empresarial;
var tabla_sta;
function init(){
	lista_ordenes_metro();
	lista_ordenes_empresarial();
	lista_ordenes_sta();
}

function lista_ordenes_metro()
{

var empresa= $("#empresa").val();

if(empresa != ""){

	tabla_ordenes_metro=$('#ordenes_metrocentro').dataTable(
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
					url: 'ajax/laboratorio.php?op=listar_ordenes_metrocentro',
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
			 
			    "sInfo":           "<span style='color:white'>Mostrando un total de _TOTAL_ registros</span>",
			 
			    "sInfoEmpty":      "Mostrando un total de 0 registros",
			 
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			 
			    "sInfoPostFix":    "",
			 
			    "sSearch":         "<span style='color:black'>Buscar:</span>",
			 
			    "sUrl":            "",
			 
			    "sInfoThousands":  ",",
			 
			    "sLoadingRecords": "Cargando...",
			 
			    "oPaginate": {
			 
			        "sFirst":    "Primero",
			 
			        "sLast":     "Último",
			 
			        "sNext":     "<span style='color:black'>Siguiente</span>",
			 
			        "sPrevious": "<span style='color:black'>Anterior</span>"
			 
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


//listar Arce

function lista_ordenes_empresarial()
{

var empresa= $("#empresa").val();

if(empresa != ""){

	tabla_empresarial=$('#ordenes_empresarial').dataTable(
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
					url: 'ajax/laboratorio.php?op=listar_ordenes_empresarial',
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



function lista_ordenes_sta()
{

var empresa= $("#empresa").val();

if(empresa != ""){

	tabla_ordenes_sta=$('#ordenes_sta').dataTable(
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
					url: 'ajax/laboratorio.php?op=listar_ordenes_sa',
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

function mostrar_orden(id_orden)
{
	$.post("ajax/laboratorio.php?op=listar_ordenes_id",{id_orden : id_orden}, function(data, status)
	{
		data = JSON.parse(data);

		$('#paciente').html(data.paciente);
		$('#sucursal').html(data.sucursal);
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
		
		$('#policarbonato').html(data.policarbonato);
		$('#antireflejo').html(data.antirreflejo);
		$('#lente').html(data.lentes);
		$('#numero_orden').html(data.numero_orden);
		$('#color').html(data.colorlente);
		$('#base').html(data.base);
		$('#odoblea').html(data.odoblea);
		$('#odpupilar').html(data.odpupilar);
		$('#odplejos').html(data.oddplejos);
		$('#odpcerca').html(data.oddpcerca);
		$('#oioblea').html(data.oioblea);
		$('#oipupilar').html(data.oipupilar);
		$('#oiplejos').html(data.oidplejos);
		$('#oipcerca').html(data.oidpcerca);
		
		$('#aro').html(data.aro);
		$('#color_aro').html(data.coloraro);
		$('#medida_aro').html(data.medidas_lente);
		$('#m_a').html(data.medida_a);
		$('#m_b').html(data.medida_b);
		$('#m_c').html(data.medida_c);
	    $('#m_d').html(data.medida_d);
	    $('#diseno_aro').html(data.diseno_aro);
	    $('#materiales').html(data.materiales);
		});
        
setTimeout("pruebaDivAPdf();",2500);       
	}


    function pruebaDivAPdf() {
        var n_orden = document.getElementById("numero_orden").innerHTML;
        var punto='.pdf';
        //var n_orden = document.getElementById('numero_orden').innerHTML;
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#orden_pdf')[0];

        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 20,
            right: 20,
            bottom: 20,
            left: 40,
            width: 632
        };

        pdf.fromHTML(
            source, 
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, 
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                pdf.save('Orden'+ n_orden+punto);
            }, margins
        );

         setTimeout ("explode();", 1000);
    }


  function explode(){

	    location.reload();
}

init();




