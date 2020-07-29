<?php 
session_start();
if(!isset( $_SESSION['logged-in'] )){
     header("Location: ../index.php");

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
    if (isset($_GET['id_packing_list'])) {
      $id_packing_list=$_GET['id_packing_list'];
    }else{

                header("Location: IndexPackingList.php");
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

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
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
                <h3>Ingreso Por Barco</h3>
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
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <!-- action="../controllers/PackingControlador.php?accion=guardar"-->
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="post">
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

                          $packing = new Packing();
                          $orden = $packing->SelectOne($id_packing_list);
                          foreach ($orden as $key) {
                              echo '<input type="hidden" id="id_packing_list" name="id_packing_list" value="'.$id_packing_list.'">';
                  
                       ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Numero de Factura<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="numfac" name="numfac" value="<?php echo $key['numero_factura'] ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Codigo Embarque<span></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="codembarque" name="codembarque" value="<?php echo $key['codigo_embarque'] ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Razon Social<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="razonsocial" name="razonsocial" value="<?php echo $key['razon_social'] ?>"  class="form-control col-md-7 col-xs-12">
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
                              }elseif ($key['mes'] == 'FEBRERO') {
                                echo '<option value="FEBRERO" selected>FEBRERO</option>';
                              }elseif ($key['mes'] == 'MARZO') {
                                echo '<option value="MARZO" selected>MARZO</option>';
                              } elseif ($key['mes'] == 'ABRIL') {
                                echo '<option value="ABRIL" selected>ABRIL</option>';
                              } elseif ($key['mes'] == 'MAYO') {
                                echo '<option value="MAYO" selected>MAYO</option>';
                              } elseif ($key['mes'] == 'JUNIO') {
                                echo '<option value="JUNIO" selected>JUNIO</option>';
                              } elseif ($key['mes'] == 'JULIO') {
                                echo '<option value="JULIO" selected>JULIO</option>';
                              } elseif ($key['mes'] == 'AGOSTO') {
                                echo '<option value="AGOSTO" selected>AGOSTO</option>';
                              } elseif ($key['mes'] == 'SEPTIEMBRE') {
                                echo '<option value="SEPTIEMBRE" selected>SEPTIEMBRE</option>';
                              } elseif ($key['mes'] == 'OCTUBRE') {
                                echo '<option value="OCTUBRE" selected>OCTUBRE</option>';
                              } elseif ($key['mes'] == 'NOVIEMBRE') {
                                echo '<option value="NOVIEMBRE" selected>NOVIEMBRE</option>';
                              } elseif ($key['mes'] == 'DICIEMBRE') {
                                echo '<option value="DICIEMBRE" selected>DICIEMBRE</option>';
                              } else{
                                echo '  <option value="Seleccione una opcio">Seleccione una opcio</option>';
                              }
                             ?>
                          
                          </select>
                        </div>
                      </div>


                    <!--  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Posible Fecha<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class='input-group date' id='myDatepicker2'>
                            <input type='text' class="form-control" name="fecha" id="fecha" value="<?php echo $key['fecha']; ?>" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>-->
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Nave Entrante<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="id_nave" id="id_nave">
                          <?php 
                          require_once "../class/Naves.php";
                          $misNaves = new Naves();
                         $catego = $misNaves->selectALL();
                          foreach ((array)$catego as $row) {
                            if ($key['id_nave']==$row['id_nave']) {
                              echo "<option value='".$row['id_nave']."' selected>".$row['nombre']."</option>";
                            }else{
                              echo "<option value='".$row['id_nave']."'>".$row['nombre']."</option>";
                            }
                          } 
                          ?>
                          </select>
                        </div>
                      </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Shipper<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <input type="text" id="shipper" name="shipper" value="<?php echo $key['shipper'] ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Especificacion<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="id_especificacion" id="id_especificacion">
                          <?php 
                          require_once "../class/Especificacion.php";
                          $misEsp = new Especificacion();
                         $catego = $misEsp->selectALL();
                          foreach ((array)$catego as $row) {
                            if ($key['id_especificacion']==$row['id_especificacion']) {
                            echo "<option value='".$row['id_especificacion']."' selected>".$row['nombre']."</option>";
                              
                            }else{

                            echo "<option value='".$row['id_especificacion']."'>".$row['nombre']."</option>";
                            }
                          } 
                          ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Total Contenedores<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php  ?>
                          <input type="text" id="totconte" name="totconte" value="<?php echo $key['total_contenedores']; ?>"  class="form-control col-md-7 col-xs-12" value="1">
                        </div>
                      </div>
<!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Contenedores Ingresados<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="conteingre" name="conteingre"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
-->
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Packetes <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="packetes" name="packetes" value="<?php echo $key['paquetes'] ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <!--
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Packetes Fisicos<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="packfisicos" name="packfisicos"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Observaciones<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="observaciones" name="observaciones" class="form-control col-md-7 col-xs-12"><?php echo $key['obervaciones'] ?></textarea>
                        </div>
                      </div>
                        
                      <!--
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Estado<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="comboestado" name="comboestado">
                          <option value="abierto">Abierto</option>
                          <option value="pendiente">Pendiente</option>
                          <option value="finalizado">Finalizado</option>
                          </select>
                        </div>
                      </div>
-->
          <?php         }//end for each orden ?>
                    
                      <!-- /Botones  -->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <center><div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <a href="../listas/IndexPackingList.php" class="btn btn-primary">Cancelar</a>
                          <!--<button type="button" class="btn btn-success save_data">Guardar Ingreso</button>-->
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

  
</script>
	<script type="text/javascript">
   
  document.getElementById('save_data').addEventListener('click', enviarDatos);
  function enviarDatos(){
         var id_packing_list= document.getElementById('id_packing_list').value;
         var numfac = document.getElementById('numfac').value;
        var codembarque = document.getElementById('codembarque').value;
        var razonsocial = document.getElementById('razonsocial').value;
        var combomes =  document.getElementById('combomes').value;
        var shipper = document.getElementById('shipper').value;
        var id_nave = document.getElementById('id_nave').value;
        var id_especificacion = document.getElementById('id_especificacion').value;
 
        var packfisicos =0;
        var packetes = document.getElementById('packetes').value;
        var observaciones = document.getElementById('observaciones').value;
        var totconte = document.getElementById('totconte').value;
           console.log(packetes);
           if(packetes!= '' && packetes!=0 && totconte >0)  
           {  
                $.ajax({  
                     url:"../controllers/PackingControlador.php?accion=actualizar",  
                     method:"POST",
                     data:{id_packing_list:id_packing_list,numfac:numfac,codembarque:codembarque,razonsocial:razonsocial,combomes:combomes,packetes:packetes,observaciones:observaciones,shipper:shipper,id_nave:id_nave,id_especificacion:id_especificacion,packfisicos:packfisicos,totconte:totconte},  
                     success:function(data){    

                     // setTimeout(location.reload(), 5000);
                     location.href="../listas/IndexPackingList.php";
                     }  
                });  
           }else{
      alert('Ingrese valores validos para Contenedores esperados');
        $("#totconte").val('1');
           }            
  }
 
  </script>
  </body>
</html>
