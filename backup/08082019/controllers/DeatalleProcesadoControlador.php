<?php 
require_once "../class/DetalleProcesado.php";
require_once "../class/DetalleBodega.php";

require_once "../class/Paquetes.php";

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


$id_materia_prima=$_POST['id_m'];
//$cantidad_materia_prima=$_POST['usar'];
$id_maquina=$_POST['id_maquina'];
$id_material_saliente=$_POST['id_materialsaliente'];
$cantidad_saliente=$_POST['cantidadsaliente'];
$rendimiento_esperado=$_POST['resperado'];
$id_bodega=$_POST['id_bodegag'];
$disponibles=$_POST['c_disponible'];

$id_bodega_mp=$_POST['id_bodega'];
$etiqueta = $_POST['etiqueta'];
$estado="Confirmado";

// segundo material saliente
if ( $_POST['id_materialsaliente2'] != null) {
	$segundaOpcion = true;
	$id_material_saliente2=$_POST['id_materialsaliente2'];
$cantidad_saliente2=$_POST['cantidadsaliente2'];
$rendimiento_esperado2=$_POST['resperado2'];
$id_bodega2=$_POST['id_bodegag2'];
}else{
	$segundaOpcion=false;
}

		$pack = new Paquetes();
		$paquete= $pack->selectOneM($etiqueta);
		foreach ($paquete as $ky) {
			$material11=$ky['id_material'];
			$cantidadPiezas = $ky['piezas'];
		}
$nueva_cantidad = $disponibles - $cantidadPiezas;

	# code...
	$Detalle_procesado = new DetalleProcesado();
	$Detalle_procesado->setId_materia_prima($id_materia_prima);
	$Detalle_procesado->setCantidad_materia_prima($cantidadPiezas);
	$Detalle_procesado->setId_maquina($id_maquina);
	$Detalle_procesado->setId_material_saliente($id_material_saliente);
	$Detalle_procesado->setCantidad_saliente($cantidad_saliente);
	$Detalle_procesado->setRendimiento_esperado($rendimiento_esperado);
	$Detalle_procesado->setId_bodega($id_bodega);
	$Detalle_procesado->setEstado($estado);
	$save=$Detalle_procesado->save();
	if ($save==true) {


		$detalle_bo= new DetalleBodega();
		$detalle_bo->setId_bodega($id_bodega_mp);
		$detalle_bo->setId_material($material11);
		$detalle_bo->setCantidad($nueva_cantidad);
		$save1=$detalle_bo->updateC();
		$piezaaa = 0;
		$pack->setEtiqueta($etiqueta);
		$pack->setId_material($material11);
		$pack->setPiezas($piezaaa);
		$save11=$pack->updateC();

		$detalle_bo->setId_bodega($id_bodega);
		$detalle_bo->setId_material($id_material_saliente);
		$detalle_bo->setCantidad($cantidad_saliente);
		$save2=$detalle_bo->save();

		if ($segundaOpcion==true) {
		$Detalle_procesado->setId_materia_prima($id_materia_prima);
		$Detalle_procesado->setCantidad_materia_prima($cantidadPiezas);
		$Detalle_procesado->setId_maquina($id_maquina);
		$Detalle_procesado->setId_material_saliente($id_material_saliente2);
		$Detalle_procesado->setCantidad_saliente($cantidad_saliente2);
		$Detalle_procesado->setRendimiento_esperado($rendimiento_esperado);
		$Detalle_procesado->setId_bodega($id_bodega2);
		$Detalle_procesado->setEstado($estado);
		$save=$Detalle_procesado->save();

		$detalle_bo->setId_bodega($id_bodega2);
		$detalle_bo->setId_material($id_material_saliente2);
		$detalle_bo->setCantidad($cantidad_saliente2);
		$save3=$detalle_bo->save();
		}

		
		header('Location: ../listas/ProcesarMaterial.php');
		# code... header('Location: ../listas/ProcesarMaterial.php?success=correcto&materiaPrima='.$id_bodega_mp.'&materia2='.$id_materia_prima.'&materia1='.$disponibles.'&materia2='.$cantidad_materia_prima.'');
	}
	else{
		header('Location: ../listas/ProcesarMaterial.php?error=incorrecto');
	}
}
elseif ($accion=="confirmar") {
	$id_detalle_procesado =$_POST['id'];
	$estado =$_POST['estado'];
	$pl =$_POST['pl'];
	$piezas=$_POST['piezas'];
	$id_material=$_POST['material'];
	$id_bodega=$_POST['id_bodega'];
	$nombre =$_POST['nombre'];

	$Contenedor = new DetalleProcesado();
	$Contenedor->setId_detalle_procesado($id_detalle_procesado);
	$Contenedor->setEstado($estado);
	$delete=$Contenedor->confirm();
	if ($delete==true) {
		

		header('Location: ../listas/DetalleMaterialProcesado.php?success=correcto&id='.$pl.'&nombre='.$nombre.'');
		# code...
	}else{
		header('Location: ../listas/DetalleMaterialProcesado.php?error=incorrecto&id='.$pl.'&id='.$id_bodega.'&id='.$id_material.'&id='.$estado.'&id='.$piezas.'');
	}
}

 ?>