<?php 
require_once "../class/Presets.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_preset =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$nave = new Presets();
	$nave->setNombre($nombre);
	$nave->setDescripcion($descripcion);
	$nave->setid_preset($id_preset);
	$update=$nave->update();
	if ($update==true) {
		header('Location: ../listas/Presets.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Presets.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_preset =$_POST['id'];
	$nave = new Presets();
	$nave->setid_preset($id_preset);
	$delete=$nave->delete();
	if ($delete==true) {
		header('Location: ../listas/Presets.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Presets.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$nave = new Presets();
	$nave->setNombre($nombre);
	$nave->setDescripcion($descripcion);
	$save=$nave->save();
	if ($save==true) {
		header('Location: ../listas/Presets.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Presets.php?error=incorrecto');
	}
}

 ?>