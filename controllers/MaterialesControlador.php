<?php 
require_once "../class/Usuario.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_Usuario=$_POST['id'];
	$nombre=$_POST['nombre'];
	$largo=$_POST['largo'];
	$ancho=$_POST['ancho'];
	$grosor=$_POST['grosor'];
	$m_cuadrados=$_POST['m_cuadrados'];
  	$id_TipoUsuario =$_POST['id_Tipo'];

	$Usuario = new Usuario();
	$Usuario->setNombre($nombre);
	$Usuario->setLargo($largo);
	$Usuario->setAncho($ancho);
	$Usuario->setGrosor($grosor);
	$Usuario->setM_cuadrados($m_cuadrados);
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
	$largo=$_POST['largo'];
	$ancho=$_POST['ancho'];
	$grosor=$_POST['grosor'];
	$m_cuadrados=$_POST['m_cuadrados'];
  	$id_TipoUsuario =$_POST['id_Tipo'];

	$Usuario = new Usuario();
	$Usuario->setNombre($nombre);
	$Usuario->setLargo($largo);
	$Usuario->setAncho($ancho);
	$Usuario->setGrosor($grosor);
	$Usuario->setM_cuadrados($m_cuadrados);
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