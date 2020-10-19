<?php 
require_once "../class/Materiales.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_materiales=$_POST['id'];
	$nombre=$_POST['nombre'];
	$largo=$_POST['largo'];
	$ancho=$_POST['ancho'];
	$grueso=$_POST['grueso'];
	$m_cuadrados=$_POST['m_cuadrados'];
  	$id_categoria =$_POST['id_categoria'];

	$Materiales = new Materiales();
	$Materiales->setNombre($nombre);
	$Materiales->setLargo($largo);
	$Materiales->setAncho($ancho);
	$Materiales->setGrueso($grueso);
	$Materiales->setM_cuadrados($m_cuadrados);
	$Materiales->setId_categoria($id_categoria);
	$Materiales->setId_materiales($id_materiales);
	$update=$Materiales->update();

	if ($update==true) {
			if ($id_categoria==1) {
			header('Location: ../listas/MaterialesProcesados.php?success=correcto');
		}else{
			header('Location: ../listas/Materiales.php?success=correcto');
		}
	}else{
		if ($id_categoria==1) {
		header('Location: ../listas/MaterialesProcesados.php?error=incorrecto');
		}else{
		header('Location: ../listas/Materiales.php?error=incorrecto');	
		}
	}

}
elseif ($accion=="eliminar") {
	$id_material =$_POST['id'];
	$id_categoria =$_POST['id_categoria'];
	$Materiales = new Materiales();
	$Materiales->setId_materiales($id_material);
	$delete=$Materiales->delete();
	if ($delete==true) {
		if ($id_categoria==1) {
			header('Location: ../listas/MaterialesProcesados.php?success=correcto');
		}else{
			header('Location: ../listas/Materiales.php?success=correcto');
		}
	}else{
		if ($id_categoria==1) {
		header('Location: ../listas/MaterialesProcesados.php?error=incorrecto');
		}else{
		header('Location: ../listas/Materiales.php?error=incorrecto');	
		}
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
	$largo=$_POST['largo'];
	$ancho=$_POST['ancho'];
	$grueso=$_POST['grueso'];
	$m_cuadrados=$_POST['m_cuadrados'];
  	$id_categoria =$_POST['id_categoria'];

	$Materiales = new Materiales();
	$Materiales->setNombre($nombre);
	$Materiales->setLargo($largo);
	$Materiales->setAncho($ancho);
	$Materiales->setGrueso($grueso);
	$Materiales->setM_cuadrados($m_cuadrados);
	$Materiales->setId_categoria($id_categoria);
	$save=$Materiales->save();
	if ($save==true) {
		if ($id_categoria==1) {
			header('Location: ../listas/MaterialesProcesados.php?success=correcto');
		}else{
			header('Location: ../listas/Materiales.php?success=correcto');
		}
	}
	else{
		if ($id_categoria==1) {
		header('Location: ../listas/MaterialesProcesados.php?error=incorrecto');
		}else{
		header('Location: ../listas/Materiales.php?error=incorrecto');	
		}
		
	}
}

 ?>