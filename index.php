<?php
$ruta=array();
if(isset($_GET['view'])){
	$rutas=explode("/",$_GET['view']);
	if (file_exists('Controllers/'.$rutas[0].'Controller.php')) {
		
		include('Controllers/'.$rutas[0].'Controller.php');
		
		
	}else{
		require('Controllers/errorController.php');

	}

	
	
}else{
	
	require('Controllers/indexController.php');
	}



?>