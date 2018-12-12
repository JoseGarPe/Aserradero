<div class="x_panel"> 
<div class="x_content"> 
 <!-- <div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
//buscador 1
-->
       <table id="example2" class="table table-striped table-bordered">
         <thead>
                        <tr>
                         <th>N° </th>
                          <th>Preset</th>
                          <th>Material</th>
                          <th>Seleccionar</th>                        
                        </tr>
                      </thead>
                      <tbody class="buscar">
<?php 

  						 $codigo=$_POST["employee_action"];
                //$bandera=$_POST["bandera"];
                         require_once "DetallePreset.php";
                         $misPacks = new DetallePreset();
                         $todos = $misPacks->selectALL1();
                        

                foreach ((array)$todos as $row) {
                         echo '
                          <tr>
                          <td>'.$row['id_preset'].'</td>
                           <td>'.$row['nombre'].'</td>
                           <td>'.$row['descripcion'].'</td>';

                echo '
                           <td>
                         <a href="../listas/CalculoCreacion.php?id='.$row["id_preset"].'&preset='.$row['nombre'].'" class="btn btn-primary">Seleccionar</a>
                          </tr>
                         ';
                	
                    
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