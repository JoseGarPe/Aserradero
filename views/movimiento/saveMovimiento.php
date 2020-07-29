<form method="post" id="insert_form" action="../controllers/MovimientosControlador.php?accion=guardar">

                          <label>Cantidad Ingreso</label>  
                          <input type="text" name="cantidad" id="cantidad" class="form-control" />  
                          <br />
                          <label>Fecha Ingreso</label>  
                          <input type="date" name="fecha" id="fecha" class="form-control" />  
                          <br />
                           <br />
                      <?php 
                          echo ' <input type="hidden" name="id_insumo" id="id_insumo" value="'.$_POST['employee_id_insumo'].'"/> ';
                       ?>    
                          <input type="hidden" name="guardar" id="guardar" />  
                         
                         
                         
                         
                          <span class="add-on"><i class="glyphicon glyphicon-plus"></i></span>
                           <input type="submit" name="insert" id="insert"  value="Agregar Materiales" class="btn btn-success "/>

                         
                       
</form>