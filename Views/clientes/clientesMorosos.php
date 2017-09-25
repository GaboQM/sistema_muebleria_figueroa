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
          <div class="form-panel" >
            <h4 class="mb"><i class="fa fa-angle-right"></i> Clientes Morosos</h4>
            <form  method="post" class="form-inline"  >
              <form  method="post" class="form-inline"  >

               <table class="table table-striped table-advance table-hover">


                <tbody>
                  <tr>
                    <td><div class="form-group">

                      <div class="col-sm-10">
                        <input type="text" id="name" onkeyup="getMorosos();" placeholder="Nombre" class="form-control">
                      </div>
                    </td>
                    <td><div class="form-group">

                      <div class="col-sm-10">
                        <input type="text" id="ap"  onkeyup="getMorosos()" placeholder="Apellido Paterno" class="form-control">
                      </div>
                    </td>
                    <td>

                      <button type="button" onclick="mcm();" class="btn btn-round btn-danger" data-toggle="modal" data-target="#myModal">
                        Añadir cliente a la lista
                      </button>     
                    </td>
                  </tr>

                </tbody>
              </table>

            </form>
          </div>

          <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
              <div id="tbody">

                
              </div>
                
                  <form  action="" method="post">
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Añadir a la lista</h4>
                          </div>
                          <div class="modal-body">

                            <div class="showback">

                              <label ><b>ID | CLIENTE:</b></label>
                              <div id="cm">
                                

                              </div> 
                              <label ><b>N° DE TARJETA:</b></label>
                              <div >
                                <input id="idV" required="required" class="form-control">
                              </div> 
                              <label ><b>VENTA TOTAL:</b></label>
                              <div >
                                <input id="ctd" required="required" class="form-control">
                              </div>
                              <label ><b>Pagado:</b></label>
                              <div >
                                <input id="pgd" required="required" class="form-control">
                              </div>
                              <label ><b>DETALLE DE LA VENTA:</b></label>

                              <div >
                              <label ><b>Cantidad  |Producto  |  Descripción  |  Precio </b></label>
                                <TEXTAREA id="dv" rows="10" required="required" class="form-control"></TEXTAREA> 
                              </div>

                            </div><!--showback-->





                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-round btn-success" data-dismiss="modal"> S a l i r </button>
                            <button type="submit" name="submit" onclick="createM();" class="btn btn-round btn-danger"   >Aceptar</button>

                          </div>
                        </div>
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
 
  <script type="text/javascript" src="Views/assets/clientesjs/morosos.js"></script>

  </body>
</html>
