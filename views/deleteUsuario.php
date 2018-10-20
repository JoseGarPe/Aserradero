<form role="form" action="../controllers/UsuarioControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "../class/Usuario.php";


         
							$codigo=$_POST["employee_id"];
					     $misUsuarios = new Usuario();
                         $catego = $misUsuarios->selectOne($codigo);
                        
                        
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar a'.$row['nombre'].' '.$row['apellido'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_usuarios'].'"/>  

                        
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Usuario.php'" name="cancel" value="Cancelar" >
              </div>
            </form>