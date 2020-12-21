<?php 
session_start();
if(isset($_SESSION['tiempo']) ) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 600;//20min en este caso.

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
  } if (isset($_GET['id_packing_list'])) {
      $id_packing_list=$_GET['id_packing_list'];
    }else{

                header("Location: IndexPackingList_local.php");
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
	  
    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
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

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
         
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ingreso Local</h3>
              </div>


              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Packing List<small>Ingreso</small></h2>
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
                    <div class="clearfix">
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
                    </div>
                  </div>
                  <div class="x_content">
                    <br />
                    <!--  action="../controllers/PackingControlador.php?accion=guardarLocal"  -->
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <?php 
                      /*
                      numero_factura
  codigo_embarque='".$this->codigo_embarque."',
        razon_social='".$this->razon_social."',
        mes='".$this->mes."',
        fecha='".$this->fecha."',
        total_contenedores='".$this->total_contenedores."',
        paquetes='".$this->paquetes."',
        obervaciones='".$this->obervaciones."',
        shipper='".$this->shipper."',
        id_nave='".$this->id_nave."',
        id_especificacion='".$this->id_especificacion."'
                      */
                          require_once "../class/PackingList.php";    
                          require_once "../class/Contenedor.php";   
                          $conten = new Contenedores();
                          $cont_Packin=$conten->selectALLpack($id_packing_list);
                          foreach ($cont_Packin as $value) {
                            $contenedor_guardado = $value['id_contenedor'];
                            $bodega_guardado = $value['id_bodega'];
                          }

                          $packing = new Packing();
                          $orden = $packing->SelectOneLocal($id_packing_list);
                      
                          
                          foreach ($orden as $key) {
                            $fecha_nueva='';
                           $array_falla = str_split($key['fecha']);
                           $falla_count = strlen($key['fecha']);
                           $fecha_nueva = "".$array_falla[8]."".$array_falla[9]."/".$array_falla[6]."".$array_falla[7]."/".$array_falla[0]."".$array_falla[1]."".$array_falla[2]."".$array_falla[3]."";
                              echo '<input type="hidden" id="id_packing_list" name="id_packing_list" value="'.$id_packing_list.'">';
                              echo '<input type="hidden" id="id_contenedor" name="id_contenedor" value="'.$contenedor_guardado.'">';
                  
                       ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Numero envio<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="numfac" name="numfac" value="<?php echo $key['numero_factura'] ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Mes<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="combomes" name="combomes">
                             <?php 
                              if ($key['mes'] == 'ENERO') {
                                echo '<option value="ENERO" selected>ENERO</option>';
                              }else{
                                echo ' 
                                <option value="FEBRERO">FEBRERO</option>
                                <option value="MARZO">MARZO</option>
                                <option value="ABRIL">ABRIL</option>
                                <option value="MAYO">MAYO</option>
                                <option value="JUNIO">JUNIO</option>
                                <option value="JULIO">JULIO</option>
                                <option value="AGOSTO">AGOSTO</option>
                                <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                                <option value="OCTUBRE">OCTUBRE</option>
                                <option value="NOVIEMBRE">NOVIEMBRE</option>
                                <option value="DICIEMBRE">DICIEMBRE</option>';
                              }
                              if ($key['mes'] == 'FEBRERO') {
                                echo '<option value="FEBRERO" selected>FEBRERO</option>';
                              }else{
                                echo'
                            <option value="ENERO">ENERO</option>
                          <option value="MARZO">MARZO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="MAYO">MAYO</option>
                          <option value="JUNIO">JUNIO</option>
                          <option value="JULIO">JULIO</option>
                          <option value="AGOSTO">AGOSTO</option>
                          <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                          <option value="OCTUBRE">OCTUBRE</option>
                          <option value="NOVIEMBRE">NOVIEMBRE</option>
                          <option value="DICIEMBRE">DICIEMBRE</option>
                                ';
                              }
                              if ($key['mes'] == 'MARZO') {
                                echo '<option value="MARZO" selected>MARZO</option>';
                              } else{
                                echo '
                                    <option value="ENERO">ENERO</option>
                          <option value="FEBRERO">FEBRERO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="MAYO">MAYO</option>
                          <option value="JUNIO">JUNIO</option>
                          <option value="JULIO">JULIO</option>
                          <option value="AGOSTO">AGOSTO</option>
                          <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                          <option value="OCTUBRE">OCTUBRE</option>
                          <option value="NOVIEMBRE">NOVIEMBRE</option>
                          <option value="DICIEMBRE">DICIEMBRE</option>
                                ';
                              }
                              if ($key['mes'] == 'ABRIL') {
                                echo '<option value="ABRIL" selected>ABRIL</option>';
                              } else{
                                echo '
                                      <option value="ENERO">ENERO</option>
                              <option value="FEBRERO">FEBRERO</option>
                              <option value="MARZO">MARZO</option>
                              <option value="MAYO">MAYO</option>
                              <option value="JUNIO">JUNIO</option>
                              <option value="JULIO">JULIO</option>
                              <option value="AGOSTO">AGOSTO</option>
                              <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                              <option value="OCTUBRE">OCTUBRE</option>
                              <option value="NOVIEMBRE">NOVIEMBRE</option>
                              <option value="DICIEMBRE">DICIEMBRE</option>
                                ';
                              }
                              if ($key['mes'] == 'MAYO') {
                                echo '<option value="MAYO" selected>MAYO</option>';
                              } else{
                                echo '  <option value="ENERO">ENERO</option>
                          <option value="FEBRERO">FEBRERO</option>
                          <option value="MARZO">MARZO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="JUNIO">JUNIO</option>
                          <option value="JULIO">JULIO</option>
                          <option value="AGOSTO">AGOSTO</option>
                          <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                          <option value="OCTUBRE">OCTUBRE</option>
                          <option value="NOVIEMBRE">NOVIEMBRE</option>
                          <option value="DICIEMBRE">DICIEMBRE</option>';
                              }
                              if ($key['mes'] == 'JUNIO') {
                                echo '<option value="JUNIO" selected>JUNIO</option>';
                              } else{
                                echo '
                                  <option value="ENERO">ENERO</option>
                          <option value="FEBRERO">FEBRERO</option>
                          <option value="MARZO">MARZO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="MAYO">MAYO</option>
                          <option value="JULIO">JULIO</option>
                          <option value="AGOSTO">AGOSTO</option>
                          <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                          <option value="OCTUBRE">OCTUBRE</option>
                          <option value="NOVIEMBRE">NOVIEMBRE</option>
                          <option value="DICIEMBRE">DICIEMBRE</option>
                                ';
                              }
                              if ($key['mes'] == 'JULIO') {
                                echo '<option value="JULIO" selected>JULIO</option>';
                              } else{
                                echo '  <option value="ENERO">ENERO</option>
                          <option value="FEBRERO">FEBRERO</option>
                          <option value="MARZO">MARZO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="MAYO">MAYO</option>
                          <option value="JUNIO">JUNIO</option>
                          <option value="AGOSTO">AGOSTO</option>
                          <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                          <option value="OCTUBRE">OCTUBRE</option>
                          <option value="NOVIEMBRE">NOVIEMBRE</option>
                          <option value="DICIEMBRE">DICIEMBRE</option>';
                              }
                              if ($key['mes'] == 'AGOSTO') {
                                echo '<option value="AGOSTO" selected>AGOSTO</option>';
                              } else{
                                echo '
                                  <option value="ENERO">ENERO</option>
                          <option value="FEBRERO">FEBRERO</option>
                          <option value="MARZO">MARZO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="MAYO">MAYO</option>
                          <option value="JUNIO">JUNIO</option>
                          <option value="JULIO">JULIO</option>
                          <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                          <option value="OCTUBRE">OCTUBRE</option>
                          <option value="NOVIEMBRE">NOVIEMBRE</option>
                          <option value="DICIEMBRE">DICIEMBRE</option>
                                ';
                              }
                              if ($key['mes'] == 'SEPTIEMBRE') {
                                echo '<option value="SEPTIEMBRE" selected>SEPTIEMBRE</option>';
                              } else{
                                echo'  <option value="ENERO">ENERO</option>
                          <option value="FEBRERO">FEBRERO</option>
                          <option value="MARZO">MARZO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="MAYO">MAYO</option>
                          <option value="JUNIO">JUNIO</option>
                          <option value="JULIO">JULIO</option>
                          <option value="AGOSTO">AGOSTO</option>
                          <option value="OCTUBRE">OCTUBRE</option>
                          <option value="NOVIEMBRE">NOVIEMBRE</option>
                          <option value="DICIEMBRE">DICIEMBRE</option>';
                              }
                              if ($key['mes'] == 'OCTUBRE') {
                                echo '<option value="OCTUBRE" selected>OCTUBRE</option>';
                              } else{
                                echo '  <option value="ENERO">ENERO</option>
                          <option value="FEBRERO">FEBRERO</option>
                          <option value="MARZO">MARZO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="MAYO">MAYO</option>
                          <option value="JUNIO">JUNIO</option>
                          <option value="JULIO">JULIO</option>
                          <option value="AGOSTO">AGOSTO</option>
                          <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                          <option value="NOVIEMBRE">NOVIEMBRE</option>
                          <option value="DICIEMBRE">DICIEMBRE</option>';
                              }
                              if ($key['mes'] == 'NOVIEMBRE') {
                                echo '<option value="NOVIEMBRE" selected>NOVIEMBRE</option>';
                              } else{
                                echo'  <option value="ENERO">ENERO</option>
                          <option value="FEBRERO">FEBRERO</option>
                          <option value="MARZO">MARZO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="MAYO">MAYO</option>
                          <option value="JUNIO">JUNIO</option>
                          <option value="JULIO">JULIO</option>
                          <option value="AGOSTO">AGOSTO</option>
                          <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                          <option value="OCTUBRE">OCTUBRE</option>
                          <option value="DICIEMBRE">DICIEMBRE</option>';
                              }
                              if ($key['mes'] == 'DICIEMBRE') {
                                echo '<option value="DICIEMBRE" selected>DICIEMBRE</option>';
                              } else{
                                echo '  <option value="ENERO">ENERO</option>
                          <option value="FEBRERO">FEBRERO</option>
                          <option value="MARZO">MARZO</option>
                          <option value="ABRIL">ABRIL</option>
                          <option value="MAYO">MAYO</option>
                          <option value="JUNIO">JUNIO</option>
                          <option value="JULIO">JULIO</option>
                          <option value="AGOSTO">AGOSTO</option>
                          <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                          <option value="OCTUBRE">OCTUBRE</option>
                          <option value="NOVIEMBRE">NOVIEMBRE</option>';
                              }
                             ?>
                          
                          
                          </select>
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Fecha de Ingreso<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker2'>
                            <input type='text' class="form-control" name="fecha" id="fecha" value="<?php echo $fecha_nueva ?>" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Proveedor<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <input type="text" id="shipper" name="shipper" value="<?php echo $key['shipper'] ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">INAB<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <input type="text" id="poliza" name="poliza" value="<?php echo $key['poliza'] ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Bodega Destino<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="id_bodega" id="id_bodega" required>
                          <option value="">Seleccione una opcion</option>
                          <?php 
                          require_once "../class/Bodega.php";

                        $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $rows1) {
                            if ($rows1['id_bodega']==$bodega_guardado) {
                               echo "<option value='".$rows1['id_bodega']."' selected>".$rows1['nombre']."</option>";
                            }else{
                              echo "<option value='".$rows1['id_bodega']."'>".$rows1['nombre']."</option>";
                            }
                           

                          } 
                           ?>
                     </select>

                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Total Paquetes Esperados <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="packetes" min="1" step="1" name="packetes"  value="<?php echo $key['paquetes'] ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Tipo Ingreso<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="ingreso_local" name="ingreso_local">
                            <?php
                              if ($key['ingreso_local']=='Local') {
                                echo '<option value="Local" selected>Local</option>';
                              }else{
                                echo '<option value="Local">Local</option>';
                              }
                              if ($key['ingreso_local']=='Importada') {
                             echo ' <option value="Importada" selected>Importada</option>';
                              }else{
                             echo ' <option value="Importada">Importada</option>';
                              }
                            ?>
                          
                          
                          </select>
                        </div>
                      </div>
                                          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Observaciones<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="observaciones" name="observaciones" class="form-control col-md-7 col-xs-12"><?php echo $key['obervaciones']?></textarea>
                        </div>
                      </div>
                      

                    
                      <!-- /Botones  -->
                      <div class="ln_solid"></div>
                         <?php         }//end for each orden 
                         ?>
                      <div class="form-group">
                        <center><div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                      <a href="../listas/IndexPackingList_Local.php" class="btn btn-primary">Cancelar</a>
                         <!-- <button class="btn btn-" type="button">Cancelar</button>
                          <button type="button" class="btn btn-success save_data">Guardar Ingreso</button>-->
                          <input type="button" class="btn btn-success save_data" id="save_data" name="save_data" value="Guardar">
                        </div></center>
                      </div>
                    <!-- Terminan Botones -->
                    </form>
                  </div>
                </div>
              </div>
            </div>

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD/MM/YYYY'
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

 /* $(document).ready(function () {
    $("#packetes").keyup(function () {

        var paquetes = $("#packetes").val();
  if (paquetes <0 || paquetes==0) {

    alert('Ingrese valores validos para Paquetes esperados');

        $("#packetes").val('1');
  }       
    });
});*/
</script>
<script type="text/javascript">
  document.getElementById('save_data').addEventListener('click', enviarDatos);
  function enviarDatos(){
         var numfac = document.getElementById('numfac').value;
        var combomes =  document.getElementById('combomes').value;
        var shipper = document.getElementById('shipper').value;
        var fecha = document.getElementById('fecha').value;
        var poliza = document.getElementById('poliza').value;
        var id_bodega =document.getElementById('id_bodega').value;
        var packetes = document.getElementById('packetes').value;
        var ingreso_local = document.getElementById('ingreso_local').value;
        var observaciones = document.getElementById('observaciones').value;
        var id_contenedor = document.getElementById('id_contenedor').value;
        var id_packing_list = document.getElementById('id_packing_list').value;
           console.log(packetes);
           if(packetes!= '' && packetes!=0)  
           {  
                $.ajax({  
                     url:"../controllers/PackingControlador.php?accion=updateLocal",  
                     method:"POST",
                     data:{numfac:numfac,combomes:combomes,fecha:fecha,poliza:poliza,id_bodega:id_bodega,packetes:packetes,ingreso_local:ingreso_local,observaciones:observaciones,shipper:shipper,id_contenedor:id_contenedor,id_packing_list:id_packing_list},  
                     success:function(data){    
                     location.href="../listas/IndexPackingList_Local.php";
                     }  
                });  
           }else{
      alert('Ingrese valores validos para Paquetes esperados');
        $("#packetes").val('1');
           }            
  }


</script>
	
  </body>
</html>
