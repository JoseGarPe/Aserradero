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
	$etiqueta=$_POST['etiqueta'];
	$piezas=$_POST['piezas'];
  	$id_packing_list =$_POST['id_packing_list'];
  	$id_material =$_POST['id_materiales'];
  	$pl= new Packing();
  	$listpl = $pl->selectOne($id_packing_list);
  	foreach ($listpl as $key) {
  		$cont_ingresados=$key['Paquetes_ingresados'];
  	}
  	$new_con_ing=$cont_ingresados + 1;

	$Paquetes = new Paquetes();
	$Paquetes->setEtiqueta($etiqueta);
	$Paquetes->setPiezas($piezas);
	$Paquetes->setId_packing_list($id_packing_list);
	$Paquetes->setId_material($id_material);
	$save=$Paquetes->save();
	if ($save==true) {
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}

 ?>