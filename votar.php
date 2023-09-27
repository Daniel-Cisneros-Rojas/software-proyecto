<?php
$inc=include("conexion.php");
if($inc){
    $consulta="SELECT * FROM datos";
    $resultado=mysqli_query($conex,$consulta);
    if($resultado){
        $nodatos=0;
        while($row=$resultado->fetch_array()){
            $nodatos=$nodatos+1;
            $id=$row['id'];
            $nombrep=$row['nombrep'];
            $justificacion=$row['justificacion'];
            $dinero=$row['dinero'];
            $video=$row['video'];
            $correo=$row['correo'];
            $fecha=$row['fecha'];
            ?>
             
             <!DOCTYPE html>
             <html lang="en">
             <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Votar</title>
                <script src="https://kit.fontawesome.com/fee347bc49.js" crossorigin="anonymous"></script>
                <link rel="stylesheet" href=http://localhost/proyecto/estilo/style.css>
                
             </head>
             <body>
               <form autocomplete"off">
                 <h2><?php echo $nombrep;?></h2>
                 <div class="input-group">
                 
                   <div class="input-container">
                        <h3><?php echo $justificacion;?></h3>
                   </div>

                   <div class="input-container">
                        <h3>Costo : <?php echo $dinero;?></h3>
                   </div>

                   <div class="input-container">
                        <a href=<?php echo $video;?> target="_blank">Click para ver video
                        <img src="data:image/jpeg;base64,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" alt="">
                        
                    </a>
                   </div>

                   <div class="input-container2">
                    <h3>¿Esta de acuerdo con la peticion?</h3>
                     <a href="iniciasesion2.php" target="_blank">SI</a>
                    </div>
                    <div class="input-container3">
                     <a href="iniciasesion.php" target="_blank">NO</a>
                    </div>

                 </div>
                   
              </form>
             </body>
             </html>

            <?php
        }

        if($nodatos==0)
        {
            ?>
              <!DOCTYPE html>
              <html lang="en">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Sin datos</title>
              </head>
              <body>
                 <form>
                    <h2>La encuesta a la que deseas acceder ya termino </h2>
                 </form>
              </body>
              </html>
            <?php

        }

    }
}

?>