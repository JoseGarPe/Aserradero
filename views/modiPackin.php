<form role="form" action="../controllers/PackingControlador.php?accion=updatePC" method="POST">
              <div class="box-body">
<?php 
require_once "../class/PackingList.php";


         
							$codigo=$_POST["employee_id"];
					     $nave = new Packing();
                         $catego = $nave->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                     /*        $falla =$row["correlativo"];
                           $array_falla = str_split($falla);
                           $falla_count = strlen($falla);
                           $dia=$array_falla[0]."".$array_falla[1];
                           $mes=$array_falla[3]."".$array_falla[4];
                           $corre=$array_falla[6]."".$array_falla[7]."".$array_falla[8]."".$array_falla[9]."".$array_falla[10];
                          echo '  <div class="col-md-12">
                   <div class="row">
                      <div class="form-group col-sm-4 col-sm-2">
                        <label for="middle-name" class="control-label col-xs-8">Correlativo</label>
                        <div class="col-xs-3 col-sm-3">
                          <input id="dia"  type="number" min="1" max="31" value="'.$dia.'" step="1" name="dia">
                        </div>
                      </div>

                      <div class="form-group col-sm-4 col-sm-2">
                        <label for="middle-name" class="control-label col-xs-2">/</label>
                        <div class="col-xs-3">
                          <input id="mes"  type="number" name="mes" value="'.$mes.'" step="1" min="1" max="12">
                        </div>
                      </div>

                      <div class="form-group col-sm-4">
                        <label for="middle-name" class="control-label col-xs-2">/</label>
                        <div class="col-xs-3 col-sm-2">
                          <input id="correlativo"  type="number" step="1" min="0" max="3000" value="'.$corre.'" name="correlativo">
                        </div>
                      </div>

                   </div>
                </div>';
                           */                          
                         		echo '
                            <div class="row">
          <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correlativo</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input id="correlativo"  type="text" class="form-control" name="correlativo" value="'.$row['correlativo'].'">
                        </div>
                      </div>
            
          </div>
          <br><br>
          <div class="row">
          <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Poliza</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input id="poliza"  type="text" class="form-control" name="poliza" value="'.$row['poliza'].'">
                        </div>
                      </div>
                      <br><br>
          </div>
      
                          <input type="hidden" name="id" id="id" value="'.$row['id_packing_list'].'"/>            
                
                ';}

                         


 ?>
    <div class="form-group">
                        <div id="resultado"></div>
                      </div>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/IndexPackingList.php'" name="cancel" value="Cancelar" >
              </div>
            </form>
