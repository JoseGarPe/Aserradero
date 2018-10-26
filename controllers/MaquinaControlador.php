<?php 
require_once "../class/Maquinas.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_maquina=$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
  	$id_bodega =$_POST['id_bodega'];

	$maquina = new Maquina();
	$maquina->setNombre($nombre);
	$maquina->setDescripcion($descripcion);
	$maquina->setId_bodega($id_bodega);
	$maquina->setId_maquina($id_maquina);
	$update=$maquina->update();

	if ($update==true) {
		header('Location: ../listas/Maquina.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Maquina.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_maquina =$_POST['id'];
	$maqui = new Maquina();
	$maqui->setId_maquina($id_maquina);
	$delete=$maqui->delete();
	if ($delete==true) {
		header('Location: ../listas/Maquina.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Maquina.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
  	$id_bodega =$_POST['id_bodeg'];

	$maqui = new Maquina();
	$maqui->setNombre($nombre);
	$maqui->setDescripcion($descripcion);
	$maqui->setId_bodega($id_bodega);
	$save=$maqui->save();
	if ($save==true) {
		header('Location: ../listas/Maquina.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Maquina.php?error=incorrecto');
	}
}

 ?>