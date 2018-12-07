<?php 
                         require_once "DetalleBodega.php";

                             $codigo = $_POST['cod_banda'];
                             session_start();
                             $material = $_SESSION['id_material'];
                         $misCategoriass = new DetalleBodega();
                         $catego = $misCategoriass->selectMaterial_bodega($codigo,$material);
                        
                         
                         foreach ((array)$catego as $row) {
                         echo '

                           <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Cantidad Disponible <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="c_disponible" readonly name="c_disponible" class="form-control col-md-7 col-xs-12" value="'.$row["cantidad"].'">
                                    </div>


                          
                         ';
                       }
                     
                     
                         ?>