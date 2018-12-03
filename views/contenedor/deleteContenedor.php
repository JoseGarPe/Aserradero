<form role="form" action="../controllers/ContenedorControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "Contenedor.php";


         
							$codigo=$_POST["employee_id"];
					     $nave = new Contenedores();
                         $catego = $nave->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar el contenedor con etiqueta:'.$row['etiqueta'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_contenedor'].'"/>            
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/contenedores.php" name="cancel" value="Cancelar" >
              </div>
            </form>