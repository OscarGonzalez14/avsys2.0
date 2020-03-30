var tabla;

  //Función que se ejecuta al inicio
function init(){
	
	listar();

}



//Función Listar
function listar()
{
	tabla=$('#consultas_data').dataTable(
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
					url: '../ajax/consultas.php?op=listar',
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




 //VER DETALLE PROVEEDOR-COMPRA
	 $(document).on('click', '.detconsultas', function(){
	 	//toma el valor del id
		var id_consulta = $(this).attr("id");

		$.ajax({
			url:"../ajax/consultas.php?op=ver_consultas",
			method:"POST",
			data:{id_consulta:id_consulta},
			cache:false,
			dataType:"json",
			success:function(data)
			{
				
				$("#nombres").html(data.nombres);
				$("#codigo").html(data.codigo);
				$("#usuario").html(data.usuario);
			    $("#fecha_reg").html(data.fecha_reg);
				$("#empresa").html(data.empresa);
				$("#diagnostico").html(data.diagnostico);
				$("#sugeridos").html(data.sugeridos);
				$("#fecha_reg").html(data.fecha_reg);
				
				$("#oiesfreasl").html(data.oiesfreasl);
				$("#oicilindrosl").html(data.oicilindrosl);
				$("#oiejesl").html(data.oiejesl);
				$("#oiprismal").html(data.oiprismal);
				$("#oiadicionl").html(data.oiadicionl);
				$("#odesferasl").html(data.odesferasl);
				$("#odcilndrosl").html(data.odcilndrosl);
				$("#odejesl").html(data.odejesl);
				$("#odprismal").html(data.odprismal);
				$("#odadicionl").html(data.odadicionl);

				$("#oiesferasa").html(data.oiesferasa);
				$("#oicolindrosa").html(data.oicolindrosa);
				$("#oiejesa").html(data.oiejesa);
				$("#oiprismaa").html(data.oiprismaa);
				$("#oiadiciona").html(data.oiadiciona);
				$("#odesferasa").html(data.odesferasa);
				$("#odcilindrosa").html(data.odcilindrosa);
				$("#odejesa").html(data.odejesa);
				$("#dprismaa").html(data.dprismaa);
				$("#oddiciona").html(data.oddiciona);

				$("#sugeridos").html(data.sugeridos);
				$("#diagnostico").html(data.diagnostico);
				$("#medicamento").html(data.medicamento);
				$("#observaciones").html(data.observaciones);
				$("#oiesferasf").html(data.oiesferasf);
				$("#oicolindrosf").html(data.oicolindrosf);
				$("#oiejesf").html(data.oiejesf);
				$("#oiprismaf").html(data.oiprismaf);
				$("#oiadicionf").html(data.oiadicionf);
				$("#odesferasf").html(data.odesferasf);
				$("#odcilindrosf").html(data.odcilindrosf);
				$("#odejesf").html(data.odejesf);
				$("#dprismaf").html(data.dprismaf);
				$("#oddicionf").html(data.oddicionf);
                 
                 //puse el alert para ver el error, sin necesidad de hacer echo en la consulta ni nada
				//alert(data);
				
			}
		})
	});
    

//VER DETALLE PROVEEDOR-COMPRA
	 $(document).on('click', '.edit_consultas', function(){
	 	$('#consultasModal').modal("show");
		var id_consulta = $(this).attr("id");

		$.ajax({
			url:"../ajax/consultas.php?op=ver_consultas",
			method:"POST",
			data:{id_consulta:id_consulta},
			cache:false,
			dataType:"json",
			success:function(data)
			{				
				$("#nombre_pac").val(data.nombres);
				$("#codigop").val(data.codigo);
				$("#fecha_consulta").val(data.fecha_consulta);
				$("#mot_consulta").val(data.motivo);
				$("#mot_consulta").val(data.motivo);
				$("#patologias_c").val(data.patologias);

				/////////LENSOMETRIA/////////////
				$("#oiesfreasl_e").val(data.oiesfreasl);
				$("#oicilindrosl_e").val(data.oicilindrosl);
				$("#oiejesl_e").val(data.oiejesl);
				$("#oiprismal_e").val(data.oiprismal);
				$("#oiadicionl_e").val(data.oiadicionl);
				$("#odesferasl_e").val(data.odesferasl);
				$("#odcilndrosl_e").val(data.odcilndrosl);
				$("#odejesl_e").val(data.odejesl);
				$("#odprismal_e").val(data.odprismal);
				$("#odadicionl_e").val(data.odadicionl);

				//////AUTORFRACTOMETRO////////////////
				$("#oiesferasa_e").val(data.oiesferasa);
				$("#oicolindrosa_e").val(data.oicolindrosa);
				$("#oiejesa_e").val(data.oiejesa);
				$("#oiprismaa_e").val(data.oiprismaa);
				$("#oiadiciona_e").val(data.oiadiciona);
				$("#odesferasa_e").val(data.odesferasa);
				$("#odcilindrosa_e").val(data.odcilindrosa);
				$("#odejesa_e").val(data.odejesa);
				$("#dprismaa_e").val(data.dprismaa);
				$("#oddiciona_e").val(data.oddiciona);	
/////////////////////////AGUDEZA VISUAL///////////////
				$("#odavsclejos_e").val(data.odavsclejos);
				$("#odavphlejos_e").val(data.odavphlejos);
				$("#odavcclejos_e").val(data.odavcclejos);
				$("#odavsccerca_e").val(data.odavsccerca);
				$("#odavcccerca_e").val(data.odavcccerca);
				$("#oiavesferasf_e").val(data.oiavesferasf);
				$("#oiavcolindrosf_e").val(data.oiavcolindrosf);
				$("#oiavejesf_e").val(data.oiavejesf);
				$("#oiavprismaf_e").val(data.oiavprismaf);
				$("#oiavadicionf_e").val(data.oiavadicionf);

			
			}
		})
	});
    

    
 init();


