<div class='input-group date' id='myDatepicker2'>
	<?php 
				 $codigo = $_POST['cod_banda'];
                                             require_once "Contenedor.php";
                                                 $material = new Contenedores();
                                  $catego = $material->selectOne($codigo);
                                  foreach ($catego as $key) {
                                  	$fechaPaquete=$key['fecha_ingreso'];
                                  }
                               echo ' <input type="text" class="form-control" name="fecha" id="fecha" value="'.$fechaPaquete.'"/>';
	 ?>	
                           
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>