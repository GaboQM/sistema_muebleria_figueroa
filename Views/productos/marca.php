
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
          <div class="form-panel" >
                <h4 class="mb"><i class="fa fa-angle-right"></i>Marcas registradas</h4>
                <form  method="post" class="form-inline"  >
                    <form  method="post" class="form-inline"  >
                    <center>
                    
                      <button type="button" style="width:150px" class="btn btn-round btn-success" data-toggle="modal" data-target="#myModal" > Añadir marca </button>
                    </center>
               </form>
             </div>

             <div class="row mt">
              <div class="col-md-12">
                <div class="content-panel">

                <div id="tbody">
                  
                </div>
                  

                  <form   method="post">
                    <!-- Modal -->
                    <div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">NUEVA MARCA</h4>
                          </div>
                          <div class="modal-body">

                            <div class="showback">

                              <label ><b>NOMBRE MARCA</b></label>
                              <div >
                                <input  id="mrk" name="categoria" required="required" class="form-control">
                              </div> 
                               
                            </div><!--showback-->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-round btn-success" data-dismiss="modal">S a l i r </button>
                            <button  type="submit"  onmousedown="agregarMarca()" data-dismiss="" name="--" class="btn btn-round btn-danger">Aceptar</button>

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
 
 <script type="text/javascript" src="Views/assets/productosjs/marca.js"></script>

  </body>
</html>
