<?php 
$accion=$_GET['accion'];
if ($accion=='etiqueta') {
	?>

                     <?php 
                       	  $bodega = $_POST['employee_id'];
	 						 $etiqueta = $_POST['employee_etiqueta'];
                   require_once "Paquetes.php";
                            $mss = new Paquetes();
                         $paquetes = $mss->selectALLpack_contenedor($etiqueta,$bodega);
                         foreach ($paquetes as $key) {
                          echo '
                          <tr>
                          <td>'.$key['etiqueta'].'</td>
                          <td>'.$key['grueso'].'</td>
                          <td>'.$key['ancho'].'</td>
                          <td>'.$key['largo'].'</td>
                          <td>'.$key['piezas'].'</td>
                          <td>'.$key['metros_cubicos'].'</td>
                          <td>'.$key['fecha_ingreso'].'</td>
                          <td>'.$key['bodega'].'</td>
                          <td>'.$key['estado'].'</td>
                          </tr>
                           ';
                         }



                     ?>
<?php
}elseif ($accion=='paquetes') {
    $estadoo = $_POST['cod_banda'];
             require_once "PackingList.php";
                         require_once "Paquetes.php";
                         require_once "Contenedor.php";
                         $misPacks = new Packing();
                            $mss = new Paquetes();
                            
                           $dato =1;
                           $paquetes = $mss->selectALLpack_BodegaEs($estadoo);

                            foreach ($paquetes as $a) {
                            
                           $TP = $mss->countPaquetesBodegaImport($a['id_bodega'],$estadoo);
                           foreach ($TP as $key) {
                             $totalPaquetes = $key['total'];
                             $totalMC = $key['metroCubic'];
                             $totalPiezas = $key['piezas_totales'];
                            }// consulta de total de paquetes
                              if ($a['material']=='BK') {
                            $tarimas = ($a['cant_piezas']*$a['largo']*$a['cantidad'])/1481;
                             } elseif ($a['material']=='BK EU') {
                            $tarimas = ($a['cant_piezas']*$a['largo']*$a['cantidad'])/1295;
                             }else{
                            $tarimas= ($a['piezas']*$a['multiplo']*$a['cantidad'])/$a['factorTarima'] ;
                                }
                                
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
                            <td style="vertical-align:middle;">'.$totalPiezas.'</td>
                            <td>'.$a['estado'].'</td>
                        </tr> ';
                                
                                
                              
                          }
}
elseif ($accion=='bodegas') {
    $estadoo1 = $_POST['cod_banda1'];
             require_once "PackingList.php";
                         require_once "Paquetes.php";
                         require_once "Contenedor.php";
                         $misPacks = new Packing();
                            $mss = new Paquetes();
                            
                           $dato =1;
                           if ($estadoo1==0) {
                            
                           $paquetes = $mss->selectALLpack_BodegaEsB_CERO($estadoo1);
                           }else{
                           $paquetes = $mss->selectALLpack_BodegaEsB($estadoo1);
                         }
                            foreach ($paquetes as $a) {
                            
                           $TPM = $mss->countPaquetesBodega_Material($estadoo1,$a['id_material']);
                           $TP = $mss->countPaquetesBodegaBB($estadoo1);
                           foreach ($TP as $key) {
                             $totalPaquetes = $key['total'];
                             $totalMC = $key['metroCubic'];
                             $totalPiezas = $key['piezas_totales'];
                            }// consulta de total de paquetes
                                    if ($a['material']=='BK') {
                            $tarimas = ($a['cant_piezas']*$a['largo']*$a['cantidad'])/1481;
                             } elseif ($a['material']=='BK EU') {
                            $tarimas = ($a['cant_piezas']*$a['largo']*$a['cantidad'])/1295;
                             }else{
                            $tarimas= ($a['piezas']*$a['multiplo']*$a['cantidad'])/$a['factorTarima'] ;
                                }
                              foreach ($TPM as $key1) {
                             $totalPiezasM = $key1['piezas_totales'];
                              }
                                
                        echo '
                         <tr>';
                         if ($a['id_bodega']==0) {
                           echo ' <td style="vertical-align:middle;">PENDIENTE</td>';
                         }else{
                          echo ' <td style="vertical-align:middle;">'.$a['bodega'].'</td>';
                         }
                           
                          echo' 
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
                            <td style="vertical-align:middle;">'.$totalPiezasM.'</td>
                            <td style="vertical-align:middle;">'.$totalPiezas.'</td>
                            <td>'.$a['estado'].'</td>
                        </tr> ';
                                
                                
                              
                          }
}
else{
	?>
		
                     <?php 
                       	  $bodega = $_POST['employee_id'];
	 						 $etiqueta = $_POST['employee_etiqueta'];
                   require_once "Paquetes.php";
                            $mss = new Paquetes();
                         $paquetes = $mss->selectALLpack_contenedor($etiqueta,$bodega);
                         foreach ($paquetes as $key) {
                          echo '
                          <tr>
                          <td>'.$key['etiqueta'].'</td>
                          <td>'.$key['grueso'].'</td>
                          <td>'.$key['ancho'].'</td>
                          <td>'.$key['largo'].'</td>
                          <td>'.$key['piezas'].'</td>
                          <td>'.$key['metros_cubicos'].'</td>
                          <td>'.$key['fecha_ingreso'].'</td>
                          <td>'.$key['bodega'].'</td>
                          <td>'.$key['estado'].'</td>
                          </tr>
                           ';
                         }



                     ?>
	<?php
}
 ?>

<script>
  $(document).ready(function() {
    $('#example31').DataTable( {

      'order'       : [[0, "desc"]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
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
                    columns: [ 0, 1, 2, 5 ]
                }
            },
            'colvis'
        ]
    } );
    $('#example21').DataTable( {
        order: [[0, 'asc']],
        rowGroup: {
            startRender: null,
            endRender: function ( rows, group ) {
                var salaryAvg = rows
                    .data()
                    .pluck(11)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0) / rows.count();
                salaryAvg = $.fn.dataTable.render.number(',', '.', 0, '$').display( salaryAvg );
 
                var ageAvg = rows
                    .data()
                    .pluck(11)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0) / rows.count();
 
               return $('<tr/>')
                    .append( '<td colspan="3">Total M<sup>3</sup> Orden'+group+'</td>' )
                    .append( '<td></td>' )
                    .append( '<td/>' )
                    .append( '<td>'+salaryAvg+'</td>' );
            },
            dataSrc: 0
        }
    } );
    $('#example41').DataTable( {
        order: [[0, 'asc']],
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      responsive: true,
      'autoWidth'   : true,
        rowsGroup:[0,14,3,2],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
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
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
       
    } );
    $('#example11').DataTable( {
        
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      responsive: true,
      'autoWidth'   : true,
        rowsGroup:[0,14,3,2],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
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
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
       
    } );

    $('#example51').DataTable( {
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      responsive: true,
      'autoWidth'   : true,
        rowsGroup:[0,14,3,2],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
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
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
       
    } );

} );
</script>