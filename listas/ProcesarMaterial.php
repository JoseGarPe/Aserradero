<?php 
  session_start();
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
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    
    <!-- Meta, title, CSS, favicons, etc. -->
    
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
                  <a href="indexUs.php" class="site_title"><i class="fa fa-paw"></i> <span>Hermes</span></a>
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

                <div class="row">
                  
                               <div class="x_panel">
                  <div class="x_title">
                    <h2>Pagina de Material Procesado</h2>


                    
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
       

             <div class="x_content">

                  <?php 
            if (isset($_GET['success'])) {
                
                if ($_GET['success']=='correcto') {
                    
                    echo '
              <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Correcto:</span>
                Los datos han sido guardados exitosamente.
           
            </div>
                    ';
                }
            }elseif (isset($_GET['error'])) {
           
               if ($_GET['error']=='incorrecto') {
                    
                    echo '
                <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Incorecto:</span>
              
               Error, Paquete ya procesado o verifique los datos ingresados .

           
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
            </div>
                    ';
                }
            }
             ?>
                 <!-- Smart Wizard -->
                  
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Paso 1<br />
                                              <small>o</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Seleccio</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Step 3 description</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br />
                                              <small>Step 4 description</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                        <form class="form-horizontal form-label-left" method="POST" action="../controllers/DeatalleProcesadoControlador.php?accion=guardar">
                      <div id="step-1">
                      <p> <div class="form-group">
                         <center>
                          
                         <div class="col-xs-12">
                          <table id="example1" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Componente</th>
                          <th>Etiqueta</th>
                           <th>Piezas Disponibles</th> 
                           <th>Bodega</th> 
                           <th>Proveedor</th> 
                           <th>Factura</th>                       
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                       //  $codigo = $_POST['cod_banda'];
                         require_once "../class/Paquetes.php";
                         $misPacks = new Paquetes();
                         $catego = $misPacks->selectPack_Bodega($codigo);
                                              
                         foreach ((array)$catego as $row) {
                         echo '
                          <tr>
                           <td>'.$row['nombre'].'</td>
                           
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['piezas'].'</td>
                           <td>'.$row['bodega'].'</td>
                           <td>'.$row['shipper'].'</td>
                           <td>'.$row['numero_factura'].'</td>
                           
                           
                          </tr>
                         ';
                       }
                     
                     
?>

                      </tbody>
                      </table>
                          </div>
                        </center>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bodega<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select  onchange="mostrarInfo(this.value)" class="form-control" name="id_bodega" id="id_bodega">
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
                          <div class="form-group">
                            <div id="datos"></div>
                          </div>
                          <div class="form-group">
                            <div id="datos1"></div>
                            <input type="hidden" id="id_m" name="id_m" value="">
                          </div>
                     <!--     <div class="form-group">
                            <div id="datos99"></div>
                          </div>-->
                        <!--  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Usar <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="usar"  name="usar" class="form-control col-md-7 col-xs-12"  type="number">
                            </div>
                          </div>-->
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Etiqueta<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             
                             <input id="etiqueta"  name="etiqueta" class="form-control col-md-7 col-xs-12"  type="text"></div>
                          </div></p>
                        </div>

                      <div id="step-2">
                       <center> <h2 class="StepTitle">Paso 2- Elige Material saliente</h2> </center>
                          <p>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Maquina<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="id_maquina" id="id_maquina">
                                <option value="0">Seleccione una Maquina</option>
                          <?php 
                         require_once "../class/Maquinas.php";

                          $mismaquinas = new Maquina();
                         $catego = $mismaquinas->selectALL2();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_maquina']."'>".$row['nombre']."</option>";

                          } 
                          ?>
                          </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Material Saliente<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="id_materialsaliente" id="id_materialsaliente">
                                <option value="0">Seleccione una opcion</option>
                          <?php 
                         require_once "../class/Materiales.php";

                          $mismate = new Materiales();
                         $catego = $mismate->selectALLproce();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_material']."'>".$row['nombre']."</option>";

                          } 
                          ?>
                          </select>
                            </div>
                          </div>
                            <hr width=400>
                         <center><mark>   <label>Seleccione segundo material saliente (Opcional)</label></mark></center>
                                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Material Saliente<span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="id_materialsaliente2" id="id_materialsaliente2">
                                <option value="0">Seleccione una opcion</option>
                          <?php 
                        foreach ((array)$catego as $row2) {

                            echo "<option value='".$row2['id_material']."'>".$row2['nombre']."</option>";

                          } 
                          ?>
                          </select>
                            </div>
                          </div>
                        </p>

                      </div>
                      <div id="step-3">
                       <center><h2 class="StepTitle">Paso 3- Definir cantidad saliente</h2></center> 
                       <p>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad Saliente<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="cantidadsaliente" name="cantidadsaliente" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>

                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Multiplo<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="multiplo" name="multiplo" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rendimiento Esperado<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="resperado" name="resperado" class=" form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>
                         <mark><center> <label><spam> <small>*Si Selecciono un segundo componente saliente, por favor complete el siguiente campo</small></spam></label></center></mark>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Segunda Cantidad Saliente<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="cantidadsaliente2" name="cantidadsaliente2" class="date-picker form-control col-md-7 col-xs-12" type="text">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Multiplo 2do material<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="multiplo2" name="multiplo2" class="date-picker form-control col-md-7 col-xs-12"  type="text">
                            </div>
                          </div>

                         

                        </p>

                      </div>
                      <div id="step-4">
                      <center>  <h2 class="StepTitle">Paso 4- Seleccionar bodega destino</h2></center>
                         <p>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bodega<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select  class="form-control" name="id_bodegag" id="id_bodegag">
                                <option value="0">Seleccione una opcion</option>
                          <?php 
                         require_once "../class/Bodega.php";

                          $mistipos = new Bodega();
                         $catego1 = $mistipos->selectALL();
                          foreach ((array)$catego1 as $row) {

                            echo "<option value='".$row['id_bodega']."'>".$row['nombre']."</option>";

                          } 
                          ?>
                          </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bodega <small><mark>(Destino segundo material procesado)</mark></small><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select  class="form-control" name="id_bodegag2" id="id_bodegag2">
                                <option value="0">Seleccione una opcion</option>
                          <?php 
                         require_once "../class/Bodega.php";

                          $mistipos = new Bodega();
                         $catego1 = $mistipos->selectALL();
                          foreach ((array)$catego1 as $row) {

                            echo "<option value='".$row['id_bodega']."'>".$row['nombre']."</option>";

                          } 
                          ?>
                          </select>
                            </div>
                          </div>
                        </p>
                        <br><br><br>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="submit" class="btn btn-primary" value="Guardar" >
                            </div>
                          </div>
                        
                      </div>
      </form>
                    </div>
      
             </div>



           </div><!-- END PROCESAR -->

                </div>
   
                  <div class="x_content">
                      <!-- MODAL PARA AGREGAR UN NUEVO USUARIO-->

                   
                    <br>
                    <br>
                    <div id="employee_table">
                    <table id="example5" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                        <tr>
                          <th>N° </th>
                          <th>Componente</th>
                          <th>Procesar</th>
                          <th>Cantidad</th>
                          <th>Tarimas Aproximado</th>    
                          <th>Bodega</th>    

                          <th>Opciones</th>                        
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         require_once "../class/DetalleProcesado.php";
                          require_once "../class/Materiales.php";
                           require_once "../class/Bodega.php";
                         $misUsuarios = new DetalleProcesado();
                         $catego = $misUsuarios->selectALL();
                         
                         foreach ((array)$catego as $row) {
                           $metros_cubicos_proc= ( $row['grueso'] * $row['ancho'] * $row['largo'] * $row['cantidad_saliente'] )/1000000000;
                          $tarimas_proc=$row['cantidad_saliente']*$row['multiplo']/$row['m_cuadrados'];
                         echo '
                          <tr>
                           <td>'.$row['id_detalle_procesado'].'</td>';
                            $misMateriales = new Materiales();
                         $material = $misMateriales->selectOne($row['id_materia_prima']);
                           foreach ($material as $key) {
                             echo ' <td>'.$key['nombre']. '</td>';
                           }
                         $material1 = $misMateriales->selectOne($row['id_material_saliente']);
                           foreach ($material1 as $key1) {
                             echo ' <td>'.$key1['nombre']. '</td>';
                           }
                           echo'
                           <td>'.$row['cantidad_saliente'].'</td>
                           <td>'.$tarimas_proc.'</td>';
                           $misBodegas = new Bodega();
                         $bodga = $misBodegas->selectOne($row['id_bodega']);
                          foreach ($bodga as $value) {
                             echo ' <td>'.$value['nombre']. '</td>';
                           }
                           echo'
                           <td>
                          
                                    <input type="button" name="view" value="Ver Detalle" id="'.$row["id_detalle_procesado"].'" class="btn btn-info view_data"/>  
                                   
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
 <div id="dataModal1" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Editar Usuario</h4>  
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
                                                 <h4 class="modal-title">Detalle Usuario</h4>  
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
                                                 <h4 class="modal-title">Agregar Solicitud</h4>  
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
                                                 <h4 class="modal-title">Eliminar Usuario</h4>  
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
                     <h4 class="modal-title">Agregar Nuevo Usuario</h4>  
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
<!-- <script src="../vendors/jquery/dist/jquery.min.js"></script> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

   <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
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
     <!--Custom Theme Scripts--> 
    <script src="../build/js/custom.min.js"></script>
    
    <!-- Custom Theme Scripts 
    <script src="../build/js/custom.min.js"></script>-->
<!-- Google Analytics 
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');
    
    </script>-->
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
                     url:"../views/Usuario/modiUsuario.php",  
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
                     url:"../views/procesar/selectProceso.php",  
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
                     url:"../views/procesar/saveProceso.php",  
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
                     url:"../views/Usuario/deleteUsuario.php",  
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
           function mostrarInfo(cod){
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
   xmlhttp2=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("datos").innerHTML=xmlhttp.responseText;
    }else{ 
  document.getElementById("datos").innerHTML='Cargando...';
    }
  }
  xmlhttp2.onreadystatechange=function()
  {
  if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
    document.getElementById("datos23").innerHTML=xmlhttp2.responseText;
    }else{ 
  document.getElementById("datos23").innerHTML='Cargando...';
    }
  }
xmlhttp.open("POST","../views/procesar/material_bodega.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cod_banda="+cod);

xmlhttp2.open("POST","../views/procesar/paquetes_bodega.php",true);
xmlhttp2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp2.send("cod_banda="+cod);
}

           function mostrarInfo1(cod,bod){
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
    document.getElementById("datos1").innerHTML=xmlhttp.responseText;

           $("#id_m").val(cod);
    }else{ 
  document.getElementById("datos1").innerHTML='Cargando...';
    }
  }
xmlhttp.open("POST","../views/procesar/cantidad_material.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cod_banda="+cod+"&bod="+bod);

}
  $(document).ready(function () {
    $("#usar").keyup(function () {

        var piezas = $("#c_disponible").val();
  
        var usar = $(this).val();

        if (parseInt(piezas)<parseInt(usar)) {
          alert("Valor es mayor a la cantidad de piezas en bodegas!");
           $("#usar").val(0);

        } 

    });
});


      </script>
      
   <script>
function myFunction() {
  var checkBox = document.getElementById("id_material");

     var piezas =  $(this).attr("piezas"); 
     var etiqueta =  $(this).attr("etiqueta"); 
  if (checkBox.checked == true){
       $("#usar").val(piezas);
         $("#etiqueta").val(etiqueta);
      
  } else {

  }
}
</script>

<script>
     $("#search").keyup(function(){
        _this = this;
        // Muestra los tr que concuerdan con la busqueda, y oculta los demás.
        $.each($("#table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();                
        });
    });
     $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable()
    $('#example4').DataTable()
    $('#table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
      'order'       : [[0, "desc"]]
    })
     $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'order'       : [[0, "desc"]]
    })
  });
</script>

    </body>
</html>