  <?php 
  session_start();
  if($_SESSION){
  if(isset($_GET['action'])){
  require('../Models/class.conexion.php') ;
  require('../Models/ClienteModelo.php');
  require('../Models/VentasModelo.php');
  require('../Models/ProductoModelo.php') ;
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
   $cdor=strtoupper($_GET['cdor']);
   if(is_numeric($cnt)){
    insertarAbono($idv,$cnt,$cdor);
  }
  viewAbonar($idv);
  }
  if($_GET['action']=="upd"){
  				//viewAbonar($_GET['idv']);
  actualizarCuenta($_GET['idv']);
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

  if ($_GET['action']=="printf") {
      $idv=$_GET['idv'];
       imprimir($idv);

    # code...
  }
  }else{

  include('Views/ventas/abonar.php');



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

  if ($des!="" and checkdate(getNmm($mm),$dd,$aa)) {
  $fcha=$aa.'-'.getNmm($mm).'-'.$dd;
  $datav=new VentasModelo();
  $data=$datav->notificar($idv,$des,$fcha);
        # code...
  }
  }


  function anular($idv){
  $datav=new VentasModelo();
  $data=$datav->anular($idv);

  }
  function actualizarCuenta($idv){
  $datav=new VentasModelo();
  $datap=new ProductoModelo();
  $data=$datav->getVenta(1,$idv,"","","");
  $dataVenta="";
  foreach ($data as $data) {
  $dataVenta=$data;
  }

  $dataDLL=$datav->getDetV($idv);

  if($dataVenta['tipo_pago']=="2pagos"){

  $tv="";

  foreach ($dataDLL as $dataDLL) {
   $datapp=$datap->getProductoID($dataDLL['producto_idproducto']);
   foreach ($datapp as $datapp) {
    $dataPro=$datapp;
  }

  $pu=$dataPro['p3pagos'];

  $np=$dataDLL['cantidad']*$pu;
  $tv=$tv+$np;

  $datav->updateDTLL($np,$dataDLL['iddetalle_venta']);
  }
  $datav->updateVK($tv,"3pagos",$idv);

  }
  if($dataVenta['tipo_pago']=="3pagos"){
  $tv="";

  foreach ($dataDLL as $dataDLL) {
   $datapp=$datap->getProductoID($dataDLL['producto_idproducto']);
   foreach ($datapp as $datapp) {
    $dataPro=$datapp;
  }

  $pu=$dataPro['p4pagos'];

  $np=$dataDLL['cantidad']*$pu;
  $tv=$tv+$np;

  $datav->updateDTLL($np,$dataDLL['iddetalle_venta']);
  }
  $datav->updateVK($tv,"4pagos",$idv);
  }
  if($dataVenta['tipo_pago']=="4pagos"){
  $tv="";

  foreach ($dataDLL as $dataDLL) {
   $datapp=$datap->getProductoID($dataDLL['producto_idproducto']);
   foreach ($datapp as $datapp) {
    $dataPro=$datapp;
  }

  $pu=$dataPro['p_credito'];

  $np=$dataDLL['cantidad']*$pu;
  $tv=$tv+$np;

  $datav->updateDTLL($np,$dataDLL['iddetalle_venta']);
  }
  $datav->updateVK($tv,"CREDITO",$idv);

  }
  }
  function insertarAbono($idv,$cnt,$cdor){
  $datav=new VentasModelo();
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

  $datav->insertarAbono($idv,$dataVenta['total_venta'],$cnt,$nsaldo,$cdor,$cdor);

  }
  function viewAbonar($idv){
      $datav=new VentasModelo();
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
         $view.='<td>'.$dataA['fecha_abonado'].'</td>';
         $view.='<td>'.$dataA['total_a_pagar'].'</td>';
         $view.='<td>'.$dataA['cantidad_abonar'].'</td>';
         $view.='<td>'.$dataA['saldo'].'</td>';
         $view.='<td>'.$dataA['cobrador'].'</td>';

         $view.='</tr>';
         $tp=$dataA['total_a_pagar'];
         $debe=$dataA['saldo'];
       }


       $view.= '</tbody> </table>';

       $view.='<center> <h4 class="mb"><i class="fa fa-adjust  "></i>AVANCE DE LOS PAGOS</h4></center>';
       $porj=100-(($debe*100)/$tp);
       if($debe<=0 AND $porj>=100 ){
         $view.='<h4><center><b>'.$porj.'%</center></h4></b><div class="progress progress-striped active">
         <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100" aria-valuemin="10" aria-valuemax="100" style="width: '.$porj.'%">

         </div>
       </div>
       <div class="alert alert-success"><h4><center><b>CUENTA PAGADA</center></h4></b></div>
       <center> <button type="button" class="btn btn-round btn-success"  onclick="window.print();"><i class="fa fa-print fa-lg" > Imprimir</i></button>
        <a href="abonar" ><button type="button" class="btn btn-round btn-success"><i class="fa fa-arrow-left  fa-lg" >Regresar</i></button></a></center>
        ';
      }else{
       $view.='<h4><center><b>'.$porj.'%</center></h4></b><div class="progress progress-striped active">
       <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="100" aria-valuemin="10" aria-valuemax="100" style="width: '.$porj.'%">

       </div>
     </div>
     <center> <button type="button" class="btn btn-round btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-lg" > Abono</i></button>
      <a href="abonar" ><button type="button" class="btn btn-round btn-success"><i class="fa fa-arrow-left  fa-lg" >Regresar</i></button></a></center>
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

  function imprimir($idv){
  $datav=new VentasModelo();
  $datap=new ProductoModelo();
  $data=$datav->getVenta(3,$idv,"","","");
  $dataVenta="";
  $dataA=$datav->getAbono($idv);
  $datantf=$datav->getNtf($idv);
  foreach ($data as $data) {
    $dataVenta=$data;
  }
  $view="";
  $view.='<div  class="form-panel" >
  <table class="table table-striped table-advance table-hover">
    <thead>
        <th><h5 ><b>N° TARJETA: </b> '.$idv.'</h5>
        <h5 ><b>FECHA DE LA VENTA: </b> '.$dataVenta['fecha_venta'].'</h5>
        <h5 ><b>CLIENTE: </b>  '.$dataVenta['nombres'].' '.$dataVenta['apellido_paterno'].' '.$dataVenta['apellido_materno'].'</h5>
        <h5><b> CUENTA: </b>'.$dataVenta['tipo_pago'].'</h5>
         <h5><b> PAGADO: </b>'.$dataVenta['monto_pagado'].'</h5>
        </th>
        <th></th>
         <th></th>
      <th ><a class="fancybox"><img class="img-responsive" src="Views/imagen/logo_p1.png" width="150" heigth="150" alt=""></a></th>
      <th ><a class="fancybox"><img class="img-responsive" src="Views/imagen/logo_p2.png" width="200" heigth="200" alt=""></a></th>
      </thead>
     </table>';
    $view.='<center> <h4 class="mb"><i class="fa fa-list  "></i>DETALLE</h4></center>';
    $view.='<table class="table table-striped table-advance table-hover">

  <thead>
    <tr>
      <th ><i ></i> Cantidad</th>
      <th ><i ></i> Clave</th>
      <th><i ></i>Descripcion</th>
      <th ><i ></i> Precio c/u</th>
       <th ><i ></i>Descuento</th>
      <th ><i ></i> SubTotal</th>
    </tr>
  </thead>
  <tbody>';
      $datad=$datav->getDtllV($idv);
      $tt=0;
      foreach ($datad as $datad ) {
        $ctg=$datap->getNameCTG($datad['categoria']);
         $mrk=$datap->getNameMRK($datad['marca_id_marca']);
         $stt=($datad['cantidad'])*($datad['precio_venta']);
         $tt=$tt+$stt;
         $view.='<tr>';
         $view.='<td>'.$datad['cantidad'].'</td>';
         $view.='<td>'.$ctg.'/'.$mrk.'/'.$datad['clave'].'</td>';
         $view.='<td>'.$datad['descripcion'].'</td>';
         $view.='<td>'.$datad['precio_venta'].'</td>';
         $temp="";
          if($datad['descuento']==1){$temp="APLICADO";}else{$temp="NO APLICADO";}
         $view.='<td>'.$temp.'</td>';
         $view.='<td>'.$stt.'</td>';
         $view.='</tr>';
        # code...
      }
      $view.='<tr>';
      $view.='<td></td>';
      $view.='<td></td>';
      $view.='<td></td>';
      $view.='<td></td>';
      $view.='<td><h4>Total: </h4></td>';
      $view.='<td><h4>'.$tt.'</h4></td>';

      $view.='</tr>';




   $view.='</body>
  </table>';

    $view.='<center> <h4 class="mb"><i class="fa fa-film "></i>HISTORIAL DE LOS ABONOS</h4></center>
     <table class="table table-striped table-advance table-hover">
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
         $view.='<td>'.$dataA['fecha_abonado'].'</td>';
         $view.='<td>'.$dataA['total_a_pagar'].'</td>';
         $view.='<td>'.$dataA['cantidad_abonar'].'</td>';
         $view.='<td>'.$dataA['saldo'].'</td>';
         $view.='<td>'.$dataA['cobrador'].'</td>';

         $view.='</tr>';
         $tp=$dataA['total_a_pagar'];
         $debe=$dataA['saldo'];
       }


       $view.= '</tbody> </table>';
       $view.='<center> <button onclick="print();" type="button"  class="btn btn-round btn-success"><i class="fa fa-print  fa-lg" >Imprimir reporte</i></button>
  <a href="abonar" ><button type="button" class="btn btn-round btn-success"><i class="fa fa-arrow-left  fa-lg" >Regresar</i></button></a></center>';
  $view.='</div>
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
    <a  > <button onclick="cambiarVenta('.$idv.');" class="btn btn-danger btn-sm "><i class="fa fa-refresh  fa-lg" ></i></button></a>
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
  if($tp=="2pagos"){
  $diasRes=30-$diasT;
  $view=verifDias($idv,$diasRes);


  }
  if($tp=="3pagos"){
  $diasRes=60-$diasT;
  $view=verifDias($idv,$diasRes);

  }
  if($tp=="4pagos"){
  $diasRes=90-$diasT;
  $view=verifDias($idv,$diasRes);

  }
  return $view;
  }

  function views($ac,$idv,$mcp,$name,$apllp){
  $datav=new VentasModelo();
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
      <th><i ></i>Dias / Aplicar</th>
      <th><i ></i>Anular/Imp/Abonar</th>
    </thead>
    <tbody>';
      foreach ($data as $data) {

        $view.='<tr>';
        $view.='<td>'.$data['idventa'].'</td>';
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

    $view.=calDias($data['idventa'],$data['tipo_pago'],$datav->cantDias($data['fecha_venta']));
    $view.='<td><center><a > <button onclick="anular('.$data['idventa'].');" class="btn btn-danger btn-sm "><i class="fa fa-cut   fa-lg" ></i></button></a><a > <button  onclick="imprimir('.$data['idventa'].');" class="btn btn-primary btn-sm "><i class="fa fa-print   fa-lg" ></i></button></a><a > <button  onclick="abonar('.$data['idventa'].');" class="btn btn-success btn-sm "><i class="fa fa-font  fa-lg" ></i></button></a></center></td>';
    $view.='</tr>';
  }

  $view.= '</tbody> 
  </table>';
  echo $view;

  }
  ?>