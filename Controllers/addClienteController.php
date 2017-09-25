<?php 
session_start();
		if($_SESSION){
			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/ClienteModelo.php') ;
				if ($_GET['action']=='create') {

					# code...
					guardarCliente();
				}
				
				

			}else{
				include('Views/clientes/addClientes.php');
			}

		}else{
			echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
		}

 function guardarCliente(){
 	$dir=$_GET['mpo']."/".$_GET['dmc'];
 	if(!empty($_GET['name']) and !empty($_GET['aP']) and !empty($_GET['aM']) and !empty($_GET['mpo']) and !empty($_GET['dmc'])){
 		$dataCliente= new ClienteModelo();
 		$dataCliente->create(strtoupper($_GET['name']),strtoupper($_GET['aP']),strtoupper($_GET['aM']),strtoupper($_GET['rfc']),strtoupper($_GET['tel']),strtoupper($dir),strtoupper($_GET['rfn']));

 	}else{
 		
 	}

 }