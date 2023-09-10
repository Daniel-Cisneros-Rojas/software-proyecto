<?php
$inc=include("conexion.php");
if($inc){
    $consulta="SELECT * FROM respuestasf";
    $resultado=mysqli_query($conex,$consulta);
    if($resultado){
        $numno=0;
        $numsi=0;
        while($row=$resultado->fetch_array()){
            //$id=$row['id'];
            $resp=$row['respuesta'];
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

        $header="From: noreply@example.com" . "\r\n";
        $header.="Reply-To: noreply@example.com" . "\r\n";
        $header.="X-Mailer: PHP/". phpversion();

        
    }


    $consulta="SELECT * FROM datos";
    $resultado=mysqli_query($conex,$consulta);
    if($resultado){
        
        while($row=$resultado->fetch_array()){
           $correo=$row['correo'];
        }

    }
    $borrarresp="DELETE FROM datos";
    $resultado=mysqli_query($conex,$borrarresp);

    $asunto="<br> Respuestas al formulario";

    if($numno==$numsi)
    {
        $msg="<br> empate";
    }
    if($numno>$numsi)
    {
        $msg="<br> rechazada";
    }
    if($numno<$numsi)
    {
        $msg="<br> aceptada";
    }

    $mail=@mail($correo,$asunto,$msg,$header);
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
        <h2><?php echo $msg;?></h2>-->
        <h2><?php echo $correo;?></h2>
    </form>
</body>
</html>