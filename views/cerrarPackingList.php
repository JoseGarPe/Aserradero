<form role="form" action="../controllers/PackingControlador.php?accion=Cerrar" method="POST">
              <div class="box-body">
<?php 
require_once "../class/PackingList.php";
require_once "../class/Contenedor.php";


         
							$codigo=$_POST["employee_id"];
					     $conte = new Contenedores();
               $listo = $conte->selectALLpack3($codigo);
               foreach ($listo as $key) {
                 $posee = $key['posee'];
               }
               if ($posee != 0 ) {
                 echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">ERROR:</span>
              No es posible finalizar este proceso, pues posee contenedores sin confirmar de esta orden.
           </diV>

              </div>
              <div class="box-footer">
                
               
              </div>
            </form>  
           ';
               }else{
                if (isset($_POST['employee_flag'])) {
              $badnera=$_POST['employee_flag'];
                
                $packin = new Packing();

                         $paquetess = $packin->selectEtiquetas_null($codigo);
                         foreach ($paquetess as $keys) {
                           $etiquetaS_null=$keys['etiquetas_null'];
                         }
                         if ($etiquetaS_null==0) {
                           
                $packin = new Packing();

                         $catego = $packin->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                            echo '

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Fecha Cierre<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group date" id="myDatepicker2">
                            <input type="text" class="form-control" name="fecha" id="fecha" required/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                           </div>
                        </div>
                      </div>

                            <label>¿Desea Finalizar esta orden por barco '.$row['numero_factura'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_packing_list'].'"/>';
                          if (isset($_POST['employee_flag'])) {
                          echo ' <input type="hidden" name="bandera" id="bandera" value="Local"/>  
                          '.$_POST['employee_flag'].'';
                          }
                           echo ' <input type="hidden" name="estado" id="estado" value="Cerrado"/>  
                             </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
              </div>
            </form>         
                
                ';}
                         }else{
                             echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">ERROR:</span>
              No es posible finalizar este proceso, pues posee paquetes sin etiquetas de esta orden.
           </diV>

              </div>
              <div class="box-footer">
                
               
              </div>
            </form>  
           ';
                         }
                }else{

                $packin = new Packing();

                         $catego = $packin->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                          $ingresados = $row['contenedores_ingresados'];
                          $esperados= $row['total_contenedores'];


                           if ($ingresados == $esperados) {
                           if ($row['correlativo'] != '00-00' && $row['poliza']!="") {
                            
                            echo '

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nfactura">Fecha Cierre<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group date" id="myDatepicker2">
                            <input type="text" class="form-control" name="fecha" id="fecha" required/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                           </div>
                        </div>
                      </div>

                            <label>¿Desea Finalizar esta orden '.$row['numero_factura'].'?</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_packing_list'].'"/>';
                         
                          echo ' <input type="hidden" name="bandera" id="bandera" value="Local"/>  
                          '.$_POST['employee_flag'].'
                           <input type="hidden" name="estado" id="estado" value="Cerrado"/>  
                             </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
              </div>
            </form>         
                
                ';
                            }else{

                              echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">ERROR:</span>
              No es posible finalizar este proceso, no ha ingresado la poliza ni el correlativo de este encargo.
           </diV>

              </div>
              <div class="box-footer">
                
               
              </div>
            </form>  
           ';
                            }
                            
                          }else{
                              echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">ERROR:</span>
              No es posible finalizar este proceso, pues posee Contenedores faltantes o sin registrar.
           </diV>

              </div>
              <div class="box-footer">
                
               
              </div>
            </form>  
           ';
                          }




                         }
                // foreach

                }

               }
               

                         


 ?>
    <script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });

  
</script>
  