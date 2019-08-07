<form role="form" action="../controllers/PaquetesControlador.php?accion=etiqueta" method="post">
              <div class="box-body">
<?php 

require_once "Paquetes.php";


         
							$codigo=$_POST["employee_id"];
              $packing=$_POST["employee_packing"];
              $contenedor=$_POST["employee_contenedor"];
              $etiquetaCo=$_POST["employee_etiquetaCo"];
					     $nave = new Paquetes();
                         $catego = $nave->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '
                 <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="employee_id" name="employee_id">
                  <input type="hidden" class="form-control" readonly value="'.$packing.'" id="employee_packing" name="employee_packing">
                  <input type="hidden" class="form-control" readonly value="modificar" id="employee_flag" name="employee_flag">
                  <input type="hidden" class="form-control" readonly value="'.$contenedor.'" id="employee_contenedor" name="employee_contenedor">
                  <input type="hidden" class="form-control" readonly value="'.$etiquetaCo.'" id="employee_etiquetaCo" name="employee_etiquetaCo">
                </div>
                <div class="form-group">
                  <label for="codigo">Etiqueta</label>
                  <input type="text" class="form-control" value="'.$row["etiqueta"].'" id="employee_etiqueta" name="employee_etiqueta">
                </div>';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
              </div>
            </form>