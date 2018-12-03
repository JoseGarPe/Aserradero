<?php
                                             $codigo = $_POST['cod_banda'];
                                             require_once "Materiales.php";
                                                 $usua = new Materiales();
                                                 $usuar=$usua->selectOne($codigo);
                                            foreach ((array)$usuar as $w) {
                                               echo '
                                               <th width="95"> '.$w['largo'].'</br>'.$w['grueso'].'</br>'.$w['ancho'].'</th>
                                               <input type="hidden" name="largo" id="largo" value="'.$w['largo'].'"/>
                                               <input type="hidden" name="ancho" id="ancho" value="'.$w['ancho'].'"/>
                                               <input type="hidden" name="grueso" id="grueso" value="'.$w['grueso'].'"/>
                                               ';
                                             }
                                           
                                           
                                               ?>