<?php 
require_once "../class/Bodega.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_Bodega =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$Bodega = new Bodega();
	$Bodega->setNombre($nombre);
	$Bodega->setDescripcion($descripcion);
	$Bodega->setId_bodega($id_Bodega);
	$update=$Bodega->update();
	if ($update==true) {
		header('Location: ../listas/Bodega.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Bodega.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_Bodega =$_POST['id'];
	$Bodega = new Bodega();
	$Bodega->setId_bodega($id_Bodega);
	$delete=$Bodega->delete();
	if ($delete==true) {
		header('Location: ../listas/Bodega.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Bodega.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$Bodega = new Bodega();
	$Bodega->setNombre($nombre);
	$Bodega->setDescripcion($descripcion);
	$save=$Bodega->save();
	if ($save==true) {
		header('Location: ../listas/Bodega.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Bodega.php?error=incorrecto');
	}
}

 ?>