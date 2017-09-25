<?php 
session_start();
		if($_SESSION){
			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/ClienteModelo.php');
				if($_GET['action']=='getCliente'){
            $name="";
            $ap="";
						mostrarClientes(0,$name,$ap);
				}
        if($_GET['action']=='getClienteK'){
            $name=$_GET['name'];
            $ap=$_GET['ap'];
            mostrarClientes(1,$name,$ap);
        }
       if($_GET['action']=='gCM'){
            $name="";
            $ap="";
            getcm(0,$name,$ap);
        }

				

			}else{
				include('Views/clientes/listaClientes.php');
			}

		}else{
			echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
		}

function getcm($ac,$name,$ap){
  $dataCliente=new ClienteModelo();
      $data=$dataCliente->getCliente($ac,$name,$ap);
  $view="";
        $view.='<select id="cms" " class="form-control">';
      $view.="<option>SELECCIONE EL CLIENTE:</option>";
      foreach ($data as $data) {
        $view.="<option>".$data['idcliente']."/ ".$data['nombres']." ".$data['apellido_paterno']." ".$data['apellido_materno']."</option>";
      }
      $view.='</select>';
      echo $view;
}
function mostrarClientes($ac,$name,$ap){
	
	$dataCliente=new ClienteModelo();
			$data=$dataCliente->getCliente($ac,$name,$ap);
	$view="";
	$view .='<table class="table table-striped table-advance table-hover">
                    <hr>
                    <thead>
                      <tr>
                        <th><i ></i> ID</th>
                        <th ><i ></i>NOMBRE (S)</th>
                        <th><i ></i>APELLIDO PATERNO</th>
                        <th><i ></i>APELLIDO MATERNO</th>
                        <th><i ></i>FOTO </th>
                        <th><i ></i>C. DOMICILIO</th>
                        <th><i ></i>CREDENCIAL</th>
                        <th><i ></i>VER/ACTUALIZAR</th>

                    </thead>
                    <tbody>';
                    foreach ($data as $data) {
                      $view.='<tr>';

                    	$view.='<td>'.$data['idcliente'].'</td>';
                      $view.='<td>'.$data['nombres'].'</td>';
                      $view.='<td>'.$data['apellido_paterno'].'</td>';
                      $view.='<td>'.$data['apellido_materno'].'</td>';
                      $view.='<td>
                       <a  > <button  class="btn btn-success btn-sm ""><i class="fa fa-camera fa-lg" ></i></button></a>
                       </td>';
                      $view.=' <td>
                       <a  > <button  class="btn btn-success btn-sm ""><i class="fa fa-road  fa-lg" ></i></button></a>
                       </td>';
                       $view.='<td>
                       <a  > <button  class="btn btn-success btn-sm ""><i class="fa fa-credit-card fa-lg" ></i></button></a>
                       </td>';
                      
                       $view.='<td> <a > <button onclick=redid('.$data['idcliente'].'); class="btn btn-danger btn-sm"><i class="fa fa-edit fa-lg"></i></button></a></td>';

                      $view.='</tr>';
                    }

               
              $view.= '</tbody>
                 </table>';
     echo $view;
}