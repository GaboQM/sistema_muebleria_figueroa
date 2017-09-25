<?php

session_start();
	
	
		if($_SESSION){

			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/ClienteModelo.php');
				require('../Models/VentasModelo.php');
				require('../Models/Ventas_Modelo.php');
				require('../Models/ProductoModelo.php') ;
				if($_GET['action']=='exit'){
					session_destroy();
				}
				if($_GET['action']=='load'){
					views(0,"","","","");

				}
				if($_GET['action']=="loadID"){
					
					views(1,$_GET['idv'],"","","");

				}
				if($_GET['action']=="loadDTLL"){
					
					$mcp=$_GET['mcp'] ;
					$name=$_GET['name'];
					$pa=$_GET['pa'] ;
					views(2,"",$mcp,$name,$pa);
					
				}

			}else{
			include('Views/principal/principal.php');
		}

				}else{

					echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
				}
	function status($idv,$fv,$tpgdo,$tpv){
		$datav=new VentasModelo();
		$dataa=new Ventas_Modelo();
		$viewT="";
		if($tpv==1){
			$timeT=$datav->cantDias($fv);
			$cabo=$datav->getCantAbo($idv);
			if ($tpgdo=="SEMANAL") {
				$st=$timeT-(7*$cabo);
				if($st==0){
				$viewT.='<span class="badge bg-warning"><font color="black">HOY</font></span> ';
				}
				if($st<0){
					$viewT.='<span class="badge bg-info"><font color="black">Falta:'.($st*-1).'</font></span> ';
				}
				if($st>0){
					$viewT.='<span class="badge bg-important"><font color="black">Pasado:'.($st).'</font></span> ';
					
				}
				# code...
			}
			if ($tpgdo=="QUINCENAL") {
				# code...
				$st=$timeT-(15*$cabo);
				if($st==0){
				$viewT.='<span class="badge bg-warning"><font color="black">HOY</font></span> ';
				}
				if($st<0){
					$viewT.='<span class="badge bg-info"><font color="black">Falta:'.($st*-1).'</font></span> ';
				}
				if($st>0){
					$viewT.='<span class="badge bg-important"><font color="black">Pasado:'.($st).'</font></span> ';
					
				}
			}
			if ($tpgdo=="MENSUAL") {
				# code...
				$st=$timeT-(30*$cabo);
				if($st==0){
				$viewT.='<span class="badge bg-warning"><font color="black">HOY</font></span> ';
				}
				if($st<0){
					$viewT.='<span class="badge bg-info"><font color="black">Falta:'.($st*-1).'</font></span> ';
				}
				if($st>0){
					$viewT.='<span class="badge bg-important"><font color="black">Pasado:'.($st).'</font></span> ';
					
				}
			}
		}else{
			$timeT=$dataa->cantDias($fv);
			$cabo=$dataa->getCantAbo($idv);
			if ($tpgdo=="SEMANAL") {
				$st=$timeT-(7*$cabo);
				if($st==0){
				$viewT.='<span class="badge bg-warning"><font color="black">HOY</font></span> ';
				}
				if($st<0){
					$viewT.='<span class="badge bg-info"><font color="black">Falta:'.($st*-1).'</font></span> ';
				}
				if($st>0){
					$viewT.='<span class="badge bg-important"><font color="black">Pasado:'.($st).'</font></span> ';
					
				}
				# code...
			}
			if ($tpgdo=="QUINCENAL") {
				# code...
				$st=$timeT-(15*$cabo);
				if($st==0){
				$viewT.='<span class="badge bg-warning"><font color="black">HOY</font></span> ';
				}
				if($st<0){
					$viewT.='<span class="badge bg-info"><font color="black">Falta:'.($st*-1).'</font></span> ';
				}
				if($st>0){
					$viewT.='<span class="badge bg-important"><font color="black">Pasado:'.($st).'</font></span> ';
					
				}
			}
			if ($tpgdo=="MENSUAL") {
				# code...
				$st=$timeT-(30*$cabo);
				if($st==0){
				$viewT.='<span class="badge bg-warning"><font color="black">HOY</font></span> ';
				}
				if($st<0){
					$viewT.='<span class="badge bg-info"><font color="black">Falta:'.($st*-1).'</font></span> ';
				}
				if($st>0){
					$viewT.='<span class="badge bg-important"><font color="black">Pasado:'.($st).'</font></span> ';
					
				}
			}
		}


		return $viewT;
	}

	function views($ac,$idv,$mcp,$name,$apllp){
		$datav=new VentasModelo();
		$data=$datav->getVenta($ac,$idv,$mcp,$name,$apllp);
		$dataa=new Ventas_Modelo();
		$dataa=$dataa->getVenta($ac,$idv,$mcp,$name,$apllp);
		
	$view="";
	$view=' <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th><i ></i> Tarjeta</th>
                        <th ><i ></i>Tiempo de Pago</th>
                        <th ><i ></i>Cliente</th>
                        <th ><i ></i>Domicilio</th>
                        <th><i ></i>Actividad</th>
                        <th><i ></i>Status dias</th>
                    </thead>
                    <tbody>';
                    
        foreach ($data as $data) {
        		if($data['tipo_pago']=="CREDITO"){
        			 $view.='<tr>';
                    $view.='<td>'.$data['idventa'].'</td>';
                    $view.='<td>'.$data['tiempo_pag'].'</td>';
                    $view.='<td>'.$data['nombres'].' '.$data['apellido_paterno'].' '.$data['apellido_materno'].' '.'</td>';
                    
                    $view.='<td>'.$data['domicilio'].'</td>';
                     $view.='<td>COBRAR</td>';
                    
                	$view.='<td>'.status($data['idventa'],$data['fecha_venta'],$data['tiempo_pag'],1).'</td>';
           			
 					$view.='</tr>';

        		}
        	}
                foreach ($dataa as $dataa) {
        		if($dataa['tipo_pago']=="CREDITO"){
        			 $view.='<tr>';
                    $view.='<td> <span class="badge bg-success"><font color="black">'.$dataa['idventa_a'].'</td>';
                    $view.='<td>'.$dataa['tiempo_pagado'].'</td>';
                    $view.='<td>'.$dataa['nombres'].' '.$dataa['apellido_paterno'].' '.$dataa['apellido_materno'].' '.'</td>';
                    
                    $view.='<td>'.$dataa['domicilio'].'</td>';
                     $view.='<td>COBRAR</td>';
                    
                	$view.='<td>'.status($dataa['idventa_a'],$dataa['fecha_venta'],$dataa['tiempo_pagado'],0).'</td>';
           			
 					$view.='</tr>';

        		}
                   
                    }

	$view.= '</tbody> 
			 </table>';
    echo $view;

}


?>