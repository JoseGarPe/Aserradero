<?php 
require_once "../class/DetallePreset.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {
	$id_presets =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$deta_pres = new Presets();
	$deta_pres->setNombre($nombre);
	$deta_pres->setDescripcion($descripcion);
	$deta_pres->setid_presets($id_presets);
	$update=$deta_pres->update();
	if ($update==true) {
		header('Location: ../listas/Presets.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Presets.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_presets =$_POST['id'];
	$deta_pres = new DetallePreset();
	$deta_pres->setId_detalle_preset($id_presets);
	$delete=$deta_pres->delete();
	if ($delete==true) {
		header('Location: ../../listas/DetallePresets.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Presets.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$id_preset=$_POST['id_preset'];
	if(isset($_POST['idmaterial'])){
				$id_material=$_POST['idmaterial'];
		$count_materiales = count($id_material);
		$i=0;
		$cantidad=$_POST['cantidad'];
		$tm=$_POST['total'];
	}else{
		$i=0;
		$tm=0;
	}
	if (isset($_POST['idinsumo'])) {
		$id_insumo=$_POST['idinsumo'];
		$count_insumo = count($id_insumo);
		$cantidad_insumo=$_POST['cantidad_insumo'];
		$ti=$_POST['total_insumo'];
		$j=0;
	}else{
		$j=0;
		$ti=0;
	}
	while ($i<$tm) {
		if ($cantidad[$i]=="") {
		
		$i=$i+1;
		}else{	
		$deta_pres= new DetallePreset();
		$deta_pres->setId_preset($id_preset);
		$deta_pres->setId_material($id_material[$i]);
		$deta_pres->setCantidad($cantidad[$i]);
		$save1=$deta_pres->save();
			$i=$i+1;
		}
	}
		while ($j<$ti) {
		if ($cantidad_insumo[$j]=="") {
		
		$j=$j+1;
		}else{	
		$deta_pres= new DetallePreset();
		$deta_pres->setId_preset($id_preset);
		$deta_pres->setId_insumo($id_insumo[$j]);
		$deta_pres->setCantidad_insumo($cantidad_insumo[$j]);
		$save1=$deta_pres->saveInsumo();
			$j=$j+1;
		}
	}
			
	if ($save1==true) {
		header('Location: ../listas/DetallePresets.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/DetallePresets.php?error=incorrecto$cantidad='.$ti.'');
	}
}

 ?>