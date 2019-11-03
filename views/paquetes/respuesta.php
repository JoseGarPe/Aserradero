<?php 
	$vari = $_GET['respuesta'];
if (isset($_GET['bandera'])) {
$bandera=$_GET['bandera'];
}else{
  $bandera='Normal';
}
if ($bandera=='modificar') {
  $id_packing_list=$_GET['packing'];
  $bandera= $_GET['bandera'];
  $id_contenedor=$_GET['contenedor'];
  $etiquetaCo=$_GET['etiquetaCo'];
  if ($vari=="Disponible") {
  header('Location: ../savePaquetee.php?success=correcto&id='.$id_packing_list.'&contenedor='.$id_contenedor.'&etiquetaCo='.$etiquetaCo.'');
  }elseif ($vari=='No Disponible') {
    
  header('Location: ../savePaquetee.php?error=incorrecto&id='.$id_packing_list.'&contenedor='.$id_contenedor.'&etiquetaCo='.$etiquetaCo.'');
  }
}
elseif ($bandera=='modificar_c') {
  $id_packing_list=$_GET['packing'];
  $bandera= $_GET['bandera'];
  $id_contenedor=$_GET['contenedor'];
  $etiquetaCo=$_GET['etiquetaCo'];
  if ($vari=="Disponible") {
  header('Location: ../../listas/contenedores.php?success=correcto&id='.$id_packing_list.'&conten='.$id_contenedor.'&etiquetaCo='.$etiquetaCo.'');
  }elseif ($vari=='No Disponible') {
    
  header('Location: ../../listas/contenedores.php?error=incorrecto&id='.$id_packing_list.'&conten='.$id_contenedor.'&etiquetaCo='.$etiquetaCo.'');
  }
}
else{
  $bandera='NO';
}

	if ($vari== 'No Disponible') {
		echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">No Disponible:</span>
              No Disponible: Ya existe un paquete con esta etiqueta

              <input type="hidden" name=respuesta id=respuesta value="NoDisponible">
              </div>';
	}elseif ($vari== 'Disponible') {
		 echo '
                  <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Disponible:</span>
              Disponible: Etiqueta Actualizada.
              <input type="hidden" name=respuesta id=respuesta value="Disponible">
              </div>
               
              ';
            //  header("Location: ");
	}else{
		echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">No Disponible:</span>
              ERROR: Verifique los datos ingresados

              <input type="hidden" name=respuesta id=respuesta value="error">
              </div>';
	}
 ?>
 <script type="text/javascript">
 //	setTimeout(location.reload(), 5000);
 </script>