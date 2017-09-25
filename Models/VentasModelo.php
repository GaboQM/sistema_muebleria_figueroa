<?php
/**
* 
*/
class VentasModelo extends conexion{
	function create($idc,$tp,$ttv,$mpg,$ftpg,$user,$tpg){
	 	$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sqlcp="INSERT INTO venta VALUES('',NOW(),'$idc','$tp','$ttv','$mpg',$ftpg,'$user','$tpg')";
		$statement=$conexion->prepare($sqlcp);
			$statement->execute();

	 }
	 function anular($idv){
	 		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
				$sql="UPDATE venta SET tipo_pago='CANCELADO' WHERE idventa='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		echo 1;
	 }

	 function createDtlle($pv,$cnt,$des,$idv,$idp){

	 		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sqlcp="INSERT INTO detalle_venta VALUES('','$pv','$cnt','$des','$idv','$idp')";
		$statement=$conexion->prepare($sqlcp);
			$statement->execute();
		
	 }
	 function getIv(){
	 	$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT  idventa FROM venta ORDER BY idventa DESC";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}
		return $rowp[0][0];
	 }

	 function actualizarAlmacen($idp,$add){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT  cantidad FROM almacen WHERE producto_idproducto='$idp'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}
		$ncnt=$rowp[0][0]-$add;

		$sqlu="UPDATE almacen SET cantidad='$ncnt' WHERE producto_idproducto='$idp'";
		$statement=$conexion->prepare($sqlu);
		$statement->execute();

	}	

	function getVenta($ac,$idv,$mcp,$name,$apllp){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowv="";
		$sql="SELECT  * FROM venta a, cliente b WHERE a.cliente_idcliente=b.idcliente AND  a.tipo_pago NOT LIKE 'NO APLICA' AND a.tipo_pago NOT LIKE 'CANCELADO' AND a.ftermino_pago='0000-00-00' ORDER BY a.idventa ASC";
		if($ac==1){
			$sql="SELECT * FROM venta a, cliente b  WHERE a.cliente_idcliente=b.idcliente AND  a.tipo_pago NOT LIKE 'NO APLICA' AND a.tipo_pago NOT LIKE 'CANCELADO' AND a.ftermino_pago='0000-00-00' AND a.idventa='$idv'ORDER BY  a.idventa ASC";
		}
		if($ac==2){
			$sql="SELECT *FROM venta a, cliente b WHERE a.cliente_idcliente=b.idcliente AND b.domicilio LIKE '%$mcp%'AND b.nombres LIKE '%$name%' AND  b.apellido_paterno LIKE '%$apllp%' AND tipo_pago NOT LIKE 'NO APLICA' AND tipo_pago NOT LIKE'CANCELADO' AND ftermino_pago='0000-00-00' ORDER BY a.idventa ASC";
		}
		if($ac==3){
			$sql="SELECT * FROM venta a, cliente b  WHERE a.cliente_idcliente=b.idcliente AND  a.tipo_pago NOT LIKE 'NO APLICA' AND a.tipo_pago NOT LIKE 'CANCELADO'  AND a.idventa='$idv'ORDER BY  a.idventa ASC";
		}
		
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
	 return $rowv;
	}
	function pagoInicial($idv,$tt,$cAb,$saldo,$user,$cdor){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="INSERT INTO abono VALUES('',$idv,'$tt','$cAb',NOW(),'$saldo',0,'$user','$cdor')";
		$statement=$conexion->prepare($sql);
		$statement->execute();
	}	
	function insertarAbono($idv,$tt,$cAb,$saldo,$user,$cdor){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="INSERT INTO abono VALUES('',$idv,'$tt','$cAb',NOW(),'$saldo',0,'$user','$cdor')";
		$statement=$conexion->prepare($sql);
		$statement->execute();
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
	function cantFD($diaVta){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT DATEDIFF('$diaVta',NOW()) AS DIAS";
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
		$sql="SELECT *FROM abono WHERE venta_idventa='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
		return $rowv;
	}
	function updateVenta($idv,$mpgdo,$ftp){
		
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE venta SET monto_pagado='$mpgdo',ftermino_pago=$ftp WHERE idventa='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
	}
	function updateVentaf($idv,$ttv){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE venta SET total_venta='$ttv' WHERE idventa='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
	}

	function getDetV($idv){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT *FROM detalle_venta WHERE venta_idventa='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
		return $rowv;
	}

	function updateDTLL($nprecio,$idDTLL){
		
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE detalle_venta SET precio_venta='$nprecio' WHERE iddetalle_venta='$idDTLL'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		echo "1";

	}
function updateVK($tv,$tp,$idv){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE venta SET total_venta='$tv',tipo_pago='$tp' WHERE idventa='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		echo "1";
		

	}
function getNtf($idv){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT *FROM notificobro WHERE idVenta='$idv' AND descripcion NOT LIKE 'COBRAR'AND tipo=1 ";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
		return $rowv;
}
	function getNtf_($des){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT *FROM notificobro WHERE estado='ac' AND descripcion LIKE '%$des%'";
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
		$sql="INSERT INTO notificobro VALUES('',$idv,1,'$des','$fcha','ac',0)";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		echo "1";
				}

	function getCantAbo($idv){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT COUNT(*) FROM abono WHERE venta_idventa='$idv'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}
		return $rowv[0][0];

	}

	function updateAb($id,$ac){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="UPDATE notificobro SET estado='$ac' WHERE idnotificobro='$id' ";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		echo 1;
	}

	function getDtllV($id){
		$rowv="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT *FROM detalle_venta a, producto b WHERE a.venta_idventa='$id' AND a.producto_idproducto=b.idproducto";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
				$rowv[]=$result;
				}

			return $rowv;
		}
		
}
	
	


?>