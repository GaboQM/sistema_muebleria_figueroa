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
				if($_GET['action']=='edit'){
					$idp=$_GET['id'];
					viewEDIT($idp);
				}
				if ($_GET['action']=='gmk') {
					# code...
					mostrarMarca();
				}
				if ($_GET['action']=='getCtg') {
					# code...
					mostrarCat();

				}
				if ($_GET['action']=='upd') {
					# code...
					updateP();

				}

			}else{
				
				include('Views/productos/updateProducto.php');
				

			}



		}else{

			echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');


		}

			function updateP(){
				$idp=$_GET['idp'];
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
				if (!empty($clave) & !empty($descripcion) & !empty($precioVC) & !empty($desc) & !empty($p2p) & !empty($p3p) & !empty($p4p) & !empty($p_credito) & !empty($enganche) & !empty($semanal) & !empty($quincenal) & !empty($mensual) & is_numeric($precioVC) & is_numeric($desc) & is_numeric($p2p) & is_numeric($p3p) & is_numeric($p4p) & is_numeric($p_credito) & is_numeric($enganche) & is_numeric($semanal) & is_numeric($quincenal) & is_numeric($mensual)) {

						$dataProducto=new ProductoModelo();
						$data=$dataProducto->update($idp,$categoria,$marca,$clave,$descripcion,$precioVC,$desc,$p2p,$p3p,$p4p,$p_credito,$enganche,$semanal,$quincenal,$mensual);
				}else{
					echo '<div class="alert alert-dismissible alert-danger">
			<strong> No fue posible procesar la peticion, revise bien los datos introducidos...</strong> </div>';
				}
			}


			function mostrarCat(){
			require('../Models/CategoriaModelo.php');
			$dataCategoria=new CategoriaModelo();
			$data=$dataCategoria->getCategoria();
			$res1="";
			$res1.='<select id="ctg"  class="form-control">';
			$res1.="<option>Cambiar a la categoria:</option>";
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
			$res.='<select id="mrk"  class="form-control">';
			$res.="<option>Cambiar a la marca:</option>";
			foreach ($data as $data) {
				$res.="<option>".$data['nombre']."</option>";
			}
			$res.='</select>';
			echo $res;

		}

		function add($idp,$cant){
			$datap=new ProductoModelo();
			$ct=$datap->getCant($idp);
			$ct=$ct+$cant;
			$datap->updateCantP($idp,$ct);


		}
		function minus($idp,$cant){
			$datap=new ProductoModelo();
			$ct=$datap->getCant($idp);
			if($ct<$cant){
				$ct=$ct+$cant;
			$datap->updateCantP($idp,0);

			}else{
				$ct=$ct-$cant;
			$datap->updateCantP($idp,$ct);
			}


		}
		 function viewEDIT($idp){
		 	$arrayP="";
		 	$view="";
		 	$datap=new ProductoModelo();
		 	$data=$datap->getProductoID($idp);
		 	foreach ($data as $data) {
		 		$arrayP=$data;
		 		# code...
		 	}

		 	$view.='<div class="form-group">
                  <table class="table table-striped table-advance table-hover">
                    
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                   <td><div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">CATEGORIA:</label>
                                <div id="ctgo" class="col-sm-12">
                                    
                                </div>
                            </div></td>
                  <td><div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">MARCA:</label>
                                <div id="mrko" class="col-sm-12">
                                    
                                </div>
                            </div></td>
                             <td><div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">CLAVE: </label>
                                <div class="col-sm-12">
                                    <input type="text" id="key" onkeyup="keyRepeat_1()" value="'.$arrayP['clave'].'"  class="form-control">
                                    <div  id= "kr_1" class="form-group"></div>
                                </div>
                                
                            </div>
                  </td>
								</tr>
                   </tbody>
                 </table>';
              $view.='<table class="table table-striped table-advance table-hover">
                    
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                    <td><div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">DESCRIPCION:</label>
                                <div class="col-sm-12">
                                    <input type="text" id="des"  value="'.$arrayP['descripcion'].'" class="form-control">
                                </div>
                            </div>
                  </td> 
                    </tr>
                   </tbody>
                 </table>
                  <table class="table table-striped table-advance table-hover">
                    
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                  <td><div class="form-group">
                                <label  class="col-sm-6 col-sm-6 control-label">$PRECIO CONTADO:</label>
                                <div class="col-sm-12">
                                    <input  id="pctd" required="required" value="'.$arrayP['p_contado'].'" class="form-control">
                                </div>
                            </div>
                  </td>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$DESCUENTO-CONTADO:</label>
                                <div class="col-sm-12">
                                    <input  id="dctd" required="required"  value="'.$arrayP['descuento'].'"  class="form-control">
                                </div>
                            </div>
                  </td>

                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$PRECIO CREDITO: </label>
                                <div class="col-sm-12">
                                    <input  id="pcrd" value="'.$arrayP['p_credito'].'"  placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label"> $ENGANCHE-CREDITO: </label>
                                <div class="col-sm-12">
                                    <input  id="ecrd" required="required" value="'.$arrayP['enganche'].'"    class="form-control">
                                </div>
                            </div>
                  </td>

                  </tr>
                  <tr></tr>
                    <tr>
          
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">SEMANAL:</label>
                                <div class="col-sm-12">
                                    <input  id="psm" value="'.$arrayP['semanal'].'"   placeholder="0.0" class="form-control">
                                </div>
                            </div>
                  </td>

                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">QUINCENAL: </label>
                                <div class="col-sm-12">
                                    <input  id="pqm" value="'.$arrayP['quincenal'].'"   placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">MENSUAL: </label>
                                <div class="col-sm-12">
                                    <input  id="pms" value="'.$arrayP['mensual'].'"   placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  </tr>
                  <tr>
                    
                  </tr>
                    <tr>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$ EN 2 PAGOS:</label>
                                <div class="col-sm-12">
                                    <input  id="p2" value="'.$arrayP['p2pagos'].'"   placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$ EN 3 PAGOS:</label>
                                <div class="col-sm-12">
                                    <input  id="p3" value="'.$arrayP['p3pagos'].'" class="form-control">
                                </div>
                            </div>
                  </td>

                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$ EN 4 PAGOS: </label>
                                <div class="col-sm-12">
                                    <input  id="p4" required="required" value="'.$arrayP['p4pagos'].'"   class="form-control">
                                </div>
                            </div>
                  </td>
                  </tr>
                   </tbody>
                 </table>
                 <center>
                    
                      <button id="upd" onclick="upd();" type="button"  style="width:150px" class="btn btn-round btn-danger"  > <i class="fa fa-save  fa-lg"  > Actualizar</i></button>
                    </center>
';
              $view.='</div>';

            echo $view;



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
                        <th><i ></i>DESCRIPCION</th> 
                        <th><i ></i>EDITAR</th> 
                        </tr> 
                    </thead>
                    <tbody>';
           			foreach ($data as $data) {
           				$ctg=$datap->getNameCTG($data['categoria']);
           				$mrk=$datap->getNameMRK($data['marca_id_marca']);
           				$cnt=$datap->getCant($data['idproducto']);
           			$table.='<tr>';
           			$table.='<td>'.$data['idproducto'].'</td>';
           			$table.='<td>'.$ctg.'</td>';
           			$table.='<td>'.$mrk.'</td>';
           			$table.='<td>'.$data['clave'].'</td>';
           			
           			$table.='<td>'.$data['descripcion'].'</td>';
           		
           				$table.='<td> <a > <button onclick=redid('.$data['idproducto'].'); class="btn btn-danger btn-sm"><i class="fa fa-edit fa-lg"></i></button></a></td>';

           			




           			$table.='</tr>';
           				# code...
           			}




     $table.='</tbody>
                 </table>';

                

                echo $table;




			}