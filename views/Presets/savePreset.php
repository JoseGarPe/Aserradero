<form method="post" id="insert_form" action="../controllers/PresetsControlador.php?accion=guardar">  
                          <label>Nombre</label>  
                          <input type="text" name="nombre" id="nombre" class="form-control" />  
                          <br />  
                          <label>Descripcion</label>  
                          <textarea name="descripcion" id="descripcion" class="form-control"></textarea>  
                          <br />  
                          <input type="hidden" name="id_presets" id="id_presets" />  
                          <input type="hidden" name="guardar" id="guardar" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>