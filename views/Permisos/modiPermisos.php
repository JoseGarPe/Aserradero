   <form role="form" action="../controller/PermisosControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "Permisos.php";


         
							$codigo=$_POST["employee_id"];
					     $misPermisoss = new Permisos();
                         $catego = $misPermisoss->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '
                 <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="id" name="id">
                </div>
                <div class="form-group">
                  <label for="codigo">Tipo Usuario</label>
                  <input type="text" class="form-control" value="'.$row["nombre"].'" readonly id="nombre" name="nombre">
                  <input type="hidden" name="id_tipo_usuario" id="id_tipo_usuario" value="'.$row['id_tipo_usuario'].'"/>  
                </div>
                  
                <div class="form-group">
                  <label for="nombre">Permisos</label>
                    <div class="table-responsive">  
                   <table class="table table-bordered">
                          <tr>
                            <td>Permisos</td>
                            <td></td>
                          <tr>
                          <tr>
                          <td>Usuarios</td>
                          ';
                          if (isset($row['campo_a']) && $row['campo_a']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_a" id="campo_a" checked value="Si"></td>
                            ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_a" id="campo_a" value="Si"></td>
                             ';
                          }

                           
                          echo'
                          </tr>
                          <tr>
                          <td>Tipo Usuarios</td>';
                           if (isset($row['campo_b']) && $row['campo_b']!=NULL) {
                            echo ' <td><input type="checkbox" name="campo_b" id="campo_b" checked value="Si"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_b" id="campo_b" value="Si"></td> 
                            ';
                          }

                          echo'
                          </tr>
                          <tr>   
                          <td>Permisos</td>
                          ';
                          if (isset($row['campo_c']) && $row['campo_c']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_c" id="campo_c" checked value="Si"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_c" id="campo_c" value="Si"></td> 
                             ';
                          }
                          echo'
                          
                          </tr>
                          <tr>
                          <td>Ingreso Por barco</td>';
                          if (isset($row['campo_d']) && $row['campo_d']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_d" id="campo_d" checked value="Si"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_d" id="campo_d" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Confirmar Contenedores</td>
                         ';  
                         if (isset($row['campo_e'])&& $row['campo_e']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_e" id="campo_e" checked value="Si"></td>
                           ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_e" id="campo_e" value="Si"></td> 
                             ';
                          }

                         echo'
                          </tr>
                              <tr>
                          <td>Detalle Bodega</td>';
                          if (isset($row['campo_f'])&& $row['campo_f']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_f" id="campo_f" checked value="Si"></td>
                             ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_f" id="campo_f" value="si"></td>
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Orden Procesar Material</td>';
                          if (isset($row['campo_g'])&& $row['campo_g']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_g" id="campo_g" checked value="Si"></td>
                           ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_g" id="campo_g" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                           <tr>
                          <td>Confirmar Material Procesado</td>';
                          if (isset($row['campo_h'])&& $row['campo_h']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_h" id="campo_h" checked value="Si"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_h" id="campo_h" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                           <tr>
                          <td>Definir Preset</td>';
                          if (isset($row['campo_i'])&& $row['campo_i']!=NULL) {
                            echo ' <td><input type="checkbox" name="campo_i" id="campo_i" checked value="Si"></td>
                           ';
                          }else
                          {
                            echo ' <td><input type="checkbox" name="campo_i" id="campo_i" value="Si"></td> 
                            ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Ordenar Producto</td>';
                          if (isset($row['campo_j'])&& $row['campo_j']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_j" id="campo_j" checked value="Si"></td>
                             ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_j" id="campo_j" value="Si"></td>
                             ';
                          }
                          echo'
                          </tr> <tr>
                          <td>Confirmar Producto</td>';
                          if (isset($row['campo_k'])&& $row['campo_k']!=NULL) {
                             echo '<td><input type="checkbox" name="campo_k" id="campo_k" checked value="Si"></td>
                             ';
                          }else
                          {
                             echo '<td><input type="checkbox" name="campo_k" id="campo_k" value="Si"></td>
                             ';
                          }
                          echo'</tr>
                            <tr>
                          <td>Seguimiento Orden</td>';
                          if (isset($row['campo_l'])&& $row['campo_l']!=NULL) {
                            echo ' <td><input type="checkbox" name="campo_l" id="campo_l" checked value="Si"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_l" id="campo_l" value="Si"></td> 
                            ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Calcular Materiales y Productos posibles</td>';
                          if (isset($row['campo_m'])&& $row['campo_m']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_m" id="campo_m" checked value="Si"></td>
                             ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_m" id="campo_m" value="Si"></td>
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Categorias</td>';
                          if (isset($row['campo_m'])&& $row['campo_m']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_m" id="campo_m" checked value="Si"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_m" id="campo_m" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Materiales</td>';
                          if (isset($row['campo_n'])&& $row['campo_n']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_n" id="campo_n" checked value="Si"></td>
                            ';
                          }else
                          {
                            echo '<td><input type="checkbox" name="campo_n" id="campo_n" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                            <tr>
                          <td>Bodegas</td>';
                          if (isset($row['campo_o'])&& $row['campo_o']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_o" id="campo_o" checked value="Si"></td>';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_o" id="campo_o" value="Si"></td> 
                             ';
                          }
                          echo'
                            <tr>
                          <td>Naves</td>';
                          if (isset($row['campo_p'])&& $row['campo_p']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_p" id="campo_p" checked value="Si"></td>';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_p" id="campo_p" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Shippers</td>';
                          if (isset($row['campo_r'])&& $row['campo_r']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_r" id="campo_r" checked value="Si"></td>';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_r" id="campo_r" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Especificaciones</td>';
                          if (isset($row['campo_s'])&& $row['campo_s']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_s" id="campo_s" checked value="Si"></td>';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_s" id="campo_s" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Maquinas</td>';
                          if (isset($row['campo_t'])&& $row['campo_t']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_t" id="campo_t" checked value="Si"></td>';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_t" id="campo_t" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                          <tr>
                          <td>Presets</td>';
                          if (isset($row['campo_u'])&& $row['campo_u']!=NULL) {
                            echo '<td><input type="checkbox" name="campo_u" id="campo_u" checked value="Si"></td>';
                          }else
                          {
                            echo '
                            <td><input type="checkbox" name="campo_u" id="campo_u" value="Si"></td> 
                             ';
                          }
                          echo'
                          </tr>
                          </table>
                          </div>
                          
                  
                </div>';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Permisos.php'" name="cancel" value="Cancelar" >
              </div>
            </form>