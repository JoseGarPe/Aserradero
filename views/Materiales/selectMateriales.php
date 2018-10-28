<?php
require_once "Materiales.php";

							$codigo=$_POST["employee_id"];
					     $miMaterial = new Materiales();
                         $catego = $miMaterial->selectOneDet($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_material'].'</td>
                        </tr>
                        <tr>
                        <td>Dimensiones:</td>
                        <td>'.$row['nombre'].' </td>
                        </tr>
                        <tr>
                        <td>Dimensiones:</td>
                        <td>'.$row['largo'].' '.$row['ancho'].'</td>
                        </tr>
                        <tr>
                        	<td> Grosor: </td>
                           <td>'.$row['grueso'].'</td>
                        </tr>
                        <tr>
                          <td> Categoria: </td>
                           <td>'.$row['categoria'].'</td>
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>