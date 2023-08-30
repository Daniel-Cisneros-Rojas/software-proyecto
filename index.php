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
                
                <input type="text" name="namep" placeholder="Nombre del proyecto">
                <i class="fa-sharp fa-solid fa-pen-to-square fa-beat-fade"></i>   
            </div>

            <div class="input-container">
                
                <input type="text" name="justificacion" placeholder="Justificacion (max 100 palabras)">  
                <i class="fa-sharp fa-regular fa-file fa-beat-fade"></i> 
            </div>

            <div class="input-container">
                
                <input type="text" name="dinero" placeholder="Dinero requerido">  
                <i class="fa-solid fa-wallet fa-beat-fade"></i>
            </div>

            <div class="input-container">
                
                <input type="text" name="video" placeholder="Link de video">  
                <i class="fa-brands fa-youtube fa-beat-fade"></i>
            </div>

            <div class="input-container">
                
                <input type="text" name="correo" placeholder="Correo de contacto">  
                <i class="fa-sharp fa-regular fa-envelope fa-beat-fade"></i>
            </div>

            
            <input type="submit" name="send" class="btn" value="Enviar">
        </div>
    </form>

    <?php
      include("send.php");
    ?>
    
</body>
</html>