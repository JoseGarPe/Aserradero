 <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad Disponible <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<?php 
                             $codigo = $_POST['cod_banda'];
                             $bodega = $_POST['bod'];
                                             require_once "DetalleBodega.php";
                                                 $material = new DetalleBodega();
                                  $catego3 = $material->selectC_MP($codigo,$bodega);
                          foreach ((array)$catego3 as $rw) {
                          	echo '<input id="c_disponible" name="c_disponible" readonly class=" form-control col-md-7 col-xs-12"  type="number" value="'.$rw['cantidad'].'">';

                          }                 

                              ?>
                             
                            </div>

                            
