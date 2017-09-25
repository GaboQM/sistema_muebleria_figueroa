<?php

	session_start();
	
	
		if($_SESSION){

			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/CategoriaModelo.php');


				if($_GET['action']=='getCateg'){
						mostrarCat();
				}
				if($_GET['action']=='update' and !empty($_GET['ctgN'])){

						updateCtg();
				}
				if($_GET['action']=='add' and !empty($_GET['ctg'])){
					agregarCategoria();
				}	
				if ($_GET['action']=='delete') {
					# code...
					eliminarCategoria();
				}

			}else{
			include('Views/productos/categoria.php');
		}

				}else{

					echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
				}
	function eliminarCategoria(){
		$dataCategoria=new CategoriaModelo();
		$dctg=$_GET['ctgID'];
		$dataCategoria->delete($dctg);
	}
	function agregarCategoria(){
		$dataCategoria=new CategoriaModelo();
		$nCtg=strtoupper($_GET['ctg']);
		$dataCategoria->addCtg($nCtg);
		}
	function updateCtg(){
		$dataCategoria=new CategoriaModelo();
	
		$id=$_GET['idCtg'];
		$nCtg=strtoupper($_GET['ctgN']);
		$dataCategoria->update($id,$nCtg);

			}

	function mostrarCat(){
			$dataCategoria=new CategoriaModelo();
			$data=$dataCategoria->getCategoria();
			$categoriaID="categoriaID";
			$actualizar="actualizar";
			$borrar="borrar";

	$table="";
				 $table.='<table class="table table-striped table-advance table-hover">
                    <hr>
                    <thead>
                      <tr>
                        <th><i ></i> ID</th>
                        <th><i ></i> CATEGORIA</th>
                        <th><i ></i>EDITAR</th>
                        <th><i ></i>ELIMINAR</th>
                        <th><i ></i>ACTUALIZAR</th> </tr> 
                    </thead>
                    <tbody>';

           			foreach ($data as $data) {
           			$table.='<tr>';
           			$table.='<td>'.$data['idcategoria'].'</td>';
           			$table.='<td id="'.$categoriaID.$data['idcategoria'].'">'.$data['nombre'].'</td>';
           			$table.='<td> <button id="'.$data['idcategoria'].'"  onclick="editarCategoria(this.id)" class="btn btn-danger btn-sm"><i class="fa fa-edit fa-lg" ></i></button> </td>' ;
           			$table.='<td> <button id="'.$borrar.$data['idcategoria'].'"  onclick="borrarCategoria('.$data['idcategoria'].')" class="btn btn-danger btn-sm"><i class="fa fa-times fa-lg" ></i></button> </td>' ;

					$table.='<td> <button id="'.$actualizar.$data['idcategoria'].'"  onclick="actualizarCategoria('.$data['idcategoria'].')" class="btn btn-danger btn-sm" style="display:none;" ><i class="fa fa-refresh  fa-lg"  > </i></button> </td>' ;




           			$table.='</tr>';
           				# code...
           			}




     $table.='</tbody>
                 </table>';

                

                echo $table;
}



?>