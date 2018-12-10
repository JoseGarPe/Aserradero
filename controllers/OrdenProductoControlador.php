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


		$dbodega= new DetalleBodega();
		$desconta = $necesarios[$i]*$cantidad;
		$bodega_Disponible=$dbodega->selectMaterial_bodega($desconta,$id_material[$i]);
		foreach ($bodega_Disponible as $key) {
			$bodega_salida = $key['id_bodega'];
		}



		$detalle_orden= new DetalleOrden();
		$detalle_orden->setId_orden_producto($last_orden);
		$detalle_orden->setId_detalle_preset($id_detalle_preset[$i]);
		$detalle_orden->setId_bodega($bodega_salida);
		$desconta =0;
		}

		header('Location: ../listas/DetalleOrdenProducto.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/OrdenProducto.php?error=incorrecto');
	}
}

 ?>