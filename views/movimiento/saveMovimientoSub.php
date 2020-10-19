<form method="post" id="insert_form" action="../controllers/MovimientosControlador.php?accion=guardar">

                          <label>Cantidad Ingreso</label>  
                          <input type="text" name="cantidad" id="cantidad" class="form-control"  />  
                          <br />
                          <label for="cars">Elije el tipo de movimiento:</label>

                          <select name="id_tipo_movimiento" id="id_tipo_movimiento" class="form-control" >
                            <option value="1">Ingreso</option>
                            <option value="2">Salida</option>
                          </select>
                          <br>
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