<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Creacion | Aserradero</title>

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
                  <a href="../indexAdmin.php" class="site_title"><i class="fa fa-paw"></i> <span>Aserradero</span></a>
                </div>
    
                <div class="clearfix"></div>
    
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>John Doe</h2>
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
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
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
                    <h2>Pagina de Categorias</h2>


                    
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

                   <input type="button" name="accion" value="Seleccionar Preset" id="accion" class="btn btn-success selec_data" /> 
                    <br>
                    <br>
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controllers/OrdenProductoControlador.php?accion=guardar" method="post">
                    <?php 
                      if (isset($_GET['id']) && isset($_GET['preset'])) {
                        $id_preset=$_GET['id'];
                        $preset = $_GET['preset'];
                        echo '<h1>Producto fabricado: '.$preset.'</h1>
                        <input id="id_preset"  name="id_preset" readonly type="hidden" value="'.$id_preset.'">
                        <input id="nombre_preset"  name="nombre_preset" readonly type="hidden" value="'.$preset.'">';
                      }
                      else{
                        $id_material=0;
                        $id_preset=0;
                      }

                     ?>   
                        <div class="row">
                          <div class="col-xs-12" >
                            <div class="col-xs-8 col-sm-6">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de Orden<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="cantidad"  name="cantidad" class="form-control col-md-7 col-xs-12"  type="number">
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-8 col-sm-6">
                                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bodega Destino<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="id_bodega" id="id_bodega">
                                <option value="0">Seleccione una opcion</option>
                          <?php 
                         require_once "../class/Bodega.php";

                          $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $riw) {

                            echo "<option value='".$riw['id_bodega']."'>".$riw['nombre']."</option>";

                          } 

                                    ?>
                          </select>
                            </div>
                          </div>
                            </div>
                            
                          </div>

                        </div>

                          

                     <div class="form-group">
                      <div id="employee_table">
                    <table id="example1" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                        <tr>
                          <th>Material</th>
                          <th>Dimensiones</th>
                          <th>Cantidad Necesaria</th>
                          <th>Bodegas con Disponibilidad</th>                        
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         require_once "../class/DetallePreset.php";
                         $misMateriales = new DetallePreset();
                         $mate = $misMateriales->selectDetallePreset($id_preset);
                         foreach ((array)$mate as $rw) {
                         echo '
                          <tr>
                          <input id="id_d_p[]"  name="id_d_p[]" readonly type="hidden" value="'.$rw["id_detalle_preset"].'">
                          <input id="id_material[]"  name="id_material[]" readonly type="hidden" value="'.$rw["id_material"].'">
                           <td>'.$rw['material'].'</td>
                           <td>'.$rw['largo'].'x'.$rw['ancho'].'x'.$rw['grueso'].'</td>
                           <td><input id="necesaria[]"  name="necesaria[]" readonly type="hidden" value="'.$rw["cantidad"].'">'.$rw["cantidad"].'</td>
                            <td>';
                                require_once "../class/DetalleBodega.php";
                         $misBodegass = new DetalleBodega();
                         $bode = $misBodegass->selectALLP_M($rw['id_material']);
                         echo' <select  class="form-control" name="id_bodega_mp[]" id="id_bodega_mp[]">
                            <option value="0">Seleccione una Bodega</option>';
                           foreach ((array)$bode as $r) {
                            echo "<option value='".$r['id_bodega']."'>".$r['bodega']." Cantidad:".$r['cantidad']."</option>";
                          }
                          echo'</select>';
                           echo' </td>
                          </tr>
                         ';
                       }
                     
                     
                         ?>
                      </tbody>
                    </table>
                  </div>
                               
                      </div>

                                  
                    

                   <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
             </div>

</form>        
            <div id="employee_table">

              <table id="datatable-buttons" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                        <tr>
                          <th>N° Orden</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Bodega Guardado</th>
                          <th>Estado</th> 
                          <th>Fecha Ordenado</th> 

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         require_once "../class/OrdenProducto.php";
                         $misOrdenes = new OrdenProducto();
                         $orden = $misOrdenes->selectOrdenes($id_preset);
                         foreach ((array)$orden as $ky) {
                         echo '
                          <tr>
                           <td>'.$ky['id_orden_producto'].'</td>
                           <td>'.$ky['preset'].'</td>
                            <td>'.$ky["cantidad"].' </td>
                           <td>'.$ky["bodega"].'</td>
                            <td>'.$ky["estado"].' </td>
                            <td>'.$ky["fecha_orden"].' </td>
                          </tr>
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
 <div id="dataModal" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Detalle Categorias</h4>  
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
                                                 <h4 class="modal-title">Detalle Categorias</h4>  
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
                                                 <h4 class="modal-title">Agregar Nuevo Tipo Usuario</h4>  
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
                                                 <h4 class="modal-title">Eliminar Tipo Usuario</h4>  
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
                     <h4 class="modal-title">Agregar nueva Categorias</h4>  
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
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
      $(document).on('click', '.edit_data', function(){  
          var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/Categorias/modiCategoria.php",  
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
                     url:"../views/Categorias/selectCategoria.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_forms2').html(data);  
                          $('#dataModal2').modal('show');  
                     }  
                });  
           }            
      });  
        $(document).on('click', '.selec_data', function(){  
           var employee_action = $(this).attr("id");  
           if(employee_action != '')  
           {  
                $.ajax({  
                     url:"../views/DetalleProducto/listPresets.php",  
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
                     url:"../views/Categorias/deleteCategoria.php",  
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
   function mostrarInfo(cod,mate){
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("datos").innerHTML=xmlhttp.responseText;
     var id_m = $("#id_m").val();
     
    }else{ 
  document.getElementById("datos").innerHTML='Cargando...';
    }
  }
xmlhttp.open("POST","../views/DetalleProducto/cantidadDispo.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cod_banda="+cod+"&material="+mate);

};
$(document).ready(function () {
    $("#cantidad").keyup(function () {

        var necesaria = $("#necesaria").val();
  
        var cantidad = $(this).val();
        var total= necesaria * cantidad;

       
           $("#usar").val(total);

      

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
    })
  })
</script>
        
    </body>
</html>