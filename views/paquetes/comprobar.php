<?php
      $codigo = $_POST['b'];

       
      if(!empty($codigo)) {
require_once "Paquetes.php";

                                   $misCategorias = new Paquetes();
                         $catego = $misCategorias->selectExistente($codigo);
                         if ($catego == "Disponible") {
                           
                  echo '
                  <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Disponible:</span>
              Disponible: Etiqueta Disponible
              </div>
               <div class="box-footer">

                
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
   </div><br><br>
              ';
                         }elseif ($catego == "No Disponible") {
                  echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">No Disponible:</span>
              No Disponible: Ya existe un paquete con esta etiqueta
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