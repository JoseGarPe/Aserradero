<form role="form" action="../controllers/PaquetesControlador.php?accion=modi_tempL" method="post">
              <div class="box-body">
<?php 

require_once "Paquetes.php";


         
							$codigo=$_POST["employee_id"];
              $packing=$_POST["employee_packing"];
              $inab=$_POST["inab"];
              $factura=$_POST["factura"];
					     $nave = new Paquetes();
                         $catego = $nave->selectOne_T($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '

                            <div class="form-group">
                  <label for="codigo">Piezas</label>
                  <select class="form-control" name="id_materiales" id="id_materiales" required="true">
                      ';
                     $catego1 = $nave->selectMateria_Prima();
                          foreach ((array)$catego1 as $row1) {
                            if ($row1["id_material"]==$row["id_material"]) {
                              echo "<option value='".$row1['id_material']."' selected>".$row1['nombre']."</option>";
                            }else{
                              echo "<option value='".$row1['id_material']."'>".$row1['nombre']."</option>";
                            }

                          }

                        
               echo' </select>
               </div>

                 <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="employee_id" name="employee_id">
                  <input type="hidden" class="form-control" readonly value="'.$packing.'" id="employee_packing" name="employee_packing">
                  <input type="hidden" class="form-control" readonly value="'.$inab.'" id="inab" name="inab">
                  <input type="hidden" class="form-control" readonly value="'.$factura.'" id="factura" name="factura">
                </div>
                <div class="form-group">
                  <label for="codigo">Piezas</label>
                  <input type="text" class="form-control" value="'.$row["piezas"].'" id="piezas_t" name="piezas_t">
                </div>
                <div class="form-group">
                  <label for="codigo">Grueso</label>
                  <input type="text" class="form-control" value="'.$row["grueso"].'" id="grueso_t" name="grueso_t">
                </div>
                <div class="form-group">
                  <label for="codigo">Ancho</label>
                  <input type="text" class="form-control" value="'.$row["ancho"].'" id="ancho_t" name="ancho_t">
                </div>
                <div class="form-group">
                  <label for="codigo">Largo</label>
                  <input type="text" class="form-control" value="'.$row["largo"].'" id="largo_t" name="largo_t">
                </div>
                 <div class="form-group">
                  <label for="codigo">Multiplo</label>
                  <input type="text" class="form-control" value="'.$row["multiplo"].'" id="multiplo_t" name="multiplo_t">
                </div>
                <div class="form-group">
                  <label for="codigo">M<sup>3</sup></label>
                  <input type="text" class="form-control" readonly value="'.$row["metros_cubicos"].'" id="metros_cubicos_t" name="metros_cubicos_t">
                </div>
                 <div class="form-group">
                  <label for="codigo">Generar la Cantidad de:</label>
                  <input type="text" class="form-control" value="'.$row["cantidad"].'" id="cantidad_t" name="cantidad_t">
                </div>
                ';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
              </div>
            </form>
            <script>
              
    $(document).ready(function () {
    $("#multiplo_t").keyup(function () {

        var piezas = $("#piezas_t").val();

        var multiplo = $(this).val();
        var largo = $("#largo_t").val();

        var ancho = $("#ancho_t").val();
        var grueso = $("#grueso_t").val();
        var metro_cubico = (piezas * largo * ancho * grueso)/1000000000;
       
        $("#metros_cubicos_t").val(metro_cubico);
    });
});
            </script>