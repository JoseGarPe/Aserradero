<?php 
$accion=$_GET['accion'];
if ($accion=='paquetesLocal') {
    $estadoo = $_POST['cod_banda'];
             require_once "../class/PackingList.php";
                         require_once "../class/Paquetes.php";
                         require_once "../class/Contenedor.php";
                         $misPacks = new Packing();
                            $mss = new Paquetes();
                            
                           $dato =1;
                           $paquetes = $mss->selectALLpack_BodegaEs_local($estadoo);

                            foreach ($paquetes as $a) {
                            
                           $TP = $mss->countPaquetesBodegaLocal($a['id_bodega'],$estadoo);
                           foreach ($TP as $key) {
                             $totalPaquetes = $key['total'];
                             $totalMC = $key['metroCubic'];
                            }// consulta de total de paquetes
                            $tarimas= $a['metros_cubicos']/ $a['multiplo'] ;
                                
                        echo '
                         <tr>
                            <td style="vertical-align:middle;">'.$a['bodega'].'</td>
                            <td style="vertical-align:middle;">'.$a['fecha_ingreso'].'</td>
                            <td>'.$a['etiqueta'].'</td>
                            <td>'.$a['material'].'</td>
                            <td>'.$a['grueso'].'</td>
                            <td>'.$a['ancho'].'</td>
                            <td>'.$a['largo'].'</td>
                            <td>'.$a['piezas'].'</td>
                            <td>'.$a['metros_cubicos'].'</td>
                            <td>'.$a['multiplo'].'</td>
                            <td>'.round($tarimas).'</td>
                            <td style="vertical-align:middle;">'.$totalMC.' m<sup>3</sup></td>
                            <td>'.$a['estado'].'</td>
                        </tr> ';
                         }
}

 ?>