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
	
	$id_packing_list =$_GET['packing'];
	$id_contenedor =$_GET['id'];
	$Contenedor = new Contenedores();
	$Contenedor->setId_contenedor($id_contenedor);
	$delete=$Contenedor->delete();
	if ($delete==true) {
/*				$pl= new Packing();
  	$listpl = $pl->selectOne($id_packing_list);
  	foreach ($listpl as $key) {
  		$cont_ingresados=$key['contenedores_ingresados'];
  	}
  	$new_con_ing=$cont_ingresados - 1;
  		$pl->setContenedores_ingresados($new_con_ing);
		$pl->setId_packing_list($id_packing_list);
		$update1=$pl->updateIngresos();
*/
		header('Location: ../listas/IndexPackingList.php?success=correcto&id_packing_list='.$id_packing_list.'');
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
		$packing = new Packing();
		  $orden = $packing->SelectOne($id_packing_list);
                         foreach ($orden as $key) {
                           $estado = $key['estado'];
                           $numero_factura = $key['numero_factura'];
                           $fecha_inicio = $key['fecha_inicio'];
                           $fecha_cierre = $key['fecha_cierre'];
                           $cont_previstos = $key['total_contenedores'];
                           $cont_ingresados = $key['contenedores_ingresados'];
                         }
 $output = '';	
  $output.= '<label class="text-success">Registro Insertado Correctamente</label>';
  $output.= '<table id="example1" class="table table-striped table-bordered" name="example1">
         		<thead>
                        <tr>
                          <th>Id</th>
                          <th>N° Contenedor</th>
                          <th>Estado</th>
                          <th>Fecha Ingreso</th> 
                          <th>Bodega</th> 
                          <th>Info. Paquetes</th>   
                          <th>Opcion</th>                            
                        </tr>
          		</thead>
          		<tbody>';

                         $ms = new Contenedores();
                         $contacto = $ms->selectALLpack($id_packing_list);
                         $idf=1;
                         foreach ($contacto as $row) {
                         $output.= '<tr>
                          <td>'.$row['id_contenedor'].'</td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['estado'].'</td>
                          ';

                            if ($row['fecha_ingreso'] == NULL && $row['estado']!= 'Confirmado' || $row['fecha_ingreso']== '0000-00-00' && $row['estado']!= 'Confirmado' || $row['fecha_ingreso']== '00/00/0000' && $row['estado']!= 'Confirmado') {
                              $output.= '<td>
                             <input type="date" class="form-control" name="fecha'.$idf.'" id="fecha'.$idf.'" required> 
                              
                              </td>';
                            }else{
                              $date = date_create($row['fecha_ingreso']);
                              $output.= '<td>'.date_format($date, 'd/m/Y').'</td>';
                            }
                             if ($row['id_bodega']== NULL) {
                              $output.= '<td><select class="form-control" name="id_bodega'.$idf.'" id="id_bodega'.$idf.'" required>
                          <option value="">Seleccione una opcion</option>';
                          require_once "../class/Bodega.php";

                        $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $rows1) {

                            $output.= "<option value='".$rows1['id_bodega']."'>".$rows1['nombre']."</option>";

                          } 
                         $output.= '  </select></td>';
                            }
                            else{
                              require_once "../class/Bodega.php";
            
                             $bod = new Bodega();
                             $datoBd = $bod->SelectOne($row['id_bodega']);
                             foreach ($datoBd as $valor) {
                              $output.='<td>'.$valor['nombre'].'</td>';
                               
                             }
                            }
                $packin = new Packing();

                         $paquetess = $packin->selectEtiquetas_nullC($row['id_contenedor']);
                         foreach ($paquetess as $keys) {
                           $etiquetaS_null=$keys['etiquetas_null'];
                         }

                         $paquetess1 = $packin->selectPaquetes_cero($row['id_contenedor']);
                         foreach ($paquetess1 as $keys) {
                           $etiqueta_cero=$keys['paquetes_c'];
                         }

                         if ($etiquetaS_null==0 && $etiqueta_cero > 0) {
                       $output.= '<td>Info. Completa</td>';
                           if ($estado != "Cerrado") {
                             
                            if ($row['estado']=='Sin Confirmar') {
                              $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Confirmado&id_packing_list='.$id_packing_list.'" class="btn btn-success">Confirmar</a> -->
                               <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>

                                <input type="button" name="save" value="Confirmar" id="'.$row["id_contenedor"].'" packing="'.$id_packing_list.'" dato="'.$idf.'" estado="Confirmado"  class="btn btn-success view_data2" />
                                <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$id_packing_list.'" class="btn btn-danger">Eliminar</a>

                              </td>';
                            }else{
                              $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Sin Confirmar" class="btn btn-warning">Sin Confirmar</a>  -->

                             <!--   <input type="button" name="delete" value="Eliminar" id="'.$row["id_packing_list"].'" class="btn btn-danger delete_data" />-->
                             <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$id_packing_list.'" class="btn btn-danger">Eliminar</a>
          <!--  <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>-->
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  

                              </td>

                              ';
                            }
                          }else{
                            $output.= '<td>
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  </td>';
                          }

                         }else{

                     $output.=  '<td>Info. Pendiente</td>';
                           if ($estado != "Cerrado") {
                             
                            if ($row['estado']=='Sin Confirmar') {
                             $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Confirmado&id_packing_list='.$id_packing_list.'" class="btn btn-success">Confirmar</a> -->
                               <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>

                               <!-- <input type="button" name="save" value="Confirmar" id="'.$row["id_contenedor"].'" packing="'.$id_packing_list.'" dato="'.$idf.'" estado="Confirmado"  class="btn btn-success view_data2" />-->
                                <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$id_packing_list.'" class="btn btn-danger">Eliminar</a>

                              </td>';
                            }else{
                            $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Sin Confirmar" class="btn btn-warning">Sin Confirmar</a>  -->

                             <!--   <input type="button" name="delete" value="Eliminar" id="'.$row["id_packing_list"].'" class="btn btn-danger delete_data" />-->
                             <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$codigo.'" class="btn btn-danger">Eliminar</a>
          <!--  <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>-->
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  

                              </td>

                              ';
                            }
                          }else{
                            $output.= '<td>
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  </td>';
                          }
                         }

                         
                          $idf+=1;
                      
                          
                           $output.='
                          </tr>';
                         
                $output.= '<input type="hidden"  name="totaldatos" id="totaldatos" value="'.$idf.'">';

                         }//end foreach mayor
                      $output.= '
          		</tbody>
          			</table>';
          			echo $output;   
		
		//header('Location: ../listas/IndexPackingList.php?success=correcto');
		# code...
	}
	else{
			$packing = new Packing();
		  $orden = $packing->SelectOne($id_packing_list);
                         foreach ($orden as $key) {
                           $estado = $key['estado'];
                           $numero_factura = $key['numero_factura'];
                           $fecha_inicio = $key['fecha_inicio'];
                           $fecha_cierre = $key['fecha_cierre'];
                           $cont_previstos = $key['total_contenedores'];
                           $cont_ingresados = $key['contenedores_ingresados'];
                         }
 $output = '';	
  $output.= '<label class="text-warning">ERROR: Datos erroneos, ya supero el limite de contenedores o datos ya ingresados</label>';
  $output.= '<table id="example1" class="table table-striped table-bordered" name="example1">
         		<thead>
                        <tr>
                          <th>Id</th>
                          <th>N° Contenedor</th>
                          <th>Estado</th>
                          <th>Fecha Ingreso</th> 
                          <th>Bodega</th>  
                          <th>Info. Paquetes</th>   
                          <th>Opcion</th>                            
                        </tr>
          		</thead>
          		<tbody>';

                         $ms = new Contenedores();
                         $contacto = $ms->selectALLpack($id_packing_list);
                         $idf=1;
                         foreach ($contacto as $row) {
                         $output.= '<tr>
                          <td>'.$row['id_contenedor'].'</td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['estado'].'</td>
                          ';

                            if ($row['fecha_ingreso'] == NULL && $row['estado']!= 'Confirmado' || $row['fecha_ingreso']== '0000-00-00' && $row['estado']!= 'Confirmado' || $row['fecha_ingreso']== '00/00/0000' && $row['estado']!= 'Confirmado') {
                              $output.= '<td>
                             <input type="date" class="form-control" name="fecha'.$idf.'" id="fecha'.$idf.'" required> 
                              
                              </td>';
                            }else{
                              $date = date_create($row['fecha_ingreso']);
                              $output.= '<td>'.date_format($date, 'd/m/Y').'</td>';
                            }
                             if ($row['id_bodega']== NULL) {
                              $output.= '<td><select class="form-control" name="id_bodega'.$idf.'" id="id_bodega'.$idf.'" required>
                          <option value="">Seleccione una opcion</option>';
                          require_once "../class/Bodega.php";

                        $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $rows1) {

                            $output.= "<option value='".$rows1['id_bodega']."'>".$rows1['nombre']."</option>";

                          } 
                         $output.= '  </select></td>';
                            }
                            else{
                              require_once "../class/Bodega.php";
            
                             $bod = new Bodega();
                             $datoBd = $bod->SelectOne($row['id_bodega']);
                             foreach ($datoBd as $valor) {
                              $output.='<td>'.$valor['nombre'].'</td>';
                               
                             }
                            }

                $packin = new Packing();

                         $paquetess = $packin->selectEtiquetas_nullC($row['id_contenedor']);
                         foreach ($paquetess as $keys) {
                           $etiquetaS_null=$keys['etiquetas_null'];
                         }
                         $paquetess1 = $packin->selectPaquetes_cero($row['id_contenedor']);
                         foreach ($paquetess1 as $keys) {
                           $etiqueta_cero=$keys['paquetes_c'];
                         }

                         if ($etiquetaS_null==0 && $etiqueta_cero > 0) {
                       $output.= '<td>Info. Completa</td>';
                           if ($estado != "Cerrado") {
                             
                            if ($row['estado']=='Sin Confirmar') {
                              $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Confirmado&id_packing_list='.$id_packing_list.'" class="btn btn-success">Confirmar</a> -->
                               <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>

                                <input type="button" name="save" value="Confirmar" id="'.$row["id_contenedor"].'" packing="'.$id_packing_list.'" dato="'.$idf.'" estado="Confirmado"  class="btn btn-success view_data2" />
                                <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$id_packing_list.'" class="btn btn-danger">Eliminar</a>

                              </td>';
                            }else{
                              $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Sin Confirmar" class="btn btn-warning">Sin Confirmar</a>  -->

                             <!--   <input type="button" name="delete" value="Eliminar" id="'.$row["id_packing_list"].'" class="btn btn-danger delete_data" />-->
                             <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$codigo.'" class="btn btn-danger">Eliminar</a>
          <!--  <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>-->
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  

                              </td>

                              ';
                            }
                          }else{
                            $output.= '<td>
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  </td>';
                          }

                         }else{

                     $output.=  '<td>Info. Pendiente</td>';
                           if ($estado != "Cerrado") {
                             
                            if ($row['estado']=='Sin Confirmar') {
                             $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Confirmado&id_packing_list='.$id_packing_list.'" class="btn btn-success">Confirmar</a> -->
                               <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>

                               <!-- <input type="button" name="save" value="Confirmar" id="'.$row["id_contenedor"].'" packing="'.$id_packing_list.'" dato="'.$idf.'" estado="Confirmado"  class="btn btn-success view_data2" />-->
                                <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$id_packing_list.'" class="btn btn-danger">Eliminar</a>

                              </td>';
                            }else{
                            $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Sin Confirmar" class="btn btn-warning">Sin Confirmar</a>  -->

                             <!--   <input type="button" name="delete" value="Eliminar" id="'.$row["id_packing_list"].'" class="btn btn-danger delete_data" />-->
                             <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$codigo.'" class="btn btn-danger">Eliminar</a>
          <!--  <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>-->
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  

                              </td>

                              ';
                            }
                          }else{
                            $output.= '<td>
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  </td>';
                          }
                         }
                          $idf+=1;
                      
                          
                           $output.='
                          </tr>';
                         
                $output.= '<input type="hidden"  name="totaldatos" id="totaldatos" value="'.$idf.'">';

                         }//end foreach mayor
                      $output.= '
          		</tbody>
          			</table>';
          			echo $output; 
		//header('Location: ../listas/IndexPackingList.php?error=incorrecto');
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
				$estado1="Abierto";
			$pl= new Packing();
			$pl->setEstado($estado1);
			$pl->setId_packing_list($id_packing_list);
			$vari = 'Primero';
			$update1=$pl->updateStatu($vari,$fecha);
			}

      	$pl= new Packing();
  	$listpl = $pl->selectOne($id_packing_list);
  	foreach ($listpl as $key) {
  		$cont_ingresados=$key['contenedores_ingresados']; 
      $fecha_ingresado=$key['fecha_inicio'];
       if ($fecha_ingresado==NULL || $fecha_ingresado=="") {
              
                $estado1="Abierto";
            $pl->setEstado($estado1);
            $pl->setId_packing_list($id_packing_list);
            $vari = 'Primero';
            $update1=$pl->updateStatu($vari,$fecha);
            }elseif ($fecha < $fecha_ingresado) {
                $estado1="Abierto";
            $pl->setEstado($estado1);
            $pl->setId_packing_list($id_packing_list);
            $vari = 'Primero';
            $update1=$pl->updateStatu($vari,$fecha);
              # code...
            }
  	}
    
  	$new_con_ing=(int)$cont_ingresados + 1;
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

// ACTUALIZAR TABLA //

		$packing = new Packing();
		  $orden = $packing->SelectOne($id_packing_list);
                         foreach ($orden as $key) {
                           $estado = $key['estado'];
                           $numero_factura = $key['numero_factura'];
                           $fecha_inicio = $key['fecha_inicio'];
                           $fecha_cierre = $key['fecha_cierre'];
                           $cont_previstos = $key['total_contenedores'];
                           $cont_ingresados = $key['contenedores_ingresados'];
                         }
 $output = '';	
  $output.= '<label class="text-success">Registro Actualizado Correctamente</label>';
  $output.= '<table id="example1" class="table table-striped table-bordered" name="example1">
         		<thead>
                        <tr>
                          <th>Id</th>
                          <th>N° Contenedor</th>
                          <th>Estado</th>
                          <th>Fecha Ingreso</th> 
                          <th>Bodega</th>  
                          <th>Info. Paquetes</th>   
                          <th>Opcion</th>                            
                        </tr>
          		</thead>
          		<tbody>';

                         $ms = new Contenedores();
                         $contacto = $ms->selectALLpack($id_packing_list);
                         $idf=1;
                         foreach ($contacto as $row) {
                         $output.= '<tr>
                          <td>'.$row['id_contenedor'].'</td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['estado'].'</td>
                          ';

                            if ($row['fecha_ingreso'] == NULL && $row['estado']!= 'Confirmado' || $row['fecha_ingreso']== '0000-00-00' && $row['estado']!= 'Confirmado' || $row['fecha_ingreso']== '00/00/0000' && $row['estado']!= 'Confirmado') {
                              $output.= '<td>
                             <input type="date" class="form-control" name="fecha'.$idf.'" id="fecha'.$idf.'" required> 
                              
                              </td>';
                            }else{
                              $date = date_create($row['fecha_ingreso']);
                              $output.= '<td>'.date_format($date, 'd/m/Y').'</td>';
                            }
                             if ($row['id_bodega']== NULL) {
                              $output.= '<td><select class="form-control" name="id_bodega'.$idf.'" id="id_bodega'.$idf.'" required>
                          <option value="">Seleccione una opcion</option>';
                          require_once "../class/Bodega.php";

                        $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $rows1) {

                            $output.= "<option value='".$rows1['id_bodega']."'>".$rows1['nombre']."</option>";

                          } 
                         $output.= '  </select></td>';
                            }
                            else{
                              require_once "../class/Bodega.php";
            
                             $bod = new Bodega();
                             $datoBd = $bod->SelectOne($row['id_bodega']);
                             foreach ($datoBd as $valor) {
                              $output.='<td>'.$valor['nombre'].'</td>';
                               
                             }
                            }

                          
                $packin = new Packing();

                         $paquetess = $packin->selectEtiquetas_nullC($row['id_contenedor']);
                         foreach ($paquetess as $keys) {
                           $etiquetaS_null=$keys['etiquetas_null'];
                         }
                         $paquetess1 = $packin->selectPaquetes_cero($row['id_contenedor']);
                         foreach ($paquetess1 as $keys) {
                           $etiqueta_cero=$keys['paquetes_c'];
                         }
                         if ($etiquetaS_null==0 && $etiqueta_cero > 0 ) {
                       $output.= '<td>Info. Completa</td>';
                           if ($estado != "Cerrado") {
                             
                            if ($row['estado']=='Sin Confirmar') {
                              $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Confirmado&id_packing_list='.$id_packing_list.'" class="btn btn-success">Confirmar</a> -->
                               <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>

                                <input type="button" name="save" value="Confirmar" id="'.$row["id_contenedor"].'" packing="'.$id_packing_list.'" dato="'.$idf.'" estado="Confirmado"  class="btn btn-success view_data2" />
                                <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$id_packing_list.'" class="btn btn-danger">Eliminar</a>

                              </td>';
                            }else{
                              $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Sin Confirmar" class="btn btn-warning">Sin Confirmar</a>  -->

                             <!--   <input type="button" name="delete" value="Eliminar" id="'.$row["id_packing_list"].'" class="btn btn-danger delete_data" />-->
                             <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$id_packing_list.'" class="btn btn-danger">Eliminar</a>
          <!--  <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>-->
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  

                              </td>

                              ';
                            }
                          }else{
                            $output.= '<td>
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  </td>';
                          }

                         }else{

                     $output.=  '<td>Info. Pendiente</td>';
                           if ($estado != "Cerrado") {
                             
                            if ($row['estado']=='Sin Confirmar') {
                             $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Confirmado&id_packing_list='.$id_packing_list.'" class="btn btn-success">Confirmar</a> -->
                               <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>

                               <!-- <input type="button" name="save" value="Confirmar" id="'.$row["id_contenedor"].'" packing="'.$id_packing_list.'" dato="'.$idf.'" estado="Confirmado"  class="btn btn-success view_data2" />-->
                                <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$id_packing_list.'" class="btn btn-danger">Eliminar</a>

                              </td>';
                            }else{
                            $output.=  '<td> <!-- <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=confirmar2&estado=Sin Confirmar" class="btn btn-warning">Sin Confirmar</a>  -->

                             <!--   <input type="button" name="delete" value="Eliminar" id="'.$row["id_packing_list"].'" class="btn btn-danger delete_data" />-->
                             <a href="../controllers/ContenedorControlador.php?id='.$row["id_contenedor"].'&accion=eliminar&packing='.$id_packing_list.'" class="btn btn-danger">Eliminar</a>
          <!--  <a href="../views/savePaquetee.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&etiquetaCo='.$row['etiqueta'].'" class="btn btn-warning">Paquetes</a>-->
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  

                              </td>

                              ';
                            }
                          }else{
                            $output.= '<td>
            <a href="../listas/contenedores.php?id='.$id_packing_list.'&contenedor='.$row['id_contenedor'].'&factura='.$numero_factura.'&inicio='.$fecha_inicio.'&final='.$fecha_cierre.'" class="btn btn-warning">Detalle de Paquetes</a>  </td>';
                          }
                         }
                          $idf+=1;
                      
                          
                           $output.='
                          </tr>';
                         
                $output.= '<input type="hidden"  name="totaldatos" id="totaldatos" value="'.$idf.'">';

                         }//end foreach mayor
                      $output.= '
          		</tbody>
          			</table>';
          			echo $output;   

	//	header('Location: ../listas/IndexPackingList.php?success=correcto');
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