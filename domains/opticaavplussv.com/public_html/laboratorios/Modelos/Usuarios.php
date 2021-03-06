<?php

//require_once("../config/conn.php");
//require_once("../config/conexion.php");
require_once("config/conexion.php");

class Empresas extends Conectar {

public function login(){
  $conectar=parent::conexion();
  parent::set_names();
    if(isset($_POST["enviar"])){
  //*****************VALIDACIONES  DE ACCESO*****************
        //$password = $_POST["pwd"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
//********************FIN VALIDACIONES  DE ACCESO************

        

        if(empty($usuario) and empty($password)){

        header("Location:index.php");
        exit();
        }else {

        $sql= "select * from empresas where usuario=? and password=?;";

               $sql=$conectar->prepare($sql);
               $sql->bindValue(1, $usuario);
               $sql->bindValue(2, $password);
               
               $sql->execute();
               $resultado = $sql->fetch();

               if(is_array($resultado) and count($resultado)>0){

                $_SESSION["nombre"] = $resultado["nombre"];
                $_SESSION["usuario"] = $resultado["usuario"];
               // $_SESSION["dui"] = $resultado["dui"];
                       
 
      //FIN PERMISOS DEL USUARIO   

       header("Location: laboratorios.php");

              exit();


          } else {
                          
               //si no existe el registro entonces le aparece un mensaje
                          header("Location: index.php");
              exit();
            } 
                  
        }//cierre del else


}//condicion enviar
        }    


public function get_ordenes_por_laboratorio($empresa){

   $empresa=$_POST["empresa"];

  $conectar= parent::conexion();
       
  $sql= "select fecha, paciente, lentes, optica  from ordenes where optica=? order by fecha DESC;";

      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $empresa);
      $sql->execute();

      return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
      }
}