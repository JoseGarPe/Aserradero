<form role="form" action="../controllers/TipoUsuarioControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "../class/TipoUsuario.php";


         
							$codigo=$_POST["employee_id"];
					     $misTipoUsuarios = new TipoUsuario();
                         $catego = $misTipoUsuarios->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar '.$row['nombre'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_tipo_usuario'].'"/>  

                        
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/TipoUsuario.php'" name="cancel" value="Cancelar" >
              </div>
            </form>