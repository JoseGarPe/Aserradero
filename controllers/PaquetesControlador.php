<?php 
require_once "../class/Paquetes.php";
require_once "../class/PackingList.php";
require_once "../class/DetalleBodega.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_paquete=$_POST['id'];
	$etiqueta=$_POST['etiqueta'];
	$piezas=$_POST['piezas'];
  	$id_packing_list =$_POST['id_packing_list'];

	$Paquetes = new Paquetes();
	$Paquetes->setEtiqueta($etiqueta);
	$Paquetes->setPiezas($piezas);
	$Paquetes->setId_packing_list($id_packing_list);
	$update=$Paquetes->update();

	if ($update==true) {
		header('Location: ../listas/Paquetes.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Paquetes.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_Paquetes =$_POST['id'];
	$Paquetes = new Paquetes();
	$Paquetes->setId_paquete($id_Paquetes);
	$delete=$Paquetes->delete();
	if ($delete==true) {
		header('Location: ../listas/Paquetes.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Paquetes.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	if (isset($_POST['etiqueta'])) {
		$etiqueta=$_POST['etiqueta'];
	}else{
		$etiqueta=NULL;
	}
	
	$piezas=$_POST['piezas'];
  	$id_packing_list =$_POST['id_packing_list'];
  	$id_material =$_POST['id_materiales'];
  	$id_bodega =$_POST['id_bodega'];
  	$id_contenedor =$_POST['id_contenedor'];
  	$etiquetaCooo =$_POST['etiquetaCoo'];
  	$largo =$_POST['largo'];
  	$ancho =$_POST['ancho'];
  	$grueso =$_POST['grueso'];
  	$multiplo=$_POST['multiplo'];
  	$metros_cubicos =$_POST['metros_cubicos'];
  	$fecha_ingreso =$_POST['fecha'];
  	$estado =$_POST['estado'];
 

	$Paquetes = new Paquetes();
	$Paquetes->setEtiqueta($etiqueta);
	$Paquetes->setPiezas($piezas);
	$Paquetes->setId_packing_list($id_packing_list);
	$Paquetes->setId_material($id_material);
	$Paquetes->setId_bodega($id_bodega);
	$Paquetes->setId_contenedor($id_contenedor);
	$Paquetes->setLargo($largo);
	$Paquetes->setAncho($ancho);
	$Paquetes->setGrueso($grueso);
	$Paquetes->setMultiplo($multiplo);
	$Paquetes->setMetros_cubicos($metros_cubicos);
	$Paquetes->setFecha_ingreso($fecha_ingreso);
	$Paquetes->setEstado("Confirmado");
	$save=$Paquetes->save();
	if ($save==true) {
		$detalle_bo= new DetalleBodega();
		$detalle_bo->setId_bodega($id_bodega);
		$detalle_bo->setId_material($id_material);
		$detalle_bo->setCantidad($piezas);
		$save1=$detalle_bo->save();
		header('Location: ../views/savePaquetee.php?success=correcto&id='.$id_packing_list.'&contenedor='.$id_contenedor.'&etiquetaCo='.$etiquetaCooo.'');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}elseif ($accion=="guardarLocal") 
{
	if (isset($_POST['etiqueta'])) {
		$etiqueta=$_POST['etiqueta'];
	}else{
		$etiqueta=NULL;
	}
	
	$piezas=$_POST['piezas'];
  	$id_packing_list =$_POST['id_packing_list'];
  	$id_material =$_POST['id_materiales'];
  	$id_bodega =$_POST['id_bodega'];
  	$id_contenedor =$_POST['id_contenedor'];
  	$etiquetaCooo =$_POST['etiquetaCoo'];
  	$largo =$_POST['largo'];
  	$ancho =$_POST['ancho'];
  	$grueso =$_POST['grueso'];
  	$multiplo=$_POST['multiplo'];
  	$metros_cubicos =$_POST['metros_cubicos'];
  	$fecha_ingreso =$_POST['fecha'];
  	$estado =$_POST['estado'];
 

	$Paquetes = new Paquetes();
	$Paquetes->setEtiqueta($etiqueta);
	$Paquetes->setPiezas($piezas);
	$Paquetes->setId_packing_list($id_packing_list);
	$Paquetes->setId_material($id_material);
	$Paquetes->setId_bodega($id_bodega);
	$Paquetes->setId_contenedor($id_contenedor);
	$Paquetes->setLargo($largo);
	$Paquetes->setAncho($ancho);
	$Paquetes->setGrueso($grueso);
	$Paquetes->setMultiplo($multiplo);
	$Paquetes->setMetros_cubicos($metros_cubicos);
	$Paquetes->setFecha_ingreso($fecha_ingreso);
	$Paquetes->setEstado("Confirmado");
	$save=$Paquetes->save();
	if ($save==true) {
		$detalle_bo= new DetalleBodega();
		$detalle_bo->setId_bodega($id_bodega);
		$detalle_bo->setId_material($id_material);
		$detalle_bo->setCantidad($piezas);
		$save1=$detalle_bo->save();
		header('Location: ../views/savePaqueteeLocal.php?success=correcto&id='.$id_packing_list.'&contenedor='.$id_contenedor.'&etiquetaCo='.$etiquetaCooo.'');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="etiqueta") {
	$id_Paquetes =$_POST['employee_id'];
	$etiqueta =$_POST['employee_etiqueta'];
	$packing =$_POST['employee_packing'];
	$Paquetes = new Paquetes();
	$Paquetes->setId_paquete($id_Paquetes);
	$Paquetes->setEtiqueta($etiqueta);
	$delete=$Paquetes->updateEtiqueta();
	header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'');
	/*if ($delete==true) {
		header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'');
		# code...
	}else{
		header('Location: ../views/savePaquetee.php?error=incorrecto&id='.$id_Paquetes.'');
	}*/
}
 ?>