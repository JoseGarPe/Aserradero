<?php 
  session_start();
   $conten=$_GET['contenedor'];

                                if (isset($_SESSION['modificando']) && isset($_SESSION['dato'])) {
                                  $modificando = $_SESSION['modificando'];
                                  $num_dato=$_SESSION['dato'];
                                }else{
                                  $modificando ='nel';
                                  $num_dato=0;
                                }
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
    <!-- SELECT WITH SEARCH-->
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<!--SELECT WITH SEARCH 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

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
                 require_once "../listas/menuAdmin.php";
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
                    <h2>Lista de Paquetes: </h2>
                    <br><br>
                    <table class="table table-striped">
                      <thead>
                        <tr><th>Orden</th><th>Contenedor</th><th>ID</th></tr>
                      </thead>
                      <tbody>

                    <?php 
                    $codigo=$_GET['id'];
                    $etic=$_GET['etiquetaCo'];
                    echo '<tr><td><strong>'.$codigo.'</strong></td><td>'.$etic.'</td><td>'.$conten.'</td></tr>';
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
                    <div class="row">
                      <?php 
                      echo '
                      <a href="../listas/IndexPackingList.php?regresa=si&id_packing_list='.$codigo.'" class="btn btn-warning">Volver a Contenedores</a>
                      ';
                       ?>
                      <div class="col-xs-12 col-xs-12 col-md-12">
                        <?php 
                          require_once "../class/PackingList.php";                       
                          require_once "../class/Contenedor.php";

                          $packing = new Packing();
                          $orden = $packing->SelectOne($codigo);
                           $material = new Contenedores();
                                  $catego1 = $material->selectOne($conten);
                                  foreach ($catego1 as $k) {
                                  //  $fechaPaquete=$k['fecha_ingreso'];
                               //     $bodegaPaquete=$k['id_bodega'];
                             /*     $bodega = $material->selectBodega($bodegaPaquete);
                                  foreach ($bodega as $value) {
                                    $nombreBodega=$value['nombre'];
                                    }*/
                                  }

                         foreach ($orden as $key) {
                           $estado = $key['estado'];
                           $p_ingresados=$key['paquetes_fisicos'];
                           $p_esperados=$key['paquetes'];
                           $maximoP = $p_esperados-$p_ingresados;
                         }
                         if ($estado != 'Cerrado') {
                        ?>
                        <form action="../controllers/PaquetesControlador.php?accion=guardar" method="post"  role="form1">
                          <table  class="table table-bordered">
                            <thead>
                            <tr>
                            <th>Material</th>
                            <!--<th>Etiqueta</th>-->
                            <th width="95">Grueso</th>
                            <th width="95">Ancho</th>
                            <th width="95">Largo</th>
                            <th width="95">Piezas</th>

                            <th width="95">N° Paquetes</th>
                            <th>Multiplo</th>
                           <!-- <th>Fecha Ingreso</th>
                            <th>Bodega Destino</th>-->
                            </tr></thead>
                            <tbody>
                            <tr>
                              <td>
                                <?php 
                                if ($modificando=='nel') {
                                  echo '   <select class="selectpicker form-control" name="id_materiales" id="id_materiales" data-live-search="true" title="-- SELECCIONA UNA OPCION --" autofocus="true" required="true">';
                                }else{

                                  echo '   <select class="selectpicker form-control" name="id_materiales" id="id_materiales" data-live-search="true" title="-- SELECCIONA UNA OPCION --"  required="true">';
                                }
                                 ?>
                                
                             
                      <option value="">Seleccione un material</option>
                          <?php 
                          require_once "../class/Materiales.php";

                          $mistipos = new Materiales();
                         $catego = $mistipos->selectMateria_Prima();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_material']."'>".$row['nombre']."</option>";

                          } 


                    
                          ?>
                          </select></td>
                            <!--  <td><input type="text" id="etiqueta" name="etiqueta"  class="form-control col-md-7"></td>-->
                              <td><input type="number" id="grueso" name="grueso" min="0.00" step="0.00000000001"  class="form-control col-sm-7"></td>
                              <td><input type="number" id="ancho" name="ancho" min="0.00" step="0.00000000001"   class="form-control col-sm-7"></td>
                              <td ><input type="number"  min="0.00" step="0.0000000001" id="largo" name="largo"  class="form-control col-sm-4"></td>
                              <td><input type="number" id="piezas" name="piezas" min="0.00" step="1"  class="form-control col-md-7"></td>
                              <?php 
                              echo '<td><input type="number" id="num_paque" name="num_paque" min="1" step="1" max="'.$maximoP.'" list="lista_maximo" class="form-control col-md-7"></td>
                              <datalist id="lista_maximo">

                                  <option value="Valor maximo : '.$maximoP.'">

                                </datalist>
                              ';
                               ?>
                              
                              <td><input type="number" id="multiplo" name="multiplo"  min="0.00000000000000000000" step="0.00000000001"  class="form-control col-md-7"></td>
                           <!--   <td> --> <?php 
                            //  echo $fechaPaquete;
                               ?>
                          <!--    </td>
                            <td>
                                 <div id="datos3"></div> -->
                                <?php
                            //     echo $nombreBodega;
                     /*            echo '<input type="hidden" name="id_contenedor" value="'.$conten.'">
                                 <input type="hidden" id="id_bodega" name="id_bodega" value="'.$bodegaPaquete.'">
                                 <input type="hidden" class="form-control" name="fecha" id="fecha" value="'.$fechaPaquete.'"/>
                                 <input type="hidden" id="etiquetaCoo" name="etiquetaCoo" value="'.$etic.'">'; */
                                       echo '<input type="hidden" name="id_contenedor" value="'.$conten.'">
                                 <input type="hidden" id="id_bodega" name="id_bodega" value="0">
                                 <input type="hidden" class="form-control" name="fecha" id="fecha" value="0000-00-00"/>
                                 <input type="hidden" id="etiquetaCoo" name="etiquetaCoo" value="'.$etic.'">'; 
                                 ?>
                              </td>
                              <!--  <td><select class="form-control" onchange="mostrarInfo(this.value)" name="id_contenedor" id="id_contenedor">
                          <option>Seleccione una opcion</option>
                          <?php 
                      /*   require_once "../class/Contenedor.php";

                        /$mistipo2s = new Contenedores();
                         $catego = $mistipo2s->selectALLpack($codigo);
                          //foreach ((array)$catego as $rowss) {
                            echo "<option value='".$rowss['id_contenedor']."'>".$rowss['etiqueta']."</option>";
                          } */
                              ?>
                          </select></td> -->
                            </tr>
                            </tbody>
                          </table>
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Metros Cubicos Paquete<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <?php 
                        echo '<input type="hidden" readonly="true" id="id_packing_list" name="id_packing_list" value="'.$codigo.'">';
                        ?> 
                          <input type="text" readonly="true" id="metros_cubicos" name="metros_cubicos">
                        </div>
                      </div>
                      <br>
                      <br>
                      <br>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Metros Cubicos TOTALES<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" readonly="true" id="metros_cubicos_total" name="metros_cubicos_total">
                        </div>
                      </div>

                      <BR><br><br>
                      <div class="form-group">
                        <div id="resultado"></div>
                      </div>
                            <div class="box-footer">

                
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
   </div><br><br>
                        </form>
                        <?php 
}
                         ?>
                      </div>
                      <br>
                      <br>
                       <div class="col-xs-12 col-sm-6 col-md-12">
                         <table id="example1" class="table table-bordered">
                          <caption>DATOS PREVIOS A GENERAR</caption>
                            <thead>
                            <tr>
                              <th>N°</th>
                            <th>Id</th>
                            <th>Material</th>
                            <th width="95">Grueso</th>
                            <th width="95">Ancho</th>
                            <th width="95">Largo</th>
                            <th width="95">Piezas</th>
                            <th>Multiplo</th>
                            <th>Fecha Ingreso</th>
                            <th>Bodega Destino</th>
                            <th>Contendor</th>
                            <th>Stock</th>
                            <th>Cantidad</th>
                            <th>M<sup>3</sup></th>
                            <th>Opcion</th>
                            </tr>
                          </thead>
                            <tbody>
                              <?php 
                                require_once "../class/Paquetes.php";
                            $mss1 = new Paquetes();
                         $paquetes_temp = $mss1->selectALL_TEMPORAL($codigo,$conten);
                         $datos2=1;
                         $metros_generando=0;
                         foreach ($paquetes_temp as $key_t) {
                            $m3=round($key_t['cantidad']*$key_t['metros_cubicos'],2);
                            $metros_generando = $metros_generando +$m3;
                            $dateIP=date_create($key_t['fecha_ingreso']);
                          echo '
                          <tr>
                          <td>'.$datos2.'</td>
                          <td>'.$key_t['id_paquete'].'</td>
                          <td>'.$key_t['material'].'</td>';
                          
                          echo '
                          <td>'.$key_t['grueso'].'</td>
                          <td>'.$key_t['ancho'].'</td>
                          <td>'.$key_t['largo'].'</td>
                          <td>'.$key_t['piezas'].'</td>
                          <td>'.$key_t['multiplo'].'</td>
                          <td>'.date_format($dateIP, 'd/m/Y').'</td>';
                        //  <td>'.$key['bodega'].'</td>
                          if ($key_t['id_bodega']=='0') {
                          echo '<td>Sin confirmar contenedor</td>';
                          }else{
                               require_once "../class/Bodega.php";
            
                             $bod = new Bodega();
                             $datoBd = $bod->SelectOne($key_t['id_bodega']);
                             foreach ($datoBd as $valor) {
                              echo'<td>'.$valor['nombre'].'</td>';
                               
                             }
                          }
                        echo'  <td>'.$key_t['contenedor'].'</td>
                          <td>'.$key_t['stock'].'</td>
                          <td>'.$key_t['cantidad'].'</td>
                          <td>'.round($key_t['cantidad']*$key_t['metros_cubicos'],2).'</td>
                          <td>
                          <input type="button" name="save2" value="Modificar" id="'.$key_t["id_paquete"].'" packing="'.$codigo.'" contenedor="'.$conten.'" etiquetaCo="'.$etic.'" flag="modificar" class="btn btn-warning modi_data2" />
                          <input type="button" name="save2" value="Eliminar" id="'.$key_t["id_paquete"].'" packing="'.$codigo.'" contenedor="'.$conten.'" etiquetaCo="'.$etic.'" flag="eliminar" class="btn btn-danger delete_data2" />
                                <a href="../controllers/PaquetesControlador.php?id='.$key_t["id_paquete"].'&accion=generar&packing='.$codigo.'&id_contenedor='.$conten.'&etiquetaCoo='.$etic.'" class="btn btn-success">Generar</a>                          
                          </td>
                          ';
                          
                          echo '</tr>
                           ';
                          $datos2=$datos2+1;

                         }
                               ?>                              
                            </tbody>
                          </table>
                        
<center><h2 style="color: #000;">SUMA TOTAL de M<SUP>3</SUP>:  <?php echo round($metros_generando,2); ?>m<sup>3</sup></h2></center>
                       </div>

                      <div class="col-xs-12 col-sm-6 col-md-12">
                        <h1>Paquetes Ingresados</h1>
                        <table id="example1" class="table table-bordered">
                            <thead>
                            <tr>
                              <th>N°</th>
                            <th>Id</th>
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
                         $paquetes = $mss->selectALLpack4($codigo,$conten);
                         $datos=1;
                         foreach ($paquetes as $key) {

                            $dateIP=date_create($key['fecha_ingreso']);
                          echo '
                          <tr>
                          <td>'.$datos.'</td>
                          <td>'.$key['id_paquete'].'</td>
                          <td>'.$key['material'].'</td>';
                          if ($key['etiqueta']==NULL) {
                            if ($modificando=='Si' && $datos==($num_dato+1)) {
                              
                          echo '<td><input type="text" class="form-control" name="eti'.$datos.'"  autofocus="true" id="eti'.$datos.'"> </td>';
                            }else{

                          echo '<td><input type="text" class="form-control" name="eti'.$datos.'" id="eti'.$datos.'"> </td>';
                            }
                          }
                          else{
                            echo '<td>'.$key['etiqueta'].'</td>

                            <input type="hidden" name="eti'.$datos.'" id="eti'.$datos.'" value ="POSEE">
                            ';
                          }
                          
                          echo '
                          <td>'.$key['grueso'].'</td>
                          <td>'.$key['ancho'].'</td>
                          <td>'.$key['largo'].'</td>
                          <td>'.$key['piezas'].'</td>
                          <td>'.$key['multiplo'].'</td>
                          <td>'.date_format($dateIP, 'd/m/Y').'</td>';
                        //  <td>'.$key['bodega'].'</td>
                          if ($key['id_bodega']=='0') {
                          echo '<td>Sin confirmar contenedor</td>';
                          }else{
                               require_once "../class/Bodega.php";
            
                             $bod = new Bodega();
                             $datoBd = $bod->SelectOne($key['id_bodega']);
                             foreach ($datoBd as $valor) {
                              echo'<td>'.$valor['nombre'].'</td>';
                               
                             }
                          }
                        echo'  <td>'.$key['contenedor'].'</td>
                          <td>'.$key['stock'].'</td>
                          <td>'.$key['estado'].'</td>';
                          if ($key['etiqueta']!=NULL) {
                            echo '<td><input type="button" name="save" value="Modificar" id="'.$key["id_paquete"].'" packing="'.$codigo.'" contenedor="'.$conten.'" etiquetaCo="'.$etic.'" flag="modificar" class="btn btn-warning modi_data" /></td>';
                          }else{
                            echo '
                          <td><input type="button" name="save" value="Guardar" id="'.$key["id_paquete"].'" packing="'.$codigo.'" dato="'.$datos.'" class="btn btn-success view_data2" /></td>';

                          }
                          echo '</tr>
                           ';
                          $datos=$datos+1;
                         }

                          ?>
                            </tbody>
                        </table>
                      </div>
                      
                    </div>
                  </div> <!-- end x content-->
                </div><!-- end x panel -->
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
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                                 <h4 class="modal-title">Modificar Paquete</h4>  
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

      

 });  

</script>
        <script>
  $(function () {
    $('#example1').dataTable( {
  "pageLength": 75
} );
    $('#example3').DataTable()
    $('#example4').DataTable()
    $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'order'       : [[0, "desc"]]
    })
  });
    $(document).ready(function () {
    $("#num_paque").keyup(function () {

        var piezas = $("#piezas").val();

        var multiplo = $("#multiplo").val();
        var largo = $("#largo").val();
        var sug_multiplo = largo/1000;
        $("#multiplo").val(Math.round(sug_multiplo));
        var ancho = $("#ancho").val();
        var grueso = $("#grueso").val();
        var num_paque = $(this).val();
        var metro_cubico = (piezas * largo * ancho * grueso)/1000000000;
       
        $("#metros_cubicos").val(metro_cubico);
        $("#metros_cubicos_total").val(metro_cubico*num_paque);
    });
});
</script>
    <script src="../build/js/custom.min.js"></script>

    <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY.MM.DD'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
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
<script>
  $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      $("#etiqueta").focus();
                                                 
      //comprobamos si se pulsa una tecla
      $("#etiqueta").keyup(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#etiqueta").val();
                                      
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {      
                                           
                  $("#resultado").html('<img src="ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "../views/paquetes/comprobar.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
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
<script type="text/javascript">
   $(document).ready(function(){ 
$(document).on('click', '.view_data2', function(){  

           var employee_id = $(this).attr("id"); 
           var employee_packing = $(this).attr("packing");  
           var dato = $(this).attr("dato"); 
           var employee_etiqueta = $("#eti"+dato).val();
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../controllers/PaquetesControlador.php?accion=etiqueta",  
                     method:"POST",
                     data:{employee_id:employee_id,employee_packing:employee_packing,employee_etiqueta:employee_etiqueta,dato:dato},  
                     success:function(data){    

  setTimeout(location.reload(), 5000);
                     }  
                });  
           }            
      });
$(document).on('click', '.modi_data2', function(){  
           var employee_id = $(this).attr("id");  
           var employee_packing = $(this).attr("packing");  
           var employee_contenedor = $(this).attr("contenedor");  
           var employee_etiquetaCo = $(this).attr("etiquetaCo");  

           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/paquetes/modi_temp.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_packing:employee_packing,employee_contenedor:employee_contenedor,employee_etiquetaCo:employee_etiquetaCo},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
                     }  
                });  
           }            
      });


$(document).on('click', '.delete_data2', function(){  
           var employee_id = $(this).attr("id");  
           var employee_packing = $(this).attr("packing");  
           var employee_contenedor = $(this).attr("contenedor");  
           var employee_etiquetaCo = $(this).attr("etiquetaCo");  

           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/paquetes/delete_temp.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_packing:employee_packing,employee_contenedor:employee_contenedor,employee_etiquetaCo:employee_etiquetaCo},  
                     success:function(data){  
                          $('#employee_forms5').html(data);  
                          $('#dataModal5').modal('show');  
                     }  
                });  
           }            
      });


$(document).on('click', '.modi_data', function(){  
           var employee_id = $(this).attr("id");  
           var employee_packing = $(this).attr("packing");  
           var employee_contenedor = $(this).attr("contenedor");  
           var employee_etiquetaCo = $(this).attr("etiquetaCo");  

           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../views/paquetes/modiPaquete.php",  
                     method:"POST",  
                     data:{employee_id:employee_id,employee_packing:employee_packing,employee_contenedor:employee_contenedor,employee_etiquetaCo:employee_etiquetaCo},  
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
    document.getElementById("datos2").innerHTML=xmlhttp.responseText;
    }else{ 
  document.getElementById("datos2").innerHTML='Cargando...';
    }
  }
  xmlhttp2.onreadystatechange=function()
  {
  if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
    document.getElementById("datos3").innerHTML=xmlhttp2.responseText;
    }else{ 
  document.getElementById("datos3").innerHTML='Cargando...';
    }
  }
xmlhttp.open("POST","../views/paquetes/fechaPaquete.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cod_banda="+cod);

xmlhttp2.open("POST","../views/paquetes/bodegaPaquete.php",true);
xmlhttp2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp2.send("cod_banda="+cod);
}
</script>
    </body>
</html>