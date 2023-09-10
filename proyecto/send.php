<?php

 include("conexion.php");

 if(isset($_POST['send'])) {

    if(
        strlen($_POST['namep'])>=1&&
        strlen($_POST['justificacion'])>=1&&
        strlen($_POST['dinero'])>=1&&
        strlen($_POST['video'])>=1&&
        strlen($_POST['correo'])>=1
    ) {
       $namep=trim($_POST['namep']);
       $justificacion=trim($_POST['justificacion']);
       $dinero=trim($_POST['dinero']);
       $video=trim($_POST['video']);
       $correo=trim($_POST['correo']);
       $fecha=date("d/m/y");

       $consulta= "INSERT INTO datos(nombrep,justificacion,dinero,video,correo,fecha)
                    VALUES('$namep','$justificacion','$dinero','$video','$correo','$fecha')";

        $resultado = mysqli_query($conex,$consulta);
        if($resultado){
            ?>
            <h3 class="success">Tu registro fue exitoso</h3>
            <script>location.href="compartir.php"</script>
            
            <?php
        }else{
            ?>
            <h3 class="error">Ocurrio un error</h3>
            
            
            <?php
        }
    }else{
        ?>
        <h3 class="error">Llena todos los campos</h3>
        <?php
    }

 }

?>