<form method="post" id="insert_form" action="../controllers/TrasladoProControlador.php?accion=guardar">
  <?php 
        $cantidad = $_POST['employee_cantidad'];
        $id_preset = $_POST['employee_id'];
        $bodega_origen = $_POST['employee_pl'];
        $nombre_bodega = $_POST['employee_nombre'];

        echo '
                                  <input type="hidden" name="Bodega_origen" id="Bodega_origen" class="form-control"  value="'.$bodega_origen.'"/>
                                  <input type="hidden" name="nombre_origen" id="nombre_origen" class="form-control"  value="'.$nombre_bodega.'"/>  ';
   ?>
                          <label>preset</label>  
                          <?php 
                          require_once "Presets.php";

                          $mispresetes = new Presets();
                         $categos = $mispresetes->selectOne($id_preset);
                          foreach ((array)$categos as $rows) {

                            echo '<input type="text" name="nombre" id="nombre" class="form-control"  value="'.$rows['nombre'].'"/>
                                  <input type="hidden" name="Id_preset" id="Id_preset" class="form-control"  value="'.$id_preset.'"/> 
                             ';

                          } 

 ?>
                           
                          <br /> 

                          <label>Cantidad Disponible</label>  
                          <?php 
                            echo '<input type="text" name="cantidad_disponible" id="cantidad_disponible" class="form-control" value="'.$cantidad.'" />';
                           ?>
                          <DIV id="mensaje" name="mensaje"></DIV> 
                          <br /> 
                          <label>Cantidad a Trasladar</label>  
                          <input type="text" name="cantidad" id="cantidad" class="form-control" />  
                          <br /> 
                          <label>Bodega Destino</label>  
                          <select class="form-control" name="Bodega_destino" id="Bodega_destino">
                          <?php 
                          require_once "Bodega.php";

                          $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_bodega']."'>".$row['nombre']."</option>";

                          } 

 ?>
                          </select>


                          <br />  

                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="hidden" name="guardar" id="guardar" />  
                         
                         
                         
                         
                          <span class="add-on"><i class="glyphicon glyphicon-plus"></i></span>
                           <input type="submit" name="insert" id="insert"  value="Solicitar Traslado" class="btn btn-success "/>

                         
                       
</form>
<script>
  
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
});

</script>