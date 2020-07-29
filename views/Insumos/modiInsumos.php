<form role="form" action="../controllers/InsumosControlador.php?accion=modificar" method="post">
              <div class="box-body">

  <?php 
require_once "Insumo.php";

              $codigo=$_POST["employee_id"];
               $miMaterial = new Insumo();
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
                          <input type="text" name="nombre_insumo" _insumoid="nombre" class="form-control" value="'.$row["nombre_insumo"].'" />  
                           </div>

                            <div class="form-group">

                           <label class="input-group-text" for="inputGroupSelect01">Tipo Insumo</label>
                           <br />
                           <select class="form-control" name="id_tipo_insumo" id="id_tipo_insumo">
                          ';
                           require_once "Tipo_Insumo.php";
                          $miCategoria = new Tipo_insumo();
                         $cat = $miCategoria->selectALL();
                          foreach ((array)$cat as $col) {
                            if ($row['id_tipo_insumo']== $col['id_tipo_insumo']) {
                            echo "<option value='".$col['id_tipo_insumo']."' selected>".$col['nombre_insumo']."</option>";
                          }else{
                            echo "<option value='".$col['id_tipo_insumo']."'>".$col['nombre_insumo']."</option>";

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