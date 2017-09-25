<?php
require('class.conexion.php') ;

class Login extends conexion
{
	function getUsuario($user,$pass){
		$rows=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT * FROM usuario WHERE usuario='".$user."' AND contrasena='".$pass."'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		
		return $rows;

	}
	
}