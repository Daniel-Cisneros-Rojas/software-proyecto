<?php
include("conexion.php");


   if(isset($_POST['reg']))
  {
    
    if(strlen($_POST['usuarios'])>=1 && strlen($_POST['contrasenas'])>=1){
     $usuarios=trim($_POST['usuarios']);
     $contrasenas=trim($_POST['contrasenas']);
    $consulta="SELECT * FROM usuarios";
    $resultado=mysqli_query($conex,$consulta);
    
      $repetido=0;
    
   
     while($row=$resultado->fetch_array()){
      if($usuarios==$row['usuario'])
      {
        $repetido=1;
      }
     }

     if($repetido==1){
      ?>
      
      <h3 class="bad">Ese usuario ya existe</h3>
      <?php
      $repetido=0;
     }
     else{
      $consulta="INSERT INTO usuarios(usuario,contraseña) VALUES ('$usuarios','$contrasenas')";
     $resultado=mysqli_query($conex,$consulta);
     if($resultado){
        ?>
        
        <h3 class="ok">Tu registro fue exitoso</h3>

        
        <?php
    }else{
        ?>
        <h3></h3>
        <h3 class="bad">Ocurrio un error</h3>
        
        
        <?php
    }
     }
  }
}

?>