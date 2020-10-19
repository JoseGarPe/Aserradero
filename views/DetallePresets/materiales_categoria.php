<?php 
                         require_once "Materiales.php";
$tipo=$_GET['tipo'];
if($tipo=='materiales'){
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

}else{
   $codigo = $_POST['cod_banda'];
                         $misMateriales = new Materiales();
                         $catego = $misMateriales->selectALL_IN($codigo);
                         $total_materiales=0;
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                          <tr>
                            <td> '.$row["id_insumo"].'
                                  <input type="hidden" id="idinsumo" name="idinsumo[]" value="'.$row['id_insumo'].'" class="form-control col-xs-3 col-xs-8"></td>
                           <td>'.$row['nombre_insumo'].'</td>
                           <td> <input type="text" id="cantidad_insumo" name="cantidad_insumo[]" class="form-control col-xs-3 col-xs-8"></td>
                          
                          </tr>
                         ';
                         $total_materiales = $total_materiales +1;
                         }
                        echo' <input type="hidden" id="total_insumo" name="total_insumo" value="'.$total_materiales.'" class="form-control col-xs-3 col-xs-8">';
}
                          
                     
                         ?>