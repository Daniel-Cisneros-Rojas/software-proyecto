<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <form class="form-register" method="post">
        <h4>Formulario Registro</h4>
        <input class="controls" type="text" name="usuarios" id="usuarios" placeholder="Ingrese un nombre">
        <input class="controls" type="password" name="contrasenas" id="contrasenas" placeholder="Ingrese una contraseña">
        <input type="submit" name="reg" class="botons" value="Enviar">
</form>
    <?php
    include("registrarusuario.php");
    ?>

</body>
</html>