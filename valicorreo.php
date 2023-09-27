<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<form class="form-register" method="post">
<h4>Se mando un correo con su codigo de verificacion</h4>
<input class="controls" type="text" name="usuarios" id="usuarios" placeholder="Ingrese su codigo" required="" pattern="[0-9]+">


<input type="submit" name="send" class="btn" value="Confirmar">
</form>


<?php
      include("valico.php");
?>
</body>
</html>