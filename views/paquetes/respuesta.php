<?php 
	$vari = $_GET['respuesta'];
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
 	setTimeout(location.reload(), 5000);
 </script>