<?php
require_once "Usuario.php";

							$codigo=$_POST["employee_id"];
					     $misCategorias = new Usuario();
                         $catego = $misCategorias->selectOne($codigo);
                        
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
                               <input type="hidden" name="id" id="id" value="'.$row['id_tipo_usuario'].'"/>  
                                                  
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>