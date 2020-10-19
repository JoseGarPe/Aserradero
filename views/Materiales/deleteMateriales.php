<form role="form" action="../controllers/MaterialesControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "Materiales.php";


         
							$codigo=$_POST["employee_id"];
					     $miMaterial = new Materiales();
                         $catego = $miMaterial->selectOne($codigo);
                        
                        
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar el material '.$row['nombre'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_material'].'"/>  
                          <input type="hidden" name="id_categoria" id="id_categoria" value="'.$row['id_categoria'].'"/>  

                        
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Materiales.php'" name="cancel" value="Cancelar" >
              </div>
            </form>