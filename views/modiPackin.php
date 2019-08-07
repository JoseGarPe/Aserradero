<form role="form" action="../controllers/PackingControlador.php?accion=updatePC" method="POST">
              <div class="box-body">
<?php 
require_once "../class/PackingList.php";


         
							$codigo=$_POST["employee_id"];
					     $nave = new Packing();
                         $catego = $nave->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                           $co =$row["correlativo"];
                           if ($co==NULL) {
                             $falla='00-00';
                           }else{
                            $falla = $co;
                           }
                           $array_falla = str_split($falla);
                           $falla_count = strlen($falla);
                           $corre1=$array_falla[0]."".$array_falla[1];

                           
                           $anio=$array_falla[3]."".$array_falla[4];
                      echo '  <div class="col-md-12">
                   <div class="row">
                      <div class="form-group ">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correlativo</label>
                        <div class="col-md-4 col-sm-6 col-xs-10">
                          <input id="correlativo"  type="number" min="1" max="999" value="'.$corre1.'" step="1" name="correlativo">
                          -
                          <input id="year"  type="number" name="year" value="'.$anio.'" step="1" min="1" max="99">
                        </div>
                      </div>

                     
                     </div>
                </div>';
                                                  
                         		echo '
                            <div class="row">
          <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                        <!--  <input id="correlativo"  type="text" class="form-control" name="correlativo" value="'.$row['correlativo'].'">-->
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
