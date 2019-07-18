<div class="col-xs-12">
  <?php 
  $codigo=$_POST["employee_id"];
                require_once "PackingList.php";
                          $packing = new Packing();
                          $orden = $packing->SelectOne($codigo);
                         foreach ($orden as $key) {
                           $estado = $key['estado'];
                           $fecha_inicio = $key['fecha_inicio'];
                           $fecha_cierre = $key['fecha_cierre'];
                         }
                         echo ' <h2><label>Fecha Inicio: <strong> '.$fecha_inicio.' </strong></label> - <label>Fecha Cierre: <strong> '.$fecha_cierre.' </strong></label></h2>';
                         $primerContenedor= $packing->FstContenedor($codigo);
                       
   ?> <form></form>
    				<table id="example1" class="table table-striped table-bordered" name="example1">
         		<thead>
                        <tr>
                          <th>Id</th>
                          <th>Etiqueta</th>
                          <th>Estado</th>
                          <th>Fecha Ingreso</th> 
                          <th>Bodega</th>  
                          <th>Opcion</th>                            
                        </tr>
          		</thead>
          		<tbody>
          			<?php 
  				
						require_once "Contenedor.php";
            
                         $ms = new Contenedores();
                         $contacto = $ms->selectALLpack($codigo);
                         $idf=1;
                         foreach ($contacto as $row) {
                          
                         	echo '<tr>
                          <td>'.$row['id_contenedor'].'</td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['estado'].'</td>
                          ';
                            if ($row['fecha_ingreso'] == NULL && $row['estado']!= 'Confirmado' || $row['fecha_ingreso']== '0000-00-00' && $row['estado']!= 'Confirmado' || $row['fecha_ingreso']== '00/00/0000' && $row['estado']!= 'Confirmado') {
                              echo '<td>
                             <input type="date" class="form-control" name="fecha'.$idf.'" id="fecha'.$idf.'"> 
                              
                              </td>';
                            }else{
                              $date = date_create($row['fecha_ingreso']);
                              echo '<td>'.date_format($date, 'd/m/Y').'</td>';
                            }
                            if ($row['id_bodega']== NULL) {
                              echo '<td><select class="form-control" name="id_bodega'.$idf.'" id="id_bodega'.$idf.'" required>
                          <option>Seleccione una opcion</option>';
                          require_once "Bodega.php";

                        $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $rows1) {

                            echo "<option value='".$rows1['id_bodega']."'>".$rows1['nombre']."</option>";

                          } 
                         echo '  </select></td>';
                            }
                            else{
                              echo'<td>'.$row['id_bodega'].'</td>';
                            }
                          if ($estado != "Cerrado") {
                             
                            if ($row['estado']=='Sin Confirmar') {
                              echo '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Confirmado&id_packing_list='.$codigo.'" class="btn btn-success">Confirmar</a> -->
                                <input type="button" name="save" value="Confirmar" id="'.$row["id_contenedor"].'" packing="'.$codigo.'" dato="'.$idf.'" estado="Confirmado"  class="btn btn-success view_data2" />

                              </td>';
                            }else{
                              echo '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Sin Confirmar" class="btn btn-warning">Sin Confirmar</a>  -->

            <a href="../views/savePaquetee.php?id='.$codigo.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>

                              </td>

                              ';
                            }
                          }else{
                            echo '<td></td>';
                          }
                          $idf+=1;
                      
                          } 
                           echo'
                          </tr>';
                         
                echo '<input type="hidden"  name="totaldatos" id="totaldatos" value="'.$idf.'">';

                     /* echo'<select class="form-control col-md-7 col-xs-12" name="id_bodega1[]" id="id_bodega1[]">';     
                      require_once "../class/Bodega.php";

                          $mistipos1 = new Bodega();
                         $catego1 = $mistipos1->selectALL();
                          foreach ((array)$catego1 as $key) {
                                if ($key['id_bodega']==$row['id_bodega']) {
                            echo "<option selected value='".$key['id_bodega']."'>".$key['nombre']."</option>";
                                                                
                             }
                             else{

                            echo "<option value='".$key['id_bodega']."'>".$key['nombre']."</option>";
                             }

                          }
                          echo'</select> </td>'; 
                          */
                              

                         
    	     
    	      ?>
          		</tbody>
          			</table>
				</div>
        <br><br>
        <?php 

                         if ($estado != 'Cerrado') {

         ?>
<div class="form-group">
                        <div id="resultado"></div>
                      </div>
<form role="form1" action="../controllers/ContenedorControlador.php?accion=guardar" method="post">
    <div class="box-body">
      <?php 
      if ($primerContenedor == 'Primer Contenedor') {
      echo '
      <label>Datos complementarios Packing List</label>
      <div class="row">
              <div class="col-md-12">
                   <div class="row">
                      <div class="form-group col-sm-4 col-sm-2">
                        <label for="middle-name" class="control-label col-xs-8">Correlativo</label>
                        <div class="col-xs-3 col-sm-3">
                          <input id="dia"  type="number" min="1" max="31" step="1" name="dia">
                        </div>
                      </div>

                      <div class="form-group col-sm-4 col-sm-2">
                        <label for="middle-name" class="control-label col-xs-2">/</label>
                        <div class="col-xs-3">
                          <input id="mes"  type="number" name="mes" step="1" min="1" max="12">
                        </div>
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="middle-name" class="control-label col-xs-2">-</label>
                        <div class="col-xs-3 col-sm-2">
                          <input id="correlativo"  type="number" step="1" min="0" max="3000" name="correlativo">
                        </div>
                      </div>

                   </div>
                </div>
          </div>
          <div class="row">
          <div class="form-group">
                        <label for="middle-name" class="control-label col-md-1 col-sm-3 col-xs-12">Poliza</label>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                          <input id="poliza"  type="text" class="form-control" name="poliza">
                        </div>
                      </div>
                      <br><br>
          </div>
      ';
      }
       ?>
       <br><br>
    	<div class="row">

    		<div class="col-xs-12">
    			<table id="example6" class="table table-striped table-bordered">
         		<thead>
                        <tr>
                          <th>Etiqueta</th>                          
                        </tr>
          		</thead>
          		<tbody>
          			  <tr>     
                  <?php  
                  echo '
                          <input type="hidden" name="id_packing_list" id="id_packing_list" value="'.$codigo.'"/>';
                  ?>      
                          
                          <th><input type="text" id="etiqueta" name="etiqueta"  class="form-control col-md-7"></th>
                  <tr>
                         
          		</tbody>
          			</table>
    		</div>
    	</div><!--END ROW-->

    </div>
    <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/IndexPackingList.php'" name="cancel" value="Cancelar" >
   </div>
</form>
<?php } ?>



        <script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    $('#example3').DataTable()
    $('#example4').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script><script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
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
   $(document).ready(function(){ 
$(document).on('click', '.view_data2', function(){  

           var td = $("#totaldatos").val();
           var employee_id = $(this).attr("id"); 
           var employee_packing = $(this).attr("packing");  
           var employee_status = $(this).attr("estado"); 
           var dato = $(this).attr("dato"); 
           var employee_fecha = $("#fecha"+dato).val();
           var id_bodega = $("#id_bodega"+dato).val();
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../controllers/ContenedorControlador.php?accion=confirmar2",  
                     method:"POST",
                     data:{employee_id:employee_id,employee_packing:employee_packing,employee_status:employee_status,employee_fecha:employee_fecha,id_bodega:id_bodega},  
                     success:function(data){  
                          location.href = "../listas/IndexPackingList.php?success=correcto";
                             n(); 
                     }  
                });  
           }            
      });
 }); 

</script>
