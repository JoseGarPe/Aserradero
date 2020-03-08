<form role="form" action="../controllers/PaquetesControlador.php?accion=eliminarlocal" method="POST">
              <div class="box-body">
<?php 
require_once "Paquetes.php";


         
							$codigo=$_POST["employee_id"];
              $packing=$_POST["employee_packing"];
              $inab=$_POST["inab"];
              $factura=$_POST["factura"];
					     $nave = new Paquetes();
                         $catego = $nave->selectOneTemp($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar  la orden de paquetes '.$row['id_paquete'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_paquete'].'"/>  
                  <input type="hidden" class="form-control" readonly value="'.$packing.'" id="employee_packing" name="employee_packing">
                  <input type="hidden" class="form-control" readonly value="'.$inab.'" id="inab" name="inab">
                  <input type="hidden" class="form-control" readonly value="'.$factura.'" id="factura" name="factura">          
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Paquetes.php'" name="cancel" value="Cancelar" >
              </div>
            </form>