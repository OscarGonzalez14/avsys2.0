var tabla_creditos;
var tabla_creditos_empresarial;
var tabla_creditos_c_aut;
var tabla_creditos_c_pers;
var tabla_creditos_metro;
var tabla_cobros_pac;

//Función que se ejecuta al inicio
function init(){ 

} 

function lista_creditos_metro()
{
  $('#titulo').html('Pacientes Metrocentro');
  tabla_creditos_metro=$('#creditos_data').dataTable(
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
          url: '../ajax/creditos.php?op=pacientes_metrocentro',
          type : "get",
          dataType : "json",            
          error: function(e){
            console.log(e.responseText);  
          }
        },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 5,//Por cada 10 registros hace una paginación
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


function lista_creditos_empresarial()
{

var id_empresas= $("#cod_emp").val();
//$('#total_order').html(total);
tabla_creditos_empresarial=$('#creditos_empresarial').dataTable(
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
          url: '../ajax/creditos.php?op=pacientes_empresarial',
          type : "post",
          dataType : "json",
          data:{id_empresas:id_empresas},           
          error: function(e){
            console.log(e.responseText);  
          }
        },
        drawCallback: function () {
        var creditos = $('#creditos_empresarial').DataTable().column(3).data().sum();
        $('#monto_creditos').html('$'+creditos.toFixed(2));
        var monto_saldo = $('#creditos_empresarial').DataTable().column(4).data().sum();
        $('#monto_saldo').html('$'+monto_saldo.toFixed(2));
        var monto_cuota = $('#creditos_empresarial').DataTable().column(5).data().sum();
        $('#monto_cuota').html('$'+monto_cuota.toFixed(2));
        /*var monto_abonado = $('#creditos_empresarial').DataTable().column(6).data().sum();
        $('#monto_abonado').html('$'+monto_abonado.toFixed(2));*/
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

function lista_creditos_c_aut()
{

$('#titulo').html('Pacientes Cargo Automatico');
  tabla_creditos_c_aut=$('#creditos_data').dataTable(
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
          url: '../ajax/creditos.php?op=get_pacientes_c_automatico',
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
  

function lista_creditos_personal()
{

 
  $('#titulo').html('Pacientes Crédito Personal');
  tabla_creditos_c_pers=$('#creditos_data').dataTable(
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
          url: '../ajax/creditos.php?op=get_pacientes_c_personal',
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


function calcularc()
{
  saldo_act=document.f1.saldo_act.value;
  abono=document.f1.abono.value;
  saldo_n=parseFloat(saldo_act)-parseFloat(abono);
  document.f1.n_saldo.value=saldo_n;
}

//ESTE EVENO ONCLICK CARGA LOS DATOS GENERALES DEL PACIENTE Y MONTO DEL CREDITO  EN MODAL DE ABONOS
$(document).on('click', '.abonos_p', function(){
  var numero_venta=$(this).attr("id");

  $.ajax({
      url:"../ajax/creditos.php?op=listar_creditos_paciente",
      method:"POST",
      data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        //$("#telefono").html(data.telefono);
        $("#nombres_ini").val(data.nombres);
        $("#num_venta_rec_ini").val(data.numero_venta);
        $("#telefono").val(data.telefono);
        $("#empresa_emp").val(data.nombre);
        $("#monto").val(data.monto);
        $("#saldo_act").val(data.saldo);
        $("#id_paciente_ini").val(data.id_paciente);
        $("#id_emps").val(data.id_empresas);
        $("#vendedor_com").val(data.vendedor);
        $("#opto_com").val(data.optometra);
        $("#forma_pagos").val(data.tipo_pago);
        $("#forma_venta").val(data.tipo_venta);
      
      }
    })

});

//////LISTAR 
$(document).on('click', '.abonos_p', function(){
  var numero_venta=$(this).attr("id");

 $.ajax({
      url:"../ajax/recibos.php?op=get_datos_recibo_aros",
      method:"POST",
      data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#marca_aro").val(data.marca);
        $("#modelo_aro").val(data.modelo);
        $("#color_aro").val(data.color);
      }
    });

});
//////////////////////LISTAR ABONO ANTERIOR
$(document).on('click', '.abonos_p', function(){
  var numero_venta=$(this).attr("id");

 $.ajax({
      url:"../ajax/recibos.php?op=get_abono_anterior",
      method:"POST",
      data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#abono_ant").val(data.abono_anterior);
      }
    });

});
////////////////////LETRA POR CUOTA
$(document).on('click', '.abonos_p', function(){
  var numero_venta=$(this).attr("id");

 $.ajax({
      url:"../ajax/recibos.php?op=get_letra_mensual",
      method:"POST",
      data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#numero").val(data.cuota_mensual);
        $("#saldo").val(data.saldo_actual);
      }
    });

});


$(document).on('click', '.abonos_p', function(){
  var numero_venta=$(this).attr("id");

 $.ajax({
      url:"../ajax/recibos.php?op=get_datos_recibo_lente",
      method:"POST",
      data:{numero_venta:numero_venta},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#dis_lente").val(data.dis_lente);
      }
    });
});

//ESTE EVENTO ONCLICK CARGA EL NUMERO DE RECIBO
$(document).on('click', '.abonos_p', function(){
 var sucursal_correlativo = $("#sucursal").val();
  $.ajax({
      url:"../ajax/recibos.php?op=get_numero_recibo_abonos",
      method:"POST",
       data:{sucursal_correlativo:sucursal_correlativo},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#num_recibo").val(data.num_recibo);         
      }
    })
});

$(document).on('click', '.det_abonos', function(){
    //toma el valor del id
    var id_paciente = $(this).attr("id");
    $('#detalle_abonos_modal').modal('show');
    $.ajax({
      url:"../ajax/creditos.php?op=ver_detalle_abonos",
      method:"POST",
      data:{id_paciente:id_paciente},
      cache:false,
      //dataType:"json",
      success:function(data)
      {       
        
        $("#detalles_abono").html(data);
                 
      }
    })
  });

//////////EVENTO PARA CARGAR DETALLE DE PACIENTE ENN MODAL ABONOS
$(document).on('click', '.det_abonos', function(){
    //toma el valor del id
    var id_paciente = $(this).attr("id");
    $.ajax({
      url:"../ajax/creditos.php?op=ver_detalle_pac_abonos",
      method:"POST",
      data:{id_paciente:id_paciente},
      cache:false,
      dataType:"json",
      success:function(data)
      {       
        $("#numero_venta").val(data.numero_venta);
        $("#fecha_venta").val(data.fecha_venta);
        $("#vendedor").val(data.vendedor);
                
      }
    })
  });


//////////SUMA TOTAL DE CREDITOS  POR EMPRESA
$(document).on('click', '.suma_creditos', function(){
    //toma el valor del id
    var id_empresa_total = $('#cod_emp').val();
    $.ajax({
      url:"../ajax/creditos.php?op=suma_total_creditos",
      method:"POST",
      data:{id_empresa_total:id_empresa_total},
      cache:false,
      dataType:"json",
      success:function(data)
      {       
        $("#tot_creditos").val(data.suma_creditos);
      }
    })
  });
/////////////////SUMA DE ABONOS PARA MES POR EMPRESA

$(document).on('click', '#suma_abonos', function(){
    //toma el valor del id
    var id_empresa_total = $('#cod_emp').val();
    $.ajax({
      url:"../ajax/creditos.php?op=suma_total_abonos",
      method:"POST",
      data:{id_empresa_total:id_empresa_total},
      cache:false,
      dataType:"json",
      success:function(data)
      {       
        $("#tot_recuperado").val(data.suma_abonos);
      }
    })
  });



$(document).on('click', '#empresa', function(){
    
    $('#empresasModal').modal('show');
  });

init();