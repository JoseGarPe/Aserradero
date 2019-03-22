<form role="form" action="../controllers/PackingControlador.php?accion=Cerrar" method="POST">
              <div class="box-body">
<?php 
require_once "../class/PackingList.php";
require_once "../class/Contenedor.php";


         
							$codigo=$_POST["employee_id"];
					     $conte = new Contenedores();
               $listo = $conte->selectALLpack3($codigo);
               foreach ($listo as $key) {
                 $posee = $key['posee'];
               }
               if ($posee != 0 ) {
                 echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">ERROR:</span>
              No es posible finalizar este proceso, pues posee contenedores sin confirmar de esta orden.
           </diV>

              </div>
              <div class="box-footer">
                
               
              </div>
            </form>  
           ';
               }else{
                $packin = new Packing();

                         $catego = $packin->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                            echo '

                            <label>¿Desea Finalizar esta orden por barco '.$row['numero_factura'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_packing_list'].'"/>
                            <input type="hidden" name="estado" id="estado" value="Cerrado"/>  
                             </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
              </div>
            </form>         
                
                ';}
               }
               

                         


 ?>
   