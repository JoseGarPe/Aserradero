<form role="form" action="../controllers/TrasladoControlador.php?accion=confirmar" method="POST">
              <div class="box-body">
               <label>Detalle de Traslado</label>
<?php 
require_once "Bodega.php";

require_once "Traslado.php";


         
							$codigo=$_POST["employee_id"];
              $pl=$_POST["employee_pl"];
              $nombre_bodega=$_POST["employee_nombre"];
					     $detalle_traslado = new Traslado();
                         $catego = $detalle_traslado->selectOne($codigo);
                        
                           # code...
                         echo '
                          <div class="table-responsive">  
                   <table class="table table-bordered">
              ';
                         foreach ((array)$catego as $row) {
                         		echo '
                             
                       
                        <tr>
                        <td>Material</td>
                        <td>'.$row['nombre'].'</td>

                          <input type="hidden" name="id" id="id" value="'.$row['id_traslado'].'"/>
                          <input type="hidden" name="cantidad" id="cantidad" value="'.$row['cantidad'].'"/>
                          <input type="hidden" name="id_material" id="id_material" value="'.$row['id_material'].'"/>
                          <input type="hidden" name="pl" id="pl" value="'.$pl.'"/>    
                                                  
                        </tr>

                        <tr>
                        <td>Cantidad</td>
                        <td>'.$row['cantidad'].'</td>
                          </tr>
                      ';
                      $bodega_se = new Bodega();
                      $datBodega = $bodega_se->selectOne($row['bodega_origen']);
                      foreach ($datBodega as $field) {
                            
                        echo '
                        <tr>
                        <td>Bodega Origen</td>
                        <td>'.$field['nombre'].'</td>
                          </tr>';
                      }
        }

           
                          echo'
                        </table>

                                                  </div>
                          <label>¿Desea Confirmar Cantidad de Material?</label>

                          <input type="hidden" name="estado" id="estado" value="Confirmado"/> 

                          <input type="hidden" name="nombre_bodega" id="nombre_bodega" value="'.$nombre_bodega.'"/>       

                        
                
                ';              


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
              </div>
            </form>