
 var tabla;

 var tabla_en_compras;

 var tabla_en_ventas;
 var tabla_lentes_ventas;
 var tabla_acc_ventas;
 var tabla_ar_ventas;
 var tabla_photo_ventas;
  var tabla_existencias;
 //Función que se ejecuta al inicio
function init(){
	
	listar();

	 //llama la lista de productos en ventana modal en compras.php
	listar_en_compras();
    listar_existencias();

	//llama la lista de productos en ventana modal en ventas.php
	//listar_en_ventas();
	listar_lentes_en_ventas();
	listar_acc_en_ventas();
	listar_ar_en_ventas()
	listar_photo_en_ventas()
	 //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#producto_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})
    
    //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){

		   
		    /*habilita los campos categoria, producto, moneda ya que si se 
            editaba uno que tenia registro asociado entonces al crear un nuevo registro aparecian los campos deshabilitados*/
			 $("#categoria").attr('disabled', false);
			 $("#producto").attr('disabled', false);
			 $("#moneda").attr('disabled', false);
			
			
			$(".modal-title").text("Agregar Aros");
		
	  });

	
}


//Función limpiar
/*IMPORTANTE: no limpiar el campo oculto del id_usuario, sino no se registra
la categoria*/
function limpiar()
{
	
	
    $("#id_producto").val("");
	//$("#id_usuario").val("");
    $("#marca").val("");
	$('#modelo').val("");
    $('#color').val("");
    $('#medidas').val("");
    $('#precio_venta').val("");
    $('#stock').val("");

	
}

//Función Listar
function listar()
{
	tabla=$('#producto_data').dataTable(
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
					url: '../ajax/producto.php?op=listar',
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

 //Mostrar datos del producto en la ventana modal 
function mostrar(id_producto)
{
	$.post("../ajax/producto.php?op=mostrar",{id_producto : id_producto}, function(data, status)
	{
		data = JSON.parse(data);




		    	    $('#productoModal').modal('show');
					$('#modelo').val(data.modelo);

					//$('#marca').attr('disabled', false);

					$("#precio_venta").attr('disabled', false);


					$('#marca').val(data.marca);

					
					$('#medidas').val(data.medidas);

				    $("#moneda").attr('disabled', false);

	                
					$('#precio_venta').val(data.precio_venta);
					$('#stock').val(data.stock);
					$('#color').val(data.color);
					
					$('.modal-title').text("Editar Producto");
					$('#id_producto').val(id_producto);
					
					$('#resultados_ajax').html(data);
					$("#producto_data").DataTable().ajax.reload();



		    
				
				
				
				
		});
        
        
	}


	//la funcion guardaryeditar(e); se llama cuando se da click al boton submit
function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	var formData = new FormData($("#producto_form")[0]);


		$.ajax({
			url: "../ajax/producto.php?op=guardaryeditar",
		    type: "POST",
		    data: formData,
		    contentType: false,
		    processData: false,

		    success: function(datos)
		    {                    
		
		         console.log(datos);

	            $('#producto_form')[0].reset();
				$('#productoModal').modal('hide');

				$('#resultados_ajax').html(datos);
				$('#producto_data').DataTable().ajax.reload();
				
                limpiar();
					
		    }

		});
       
}

function listar_en_compras(){

	tabla_en_compras=$('#lista_productos_data').dataTable(
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
					url: '../ajax/producto.php?op=listar_en_compras',
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
    
    //este es un arreglo vacio
	var detalles = [];

	
	 function agregarDetalle(id_producto){

	 	//alert(estado);

		        $.ajax({
					url:"../ajax/producto.php?op=buscar_producto",
					 method:"POST",

					data:{id_producto:id_producto},
					cache: false,
					dataType:"json",

					success:function(data){
                     
						var obj = {
							cantidad : 1,
							codProd  : id_producto,
							modelo   : data.modelo,
							marca    : data.marca,
							color    : data.color,
							stock    : data.stock,
														
						};
		                
   
						detalles.push(obj);
						listarDetalles();

						$('#lista_productosModal').modal("hide");

                      // }//if validacion id_producto

                       
						
					}//fin success		

				});//fin de ajax
			
		    
		  }// fin de funcion

  
//***********************************************************************

 /*El lenght 
	sirve para calcular la longitud del arreglo o el 
	numero de objetos que tiene el arreglo, que es lo mismo Y es por eso que 
	lo necesito en el for*/



  function listarDetalles(){

  	  
  	$('#listProdCompras').html('');

  

  	var filas = ""; 	

      

  	for(var i=0; i<detalles.length; i++){

  	

	 var filas = filas + "<tr><td>"+(i+1)+"</td> <td name='modelo[]'>"+detalles[i].modelo+"</td> <td name='marca[]'>" +detalles[i].marca+"</td> <td name='color[]'>" +detalles[i].color+"</td><td>"+detalles[i].stock+"</td><td><input type='number' class='cantidad input-group-sm' name='cantidad[]' id='cantidad[]' onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidad(event, this, "+(i)+");' value='"+detalles[i].cantidad+"'></td> <td>  <button href='#' class='btn btn-danger btn-lg deleteDep' role='button' aria-pressed='true'><span class='glyphicon glyphicon-trash'></span> </button></td> </tr>";

	}

	
	$('#listProdCompras').html(filas);

	
      
  }


  function setCantidad(event, obj, idx){
  	event.preventDefault();
  	detalles[idx].cantidad = parseInt(obj.value);
  	recalcular(idx);
  }




  //*******************************************************************
    /*IMPORTANTE:Event es el objeto del evento que los manejadores de eventos utilizan
parseInt es una función para convertir un valor string a entero
obj.value es el valor del campo de texto*/
function  eliminaProd(event, idx){
  	event.preventDefault();
  	console.log('ELIMINAR Eyter');
  	detalles[idx].estado = 0;
  	$("#cantidad_"+idx).val(1);

  		listarDetalles();
  	}

 //********************************************************************


 function registrarCompra(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var numero_compra = $("#numero_compra").val();
    var bodega = $("#bodega").val();

    var comprador = $("#comprador").html();  
    var id_usuario = $("#id_usuario").val(); 
    
    if(detalles!="" && bodega !=""){  

    console.log('Proof');   
    $.ajax({
		url:"../ajax/producto.php?op=registrar_compra",
		method:"POST",
		data:{'arrayCompra':JSON.stringify(detalles), 'numero_compra':numero_compra,'comprador':comprador,'id_usuario':id_usuario,'bodega':bodega},
		cache: false,		
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},
         
		success:function(data){

			console.log(data);
                         
            detalles = [];
            $('#listProdCompras').html('');



          setTimeout ("bootbox.alert('Se ha registrado el movimento con éxito');", 100); 
          
 
          setTimeout ("explode();", 2000); 

         	
		}


	});	

	 //cierre del condicional de validacion de los campos del producto,proveedor,pago

	 } else{

	 	 bootbox.alert("Debe agregar al menos un item y una sucursal");
	 	 return false;
	 } 	
	
  }


  //*****************************************************************************
 /*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA COMPRA*/
       function explode(){

	    location.reload();
}


/********VENTAS***********************************************/

function listar_lentes_en_ventas(){

	tabla_lentes_ventas=$('#lista_lentes_ventas_data').dataTable(
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
					url: '../ajax/producto.php?op=listar_lentes_en_ventas',
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

function listar_ar_en_ventas(){

	tabla_ar_ventas=$('#lista_ar_ventas_data').dataTable(
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
					url: '../ajax/producto.php?op=listar_ar_en_ventas',
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


function listar_acc_en_ventas(){

	tabla_acc_ventas=$('#lista_acc_ventas_data').dataTable(
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
					url: '../ajax/producto.php?op=listar_acc_en_ventas',
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


function listar_photo_en_ventas(){

	tabla_photo_ventas=$('#lista_photo_ventas_data').dataTable(
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
					url: '../ajax/producto.php?op=listar_photo_en_ventas',
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

var detalles = [];

function agregarDetalleVenta_lente(id_producto){
		       $.ajax({
				url:"../ajax/producto.php?op=buscar_producto_lente_venta",
				method:"POST",

				data:{id_producto:id_producto},
				cache: false,
				dataType:"json",

				success:function(data){                     
        
					var obj = {
						cantidad : 1,
						codProd  : id_producto,
						modelo   : data.modelo,	
						marca    : data.marca,
						color    : data.color,				
						medidas	 : data.medidas,						
						precio_venta   : data.precio_venta,
						stock    : data.stock,
						importe  : 0,
						dscto    : 0,
						moneda   : '$'
							
					};

					detalles.push(obj);
					listarDetallesVentas();						
					$('#lista_lentes_ventas_Modal').modal("hide"); 
        
                   						
					}//fin success		

				});//fin de ajax		
		    
		  }
function agregarDetalleVenta_ar(id_producto){
		       $.ajax({
				url:"../ajax/producto.php?op=buscar_ars_en_venta",
				method:"POST",

				data:{id_producto:id_producto},
				cache: false,
				dataType:"json",

				success:function(data){                     
        
					var obj = {
						cantidad : 1,
						codProd  : id_producto,
						modelo   : data.modelo,	
						marca    : data.marca,
						color    : data.color,				
						medidas	 : data.medidas,						
						precio_venta   : data.precio_venta,
						stock    : data.stock,
						importe  : 0,
						dscto    : 0,
						moneda   : '$'
							
					};

					detalles.push(obj);
					listarDetallesVentas();						
					$('#lista_ar_ventas_Modal').modal("hide"); 
        
                   						
					}//fin success		

				});//fin de ajax		
		    
		  }
		  
function agregarphotosDetalleVenta(id_producto){
		       $.ajax({
				url:"../ajax/producto.php?op=buscar_photos_para_venta",
				method:"POST",

				data:{id_producto:id_producto},
				cache: false,
				dataType:"json",

				success:function(data){                     
        
					var obj = {
						cantidad : 1,
						codProd  : id_producto,
						modelo   : data.modelo,	
						marca    : data.marca,
						color    : data.color,				
						medidas	 : data.medidas,						
						precio_venta   : data.precio_venta,
						stock    : data.stock,
						importe  : 0,
						dscto    : 0,
						moneda   : '$'
							
					};

					detalles.push(obj);
					listarDetallesVentas();						
					$('#lista_photo_ventas_Modal').modal("hide");         

        
                   						
					}//fin success		

				});//fin de ajax		
		    
		  }		  
	
function agregarDetalleVenta(id_producto,id_ingreso){
		       $.ajax({
				url:"../ajax/producto.php?op=buscar_producto_en_venta",
				method:"POST",

				data:{id_producto:id_producto,id_ingreso:id_ingreso},
				cache: false,
				dataType:"json",

				success:function(data){
                       
        
					var obj = {
						cantidad : 1,
						id_ingreso : id_ingreso,
						codProd  : id_producto,
						modelo   : data.modelo,	
						marca    : data.marca,
						color    : data.color,				
						medidas	 : data.medidas,						
						precio_venta   : data.precio_venta,
						stock    : data.stock,
						categoriaub    : data.categoriaub,
						importe  : 0,
						dscto    : 0,
						moneda   : '$'
							
					};

					detalles.push(obj);

						listarDetallesVentas();

						$('#lista_productos_ventas_Modal').modal("hide");
						$('#lista_lentes_ventas_Modal').modal("hide"); 
						$('#lista_acc_ventas_Modal').modal("hide");
						$('#lista_ar_ventas_Modal').modal("hide");
						$('#lista_photo_ventas_Modal').modal("hide");         
                   						
					}//fin success		

				});//fin de ajax		
		    
		  }// fin de funcion




//***********************************************************************


  function listarDetallesVentas(){

  	$('#listProdVentas').html('');

  	var filas = "";  	
  	var subtotal = 0;
  	var total = 0;
    var subtotalFinal = 0;
  	var totalFinal = 0;

  	for(var i=0; i<detalles.length; i++){	

	var importe = detalles[i].importe = detalles[i].cantidad * detalles[i].precio_venta;
	//importe = detalles[i].importe = detalles[i].importe - (detalles[i].dscto);
    importe = detalles[i].importe = detalles[i].importe - (detalles[i].dscto/100);
	var filas = filas + "<tr><td>"+(i+1)+"</td></td><td> <input type='number' max='20' class='cantidad' name='cantidad[]' id=cantidad_"+i+" onClick='setCantidad(event, this, "+(i)+");' onKeyUp='setCantidadAjax(event, this, "+(i)+");' value='"+detalles[i].cantidad+"'> </td>  <td name='descripcion[]' id='descripcion[]'>"+detalles[i].marca+" "+detalles[i].modelo+"<td><input type='number' name='descuento[]' id='descuento' onClick='setDescuento(event, this, "+(i)+");' onKeyUp='setDescuento(event, this, "+(i)+");' value='"+detalles[i].dscto+"'></td><td name='precio_venta[]'>"+detalles[i].moneda+" "+detalles[i].precio_venta+"</td> <td> <span name='importe[]' id=importe"+i+">"+detalles[i].moneda+" "+detalles[i].importe+"</span><td><input type='text' id='ubicacion[]' value='"+detalles[i].categoriaub+"'></td> </td></tr>";
	
    subtotal = subtotal + importe;

    subtotalFinal = subtotal.toFixed(2 );

			var su = subtotal;
			su=su.toFixed(2);
            var or=parseFloat(su);
            var total= Math.round(or+subtotal);

    totalFinal =total;

      
}//cierre for

	
	$('#listProdVentas').html(filas);

	//subtotal
	$('#subtotal').html(subtotalFinal);
	$('#subtotal_venta').html(subtotalFinal);

	//total
	$('#total').html(totalFinal);
	$('#total_venta').html(totalFinal);



  }//fin listar detalle_ventas

  /*IMPORTANTE:Event es el objeto del evento que los manejadores de eventos utilizan
parseInt es una función para convertir un valor string a entero
obj.value es el valor del campo de texto*/
  function setCantidad(event, obj, idx){
  	event.preventDefault();
  	detalles[idx].cantidad = parseInt(obj.value);
  	recalcular(idx);
  }

  function setCantidadAjax(event, obj, idx){
  	event.preventDefault();
  	//detalles[idx].cantidad = parseInt(obj.value);

  	//var idx = idx;

  	var id_producto = detalles[idx].codProd;

  	var cantidad_vender = detalles[idx].cantidad = parseInt(obj.value);

    var stock = detalles[idx].stock;

      //alert(idx);
      //alert(cantidad_vender);
      //alert(id_producto);
      //alert(stock);
  	
       $.ajax({
         
         url:"../ajax/ventas.php?op=consulta_cantidad_venta",
         method:"POST",
         data:{id_producto:id_producto, cantidad_vender:cantidad_vender},
         dataType:"json",

         success:function(data){

         	
             //$("#cantidad_"+idx).val(data);


             //console.log(data);


            
              $("#resultados_ventas_ajax").html(data);

                //se pone isNaN porque al ser vacio indica que no es un numero, entonces si valida que es cierto entonces se desabilita el boton del envio del formulario y de agregar productos
                /*si la cantidad a vender es igual a cero o a vacio o si es mayor al stock entonces se desabilita el boton de enviar formulario y de agregar productos*/
	             if(cantidad_vender=="0" || isNaN(cantidad_vender)==true || cantidad_vender>stock){
	             
	            
	             //si la cantidad es mayor al stock el borde se pone en rojo
	             $("#cantidad_"+idx).addClass("rojo");

	             //bloquea el boton "agregar producto"
	             $(".btn_producto").removeAttr("data-target");

	               //oculta el boton "enviar formulario"

	                 $("#btn_enviar").addClass("oculta_boton");

	                
                     // $("div[id=resultados_ajax]").remove();
                     

	              } else {
                     
                     //despues de eliminar agrega el id del mensaje de ajax, ya que se habia removido el mensaje "campo vacio" en la funcion eliminar
	              	 //$("#resultados_ajax").attr("id");
                       
                     // si la cantidad seleccionada es menor al stock entonces remueve la clase rojo
	              	 $("#cantidad_"+idx).removeClass("rojo");


	              	 //Desbloquea el boton "agregar producto"
	                 $(".btn_producto").attr({"data-target":"#lista_productos_ventas_Modal"});

	              
                      //aparece el boton "enviar formulario"

	                 $("#btn_enviar").removeClass("oculta_boton");
	              }
         }

       })


  	recalcular(idx);
  }

  function setDescuento(event, obj, idx){
  	event.preventDefault();
  	var desc = document.getElementById("descuento").value;
  	var desc_n = parseInt(desc);
  	 if(desc_n>20){
  	 	alert("Descuento No autorizado");
  	 	document.getElementById("descuento").value="";
  	 }else{	
  	detalles[idx].dscto = parseFloat(obj.value);
  	recalcular(idx);
  }
}
  	
  function recalcular(idx){

  	console.log(detalles[idx].cantidad);
  	console.log((detalles[idx].cantidad * detalles[idx].precio_venta));

    var importe =detalles[idx].importe = detalles[idx].cantidad * detalles[idx].precio_venta;
//	importe = detalles[idx].importe = detalles[idx].importe - (detalles[idx].dscto);
importe = detalles[idx].importe = detalles[idx].importe - (detalles[idx].importe* detalles[idx].dscto/100);
	
 	importeFinal = detalles[idx].moneda+" "+importe;	    
    $('#importe'+idx).html(importeFinal);

 
	calcularTotales();

	  
  }


 function calcularTotales(){
  	
  	var subtotal = 0;

  	var total = 0;

    var subtotalFinal = 0;

  	var totalFinal = 0;

for(var i=0; i<detalles.length; i++){

//subtotal = subtotal + (detalles[i].cantidad * detalles[i].precio_venta) - (detalles[i].dscto);
subtotal = subtotal + (detalles[i].cantidad * detalles[i].precio_venta) - (detalles[i].cantidad*detalles[i].precio_venta*detalles[i].dscto/100);
          subtotalFinal = subtotal;

          var su = subtotal;
          sub=su.toFixed(2);
          var or=parseFloat(sub);
          var total = Math.round(or+subtotal);

          //concatenar para poner la moneda con el total
          totalFinal = detalles[i].moneda+" "+total;
		
	}

	//subtotal
	$('#subtotal').html(subtotalFinal);
	$('#subtotal_venta').html(subtotalFinal);

	//total
	$('#total').html(totalFinal);
	$('#total_venta').html(totalFinal);
  }



  //*******************************************************************
    /*IMPORTANTE:Event es el objeto del evento que los manejadores de eventos utilizan
parseInt es una función para convertir un valor string a entero
obj.value es el valor del campo de texto*/

  	function  eliminarProd(event, idx){
  		event.preventDefault();
  		console.log('ELIMINAR Eyter');
  		detalles[idx].estado = 0;


  	    $("#cantidad_"+idx).val(1);

  		listarDetallesVentas();
  	}



 //********************************************************************
 
$(document).on('click', '.ventas_record', function(){
    //toma el valor del id
    
    $.ajax({
      url:"../ajax/ventas.php?op=get_correlativo_venta",
      method:"GET",
      //data:{sucursal:sucursal},
      cache:false,
      dataType:"json",
      success:function(data)
      {       
        $("#numero_venta").val(data.correlativo);
      }
    })
    //setTimeout("registrarVenta();", 1000); 
  });


 function registrarVenta(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var numero_venta = $("#numero_venta").val();
    var cod_pac = $("#cod_pac").val();
    var nombre_pac = $("#nombre_pac").val();
    var tipo_pago = $("#tipo_pago").val();
    var subtotal = $("#subtotal").html();
    var usuario = $("#usuario").val();
    var tipo_venta = $("#tipo_venta").val();
    var sucursal = $("#sucursal").val();
    var id_usuario = $("#id_user").val();
    var id_paciente = $("#id_paciente").val();
    var plazo = $("#plazo").val();
    var descripcion = $("#descripcion").val();
    var importe = $("#importe").val();


    //validamos, si los campos(paciente) estan vacios entonces no se envia el formulario

if(tipo_pago != "Descuento en Planilla"){

    if(nombre_pac!="" && sucursal!="" && tipo_venta!="" && plazo !='0'){

    $("#descuento").attr('disabled', 'disabled');
     console.log('error!');

    $.ajax({
		url:"../ajax/producto.php?op=registrar_venta",
		method:"POST",
		data:{'arrayVenta':JSON.stringify(detalles), 'numero_venta':numero_venta,'nombre_pac':nombre_pac, 'tipo_pago':tipo_pago,'subtotal':subtotal,'tipo_venta':tipo_venta,'usuario':usuario,'sucursal':sucursal,'id_usuario':id_usuario,'id_paciente':id_paciente,'plazo':plazo,'descripcion':descripcion,'importe':importe},
		cache: false,
		dataType:"html",
		error:function(x,y,z){
			d_pacole.log(x);
			console.log(y);
			console.log(z);
		},    
      
			
		success:function(data){

	    var nombre_pac = $("#nombre_pac").val("");

            
            detalles = [];
            $('#listProdVentas').html('');
            
              //muestra un mensaje de exito
          //setTimeout ("bootbox.alert('Se ha registrado la venta con éxito');", 100); 
        //Se carga la modal de abono inicial  
        setTimeout ("recibo_uno();", 2000); 
         	
		}

	});	

	 //cierre del condicional de validacion de los campos del paciente

	 } else{

	 	 bootbox.alert("Debe llenar todos los campos");
	 	 return false;
	 }
	 }else{
	 	//
	if(nombre_pac!="" && sucursal!="" && tipo_venta!="" && plazo !='0'){

    $("#descuento").attr('disabled', 'disabled');
     console.log('error!');

    $.ajax({
		url:"../ajax/producto.php?op=registrar_venta",
		method:"POST",
		data:{'arrayVenta':JSON.stringify(detalles), 'numero_venta':numero_venta,'nombre_pac':nombre_pac, 'tipo_pago':tipo_pago,'subtotal':subtotal,'tipo_venta':tipo_venta,'usuario':usuario,'sucursal':sucursal,'id_usuario':id_usuario,'id_paciente':id_paciente,'plazo':plazo,'descripcion':descripcion,'importe':importe},
		cache: false,
		dataType:"html",
		error:function(x,y,z){
			d_pacole.log(x);
			console.log(y);
			console.log(z);
		},    
      
			
		success:function(data){

	    var nombre_pac = $("#nombre_pac").val("");

            
            detalles = [];
            $('#listProdVentas').html('');
            
              //muestra un mensaje de exito
          //setTimeout ("bootbox.alert('Se ha registrado la venta con éxito');", 100); 
        //Se carga la modal de abono inicial  
       // setTimeout ("load_modal_orden_descuento();", 2000); 
       setTimeout ("comprueba_orden();", 1000); 
         	
		}

	}); 
	 } 	
	
  }

  }

  //*****************************************************************************
   /*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA VENTA*/
       function explode(){

	    location.reload();
}
function recibo_uno(){
//document.getElementById('search_pac').style.display = 'none';
//document.getElementById('btn_enviar').style.display = 'none';
$('#detalle_abonos').modal("show");

var sucursal = document.getElementById('sucursal').value;

    $.ajax({
      url:"../ajax/recibos.php?op=get_numero_recibo",
      method:"POST",
      data:{sucursal:sucursal},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#num_recibo").val(data.numero_rec);

      }
    });

    recibo_uno_datos_pac();
 }

function recibo_uno_datos_pac(){
//$('#detalle_abonos').modal("show");
var sucursal = document.getElementById('sucursal').value;

    $.ajax({
      url:"../ajax/recibos.php?op=get_datos_recibo_inicial",
      method:"POST",
      data:{sucursal:sucursal},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#num_venta_rec_ini").val(data.numero_venta);
        $("#monto").val(data.subtotal);
        $("#telefono").val(data.telefono);
        $("#nombres_ini").val(data.nombres);
        $("#id_paciente_ini").val(data.id_paciente);


      }
    });
    get_datos_aros_recibo_inicial()
 }



function get_datos_aros_recibo_inicial(){

var numero_venta = document.getElementById('numero_venta').value;
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
 }
 /////////////////COMPROBAR SI EXISTE CREDITO EMPRESARIAL
 function comprueba_orden(){

 	var id_paciente = $("#id_paciente").val();
      
		$.ajax({
			url:"../ajax/empresarial.php?op=buscar_orden",
			method:"POST",
			data:{id_paciente:id_paciente},
			dataType:"json",
			success:function(data)
			{
				//console.log(data.numero_orden != null && data.numero != '');
				//var hola = data.numero_orden;
				if(data.paciente_id){						
					get_datos_ultima_orden_paciente();                     
				}else{
					//load_modal_orden_descuento();
					setTimeout ("load_modal_orden_descuento();", 2000); 
				}
			}
		})
	
    }
///////////////////////-------------------------------*********
function get_datos_ultima_orden_paciente(){
	var id_paciente = $("#id_paciente").val();
    $("#modal_sumar_orden").modal("show");  
		$.ajax({
			url:"../ajax/empresarial.php?op=buscar_ultima_orden_pacientes",
			method:"POST",
			data:{id_paciente:id_paciente},
			dataType:"json",
			success:function(data)
			{
				$("#orden_anterior").val(data.num_order);
			}
		})
}

function modal_unir_ordenes(){
	$("#modal_add_desc_planilla").modal("show");  
	var id_paciente = $("#id_paciente").val();
	var numero_orden = $("#orden_anterior").val();
	document.getElementById("numero_orden_ad").value=numero_orden;
    
	/*	$.ajax({
			url:"../ajax/empresarial.php?op=buscar_ultima_orden_pacientes",
			method:"POST",
			data:{id_paciente:id_paciente},
			dataType:"json",
			success:function(data)
			{
				$("#orden_anterior").val(data.num_order);
			}
		})*/
}

///////////////////*****************funcion cargar desc planilla
///////////////////*****************funcion cargar desc planilla
function load_modal_orden_descuento(){

$('#orden_descuento_empresarial').modal("show");
var id_paciente = document.getElementById('id_paciente').value;
var venta_numero = document.getElementById('numero_venta').value;


    $.ajax({
      url:"../ajax/empresarial.php?op=get_datos_orden_descuento",
      method:"POST",
      data:{id_paciente:id_paciente,venta_numero:venta_numero},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#paciente_ord").val(data.nombres);
        $("#ocupacion_ord").val(data.ocupacion);
        $("#empresa_ord").val(data.nombre);
        $("#edad_ord").val(data.edad);
        $("#tel_ord").val(data.telefono);
        $("#monto_ord").val(data.subtotal);
        $("#cuotas_ord").val(data.cuotas);
        $("#venta_numero_ord").val(data.numero_venta);
        $("#cuotas_ord").val(data.cuotas);
        $("#correo_ord").val(data.correo);
      }
    });

    $.ajax({
      url:"../ajax/empresarial.php?op=get_datos_aro_orden_desc",
      method:"POST",
      data:{id_paciente:id_paciente,venta_numero:venta_numero},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#detalle_aro_ord").val(data.detalle_aro);
        $("#codigo_de_aro").val(data.id_producto);
        
      }
    });

    $.ajax({
      url:"../ajax/empresarial.php?op=get_datos_lente_orden_desc",
      method:"POST",
      data:{id_paciente:id_paciente,venta_numero:venta_numero},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#lente_ord").val(data.detalle_lente);
        
      }
    });

    $.ajax({
      url:"../ajax/empresarial.php?op=get_datos_ar_orden_desc",
      method:"POST",
      data:{id_paciente:id_paciente,venta_numero:venta_numero},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#ar_ord").val(data.detalle_ar);
        
      }
    });

    $.ajax({
      url:"../ajax/empresarial.php?op=get_datos_photo_orden_desc",
      method:"POST",
      data:{id_paciente:id_paciente,venta_numero:venta_numero},
      cache:false,
      dataType:"json",
      success:function(data)
      {
        $("#photo_ord").val(data.detalle_photo);
        
      }
    });


}
/////////////////////////////fin get detalle_orden for load
	 function eliminar(id_producto){

   
	    bootbox.confirm("¿Está Seguro de eliminar el producto?", function(result){
		if(result)
		{

				$.ajax({
					url:"../ajax/producto.php?op=eliminar_producto",
					method:"POST",
					data:{id_producto:id_producto},

					success:function(data)
					{
						//alert(data);
						$("#resultados_ajax").html(data);
						$("#producto_data").DataTable().ajax.reload();
					}
				});

		      }

		 });//bootbox


   }
/////////////ENVIOS****************///////////
   //este es un arreglo vacio
	var detallesE = [];

	
	 function agregarDetalleEnvio(id_producto){

	 	//alert(estado);
	 			//var suc_origen = $('#sucursal_origen');
		        $.ajax({
					url:"../ajax/producto.php?op=buscar_producto",
					 method:"POST",

					data:{id_producto:id_producto},
					cache: false,
					dataType:"json",

					success:function(data){
                     
						var obj = {
							cantidad : 1,
							codProd  : id_producto,
							modelo   : data.modelo,
							marca    : data.marca,
							color    : data.color,
							stock    : data.stock,
														
						};
		                
   
						detallesE.push(obj);
						listarDetalleEnvios();

						$('#modalEnvios').modal("hide");

                      // }//if validacion id_producto

                       
						
					}//fin success		

				});//fin de ajax
			
		    
		  }// fin de funcion
		  

function listarDetalleEnvios(){

  	  
  	$('#listProdEnvios').html('');

  

  	var filas = ""; 	

      

  	for(var i=0; i<detallesE.length; i++){

  	

	 var filas = filas + "<tr><td colspan='1'>"+(i+1)+"</td> <td name='modelo[]' colspan='2'>"+detallesE[i].modelo+"</td> <td name='marca[]' colspan='1'>" +detallesE[i].marca+"</td> <td name='color[]' colspan='2'>" +
	 detallesE[i].color+"</td><td colspan='1'><input type='number' class='cantidad input-group-sm' name='cantidad[]' id='cantidad[]' onClick='setCantidad(event, this, "+
	 (i)+");' onKeyUp='setCantidad(event, this, "+(i)+");' value='"+detallesE[i].cantidad+
	 "'></td> </tr>";

	}

	
	$('#listProdEnvios').html(filas);

	
      
  }

  function registrarIngreso(){
    
    /*IMPORTANTE: se declaran las variables ya que se usan en el data, sino da error*/
    var sucursal_origen = $("#sucursal_origen").val();
    var sucursal_destino = $("#sucursal_destino").val();
    var numero_envio = $("#numero_envio").val();

    //var comprador = $("#comprador").html();
  
    var id_usuario = $("#id_usuario").val();
 
	if(sucursal_origen==sucursal_destino){
 		
 		alert("Revise las Sucursales de Origen y Destino");
	 	 return false;
	} 
    	//if(detallesE != "")
    	else{
    

     console.log('Proof');
   
    $.ajax({
		url:"../ajax/envios.php?op=registrar_ingreso",
		method:"POST",
		data:{'arrayIngreso':JSON.stringify(detallesE), 'sucursal_origen':sucursal_origen,'sucursal_destino':sucursal_destino,'id_usuario':id_usuario,'numero_envio':numero_envio},
		cache: false,		
		dataType:"html",
		error:function(x,y,z){
			console.log(x);
			console.log(y);
			console.log(z);
		},
         

		success:function(data){

			console.log(data);
                         
            detalles = [];
            $('#listProdEnvios').html('');



          setTimeout ("bootbox.alert('Se ha registrado el envio con éxito');", 100); 
          
 
          setTimeout ("explode();", 2000); 

         	
		}


	});	

	 //cierre del condicional de validacion de los campos del producto,proveedor,pago

	 }	
	
  }
//Función Listar
function listar_existencias()
{
	tabla_existencias=$('#productos_en_existencia').dataTable(
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
					url: '../ajax/producto.php?op=listar_existencias',
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
 init();












