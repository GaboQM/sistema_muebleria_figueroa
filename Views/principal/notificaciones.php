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
          <div id="v1" >
          <div  class="form-panel" >
                <h4 class="mb"><i class="fa fa-angle-right"></i> NOTIFICACIONES </h4>
                <form  method="post" class=""  >
                    <table class="table table-striped table-advance table-hover"> 
                    <tbody>
                    <tr>
                   <td><div class="">
                                
                                <div class="col-sm-6">
                                    <input id="Des" type="text" onkeyup="bskKey(this.value);"  placeholder="Descripcion (plbras claves)" class="form-control">
                                </div>
                            </td>
                  </td>
                  </tr>
             
                   </tbody>
                 </table>
                
               </form>
             </div>

             <div class="row mt">
              <div class="col-md-12">
                <div id="v2" class="content-panel">
                    
                   
                            </div>
                         </div>
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
 <script type="text/javascript" src="Views/assets/principal/notificacionjs.js"></script>

  </body>
</html>
