<?php
  session_start();
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
        <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
                    <h2>Proyecciones Por componente</h2>


                    
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
             ?>
                  <div class="x_content">
                  
                  <table id="example" class="table table-bordered" name="datatable-buttons"> <!-- Lo cambiaremos por CSS -->
                  <thead>
                    <tr>
                      <th>N°</th>
                      <th>Mes</th>
                      <th>Envio</th>
                      <th>Fecha</th>
                      <th>Madera</th>
                      <th>Etiqueta</th>
                      <th>Material</th>
                      <th>Grosor</th>
                      <th>Ancho</th>
                      <th>Largo</th>
                      <th>Piezas</th>
                      <th>M<sup>3</sup></th>
                      <th>Multiplo</th>
                      <th>Tarima</th>
                      <th>M<sup>3</sup> TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      require_once "../class/PackingList.php";
                         require_once "../class/Paquetes.php";
                         require_once "../class/Contenedor.php";
                         $misPacks = new Packing();
                         $todos = $misPacks->selectALL_Local();
                            $mss = new Paquetes();
                            
                       foreach ($todos as $value) {
                           $dato =1;
                           $paquetes = $mss->selectALLpack($value['id_packing_list']);
                           $TP = $misPacks->countPaquetes($value['id_packing_list']);
                           foreach ($TP as $key) {
                             $totalPaquetes = $key['total'];
                             $totalMC = $key['metroCubic'];
                            }// consulta de total de paquetes

                           echo '<tr>';
                            foreach ($paquetes as $a) {
                            
                              $contenedor = new  Contenedores();
                              $tarimas= $a['multiplo'] * $a['metros_cubicos'];
                              $datosC = $contenedor->selectOne($a['id_contenedor']);
                                  foreach ($datosC as $b) {
                                   $madera =$b['tipo_ingreso']; 
                                  }
                                if ($dato==1) {
                        echo '
                         <tr>
                            <td rowspan="'.$totalPaquetes.'" style="vertical-align:middle;">'.$value['id_packing_list'].'</td>
                            <td rowspan="'.$totalPaquetes.'" style="vertical-align:middle;">'.$value['mes'].'</td>
                            <td>'.$a['contenedor'].'</td>
                            <td rowspan="'.$totalPaquetes.'" style="vertical-align:middle;">'.$value['fecha'].'</td>
                            <td>'.$madera.'</td>
                            <td>'.$a['etiqueta'].'</td>
                            <td>'.$a['material'].'</td>
                            <td>'.$a['grueso'].'</td>
                            <td>'.$a['ancho'].'</td>
                            <td>'.$a['largo'].'</td>
                            <td>'.$a['piezas'].'</td>
                            <td>'.$a['metros_cubicos'].'</td>
                            <td>'.$a['multiplo'].'</td>
                            <td>'.round($tarimas).'</td>
                            <td rowspan="'.$totalPaquetes.'"  style="vertical-align:middle;">'.$totalMC.'</td>
                        </tr> ';
                        $dato = $dato +1;
                                }else{
                                echo '
                         <tr>
                            <td>'.$a['contenedor'].'</td>
                            
                            <td>'.$madera.'</td>
                            <td>'.$a['etiqueta'].'</td>
                            <td>'.$a['material'].'</td>
                            <td>'.$a['grueso'].'</td>
                            <td>'.$a['ancho'].'</td>
                            <td>'.$a['largo'].'</td>
                            <td>'.$a['piezas'].'</td>
                            <td>'.$a['metros_cubicos'].'</td>
                            <td>'.$a['multiplo'].'</td>
                            <td>'.round($tarimas).'</td>
                            
                        </tr> ';
                        $dato = $dato +1;
                                  
                                } 
                              
                          }

                            echo'  </tr> <!-- renglon mayor -->
                            ';
                         }  

                     ?>
            </tbody>
        </table>
                    
                  </div>
                </div> <!--X PANEL 1 -->
            
              </div>
        </div>
        
        
            </div>
 <div id="dataModal" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Detalle Usuario</h4>  
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
                                                 <h4 class="modal-title">Detalle Nave</h4>  
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
                                                 <h4 class="modal-title">Agregar Nueva Nave</h4>  
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
                                                 <h4 class="modal-title">Eliminar Nave</h4>  
                                            </div>  
                                            <div class="modal-body" id="employee_forms4">  
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
                     <h4 class="modal-title">Agregar Nueva Nave</h4>  
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
    <!--<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>-->

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
   <!-- <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>-->
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
           var employee_action = $(this).attr("accion");  
           if(employee_action != '')  
           {  
                $.ajax({  
                     url:"../views/naves/saveNaves.php",  
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
                     url:"../views/naves/deleteNave.php",  
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

</script>
  <script>
  $(function () {
    $('#example1').DataTable()
    
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
         <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY.MM.DD'
    });
    
    $('#myDatepicker3').datetimepicker({
          format: 'YYYY-MM-DD'
    });
     $('#myDatepicker33').datetimepicker({
          format: 'YYYY-MM-DD'
    });
      $('#myDatepicker34').datetimepicker({
          format: 'YYYY-MM-DD'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });

  
</script>
<script >
  
  function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var fecha_i = document.getElementById("fechai");
  var fecha_f = document.getElementById("fechaf");
  var checkBox2 = document.getElementById("myCheck1");
  var estado = document.getElementById("estado");
  if (checkBox.checked == true){
    fecha_i.style.display = "block";
    fecha_f.style.display = "block";
    checkBox2.checked=false;
     estado.style.display = "none";
     
    
  } else {
     fecha_i.style.display = "none";
     fecha_f.style.display = "none";
     estado.style.display = "none";
     
  }
}function myFunction1() {
  var checkBox = document.getElementById("myCheck");
  var fecha_i = document.getElementById("fechai");
  var fecha_f = document.getElementById("fechaf");
  var checkBox2 = document.getElementById("myCheck1");
  var estado = document.getElementById("estado");
  

  if(checkBox2.checked == true){
    estado.style.display = "block";
    checkBox.checked=false;
     fecha_i.style.display = "none";
     fecha_f.style.display = "none";
    
  } else {
     fecha_i.style.display = "none";
     fecha_f.style.display = "none";
     estado.style.display = "none";
     
  }
}
  function myFunction2() {
  var checkBox1 = document.getElementById("myCheck2");
  var fecha_ip = document.getElementById("fechaip");
  var fecha_fp = document.getElementById("fechafp");
  var checkBox3 = document.getElementById("myCheck3");
  var estadop = document.getElementById("estadop");
  if (checkBox1.checked == true){
    fecha_ip.style.display = "block";
    fecha_fp.style.display = "block";
    checkBox3.checked=false;
     estadop.style.display = "block";
     
    
  } else {
     fecha_ip.style.display = "none";
     fecha_fp.style.display = "none";
     estadop.style.display = "none";
     
  }
}
function myFunction3() {
  var checkBox1 = document.getElementById("myCheck2");
  var fecha_ip = document.getElementById("fechaip");
  var fecha_fp = document.getElementById("fechafp");
  var checkBox3 = document.getElementById("myCheck3");
  var estadop = document.getElementById("estadop");
  

  if(checkBox3.checked == true){
    estadop.style.display = "block";
    checkBox1.checked=false;
     fecha_ip.style.display = "none";
     fecha_fp.style.display = "none";
    
  } else {
     fecha_ip.style.display = "none";
     fecha_fp.style.display = "none";
     estadop.style.display = "none";
     
  }
}
</script>
    </body>
</html>