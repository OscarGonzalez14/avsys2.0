<?php
  
     //conexión a la base de datos

   require_once("../config/conexion.php");

   class Consulta extends Conectar{


    public function get_consultas(){

        $conectar= parent::conexion();
       
        $sql= "select c.fecha_reg,c.id_consulta,p.nombres,c.sugeridos,c.diagnostico,u.usuario,c.encargado
        from usuarios as u inner join consulta as c on u.id_usuario=c.id_usuario inner join pacientes as p on c.id_paciente=p.id_paciente;";

        $sql=$conectar->prepare($sql);

        $sql->execute();

        return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

         
         }
         

       public function get_detalle_consultas($id_consulta){

          $conectar=parent::conexion();
           parent::set_names();

          $sql="select p.codigo,p.nombres,u.usuario,c.id_consulta,c.motivo,c.patologias,c.id_paciente,c.id_usuario,c.fecha_reg,c.oiesfreasl,c.oicilindrosl,c.oiejesl,c.oiprismal,c.oiadicionl,c.odesferasl,c.odcilndrosl,c.odejesl,c.odprismal,c.odadicionl,c.oiesferasa,c.oicolindrosa,c.oiejesa,c.oiprismaa,c.oiadiciona,c.odesferasa,c.odcilindrosa,c.odejesa ,c.dprismaa,c.oddiciona,c.sugeridos,c.diagnostico,c.medicamento,c.observaciones,c.oiesferasf,c.oicolindrosf,c.oiejesf,c.oiprismaf,c.oiadicionf,c.odesferasf,c.odcilindrosf,c.odejesf,c.dprismaf,c.oddicionf,c.prisoicorrige,c.addodcorrige,c.prisodcorrige,c.addoicorrige,c.fecha_consulta,c.patologias,c.odavsclejos,c.odavphlejos,c.odavcclejos,c.odavsccerca,c.odavcccerca,c.oiavesferasf,c.oiavcolindrosf,c.oiavejesf,c.oiavprismaf,c.oiavadicionf,c.dip,c.oddip,c.oidip,c.aood,c.aooi,c.apod,c.opoi,c.ishihara,c.amsler,c.anexos,
c.id_consulta from usuarios as u inner join consulta as c on u.id_usuario=c.id_usuario inner join pacientes as p on c.id_paciente=p.id_paciente where id_consulta=?;";

          //echo $sql; exit();

          $sql=$conectar->prepare($sql);
              

          $sql->bindValue(1,$id_consulta);
          $sql->execute();
          return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

       
            
       }

public function editar_consultas($mot_consulta,$patologias_c,$id_consulta_e,$oiesfreasl_e,$oicilindrosl_e,$oiejesl_e,$oiprismal_e,$oiadicionl_e,$odesferasl_e,$odcilndrosl_e,$odejesl_e,$odprismal_e,$odadicionl_e,$oiesferasa_e,$oicolindrosa_e,$oiejesa_e,$oiprismaa_e,$oiadiciona_e,$odesferasa_e,$odcilindrosa_e,$odejesa_e,$dprismaa_e,$oddiciona_e,$odavsclejos_e,$odavphlejos_e,$odavcclejos_e,$odavsccerca_e,$odavcccerca_e,$oiavesferasf_e,$oiavcolindrosf_e,$oiavejesf_e,$oiavprismaf_e,$oiavadicionf_e,$odesferasf_e,$odcilindrosf_e,$odejesf_e,$dprismaf_e,$prisodcorrige_e,$oddicionf_e,$addodcorrige_e,$oiesferasf_e,$oicolindrosf_e,$oiejesf_e,$oiprismaf_e,$prisoicorrige_e,$oiadicionf_e,$addoicorrige_e,$oddip_e,$oidip_e,$aood_e,$aooi_e,$apod_e,$opoi_e,$ishihara_e,$amsler_e,$anexos_e,$sugeridos_e,$diagnostico_e,$medicamento_e,$observaciones_e){
  $conectar=parent::conexion();
  parent::set_names();

  $sql="update consulta set 

    motivo=?,
    patologias=?,
    
    oiesfreasl=?,
    oicilindrosl=?,
    oiejesl=?,
    oiprismal=?,
    oiadicionl=?,
    odesferasl=?,
    odcilndrosl=?,
    odejesl=?,
    odprismal=?,
    odadicionl=?,

    oiesferasa=?,
    oicolindrosa=?,
    oiejesa=?,
    oiprismaa=?,
    oiadiciona=?,
    odesferasa=?,
    odcilindrosa=?,
    odejesa=?,
    dprismaa=?,
    oddiciona=?,

    odavsclejos=?,
    odavphlejos=?,
    odavcclejos=?,
    odavsccerca=?,
    odavcccerca=?,
    oiavesferasf=?,
    oiavcolindrosf=?,
    oiavejesf=?,
    oiavprismaf=?,
    oiavadicionf=?,

    odesferasf=?,
    odcilindrosf=?,
    odejesf=?,
    dprismaf=?,
    prisodcorrige=?,
    oddicionf=?,
    addodcorrige=?,
    oiesferasf=?,
    oicolindrosf=?,
    oiejesf=?,
    oiprismaf=?,
    prisoicorrige=?,
    oiadicionf=?,
    addoicorrige=?,

    oddip=?,
    oidip=?,
    aood=?,
    aooi=?,
    apod=?,
    opoi=?,

    ishihara=?,
    amsler=?,
    anexos=?,
    sugeridos=?,
    diagnostico=?,
    medicamento=?,
    observaciones=?
    
    where 
    id_consulta=?";

    $sql=$conectar->prepare($sql);

    $sql->bindValue(1, $_POST["mot_consulta"]);
    $sql->bindValue(2, $_POST["patologias_c"]);

    $sql->bindValue(3, $_POST["oiesfreasl_e"]);
    $sql->bindValue(4, $_POST["oicilindrosl_e"]);
    $sql->bindValue(5, $_POST["oiejesl_e"]);
    $sql->bindValue(6, $_POST["oiprismal_e"]);
    $sql->bindValue(7, $_POST["oiadicionl_e"]);
    $sql->bindValue(8, $_POST["odesferasl_e"]);
    $sql->bindValue(9, $_POST["odcilndrosl_e"]);
    $sql->bindValue(10, $_POST["odejesl_e"]);
    $sql->bindValue(11, $_POST["odprismal_e"]);
    $sql->bindValue(12, $_POST["odadicionl_e"]);

    $sql->bindValue(13, $_POST["oiesferasa_e"]);
    $sql->bindValue(14, $_POST["oicolindrosa_e"]);
    $sql->bindValue(15, $_POST["oiejesa_e"]);
    $sql->bindValue(16, $_POST["oiprismaa_e"]);
    $sql->bindValue(17, $_POST["oiadiciona_e"]);
    $sql->bindValue(18, $_POST["odesferasa_e"]);
    $sql->bindValue(19, $_POST["odcilindrosa_e"]);
    $sql->bindValue(20, $_POST["odejesa_e"]);
    $sql->bindValue(21, $_POST["dprismaa_e"]);
    $sql->bindValue(22, $_POST["oddiciona_e"]);

    $sql->bindValue(23, $_POST["odavsclejos_e"]);
    $sql->bindValue(24, $_POST["odavphlejos_e"]);
    $sql->bindValue(25, $_POST["odavcclejos_e"]);
    $sql->bindValue(26, $_POST["odavsccerca_e"]);
    $sql->bindValue(27, $_POST["odavcccerca_e"]);
    $sql->bindValue(28, $_POST["oiavesferasf_e"]);
    $sql->bindValue(29, $_POST["oiavcolindrosf_e"]);
    $sql->bindValue(30, $_POST["oiavejesf_e"]);
    $sql->bindValue(31, $_POST["oiavprismaf_e"]);
    $sql->bindValue(32, $_POST["oiavadicionf_e"]);

    $sql->bindValue(33, $_POST["odesferasf_e"]);
    $sql->bindValue(34, $_POST["odcilindrosf_e"]);
    $sql->bindValue(35, $_POST["odejesf_e"]);
    $sql->bindValue(36, $_POST["dprismaf_e"]);
    $sql->bindValue(37, $_POST["prisodcorrige_e"]);
    $sql->bindValue(38, $_POST["oddicionf_e"]);
    $sql->bindValue(39, $_POST["addodcorrige_e"]);
    $sql->bindValue(40, $_POST["oiesferasf_e"]);
    $sql->bindValue(41, $_POST["oicolindrosf_e"]);
    $sql->bindValue(42, $_POST["oiejesf_e"]);
    $sql->bindValue(43, $_POST["oiprismaf_e"]);
    $sql->bindValue(44, $_POST["prisoicorrige_e"]);
    $sql->bindValue(45, $_POST["oiadicionf_e"]);
    $sql->bindValue(46, $_POST["addoicorrige_e"]);

    $sql->bindValue(47, $_POST["oddip_e"]);
    $sql->bindValue(48, $_POST["oidip_e"]);
    $sql->bindValue(49, $_POST["aood_e"]);
    $sql->bindValue(50, $_POST["aooi_e"]);
    $sql->bindValue(51, $_POST["apod_e"]);
    $sql->bindValue(52, $_POST["opoi_e"]);

    $sql->bindValue(53, $_POST["ishihara_e"]);
    $sql->bindValue(54, $_POST["amsler_e"]);
    $sql->bindValue(55, $_POST["anexos_e"]);
    $sql->bindValue(56, $_POST["sugeridos_e"]);
    $sql->bindValue(57, $_POST["diagnostico_e"]);
    $sql->bindValue(58, $_POST["medicamento_e"]);
    $sql->bindValue(59, $_POST["observaciones_e"]);

    $sql->bindValue(60, $_POST["id_consulta_e"]);

    $sql->execute();


}


//método para eliminar un registro
    public function eliminar_consulta($id_consulta){

        $conectar=parent::conexion();
        $sql="delete from consulta where id_consulta=?";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_consulta);
        $sql->execute();

        return $resultado=$sql->fetch();
        }
    
   }




?>
