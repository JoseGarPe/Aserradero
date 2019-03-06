<form role="form" action="../controllers/PackingControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "../class/PackingList.php";


         
							$codigo=$_POST["employee_id"];
              $Pack = new Packing();
                         $catego = $Pack->selectOne($codigo);
                        
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar la orden numero '.$row['id_packing_list'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_packing_list'].'"/>            
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
              </div>
            </form>