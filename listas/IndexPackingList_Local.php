<?php 
  session_start();
  $tipo_usuario = $_SESSION['tipo_usuario'];
if(isset($_SESSION['tiempo']) ) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 1200;//20min en este caso.

        //Calculamos tiempo de vida inactivo.
        $vida_session = time() - $_SESSION['tiempo'];

            //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
            if($vida_session > $inactivo)
            {
                //Removemos sesión.
                session_unset();
                //Destruimos sesión.
                session_destroy();              
                //Redirigimos pagina.
                header("Location: ../index.php");

                exit();
            }

    }else{
      
                header("Location: ../index.php");
    }
    $_SESSION['tiempo'] = time();
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
        <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  <style type="text/css">
    #example5 span {
    display:none; 
}
  </style>
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
                    <h2>Packing List - Local</h2>


                    
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
            if (isset($_SESSION['success'])) {
                
                if ($_SESSION['success']=='correcto') {
                    
                    echo '
              <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Correcto:</span>
                '.$_SESSION['message'].'
           
                    ';
                }
            }elseif (isset($_SESSION['error'])) {
           
               if ($_SESSION['error']=='incorrecto') {
                    
                    echo '
                <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Incorecto:</span>
               '.$_SESSION['message'].' ';
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
                    <a href="../views/Newpacking_local.php" class="btn btn-primary" role="button">Nueva Orden</a>
                      <!-- MODAL PARA AGREGAR UN NUEVO USUARIO--> 
                    <br>
                    <br>
                    <div id="employee_table">
                    <table id="example5" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>ID </th>
                          <th>Mes</th> 
                          <th>Proveedor</th>
                          <th>Tipo</th>
                          <th>F.Ingreso</th>
                          <th>Estado</th>
                          <th>Total m<sup>3</sup></th>
                          <th>N° Envio</th>
                          <th>INAB</th>
                          <th>Observacion</th>
                          <th>Opiones</th>                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         require_once "../class/PackingList.php";
                         $misPacks = new Packing();
                         $todos = $misPacks->selectALL_Local();
                        
                           # code...
                         $contador= 1;
                         foreach ((array)$todos as $row) {
                        //  $fecha1= date_create($row['fecha']);
                         $sumCub = $misPacks->selectTotalMetrosCubicos($row['id_packing_list']);
                         foreach ($sumCub as $key) {
                           $metro_cubico = $key['metro_cubico'];
                          //$metro_cubico = 3;
                         }
                         echo '
                          <tr>
                          <td>'.$contador.'</td>
                          <td>'.$row['id_packing_list'].'</td>
                           <td>'.$row['mes'].'</td>
                           <td>'.$row['shipper'].'</td>';
                           if ($row['ingreso_local']=='Importada') {
                             echo '<td>IMPORTADA</td>';
                           }else{
                            echo '<td>LOCAL</td>';
                           }

                           
                           if ($row['fecha']!=NULL) {
                            $date1=date_create($row['fecha']);
                             echo '<td>'.date_format($date1, 'd/m/Y').'</td>';
                           }else{
                            echo '<td></td>';
                           }
                               if ($row['estado']== 'Abierto') {
                            echo '<td>ABIERTO</td>';
                           }elseif ($row['estado']== 'Cerrado') {
                             
                            echo '<td>CERRADO</td>';
                           }else {
                             
                            echo '<td>PENDIENTE</td>';
                           }      

                         
                        /*   if ($row['fecha_cierre']!=NULL) {
                            $date1=date_create($row['fecha_cierre']);
                             echo '<td>'.date_format($date1, 'd/m/Y').'</td>';
                           }else{
                            echo '<td></td>';
                           }*/
                    echo '<td>'.round($metro_cubico,2).' m<sup>3</sup></td>
                          <td>'.$row['numero_factura'].'</td>
                           <td>'.$row['poliza'].'</td>';
                            if ($row['estado']== 'Abierto') {
                            echo '<td>N/A</td>';
                           }elseif ($row['estado']== 'Cerrado') {
                             
                            echo '<td><input type="button" name="observacion" value="Ver" id="'.$row["id_packing_list"].'" bandera="Local" class="btn btn-primary view_obs" /></td>';
                           }else {
                             
                            echo '<td>PENDIENTE</td>';
                           }    
                           echo '<td>
<!-- <ul>
   <li class="dropdown">-->
   <div class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" glyphicon glyphicon-menu-hamburger"></i><b class="caret"></b></a>
        <ul class="dropdown-menu">
        <!--  <li><input type="button" name="save" value="envio" id="'.$row["id_packing_list"].'" class="btn btn-success save_data" /></li>-->';
         if ($row['estado']== 'Cerrado') {
          echo '
       <li>  <a href="../views/savePaqueteeLocal.php?id='.$row["id_packing_list"].'&factura='.$row['numero_factura'].'&inab='.$row['poliza'].'" class="btn btn-warning">Paquetes</a></li>
        <li><input type="button" name="observacion" value="Observacion" id="'.$row["id_packing_list"].'" class="btn btn-primary view_obs" /></li>';
         }else{
  echo '
             <li><a href="../views/updatePackinListLocal.php?id_packing_list='.$row["id_packing_list"].'" class="btn btn-outline-success">Actualizar</a></li>
       <li>  <a href="../views/savePaqueteeLocal.php?id='.$row["id_packing_list"].'&factura='.$row['numero_factura'].'&inab='.$row['poliza'].'" class="btn btn-warning">Paquetes</a></li>';
        
          if ($tipo_usuario=='Administrador') {
          echo '
        <li><input type="button" name="delete" value="Eliminar" id="'.$row["id_packing_list"].'" bandera="local" class="btn btn-danger delete_data" /></li>';
        }
        if ($row['paquetes']==$row['paquetes_fisicos']) {
          # code...
        echo '  <li><input type="button" name="save" value="Finalizar" id="'.$row["id_packing_list"].'" bandera="local" class="btn btn-warning finish_data" /></li> ';
        }
         }
        echo'
     
            
        </ul>
    </div>    
   <!-- </li>
</ul>-->




                           </td>
                          </tr>
                         ';
                      $contador = $contador+1;
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
                                                 <h4 class="modal-title">Packing</h4>  
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
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Envios</h4>  
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
           <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
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
<script src="https://cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment-with-locales.min.js"></script>
     <!-- bootstrap-daterangepicker -->
  
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
           var employee_bandera = $(this).attr("bandera");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/observacion.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_bandera:employee_bandera},  
                     success:function(data){  
                          $('#employee_forms00').html(data);  
                          $('#dataModal00').modal('show');  
                     }  
                });  
           }            
      }); 
     
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/selectUsuario.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms2').html(data);  
                          $('#dataModal2').modal('show');  
                     }  
                });  
           }            
      });  

        $(document).on('click', '.save_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/contenedor/saveConts2.php",  
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


      $(document).on('click', '.delete_data', function(){  
          var employee_id = $(this).attr("id");  
          var employee_bandera = $(this).attr("bandera");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/deletePacking.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_bandera:employee_bandera},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
                     }  
                });  
           }   
      });
      $(document).on('click', '.finish_data', function(){  
          var employee_id = $(this).attr("id");

          var employee_flag = $(this).attr("bandera");   
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/cerrarPackingList.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_flag:employee_flag},  
                     success:function(data){  
                          $('#employee_forms4').html(data);  
                          $('#dataModal4').modal('show');  
                     }  
                });  
           }   
      });

 });  

</script>
        <script>
  $(function () {
    $.fn.dataTable.moment('DD/MM/YYYY', 'DD-MM-YYYY');
    $('#example1').DataTable();
    $('#example3').DataTable();
    $('#example4').DataTable();
    $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
     /* columnDefs: [ {
      targets: 5,
      render: $.fn.DataTable.render.moment('DD/MM/YYYY', 'DD-MM-YYYY')
    } ],*/
      'order'       : [[5, "asc"]]
    });
  })
 /*  THIS IS ONLY FOR EXAMPLE TO CHANGE THE DATE FORMAT */
/*var changeDateFormat = $('#example5 tbody tr').each(function(i,e) {
  var dateTD = $(this).find('td:eq(5)');
  var date = dateTD.text().trim();
  var parts = date.split('/');
  dateTD.text(parts[2]+'/'+parts[0]+'/'+parts[1]);
});

$.when(changeDateFormat).done(function() {
  processDates(); 
})*/
/* THIS IS ONLY FOR EXAMPLE TO CHANGE THE DATE FORMAT */


/*function processDates() {
  var process = $('#example5 tbody tr').each(function(i,e) {
    var dateTD = $(this).find('td:eq(5)');
    var date = dateTD.text().trim();
    var parts = date.split('/');
    dateTD.prepend('<span>'+parts[2]+parts[1]+parts[0]+'</span>');
  });

  $.when(process).done(function() {
      $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'order'       : [[5, "asc"]]
    });
  })
}*/

</script>

    </body>
</html>