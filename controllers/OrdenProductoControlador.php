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
elseif ($accion=="error") {
	$id_OrdenProducto =$_POST['id'];
	$estado =$_POST['estado'];
	$fase =$_POST['fase'];
	$id =$_POST['pl'];
	$preset =$_POST['preset'];
	// actualizar bodega
	$id_bodega=$_POST['bodega'];
	$id_material=$_POST['material'];
	// datos para actualizar la cantidad usada
	$id_do= $_POST['id_do'];
	$count_materiales = count($id_do);
	$repuesto=$_POST['repuesto'];
$tm=$_POST['total'];
	$i=0;
		while ($i<$tm) {
		if ($repuesto[$i]=="" || $repuesto[$i]=="0") {
		
		$i=$i+1;
		}else{		
			$detalle_orden= new DetalleOrden();
			$orden= $detalle_orden->selectOne($id_do[$i]);
			foreach ($orden as $key) {
				$anterior = $key['cantidad_utilizado'];
			}
			$nueva_cantidad1=$anterior+$repuesto[$i];
			$detalle_orden->setCantidad_utilizada($nueva_cantidad1);
			$detalle_orden->setId_detalle_orden($id_do[$i]);
			$detalle_orden->updateUtilizado();

			$detalle_bo = new DetalleBodega();
			$bodega_Disponible=$detalle_bo->selectCantidad_material_bodega($id_bodega[$i],$id_material[$i]);
			foreach ($bodega_Disponible as $key) {
				$disponible = $key['cantidad'];
			}
			$actualizar_cantidad = $disponible-$repuesto[$i];
		$detalle_bo->setId_bodega($id_bodega[$i]);
		$detalle_bo->setId_material($id_material[$i]);
		$detalle_bo->setCantidad($actualizar_cantidad);
		$save1=$detalle_bo->updateC();

			$i=$i+1;
			$nueva_cantidad1=0;
		}
	}
	if ($save1==true) {
		header('Location: ../listas/confirmarOrden.php?success=correcto&id='.$id.'&preset='.$preset.'');
		# code...
	}else{
		header('Location: ../listas/OrdenProducto.php?error=incorrecto');
	}
}
elseif ($accion=="calculo") {
	$seleccion=$_POST['seleccion'];

	$id_preset=$_POST['id_preset'];
	$nombre_preset=$_POST['nombre_preset'];
$id_bodega=$_POST['id_bodega_mp'];
	// MATERIALES USADOS
$id_material=$_POST['id_material'];
$count_materiales = count($id_material);
$necesarios = $_POST['necesaria'];
$posibles;
$i=0;
while ($i<$count_materiales) {
$detalle_bo = new DetalleBodega();
			$bodega_Disponible=$detalle_bo->selectCantidad_material_bodega($id_bodega[$i],$id_material[$i]);
			foreach ($bodega_Disponible as $key) {
				$disponible = $key['cantidad'];
			}
if ($seleccion==1) {
	$cont = $disponible / $necesarios[$i];
	$posibles[$i]=$cont;
	$cont=0;
	$i=$i+1;	
}

}

if ($seleccion ==1) {
	$minimo = min($posibles);
	header('Location: ../listas/CalculoCreacion.php?success=correcto&id='.$id_preset.'&preset='.$nombre_preset.'&cantidad='.intval($minimo).'');
}
	
/*
	if ($delete==true) {
		
		# code...
	}else{
		header('Location: ../listas/OrdenProducto.php?error=incorrecto');
	}*/
}

 ?>