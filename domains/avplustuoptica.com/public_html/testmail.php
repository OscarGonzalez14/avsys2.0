<?php
    /*ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "asistencia@avplus.com";
    $to = "oscargonzalez815@gmail.com";
    $subject = "Felicidades, usted se ha afiliado";
    $message = "Optica Avplus le saluda informandoles que se ha afiliado a nuestros planes";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";*/
    
$from = "asistencia@avplus.com";
$to = $_POST["correo"];
$subject = "Felicidades, usted se ha afiliado";
$message = "Optica Avplus le saluda informandoles que se ha afiliado a nuestros planes";
$headers = "From:" . $from;

switch ('op') {
    case 'afiliacion':
    	ini_set( 'display_errors', 1 );
    	error_reporting( E_ALL );
    	
    	mail($to,$subject,$message, $headers);
    	echo "The email message was sent.";
    break;
    	
 
    }