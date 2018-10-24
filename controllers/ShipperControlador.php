<?php 
require_once "../class/Shipper.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_shipper =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$shipper = new Shipper();
	$shipper->setNombre($nombre);
	$shipper->setDescripcion($descripcion);
	$shipper->setId_shipper($id_shipper);
	$update=$shipper->update();
	if ($update==true) {
		header('Location: ../listas/Shipper.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Shipper.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_shipper =$_POST['id'];
	$shipper = new Shipper();
	$shipper->setId_shipper($id_shipper);
	$delete=$shipper->delete();
	if ($delete==true) {
		header('Location: ../listas/Shipper.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Shipper.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$shipper = new Shipper();
	$shipper->setNombre($nombre);
	$shipper->setDescripcion($descripcion);
	$save=$shipper->save();
	if ($save==true) {
		header('Location: ../listas/Shipper.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Shipper.php?error=incorrecto');
	}
}

 ?>