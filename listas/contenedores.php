<?php 
  session_start();

                              if (isset($_GET["conten"])) {

                        $contenedor=$_GET["conten"];
                       }else{
                        $contenedor = 0;
                      }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Aserradero</title>

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
                  <a href="indexUs.php" class="site_title"><i class="fa fa-paw"></i> <span>Aserradero</span></a>
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
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="../ontrollers/LoginControlador.php?accion=logout">
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
                    <h2>Pagina de Paquetes</h2>
                     <table class="table table-striped">
                      <thead>
                        <tr><th>Orden</th><th>Contenedor</th><th>ID</th></tr>
                      </thead>
                      <tbody>

                    <?php 
                    if (isset($_GET['id'])) {
                        $codigo=$_GET['id'];
                    $etic=$_GET['etiquetaCo'];
                    }else{
                      $codigo=0;
                           $factura ='####';
                           $fecha_inicio ='';
                           $fecha_cierre ='';
                      $etic ='####';
                    }
                  
                        require_once "../class/PackingList.php";
                           $nave = new Packing();
                         $catego = $nave->selectOne($codigo);
                         foreach ($catego as $datoPL) {
                           $factura =$datoPL['numero_factura'];
                           $fecha_inicio =$datoPL['fecha_inicio'];
                           $fecha_cierre =$datoPL['fecha_cierre'];
                         }
                    echo '<tr><td><strong>'.$codigo.'</strong></td><td>'.$etic.'</td><td>'.$contenedor.'</td></tr>';
                     ?>
                        <tr></tr>
                      </tbody>
                    </table>


                    
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

                   <input type="button" name="accion" value="Ingresos por Barco" id="accion" class="btn btn-primary view_data1" /> 
                   <?php 
                   if (isset($_GET["id"])) {
                        $codigo=$_GET["id"];
                      
                    echo '
                   <input type="button" name="accion" value="Contenedores" id="'.$codigo.'" factura="'.$factura.'" class="btn btn-success view_data3" /> 
                   <br></br>
                   <h1><label>Factura de Ingreso:</label> <strong>'.$factura.'</strong></h1> ';
                          }else{
                            $codigo=0;
                          }
                       
                         echo ' <h2><label>Fecha Inicio: <strong> '.$fecha_inicio.' </strong></label> - <label>Fecha Cierre: <strong> '.$fecha_cierre.' </strong></label></h2>';
                        
                    ?>
                    <br>
                    <br>

                      <div class="form-group">
                        <div id="resultado"></div>
                      </div>

                    <div id="employee_table">
                    <table id="datatable-buttons" class="table table-striped table-bordered" name="datatable-buttons">
                       <thead>
                            <tr>
                           <th>N°</th>
                            <th>Material</th>
                            <th>Etiqueta</th>
                            <th width="95">Grueso</th>
                            <th width="95">Ancho</th>
                            <th width="95">Largo</th>
                            <th width="95">Piezas</th>
                            <th>Multiplo</th>
                            <th>Fecha Ingreso</th>
                            <th>Bodega Destino</th>
                            <th>Contendor</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Opcion</th>

                            </tr></thead>
                      <tbody>
                          <?php 
                          require_once "../class/Paquetes.php";
                            $mss = new Paquetes();
                            if (isset($_GET['Confirmado'])) {
                              
                         $paquetes = $mss->selectALLpack11_NB($codigo,$contenedor);
                            }else{

                         $paquetes = $mss->selectALLpack11($codigo,$contenedor);
                       }
                         $datos=1;
                         foreach ($paquetes as $key) {
                          $fecha_1= date_create($key['fecha_ingreso']);

                          echo '<tr>
                          <td>'.$datos.'</td>
                          <td>'.$key['material'].'</td>';
                          if ($key['etiqueta']==NULL) {
                          echo '<td><input type="text" class="form-control" name="eti'.$datos.'" id="eti'.$datos.'"> </td>';
                          }
                          else{
                            echo '<td>'.$key['etiqueta'].'</td>

                            <input type="hidden" name="eti'.$datos.'" id="eti'.$datos.'" value ="POSEE">
                            ';
                          }
                          if (isset($_GET['Confirmado'])) {
                           $bodega_s='No Definido';
                          }else{
                            $bodega_s=$key['bodega'];
                          }
                          echo '
                          <td>'.$key['grueso'].'</td>
                          <td>'.$key['ancho'].'</td>
                          <td>'.$key['largo'].'</td>
                          <td>'.$key['piezas'].'</td>
                          <td>'.$key['multiplo'].'</td>
                          <td>'.date_format($fecha_1,'d/m/y').'</td>
                          <td>'.$bodega_s.'</td>
                          <td>'.$key['contenedor'].'</td>
                          <td>'.$key['stock'].'</td>
                          <td>'.$key['estado'].'</td>

                          ';

                            if ($key['estado']== 'Sin Confirmar') {
                             echo'
                            <td>
                               <!-- <input type="button" name="confirm" value="Confirmar" id="'.$key["id_paquete"].'" pl="'.$key["id_packing_list"].'" factura="'.$factura.'" contenedorr="'.$contenedor.'" class="btn btn-info confirm_data"/> -->  
                                   
                                  <!--   <input type="button" name="delete" value="Eliminar" id="'.$key["id_paquete"].'" class="btn btn-danger delete_data" />-->';

                          if ($key['etiqueta']!=NULL) {
                            echo '<input type="button" name="modi_dataa" value="Modificar" id="'.$key["id_paquete"].'" packing="'.$codigo.'" contenedor="'.$contenedor.'" etiquetaCo="'.$etic.'" flag="modificar_c" class="btn btn-warning modi_data" />';
                          }else{
                            echo '
                          <input type="button" name="guardar_data" value="Guardar" id="'.$key["id_paquete"].'" packing="'.$codigo.'" dato="'.$datos.'" class="btn btn-success view_data2" />';

                          }
                          echo '
                            </td>';
                            }else{
                               echo'
                            <td>  
                                   
                                    <!-- <input type="button" name="delete" value="Eliminar" id="'.$key["id_paquete"].'" class="btn btn-danger delete_data" />-->';
                          if ($key['etiqueta']!=NULL) {
                            echo '<input type="button" name="modi_dataa" value="Modificar" id="'.$key["id_paquete"].'" packing="'.$codigo.'" contenedor="'.$contenedor.'" etiquetaCo="'.$etic.'" flag="modificar_c" class="btn btn-warning modi_data" />';
                          }else{
                            echo '
                          <input type="button" name="guardar_data" value="Guardar" id="'.$key["id_paquete"].'" packing="'.$codigo.'" dato="'.$datos.'" class="btn btn-success view_data2" />';

                          }
                          echo '
                            </td>';

                            }

                            
                            echo'
                          </tr>';
                          $datos =$datos+1;
                         }
           
            ?>
                         
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
        
        
        
            </div>
 <div id="dataModal1" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content modal-lg">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Ingresos por Barcos</h4>  
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
                                                 <h4 class="modal-title">Detalles Contenedor</h4>  
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
                                                 <h4 class="modal-title">Eliminar Material</h4>  
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
                     url:"../views/contenedor/listPacking.php",  
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
           var employee_fac = $(this).attr("factura"); 
           var employee_contenedor = $(this).attr("contenedorr"); 
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/contenedor/confirmContenedor.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_pl:employee_pl,employee_fac:employee_fac,employee_contenedor:employee_fcontenedor},  
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
                     url:"../views/contenedor/deleteContenedor.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
                     }  
                });  
           }   
      });
         $(document).on('click', '.view_data3', function(){  
          var employee_id = $(this).attr("id"); 
          var employee_factura = $(this).attr("factura");   
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/contenedor/listPackingContenedor.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_factura:employee_factura},  
                     success:function(data){  
                          $('#employee_forms1').html(data);  
                          $('#dataModal1').modal('show');  
                     }  
                });  
           }   
      });  

         $(document).on('click', '.view_data2', function(){  

           var employee_id = $(this).attr("id"); 
           var employee_packing = $(this).attr("packing");  
           var dato = $(this).attr("dato"); 
           var employee_etiqueta = $("#eti"+dato).val();
           if(employee_etiqueta != '')  
           {  
                $.ajax({  
                     url:"../controllers/PaquetesControlador.php?accion=etiqueta",  
                     method:"POST",
                     data:{employee_id:employee_id,employee_packing:employee_packing,employee_etiqueta:employee_etiqueta},  
                     success:function(data){    

                                    $("#resultado").html(data);  
                             n(); 
                     }  
                });  
           }  else{
            confirm("ERROR: Campo vacio!");
           }          
      });
$(document).on('click', '.modi_data', function(){  
           var employee_id = $(this).attr("id");  
           var employee_packing = $(this).attr("packing");  
           var employee_contenedor = $(this).attr("contenedor");  
           var employee_etiquetaCo = $(this).attr("etiquetaCo");  
           var employee_flag = $(this).attr("flag");  

           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/paquetes/modiPaquete.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_packing:employee_packing,employee_contenedor:employee_contenedor,employee_etiquetaCo:employee_etiquetaCo,employee_flag:employee_flag},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
                     }  
                });  
           }            
      });

 });  

</script>
<script type="text/javascript">
   $(document).ready(function(){ 


 }); 

</script>
        
    </body>
</html>