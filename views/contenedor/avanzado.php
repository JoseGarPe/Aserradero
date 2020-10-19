<form method="post" id="insert_form" action="../controllers/PackingControlador.php?accion=avanzado">  
                          <label>Tipo de busqueda</label>  
                          <select id="tipo" name="tipo" class="form-control">
                            <option value="1">Por Contenedor</option>
                            <option value="2">Por Etiqueta</option>
                            <option value="3">Por Envio</option>
                          </select>
                          <br /> 
                          <div id="porContenedor" style="display: block">
                             <label>Etiqueta (Contenedor o Etiqueta)</label>  
                              <input type="text" name="etiqueta" id="etiqueta" class="form-control" />  
                               <br />  
                          </div>
                          <div id="porEnvio" style="display: none">
                              <label>Numero de envio o Numero de factura</label>  
                              <input type="text" name="envio" id="envio" class="form-control" />  
                               <br />  

                              <label>Tipo de Ingreso</label>  
                              <select id="ingreso" name="ingreso" class="form-control">
                                <option value="Importacion">Importada</option>
                                <option value="Local">Local</option>
                              </select>
                              <br>
                              <button class>Consultar Envio</button>
                          </div>
                          <br>
                          <input type="submit" name="insert" id="insert" value="Buscar" class="btn btn-success" />  
                     </form>
<script type="text/javascript">
  $("#tipo").change(function() {
  var valor = $(this).val();
   var contenedor = document.getElementById("porContenedor");
   var envio = document.getElementById("porEnvio");
  switch (valor) {
    case '1': 
       envio.style.display = "none";
        break;
    case '2': 
       envio.style.display = "none";
        break;
    case '3': 
     //  contenedor.style.display = "none";
     //  envio.style.display = "block";
        break;
  }
});
</script>