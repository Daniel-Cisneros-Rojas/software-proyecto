<?php
$inc=include("conexion.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';
require 'phpmailer/SMTP.php';


$mail = new PHPMailer(true);
$control=0;

if($inc){
    $encuestados=0;
    $consulta="SELECT * FROM respuestasf";
    $resultado=mysqli_query($conex,$consulta);
    if($resultado){
        $numno=0;
        $numsi=0;
        while($row=$resultado->fetch_array()){
            //$id=$row['id'];
            $resp=$row['respuesta'];
            $encuestados=$encuestados+1;
            if($resp==1)
            {
              $numsi=$numsi+1;
            }
            if($resp==2)
            {
              $numno=$numno+1;
            }
        }
        $borrarresp="DELETE FROM respuestasf";
        $resultado=mysqli_query($conex,$borrarresp);

        //$header="From: noreply@example.com" . "\r\n";
        //$header.="Reply-To: noreply@example.com" . "\r\n";
        //$header.="X-Mailer: PHP/". phpversion();

        
    }
   

    $consulta="SELECT * FROM datos";
    $resultado=mysqli_query($conex,$consulta);
    if($resultado){
        
        while($row=$resultado->fetch_array()){
           $correo=$row['correo'];
           $control=$control+1;
        }

    }
    $borrarresp="DELETE FROM datos";
    $resultado=mysqli_query($conex,$borrarresp);

    $asunto="<br> Respuestas al formulario";

    if($numno==$numsi)
    {
        $msg="<br> empate su propuesta no fue aceptada";
    }
    if($numno>$numsi)
    {
        $msg="<br> lo sentimos su propuesta fue rechazada ";
    }
    if($numno<$numsi)
    {
        $msg="<br> felicidades su propuesta fue aceptada";
    }
    
    

    if($control>0)
    {
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'dan493075@gmail.com';                     //SMTP username
            $mail->Password   = 'lsnc ddrr xiuq ymko';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('dan493075@gmail.com', 'Solicitud');
            $mail->addAddress($correo);     //Add a recipient
            
            
            
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Respuesta al formulario';
            $mail->Body    = $msg;
            $mail->AltBody = 'su correo no soporta html';
        
            $mail->send();
            echo '';
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo '';
        }
    }
}
            ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fin</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    
    <form>
        <h2>Respuestas enviadas a su correo</h2>
        <!--<h2><?php echo $numsi;?></h2>
        <h2><?php echo $numno;?></h2>
        <h2><?php echo $msg;?></h2>
        <h2><?php echo $control;?></h2>-->
    </form>
</body>
</html>
