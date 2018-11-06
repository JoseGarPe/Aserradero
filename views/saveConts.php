<div class="col-xs-12">
    				<table id="datatable-buttons" class="table table-striped table-bordered">
         		<thead>
                        <tr>
                          <th>Id</th>
                          <th>Etiqueta</th>
                          <th width="95">Piezas</th> 
                          <th width="95">multiplo</th>  
                          <th width="95">m cuadrados</th> 
                          <th width="95">Tarimas</th>
                          <th>Bodega</th>                              
                        </tr>
          		</thead>
          		<tbody>
          			<?php 
  					$codigo=$_POST["employee_id"];
						require_once "../class/Contenedor.php";
                         $ms = new Contenedores();
                         $contacto = $ms->selectALLpack($codigo);
                         foreach ($contacto as $row) {
                         	echo '<tr>
                          <td><input type="hidden" name="id_contenedor1[]" id="id_contenedor1[]" value="'.$row['id_contenedor'].'"/>'.$row['id_contenedor'].'</td>
                           <td><input type="text" id="etiqueta1[]" name="etiqueta" value="'.$row['etiqueta'].'"  class="form-control col-md-7"></td>
                           <td><input type="number" min="0.00" step="0.01" id="piezas" name="piezas1[]" value="'.$row['piezas'].'"  class="form-control col-md-7"></td>
                           <td> <input type="number" min="0.00" step="0.01" id="multiplo1[]" name="multiplo1[]" value="'.$row['multiplo'].'"  class="form-control col-md-7"></td>
                           <td><input type="number" min="0.00" step="0.01" id="m_cuadrados1[]" name="m_cuadrados1[]" value="'.$row['m_cuadrados'].'" class="form-control col-md-4 "></td>
                           <td><input type="number" min="0.00" step="1" id="tarimas1[]" name="tarimas1[]" value="'.$row['tarimas'].'" class="form-control col-md-4"></td>
                           <td><select class="form-control col-md-7 col-xs-12" name="id_bodega1[]" id="id_bodega1[]">';


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
                              

                           echo'</select></td>
                          
                          </tr>';
                         }
    	     
    	      ?>
          		</tbody>
          			</table>
				</div>
<form role="form1" action="../controllers/ContenedorControlador.php?accion=guardar" method="post">
    <div class="box-body">
    	<div class="row">
    		<div class="col-xs-12">
    			<table id="datatable-buttons" class="table table-striped table-bordered">
         		<thead>
                        <tr>
                          <th>Etiqueta</th>
                          <th width="95">Piezas</th> 
                          <th width="95">multiplo</th>  
                          <th width="95">m cuadrados</th> 
                          <th width="95">Tarimas</th>
                          <th>Bodega</th>                              
                        </tr>
          		</thead>
          		<tbody>
          			  <tr>     
                  <?php  
                  echo '
                          <input type="hidden" name="id_packing_list" id="id_packing_list" value="'.$codigo.'"/>';
                  ?>
                          <th><input type="text" id="etiqueta" name="etiqueta"  class="form-control col-md-7"></th>
                          <th><input type="number" min="0.00" step="0.01" id="piezas" name="piezas"  class="form-control col-md-7"></th> 
                          <th><input type="number" min="0.00" step="0.01" id="multiplo" name="multiplo"  class="form-control col-md-7"></th>  
                          <th><input type="number" min="0.00" step="0.01" id="m_cuadrados" name="m_cuadrados"  class="form-control col-md-4 "></th> 
                          <th><input type="number" min="0.00" step="1" id="tarimas" name="tarimas"  class="form-control col-md-4"></th>
                          <th>
                              <select class="form-control col-md-7 col-xs-12" name="id_bodega" id="id_bodega">
                          <?php 

                          

                          require_once "../class/Bodega.php";

                          $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_bodega']."'>".$row['nombre']."</option>";

                          } 

                    
                          ?>
                          </select>
                          </th>                              
                        </tr>
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