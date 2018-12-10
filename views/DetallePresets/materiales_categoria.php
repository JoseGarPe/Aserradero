<?php 
                         require_once "Materiales.php";

                             $codigo = $_POST['cod_banda'];
                         $misMateriales = new Materiales();
                         $catego = $misMateriales->selectALL_CA($codigo);
                         $total_materiales=0;
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                          <tr>
                            <td> '.$row["id_material"].'
                                  <input type="hidden" id="idmaterial" name="idmaterial[]" value="'.$row['id_material'].'" class="form-control col-xs-3 col-xs-8"></td>
                           <td>'.$row['nombre'].'</td>
                           <td>'.$row['largo'].'x'.$row['ancho'].'x'.$row['grueso'].'</td>
                           <td> <input type="text" id="cantidad" name="cantidad[]" class="form-control col-xs-3 col-xs-8"></td>
                          
                          </tr>
                         ';
                         $total_materiales = $total_materiales +1;
                         }
                        echo' <input type="hidden" id="total" name="total" value="'.$total_materiales.'" class="form-control col-xs-3 col-xs-8">';
                     
                         ?>