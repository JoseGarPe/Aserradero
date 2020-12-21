 <table id="tableBodega1" class="table table-bordered">
                    <thead>
                      <?php 
                        $especificacion=$_POST['employee_especificacion'];
                        $bodega =$_POST['employee_bodega'];
                       require_once "../class/Materiales.php";
                       require_once "../class/Paquetes.php";
                            $mms = new Materiales();
                         $materialess = $mms->selectALL_CA(2);
                          $pq = new Paquetes();
                          $shippers = $pq->selectALLShippersEspecificacion($especificacion);
                          
                       ?>
                            <tr>
                            <th>N°</th>
                            <th>Especificacion</th>
                            <th>Proveedor</th>
                            <th>Barco</th>
                            <th>Bodega</th>
                            <th>Rec</th>
                            <th>N° Con</th>
                            <?php
                             $numero = 1;
                             $columnas = 0;
                            foreach ($materialess as $key2) {
                              
                              echo '
                            <th>'.$key2['nombre'].' M<sup>3</sup></th>
                               <th>'.$key2['nombre'].' Tarimas </th>
                         
                              ';

                          }
                             ?>
                             <th>TOTAL M<sup>3</sup></th>
                            </tr></thead>
                            <tbody>
                              <?php 
                              $totalPaquetes=0;
                              $totalContenedores=0;
                            
                            $volumenTotal=0;
                         foreach ($shippers as $value) {
                          $volumenShipper=0;
                          $tarimaShipper =0;
                                echo '
                                <tr>
                                <td>'.$numero.'</td>
                                <td>'.$value['especificacion'].'</td>
                                <td>'.$value['shipper'].'</td>
                                <td>'.$value['nave'].'</td>';
                                $nContenedor = $pq-> selectShipperNP_bodega($value['shipper'],$bodega);
                                foreach ($nContenedor as $k) {
                                   if ($k['id_bodega']==0) {
                                            echo '<td>Pendiente</td>';
                                            }else{
                                                 require_once "../class/Bodega.php";
                              
                                               $bod = new Bodega();
                                               $datoBd = $bod->SelectOne($k['id_bodega']);
                                               foreach ($datoBd as $valorBodega) {
                                                echo'<td>'.$valorBodega['nombre'].'</td>';
                                                 
                                               }
                                             }

                                  echo '<td>'.$k['N_Paquetes'].'</td>
                                      <td>'.$value['TOTAL'].'</td>
                                  ';
                                 $totalPaquetes = $totalPaquetes + $k['N_Paquetes'];
                                 $totalContenedores = $totalContenedores + $value['TOTAL']; 
                                }
                                foreach ($materialess as $m) {
                                  $mct=$pq->selectShipperMCT_bodega($value['shipper'],$m['id_material'],$bodega,$m['nombre'],$especificacion);
                                  foreach ($mct as $valor) {
                                    $metrocu =0;
                                    if($valor['metroCubicot']== NULL){
                                      $metrocu =0;
                                    }else{
                                      $metrocu = $valor['metroCubicot'];
                                    }

                                    echo '
                                    <td>'.$metrocu.'</td>

                                    ';
                                    $volumenShipper = $volumenShipper +$metrocu;
                                    $volumenTotal = $volumenTotal+$metrocu;

                                  }
                                  $tarimaMaterial=0;
                                  $mct=$pq->selectShipperMCT_bodegaTarima($value['shipper'],$m['id_material'],$bodega,$m['nombre'],$especificacion);
                                  foreach ($mct as $valor) {
                                   $tarimaMaterial=$tarimaMaterial+$valor['tarima'];
                                  }
                                   echo '<td>'.round($tarimaMaterial,0).'</td>';

                                }
                                echo '<td>'.$volumenShipper.'</td>';

                                echo '
                                 </tr>
                                ';
                                $numero = $numero +1;
                              }
                              echo '<tr class="success">
                              <td>'.$numero.'</td><td colspan="4">TOTAL</td><td>'.$totalPaquetes.'</td><td>'.$totalContenedores.'</td>
                              ';
                              $tarimaCal=0;
                              foreach ($materialess as $m1) {
                                $MCubicoT=0;
                                $TarimaT=0;
                                $totalcubico = 0;
                                $totaltarimas =0;
                                $mct1=$pq->selectTotalMCT_bodega($m1['id_material'],$bodega,$especificacion,$m1['nombre']); 
                                foreach ($mct1 as $ma) {
                                  $totalcubico = $totalcubico + $ma['metroCubicot'];
                                   /* if ($ma['nombre']=='BK') {
                                     $tarimaCal = ($ma['piezas']*$ma['largo']*$ma['cantidad'])/1481;
                                  }elseif($ma['nombre']=='BK EU'){
                                     $tarimaCal = ($ma['piezas']*$ma['largo']*$ma['cantidad'])/1295;
                                  }else{
                                     $tarimaCal = ($ma['piezas']*$ma['multiplo']*$ma['cantidad'])/$ma['factorTarima'];
                                  }*/

                                }
                                $mct1=$pq->selectTotalMCT_bodegaTarima($m1['id_material'],$bodega,$especificacion,$m1['nombre']); 
                                foreach ($mct1 as $ma) {
                                  $totaltarimas = $totaltarimas + $ma['tarima'];
                                  }
                                //------------------------------------------------------------------------------//
                                echo '<td>'.$totalcubico.'</td><td>'.round($totaltarimas,0).'</td>';
                   
                              

                              }
                              echo'<td>'.$volumenTotal.'</td></tr>';
          ?>
        </tbody>
      </table>
      <script type="text/javascript">
          $('#tableBodega1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      responsive: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: 'visible'
                }
            },
            'colvis'
        ]
    });
      </script>