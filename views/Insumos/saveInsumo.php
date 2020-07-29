<form method="post" id="insert_form" action="../controllers/InsumosControlador.php?accion=guardar">

                          <label>Nombre de Insumo</label>  
                          <input type="text" name="nombre" id="nombre" class="form-control" />  
                          <br />
                          <label class="input-group-text" for="inputGroupSelect01">Tipo Insumo</label>
                           <br />
                           <select class="form-control" name="id_tipo_insumo" id="id_tipo_insumo">
                          <?php 
                    require_once "Tipo_Insumo.php";

                          $miCategoria = new Tipo_insumo();
                         $catego = $miCategoria->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_tipo_insumo']."'>".$row['nombre_insumo']."</option>";

                          } 

                    
                          ?>
                          </select>


                          <br />  

                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="hidden" name="guardar" id="guardar" />  
                         
                         
                         
                         
                          <span class="add-on"><i class="glyphicon glyphicon-plus"></i></span>
                           <input type="submit" name="insert" id="insert"  value="Agregar Materiales" class="btn btn-success "/>

                         
                       
</form>