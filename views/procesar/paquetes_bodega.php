
                        <?php 
                         $codigo = $_POST['cod_banda'];
                         require_once "Paquetes.php";
                         $misPacks = new Paquetes();
                         $catego = $misPacks->selectPack_Bodega($codigo);
                                              
                         foreach ((array)$catego as $row) {
                         echo '
                          <tr>
                           <td>'.$row['nombre'].'</td>
                           
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['piezas'].'</td>
                           <td>'.$row['shipper'].'</td>
                           <td>'.$row['numero_factura'].'</td>
                           
                           
                          </tr>
                         ';
                       }
                     
                     
?>
                   

