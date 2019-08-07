<?php  

require_once "../class/PackingList.php";

/*
$numero_factura=$_POST['numfac'];
$codigo_embarque=$_POST['codembarque'];
$razon_social=$_POST['razonsocial'];
$mes=$_POST['combomes'];
$fecha=$_POST['fecha'];
$total_contenedores=$_POST['totconte'];
$contenedores_ingresados=$_POST['conteingre'];
$paquetes=$_POST['packetes'];
$paquetes_fisicos=$_POST['packfisicos'];
$obervaciones=$_POST['observaciones'];
$Pack=$_POST['Pack'];
$id_nave=$_POST['id_nave'];
$id_especificacion=$_POST['id_especificacion'];
$estado=$_POST['comboestado'];
*/


$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_Pack =$_POST['id'];
	//$correlativo=$_POST['correlativo'];
	$poliza=$_POST['poliza'];

$year=$_POST['year'];
	$co=$_POST['correlativo'];
	
		$corre=$co.'-'.$year;
	
	

	$poliza=$_POST['poliza'];

	$Pack = new Packing();
	$Pack->setCorrelativo($corre);
	$Pack->setPoliza($descripcion);
	$Pack->setId_packing_list($Pack);
	$update=$Pack->updatePC();
	if ($update=='Datos guardado') {

		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}elseif($update=='Poliza'){
		header('Location: ../listas/IndexPackingList.php?error=incorrectoP');
	}elseif($update=='Correlativo'){
		header('Location: ../listas/IndexPackingList.php?error=incorrectoC');
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_packing_list =$_POST['id'];
	$Pack = new Packing();
	$Pack->setId_packing_list($id_packing_list);
	$delete=$Pack->delete();
	if ($delete==true) {
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$numero_factura=$_POST['numfac'];
	$codigo_embarque=$_POST['codembarque'];
	$razon_social=$_POST['razonsocial'];
	$mes=$_POST['combomes'];
	$fecha=$_POST['fecha'];
	$total_contenedores=$_POST['totconte'];
	$contenedores_ingresados=0;
	$paquetes=$_POST['packetes'];
	$paquetes_fisicos=$_POST['packfisicos'];
	$obervaciones=$_POST['observaciones'];
	$Shipper=$_POST['shipper'];
	$id_nave=$_POST['id_nave'];
	$id_especificacion=$_POST['id_especificacion'];
	//$estado=$_POST['comboestado'];
	$estado="Pendiente";

	$Pack = new Packing();
	$Pack->setNumero_factura($numero_factura);
	$Pack->setCodigo_embarque($codigo_embarque);
	$Pack->setRazon_social($razon_social);
	$Pack->setMes($mes);
	$Pack->setFecha($fecha);
	$Pack->setTotal_contenedores($total_contenedores);
	$Pack->setContenedores_ingresados($contenedores_ingresados);
	$Pack->setPaquetes($paquetes);
	$Pack->setPaquetes_fisicos($paquetes_fisicos);
	$Pack->setObervaciones($obervaciones);
	$Pack->setShipper($Shipper);
	$Pack->setId_nave($id_nave);
	$Pack->setId_especificacion($id_especificacion);
	$Pack->setEstado($estado);
	$save=$Pack->save();
	if ($save==true) {
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="Cerrar") {
	$id_packing_list =$_POST['id'];
	$estado =$_POST['estado'];
	$pl= new Packing();
			$pl->setEstado($estado);
			$pl->setId_packing_list($id_packing_list);
			$vari = 'Ultimo';
			$update=$pl->updateStatu($vari);

	if ($update==true) {
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}elseif ($accion=="observacion") {
	$id_packing_list =$_POST['id'];
	$estado =$_POST['observacion'];
	$pl= new Packing();
			$pl->setObervaciones($estado);
			$pl->setId_packing_list($id_packing_list);
		    $update=$pl->updateObservacion();

	if ($update==true) {
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif($accion=="updatePC") {
	$id_Pack =$_POST['id'];
	$correlativo=$_POST['correlativo'];
	$poliza=$_POST['poliza'];
	$Pack = new Packing();
	$Pack->setCorrelativo($correlativo);
	$Pack->setPoliza($poliza);
	$Pack->setId_packing_list($id_Pack);
	$update=$Pack->updatePC();
	if ($update=='Datos guardado') {

		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}elseif($update=='Poliza'){
		header('Location: ../listas/IndexPackingList.php?error=incorrectoP');
	}elseif($update=='Correlativo'){
		header('Location: ../listas/IndexPackingList.php?error=incorrectoC');
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}

}

//-------------------------------------------local-----------------------------
elseif ($accion=="guardarLocal") 
{
	$numero_factura=$_POST['numfac'];
	$codigo_embarque=NULL;
	$razon_social=NULL;
	$mes=$_POST['combomes'];
	$fecha=$_POST['fecha'];
	$contenedores_ingresados=NULL;
	$paquetes=NULL;
	$paquetes_fisicos=NULL;
	$obervaciones=$_POST['observaciones'];
	$shipper=$_POST['shipper'];
	$poliza=$_POST['poliza'];
	$id_nave=NULL;
	$id_especificacion=NULL;
	//$estado=$_POST['comboestado'];
	$estado="Pendiente";

	$Pack = new Packing();
	$Pack->setNumero_factura($numero_factura);
	$Pack->setCodigo_embarque($codigo_embarque);
	$Pack->setRazon_social($razon_social);
	$Pack->setMes($mes);
	$Pack->setFecha($fecha);
	$Pack->setTotal_contenedores(NULL);
	$Pack->setContenedores_ingresados(NULL);
	$Pack->setPaquetes(NULL);
	$Pack->setPaquetes_fisicos(NULL);
	$Pack->setObervaciones($obervaciones);
	$Pack->setShipper($shipper);
	$Pack->setId_nave($id_nave);
	$Pack->setId_especificacion($id_especificacion);
	$Pack->setEstado($estado);
	$Pack->setPoliza($poliza);
	$save=$Pack->saveLocal();
	if ($save==true) {
		header('Location: ../listas/IndexPackingList_Local.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList_Local.php?error=incorrecto');
	}
}

?>