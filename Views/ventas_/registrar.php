
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
                  <div class="col-lg-12">
                      <div class="form-panel">
                          <form  class="form-horizontal style-form"  enctype="multipart/form-data">
                          
                           <div class='alert alert-danger'><center><b>INTRODUZCA LOS DATOS DE LA VENTA QUE DESEA REGISTRAR: </b> </center> </div>

                          
                          <a class='fancybox'><CENTER><img  src='Views/imagen/banner.png' width='550' height='120' alt=''></CENTER></a>

                              <table class="table table-striped table-advance table-hover">
                      
                      <thead></thead>
                      <tbody>
                      <tr>
                        <td><div class="">
                                  <label class="col-sm-2 col-sm-2 control-label">Fecha de venta: </label>
                                  <div class="col-sm-6">
                                <select id="dd"  class="form-control">
                                <option>SELECCIONE EL DIA</option> 
                                <option>01</option> 
                                 <option>02</option>  
                                  <option>03</option> 
                                   <option>04</option> 
                                    <option>05</option> 
                                <option>06</option> 
                                 <option>07</option>  
                                  <option>08</option> 
                                   <option>09</option> 
                                    <option>10</option> 
                                <option>11</option> 
                                 <option>12</option>  
                                  <option>13</option> 
                                   <option>14</option> 
                                    <option>15</option> 
                                <option>16</option> 
                                 <option>17</option>  
                                  <option>18</option> 
                                   <option>19</option> 
                                    <option>20</option> 
                              <option>21</option> 
                                 <option>22</option>  
                                  <option>23</option> 
                                   <option>24</option> 
                                    <option>25</option> 
                              <option>26</option> 
                                 <option>27</option>  
                                  <option>28</option> 
                                   <option>29</option> 
                                    <option>30</option> 
                                  <option>31</option>
                                </select>
                                <select id="mm"  class="form-control">
                                <option>SELECCIONE EL MES </option> 
                                <option>ENERO</option> 
                                 <option>FEBRERO</option>  
                                  <option>MARZO</option> 
                                   <option>ABRIL</option> 
                                    <option>MAYO</option> 
                                <option>JUNIO</option> 
                                 <option>JULIO</option>  
                                  <option>AGOSTO</option> 
                                   <option>SEPTIEMBRE</option> 
                                    <option>OCTUBRE</option> 
                                <option>NOVIEMBRE</option> 
                                 <option>DICIEMBRE</option>  
                                  
                                </select>
                                <select id="aa"  class="form-control">
                                <option>SELECCIONE AÑO</option> 
                                <option>2000</option> 
                                <option>2001</option> 
                                 <option>2002</option>  
                                  <option>2003</option> 
                                   <option>2004</option> 
                                    <option>2005</option> 
                                <option>2006</option> 
                                 <option>2007</option>  
                                  <option>2008</option> 
                                   <option>2009</option> 
                                    <option>2010</option> 
                                <option>2011</option> 
                                 <option>2012</option>  
                                  <option>2013</option> 
                                   <option>2014</option> 
                                    <option>2015</option> 
                                <option>2016</option> 
                                 <option>2017</option> 
                                </select>

                                  </div>

                              </div>
                    </td>
                    
                            <td> 
                            <div class="">
                                      <select id="mp"  class="form-control">
                                <option>MODO DE PAGO</option> 
                                <option>DOS PAGOS</option> 
                                <option>TRES PAGOS</option> 
                                 <option>CUATRO PAGOS</option>  
                                   <option>CREDITO</option> 
                                   
                                </select>
                                <select id="tp"  class="form-control">
                                <option>TIEMPO DE PAGO</option> 
                                <option>SEMANAL</option> 
                                <option>QUINCENAL</option> 
                                 <option>MENSUAL</option>  
                                  
                                   
                                </select>

                                  </div>
                              </div>
                              

                                                        </td>
                             
                                                                 
                                                                 
                              
                                 </tr>
      
  <tr>
    
  </tr>

       <tr>

        <td>
          <div class="">
                                  <label class="col-sm-2 col-sm-2 control-label">CLIENTE:</label>
                                  <div id="lc" 
                                  class="col-sm-8">
                                     
                                  </div>
                              </div>
                               
        </td>
       <TD> </TD>
       
      </tr>
   <TR></TR>
     
      
  <tr >

        <td style="background-color:#F1D5C0">
          <div class="">
                                  <label class="col-sm-4 col-sm-4 control-label">VENTA TOTAL:</label>
                                  <div class="col-sm-6">
                                      <input type="text" id="vt"  placeholder="monto " required="required"  class="form-control">

                                  </div>
                              </div>

        </td>

        <td style="background-color:#F3D5C0">
          <div class="">
                                  <label class="col-sm-4 col-sm-4 control-label">MONTO PAGADO:</label>
                                  <div class="col-sm-6">
                                      <input type="text" id="pp" placeholder="cantidad pagada hasta el momento" required="required"  class="form-control">
                                  </div>
                              </div>
        </td>
       
      </tr>

     
  <TR></TR>
     
   
      
        
      
       <tr><td>
          <label ><b>DETALLE DE LA VENTA:</b></label>

                                <div >
                                <label><b>Cantidad  |Producto  |  Descripción  |  Precio </b></label>
                                  <TEXTAREA id="dtll" rows="6"  class="form-control"></TEXTAREA> 
                                </div>

        </td>
        <td>
          


        </td>
        
      </tr>


      


                       </tbody>
                   </table>
                  






                               
                               

                               <div class="form-group">
                                  
                              </div>

                             
                              

                                        <center> 
                                        <button type="button" class="btn btn-round btn-danger" data-toggle="modal" data-target="#myModal">Guardar informacion..</button>
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
                                                  Se actualizará los cambios realizado
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-round btn-success" data-dismiss="modal">Salir</button>
                                                  <button type="submit"  onclick="registrar()" name="submit" class="btn btn-round btn-danger">Aceptar</button>
                                                
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
   
   <script type="text/javascript" src="Views/assets/ventasjs_/ventas_.js"></script>

    </body>
  </html>
