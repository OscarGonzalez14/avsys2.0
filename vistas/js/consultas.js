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
				//$("#mot_consulta").val(data.motivo);
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
				//////////////////////////rx final oI
				$("#oiesferasf_e").val(data.oiesferasf);
				$("#oicolindrosf_e").val(data.oicolindrosf);
				$("#oiejesf_e").val(data.oiejesf);
				$("#oiprismaf_e").val(data.oiprismaf);
				$("#oiadicionf_e").val(data.oiadicionf);
				$("#prisoicorrige_e").val(data.prisoicorrige);
				$("#addoicorrige_e").val(data.addoicorrige);
				//////////////////////////rx final oD
				$("#odesferasf_e").val(data.odesferasf);
			    $("#odcilindrosf_e").val(data.odcilindrosf);
			    $("#odejesf_e").val(data.odejesf);
			    $("#dprismaf_e").val(data.dprismaf);
			    $("#prisodcorrige_e").val(data.prisodcorrige);
			    $("#oddicionf_e").val(data.oddicionf);
			    $("#addodcorrige_e").val(data.addodcorrige);
			    ////////DISTANCIAS INTERPUPILARES
			    $("#oddip_e").val(data.oddip);
			    $("#oidip_e").val(data.oidip);
			    $("#aood_e").val(data.aood);
			    $("#aooi_e").val(data.aooi);
			    $("#apod_e").val(data.apod);
			    $("#opoi_e").val(data.opoi);
			   // $("#").val(data.);
			   $("#ishihara_e").val(data.ishihara);
			   $("#amsler_e").val(data.amsler);
			   $("#anexos_e").val(data.anexos);
			   $("#sugeridos_e").val(data.sugeridos);
			   $("#diagnostico_e").val(data.diagnostico);
			   $("#medicamento_e").val(data.medicamento);
			   $("#observaciones_e").val(data.observaciones);
			   $("#id_consulta_e").val(data.id_consulta);

			
			}
		})
	});
    
function editarConsultas(){

var id_consulta_e = $("#id_consulta_e").val();
var mot_consulta=$("#mot_consulta").val();
var patologias_c=$("#patologias_c").val();
///////////LENSOMETRIA/////////////
var oiesfreasl_e=$("#oiesfreasl_e").val();
var oicilindrosl_e=$("#oicilindrosl_e").val();
var oiejesl_e=$("#oiejesl_e").val();
var oiprismal_e=$("#oiprismal_e").val();
var oiadicionl_e=$("#oiadicionl_e").val();
var odesferasl_e=$("#odesferasl_e").val();
var odcilndrosl_e=$("#odcilndrosl_e").val();
var odejesl_e=$("#odejesl_e").val();
var odprismal_e=$("#odprismal_e").val();
var odadicionl_e=$("#odadicionl_e").val();
///////////AUTOREFRACTOMETRO
var oiesferasa_e=$("#oiesferasa_e").val();
var oicolindrosa_e=$("#oicolindrosa_e").val();
var oiejesa_e=$("#oiejesa_e").val();
var oiprismaa_e=$("#oiprismaa_e").val();
var oiadiciona_e=$("#oiadiciona_e").val();
var odesferasa_e=$("#odesferasa_e").val();
var odcilindrosa_e=$("#odcilindrosa_e").val();
var odejesa_e=$("#odejesa_e").val();
var dprismaa_e=$("#dprismaa_e").val();
var oddiciona_e=$("#oddiciona_e").val();
////////////////AGUDEZA VISUAL
var odavsclejos_e=$("#odavsclejos_e").val();
var odavphlejos_e=$("#odavphlejos_e").val();
var odavcclejos_e=$("#odavcclejos_e").val();
var odavsccerca_e=$("#odavsccerca_e").val();
var odavcccerca_e=$("#odavcccerca_e").val();
var oiavesferasf_e=$("#oiavesferasf_e").val();
var oiavcolindrosf_e=$("#oiavcolindrosf_e").val();
var oiavejesf_e=$("#oiavejesf_e").val();
var oiavprismaf_e=$("#oiavprismaf_e").val();
var oiavadicionf_e=$("#oiavadicionf_e").val();
//////////////////////RXFINAL
var odesferasf_e=$("#odesferasf_e").val();
var odcilindrosf_e=$("#odcilindrosf_e").val();
var odejesf_e=$("#odejesf_e").val();
var dprismaf_e=$("#dprismaf_e").val();
var prisodcorrige_e=$("#prisodcorrige_e").val();
var oddicionf_e=$("#oddicionf_e").val();
var addodcorrige_e=$("#addodcorrige_e").val();

var oiesferasf_e=$("#oiesferasf_e").val();
var oicolindrosf_e=$("#oicolindrosf_e").val();
var oiejesf_e=$("#oiejesf_e").val();
var oiprismaf_e=$("#oiprismaf_e").val();
var prisoicorrige_e=$("#prisoicorrige_e").val();
var oiadicionf_e=$("#oiadicionf_e").val();
var addoicorrige_e=$("#addoicorrige_e").val();

///////////////OBLEAS
var oddip_e =$("#oddip_e").val();
var oidip_e =$("#oidip_e").val();
var aood_e =$("#aood_e").val();
var aooi_e =$("#aooi_e").val();
var apod_e =$("#apod_e").val();
var opoi_e =$("#opoi_e").val();

var ishihara_e=$("#ishihara_e").val();
var amsler_e=$("#amsler_e").val();
var anexos_e=$("#anexos_e").val();
var sugeridos_e=$("#sugeridos_e").val();
var diagnostico_e=$("#diagnostico_e").val();
var medicamento_e=$("#medicamento_e").val();
var observaciones_e=$("#observaciones_e").val();

    $.ajax({
    url:"../ajax/consultas.php?op=editar_consulta",
    method:"POST",
    data:{mot_consulta:mot_consulta,patologias_c:patologias_c,id_consulta_e:id_consulta_e,
    	oiesfreasl_e:oiesfreasl_e,oicilindrosl_e:oicilindrosl_e,oiejesl_e:oiejesl_e,oiprismal_e:oiprismal_e,oiadicionl_e:oiadicionl_e,odesferasl_e:odesferasl_e,odcilndrosl_e:odcilndrosl_e,odejesl_e:odejesl_e,odprismal_e:odprismal_e,odadicionl_e:odadicionl_e,oiesferasa_e:oiesferasa_e,oicolindrosa_e:oicolindrosa_e,oiejesa_e:oiejesa_e,oiprismaa_e:oiprismaa_e,oiadiciona_e:oiadiciona_e,odesferasa_e:odesferasa_e,odcilindrosa_e:odcilindrosa_e,odejesa_e:odejesa_e,dprismaa_e:dprismaa_e,oddiciona_e:oddiciona_e,
odavsclejos_e:odavsclejos_e,odavphlejos_e:odavphlejos_e,odavcclejos_e:odavcclejos_e,odavsccerca_e:odavsccerca_e,odavcccerca_e:odavcccerca_e,oiavesferasf_e:oiavesferasf_e,oiavcolindrosf_e:oiavcolindrosf_e,oiavejesf_e:oiavejesf_e,oiavprismaf_e:oiavprismaf_e,oiavadicionf_e:oiavadicionf_e,
odesferasf_e:odesferasf_e,odcilindrosf_e:odcilindrosf_e,odejesf_e:odejesf_e,dprismaf_e:dprismaf_e,prisodcorrige_e:prisodcorrige_e,oddicionf_e:oddicionf_e,addodcorrige_e:addodcorrige_e,oiesferasf_e:oiesferasf_e,oicolindrosf_e:oicolindrosf_e,oiejesf_e:oiejesf_e,oiprismaf_e:oiprismaf_e,prisoicorrige_e:prisoicorrige_e,oiadicionf_e:oiadicionf_e,addoicorrige_e:addoicorrige_e,
oddip_e:oddip_e,oidip_e:oidip_e,aood_e:aood_e,aooi_e:aooi_e,apod_e:apod_e,opoi_e:opoi_e,
ishihara_e:ishihara_e,amsler_e:amsler_e,anexos_e:anexos_e,sugeridos_e:sugeridos_e,diagnostico_e:diagnostico_e,medicamento_e:medicamento_e,observaciones_e:observaciones_e},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },        
      
  success:function(data){
  setTimeout ("bootbox.alert('Se ha Editado con exito');", 100);
  //refresca la pagina, se llama a la funtion explode
  setTimeout ("explode();", 2000);          
}

  }); 

    
}

function explode(){

	    location.reload();
}   

function eliminar_consulta(id_consulta){

	     //IMPORTANTE: asi se imprime el valor de una funcion
         
         //alert(categoria_id);

   
	    bootbox.confirm("¿Está Seguro de eliminar esta consulta?", function(result){
		if(result)
		{

				$.ajax({
					url:"../ajax/consultas.php?op=eliminar_consulta",
					method:"POST",
					data:{id_consulta:id_consulta},

					success:function(data)
					{
						//alert(data);
						//$("#resultados_ajax").html(data);
						//$("#categoria_data").DataTable().ajax.reload();
						explode();
					}
				});

		      }

		 });//bootbox


   }
 init();


