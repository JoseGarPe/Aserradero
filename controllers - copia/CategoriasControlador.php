<?php 
require_once "../class/Categorias.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$Id_categoria =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$nave = new Categorias();
	$nave->setNombre($nombre);
	$nave->setDescripcion($descripcion);
	$nave->setId_categoria($Id_categoria);
	$update=$nave->update();
	if ($update==true) {
		header('Location: ../listas/Categorias.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Categorias.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$Id_categoria =$_POST['id'];
	$nave = new Categorias();
	$nave->setId_categoria($Id_categoria);
	$delete=$nave->delete();
	if ($delete==true) {
		header('Location: ../listas/Categorias.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Categorias.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$nave = new Categorias();
	$nave->setNombre($nombre);
	$nave->setDescripcion($descripcion);
	$save=$nave->save();
	if ($save==true) {
		header('Location: ../listas/Categorias.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Categorias.php?error=incorrecto');
	}
}

 ?>