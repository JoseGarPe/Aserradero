<form role="form" action="../controllers/CategoriasControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "Categorias.php";


         
							$codigo=$_POST["employee_id"];
					     $misCategoriass = new Categorias();
                         $catego = $misCategoriass->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar '.$row['nombre'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_categoria'].'"/>  

                        
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Categorias.php'" name="cancel" value="Cancelar" >
              </div>
            </form>