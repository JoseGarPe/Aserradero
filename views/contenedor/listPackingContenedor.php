<div class="x_panel"> 
<div class="x_content"> 
 <!-- <div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
//buscador 1
-->
       <table id="example1" class="table table-striped table-bordered">
         <thead>
                        <tr>
                         <th>N° </th>
                          <th>Etiqueta</th>                          
                          <th>Fecha</th> 
                          <th>Bodega</th> 
                          <th>Estado</th>
                          <th>Seleccionar</th>                        
                        </tr>
                      </thead>
                      <tbody class="buscar">
<?php 

  						 $codigo=$_POST["employee_id"];
               $factura=$_POST["employee_factura"];
                //$bandera=$_POST["bandera"];
                         require_once "Contenedor.php";
                         require_once "Bodega.php";
                         $misPacks = new Contenedores();
                         $todos = $misPacks->selectALLpack($codigo);
                        
                         $bodegas = new Bodega();

                foreach ((array)$todos as $row) {
                         echo '
                          <tr>
                          <td>'.$row['id_contenedor'].'</td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['fecha_ingreso'].'</td>';
                           if ($row['id_bodega']>0) {
                             $todbodega= $bodegas->selectOne($row['id_bodega']);
                             foreach ($todbodega as $key) {
                               echo '<td>'.$key['nombre'].'</td>';
                             }
                            }elseif($row['id_bodega']=="0") {
                              echo '<td></td>';
                              
                            }else{
                              echo '<td></td>';
                            }
                           echo '
                           <td>'.$row['estado'].'</td>';

                          if ($row['estado']!='Confirmado') {
                           echo '<td>  <a href="../listas/contenedores.php?id='.$codigo.'&factura='.$factura.'&conten='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'&Confirmado=no" class="btn btn-primary">Seleccionar</a></td></tr>';
                           } else{
                echo '
                           <td>
                        <!-- <a href="../listas/contenedores.php?id='.$codigo.'&factura='.$factura.'&conten='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-primary">Seleccionar</a>
                         </td>-->
                          </tr>
                         ';
                	}
                    
                }
?> </tbody>  </table>
</div>
</div>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');

 $(document).ready(function () {
 
            (function ($) {
 
                $('#filtrar').keyup(function () {
 
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
 
                })
 
            }(jQuery));
 
        }); 

    
    </script>