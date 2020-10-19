  <table id="example3" class="table table-striped table-bordered">
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

                                   $seleccion=$_POST["envio"];
                                        //$bandera=$_POST["bandera"];
							     require_once "../class/PackingList.php";
							      $misPacks = new Packing();
							      $todos = $misPacks->selectALL_envio($seleccion);
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
<script>
  $(function () {
    $('#example3').DataTable();
 
  });
</script>