<form role="form" action="../controllers//DetallePresetsControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "DetallePreset.php";


         
							$codigo=$_POST["employee_id"];
					     $misPresetss = new DetallePreset();
                         $catego = $misPresetss->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar el material '.$row['material'].' de este producto?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_detalle_preset'].'"/>  

                        
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/DetallePresets.php'" name="cancel" value="Cancelar" >
              </div>
            </form>