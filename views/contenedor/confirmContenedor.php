<form role="form" action="../controllers/ContenedorControlador.php?accion=confirmar" method="POST">
              <div class="box-body">
               <label>Detalle de contenedor</label>
<?php 
require_once "Contenedor.php";
require_once "Materiales.php";
require_once "Bodega.php";


         
							$codigo=$_POST["employee_id"];
              $pl=$_POST["employee_pl"];
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
                         $mate= $material->selectOne($row['id_material']);
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
                           <td>'.$row["etiqueta"].'</td>

                          <input type="hidden" name="id" id="id" value="'.$row['id_contenedor'].'"/>
                          <input type="hidden" name="pl" id="pl" value="'.$pl.'"/>    
                                                  
                        </tr>
                        <tr>
                          <td>Numero de Piezas</td>
                           <td>'.$row['piezas'].'</td>
                           <input type="hidden" name="piezas" id="piezas" value="'.$row['piezas'].'"/>
                           <input type="hidden" name="material" id="material" value="'.$row['id_material'].'"/>
                        </tr>
                        <tr>
                          <td>Numero de Paquetes</td>
                           <td>'.$row['n_paquetes'].'</td>
                        </tr>
                        <tr>
                          <td>m <sup>3</sup></td>
                           <td>'.$row['m_cuadrados'].'m <sup>3</sup></td>
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
                          <input type="hidden" name="id_bodega" id="id_bodega" value="'.$row['bodega_pendiente'].'"/>

                          <input type="hidden" name="estado" id="estado" value="Confirmado"/>    

                        
                
                ';}

                         


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Naves.php'" name="cancel" value="Cancelar" >
              </div>
            </form>