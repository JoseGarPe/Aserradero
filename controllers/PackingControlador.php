<?php  

require_once "../class/PackingList.php";
require_once "../class/Contenedor.php";
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
	
		$corre=$co.'-'.$year.'';
	
	

	$poliza=$_POST['poliza'];

	$Pack = new Packing();
	$Pack->setCorrelativo($corre);
	$Pack->setPoliza($descripcion);
	$Pack->setId_packing_list($Pack);
	$update=$Pack->updatePC();
	if ($update=='Datos guardado') {

		header('Location: ../listas/IndexPackingList.php?success=correcto&'.$year.'');
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

	if (isset($_POST['bandera'])) {

		  				$contenedor = new Contenedores();
                        $conte = $contenedor->selectALLpack($id_packing_list);
                        foreach ($conte as $key) {
                          $cont_local = $key['id_contenedor'];
                        }
                        $contenedor->setId_contenedor($cont_local);
                        $delete=$contenedor->delete();

	}else{
		  				$contenedor = new Contenedores();
                        $conte = $contenedor->selectALLpack($id_packing_list);
                        foreach ($conte as $key) {
                          $cont_local = $key['id_contenedor'];
                        $contenedor->setId_contenedor($cont_local);
                        $delete=$contenedor->delete();
                        }
	}
	$Pack = new Packing();
	$Pack->setId_packing_list($id_packing_list);
	$delete=$Pack->delete();
	if ($delete==true) {
		if (isset($_POST['bandera'])) {
			
		header('Location: ../listas/IndexPackingList_Local.php?success=correcto');
		}else{

		header('Location: ../listas/IndexPackingList.php?success=correcto');
		}
		# code...
	}else{
		if (isset($_POST['bandera'])) {
			
		header('Location: ../listas/IndexPackingList_Local.php?error=incorrecto');
		}else{
			
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
		}
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
	$fecha =$_POST['fecha1'];
	if (isset($_POST['bandera'])) {
		$bandera=$_POST['bandera'];
	}else{
		$bandera='importada';
	}
	if ($fecha=='') {
		
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
	else{
		/*setlocale(LC_TIME, 'es_SV');
		$date1=date_create($fecha);
		date_format($date1,'Y-m-d')*/
		$fecha_nueva='';

                           $array_falla = str_split($fecha);
                           $falla_count = strlen($fecha);
                           $fecha_nueva = "".$array_falla[6]."".$array_falla[7]."".$array_falla[8]."".$array_falla[9]."-".$array_falla[3]."".$array_falla[4]."-".$array_falla[0]."".$array_falla[1]."";
                         
	$pl= new Packing();
			$pl->setEstado($estado);
			$pl->setId_packing_list($id_packing_list);
			$vari = 'Ultimo';
			$update=$pl->updateStatu($vari,$fecha);

	if ($update==true) {
		if ($bandera=='Local') {
		header('Location: ../listas/IndexPackingList_Local.php?success=correcto&fecha='.$fecha.'');
		}else{
			header('Location: ../listas/IndexPackingList.php?success=correcto&fecha='.$fecha.'');
		}
		
		# code...
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
	}
}elseif ($accion=="observacion") {
	$id_packing_list =$_POST['id'];
	$estado =$_POST['observacion'];
	$pl= new Packing();
			$pl->setObervaciones($estado);
			$pl->setId_packing_list($id_packing_list);
		    $update=$pl->updateObservacion();

	if ($update==true) {
		if (isset($_POST['bandera'])) {
			
		header('Location: ../listas/IndexPackingList_Local.php?success=correcto');
		
		}else{

		header('Location: ../listas/IndexPackingList.php?success=correcto');
		}
		# code...
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}

elseif($accion=="updatePC") {
	$id_Pack =$_POST['id'];
	$correlativo=$_POST['correlativo'];
	$poliza=$_POST['poliza'];
	$shipper=$_POST['shipper'];
	$year=$_POST['year'];
	$corre=$correlativo.'-'.$year.'';
	$Pack = new Packing();
	$Pack->setCorrelativo($corre);
	$Pack->setPoliza($poliza);
	$Pack->setShipper($shipper);
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

    $date1=date_create($fecha);
	$contenedores_ingresados=NULL;
	$paquetes=NULL;
	$paquetes_fisicos=NULL;
	$obervaciones=$_POST['observaciones'];
	$shipper=$_POST['shipper'];
	$poliza=$_POST['poliza'];
	$id_nave=NULL;
	$id_especificacion=NULL;
	//$estado=$_POST['comboestado'];
	$estado="Abierto";
	$id_bodega=$_POST['id_bodega'];
	$paquetes=$_POST['packetes'];
	$ingreso_local=$_POST['ingreso_local'];
		$fecha_nueva='';

                           $array_falla = str_split($fecha);
                           $falla_count = strlen($fecha);
                           $fecha_nueva = "".$array_falla[6]."".$array_falla[7]."".$array_falla[8]."".$array_falla[9]."-".$array_falla[3]."".$array_falla[4]."-".$array_falla[0]."".$array_falla[1]."";

	$Pack = new Packing();
	$Pack->setNumero_factura($numero_factura);
	$Pack->setCodigo_embarque($codigo_embarque);
	$Pack->setRazon_social($razon_social);
	$Pack->setMes($mes);
	$Pack->setFecha($fecha_nueva);
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
	$Pack->setPaquetes($paquetes);
	$save=$Pack->saveLocal($ingreso_local);
	if ($save==true) {

		$lastPL=$Pack->selectLast();
		foreach ($lastPL as $datosPL) {
			$id_packing_list=$datosPL["id_packing_list"];
		}

	$Contenedor = new Contenedores();
	$Contenedor->setEtiqueta($numero_factura);
	$Contenedor->setId_packing_list($id_packing_list);
	$Contenedor->setEstado("Confirmado");
	$Contenedor->setTipo_ingreso($ingreso_local);
	$Contenedor->setFecha_ingreso($fecha_nueva);
	$Contenedor->setId_bodega($id_bodega);
	$save1=$Contenedor->saveEnvio();

		header('Location: ../listas/IndexPackingList_Local.php?success=correcto&fecha='.date_format($date1,'Y-m-d').'');
		# code...
	}
	else{
		header('Location: ../views/Newpacking_local.php?error=incorrecto');
	}
}

?>