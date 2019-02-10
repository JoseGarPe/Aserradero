<div class="col-xs-12">
    				<table id="example1" class="table table-striped table-bordered" name="example1">
         		<thead>
                        <tr>
                          <th>Id</th>
                          <th>Material</th>
                          <th>Etiqueta</th>
                          <th>Piezas</th>                             
                        </tr>
          		</thead>
          		<tbody>
          			<?php 
  					$codigo=$_POST["employee_id"];
						require_once "Paquetes.php";
            
                         $ms = new Paquetes();
                         $contacto = $ms->selectALLpack($codigo);
                         foreach ($contacto as $row) {
                         	echo '<tr>
                          <td>'.$row['id_paquete'].'</td>
                           <td>'.$row['material'].'</td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['piezas'].'</td>
                          ';

                          }


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
                              

                           echo'
                          </tr>';
                         
    	     
    	      ?>
          		</tbody>
          			</table>
				</div>
        <br><br>
<form role="form1" action="../controllers/PaquetesControlador.php?accion=guardar" method="post">
    <div class="box-body">
    	<div class="row">
    		<div class="col-xs-12">
    			<table id="example6" class="table table-striped table-bordered">
         		<thead>
                        <tr>
                          <th>Materiales</th>
                          <th>Etiqueta</th>
                          <th width="85">Piezas</th>                            
                        </tr>
          		</thead>
          		<tbody>
          			  <tr>     
                  <?php  
                  echo '
                          <input type="hidden" name="id_packing_list" id="id_packing_list" value="'.$codigo.'"/>';
                  ?>      
                          <th><select class="form-control" onchange="mostrarInfo(this.value)" name="id_materiales" id="id_materiales">
                          <option>Seleccione</option>
                          <?php 
                          require_once "Materiales.php";

                          $mistipos = new Materiales();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_material']."'>".$row['nombre']."</option>";

                          } 

                    
                          ?>
                          </select></th>
                          <th><input type="text" id="etiqueta" name="etiqueta"  class="form-control col-md-7"></th>
                          <th><input type="number" min="0.00" step="0.01" id="piezas" name="piezas"  class="form-control col-md-7"></th>
                         <input type="hidden" id="paquetes" name="paquetes" value="1" class="form-control col-md-4">
                         
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
</script>