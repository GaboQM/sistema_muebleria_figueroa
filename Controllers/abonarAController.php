<?php 
session_start();
		if($_SESSION){
			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/ClienteModelo.php');
				require('../Models/Ventas_Modelo.php');
				if($_GET['action']=="load"){
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
				if($_GET['action']=="abn"){
					viewAbonar($_GET['idv']);
				}
				if($_GET['action']=="ist"){
					
					         $idv=$_GET['idv'];
					         $cnt=$_GET['cnt'];
                    $aa=$_GET['aa'];
                    $mm=$_GET['mm'];
                    $dd=$_GET['dd'];
					         $cdor=strtoupper($_GET['cdor']);
					   if(is_numeric($cnt)){

                if(($dd != "SELECCIONE EL DIA") and ($mm != "SELECCIONE EL MES") and ($aa != "SELECCIONE AÑO")){
                    if(checkdate(getNmm($mm), $dd,$aa)){
                    $fcha=$aa.'-'.getNmm($mm).'-'.$dd;
                    insertarAbono($idv,$fcha,$cnt,$cdor);
                    }
                }
                if(($dd =="SELECCIONE EL DIA") and ($mm =="SELECCIONE EL MES") and ($aa =="SELECCIONE AÑO")){
              
                    $fcha="NOW()";
                    insertarAbono($idv,$fcha,$cnt,$cdor);
              
                }
            
					   }
					viewAbonar($idv);
					
				}

				if($_GET['action']=="dt"){
					//viewAbonar($_GET['idv']);
					anular($_GET['idv']);
				}
				if($_GET['action']=="ntf"){
					$idv=$_GET['idv'];
					$des=$_GET['des'];
					$aa=$_GET['aa'];
          $mm=$_GET['mm'];
          $dd=$_GET['dd'];
					
						insertarNTF($idv,$des,$aa,$mm,$dd);
					viewAbonar($idv);
				}

			}else{

				include('Views/ventas_/abonar_.php');

			}

		}else{
			echo '<div class="alert alert-dismissible alert-danger">

						<center><strong>!No hay sesión activa!</center></strong> 
						</div>';
					include('Views/index/index.php');
		}
  function getNmm($mest){
    $mes="";
switch ($mest) {
  case 'ENERO':
    $mes='01';
    break;
  case 'FEBRERO':
    $mes='02';
    break;
  case 'MARZO':
    $mes='03';
    break;
  case 'ABRIL':
    $mes='04';
    break;
  case 'MAYO':
    $mes='05';
    break;
  case 'JUNIO':
    $mes='06';
    break;
  case 'JULIO':
    $mes='07';
    break;
  case 'AGOSTO':
    $mes='08';
    break;
  case 'SEPTIEMBRE':
    $mes='09';
    break;
  case 'OCTUBRE':
    $mes='10';
    break;
  case 'NOVIEMBRE':
    $mes='11';
    break;
  case 'DICIEMBRE':
    $mes='12';
    break;
}
    return $mes;
  }

	function insertarNTF($idv,$des,$aa,$mm,$dd){
    //if ($aa!= "SELECCIONE EL AÑO" AND $mm!= "SELECCIONE EL MES" AND $dd!= "SELECCIONE EL DIA") {
      # code...
      if ($des!="" and checkdate(getNmm($mm),$dd,$aa)) {
        $fcha=$aa.'-'.getNmm($mm).'-'.$dd;
        $datav=new Ventas_Modelo();
          $data=$datav->notificar($idv,$des,$fcha);

      }
   
   // }
			
	}
	function anular($idv){
			$datav=new Ventas_Modelo();
			$data=$datav->anular($idv);

	}
	function insertarAbono($idv,$fcha,$cnt,$cdor){
		$datav=new Ventas_Modelo();
		$data=$datav->getVenta(1,$idv,"","","");
		$dataVenta="";
		foreach ($data as $data) {
 			$dataVenta=$data;
 		}
 		$nmp=$dataVenta['monto_pagado']+$cnt;
 		$nsaldo=$dataVenta['total_venta']-$nmp;
 		if($nsaldo<=0 AND $nmp>=$dataVenta['monto_pagado']){
 			$ftp="NOW()";
 			$datav->updateVenta($idv,$nmp,$ftp);
 		}else{
 			$ftp="0000-00-00";
 			
 			$datav->updateVenta($idv,$nmp,$ftp);
 		}

 		$datav->insertarAbono($idv,$fcha,$dataVenta['total_venta'],$cnt,$nmp,$cdor,$cdor);
 		
	}
	function viewAbonar($idv){
		$datav=new Ventas_Modelo();
		$data=$datav->getVenta(3,$idv,"","","");
		$dataVenta="";
		$dataA=$datav->getAbono($idv);
		$datantf=$datav->getNtf($idv);
		foreach ($data as $data) {
 			$dataVenta=$data;
 		}
		$view="";
		$view.='<div  class="form-panel" >
               <center> <h4 class="mb"><i class="fa fa-angle-right"></i>DATOS DE LA VENTA/ABONAR/AVISOS</h4></center>
               <h5 ><b>N° TARJETA: </b> '.$idv.'</h5>
                <h5 ><b>FECHA DE LA VENTA: </b> '.$dataVenta['fecha_venta'].'</h5>
                 <h5 ><b>CLIENTE: </b>  '.$dataVenta['nombres'].' '.$dataVenta['apellido_paterno'].' '.$dataVenta['apellido_materno'].'</h5>
                <form  method="post" class="form-horizontal style-form"  >
                <center> <h4 class="mb"><i class="fa fa-film "></i>HISTORIAL DE LOS ABONOS</h4></center>';
        $view.=' <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th ><i ></i>Fecha</th>
                        <th><i ></i>Venta</th>
                        <th><i ></i>Abono</th>
                        <th><i ></i>Saldo</th>
                        <th><i ></i>COBRADOR</th>
                    </thead>
                    <tbody>';
                    $tp="";
					$debe="";
				foreach ($dataA as $dataA) {
					$view.='<tr>';
					$view.='<td>'.$dataA['fecha_a'].'</td>';
					$view.='<td>'.$dataA['total_pagar'].'</td>';
					$view.='<td>'.$dataA['can_abonar'].'</td>';
					$view.='<td>'.($dataA['total_pagar']-$dataA['total_pagado']).'</td>';
					$view.='<td>'.$dataA['descripcion'].'</td>';

					$view.='</tr>';
					$tp=$dataA['total_pagado'];
					$debe=$dataA['total_pagar']-$tp;
  				}
  				

				$view.= '</tbody> </table>';

				$view.='<center> <h4 class="mb"><i class="fa fa-adjust  "></i>AVANCE DE LOS PAGOS</h4></center>';
  				$porj=100-(($debe*100)/$dataA['total_pagar']);
  				if($debe<=0 AND $porj>=100 ){
  					$view.='<h4><center><b>'.$porj.'%</center></h4></b><div class="progress progress-striped active">
              <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100" aria-valuemin="10" aria-valuemax="100" style="width: '.$porj.'%">
                
              </div>
            </div>
            <div class="alert alert-success"><h4><center><b>CUENTA PAGADA</center></h4></b></div>
            <center> <button type="button" class="btn btn-round btn-success"  onclick="window.print();"><i class="fa fa-print fa-lg" > Imprimir</i></button>
            <a href="abonarA" ><button type="button" class="btn btn-round btn-success"><i class="fa fa-arrow-left  fa-lg" >Regresar</i></button></a></center>
            ';
  				}else{
  					$view.='<h4><center><b>'.$porj.'%</center></h4></b><div class="progress progress-striped active">
              <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="100" aria-valuemin="10" aria-valuemax="100" style="width: '.$porj.'%">
                
              </div>
            </div>
            <center> <button type="button" class="btn btn-round btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-lg" > Abono</i></button>
            <a href="abonarA" ><button type="button" class="btn btn-round btn-success"><i class="fa fa-arrow-left  fa-lg" >Regresar</i></button></a></center>
            ';

  				}
  			$view.='<center> <h4 class="mb"><i   "></i></h4></center>
  			<center> <h4 class="mb"><i class="fa fa-bell  "></i>NOTIFICACIONES</h4></center>';
  			 $view.=' <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th ><i ></i>Fecha para notificar</th>
                        <th><i ></i>Descripcion</th>
                        <th><i ></i>Estado</th>
                        
                    </thead>
                    <tbody>';
                   foreach ($datantf as $datantf) {
               $view.='<tr>';
               $view.='<td>'.$datantf['fecha_n'].'</td>';
               $estado="";
               			if ($datantf['estado']=="pg") {
               				$estado="ATENDIDO";
               			}
               			if ($datantf['estado']=="ac") {
               				$estado="PENDIENTE";
               			}
               			if ($datantf['estado']=="dt") {
               				$estado="CANCELADO";
               			}
               $view.='<td>'.$datantf['descripcion'].'</td>';
               $view.='<td>'.$estado.'</td>';
               $view.='</tr>';
						}
			$view.= '</tbody> </table>';
			$view.='<center> <h4 class="mb"><i   "></i></h4></center>
  			<center> <h4 class="mb"><i "></i>NOTIFICAR</h4></center>';
  			$view.='<table class="table table-striped table-advance table-hover">
                    
                    <thead>
                    </thead>
                    <tbody>
                    <tr><center>
                  <td><div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Descripcion:</label>
                                <div  class="col-sm-10">
                                    <input   id="des"  value="" placeholder="descripcion"  class="form-control">
                                </div>
</div>
                  </td>
                  <td><div class="form-group">
                                <div class="">
                                  <label class="col-sm-2 col-sm-2 control-label">Fecha Notificar: </label>
                                  <div class="col-sm-6">
                                <select id="dd"  class="form-control">
                                <option>SELECCIONE EL DIA</option> 
                                <option>01</option> 
                                 <option>02</option>  
                                  <option>03</option> 
                                   <option>04</option> 
                                    <option>05</option> 
                                <option>06</option> 
                                 <option>07</option>  
                                  <option>08</option> 
                                   <option>09</option> 
                                    <option>10</option> 
                                <option>11</option> 
                                 <option>12</option>  
                                  <option>13</option> 
                                   <option>14</option> 
                                    <option>15</option> 
                                <option>16</option> 
                                 <option>17</option>  
                                  <option>18</option> 
                                   <option>19</option> 
                                    <option>20</option> 
                              <option>21</option> 
                                 <option>22</option>  
                                  <option>23</option> 
                                   <option>24</option> 
                                    <option>25</option> 
                              <option>26</option> 
                                 <option>27</option>  
                                  <option>28</option> 
                                   <option>29</option> 
                                    <option>30</option> 
                                  <option>31</option>
                                </select>
                                <select id="mm"  class="form-control">
                                <option>SELECCIONE EL MES </option> 
                                <option>ENERO</option> 
                                 <option>FEBRERO</option>  
                                  <option>MARZO</option> 
                                   <option>ABRIL</option> 
                                    <option>MAYO</option> 
                                <option>JUNIO</option> 
                                 <option>JULIO</option>  
                                  <option>AGOSTO</option> 
                                   <option>SEPTIEMBRE</option> 
                                    <option>OCTUBRE</option> 
                                <option>NOVIEMBRE</option> 
                                 <option>DICIEMBRE</option>  
                                  
                                </select>
                                <select id="aa"  class="form-control">
                                <option>SELECCIONE AÑO</option> 
                                <option>2017</option> 
                                <option>2018</option> 
                                 <option>2019</option>  
                                  <option>2020</option> 
                                   <option>2021</option> 
                                    
                                </select>

                                  </div>

                              </div>
                            </div>
                  </td>
                  </tr>
                  </center>
                   </tbody>
                 </table>';
  			 
			$view.='<center> <button type="button" onclick="notificar('.$idv.')" class="btn btn-round btn-danger"><i class="fa fa-plus fa-lg" > Notificar</i></button>
            <a href="abonar" ><button type="button" class="btn btn-round btn-success"><i class="fa fa-arrow-left  fa-lg" >Regresar</i></button></a></center>';
  			$view.='<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title" id="myModalLabel">INGRESE LA CANTIDAD QUE DESEA ABONAR:</h4>
                                                </div>
                                                <div class="modal-body">
                                                <div class="showback">
                                      <div class="form-group">
                                      <div class="alert alert-danger"><center>Al no seleccionar ningun dia, mes o año, se tomara la fecha actual</center> </div>
                                <div class="">
                                  <label class="col-sm-2 col-sm-2 control-label">Fecha Abonado: </label>
                                  <div class="col-sm-6">
                                <select id="dd_"  class="form-control">
                                <option>SELECCIONE EL DIA</option> 
                                <option>01</option> 
                                 <option>02</option>  
                                  <option>03</option> 
                                   <option>04</option> 
                                    <option>05</option> 
                                <option>06</option> 
                                 <option>07</option>  
                                  <option>08</option> 
                                   <option>09</option> 
                                    <option>10</option> 
                                <option>11</option> 
                                 <option>12</option>  
                                  <option>13</option> 
                                   <option>14</option> 
                                    <option>15</option> 
                                <option>16</option> 
                                 <option>17</option>  
                                  <option>18</option> 
                                   <option>19</option> 
                                    <option>20</option> 
                              <option>21</option> 
                                 <option>22</option>  
                                  <option>23</option> 
                                   <option>24</option> 
                                    <option>25</option> 
                              <option>26</option> 
                                 <option>27</option>  
                                  <option>28</option> 
                                   <option>29</option> 
                                    <option>30</option> 
                                  <option>31</option>
                                </select>
                                <select id="mm_"  class="form-control">
                                <option>SELECCIONE EL MES </option> 
                                <option>ENERO</option> 
                                 <option>FEBRERO</option>  
                                  <option>MARZO</option> 
                                   <option>ABRIL</option> 
                                    <option>MAYO</option> 
                                <option>JUNIO</option> 
                                 <option>JULIO</option>  
                                  <option>AGOSTO</option> 
                                   <option>SEPTIEMBRE</option> 
                                    <option>OCTUBRE</option> 
                                <option>NOVIEMBRE</option> 
                                 <option>DICIEMBRE</option>  
                                  
                                </select>
                                <select id="aa_"  class="form-control">
                                <option>SELECCIONE AÑO</option> 
                                <option>2005</option> 
                                <option>2006</option> 
                                 <option>2007</option>  
                                  <option>2008</option> 
                                   <option>2009</option> 
                                    <option>2010</option> 
                                <option>2011</option> 
                                 <option>2012</option>  
                                  <option>2013</option> 
                                   <option>2014</option> 
                                    <option>2015</option> 
                                <option>2016</option> 
                                 <option>2017</option> 
                                    
                                </select>

                                  </div>

                              </div>
                            </div>
                                     <label ><b>CANTIDAD $:</b></label>
                                       <div >
                                     <input id="cnt" name="abonado" type="text" value="" placeholder="0.0" class="form-control">
                                      </div> 
                              <label ><b>COBRADOR</b></label>
                              <div >
                                <input name="cobrador" id="ncdor" type="text" value="" placeholder="Escriba el nombre del cobrador"  class="form-control">
                              </div> 
                              

                            </div><!--showback-->                     
                           


                                                <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-round btn-success">Cancelar</button>
                                                  
                                                  <button onclick="insAbono('.$idv.');" type="button" data-dismiss="modal" name="submit" class="btn btn-round btn-danger">Aceptar</button>
                                                
                                                </div>
                                              </div>
                                            </div>
                                          </div>';
			 $view.='</form>
             </div>
               </div>';
    
                
               

		echo $view;
	}
 	function verifDias($idv,$diasRes){
 	$view="";
 	if($diasRes>3){
		$view='<td><center><span class="badge bg-success"><font color="black">'.$diasRes.'</font></span></center></td>';
		}
	if($diasRes>=0 and $diasRes <3){
		$view='<td><center><span class="badge bg-warning"><font color="black">'.$diasRes.'</font></span></center></td>';
		}
	if($diasRes<0){
		$view='<td><center><span class="badge bg-important"><font color="black">'.$diasRes.'</font></span>
			</center></td>';

	}



 	return $view;
 }
function calDias($idv,$tp,$diasT){
	$view="";
	if($tp=="CREDITO"){
		$view='<td><center>
               <span class="badge bg-success"><font color="black">---</font></span> </center></td>';
	}
	if($tp=="DOS PAGOS"){
		$diasRes=30-$diasT;
		$view=verifDias($idv,$diasRes);
		

	}
	if($tp=="TRES PAGOS"){
		$diasRes=60-$diasT;
		$view=verifDias($idv,$diasRes);

	}
	if($tp=="CUATRO PAGOS"){
		$diasRes=90-$diasT;
		$view=verifDias($idv,$diasRes);

	}
	return $view;
}

function views($ac,$idv,$mcp,$name,$apllp){
		$datav=new Ventas_Modelo();
		$data=$datav->getVenta($ac,$idv,$mcp,$name,$apllp);
		
	$view="";
	$view=' <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th><i ></i> Tarjeta</th>
                        <th ><i ></i>Fecha</th>
                        <th ><i ></i>Cliente</th>
                        <th ><i ></i>Municipio</th>
                        <th><i ></i>Venta</th>
                        <th><i ></i>Pagado</th>
                        <th><i ></i>Saldo</th>
                        <th><i ></i>Tipo Pagos</th>
                        <th><i ></i>Estado</th>
                        <th><i ></i>Dias/Aplicar</th>
                        <th><i ></i>Anular/Imp/Abonar</th>
                    </thead>
                    <tbody>';
        foreach ($data as $data) {
        		
                    $view.='<tr>';
                    $view.='<td>'.$data['idventa_a'].'</td>';
                    $view.='<td>'.$data['fecha_venta'].'</td>';
                    $view.='<td>'.$data['nombres'].' '.$data['apellido_paterno'].' '.$data['apellido_materno'].' '.'</td>';
                    $mcp=explode("/",$data['domicilio']);
                    $view.='<td>'.$mcp[0].'</td>';
                     $view.='<td>'.$data['total_venta'].'</td>';
                    $view.='<td>'.$data['monto_pagado'].'</td>';
                    $view.='<td>'.($data['total_venta']-$data['monto_pagado']).'</td>';
                    $view.='<td>'.$data['tipo_pago'].'</td>';
                    $view.='<td> <div class="progress progress-striped active">
              						<div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="100" aria-valuemin="10" aria-valuemax="100" style="width:'.($data['monto_pagado']*100)/$data['total_venta'].'%">
              						</div>
            					</div>
           					 </td>';
           			
           			$view.=calDias($data['idventa_a'],$data['tipo_pago'],$datav->cantDias($data['fecha_venta']));
           			$view.='<td><center><a > <button onclick="anular('.$data['idventa_a'].');" class="btn btn-danger btn-sm "><i class="fa fa-cut   fa-lg" ></i></button></a><a > <button onclick="imprimir('.$data['idventa_a'].');" class="btn btn-primary btn-sm "><i class="fa fa-print  fa-lg" ></i></button></a> <button  onclick="abonar('.$data['idventa_a'].');" class="btn btn-success btn-sm "><i class="fa fa-font  fa-lg" ></i></button></a></center></td>';
 					$view.='</tr>';
                    }

	$view.= '</tbody> 
			 </table>';
    echo $view;

}
?>