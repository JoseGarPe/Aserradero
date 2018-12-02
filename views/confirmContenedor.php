<form role="form" action="../controllers/ContenedorControlador.php?accion=confirmar" method="POST">
              <div class="box-body">
               <label>Detalle de contenedor</label>
<?php 
require_once "../class/Contenedor.php";
require_once "../class/Materiales.php";
require_once "../class/Bodega.php";


         
							$codigo=$_POST["employee_id"];
					     $contenedor = new Contenedores();
                         $catego = $contenedor->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '
                              <div class="table-responsive">  
                   <table class="table table-bordered">
                        <tr>
                          <td> N°</td>
                           <td>'.$row['id_contenedor'].'</td>
                        </tr>
                        <tr>
                        <td>Material:</td>';
                         $material = new Materiales();
                         $mate= $material->selectOne($$row['id_material']);
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
                          <td> Etiqueta: </td>
                           <td>'.$row["Etiqueta"].'</td>

                          <input type="hidden" name="id" id="id" value="'.$row['id_contenedor'].'"/>  
                                                  
                        </tr>
                        <tr>
                          <td>Numero de Piezas</td>
                           <td>'.$row['piezas'].'</td>
                        </tr>
                        <tr>
                          <td>Numero de Paquetes</td>
                           <td>'.$row['n_paquetes'].'</td>
                        </tr>
                        <tr>
                          <td>m <sup>3</sup></td>
                           <td>'.$row['m_cuadrados'].'</td>
                        </tr>
                        <tr>
                          <td>Numero de Tarimas</td>
                           <td>'.$row['tarimas'].'</td>
                        </tr>


                          </table>

                          </div>';

                              $mistipos1 = new Bodega();
                              $catego1 = $mistipos1->selectOne($row['bodega_pendiente']);
                          foreach ((array)$catego1 as $kiy) {
                            echo'  <label>Bodega destino: '.$kiy['nombre'].'</label>';
                              }

                          echo'

                          <label>¿Desea Confirmar Contenedor?</label>
                          <input type="hidden" name="id_bodega" id="id_bodega" value="'.$row['id_bodega'].'"/>

                          <input type="hidden" name="estado" id="estado" value="Confirmado"/>    

                        
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Naves.php'" name="cancel" value="Cancelar" >
              </div>
            </form>