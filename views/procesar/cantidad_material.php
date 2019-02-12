 <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad Disponible <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<?php 
                             $codigo = $_POST['cod_banda'];
                                             require_once "DetalleBodega.php";
                                                 $material = new DetalleBodega();
                                  $catego = $material->selectC_MP($codigo);
                          foreach ((array)$catego as $rw) {
                          	echo '<input id="c_disponible" name="c_disponible" readonly class=" form-control col-md-7 col-xs-12"  type="number" value="'.$rw['cantidad'].'">';

                          }                 

                              ?>
                             
                            </div>

                            
