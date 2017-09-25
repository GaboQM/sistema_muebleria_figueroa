<?php

	session_start();
	
	
		if($_SESSION){

			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/ProductoModelo.php') ;
				if($_GET['action']=='b'){
					$codigo='';
					//$codigo=$_GET['codigo'];
					$ctg='';
					$mrk='';

					bsk(1,$codigo,$ctg,$mrk);
				}
				
				if($_GET['action']=='bkey'){

					$codigo=$_GET['codigo'];
					$ctg='';
					$mrk='';
					bsk(2,$codigo,$ctg,$mrk);

				}
				if ($_GET['action']=='bctg') {

					if($_GET['ctg']!='Elija una categoria:'){
						# code...
					$codigo='';
					//$codigo=$_GET['codigo'];
					$ctg=$_GET['ctg'];
					$mrk='';
					bsk(3,$codigo,$ctg,$mrk);
					}

				}

				if ($_GET['action']=='cm') {

					if ($_GET['ctg']!='Elija una categoria:' & $_GET['mrk']!='Elija una marca:') {
						# code...
						$codigo='';
					//$codigo=$_GET['codigo'];
					$ctg=$_GET['ctg'];
					$mrk=$_GET['mrk'];
					bsk(4,$codigo,$ctg,$mrk);
					}
					# code...
				}
				if ($_GET['action']=='plus') {
					$idp=$_GET['idp'];
					$cant=$_GET['cant'];
					add($idp,$cant);
					
					# code...
				}
				if ($_GET['action']=='minus') {
					$idp=$_GET['idp'];
					$cant=$_GET['cant'];
					minus($idp,$cant);
					
					# code...
				}

			}else{
				include('Views/productos/addProducto.php');
			}



		}else{

			echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');


		}
		function add($idp,$cant){
			$datap=new ProductoModelo();
			$k=$datap->getCant($idp);
			$ct="";
			foreach ($k as $k) {
				$ct=$k['cantidad'];
			}
			$ct=$ct+$cant;
			$datap->updateCantP($idp,$ct);


		}
		function minus($idp,$cant){
			$datap=new ProductoModelo();
			$k=$datap->getCant($idp);
			$ct="";
			foreach ($k as $k) {
				$ct=$k['cantidad'];
			}
			if($ct<$cant){
				$ct=$ct+$cant;
			$datap->updateCantP($idp,0);

			}else{
				$ct=$ct-$cant;
			$datap->updateCantP($idp,$ct);
			}


		}
		function bsk($action,$codigo,$ctg,$mrk){

				$datap=new ProductoModelo();
			$data=$datap->getProducto($action,$codigo,$ctg,$mrk);

	$table="";
				 $table.='<table class="table table-striped table-advance table-hover">
                    <hr>
                    <thead>
                      <tr>
                        <th><i ></i> ID</th>
                        <th><i ></i> CATEGORIA</th>
                        <th><i ></i>MARCA</th>
                        <th><i ></i>CLAVE</th>
                        <th><i ></i>EXISTENCIA</th> 
                        <th><i ></i>DESCRIPCION</th> 
                        <th><i ></i>UNIDADES</th> 
                        <th><i ></i>ALTA/BAJA</th> 
                        </tr> 
                    </thead>
                    <tbody>';
           			foreach ($data as $data) {
           				$ctg=$datap->getNameCTG($data['categoria']);
           				$mrk=$datap->getNameMRK($data['marca_id_marca']);
           				$k=$datap->getCant($data['idproducto']);
           				$cnt="";
           				foreach ($k as $k) {
           					$cnt=$k['cantidad'];
           				}
           			$table.='<tr>';
           			$table.='<td>'.$data['idproducto'].'</td>';
           			$table.='<td>'.$ctg.'</td>';
           			$table.='<td>'.$mrk.'</td>';
           			$table.='<td>'.$data['clave'].'</td>';

           			$table.='<td>'.$cnt.'</td>';
           			
           			$table.='<td>'.$data['descripcion'].'</td>';
           			$table.=' <td><select id="'.$data['idproducto'].'" class="form-control">';
					$table.="<option>0</option><";
					$table.="<option>1</option><";
					$table.="<option>2</option><";
					$table.="<option>3</option><";
					$table.="<option>4</option><";
					$table.="<option>5</option><";
					$table.="<option>6</option><";
					$table.="</td>";
           			if($cnt>0){
           				$table.='<td> <a > <button onclick="plusP('.$data['idproducto'].') " class="btn btn-success btn-sm"><i class="fa fa-plus fa-lg"></i></button></a> 
           				<a > <button onclick="minusP('.$data['idproducto'].') " class="btn btn-danger btn-sm"><i class="fa fa-minus fa-lg"></i></button></a> </td>';

           			}else{
           				$table.='<td> <a > <button onclick="plusP('.$data['idproducto'].') " class="btn btn-warning btn-sm"><i class="fa fa-plus fa-lg"></i></button></a></td>';

           			}
           			
           			
           			




           			$table.='</tr>';
           				# code...
           			}




     $table.='</tbody>
                 </table>';

                

                echo $table;




			}