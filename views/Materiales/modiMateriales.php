<form role="form" action="../controllers/MaterialesControlador.php?accion=modificar" method="post">
              <div class="box-body">

  <?php 
require_once "Materiales.php";


         
              $codigo=$_POST["employee_id"];
               $miMaterial = new Materiales();
                         $catego = $miMaterial->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                            echo '
                           <div class="form-group">
                             <label for="codigo">N°</label>
                             <input type="text" class="form-control" readonly value="'.$codigo.'" id="id" name="id">
                            </div>
                          <div class="form-group">
                          <label>Nombre</label>  
                          <input type="text" name="nombre"id="nombre" class="form-control" value="'.$row["nombre"].'" />  
                           </div>
                           <div class="form-group">
                          <label>Largo</label>  
                          <input type="number" min="0.00" step="0.01" name="largo" id="largo" value="'.$row["largo"].'" class="form-control" /> 
                          </div>
                            <div class="form-group">
                          <label>Ancho</label>  
                          <input type="number" min="0.00" step="0.01" name="ancho" id="ancho"value="'.$row["ancho"].'" class="form-control" /> 
                           </div>
                            <div class="form-group">

                          <label>Grosor</label>  
                          <input type="number" min="0.00" step="0.01" name="grueso" id="grueso" value="'.$row["grueso"].'"class="form-control" /> 
                          </div>
                   <div class="form-group">
                          <label>Factor Tarima</label>  
                          <input type="number" min="0.00" step="0.01" name="m_cuadrados" id="m_cuadrados" class="form-control" value="'.$row["m_cuadrados"].'" /> 
                          
                      </div>
                            <div class="form-group">

                           <label class="input-group-text" for="inputGroupSelect01">Categorias</label>
                           <br />
                           <select class="form-control" name="id_categoria" id="id_categoria">
                          ';

                          

                          require_once "Categorias.php";

                          $miCategoria = new Categorias();
                         $cat = $miCategoria->selectALL();
                          foreach ((array)$cat as $col) {
                            if ($row['id_categoria']== $col['id_categoria']) {
                            echo "<option value='".$col['id_categoria']."' selected>".$col['nombre']."</option>";
                          }else{
                            echo "<option value='".$col['id_categoria']."'>".$col['nombre']."</option>";

                          }
                          } 

                    
                          echo '</select>
                        <br/>
                </div>';
              }
?>
                      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Materiales.php'" name="cancel" value="Cancelar" >
              </div>
            </form>