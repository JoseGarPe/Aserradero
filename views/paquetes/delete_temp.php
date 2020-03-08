<form role="form" action="../controllers/PaquetesControlador.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "Paquetes.php";


         
							$codigo=$_POST["employee_id"];
              $packing=$_POST["employee_packing"];
              $contenedor=$_POST["employee_contenedor"];
              $etiquetaCo=$_POST["employee_etiquetaCo"];
					     $nave = new Paquetes();
                         $catego = $nave->selectOneTemp($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <label>¿Desea eliminar  la orden de paquetes '.$row['id_paquete'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_paquete'].'"/>  
                  <input type="hidden" class="form-control" readonly value="'.$packing.'" id="employee_packing" name="employee_packing">
                  <input type="hidden" class="form-control" readonly value="'.$contenedor.'" id="employee_contenedor" name="employee_contenedor">
                  <input type="hidden" class="form-control" readonly value="'.$etiquetaCo.'" id="employee_etiquetaCo" name="employee_etiquetaCo">          
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Paquetes.php'" name="cancel" value="Cancelar" >
              </div>
            </form>