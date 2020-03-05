<?php 
  session_start();
  $tipo_usuario = $_SESSION['tipo_usuario'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables |Ingresos por barco</title>

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />  
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.dataTables.min.css" />  

        <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet"> 
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           
<script src="http://code.jquery.com/jquery-latest.js"></script>

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
                    <h2><?php echo "".$_SESSION['nombre_usuario']; ?></h2>
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
                    <h2>Packing List - Por Barco</h2>


                    
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
              
                Error al guardar, verifique los datos ingresados o existe estos datos ya.
                </div>
           
                    ';
                }
               elseif ($_GET['error']=='incorrectoP') {
                    
                    echo '
                <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Incorrecto:</span>
              
                Ya existe una poliza con estos datos.
                </div>
           
                    ';
                }
               elseif ($_GET['error']=='incorrectoC') {
                    
                    echo '
                <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Incorrecto:</span>
              
                Ya existe un Correlativo con estos datos.
                </div>
           
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
                    <a href="../views/Newpacking.php" class="btn btn-primary" role="button">Nueva Orden</a>
                      <!-- MODAL PARA AGREGAR UN NUEVO USUARIO--> 
                    <br>
                    <br>
                    <div id="employee_table">
                    <table id="example6" class="table table-striped table-bordered" name="datatable-buttons">
                      <h1><caption>Segun Factura:</caption></h1>
                      <thead>
                        <tr>
                          <th>N° </th>
                          <th>Mes</th> 
                          <th>Shipper</th>
                          <th>Correlativo</th>
                          <th>Nave</th>
                          <th>F.Ingreso</th>
                          <th>F.Finalizado</th>
                          <th>Especificacion</th>
                          <th>Contenedores</th>
                          <th>Recibidos</th> 
                          <th>Estado</th>
                          <th>Total m<sup>3</sup></th>
                          <th>Factura</th>
                          <th>Codigo Embarque</th> 
                          <th>Poliza</th>
                          <th>Razon Social</th>
                          <th>Opiones</th>                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         require_once "../class/PackingList.php";
                         require_once "../class/Contenedor.php";
                         $misPacks = new Packing();
                         $todos = $misPacks->selectALL();
                        
                           # code...
                         
                         foreach ((array)$todos as $row) {
                          $Contenedor = new Contenedores();
                          $primer_cont = $Contenedor->FstContenedor($row['id_packing_list']);

                          $fecha1= date_create($row['fecha']);
                          $sumCub = $misPacks->selectTotalMetrosCubicos($row['id_packing_list']);
                          foreach ($sumCub as $key) {
                            $metro_cubico = $key['metro_cubico'];
                          }
                         echo '
                          <tr>
                          <td>'.$row['id_packing_list'].'</td>
                           <td>'.$row['mes'].'</td>
                           <td>'.$row['shipper'].'</td>
                           <td>'.$row['correlativo'].'</td>
                           <td>'.$row['nav'].'</td>';
                           if ($row['fecha_inicio']!=NULL) {
                            $date1=date_create($row['fecha_inicio']);
                             echo '<td>'.date_format($date1, 'd/m/Y').'</td>';
                           }else{
                            echo '<td></td>';
                           }
                           if ($row['fecha_cierre']!=NULL) {
                            $date1=date_create($row['fecha_cierre']);
                             echo '<td>'.date_format($date1, 'd/m/Y').'</td>';
                           }else{
                            echo '<td></td>';
                           }
                    echo ' <td>'.$row['esp'].'</td>
                           <td>'.$row['total_contenedores'].'</td>
                           <td>'.$row['contenedores_ingresados'].'</td>';
                           if ($row['estado']== 'Abierto') {
                            echo '<td>ABIERTO</td>';
                           }elseif ($row['estado']== 'Cerrado') {
                             
                            echo '<td>CERRADO</td>';
                           }else {
                             
                            echo '<td>PENDIENTE</td>';
                           }      

                         
                         echo ' <td>'.$metro_cubico.' m<sup>3</sup></td>
                          <td>'.$row['numero_factura'].'</td>
                           <td>'.$row['codigo_embarque'].'</td>
                           <td>'.$row['poliza'].'</td>
                           <td>'.$row['razon_social'].'</td>';
                           
                           echo '<td>
<!-- <ul>
   <li class="dropdown">-->
   <div class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" glyphicon glyphicon-menu-hamburger"></i><b class="caret"></b></a>
        <ul class="dropdown-menu">
           ';
       
          if ($row['estado']== 'Cerrado') {
            echo '
         <li><input type="button" name="save" value="Contendor" id="'.$row["id_packing_list"].'" class="btn btn-success save_data" /></li>
        <li><input type="button" name="observacion" value="Observacion" id="'.$row["id_packing_list"].'" class="btn btn-primary view_obs" /></li>';
          }else{
            echo ' <li><input type="button" name="save" value="Contendor" id="'.$row["id_packing_list"].'" class="btn btn-success save_data" /></li>
        <li><input type="button" name="save" value="Finalizar" id="'.$row["id_packing_list"].'" class="btn btn-warning finish_data" /></li>';
        if ($tipo_usuario=='Administrador') {
          echo '
        <li><input type="button" name="delete" value="Eliminar" id="'.$row["id_packing_list"].'" class="btn btn-danger delete_data" /></li>';
        }
             if ($primer_cont!='Primer Contenedor') {
        echo '<li><input type="button" name="save" value="Modificar" id="'.$row["id_packing_list"].'" class="btn btn-warning upd_pl" /></li>';
        }
          }
            
      echo '  </ul>
          
    </div>    
   <!-- </li>
</ul>-->




                           </td>
                          </tr>
                         ';
                       }
                     
                     
                         ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
        
        
        
            </div>
 <div id="dataModal" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Detalle Packing</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_detail">  
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
                                                 <h4 class="modal-title">Detalle Packing</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms2">  
                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
  </div> 
  <div id="dataModal00" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Packin List</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms00">  
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
                                                 <h4 class="modal-title">Agregar Orden</h4>  
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
                                                 <h4 class="modal-title">Eliminar Packing</h4>  
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
                                  <div class="modal-dialog modal-lg">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Contenedores</h4>  
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
                     <h4 class="modal-title">Agregar Nueva Orden</h4>  
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

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script>

    <!--<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>-->
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
      <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

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

      

      $(document).on('click', '.edit_data', function(){  
          var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/naves/modiNaves.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms2').html(data);  
                          $('#dataModal2').modal('show');  
                     }  
                });  
           }   
      });  
     
      $(document).on('click', '.view_obs', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/observacion.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms00').html(data);  
                          $('#dataModal00').modal('show');  
                     }  
                });  
           }            
      }); 
     
      $(document).on('click', '.upd_pl', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/modiPackin.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms00').html(data);  
                          $('#dataModal00').modal('show');  
                     }  
                });  
           }            
      });  

        $(document).on('click', '.save_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/contenedor/saveConts1.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
                        
                     }  
                });  
           }            
      });
         $(document).on('click', '.save_data1', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/contenedor/savePaquetes.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
                     }  
                });  
           }            
      });
       /* $('#dataModal5') .on('hidden.bs.modal', function () { location.reload(); })*/

      $(document).on('click', '.delete_data', function(){  
          var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/deletePacking.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
                     }  
                });  
           }   
      }); 
      $(document).on('click', '.delete_data1', function(){  
          var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../controllers/ContenedorControlador.php?accion=eliminar",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                     }  
                });  
           }   
      });
      $(document).on('click', '.finish_data', function(){  
          var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/cerrarPackingList.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
                     }  
                });  
           }   
      });

 });  


      function obtenerValorParametro(sParametroNombre) {
var sPaginaURL = window.location.search.substring(1);
 var sURLVariables = sPaginaURL.split('&');
  for (var i = 0; i < sURLVariables.length; i++) {
    var sParametro = sURLVariables[i].split('=');
    if (sParametro[0] == sParametroNombre) {
      return sParametro[1];
    }
  }
 return null;
}
var valor = obtenerValorParametro('id_packing_list');
  if (valor){
   /* alert(valor);*/
     var employee_id = valor;  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/contenedor/saveConts1.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('toggle');  
                     }  
                });  
           }            
  }else{
    /*alert('El parámetro no existe en la URL');*/
  }

</script>
        <script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable()
    $('#example4').DataTable()
    $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'order'       : [[0, "desc"]]
    })
  })
</script>
<script>
  $(document).ready(function() {
    $('#example2').DataTable( {
        order: [[12, 'asc']],
        rowGroup: {
            startRender: null,
            endRender: function ( rows, group ) {
                var salaryAvg = rows
                    .data()
                    .pluck(5)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0) / rows.count();
                salaryAvg = $.fn.dataTable.render.number(',', '.', 0, '$').display( salaryAvg );
 
                var ageAvg = rows
                    .data()
                    .pluck(3)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0) / rows.count();
 
               return $('<tr/>')
                    .append( '<td colspan="3">Averages for '+group+'</td>' )
                    .append( '<td>'+ageAvg.toFixed(0)+'</td>' )
                    .append( '<td/>' )
                    .append( '<td>'+salaryAvg+'</td>' );
            },
            dataSrc: 12
        }
    } );

      $('#example6').DataTable( {
        order: [[12, 'asc']],
        rowGroup: {
            endRender: function ( rows, group ) {
                var avg = rows
                    .data()
                    .pluck(5)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, 'Factura:')*1;
                    }, 0) / rows.count();
            },
            dataSrc: 12
        }
    } );
} );
</script>
            
<script>
  $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      $("#correlativo").focus();
                                                 
      //comprobamos si se pulsa una tecla
      $("#correlativo").keyup(function(e){
             //obtenemos el texto introducido en el campo
          consulta = $("#correlativo").val();  
          var input = $(this).attr("id");  
                                      
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {      
                                           
                  $("#resultado").html('<img src="ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "../views/existente.php",
                              data: data:{consulta:consulta,input:input},
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
/*
      $("#respuesta").focus();
      var resp = $("#respuesta").val();
      if (resp=="Disponible") {

                                    location.reload();
      }*/
                          
});

</script>
    </body>
</html>