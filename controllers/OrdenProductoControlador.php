<?php 
require_once "../class/OrdenProducto.php";

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
	$cantidad=$_POST['cantidad'];
	$id_bodega=$_POST['id_bodega'];
	$estado="Sin Confirmar";
	$fase="NULL";

// MATERIALES USADOS
$id_bodega_m=$_POST['id_bodega_m'];
$id_material=$_POST['id_material'];
$count_materiales = count($id_material);
$i=0;


		$orden_producto= new DetallePreset();
		$orden_producto->setId_bodega($id_bodega);
		$orden_producto->setCantidad($cantidad);
		$orden_producto->setId_preset($id_preset);
		$save1=$orden_producto->save();
		$i=$i+1;
	
		
	if ($save1==true) {
		header('Location: ../listas/DetalleOrdenProducto.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/OrdenProducto.php?error=incorrecto');
	}
}

 ?>