<form role="form" action="../controllers/PackingControlador.php?accion=observacion" method="POST">
              <div class="box-body">
<?php 
require_once "../class/PackingList.php";


         
							$codigo=$_POST["employee_id"];
              $Pack = new Packing();
                         $catego = $Pack->selectOne($codigo);
                      if (isset($_POST['employee_bandera'])) {
                        echo '<input type="hidden" name="bandera" value="'.$_POST['employee_bandera'].'">'; 
                      }
                         
                         foreach ((array)$catego as $row) {
                         		echo '
                            <label>Observaciones factura: '.$row['numero_factura'].'</label>
                            <br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Observacion<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <textarea class="form-control col-md-7 col-xs-12" name="observacion">'.$row['obervaciones'].'</textarea>
                         
                        </div>
                      </div> 
                            <br>
                            
                          <input type="hidden" name="id" id="id" value="'.$row['id_packing_list'].'"/>            
                
                ';}

  ?>
  <br>
  <br>
   <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Observacion<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea  id="observacion" name="observacion"  class="form-control col-md-7 col-xs-12"></textarea>
                         
                        </div>
                      </div> -->
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-success" name="submit" value="Guardarr" >
              </div>
            </form>