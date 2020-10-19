<?php 
                         require_once "DetallePreset.php";
$tipo=$_GET['tipo'];
if($tipo=="material"){
                          $codigo = $_POST['cod_banda'];
                         $misCategoriass = new DetallePreset();
                         $catego = $misCategoriass->selectALLP($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                          <tr>
                           <td>'.$row['material'].'</td>
                           <td>'.$row['largo'].'x'.$row['ancho'].'x'.$row['grueso'].'</td>
                           <td>'.$row["cantidad"].'</td>
                           <td>
                          
                                     <input type="button" name="delete" value="Eliminar" id="'.$row["id_detalle_preset"].'" class="btn btn-danger delete_data" />
                           </td>
                          </tr>
                         ';
                       }
}else{

                          $codigo = $_POST['cod_banda'];
                         $misCategoriass = new DetallePreset();
                         $catego = $misCategoriass->selectALLInsumos($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                          <tr>
                           <td>'.$row['material'].'</td>
                           <td>'.$row['categoria'].'</td>
                           <td>'.$row["cantidad"].'</td>
                           <td>
                          
                                     <input type="button" name="delete" value="Eliminar" id="'.$row["id_detalle_preset_insumo"].'" class="btn btn-danger delete_data" />
                           </td>
                          </tr>
                         ';
                       }
}                           
                     
                     
                         ?>