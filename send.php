<?php

 include("conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

 $error=0;
 $error2=1;
 if(isset($_POST['send'])) {
     if(str_word_count($_POST['justificacion'])>100)
     {
        $error=1;
     }

     if(strpos($_POST['correo'],'@gmail.com')!==false)
     {
        $error2=0;
     }
    if(
        strlen($_POST['namep'])>=1&&
        strlen($_POST['justificacion'])>=1&&
        strlen($_POST['dinero'])>=1&&
        strlen($_POST['video'])>=1&&
        strlen($_POST['correo'])>=1&&
        str_word_count($_POST['justificacion'])<=100&&
        $error2==0
    ) {
       $namep=trim($_POST['namep']);
       $justificacion=trim($_POST['justificacion']);
       $dinero=trim($_POST['dinero']);
       $video=trim($_POST['video']);
       $correo=trim($_POST['correo']);
       $fecha=date("d/m/y");
       $confir=0;

       $consulta= "INSERT INTO datos(nombrep,justificacion,dinero,video,correo,fecha)
                    VALUES('$namep','$justificacion','$dinero','$video','$correo','$fecha')";
                    $resultado = mysqli_query($conex,$consulta);
       srand (time());
       $codigo = rand(100,999);
       $intentos=0;
       $consulta= "INSERT INTO codigos(codigo,intentos)
                   VALUES('$codigo','$intentos')";

        $resultado = mysqli_query($conex,$consulta);

        if($resultado){
            try {
       
        $mail->SMTPDebug = 0;                      
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
        $mail->Subject = 'Codigo';
        $mail->Body    = $codigo;
        $mail->AltBody = 'su correo no soporta html';
    
        $mail->send();
        echo '';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
        
            ?>
            <h3 class="success">Tu registro fue exitoso</h3>
            <script>location.href="valicorreo.php"</script>
            
            <?php
        }else{
            ?>
            <h3 class="error">Ocurrio un error</h3>
            <?php
        }
    }else{
        if($error==1)
        {
            ?>
           <h3 class="error">Escribiste mas de 100 palabras en la justificacion</h3>
        <?php
        }
        else if($error2==1)
        {
            ?>
            <h3 class="error">Ese correo no es valido</h3>
            <?php
        }
        else
        {
            ?>
            <h3 class="error">Llena todos los campos</h3>
            <?php
        }
        
    }

 }

?>