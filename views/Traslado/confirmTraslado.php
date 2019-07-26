<form role="form" action="../controllers/TrasladoControlador.php?accion=confirmar" method="POST">
              <div class="box-body">
               <label>Detalle de Traslado</label>

<?php 
require_once "Bodega.php";
require_once "Materiales.php";

require_once "Traslado.php";


         
							$codigo=$_POST["employee_id"];
              $pl=$_POST["employee_pl"];
              $nombre_bodega=$_POST["employee_nombre"];
                $misMateriales = new Materiales();
					     $detalle_traslado = new Traslado();
                         $catego = $detalle_traslado->selectOne($codigo);
                 echo '
                <div class="table-responsive">  
                   <table class="table table-bordered">
              ';
                         foreach ((array)$catego as $row) {
                          $id_paquete=$row['id_paquete'];
                         		echo '
                             
                       
                        <tr>
                        <td>Material</td>
                        <td>'.$row['nombre'].'</td>

                          <input type="hidden" name="id" id="id" value="'.$row['id_traslado'].'"/>
                          <input type="hidden" name="cantidad" id="cantidad" value="'.$row['cantidad'].'"/>
                          <input type="hidden" name="id_material" id="id_material" value="'.$row['id_material'].'"/>
                          <input type="hidden" name="id_paquete" id="id_paquete" value="'.$row['id_paquete'].'"/>
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
                          <h2>Datos Paquete </h2>
                        </div>';
                          echo'       <table class="table table-striped table-bordered">';
                      
                      $paquetee = $misMateriales->selectOnePaquete($id_paquete);
                      foreach ($paquetee as $datoP) {
                        echo '<tr>
                          <td>Id</td><td>'.$datoP['id_paquete'].'</td>
                        </tr>
                        <tr>
                        <td>Etiqueta</td><td>'.$datoP['etiqueta'].'</td>
                        </tr>
                        <tr>
                        <td>Dimensiones</td><td>'.$datoP['grueso'].' x '.$datoP['ancho'].' x '.$datoP['largo'].'</td>
                        </tr>
                        <tr>
                        <td>Piezas</td><td>'.$datoP['piezas'].'</td>
                        </tr>
                        <tr>
                        <td>M<sup>3</sup></td><td>'.$datoP['metros_cubicos'].'</td>
                        </tr>

                        ';
                      }

                       
             echo'       </table>
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