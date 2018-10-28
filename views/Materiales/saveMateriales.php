<form method="post" id="insert_form" action="../controllers/UsuarioControlador.php?accion=guardar">

                          <label>Nombre</label>  
                          <input type="text" name="nombre" id="nombre" class="form-control" />  
                          <br /> 
                          <label>Largo</label>  
                          <input type="number" min="0.00" step="0.01" name="largo" id="largo" class="form-control" /> 
                          <br /> 
                          <label>Ancho</label>  
                          <input type="number" min="0.00" step="0.01" name="ancho" id="ancho" class="form-control" /> 
                          <br /> 
                          <label>Grosor</label>  
                          <input type="number" min="0.00" step="0.01" name="grosor" id="grosor" class="form-control" /> 
                          <br />
                     
                          <label>Metro Cuadrado</label>  
                          <input type="number" min="0.00" step="0.01" name="m_cuadrados" id="m_cuadrados" class="form-control" /> 
                          <br />
                     
                           
                           <label class="input-group-text" for="inputGroupSelect01">Categorias</label>
                           <br />
                           <select class="form-control" name="id_categoria" id="id_categoria">
                          <?php 

                          

                          require_once "Categorias.php";

                          $miCategoria = new Categorias();
                         $catego = $miCategoria->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_categoria']."'>".$row['nombre']."</option>";

                          } 

                    
                          ?>
                          </select>


                          <br />  

                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="hidden" name="guardar" id="guardar" />  
                         
                         
                         
                         
                          <span class="add-on"><i class="glyphicon glyphicon-plus"></i></span>
                           <input type="submit" name="insert" id="insert"  value="Agregar Materiales" class="btn btn-success "/>

                         
                       
</form>
