<div class="x_panel"> 
<div class="x_content"> 
 <!-- <div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
//buscador 1
-->
          <div class="form-group">
             <label>Tipo de Ingreso</label>  
                              <select id="ingreso" name="ingreso" class="form-control">
                                <option value="1">Barco</option>
                                <option value="2">Local</option>
                              </select>
          </div>
       <div id="tablePacking">
            <table id="example1" class="table table-striped table-bordered">
         <thead>
                        <tr>
                         <th>N° </th>
                          <th>Factura</th>
                          <th>Codigo Embarque</th>
                          <th>Fecha</th> 
                          <th>Shipper</th>
                          <th>Nave</th>
                          <th>Estado</th>
                          <th>Seleccionar</th>                        
                        </tr>
                      </thead>
                      <tbody class="buscar">
                        <?php 

                                       $codigo=$_POST["employee_id"];
                                        //$bandera=$_POST["bandera"];
                                                 require_once "PackingList.php";
                                                 $misPacks = new Packing();
                                                 $todos = $misPacks->selectALL();
                                                

                                        foreach ((array)$todos as $row) {
                                                 echo '
                                                  <tr>
                                                  <td>'.$row['id_packing_list'].'</td>
                                                   <td>'.$row['numero_factura'].'</td>
                                                   <td>'.$row['codigo_embarque'].'</td>
                                                   <td>'.$row['fecha'].'</td>
                                                   <td>'.$row['shipper'].'</td>
                                                   <td>'.$row['nav'].'</td>
                                                   <td>'.$row['estado'].'</td>';

                                        echo '
                                                   <td>
                                                 <a href="../listas/contenedores.php?id='.$row["id_packing_list"].'&factura='.$row["numero_factura"].'" class="btn btn-primary">Seleccionar</a>
                                                  </tr>
                                                 ';
                                          
                                            
                                        }
                        ?> 
                        </tbody> 
                         </table>
       </div>                    
    
</div>
</div>

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
  $("#ingreso").change(function() {
  var valor = $(this).val(); 

   var PackingList = document.getElementById("example1");
 switch (valor) {
    case '1': 
    var envio='Importacion';
      $.ajax({  
                     url:"envio.php?envio=Importacion",  
                     method:"POST",
                     data:{envio:envio},  
                     success:function(data){    

                                    $("#tablePacking").html(data);  
                             n(); 
                     }  
                });  
        break;
    case '2': 
    var envio='Local';
      $.ajax({  
                     url:"envio.php?envio=Local",  
                     method:"POST",
                     data:{envio:envio},  
                     success:function(data){    

                                    $("#tablePacking").html(data);  
                             n(); 
                     }  
                }); 
        break;
 
  }
});
    
    </script>
<script>
  $(function () {
    $('#example1').DataTable();
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