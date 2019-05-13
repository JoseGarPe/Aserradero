<form role="form" action="../controllers/ContenedorControlador.php?accion=confirmar" method="POST">
              <div class="box-body">
               <label>Detalle de Paquete</label>
<?php 
require_once "Contenedor.php";
require_once "Materiales.php";
require_once "Bodega.php";
require_once "Paquetes.php";


         
							$codigo=$_POST["employee_id"];
              $pl=$_POST["employee_pl"];
              $fac=$_POST["employee_fac"];
              $contenedor=$_POST["employee_contenedor"];
					     $paquete = new Paquetes();
                         $catego = $paquete->selectALLpackOne($codigo);
                         foreach ((array)$catego as $row) {
                         		echo '
                              <div class="table-responsive">  
                   <table class="table table-bordered">
                        <tr>
                          <td> N°</td>
                           <td>'.$row['id_paquete'].'</td>
                        </tr>
                        <tr>
                        <td>Material:</td>
                        <td>'.$row['material'].'</td>
                        </tr>
                        <tr>
                          <td> Etiqueta: </td>';
                          if ($row['etiqueta']!=NULL || $row['etiqueta']!="") {
                            echo '<td>'.$row["etiqueta"].'</td>

                          <input type="hidden" name="etiquet" id="etiquet" value="'.$$row['etiqueta'].'"/>   
                            ';
                          }else{
                            echo '<td><input type="text" name="etiquet" id="etiquet"/>  </td>';
                          }
                           
                           echo'
                          <input type="hidden" name="id" id="id" value="'.$row['id_paquete'].'"/>
                          <input type="hidden" name="pl" id="pl" value="'.$pl.'"/>   
                          <input type="hidden" name="factura" id="factura" value="'.$fac.'"/> 
                          <input type="hidden" name="con" id="con" value="'.$contenedor.'"/>    
                                                  
                        </tr>
                        <tr>
                          <td>Numero de Piezas</td>
                           <td>'.$row['piezas'].'</td>
                           <input type="hidden" name="piezas" id="piezas" value="'.$row['piezas'].'"/>
                           <input type="hidden" name="material" id="material" value="'.$row['id_material'].'"/>
                        </tr>
                        <tr>
                          <td>Dimensiones</td>
                           <td>'.$row['largo'].' x'.$row['ancho'].' x '.$row['grueso'].' </td>
                        </tr>
                        <tr>
                          <td>m <sup>3</sup></td>
                           <td>'.$row['metros_cubicos'].'m <sup>3</sup></td>
                        </tr>
                        


                          </table>

                          </div>';

                           
                            echo'  <label>Bodega destino: '.$row['bodega'].'</label>';
                              

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