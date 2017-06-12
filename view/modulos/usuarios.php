<?php 
// validar si es falsa

session_start();
if (!$_SESSION["validar"]) {
  header("location:index.php?views=ingresos");
}
?>


<section class="container">
            <div class="container">
    <div class="row col-md-12 table-responsive">
    <table class="table table-striped custab">
    <thead>
   
        <tr>
            <th>Usuarios</th>
            <th>Password</th>
            <th>correo</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            
                <?php
                  $leer = new MVCcontroller();
                  $leer->leerDatosController();
                  $leer->borrarDatosController();
                ?>
           

          
          
    </table>
    
    </div>
</div>
<?php
     if (isset($_GET["views"])) {
       if ($_GET["views"]=="actualizado") {

        echo ' <center><div class="col-md-12"><div class="alert alert-success">
  <strong>Actulizado exitosamente.</strong> 
</div></div></center>';
        
       }
      
     }
    ?>
           </section>
