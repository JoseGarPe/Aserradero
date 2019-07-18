<?php
      $codigo = $_POST['consulta'];
      $bandera = $_POST['input'];

       
      if(!empty($codigo)) {
require_once "../class/PackingList.php";

                                   $misCategorias = new Packing();
                                   if ($bandera=='correlativo') {
                                     
                         $catego = $misCategorias->selectExistenteCorrelativo($codigo);
                                   }else{

                         $catego = $misCategorias->selectExistentePoliza($codigo);
                                   }
                         if ($catego == "Disponible") {
                           
                  echo '
                  <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Disponible:</span>
              Disponible: valor disponible
              </div>
               
              ';
                         }elseif ($catego == "No Disponible") {
                  echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">No Disponible:</span>
              No Disponible: Ya existe un dato guardado con este valor
              </div>';
                         }


      }
       
  /*    function comprobar($b) {
            $con = mysql_connect('localhost','root', 'root');
            mysql_select_db('masajes', $con);
       
            $sql = mysql_query("SELECT * FROM usuarios WHERE nombre = '".$b."'",$con);
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
            }else{
            }
      }     */
?>


