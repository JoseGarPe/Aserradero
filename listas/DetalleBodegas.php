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
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.dataTables.min.css" />  
   <!-- <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">-->
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


                 <center><input type="button" name="accion" value="Bodegas" id="accion" class="btn btn-primary view_data1" /> </center>  
                    <br>
                    <br>
                    <?php 

                          if (isset($_GET["id"]) && isset($_GET["nombre"])) {
                        $codigo=$_GET["id"];
                        $nombre=$_GET["nombre"];
                        echo '<label><h1>Bodega: '.$nombre.'</h1></label>';
                          }else{
                            $codigo=0;
                            $nombre="Selecciones un Bodega";
                          }
           
                   ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pagina de Detalle de Bodega</h2>


                    
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
           </div>
                    ';
                }
            }elseif (isset($_GET['error'])) {
           
               if ($_GET['error']=='incorrecto') {
                    
                    echo '
                <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Incorecto:</span>
              
                Error al guardar, verifique los datos ingresados.
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
                  <div class="x_content">
                  
                      <!-- MODAL PARA AGREGAR UN NUEVO USUARIO-->

                   <h1>Materiales Guardados</h1>
                    <div id="employee_table">
                    <table id="example40" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                       <tr>
                          <th>Id</th>
                          <th>Material</th>
                          <th>Dimensiones</th>
                          <th>Categoria</th> 
                          <th>Cantidad de Piezas</th>   
                          <th>M<sup>3</sup></th>                                
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
            require_once "../class/DetalleBodega.php";
                         $ms = new DetalleBodega();
                         $contacto = $ms->selectALLP($codigo);
                         foreach ($contacto as $row) {
                          $metrosC = $ms->selectM_CUBICOS($codigo,$row['id_material']);
                          foreach ($metrosC as $key) {
                            $metroCubicos_m = $key['m_cubicos'];
                          }
                          $metros_cubicos_proc=0;
                           $contacto1 = $ms->selectALL_Bodega_PROCESADO($codigo);
                         foreach ($contacto1 as $row1) {
                          $metros_cubicos_proc1= ( $row1['grueso'] * $row1['ancho'] * $row1['largo'] * $row1['cantidad_saliente'] )/1000000000;
                          $metros_cubicos_proc=$metros_cubicos_proc+$metros_cubicos_proc1;
                         }

                          echo '<tr>
                          <td>'.$row['id_material'].'</td>
                          <td>'.$row['material'].'</td>
                           <td>'.$row['grueso'].'x'.$row['ancho'].'x'.$row['largo'].'</td>
                           <td>'.$row['categoria'].'</td>
                           <td>'.$row['cantidad'].'</td>';
                           if ($metroCubicos_m==0 || $metroCubicos_m==NULL) {
                             echo '
                           <td>'.$metros_cubicos_proc.'m<sup>3</sup></td>';
                           }else{
                            echo '
                           <td>'.$metroCubicos_m.'m<sup>3</sup></td>';
                           }
                          
                            
                            echo'
                          </tr>';
                         }
                       
                        
            ?>

                         
                      </tbody>
                    </table>

                  <!--END X CONTENT-->
                   </div>
                   </div>
                  
                  </div>
                  <br>
 <div class="x_panel">
                  <div class="x_title">
                    <h2>Detalle Paquetes Guardados</h2>


                    
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
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                      <label>Etiqueta</label>
                  <div class="input-group">
                    <?php 
                     echo '<input type="text" class="form-control" id="txtbusca" name="txtbusca" bodega="'.$codigo.'" nombre="'.$nombre.'" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon2">';
                      ?> 
                    <span class="input-group-btn"> 
                     <?php 
                        echo '<input type="button" name="view" value="Reiniciar" bodega="'.$codigo.'" nombre="'.$nombre.'" class="btn btn-info search_data"/> ';
                         ?>
                    </span>
                  </div>
                </div>
                      
                
                      <br><br>

                  <div id="employee_table">
                   <table id="examplePa2" class="table table-striped table-bordered"> <!-- Lo cambiaremos por CSS -->
                  <thead>
                      <th>N°</th>
                      <th>Fecha Ingreso</th>
                      <th>Etiqueta</th>
                      <th>Material</th>
                      <th>Grosor</th>
                      <th>Ancho</th>
                      <th>Largo</th>
                      <th>Piezas</th>
                      <th>M<sup>3</sup></th>
                      <th>M<sup>3</sup> Material</th>
                      <th>Multiplo</th>
                      <th>Tarima</th>
                      <th>M<sup>3</sup> TOTAL</th>
                      <th>Existente</th>
                      <th>Ingreso</th>
                      <th>Opcion</th>
                  </thead>
                  <tbody id="consu">
                    <?php 
                      require_once "../class/PackingList.php";
                         require_once "../class/Paquetes.php";
                         require_once "../class/Contenedor.php";
                         $misPacks = new Packing();
                         $todos = $misPacks->selectALL_Local();
                            $mss = new Paquetes();
                            
                           $dato =1;
                           $paquetes = $mss->selectALLpack_Bodega_general($codigo);

                            foreach ($paquetes as $a) {
                            
                           $TP = $mss->countPaquetesBodega_general($codigo);
                           $tm = $mss->countMcubicos_material($a['id_material'],$codigo);
                           foreach ($TP as $key) {
                             $totalPaquetes = $key['total'];
                             $totalMC = $key['metroCubic'];
                            }// consulta de total de paquetes
                               foreach ($tm as $material) {
                             $totalMateriales = $material['total'];
                             $totalMCM = $material['metroCubic'];
                            }// consulta de total de paquetes
                            $tarimas= $a['piezas']*$a['multiplo'] ;
                                
                        echo '
                         <tr>
                            <td>'.$a['id_paquete'].'</td>
                            <td style="vertical-align:middle;">'.$a['fecha_ingreso'].'</td>
                            <td>'.$a['etiqueta'].'</td>
                            <td style="vertical-align:middle;">'.$a['material'].'</td>
                            <td>'.$a['grueso'].'</td>
                            <td>'.$a['ancho'].'</td>
                            <td>'.$a['largo'].'</td>
                            <td>'.$a['piezas'].'</td>
                            <td>'.$a['metros_cubicos'].'</td>
                            <td style="vertical-align:middle;">'.$totalMCM.' m<sup>3</sup></td>
                            <td>'.$a['multiplo'].'</td>
                            <td>'.round($tarimas).'</td>
                            <td style="vertical-align:middle;">'.$totalMC.' m<sup>3</sup></td>
                            <td>'.$a['estado'].'</td>
                            <td>'.$a['tipo_ingreso'].'</td> 
                            <td>
                             <input type="button" name="view" value="Trasladar" id_paquete="'.$a['id_paquete'].'" id="'.$a["id_material"].'" pl="'.$codigo.'" nombre="'.$nombre.'" cantidad="'.$a['piezas'].'" class="btn btn-info new_traslado"/> 

                           </td>
                        </tr> ';
                                
                                
                              
                          }

                     ?>
            </tbody>
        </table>

                  </div>

                  <!--END X CONTENT-->
                   </div>
                   </div>
                        <div class="x_panel">
                  <div class="x_title">
                    <h2>Paquetes Almacenados</h2>


                    
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
                      <div id="employee_table">


                      <!-- MODAL PARA AGREGAR UN NUEVO USUARIO-->
               
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Seleccione una opcion<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2> 
                     Contenedor: <input type="checkbox" id="myCheck" name="myCheck" value="opcion1" onclick="myFunction()">
                      Envio: <input type="checkbox" id="myCheck1"  name="myCheck1" value="opcion2" onclick="myFunction1()"></h2>
                        </div>
                      </div>
                                         
                        <div id="cont1" class="form-group" style="display:none">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Contenedor<span class="required"></span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">                         
                          <input type="text" id="contenedor" name="contenedor"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <?php 
                      echo '<input type="hidden" id="id" name="id" value="'.$codigo.'">';
                       ?>
                       <div id="env" style="display:none" class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Envio<span class="required"></span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text" id="envio" name="envio"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="box-footer">

                        <div style="display:none" id="b_consultar" class="form-label-right col-md-5 col-sm-5 col-xs-12">
               <center> <input type="button" class="btn btn-primary conte" id="consulta" value="Consultar" ></center>
                        </div>
                         <div style="display:none" id="b_envio" class="form-label-right col-md-5 col-sm-5 col-xs-12">
               <center> <input type="button" class="btn btn-primary envi" id="envia" value="Envio" ></center>
                        </div>
                      </div>
                       
                       <table id="example3" class="table table-bordered">
                    <thead>
                            <tr>
                            <th>Etiqueta</th>
                            <th width="95">Grueso</th>
                            <th width="95">Ancho</th>
                            <th width="95">Largo</th>
                            <th width="95">Piezas</th>
                            <th width="95">M<sup>3</sup></th>
                            <th>Fecha Ingreso</th>
                            <th>Bodega</th>
                            <th>En Bodega</th>
                            </tr></thead>
                            <tbody id="resultado2">
                              <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                            </tbody>
                    </table> 

                  
                    <!--END X CONTENT-->
                   </div>
                   </div>

                  </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Material Procesado</h2>


                    
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
                  
                      <!-- MODAL PARA AGREGAR UN NUEVO USUARIO-->

                   <h1>Materiales Procesados Guardados</h1>
                    <div id="employee_table">
                    <table id="exampleMPG" class="table table-striped table-bordered" name="datatable-buttons">
                      <thead>
                       <tr>
                          <th>Id</th>
                          <th>Material</th>
                          <th>Dimensiones</th>
                          <th>M <sup>3</sup></th> 
                          <th>Cantidad de Piezas</th>   
                          <th>Tarimas</th>                                
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
            require_once "../class/DetalleProcesado.php";
                         $ms = new DetalleProcesado();
                         $contacto = $ms->selectALL_Bodega($codigo);
                         foreach ($contacto as $row) {
                          $metros_cubicos_proc= ( $row['grueso'] * $row['ancho'] * $row['largo'] * $row['cantidad_saliente'] )/1000000000;
                          $tarimas_proc=$row['cantidad_saliente']*$row['multiplo'];
                          //$metrosC = $ms->selectM_CUBICOS($codigo,$row['id_material']);
                          /*foreach ($metrosC as $key) {
                            $metroCubicos_m = $key['m_cubicos'];
                          }*/
                          echo '<tr>
                          <td>'.$row['id_detalle_procesado'].'</td>
                          <td>'.$row['material'].'</td>
                           <td>'.$row['grueso'].'x'.$row['ancho'].'x'.$row['largo'].'</td>
                           <td>'.$metros_cubicos_proc.'m<sup>3</sup></td>
                           <td>'.$row['cantidad_saliente'].'</td>
                           <td>'.$tarimas_proc.'</td>
                           
                          ';
                            
                            echo'
                          </tr>';
                         }
           
            ?>
                         
                      </tbody>
                    </table>

                  <!--END X CONTENT-->
                   </div>
                   </div>
                  
                  </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Productos Guardados</h2>


                    
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

                  <div id="employee_table">
                    <table id="example10" class="table table-striped table-bordered">
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

                  <!--END X CONTENT-->
                   </div>
                   </div>

                  <br>
                  <br>
                  <br>
                 

                        <div class="x_panel">
                  <div class="x_title">
                    <h2> Traslados pendientes</h2>


                    
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

                      <div id="employee_table">
                    <table id="example40" class="table table-striped table-bordered">
                      <thead>
                       <tr>
                        <th>Etiqueta Paquete</th>
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
            require_once "../class/Paquetes.php";
                            $mss1 = new Paquetes();
                        $bodega = new Bodega();
                         $tras = new Traslado();
                         $traslados = $tras->selectTrasladoDestino($codigo);
                         foreach ($traslados as $ky) {
                          $paquetes=$mss1->selectOne($ky['id_paquete']);
                          foreach ($paquetes as $pqt) {
                            $etiquetaPaquete=$pqt['etiqueta'];
                          }
                       echo '
                          <tr>
                          <td>'.$etiquetaPaquete.'</td>
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
                             <input type="button" name="view" value="Cancelar" id="'.$ky["id_traslado"].'" pl="'.$ky["bodega_destino"].'" nombre="'.$nombre.'" class="btn btn-danger cancel_data2"/> 
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
                   </div><br><br>
                        <div class="x_panel">
                  <div class="x_title">
                    <h2>Traslado de Productos</h2>


                    
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
                      <div id="employee_table">
                    <table id="examplePro" class="table table-striped table-bordered" >
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
                    <!--END X CONTENT-->
                   </div>
                   </div>

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
    <!--<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>-->

    <!--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>-->

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.rawgit.com/ashl1/datatables-rowsgroup/fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>

    <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script>


   <!-- <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>-->
   <!-- <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script> -->
   <!-- <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>-->
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
   
  function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var contenedor = document.getElementById("cont1");
  var checkBox2 = document.getElementById("myCheck1");
  var envio = document.getElementById("env");
  var b_contenedor = document.getElementById("b_consultar");
  var b_envio = document.getElementById("b_envio");
  if (checkBox.checked == true){
    b_contenedor.style.display="block";
    contenedor.style.display = "block";
    checkBox2.checked=false;
     envio.style.display = "none";
     b_envio.style.display = "none";
     
    
  } else {
     contenedor.style.display = "none";
     envio.style.display = "none";
     b_envio.style.display = "none";
    b_contenedor.style.display="none";
     
  }
};
function myFunction1() {
  var checkBox = document.getElementById("myCheck");
  var contenedor = document.getElementById("cont1");
  var checkBox2 = document.getElementById("myCheck1");
  var envio = document.getElementById("env");
  var b_contenedor = document.getElementById("b_consultar");
  var b_envio = document.getElementById("b_envio");
  
  if(checkBox2.checked == true){
    envio.style.display = "block";
     b_envio.style.display = "block";
    checkBox.checked=false;
     contenedor.style.display = "none";
    b_contenedor.style.display="none";
    
  } else {
     contenedor.style.display = "none";
     envio.style.display = "none";
     b_envio.style.display = "none";
    b_contenedor.style.display="none";
     
  }
};

</script>
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
      $(document).on('click', '.cancel_data2', function(){  
           var employee_traslado = $(this).attr("id");  
           if(employee_traslado != '')  
           {  
                $.ajax({  
                     url:"../views/Traslado/cancelarTraslado.php",  
                     method:"POST",  
                     data:{employee_traslado:employee_traslado},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
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
           var employee_paque= $(this).attr("id_paquete");  
           var employee_pl = $(this).attr("pl");
           var employee_nombre = $(this).attr("nombre");
           var employee_cantidad= $(this).attr("cantidad");   
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/Traslado/newTraslado.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_pl:employee_pl,employee_nombre:employee_nombre,employee_cantidad:employee_cantidad,employee_paque:employee_paque},  
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


      $(document).on('click', '.conte', function(){  
           var employee_id = $("#id").val(); 
           var employee_etiqueta = $("#contenedor").val();
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/contenedor/consulta.php?accion=etiqueta",  
                     method:"POST",
                     data:{employee_id:employee_id,employee_etiqueta:employee_etiqueta},  
                     success:function(data){    
                         $("#resultado2").html(data);  
                     }  
                });  
           }            
      });

      $(document).on('click', '.envi', function(){  
           var employee_id = $("#id").val(); 
           var employee_etiqueta = $("#envio").val();
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/contenedor/consulta.php?accion=envio",  
                     method:"POST",
                     data:{employee_id:employee_id,employee_etiqueta:employee_etiqueta},  
                     success:function(data){    
                         $("#resultado2").html(data);   
                     }  
                });  
           }            
      });


 });  

</script>
        
<script>
  $(function () {
    $('#example10').DataTable()
    $('#example30').DataTable({
       'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
       dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
  });
    $('#example40').DataTable({
       dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: 'visible'
                }
            },
            'colvis'
        ]
    });
    $('#exampleMPG').DataTable({
       dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: 'visible'
                }
            },
            'colvis'
        ]
    });
    $('#example50').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'order'       : [[0, "desc"]]
    });
    $('#examplePa2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
        rowsGroup:[12,3,9,1],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: 'visible'
                }
            },
            'colvis'
        ]
    });

    $('#examplePro').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: 'visible'
                }
            },
            'colvis'
        ]
    })
  });
</script>
<script>
  $(document).ready(function() {
    $('#example3').DataTable( {

      'order'       : [[0, "desc"]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
            'colvis'
        ]
    } );
    $('#example2').DataTable( {
        order: [[0, 'asc']],
        rowGroup: {
            startRender: null,
            endRender: function ( rows, group ) {
                var salaryAvg = rows
                    .data()
                    .pluck(11)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0) / rows.count();
                salaryAvg = $.fn.dataTable.render.number(',', '.', 0, '$').display( salaryAvg );
 
                var ageAvg = rows
                    .data()
                    .pluck(11)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0) / rows.count();
 
               return $('<tr/>')
                    .append( '<td colspan="3">Total M<sup>3</sup> Orden'+group+'</td>' )
                    .append( '<td></td>' )
                    .append( '<td/>' )
                    .append( '<td>'+salaryAvg+'</td>' );
            },
            dataSrc: 0
        }
    } );
    $('#example4').DataTable( {
        order: [[0, 'asc']],
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      responsive: true,
      'autoWidth'   : true,
       rowsGroup:[0,14,3,2],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
       
    } );
    $('#example1').DataTable( {
        
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      responsive: true,
      'autoWidth'   : true,
        rowsGroup:[0,14,3,2],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
       
    } );

    $('#example5').DataTable( {
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      responsive: true,
      'autoWidth'   : true,
        rowsGroup:[0,14,3,2],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
       
    } );

} );
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
<script>
  
$(document).ready(function(){
       
    $("#txtbusca").keyup(function () { 

              var parametros=$("#txtbusca").val();
              var employee_bodega = $(this).attr("bodega");  
              var employee_nombre = $(this).attr("nombre");  
              $.ajax({
                   data:{parametros:parametros,employee_bodega:employee_bodega,employee_nombre:employee_nombre},
                  url:   'salida.php?accion=etiquetaDB',
                  method:  'POST',
                    success:  function (data) {                 
                        $("#consu").html(data);
                        
                  },
                  error:function(){
                       alert("error")
                    }
               });
         });
$(document).on('click', '.search_data', function(){  

              var employee_bodega = $(this).attr("bodega");  
              var employee_nombre = $(this).attr("nombre");  
              $.ajax({
                   data:{employee_bodega:employee_bodega,employee_nombre:employee_nombre},
                  url:   'salida.php?accion=reiniciarDB',
                  method:  'POST',
                    success:  function (data) {                 
                        $("#consu").html(data);
                        
                  },
                  error:function(){
                       alert("error")
                    }
               });
         });
    
});


</script>

    </body>
</html>