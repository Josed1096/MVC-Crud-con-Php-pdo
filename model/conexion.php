<?php 
 class conexion{

 	public function conectar(){

 		$cx = new PDO("mysql:host=localhost;dbname=mvc_pdo","root","");
 	     return $cx;

 	     $cx->close();

 	}
 }


?>