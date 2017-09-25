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
					//$codigo='';
					$codigo=$_GET['codigo'];
					$ctg='';
					$mrk='';

					bsk(2,$codigo,$ctg,$mrk);
				}
				if($_GET['action']=='bctg'){
					//$codigo='';$codigo=$_GET['codigo'];
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
				if ($_GET['action']=='addCar') {
					$idp=$_GET['idp'];
					car($idp);
				}
				if ($_GET['action']=='pc') {
					
					paintCar();
				}
				if ($_GET['action']=='dt') {
					$index=$_GET['index'];
					deleteP($index);
				}
				if ($_GET['action']=='clear') {
					
					clear();
				}

				}else{
				include('Views/ventas/caja.php');
				}
		}else{
			echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
		}
		function clear(){
			if (isset($_SESSION['carrito'])) {
				# code...
				$_SESSION['carrito']=NULL;
			}
		}
		function deleteP($index){
      //$_SESSION['carrito']=NULL;
    
			$carrito=$_SESSION['carrito'];
      $carritoAux="";
      for ($i=0; $i < count($carrito); $i++) { 
        if($i==$index){
          
        }else{
          $carritoAux[]=$carrito[$i];
        }
      }
			
			$_SESSION['carrito']=$carritoAux;

		}
		function paintCar(){
			$datap=new ProductoModelo();
			//$data=$datap->getProducto();
			if (isset($_SESSION['carrito'])) {
				# code...
				$carrito=$_SESSION['carrito'];
        //var_dump($_SESSION['carrito']);
			}
			
			$table="";
			$table.='  <div class="showback">
              <div class="form-group">


           <h4><i class="fa fa-shopping-cart fa-lg"></i> LISTA DE LOS PRODUCTOS A VENDER</h4>
           <div class="form-group">

            <table class="table table-striped table-advance table-hover">

              <thead>
                <tr>
                  <th ><i ></i> Clave</th>
                  <th><i ></i> Cant</th>
                  <th ><i ></i> stc</th>
                   <th ><i ></i> st2p</th>
                   <th ><i ></i> st3p</th>
                   <th ><i ></i> st4p</th>
                    <th ><i ></i> stcd</th>
                  <th><i ></i> Quitar</th>
                </tr>
              </thead>
              <tbody>';
              if(isset($carrito)){ 
              	$tstc=0;
              	$tst2p=0;
				$tst3p=0;
				$tst4p=0;
				$tstcd=0;

              	for ($i=0; $i <count($carrito) ; $i++) { 
              		
              		if (isset($carrito[$i])) {
              			$idp=$carrito[$i]['idp'];
              			$cnt=$carrito[$i]['cnt'];

              	$data=$datap->getProductoID($idp);
              	 foreach ($data as $data) {
              	 	$stc=$cnt*$data['p_contado'];
              	 	$st2p=$cnt*$data['p2pagos'];
              	 	$st3p=$cnt*$data['p3pagos'];
              	 	$st4p=$cnt*$data['p4pagos'];
              	 	$stcd=$cnt*$data['p_credito'];

              	 	$tstc=$tstc+$stc;
              	 	$tst2p=$tst2p+$st2p;
					$tst3p=$tst3p+$st3p;
					$tst4p=$tst4p+$st4p;
					$tstcd=$tstcd+$stcd;

              	 	$table.='<tr>';
              	 	$table.='<td>'.$data['clave'].'</td>';
              	 	$table.='<td>'.$cnt.'</td>';
              	 	$table.='<td>'.$stc.'</td>';
              	 	$table.='<td>'.$st2p.'</td>';
              	 	$table.='<td>'.$st3p.'</td>';
              	 	$table.='<td>'.$st4p.'</td>';
              	 	$table.='<td>'.$stcd.'</td>';
              	 	$table.='<td>

                      <a  > <button onclick=deletep('.$i.'); class="btn btn-danger btn-sm"><i class="fa fa-times fa-lg"></i></button></a>
                      </td>';
              	
              	 }

	
              		}

              }
              $table.='</tr>';

              	 	$table.='<tr>';
              	 	$table.='<td> &nbsp;<h4></h4></td>
								<td> &nbsp;</td>
								<td> &nbsp;</td>
								
								<td> &nbsp;</td>';
              	 	$table.='<td> <div class="btn-group">
                       <button type="button" class="btn btn-success">Total:</button>
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a >cont=$'.$tstc.'</a></li>
                <li><a >2ps=$'.$tst2p.'</a></li>
                <li><a >3ps=$'.$tst3p.'</a></li>
                <li><a >4ps=$'.$tst4p.'</a></li>
                
                <li><a >cred=$'.$tstcd.'</a></li>
                
              </ul>
              </div></td>';
              	 	$table.='</tr>';
         	$table.='    </tbody>
            </table>


          </div>
          ';

              $table.='

            <a  > <button type="button" onclick="vaciar()" style="width:100px" class="btn btn-round btn-success">
             Cancelar
           </button></a>
           <label ><b><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3> </b></label>
           <label ><b><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3> </b></label>
           <label ><b><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3> </b></label>
           <label ><b><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3> </b></label>

           <label ><b><h3>&nbsp;&nbsp;&nbsp;</h3> </b></label>


           <div class="btn-group">
                       <button type="button" class="btn btn-danger">Realizar Pago </button>
              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a  onclick="movt(1);" >Contado</a></li>
                <li><a  onclick="movt(2);">Dos pagos</a></li>
                <li><a  onclick="movt(3);">Tres pagos</a></li>
                <li><a  onclick="movt(4);">Cuatro pagos</a></li>
                 <li><a onclick="movt(0);">Credito</a></li>
                 <li style="background-color:#d8bfc8 "><a  onclick="movt(5);">Fusionar</a></li>


              </ul>
              </div>

       </div>';
              }


              

    $table.=' </div>
   </div>
   ';
			echo $table;

			}
function car($idp){
  $datap=new ProductoModelo();
	if (isset($_SESSION['carrito'])) {
		$carrito=$_SESSION['carrito'];
		$cantidad=1;
		$pos=-1;
		for ($i=0; $i < count($carrito); $i++) { 

			if ($idp==$carrito[$i]['idp']) {
				$pos=$i;	
			}
		}

		if ($pos<>-1) {
			$mas=$carrito[$pos]['cnt']+$cantidad;
      $ct=$datap->getCant($idp);
      if($ct>=$mas){
        $carrito[$pos]= array('idp' =>$idp ,'cnt'=>$mas,'desc'=>0);
      }
			
		}else{
			$carrito[]= array('idp' =>$idp ,'cnt'=>$cantidad,'desc'=>0);
		}

		$_SESSION['carrito']=$carrito;
		
	}else{
		$cantidad=1;
		$carrito[]= array('idp' =>$idp ,'cnt'=>$cantidad,'desc'=>0);
		$_SESSION['carrito']=$carrito;
	}
}



function bsk($action,$codigo,$ctg,$mrk){
	$datap=new ProductoModelo();
	$data=$datap->getProducto($action,$codigo,$ctg,$mrk);
	$table="";
	$table.=' <div class="content-panel">
                 <h4><i class="fa fa-sort-alpha-desc fa-lg"></i> PRODUCTOS DISPONIBLE</h4>
                 <div class="form-group">
                   <table class="table table-striped table-advance table-hover">
                
                    <thead>
                      <tr>
                        <th><i ></i>ID-Descripcion del producto</th>
                        <th><i ></i> Unidad disp</th>
                        <th><i ></i>Precios/Vender</th>
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
           		
           				if($cnt>0){

           					$table.='<tr>';
           					$table.='<td>'.$data['idproducto']."-".$ctg." ".$mrk." ".$data['clave']." ".$data['descripcion']. '</td>';
           					$table.='<td>'.$cnt.'</td>';

           					$table.='<td> <center>
                           <div class="btn-group">
                       <button type="button" class="btn btn-success">Precios</button>
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
               <li><a >cont= $'.$data['p_contado'].'</a></li>
                <li><a >des= $'.$data['descuento'].'</a></li>
                
                <li><a >2ps= $'.$data['p2pagos'].'</a></li>
                <li><a >3ps= $'.$data['p3pagos'].'</a></li>
                <li><a >4ps= $'.$data['p4pagos'].'</a></li>
                
                
                <li style="background-color:#d8bfc8 " ><a >cred= $'.$data['p_credito'].'</a></li>

                <li style="background-color:#d8bfc8 " ><a >eng= $'.$data['enganche'].'</a></li>
                <li style="background-color:#d8bfc8 " ><a >quin= $'.$data['quincenal'].'</a></li>
                <li style="background-color:#d8bfc8 " ><a >mens= $'.$data['mensual'].'</a></li>
                
              </ul>
              </div>';


           					if ($cnt==1) {
           						# code...
           					$table.='<a   > <button  onclick="addCar('.$data['idproducto'].');" class="btn btn-warning btn-sm " style="width:100px" ><i class="fa fa-shopping-cart fa-lg" ></i></button></a>
                      </center>
                       </td>';
           					}else{
           							$table.='<a   > <button   onclick="addCar('.$data['idproducto'].');" class="btn btn-primary btn-sm " style="width:100px" ><i class="fa fa-shopping-cart fa-lg" ></i></button></a>
                      </center>
                       </td>';

           					}

           				}
           			$table.='</tr>';
        }
		$table.='</tbody>
                </table>
              </div>
            </div>';
echo $table;
}


?>