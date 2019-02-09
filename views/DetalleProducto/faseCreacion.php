<form role="form" action="../controllers/OrdenProductoControlador.php?accion=fase" method="POST">
              <div class="box-body">
               <label>Detalle de contenedor</label>
<?php 
require_once "OrdenProducto.php";
require_once "Bodega.php";


         
							$codigo=$_POST["employee_id"];
              $pl=$_POST["employee_pl"];
              $nombre_preset=$_POST["employee_name"];
              $cantidad_prod=$_POST["employee_cantidad"];
					     $detalle_orden = new OrdenProducto();
                         $catego = $detalle_orden->selectOne($codigo);
                        
                           # code...
                         echo '
                          <div class="table-responsive">  
                   <table class="table table-striped">
                   <tr colspan="3">
                   <td><label>Producto fabricado: '.$nombre_preset.'</label></td>
                   
                   <td><label>Cantidad: '.$cantidad_prod.'</label></td>
                   </tr>
                   <tr colspan="3">
                   <td>La orden se encuentra:</td>
                   <td></td>
                   </tr> 
                   <tr>
                   <td><select id="fase" name="fase" class="form-control">

                         ';
                         foreach ((array)$catego as $row) {
                          $bodega = $row['id_bodega'];
                          $cantidad = $row['cantidad'];

                          if ($row['fase']=="Ensamblado") {

                            echo '
                          <option value="Ensamblado" selected>Ensamblado</option>
                          <option value="Pintado">Pintado</option>
                          <option value="Enbalado">Enbalado</option>
                          <option value="Finalizado">Finalizado</option>';
                          }elseif ($row['fase']=="Pintado") {
                            echo '
                          <option value="Ensamblado">Ensamblado</option>
                          <option value="Pintado" selected>Pintado</option>
                          <option value="Enbalado">Enbalado</option>
                          <option value="Finalizado">Finalizado</option>';
                          
                           }elseif ($row['fase']=="Enbalado") {
                            echo '
                          <option value="Ensamblado">Ensamblado</option>
                          <option value="Pintado">Pintado</option>
                          <option value="Enbalado" selected>Enbalado</option>
                          <option value="Finalizado">Finalizado</option>';
                          
                           }elseif ($row['fase']=="Finalizado") {
                            echo '
                          <option value="Ensamblado">Ensamblado</option>
                          <option value="Pintado">Pintado</option>
                          <option value="Enbalado">Enbalado</option>
                          <option value="Finalizado" selected>Finalizado</option>';
                          
                           }
                          }
           
                          echo'
                  </select></td>
                  <td></td>
                  </tr>
                        </table>

                                                  </div>
                          <label>¿Desea Confirmar Lote de Producto?</label>

                          <input type="hidden" name="estado" id="estado" value="Confirmado"/> 

                          <input type="hidden" name="preset" id="presete" value="'.$nombre_preset.'"/>
                          <input type="hidden" name="pl" id="pl" value="'.$pl.'"/>  
                          <input type="hidden" name="id" id="id" value="'.$codigo.'"/> 
                          <input type="hidden" name="id_bodega" id="id_bodega" value="'.$bodega.'"/> 
                          <input type="hidden" name="cantidad" id="cantidad" value="'.$cantidad.'"/>        

                        
                
                ';              


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/confirmarOrden.php'" name="cancel" value="Cancelar" >
              </div>
            </form>