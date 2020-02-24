var tabla_recibos_print;

function init(){
	listar_recibos_print();
}

function listar_recibos_print()
{
	tabla_recibos_print=$('#recibos_data').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	   
		"ajax":
				{
					url: '../ajax/recibos.php?op=listar_recibos_print',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 15,//Por cada 10 registros hace una paginación
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
    
    

    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario
if(monto != "" ){
    $.ajax({
    url:"../ajax/recibos.php?op=registrar_abono_inicial",
    method:"POST",
    data:{num_recibo:num_recibo,num_venta:num_venta, monto:monto, sucursal: sucursal,id_paciente:id_paciente,id_usuario:id_usuario,hora:hora,telefono:telefono,paciente:paciente,empresa:empresa,cant_letras:cant_letras,abono_ant:abono_ant,abono_act:abono_act,saldo:saldo,forma_pago:forma_pago,marca_aro:marca_aro,modelo_aro:modelo_aro,color_aro:color_aro,lente:lente,tipo_ar:tipo_ar,photo:photo,observaciones:observaciones,asesor:asesor,prox_abono:prox_abono},
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
  $('#valida_rec').html(data);
  setTimeout ("bootbox.alert('Se ha Realizado el Abono con exito');", 100);
  //refresca la pagina, se llama a la funtion explode
  //setTimeout ("explode();", 2000);
  $('#detalle_abonos').modal('hide');
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

