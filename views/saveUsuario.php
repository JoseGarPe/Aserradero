<form method="post" id="insert_form" action="../controllers/UsuarioControlador.php?accion=guardar">

                          <label>Nombre</label>  
                          <input type="text" name="nombre" id="nombre" class="form-control" />  
                          <br /> 
                          <label>Apellido</label>  
                          <input type="text" name="apellido" id="apellido" class="form-control" />  
                          <br /> 
                          <label>Correo</label>  
                          <input type="email" placeholder="example@email.com" name="correo" id="correo" class="form-control" />  
                          <br /> 
                          <label>Telefono</label>  
                          <input type="tel" placeholder="Ej: 22222222" pattern="[2,7]{1}\d{7}" name="telefono" id="telefono" oninvalid="setCustomValidity('Ingresar Formato Correcto Telefono')" class="form-control" />  
                          <br />  
                          <label>Contraseña</label>  
                          <input type="password" name="contrasena" id="contrasena" class="form-control"
                           />  
                          <br /> 
                           <label>Confirmar Contraseña</label>  
                          <input type="password" name="con_contrasena" id="con_contrasena" class="form-control" required />  
                          <br /> 

                           <label class="input-group-text" for="inputGroupSelect01">Tipo De Usuario</label>
                           <br />
                           <select class="form-control" name="id_Tipo" id="id_Tipo">
                          <?php 

                          require_once "../class/TipoUsuario.php";

                          $misTipoUsuarios = new TipoUsuario();
                         $catego = $misTipoUsuarios->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_tipo_usuario']."'>".$row['nombre']."</option>";

                          } 

                    
                          ?>
                          </select>


                          <br />  

                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="hidden" name="guardar" id="guardar" />  
                         
                         
                         
                         
                          <span class="add-on"><i class="glyphicon glyphicon-plus"></i></span>
                           <input type="submit" name="insert" id="insert"  value="Agregar Usuario" class="btn btn-success "/>

                         
                       
</form>

<script type="text/javascript">
var password = document.getElementById("contrasena")
  , confirm_password = document.getElementById("con_contrasena");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Contraseña no conciden");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>