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
 
  	$num_paque =$_POST['num_paque'];
  	for ($i=0; $i < $num_paque; $i++) { 
  		
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
	$Paquetes->setEstado("Sin Confirmar");
	$save=$Paquetes->save();
  		
  	}
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
 // 	$etiquetaCooo =$_POST['etiquetaCoo'];
  	$largo =$_POST['largo'];
  	$ancho =$_POST['ancho'];
  	$grueso =$_POST['grueso'];
  	$multiplo=$_POST['multiplo'];
  	$metros_cubicos =$_POST['metros_cubicos'];
  	$fecha_ingreso =$_POST['fecha'];
  	$estado =$_POST['estado'];
 	

  	$factura =$_POST['factura'];
  	$inab =$_POST['inab'];
 
 

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

		$pl= new Packing();
  	$listpl = $pl->selectOne($id_packing_list);
  	foreach ($listpl as $key) {
  		$paquetes_ingresados=$key['paquetes_fisicos'];
  	}
  	$new_pan_ing=$paquetes_ingresados + 1;
  		$pl->setPaquetes_fisicos($new_pan_ing);
		$pl->setId_packing_list($id_packing_list);
		$update1=$pl->updateIngresosL();

		header('Location: ../views/savePaqueteeLocal.php?success=correcto&id='.$id_packing_list.'&factura='.$factura.'&inab='.$inab.'');
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
	if (isset($_POST['employee_flag'])) {
		$bandera=$_POST['employee_flag'];
	}else{
		$bandera='Normal';
	}
	if ($bandera=='modificar') {
		
	$contenedor =$_POST['employee_contenedor'];
	$etiquetaCo =$_POST['employee_etiquetaCo'];
	header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'&bandera='.$_POST['employee_flag'].'&contenedor='.$contenedor.'&etiquetaCo='.$etiquetaCo.'&packing='.$packing.'');
	}
	elseif ($bandera=='modificar_c') {
	$contenedor =$_POST['employee_contenedor'];
	$etiquetaCo =$_POST['employee_etiquetaCo'];
	header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'&bandera='.$bandera.'&contenedor='.$contenedor.'&etiquetaCo='.$etiquetaCo.'&packing='.$packing.'');
	}
	else{

	header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'');
	}
	/*if ($delete==true) {
		header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'');
		# code...
	}else{
		header('Location: ../views/savePaquetee.php?error=incorrecto&id='.$id_Paquetes.'');
	}*/
}
 ?>