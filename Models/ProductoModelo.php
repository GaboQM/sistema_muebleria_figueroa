<?php
/**
* 
*/

class ProductoModelo extends conexion
{
	/*
		
	*/
	function update($idp,$categoria,$marca,$clave,$descripcion,$p_contado,$descuento,$p2pagos,$p3pagos,$p4pagos,$p_credito,$enganche,$semanal,$quincenal,$mensual){

	if($categoria=='CAMBIAR A LA CATEGORIA:' and $marca=='CAMBIAR A LA MARCA:'){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		
		
		//insertar info producto
		$sqlIP="UPDATE producto SET clave='$clave',descripcion='$descripcion',p_contado='$p_contado',descuento='$descuento',p2pagos='$p2pagos',p3pagos='$p3pagos',p4pagos='$p4pagos',p_credito='$p_credito',enganche='$enganche',semanal='$semanal',quincenal='$quincenal',mensual='$mensual' WHERE idproducto='$idp'";
		$statement=$conexion->prepare($sqlIP);
		if($statement->execute()){

			echo 'Proceso finalizado con exito!';
		}else{
			echo 'Ha ocurrido un error! C3';

		}

	}
	if($categoria=='CAMBIAR A LA CATEGORIA:' and $marca!='CAMBIAR A LA MARCA:'){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();

			//obt marca id
		$rowmrk=null;
		$sqlmrk="SELECT  id_marca FROM marca WHERE nombre='$marca'";
		$statement=$conexion->prepare($sqlmrk);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rowmrk[]=$result;
		}
			
			$id_m=$rowmrk[0][0];
		
		//insertar info producto
		$sqlIP="UPDATE producto SET marca_id_marca='$id_m',clave='$clave',descripcion='$descripcion',p_contado='$p_contado',descuento='$descuento',p2pagos='$p2pagos',p3pagos='$p3pagos',p4pagos='$p4pagos',p_credito='$p_credito',enganche='$enganche',semanal='$semanal',quincenal='$quincenal',mensual='$mensual' WHERE idproducto='$idp'";
		$statement=$conexion->prepare($sqlIP);
		if($statement->execute()){

			echo '<div class="alert alert-dismissible alert-success">
			<strong> Producto agregado!...</strong> </div>';
		}else{
			echo '<div class="alert alert-dismissible alert-danger">
			<strong> !Ha ocurrido un error!</strong> </div>';

		}

	}
	if($categoria!='CAMBIAR A LA CATEGORIA:' and $marca=='CAMBIAR A LA MARCA:'){
			$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowctg=null;
		$sqlctg="SELECT idcategoria FROM categoria WHERE nombre='$categoria'";
		$statement=$conexion->prepare($sqlctg);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rowctg[]=$result;
		}

		$idctg=$rowctg[0][0];
		//insertar info producto
		$sqlIP="UPDATE producto SET categoria='$idctg',clave='$clave',descripcion='$descripcion',p_contado='$p_contado',descuento='$descuento',p2pagos='$p2pagos',p3pagos='$p3pagos',p4pagos='$p4pagos',p_credito='$p_credito',enganche='$enganche',semanal='$semanal',quincenal='$quincenal',mensual='$mensual' WHERE idproducto='$idp'";
		$statement=$conexion->prepare($sqlIP);
		if($statement->execute()){

			echo '<div class="alert alert-dismissible alert-success">
			<strong> Producto agregado!...</strong> </div>';
		}else{
			echo '<div class="alert alert-dismissible alert-danger">
			<strong> !Ha ocurrido un error!</strong> </div>';

		}


	}
		
	if($categoria!='CAMBIAR A LA CATEGORIA:' and $marca!='CAMBIAR A LA MARCA:'){

		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowctg=null;
		$sqlctg="SELECT idcategoria FROM categoria WHERE nombre='$categoria'";
		$statement=$conexion->prepare($sqlctg);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rowctg[]=$result;
		}

			//obt marca id
		$rowmrk=null;
		$sqlmrk="SELECT  id_marca FROM marca WHERE nombre='$marca'";
		$statement=$conexion->prepare($sqlmrk);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rowmrk[]=$result;
		}
			$idctg=$rowctg[0][0];
			$id_m=$rowmrk[0][0];
		
		//insertar info producto
		$sqlIP="UPDATE producto SET categoria='$idctg',marca_id_marca='$id_m',clave='$clave',descripcion='$descripcion',p_contado='$p_contado',descuento='$descuento',p2pagos='$p2pagos',p3pagos='$p3pagos',p4pagos='$p4pagos',p_credito='$p_credito',enganche='$enganche',semanal='$semanal',quincenal='$quincenal',mensual='$mensual' WHERE idproducto='$idp'";
		$statement=$conexion->prepare($sqlIP);
		if($statement->execute()){

			echo '<div class="alert alert-dismissible alert-success">
			<strong> Producto agregado!...</strong> </div>';
		}else{
			echo '<div class="alert alert-dismissible alert-danger">
			<strong> !Ha ocurrido un error!</strong> </div>';

		}

	}
		

	}

	function create($categoria,$marca,$clave,$descripcion,$p_contado,$descuento,$p2pagos,$p3pagos,$p4pagos,$p_credito,$enganche,$semanal,$quincenal,$mensual){
			//obt categoria id
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowctg=null;
		$sqlctg="SELECT idcategoria FROM categoria WHERE nombre='$categoria'";
		$statement=$conexion->prepare($sqlctg);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rowctg[]=$result;
		}

			//obt marca id
		$rowmrk=null;
		$sqlmrk="SELECT  id_marca FROM marca WHERE nombre='$marca'";
		$statement=$conexion->prepare($sqlmrk);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rowmrk[]=$result;
		}
			$idctg=$rowctg[0][0];
			$id_m=$rowmrk[0][0];
		
		//insertar info producto
		$sqlIP="INSERT INTO producto VALUES ('','$idctg','$id_m','$clave','$descripcion','$p_contado','$descuento','$p2pagos','$p3pagos','$p4pagos','','$p_credito','$enganche','$semanal','$quincenal','$mensual')";
		$statement=$conexion->prepare($sqlIP);
		if($statement->execute()){
			sleep(1);
				// search key in the product
			$rowp=null;
			$sqlp="SELECT idproducto FROM producto WHERE clave='$clave'";
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
				while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}

				$rowp2=$rowp[0][0];
			//alta al almacen

				$sqla="INSERT INTO almacen (cantidad,producto_idproducto) VALUES(0,'$rowp2')";
			$statement=$conexion->prepare($sqla);
			$statement->execute();

			echo '<div class="alert alert-dismissible alert-success">
			<strong> Producto agregado!...</strong> </div>';
		}else{
			echo '<div class="alert alert-dismissible alert-danger">
			<strong> !Ha ocurrido un error!</strong> </div>';

		}
		

	}

	function getNameCTG($idctg){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$row="";
		$sqlp="SELECT nombre FROM categoria WHERE idcategoria='$idctg'";
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$row[]=$result;
				}
			return $row[0][0];
	}
	function getNameMRK($idmrk){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$row="";
		$sqlp="SELECT nombre FROM marca WHERE id_marca='$idmrk'";
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$row[]=$result;
				}
		
			return $row[0][0];
		
	}
	function getCant($id){
			$modelo= new conexion();
			$conexion=$modelo->get_conexion();
			$rowp="";
			$sqlp="SELECT cantidad FROM almacen WHERE producto_idproducto='$id'";
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
				while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}
				
		 	return $rowp;
	}
	
	function updateCantP($idp,$cant){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sqlp="UPDATE almacen SET cantidad='$cant' WHERE producto_idproducto='$idp'";
			$statement=$conexion->prepare($sqlp);
			if($statement->execute()){
				echo '<div class="alert alert-dismissible alert-success">

						<center><strong> Operacion realizado con exito.[id de producto:'.$idp.']</center></strong> 
						</div>';

			}else{
				echo '<div class="alert alert-dismissible alert-danger">

						<center><strong> No fue posible realizar la Operacion</center></strong> 
						</div>';

			}


	}
	function isKey($key){
		$rows=null;
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sql="SELECT idproducto FROM producto WHERE clave='$key'";
		$statement=$conexion->prepare($sql);
		$statement->execute();
		while ($result=$statement->fetch()) {
			$rows[]=$result;
		}

		if($rows[0]){

			echo "<span style=' color: red;'>Este clave ya existe, no se acepta clave repetida</span>";
		}else{

			echo "<span style=' color: green;'> Clave valido</span>";

		}

	}
	function getProductoID($idp){
		$rowp="";
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$sqlp="SELECT * FROM producto WHERE idproducto='$idp'";
		$statement=$conexion->prepare($sqlp);
			$statement->execute();
				while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}

		return $rowp;
	}
	function getProducto($action,$codigo,$ctg,$mrk){
		$modelo= new conexion();
		$conexion=$modelo->get_conexion();
		$rowp="";
		if($action==1){
			$sqlp="SELECT * FROM producto";
		}
		if ($action==2) {
			$sqlp="SELECT* FROM producto a, almacen b WHERE a.clave LIKE '%$codigo%' and  a.idproducto=b.producto_idproducto";
		}
		if ($action==3) {
		///obtener id ctg
			$row_="";
		$sqlp="SELECT idcategoria FROM categoria WHERE nombre='$ctg'";
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$row_[]=$result;
				}
				$idctg=$row_[0][0];
			$sqlp="SELECT* FROM producto a, almacen b WHERE a.categoria='$idctg' and  a.idproducto=b.producto_idproducto";
		}
		if ($action==4) {
		///obtener id ctg
			$row_="";
		$sqlp="SELECT idcategoria FROM categoria WHERE nombre='$ctg'";
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$row_[]=$result;
				}
				$idctg=$row_[0][0];
			$row_M="";
		$sqlm="SELECT id_marca FROM marca WHERE nombre='$mrk'";
			$statement=$conexion->prepare($sqlm);
			$statement->execute();
			while ($result=$statement->fetch()) {
				$row_M[]=$result;
				}
				$idmrk=$row_M[0][0];
			$sqlp="SELECT* FROM producto a, almacen b WHERE a.categoria='$idctg' and a.marca_id_marca='$idmrk' and  a.idproducto=b.producto_idproducto";
		}
		
			$statement=$conexion->prepare($sqlp);
			$statement->execute();
				while ($result=$statement->fetch()) {
				$rowp[]=$result;
				}

		return $rowp;
	}

}

?>