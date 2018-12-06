<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Materia Prima <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<select  onchange="mostrarInfo1(this.value)" class="form-control" name="id_materiaprima" id="id_materiaprima">
                            		
                                <option value="5">Seleccione una opcion</option>
                             <?php 
                             $codigo = $_POST['cod_banda'];
                                             require_once "DetalleBodega.php";
                                                 $material = new DetalleBodega();
                                  $catego = $material->selectALLMP($codigo);
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_material']."'>".$row['material']."</option>";

                          }                 

                              ?>
                          </select>
                            </div>