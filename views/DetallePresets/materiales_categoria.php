<?php 
                         require_once "Materiales.php";

                             $codigo = $_POST['cod_banda'];
                         $misMateriales = new Materiales();
                         $catego = $misMateriales->selectALL_CA($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                          <tr>
                            <td> <input type="checkbox" name="id_material[]" value="'.$row["id_material"].'" /></td>
                           <td>'.$row['nombre'].'</td>
                           <td>'.$row['largo'].'x'.$row['ancho'].'x'.$row['grueso'].'</td>
                           <td> <input type="text" id="cantidad" name="cantidad[]" class="form-control col-xs-3 col-xs-8"></td>
                           
                          </tr>
                         ';
                       }
                     
                     
                         ?>