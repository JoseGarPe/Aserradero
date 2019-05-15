<?php 
$codigo = $_POST['cod_banda'];
                                             require_once "Contenedor.php";
                                                 $material = new Contenedores();
                                  $catego1 = $material->selectOne($codigo);
                                  foreach ($catego1 as $key1) {
                                  	$bodegaPaquete=$key1['id_bodega'];
                                  }

                                  $bodega = $material->selectBodega($bodegaPaquete);
                                  foreach ($bodega as $value) {
                                  	$nombreBodega=$value['nombre'];
                                  }
                                  echo '<label>'.$nombreBodega.'</label>
                                  	<input type="hidden" id="id_bodega" name="id_bodega" value="'.$bodegaPaquete.'">
                                  ';
                               /* <select class="form-control" name="id_bodega" id="id_bodega">
                          <option>Seleccione una opcion</option>
                          <?php 
                        //  require_once "../class/Bodega.php";

                     //   $mistipos = new Bodega();
                    //     $catego = $mistipos->selectALL();
                     //     foreach ((array)$catego as $rows1) {

                          //  echo "<option value='".$rows1['id_bodega']."'>".$rows1['nombre']."</option>";

                          } 

                    
                          ?>
                          </select>*/

 ?>
 