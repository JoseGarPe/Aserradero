<?php 
require_once "../class/Especificacion.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_especificacion =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$espe = new Especificacion();
	$espe->setNombre($nombre);
	$espe->setDescripcion($descripcion);
	$espe->setId_especificacion($id_especificacion);
	$update=$espe->update();
	if ($update==true) {
		header('Location: ../listas/Especificacion.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Especificacion.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_especificacion =$_POST['id'];
	$espe = new Especificacion();
	$espe->setId_especificacion($id_especificacion);
	$delete=$espe->delete();
	if ($delete==true) {
		header('Location: ../listas/Especificacion.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Especificacion.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$espe = new Especificacion();
	$espe->setNombre($nombre);
	$espe->setDescripcion($descripcion);
	$save=$espe->save();
	if ($save==true) {
		header('Location: ../listas/Especificacion.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Especificacion.php?error=incorrecto');
	}
}

 ?>