var tabla_recibos_print;

function init(){
	//listar_recibos_print();
}
//////////////////IMPRIMIR RECIBOS CONTADO
$(document).on("click","#btn_print_recibos_contado", function(){

    var mes_recibo= $("#mes_recibo").val();
    var ano_recibo= $("#ano_recibo").val();
        
	tabla_recibos_contado=$('#recibos_contado_data').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	   	    buttons: [		          
		    { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
        ],
		"ajax":
				{
					url: '../ajax/recibos.php?op=listar_recibos_contado',
					type : "post",
					//dataType : "json",
					data:{mes_recibo:mes_recibo,ano_recibo:ano_recibo},						
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
			 
			   // "sLengthMenu":     "Mostrar _MENU_ registros",
			 
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
  });


/////////////IMPRIMIR RECIBOS EMPRESARIAL
$(document).on("click","#btn_print_recibos_emp", function(){

    var mes_recibo= $("#mes_recibo").val();
    var ano_recibo= $("#ano_recibo").val();
    var empresa_recibo=$("#empresa_recibo").val();
    
	tabla_recibos_print=$('#recibos_empresariales_data').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	   	    buttons: [		          
		    { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true }
        ],
		"ajax":
				{
					url: '../ajax/recibos.php?op=listar_recibos_print',
					type : "post",
					//dataType : "json",
					data:{mes_recibo:mes_recibo,ano_recibo:ano_recibo,empresa_recibo:empresa_recibo},						
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
			 
			   // "sLengthMenu":     "Mostrar _MENU_ registros",
			 
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
  });


 
function registra_abono_inicial(){
    
    var id_usuario = $("#id_usuario_ini").val();
    var id_paciente = $("#id_paciente_ini").val();
    var monto =$("#monto").val();
    var num_recibo=$("#num_recibo").val();
    var num_venta=$("#num_venta_rec_ini").val();
    var sucursal =$("#sucursal").val();
    var hora =$("#hora").val();
    var telefono =$("#telefono").val();
    var paciente =$("#nombres_ini").val();
    var empresa =$("#empresa").val();
    var cant_letras =$("#texto").val();
    var abono_ant =$("#abono_ant").val();
    var abono_act=$("#numero").val();
    var saldo =$("#saldo").val();
    var forma_pago =$("#forma_pago").val();
    var marca_aro =$("#marca_aro").val();
    var modelo_aro =$("#modelo_aro").val();
    
    var color_aro =$("#color_aro").val();
    var lente =$("#dis_lente").val();
    var tipo_ar =$("#tipo_ar").val();
    var photo =$("#photo").val();
    var observaciones =$("#observaciones").val();
    var asesor =$("#usuario").val();
    var prox_abono =$("#datepicker").val();
    var id_empresa=$("#id_emps").val();

    var vendedor_com = $("#vendedor_com").val();
    var opto_com = $("#opto_com").val();
    var user_cobros = $("#user_cobros").val();
    var forma_pagos = $("#forma_pagos").val();
    var forma_venta = $("#forma_venta").val();

    
    

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(monto != "" && forma_pago !="0"){
    $.ajax({
    url:"../ajax/recibos.php?op=registrar_abono_inicial",
    method:"POST",
    data:{num_recibo:num_recibo,num_venta:num_venta, monto:monto, sucursal: sucursal,id_paciente:id_paciente,id_usuario:id_usuario,hora:hora,telefono:telefono,paciente:paciente,empresa:empresa,cant_letras:cant_letras,abono_ant:abono_ant,abono_act:abono_act,saldo:saldo,forma_pago:forma_pago,marca_aro:marca_aro,modelo_aro:modelo_aro,color_aro:color_aro,lente:lente,tipo_ar:tipo_ar,photo:photo,observaciones:observaciones,asesor:asesor,prox_abono:prox_abono,id_empresa:id_empresa,vendedor_com:vendedor_com,opto_com:opto_com,user_cobros:user_cobros,forma_pagos:forma_pagos,forma_venta:forma_venta},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },        
      
  success:function(data){
  var nombre_pac = $("#saldo").val("");
  console.log(data);
   $("#resultados_ajax_recibo").html(data);
  //$('#valida_rec').html(data);
  //setTimeout ("bootbox.alert('Se ha Realizado el Abono con exito');", 100);
  //refresca la pagina, se llama a la funtion explode
  //setTimeout ("explode();", 2000);
  //$('#detalle_abonos').modal('hide');
  $('#productoModal').modal('hide');
 

}

  }); 

  }else{
    bootbox.alert("Debe llenar todos los campos");
    return false;
  } //cierre del condicional de validacion de los campos del paciente
  
    
  }   

  //*****************************************************************************
   /*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA VENTA*/
       function explode(){

      location.reload();
}


init();

