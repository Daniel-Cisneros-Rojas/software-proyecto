<?php
include("conexion.php");

if(isset($_POST['send'])) {
 $consulta="SELECT * FROM codigos";
 $resultado=mysqli_query($conex,$consulta);
 if($resultado){
    while($row=$resultado->fetch_array())
    
    {
        $codigo2=$row['codigo'];
        $intentos=$row['intentos'];
        $codigopuesto=trim($_POST['usuarios']);

 
 
 if($codigo2==$codigopuesto)
 {
    ?>
    <script>location.href="compartir.php"</script>
    <?php
 }
 else
 {
   ?>
   <h3 class="bad">Codigo inocorrecto</h3>
   <?php
    $intentos=$intentos+1;
 }

 if($intentos==3)
 {
    ?>
    <script>location.href="index.php"</script>
    <?php
 }


    }
 }
 
 
}
?>