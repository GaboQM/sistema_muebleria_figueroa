<?php 
session_start();
		if($_SESSION){
			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/MorosoModelo.php') ;
				require('../Models/ClienteModelo.php') ;
				if ($_GET['action']=='gCM') {


						gCM($_GET['name'],$_GET['ap']);
					
				}
				if ($_GET['action']=='ccm') {
					ccm(intval($_GET['idc']),$_GET['ntj'],$_GET['vt'],$_GET['pdo'],$_GET['dv'],1);
					}
				if ($_GET['action']=='dlt') {
					liberar($_GET['id']);
					}
				

			}else{
				include('Views/clientes/clientesMorosos.php');
			}

		}else{
			echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
		}

	function liberar($id){
		$dataCliente=new MorosoModelo();
			$data=$dataCliente->liberar($id);
	}
	function gnameC($id){
		$res="";
		$dataCliente=new ClienteModelo();
			$data=$dataCliente->getClienteID($id);
			foreach ($data as $data) {
				$res= $data['nombres']." ".$data['apellido_paterno']." ".$data['apellido_materno'];
			}
		return $res;
	}

		function ccm($id,$nt,$ctd,$pgd,$des,$st){
			
			if (is_numeric($nt)and is_numeric($ctd) and is_numeric($pgd) and !($des==="")) {
							
							$dataCliente=new MorosoModelo();
							$data=$dataCliente->createM($id,$nt,$ctd,$pgd,$des,$st);
			}else{
				echo "No fue posible añadir el cliente, revise y rellene bien los dados";
			}
	}

	function gCM($name,$ap){

			$dataCliente=new MorosoModelo();
			$data=$dataCliente->getMorosos($name,$ap);
	$view="";
	$view .='<table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th><i ></i> Tarjeta</th>
                        <th ><i ></i>CLIENTE</th>
                        <th><i ></i>VENTA</th>
                        <th><i ></i>PAGADO</th>
                        <th><i ></i>DEBE</th>
                        <th><i ></i>DETALLE</th>
                        <th><i ></i>LIBERAR</th>
                    </thead>
                    <tbody>';
    							foreach ($data as $data) {
                      $view.='<tr>';

                    $view.='<td>'.$data['idventa'].'</td>';
                      $view.='<td>'.$data['nombres']." ".$data['apellido_paterno']." ".$data['apellido_materno'].'</td>';
                      $view.='<td>'.$data['cantidad'].'</td>';
                      $view.='<td>'.$data['pagado'].'</td>';
                      $view.='<td>'.($data['cantidad']-$data['pagado']).'</td>';
                      $view.='<td>'.$data['descripcion'].'</td>';
                  
                    
                     
                       $view.='<td> <a > <button onclick=liberar('.$data['idmoroso'].'); class="btn btn-danger btn-sm"><i class="fa fa-edit fa-lg"></i></button></a></td>';

                      $view.='</tr>';
                    }

               
              $view.= '</tbody>
                 </table>';



         echo $view;
		}

