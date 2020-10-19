<?php 
require_once "../class/Insumo.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_Insumos=$_POST['id'];
	$nombre_insumo=$_POST['nombre_insumo'];
	$stock=0.00;
  	$id_tipo_insumo =$_POST['id_tipo_insumo'];

	$Insumos = new Insumo();
	$Insumos->setNombre_insumo($nombre_insumo);
	$Insumos->setStock($stock);
	$Insumos->setId_tipo_insumo($id_tipo_insumo);
	$Insumos->setId_insumo($id_Insumos);
	$update=$Insumos->update();

	if ($update==true) {
		header('Location: ../listas/Insumos.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Insumos.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_material =$_POST['id'];
	$Insumos = new Insumo();
	$Insumos->setId_Insumos($id_material);
	$delete=$Insumos->delete();
	if ($delete==true) {
		header('Location: ../listas/Insumos.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Insumos.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre_insumo=$_POST['nombre'];
	$stock=0.00;
	
  	$id_tipo_insumo =$_POST['id_tipo_insumo'];

	$Insumos = new Insumo();
	$Insumos->setNombre_insumo($nombre_insumo);
	$Insumos->setStock($stock);
	$Insumos->setId_tipo_insumo($id_tipo_insumo);
	$save=$Insumos->save();
	if ($save==true) {
		if ($id_tipo_insumo==3) {
			header('Location: ../listas/subProductos.php?success=correcto');
		}else{
			header('Location: ../listas/Insumos.php?success=correcto');
		}
	}
	else{
		if ($id_tipo_insumo==3) {
		header('Location: ../listas/subProductos.php?error=incorrecto');
		}else{
		header('Location: ../listas/Insumos.php?error=incorrecto');
	}
  }
}

 ?>