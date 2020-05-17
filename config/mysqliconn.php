<?php
//$numero=$_GET["numero_venta"];
$servername = "localhost";
$username = "root";
$password = "oscar14";
$dbname = "avplu2";

$numero=$_GET["numero_orden_pac"];
$id_pac=$_GET["numero_paciente"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}