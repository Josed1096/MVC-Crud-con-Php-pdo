<section class="container">
          
       <form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<legend><h3>Formulario de registro</h3></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="usuario"></label>  
  <div class="col-md-5">
  <input id="usuario" name="usuarioregistro" type="text" placeholder="Usuario" class="form-control input-md" required="">
    
  </div>
</div>

<!-- email input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password"></label>
  <div class="col-md-5">
    <input id="password" name="passwordregistro" type="password" placeholder="Contraseña" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>
  <div class="col-md-5">
    <input id="email" name="email" type="email" placeholder="Correo Electronico" class="form-control nput-mid" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-5">
    <button  type="submit" class="btn btn-block btn-primary">Registrar</button>
  </div>
</div>
</fieldset>
</form>

<?php
//llamada del controlador
$registro = new MVCcontroller();
$registro->registroDatosController();
if (isset($_GET["views"])) {

  if ($_GET["views"]=="registrado") {
    echo '  <label class="col-md-4 control-label" for="singlebutton"></label><center><div class="col-md-5"><div class="alert alert-success">
  <strong>Proceso exitoso.</strong> 
</div></div></center>';
}
 }

?>

 </section>
