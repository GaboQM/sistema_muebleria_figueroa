<?php
/**
* 
*/
class MorosoModelo extends conexion
{
	

	function getMorosos($name,$ap){
		
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowp="";
		$sqlp="SELECT * FROM moroso a,cliente b WHERE a.idcliente=b.idcliente AND b.nombres LIKE '%$name%' AND b.apellido_paterno LIKE '%$ap%' AND a.status=1";
		
		
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
				while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}

		return $rowp;
	}
	function createM($id,$nt,$ctd,$pgd,$des,$st){
				$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sqlm="INSERT INTO moroso VALUES('','$id','$nt','$ctd','$pgd','$des','$st')";
		$statement=$conexion->prepare($sqlm);
			if ($statement->execute()) {
				echo "Proceso finalizado con exito!";
			}else{
				echo "Ha ocurrido un error. C3!";
			}
	}

	function liberar($id){
			$modelo= new conexion();
			$conexion=$modelo->get_conexion();
			$jq="UPDATE moroso SET status=0 WHERE idmoroso='$id'";
			$statement=$conexion->prepare($jq);
			if ($statement->execute()) {
				echo "Proceso finalizado con exito...";
			}else{
				echo "Ha ocurrido un error. C3!";
			}
		}
	}





?>