<?php
require_once "Permisos.php";

							$codigo=$_POST["employee_id"];
					     $misCategorias = new Permisos();
                         $catego = $misCategorias->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_permiso'].'</td>
                        </tr>
                        <tr>
                        <td>Tipo Usuario:</td>
                        <td>'.$row['nombre'].'</td>
                        </tr>
                        <tr>
                        <td>Permisos</td>
                        <td></td>
                        </tr>
                        ';

                        if (($row['campo_a'])!=NULL) {
                          echo '<tr><td>Usuarios</td><td>Si</td></tr>';
                        }
                        if (($row['campo_b'])!=NULL) {
                          echo '<tr><td>Tipo Usuarios</td><td>Si</td></tr>';
                        }
                        if (($row['campo_c'])!=NULL) {
                          echo '<tr><td>Permisos</td><td>Si</td></tr>';
                        }
                        if (($row['campo_d'])!=NULL) {
                          echo '<tr><td>Ingresos por barco</td><td>Si</td></tr>';
                        }
                        if (($row['campo_e'])!=NULL) {
                          echo '<tr><td>Confirmar Contenedores</td><td>Si</td></tr>';
                        }
                        if (($row['campo_f'])!=NULL) {
                          echo '<tr><td>Detalle Bodegas</td><td>Si</td></tr>';
                        }
                        if (($row['campo_g'])!=NULL) {
                          echo '<tr><td>Procesar Material</td><td>Si</td></tr>';
                        }
                        if (($row['campo_h'])!=NULL) {
                          echo '<tr><td>Confirmar Material Procesado</td><td>Si</td></tr>';
                        }
                        if (($row['campo_i'])!=NULL) {
                          echo '<tr><td>Definir Preset</td><td>Si</td></tr>';
                        }
                        if (($row['campo_j'])!=NULL) {
                          echo '<tr><td>Ordenar Producto</td><td>Si</td></tr>';
                        }
                        if (($row['campo_k'])!=NULL) {
                          echo '<tr><td>Confirmar Producto</td><td>Si</td></tr>';
                        }
                        if (($row['campo_l'])!=NULL) {
                          echo '<tr><td>Seguimiento Orden/td><td>Si</td></tr>';
                        }
                        if ($row['campo_m']!=NULL) {
                          echo '<tr><td>Calcular Producto</td><td>Si</td></tr>';
                        }
                        if (($row['campo_n'])!=NULL) {
                          echo '<tr><td>Categorias</td><td>Si</td></tr>';
                        }
                        if (($row['campo_o'])!=NULL) {
                          echo '<tr><td>Materiales</td><td>Si</td></tr>';
                        }
                        if (($row['campo_p'])!=NULL) {
                          echo '<tr><td>Bodega</td><td>Si</td></tr>';
                        }
                        if (($row['campo_q'])!=NULL) {
                          echo '<tr><td>Naves</td><td>Si</td></tr>';
                        }
                        if (($row['campo_r'])!=NULL) {
                          echo '<tr><td>Shipper</td><td>Si</td></tr>';
                        }
                        if (($row['campo_s'])!=NULL) {
                          echo '<tr><td>Especificacion</td><td>Si</td></tr>';
                        }
                        if (($row['campo_t'])!=NULL) {
                          echo '<tr><td>Maquinas</td><td>Si</td></tr>';
                        }
                        if (($row['campo_u'])!=NULL) {
                          echo '<tr><td>Presets</td><td>Si</td></tr>';
                        }

                        if (($row['campo_v'])!=NULL) {
                          echo '<tr><td>Ver Reporte de Ordenes</td><td>Si</td></tr>';
                        }
                        echo '
                        
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>