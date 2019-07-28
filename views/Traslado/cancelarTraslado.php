<form method="post" id="insert_form" action="../controllers/TrasladoControlador.php?accion=cancelar">
  <?php 
        $id_traslado = $_POST['employee_traslado'];
        require_once "Traslado.php";
        $tras = new Traslado();
        $trasladoo = $tras->selectOne($id_traslado);
        foreach ($trasladoo as $datoT) {
          $bodega_origen = $datoT['bodega_origen'];
          $bodega_destino = $datoT['bodega_destino'];
          $bodegaD =$tras->selectOneBodega($bodega_destino);
            foreach ($bodegaD as $datoB) {
              $nombre_bodega = $datoB['nombre'];
            }
          $cantidad = $datoT['cantidad'];
          $id_paquete = $datoT['id_paquete'];
          $id_material = $datoT['id_material'];
        }

        echo '                    
                                  <input type="hidden" name="Bodega_origen" id="Bodega_origen" class="form-control"  value="'.$bodega_origen.'"/>
                                  <input type="hidden" name="Bodega_destino" id="Bodega_destino" class="form-control"  value="'.$bodega_destino.'"/>
                                  <input type="hidden" name="nombre_origen" id="nombre_origen" class="form-control"  value="'.$nombre_bodega.'"/>  
                                  <input type="hidden" name="id_paquete" id="id_paquete" class="form-control"  value="'.$id_paquete.'"/>  
                                  <input type="hidden" name="id_traslado" id="id_traslado" class="form-control"  value="'.$id_traslado.'"/> ';
   ?>
                          <label>Material</label>  
                          <?php 
                          require_once "Materiales.php";

                          $misMateriales = new Materiales();
                         $categos = $misMateriales->selectOne($id_material);
                          foreach ((array)$categos as $rows) {

                            echo '<input type="text" name="nombre" id="nombre" class="form-control"  value="'.$rows['nombre'].'"/>
                                  <input type="hidden" name="Id_material" id="Id_material" class="form-control"  value="'.$id_material.'"/> 
                             ';

                          } 

 ?> 
                    <table class="table table-striped table-bordered">
                      <?php 
                      $paquetee = $misMateriales->selectOnePaquete($id_paquete);
                      foreach ($paquetee as $datoP) {
                        echo '<tr>
                          <td>Id</td><td>'.$datoP['id_paquete'].'</td>
                        </tr>
                        <tr>
                        <td>Etiqueta</td><td>'.$datoP['etiqueta'].'</td>
                        </tr>
                        <tr>
                        <td>Dimensiones</td><td>'.$datoP['grueso'].' x '.$datoP['ancho'].' x '.$datoP['largo'].'</td>
                        </tr>
                        <tr>
                        <td>Piezas</td><td>'.$datoP['piezas'].'</td>
                        </tr>
                        <tr>
                        <td>M<sup>3</sup></td><td>'.$datoP['metros_cubicos'].'</td>
                        </tr>

                        ';
                      }

                       ?>
                    </table>

                           
                          <br /> 

                        <!--  <label>Cantidad Disponible</label>  -->
                          <?php 
                          //  echo '<input type="text" name="cantidad_disponible" id="cantidad_disponible" class="form-control" value="'.$cantidad.'" />';
                           ?>
                          <DIV id="mensaje" name="mensaje"></DIV> 
                          <br /> 
                          <label>Cantidad a Cancelar</label>  
                          <?php 
                        echo '<input type="text" readonly name="cantidad" id="cantidad" class="form-control" value="'.$cantidad.'" />';
                           ?>
                        <!--  <input type="text" name="cantidad" id="cantidad" class="form-control" />  -->
                          <br /> 
                          <label>Bodega Retorno</label>  
                        <?php 
                           $bodegaD =$tras->selectOneBodega($bodega_origen);
            foreach ($bodegaD as $datoB) {
              $nombre_bodega_o = $datoB['nombre'];
            }
                        echo '<input type="text" name="nombre_destino" readonly id="nombre_destino" class="form-control" value="'.$nombre_bodega_o.'" />';
                           ?>

                          <br />  

                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="hidden" name="guardar" id="guardar" />  
                         
                         
                         
                         
                          <span class="add-on"><i class="glyphicon glyphicon-plus"></i></span>
                           <input type="submit" name="insert" id="insert"  value="Cancelar Traslado" class="btn btn-danger "/>

                         
                       
</form>
<script>
 /* 
$(document).ready(function () {
    $("#cantidad").keyup(function () {

        var disponible = $("#cantidad_disponible").val();
  
        var cantidad = $(this).val();
        var total= disponible - cantidad;
        if (total <= 0) {
           $("#mensaje").val("El valor ingresa supera a la cantidad disponible");
        }else{

           $("#mensaje").val("");
        }
        });
});*/

</script>