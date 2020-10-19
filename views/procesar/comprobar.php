<?php
      $codigo = $_POST['b'];

       
      if(!empty($codigo)) {
require_once "Paquetes.php";

                                   $misCategorias = new Paquetes();
                         $catego = $misCategorias->selectOneM($codigo);
                         foreach ($catego as $key) {
                           $stock=$key['stock'];
                         }
                         if($stock>0){
                          $informacion= array("valido"=>"true","mensaje"=>"Paquete Valido");
                          echo json_encode($informacion);
                         }else{
                          $informacion= array("valido"=>"false","mensaje"=>"Paquete No Valido");
                          echo json_encode($informacion);
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