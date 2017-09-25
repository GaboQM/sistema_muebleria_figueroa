<?php
require('../Models/Login.php');
$user=$_POST['user'];
$pass=$_POST['pass'];
$dataLogin=new Login();
$data=$dataLogin->getUsuario($user,$pass);
//var_dump($data);
if(	!$data[0]){
	echo '<div class="alert alert-dismissible alert-danger">
 
  <strong>!Usuario o contraseña incorrecto! verique y vuelva a iniciar...!</strong> 
</div>';

}else{
if(!isset($_SESSION)){
	//iniciando los variables de usuario
	session_start();
	foreach ($data as $data) {

	$_SESSION['idusuario']=$data[0];
	$_SESSION['privilegio']=$data[1];
	$_SESSION['usuario']=$data[3];

	
}
}
echo 1;
}

?>