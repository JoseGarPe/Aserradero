<?php 
	$bodega = $_POST['cod_banda'];
	$material = $_POST['material'];
	require_once "DetalleBodega.php";
                         $misBodegas = new DetalleBodega();
                         $bodes = $misBodegas->selectMaterial_bodega($bodega,$material);
                         foreach ($bodes as $key) {
                         	echo '<input type="text" name="c_disponible" id="c_disponible" value="'.$key['cantidad'].'" />';
                         }

 ?>