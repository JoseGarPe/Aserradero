<?php 
require_once "../class/DetalleProducto.php";
require_once "../class/DetalleBodega.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_Bodega =$_POST['id'];
	$nombre=$_POST['nombre'];
$ubicacion=$_POST['ubicacion'];
	$descripcion=$_POST['descripcion'];
	$Bodega = new Bodega();
	$Bodega->setNombre($nombre);
	$Bodega->setUbicacion($ubicacion);
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

$Id_preset=$_POST['id_preset'];
$Cantidada=$_POST['usar'];
$Bodega_salida=$_POST['bodega_salida'];
$idbodega=$_POST['id_bodega'];

$disponibles=$_POST['c_disponible'];
$id_materiala=$_POST['id_material'];

$estado="Sin Confirmar";
$nueva_cantidad = $disponibles - $Cantidada;

	# code...
	$Detalle_producto = new DetalleProducto();
	$Detalle_producto->setId_preset($Id_preset);
	$Detalle_producto->setCantidada($Cantidada);
	$Detalle_producto->setBodega_salida($Bodega_salida);
	$Detalle_producto->setId_bodega($idbodega);
	$Detalle_producto->setEstado($estado);
	$save=$Detalle_producto->save();
	if ($save==true) {
		$detalle_bo= new DetalleBodega();
		$detalle_bo->setId_bodega($id_bodega);
		$detalle_bo->setId_material($id_materiala);
		$detalle_bo->setCantidad($nueva_cantidad);
		$save1=$detalle_bo->updateC();

		header('Location: ../listas/ProcesarMaterial.php?success=correcto&materiaPrima='.$Id_preset.'');
		# code...
	}
	else{
		header('Location: ../listas/ProcesarMaterial.php?error=incorrecto');
	}
}
elseif ($accion=="confirmar") {
	$id_Detalle_producto =$_POST['id'];
	$estado =$_POST['estado'];
	$pl =$_POST['pl'];
	$piezas=$_POST['piezas'];
	$id_material=$_POST['material'];
	$id_bodega=$_POST['id_bodega'];
	$nombre =$_POST['nombre'];

	$Contenedor = new DetalleProducto();
	$Contenedor->setId_Detalle_producto($id_Detalle_producto);
	$Contenedor->setEstado($estado);
	$delete=$Contenedor->confirm();
	if ($delete==true) {
		

		$detalle_bo= new DetalleBodega();
		$detalle_bo->setId_bodega($id_bodega);
		$detalle_bo->setId_material($id_material);
		$detalle_bo->setCantidad($piezas);
		$save1=$detalle_bo->save();
		header('Location: ../listas/DetalleMaterialProcesado.php?success=correcto&id='.$pl.'&nombre='.$nombre.'');
		# code...
	}else{
		header('Location: ../listas/DetalleMaterialProcesado.php?error=incorrecto&id='.$pl.'&id='.$id_bodega.'&id='.$id_material.'&id='.$estado.'&id='.$piezas.'');
	}
}

 ?>