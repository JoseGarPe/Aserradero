 

        <!-- top navigation -->
        <!-- /top navigation -->

        <!-- page content -->
        
          <div class="">
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Procesar Material<small>Paso a Paso</small></h2>
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


                    <!-- Smart Wizard -->
                    
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Paso 1<br />
                                              <small>Seleccionar Material</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Material a Procesar</small>
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
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bodega<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select  onchange="mostrarInfo(this.value)" class="form-control" name="id_bodega" id="id_bodega">
                                <option value="0">Seleccione una opcion</option>
                          <?php 
                         require_once "Bodega.php";

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
                          <div class="form-group">
                            <div id="datos99"></div>
                          </div>
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
                          </div>
                          <div class="x_content">

        <input type="text" id="search" placeholder="Escribe para buscar..." />
                           <table id="table" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Componente</th>
                          <th>Etiqueta</th>
                           <th>Piezas Disponibles</th> 
                           <th>Proveedor</th> 
                           <th>Factura</th>                       
                        </tr>
                      </thead>
                      <tbody id="datos23">
                      </tbody>
                      </table>
                          </div>

                       

                      </div>
                      <div id="step-2">
                        <h2 class="StepTitle">Paso 2 Elige material saliente</h2>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Maquina<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="id_maquina" id="id_maquina">
                                <option value="0">Seleccione una Maquina</option>
                          <?php 
                         require_once "Maquinas.php";

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
                         require_once "Materiales.php";

                          $mismate = new Materiales();
                         $catego = $mismate->selectALLproce();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_material']."'>".$row['nombre']."</option>";

                          } 
                          ?>
                          </select>
                            </div>
                          </div>
                      </div>







                      <div id="step-3">
                        <h2 class="StepTitle">Productos Salientes</h2>
                        <p>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad Saliente<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="cantidadsaliente" name="cantidadsaliente" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rendimiento Esperado<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="resperado" name="resperado" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>

                        </p>
                      </div>
                      <div id="step-4">
                        <h2 class="StepTitle">Bodega Destino</h2>
                        <p>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bodega<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select  class="form-control" name="id_bodegag" id="id_bodegag">
                                <option value="0">Seleccione una opcion</option>
                          <?php 
                         require_once "Bodega.php";

                          $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_bodega']."'>".$row['nombre']."</option>";

                          } 
                          ?>
                          </select>
                            </div>
                          </div>
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                      </div>

                       </form>

                    </div>
                    <!-- End SmartWizard Content -->

                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
       
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
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

           function mostrarInfo1(cod){
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
xmlhttp.send("cod_banda="+cod);

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
  });
</script>

 <!--   <script src="../vendors/jquery/dist/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
