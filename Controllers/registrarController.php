<?php 
session_start();
		if($_SESSION){
			
			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				if($_GET['action']=='reg'){

						registrar($_GET['dd'],$_GET['mm'],$_GET['aa'],$_GET['mp'],$_GET['tp'],$_GET['idc'],$_GET['vt'],$_GET['pp'],$_GET['dtll']);
				}
       
				

				}else{
				include('Views/ventas_/registrar.php');
				}
		}else{
			echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
		}

	function getNmm($mest){
		$mes="";
switch ($mest) {
	case 'ENERO':
		$mes='01';
		break;
	case 'FEBRERO':
		$mes='02';
		break;
	case 'MARZO':
		$mes='03';
		break;
	case 'ABRIL':
		$mes='04';
		break;
	case 'MAYO':
		$mes='05';
		break;
	case 'JUNIO':
		$mes='06';
		break;
	case 'JULIO':
		$mes='07';
		break;
	case 'AGOSTO':
		$mes='08';
		break;
	case 'SEPTIEMBRE':
		$mes='09';
		break;
	case 'OCTUBRE':
		$mes='10';
		break;
	case 'NOVIEMBRE':
		$mes='11';
		break;
	case 'DICIEMBRE':
		$mes='12';
		break;
}
		return $mes;
	}
	function registrar ($dd,$mm,$aa,$mp,$tp,$idc,$vt,$pp,$dtll){

	if (($dd != "SELECCIONE EL DIA") and ($mm != "SELECCIONE EL MES") and ($aa != "SELECCIONE AÑO")
		and ($mp!="MODO DE PAGO") and ($tp!="TIEMPO DE PAGO") and ($idc!="SELECCIONE EL CLIENTE") and is_numeric($vt) and is_numeric($pp) and ($dtll!="")) {
		$idc=intval($idc);
		$fv=$aa.'-'.getNmm($mm).'-'.$dd;
		require('../Models/Ventas_Modelo.php');
			$dataVentas=new Ventas_Modelo();
			$data=$dataVentas->create($fv,$mp,$tp,$idc,$vt,$pp,$dtll,$_SESSION['usuario']);
			$dataVentas->pagoInicial($dataVentas->getIv(),$vt,$pp,$fv,$_SESSION['usuario']);
	echo $dataVentas->getIv();



		

	}else{
		echo "Llene correctamente los campos de datos. Error C2!";
		
	}



	}




?>