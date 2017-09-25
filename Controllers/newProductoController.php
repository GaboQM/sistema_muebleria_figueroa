<?php 
session_start();
		if($_SESSION){
			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/ProductoModelo.php') ;
				if($_GET['action']=='getCateg'){
						mostrarCat();

						
						}
				if ($_GET['action']=='getMRK') {
						mostrarMarca();
						}
				if($_GET['action']=='create'){
						createProducto();

						}
				if($_GET['action']=='kr'){
					$key=$_GET['key'];
					$dataKey= new ProductoModelo();

					$dataKey->isKey($key);

				}

			}else{
				include('Views/productos/newProducto.php');
			}

		}else{
			echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
		}

		function createProducto(){
				$categoria=strtoupper($_GET['ctg']);
				$marca=strtoupper($_GET['mrk']);
				$clave=strtoupper($_GET['key']);
				$descripcion=strtoupper($_GET['des']);
				$precioVC=$_GET['pvc'];
				$desc=$_GET['desc'];
				$p2p=$_GET['p2p'];
				$p3p=$_GET['p3p'];
				$p4p=$_GET['p4p'];
				$p_credito=$_GET['crd'];
				$enganche=$_GET['eng'];
				$semanal=$_GET['sm'];
				$quincenal=$_GET['qm'];
				$mensual=$_GET['ms'];

				if (($categoria!="ELIJA UNA CATEGORIA:") & ($marca!="ELIJA UNA MARCA:") & !empty($clave) & !empty($descripcion) & !empty($precioVC) & !empty($desc) & !empty($p2p) & !empty($p3p) & !empty($p4p) & !empty($p_credito) & !empty($enganche) & !empty($semanal) & !empty($quincenal) & !empty($mensual) & is_numeric($precioVC) & is_numeric($desc) & is_numeric($p2p) & is_numeric($p3p) & is_numeric($p4p) & is_numeric($p_credito) & is_numeric($enganche) & is_numeric($semanal) & is_numeric($quincenal) & is_numeric($mensual)) {

						$dataProducto=new ProductoModelo();
						$data=$dataProducto->create($categoria,$marca,$clave,$descripcion,$precioVC,$desc,$p2p,$p3p,$p4p,$p_credito,$enganche,$semanal,$quincenal,$mensual);
				}else{
					echo '<div class="alert alert-dismissible alert-danger">
			<strong> No fue posible procesar la peticion, revise bien los datos introducido...</strong> </div>';
				}

			
		}
		function mostrarCat(){
			require('../Models/CategoriaModelo.php');
			$dataCategoria=new CategoriaModelo();
			$data=$dataCategoria->getCategoria();
			$res1="";
			$res1.='<select id="ctg" onchange="bsgtg(ctg)" class="form-control">';
			$res1.="<option>Elija una categoria:</option>";
			foreach ($data as $data) {
				$res1.="<option>".$data['nombre']."</option>";
			}
			$res1.='</select>';
			echo $res1;
	}
		function mostrarMarca(){
			require('../Models/MarcaModelo.php');
			$dataMarca=new MarcaModelo();
			$data=$dataMarca->getMarca();
			$res="";
			$res.='<select id="mrk" onchange="bsmrk(mrk)" class="form-control">';
			$res.="<option>Elija una marca:</option>";
			foreach ($data as $data) {
				$res.="<option>".$data['nombre']."</option>";
			}
			$res.='</select>';
			echo $res;

		}



/*
is_numeric()
is_float();
*/