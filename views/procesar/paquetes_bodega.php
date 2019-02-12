     <label class="control-label col-md-3 col-sm-3 col-xs-12">Etiqueta<span class="required">*</span>
                            </label>
                             <input id="etiqueta"  name="etiqueta" class="form-control col-md-7 col-xs-12"  type="text">
                             <br>
                             <br>
                             <div>
                            <div id="employee_table">
                              <table id="example5" class="table table-striped table-bordered" name="example5">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Etiqueta</th>
                           <th>Piezas Disponibles</th>                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $codigo = $_POST['cod_banda'];
                         require_once "Paquetes.php";
                         $misPacks = new Paquetes();
                         $catego = $misPacks->selectPack_Bodega($codigo);
                                              
                         foreach ((array)$catego as $row) {
                         echo '
                          <tr>
                          <td></td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['piezas'].'</td>
                           
                          </tr>
                         ';
                       }
                     
                     
                         ?>
                      </tbody>
                    </table>
                            </div>
              </div>
     
