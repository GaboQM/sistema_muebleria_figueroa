<?php
//require('class.conexion.php') ;
class MarcaModelo extends conexion
{
	function getMarca(){
		$rows=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT * FROM marca ORDER BY nombre";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		
		return $rows;
	}
	

	function update($id,$mrk){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE marca SET nombre='$mrk' WHERE id_marca=$id";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		
	}

	function addMrk($mrk){
		$rows=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT * FROM marca WHERE nombre='$mrk'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		if(	!$rows[0]){
			$sql="INSERT INTO marca VALUES ('','$mrk')";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		}
	}
	 function delete($mrk){

	 	$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="DELETE FROM marca WHERE id_marca=$mrk";
		$statement=$conexion->prepare($sql);
		$statement->execute();

	 }


	
}


?>