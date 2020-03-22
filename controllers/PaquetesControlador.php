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
/*elseif ($accion=="eliminar") {
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
}*/
// modificados---------------
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
  	$metros_cubicos = round($_POST['metros_cubicos'], 2);
  	$fecha_ingreso =$_POST['fecha'];
  	$estado =$_POST['estado'];
 
  	$num_paque =$_POST['num_paque'];
  //	for ($i=0; $i < $num_paque; $i++) { 
  		
	$Paquetes = new Paquetes();
	//$Paquetes->setEtiqueta($etiqueta);
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
	//$Paquetes->setEstado("Sin Confirmar");
	//$save=$Paquetes->save();
	$save=$Paquetes->saveTemporal($num_paque);	
session_start();
	unset($_SESSION['modificando']);
	$_SESSION['modificando']='nel';
  		
  //	}

	if ($save==true) {
		header('Location: ../views/savePaquetee.php?success=correcto&id='.$id_packing_list.'&contenedor='.$id_contenedor.'&etiquetaCo='.$etiquetaCooo.'');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}

elseif ($accion=="modi_temp") 
{
	
	$piezas=$_POST['piezas_t'];
  	$id_packing_list =$_POST['employee_packing'];
  	$id_paquete =$_POST['employee_id'];
  	$id_material =$_POST['id_materiales'];
  	$id_bodega =$_POST['id_bodega'];
  	$id_contenedor =$_POST['employee_contenedor'];
  	$etiquetaCooo =$_POST['employee_etiquetaCo'];
  	$largo =$_POST['largo_t'];
  	$ancho =$_POST['ancho_t'];
  	$grueso =$_POST['grueso_t'];
  	$multiplo=$_POST['multiplo_t'];
  	$metros_cubicos =$_POST['metros_cubicos_t'];
 
  	$num_paque =$_POST['cantidad_t'];
  //	for ($i=0; $i < $num_paque; $i++) { 
  		
	$Paquetes = new Paquetes();
	//$Paquetes->setEtiqueta($etiqueta);
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
	$Paquetes->setId_paquete($id_paquete);
	//$Paquetes->setEstado("Sin Confirmar");
	//$save=$Paquetes->save();
	$save=$Paquetes->modiTemporal($num_paque);	

  		
  //	}

	if ($save==true) {
		header('Location: ../views/savePaquetee.php?success=correcto&id='.$id_packing_list.'&contenedor='.$id_contenedor.'&etiquetaCo='.$etiquetaCooo.'');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="generar") 
{
	$id_paquete_t= $_GET['id'];
  	$id_packing_list =$_GET['packing'];
  	$id_contenedor =$_GET['id_contenedor'];
  	$etiquetaCooo =$_GET['etiquetaCoo'];
  
 
  //	for ($i=0; $i < $num_paque; $i++) { 
  		//ALTER TABLE `paquetes` ADD `cantidad` INT(11) NULL AFTER `stock`;
	$Paquetes = new Paquetes();
	$paquete_temporal= $Paquetes->selectALL_TEMPORAL_1($id_paquete_t);
	foreach ($paquete_temporal as $key) {
	$num_paque = $key['cantidad'];
	for ($i=0; $i < $num_paque; $i++) { 
	$Paquetes->setEtiqueta(NULL);
	$Paquetes->setPiezas($key['piezas']);
	$Paquetes->setId_packing_list($id_packing_list);
	$Paquetes->setId_material($key['id_material']);
	$Paquetes->setId_bodega($key['id_bodega']);
	$Paquetes->setId_contenedor($id_contenedor);
	$Paquetes->setLargo($key['largo']);
	$Paquetes->setAncho($key['ancho']);
	$Paquetes->setGrueso($key['grueso']);
	$Paquetes->setMultiplo($key['multiplo']);
	$Paquetes->setMetros_cubicos($key['metros_cubicos']);
	$Paquetes->setFecha_ingreso('0000-00-00');
	$Paquetes->setEstado("Sin Confirmar");
	$save=$Paquetes->save($key['cantidad']);
	if ($save==true) {
			$detalle_bo= new DetalleBodega();
		$detalle_bo->setId_bodega($key['id_bodega']);
		$detalle_bo->setId_material($key['id_material']);
		$detalle_bo->setCantidad($key['piezas']);
		$save1=$detalle_bo->save();
	}
$cambio = $Paquetes->modiTemporal_G('Si',$id_paquete_t);
		}
	}
	

	if ($save==true) {
		

	
		header('Location: ../views/savePaquetee.php?success=correcto&id='.$id_packing_list.'&contenedor='.$id_contenedor.'&etiquetaCo='.$etiquetaCooo.'');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
//----------------------------------------------------------------------//
elseif ($accion=="guardarLocal") 
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
 	$num_paque=$_POST['num_paque'];

  	$factura =$_POST['factura'];
  	$inab =$_POST['inab'];
 	
 	

	$Paquetes = new Paquetes();
	//$Paquetes->setEtiqueta($etiqueta);
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
//	$Paquetes->setEstado("Confirmado");
//	$save=$Paquetes->save();
	$save=$Paquetes->saveTemporal($num_paque);	

	if ($save==true) {

		header('Location: ../views/savePaqueteeLocal.php?success=correcto&id='.$id_packing_list.'&factura='.$factura.'&inab='.$inab.'');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="modi_tempL") 
{  	
	$factura =$_POST['factura'];
  	$inab =$_POST['inab'];
 

  	$largo =$_POST['largo_t'];
	$piezas=$_POST['piezas_t'];
  	$id_packing_list =$_POST['employee_packing'];
  	$id_paquete =$_POST['employee_id'];
  	$id_material =$_POST['id_materiales'];
  	$id_bodega =$_POST['id_bodega'];
  	$ancho =$_POST['ancho_t'];
  	$grueso =$_POST['grueso_t'];
  	$multiplo=$_POST['multiplo_t'];
  	$metros_cubicos =$_POST['metros_cubicos_t'];
 
  	$num_paque =$_POST['cantidad_t'];
  //	for ($i=0; $i < $num_paque; $i++) { 
  		
	$Paquetes = new Paquetes();
	//$Paquetes->setEtiqueta($etiqueta);
	$Paquetes->setPiezas($piezas);
	$Paquetes->setId_packing_list($id_packing_list);
	$Paquetes->setId_material($id_material);
	$Paquetes->setLargo($largo);
	$Paquetes->setAncho($ancho);
	$Paquetes->setGrueso($grueso);
	$Paquetes->setMultiplo($multiplo);
	$Paquetes->setMetros_cubicos($metros_cubicos);
	$Paquetes->setFecha_ingreso($fecha_ingreso);
	$Paquetes->setId_paquete($id_paquete);
	//$Paquetes->setEstado("Sin Confirmar");
	//$save=$Paquetes->save();
	$save=$Paquetes->modiTemporal($num_paque);	

  		
  //	}

	if ($save==true) {
		header('Location: ../views/savePaqueteeLocal.php?success=correcto&id='.$id_packing_list.'&factura='.$factura.'&inab='.$inab.'');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="generarLocal") 
{
	$id_paquete_t= $_GET['id'];
  	$id_packing_list =$_GET['packing'];
  	$factura =$_GET['factura'];
  	$inab =$_GET['inab'];
 
  
 
  //	for ($i=0; $i < $num_paque; $i++) { 
  		
	$Paquetes = new Paquetes();
	$paquete_temporal= $Paquetes->selectALL_TEMPORAL_1($id_paquete_t);
	foreach ($paquete_temporal as $key) {
	$num_paque = $key['cantidad'];
	for ($i=0; $i < $num_paque; $i++) {
	$Paquetes = new Paquetes(); 
   $Paquetes->setEtiqueta(NULL);
	$Paquetes->setPiezas($key['piezas']);
	$Paquetes->setId_packing_list($id_packing_list);
	$Paquetes->setId_material($key['id_material']);
	$Paquetes->setId_bodega($key['id_bodega']);
	$Paquetes->setId_contenedor($key['id_contenedor']);
	$Paquetes->setLargo($key['largo']);
	$Paquetes->setAncho($key['ancho']);
	$Paquetes->setGrueso($key['grueso']);
	$Paquetes->setMultiplo($key['multiplo']);
	$Paquetes->setMetros_cubicos($key['metros_cubicos']);
	$Paquetes->setFecha_ingreso($key['fecha_ingreso']);
	$Paquetes->setEstado("Confirmado");
	$save=$Paquetes->save( $key['cantidad']);
		if ($save == true) {
				$detalle_bo= new DetalleBodega();
		$detalle_bo->setId_bodega($key['id_bodega']);
		$detalle_bo->setId_material($key['id_material']);
		$detalle_bo->setCantidad($key['piezas']);
		$save1=$detalle_bo->save();

		$pl= new Packing();
  	$listpl = $pl->selectOne($id_packing_list);
  	foreach ($listpl as $key1) {
  		$paquetes_ingresados=$key1['paquetes_fisicos'];
  	}
  	$new_pan_ing=$paquetes_ingresados + 1;
  		$pl->setPaquetes_fisicos($new_pan_ing);
		$pl->setId_packing_list($id_packing_list);
		$update1=$pl->updateIngresosL();
		}

$cambio = $Paquetes->modiTemporal_G('Si',$id_paquete_t);

	}
}
	if ($save==true) {
/*
	
*/
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
	
			session_start();
	unset($_SESSION['modificando']);
	unset($_SESSION['dato']);
	$_SESSION['modificando']='Si';
	$_SESSION['dato']=$_POST['dato'];

	if (isset($_POST['employee_flag'])) {
		$bandera=$_POST['employee_flag'];
	}else{
		$bandera='Normal';
	}
	if ($bandera=='modificar') {
		
	$contenedor =$_POST['employee_contenedor'];
	$etiquetaCo =$_POST['employee_etiquetaCo'];	

	header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'&bandera='.$_POST['employee_flag'].'&contenedor='.$contenedor.'&etiquetaCo='.$etiquetaCo.'&packing='.$packing.'');

	}elseif ($bandera=='modificar_local') {
		
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
		//if (isset($_POST['type_local'])) {
	$contenedor =$_POST['employee_contenedor'];
	$etiquetaCo =$_POST['employee_etiquetaCo'];

        header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'&contenedor='.$contenedor.'&etiquetaCo='.$etiquetaCo.'&packing='.$packing.'');
		//header('Location: ../views/savePaqueteeLocal.php?success=correcto&id='.$packing.'&factura='.$_POST['factura'].'&inab='.$_POST['inab'].'');	
	/*	}else{

        header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'');

		}*/
	}
	/*if ($delete==true) {
		header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'');
		# code...
	}else{
		header('Location: ../views/savePaquetee.php?error=incorrecto&id='.$id_Paquetes.'');
	}*/
}

elseif ($accion=="etiquetaLocal") {
	$id_Paquetes =$_POST['employee_id'];
	$etiqueta =$_POST['employee_etiqueta'];
	$packing =$_POST['employee_packing'];

	
	$Paquetes = new Paquetes();
	$Paquetes->setId_paquete($id_Paquetes);
	$Paquetes->setEtiqueta($etiqueta);
	$delete=$Paquetes->updateEtiqueta();
	
	/*if ($bandera=='modificar') {
		
	$contenedor =$_POST['employee_contenedor'];
	$etiquetaCo =$_POST['employee_etiquetaCo'];	

	header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'&bandera='.$_POST['employee_flag'].'&contenedor='.$contenedor.'&etiquetaCo='.$etiquetaCo.'&packing='.$packing.'');

	}
	elseif ($bandera=='modificar_c') {
	$contenedor =$_POST['employee_contenedor'];
	$etiquetaCo =$_POST['employee_etiquetaCo'];
	header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'&bandera='.$bandera.'&contenedor='.$contenedor.'&etiquetaCo='.$etiquetaCo.'&packing='.$packing.'');
	}
	else{*/
		//if (isset($_POST['type_local'])) {

       // header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'');
		
	header('Location: ../views/savePaqueteeLocal.php?success=correcto&id='.$packing.'&factura='.$_POST['factura'].'&inab='.$_POST['inab'].'');	
	/*	}else{
			session_start();
	unset($_SESSION['modificando']);
	$_SESSION['modificando']='Si';

        header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'');

		}
	//}
	/*if ($delete==true) {
		header('Location: ../views/paquetes/respuesta.php?respuesta='.$delete.'');
		# code...
	}else{
		header('Location: ../views/savePaquetee.php?error=incorrecto&id='.$id_Paquetes.'');
	}*/
}
elseif ($accion=="eliminar") {
	$Id_paquete =$_POST['id'];
	$packing =$_POST['employee_packing'];
	$contenedor =$_POST['employee_contenedor'];
	$etiquetaCo =$_POST['employee_etiquetaCo'];	
	$nave = new Paquetes();
	$nave->setId_paquete($Id_paquete);
	$delete=$nave->delete();
	if ($delete==true) {
		header('Location: ../views/savePaquetee.php?success=correcto&id='.$packing.'&contenedor='.$contenedor.'&etiquetaCo='.$etiquetaCo.'');
		# code...
	}else{
		header('Location: ../listas/Categorias.php?error=incorrecto');
	}
}

elseif ($accion=="eliminarlocal") {
	$Id_paquete =$_POST['id'];
	$packing =$_POST['employee_packing'];
	$inab =$_POST['inab'];
	$factura =$_POST['factura'];	
	$nave = new Paquetes();
	$nave->setId_paquete($Id_paquete);
	$delete=$nave->delete();
	if ($delete==true) {
		header('Location: ../views/savePaqueteeLocal.php?success=correcto&id='.$packing.'&inab='.$inab.'&factura='.$factura.'');
		# code...
	}else{
		header('Location: ../listas/Categorias.php?error=incorrecto');
	}
}
 ?>