<form role="form" action="../controllers/BodegaControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "../class/Bodegs.php";


         
							$codigo=$_POST["employee_id"];
					     $misBodegas = new Bodega();
                         $catego = $misBodegas->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '
                 <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="id" name="id">
                </div>
                <div class="form-group">
                  <label for="codigo">Nombre</label>
                  <input type="text" class="form-control" value="'.$row["nombre"].'" id="nombre" name="nombre">
                </div>
                  <div class="form-group">
                  <label for="codigo">Ubicacion</label>
                  <input type="text" class="form-control" value="'.$row["ubicacion"].'" id="ubicacion" name="ubicacion">
                </div>
                <div class="form-group">
                  <label for="nombre">Descripcion</label>
                  <input type="text" class="form-control" required="" value="'.$row["descripcion"].'" id="descripcion" name="descripcion" placeholder="Nombre">
                </div>';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Bodega.php'" name="cancel" value="Cancelar" >
              </div>
            </form>