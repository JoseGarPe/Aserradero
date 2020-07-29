<form role="form" action="../controllers/InsumosControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "Insumo.php";
	$codigo=$_POST["employee_id"];
					     $miMaterial = new Insumo();
                         $catego = $miMaterial->selectOne($codigo);
                        
                        
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar el material '.$row['nombre_insumo'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_insumo'].'"/>  

                        
                
                ';}
?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Insumos.php'" name="cancel" value="Cancelar" >
              </div>
            </form>