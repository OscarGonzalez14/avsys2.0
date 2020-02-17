<?php

require_once("config/conn.php");
require_once("config/conexion.php");

   class Afiliados extends Conectar {


   public function registrar_afiliacion($nombre,$codigo,$direccion,$dui,$n_tarjeta,$vencimiento_tar,$tipo_tarjeta,$telefono,$celular,$fecha_pagos,$forma_pago,$lugar_trabajo,$tipo_plan,$cuota_mensual){

             $conectar=parent::conexion();
             parent::set_names();

             $sql="insert into pacientes_afiliados 
             values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

             $sql=$conectar->prepare($sql);

             $sql->bindValue(1, $_POST["nombre"]);
             $sql->bindValue(2, $_POST["codigo"]);
             $sql->bindValue(3, $_POST["direccion"]);
             $sql->bindValue(4, $_POST["dui"]);
             $sql->bindValue(5, $_POST["n_tarjeta"]);
             $sql->bindValue(6, $_POST["vencimiento_tar"]);
             $sql->bindValue(7, $_POST["tipo_tarjeta"]);
             $sql->bindValue(8, $_POST["telefono"]);
             $sql->bindValue(9, $_POST["celular"]);
             $sql->bindValue(10, $_POST["fecha_pagos"]);
             $sql->bindValue(11, $_POST["forma_pago"]);
             $sql->bindValue(12, $_POST["lugar_trabajo"]);
             $sql->bindValue(13, $_POST["tipo_plan"]);
             $sql->bindValue(14, $_POST["cuota_mensual"]);
             
             $sql->execute();

   


        }



    public function login(){

        $conectar=parent::conexion();
        parent::set_names();

        if(isset($_POST["enviar"])){

  //*****************VALIDACIONES  DE ACCESO*****************
        //$password = $_POST["pwd"];
        $usuario = $_POST["usuario"];

//********************FIN VALIDACIONES  DE ACCESO************

        

        if(empty($usuario)){

        header("Location:vistas/index.php?m=2");
        exit();
        }else {

        $sql= "select * from pacientes_afiliados where dui=?;";

               $sql=$conectar->prepare($sql);
               $sql->bindValue(1, $usuario);
               //$//sql->bindValue(2, $password);
               
               $sql->execute();
               $resultado = $sql->fetch();

               if(is_array($resultado) and count($resultado)>0){

                $_SESSION["id_paciente_afilaido"] = $resultado["id_paciente_afiliado"];
                $_SESSION["nombre"] = $resultado["nombre"];
                $_SESSION["dui"] = $resultado["dui"];
                $_SESSION["tarjeta_n"] = $resultado["tarjeta_n"];
                $_SESSION["tipo_plan"] = $resultado["tipo_plan"];        
 
      //FIN PERMISOS DEL USUARIO   

       header("Location: afiliados/afiliados.php");

              exit();


          } else {
                          
               //si no existe el registro entonces le aparece un mensaje
                          header("Location: index.php?m=1");
              exit();
            } 
                  
        }//cierre del else


}//condicion enviar
        }    

    }