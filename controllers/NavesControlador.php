<?php 
require_once "../class/Naves.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_nave =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$nave = new Naves();
	$nave->setNombre($nombre);
	$nave->setDescripcion($descripcion);
	$nave->setId_nave($id_nave);
	$update=$nave->update();
	if ($update==true) {
		header('Location: ../listas/Naves.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Naves.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_nave =$_POST['id'];
	$nave = new Naves();
	$nave->setId_nave($id_nave);
	$delete=$nave->delete();
	if ($delete==true) {
		header('Location: ../listas/Naves.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Naves.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$nave = new Naves();
	$nave->setNombre($nombre);
	$nave->setDescripcion($descripcion);
	$save=$nave->save();
	if ($save==true) {
		header('Location: ../listas/Naves.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Naves.php?error=incorrecto');
	}
}

 ?>