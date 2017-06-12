<?php
class Pagina{
    //funcion para validar las urls
    public function EnlacePaginaModel($enlaces_model){
       if($enlaces_model=="registros"||
          $enlaces_model=="ingresos"||    
          $enlaces_model=="usuarios"||
          $enlaces_model=="editar"||    
          $enlaces_model=="salir")
           {
           $module = "view/modulos/".$enlaces_model.".php";
           } 
        
        elseif ($enlaces_model=="error") {
         
              $module = "view/modulos/ingresos.php"; 
           }  
        elseif ($enlaces_model=="eliminado") {
         
              $module = "view/modulos/usuarios.php"; 
           }  

        elseif ($enlaces_model=="actualizado") {
         
              $module = "view/modulos/usuarios.php"; 
           }  
             
      elseif ($enlaces_model=="registrado") {
         
              $module = "view/modulos/registros.php"; 
           }  
       elseif ($enlaces_model=="index") {
         
              $module = "view/modulos/registros.php"; 
           } else {
               $module = "view/modulos/registros.php"; 
           }
        
        return $module;
        
    }

}

?>

