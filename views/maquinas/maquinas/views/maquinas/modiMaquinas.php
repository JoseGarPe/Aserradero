<form role="form" action="../controllers/UsuarioControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "Maquinas.php";


         
							$codigo=$_POST["employee_id"];
					     $misMaquinas = new Usuario();
                         $catego = $misMaquinas->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '
                 <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="id" name="id">
                </div>
                
                <div class="form-group">
                 <label>Nombre</label>  
                          <input type="text" value="'.$row["nombre"].'" name="nombre" id="nombre" class="form-control" />  
                </div>

                <div class="form-group">
                 <label>Apellido</label>  
                          <input type="text" value="'.$row["descripcion"].'" name="apellido" id="apellido" class="form-control" />  
                </div>
                  
                <div class="form-group">
                  <label class="input-group-text" for="inputGroupSelect01">Tipo De Usuario</label>
                           <br />
                           <select class="form-control" name="id_Tipo" id="id_Tipo"> 
                           



                          ';

                           require_once "Bodega.php";

                          $misBodegas = new Bodega();
                         $cat = $misBodegas->selectALL();
                          foreach ((array)$cat as $col) {
                          		if ($row['id_bodega']== $col['id_bodega']) {
                          			
                          			echo "<option value='".$col['id_bodega']."' selected		>".$col['nombre']."</option>";
                          		}else{
                            echo "<option value='".$col['id_bodega']."''>".$col['nombre']."</option>";
                            }                           	
                        } 
                        echo '</select>
                        <br/>
                </div>';

                         }


 					?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Maquinas.php'" name="cancel" value="Cancelar" >
              </div>
            </form>