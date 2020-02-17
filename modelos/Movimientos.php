<?php

require_once("../config/conexion.php");


   class Envios extends Conectar{        
   

         public function get_productos_envio(){

          $conectar= parent::conexion();
       
          $sql= "select e.id_ingreso,p.id_producto,p.modelo,p.marca,p.color,p.medidas,e.stock,e.bodega,e.categoriaub,p.categoria from producto as p inner join existencias as e on e.id_producto=p.id_producto where e.stock>0";

          $sql=$conectar->prepare($sql);

          $sql->execute();

           return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
}


         //obtiene el registro por id despues de editar
        public function get_producto_por_id($id_producto){

          $conectar= parent::conexion();

          //$output = array();

            $sql="select * from producto where id_producto=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1,$id_producto);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


        }

          
public function numero_movimiento(){

  $conectar=parent::conexion();
  parent::set_names();
     
  $sql="select num_traslado from traslados;";
  $sql=$conectar->prepare($sql);
  $sql->execute();
  $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

  foreach($resultado as $k=>$v){
    $codigo["numero"]=$v["num_traslado"];
  }          
    if(empty($codigo["numero"])){
      echo 'T000001';
  }else{
    $num     = substr($codigo["numero"] , 2);
    $dig     = $num + 1;
    $fact = str_pad($dig, 6, "0", STR_PAD_LEFT);
    echo 'T'.$fact;
                        
  } 
}

public function agrega_detalle_ingreso(){
       
  $str = '';
  $detallesE = array();
  $detallesE = json_decode($_POST['arrayIngreso']);
   
  $conectar=parent::conexion();
    foreach ($detallesE as $k => $v) {  
    //IMPORTANTE:estas variables son del array detalles
    $cantidad = $v->cantidad;
    $id_ingreso = $v->id_ingreso;
    $codProd = $v->codProd;
    $ub_origen = $v->categoriaub;
    $ub_destino = $_POST["ub_destino"];
    $numero_envio = $_POST["numero_envio"];
    $id_usuario = $_POST["id_usuario"];
    $sucursal = $_POST["sucursal"];
    $usuario = $_POST["usuario"];
    $tipo_traslado="interno";
    $estado="1";
    //$est_pend="0";


///////////CAPTURA DETALLE DE MOVIMIENTO

     $sql9="insert into traslados values(null,?,?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP,?);";     
     $sql9=$conectar->prepare($sql9);

     $sql9->bindValue(1,$codProd);
     $sql9->bindValue(2,$cantidad);
     $sql9->bindValue(3,$id_usuario);
     $sql9->bindValue(4,$numero_envio);       
     $sql9->bindValue(5,$tipo_traslado);
     $sql9->bindValue(6,$ub_origen);          
     $sql9->bindValue(7,$ub_destino);
     $sql9->bindValue(8,$estado);
     $sql9->bindValue(9,$usuario);
     $sql9->bindValue(10,$sucursal);         
     $sql9->execute();

     //////////////////RECORREMOS EL ARRAY PARA ENCONTRAR EL ARO
    $sql3="select * from existencias where id_producto=? and bodega=? and categoriaub=?;";            
    $sql3=$conectar->prepare($sql3);
    $sql3->bindValue(1,$codProd);
    $sql3->bindValue(2,$sucursal);
    $sql3->bindValue(3,$ub_destino);
    //$sql3->bindValue(4,$id_ingreso);
    $sql3->execute();

    $resultado = $sql3->fetchAll(PDO::FETCH_ASSOC);

    if(is_array($resultado)==true and count($resultado)>0){
      foreach($resultado as $b=>$row){
      $re["existencia"] = $row["stock"];
    }
    //la cantidad total es la suma de la cantidad más la cantidad actual
    $cantidad_total = $cantidad + $row["stock"];             
    //si existe el producto entonces actualiza el stock en producto              
    if(is_array($resultado)==true and count($resultado)>0) {                     
                  //actualiza el stock en la tabla producto
    $sql4 = "update existencias set                      
      stock=?
      where 
      id_producto=?
      and
      bodega=?
      and categoriaub=?
    ";
    $sql4 = $conectar->prepare($sql4);
    $sql4->bindValue(1,$cantidad_total);
    $sql4->bindValue(2,$codProd);
    $sql4->bindValue(3,$sucursal);
    $sql4->bindValue(4,$ub_destino);
    //$sql4->bindValue(5,$id_ingreso);
    $sql4->execute();
    }
}else{

  $sql="insert into existencias values (null,?,?,?,?,CURRENT_TIMESTAMP);";


        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$codProd);
        $sql->bindValue(2,$cantidad);
        $sql->bindValue(3,$sucursal);
        $sql->bindValue(4,$ub_destino);
        $sql->execute();
        //$sql->execute();//cierre la condicional*********FIN DE AGREGA SUDURSAL DESTINO
               ///INICIA UPDATE SUCURSAL ORIGEN
 }


  $sql5="select * from existencias where id_producto=? and bodega=? and categoriaub=? and id_ingreso=?;";
             //echo $sql3;             
             $sql5=$conectar->prepare($sql5);
             $sql5->bindValue(1,$codProd);
             $sql5->bindValue(2,$sucursal);
             $sql5->bindValue(3,$ub_origen);
             $sql5->bindValue(4,$id_ingreso);
             $sql5->execute();
             $resultado2 = $sql5->fetchAll(PDO::FETCH_ASSOC);
                  foreach($resultado2 as $b=>$row){
                    $re["existencia"] = $row["stock"];
                  }
                //la cantidad total es la suma de la cantidad más la cantidad actual
              $cantidad_total2 = $row["stock"] - $cantidad;
             
               //si existe el producto entonces actualiza el stock en producto
              
               if(is_array($resultado2)==true and count($resultado2)>0) {
                     
                  //actualiza el stock en la tabla producto
                 $sql6 = "update existencias set                      
                      stock=?
                      where 
                      id_producto=?
                      and
                      bodega=?
                      and categoriaub=?
                      and id_ingreso =?
                 ";
                $sql6 = $conectar->prepare($sql6);
                $sql6->bindValue(1,$cantidad_total2);
                $sql6->bindValue(2,$codProd);
                $sql6->bindValue(3,$sucursal);
                $sql6->bindValue(4,$ub_origen);
                $sql6->bindValue(5,$id_ingreso);
                $sql6->execute();
               }  //cierre la condicional*********FIN DE AGREGA SUDURSAL DESTINO

    }//cierre del foreach

}//cierre de la clase

public function producto_tralado_por_id($id_producto,$id_ingreso){
    $conectar= parent::conexion();
    $sql="select p.modelo,p.marca,p.medidas,p.color,e.id_producto,e.id_ingreso,e.categoriaub,e.stock from producto as p inner join existencias as e on p.id_producto=e.id_producto and e.id_producto=? and id_ingreso=?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $id_producto);
    $sql->bindValue(2, $id_ingreso);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}


public function traslado_a_sucursal(){
  $str = '';
  $detallesEn = array();
  $detallesEn = json_decode($_POST['arrayTrasladosSucursal']);

  $conectar=parent::conexion();

    foreach ($detallesEn as $k =>$v) {
      $cantidad = $v->cantidad;
      $codProd = $v->codProd;
      $categoriaub = $v->categoriaub;


      $numero_envio = $_POST["numero_envio"];
      $suc_origen = $_POST["suc_origen"];
      $suc_destino = $_POST["suc_destino"];
      $tipo_traslado = $_POST["tipo_traslado"];
      $id_usuario = $_POST["id_usuario"];
      $usuario = $_POST["usuario"];
      //$origen = $_POST["origen"];
      $estado = "0";
      
    //REGISTRO DE TRASLADOS
    $sql9="insert into traslados values(null,?,?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP,?);";     
    $sql9=$conectar->prepare($sql9);
    $sql9->bindValue(1,$codProd);
    $sql9->bindValue(2,$cantidad);
    $sql9->bindValue(3,$id_usuario);
    $sql9->bindValue(4,$numero_envio);       
    $sql9->bindValue(5,$tipo_traslado);
    $sql9->bindValue(6,$categoriaub);          
    $sql9->bindValue(7,$suc_destino);
    $sql9->bindValue(8,$estado);
    $sql9->bindValue(9,$usuario);
    $sql9->bindValue(10,$suc_origen);         
    $sql9->execute();      
      

  $sql5="select * from existencias where id_producto=? and bodega=? and categoriaub=?;";             
    $sql5=$conectar->prepare($sql5);
    $sql5->bindValue(1,$codProd);
    $sql5->bindValue(2,$suc_origen);
    $sql5->bindValue(3,$categoriaub);
    $sql5->execute();
    $resultado2 = $sql5->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultado2 as $b=>$row){
        $re["existencia"] = $row["stock"];
      }
                //la cantidad total es la suma de la cantidad más la cantidad actual
    $cantidad_total2 = $row["stock"] - $cantidad;             
               //si existe el producto entonces actualiza el stock en producto              
      if(is_array($resultado2)==true and count($resultado2)>0) {                     
        //actualiza el stock en la tabla producto
      $sql6 = "update existencias set                      
            stock=?
            where 
            id_producto=?
            and
            bodega=?
            and categoriaub=?
        ";
      $sql6 = $conectar->prepare($sql6);
      $sql6->bindValue(1,$cantidad_total2);
      $sql6->bindValue(2,$codProd);
      $sql6->bindValue(3,$suc_origen);
      $sql6->bindValue(4,$categoriaub);
      $sql6->execute();
      }

    }///FIN DEL FOREACH

}

 public function listar_requisiones(){

        $conectar = parent::conexion();
        parent::set_names();

        $sql="select d.id_detalle_envio,d.codigo_envio,d.sucursal_origen,d.sucursal_destino, u.usuario, p.modelo from usuarios as u inner join detalle_envio as d on u.id_usuario=d.id_usuario join producto as p where d.id_producto=p.id_producto;";

        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $resultado=$sql->fetchAll();

      }


}