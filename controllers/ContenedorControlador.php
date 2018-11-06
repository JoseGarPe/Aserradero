<?php 
require_once "../class/Contenedores.php";

$accion=$_GET['accion'];
if ($accion=="modificar") {

	$id_contenedor=$_POST['id'];
	$etiqueta=$_POST['etiqueta'];
	$piezas=$_POST['piezas'];
	$multiplo=$_POST['multiplo'];
	$m_cuadrados=$_POST['m_cuadrados'];
	$tarimas=$_POST['tarimas'];
  	$id_bodega =$_POST['id_bodega'];
  	$id_packing_list =$_POST['id_packing_list'];

	$Contenedor = new Contenedor();
	$Contenedor->setEtiqueta($etiqueta);
	$Contenedor->setPiezas($piezas);
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
	$Contenedor = new Contenedor();
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
	$multiplo=$_POST['multiplo'];
	$m_cuadrados=$_POST['m_cuadrados'];
	$tarimas=$_POST['tarimas'];
  	$id_bodega =$_POST['id_bodega'];
  	$id_packing_list =$_POST['id_packing_list'];

	$Contenedor = new Contenedor();
	$Contenedor->setEtiqueta($etiqueta);
	$Contenedor->setPiezas($piezas);
	$Contenedor->setMultiplo($multiplo);
	$Contenedor->setM_cuadrados($m_cuadrados);
	$Contenedor->setTarimas($tarimas);
	$Contenedor->setId_bodega($id_bodega);
	$Contenedor->setId_packing_list($id_packing_list);
	$save=$Contenedor->save();
	if ($save==true) {
		header('Location: ../listas/Contenedor.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/Contenedor.php?error=incorrecto');
	}
}

 ?>