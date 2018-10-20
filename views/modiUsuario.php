<form role="form" action="../controllers/UsuarioControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "../class/Usuario.php";


         
							$codigo=$_POST["employee_id"];
					     $misUsuarios = new Usuario();
                         $catego = $misUsuarios->selectOne($codigo);
                        
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
                          <input type="text" value="'.$row["apellido"].'" name="apellido" id="apellido" class="form-control" />  
                </div>

                <div class="form-group">
                  <label>Correo</label>  
                          <input type="email" value="'.$row['correo'].'" placeholder="example@email.com" name="correo" id="correo" class="form-control" />  
                </div>

                <div class="form-group">
                  <input type="tel" placeholder="Ej: 22222222" pattern="[2,7]{1}\d{7}" name="telefono" value="'.$row['telefono'].'" id="telefono" oninvalid="setCustomValidity(\'Ingresar Formato Correcto Telefono\')" class="form-control" />
                </div>

                <div class="form-group">
                 <label>Contraseña</label>  
                          <input type="password" name="contrasena"  value="'.$row['correo'].'" id="contrasena" class="form-control"
                           />  
                           
                </div>
                  
                <div class="form-group">
                  <label class="input-group-text" for="inputGroupSelect01">Tipo De Usuario</label>
                           <br />
                           <select class="form-control" name="id_Tipo" id="id_Tipo"> 
                           



                          ';

                           require_once "../class/TipoUsuario.php";

                          $misTipoUsuarios = new TipoUsuario();
                         $cat = $misTipoUsuarios->selectALL();
                          foreach ((array)$cat as $col) {
                          		if ($row['id_tipo_usuario']== $col['id_tipo_usuario']) {
                          			
                          			echo "<option value='".$col['id_tipo_usuario']."' selected>".$col['nombre']."</option>";
                          		}else{
                            echo "<option value='".$col['id_tipo_usuario']."''>".$col['nombre']."</option>";
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
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Usuario.php'" name="cancel" value="Cancelar" >
              </div>
            </form>