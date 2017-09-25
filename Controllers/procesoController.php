  <?php
  session_start();
  if($_SESSION){

   if(isset($_GET['action'])){
    require('../Models/class.conexion.php') ;
    require('../Models/ProductoModelo.php') ;
    require('../Models/ClienteModelo.php');
    require('../Models/VentasModelo.php');
    require('../Models/Ventas_Modelo.php');
    if($_GET['action']=="vt"){
      if (isset($_GET['tp'])) {
  							# code...
       $_SESSION['tipoPago']=$_GET['tp'];
     }

     viewProccess($_SESSION['tipoPago']);
   }
   if ($_GET['action']=="dtyctdo") {
  					# code...
     dtllCtdo();
   }
   if ($_GET['action']=="dtycvp") {
  					# code...
     $tp=$_GET['tp'];
     $idc=explode('/',$_GET['idc']);
     dtllvp($tp,$idc[1]);
   }
   if ($_GET['action']=="ds") {
  					# code...

     desproducto($_GET['idp'],$_GET['ac']);
   }
   if ($_GET['action']=="fin") {
    $idc=explode('/',$_GET['idc']);
     finalizar($idc[1]);


   }
   if ($_GET['action']=="finv") {
           $idc=explode('/',$_GET['idc']);
      finalizarvp($idc[1],intval($_GET['pgi']),$_GET['tp']);

   

  }
  if ($_GET['action']=="cdt") {
  					# code...
    $idc=explode('/',$_GET['idc']);
   dtllCcdt($idc[1]);
 }
 if ($_GET['action']=="finc") {
   
    $idc=explode('/',$_GET['idc']);
    finalizarc($idc[1],intval($_GET['pgi']),$_GET['tmp']);
}
if ($_GET['action']=="dtll") {
            # code...
  $idv=$_GET['idv'];
  dtllf($idv);
}
if ($_GET['action']=="finf") {

  finalizarf($_GET['idv']);



}
}else{
  include('Views/ventas/proceso.php');
}



}else{

 echo '<div class="alert alert-dismissible alert-danger">

 <center><strong>!No hay sesión activa!</center></strong> 
</div>';
include('Views/index/index.php');


}
function finalizarf($idv){

  $datav=new VentasModelo();
  $datap=new ProductoModelo();
  $datavv=new Ventas_Modelo();
  $carrito=$_SESSION['carrito'];
  $ttv=0;
  for ($i=0; $i <count($carrito) ; $i++) {
    $idp=$carrito[$i]['idp'];
    $cnt=$carrito[$i]['cnt'];
    $data=$datap->getProductoID($idp);
    foreach ($data as $data) {


      $ttv=$ttv+($cnt*($data['p_credito']));
    }


  }

  $st=explode('*', $idv);
  if(isset($st[1])){
    $id=$st[0];
    $datav=new Ventas_Modelo();
    $data=$datav->getVenta(1,$id,"","","");
    foreach ($data as $data) {
      $ttv=$ttv+$data['total_venta'];
    } 
    $datav->updateVentaf($id,$ttv);
    insertarDLLFa($id);


  }else{
    $id=$st[0];
    $datav=new VentasModelo();
    $data=$datav->getVenta(1,$id,"","","");
    foreach ($data as $data) {
      $ttv=$ttv+$data['total_venta'];
    } 
    $datav->updateVentaf($id,$ttv);
    insertarDLLF($id);
  }




}
function insertarDLLF($idv){
  $datav=new VentasModelo();
  $datap=new ProductoModelo();
  $carrito=$_SESSION['carrito'];
  for ($i=0; $i <count($carrito) ; $i++) {
    $idp=$carrito[$i]['idp'];
    $cnt=$carrito[$i]['cnt'];

    $data=$datap->getProductoID($idp);
    foreach ($data as $data) {


      $pv=$data['p_credito'];


    }     

    $datav->createDtlle($pv,$cnt,0,$idv,$idp);
    $datav->actualizarAlmacen($idp,$cnt);
    $_SESSION['carrito']=NULL;
    echo 1;

  }


}
function insertarDLLFa($idv){
  $datava=new Ventas_Modelo();
  $datav=new VentasModelo();
  $datap=new ProductoModelo();
  $carrito=$_SESSION['carrito'];
  for ($i=0; $i <count($carrito) ; $i++) {
    $idp=$carrito[$i]['idp'];
    $cnt=$carrito[$i]['cnt'];

    $data=$datap->getProductoID($idp);
    $des="";
    foreach ($data as $data) {


      $des=$cnt."-".$data['clave']."-".$data['descripcion']."-".$data['p_credito']."*";



    }     

    $datava->createDtlle($idv,$des);
    $datav->actualizarAlmacen($idp,$cnt);
    $_SESSION['carrito']=NULL;

  }


}

function finalizarc($idc,$pgi,$tmp){

 $datap=new ProductoModelo();
 $datav=new VentasModelo();

 $ftpg="0000-00-00";
 $user=$_SESSION['usuario'];
 $tipg="";


 $carrito=$_SESSION['carrito'];
 $ttv=0;
 for ($i=0; $i <count($carrito) ; $i++) {
  $idp=$carrito[$i]['idp'];
  $cnt=$carrito[$i]['cnt'];
  $data=$datap->getProductoID($idp);
  foreach ($data as $data) {


    $ttv=$ttv+($cnt*($data['p_credito']));
  }


}

$id=$datav->getIv();
$datav->create($idc,"CREDITO",$ttv,$pgi,$ftpg,$user,$tmp);
if($id<$datav->getIv()) {
 insertarDtllsc("p_credito");
 $saldo=$ttv-$pgi;
 $datav->pagoInicial($datav->getIv(),$ttv,$pgi,$saldo,$user,$user);
}else{

}


}
function finalizarvp($idc,$pgi,$tp){

 $datap=new ProductoModelo();
 $datav=new VentasModelo();

 $ftpg="0000-00-00";
 $user=$_SESSION['usuario'];
 $tipg="";
 $tpg="";
 $tpdb="";
 if ($tp=="DOS PAGOS") {
                		# code...
  $tipg="2pagos";
  $tpgdb="p2pagos";
}
if ($tp=="TRES PAGOS") {
                		# code...
  $tipg="3pagos";
  $tpgdb="p3pagos";

}
if ($tp=="CUATRO PAGOS") {
                		# code...
  $tipg="4pagos";
  $tpgdb="p4pagos";
}
$carrito=$_SESSION['carrito'];
$ttv=0;
for ($i=0; $i <count($carrito) ; $i++) {
  $idp=$carrito[$i]['idp'];
  $cnt=$carrito[$i]['cnt'];
  $data=$datap->getProductoID($idp);
  foreach ($data as $data) {


    $ttv=$ttv+($cnt*($data[$tpgdb]));
  }


}

$id=$datav->getIv();
$datav->create($idc,$tipg,$ttv,$pgi,$ftpg,$user,$tpg);
if($id<$datav->getIv()) {

 insertarDtllsvp($tpgdb);
 $saldo=$ttv-$pgi;

 $datav->pagoInicial($datav->getIv(),$ttv,$pgi,$saldo,$user,$user);
}else{

}


}
function insertarDtllsc($tp){
  $datav=new VentasModelo();
  $datap=new ProductoModelo();
  $carrito=$_SESSION['carrito'];
  $idv=$datav->getIv();
  for ($i=0; $i <count($carrito) ; $i++) {
   $idp=$carrito[$i]['idp'];
   $cnt=$carrito[$i]['cnt'];

   $data=$datap->getProductoID($idp);
   foreach ($data as $data) {


     $pv=$data[$tp];
     $des=0;


   }			

   $datav->createDtlle($pv,$cnt,$des,$idv,$idp);
   $datav->actualizarAlmacen($idp,$cnt);
   $_SESSION['carrito']=NULL;

 }
 echo $datav->getIv();


}
function insertarDtllsvp($tp){
  $datav=new VentasModelo();
  $datap=new ProductoModelo();
  $carrito=$_SESSION['carrito'];
  $idv=$datav->getIv();
  for ($i=0; $i <count($carrito) ; $i++) {
   $idp=$carrito[$i]['idp'];
   $cnt=$carrito[$i]['cnt'];

   $data=$datap->getProductoID($idp);
   foreach ($data as $data) {


     $pv=$data[$tp];
     $des=0;


   }			

   $datav->createDtlle($pv,$cnt,$des,$idv,$idp);
   $datav->actualizarAlmacen($idp,$cnt);
   $_SESSION['carrito']=NULL;

 }
 echo $datav->getIv();





}
function finalizar($idc){
 $datap=new ProductoModelo();
 $datav=new VentasModelo();
 $ftpg="NOW()";
 $user=$_SESSION['usuario'];
 $tpg="";
 $carrito=$_SESSION['carrito'];
 $ttv=0;
 for ($i=0; $i <count($carrito) ; $i++) {
  $idp=$carrito[$i]['idp'];
  $cnt=$carrito[$i]['cnt'];
  $desc=$carrito[$i]['desc'];
  $data=$datap->getProductoID($idp);
  foreach ($data as $data) {
   if ($desc==1) {
    $ttv=$ttv+($cnt*($data['p_contado']-$data['descuento']));
  }else{
    $ttv=$ttv+($cnt*($data['p_contado']));
  }


}
}
$id=$datav->getIv();
$datav->create($idc,"NO APLICA",$ttv,$ttv,$ftpg,$user,$tpg);
if ($id<$datav->getIv()) {
 insertarDtlls();
}else{
 echo "Ha ocurrido un error!c2";
}


}
function insertarDtlls(){
  $datav=new VentasModelo();
  $datap=new ProductoModelo();
  $carrito=$_SESSION['carrito'];
  $idv=$datav->getIv();
  for ($i=0; $i <count($carrito) ; $i++) {
   $idp=$carrito[$i]['idp'];
   $cnt=$carrito[$i]['cnt'];
   $descst=$carrito[$i]['desc'];
   $data=$datap->getProductoID($idp);
   foreach ($data as $data) {

     if($descst==1){
       $pv=$data['p_contado']-$data['descuento'];
       $des=$data['descuento'];
     }else{
       $pv=$data['p_contado'];
       $des=0;
     }

   }			

   $datav->createDtlle($pv,$cnt,$des,$idv,$idp);
   $datav->actualizarAlmacen($idp,$cnt);
   $_SESSION['carrito']=NULL;

 }
 echo $datav->getIv();






}
function desproducto($idp,$ac){
 $carrito=$_SESSION['carrito'];
 for ($i=0; $i <count($carrito) ; $i++) {

   if($carrito[$i]['idp']==$idp){
    $carrito[$i]['desc']=$ac;


  }
}
$_SESSION['carrito']=$carrito;


}
function dtllCcdt($idc){

  $datap=new ProductoModelo();
  $dataCliente=new ClienteModelo();
  $datac=$dataCliente->getClienteID($idc);
  $dmc="";
  foreach ($datac as $datac) {
    $dmc=$datac['domicilio'];
  } 	
  $view="";
  $carrito=$_SESSION['carrito'];
  $view.='
  <table class="table table-striped table-advance table-hover">

    <thead>
    </thead>
    <tbody>
      <td><div class="form-group">
        <label class="col-sm-4 col-sm-4control-label">DOMICILIO:</label>
        <div class="col-sm-12">
          <input  required="required" value="'.$dmc.'" class="form-control">
        </div>
      </div> </td>
      <td></td>
    </tr><tr>
    <td>
      <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">ENGANCHE:</label>
        <div class="col-sm-4">
          <input  id="pgi" required="required" placeholder="0.0"  class="form-control">
        </div>
      </div>

    </td>
    <td>
      <div class="form-group"> REALIZAR PAGOS:
        <select id="tmpg" class="form-control">
          <option> SEMANAL</option>
          <option> QUINCENAL</option>
          <option> MENSUAL</option>

        </select>
      </div>
    </td>
    <td></td></tr>
  </tbody>
</table>
<table class="table table-striped table-advance table-hover">

  <thead>
    <tr>
      <th ><i ></i> Cantidad</th>
      <th ><i ></i> Clave</th>
      <th><i ></i>Descripcion</th>
      <th ><i ></i> Precio c/u</th>
      <th ><i ></i> Enganche</th>
      <th ><i ></i> Semanal</th>
      <th ><i ></i> Quincenal</th>
      <th ><i ></i> Mensual</th>
      <th ><i ></i> SubTotal</th>



    </tr>
  </thead>
  <tbody>';
    $tt=0;
                //$tstcD=0;
    for ($i=0; $i <count($carrito) ; $i++) {
     $idp=$carrito[$i]['idp'];
     $cnt=$carrito[$i]['cnt'];
     $view.='<tr>';
     $view.='<td>'.$cnt.'</td>';
     $data=$datap->getProductoID($idp);


     foreach ($data as $data) {
    
       $st=$cnt*$data['p_credito'];
       $tt=$tt+$st;
                			//$tstc=$tstc+$stc;
                			//$tstcD=$tstcD+$stcd;
      $ctg=$datap->getNameCTG($data['categoria']);
      $mrk=$datap->getNameMRK($data['marca_id_marca']);
       $view.='<td>'.$data['clave'].'</td>';
       $view.='<td>'.$ctg.' '.$mrk.' '.$data['descripcion'].'</td>';
       $view.='<td >'.$data['p_credito'].'</td>';
       $view.='<td >'.$data['enganche'].'</td>';
       $view.='<td >'.$data['semanal'].'</td>';
       $view.='<td >'.$data['quincenal'].'</td>';
       $view.='<td >'.$data['mensual'].'</td>';
       $view.='<td >'.$st.'</td>';


     }
     $view.='<td>';

     $view.='</tr>';
   }
   $view.='<tr>';
   $view.='<td>&nbsp;&nbsp;</td>';
   $view.='<td> <h4>Total: $</h4></td>';
   $view.='<td > <h4> <label id="tt"> '.$tt.'</label></h4></td>';
   $view.='<td>&nbsp;&nbsp;</td>';
   $view.='<td >&nbsp;</td>';
   $view.='<td>&nbsp;&nbsp;</td>';
   $view.='<td>&nbsp;&nbsp;</td>';
   $view.='</tr>';
   $view.='</table>';
   $view.='
   <center> 
    <div id="bt">
      <button type="button" onclick="finalizarc();" class="btn btn-round btn-danger"  ><i class="fa fa-save fa-lg" > Terminar</i></button>   <a  href="caja"> <button type="button" class="btn btn-round btn-success"   ><i class="fa fa-arrow-left  fa-lg" > Regresar</i></button></a> 
    </div> 


  </center>';

  echo $view;
}

function dtllvp($tp,$idc){

  $datap=new ProductoModelo();
  $dataCliente=new ClienteModelo();
  $datac=$dataCliente->getClienteID($idc);
  $dmc="";
  foreach ($datac as $datac) {
   $dmc=$datac['domicilio'];
 }		
 $view="";
 $carrito=$_SESSION['carrito'];
 $view.='
 <table class="table table-striped table-advance table-hover">

  <thead>
  </thead>
  <tbody>
    <td><div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">DOMICILIO:</label>
      <div class="col-sm-10">
        <input  required="required" value="'.$dmc.'" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">PAGO INICIAL:</label>
      <div class="col-sm-4">
        <input  id="pgi" required="required" placeholder="0.0"  class="form-control">
      </div>
    </div>
  </td>
</tr>
</tbody>
</table>


<table class="table table-striped table-advance table-hover">

  <thead>
    <tr>
      <th ><i ></i> Cantidad</th>
      <th ><i ></i> Clave</th>
      <th><i ></i>Descripcion</th>
      <th ><i ></i> Precio c/u</th>
      <th ><i ></i> SubTotal</th>



    </tr>
  </thead>
  <tbody>';
    $tt=0;
                //$tstcD=0;
    for ($i=0; $i <count($carrito) ; $i++) {
     $idp=$carrito[$i]['idp'];
     $cnt=$carrito[$i]['cnt'];
     $view.='<tr>';
     $view.='<td>'.$cnt.'</td>';
     $data=$datap->getProductoID($idp);
     $tpdb="";
     if ($tp=="DOS PAGOS") {
                		# code...
      $tpdb="p2pagos";
    }
    if ($tp=="TRES PAGOS") {
                		# code...
      $tpdb="p3pagos";
    }
    if ($tp=="CUATRO PAGOS") {
                		# code...
      $tpdb="p4pagos";
    }
    foreach ($data as $data) {

     $st=$cnt*$data[$tpdb];
     $tt=$tt+$st;
                			//$tstc=$tstc+$stc;
                			//$tstcD=$tstcD+$stcd;
     $ctg=$datap->getNameCTG($data['categoria']);
      $mrk=$datap->getNameMRK($data['marca_id_marca']);
       $view.='<td>'.$data['clave'].'</td>';
       $view.='<td>'.$ctg.' '.$mrk.' '.$data['descripcion'].'</td>';
     $view.='<td>'.$data['clave'].'</td>';
     $view.='<td>'.$data['descripcion'].'</td>';
     $view.='<td >'.$data[$tpdb].'</td>';
     $view.='<td >'.$st.'</td>';


   }
   $view.='<td>';

   $view.='</tr>';
 }
 $view.='<tr>';
 $view.='<td>&nbsp;&nbsp;</td>';
 $view.='<td> <h4>Total: $</h4></td>';
 $view.='<td > <h4> <label id="tt"> '.$tt.'</label></h4></td>';
 $view.='<td>&nbsp;&nbsp;</td>';
 $view.='<td >&nbsp;</td>';
 $view.='<td>&nbsp;&nbsp;</td>';
 $view.='<td>&nbsp;&nbsp;</td>';
 $view.='</tr>';
 $view.='</table>';
 $view.='
 <center> 
  <div id="bt">
    <button type="button" onclick="finalizarvp();" class="btn btn-round btn-danger"  ><i class="fa fa-save fa-lg" > Terminar</i></button>   <a  href="caja"> <button type="button" class="btn btn-round btn-success"   ><i class="fa fa-arrow-left  fa-lg" > Regresar</i></button></a> 
  </div> 


</center>';

echo $view;


}
function dtllCtdo(){
  $datap=new ProductoModelo();
  $view="";
  $carrito=$_SESSION['carrito'];
  $view.='<table class="table table-striped table-advance table-hover">

  <thead>
    <tr>
      <th ><i ></i> Cantidad</th>
      <th ><i ></i> Clave</th>
      <th><i ></i>Descripcion</th>
      <th ><i ></i> Precio c/u</th>
      <th ><i ></i> SubTotal</th>
      <th ><i ></i> Descuento</th>
      <th ><i ></i> Aplicar descuento </th>


    </tr>
  </thead>
  <tbody>';
    $tstc=0;
                //$tstcD=0;
    for ($i=0; $i <count($carrito) ; $i++) {
     $idp=$carrito[$i]['idp'];
     $cnt=$carrito[$i]['cnt'];
     $view.='<tr>';
     $view.='<td>'.$cnt.'</td>';
     $data=$datap->getProductoID($idp);
     foreach ($data as $data) {
       $stc=$cnt*$data['p_contado'];
       $td=$cnt*($data['descuento']);
       $tstc=$tstc+$stc;
                			//$tstcD=$tstcD+$stcd;
       $ctg=$datap->getNameCTG($data['categoria']);
      $mrk=$datap->getNameMRK($data['marca_id_marca']);
       $view.='<td>'.$data['clave'].'</td>';
       $view.='<td>'.$ctg.' '.$mrk.' '.$data['descripcion'].'</td>';
       $view.='<td >'.$data['p_contado'].'</td>';
       $view.='<td id="pc'.$idp.'">'.$stc.'</td>';
       $view.='<td id="ds'.$idp.'">'.$td.'</td>';
       $view.='<td> <select id="'.$idp.'" onchange="descontar('.$idp.');" class="form-control">
       <option>No aplicar</option>
       <option>Aplicar</option>
     </select>
   </td>';

 }
 $view.='<td>';

 $view.='</tr>';
}
$view.='<tr>';
$view.='<td>&nbsp;&nbsp;</td>';
$view.='<td> <h4>Total: $</h4></td>';
$view.='<td > <h4> <label id="tt"> '.$tstc.'</label></h4></td>';
$view.='<td>&nbsp;&nbsp;</td>';
$view.='<td >&nbsp;</td>';
$view.='<td>&nbsp;&nbsp;</td>';
$view.='<td>&nbsp;&nbsp;</td>';
$view.='</tr>';
$view.='</table>';
$view.='
<center> 
  <div id="bt">
    <button type="button" onclick="finalizar();" class="btn btn-round btn-danger"  ><i class="fa fa-save fa-lg" > Terminar</i></button>   <a  href="caja"> <button type="button" class="btn btn-round btn-success"   ><i class="fa fa-arrow-left  fa-lg" > Regresar</i></button></a> 
  </div> 


</center>';

echo $view;

}
function dtllf($idv){
  $datap=new ProductoModelo();
  $view="";
  $carrito=$_SESSION['carrito'];
  $st=explode('*', $idv);
  $stidv=$st[0];
  $tv=1;
  $ttv="";
  $mpgdo="";
  $tpgo="";
  $dmc="";
          //reciente=1
  if(isset($st[1])){
    $tv=0;
    $datav=new Ventas_Modelo();
    $data=$datav->getVenta(1,$stidv,"","","");
    foreach ($data as $data) {
     $ttv=$data['total_venta'];
     $mpgdo=$data['monto_pagado'];
     $tpgo=$data['tiempo_pagado'];
     $dmc=$data['domicilio'];
   } 
 }else{
  $datav=new VentasModelo();
  $data=$datav->getVenta(1,$stidv,"","","");
  foreach ($data as $data) {
    $ttv=$data['total_venta'];
    $mpgdo=$data['monto_pagado'];
    $tpgo=$data['tiempo_pag'];
    $dmc=$data['domicilio'];

  } 
}

$view.='
<table class="table table-striped table-advance table-hover">

  <thead>
  </thead>
  <tbody>
    <tr>
      <td><div class="form-group">
        <label class="col-sm-12 col-sm-12 control-label">Venta:</label>
        <div id="idv" class="col-sm-12">
          <input    value="'.$ttv.'"  disabled="true" class="form-control">
        </div>
      </div>
    </td>
    <td><div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Pagado:</label>
      <div id="idv" class="col-sm-12">
        <input    value="'.$mpgdo.'" disabled="true" class="form-control">
      </div>
    </div>
  </td>
  <td><div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">T.Pago</label>
    <div id="idv" class="col-sm-12">
      <input    value="'.$tpgo.'" disabled="true" class="form-control">
    </div>
  </div>
</td>
</tr>
</tbody>
</table>';

$view.= '<table class="table table-striped table-advance table-hover">

<thead>
</thead>
<tbody>
  <tr>
    <td><div class="form-group">
      <label class="col-sm-1 col-sm-1 control-label">DOMICILIO:</label>
      <div id="idv" class="col-sm-6">
        <input    value="'.$dmc.'" disabled="true"  class="form-control">
      </div>
    </div></td>
  </tr>
</tbody>
</table>
<table class="table table-striped table-advance table-hover">

  <thead>
    <tr>
      <th ><i ></i> Cantidad</th>
      <th ><i ></i> Clave</th>
      <th><i ></i>Descripcion</th>
      <th ><i ></i> Precio c/u</th>
      <th ><i ></i> SubTotal</th>
    </tr>
  </thead>
  <tbody>';
    $tstc=0;
                //$tstcD=0;
    for ($i=0; $i <count($carrito) ; $i++) {
      $idp=$carrito[$i]['idp'];
      $cnt=$carrito[$i]['cnt'];
      $view.='<tr>';
      $view.='<td>'.$cnt.'</td>';
      $data=$datap->getProductoID($idp);
      foreach ($data as $data) {
        $stc=$cnt*$data['p_credito'];

        $tstc=$tstc+$stc;
                      //$tstcD=$tstcD+$stcd;
        $view.='<td>'.$data['clave'].'</td>';
        $view.='<td>'.$data['descripcion'].'</td>';
        $view.='<td >'.$data['p_credito'].'</td>';
        $view.='<td id="pc'.$idp.'">'.$stc.'</td>';
      }
      $view.='<td>';

      $view.='</tr>';
    }
    $view.='<tr>';
    $view.='<td>&nbsp;&nbsp;</td>';
    $view.='<td> <h4>Total: $</h4></td>';
    $view.='<td > <h4> <label id="tt"> '.($tstc+$ttv).'</label></h4></td>';
    $view.='<td>&nbsp;&nbsp;</td>';
    $view.='<td >&nbsp;</td>';
    $view.='<td>&nbsp;&nbsp;</td>';
    $view.='<td>&nbsp;&nbsp;</td>';
    $view.='</tr>';

    $view.='</table>';
    $view.='
    <center> 
      <div id="bt">
       <button type="button" onclick="finalizarf();" class="btn btn-round btn-danger"  ><i class="fa fa-save fa-lg" > Fusionar</i></button>   <a  href="caja"> <button type="button" class="btn btn-round btn-success"   ><i class="fa fa-arrow-left  fa-lg" > Regresar</i></button></a> 
     </div> 


   </center>';

   echo $view;

 }
 function viewc(){
  $dataCliente=new ClienteModelo();
  $data=$dataCliente->getCliente(0,"","");
  $view="";
  $view.='<div class="content-panel">
  <center> <b><h3><label id="tp">CREDITO</label></h3></b></center><hr>
  <table class="table table-striped table-advance table-hover">

    <thead>
    </thead>
    <tbody>
      <tr>
        <td><div class="form-group">';
          $view.='<select id="idc" onchange="selectCc();" class="form-control">';
          $view.="<option>SELECCIONE EL CLIENTE:</option>";
          foreach ($data as $data) {
           if ($dataCliente->isMoroso($data['idcliente'])) {
            $view.="<option style='background-color:#F1B5C0' disabled>".$data['nombres']." ".$data['apellido_paterno']." ".$data['apellido_materno']." /".$data['idcliente']."</option>";
          }else{
            $view.="<option  >".$data['nombres']." ".$data['apellido_paterno']." ".$data['apellido_materno']." /".$data['idcliente']."</option>";
          }
        }
        $view.='</select>';

        $view.='</div>
      </td>
      <td><div class="form-group">
        <label class="col-sm-3 col-sm-3 control-label">ID-TARJETA:</label>
        <div id="idv" class="col-sm-4">
          <input   required="required" value="Esperando..." disabled="true" class="form-control">
        </div>
      </div>
    </td>
  </tr>
</tbody>
</table>
<div id="dtlles" class="form-group">

</div>



</div>


';
echo $view;
}
function viewvp($tpagos){
  $dataCliente=new ClienteModelo();
  $data=$dataCliente->getCliente(0,"","");
  $view="";
  $view.='<div class="content-panel">
  <center> <b><h3><label id="tp">'.$tpagos.'</label></h3></b></center><hr>
  <table class="table table-striped table-advance table-hover">

    <thead>
    </thead>
    <tbody>
      <tr>
        <td><div class="form-group">';
          $view.='<select id="idc" onchange="selectCvp(idc);" class="form-control">';
          $view.="<option>SELECCIONE EL CLIENTE:</option>";
          foreach ($data as $data) {
           if ($dataCliente->isMoroso($data['idcliente'])) {
            $view.="<option style='background-color:#F1B5C0' disabled>".$data['nombres']." ".$data['apellido_paterno']." ".$data['apellido_materno']." /".$data['idcliente']."</option>";
          }else{
            $view.="<option  >".$data['nombres']." ".$data['apellido_paterno']." ".$data['apellido_materno']." /".$data['idcliente']."</option>";
          }
        }
        $view.='</select>';

        $view.='</div>
      </td>
      <td><div class="form-group">
        <label class="col-sm-3 col-sm-3 control-label">ID-TARJETA:</label>
        <div id="idv" class="col-sm-4">
          <input   required="required" value="Esperando..." disabled="true" class="form-control">
        </div>
      </div>
    </td>
  </tr>
</tbody>
</table>
<div id="dtlles" class="form-group">

</div>
</div>';
echo $view;
}
function viewf(){
  $datav=new ventasModelo();
  $datva=new ventas_Modelo();
  $datavv=$datav->getVenta(0,"","","","");
  $datavva=$datva->getVenta(0,"","","","");
  $view="";
  $view.='<div class="content-panel">
  <center> <b><h3><label id="tp">FUSIONAR VENTAS</label></h3></b></center><hr>
  <table class="table table-striped table-advance table-hover">

    <thead>
    </thead>
    <tbody>
      <tr>
        <td><div class="form-group">';
          $view.='<select id="idv" onchange="selectVent();" class="form-control">';
          $view.="<option>SELECCIONE LA TARJETA:</option>";
          foreach ($datavv as $datavv) {
            if ($datavv['tipo_pago']=="CREDITO") {
              $view.='<option>'.$datavv['idventa'].'</option>';
            }
          }
          foreach ($datavva as $datavva) {
            if ($datavva['tipo_pago']=="CREDITO") {
              $view.='<option style="background-color:#d8bfc8 " >'.$datavva['idventa_a'].'**'.'</option>';
            }
          }
          $view.='</select>';

          $view.='</div>
        </td>
        <td><div class="form-group">
          <label class="col-sm-12 col-sm-12 control-label"></label>
          <div id="idv" class="col-sm-12">
            <input    value=""  disabled="true" class="form-control">
          </div>
        </div>
      </td>
      <td><div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label"></label>
        <div id="idv" class="col-sm-12">
          <input    value="" disabled="true" class="form-control">
        </div>
      </div>
    </td>
    <td><div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label"></label>
      <div id="idv" class="col-sm-12">
        <input    value="" disabled="true" class="form-control">
      </div>
    </div>
  </td>
</tr>
</tbody>
</table>

<div id="dtlles" class="form-group">

</div>



</div>


';
echo $view;
}
function viewCtdo(){
  $dataCliente=new ClienteModelo();
  $data=$dataCliente->getCliente(0,"","");
  $view="";
  $view.='<div class="content-panel">
  <center> <label ><b><h3> CONTADO </h3> </b> </label></center><hr>
  <table class="table table-striped table-advance table-hover">

    <thead>
    </thead>
    <tbody>
      <tr>
        <td><div class="form-group">';
          $view.='<select id="idc" onchange="selectC(idc);" class="form-control">';
          $view.="<option>SELECCIONE EL CLIENTE:</option>";
          foreach ($data as $data) {
           if ($dataCliente->isMoroso($data['idcliente'])) {
            $view.="<option style='background-color:#F1B5C0' disabled>".$data['nombres']." ".$data['apellido_paterno']." ".$data['apellido_materno']." /".$data['idcliente']."</option>";
          }else{
            $view.="<option  >".$data['nombres']." ".$data['apellido_paterno']." ".$data['apellido_materno']." /".$data['idcliente']."</option>";
          }
        }
        $view.='</select>';

        $view.='</div>
      </td>
      <td><div class="form-group">
        <label class="col-sm-3 col-sm-3 control-label">ID-TARJETA:</label>
        <div id="idv" class="col-sm-4">
          <input   required="required" value="Esperando..." disabled="true" class="form-control">
        </div>
      </div>
    </td>
  </tr>
</tbody>
</table>
<div id="dtlles" class="form-group">

</div>



</div>


';
echo $view;
}

function viewProccess($tp){
  switch ($tp) {
   case 1:
  				# code...
   viewCtdo();
   break;
   case 2:
  				# code...
   viewvp("DOS PAGOS");
   break;
   case 3:
  				# code...
   viewvp("TRES PAGOS");
   break;
   case 4:
  				# code...
   viewvp("CUATRO PAGOS");

   break;
   case 0:
  		viewc();
      		# code...
   break;
   
   case 5:
          # code...
   viewf();

   break;

   default:
  				# code...
   break;
 }

}
?>