<?php 
$accion=$_GET['accion'];
if ($accion=='etiquetaDB') {
    $etiqueta = $_POST['parametros'];
    $codigo= $_POST['employee_bodega'];
    $nombre=$_POST['employee_nombre'];
            require_once "../class/PackingList.php";
                         require_once "../class/Paquetes.php";
                         require_once "../class/Contenedor.php";
                         $misPacks = new Packing();
                         $todos = $misPacks->selectALL_Local();
                            $mss = new Paquetes();
                            
                           $dato =1;
                           $paquetes = $mss->selectALLpack_Bodega_general_etiqueta($codigo,$etiqueta);

                            foreach ($paquetes as $a) {
                            
                           $TP = $mss->countPaquetesBodega_general_etiqueta($codigo,$etiqueta);
                           $tm = $mss->countMcubicos_material_etiqueta($a['id_material'],$codigo,$etiqueta);
                           foreach ($TP as $key) {
                             $totalPaquetes = $key['total'];
                             $totalMC = $key['metroCubic'];
                            }// consulta de total de paquetes
                               foreach ($tm as $material) {
                             $totalMateriales = $material['total'];
                             $totalMCM = $material['metroCubic'];
                            }// consulta de total de paquetes
                            if ($a['material']=='BK') {
                            $tarimas = ($a['piezas']*$a['cantidad']*$a['largo'])/1481;
                             } elseif ($a['material']=='BK EU') {
                            $tarimas = ($a['piezas']*$a['cantidad']*$a['largo'])/1295;
                             }else{
                              
                            $tarimas= ($a['piezas']*$a['multiplo'] *$a['cantidad'])/$a['factor'] ;
                             }
                                
                        echo '
                         <tr>
                            <td>'.$a['id_paquete'].'</td>
                            <td style="vertical-align:middle;">'.$a['fecha_ingreso'].'</td>
                            <td>'.$a['etiqueta'].'</td>
                            <td style="vertical-align:middle;">'.$a['material'].'</td>
                            <td>'.$a['grueso'].'</td>
                            <td>'.$a['ancho'].'</td>
                            <td>'.$a['largo'].'</td>
                            <td>'.$a['piezas'].'</td>
                            <td>'.$a['metros_cubicos'].'</td>
                            <td style="vertical-align:middle;">'.$totalMCM.' m<sup>3</sup></td>
                            <td>'.$a['multiplo'].'</td>
                            <td>'.round($tarimas).'</td>
                            <td style="vertical-align:middle;">'.$totalMC.' m<sup>3</sup></td>
                            <td>'.$a['estado'].'</td>
                            <td>'.$a['tipo_ingreso'].'</td> 
                            <td>
                             <input type="button" name="view" value="Trasladar" id_paquete="'.$a['id_paquete'].'" id="'.$a["id_material"].'" pl="'.$codigo.'" nombre="'.$nombre.'" cantidad="'.$a['piezas'].'" class="btn btn-info new_traslado"/> 

                           </td>
                        </tr> ';
                                
                                
                              
                          }
}
elseif ($accion=='reiniciarDB') {
    $codigo= $_POST['employee_bodega'];
    $nombre=$_POST['employee_nombre'];
                         require_once "../class/PackingList.php";
                         require_once "../class/Paquetes.php";
                         require_once "../class/Contenedor.php";
                         $misPacks = new Packing();
                         $todos = $misPacks->selectALL_Local();
                            $mss = new Paquetes();
                            
                           $dato =1;
                           $paquetes = $mss->selectALLpack_Bodega_general($codigo);

                            foreach ($paquetes as $a) {
                            
                           $TP = $mss->countPaquetesBodega_general($codigo);
                           $tm = $mss->countMcubicos_material($a['id_material'],$codigo);
                           foreach ($TP as $key) {
                             $totalPaquetes = $key['total'];
                             $totalMC = $key['metroCubic'];
                            }// consulta de total de paquetes
                               foreach ($tm as $material) {
                             $totalMateriales = $material['total'];
                             $totalMCM = $material['metroCubic'];
                            }// consulta de total de paquetes
                            if ($a['material']=='BK') {
                            $tarimas = ($a['piezas']*$a['cantidad']*$a['largo'])/1481;
                             } elseif ($a['material']=='BK EU') {
                            $tarimas = ($a['piezas']*$a['cantidad']*$a['largo'])/1295;
                             }else{
                              
                            $tarimas= ($a['piezas']*$a['multiplo'] *$a['cantidad'])/$a['factor'] ;
                             }
                                
                        echo '
                         <tr>
                            <td>'.$a['id_paquete'].'</td>
                            <td style="vertical-align:middle;">'.$a['fecha_ingreso'].'</td>
                            <td>'.$a['etiqueta'].'</td>
                            <td style="vertical-align:middle;">'.$a['material'].'</td>
                            <td>'.$a['grueso'].'</td>
                            <td>'.$a['ancho'].'</td>
                            <td>'.$a['largo'].'</td>
                            <td>'.$a['piezas'].'</td>
                            <td>'.$a['metros_cubicos'].'</td>
                            <td style="vertical-align:middle;">'.$totalMCM.' m<sup>3</sup></td>
                            <td>'.$a['multiplo'].'</td>
                            <td>'.round($tarimas).'</td>
                            <td style="vertical-align:middle;">'.$totalMC.' m<sup>3</sup></td>
                            <td>'.$a['estado'].'</td>
                            <td>'.$a['tipo_ingreso'].'</td> 
                            <td>
                             <input type="button" name="view" value="Trasladar" id_paquete="'.$a['id_paquete'].'" id="'.$a["id_material"].'" pl="'.$codigo.'" nombre="'.$nombre.'" cantidad="'.$a['piezas'].'" class="btn btn-info new_traslado"/> 

                           </td>
                        </tr> ';
                                
                                
                              
                          }
}

 ?>