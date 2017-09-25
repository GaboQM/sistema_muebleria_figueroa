<?php
//require('class.conexion.php') ;
class CategoriaModelo extends conexion
{
	function getCategoria(){
		$rows=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT * FROM categoria ORDER BY nombre";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		
		return $rows;
	}

	function update($id,$nCtg){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE categoria SET nombre='$nCtg' WHERE idcategoria=$id";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		
	}

	function addCtg($ctg){
		$rows=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT * FROM categoria WHERE nombre='$ctg'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}
		if(	!$rows[0]){
			$sql="INSERT INTO categoria VALUES ('','$ctg')";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		}
	}
	 function delete($dctg){
	 	$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="DELETE FROM categoria  WHERE idcategoria=$dctg";
		$statement=$conexion->prepare($sql);
		$statement->execute();

	 }


	
}


?>