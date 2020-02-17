
<?php 
  require_once("../config/conexion.php");

  class Cotizaciones extends Conectar
  {
  	   public function get_cotizaciones(){

		 $conectar= parent::conexion();
       
         $sql="select * from ventas where id_ventas=31";
         //echo $sql;
         
         $sql=$conectar->prepare($sql);

         $sql->execute();

         return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
		
		}


public function get_detalle_paciente($numero_venta){

		   $conectar=parent::conexion();
           parent::set_names();

		      $sql="select p.nombres,p.telefono,v.numero_venta,v.fecha_venta,v.sucursal,u.usuario from pacientes as p inner join ventas as v on p.id_paciente=v.id_paciente inner join usuarios as u on u.id_usuario=v.id_usuario where v.numero_venta=?
		      ;";

		      //echo $sql; exit();

		      $sql=$conectar->prepare($sql);
          $sql->bindValue(1,$numero_venta);
		      $sql->execute();
		      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		   
            
		}

		public function get_detalle_ventas_paciente($numero_venta){

		   $conectar=parent::conexion();
           parent::set_names();
        $moneda="$";   

		      $sql="select d.cantidad_venta, d.producto,d.precio_venta,d.descuento,v.subtotal,d.importe from  detalle_ventas as d, ventas as v where d.numero_venta=v.numero_venta and d.numero_venta=?
		      
		      ;";

		      //echo $sql; exit();

		      $sql=$conectar->prepare($sql);
              

          $sql->bindValue(1,$numero_venta);
		      $sql->execute();
		      $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		   
              $html= "

              <thead style='background-color:black: color: white'>

                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                   
                                </thead>


                              ";

           

		          foreach($resultado as $row)
				{

			   
$html.="<tr class='filas'>
<td>".$row['cantidad_venta']."</td>
<td>".$row['producto']."</td>
<td>".$moneda." ".$row['precio_venta']."</td> 
<td>".$moneda." ".$row['importe']."</td>
 </tr>";
 
   $subtotal= $row["subtotal"];         
              
}

		 $html .= "<tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                    <p>TOTAL</p>
                                    </th>

                                    <th>

                                    <p><strong>".'$ '.$subtotal."</strong></p>

                                   </th> 
                                </tfoot>";
			
			echo $html;

		}


  }//fin de la clase






