<?php 
require_once "../class/DetalleProcesado.php";

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

$id_materia_prima=$_POST['id_materiaprima'];
$cantidad_materia_prima=$_POST['usar'];
$id_maquina=$_POST['id_maquina'];
$id_material_saliente=$_POST['id_materialsaliente'];
$cantidad_saliente=$_POST['cantidadsaliente'];
$rendimiento_esperado=$_POST['resperado'];
$id_bodega=$_POST['id_bodegag'];

	# code...
	$Detalle_procesado = new DetalleProcesado();
	$Detalle_procesado->setId_materia_prima($id_materia_prima);
	$Detalle_procesado->setCantidad_materia_prima($cantidad_materia_prima);
	$Detalle_procesado->setId_maquina($id_maquina);
	$Detalle_procesado->setId_material_saliente($id_material_saliente);
	$Detalle_procesado->setCantidad_saliente($cantidad_saliente);
	$Detalle_procesado->setRendimiento_esperado($rendimiento_esperado);
	$Detalle_procesado->setId_bodega($id_bodega);
	$save=$Detalle_procesado->save();
	if ($save==true) {
		header('Location: ../listas/ProcesarMaterial.php?success=correcto&materiaPrima='.$id_materia_prima.'');
		# code...
	}
	else{
		header('Location: ../listas/ProcesarMaterial.php?error=incorrecto');
	}
}

 ?>