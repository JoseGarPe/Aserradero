<form role="form" action="../controllers/ContenedorControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "Contenedor.php";


         
							$codigo=$_POST["employee_id"];
              $Pack = new Contenedores();
                         $catego = $Pack->selectOne($codigo);
                        
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar el contenedor N° '.$row['etiqueta'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_contenedor'].'"/>            
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
              </div>
            </form>