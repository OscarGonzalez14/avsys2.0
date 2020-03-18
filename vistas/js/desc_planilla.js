function init(){

}
$(document).on('click', '.num_ord_correlativo', function(){

  $.ajax({
      url:"../ajax/empresarial.php?op=get_numero_mumero_order",
      method:"POST",
      // data:{sucursal_correlativo:sucursal_correlativo},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#num_order_descuento").val(data.num_order);         
      }
    })
});

function registra_orden_descuento(){

var numero_venta=$("#venta_numero_ord").val();
var numero_orden=$("#num_order_descuento").val();
var fecha_creacion=$("#date").val();
var aro=$("#detalle_aro_ord").val();
var photo=$("#photo_ord").val();
var arnti=$("#ar_ord").val();
var lente=$("#lente_ord").val();
var referencia_uno=$("#ref_uno").val();
var tel_ref_uno=$("#tel_ref_uno").val();
var referencia_dos=$("#ref_dos").val();
var tel_ref_dos=$("#tel_ref_dos").val();
var id_usuario=$("#id_user").val();
var id_paciente=$("#id_paciente").val();
var fin_orden = $("#hasta_ord").val();
var id_aro = $("#codigo_de_aro").val();

if(numero_orden != "" ){
    $.ajax({
    url:"../ajax/empresarial.php?op=guardar_orden_desc",
    method:"POST",
    data:{numero_venta:numero_venta,numero_orden:numero_orden,fecha_creacion:fecha_creacion,aro:aro,photo:photo,arnti:arnti,lente:lente,referencia_uno:referencia_uno,tel_ref_uno:tel_ref_uno,referencia_dos:referencia_dos,tel_ref_dos:tel_ref_dos,id_usuario:id_usuario,id_paciente:id_paciente,fin_orden:fin_orden,id_aro:id_aro},
    cache: false,
    dataType:"html",
    error:function(x,y,z){
      d_pacole.log(x);
      console.log(y);
      console.log(z);
    },        
      
  success:function(data){
  setTimeout ("bootbox.alert('Se ha Registrado la orden con exito');", 100);
  //refresca la pagina, se llama a la funtion explode
  //setTimeout ("explode();", 2000);          
}

  }); 

  }else{
    bootbox.alert("Debe llenar todos los campos!!");
    return false;
  } //cierre del condicional de validacion de los campos del paciente
  
    
}

$(document).ready(hidden_btn_imprimir);
  function hidden_btn_imprimir(){
  document.getElementById("n_orden_desc_current").style.display = "none";
}

$(document).on('click', '#btn_enviar_ord_desc', function(){
    
    var num_de_orden = $("#num_order_descuento").val();
    var id_paciente = $("#id_paciente").val();
    if(num_de_orden !=""){
    document.getElementById("n_orden_desc_current").href = 'imprimir_orden_desc.php?numero_orden_pac='+num_de_orden+'&'+'numero_paciente='+id_paciente;
    mostrar_btn_orden_desc();
    }else{
    	alert("Hay campos incompletos");
    	return false;
    }
  });

function listar()
{
	tabla=$('#').dataTable(
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
					url: '../ajax/empresarial.php?op=listar_ordenes_descuento',
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

function mostrar_btn_orden_desc(){
  document.getElementById("n_orden_desc_current").style.display = "block";
}
init();