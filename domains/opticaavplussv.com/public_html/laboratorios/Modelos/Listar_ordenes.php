<?php

require_once("config/conexion.php");

class Listas extends Conectar {


public function get_orden_completa_id($cod_orden){

        $conectar=parent::conexion();
        parent::set_names();
            
          
            $cod_orden = $_POST["cod_orden"];
            


        $sql="select * from ordenes where id_orden=?;";

    
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$cod_orden);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }

}