<?php

/**
* 
*/
class Ventas_Modelo extends conexion
{
	 function create($fv,$mp,$tp,$idc,$vt,$pp,$dtll,$user){

	 	$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sqlcp="INSERT INTO ventaa VALUES('',0,'$fv','$idc','$mp','$vt','$pp','$tp','$dtll','$user','0000-00-00')";
		$statement=$conexion->prepare($sqlcp);
			if ($statement->execute()) {
				# code...
			}else{
				echo "Ha ocurrido un error-capa3!";
			}
	 }
	 function getIv(){
	 	$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT  idventa_a FROM ventaa ORDER BY idventa_a DESC";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}
		return $rowp[0][0];
	 }


	 function pagoInicial($idv,$tt,$cAb,$fecha,$cdor){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="INSERT INTO abonoa VALUES('',$idv,'$tt','$cAb','$cAb','$fecha','$cdor')";
		$statement=$conexion->prepare($sql);
		$statement->execute();
	}
	function abonar($idv,$tt,$cAb,$ttpdo,$fecha,$cdor){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="INSERT INTO abonoa VALUES('',$idv,'$tt','$cAb','$ttpdo','$fecha','$cdor')";
		$statement=$conexion->prepare($sql);
		$statement->execute();
	}
	
	function getVenta($ac,$idv,$mcp,$name,$apllp){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowv="";
		$sql="SELECT  * FROM ventaa a, cliente b WHERE a.cliente=b.idcliente AND  a.tipo_pago NOT LIKE 'NO APLICA' AND a.tipo_pago NOT LIKE 'CANCELADO' AND a.f_term_pago='0000-00-00' ORDER BY a.idventa_a ASC";
		if($ac==1){
			$sql="SELECT * FROM ventaa a, cliente b  WHERE a.cliente=b.idcliente AND  a.tipo_pago NOT LIKE 'NO APLICA' AND a.tipo_pago NOT LIKE 'CANCELADO' AND a.f_term_pago='0000-00-00' AND a.idventa_a='$idv'ORDER BY  a.idventa_a ASC";
		}
		if($ac==2){
			$sql="SELECT *FROM ventaa a, cliente b WHERE a.cliente=b.idcliente AND b.domicilio LIKE '%$mcp%'AND b.nombres LIKE '%$name%' AND  b.apellido_paterno LIKE '%$apllp%' AND a.tipo_pago NOT LIKE 'NO APLICA' AND a.tipo_pago NOT LIKE'CANCELADO' AND a.f_term_pago='0000-00-00' ORDER BY a.idventa_a ASC";
		}
		if($ac==3){
			$sql="SELECT * FROM ventaa a, cliente b  WHERE a.cliente=b.idcliente AND  a.tipo_pago NOT LIKE 'NO APLICA' AND a.tipo_pago NOT LIKE 'CANCELADO' AND a.idventa_a='$idv'ORDER BY  a.idventa_a ASC";
		}

		
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
	 return $rowv;
	}

	function cantDias($diaVta){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT DATEDIFF(NOW(), '$diaVta') AS DIAS";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
		return $rowv[0]['DIAS'];
			}
			function getAbono($idv){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT *FROM abonoa WHERE ventaa_idventa_a='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
		return $rowv;
	}
	function updateVenta($idv,$mpgdo,$ftp){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE ventaa SET monto_pagado='$mpgdo',f_term_pago=$ftp WHERE idventa_a='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		
	}
	function createDtlle($idv,$des){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE ventaa SET detalle_venta='$des' WHERE idventa_a='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		echo "1";
		
	}
	function updateVentaf($idv,$ttv){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE ventaa SET total_venta='$ttv' WHERE idventa_a='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		
	}
	function insertarAbono($idv,$fcha,$tt,$cAb,$ttpdo,$cdor){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		
		if($fcha=="NOW()"){
			$sql="INSERT INTO abonoa VALUES('',$idv,'$tt','$cAb','$ttpdo',NOW(),'$cdor')";
		}else{
			$sql="INSERT INTO abonoa VALUES('',$idv,'$tt','$cAb','$ttpdo','$fcha','$cdor')";
		}
		$statement=$conexion->prepare($sql);
		$statement->execute();
	}
	function anular($idv){
	 		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
				$sql="UPDATE ventaa SET tipo_pago='CANCELADO' WHERE idventa_a='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		echo 1;
	 }
	 function getNtf($idv){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT *FROM notificobro WHERE idVenta='$idv' AND descripcion NOT LIKE 'COBRAR' AND tipo=0";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
				return $rowv;
			}

		function notificar($idv,$des,$fcha){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="INSERT INTO notificobro VALUES('',$idv,0,'$des','$fcha','ac',0)";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		echo "1";


				}
		function getCantAbo($idv){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT COUNT(*) FROM abonoa WHERE ventaa_idventa_a='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
		return $rowv[0][0];

	}

}


?>