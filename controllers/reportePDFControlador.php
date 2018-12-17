<?php 
// Composer's auto-loading functionality

 
 $accion=$_GET["accion"];
// inhibit DOMPDF's auto-loader
define('DOMPDF_ENABLE_AUTOLOAD', false);

//include the DOMPDF config file (required)
require '../vendors/dompdf/dompdf_config.inc.php';

//if you get errors about missing classes please also add:
require_once('../vendors/dompdf/include/autoload.inc.php');
require_once("../vendors/dompdf/dompdf_config.inc.php");

if ($accion=="ordenes") {
 $codigo=$_POST["seleccion"];
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Reporte</title>
  <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body>
   <div id="employee_table">
                    <table id="datatable-buttons" class="table table-striped table-bordered" name="datatable-buttons">
                     <thead>
                        <tr>
                          <th>N° Orden</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Bodega Guardado</th>
                          <th>Estado</th> 
                          <th>Fecha Ordenado</th> 

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         require_once "../class/OrdenProducto.php";
                         $misOrdenes = new OrdenProducto();
                         if ($codigo==1) {
                          $dia=$_POST['fecha'];
                         $orden = $misOrdenes->selectOrdenesDia($dia);
                         }elseif ($codigo==2) {
                          $mes=$_POST['combomes'];
                         $orden = $misOrdenes->selectOrdenesMes($mes);
                         }elseif ($codigo==3) {
                          $fecha1=$_POST['fecha1'];
                          $fecha2=$_POST['fecha2'];
                         $orden = $misOrdenes->selectOrdenesSemana($fecha1,$fecha2);
                         }        
                         foreach ((array)$orden as $ky) {
                         echo '
                          <tr>
                           <td>'.$ky['id_orden_producto'].'</td>
                           <td>'.$ky['preset'].'</td>
                            <td>'.$ky["cantidad"].' </td>
                           <td>'.$ky["bodega"].'</td>
                            <td>'.$ky["estado"].' </td>
                            <td>'.$ky["fecha_orden"].' </td>
                         </tr>';
                       }
                     
                     
                         ?>
                      </tbody>
                    </table>
                  </div>
</body>
</html>

<?php


$dompdf = new DOMPDF();
$dompdf->set_option('enable_html5_parser', TRUE);
$dompdf->load_Html(ob_get_clean());
$dompdf->render();

$filename ='reporte.pdf'; 
 $pdf =$dompdf->output();
$dompdf->stream($filename, array('Attachment' => 0));

  
}

 
 ?>