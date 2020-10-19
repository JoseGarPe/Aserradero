<?php 
require_once "../class/Movimiento.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_movimientos=$_POST['id'];
	$cantidad=$_POST['cantidad'];
	$id_insumo=0.00;
  	$id_tipo_Movimiento =1;

	$Movimientos = new Movimiento();
	$Movimientos->setCantidad($cantidad);
	$Movimientos->setId_insumo($id_insumo);
	$Movimientos->setId_tipo_movimiento($id_tipo_Movimiento);
	$Movimientos->setId_movimiento($id_movimientos);
	$update=$Movimientos->update();

	if ($update==true) {
		header('Location: ../listas/Movimientos.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Movimientos.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_material =$_POST['id'];
	$Movimientos = new Movimiento();
	$Movimientos->setId_movimientos($id_material);
	$delete=$Movimientos->delete();
	if ($delete==true) {
		header('Location: ../listas/Movimientos.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Movimientos.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$cantidad=$_POST['cantidad'];
	$id_insumo=$_POST['id_insumo'];
	$fecha=$_POST['fecha'];
	if (isset($_POST['id_tipo_movimiento'])) {
		$id_tipo_Movimiento =$_POST['id_tipo_movimiento'];
			$Movimientos = new Movimiento();
			$Movimientos->setCantidad($cantidad);
			$Movimientos->setFecha($fecha);
			$Movimientos->setId_insumo($id_insumo);
			$Movimientos->setId_tipo_movimiento($id_tipo_Movimiento);
			$save=$Movimientos->saveSub();
	}else{
		$id_tipo_Movimiento =1;	
		$Movimientos = new Movimiento();
		$Movimientos->setCantidad($cantidad);
		$Movimientos->setFecha($fecha);
		$Movimientos->setId_insumo($id_insumo);
		$Movimientos->setId_tipo_movimiento($id_tipo_Movimiento);
		$save=$Movimientos->save();
	}


	if ($save==true) {
		header('Location: ../listas/Movimientos.php?success=correcto&id_insumo='.$id_insumo.'');
		# code...
	}
	else{
		header('Location: ../listas/Movimientos.php?error=incorrecto&id_insumo='.$id_insumo.'');
	}
}

 ?>