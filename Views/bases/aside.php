<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="Views/imagen/logo.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo "Gabo"; ?></h5>
              	  	<!--Menu/ principal-->
                  <li class="mt">
                      <a class="active" href="principal">
                          <i class="fa fa-home"></i>
                          <span>Principal</span>
                      </a>
                  </li> <!--Menu/ principal end-->


                  <!--Menu/ productos(categoria,marca,nuevoProducto,agregarProducto,cambiarPrecios)-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-qrcode "></i>
                          <span>Productos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="categoria">Categoría</a></li>
                          <li><a  href="marca">Marca</a></li>
                          <li><a  href="newProducto">Nuevo producto</a></li>
                          <li><a  href="addProducto">Agregar producto</a></li>
                          <li><a  href="updateProducto">Editar/cambiar/precio</a></li>
                      </ul>
                  </li>
                  <!--Menu/ productos end-->                 <!--Menu/ Clientes(agregarCliente,listaCLiente)-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Clientes</span>
                      </a>
                      <ul class="sub">
                          <li  ><a  href="listCliente">Lista</a></li>
                          <li><a  href="addCliente">Agregar cliente</a></li>
                          <li  ><a  href="morososCliente">Cliente morosos</a></li>
                      </ul>
                  </li><!--Menu/ Clientes end-->

                  <!--Menu/ Ventas(caja,abonar)-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-money"  ></i>
                          <span>Ventas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="caja">Caja</a></li>
                          <li><a  href="abonar">Abonar</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-money"></i>
                          <span style=" background-color:red" >Ventas Anteriores</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="registrar">Registrar</a></li>
                          <li><a  href="abonarA">Abonar</a></li>
                      </ul>
                  </li>

                  <!--Menu/ Ventas(caja,abonar)end -->
          <!--Menu/ notaPagare(agregarNP,listaNP)end 
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Nota/Pagare</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="notaAgregarNP.php">Agregar Nota/Pagare</a></li>
                          <li><a  href="notaListaNP.php">Lista</a></li>
                      </ul>
                  </li>-->
                  <!--Menu/ admin(local,usuario,historial,evento)-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-wrench"></i>
                          <span>Administración</span>
                      </a>
                      <ul class="sub">
                          <!--<li><a  href="local">Local</a></li>
                          <li><a  href="users">Usuarios</a></li>-->
                          <li><a  href="notificaciones">Notificaciones</a></li>
                          <li><a  href="eventos">Eventos</a></li>
                      </ul>
                  </li>
                  
                <!--Menu/ admin(local,usuario,historial,evento) end -->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>