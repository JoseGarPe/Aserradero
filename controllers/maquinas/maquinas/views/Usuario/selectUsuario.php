<?php
require_once "Usuario.php";

							$codigo=$_POST["employee_id"];
					     $misCategorias = new Usuario();
                         $catego = $misCategorias->selectOneDet($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_usuarios'].'</td>
                        </tr>
                        <tr>
                        <td>Nombre:</td>
                        <td>'.$row['nombre'].' '.$row['apellido'].'</td>
                        </tr>
                        <tr>
                        	<td> Tipo Usuaro: </td>
                           <td>'.$row['tipo'].'</td>
                        </tr>
                        <tr>
                          <td> Telefono: </td>
                           <td>'.$row['telefono'].'</td>
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>