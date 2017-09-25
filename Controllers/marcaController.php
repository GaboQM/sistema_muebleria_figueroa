<?php

	session_start();
	
	
		if($_SESSION){

			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/MarcaModelo.php');


				if($_GET['action']=='getMRK'){
						mostrarMarca();
				}
				if($_GET['action']=='update' and !empty($_GET['mrkN'])){

						updateMarca();
				}
				if($_GET['action']=='add' and !empty($_GET['mrk'])){
					agregarMarca();
				}	
				if ($_GET['action']=='delete') {
					# code...
					eliminarMarca();
					echo "hello!";
				}

			}else{
			include('Views/productos/marca.php');
		}

				}else{

					echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
				}
	function eliminarMarca(){
		$dataMarca=new MarcaModelo();
		$dmrk=$_GET['dmrk'];
		$dataMarca->delete($dmrk);
	}
	function agregarMarca(){
		$dataMarca=new MarcaModelo();
		$mrk=strtoupper($_GET['mrk']);
		$dataMarca->addMrk($mrk);
		}
	function updateMarca(){
		$dataMarca=new MarcaModelo();
		$id=$_GET['idMRK'];
		$nmrk=strtoupper($_GET['mrkN']);
		$dataMarca->update($id,$nmrk);

			}

	function mostrarMarca(){
			$dataMarca=new MarcaModelo();
			$data=$dataMarca->getMarca();
			$marcaID="marcaID";
			$actualizar="actualizar";
			$borrar="borrar";

	$table="";
				 $table.='<table class="table table-striped table-advance table-hover">
                    <hr>
                    <thead>
                      <tr>
                        <th><i ></i> ID</th>
                        <th><i ></i> MARCA</th>
                        <th><i ></i>EDITAR</th>
                        <th><i ></i>ELIMINAR</th>
                        <th><i ></i>ACTUALIZAR</th> </tr> 
                    </thead>
                    <tbody>';

           			foreach ($data as $data) {
           			$table.='<tr>';
           			$table.='<td>'.$data['id_marca'].'</td>';
           			$table.='<td id="'.$marcaID.$data['id_marca'].'">'.$data['nombre'].'</td>';
           			$table.='<td> <button id="'.$data['id_marca'].'"  onclick="editarMarca(this.id)" class="btn btn-danger btn-sm"><i class="fa fa-edit fa-lg" ></i></button> </td>' ;
           			$table.='<td> <button id="'.$borrar.$data['id_marca'].'"  onclick="borrarMarca('.$data['id_marca'].')" class="btn btn-danger btn-sm"><i class="fa fa-times fa-lg" ></i></button> </td>' ;

					$table.='<td> <button id="'.$actualizar.$data['id_marca'].'"  onclick="actualizarMarca('.$data['id_marca'].')" class="btn btn-danger btn-sm" style="display:none;" ><i class="fa fa-refresh  fa-lg"  > </i></button> </td>' ;




           			$table.='</tr>';
           				# code...
           			}




     $table.='</tbody>
                 </table>';

                

                echo $table;
}



?>