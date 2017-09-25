<!DOCTYPE html>
<html lang="en">
<?php
include('Views/bases/head.php');
?>
  

 

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
       <body  >
  <?php
include('Views/bases/header.php');
?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->

    <?php
include('Views/bases/aside.php');
?>
      
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">  
                         
              
              <!-- BASIC FORM ELELEMNTS -->
              <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                    <h3><i class="fa fa-angle-right"></i>Clientes Nuevo</h3>
                    <hr>
                        <form   method="post" enctype="multipart/form-data">
                       

                        <table class="table table-striped table-advance table-hover">
                         
                              <thead></thead>
                                <tbody>
                                    <tr>
                                      <td> 
                                           
                                <label class="col-sm-2 col-sm-2 control-label">Nombre (s):  </label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" placeholder="obligatorio" required="required"  class="form-control">
                              
                            </div>
                                      </td>
                                        <td>
                                                                      <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Ap. paterno:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="aP" placeholder="obligatorio" required="required"  class="form-control">
                                </div>
                                </div>
                                 </td>
                                  <td>
                                     <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Ap. materno:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="aM" placeholder="obligatorio" required="required"  class="form-control">
                                </div>
                                </div>
                                  </td>
                                    </tr>
                                    <tr> </tr>
                                    <tr>
                                      <td>
                                          <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">RCF:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="rfc"   class="form-control">
                                </div>
                            </div>
                                      </td>
                                      <td>
                                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tel:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tel"   class="form-control">
                                </div>
                            </div>

                                      </td>
                                      <td>
                                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Municipio: </label>
                                <div class="col-sm-10">
                                    <input type="text" id="mpo" required="required" placeholder="obligatorio" class="form-control">
                                </div>
                                </div>
                                      </td>
                                    </tr>
                                    </tbody>
                                        </table>
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                      <tr><td>
                                <label class="col-sm-2 col-sm-2 control-label">Domicilio: </label>
                                <div class="col-sm-10">
                                    <input type="text" id="dmc" required="required" placeholder="Agencia-colonia-calle | obligatorio" class="form-control">
                                </div>
                            </div>
                  </td>
                            <td>
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Referencia:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="rfn" class="form-control">
                                </div>
                                </div>
                            </td>
                  </tr>
             
                   </tbody>
                 </table>
                
                            <label for="imagen">Cargar Foto (No obligatorio):</label>
                            <input type="file" name="imagenF" id="imagenF"  class="form-control" />
                            <label for="imagen">Cargar Credencial (No obligatorio):</label>
                            <input type="file" name="imagenC" id="imagenC" class="form-control" />
                            <label for="imagen">Cargar Comprobante de domicilio (No obligatorio):</label>
                            <input type="file" name="imagenD" id="imagenD"  class="form-control" />

                             <div class="form-group">
                                
                            </div>
                                      <center> 
                                      <button type="button" class="btn btn-round btn-danger" data-toggle="modal" data-target="#myModal">Guardar... </button>
                                      </center>
                                          <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Confirmar..</h4>
                                              </div>
                                              <div class="modal-body">
                                                Guardar la informacion...
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-round btn-success" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="submit" onclick="guardarCliente()" class="btn btn-round btn-danger"   >Aceptar</button>
                                              
                                              </div>
                                            </div>
                                          </div>
                                        </div>  <!--modal end -->
                                                 
                            
                        </form>
                    </div>
                </div><!-- col-lg-12-->       
              </div><!-- /row -->
              

        </section><! --/wrapper -->


      </section>




 <!--main content end-->
      <!--footer start-->
      



  
 <?php
include('Views/bases/footer.php');
?>
 
<script type="text/javascript" src="Views/assets/clientesjs/addClientes.js"></script>

  </body>
</html>
