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