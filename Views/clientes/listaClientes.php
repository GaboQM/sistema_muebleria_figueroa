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
         
                <h4 class="mb"><i class="fa fa-angle-right"></i>Ver informacion del cliente:</h4>
                <div id="ntf"></div>
                <form  method="post" class="form-inline">
                    <form  method="post" class="form-inline"  >
                    <table class="table table-striped table-advance table-hover">
                    
                    <tbody>
                    <tr>
                   <td><div class="form-group">
                                
                                <div  class="col-sm-10">
                                    <input type="text" id="name" onkeyup="getClienteK()" placeholder="Nombre" class="form-control">
                                </div>
                            </td>
                      <td><div class="form-group">
                                
                                <div  class="col-sm-10">
                                    <input type="text" id="ap" onkeyup="getClienteK()" placeholder="Apellido" class="form-control">
                                </div>
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

          </div>

               
          </div>

        </section><! --/wrapper -->


      </section>




 <!--main content end-->
      <!--footer start-->
      



  
 <?php
include('Views/bases/footer.php');
?>
 <script type="text/javascript" src="Views/assets/clientesjs/lista.js"></script>
 <script type="text/javascript" src="Views/assets/clientesjs/updCliente.js"></script>


  </body>
</html>