<?php
$inc=include("conexion.php");
$borrarresp="DELETE FROM respuestas";
$resultado=mysqli_query($conex,$borrarresp);
$borrarresp="DELETE FROM datos";
$resultado=mysqli_query($conex,$borrarresp);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="https://kit.fontawesome.com/fee347bc49.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <form method="post" autocomplete"off">
        <h2>SOLICITUD</h2>
        <div class="input-group">

            <div class="input-container">
                
                <input type="text" name="namep" placeholder="Nombre del proyecto" required="">
                <i class="fa-sharp fa-solid fa-pen-to-square fa-beat-fade"></i>   
            </div>

            <div class="input-container">
                
                <input type="text" name="justificacion" placeholder="Justificacion (max 100 palabras)" required="">  
                <i class="fa-sharp fa-regular fa-file fa-beat-fade"></i> 
            </div>

            <div class="input-container">
                
                <input type="text" name="dinero" placeholder="Dinero requerido(numero)" required="" pattern="[0-9]+">  
                <i class="fa-solid fa-wallet fa-beat-fade"></i>
            </div>

            <div class="input-container">
                
                <input type="text" name="video" placeholder="Link de video">  
                <i class="fa-brands fa-youtube fa-beat-fade"></i>
            </div>

            <div class="input-container">
                
                <input type="text" name="correo" placeholder="Correo de contacto" required="">  
                <i class="fa-sharp fa-regular fa-envelope fa-beat-fade"></i>
            </div>

            <a href="Terminos.pdf">Terminos y condiciones</a>
            <input type="submit" name="send" class="btn" value="Enviar">
        </div>
    </form>

    <?php
      include("send.php");
    ?>
    
</body>
</html>