<?php
protected $dbh;
$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=avplu2","root","oscar14");
return $conectar;


$num_venta='V131';
$sql11="select monto_abono from abonos where numero_venta=? order by id_abono DESC limit 1;";
             
    $sql11=$conectar->prepare($sql11);
    $sql11->bindValue(1,$num_venta);
    $sql11->execute();
/////////////////////////
    $resultados6 = $sql11->fetchAll(PDO::FETCH_ASSOC);

      $suma=0;    
      foreach($resultados6 as $b=>$row){
        $suma = $suma+$row["monto_abono"];

    }
echo $suma."\n";

