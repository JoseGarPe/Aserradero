<form role="form" action="../controllers/MovimientosControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "Movimiento.php";
  $codigo=$_POST["employee_id"];
               $miMaterial = new Movimiento();
                         $catego = $miMaterial->selectOne($codigo);
                        
                        
                         
                         foreach ((array)$catego as $row) {
                            echo '

                            <label>¿Desea eliminar el ingreso #'.$row['id_movimiento'].' con cantidad '.$row['cantidad'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_movimiento'].'"/>  

                        
                
                ';}
?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Movimientos.php'" name="cancel" value="Cancelar" >
              </div>
            </form>