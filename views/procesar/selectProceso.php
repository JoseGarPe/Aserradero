<?php
                          require_once "DetalleProcesado.php";
                          require_once "Materiales.php";
                           require_once "Bodega.php";
                           require_once "Maquinas.php";

							$codigo=$_POST["employee_id"];
					     $misprocesado = new DetalleProcesado();
                         $catego = $misprocesado->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_detalle_procesado'].'</td>
                        </tr>
                        <tr>
                        <td>Nombre:</td>';
                        $misMateriales = new Materiales();
                        $material1 = $misMateriales->selectOne($row['id_material_saliente']);
                           foreach ($material1 as $key1) {
                             echo ' <td>'.$key1['nombre']. '</td>';
                           }
                        echo'</tr>
                        <tr>
                        	<td> Cantidad: </td>
                           <td>'.$row['cantidad_saliente'].'</td>
                        </tr>
                        <tr>
                          <td> Componente: </td>';
                        $material = $misMateriales->selectOne($row['id_materia_prima']);
                           foreach ($material as $key) {
                             echo ' <td>'.$key['nombre']. '</td>';
                           }
                       echo' </tr>
                        <tr>
                          <td>Maquina Asignada: </td>';
                        $misMaquinas = new Maquina();
                         $maquina = $misMaquinas->selectOne($row['id_maquina']);
                           foreach ($maquina as $ke2) {
                             echo ' <td>'.$ke2['nombre']. '</td>';
                           }
                       echo' </tr>

                        <tr>
                          <td>Bodega asignada: </td>';
                           $misBodegas = new Bodega();
                         $bodga = $misBodegas->selectOne($row['id_bodega']);
                          foreach ($bodga as $value) {
                             echo ' <td>'.$value['nombre']. '</td>';
                           }
                       echo ' </tr>
                        <tr>
                          <td> Estado</td>
                           <td>'.$row['estado'].'</td>
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>