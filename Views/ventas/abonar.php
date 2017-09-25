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
                <h4 class="mb"><i class="fa fa-angle-right"></i> Abonar: Buscar</h4>
                <form  method="post" class="form-inline"  >
                

                   <table class="table table-striped table-advance table-hover"> 
                    <tbody>
                    <tr>
                   <td><div class="form-group">
                                
                                <div class="col-sm-10">
                                    <input id="idv" type="text" onkeyup="bskKey(this.value);"  placeholder="N° tarjeta" class="form-control">
                                </div>
                            </td>
                      <td><div class="form-group">
                                
                                <div class="col-sm-10">
                                    <input type="text" id="mcp" onkeyup="bskdtll(this.value);"   placeholder="Municipio" class="form-control">
                                </div>
                            </td>
                             <td><div class="form-group">
                                
                                <div class="col-sm-10">
                                    <input type="text" id="name" onkeyup="bskdtll(this.value);"  placeholder="Nombre" class="form-control">
                                </div>
                            </td>
                             <td><div class="form-group">
                                
                                <div class="col-sm-10">
                                    <input type="text" id="pa" onkeyup="bskdtll(this.value);" placeholder="Primer apellido" class="form-control">
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
 <script type="text/javascript" src="Views/assets/ventasjs/abonarjs.js"></script>
 <!-- link calendar resources -->
  
  <script type="text/javascript" src="Views/calendario/tcal.js"></script> 

  </body>
</html>
