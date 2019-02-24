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
  	$id_bodega =$_POST['id_bodega'];
  	$id_contenedor =$_POST['id_contenedor'];
  	$largo =$_POST['largo'];
  	$ancho =$_POST['ancho'];
  	$grueso =$_POST['grueso'];
  	$multiplo=$_POST['multiplo'];
  	$metros_cubicos =$_POST['metros_cubicos'];
  	$fecha_ingreso =$_POST['fecha'];
 

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
	if ($save==true) {
		header('Location: ../views/savePaquetee.php?success=correcto&id='.$id_packing_list.'');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}

 ?>