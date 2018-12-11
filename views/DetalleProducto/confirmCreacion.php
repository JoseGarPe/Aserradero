<form role="form" action="../controllers/OrdenProductoControlador.php?accion=confirmar" method="POST">
              <div class="box-body">
               <label>Detalle de contenedor</label>
<?php 
require_once "DetalleOrden.php";
require_once "Bodega.php";


         
							$codigo=$_POST["employee_id"];
              $pl=$_POST["employee_pl"];
              $nombre_preset=$_POST["employee_name"];
              $cantidad_prod=$_POST["employee_cantidad"];
					     $detalle_orden = new DetalleOrden();
                         $catego = $detalle_orden->selectDetalle_Orden($codigo);
                        
                           # code...
                         echo '
                          <div class="table-responsive">  
                   <table class="table table-bordered">
                   <tr colspan="3">
                   <td><label>Producto fabricado: '.$nombre_preset.'</label></td>
                   <td></td>
                   <td><label>Cantidad: '.$cantidad_prod.'</label></td>
                   </tr>
                   <tr colspan="3">
                   <td>Detalle de Materiales Utilizados:</td>
                   <td></td>
                    <td></td>
                   </tr>

                        <tr colspan="3">
                        <td>Material:</td>

                        <td>Dimensiones:</td>
                        <td>Cantidad Utilizado:</td>

                        </tr>
                       
                         
                         ';
                         foreach ((array)$catego as $row) {
                         		echo '
                             
                       
                        <tr>
                        <td>'.$row['nombre'].'</td>
                           <td>'.$row['largo'].' x '.$row['ancho'].' x '.$row['grueso'].'</td>
                           <td>'.$row["cantidad_utilizado"].'</td>

                          <input type="hidden" name="id" id="id" value="'.$row['id_orden_producto'].'"/>
                          <input type="hidden" name="pl" id="pl" value="'.$pl.'"/>    
                                                  
                        </tr>
                      ';
        }

           
                          echo'
                        </table>

                                                  </div>
                          <label>¿Desea Confirmar Lote de Producto?</label>

                          <input type="hidden" name="estado" id="estado" value="Confirmado"/> 

                          <input type="hidden" name="fase" id="fase" value="Ensamblado"/>  
                          <input type="hidden" name="preset" id="presete" value="'.$nombre_preset.'"/>       

                        
                
                ';              


 ?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/confirmarOrden.php'" name="cancel" value="Cancelar" >
              </div>
            </form>