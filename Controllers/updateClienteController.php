<?php 
session_start();
		if($_SESSION){
			if(isset($_GET['action'])){
				require('../Models/class.conexion.php') ;
				require('../Models/ClienteModelo.php');
				if($_GET['action']=='edit'){
						$idc=$_GET['idc'];
            mostrarClientesEdit($idc);
				}
        if($_GET['action']=='upd'){
          $dataCliente=new ClienteModelo();
      $data=$dataCliente->update($_GET['idc'],strtoupper($_GET['name']),strtoupper($_GET['ap']),strtoupper($_GET['am']),strtoupper($_GET['rfc']),$_GET['tel'],strtoupper($_GET['dmc']),strtoupper($_GET['rfr']));
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


function mostrarClientesEdit($idc){
	
	$dataCliente=new ClienteModelo();
			$data=$dataCliente->getClienteID($idc);
	$view="";
  $arrayDATA="";

                    foreach ($data as $data) {
                      
                      $arrayDATA=$data;
                    }
    $view.='
                            <div class="form-group">
                            <table class="table table-striped table-advance table-hover">
                    
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                   <td>
                   <label class="col-sm-2 col-sm-2 control-label">Nombre (s):</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nom" value="'.$arrayDATA['nombres'].'"   class="form-control" >
                                </div>
                           
                   </td>
                    <td>
                   <label class="col-sm-2 col-sm-2 control-label">Ap. paterno:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="app" value="'.$arrayDATA['apellido_paterno'].'"  class="form-control" >
                                </div>
                         
                   </td>
                   <td>
                   <label class="col-sm-2 col-sm-2 control-label">Ap. materno:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="am" value="'.$arrayDATA['apellido_materno'].'"  class="form-control" >
                                </div>
                          
                   </td>
                   </tr>
                   <tr>
                   </tr>
                   <tr>
                   <td>
                       <label class="col-sm-2 col-sm-2 control-label">RFC:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="rfc" value="'.$arrayDATA['rfc'].'"   class="form-control" >
                                </div>
                            
                   </td>
                    <td>
                       <label class="col-sm-2 col-sm-2 control-label">TEL:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tel" value="'.$arrayDATA['tel'].'"   class="form-control" >
                                </div>
                            
                   </td>
                   <td>
                       <label class="col-sm-2 col-sm-2 control-label">Domicilio:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="dmc" value="'.$arrayDATA['domicilio'].'"  class="form-control" >
                                </div>
                            
                   </td>

                   </tr>
                   </table>
                   <table class="table table-striped table-advance table-hover">
                    
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                   <td>
                   <label class="col-sm-2 col-sm-2 control-label">Referencia:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="rfr"  value="'.$arrayDATA['referencia'].'"  class="form-control" >
                                </div>
                           
                   </td>
                    <td>
                   <div class="modal-footer">
                                                
                                                <button onclick="upd();" type="button" name="submit" class="btn btn-round btn-danger"   >Actualizar</button>
                                              
                                              </div>
                           
                   </td>
                   </tr>
                   </table>

                   
                   </div>
                                
                            
                           
                                
';
                            

                             
                                  
                              

               
              
                
     echo $view;
}