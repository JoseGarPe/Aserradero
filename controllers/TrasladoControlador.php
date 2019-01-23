<?php 
require_once "../class/Traslado.php";
require_once "../class/DetalleBodega.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_traslado =$_POST['id'];
	$Bodega_origen=$_POST['Bodega_origen'];
	$Id_material=$_POST['Id_material'];
	$traslado = new Traslado();
	$traslado->setBodega_origen($Bodega_origen);
	$traslado->setId_material($Id_material);
	$traslado->setId_traslado($id_traslado);
	$update=$traslado->update();
	if ($update==true) {
		header('Location: ../listas/Traslado.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Traslado.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_traslado =$_POST['id'];
	$traslado = new Traslado();
	$traslado->setId_traslado($id_traslado);
	$delete=$traslado->delete();
	if ($delete==true) {
		header('Location: ../listas/Traslado.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Traslado.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$Bodega_origen=$_POST['Bodega_origen'];
$Id_material=$_POST['Id_material'];
	$Bodega_destino=$_POST['Bodega_destino'];
	$cantidad=$_POST['cantidad'];
	$nombre_bodega = $_POST['nombre_origen'];

	# code...
	$traslado = new Traslado();
	$traslado->setBodega_origen($Bodega_origen);
	$traslado->setId_material($Id_material);
	$traslado->setCantidad($cantidad);
	$traslado->setBodega_destino($Bodega_destino);
	$save=$traslado->save();
	if ($save==true) {

		$detalle_bo = new DetalleBodega();
		$bodega_Disponible=$detalle_bo->selectCantidad_material_bodega($Bodega_origen,$Id_material);
		foreach ($bodega_Disponible as $key) {
			$disponible = $key['cantidad'];
		}
		$nueva_cantidad=$disponible - $cantidad;
		$detalle_bo->setId_bodega($Bodega_origen);
		$detalle_bo->setId_material($Id_material);
		$detalle_bo->setCantidad($nueva_cantidad);
		$save1=$detalle_bo->updateC();
		if ($save1 == true) {
			header('Location: ../listas/DetalleBodegas.php?id='.$Bodega_origen.'&nombre='.$nombre_bodega.'');
		}
		
		# code...
	}
	else{
		header('Location: ../listas/Traslado.php?error=incorrecto');
	}
}

elseif ($accion=="confirmar") {
	$id_traslado =$_POST['id'];
	$estado =$_POST['estado'];
	$id =$_POST['pl'];
	$preset =$_POST['nombre_bodega'];
	$cantidad =$_POST['cantidad'];
	$Id_material =$_POST['id_material'];
	$traslado = new Traslado();
	$traslado->setId_traslado($id_traslado);
		$traslado->setEstado($estado);
	$delete=$traslado->update();
	if ($delete==true) {

			$detalle_bo = new DetalleBodega();
		$bodega_Disponible=$detalle_bo->selectCantidad_material_bodega($id,$Id_material);
		foreach ($bodega_Disponible as $key) {
			$disponible = $key['cantidad'];
		}
		if ($disponible <=0) {

		$detalle_bo->setId_bodega($id);
		$detalle_bo->setId_material($Id_material);
		$detalle_bo->setCantidad($cantidad);
		$save1=$detalle_bo->save();

		}else{
		$nueva_cantidad=$disponible + $cantidad;
		$detalle_bo->setId_bodega($id);
		$detalle_bo->setId_material($Id_material);
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