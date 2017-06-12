<?php  
session_start();
if (!$_SESSION["validar"]) {
  header("location:index.php?views=ingresos");
}
?>

<section class="container">
          
  

<?php 
$editar = new MVCcontroller();
$editar->editarDatosController();
$editar->actualizarDatosController();
?>




 </section>
