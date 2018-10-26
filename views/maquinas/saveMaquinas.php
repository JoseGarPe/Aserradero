<form method="post" id="insert_form" action="../controllers/MaquinaControlador.php?accion=guardar">

                          <label>Nombre</label>  
                          <input type="text" name="nombre" id="nombre" class="form-control" />  
                          <br /> 
                          <label>Descripcion</label>  
                          <input type="text" name="descripcion" id="descripcion" class="form-control" />  
                          <br /> 

                           <label class="input-group-text" for="inputGroupSelect01">Bodega Ubicada</label>
                           <br />
                           <select class="form-control" name="id_bodega" id="id_bodega">
                          <?php 

                          require_once "../class/Bodega.php";

                          $misBodegas = new Bodega();
                         $catego = $misBodegas->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_bodega']."'>".$row['nombre']."</option>";

                          } 

                    
                          ?>
                          </select>


                          <br />  

                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="hidden" name="guardar" id="guardar" />  
                         
                         
                         
                         
                          <span class="add-on"><i class="glyphicon glyphicon-plus"></i></span>
                           <input type="submit" name="insert" id="insert"  value="Agregar Usuario" class="btn btn-success "/>

                         
                       
</form>