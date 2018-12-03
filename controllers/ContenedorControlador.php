<?php 
require_once "../class/Contenedor.php";
require_once "../class/PackingList.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_contenedor=$_POST['id'];
	$etiqueta=$_POST['etiqueta'];
	$piezas=$_POST['piezas'];
	$n_paquetes=$_POST['paquetes'];
	$multiplo=$_POST['multiplo'];
	$m_cuadrados=$_POST['m_cuadrados'];
	$tarimas=$_POST['tarimas'];
  	$id_bodega =$_POST['id_bodega'];
  	$id_packing_list =$_POST['id_packing_list'];

	$Contenedor = new Contenedores();
	$Contenedor->setEtiqueta($etiqueta);
	$Contenedor->setPiezas($piezas);
	$Contenedor->setN_paquetes($n_paquetes);
	$Contenedor->setMultiplo($multiplo);
	$Contenedor->setM_cuadrados($m_cuadrados);
	$Contenedor->setTarimas($tarimas);
	$Contenedor->setId_bodega($id_bodega);
	$Contenedor->setId_packing_list($id_packing_list);
	$Contenedor->setId_contenedor($id_contenedor);
	$update=$Contenedor->update();

	if ($update==true) {
		header('Location: ../listas/Contenedor.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Contenedor.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_contenedor =$_POST['id'];
	$Contenedor = new Contenedores();
	$Contenedor->setId_contenedor($id_contenedor);
	$delete=$Contenedor->delete();
	if ($delete==true) {
		header('Location: ../listas/Contenedor.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/Contenedor.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$etiqueta=$_POST['etiqueta'];
	$piezas=$_POST['piezas'];
	$n_paquetes=$_POST['paquetes'];
	$multiplo=$_POST['multiplo'];
	$m_cuadrados=$_POST['m_cuadrados'];
	$tarimas=$_POST['tarimas'];
  	$id_bodega =$_POST['id_bodega'];
  	$id_packing_list =$_POST['id_packing_list'];

  	$id_material =$_POST['id_materiales'];
  	$pl= new Packing();
  	$listpl = $pl->selectOne($id_packing_list);
  	foreach ($listpl as $key) {
  		$cont_ingresados=$key['contenedores_ingresados'];
  	}
  	$new_con_ing=$cont_ingresados + 1;

	$Contenedor = new Contenedores();
	$Contenedor->setEtiqueta($etiqueta);
	$Contenedor->setPiezas($piezas);
	$Contenedor->setN_paquetes($n_paquetes);
	$Contenedor->setMultiplo($multiplo);
	$Contenedor->setM_cuadrados($m_cuadrados);
	$Contenedor->setTarimas($tarimas);
	$Contenedor->setId_bodega($id_bodega);
	$Contenedor->setId_packing_list($id_packing_list);
	$Contenedor->setId_material($id_material);
	$Contenedor->setEstado("Sin Confirmar");
	$save=$Contenedor->save();
	if ($save==true) {
		$pl->setContenedores_ingresados($new_con_ing);
		$pl->setId_packing_list($id_packing_list);
		$update1=$pl->updateIngresos();
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="confirmar") {
	$id_contenedor =$_POST['id'];
	$id_bodega =$_POST['id_bodega'];
	$estado =$_POST['estado'];
	$pl =$_POST['pl'];
	$Contenedor = new Contenedores();
	$Contenedor->setId_contenedor($id_contenedor);
	$Contenedor->setId_bodega($id_bodega);
	$Contenedor->setEstado($estado);
	$delete=$Contenedor->confirm();
	if ($delete==true) {
		header('Location: ../listas/contenedores.php?success=correcto&id='.$pl.'');
		# code...
	}else{
		header('Location: ../listas/Contenedor.php?error=incorrecto&id='.$pl.'&id='.$id_contenedor.'&id='.$id_bodega.'&id='.$estado.'');
	}
}

 ?>