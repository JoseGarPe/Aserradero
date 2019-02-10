<div class="col-xs-12">
<form role="form1" action="../controllers/ContenedorControlador.php?accion=guardar1" method="post">
    				<table id="example4" class="table table-striped table-bordered">
         		<thead>
                        <tr>
                          <th>Material</th>
                          <th>Dimenciones</th>
                          <th width="95">Piezas</th> 
                          <th width="95">Paquetes</th>  
                          <th width="95">m cuadrados</th> 
                          <th width="95">multiplo</th> 
                          <th width="95">Tarimas</th>
                          <th>Bodega</th>
                          <th>Estado</th>                                
                        </tr>
          		</thead>
          		<tbody>
          			<?php 
  					$codigo=$_POST["employee_id"];
						require_once "Contenedor.php";
            require_once "Paquetes.php";

                          require_once "Bodega.php";
            
                         $ps = new Paquetes();
                         $ms = new Contenedores();
                         $contacto = $ms->selectALLpack($codigo);
                         $paquetes = $ms->materialesPaquete($codigo);
                         foreach ($paquetes as $row) {
                          $cont_ = 0;
                            $largo = $row['largo'];
                            $ancho = $row['ancho'];
                            $grueso = $row['grueso'];
                            $n_paquetes = $row['n_paquetes'];
                            $t_piezas = $row['t_piezas'];
                            $m_cuadradoss = ($t_piezas * $largo * $ancho * $grueso*$n_paquetes)/1000000000;
                         	echo '<tr>
                           <td>'.$row['nombre'].' <input type="hidden" name="id_material[]" id="id_material[]" value="'.$row['id_material'].'"/>
                           <input type="hidden" name="etiqueta[]" id="etiqueta[]" value="'.$row['nombre'].'"/>
                           </td>
                           <td>'.$row['largo'].'</br>'.$row['grueso'].'</br>'.$row['ancho'].'
                            <input type="hidden" name="largo[]" id="largo" value="'.$row['largo'].'"/>
                           <input type="hidden" name="ancho[]" id="ancho" value="'.$row['ancho'].'"/>
                            <input type="hidden" name="grueso[]" id="grueso" value="'.$row['grueso'].'"/>
                           </td>
                           <td><input type="number" min="0.00" step="0.01" id="piezas" readonly name="piezas[]" value="'.$row['t_piezas'].'" class="form-control"></td>
                           <td><input type="number" min="0.00" step="1" id="paquetes" readonly name="paquetes[]" value="'.$row['n_paquetes'].'" class="form-control"></td>
                           <td><input type="number" min="0.00" step="0.01" id="m_cuadrados" name="m_cuadrados[]" value="'.$m_cuadradoss.'" readonly="true" class="form-control col-md-4 "></td>
                           ';
                           $extra = $ms->detalleConetenedor($codigo,$row['id_material']);
                           if ($extra == "0") {
                             echo '
                            <td><input type="number" min="0.00" step="0.01" id="multiplo[]" name="multiplo[]" class="form-control"></td> 
                            <td><input type="number" min="0.00" step="1" id="tarimas[]" name="tarimas[]" readonly="true" class="form-control col-md-4"></td>
                            <td><select class="form-control" name="id_bodega1[]" id="id_bodega1[]">';
                          

                          $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $rows) {

                            echo "<option value='".$rows['id_bodega']."'>".$rows['nombre']."</option>";

                          } 
                           echo '</select></td>
                           
                           <td>Sin Guardar</td>
                           ';

                           }else{
                            foreach ($extra as $value) {
                            echo '
                            <td><input type="number" min="0.00" step="0.01" id="multiplo[]" name="multiplo[]" value="'.$value['multiplo'].'"class="form-control"></td> 
                            <td><input type="number" min="0.00" step="1" id="tarimas[]" name="tarimas[]" readonly="true" value="'.$value['tarimas'].'" class="form-control col-md-4"></td>
                             ';
                                  
                                  $mistipos1 = new Bodega();
                                  if ($value['id_bodega']==NULL) {
                                     $catego1 = $mistipos1->selectOne($value['bodega_pendiente']);
                              foreach ((array)$catego1 as $key) {
                                echo' <td>'.$key['nombre'].'
                                    <input type="hidden" name="id_bodega1[]" id="id_bodega1[]" value="'.$key['nombre'].'"/>
                                    </td>';
                                  }
                              } 
                              else{
                                 $catego1 = $mistipos1->selectOne($value['id_bodega']);
                              foreach ((array)$catego1 as $key) {
                                echo' <td>'.$key['nombre'].' <input type="hidden" name="id_bodega1[]" id="id_bodega1[]" value="'.$key['nombre'].'"/></td>';
                                  }

                              }
                             echo '<td><input type="hidden" name="estado[]" id="estado[]" value="'.$value['estado'].'"/>'.$value['estado'].'</td>';
                            }

                           }
                           $cont_ = $cont_ +1;

                         echo'</tr>';
                         }
                         echo '<input type="hidden" name="cont_" id="cont_" value="'.$cont_.'"/>
                         <input type="hidden" name="id_packing_list" id="id_packing_list" value="'.$codigo.'"/>
                         ';
    	     
    	      ?>
          		</tbody>
          			</table>
                <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/IndexPackingList.php'" name="cancel" value="Cancelar" >
   </div>
  </form>
				</div>
