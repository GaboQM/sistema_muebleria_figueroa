
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
              <div   class="form-panel" >
         
                <h4 class="mb"><i class="fa fa-angle-right"></i>CAJA</h4>
                <div id="ntf"></div>
                <form  method="post" class="form-inline"  >
                    <form  method="post" class="form-inline"  >
                    <table class="table table-striped table-advance table-hover">
                    
                    <tbody>
                    <tr>
                   <td><div class="form-group">
                                
                                <div id="keydiv" class="col-sm-10">
                                    <input type="text" id="key" onkeyup="bskProductoKey(this.value)" placeholder="clave producto" class="form-control">
                                </div>
                            </td>

                      <td><div class="form-group">
                                
                                 <div id="cctg" class="col-sm-8">
                                   
                            
                                </div>
                            </td>
                           
                            <td><div class="form-group">
                                
                                <div id="mrc"  class="col-sm-8">
                                    

                                </div>
                            </td>
                  </tr>
             
                   </tbody>
                 </table>

               </form>
             </div>

             <div class="row mt">
             <div  id="v1" class="col-lg-6 col-md-6 col-sm-12">
          </div>

           
          <div class="row mt">
             <div  id="v2" class="col-lg-6 col-md-6 col-sm-12">

          </div><! --/col-lg-6 -->
          </div>
        </section><! --/wrapper -->


      </section>

      <!--main content end-->
      <!--footer start-->
      



	
 <?php
include('Views/bases/footer.php');
?>
  <script type="text/javascript" src="Views/assets/ventasjs/caja.js"></script>

  </body>
</html>
