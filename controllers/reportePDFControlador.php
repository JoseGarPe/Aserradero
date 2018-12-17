<?php 
// Composer's auto-loading functionality

 
 $accion=$_GET["accion"];
// inhibit DOMPDF's auto-loader
define("DOMPDF_ENABLE_AUTOLOAD", false);

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
<style type="text/css">
table {
   width: 100%;
   text-align: left;
   border-collapse: collapse;
   margin: 0 0 1em 0;
   caption-side: top;
}
caption, td, th {
   padding: 0.3em;
}
tbody {
   border-top: 1px solid #000;
   border-bottom: 1px solid #000;
}
tbody th, tfoot th {
   border: 0;
}
th.name {
   width: 25%;
}
th.location {
   width: 20%;
}
th.lasteruption {
   width: 30%;
}
th.eruptiontype {
   width: 25%;
}
tfoot {
   text-align: center;
   color: #555;
   font-size: 0.8em;
}
</style>
</head>
<body>
  <?php 
  if ($codigo==1) {
  $dia=$_POST['fecha'];
   echo "<h1>Reporte de Ordenes generadas el dia de: ".$dia."</h1>";
  }
  elseif ($codigo==2) {

    $fecha1=$_POST['fecha1'];
    $fecha2=$_POST['fecha2'];
   echo "<h1>Reporte de Ordenes generadas el entre las fechas de: ".$fecha1." y ".$fecha2."</h1>";
  }
  elseif ($codigo==3) {

   $mes=$_POST['combomes'];
   if ($mes==01) {
     $mes_name="Enero";
   }elseif ($mes==02) {
     $mes_name="Febrero";
   }elseif ($mes==03) {
     $mes_name="Marzo";
   }elseif ($mes==04) {
     $mes_name="Abril";
   }elseif ($mes==05) {
     $mes_name="Mayo";
   }elseif ($mes==06) {
     $mes_name="Junio";
   }elseif ($mes==07) {
     $mes_name="Julio";
   }elseif ($mes==08) {
     $mes_name="Agosto";
   }elseif ($mes==09) {
     $mes_name="Septiembre";
   }elseif ($mes==10) {
     $mes_name="Octubre";
   }elseif ($mes==11) {
     $mes_name="Noviembre";
   }elseif ($mes==12) {
     $mes_name="Diciembre";
   }
    echo "<h1>Reporte de Ordenes generadas el mes de ".$mes_name."</h1>";
  }
   ?>
  <h1>Reporte de la fecha</h1>
   <div id="employee_table">
                    <table id="datatable-buttons" name="datatable-buttons">
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
                         $orden = $misOrdenes->selectOrdenesDia($dia);
                         }elseif ($codigo==2) {
                         $orden = $misOrdenes->selectOrdenesSemana($fecha1,$fecha2);
                         }elseif ($codigo==3) {
                         $orden = $misOrdenes->selectOrdenesMes($mes);
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