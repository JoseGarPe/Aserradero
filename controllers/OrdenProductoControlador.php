<?php 
require_once "../class/OrdenProducto.php";
require_once "../class/DetalleOrden.php";
require_once "../class/DetalleBodega.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_preset =$_POST['id'];
	$id_bodega=$_POST['id_bodega'];
	$Cantidad=$_POST['Cantidad'];
	$orden_producto = new OrdenProducto();
	$orden_producto->setId_bodega($id_bodega);
	$orden_producto->setCantidad($Cantidad);
	$orden_producto->setId_preset($id_OrdenProducto);
	$update=$orden_producto->update();
	if ($update==true) {
		header('Location: ../listas/OrdenProducto.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/OrdenProducto.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_OrdenProducto =$_POST['id'];
	$orden_producto = new DetallePreset();
	$orden_producto->setId_detalle_preset($id_OrdenProducto);
	$delete=$orden_producto->delete();
	if ($delete==true) {
		header('Location: ../../listas/DetalleOrdenProducto.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/OrdenProducto.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	//orden de producto
	$id_preset=$_POST['id_preset'];
	$nombre_preset=$_POST['nombre_preset'];
	$cantidad=$_POST['cantidad'];
	$id_bodega=$_POST['id_bodega'];
	$estado="Sin Confirmar";
	$fase="NULL";

// MATERIALES USADOS
$id_material=$_POST['id_material'];
$count_materiales = count($id_material);
$necesarios = $_POST['necesaria'];
$i=0;
//detalle orden
$id_detalle_preset=$_POST['id_d_p'];
$id_bodega_descuenta=$_POST['id_bodega_mp'];


		$orden_producto= new OrdenProducto();
		$orden_producto->setId_bodega($id_bodega);
		$orden_producto->setCantidad($cantidad);
		$orden_producto->setId_preset($id_preset);
		$orden_producto->setEstado($estado);
		$orden_producto->setFase($fase);
		$save1=$orden_producto->save();

		$orden_ul=$orden_producto->selectLast();
		foreach ($orden_ul as $value) {
			$last_orde=$value['id_orden_producto'];
		}
 if ($save1==true) {
		while ($i<$count_materiales) {


		$detalle_bo = new DetalleBodega();
		$bodega_Disponible=$detalle_bo->selectCantidad_material_bodega($id_bodega_descuenta[$i],$id_material[$i]);
		foreach ($bodega_Disponible as $key) {
			$disponible = $key['cantidad'];
		}

		$cantidad_nece = $necesarios[$i]* $cantidad;
		$nueva_cantidad=$disponible - $cantidad_nece;

		$detalle_orden= new DetalleOrden();
		$detalle_orden->setId_orden_producto($last_orde);
		$detalle_orden->setId_detalle_preset($id_detalle_preset[$i]);
		$detalle_orden->setId_bodega($id_bodega_descuenta[$i]);
		$detalle_orden->setCantidad_utilizada($cantidad_nece);
		$save_detalleorden=$detalle_orden->save();


	
		$detalle_bo->setId_bodega($id_bodega_descuenta[$i]);
		$detalle_bo->setId_material($id_material[$i]);
		$detalle_bo->setCantidad($nueva_cantidad);
		$save1=$detalle_bo->updateC();
		$cantidad_nece=0;
		$i=$i+1;

		}

		header('Location: ../listas/DetalleProducto.php?success=correcto&id='.$id_preset.'&preset='.$nombre_preset.'');
		# code...
	}
	else{
		header('Location: ../listas/DetalleProducto.php?error=incorrecto');
	}
}

elseif ($accion=="confirmar") {
	$id_OrdenProducto =$_POST['id'];
	$estado =$_POST['estado'];
	$fase =$_POST['fase'];
	$id =$_POST['pl'];
	$preset =$_POST['preset'];
	$orden_producto = new OrdenProducto();
	$orden_producto->setId_orden_producto($id_OrdenProducto);
		$orden_producto->setEstado($estado);
		$orden_producto->setFase($fase);
	$delete=$orden_producto->changeStatus();
	if ($delete==true) {
		header('Location: ../listas/confirmarOrden.php?success=correcto&id='.$id.'&preset='.$preset.'');
		# code...
	}else{
		header('Location: ../listas/OrdenProducto.php?error=incorrecto');
	}
}

elseif ($accion=="fase") {
	$id_OrdenProducto =$_POST['id'];
	$fase =$_POST['fase'];
	$id =$_POST['pl'];
	$preset =$_POST['preset'];
	$orden_producto = new OrdenProducto();
	$orden_producto->setId_orden_producto($id_OrdenProducto);
		$orden_producto->setFase($fase);
	$delete=$orden_producto->changePhase();
	if ($delete==true) {
		header('Location: ../listas/cambio_fase.php?success=correcto&id='.$id.'&preset='.$preset.'');
		# code...
	}else{
		header('Location: ../listas/OrdenProducto.php?error=incorrecto');
	}
}


 ?>