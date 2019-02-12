<?php
require_once "Paquetes.php";

							$codigo=$_POST["employee_id"];
					     $misCategorias = new Paquetes();
                         $catego = $misCategorias->selectALLpack2($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_paquete'].'</td>
                        </tr>
                        <tr>
                        <td>Material:</td>
                        <td>'.$row['material'].'</td>
                        </tr>
                        <tr>
                        	<td> Etiqueta: </td>
                           <td>'.$row['etiqueta'].'</td>
                        </tr>
                        <tr>
                          <td> Orden de Ingreso: </td>
                           <td>'.$row['id_packing_list'].'</td>
                        </tr>
                        <tr>
                          <td> Piezas: </td>
                           <td>'.$row['piezas'].'</td>
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>