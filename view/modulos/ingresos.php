
<section class="container">
                       
       <form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<legend><h3>Iniciar sesion</h3></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="usuario"></label>  
  <div class="col-md-5">
  <input id="usuario" name="usuarioingreso" type="text" placeholder="Usuario" class="form-control input-md" required="">
    
  </div>
</div>

<!-- email input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password"></label>
  <div class="col-md-5">
    <input id="password" name="passwordingreso" type="password" placeholder="Contraseña" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-5">
    <button  type="submit" class="btn btn-block btn-primary">Ingresar</button>
  </div>
</div>

</fieldset>
</form>

<?php
$ingreso = new MVCcontroller();
$ingreso->ingresoDatosController();
if (isset($_GET["views"])) {

  if ($_GET["views"]=="error") {
    echo '  <label class="col-md-4 control-label" for="singlebutton"></label><center><div class="col-md-5"><div class="alert alert-danger">
  <strong>Error de autenticación.</strong> 
</div></div></center>';
}
 }
?>
           </section>
