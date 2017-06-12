<?php
require_once 'conexion.php'; 

class Crud extends conexion {
    
       
        //REGISTRO MODELO
	public function registroDatosModel($datosModel, $tabla){
		$reg =conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES 
			(:usuario,:password,:email)");

        $reg->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
        $reg->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
        $reg->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);

        if ($reg->execute()) {
        	return "SUCCESS";
        }else{
        	return "ERROR";
        }
        $reg->close();
    }

    
    //INGRESO MODELO
    public function ingresoDatosModel($datosModel,$tabla){
        $ing =conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario=:usuario");
        $ing->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
        $ing->execute();

        return $ing->fetch();
        $ing->close();
        


    }

    //LEER MODELO
    public function leerDatosModel($tabla){
        $lee =conexion::conectar()->prepare("SELECT * FROM $tabla");
        $lee->execute();
        return $lee->fetchAll();
        $lee->close();
    }


   //EDITAR MODELO
  public function editarDatosModel($datosModel,$tabla){
        $edi =conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id =:id");
        $edi->bindParam(":id",$datosModel,
                PDO::PARAM_INT);
       
        $edi->execute();
        return $edi->fetch();
        $edi->close();


 }

 //ACTULIZAR MODELO
 public function actualizarDatosModel($datosModel,$tabla){
        $act =conexion::conectar()->prepare("UPDATE $tabla SET usuario= :usuario, password = :password, email = :email WHERE id = :id");
        $act->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
        $act->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
        $act->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
        $act->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);

         if ($act->execute()) {

             return "SUCCESS";
         }else{
                return "ERROR";

         }
         $act->close();
 }

 //BORRAR MODELO
 public function borrarDatosModel($datosModel,$tabla){
   $borrar=conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
   $borrar->bindParam(":id",$datosModel,PDO::PARAM_INT);
   if ($borrar->execute()) {

             return "SUCCESS";
         }else{
                return "ERROR";

         }
         $borrar->close();
        
 }

 
}


?>