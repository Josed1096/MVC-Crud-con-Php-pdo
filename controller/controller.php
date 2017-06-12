<?php

 class MVCcontroller{
     
     //LLAMADA TEMPLATE
     
     public function template(){
         include 'view/template.php';
         
     }
     
     //INTERACION USUARIO
     public function EnlacePaginaController() {
          if(isset($_GET["views"])){
              
         $enlaces_controller = $_GET["views"];
        
          }else{
              $enlaces_controller ="index";
          }
         $repuesta = Pagina::EnlacePaginaModel($enlaces_controller);
         include $repuesta;
     }


     //REGISTRO USUARIO
     public function registroDatosController(){
      if (isset($_POST["usuarioregistro"])) {
     

        $datosController = array("usuario" => $_POST["usuarioregistro"],
                                 "password" => $_POST["passwordregistro"],
                                 "email" => $_POST["email"]);

        $repuesta = Crud::registroDatosModel($datosController, "usuarios");

        if ($repuesta=="SUCCESS") {
           header("location:index.php?views=registrado");
        }else{
          header("location:index.php");

        }
      }
    
    }

    //INGRESO USUARIO
    public function ingresoDatosController(){

         if (isset($_POST["usuarioingreso"])) {
     

        $datosController = array("usuario" => $_POST["usuarioingreso"],
                                 "password" => $_POST["passwordingreso"]);

        $repuesta = Crud::ingresoDatosModel($datosController, "usuarios");

        if ($repuesta["usuario"] == $_POST["usuarioingreso"] and $repuesta["password"] == $_POST["passwordingreso"] ) {
           
           //INICIAR SESIONES
           session_start();
          $_SESSION["validar"]=true;
         
          
          header("location:index.php?views=usuarios");
           }else
          header("location:index.php?views=error");


 }
           
    }
   
   //lEER USUARIO
  public function leerDatosController(){
  $repuesta = Crud::leerDatosModel("usuarios");
  foreach ($repuesta as $key => $value) {
   echo '<tr><td> '.$value["usuario"].'</td>
         <td>'.$value["password"].'</td>
          <td>'.$value["email"].'</td>
          <td class="text-center"><a class="btn btn-info btn-xs" href=index.php?views=editar&id='.$value["id"].'><i class=" fa fa-pencil-square-o"></i> </a> <a href="index.php?views=usuarios&idborrar='.$value["id"].'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td></tr>';

      }
  }

  //EDITAR USUARIO
  public function editarDatosController(){
    $datosController = $_GET["id"];
    $repuesta = Crud::editarDatosModel($datosController,"usuarios");

    echo '<form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<legend><h3>Editar Datos</h3></legend><!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>  
  <div class="col-md-5">
  <input  id="usuario" name="ideditar" type="hidden" value="'.$repuesta["id"].'" placeholder="Usuario" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="usuario"></label>  
  <div class="col-md-5">
  <input id="usuario" name="usuarioeditar"  value="'.$repuesta["usuario"].'" type="text" placeholder="Usuario" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password"></label>
  <div class="col-md-5">
    <input id="password" name="passwordeditar"  value="'.$repuesta["password"].'" type="password" placeholder="Contraseña" class="form-control input-md" required="">
    
  </div>
</div>
 
 <!-- email input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>
  <div class="col-md-5">
    <input id="email" name="emaileditar"  value="'.$repuesta["email"].'" type="email" placeholder="Correo Electronico" class="form-control nput-mid" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-5">
    <button  type="submit" class="btn btn-block btn-primary">Actualizar</button>
  </div>
</div> </fieldset>

</form>';
     

  }

  //ACTUALIZAR USUARIO

  public function actualizarDatosController(){
    if (isset($_POST["usuarioeditar"])) {

       $datosController = array("usuario" => $_POST["usuarioeditar"],
                                 "password" => $_POST["passwordeditar"],
                                 "email" => $_POST["emaileditar"],
                                 "id"=> $_POST["ideditar"]);


       $repuesta = Crud::actualizarDatosModel($datosController,"usuarios");

        if ($repuesta=="SUCCESS") {
           header("location:index.php?views=actualizado");
        }else{
          echo "ERROR";

        }
     
    }

  }

  //BORRAR USUARIO
  public function borrarDatosController(){

    if (isset($_GET["idborrar"])) {
      $datos_controller = $_GET["idborrar"];

      $repuesta= Crud::borrarDatosModel($datos_controller,"usuarios");

      if ($repuesta=="SUCCESS") {
        
        header("location:index.php?views=eliminado");
      }else{
        echo "error";
      }



      
    }

  }

}

?>

