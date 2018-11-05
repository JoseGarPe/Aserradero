<?php 
require_once "../class/Usuario.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_Usuario=$_POST['id'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$contrasena=$_POST['contrasena'];
  	$id_TipoUsuario =$_POST['id_Tipo'];

	$Usuario = new Usuario();
	$Usuario->setNombre($nombre);
	$Usuario->setApellido($apellido);
	$Usuario->setCorreo($correo);
	$Usuario->setTelefono($telefono);
	$Usuario->setContrasena($contrasena);
	$Usuario->setId_tipo_usuario($id_TipoUsuario);
	$Usuario->setId_usuario($id_Usuario);
	$update=$Usuario->update();

	if ($update==true) {
		header('Location: ../listas/Usuario.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Usuario.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_Usuario =$_POST['id'];
	$Usuario = new Usuario();
	$Usuario->setId_usuario($id_Usuario);
	$delete=$Usuario->delete();
	if ($delete==true) {
		header('Location: ../listas/Usuario.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Usuario.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$contrasena=$_POST['contrasena'];
  	$id_TipoUsuario =$_POST['id_Tipo'];

	$Usuario = new Usuario();
	$Usuario->setNombre($nombre);
	$Usuario->setApellido($apellido);
	$Usuario->setCorreo($correo);
	$Usuario->setTelefono($telefono);
	$Usuario->setContrasena($contrasena);
	$Usuario->setId_tipo_usuario($id_TipoUsuario);
	$save=$Usuario->save();
	if ($save==true) {
		header('Location: ../listas/Usuario.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Usuario.php?error=incorrecto');
	}
}

 ?>