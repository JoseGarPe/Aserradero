<?php 
require_once "../class/Traslado.php";

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
	$Bodega_origen=$_POST['bodega_origen'];
$Id_material=$_POST['Id_material'];
	$Bodega_destino=$_POST['bodega_destino'];
	$cantidad=$_POST['cantidad'];

	# code...
	$traslado = new Traslado();
	$traslado->setBodega_origen($Bodega_origen);
	$traslado->setId_material($Id_material);
	$traslado->setCantidad($cantidad);
	$traslado->setBodega_destino($Bodega_destino);
	$save=$traslado->save();
	if ($save==true) {
		header('Location: ../listas/Traslado.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Traslado.php?error=incorrecto');
	}
}

 ?>