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
   ?>
    				<table id="example1" class="table table-striped table-bordered" name="example1">
         		<thead>
                        <tr>
                          <th>Id</th>
                          <th>Etiqueta</th>
                          <th>Estado</th> 
                          <th>Opcion</th>                            
                        </tr>
          		</thead>
          		<tbody>
          			<?php 
  				
						require_once "Contenedor.php";
            
                         $ms = new Contenedores();
                         $contacto = $ms->selectALLpack($codigo);
                         foreach ($contacto as $row) {
                         	echo '<tr>
                          <td>'.$row['id_contenedor'].'</td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['estado'].'</td>
                          ';
                          if ($estado != "Cerrado") {
                             
                            if ($row['estado']=='Sin Confirmar') {
                              echo '<td><a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Confirmado&id_packing_list='.$codigo.'" class="btn btn-success">Confirmar</a></td>';
                            }else{
                              echo '<td><a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Sin Confirmar" class="btn btn-warning">Sin Confirmar</a></td>';
                            }
                          }else{
                            echo '<td></td>';
                          }

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
        <?php 

                         if ($estado != 'Cerrado') {

         ?>

<form role="form1" action="../controllers/ContenedorControlador.php?accion=guardar" method="post">
    <div class="box-body">
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
</script>