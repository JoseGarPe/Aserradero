<form role="form" action="../controllers/DeatalleProcesadoControlador.php?accion=confirmar" method="POST">
              <div class="box-body">
               <label>Detalle de contenedor</label>
<?php 
require_once "DetalleProcesado.php";
require_once "Materiales.php";
require_once "Bodega.php";


         
							$codigo=$_POST["employee_id"];
              $pl=$_POST["employee_pl"];

              $n=$_POST["employee_n"];
					     $detalleProcesado = new DetalleProcesado();
                         $catego = $detalleProcesado->selectOne($codigo);
                        
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
                        <td>Material:</td>';
                         $material = new Materiales();
                         $mate= $material->selectOne($row['id_material_saliente']);
                          foreach ($mate as $key) {
                            echo '<td>'.$key['nombre'].'</td>
                          </tr>
                          <tr>
                          <td>Dimensiones:</td>

                          <td>'.$key['largo'].' x '.$key['grueso'].' x '.$key['ancho'].'</td>
                              ';
                          }
                        echo'
                        </tr>
                        <tr>
                          <input type="hidden" name="id" id="id" value="'.$row['id_detalle_procesado'].'"/>
                          <input type="hidden" name="pl" id="pl" value="'.$pl.'"/>    
                          <input type="hidden" name="nombre" id="nombre" value="'.$n.'"/>    
                                                  
                        </tr>
                        <tr>
                          <td>Numero de Piezas</td>
                           <td>'.$row['cantidad_saliente'].'</td>
                           <input type="hidden" name="piezas" id="piezas" value="'.$row['cantidad_saliente'].'"/>
                           <input type="hidden" name="material" id="material" value="'.$row['id_material_saliente'].'"/>
                        </tr>


                          </table>

                          </div>';

                              $mistipos1 = new Bodega();
                              $catego1 = $mistipos1->selectOne($row['id_bodega']);
                          foreach ((array)$catego1 as $kiy) {
                            echo'  <label>Bodega destino: '.$kiy['nombre'].'</label>';
                              }

                          echo'

                          <label>¿Desea Confirmar Material?</label>
                          <input type="hidden" name="id_bodega" id="id_bodega" value="'.$row['id_bodega'].'"/>

                          <input type="hidden" name="estado" id="estado" value="Confirmado"/>    

                        
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/DetalleMaterialProcesado.php'" name="cancel" value="Cancelar" >
              </div>
            </form>