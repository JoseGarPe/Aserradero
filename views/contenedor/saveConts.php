<div class="col-xs-12">
    				<table id="datatable-buttons" class="table table-striped table-bordered">
         		<thead>
                        <tr>
                          <th>Id</th>
                          <th>Material</th>
                          <th>Etiqueta</th>
                          <th width="95">Piezas</th> 
                          <th width="95">Paquetes</th>  
                          <th width="95">m cuadrados</th> 
                          <th width="95">Tarimas</th>
                          <th>Bodega</th>
                          <th>Estado</th>                                
                        </tr>
          		</thead>
          		<tbody>
          			<?php 
  					$codigo=$_POST["employee_id"];
						require_once "Contenedor.php";
                         $ms = new Contenedores();
                         $contacto = $ms->selectALLpack($codigo);
                         foreach ($contacto as $row) {
                         	echo '<tr>
                          <td>'.$row['id_contenedor'].'</td>
                           <td>'.$row['material'].'</td>
                           <td>'.$row['etiqueta'].'</td>
                           <td>'.$row['piezas'].'</td>
                           <td>'.$row['n_paquetes'].'</td>
                           <td>'.$row['m_cuadrados'].'</td>
                           <td>'.$row['tarimas'].'</td>
                          ';
                          require_once "Bodega.php";
                              $mistipos1 = new Bodega();
                              if ($row['id_bodega']==NULL) {
                                 $catego1 = $mistipos1->selectOne($row['bodega_pendiente']);
                          foreach ((array)$catego1 as $key) {
                            echo' <td>'.$key['nombre'].'</td>';
                              }
                          }
                          else{
                             $catego1 = $mistipos1->selectOne($row['id_bodega']);
                          foreach ((array)$catego1 as $key) {
                            echo' <td>'.$key['nombre'].'</td>';
                              }

                          }


                     /* echo'<select class="form-control col-md-7 col-xs-12" name="id_bodega1[]" id="id_bodega1[]">';     
                      require_once "../class/Bodega.php";

                          $mistipos1 = new Bodega();
                         $catego1 = $mistipos1->selectALL();
                          foreach ((array)$catego1 as $key) {
                                if ($key['id_bodega']==$row['id_bodega']) {
                            echo "<option selected value='".$key['id_bodega']."'>".$key['nombre']."</option>";
                                                                
                             }
                             else{

                            echo "<option value='".$key['id_bodega']."'>".$key['nombre']."</option>";
                             }

                          }
                          echo'</select> </td>'; 
                          */
                              

                           echo' <td>'.$row['estado'].'</td>
                          </tr>';
                         }
    	     
    	      ?>
          		</tbody>
          			</table>
				</div>
<form role="form1" action="../controllers/ContenedorControlador.php?accion=guardar" method="post">
    <div class="box-body">
    	<div class="row">
    		<div class="col-xs-12">
    			<table id="datatable-buttons" class="table table-striped table-bordered">
         		<thead>
                        <tr>
                          <th>Materiales</th>
                          <th>Dimenciones</th>
                          <th>Etiqueta</th>
                          <th width="85">Piezas</th> 
                          <th width="95">N Paque</th>
                          <th width="90">multiplo</th>  
                          <th width="95">m3</th> 
                          <th width="95">Tarimas</th>
                          <th>Bodega</th>                              
                        </tr>
          		</thead>
          		<tbody>
          			  <tr>     
                  <?php  
                  echo '
                          <input type="hidden" name="id_packing_list" id="id_packing_list" value="'.$codigo.'"/>';
                  ?>      
                          <th><select class="form-control" onchange="mostrarInfo(this.value)" name="id_materiales" id="id_materiales">
                          <option>Seleccione</option>
                          <?php 
                          require_once "Materiales.php";

                          $mistipos = new Materiales();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_material']."'>".$row['nombre']."</option>";

                          } 

                    
                          ?>
                          </select></th>
                          <th id="datos"></th>
                          <th><input type="text" id="etiqueta" name="etiqueta"  class="form-control col-md-7"></th>
                          <th><input type="number" min="0.00" step="0.01" id="piezas" name="piezas"  class="form-control col-md-7"></th>
                          <th><input type="number" min="0.00" step="1" id="paquetes" name="paquetes"  class="form-control col-md-4"></th> 
                          <th><input type="number" min="0.00" step="0.01" id="multiplo" name="multiplo"  class="form-control col-md-7"></th>  
                          <th><input type="number" min="0.00" step="0.01" id="m_cuadrados" name="m_cuadrados" readonly="true" class="form-control col-md-4 "></th> 
                          <th><input type="number" min="0.00" step="1" id="tarimas" name="tarimas" readonly="true" class="form-control col-md-4"></th>
                          <th>
                              <select class="form-control col-md-7 col-xs-12" name="id_bodega" id="id_bodega">
                          <?php 

                          

                          require_once "Bodega.php";

                          $mistipos = new Bodega();
                         $catego = $mistipos->selectALL();
                          foreach ((array)$catego as $row) {

                            echo "<option value='".$row['id_bodega']."'>".$row['nombre']."</option>";

                          } 

                    
                          ?>
                          </select>
                          </th>                              
                        </tr>
          		</tbody>
          			</table>
    		</div>
    	</div><!--END ROW-->

    </div>
    <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/IndexPackingList.php'" name="cancel" value="Cancelar" >
   </div>
</form>
<script>
    function mostrarInfo(cod){
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("datos").innerHTML=xmlhttp.responseText;
    $("#piezas").val("");
    }else{ 
  document.getElementById("datos").innerHTML='Cargando...';
    }
  }
xmlhttp.open("POST","../views/contenedor/materiales_lga.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cod_banda="+cod);

}

   $(document).ready(function () {
    $("#paquetes").keyup(function () {

        var piezas = $("#piezas").val();

        var paquetes = $(this).val();
        var largo = $("#largo").val();

        var ancho = $("#ancho").val();
        var grueso = $("#grueso").val();
        var multiplo = (piezas * largo * ancho * grueso*paquetes)/1000000000;
        $("#m_cuadrados").val(multiplo);
    });
});
    $(document).ready(function () {
    $("#multiplo").keyup(function () {

        var m_cuadrados = $("#m_cuadrados").val();
        var multiplo = $(this).val();

        
        var tarimas = m_cuadrados/multiplo;

        $("#tarimas").val(Math.round(tarimas));
    });
});
</script>