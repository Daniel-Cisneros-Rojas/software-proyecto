<?php
include("conexion.php");
if(isset($_POST['reg']))
  {
    
    if(strlen($_POST['usuarios'])>=1 && strlen($_POST['contrasenas'])>=1)
    {
        $usuarios=trim($_POST['usuarios']);
        $contrasenas=trim($_POST['contrasenas']);

        $consulta="SELECT * FROM usuarios";
        $resultado=mysqli_query($conex,$consulta);
        $valido=0;
        $valido2=0;
        
        while($row=$resultado->fetch_array())
           {
            if($usuarios==$row['usuario']&&$contrasenas==$row['contraseña'])
            {
              $valido=1;
            }
           }

             if($valido==1)
             {
              $consulta="SELECT * FROM respuestasf";
              $resultado=mysqli_query($conex,$consulta);
                while($row=$resultado->fetch_array())
                {
                  if($usuarios==$row['usuario'])
                  {
                    $valido2=1;
                  }
                }

                if($valido2==1)
                {
                   ?>
                  <h3 class="bad">Ya has contestado esta encuenta</h3>
                  <?php
                }
                else
                {
                    $consulta= "INSERT INTO respuestasf(respuesta,usuario)
                    VALUES('2','$usuarios')";

                    $resultado = mysqli_query($conex,$consulta);
                    ?>
                    <h3 class="ok">Tu respuesta fue guardada</h3>
                    <?php
                }
             }
             else
             {
                ?>
                <h3 class="bad">No se pudo iniciar sesion verifica que tus datos sean correctos</h3>
                <?php
             }
           }
           else
           {
            ?>
            <h3 class="bad">LLena todos los campos</h3>
            <?php
           }
    
    }
  
?>