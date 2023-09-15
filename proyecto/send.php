<?php

 include("conexion.php");
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