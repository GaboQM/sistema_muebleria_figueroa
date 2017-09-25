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
             <div class="row mt">
              <div class="col-md-12">
                <div class="content-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i>Introduzca la información del producto</h4>
                <div id="ntf"></div>
                <hr>
                <form >
                <div class="form-group">
                  <table class="table table-striped table-advance table-hover">
                    
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                   <td><div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">CATEGORIA:</label>
                                <div id="cctg" class="col-sm-12">
                                    
                                </div>
                            </div></td>
                  <td><div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">MARCA:</label>
                                <div id="mrc" class="col-sm-12">
                                    
                                </div>
                            </div></td>
                      
                  <td><div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">CLAVE: </label>
                                <div class="col-sm-12">
                                    <input type="text" id="key" onkeyup="keyRepeat()" required="required"  placeholder="Introduzca la clave del producto" class="form-control">
                                    <div  id= "kr" class="form-group"></div>
                                </div>
                                
                            </div>
                  </td>
                  </tr>
                   </tbody>
                 </table>
                 <table class="table table-striped table-advance table-hover">
                    
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                    <td><div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">DESCRIPCION:</label>
                                <div class="col-sm-12">
                                    <input type="text" id="des" required="required" placeholder="Introduzca las características que identifica el producto (color, capacidad, tamaño, versiónes,etc)."  class="form-control">
                                </div>
                            </div>
                  </td> 
                    </tr>
                   </tbody>
                 </table>
                  <table class="table table-striped table-advance table-hover">
                    
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$PRECIO CONTADO:</label>
                                <div class="col-sm-12">
                                    <input  id="pctd" required="required" placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$DESCUENTO-CONTADO:</label>
                                <div class="col-sm-12">
                                    <input  id="dctd" required="required" placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>

                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$PRECIO CREDITO: </label>
                                <div class="col-sm-12">
                                    <input  id="pcrd" required="required"  placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label"> $ENGANCHE-CREDITO: </label>
                                <div class="col-sm-12">
                                    <input  id="ecrd" required="required" placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>

                  </tr>
                  <tr></tr>
                    <tr>
          
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">SEMANAL:</label>
                                <div class="col-sm-12">
                                    <input  id="psm" required="required" placeholder="0.0" class="form-control">
                                </div>
                            </div>
                  </td>

                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">QUINCENAL: </label>
                                <div class="col-sm-12">
                                    <input  id="pqm" required="required" placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">MENSUAL: </label>
                                <div class="col-sm-12">
                                    <input  id="pms" required="required" placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  </tr>
                  <tr>
                    
                  </tr>
                    <tr>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$ EN 2 PAGOS:</label>
                                <div class="col-sm-12">
                                    <input  id="p2" required="required" placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$ EN 3 PAGOS:</label>
                                <div class="col-sm-12">
                                    <input  id="p3" required="required" placeholder="0.0" class="form-control">
                                </div>
                            </div>
                  </td>

                  <td><div class="form-group">
                                <label class="col-sm-6 col-sm-6 control-label">$ EN 4 PAGOS: </label>
                                <div class="col-sm-12">
                                    <input  id="p4" required="required" placeholder="0.0"  class="form-control">
                                </div>
                            </div>
                  </td>
                  </tr>
                   </tbody>
                 </table>

                  <center>
                    
                      <button type="button"  style="width:150px" class="btn btn-round btn-danger" data-toggle="modal" data-target="#myModal" > <i class="fa fa-save  fa-lg"  > Guardar</i></button>
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
                                                Verifique bien los datos y presione Aceptar para confirmar...
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-round btn-success" data-dismiss="modal">Cancelar</button>
                                                <button id= "gPdct" type="submit" onclick="addProducto()" class="btn btn-round btn-danger"   >Aceptar</button>
                                              
                                              </div>
                                            </div>
                                          </div>
                                        </div>  <!--modal end -->
                                                 



                </div>
                </div>
                  
                </form>
                  

          </div>


        </section><! --/wrapper -->


      </section>






 <!--main content end-->
      <!--footer start-->
      



  
 <?php
include('Views/bases/footer.php');
?>
 
 <script type="text/javascript" src="Views/assets/productosjs/newProducto.js"></script>

  </body>
</html>
