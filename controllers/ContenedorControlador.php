<?php 
require_once "../class/Contenedor.php";
require_once "../class/PackingList.php";
require_once "../class/DetalleBodega.php";

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
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{




	$etiqueta=$_POST['etiqueta'];
  	$id_packing_list =$_POST['id_packing_list'];

  

	$Contenedor = new Contenedores();
	$primer_cont = $Contenedor->FstContenedor($id_packing_list);
/*		if($primer_cont=='Primer Contenedor'){

	$mes=$_POST['mes'];
	$dia=$_POST['dia'];
	$corre=$_POST['correlativo'];

	$poliza=$_POST['poliza'];
	$pac = new Packing();
	  $updateC=$pac->updateCorrelativo($id_packing_list,$dia,$mes,$corre,$poliza);
		}*/

	$Contenedor->setEtiqueta($etiqueta);
	$Contenedor->setId_packing_list($id_packing_list);
	$Contenedor->setEstado("Sin Confirmar");
	$save=$Contenedor->save();
	if ($save==true) {
		/*if ($primer_cont== "Primer Contenedor") {
			$estado="Abierto";
			$pl= new Packing();
			$pl->setEstado($estado);
			$pl->setId_packing_list($id_packing_list);
			$vari = 'Primero';
			$update1=$pl->updateStatu($vari);

		}*/
			
		
		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="guardarLocal") 
{
	$etiqueta=$_POST['etiqueta'];
  	$id_packing_list =$_POST['id_packing_list'];
	$tipo_ingreso=$_POST['tipo_ingreso'];

  

	$Contenedor = new Contenedores();
	$primer_cont = $Contenedor->FstContenedor($id_packing_list);

	$Contenedor->setEtiqueta($etiqueta);
	$Contenedor->setTipo_ingreso($tipo_ingreso);
	$Contenedor->setId_packing_list($id_packing_list);
	$Contenedor->setEstado("Sin Confirmar");
	$save=$Contenedor->saveEnvio();
	if ($save==true) {
		if ($primer_cont== "Primer Contenedor") {
			$estado="Abierto";
			$pl= new Packing();
			$pl->setEstado($estado);
			$pl->setId_packing_list($id_packing_list);
			$vari = 'Primero';
			$update1=$pl->updateStatu($vari);

		}
		
		header('Location: ../listas/IndexPackingList_Local.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../listas/IndexPackingList_Local.php?error=incorrecto');
	}
}
elseif ($accion=="confirmar") {
	$id_paquete =$_POST['id'];
	$id_bodega =$_POST['id_bodega'];
	$estado =$_POST['estado'];
	$pl =$_POST['pl'];
	$factura =$_POST['factura'];
	$piezas=$_POST['piezas'];
	$etiqueta=$_POST['etiquet'];
	$id_material=$_POST['material'];
	$con=$_POST['con'];
	$Contenedor = new Contenedores();
	$Contenedor->setId_bodega($id_bodega);
	$Contenedor->setEstado($estado);
	$Contenedor->setEtiqueta($etiqueta);
	$delete=$Contenedor->confirm($id_paquete);
	if ($delete==true) {
		
		$detalle_bo= new DetalleBodega();
		$detalle_bo->setId_bodega($id_bodega);
		$detalle_bo->setId_material($id_material);
		$detalle_bo->setCantidad($piezas);
		$save1=$detalle_bo->save();
		header('Location: ../listas/contenedores.php?success=correcto&id='.$pl.'&factura='.$factura.'&contenedor='.$con.'');
		# code...
	}else{
		header('Location: ../listas/contenedores.php?error=incorrecto&id='.$pl.'&factura='.$factura.'&contenedor='.$con.'');
	}
}elseif ($accion=="confirmar2") {
	$id_contenedor =$_POST['employee_id'];
	$estado =$_POST['employee_status'];
	$fecha =$_POST['employee_fecha'];
	$id_bodega =$_POST['id_bodega'];
	$id_packing_list =$_POST['employee_packing'];
	$Contenedor = new Contenedores();

	$primer_cont = $Contenedor->selectFirst_C($id_packing_list);
	$Contenedor->setId_contenedor($id_contenedor);
	$Contenedor->setEstado($estado);
	$Contenedor->setFecha_ingreso($fecha);
	$Contenedor->setId_bodega($id_bodega);
	$delete=$Contenedor->confirm2();
	if ($delete==true) {
		if($estado=="Confirmado"){
			foreach ($primer_cont as $datosC) {
				$id_contenedor_p=$datosC['id_contenedor'];
			}
			
			if ($id_contenedor == $id_contenedor_p) {
				$estado="Abierto";
			$pl= new Packing();
			$pl->setEstado($estado);
			$pl->setId_packing_list($id_packing_list);
			$vari = 'Primero';
			$update1=$pl->updateStatu($vari);
			}


			
		$pl= new Packing();
  	$listpl = $pl->selectOne($id_packing_list);
  	foreach ($listpl as $key) {
  		$cont_ingresados=$key['contenedores_ingresados'];
  	}
  	$new_con_ing=$cont_ingresados + 1;
  		$pl->setContenedores_ingresados($new_con_ing);
		$pl->setId_packing_list($id_packing_list);
		$update1=$pl->updateIngresos();
	if ($update1== TRUE) {
			$paquetess= $Contenedor->selectPaquetesCon($id_contenedor);
			foreach ($paquetess as $count) {

	$Contenedor1 = new Contenedores();
	$Contenedor1->setId_bodega($id_bodega);
	$Contenedor1->setFecha_ingreso($fecha);
	$Contenedor1->setEstado($estado);
	//$Contenedor1->setEtiqueta($count['etiqueta']);
	$delete2=$Contenedor1->confirm($count['id_paquete']);

				$detalle_bo= new DetalleBodega();
		$detalle_bo->setId_bodega($id_bodega);
		$detalle_bo->setId_material($count['id_material']);
		$detalle_bo->setCantidad($count['piezas']);
		$save1=$detalle_bo->save();
			}
		} 
		
	}

		header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}else{
		header('Location: ../listas/IndexPackingList.php?error=incorrecto');
	}
}
elseif ($accion=="guardar1") 
{
	$etiqueta=$_POST['etiqueta'];
	/*$piezas=$_POST['piezas'];
	$n_paquetes=$_POST['paquetes'];
	$multiplo=$_POST['multiplo'];
	$m_cuadrados=$_POST['m_cuadrados'];
  	$id_bodega =$_POST['id_bodega1'];
	$tarimas=$_POST['tarimas'];*/
	$estado=$_POST['estado'];
  	$id_packing_list =$_POST['id_packing_list'];
 /* 	$cont_ = $_POST['cont_'];
  	$id_material =$_POST['id_material'];*/
  	$pl= new Packing();
  //	$conta = count($id_material);

  	$i=0;
  	$tarimass = 0;

	$Contenedor = new Contenedores();
/*	while ($i<$conta) {
		$tarimass = $m_cuadrados[$i]/$multiplo[$i];
	$Contenedor->setEtiqueta($etiqueta[$i]);
	$Contenedor->setPiezas($piezas[$i]);
	$Contenedor->setN_paquetes($n_paquetes[$i]);
	$Contenedor->setMultiplo($multiplo[$i]);
	$Contenedor->setM_cuadrados($m_cuadrados[$i]);
	$Contenedor->setId_bodega($id_bodega[$i]);

	$Contenedor->setTarimas($tarimass);
	$Contenedor->setId_packing_list($id_packing_list);
	$Contenedor->setId_material($id_material[$i]);
	$Contenedor->setEstado("Sin Confirmar");
	$save1=$Contenedor->save2();
		if($save1==true){
				$listpl = $pl->selectOne($id_packing_list);
  	foreach ($listpl as $key) {
  		$cont_ingresados=$key['contenedores_ingresados'];
  	}
  	$new_con_ing=$cont_ingresados + 1;
		$pl->setContenedores_ingresados($new_con_ing);
		$pl->setId_packing_list($id_packing_list);
		$update1=$pl->updateIngresos();
		}
	$i = $i+1;
	$tarimass = 0;
	}*/
	$listpl = $pl->selectOne($id_packing_list);
  	foreach ($listpl as $key) {
  		$cont_ingresados=$key['contenedores_ingresados'];
  	}
  	$new_con_ing=$cont_ingresados + 1;

	$Contenedor = new Contenedores();
	$Contenedor->setEtiqueta($etiqueta);
	$Contenedor->setId_packing_list($id_packing_list);
	$Contenedor->setEstado("Sin Confirmar");
	$save=$Contenedor->save();
	
	if ($i==$conta) {
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

 ?>