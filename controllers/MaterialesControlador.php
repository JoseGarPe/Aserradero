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
		header('Location: ../listas/Materiales.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Materiales.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_categoria =$_POST['id'];
	$Materiales = new Materiales();
	$Materiales->setId_materiales($id_material);
	$delete=$Materiales->delete();
	if ($delete==true) {
		header('Location: ../listas/Materiales.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Materiales.php?error=incorrecto');
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
		header('Location: ../listas/Materiales.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Materiales.php?error=incorrecto');
	}
}

 ?>