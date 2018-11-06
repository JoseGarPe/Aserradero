<div class="col-md-8">
    				<table id="datatable-buttons" class="table table-striped table-bordered">
         		<thead>
                        <tr>
                          <th>Id</th>
                          <th>Etiqueta</th>
                          <th>piezas</th> 
                          <th>multiplo/th>  
                          <th>m cuadrados</th> 
                          <th>Tarimas</th>
                          <th>Bodega</th>                              
                        </tr>
          		</thead>
          		<tbody>
          			<?php 
  					$codigo=$_POST["employee_id"];
						require_once "../class/Contenedor.php";
                         $ms = new Contenedor();
                         $contacto = $ms->selectALLpack($codigo);
                         foreach ($contacto as $key) {
                         	echo '<tr>
                          <td>'.$row['id_contenedor'].'</td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['piezas'].'</td>
                           <td>'.$row['multiplo'].'</td>
                           <td>'.$row['m_cuadrados'].'</td>
                           <td>'.$row['tarimas'].'</td>
                           <td>'.$row['bodega'].'</td>
                          
                          </tr>';
                         }
    	     
    	      ?>
          		</tbody>
          			</table>
				</div>
<form role="form" action="../controllers/ContenedorControlador.php?accion=modificar" method="post">
    <div class="box-body">
    	<div class="row">
    		<div class="col-md-8">
    			<table id="datatable-buttons" class="table table-striped table-bordered">
         		<thead>
                        <tr>
                          <th>Etiqueta</th>
                          <th>piezas</th> 
                          <th>multiplo/th>  
                          <th>m cuadrados</th> 
                          <th>Tarimas</th>
                          <th>Bodega</th>                              
                        </tr>
          		</thead>
          		<tbody>
          			  <tr>
                          <th><input type="text" id="etiqueta" name="etiqueta"  class="form-control col-md-7 col-xs-12"></th>
                          <th><input type="number" min="0.00" step="0.01" id="piezas" name="piezas"  class="form-control col-md-7 col-xs-12"></th> 
                          <th><input type="number" min="0.00" step="0.01" id="multiplo" name="multiplo"  class="form-control col-md-7 col-xs-12">/th>  
                          <th><input type="number" min="0.00" step="0.01" id="m_cuadrados" name="m_cuadrados"  class="form-control col-md-7 col-xs-12"></th> 
                          <th><input type="number" min="0.00" step="0.01" id="tarimas" name="tarimas"  class="form-control col-md-7 col-xs-12"></th>
                          <th><input type="number" id="bodega" name="bodega"  class="form-control col-md-7 col-xs-12"></th>                              
                        </tr>
          		</tbody>
          			</table>
    		</div>
    	</div><!--END ROW-->

    </div>
    <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/lista_Calidad.php'" name="cancel" value="Cancelar" >
   </div>
</form>