<?php

session_start();
	
		if($_SESSION){

			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/VentasModelo.php');
				if($_GET['action']=="load"){
					$des="";
					views($des);

				}
				if($_GET['action']=="da"){
					$id=$_GET['idn'];
					$ac=$_GET['ac'];
					$datav=new VentasModelo();
					$data=$datav->updateAb($id,$ac);
				}
				
					if($_GET['action']=="loadID"){
					$des=$_GET['des'];
					views($des);

				}
				
				


				}else{
			include('Views/principal/notificaciones.php');
				}

				}else{

					echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
				}
		function views($des){
			$datav=new VentasModelo();
		$data=$datav->getNtf_($des);
			
			$view="";
			$view=' <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th><i ></i> ID</th>
                        <th ><i ></i>Tarjeta</th>
                        <th ><i ></i>Descripcion</th>
                        <th ><i ></i>Fecha Notif.</th>
                        <th><i ></i>Status dias</th>
                        <th><i ></i>Cancelar</th>
                        <th><i ></i>Atendida</th>
                    </thead>
                    <tbody>';
            				foreach ($data as $data) {
 								$view.='<tr>';
 								$view.='<td>'.$data['idnotificobro'].'</td>';
 								if($data['tipo']==1){
 									$view.='<td>'.$data['idVenta'].'</td>';
 								}else{
 									$view.='<td > <span class="badge bg-success"><font color="black">'.$data['idVenta'].'</td>';
 								}
 								
 								$view.='<td>'.$data['descripcion'].'</td>';
 								$view.='<td>'.$data['fecha_n'].'</td>';
 								$dataf=$datav->cantFD($data['fecha_n']);
 									if($dataf==0){
 									$view.='<td><span class="badge bg-warning"><font color="black">HOY</font></span> </td>';

 								}
 								if($dataf>0){
 									$view.='<td><span class="badge bg-info"><font color="black">Falta:'.($dataf).'</font></span>  </td>';

 								}
 								if($dataf<0){
 									$view.='<td><span class="badge bg-important"><font color="black">Pasado:'.($dataf*-1).'</font></span>  </td>';

 								}
 								$view.='<td><a > <button onclick="cancelar('.$data['idnotificobro'].');" class="btn btn-danger btn-sm "><i class="fa fa-cut   fa-lg" ></i></button></a></td>';
 								$view.='<td><a> <button  onclick="atender('.$data['idnotificobro'].');" class="btn btn-success btn-sm "><i class="fa fa-font  fa-lg" ></i></button></a></td>';
								$view.='</tr>';
							}


		$view.= '</tbody> 
			 </table>';
    echo $view;


		}




?>