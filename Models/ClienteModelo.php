<?php
	/**
	* 
	*/
	class ClienteModelo extends conexion
	{
		function create($name,$ap,$am,$rfc,$tel,$dmc,$rfn){
			$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sqlcp="INSERT INTO cliente VALUES('','$name','$ap','$am','$rfc','$tel','$dmc',NOW(),'$rfn')";
		$statement=$conexion->prepare($sqlcp);
			if ($statement->execute()) {
				# code...
				echo "Cliente agregado con exito!";
			}else{
				echo "Ha ocurrido un error-capa3!";
			}

		}
		function getCliente($ac,$name,$ap){
			
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowp="";
		if ($ac=='1') {
			$sqlp="SELECT idcliente, nombres,apellido_paterno,apellido_materno FROM cliente WHERE nombres LIKE '%$name%' AND apellido_paterno LIKE '%$ap%' ORDER BY nombres";
		}else{
			$sqlp="SELECT idcliente, nombres,apellido_paterno,apellido_materno FROM cliente ORDER BY nombres";
		}
			
		
		
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
				while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}

		return $rowp;
	}
	function update($id,$nom,$ap,$am,$rfc,$tel,$dmc,$rfr){

		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sqlIP="UPDATE cliente SET nombres='$nom',apellido_paterno='$ap',apellido_materno='$am',rfc='$rfc',tel='$tel',domicilio='$dmc',referencia='$rfr' WHERE idcliente='$id'";
		$statement=$conexion->prepare($sqlIP);
		if($statement->execute()){

			echo "Proceso finalizado con exito";
		}else{
			echo '!Ha ocurrido un error!</div>';

		}

	

}
	function isMoroso($id){
		$res=false;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowp="";
		$sqlp="SELECT idmoroso FROM moroso WHERE idCliente='$id' and status=1";
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}
				
				if (isset($rowp[0])) {

					$res=true;
				}
			return $res;

	}
	function getClienteID($id){
			
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowp="";
		
			$sqlp="SELECT *FROM cliente WHERE idcliente='$id'";
		
			
		
		
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
				while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}

		return $rowp;
	}

		
	}

?>