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
$shipper=$_POST['shipper'];
$id_nave=$_POST['id_nave'];
$id_especificacion=$_POST['id_especificacion'];
$estado=$_POST['comboestado'];
*/


$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_shipper =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$shipper = new Shipper();
	$shipper->setNombre($nombre);
	$shipper->setDescripcion($descripcion);
	$shipper->setShipper($shipper);
	$update=$shipper->update();
	if ($update==true) {
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
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
	$shipper=$_POST['shipper'];
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
	$Pack->setShipper($shipper);
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
}

?>