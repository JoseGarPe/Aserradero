<?php  

require_once "../class/PackingList.php";


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
$id_shipper=$_POST['id_shipper'];
$id_nave=$_POST['id_nave'];
$id_especificacion=$_POST['id_especificacion'];
$estado=$_POST['comboestado'];



$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_shipper =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$shipper = new Shipper();
	$shipper->setNombre($nombre);
	$shipper->setDescripcion($descripcion);
	$shipper->setId_shipper($id_shipper);
	$update=$shipper->update();
	if ($update==true) {
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_shipper =$_POST['id'];
	$shipper = new Shipper();
	$shipper->setId_shipper($id_shipper);
	$delete=$shipper->delete();
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
	$id_shipper=$_POST['id_shipper'];
	$id_nave=$_POST['id_nave'];
	$id_especificacion=$_POST['id_especificacion'];
	$estado=$_POST['comboestado'];


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
	$Pack->setId_shipper($id_shipper);
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

?>