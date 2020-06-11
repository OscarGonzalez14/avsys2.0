var tabla_en_pacientes;
var tabla_detalle_empresas;

//Función que se ejecuta al inicio (se llama al final de este archivo)
function init(){
    
  listar_en_pacientes();
  detalle_por_empresas();
	
}

function agregar_empresa_pac(id_empresa){

      
$.ajax({
	url:"../ajax/empresa.php?op=buscar_empresa_paciente",
	method:"POST",
	data:{id_empresa:id_empresa},
	dataType:"json",
	success:function(data)
	{                       
		$('#empresasModal').modal('hide');
		$('#cod_emp').val(data.id_empresas);
		$('#empresa').val(data.nombre);
		$('#sucursal_emp').val(data.direccion);			
	}
})
	
  }


function listar_en_pacientes(){

	tabla_en_pacientes=$('#lista_pacientes_data_emp').dataTable(
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
					url: '../ajax/empresa.php?op=listar_en_pacientes',
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



function guardarEmpresa(){
	var  nombre_emp=$("#nombre_emp").val();
    var  telefono_emp=$("#telefono_emp").val();
    var  direccion_emp=$("#direccion_emp").val();
    var  nit_emp=$("#nit_emp").val();
    var  responsable=$("#responsable").val();
    var  user_emp=$("#user_emp").val();
    var  pass_emp=$("#pass_emp").val();
    var  correo_emp=$("#correo_emp").val();
    var  user_reg=$("#user_reg").val();      
    

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(nombre_emp != "" ){
    $.ajax({
    url:"../ajax/empresa.php?op=guardar_empresa",
    method:"POST",
    data:{nombre_emp:nombre_emp,telefono_emp:telefono_emp,direccion_emp:direccion_emp,nit_emp:nit_emp,responsable:responsable,user_emp:user_emp,pass_emp:pass_emp,correo_emp:correo_emp,user_reg:user_reg},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },        
      
  success:function(data){
  setTimeout ("bootbox.alert('Se ha Registrado la empresa con exito');", 100);
  //refresca la pagina, se llama a la funtion explode
  setTimeout ("explode();", 2000);          
}

  }); 

  }else{
    bootbox.alert("El campo nombre empresa es obligatorio!!");
    return false;
  } //cierre del condicional de validacion de los campos del paciente
  
    
}   


  //*****************************************************************************
   /*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA VENTA*/
       function explode(){

      location.reload();
}
//MOSTRAR DATOS DE EMPRESA
function mostrar_empresa(id_usuario_empresa)
{
	$.post("../ajax/empresa.php?op=empresa",{id_usuario_empresa : id_usuario_empresa}, function(data, status)
	{
		data = JSON.parse(data);
		        

			
				$('#empresaModal').modal('show');
				$('#cedula_empresa').val(data.cedula);
				$('#nombre_empresa').val(data.nombre);
				
				$('#telefono_empresa').val(data.telefono);
				$('#email_empresa').val(data.correo);
				$('#direccion_empresa').val(data.direccion);
				
				$('.modal-title').text("Editar Empresa");
				$('#id_usuario_empresa').val(id_usuario_empresa);
				
				
		});
        
	}


//EDITAR EMPRESA

//la funcion guardaryeditar(e); se llama cuando se da click al boton submit
function editar_empresa(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#empresa_form")[0]);



		$.ajax({
			url: "../ajax/empresa.php?op=editar_empresa",
		    type: "POST",
		    data: formData,
		    contentType: false,
		    processData: false,

		    success: function(datos)
		    {                    

		         //alert(datos);


				$('#empresaModal').modal('hide');

				$("#resultados_ajax").html(datos);

					
		    }

		});

}


///////////////detalle y resumen de saldos por empresa

function detalle_por_empresas(){

	tabla_detalle_empresas=$('#get_detalle_empresas_data').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
		],
		"ajax":
				{
					url: '../ajax/empresa.php?op=listar_detalle_empresas',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		//drawCallback: function () {
      // var tot_creditos = $('#get_detalle_empresas_data').DataTable().column(2).data().sum();
     //  $('#tot_creditos').html('$'+tot_creditos.toFixed(2));
        //var monto_saldo = $('#creditos_empresarial').DataTable().column(4).data().sum();
        //$('#monto_saldo').html('$'+monto_saldo.toFixed(2));
        //var monto_cuota = $('#creditos_empresarial').DataTable().column(5).data().sum();
        //$('#monto_cuota').html('$'+monto_cuota.toFixed(2));
        /*var monto_abonado = $('#creditos_empresarial').DataTable().column(6).data().sum();
        $('#monto_abonado').html('$'+monto_abonado.toFixed(2));*/
     // },

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
			 

			   }//cerrando language
	       
	}).DataTable();
}
/////////////////////////LISTAR PACIENTES CATEGORIA
$(document).on("click",".cat_a", function(){

var id_empresas=$(this).attr("id");
$('#listar_categoria_a').modal('show');
tabla_categoria_a= $('#categoria_a_data').DataTable({

	       "aProcessing": true,//Activamos el procesamiento del datatables
	       "aServerSide": true,//Paginación y filtrado realizados por el servidor
	       "scrollX": true,
	       //'fixedHeader': true,
	      // colReorder: true,
	      dom: 'Bfrtip',//Definimos los elementos del control de tabla
	      buttons: [		          
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
		  ],

	         "ajax":{
	            url:"../ajax/empresa.php?op=listar_pacientes_cat_a",
                type : "post",
				//dataType : "json",
				data:{id_empresas:id_empresas},						
				error: function(e){
					console.log(e.responseText);
				}
			},

    drawCallback: function () {
        var creditos = $('#categoria_a_data').DataTable().column(14).data().sum();
        $('#total_aro').html('$'+creditos.toFixed(2));
        //var monto_saldo = $('#creditos_empresarial').DataTable().column(4).data().sum();
        //$('#monto_saldo').html('$'+monto_saldo.toFixed(2));
       // var monto_cuota = $('#creditos_empresarial').DataTable().column(5).data().sum();
        //$('#monto_cuota').html('$'+monto_cuota.toFixed(2));
        /*var monto_abonado = $('#creditos_empresarial').DataTable().column(6).data().sum();
        $('#monto_abonado').html('$'+monto_abonado.toFixed(2));*/
      },
	          


	            "bDestroy": true,
				"responsive": true,
				"bInfo":true,
				"iDisplayLength": 10,//Por cada 10 registros hace una paginación
			    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
			    "bAutoWidth": false,

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

	},

	});
});

/////////////////////////////

$(document).on("click",".cat_b", function(){

var id_empresas=$(this).attr("id");
$('#listar_categoria_b').modal('show');
tabla_categoria_a= $('#categoria_b_data').DataTable({

	       "aProcessing": true,//Activamos el procesamiento del datatables
	       "aServerSide": true,//Paginación y filtrado realizados por el servidor
	       "scrollX": true,
	       //'fixedHeader': true,
	      // colReorder: true,
	      dom: 'Bfrtip',//Definimos los elementos del control de tabla
	      buttons: [		          
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
		  ],

	         "ajax":{
	            url:"../ajax/empresa.php?op=listar_pacientes_cat_b",
                type : "post",
				//dataType : "json",
				data:{id_empresas:id_empresas},						
				error: function(e){
					console.log(e.responseText);
				}
			},

    drawCallback: function () {
        var creditos = $('#categoria_b_data').DataTable().column(14).data().sum();
        $('#total_aro').html('$'+creditos.toFixed(2));
        //var monto_saldo = $('#creditos_empresarial').DataTable().column(4).data().sum();
        //$('#monto_saldo').html('$'+monto_saldo.toFixed(2));
       // var monto_cuota = $('#creditos_empresarial').DataTable().column(5).data().sum();
        //$('#monto_cuota').html('$'+monto_cuota.toFixed(2));
        /*var monto_abonado = $('#creditos_empresarial').DataTable().column(6).data().sum();
        $('#monto_abonado').html('$'+monto_abonado.toFixed(2));*/
      },
	          


	            "bDestroy": true,
				"responsive": true,
				"bInfo":true,
				"iDisplayLength": 10,//Por cada 10 registros hace una paginación
			    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
			    "bAutoWidth": false,

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

	},

	});
});

///////////////////////////Categoria B
$(document).on("click",".cat_b", function(){
var id_empresas=$(this).attr("id");
$('#listar_categoria_b').modal('show');
tabla_categoria_a= $('#categoria_b_data').DataTable({

	       "aProcessing": true,//Activamos el procesamiento del datatables
	       "aServerSide": true,//Paginación y filtrado realizados por el servidor
	       "scrollX": true,
	       //'fixedHeader': true,
	      // colReorder: true,
	      dom: 'Bfrtip',//Definimos los elementos del control de tabla
	      buttons: [		          
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
		  ],

	         "ajax":{
	            url:"../ajax/empresa.php?op=listar_pacientes_cat_b",
                type : "post",
				//dataType : "json",
				data:{id_empresas:id_empresas},						
				error: function(e){
					console.log(e.responseText);
				}
			},

    drawCallback: function () {
        var creditos = $('#categoria_a_data').DataTable().column(14).data().sum();
        $('#total_aro').html('$'+creditos.toFixed(2));
        //var monto_saldo = $('#creditos_empresarial').DataTable().column(4).data().sum();
        //$('#monto_saldo').html('$'+monto_saldo.toFixed(2));
       // var monto_cuota = $('#creditos_empresarial').DataTable().column(5).data().sum();
        //$('#monto_cuota').html('$'+monto_cuota.toFixed(2));
        /*var monto_abonado = $('#creditos_empresarial').DataTable().column(6).data().sum();
        $('#monto_abonado').html('$'+monto_abonado.toFixed(2));*/
      },
	          


	            "bDestroy": true,
				"responsive": true,
				"bInfo":true,
				"iDisplayLength": 10,//Por cada 10 registros hace una paginación
			    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
			    "bAutoWidth": false,

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

	},

	});
});

////////////////////CATEGORIA C
$(document).on("click",".cat_c", function(){
var id_empresas=$(this).attr("id");
$('#listar_categoria_c').modal('show');
tabla_categoria_a= $('#categoria_c_data').DataTable({

	       "aProcessing": true,//Activamos el procesamiento del datatables
	       "aServerSide": true,//Paginación y filtrado realizados por el servidor
	       "scrollX": true,
	       //'fixedHeader': true,
	      // colReorder: true,
	      dom: 'Bfrtip',//Definimos los elementos del control de tabla
	      buttons: [		          
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
		  ],

	         "ajax":{
	            url:"../ajax/empresa.php?op=listar_pacientes_cat_c",
                type : "post",
				//dataType : "json",
				data:{id_empresas:id_empresas},						
				error: function(e){
					console.log(e.responseText);
				}
			},

    drawCallback: function () {
        var creditos = $('#categoria_c_data').DataTable().column(14).data().sum();
        $('#total_aro').html('$'+creditos.toFixed(2));
        //var monto_saldo = $('#creditos_empresarial').DataTable().column(4).data().sum();
        //$('#monto_saldo').html('$'+monto_saldo.toFixed(2));
       // var monto_cuota = $('#creditos_empresarial').DataTable().column(5).data().sum();
        //$('#monto_cuota').html('$'+monto_cuota.toFixed(2));
        /*var monto_abonado = $('#creditos_empresarial').DataTable().column(6).data().sum();
        $('#monto_abonado').html('$'+monto_abonado.toFixed(2));*/
      },
	          


	            "bDestroy": true,
				"responsive": true,
				"bInfo":true,
				"iDisplayLength": 10,//Por cada 10 registros hace una paginación
			    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
			    "bAutoWidth": false,

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

	},

	});
});
init();