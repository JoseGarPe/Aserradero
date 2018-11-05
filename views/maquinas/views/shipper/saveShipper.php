<form method="post" id="insert_form" action="../controllers/ShipperControlador.php?accion=guardar">  
                          <label>Nombre</label>  
                          <input type="text" name="nombre" id="nombre" class="form-control" required="true" />  
                          <br />  
                          <label>Descripcion</label>  
                          <textarea name="descripcion" id="descripcion" class="form-control"></textarea>  
                          <br />  
                          <input type="hidden" name="id_nave" id="id_nave" />  
                          <input type="hidden" name="guardar" id="guardar" />  
                          <input type="submit" name="insert" id="insert" value="Guardar" class="btn btn-success" />  
                     </form>