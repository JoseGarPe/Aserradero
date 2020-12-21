 <table id="tableEspecicacion1" class="table table-bordered">
                    <thead>
                      <?php 
                        $especificacion=$_POST['employee_especificacion'];
                       require_once "../class/Materiales.php";
                       require_once "../class/Paquetes.php";
                         require_once "../class/Especificacion.php";
                          $misEsp = new Especificacion();
                          $datoEspecificacion = $misEsp->selectOne($especificacion);
                          foreach ($datoEspecificacion as $dato) {
                            $nombreEspecificacion = $dato['nombre'];
                          }
                            $mms = new Materiales();
                         $materialess = $mms->selectALL_CA(2);
                          $pq = new Paquetes();
                          $shippers = $pq->selectALLShippersEspecificacion($especificacion);
                          
                       ?>
                            <tr>
                            <th>N°</th>
                            <th>Especificacion</th>
                            <th>Total</th>
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
                                $nContenedor = $pq-> selectShipperNP_Especificacion($value['shipper'],$especificacion);
                                foreach ($nContenedor as $k) {
                                   $totalPaquetes = $totalPaquetes + $k['N_Paquetes'];
                                 $totalContenedores = $totalContenedores + $value['TOTAL']; 
                               
                                }
                                $numero = $numero +1;
                              }
                              echo '<tr class="success">
                              <td>'.$numero.'</td><td>'.$nombreEspecificacion.'</td><td>TOTAL</td><td>'.$totalPaquetes.'</td><td>'.$totalContenedores.'</td>
                              ';
                              $tarimaCal=0;
                              foreach ($materialess as $m1) {
                                $totalcubico = 0;
                                $totaltarimas =0;
                                $mct1=$pq->selectTotalMCT_especificacion($m1['id_material'],$especificacion,$m1['nombre']); 
                                foreach ($mct1 as $ma) {
                                  $totalcubico = $totalcubico + $ma['metroCubicot'];
                                  $volumenTotal=$volumenTotal +$ma['metroCubicot'];
                           /*         if ($ma['nombre']=='BK') {
                                     $tarimaCal = ($ma['piezas']*$ma['largo']*$ma['cantidad'])/1481;
                                  }elseif($ma['nombre']=='BK EU'){
                                     $tarimaCal = ($ma['piezas']*$ma['largo']*$ma['cantidad'])/1295;
                                  }else{
                                     $tarimaCal = ($ma['piezas']*$ma['multiplo']*$ma['cantidad'])/$ma['factorTarima'];
                                  }*/
                                }
                                $mct1=$pq->selectTotalMCT_especificacionTarima($m1['id_material'],$especificacion,$m1['nombre']); 
                                foreach ($mct1 as $ma) {
                                 $totaltarimas = $totaltarimas + $ma['tarima'];
                                }
                                //-----------------------------------------------------------------------------------------------------//
                                echo '<td>'.$totalcubico.'</td><td>'.round($totaltarimas,0).'</td>';

                              }
                              echo'<td>'.$volumenTotal.'</td></tr>';
          ?>
        </tbody>
      </table>
      <script type="text/javascript">
          $('#tableEspecificacion1').DataTable({
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