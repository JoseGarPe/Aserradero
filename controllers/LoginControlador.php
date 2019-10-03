<?php
require_once "../class/Usuario.php";
$accion=$_GET['accion'];
if ($accion=="login") {
	$correo=$_POST['correo'];	
	$contraseña=$_POST['contraseña'];	
	$usua = new Usuario();
	$usua->setCorreo($correo);
	$usua->setContrasena($contraseña);
	$login=$usua->login();
	if ($login==1) {
		header('Location: ../listas/indexUs.php');
		# code...
	}
	elseif($login>1) {
		header('Location: ../listas/indexUs.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../index.php?error=incorrecto');
	}

}
elseif ($accion=="logout") {
	session_start();
	$usuario=$_SESSION['id_usuario'];
	$usua = new Usuario();
	$cerrar=$usua->LOGOUT($usuario);
	session_unset();
			session_destroy();
			
			header('Location: ../index.php?success=correcto');
			
		}



?>