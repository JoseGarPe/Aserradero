<?php 
require_once "../class/TrasladoPro.php";
require_once "../class/DetalleBodegaPro.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_TrasladoPro =$_POST['id'];
	$Bodega_origen=$_POST['Bodega_origen'];
	$Id_preset=$_POST['Id_preset'];
	$TrasladoPro = new TrasladoPro();
	$TrasladoPro->setBodega_origen($Bodega_origen);
	$TrasladoPro->setId_preset($Id_preset);
	$TrasladoPro->setId_traslado_pro($id_TrasladoPro);
	$update=$TrasladoPro->update();
	if ($update==true) {
		header('Location: ../listas/TrasladoPro.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/TrasladoPro.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_TrasladoPro =$_POST['id'];
	$TrasladoPro = new TrasladoPro();
	$TrasladoPro->setId_TrasladoPro($id_TrasladoPro);
	$delete=$TrasladoPro->delete();
	if ($delete==true) {
		header('Location: ../listas/TrasladoPro.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/TrasladoPro.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$Bodega_origen=$_POST['Bodega_origen'];
$Id_preset=$_POST['Id_preset'];
	$Bodega_destino=$_POST['Bodega_destino'];
	$cantidad=$_POST['cantidad'];
	$nombre_bodega = $_POST['nombre_origen'];

	# code...
	$TrasladoPro = new TrasladoPro();
	$TrasladoPro->setBodega_origen($Bodega_origen);
	$TrasladoPro->setId_preset($Id_preset);
	$TrasladoPro->setCantidad($cantidad);
	$TrasladoPro->setBodega_destino($Bodega_destino);
	$save=$TrasladoPro->save();
	if ($save==true) {

		$detalle_bo = new DetalleBodegaPro();
		$bodega_Disponible=$detalle_bo->selectCantidad_preset_bodega($Bodega_origen,$Id_preset);
		foreach ($bodega_Disponible as $key) {
			$disponible = $key['cantidad'];
		}
		$nueva_cantidad=$disponible - $cantidad;
		$detalle_bo->setId_bodega($Bodega_origen);
		$detalle_bo->setId_preset($Id_preset);
		$detalle_bo->setCantidad($nueva_cantidad);
		$save1=$detalle_bo->updateC();
		if ($save1 == true) {
			header('Location: ../listas/DetalleBodegas.php?id='.$Bodega_origen.'&nombre='.$nombre_bodega.'');
		}
		
		# code...
	}
	else{
		header('Location: ../listas/TrasladoPro.php?error=incorrecto');
	}
}

elseif ($accion=="confirmar") {
	$id_TrasladoPro =$_POST['id'];
	$estado =$_POST['estado'];
	$id =$_POST['pl'];
	$preset =$_POST['nombre_bodega'];
	$cantidad =$_POST['cantidad'];
	$Id_preset =$_POST['id_preset'];
	$TrasladoPro = new TrasladoPro();
	$TrasladoPro->setId_traslado_pro($id_TrasladoPro);
		$TrasladoPro->setEstado($estado);
	$delete=$TrasladoPro->update();
	if ($delete==true) {

			$detalle_bo = new DetalleBodegaPro();
		$bodega_Disponible=$detalle_bo->selectCantidad_preset_bodega($id,$Id_preset);
		foreach ($bodega_Disponible as $key) {
			$disponible = $key['cantidad'];
		}
		if ($disponible <=0) {

		$detalle_bo->setId_bodega($id);
		$detalle_bo->setId_preset($Id_preset);
		$detalle_bo->setCantidad($cantidad);
		$save1=$detalle_bo->save();

		}else{
		$nueva_cantidad=$disponible + $cantidad;
		$detalle_bo->setId_bodega($id);
		$detalle_bo->setId_preset($Id_preset);
		$detalle_bo->setCantidad($nueva_cantidad);
		$save1=$detalle_bo->updateC();

		}

		header('Location: ../listas/DetalleBodegas.php?success=correcto&id='.$id.'&nombre='.$preset.'');
		# code...
	}else{
		header('Location: ../listas/DetalleBodegas.php?error=incorrecto');
	}
}

 ?>