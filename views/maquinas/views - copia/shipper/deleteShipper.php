<form role="form" action="../controllers/ShipperControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "Shipper.php";


         
							$codigo=$_POST["employee_id"];
					     $shipper = new Shipper();
                         $catego = $shipper->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar '.$row['nombre'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_shipper'].'"/>            
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Shipper.php'" name="cancel" value="Cancelar" >
              </div>
            </form>