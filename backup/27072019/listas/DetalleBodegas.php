<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    
    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rio Blanco | Aserradero</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="indexUs.php" class="site_title"><i class="fa fa-paw"></i> <span>Rio Blanco</span></a>
                </div>
    
                <div class="clearfix"></div>
    
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2><?php echo ''.$_SESSION['nombre_usuario']; ?></h2>
                  </div>
                </div>
                <!-- /menu profile quick info -->
    
                <br />
    
                <!-- sidebar menu -->
                 <?php
                 require_once "menuAdmin.php";
                  ?>
                <!-- /sidebar menu -->
    
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                  <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="../controllers/LoginControlador.php?accion=logout">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
                </div>
                <!-- /menu footer buttons -->
              </div>
            </div>
    
            <!-- top navigation -->
            <div class="top_nav">
              <div class="nav_menu">
                <nav>
                  <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
    
                  
                </nav>
              </div>
            </div>
            <!-- /top navigation -->
    
            <!-- page content -->
            <div class="right_col" role="main">
              
        
              

        
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pagina de DetalleBodegaes</h2>


                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
           <?php 
            if (isset($_GET['success'])) {
                
                if ($_GET['success']=='correcto') {
                    
                    echo '
              <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Correcto:</span>
                Los datos han sido guardados exitosamente.
           
                    ';
                }
            }elseif (isset($_GET['error'])) {
           
               if ($_GET['error']=='incorrecto') {
                    
                    echo '
                <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Incorecto:</span>
              
                Error al guardar, verifique los datos ingresados.

           
                    ';
                }
            }elseif (isset($_GET['seleccion'])) {
               if ($_GET['seleccion']=='nuevo') {
                    
                    echo '
                 <div class="alert alert-primary" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Atencion:</span>
              
                Ingrese todos los datos.
            
                    ';
                }
            }
             ?></div>
                  <div class="x_content">
                  
                      <!-- MODAL PARA AGREGAR UN NUEVO USUARIO-->


                   <input type="button" name="accion" value="Bodegas" id="accion" class="btn btn-primary view_data1" /> 
                    <br>
                    <br>
                    <?php 

                          if (isset($_GET["id"]) && isset($_GET["nombre"])) {
                        $codigo=$_GET["id"];
                        $nombre=$_GET["nombre"];
                        echo '<label><h2>Bodega: '.$nombre.'</h2></label>';
                          }else{
                            $codigo=0;
                            $nombre="Selecciones un Bodega";
                          }
           
                   ?>
                   <h1>Materiales Guardados</h1>
                    <div id="employee_table">
                    <table id="datatable-buttons" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                       <tr>
                          <th>Id</th>
                          <th>Material</th>
                          <th>Dimensiones</th>
                          <th>Categoria</th> 
                          <th>Cantidad de Piezas</th>  
                          <th>Opciones</th>                                  
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
            require_once "../class/DetalleBodega.php";
                         $ms = new DetalleBodega();
                         $contacto = $ms->selectALLP($codigo);
                         foreach ($contacto as $row) {
                          echo '<tr>
                          <td>'.$row['id_material'].'</td>
                          <td>'.$row['material'].'</td>
                           <td>'.$row['largo'].'x'.$row['ancho'].'x'.$row['grueso'].'</td>
                           <td>'.$row['categoria'].'</td>
                           <td>'.$row['cantidad'].'</td>
                           <td>
                             <input type="button" name="view" value="Trasladar" id="'.$row["id_material"].'" pl="'.$codigo.'" nombre="'.$nombre.'" cantidad="'.$row['cantidad'].'" class="btn btn-info new_traslado"/> 

                           </td>
                          ';
                            
                            echo'
                          </tr>';
                         }
           
            ?>
                         
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <br>
                  <br>
                  <h1>Productos Guardados:</h1>


                  <div id="employee_table">
                    <table id="example1" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                       <tr>
                          
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Traslado</th>                                 
                        </tr>
                      </thead>
                      <tbody>
                          <?php 

            require_once "../class/DetalleBodegaPro.php";
                         $db = new DetalleBodegaPro();
                         $productos = $db->selectALLP($codigo);
                         foreach ($productos as $ky) {
                       echo '
                          <tr>
                          
                           <td>'.$ky['preset'].'</td>
                            <td>'.$ky["cantidad"].' </td>
                            <td>
                             <input type="button" name="view" value="Trasladar" id="'.$ky["id_preset"].'" pl="'.$codigo.'" nombre="'.$nombre.'" cantidad="'.$ky['cantidad'].'" class="btn btn-info new_traslado_pro"/> 

                           </td>
                          </tr>
                         ';
           }
            ?>
                         
                      </tbody>
                    </table>
                  </div>

                  <br>
                  <br>
                  <br>
                  <h1>Traslados pendientes:</h1>
                  <h1>Materiales:</h1>
                      <div id="employee_table">
                    <table id="example3" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                       <tr>
                          <th>Material</th>
                          <th>Cantidad</th>
                          <th>Bodega Procedencia</th>
                          <th>Estado</th>  
                          <th>Confirmar</th>                                
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
            require_once "../class/Traslado.php";
            require_once "../class/Bodega.php";
                        $bodega = new Bodega();
                         $tras = new Traslado();
                         $traslados = $tras->selectTrasladoDestino($codigo);
                         foreach ($traslados as $ky) {
                       echo '
                          <tr>
                           <td>'.$ky['nombre'].'</td>
                           <td>'.$ky['cantidad'].'</td>';
                          $bodega_destino = $bodega->selectOne($ky['bodega_origen']);
                          foreach ($bodega_destino as $value) {
                            echo '<td>'.$value["nombre"].' </td>';
                          }
                            
                         echo '<td>'.$ky["estado"].' </td>';
                         if ($ky['estado'] == "No Confirmado") {
                            echo '<td> 
                             <input type="button" name="view" value="Confirmar" id="'.$ky["id_traslado"].'" pl="'.$ky["bodega_destino"].'" nombre="'.$nombre.'" class="btn btn-warning confirm_data2"/> 
                               </td>';
                         }else{
                            echo '<td></td>';
                         }

                         echo' </tr>
                         ';
           }
            ?>
                         
                      </tbody>
                    </table>
                  </div><br><br>
                  <h2>Productos:</h2>
                      <div id="employee_table">
                    <table id="example3" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                       <tr>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Bodega Procedencia</th>
                          <th>Estado</th>  
                          <th>Confirmar</th>                                
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
            require_once "../class/TrasladoPro.php";
            require_once "../class/Bodega.php";
                        $bodega = new Bodega();
                         $tras = new TrasladoPro();
                         $traslados = $tras->selectTraslado_proDestino($codigo);
                         foreach ($traslados as $ky) {
                       echo '
                          <tr>
                           <td>'.$ky['nombre'].'</td>
                           <td>'.$ky['cantidad'].'</td>';
                          $bodega_destino = $bodega->selectOne($ky['bodega_origen']);
                          foreach ($bodega_destino as $value) {
                            echo '<td>'.$value["nombre"].' </td>';
                          }
                            
                         echo '<td>'.$ky["estado"].' </td>';
                         if ($ky['estado'] == "No Confirmado") {
                            echo '<td> 
                             <input type="button" name="view" value="Confirmar" id="'.$ky["id_traslado_pro"].'" pl="'.$ky["bodega_destino"].'" nombre="'.$nombre.'" class="btn btn-warning confirm_data3"/> 
                               </td>';
                         }else{
                            echo '<td></td>';
                         }

                         echo' </tr>
                         ';
           }
            ?>
                         
                      </tbody>
                    </table>
                  </div>
                  <!--END X CONTENT-->
                  </div>
                </div>
              </div>
        
        
        
            </div>
 <div id="dataModal1" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content modal-md">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Bodegas</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms1">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>    
</div>  
 <div id="dataModal2" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Detalles DetalleBodega</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms2">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>    
</div>  
        <div id="dataModal3" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Agregar Nuevo Material</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms3">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
  </div>
      <div id="dataModal4" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Eliminar Material</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms4">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
  </div>
      <div id="dataModal5" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Traslado</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms5">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
  </div>
            <!--page content -->
<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Agregar Nuevo Material</h4>  
                </div>  
                <div class="modal-body">  
                     
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>
    
            <!-- footer content -->
            <footer>
              <div class="pull-right">
                Aserradero - Creado por <a href="https://colorlib.com">Chiltex SV</a>
              </div>
              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
          </div>
        </div>
    <!-- jQuery -->
   <script src="../vendors/jquery/dist/jquery.min.js"></script>
   <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');
    
    </script>
<script type="text/javascript">


   $(document).ready(function(){ 




      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset(); 





      });  

      

      $(document).on('click', '.view_data1', function(){  
          var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/listBodega.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms1').html(data);  
                          $('#dataModal1').modal('show');  
                     }  
                });  
           }   
      });  
     
      $(document).on('click', '.confirm_data', function(){  
           var employee_id = $(this).attr("id");  
           var employee_pl = $(this).attr("pl");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/DetalleBodega/confirmDetalleBodega.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_pl:employee_pl},  
                     success:function(data){  
                          $('#employee_forms2').html(data);  
                          $('#dataModal2').modal('show');  
                     }  
                });  
           }            
      });  

        $(document).on('click', '.save_data', function(){  
           var employee_action = $(this).attr("accion");  
           if(employee_action != '')  
           {  
                $.ajax({  
                     url:"../views/Materiales/saveMateriales.php",  
                     method:"POST",  
                     data:{employee_action:employee_action},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
           }            
      });


      $(document).on('click', '.delete_data', function(){  
          var employee_id = $(this).attr("id");
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/DetalleBodega/deleteDetalleBodega.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
                     }  
                });  
           }   
      }); 
     
      $(document).on('click', '.confirm_data2', function(){  
           var employee_id = $(this).attr("id");  
           var employee_pl = $(this).attr("pl");
           var employee_nombre = $(this).attr("nombre");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/Traslado/confirmTraslado.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_pl:employee_pl,employee_nombre:employee_nombre},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
                     }  
                });  
           }            
      });  
      $(document).on('click', '.confirm_data3', function(){  
           var employee_id = $(this).attr("id");  
           var employee_pl = $(this).attr("pl");
           var employee_nombre = $(this).attr("nombre");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/Traslado/confirmTrasladoPro.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_pl:employee_pl,employee_nombre:employee_nombre},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
                     }  
                });  
           }            
      });  
      $(document).on('click', '.new_traslado', function(){  
           var employee_id = $(this).attr("id");  
           var employee_pl = $(this).attr("pl");
           var employee_nombre = $(this).attr("nombre");
           var employee_cantidad= $(this).attr("cantidad");   
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/Traslado/newTraslado.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_pl:employee_pl,employee_nombre:employee_nombre,employee_cantidad:employee_cantidad},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
                     }  
                });  
           }            
      }); 
         $(document).on('click', '.new_traslado_pro', function(){  
           var employee_id = $(this).attr("id");  
           var employee_pl = $(this).attr("pl");
           var employee_nombre = $(this).attr("nombre");
           var employee_cantidad= $(this).attr("cantidad");   
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/Traslado/newTrasladoPro.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_pl:employee_pl,employee_nombre:employee_nombre,employee_cantidad:employee_cantidad},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
                     }  
                });  
           }            
      });

 });  

</script>
        
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    }) $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'order'       : [[0, "desc"]]
    })
  })
</script>

<script>
  
$(document).ready(function () {
    $("#cantidad").keyup(function () {

        var disponible = $("#cantidad_disponible").val();
  
        var cantidad = $(this).val();
        var total= disponible - cantidad;
        if (total <= 0) {
           $("#mensaje").val("El valor ingresa supera a la cantidad disponible");
        }else{

           $("#mensaje").val("");
        }
        });
});

</script>
    </body>
</html>